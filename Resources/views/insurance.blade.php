<?php
/*
 * Collabmed Solutions Ltd
 * Project: iClinic
 * Author: Samuel Okoth <sodhiambo@collabmed.com>
 */
$company = $data['model'];
?>

@extends('layouts.app')
@section('content_title','Insurance Companies')
@section('content_description','Add and edit Insurance Companies')

@section('content')
<div class="form-horizontal">
    <div class="box box-info">
        {!! Form::open(['route'=>['settings.companies.save',$id]]) !!}
        <div class="box-header with-border">
            <h3 class="box-title">Manage Insurance Companies</h3>
        </div>
        <div class="box-body">
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }} req">
                    {!! Form::label('name', 'Company Name',['class'=>'control-label col-md-4']) !!}
                    <div class="col-md-8">
                        {!! Form::text('name', old('name',$company->name), ['class' => 'form-control', 'placeholder' => 'Insurance Company']) !!}
                        {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }} req">
                    {!! Form::label('address', 'Postal Address',['class'=>'control-label col-md-4']) !!}
                    <div class="col-md-8">
                        {!! Form::text('address', old('address',$company->address), ['class' => 'form-control', 'placeholder' => 'Postal Address']) !!}
                        {!! $errors->first('address', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                <div class="form-group {{ $errors->has('telephone') ? ' has-error' : '' }} req">
                    {!! Form::label('telephone', 'Telephone',['class'=>'control-label col-md-4']) !!}
                    <div class="col-md-8">
                        {!! Form::text('telephone', old('telephone',$company->telephone), ['class' => 'form-control', 'placeholder' => 'Telephone']) !!}
                        {!! $errors->first('telephone', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                <div class="form-group {{ $errors->has('mobile') ? ' has-error' : '' }}">
                    {!! Form::label('mobile', 'Mobile Number',['class'=>'control-label col-md-4']) !!}
                    <div class="col-md-8">
                        {!! Form::text('mobile', old('mobile',$company->mobile), ['class' => 'form-control', 'placeholder' => '07xxxxxxxx']) !!}
                        {!! $errors->first('mobile', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }} req">
                    {!! Form::label('email', 'Email Address',['class'=>'control-label col-md-4']) !!}
                    <div class="col-md-8">
                        {!! Form::email('email', old('email',$company->email), ['class' => 'form-control', 'placeholder' => 'Email address']) !!}
                        {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('post_code') ? ' has-error' : '' }}">
                    {!! Form::label('post_code', 'Postal Code',['class'=>'control-label col-md-4']) !!}
                    <div class="col-md-8">
                        {!! Form::text('post_code', old('post_code',$company->post_code), ['class' => 'form-control', 'placeholder' => 'Postal Code']) !!}
                        {!! $errors->first('post_code', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                <div class="form-group {{ $errors->has('town') ? ' has-error' : '' }} req">
                    {!! Form::label('town', 'City/Town',['class'=>'control-label col-md-4']) !!}
                    <div class="col-md-8">
                        {!! Form::text('town', old('town',$company->town), ['class' => 'form-control', 'placeholder' => 'Town']) !!}
                        {!! $errors->first('town', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                <div class="form-group {{ $errors->has('street') ? ' has-error' : '' }}">
                    {!! Form::label('street', 'Street',['class'=>'control-label col-md-4']) !!}
                    <div class="col-md-8">
                        {!! Form::text('street', old('street',$company->street), ['class' => 'form-control', 'placeholder' => 'Street']) !!}
                        {!! $errors->first('street', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                <div class="form-group {{ $errors->has('building') ? ' has-error' : '' }}">
                    {!! Form::label('building', 'Building.',['class'=>'control-label col-md-4']) !!}
                    <div class="col-md-8">
                        {!! Form::text('building', old('building',$company->building), ['class' => 'form-control', 'placeholder' => 'Building']) !!}
                        {!! $errors->first('building', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                <div class="form-group {{ $errors->has('fax') ? ' has-error' : '' }}">
                    {!! Form::label('fax', 'Fax No.',['class'=>'control-label col-md-4']) !!}
                    <div class="col-md-8">
                        {!! Form::text('fax', old('fax',$company->fax), ['class' => 'form-control', 'placeholder' => 'Fax Number']) !!}
                        {!! $errors->first('fax', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="box-footer">
            <div class="pull-right">
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@include('settings::partials.company-list')
@endsection