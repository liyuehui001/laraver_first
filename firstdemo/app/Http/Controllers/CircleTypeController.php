<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CircleTypeModel;

class CircleTypeController extends Controller
{
    //

    public function getCircleTypeList(){
        $result['resultCode'] = 1;
        $result['message']='成功';
        $result['data'] = CircleTypeModel::all();
        echo json_encode($result);
    }
}
