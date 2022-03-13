<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POS System</title>
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="{{ asset('/assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}"> 
</head>
<body class="bg-success">
        @auth
        <div class="d-flex" id="wrapper">
            <div class="border-end bg-white text-center" id="sidebar-wrapper">
                <div class="sidebar-heading bg-white"><img src="{{asset('/assets/img/logo.svg')}}" width="50" alt=""><span class="ml-3">Pharma</span></div>
                <div class="list-group list-group-flush">
                        <a class="btn btn-success btn-lg rounded-0 w-100 mt-1 mb-1 mr-0" href="{{ url('/' . $page='sale') }}">
                            <i class="ion-bag ml-5" style="float:left"></i>
                            Sale
                        </a>
                        <a class="btn btn-success btn-lg rounded-0 w-100 mt-1 mb-1 mr-0" href="{{ url('/' . $page='sellers') }}">
                            <i class="ion-clipboard ml-5" style="float:left"></i>
                            Sellers
                        </a>
                        <a class="btn btn-success btn-lg rounded-0 w-100 mt-1 mb-1 mr-0" href="{{ url('/' . $page='buy') }}">
                            <i class="ion-ios-cart ml-5" style="float:left"></i>
                            Buy
                        </a>
                        <a class="btn btn-success btn-lg rounded-0 w-100 mt-1 mb-1 mr-0" href="{{ url('/' . $page='expire') }}">
                            <i class="ion-ios-timer ml-5" style="float:left"></i>
                            Expire
                        </a>
                        <a class="btn btn-success btn-lg rounded-0 w-100 mt-1 mb-1 mr-0" href="{{ url('/' . $page='debtlist') }}">
                            <i class="ion-document-text ml-5" style="float:left"></i>
                            Debt List
                        </a>
                        <a class="btn btn-success btn-lg rounded-0 w-100 mt-1 mb-1 mr-0" href="{{ url('/' . $page='notleft') }}">
                            <i class="ion-battery-empty ml-5" style="float:left"></i>
                            Not Left
                        </a>
                        <a class="btn btn-success btn-lg rounded-0 w-100 mt-1 mb-1 mr-0" href="{{ url('/' . $page='supplier') }}">
                            <i class="ion-android-bus ml-5" style="float:left"></i>
                            Supplier
                        </a>
                        <a class="btn btn-success btn-lg rounded-0 w-100 mt-1 mb-1 mr-0" href="{{ url('/' . $page='cashier') }}">
                            <i class="ion-ios-personadd ml-5" style="float:left"></i>
                            Cashier
                        </a>
                    <form action="logout" method="post">
                        @csrf
                        <button class="btn btn-danger btn-lg rounded-0 w-100 mt-1 mb-1 mr-0" type="submit"> <i class="ion-log-out ml-5" style="float:left"></i> Logout</button>
                    </form>
                </div>
            </div>
            <div id="page-content-wrapper">
           
                <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom">
                    <div class="container-fluid">
                        <button class="btn btn-success" id="sidebarToggle">Toggle Menu</button>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                       
                    </div>
                </nav> 
                <div class="container-fluid">
                    @endauth 
                    @yield('content')
                    @auth
                </div>
            </div>
        </div>@endauth
    <script src="{{ asset('/assets/js/bootstrap.min.js') }}"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ asset('/assets/lib/qrcodelib.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/lib/webcodecamjs.js') }}"></script>
    <script type="text/javascript" src="{{ asset('/assets/lib/main.js') }}"></script> 
    <script src="{{ asset('/assets/js/main.js') }}"></script>
    <script>
        window.addEventListener('DOMContentLoaded', event => {
        const sidebarToggle = document.body.querySelector('#sidebarToggle');
            if (sidebarToggle) {
                    sidebarToggle.addEventListener('click', event => {
                    event.preventDefault();
                    document.body.classList.toggle('sb-sidenav-toggled');
                    localStorage.setItem('sb|sidebar-toggle', document.body.classList.contains('sb-sidenav-toggled'));
                    });
            }
        });
    </script>
</body>
</html>