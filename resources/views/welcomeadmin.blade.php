<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/iziToast.css') }}">
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/iziToast.min.css') }}">

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
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            {{-- @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif --}}

            <div class="content" style="margin-top: 7%;">
                <h2 style="color: #3b4d57;">Hello Admin</h2>
                <img src="{{asset('img/welcomelogin-01.png')}}" style="width: 400px;">
                <div class="row justify-content-center" style="margin-top: -20px;">
                    <div class="col-md-4">
                        <a class="btn btn-block" href="{{ route('login') }}" role="button" style="background-color: #daeada; color: #3b4d57; font-weight: bold;">Login</a>
                    </div>
                    <div class="col-md-4">
                        <a class="btn btn-block" href="{{ route('register') }}" role="button" style="background-color: #daeada; color: #3b4d57; font-weight: bold;">Register</a>
                    </div>
                </div>
            </div>
        </div>

        <script src="{{ asset('assets/js/core/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/iziToast.js') }}"></script>
        <script src="{{ asset('assets/js/iziToast.min.js') }}"></script>

        <script type="text/javascript">
            @if ($message = Session::get('Maaf'))
                iziToast.warning({
                            title: 'Maaf',
                            message: 'Akun sudah tidak aktif',
                            position: 'topRight'
                        });
            @elseif ($message = Session::get('Aduh'))
                iziToast.warning({
                            title: 'Maaf',
                            message: 'Email / Password salah',
                            position: 'topRight'
                        });
            @endif
        </script>

    </body>
</html>
