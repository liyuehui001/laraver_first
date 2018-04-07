<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GetDataFromNetController extends Controller
{
    //
    public function getDataFromNet(Request $request){
    	$portid = $request->portid;
    	$date = $request->date;
    	$output = shell_exec('python3 /Users/black/Documents/laravel_file/firstdemo/app/getDataFromNet.py '.$portid.' '.$date);
    	// var_dump($_SERVER["DOCUMENT_ROOT"]);
    	// $jsonObject = json_decode($output,true);
    	$stroutput = str_replace('\'', '"', $output);
    	$result = json_encode(json_decode($stroutput,false));

    	return $result;
    }
}
