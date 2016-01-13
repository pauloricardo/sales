<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <link href="{{URL::asset('bower_components/bootstrap/dist/css/bootstrap.css')}}" rel="stylesheet" type="text/css">
    <link href="{{URL::asset('css/style.css')}}" rel="stylesheet" type="text/css">

    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Roboto:400,300' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
@if(Auth::check())
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Laravel</a>
        </div>

        <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav">
                <li><a href="{{ route('admin.dashboard.index') }}">Principal</a></li>
                <li><a href="{{ route('admin.products.index') }}">Produtos</a></li>
                <li><a href="{{ route('admin.clients.index') }}">Clientes</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @if(auth()->guest())
                    @if(!Request::is('auth/login'))
                        <li><a href="{{ url('/auth/login') }}">Login</a></li>
                    @endif
                    @if(!Request::is('auth/register'))
                        <li><a href="{{ url('/auth/register') }}">Registrar</a></li>
                    @endif
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                           aria-expanded="false">{{ auth()->user()->name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/auth/logout') }}">Sair</a></li>
                        </ul>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
@endif
<div class="container">
    @yield('content')
    <footer>
        <div class="container">
            <p class="text-muted">Parla Consultoria &copy; <?= date('Y');?></p>
        </div>
    </footer>
</div>

<!-- Scripts -->

<script src="{{URL::asset('bower_components/jquery/dist/jquery.min.js')}}"></script>
<script src="{{URL::asset('bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<script src="{{URL::asset('bower_components/jquery-meiomask/dist/meiomask.min.js')}}"></script>
<script src="{{URL::asset('bower_components/chosen/chosen.min.js')}}"></script>
<script>
    $(document).ready(function () {
        $('#price').setMask('decimal');
        $('#purchase_price').setMask('decimal');
        $('#phone').setMask('phone');
        $('#zip_code').setMask('cep');
    });
</script>

</body>
</html>
