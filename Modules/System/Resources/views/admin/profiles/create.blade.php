@extends('layouts.master')
@section('content-header')
<div class="pull-right">
    <a href=""
       data-toggle="tooltip" title="" class="btn btn-primary" data-original-title="Add New"><i
            class="fa fa-plus"></i></a>
    <button type="submit" form="form-product"
            formaction=""
            data-toggle="tooltip" title="" class="btn btn-default" data-original-title="Copy"><i class="fa fa-copy"></i>
    </button>
    <button type="button" data-toggle="tooltip" title="" class="btn btn-danger"
            onclick="confirm('Are you sure?') ? $('#form-product').submit() : false;" data-original-title="Delete"><i
            class="fa fa-trash-o"></i></button>
</div>
<h1>{{ trans('system::profiles.title.users') }}</h1>
<ul class="breadcrumb">
    <li><a href="{{route('dashboard.index')}}">Home</a>
    </li>
    <li>
        <a href="{{route('admin.system.profiles.index')}}">Profiles</a>
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
            <form method="post" action="{{ route('admin.system.user.store') }}" name="EditView" enctype="multipart/form-data">
            {{ csrf_field() }}
                <div>
                    <table class="table table-bordered marginLeftZero">
                        <tbody>
                        <tr class="listViewActionsDiv">
                            <th colspan="4">User Login &amp; Role</th>
                        </tr>
                        <tr>
                            <td class="fieldLabel medium">Email <span class="redColor">*</span></td>
                            <td class="fieldValue medium">
                                <input type="text" id="Users_editView_fieldName_email1"
                                       class="form-control{{ $errors->has('email') ? ' has-error' : '' }}"
                                       name="email" value="{{ old('email') }}"></td>
                            <td class="fieldLabel medium">Is Admin</td>
                            <td class="fieldValue medium">
                                <input type="hidden" name="is_admin" value="0">
                                <input id="Users_editView_fieldName_is_admin" type="checkbox" name="is_admin">
                            </td>
                        </tr>
                        <tr>
                            <td class="fieldLabel medium">First Name</td>
                            <td class="fieldValue medium">
                                <input id="Users_editView_fieldName_first_name" type="text" class="form-control nameField"
                                       name="first_name" value="{{ old('first_name') }}">
                            </td>
                            <td class="fieldLabel medium">Last Name</td>
                            <td class="fieldValue medium">
                                <input id="Users_editView_fieldName_last_name" type="text" class="form-control nameField"
                                       name="last_name"
                                       value="{{ old('last_name') }}">
                            </td>
                        </tr>
                        <tr>
                            <td class="fieldLabel medium">Password <span class="redColor">*</span></td>
                            <td class="fieldValue medium">
                                <input id="Users_editView_fieldName_user_name" type="password"
                                       class="form-control {{ $errors->has('password') ? 'has-error' : '' }}"
                                       name="password" value="" data-fieldinfo=""></td>
                            <td class="fieldLabel medium">Confirm Password <span class="redColor">*</span></td>
                            <td class="fieldValue medium">
                                <input type="password" id="Users_editView_fieldName_email1" class="form-control"
                                       name="password_confirmation" value=""></td>
                        </tr>
                        <tr>
                            <td class="fieldLabel medium">Role <span class="redColor">*</span></td>
                            <td class="fieldValue medium">
                                <select class="chzn-select {{ $errors->has('roleid') ? 'has-error' : '' }}" name="roleid">
                                    <option value="H2" selected>CEO</option>
                                    <option value="H3">Vice President</option>
                                    <option value="H4">Sales Manager</option>
                                    <option value="H5">Sales Person</option>
                                </select>
                            </td>
                            <td class="fieldLabel medium">Language</td>
                            <td class="fieldValue medium">
                                <input type="text" class="form-control" name="language" value="{{ old('language') }}">
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <br>
                    <!--<table class="table table-bordered marginLeftZero">
                        <tbody>
                        <tr class="listViewActionsDiv">
                            <th colspan="4">Calendar Settings</th>
                        </tr>
                        <tr>
                            <td class="fieldLabel medium">Starting Day of the week</td>
                            <td class="fieldValue medium">

                            </td>
                            <td class="fieldLabel medium">Day starts at</td>
                            <td class="fieldValue medium"><input id="Users_editView_fieldName_address_country" type="text"
                                                                 class="form-control "
                                                                 data-validation-engine="validate[funcCall[Vtiger_Base_Validator_Js.invokeValidation]]"
                                                                 name="address_country" value=""
                                                                 data-fieldinfo="{&quot;mandatory&quot;:false,&quot;presence&quot;:true,&quot;quickcreate&quot;:false,&quot;masseditable&quot;:true,&quot;defaultvalue&quot;:false,&quot;type&quot;:&quot;string&quot;,&quot;name&quot;:&quot;address_country&quot;,&quot;label&quot;:&quot;Country&quot;}">
                            </td>
                        </tr>
                        <tr>
                            <td class="fieldLabel medium">Date Format</td>
                            <td class="fieldValue medium"><input id="Users_editView_fieldName_address_city" type="text"
                                                                 class="form-control "
                                                                 data-validation-engine="validate[funcCall[Vtiger_Base_Validator_Js.invokeValidation]]"
                                                                 name="address_city" value=""
                                                                 data-fieldinfo="{&quot;mandatory&quot;:false,&quot;presence&quot;:true,&quot;quickcreate&quot;:false,&quot;masseditable&quot;:true,&quot;defaultvalue&quot;:false,&quot;type&quot;:&quot;string&quot;,&quot;name&quot;:&quot;address_city&quot;,&quot;label&quot;:&quot;City&quot;}">
                            </td>
                            <td class="fieldLabel medium">Calendar Hour Format</td>
                            <td class="fieldValue medium"><input id="Users_editView_fieldName_address_postalcode"
                                                                 type="text" class="form-control "
                                                                 data-validation-engine="validate[funcCall[Vtiger_Base_Validator_Js.invokeValidation]]"
                                                                 name="address_postalcode" value=""
                                                                 data-fieldinfo="{&quot;mandatory&quot;:false,&quot;presence&quot;:true,&quot;quickcreate&quot;:false,&quot;masseditable&quot;:true,&quot;defaultvalue&quot;:false,&quot;type&quot;:&quot;string&quot;,&quot;name&quot;:&quot;address_postalcode&quot;,&quot;label&quot;:&quot;Postal Code&quot;}">
                            </td>
                        </tr>
                        <tr>
                            <td class="fieldLabel medium">Time Zone</td>
                            <td class="fieldValue medium"><input id="Users_editView_fieldName_address_state" type="text"
                                                                 class="form-control "
                                                                 data-validation-engine="validate[funcCall[Vtiger_Base_Validator_Js.invokeValidation]]"
                                                                 name="address_state" value=""
                                                                 data-fieldinfo="{&quot;mandatory&quot;:false,&quot;presence&quot;:true,&quot;quickcreate&quot;:false,&quot;masseditable&quot;:true,&quot;defaultvalue&quot;:false,&quot;type&quot;:&quot;string&quot;,&quot;name&quot;:&quot;address_state&quot;,&quot;label&quot;:&quot;State&quot;}">
                            </td>
                            <td class="fieldLabel medium">Default Calendar View</td>
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
                            <th colspan="4">More Information</th>
                        </tr>
                        <tr>
                            <td class="fieldLabel medium">Department</td>
                            <td class="fieldValue medium">
                                <textarea id="Users_editView_fieldName_address_street" class="form-control" name="address_street"></textarea>
                            </td>
                            <td class="fieldLabel medium">Fax</td>
                            <td class="fieldValue medium"><input id="Users_editView_fieldName_address_country" type="text"
                                                                 class="form-control "
                                                                 data-validation-engine="validate[funcCall[Vtiger_Base_Validator_Js.invokeValidation]]"
                                                                 name="address_country" value=""
                                                                 data-fieldinfo="{&quot;mandatory&quot;:false,&quot;presence&quot;:true,&quot;quickcreate&quot;:false,&quot;masseditable&quot;:true,&quot;defaultvalue&quot;:false,&quot;type&quot;:&quot;string&quot;,&quot;name&quot;:&quot;address_country&quot;,&quot;label&quot;:&quot;Country&quot;}">
                            </td>
                        </tr>
                        <tr>
                            <td class="fieldLabel medium">Reports To</td>
                            <td class="fieldValue medium"><input id="Users_editView_fieldName_address_city" type="text"
                                                                 class="form-control "
                                                                 data-validation-engine="validate[funcCall[Vtiger_Base_Validator_Js.invokeValidation]]"
                                                                 name="address_city" value=""
                                                                 data-fieldinfo="{&quot;mandatory&quot;:false,&quot;presence&quot;:true,&quot;quickcreate&quot;:false,&quot;masseditable&quot;:true,&quot;defaultvalue&quot;:false,&quot;type&quot;:&quot;string&quot;,&quot;name&quot;:&quot;address_city&quot;,&quot;label&quot;:&quot;City&quot;}">
                            </td>
                            <td class="fieldLabel medium">Other Email</td>
                            <td class="fieldValue medium"><input id="Users_editView_fieldName_address_postalcode"
                                                                 type="text" class="form-control "
                                                                 data-validation-engine="validate[funcCall[Vtiger_Base_Validator_Js.invokeValidation]]"
                                                                 name="address_postalcode" value=""
                                                                 data-fieldinfo="{&quot;mandatory&quot;:false,&quot;presence&quot;:true,&quot;quickcreate&quot;:false,&quot;masseditable&quot;:true,&quot;defaultvalue&quot;:false,&quot;type&quot;:&quot;string&quot;,&quot;name&quot;:&quot;address_postalcode&quot;,&quot;label&quot;:&quot;Postal Code&quot;}">
                            </td>
                        </tr>
                        <tr>
                            <td class="fieldLabel medium">Office Phone</td>
                            <td class="fieldValue medium"><input id="Users_editView_fieldName_address_state" type="text"
                                                                 class="form-control "
                                                                 data-validation-engine="validate[funcCall[Vtiger_Base_Validator_Js.invokeValidation]]"
                                                                 name="address_state" value=""
                                                                 data-fieldinfo="{&quot;mandatory&quot;:false,&quot;presence&quot;:true,&quot;quickcreate&quot;:false,&quot;masseditable&quot;:true,&quot;defaultvalue&quot;:false,&quot;type&quot;:&quot;string&quot;,&quot;name&quot;:&quot;address_state&quot;,&quot;label&quot;:&quot;State&quot;}">
                            </td>
                            <td class="fieldLabel medium">Mobile Phone</td>
                            <td class="fieldValue medium"><input id="Users_editView_fieldName_address_state" type="text"
                                                                 class="form-control "
                                                                 data-validation-engine="validate[funcCall[Vtiger_Base_Validator_Js.invokeValidation]]"
                                                                 name="address_state" value=""
                                                                 data-fieldinfo="{&quot;mandatory&quot;:false,&quot;presence&quot;:true,&quot;quickcreate&quot;:false,&quot;masseditable&quot;:true,&quot;defaultvalue&quot;:false,&quot;type&quot;:&quot;string&quot;,&quot;name&quot;:&quot;address_state&quot;,&quot;label&quot;:&quot;State&quot;}">
                            </td>
                        </tr>
                        <tr>

                            <td class="fieldLabel medium">Theme</td>
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
                    <br>-->
                    <table class="table table-bordered marginLeftZero">
                        <tbody>
                        <tr class="listViewActionsDiv">
                            <th colspan="4">User Photograph</th>
                        </tr>
                        <tr>
                            <td class="fieldLabel medium">Upload Photograph</td>
                            <td class="fieldValue medium">
                                <input type="file" class="form-control " name="imagename[]"value="">
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
                    <br><br><br>
                </div>
            </form>
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