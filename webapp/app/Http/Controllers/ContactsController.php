<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Mail;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Request;

use App\Contact;
use App\PropertyWeight;
use App\GroupArea;
use App\ContactInterest;
use App\User;

use JWTAuth;
use Maatwebsite\Excel\Facades\Excel;

class ContactsController extends Controller {

    protected function getAuthExceptMethods() {
        return ['contactInterestHit'];
    }

    public function applyInterestsAllContacts() {
        $with = array('group_area.interests', 'group_area.profile', 'interests');
        $contacts = Contact::with($with)->get();

        foreach ($contacts as $c) {
            if ($c->interests->isEmpty()) {
                if ($c->group_area) {
                    $this->saveInterests($c, $c->group_area->interests);
                    $c->id_profile = $c->group_area->profile->id;
                    $c->save();
                    $this->echoContact('SAVED contact', $c);
                } else {
                    $this->echoContact('EMPTY GroupArea', $c);
                }
            } else {
                $this->echoContact('DO Nothing. Already has interests', $c);
            }
        }
    }

    private function echoContact($msg, $c) {
        echo $msg . ' ' . $c->firstname . ' ' . $c->lastname . ' [' . $c->id . ']' . '<br>';        
    }

    public function contactInterestHit(Request $request) {
        $email = Request::input('email');
        $interests = explode(',', Request::input('interests'));

        if ($email && $interests) {
            $contact = Contact::where('email', $email)->first();

            foreach ($contact->interests as $int) {
                if (in_array($int->id_interest, $interests)) {
                    $int->hits += 1;
                    $int->save();
                }
            }
        }
    }
    
