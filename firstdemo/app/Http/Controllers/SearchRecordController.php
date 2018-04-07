<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SearchRecordModel;

class SearchRecordController extends Controller
{
    //
    public function storeRecord(Request $request){
        $model = new SearchRecordModel;
    	$model->userid = $request->userid;
    	$model->ip = $request->ip;
    	$model->port_name = $request->portname;
    	$model->search_date = $request->seatchDate;
    	$model->search_time = date('Y-m-d H:i:s');
        $resule = $model->save();
        if ($resule) {
            return "success";
        }else{
            return 'fail';
        }

    }
    public function getRecordList(Request $request){
        $userid = $request->userid;
        $result = SearchRecordModel::where('userid',$userid)->get();
        return json_encode($result);
    }
}
