@extends('layouts.master')

@section('content-header')
    <h1>{{ trans('system::system.title.user management') }}</h1>
    <ul class="breadcrumb">
        <li><a href="">Home</a></li>
        <li><a href="{{ route('admin.system.role.index') }}">Roles</a></li>
    </ul>

@stop

@section('styles')
@stop

@section('content')
    <div class="col-md-12">
        <div class="grid-stack">
            <div class="listViewEntriesDiv">
                <input type="hidden" value="" id="orderBy">
                <input type="hidden" value="" id="sortOrder">
                <span class="listViewLoadingImageBlock hide modal" id="loadingListViewModal">
                    <img class="listViewLoadingImage" src="layouts/vlayout/skins/nature/images/loading.gif" alt="no-image" title="Loading">
                    <p class="listViewLoadingMsg">Loading, Please wait.........</p>
                </span>
                <div class="clearfix treeView">
                    <ul>
                        <li data-role="H1" data-roleid="H1">
                            <div class="toolbar-handle">
                                <a href="javascript:;" class="btn app-MARKETING droppable ui-droppable">Organization</a>
                                <div class="toolbar" title="Add Role"
                                     style="display: none;">&nbsp;<a href="" data-url="" data-action="modal">
                                        <span class="icon-plus-sign"></span>
                                    </a>
                                </div>
                            </div>
                            <ul>
                                <li data-role="H1::H2" data-roleid="H2">
                                    <div class="toolbar-handle">
                                        <a style="white-space: nowrap" href="" data-url=""
                                           class="btn btn-default draggable droppable ui-draggable ui-draggable-handle ui-droppable"
                                           data-toggle="tooltip" data-placement="top" data-animation="true" title=""
                                           data-original-title="Click to edit/Drag to move">CEO</a>
                                        <div class="toolbar" style="display: none;">&nbsp;<a href="" data-url="" title="Add Role">
                                                <span class="fa fa-plus-circle"></span></a>&nbsp;<a data-id="H2" href="javascript:;" data-url="" data-action="modal" title="Delete">
                                                <span class="fa fa-trash"></span>
                                            </a>
                                        </div>
                                    </div>
                                    <ul>
                                        <li data-role="H1::H2::H3" data-roleid="H3">
                                            <div class="toolbar-handle">
                                                <a style="white-space: nowrap" href="" data-url="" class="btn btn-default draggable droppable ui-draggable ui-draggable-handle ui-droppable"
                                                   data-toggle="tooltip" data-placement="top" data-animation="true" title="" data-original-title="Click to edit/Drag to move">Vice President</a>
                                                <div class="toolbar" style="display: none;">&nbsp;
                                                    <a href="" data-url="" title="Add Role">
                                                        <span class="fa fa-plus-circle"></span>
                                                    </a>&nbsp;
                                                    <a data-id="H3" href="javascript:;" data-url="" data-action="modal" title="Delete">
                                                        <span class="fa fa-trash"></span></a></div></div><ul><li data-role="H1::H2::H3::H4" data-roleid="H4">
                                                    <div class="toolbar-handle">
                                                        <a style="white-space: nowrap" href="" data-url="" class="btn btn-default draggable droppable ui-draggable ui-draggable-handle ui-droppable"
                                                           data-toggle="tooltip" data-placement="top" data-animation="true" title="" data-original-title="Click to edit/Drag to move">Sales Manager</a>
                                                        <div class="toolbar" style="display: none;">&nbsp;<a href="" data-url="" title="Add Role">
                                                                <span class="fa fa-plus-circle"></span></a>&nbsp;
                                                            <a data-id="H4" href="javascript:;" data-url="" data-action="modal" title="Delete">
                                                                <span class="fa fa-trash"></span>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <ul>
                                                        <li data-role="H1::H2::H3::H4::H5" data-roleid="H5">
                                                            <div class="toolbar-handle">
                                                                <a style="white-space: nowrap" href=""
                                                                   data-url="" class="btn btn-default draggable droppable ui-draggable ui-draggable-handle ui-droppable"
                                                                   data-toggle="tooltip" data-placement="top" data-animation="true" title=""
                                                                   data-original-title="Click to edit/Drag to move">
                                                                    Sales Person
                                                                </a>
                                                                <div class="toolbar" style="display: none;">&nbsp;
                                                                    <a href="" data-url="" title="Add Role">
                                                                        <span class="fa fa-plus-circle"></span></a>&nbsp;
                                                                    <a data-id="H5" href="javascript:;" data-url="" data-action="modal" title="Delete"><span class="fa fa-trash"></span></a>
                                                                </div>
                                                            </div>
                                                            <ul></ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

@stop

@section('scripts')
@parent
@stop