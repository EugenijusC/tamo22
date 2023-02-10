<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>TAMO | Pamiršot slaptažodį?</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
   
    <link rel="stylesheet" href="{{ asset('assets/admin/css/admin.css') }}">
    {{--<link rel="stylesheet" type="text/css" href="{{ asset('assets/css/react-notifications.css') }}">--}}

    <style>
        .root {
            background: #a0a5af;
            background: linear-gradient(to bottom, #9babc0 0%, #727d95 80%);
            background-attachment: fixed;
            background-size: cover;
            position: relative;
            min-height: calc(100vh - 0px );
            margin: 0 auto;
            z-index: 1;
        }

        .root:before {
            content: '';
            position: fixed;
            background: url(https://raw.githubusercontent.com/yagoestevez/fcc-portfolio/master/src/Images/Stars.svg?sanitize=true);
            background-attachment: fixed;
            width: 100%;
            min-height: 100vh;
            z-index: -1;
            opacity: 0.7;
        }

        @keyframes stars-move-in {
            from {
                background-position-y: -100px;
            }
            to {
                opacity: 1;
                background-position-y: 0;
            }
        }

        .forest {
            position: absolute;
            bottom: 0px;
            left: 0;
            background: url(https://raw.githubusercontent.com/yagoestevez/fcc-portfolio/master/src/Images/Trees.svg?sanitize=true) bottom left repeat-x;
            background-size: cover;
            width: 100%;
            height: 80%;
            opacity: 0.7;
            border-bottom: 0px solid #181d23;
        }




        .container {
            width: fit-content;
            position: absolute;
            right: 0;
            top: 40%;
            left: 40%;
            opacity: 0;
            transform: translate(-50%, -50%);
            animation: text-fade-in 300ms 80ms forwards;
        }

        @keyframes text-fade-in {
            from {
                right: 0;
            }
            to {
                opacity: 1;
                right: 25%;
            }
        }







    </style>



</head>

<body>


<div class="root">

    <div class="forest"></div>

    <div class="container">






<div class="register-box">
    <div class="register-logo">
        <b>Sukurti slaptažodį</b>
    </div>

    <div class="card">
        <div class="card-body register-card-body">

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="list-unstyled">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @if(session()->has('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            @if (session('status') == 'passwords.sent')
                <div class="flex gap-3 rounded-md border border-green-500 bg-color-green  p-4 mb-6">
                    
                    <h3 class="text-sm font-medium text-green-800">Išsiųsta nuoruoda</h3>
                </div>
            @endif

            <form action="{{ route('password.request') }}" method="post">
                @csrf

                <div class="input-group mb-3">
                    <input type="email" value="{{ old('email') }}" name="email" class="form-control" autocomplete="off" required autofocus placeholder="jonas@pavyzdys.lt" />
                       


                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Slaptažodis">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="password" name="password_confirmation" class="form-control" placeholder="Pakartokite slaptažodį">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
              

                <div class="row">
                    <!-- /.col -->
                    <div class="offset-9">
                        <button type="submit" class="btn btn-primary btn-block">Saugoti</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.form-box -->
    </div><!-- /.card -->
</div>
<!-- /.register-box -->

    </div>
</div>

<script src="{{ asset('assets/admin/js/admin.js') }}"></script>
</body>
</html>


