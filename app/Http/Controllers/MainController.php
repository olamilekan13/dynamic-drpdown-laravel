<?php

namespace App\Http\Controllers;
// use Illuminate\Support\Facades\ ;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;
use App\Models\City;




// use App\Country;
// use App\State;
// use App\City;

class MainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
    	$countries = Country::all()->pluck('country_name','id');
    	return view('welcome',compact('countries'));
    }

    public function getStates($id){
    	$states= State::where('country_id',$id)->pluck('state_name','id');
        return json_encode($states);
    }

    public function getCities($id){
    	$cities= City::where('state_id',$id)->pluck('city_name','id');
        return json_encode($cities);
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
