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
                <img src="{{asset('img/help-01.png')}}" style="width: 500px;">
                <div>
                    <a class="btn"  href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();" style="width: 150px; background-color: #6ad0cc; color: #000;">
                        {{ __('Oke') }}
                    </a>
        
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>
