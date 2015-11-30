<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;

use App\Contact;
use App\PropertyWeight;

class ContactsController extends Controller {

    /**
     *
     */
    public function propertyWeights() {
        return PropertyWeight::all();
    }
    
    /**
     * Display a listing of contacts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $with = array('contact_type', 'group_area');
        return Contact::with($with)->get(array('id', 'firstname', 'lastname', 'company', 'id_contact_type', 'id_group_area'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //TODO: refactor code. Move relations into laravel 'scope' (inside Model).- jarias
        $with = array(
            'country', 'region', 'contact_type', 'group_area', 'market', 'gender',
            'segmentation_ABC', 'segmentation_client_type', 'segmentation_FNC_relation', 
            'segmentation_potential', 'segmentation_product_type'
        );

        return Contact::with($with)->findOrFail($id);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $input = Request::all();
        $data = $this->translatePropertiesObjectToID($input);

        if (Contact::create($data)) {
            return 'true';
        } else {
            return 'false';
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $input = Request::all();
        $data = $this->translatePropertiesObjectToID($input);
        $contact = new Contact();
        $contact->fill($data);
        $contact->exists =  true;
        if ($contact->save()) {
            return 'true';
        } else {
            return 'false';
        }
    }

    private function translatePropertiesObjectToID($input) {
        $complexEntities = ['market', 'country', 'region', 'gender', 'contact_type', 'education_level', 'size', 'age_range',
            'group_area', 'segmentation_ABC', 'segmentation_potential', 'segmentation_FNC_relation', 'segmentation_client_type', 
            'segmentation_product_type', ];
        
        foreach ($complexEntities as $entityName) {
            if (array_key_exists($entityName, $input)) {
                $input["id_$entityName"] = $input[$entityName]['id'];
                unset($input[$entityName]);
            }
        }

        unset($input['segmentation__a_b_c']);
        unset($input['segmentation__f_n_c_relation']);

        return $input;
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
}