    /**
     * Display a listing of contacts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $p = Request::all();
        $id_responsible = $this->getIdResponsible($p);

        $with = array('contact_type', 'group_area', 'market', 'language', 'country', 'responsibles');
        $fields = array('id', 'firstname', 'lastname', 'email', 'phone', 'skype',
            'company_name', 'company_area', 'position', 'sap_code', 'career',
            'city', 'id_market', 'id_language', 'id_country',
            'id_contact_type', 'id_group_area', 'created_at');
        
        return Contact::with($with)
            ->hasResponsible($id_responsible)
            ->get($fields);
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
        $data = $this->processRequestData();
        
        $newInterests = $data['interests'];
        unset($data['interests']);
        $newResponsibles = $data['responsibles'];
        unset($data['responsibles']);

        $newContact = Contact::create($data);
        $this->saveInterests($newContact, $newInterests);
        $this->saveResponsibles($newContact, $newResponsibles);

        $contactName = $this->buildContactNameParam($newContact);
        $creatorName = $this->buildCreatorNameParam();
        $destinations = $this->buildDestinations();

        Mail::send('emails.new_contact_created', compact('contactName', 'creatorName'), function ($m) use($destinations) {
            $m->to($destinations)->subject('Nuevo contacto creado');
        });
        
        return Contact::full()->findOrFail($newContact->id);
    }

    private function buildContactNameParam($newContact) {
        return $newContact->firstname . ' ' . $newContact->lastname;
    }

    private function buildCreatorNameParam() {
        $user = JWTAuth::parseToken()->authenticate();
        return $user->firstname . ' ' . $user->lastname;
    }

    private function buildDestinations() {
        $admins = User::where('role', 1000)->get(array('email'));
        $destinations = array();
        foreach ($admins as $user) {
            $destinations[] = $user->email;
        }

        return $destinations;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $data = $this->processRequestData();
        
        $newInterests = $data['interests'];
        unset($data['interests']);
        $newResponsibles = $data['responsibles'];
        unset($data['responsibles']);
        
        $contact = new Contact();
        $contact->fill($data);
        $contact->exists =  true;
        $contact->save();

        $this->saveInterests($contact, $newInterests);
        $this->saveResponsibles($contact, $newResponsibles);

        return Contact::full()->findOrFail($id);
    }

    private function processRequestData() {
        $input = Request::all();
        $data = $this->translatePropertiesObjectToID($input);
        $data['interests'] = null;
        $data['responsibles'] = null;

        $group_area = $this->getGroupArea($data);
        if ($group_area) {
            $data['id_profile'] = $group_area->profile->id;
            $data['interests'] = $group_area->interests;
        }

        if (array_key_exists('responsibles', $input)) {
            $ids = array();
            foreach ($input['responsibles'] as $user) {
                $ids[] = $user['id'];
            }
            $data['responsibles'] = $ids;
        }

        $linkedinProfile = $this->completeURL($data, 'linkedin_profile');
        if (!empty($linkedinProfile)) {
            $data['linkedin_profile'] = $linkedinProfile;
        }

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

    private function saveResponsibles($contact, $responsibles) {
        if ($responsibles && !empty($responsibles)) {
            $users = User::whereIn('id', $responsibles)->get();
            $contact->responsibles()->sync($users);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        Contact::destroy($id);
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
        $id_responsible = $this->getIdResponsible($p);
        $contactList = Contact::full()->hasResponsible($id_responsible)->get();
        $completeness = 0;

        if (!$contactList->isEmpty()) {
            $propertyWeights = PropertyWeight::all();
            $accum = 0;

            foreach ($contactList as $contact) {
                foreach ($propertyWeights as $prop) {
                    $accum += $contact->{$prop->name} ? $prop->weight : 0;
                }
            }

            $completeness = round($accum / $contactList->count());
        }

        return '{"value":' . $completeness . '}';
    }

    private function getIdResponsible($params) {
        return array_key_exists('id_responsible', $params) ? $params['id_responsible'] : null;
    }

    public function export() {
        
        Excel::create('contactos', function($excel) {
            $excel->setTitle('Lista de contactos');
            $excel->sheet('Contactos', function($sheet) {
                $p = Request::all();
                unset($p['token']);

                $contacts = Contact::full()->select(DB::raw('*, TRIM(lastname) lastname_trimmed'))
                    ->where($p)
                    ->orderBy('lastname_trimmed')
                    ->get();
                $contactsFlat = array();

                foreach($contacts as $c) {
                    $data = array($this->getDesc($c->honorific), $c->lastname, $c->firstname, $c->email, $c->skype,
                        $c->linkedin_profile, $c->consolidated_code, $c->sap_code, $c->ten_digits_code,
                        $c->position, $c->company_area, $c->company_name, $c->career,
                        $c->phone, $c->street, $c->city, $c->postal_code, $c->region, $this->getDesc($c->country, 'name'),
                        $this->transBool($c->action), $this->transBool($c->christmas_cards), 
                        $this->transBool($c->christmas_presents), $this->transBool($c->newsletter), 
                        $this->transBool($c->bulletinFNC),
                        $this->getDesc($c->market, 'name'), $this->getDesc($c->contact_type), $this->getDesc($c->group_area), 
                        $this->getDesc($c->profile), $this->getDesc($c->education_level), $this->getDesc($c->size), 
                        $this->getDesc($c->gender), $this->getDesc($c->age_range), $this->getDesc($c->business_origin), 
                        $this->getDesc($c->language), $this->getDesc($c->customer_since),
                        $this->getDesc($c->segmentation_ABC), $this->getDesc($c->segmentation_client_type), 
                        $this->getDesc($c->segmentation_product_type), $this->getDesc($c->segmentation_potential), 
                        $this->getDesc($c->segmentation_FNC_relation), 
                        $this->getResponsibles($c), $this->getEMailResponsibles($c));

                    array_push($contactsFlat, $data);
                }

                //set the titles
                $sheet->fromArray($contactsFlat, null, 'A1', false, false)->prependRow(array(
                    'Título', 'Apellido', 'Nombre', 'e-mail', 'Skype',
                    'Linked-In', 'Código consolidado', 'Código SAP', 'Código 10 digitos',
                    'Cargo', 'Área', 'Empresa', 'Profesión', 'Teléfono oficina', 
                    'Calle', 'Ciudad', 'Código Postal', 'Región / Estado', 'País', 
                    'Nos interesa realizar alguna acción', 'Tarjetas de Navidad', 
                    'Regalos de Navidad', 'Newsletter', 'Boletín FNC', 
                    'Mercado', 'Tipo de socio', 'Area Agrupada', 
                    'Perfil', 'Nivel Educación', 'Talla', 
                    'Sexo', 'Rango de edad', 'De dónde proviene el negocio', 
                    'Idioma', 'Desde cuándo es cliente', 
                    'Segmentación ABC', 'Segmentación Tipo Cliente', 
                    'Segmentación Tipo Producto', 'Segmentación Potencial a futuro', 
                    'Segmentación Relacion FNC', 
                    'Responsables', 'e-mail responsables',
                ));

                $sheet->cells('A1:AP1', function($cells) {
                    $cells->setFontWeight('bold');
                    $cells->setBackground('#CCCCCC');
                });
            });


        })->export('xlsx'); 
    }

    private function transBool($value) {
        return $value ? 'Si' : 'No';
    }

    private function getDesc($obj, $prop = 'description') {
        return is_null($obj) ? '' : $obj->{$prop};
    }

    private function getResponsibles($contact) {
        if (is_null($contact) || $contact->responsibles->isEmpty()) {
            return '';
        }

        $text = '';
        $glue = ' - ';

        foreach ($contact->responsibles as $resp) {
            $text .= $resp->lastname . ' ' . $resp->firstname . $glue;
        }

        return rtrim($text, $glue);
    }

    private function getEMailResponsibles($contact) {
        if (is_null($contact) || $contact->responsibles->isEmpty()) {
            return '';
        }

        $text = '';
        $glue = ', ';

        foreach ($contact->responsibles as $resp) {
            $text .= $resp->email . $glue;
        }

        return rtrim($text, $glue);
    }
}
