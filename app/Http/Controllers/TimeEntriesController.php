<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TimeEntriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return '[
                    {
                      "id":1,
                      "user_id":1,
                      "user_firstname":"Jota",
                      "user_lastname":"Arias",
                      "start_time":"2015-02-21T18:56:48Z",
                      "end_time":"2015-02-21T20:33:10Z",
                      "comment": "Initial project setup."
                    },
                    {
                      "id":2,
                      "user_id":1,
                      "user_firstname":"Jota",
                      "user_lastname":"Arias",
                      "start_time":"2015-02-27T10:22:42Z",
                      "end_time":"2015-02-27T14:08:10Z",
                      "comment": "Review of project requirements and notes for getting started."
                    },
                    {
                      "id":3,
                      "user_id":1,
                      "user_firstname":"Jota",
                      "user_lastname":"Arias",
                      "start_time":"2015-03-03T09:55:32Z",
                      "end_time":"2015-03-03T12:07:09Z",
                      "comment": "Front-end and backend setup."
                    }
                ]';
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
