@extends('layouts.master')

@section('content-header')
    <h1 class="pull-left">
        {{ trans('dashboard::dashboard.name') }}
    </h1>
    <div class="btn-group pull-right">

    </div>
    <div class="clearfix"></div>
@stop

@section('styles')
    <style>
        .grid-stack-item {
            padding-right: 20px !important;
        }
    </style>
@stop

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="grid-stack">
                Dashboard
            </div>
        </div>
    </div>
@stop

@section('scripts')
    @parent
@stop
