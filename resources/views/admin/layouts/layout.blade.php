<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>TAMO Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/admin/css/admin.css') }}">

    <style>
      a.buttonas {
        position: relative;
      }
      .buttonas::before{
        content: attr(data-count);
        position: absolute;
        top: -1.2em;
        right: -1.1em;
        width: 2.2em;
        height: 2.2em;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius:50%;
        background-color: red;
        color:white;
      }
      input::placeholder {
        color: #0275d8;
        font-size: 0.8rem;
        opacity: 0.8;
}
    .klaus[title]:hover::after {
    content: attr(title);
    font-size: 18px;
  }
  .klaus{
    white-space: nowrap; 
    width:200px;  
    overflow: hidden; 
    text-overflow: ellipsis; 
  }
    </style>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
    <!-- Navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-white-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{ url('/start') }}" target="_blank" class="brand-link">
            <img src="{{ asset('../storage/logo.svg') }}"
                 alt="Admin TAMO"
                 class="brand-image img-circle elevation-3"
                 style="opacity: .8">
        </a>

   
    <!-- Sidebar -->

    <nav class="mt-5">
    
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item mt-5">
            <a href="/start" class="nav-link">
              <i class="nav-icon fas fa-home"></i>
              <p>
                Pagrindinis puslapis
   
              </p>
            </a>
          </li>


          <li class="nav-item mt-1">
            <a href="/admin/klausimai" class="nav-link">
              <i class="nav-icon fas fa-question-circle"></i>
              <p>
                Klausimai
   
              </p>
            </a>
          </li>
          
          <li class="nav-item mt-1">
            <a href="/admin/kontaktai" class="nav-link">
              <i class="nav-icon fas fa-envelope"></i>
              <p>
                Užduodami klausimai
   
              </p>
            </a>
          </li>
          <li class="nav-item mt-1">
            <a href="/admin/useriai" class="nav-link">
              <i class="nav-icon fas fa-users"></i>
              <p>
                Vartotojai
   
              </p>
            </a>
          </li>

          <!-- <li class="nav-item mt-1">
            <a href="/register" class="nav-link">
              <i class="nav-icon fas fa-user-plus"></i>
              <p>
                Naujas vartotojas
   
              </p>
            </a>
          </li> -->

          <li class="nav-item mt-1">
            <a href="/admin/testai" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Testai
   
              </p>
            </a>
          </li>

          <li class="nav-item mt-5 px-3 ">
            <a href="{{ route('logout') }}" class="btn btn-block btn-primary btn-lg px-2">   
              <i class="nav-icon fas fa-sign-out-alt"></i>
              
                Išeiti
              
            </a>
          </li>

        </ul>

     

</nav>





    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wraper">
        <div class="container mt-2">
          <div class="row">
            <div class="col-12">
            @if ($errors->any())
              <div class="alert alert-danger">
                  <ul class="list-unstyled">
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
            @endif

            @if (session()->has('success'))
              <div class="alert alert-success">
                  {{ session('success') }}
              </div>
            @endif
            </div>
          </div>
        </div>
        @yield('content')
    </div>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
        <div class="float-right d-none d-sm-block">
            <b>Version</b> 1.2
        </div>
        <strong>Copyright &copy; 2021-2023 <a href="http://www.vta.lt">E.Černiauskas</a>.</strong> All rights
        reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<script>
    // $('.nav-sidebar a').each(function(){
    //     let location = window.location.protocol + '//' + window.location.host + window.location.pathname;
    //     let link = this.href;
    //     if(link == location){
    //         $(this).addClass('active');
    //         $(this).closest('.has-treeview').addClass('menu-open');
    //     }
    // });
    "use strict";
    document.addEventListener("DOMContentLoaded", function () {
      if (document.querySelector("div.alert")){
        const pranesimas=document.querySelector("div.alert");
        setTimeout(function(){
          pranesimas.remove();
        }, 2000 ); // 5 secs
    }

});
</script>
<!-- <script src=" ./plugins/pdfmake/pdfmake.min.js"></script> -->

</body>
</html>
