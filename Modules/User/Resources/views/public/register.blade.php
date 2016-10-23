@extends('layouts.account')
@section('title')
    {{ trans('user::auth.register') }} | @parent
@stop

@section('content')
<div class="header">{{ trans('user::auth.register') }}</div>
@include('flash::message')
<form action="{{ route('register.post') }}" method="post">
    {{ csrf_field() }}
    <div class="body bg-gray">
        <div class="form-group{{ $errors->has('email') ? ' has-error has-feedback' : '' }}">
            <label class="email" id="email">{!! trans('user::auth.email') !!}</label>
            <input name="email" value="{{ old('email') }}" class="form-control" placeholder="{!! trans('user::auth.email') !!}">
            {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
        </div>
        <div class="form-group{{ $errors->has('password') ? ' has-error has-feedback' : '' }}">
            <label class="password" id="password">{!! trans('user::auth.password') !!}</label>
            <input name="password" type="password" class="form-control" value="" placeholder="{!! trans('user::auth.password') !!}">
            {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
        </div>
        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error has-feedback' : '' }}">
            <label class="password_confirmation" id="password_confirmation">{!! trans('user::auth.password confirmation') !!}</label>
            <input type="password" name="password_confirmation" value="" class="form-control" placeholder="{!! trans('user::auth.password confirmation') !!}">
            {!! $errors->first('password_confirmation', '<span class="help-block">:message</span>') !!}
        </div>
    </div>
    <div class="footer">
        <button type="submit" class="btn btn-info btn-block">{{ trans('user::auth.register me')}}</button>
        <a href="{{ URL::route('login') }}" class="text-center">{{ trans('user::auth.I already have a membership') }}</a>
    </div>
</form>
@stop
