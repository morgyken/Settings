<?php
/*
 * Collabmed Solutions Ltd
 * Project: iClinic
 * Author: Samuel Okoth <sodhiambo@collabmed.com>
 */
?>
@extends('layouts.app')
@section('content_title','Insurance Schemes')
@section('content_description','Add and edit Insurance Schemes')

@section('content')

@include('settings::partials.scheme-list')

<div class="modal fade"  id="newScheme" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            {!! Form::open(['route'=>'settings.schemes.save']) !!}
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">New Scheme</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-horizontal">
                        <div class="box box-primary">

                            <div class="box-header with-border">
                                <h3 class="box-title">Manage Insurance Schemes</h3>
                            </div>
                            <div class="box-body">
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('company') ? ' has-error' : '' }}">
                                        {!! Form::label('company', 'Insurance Company',['class'=>'control-label col-md-4']) !!}
                                        <div class="col-md-8">
<<<<<<< HEAD
                                            {!! Form::select('company',get_insurance_companies(), old('company',$select), ['class' => 'form-control', 'placeholder' => 'Choose...', 'id'=>'company-select']) !!}
=======
                                            {!! Form::select('company',get_insurance_companies(), old('company',$select), ['id'=>'insurance-company', 'class' => 'form-control', 'placeholder' => 'Choose...']) !!}
>>>>>>> master
                                            {!! $errors->first('company', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }}">
                                        {!! Form::label('name', 'Scheme Name',['class'=>'control-label col-md-4']) !!}
                                        <div class="col-md-8">
                                            {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Insurance Scheme']) !!}
                                            {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->has('type') ? ' has-error' : '' }}">
                                        {!! Form::label('type', 'Scheme Type',['class'=>'control-label col-md-4']) !!}
                                        <div class="col-md-8">
                                            {!! Form::select('type',mconfig('settings.system.scheme_types') ,old('type'), ['class' => 'form-control', 'placeholder' => 'Choose...']) !!}
                                            {!! $errors->first('type', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>

<<<<<<< HEAD
                                    @if(is_module_enabled('Inpatient'))
                                        <div class="form-group {{ $errors->has('amount') ? ' has-error' : '' }} hidden" id="rebate">
                                            {!! Form::label('rebate', 'NHIF Rebate',['class'=>'control-label col-md-4']) !!}
                                            <div class="col-md-8">
                                                {!! Form::text('rebate', old('rebate'), ['class' => 'form-control', 'placeholder' => 'Rebate']) !!}
                                                {!! $errors->first('rebate', '<span class="help-block">:message</span>') !!}
                                            </div>
                                        </div>
                                    @endif
=======
                                    <div id="rebate" class="form-group {{ $errors->has('rebate') ? ' has-error' : '' }} {{ $hidden }}">
                                        {!! Form::label('rebate', 'Rebate',['class'=>'control-label col-md-4']) !!}
                                        <div class="col-md-8">
                                            {!! Form::text('rebate', old('rebate'), ['class' => 'form-control', 'placeholder' => 'Rebate']) !!}
                                            {!! $errors->first('rebate', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
>>>>>>> master

                                    <div class="form-group {{ $errors->has('amount') ? ' has-error' : '' }}">
                                        {!! Form::label('amount', 'Amount',['class'=>'control-label col-md-4']) !!}
                                        <div class="col-md-8">
                                            {!! Form::text('amount', old('amount'), ['class' => 'form-control', 'placeholder' => 'Amount']) !!}
                                            {!! $errors->first('amount', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">
                                    <div class="form-group {{ $errors->has('attention') ? ' has-error' : '' }}">
                                        {!! Form::label('attention', 'Attention',['class'=>'control-label col-md-4']) !!}
                                        <div class="col-md-8">
                                            {!! Form::text('attention', old('attention'), ['class' => 'form-control', 'placeholder' => 'Attention']) !!}
                                            {!! $errors->first('attention', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->has('effective_date') ? ' has-error' : '' }}">
                                        {!! Form::label('effective_date', 'Effective Date',['class'=>'control-label col-md-4']) !!}
                                        <div class="col-md-8">
                                            {!! Form::text('effective_date', old('effective_date'), ['class' => 'form-control', 'placeholder' => 'Effective date']) !!}
                                            {!! $errors->first('effective_date', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->has('expiry_date') ? ' has-error' : '' }}">
                                        {!! Form::label('expiry_date', 'Expiry Date',['class'=>'control-label col-md-4']) !!}
                                        <div class="col-md-8">
                                            {!! Form::text('expiry_date', old('expiry_date'), ['class' => 'form-control', 'placeholder' => 'Expiry date']) !!}
                                            {!! $errors->first('expiry_date', '<span class="help-block">:message</span>') !!}
                                        </div>
                                    </div>
                                    <div class="form-group {{ $errors->has('smart') ? ' has-error' : '' }}">
                                        <div class="col-md-8 col-md-offset-4">
                                            <label>{{ Form::checkbox('smart',1,false) }} SMART Enabled</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                <button class="btn btn-default" data-dismiss="modal"><i class="fa fa-ban"></i> Cancel</button>
            </div>
            {!! Form::close() !!}
        </div>

        {{-- @push('scripts') --}}
            <script>
                $('#insurance-company').change(function(event){
                    var company = event.target.value;

                    company == "{{ $nhif }}" ? $("#rebate").removeClass('hidden') : $("#rebate").addClass('hidden');
                })
                
            </script>
        {{-- @endpush --}}

    </div>
</div>
<script>
$(document).ready(function(){

    let current = $('#company-select').find(":selected").text();
    
    if(current == 'NHIF')
    {
        $('#rebate').removeClass('hidden');
    }

    $('body').on('change', '#company-select', function(event){

        let company = $("option:selected", this).text();

        if(company == 'NHIF'){
            $('#rebate').removeClass('hidden');
        }else{
            $('#rebate').addClass('hidden');
        }
    });
})
</script>
<script type="text/javascript" src="{{m_asset('settings:js/schemes.min.js')}}"></script>
@endsection