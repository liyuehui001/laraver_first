<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\StateModel;
use App\CountryModel;
use App\PortModel;
use App\ProvinceModel;

class GetListController extends Controller
{
    //
    public function getStateList(){
    	return json_encode(StateModel::all());
    }

    public function getCountryList($name){

    	$country = CountryModel::where('state_name',$name)->get();
    	return json_encode($country);
    }

    public function getProvinceList(){
    	$province = ProvinceModel::get();
    	return json_encode($province);
    }

	public function getPortByProvince($cityName){
    	$portlist = ProvinceModel::where('city_name',$cityName)->get();
    	return json_encode($portlist);
    }

    public function getPortList($stateName,$countryName){
    	$port = PortModel::where('state_name',$stateName)->where('country_name',$countryName)->get();
    	return json_encode($port);
    }


}
