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

    <link media="all" type="text/css" rel="stylesheet" href="{{ Theme::url('vendor/bootstrap/dist/css/bootstrap.min.css') }}">
    <link media="all" type="text/css" rel="stylesheet" href="{{ Theme::url('css/vendor/alertify/alertify.core.css') }}">
    <link media="all" type="text/css" rel="stylesheet" href="{{ Theme::url('css/vendor/alertify/alertify.default.css') }}">
    <link media="all" type="text/css" rel="stylesheet" href="{{ Theme::url('vendor/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
    <link media="all" type="text/css" rel="stylesheet" href="{{ Theme::url('vendor/admin-lte/dist/css/AdminLTE.css') }}">
    <link media="all" type="text/css" rel="stylesheet" href="{{ Theme::url('vendor/admin-lte/dist/css/skins/_all-skins.min.css') }}">
    <link media="all" type="text/css" rel="stylesheet" href="{{ Theme::url('css/asgard.css') }}">
    {!! Theme::script('vendor/jquery/jquery.min.js') !!}
    @section('styles')
    @show

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
</head>
<body class="{{ config('core.skin', 'skin-blue') }}" style="padding-bottom: 0 !important;">
<div class="wrapper">
    <header class="main-header">
        <a href="{{ URL::route('dashboard.index') }}" class="logo">
            Site Name
        </a>
        @include('partials.top-nav')
    </header>
    @include('partials.sidebar-nav')

    <aside class="content-wrapper" style="min-height: 916px;">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            @yield('content-header')
        </section>

        <!-- Main content -->
        <section class="content">
            @include('flash::message')
            @yield('content')
        </section><!-- /.content -->
    </aside><!-- /.right-side -->
    @include('partials.footer')
    @include('partials.right-sidebar')
</div><!-- ./wrapper -->

<script src="{{ Theme::url('vendor/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript"></script>
@section('scripts')
@show
</body>
</html>
