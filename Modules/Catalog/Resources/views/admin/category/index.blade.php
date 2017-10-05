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
            @if($categories)
            <ol class="dd-list">
                @foreach($categories as $category)
                <li class="dd-item" data-id="{{$category->id}}">
                    <div class="btn-group" role="group" style="display: inline" aria-label="Action buttons">
                        <a class="btn btn-sm btn-danger jsDeleteMenuItem" style="float:left;" data-item-id="3">
                            <i class="fa fa-times"></i>
                        </a>
                        <a class="btn btn-sm btn-info" style="float:left; margin-right: 15px;"
                           href="">
                            <i class="fa fa-pencil"></i>
                        </a>
                    </div>
                    <div class="dd-handle">{{$category->title}}</div>
                    @if(count($category->items))
                    <ol class="dd-list">
                        @foreach($category->items as $item)
                        <li class="dd-item" data-id="{{$item->id}}">
                            <div class="btn-group" role="group" style="display: inline" aria-label="Action buttons">
                                <a class="btn btn-sm btn-danger jsDeleteMenuItem" style="float:left;"
                                    data-item-id="{{$item->id}}">
                                    <i class="fa fa-times"></i>
                                </a>
                                <a class="btn btn-sm btn-info" style="float:left; margin-right: 15px;"
                                    href="">
                                    <i class="fa fa-pencil"></i>
                                </a>
                            </div>
                            <div class="dd-handle">{{$item->title}}</div>
                        </li>
                        @endforeach
                    </ol>
                    @endif
                </li>
                @endforeach
            </ol>
            @endif
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
    $('.dd').nestable();
    $('.dd').on('change', function() {
        var data = $('.dd').nestable('serialize');
        $.ajax({
                type: 'POST',
                url: '{{ route('api.category.update') }}',
                data: {'category': JSON.stringify(data), '_token': '<?php echo csrf_token(); ?>'},
            dataType: 'json',
                success: function(data) {

            },
            error:function (xhr, ajaxOptions, thrownError){
            }
        });
    });
</script>
@parent
@stop