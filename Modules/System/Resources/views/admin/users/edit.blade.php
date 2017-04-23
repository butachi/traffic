@extends('layouts.master')

@section('content-header')
<div class="pull-right">
    <a href="http://opencart.dev/admin/index.php?route=catalog/product/add&amp;token=JnDJfZ6r0kigtKrYek7213qHYu8ERLXn"
       data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Add New"><i
            class="fa fa-plus"></i></a>
    <button type="submit" form="form-product"
            formaction="http://opencart.dev/admin/index.php?route=catalog/product/copy&amp;token=JnDJfZ6r0kigtKrYek7213qHYu8ERLXn"
            data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Copy"><i class="fa fa-copy"></i>
    </button>
    <button type="button" data-toggle="tooltip" title="" class="btn btn-danger"
            onclick="confirm('Are you sure?') ? $('#form-product').submit() : false;" data-original-title="Delete"><i
            class="fa fa-trash-o"></i></button>
</div>
<h1>{{ trans('system::users.title.users') }}</h1>
<ul class="breadcrumb">
    <li><a href="http://opencart.dev/admin/index.php?route=common/dashboard&amp;token=YAzNzn92fjv6F8x9zJtdzJ6hkASdpM2f">Home</a>
    </li>
    <li>
        <a href="http://opencart.dev/admin/index.php?route=user/user&amp;token=YAzNzn92fjv6F8x9zJtdzJ6hkASdpM2f&amp;sort=username&amp;order=ASC">Users</a>
    </li>
</ul>
@stop

