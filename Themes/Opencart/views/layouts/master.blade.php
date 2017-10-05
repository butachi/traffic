<!DOCTYPE html>
<html>
<head>
    <base src="{{ URL::asset('/') }}" />
    <meta charset="UTF-8">
    <title>
        @section('title')
        Admin
        @show
    </title>
    <meta id="token" name="token" value="{{ csrf_token() }}" />
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <link href="{{ Theme::url('css/bootstrap.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ Theme::url('js/font-awesome/css/font-awesome.min.css') }}" type="text/css" rel="stylesheet" />
    <link href="{{ Theme::url('js/jquery/datepicker/bootstrap-datepicker-customize.css') }}" type="text/css" />
    <link type="text/css" href="{{ Theme::url('css/stylesheet.css') }}" rel="stylesheet" media="screen" />

    {!! Theme::script('js/jquery/jquery-2.1.1.min.js') !!}
    @section('styles')
    @show
    <script>
        $.ajaxSetup({
            headers: { 'Authorization': 'Bearer {{ $currentUser->getFirstApiKey() }}' }
        });
        var AuthorizationHeaderValue = 'Bearer {{ $currentUser->getFirstApiKey() }}';
    </script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div id="container">
    <header id="header" class="navbar navbar-static-top">
        <div class="navbar-header">
            <a type="button" id="button-menu" class="pull-left"><i class="fa fa-indent fa-lg"></i></a>
            <a href="" class="navbar-brand"><img src="view/image/logo.png" alt="" title="" /></a>
        </div>
        @include('partials.top-nav')
    </header>
    @include('partials.sidebar-nav')
    <div id="content">
        <div class="page-header">
            <div class="container-fluid">
                @yield('content-header')
            </div>
        </div>
        <div class="container-fluid">
            @include('flash::message')
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @yield('content')
        </div>
    </div>
    @include('partials.footer')
</div><!-- ./wrapper -->
{!! Theme::script('js/bootstrap/js/bootstrap.min.js') !!}
{!! Theme::script('js/jquery/datepicker/moment.js') !!}
{!! Theme::script('js/jquery/datepicker/bootstrap-datepicker-customize.js') !!}
{!! Theme::script('js/common.js') !!}

@section('scripts')
@show
</body>
</html>
