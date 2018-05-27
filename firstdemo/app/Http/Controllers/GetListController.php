<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
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
        $result = array();
        $citys = ProvinceModel::get(['name']);
        return json_encode($citys);
        
    }

	public function getPortByProvince(){
    	$result = array();
        $city_all = array();
        $citys = ProvinceModel::distinct('city_name')->get(['city_name']);
        foreach ($citys as $key => $value) {
            $city_temp['city'] = $value['city_name'];

            $port = ProvinceModel::where('city_name',$value['city_name'])->get();
            $port_all = array();
            foreach ($port as $key1 => $value2) {
                $port_all[] = $value2['port_name'];
            }
            $city_temp['ports'] = $port_all;
            $city_all[] = $city_temp;
        }
        $result['resultCode']='1';
        $result['message']='success';
        $result['citys'] = $city_all;

        return json_encode($result);
    }

    public function getPortList(){
        $result = array();
        $state = array();
    	$state = StateModel::all(['name']);
        $state_all = array();
        foreach($state as $key => $state_one) {

            $state_temp['name'] = $state_one['name'];

            $country_instate = CountryModel::where('state_name',$state_one['name'])->get(['name']);

            $country_all = array();
            foreach ($country_instate as $key1 => $country_one) {
                $port_incountry = PortModel::where('country_name',$country_one['name'])->get(['name']);
                $country_temp['name'] = $country_one['name'];

                $country_temp['port'] = array();
                $ports = array();

                foreach ($port_incountry as $key2 => $port_one) {
                    $country_temp['port'][] = $port_one['name'];
                }

                
                $country_all[] = $country_temp;
                $state_temp['country'] = $country_all;
            }
            
            $state_all[] = $state_temp;
        }  
        $result['state'] = $state_all;
            
        $result['resultCode'] = "1";
        $result['message'] = 'success';

        return json_encode($result);
    }

    public function uploadFile(){
        $file = Input::file('demo');
        $path = $file -> move('storage/uploads');


    }


}
