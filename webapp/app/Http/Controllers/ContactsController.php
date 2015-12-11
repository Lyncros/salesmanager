<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Request;

use App\Contact;
use App\PropertyWeight;
use App\GroupArea;
use App\ContactInterest;

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
        return Contact::full($id);
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
        
        return Contact::full($newContact->id);
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

        return Contact::full($contact->id);
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
}
