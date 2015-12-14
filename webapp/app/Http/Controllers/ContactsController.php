<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;
use Mail;

use App\Contact;
use App\PropertyWeight;
use App\GroupArea;
use App\ContactInterest;

use Illuminate\Support\Facades\DB;

use Maatwebsite\Excel\Facades\Excel;

class ContactsController extends Controller {
    
    /**
     * Display a listing of contacts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $p = Request::all();
        $with = array('contact_type', 'group_area', 'creator');
        return Contact::with($with)
            ->where($p)
            ->get(array('id', 'firstname', 'lastname', 'company_name', 'id_contact_type', 'id_group_area', 'id_creator'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        return Contact::full()->findOrFail($id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $data = $this->getRequestData();
        $newInterests = $data['interests'];
        unset($data['interests']);
        $newContact = Contact::create($data);

        $this->saveInterests($newContact, $newInterests);

        //$name = $newContact->firstname . ' ' . $newContact->lastname;
        //$destination = 'juangarias@gmail.com';

        //Mail::send('emails.new_contact_created', ['name' => $name], function ($m) use($destination) {
        //    $m->to($destination)->subject('Nuevo contacto creado');
        //});
        
        return Contact::full()->findOrFail($newContact->id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $data = $this->getRequestData();
        $newInterests = $data['interests'];
        unset($data['interests']);
        $contact = new Contact();
        $contact->fill($data);
        $contact->exists =  true;
        $contact->save();

        $this->saveInterests($contact, $newInterests);

        return Contact::full()->findOrFail($id);
    }

    private function getRequestData() {
        $input = Request::all();
        $data = $this->translatePropertiesObjectToID($input);
        $group_area = $this->getGroupArea($data);
        $data['interests'] = null;

        if ($group_area) {
            $data['id_profile'] = $group_area->profile->id;
            $data['interests'] = $group_area->interests;
        }
        $data['linkedin_profile'] = $this->completeURL($data, 'linkedin_profile');

        if (array_key_exists('sap_code', $data)) {
            $data['ten_digits_code'] = str_pad($data['sap_code'], 10, '0', STR_PAD_LEFT);
        }

        return $data;
    }

    private function translatePropertiesObjectToID($input) {
        $complexEntities = ['market', 'country', 'gender', 'contact_type', 'education_level', 'size', 'age_range',
            'group_area', 'segmentation_ABC', 'segmentation_potential', 'segmentation_FNC_relation', 'segmentation_client_type', 
            'segmentation_product_type', 'language', 'customer_since', 'honorific', 'business_origin'];
        
        foreach ($complexEntities as $entityName) {
            if (array_key_exists($entityName, $input)) {
                $input["id_$entityName"] = $input[$entityName]['id'];
                unset($input[$entityName]);
            }
        }

        return $input;
    }

    private function completeURL($data, $field) {
        if (isset($data[$field]) && !empty($data[$field]) && substr($data[$field], 0, 4) !== 'http') {
            return 'http://' . $data[$field];
        } else {
            return '';
        }
    }

    private function getGroupArea($data) {
        if (array_key_exists('id_group_area', $data)) {
            $id = $data['id_group_area'];
            return GroupArea::find($id);
        } else {
            return null;
        }
    }

    private function saveInterests($contact, $newInterests) {
        if ($newInterests) {
            $ids = array();
            foreach ($contact->interests as $i) {
                $ids[] = $i->id;
            }
            ContactInterest::destroy($ids);

            foreach ($newInterests as $i) {
                $contactInterest = new ContactInterest();
                $contactInterest->id_interest = $i->id;
                $contactInterest->hits = 1;
                $contact->interests()->save($contactInterest);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }


    /**
     * Get list of property weigths for contact completeness.
     */
    public function propertyWeights() {
        return PropertyWeight::orderBy('weight', 'DESC')->get();
    }

    /*
     * Get comleteness of contact list.
     */
    public function contactListCompleteness() {
        $p = Request::all();
        $contactList = Contact::full()->where($p)->get();
        $propertyWeights = PropertyWeight::all();

        $accum = 0;

        foreach ($contactList as $contact) {
            foreach ($propertyWeights as $prop) {
                $accum += $contact->{$prop->name} ? $prop->weight : 0;
            }
        }

        $completeness = round($accum / $contactList->count());

        return '{"value":' . $completeness . '}';
    }

    public function export() {
        
        Excel::create('contactos', function($excel) {
            $excel->setTitle('Lista de contactos');
            $excel->sheet('Contactos', function($sheet) {
                $p = Request::all();
                $contacts = Contact::full()->where($p)->orderBy('lastname')->get();

                $contactsFlat = array();
                foreach($contacts as $c) {
                    $data = array($this->getDesc($c->honorific), $c->lastname, $c->firstname, $c->email, $c->skype,
                        $c->linkedin_profile, $c->consolidated_code, $c->sap_code, $c->ten_digits_code,
                        $c->position, $c->company_area, $c->company_name, $c->career,
                        $c->phone, $c->street, $c->city, $c->postal_code, $c->region, $c->country->name,
                        $this->transBool($c->action), $this->transBool($c->christmas_cards), 
                        $this->transBool($c->christmas_presents), $this->transBool($c->newsletter), 
                        $this->transBool($c->bulletinFNC),
                        $this->getDesc($c->market), $this->getDesc($c->contact_type), $this->getDesc($c->group_area), 
                        $this->getDesc($c->profile), $this->getDesc($c->education_level), $this->getDesc($c->size), 
                        $this->getDesc($c->gender), $this->getDesc($c->age_range), $this->getDesc($c->business_origin), 
                        $this->getDesc($c->language), $this->getDesc($c->customer_since),
                        $this->getDesc($c->segmentation_ABC), $this->getDesc($c->segmentation_client_type), 
                        $this->getDesc($c->segmentation_product_type), $this->getDesc($c->segmentation_potential), 
                        $this->getDesc($c->segmentation_FNC_relation));
                    array_push($contactsFlat, $data);
                }

                //set the titles
                $sheet->fromArray($contactsFlat, null, 'A1', false, false)->prependRow(array(
                        'Título', 'Apellido', 'Nombre', 'e-mail', 'Skype',
                        'Linked-In', 'Código consolidado', 'Código SAP', 'Código 10 digitos',
                        'Cargo', 'Área', 'Empresa', 'Profesión',  
                        'Teléfono oficina', 'Calle', 'Ciudad', 'Código Postal', 'Región / Estado', 'País', 
                        'Nos interesa realizar alguna acción', 'Tarjetas de Navidad', 
                        'Regalos de Navidad', 'Newsletter', 
                        'Boletín FNC', 
                        'Mercado', 'Tipo de socio', 'Area Agrupada', 
                        'Perfil', 'Nivel Educación', 'Talla', 
                        'Sexo', 'Rango de edad', 'De dónde proviene el negocio', 
                        'Idioma', 'Desde cuándo es cliente', 
                        'Segmentación ABC', 'Segmentación Tipo Cliente', 
                        'Segmentación Tipo Producto', 'Segmentación Potencial a futuro', 
                        'Segmentación Relacion FNC', 
                    )

                );

                $sheet->cells('A1:AN1', function($cells) {
                    $cells->setFontWeight('bold');
                    $cells->setBackground('#CCCCCC');
                });
            });


        })->export('xlsx'); 
    }

    private function transBool($value) {
        return $value ? 'Si' : 'No';
    }

    private function getDesc($obj) {
        return is_null($obj) ? '' : $obj->description;
    }
}
