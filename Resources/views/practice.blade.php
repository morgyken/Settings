<?php
/*
 * =============================================================================
 *
 * Collabmed Solutions Ltd
 * Project: iClinic
 * Author: Samuel Okoth <sodhiambo@collabmed.com>
 *
 * =============================================================================
 */
?>

@extends('layouts.app')
@section('content_title','Organization Setup')
@section('content_description','Add information on your organization')

@section('content')
<div class="form-horizontal">
    <div class="box box-info">
        {!! Form::model($data['practice'],['files'=>true,'id'=>'practice_form','route'=>'settings.practice.save']) !!}
        <div class="box-header with-border">
            <h3 class="box-title">Organization Setup</h3>
        </div>
        <div class="box-body">
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }} req">
                    {!! Form::label('name', 'Organization Name',['class'=>'control-label col-md-4']) !!}
                    <div class="col-md-8">
                        {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Practice Name']) !!}
                        {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }} req">
                    {!! Form::label('address', 'Postal Address',['class'=>'control-label col-md-4']) !!}
                    <div class="col-md-8">
                        {!! Form::text('address', old('address'), ['class' => 'form-control', 'placeholder' => 'Practice Address']) !!}
                        {!! $errors->first('address', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                <div class="form-group {{ $errors->has('telephone') ? ' has-error' : '' }} req">
                    {!! Form::label('telephone', 'Telephone',['class'=>'control-label col-md-4']) !!}
                    <div class="col-md-8">
                        {!! Form::text('telephone', old('telephone'), ['class' => 'form-control', 'placeholder' => 'Telephone']) !!}
                        {!! $errors->first('telephone', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                <div class="form-group {{ $errors->has('mobile') ? ' has-error' : '' }}">
                    {!! Form::label('mobile', 'Mobile Number',['class'=>'control-label col-md-4']) !!}
                    <div class="col-md-8">
                        {!! Form::text('mobile', old('mobile'), ['class' => 'form-control', 'placeholder' => '07xxxxxxxx']) !!}
                        {!! $errors->first('mobile', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }} req">
                    {!! Form::label('email', 'Email Address',['class'=>'control-label col-md-4']) !!}
                    <div class="col-md-8">
                        {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => 'Email address']) !!}
                        {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                <div class="form-group {{ $errors->has('fax') ? ' has-error' : '' }}">
                    {!! Form::label('fax', 'Fax No.',['class'=>'control-label col-md-4']) !!}
                    <div class="col-md-8">
                        {!! Form::text('fax', old('fax'), ['class' => 'form-control', 'placeholder' => 'Fax Number']) !!}
                        {!! $errors->first('fax', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('country') ? ' has-error' : '' }} req">
                    {!! Form::label('country', 'Country',['class'=>'control-label col-md-4']) !!}
                    <div class="col-md-8">
                        {!! Form::select('country',mconfig('settings.countries'), old('country',88), ['class' => 'form-control', 'placeholder' => 'Select...']) !!}
                        {!! $errors->first('country', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                <div class="form-group {{ $errors->has('town') ? ' has-error' : '' }} req">
                    {!! Form::label('town', 'City/Town',['class'=>'control-label col-md-4']) !!}
                    <div class="col-md-8">
                        {!! Form::text('town', old('town'), ['class' => 'form-control', 'placeholder' => 'Town']) !!}
                        {!! $errors->first('town', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                <div class="form-group {{ $errors->has('street') ? ' has-error' : '' }}">
                    {!! Form::label('street', 'Street',['class'=>'control-label col-md-4']) !!}
                    <div class="col-md-8">
                        {!! Form::text('street', old('street'), ['class' => 'form-control', 'placeholder' => 'Street']) !!}
                        {!! $errors->first('street', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                <div class="form-group {{ $errors->has('building') ? ' has-error' : '' }}">
                    {!! Form::label('building', 'Building.',['class'=>'control-label col-md-4']) !!}
                    <div class="col-md-8">
                        {!! Form::text('building', old('building'), ['class' => 'form-control', 'placeholder' => 'Building']) !!}
                        {!! $errors->first('building', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                <div class="form-group {{ $errors->has('office') ? ' has-error' : '' }}">
                    {!! Form::label('office', 'Office Number',['class'=>'control-label col-md-4']) !!}
                    <div class="col-md-8">
                        {!! Form::text('office', old('office'), ['class' => 'form-control', 'placeholder' => 'Office Number']) !!}
                        {!! $errors->first('office', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                <div class="form-group {{ $errors->has('pin') ? ' has-error' : '' }}">
                    {!! Form::label('pin', 'PIN',['class'=>'control-label col-md-4']) !!}
                    <div class="col-md-8">
                        {!! Form::text('pin', old('pin'), ['class' => 'form-control', 'placeholder' => 'PIN number']) !!}
                        {!! $errors->first('pin', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>

                <div class="form-group {{ $errors->has('logo') ? ' has-error' : '' }}">
                    {!! Form::label('logo', 'logo',['class'=>'control-label col-md-4']) !!}
                    <div class="col-md-8">
                        <label class="radio-inline">
                            {!! Form::file('logo', ['class' => '', 'placeholder' => 'Logo Image']) !!}
                        </label>
                        {!! $errors->first('logo', '<span class="help-block">:message</span>') !!}
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
@endsection