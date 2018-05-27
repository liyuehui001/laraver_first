<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Users;

class UserController extends Controller
{
    //用户控制器
    public function register(Request $request){
    	//获取前台传过来的注册的用户数据
    	$method = $request->method(); // GET/POST
    	$name = $request->input('name');
        $password = $request->input('password');
        $ip = $request->input('ip');

        $user = new Users;
        $user->name = "name";
        $user->password = "password";
        $user->ip = "178.123.32.43";

        $user->save();

		
    	return 'method-'.$method.'--name---'.$name;
    }

    public function login(Request $request){
        $name = $request->input('name');
        $password = $request->input('password');
        $result = Users::where('name',$name)->where('password',$password)->first();
        if ($result == null) {
            $arr = array();
            $arr['resultCode'] = "0";
            $arr['message'] = '没有这个用户';
            return json_encode($arr);
        }else{
            $result['resultCode'] = '1';
            $result['message'] = "有这个用户";
            return json_encode($result);
        }
        

    }
}
