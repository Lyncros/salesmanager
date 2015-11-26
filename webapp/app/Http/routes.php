<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('index');
});

// A route group allows us to have a prefix, in this case api
Route::group(array('prefix' => 'api'), function() {

    Route::resource('contacts', 'ContactsController');
    Route::resource('countries', 'CountriesController');
    Route::resource('contactTypes', 'ContactTypeController');
    Route::resource('groupAreas', 'GroupAreaController');
    Route::resource('markets', 'MarketsController');
    Route::resource('segmentationsABC', 'SegmentationsABCController');
    Route::resource('segmentationsClientType', 'SegmentationsClientTypeController');
    Route::resource('segmentationsProductType', 'SegmentationsProductTypeController');
    Route::resource('segmentationsFNCRelation', 'SegmentationsFNCRelationController');
    Route::resource('segmentationsPotential', 'SegmentationsPotentialController');
    Route::resource('educationLevels', 'EducationLevelsController');
    Route::resource('genders', 'GendersController');
    Route::resource('sizes', 'SizesController');
    Route::resource('ageRanges', 'AgeRangesController');
    Route::get('propertyWeights', 'ContactsController@propertyWeights');

});
