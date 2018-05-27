<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CircleFriendModel;


class CircleFriendController extends Controller
{
    //
    public function addFriendCricle(Request $request){
        $circleFriend = new CircleFriendModel();
        $circleFriend->userid = $request->userid;
        $circleFriend->time = date('Y-m-d H:i:s');
        $circleFriend->content = $request->content;
        $circleFriend->type = $request->type;//0-->只有文字 1-->有文字加图片
        $circleFriend->circle_type_id = $request->circle_type_id;
        if($circleFriend->save()){
            $result['resultCode'] = 1;
            $result['message']='发表成功';
            $result['circleFriendId'] = $circleFriend->id;
        }else{
            $result['resultCode'] = 0;
            $result['message']='发表失败';
        }
        echo json_encode($result);

    }
}
