@extends('layouts.master')

@section('content-header')
<div class="pull-right">
    <a href="{{ route('admin.system.user.create') }}" data-toggle="tooltip" title=""
       class="btn btn-primary" data-original-title="Add New"><i class="fa fa-plus"></i></a>
</div>
<h1>{{ trans('system::system.title.user management') }}</h1>
<ul class="breadcrumb">
    <li><a href="">Home</a></li>
    <li><a href="{{ route('admin.system.profile.index') }}">Profile</a></li>
</ul>

@stop

@section('styles')
<link href="{{ Theme::url('js/jquery/nestable/nestable.css') }}" rel="stylesheet" media="screen" />
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="dd">
            <ol class="dd-list">
                <li class="dd-item" data-id="1">
                    <div class="btn-group" role="group" style="display: inline" aria-label="Action buttons">
                        <a class="btn btn-sm btn-danger jsDeleteMenuItem" style="float:left;" data-item-id="3">
                            <i class="fa fa-times"></i>
                        </a>
                        <a class="btn btn-sm btn-info" style="float:left; margin-right: 15px;" href="http://hungnt.cmslaravel.dev/en/backend/menu/menus/2/menuitem/3/edit">
                            <i class="fa fa-pencil"></i>
                        </a>
                    </div>
                    <div class="dd-handle">Item 1</div>
                </li>
                <li class="dd-item" data-id="2">
                    <div class="btn-group" role="group" style="display: inline" aria-label="Action buttons">
                        <a class="btn btn-sm btn-danger jsDeleteMenuItem" style="float:left;" data-item-id="3">
                            <i class="fa fa-times"></i>
                        </a>
                        <a class="btn btn-sm btn-info" style="float:left; margin-right: 15px;" href="http://hungnt.cmslaravel.dev/en/backend/menu/menus/2/menuitem/3/edit">
                            <i class="fa fa-pencil"></i>
                        </a>
                    </div>
                    <div class="dd-handle">Item 2</div>
                    <ol class="dd-list">
                        <li class="dd-item" data-id="4">
                            <div class="btn-group" role="group" style="display: inline" aria-label="Action buttons">
                                <a class="btn btn-sm btn-danger jsDeleteMenuItem" style="float:left;" data-item-id="3">
                                    <i class="fa fa-times"></i>
                                </a>
                                <a class="btn btn-sm btn-info" style="float:left; margin-right: 15px;" href="http://hungnt.cmslaravel.dev/en/backend/menu/menus/2/menuitem/3/edit">
                                    <i class="fa fa-pencil"></i>
                                </a>
                            </div>
                            <div class="dd-handle">Item 4</div>
                        </li>
                        <li class="dd-item" data-id="5">
                            <div class="btn-group" role="group" style="display: inline" aria-label="Action buttons">
                                <a class="btn btn-sm btn-danger jsDeleteMenuItem" style="float:left;" data-item-id="3">
                                    <i class="fa fa-times"></i>
                                </a>
                                <a class="btn btn-sm btn-info" style="float:left; margin-right: 15px;" href="http://hungnt.cmslaravel.dev/en/backend/menu/menus/2/menuitem/3/edit">
                                    <i class="fa fa-pencil"></i>
                                </a>
                            </div>
                            <div class="dd-handle">Item 5</div>
                        </li>
                    </ol>
                </li>
                <li class="dd-item" data-id="3">
                    <div class="btn-group" role="group" style="display: inline" aria-label="Action buttons">
                        <a class="btn btn-sm btn-danger jsDeleteMenuItem" style="float:left;" data-item-id="3">
                            <i class="fa fa-times"></i>
                        </a>
                        <a class="btn btn-sm btn-info" style="float:left; margin-right: 15px;" href="http://hungnt.cmslaravel.dev/en/backend/menu/menus/2/menuitem/3/edit">
                            <i class="fa fa-pencil"></i>
                        </a>
                    </div>
                    <div class="dd-handle">Item 3</div>
                    <ol class="dd-list">
                        <li class="dd-item" data-id="4">
                            <div class="btn-group" role="group" style="display: inline" aria-label="Action buttons">
                                <a class="btn btn-sm btn-danger jsDeleteMenuItem" style="float:left;" data-item-id="3">
                                    <i class="fa fa-times"></i>
                                </a>
                                <a class="btn btn-sm btn-info" style="float:left; margin-right: 15px;" href="http://hungnt.cmslaravel.dev/en/backend/menu/menus/2/menuitem/3/edit">
                                    <i class="fa fa-pencil"></i>
                                </a>
                            </div>
                            <div class="dd-handle">Item 4</div>
                        </li>
                        <li class="dd-item" data-id="5">
                            <div class="btn-group" role="group" style="display: inline" aria-label="Action buttons">
                                <a class="btn btn-sm btn-danger jsDeleteMenuItem" style="float:left;" data-item-id="3">
                                    <i class="fa fa-times"></i>
                                </a>
                                <a class="btn btn-sm btn-info" style="float:left; margin-right: 15px;" href="http://hungnt.cmslaravel.dev/en/backend/menu/menus/2/menuitem/3/edit">
                                    <i class="fa fa-pencil"></i>
                                </a>
                            </div>
                            <div class="dd-handle">Item 5</div>
                        </li>
                    </ol>
                </li>
            </ol>
        </div>
    </div>
</div>

@stop
@section('scripts')
{!! Theme::script('js/jquery/nestable/jquery.nestable.js') !!}
<script type="text/javascript">
    $('.dd').nestable({ /* config options */ });
</script>
@parent
@stop