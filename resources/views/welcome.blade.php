<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>TAMO</title>
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/react-notifications.css') }}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
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
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            notification-container {
                box-sizing: border-box;
                position: fixed;
                top: 0;
                right: 0;
                z-index: 999999;
                width: 320px;
                padding: 0px 15px;
                max-height: calc(100% - 30px);
                overflow-x: hidden;
                overflow-y: auto;

            }

            .notification {
                box-sizing: border-box;
                padding: 15px 15px 15px 58px;
                border-radius: 2px;
                color: #fff;
                background-color: #ccc;
                box-shadow: 0 0 12px #999;
                cursor: pointer;
                font-size: 1em;
                line-height: 1.2em;
                position: relative;
                opacity: 0.9;
                margin-top: 15px;
            }

            .notification .title {
                font-size: 1em;
                line-height: 1.2em;
                font-weight: bold;
                margin: 0 0 5px 0;
            }

            .notification:hover, .notification:focus {
                opacity: 1;
            }

            .notification-enter {
                visibility: hidden;
                transform: translate3d(100%, 0, 0);
            }

            .notification-enter.notification-enter-active {
                visibility: visible;
                transform: translate3d(0, 0, 0);
                transition: all 0.4s;
            }

            .notification-leave {
                visibility: visible;
                transform: translate3d(0, 0, 0);
            }

            .notification-leave.notification-leave-active {
                visibility: hidden;
                transform: translate3d(100%, 0, 0);
                transition: all 0.4s;
            }

            .notification:before {
                position: absolute;
                top: 50%;
                left: 15px;
                margin-top: -14px;
                display: block;
                font-family: 'Notification';
                width: 28px;
                height: 28px;
                font-size: 28px;
                text-align: center;
                line-height: 28px;
            }



            .notification-success {
                background-color: #51a351;
                color: #fcfffa;
            }

            .notification-success:before {
                content: "√";
            }


        </style>
    </head>
    <body>
    <div class="notification-container " >
        @if (session()->has('success'))
            <div class="notification-success" >
                {{ session('success') }}
            </div>

        @endif
    </div>

        <div class="flex-center position-ref full-height">


            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/start') }}">Pradžia</a>
                    @else
                        <a href="{{ route('login') }}">Jungtis</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    TAMO
                </div>
                <div class="links">
                    © Eugenijus Černiauskas
                </div>


            </div>
        </div>
       
<script>
        var  timer = 5;


        var myVar = setInterval(function() {
            --timer;
            if (timer < 0) {
                clearInterval(myVar);
                window.location = "/start";
            }
        }, 100);
</script>


  
    </body>
    





</html>
