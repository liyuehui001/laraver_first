<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PortNameIdConnModel;

class GetDataFromNetController extends Controller
{
    //
    public function getDataFromNet(Request $request){
    	$portname = $request->portname;

        $port = PortNameIdConnModel::where('port_name',$portname)->first();
        $portid = $port['id'];

    	$date = $request->date;
    	$output = shell_exec('python3 /Users/black/Documents/laravel_file/firstdemo/app/getDataFromNet.py '.$portid.' '.$date);
    	// var_dump($_SERVER["DOCUMENT_ROOT"]);
    	// $jsonObject = json_decode($output,true);
    	$stroutput = str_replace('\'', '"', $output);
    	$result = json_decode($stroutput,false)[0];
        // $result['resultCode']='1';
        // $result['message']='success';
        $resultfinal['data'] = $result;
        $resultfinal['resultCode']='1';
        $resultfinal['message']='success';
        // return $result;
    	return json_encode($resultfinal);
    }


    public function getdatafrombaidu(Request $request){
        $address = $request->address;
        $output = shell_exec('python3 /Users/black/Documents/laravel_file/firstdemo/app/getDataJingWeiDu.py '.$address);
        // $stroutput = str_replace('\'', '"', $output);
        // $result = json_decode($output,false);
        $resulttemp['pointy'] = $output;
        $resultfinal['resultCode'] = '1';
        $resultfinal['message'] = 'success';
        $resultfinal['data'] = $resulttemp;
        return json_encode($resultfinal);
    }
}