@section('styles')
<link href="{{ Theme::url('js/jquery/chosen/chosen.css') }}" type="text/css" rel="stylesheet" media="screen" />
@stop

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="grid-stack">
            <div>
                <table class="table table-bordered marginLeftZero">
                    <tbody>
                    <tr class="listViewActionsDiv">
                        <th colspan="4">User Login &amp; Role</th>
                    </tr>
                    <tr>
                        <td class="fieldLabel medium">User Name <span class="redColor">*</span></td>
                        <td class="fieldValue medium">
                            <input id="Users_editView_fieldName_user_name" type="text"
                                   class="form-control form-control"
                                   name="user_name" value="admin" data-fieldinfo=""></td>
                        <td class="fieldLabel medium">Primary Email <span class="redColor">*</span></td>
                        <td class="fieldValue medium">
                            <input id="Users_editView_fieldName_email1" class="form-control"
                                   name="email1" value="vtiger100@gmail.com"></td>
                    </tr>
                    <tr>
                        <td class="fieldLabel medium">First Name</td>
                        <td class="fieldValue medium">
                            <input id="Users_editView_fieldName_first_name" type="text" class="form-control nameField"
                                   name="first_name" value="Test123">
                        </td>
                        <td class="fieldLabel medium">Last Name <span class="redColor">*</span></td>
                        <td class="fieldValue medium">
                            <input id="Users_editView_fieldName_last_name" type="text" class="form-control nameField"
                                   data-validation-engine="validate[required,funcCall[Vtiger_Base_Validator_Js.invokeValidation]]"
                                   name="last_name"
                                   value="Admin"
                                   data-fieldinfo="{&quot;mandatory&quot;:true,&quot;presence&quot;:true,&quot;quickcreate&quot;:false,&quot;masseditable&quot;:true,&quot;defaultvalue&quot;:false,&quot;type&quot;:&quot;string&quot;,&quot;name&quot;:&quot;last_name&quot;,&quot;label&quot;:&quot;Last Name&quot;}">
                        </td>
                    </tr>
                    <tr>
                        <td class="fieldLabel medium">Role <span class="redColor">*</span></td>
                        <td class="fieldValue medium">
                            <select class="chzn-select" name="roleid">
                                <option value="H2" selected="">CEO</option>
                                <option value="H3">Vice President</option>
                                <option value="H4">Sales Manager</option>
                                <option value="H5">Sales Person</option>
                            </select>
                        </td>
                        <td class="fieldLabel medium">Default Lead View</td>
                        <td class="fieldValue medium">
                            <select class="chzn-select" name="lead_view">
                                <option value="Today" selected="">Today</option>
                                <option value="Last 2 Days">Last 2 Days</option>
                                <option value="Last Week">Last Week</option>
                            </select>
                        </td>
                    </tr>
                    </tbody>
                </table>

                <br>
                <table class="table table-bordered marginLeftZero">
                    <tbody>
                    <tr class="listViewActionsDiv">
                        <th colspan="4">User Address</th>
                    </tr>
                    <tr>
                        <td class="fieldLabel medium">Street Address</td>
                        <td class="fieldValue medium">
                            <textarea id="Users_editView_fieldName_address_street" class="form-control" name="address_street"></textarea>
                        </td>
                        <td class="fieldLabel medium">Country</td>
                        <td class="fieldValue medium"><input id="Users_editView_fieldName_address_country" type="text"
                                                             class="form-control "
                                                             data-validation-engine="validate[funcCall[Vtiger_Base_Validator_Js.invokeValidation]]"
                                                             name="address_country" value=""
                                                             data-fieldinfo="{&quot;mandatory&quot;:false,&quot;presence&quot;:true,&quot;quickcreate&quot;:false,&quot;masseditable&quot;:true,&quot;defaultvalue&quot;:false,&quot;type&quot;:&quot;string&quot;,&quot;name&quot;:&quot;address_country&quot;,&quot;label&quot;:&quot;Country&quot;}">
                        </td>
                    </tr>
                    <tr>
                        <td class="fieldLabel medium">City</td>
                        <td class="fieldValue medium"><input id="Users_editView_fieldName_address_city" type="text"
                                                             class="form-control "
                                                             data-validation-engine="validate[funcCall[Vtiger_Base_Validator_Js.invokeValidation]]"
                                                             name="address_city" value=""
                                                             data-fieldinfo="{&quot;mandatory&quot;:false,&quot;presence&quot;:true,&quot;quickcreate&quot;:false,&quot;masseditable&quot;:true,&quot;defaultvalue&quot;:false,&quot;type&quot;:&quot;string&quot;,&quot;name&quot;:&quot;address_city&quot;,&quot;label&quot;:&quot;City&quot;}">
                        </td>
                        <td class="fieldLabel medium">Postal Code</td>
                        <td class="fieldValue medium"><input id="Users_editView_fieldName_address_postalcode"
                                                             type="text" class="form-control "
                                                             data-validation-engine="validate[funcCall[Vtiger_Base_Validator_Js.invokeValidation]]"
                                                             name="address_postalcode" value=""
                                                             data-fieldinfo="{&quot;mandatory&quot;:false,&quot;presence&quot;:true,&quot;quickcreate&quot;:false,&quot;masseditable&quot;:true,&quot;defaultvalue&quot;:false,&quot;type&quot;:&quot;string&quot;,&quot;name&quot;:&quot;address_postalcode&quot;,&quot;label&quot;:&quot;Postal Code&quot;}">
                        </td>
                    </tr>
                    <tr>
                        <td class="fieldLabel medium">State</td>
                        <td class="fieldValue medium"><input id="Users_editView_fieldName_address_state" type="text"
                                                             class="form-control "
                                                             data-validation-engine="validate[funcCall[Vtiger_Base_Validator_Js.invokeValidation]]"
                                                             name="address_state" value=""
                                                             data-fieldinfo="{&quot;mandatory&quot;:false,&quot;presence&quot;:true,&quot;quickcreate&quot;:false,&quot;masseditable&quot;:true,&quot;defaultvalue&quot;:false,&quot;type&quot;:&quot;string&quot;,&quot;name&quot;:&quot;address_state&quot;,&quot;label&quot;:&quot;State&quot;}">
                        </td>
                    </tr>
                    </tbody>
                </table>
                <br>
                <table class="table table-bordered marginLeftZero">
                    <tbody>
                    <tr class="listViewActionsDiv">
                        <th colspan="4">User Photograph</th>
                    </tr>
                    <tr>
                        <td class="fieldLabel medium">Upload Photograph</td>
                        <td class="fieldValue medium"><input type="file" class="form-control " name="imagename[]"
                                                             value=""
                                                             data-validation-engine="validate[funcCall[Vtiger_Base_Validator_Js.invokeValidation]]"
                                                             data-fieldinfo="{&quot;mandatory&quot;:false,&quot;presence&quot;:true,&quot;quickcreate&quot;:false,&quot;masseditable&quot;:true,&quot;defaultvalue&quot;:false,&quot;type&quot;:&quot;image&quot;,&quot;name&quot;:&quot;imagename&quot;,&quot;label&quot;:&quot;Upload Photograph&quot;}">

                            <div class="row"></div>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <br>
                <table class="table table-bordered marginLeftZero"></table>
                <div class="pull-right">
                    <button class="btn btn-success" type="submit"><strong>Save</strong></button>
                    <a class="cancelLink" type="reset" onclick="javascript:window.history.back();">Cancel</a></div>
                <br><br><br></div>
        </div>
    </div>
</div>

@stop
@section('scripts')
{!! Theme::script('js/jquery/chosen/chosen.jquery.min.js') !!}
@parent
<script type="text/javascript">
    $(function() {

        $(".chzn-select").chosen({width: "100%"});
        $(".chzn-select-deselect").chosen({allow_single_deselect:true});
    });
</script>
@stop