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
<h1>Search</h1>
<label class="control-label" for="input-search">Search Criteria</label>
<div class="row">
    <div class="col-sm-12">
        <div id="search">
            <input type="text" name="search" value="" placeholder="Keywords" id="search" class="form-control" />
        </div>
    </div>
</div>
<input type="button" data-url="{{ config('news.accesstrade') }}" value="Search"
       id="button-search" class="btn btn-primary">
<!--<h2>Products meeting the search criteria</h2>
<div class="row">
    <div class="product-layout product-list col-xs-12">
        <div class="product-thumb">
            <div class="image">
                <a href="http://opencart.dev/index.php?route=product/product&amp;product_id=41&amp;search=iMac">
                    <img src="http://opencart.dev/image/cache/catalog/demo/imac_1-228x228.jpg" alt="iMac" title="iMac" class="img-responsive" />
                </a>
            </div>
            <div>
                <div class="caption">
                    <h4><a href="http://opencart.dev/index.php?route=product/product&amp;product_id=41&amp;search=iMac">iMac</a></h4>
                    <p>
                        Just when you thought iMac had everything, now there´s even more. More powerful Intel Core 2 Duo ..</p>
                    <p class="price">
                        $122.00                                                      <span class="price-tax">Ex Tax: $100.00</span>
                    </p>
                    <button type="button"><i class="fa fa-shopping-cart"></i> <span class="hidden-xs hidden-sm hidden-md">Mua sản phẩm</span></button>
                </div>
            </div>
        </div>
    </div>
</div>-->
@stop

@section('scripts')
@parent
@stop
