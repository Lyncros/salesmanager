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

    Route::post('login', 'AuthenticateController@login');
    Route::get('propertyWeights', 'ContactsController@propertyWeights');
    
    $params = [ 'except' => ['edit', 'create'] ];
    Route::resource('contacts', 'ContactsController', $params);
    Route::resource('countries', 'CountriesController', $params);
    Route::resource('contactTypes', 'ContactTypeController', $params);
    Route::resource('groupAreas', 'GroupAreaController', $params);
    Route::resource('markets', 'MarketsController', $params);
    Route::resource('segmentationsABC', 'SegmentationsABCController', $params);
    Route::resource('segmentationsClientType', 'SegmentationsClientTypeController', $params);
    Route::resource('segmentationsProductType', 'SegmentationsProductTypeController', $params);
    Route::resource('segmentationsFNCRelation', 'SegmentationsFNCRelationController', $params);
    Route::resource('segmentationsPotential', 'SegmentationsPotentialController', $params);
    Route::resource('educationLevels', 'EducationLevelsController', $params);
    Route::resource('genders', 'GendersController', $params);
    Route::resource('sizes', 'SizesController', $params);
    Route::resource('ageRanges', 'AgeRangesController', $params);
    Route::resource('honorifics', 'HonorificsController', $params);
    Route::resource('languages', 'LanguagesController', $params);
    Route::resource('businessOrigins', 'BusinessOriginsController', $params);
    Route::resource('customerSince', 'CustomerSinceController', $params);

});
