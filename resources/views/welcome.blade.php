<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

        <!-- Styles -->
        <style>
            /* html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            } */

            /* .full-height {
                height: 100vh;
            } */

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
                margin: 0;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .card {
                -webkit-box-shadow: 4px 4px 13px -5px rgba(0,0,0,0.47);
                -moz-box-shadow: 4px 4px 13px -5px rgba(0,0,0,0.47);
                box-shadow: 4px 4px 13px -5px rgba(0,0,0,0.47);
                border-radius: 20px;
                border-color: #eeee;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content" style="margin-top: 1%;">
                <div class="container">
                    <div class="row justify-content-around">
                        <div class="col-4">
                            <div class="row" style="margin-top: 45%; position: absolute; left: 0; right: 0;">
                                <div class="col-md-6">
                                    <a href="{{ url('/home') }}" style="text-decoration: none;">
                                    <div class="card">
                                        <div class="card-body">
                                            <img src="{{asset('img/usaha-desa-01.png')}}" style="width: 60px;">
                                            <h6 style="color: #3b4d57; margin-top: 10px;">Usaha Desa</h6>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <a href="{{ url('/home') }}" style="text-decoration: none;">
                                    <div class="card">
                                        <div class="card-body">
                                            <img src="{{asset('img/utama-01.png')}}" style="width: 60px;">
                                            <h6 style="color: #3b4d57; margin-top: 10px;">Website Desa</h6>
                                        </div>
                                    </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-5">
                            <h1 style="margin-top: 35%; position: absolute; left: 0; right: 0; color: #3b4d57;">SMART VILLAGE SYSTEM</h1>
                            <h3 style="margin-top: 45%; position: absolute; left: 0; right: 0; color: #3b4d57;">DESA KEBANDINGAN</h3>
                        </div>
                    </div>
                </div>
                <img src="{{asset('img/Background-smart-village.png')}}" style="width: 100%; height: 100vh;">
            </div>
        </div>
    </body>
</html>
