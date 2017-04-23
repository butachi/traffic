@extends('layouts.master')

@section('content-header')

    <div class="pull-right">
        <a href="http://opencart.dev/admin/index.php?route=catalog/product/add&amp;token=JnDJfZ6r0kigtKrYek7213qHYu8ERLXn" data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Add New"><i class="fa fa-plus"></i></a>
        <button type="submit" form="form-product" formaction="http://opencart.dev/admin/index.php?route=catalog/product/copy&amp;token=JnDJfZ6r0kigtKrYek7213qHYu8ERLXn" data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Copy"><i class="fa fa-copy"></i></button>
        <button type="button" data-toggle="tooltip" title="" class="btn btn-danger" onclick="confirm('Are you sure?') ? $('#form-product').submit() : false;" data-original-title="Delete"><i class="fa fa-trash-o"></i></button>
    </div>
    <h1>{{ trans('system::users.title.users') }}</h1>
    <ul class="breadcrumb">
        <li><a href="http://opencart.dev/admin/index.php?route=common/dashboard&amp;token=YAzNzn92fjv6F8x9zJtdzJ6hkASdpM2f">Home</a></li>
        <li><a href="http://opencart.dev/admin/index.php?route=user/user&amp;token=YAzNzn92fjv6F8x9zJtdzJ6hkASdpM2f&amp;sort=username&amp;order=ASC">Users</a></li>
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
                        <th nowrap="">
                            <a href="javascript:void(0);" class="listViewHeaderValues" data-nextsortorderval="ASC" data-columnname="first_name">Details&nbsp;&nbsp;</a>
                        </th>
                        <th nowrap="">
                            <a href="javascript:void(0);" class="listViewHeaderValues" data-nextsortorderval="ASC" data-columnname="roleid">Role&nbsp;&nbsp;</a></th>
                        <th nowrap="">
                            <a href="javascript:void(0);" class="listViewHeaderValues" data-nextsortorderval="ASC" data-columnname="user_name">User Name&nbsp;&nbsp;</a>
                        </th>
                        <th nowrap="">
                            <a href="javascript:void(0);" class="listViewHeaderValues" data-nextsortorderval="ASC" data-columnname="status">Status&nbsp;&nbsp;</a></th>
                        <th nowrap=""><a href="javascript:void(0);" class="listViewHeaderValues" data-nextsortorderval="ASC" data-columnname="email2">Other Email&nbsp;&nbsp;</a>
                        </th>
                        <th nowrap="">
                            <a href="javascript:void(0);" class="listViewHeaderValues" data-nextsortorderval="ASC" data-columnname="is_admin">Admin&nbsp;&nbsp;</a></th>
                        <th nowrap="">
                            <a href="javascript:void(0);" class="listViewHeaderValues" data-nextsortorderval="ASC" data-columnname="phone_work">Office Phone&nbsp;&nbsp;</a></th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if (isset($users)): ?>
                        <?php foreach ($users as $user): ?>
                            <tr class="listViewEntries" data-id="1" data-recordurl="index.php?module=Users&amp;parent=Settings&amp;view=Detail&amp;record=1" id="Users_listView_row_1">
                                <td class="listViewEntryValue medium"><div class="row-fluid">
                                        <div class="span6">
                                            <div class="span2"></div>
                                            <div class="span2">
                                                <img src="layouts/vlayout/skins/images/DefaultUserIcon.png">
                                            </div>
                                        </div>
                                        <div class="span6">
                                            <div>
                                                <a href="index.php?module=Users&amp;parent=Settings&amp;view=Detail&amp;record=1">{{ $user->full_name }}</a>
                                            </div>
                                            <div>
                                                <a class="emailField" onclick="Vtiger_Helper_Js.getInternalMailer(1,'email1','Users');">{{ $user->email }}</a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="medium" nowrap="">
                                    <a href="index.php?module=Roles&amp;parent=Settings&amp;view=Edit&amp;record=H2">CEO</a></td>
                                <td class="medium" nowrap="">admin</td>
                                <td class="medium" nowrap="">Active</td>
                                <td class="medium" nowrap=""><a class="emailField" onclick="Vtiger_Helper_Js.getInternalMailer(1,'email2','Users');"></a></td>
                                <td class="medium" nowrap="">yes</td>
                                <td class="medium" nowrap="">
                                    <div class="pull-right actions">
                                <span class="actionImages">
                                    <a id="Users_LISTVIEW_ROW_1_EDIT" href="{{ route('admin.system.user.edit', $user->id) }}">
                                        <i title="Edit" class="fa fa-pencil alignMiddle"></i></a>&nbsp;</span></div>
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
    <div class="col-sm-6 text-left">{{ $users->links() }}</div>
    <div class="col-sm-6 text-right">test2</div>
</div>
@stop

@section('scripts')
@parent
@stop