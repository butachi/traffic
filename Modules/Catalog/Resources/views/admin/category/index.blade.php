@extends('layouts.master')

@section('content-header')
<div class="pull-right">
    <a href="{{ route('admin.system.user.create') }}" data-toggle="tooltip" title=""
       class="btn btn-primary" data-original-title="Add New"><i class="fa fa-plus"></i></a>
</div>
<h1>{{ trans('catalog::category.title.catalog') }}</h1>
<ul class="breadcrumb">
    <li><a href="">Home</a></li>
    <li><a href="{{ route('admin.system.profile.index') }}">Category</a></li>
</ul>

@stop

@section('styles')
<link href="{{ Theme::url('js/jquery/nestable/nestable.css') }}" rel="stylesheet" media="screen" />
@stop

@section('content')
<div class="row">
    <div class="col-md-6">
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
    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-filter"></i> Filter</h3>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <label class="control-label" for="input-name">Product Name</label>
                    <input type="text" name="filter_name" value="" placeholder="Product Name" id="input-name" class="form-control" autocomplete="off"><ul class="dropdown-menu"></ul>
                </div>
                <div class="form-group">
                    <label class="control-label" for="input-model">Model</label>
                    <input type="text" name="filter_model" value="" placeholder="Model" id="input-model" class="form-control" autocomplete="off"><ul class="dropdown-menu"></ul>
                </div>
                <div class="form-group">
                    <label class="control-label" for="input-price">Price</label>
                    <input type="text" name="filter_price" value="" placeholder="Price" id="input-price" class="form-control">
                </div>
                <div class="form-group">
                    <label class="control-label" for="input-quantity">Quantity</label>
                    <input type="text" name="filter_quantity" value="" placeholder="Quantity" id="input-quantity" class="form-control">
                </div>
                <div class="form-group">
                    <label class="control-label" for="input-status">Status</label>
                    <select name="filter_status" id="input-status" class="form-control">
                        <option value=""></option>
                        <option value="1">Enabled</option>
                        <option value="0">Disabled</option>
                    </select>
                </div>
                <div class="form-group text-right">
                    <button type="button" id="button-filter" class="btn btn-default"><i class=""></i> Update</button>
                </div>
            </div>
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