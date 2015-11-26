<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Contact;
use App\PropertyWeight;

class ContactsController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

        //TODO: refactor code. Move relations into scope for Model.- jarias

        //FIXME: do not retrieve all the relations for list. Only get all data when editing.- jarias

        return Contact::with('country')
            ->with('region')
            ->with('contact_type')
            ->with('group_area')
            ->with('market')
            ->with('education_level')
            ->with('gender')
            ->with('size')
            ->with('age_range')
            ->with('segmentation_ABC')
            ->with('segmentation_client_type')
            ->with('segmentation_FNC_relation')
            ->with('segmentation_potential')
            ->with('segmentation_product_type')
            ->take(2)
            ->get();
    }

    public function propertyWeights() {
        return PropertyWeight::all();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        return Contact::with('country')
            ->with('region')
            ->with('contact_type')
            ->with('group_area')
            ->with('market')
            ->with('segmentation_ABC')
            ->with('segmentation_client_type')
            ->with('segmentation_FNC_relation')
            ->with('segmentation_potential')
            ->with('segmentation_product_type')
            ->findOrFail($id);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        //
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
