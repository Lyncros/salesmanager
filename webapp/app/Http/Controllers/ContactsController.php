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
        return PropertyWeight::orderBy('weight', 'DESC')->get();
    }
    
    /**
     * Display a listing of contacts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $with = array('contact_type', 'group_area');
        return Contact::with($with)->get(array('id', 'firstname', 'lastname', 'company_name', 'id_contact_type', 'id_group_area'));
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
            'country', 'contact_type', 'group_area', 'market', 'gender', 'interests.interest',
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
        $data['linkedin_profile'] = $this->completeURL($data, 'linkedin_profile');
        
        return Contact::create($data);
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
        $data['linkedin_profile'] = $this->completeURL($data, 'linkedin_profile');

        $contact = new Contact();
        $contact->fill($data);
        $contact->exists =  true;
        $contact->save();

        return $contact;
    }

    private function translatePropertiesObjectToID($input) {
        $complexEntities = ['market', 'country', 'gender', 'contact_type', 'education_level', 'size', 'age_range',
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
        unset($input['interests']);

        return $input;
    }

    private function completeURL($data, $field) {
        if (isset($data[$field]) && substr($data[$field], 0, 4) !== 'http') {
            return 'http://' . $data[$field];
        } else {
            return '';
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
}
