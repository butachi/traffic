@extends('layouts.master')

@section('content-header')
    <div class="pull-right">
        <a href="{{ route('admin.system.user.create') }}" data-toggle="tooltip" title=""
           class="btn btn-primary" data-original-title="Add New"><i class="fa fa-plus"></i></a>
        <button type="submit" form="form-product" formaction="http://opencart.dev/admin/index.php?route=catalog/product/copy&amp;token=JnDJfZ6r0kigtKrYek7213qHYu8ERLXn" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Copy"><i class="fa fa-copy"></i></button>
        <button type="button" data-toggle="tooltip" title="" class="btn btn-danger" onclick="confirm('Are you sure?') ? $('#form-product').submit() : false;" data-original-title="Delete"><i class="fa fa-trash-o"></i></button>
    </div>
    <h1>{{ trans('system::system.title.user management') }}</h1>
    <ul class="breadcrumb">
        <li><a href="">Home</a></li>
        <li><a href="{{ route('admin.system.profile.index') }}">Profile</a></li>
    </ul>

@stop

@section('styles')
<style>
    .grid-stack-item {
        padding-right: 20px !important;s
    }
</style>
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="grid-stack">
            <div class="listViewEntriesDiv" style="overflow-x:auto;">
                <input type="hidden" value="" id="orderBy">
                <input type="hidden" value="" id="sortOrder">
                <span class="listViewLoadingImageBlock hide modal" id="loadingListViewModal">
                    <img class="listViewLoadingImage" src="layouts/vlayout/skins/nature/images/loading.gif" alt="no-image" title="Loading">
                    <p class="listViewLoadingMsg">Loading, Please wait.........</p>
                </span>
                <table class="table table-bordered listViewEntriesTable">
                    <thead><tr class="listViewHeaders">
                        <th style="width: 1px;">
                            <input type="checkbox">
                        </th>
                        <th nowrap="" style="width: 150px;">
                            <a href="javascript:void(0);"
                               class="listViewHeaderValues" data-nextsortorderval="ASC" data-columnname="first_name">Action&nbsp;&nbsp;</a>
                        </th>
                        <th nowrap="">
                            <a href="javascript:void(0);" class="listViewHeaderValues"
                               data-nextsortorderval="ASC" data-columnname="roleid">Name&nbsp;&nbsp;</a></th>
                        <th nowrap="">
                            <a href="javascript:void(0);" class="listViewHeaderValues"
                               data-nextsortorderval="ASC" data-columnname="user_name">Description&nbsp;&nbsp;</a>
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if (isset($profiles)): ?>
                        <?php foreach ($profiles as $profile): ?>
                            <tr class="listViewEntries" data-id="1">
                                <td><input type="checkbox"></td>
                                <td class="medium" nowrap="">
                                    <div class="pull-right actions">
                                        <span class="actionImages">
                                            <a id="Users_LISTVIEW_ROW_1_EDIT" class="btn btn-info"
                                               href="{{ route('admin.system.profile.edit', $profile->profile_id) }}">
                                                <i title="Edit" class="fa fa-pencil alignMiddle"></i></a>&nbsp;</span>
                                    </div>
                                    <div class="pull-right actions">
                                        <span class="actionImages">
                                            <a id="Users_LISTVIEW_ROW_1_EDIT" class="btn btn-danger"
                                               href="{{ route('admin.system.profile.edit', $profile->profile_id) }}">
                                                <i title="Edit" class="fa fa-trash-o"></i></a>&nbsp;</span>
                                    </div>
                                    <div class="pull-right actions">
                                        <span class="actionImages">
                                            <a id="Users_LISTVIEW_ROW_1_EDIT" class="btn btn-default"
                                               href="{{ route('admin.system.profile.edit', $profile->profile_id) }}">
                                                <i title="Edit" class="fa fa-copy"></i></a>&nbsp;</span>
                                    </div>
                                </td>
                                <td class="listViewEntryValue medium"><div class="row-fluid">
                                        <div class="span6">
                                            <div>
                                                <a href="{{ route('admin.system.profile.edit', $profile->profile_id) }}">{{ $profile->profile_name }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="medium" nowrap="">
                                    {{ $profile->description }}
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-sm-6 text-left">{{ $profiles->links() }}</div>
    <div class="col-sm-6 text-right"></div>
</div>
@stop

@section('scripts')
@parent
@stop