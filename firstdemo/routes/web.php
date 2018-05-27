<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
//登录，
Route::post('/login','UserController@login');
//注册
Route::post('/register','UserController@register');

Route::get('/getStateList','GetListController@getStateList');


Route::post('/getOutPortList','GetListController@getPortList');

Route::post('/getPortByProvince','GetListController@getPortByProvince');

Route::post('/upload','GetListController@uploadFile');

//1，获取洲，国家，城市，港口列表。
/*
/getStateList
/getCountryList?state=stateName
/getProvinceList  只有是亚洲，并且是中国的时候才有省份
/getPortList?countryName=""  根据国家名字获取港口
/getPortList?ProvinceName="" 根据中国省份获取港口
*/

Route::post('/save_record','SearchRecordController@storeRecord');

//2，根据港口以及日期返回潮汐数据列表，判断用户是否登录，若登录则，将数据记录到历史记录的表中

//3. 用户查询时 。获取历史记录列表
Route::get('/get_record_list/{userid}','SearchRecordController@getRecordList');

//4, 根据用户的请求返回相应的潮汐数据
Route::post('/getDataFromChinaHaishiNet','GetDataFromNetController@getDataFromNet');
Route::post('/getDateFromJingWeiDu','GetDataFromNetController@getdatafrombaidu');

Route::get('hello',function(){
	return "hello laravel";
});

Route::get('user0/{id}', function ($id) { 
	return 'User ' . $id;
});//必选参数

Route::get('posts/{post}/comments/{comment}', function ($postId, $commentId) { 
	return $postId . '-' . $commentId;
});//可以定义多个参数/posts/2/comments/4,必选参数

//有必选参数就有可选参数，这可以通过在参数名后加一个 ? 标记来实现，这种情况下需要给相应的变量指定默认值，当对应的路由参数为空时，使用 默认值:
Route::get('user1/{name?}', function ($name = 'liyuehui') { 
	return $name;
});

//可以通过路由实例上的where方法来约束路由参数的格式where方法接收参数名和一个正则表达式来定义该参数如何被约束:

Route::get('user2/{name}', function ($name) {
// $name 必须是字母且不能为空 
	return $name;
})->where('name', '[A-Za-z]+');

Route::get('user3/{id}', function ($name) {
// $name 必须是字母且不能为空 
	return $name;
})->where('id', '[0-9]+');


//新增朋友圈的路由
//1 获取所有的circle——type
Route::post('/getCircleTypeList','CircleTypeController@getCircleTypeList');

//2添加单个朋友圈数据
Route::post('/addCircleFriendItem','CircleFriendController@addFriendCricle');

//3上传多个文件
Route::post('/uploadMuliFile','FileUploadController@myupload');