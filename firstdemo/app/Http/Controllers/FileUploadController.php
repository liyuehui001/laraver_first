<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use App\CircleImageModel;
use DB;

class FileUploadController extends Controller
{
    //
    // 文件上传方法
    public function myupload(Request $request){

        $result = array();
        $insertData = array();
        $circle_id = $request->circle_id;
        $files = $request->file('upload');
        for ($i=0; $i < count($files); $i++) { 
            
            $path = Storage::putFile('public/uploads', $files[$i]);
            $url = Storage::url($path);//将url存储到数据库中；
            $temp['imageurl'] = $url;
            $temp['circle_id'] = $circle_id;
            $insertData[] = $temp;
            
        }
        $result['请求额数据'] =   $request;
        
        if(DB::table('circle_image')->insert($insertData)){
            $result['resultCode'] = '1';
            $result['message'] = "插入成功";
            return json_encode($result);
        }else{
            $result['resultCode'] = '0';
            $result['message'] = "插入失败";
            return json_encode($result);
        }
    }
}
