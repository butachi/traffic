<!DOCTYPE html>
<!--[if IE]><![endif]-->
<!--[if IE 8 ]><html dir="ltr" lang="en" class="ie8"><![endif]-->
<!--[if IE 9 ]><html dir="ltr" lang="en" class="ie9"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html dir="ltr" lang="en">
<!--<![endif]-->
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>
        @section('title')
        @show
    </title>
    <base href="{{ URL::asset('/') }}" />
    <link href="{{ Theme::url('js/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" media="screen" />
    <link href="{{ Theme::url('js/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="//fonts.googleapis.com/css?family=Open+Sans:400,400i,300,700" rel="stylesheet" type="text/css" />
    <link href="{{ Theme::url('css/stylesheet.css') }}" rel="stylesheet">
    @section('styles')
    @show
</head>
<body class="product-search">
<nav id="top">
    <div class="container">
    </div>
</nav>
<header>
</header>
<div class="container">
    <div class="row">
        <div id="content" class="col-sm-12">
            @include('flash::message')
            @yield('content')
        </div>
    </div>
</div>
{!! Theme::script('js/jquery/jquery-2.1.1.min.js') !!}
{!! Theme::script('js/bootstrap/js/bootstrap.min.js') !!}
{!! Theme::script('js/common.js') !!}
<script type="text/javascript">
    $('#button-search').bind('click', function() {
        var self = $(this);
        var url = self.data('url');
        var search = $('#content input[name=\'search\']').prop('value');
        if (search) {
            url += '?url=' + encodeURIComponent(search);
            window.open(url);
        }
    });

    $('#content input[name=\'search\']').bind('keydown', function(e) {
        if (e.keyCode == 13) {
            $('#button-search').trigger('click');
        }
    });
</script>
<footer>
    <div class="container">
        <p>Powered By <a href="http://www.butachi.com">Butachi</a> &copy; 2016</p>
    </div>
</footer>
</body>
</html>