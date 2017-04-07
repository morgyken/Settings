<?php
/*
 * Collabmed Solutions Ltd
 * Project: iClinic
 * Author: Bravo Kiptoo <bkiptoo@collabmed.com>
 */
$company = $data['model'];
?>

@extends('layouts.app')
@section('content_title','Company Procedures')
@section('content_description','')

@section('content')
<div class="form-horizontal">
    <div class="box box-info">
        {!! Form::open(['route'=>['settings.company.procedures.save']]) !!}
        <div class="box-header with-border">
            <h3 class="box-title">Manage Procedures for <b>{{$company->name}}</b></h3>
        </div>
        <div class="box-body">
            {!! Form::hidden('company',$company->id) !!}
            <table class="table table-condensed table-striped" id="evaluation_order">
                <thead>
                    <tr>
                        <th width="60%">Select procedures to add</th>
                        <th>Price</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr id='addr0'>
                        <td><select name="item0" id="item_0" class="select2-single" style="width: 100%" ></select></td>
                        <td><input type="text" id="price_0" name='price0' placeholder='Price' required/></td>
                        <td>
                            <button class="btn btn-xs btn-danger remove"><i class="fa fa-trash-o"></i></button>
                        </td>
                    </tr>
                    <tr id='addr1'></tr>
                </tbody>
                <tfoot>
                    <tr>
                        <th>
                            <input type="submit" class="btn btn-success" value="Save" name="Save">
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>
        {!! Form::close() !!}
    </div>
</div>
<?php
$url = route('api.evaluation.get_procedures', ['all', null]);
?>
<script>
    var PROCEDURE_URL = "{{$url}}";
</script>
<script src="{{m_asset('evaluation:js/order_investigation.min.js')}}"></script>
@include('settings::partials.co_procedure_list')
@endsection