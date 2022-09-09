<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>TAMO | Login Page</title>
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
            opacity: 0;
            animation: stars-move-in 1000ms 300ms forwards;
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
            opacity: 0;
            animation: forest-move-in 1000ms 500ms forwards;
            border-bottom: 0px solid #181d23;
        }

        @keyframes forest-move-in {
            from {
                background-position-y: 150%;
            }
            to {
                opacity: 1;
                background-position-y: 100%;
            }
        }

        .silhouette {
            position: absolute;
            bottom: 0;
            left: 0;
            background: url(../storage/car1.svg) bottom left no-repeat;
            width: 50%;
            height: 50%;
            opacity: 0;
            animation: silhouette-move-in 1000ms 800ms forwards;
        }


        @keyframes silhouette-move-in {
            from {
                background-position-x: 0;
            }
            to {
                opacity: 1;
                background-position-x: 50%;
            }
        }


        .container {
            width: fit-content;
            position: absolute;
            right: 0;
            top: 40%;
            left: 50%;
            opacity: 0;
            transform: translate(-50%, -50%);
            animation: text-fade-in 1000ms 800ms forwards;
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
    <div class="silhouette"></div>
    <div class="container">






<div class="register-box">
    <div class="register-logo">
        <b>Prisijunkite</b>
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


            <form action="{{ route('login') }}" method="post">
                @csrf

                <div class="input-group mb-3">
                    <input type="text" name="name" class="form-control" placeholder="Vardas" autocomplete="on">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-user"></span>
                        </div>
                    </div>
                </div>

                <div class="input-group mb-3">
                    <input type="password" name="password" class="form-control" placeholder="Slaptažodis" autocomplete="on">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <!-- /.col -->
                    <div class="col-4 offset-8">
                        <button type="submit" class="btn btn-primary btn-block">Jungtis</button>
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


