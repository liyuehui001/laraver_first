<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Raleway', sans-serif;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>
                        <a href="{{ route('register') }}">Register</a>
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>
                <div>
                    <form method='post' action='http://127.0.0.1:8000/registerxs'>
                        <input name="name" type='text' />
                        <input value="提交" type='submit'/>
                    </form>

                    <form method='post' action='http://127.0.0.1:8000/save_record'>
                        <input name="userid" type='text' />
                        <input name="ip" type='text' />
                        <input name="portname" type='text' />
                        <input name="seatchDate" type='text' />
                        <input value="提交" type='submit'/>
                    </form>
                    <form method='post' action='http://192.168.2.1:8000/login'>
                        <input name="name" type='text' />
                        <input name="password" type='text' />
                        <input value="提交" type='submit'/>
                    </form>
                    <form method='post' action='http://192.168.2.1:8000/getOutPortList'>
                        <input value="提交" type='submit'/>
                    </form>

                    <form method='post' action='http://192.168.2.1:8000/getPortByProvince'>
                        <input value="提交" type='submit'/>
                    </form>
                    <!-- http://192.168.2.1:8000/getDataFromChinaHaishiNet/%E4%B8%B9%E4%B8%9C/2018-04-17 -->
                    <form method='post' action='http://10.240.50.232:8000/getDataFromChinaHaishiNet'>
                        <input name="portname" type='text' />
                        <input name="date" type='text' />
                        <input value="提交" type='submit'/>
                    </form>
                    <form method='post' action='http://10.240.50.232:8000/getDateFromJingWeiDu'>
                        <input name="address" type='text' />
                        <input value="提交经纬度" type='submit'/>
                    </form>

                    <form method='post' action='http://172.20.10.5:8000/getCircleTypeList'>
                        <input value="提交" type='submit'/>
                    </form>

                    <form method='post' action='http://localhost:8000/uploadMuliFile' enctype="multipart/form-data">
                        <input type="text" name="circle_id"/> <br/>
                        <input type='file' multiple="multiple" name="upload[]"/>
                        <input value="上传文件" type='submit'/>
                    </form>

                    <form method='post' action='http://localhost:8000/addCircleFriendItem' enctype="multipart/form-data">
                        <input type="text" name="userid"/> <br/>
                        <input type="text" name="content"/> <br/>
                        type: </type:><input type="text" name="type"/> <br/>
                        <input type="text" name="circle_type_id"/> <br/>
                        <input value="上传文件" type='submit'/>
                    </form>
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Documentation</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html>
