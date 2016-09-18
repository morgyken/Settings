<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 3/27/16
 * Time: 11:07 AM
 */
$clinik = $data['clinic_model'];
?>
@extends('layouts.app')
@section('content_title','Facility Setup')
@section('content_description','Add detail of facilities available')
@section('content')
<div class="form-horizontal">
    <div class="box box-info">
        {!! Form::model($clinik,['route'=>['settings.clinic.save',$id]]) !!}
        <div class="box-header">
            <h3 class="box-title">
                Add new facility
            </h3>
        </div>
        <div class="box-body">
            <div class="col-md-6">
                {!! Form::hidden('practice_id',config('practice.id')) !!}
                <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }} req">
                    {!! Form::label('name', 'Facility Name',['class'=>'control-label col-md-4']) !!}
                    <div class="col-md-8">
                        {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Facility Name']) !!}
                        {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                <div class="form-group {{ $errors->has('address') ? ' has-error' : '' }} req">
                    {!! Form::label('address', 'Postal Address',['class'=>'control-label col-md-4']) !!}
                    <div class="col-md-8">
                        {!! Form::text('address', old('address',config('practice.address')), ['class' => 'form-control', 'placeholder' => 'Postal Address']) !!}
                        {!! $errors->first('address', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                <div class="form-group {{ $errors->has('telephone') ? ' has-error' : '' }} req">
                    {!! Form::label('telephone', 'Facility Telephone',['class'=>'control-label col-md-4']) !!}
                    <div class="col-md-8">
                        {!! Form::text('telephone', old('telephone',config('practice.telephone')), ['class' => 'form-control', 'placeholder' => 'Telephone']) !!}
                        {!! $errors->first('telephone', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                <div class="form-group {{ $errors->has('mobile') ? ' has-error' : '' }}">
                    {!! Form::label('mobile', 'Office Number',['class'=>'control-label col-md-4']) !!}
                    <div class="col-md-8">
                        {!! Form::text('mobile', old('mobile',config('practice.mobile')), ['class' => 'form-control', 'placeholder' => '07xxxxxxxx']) !!}
                        {!! $errors->first('mobile', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }} req">
                    {!! Form::label('email', 'Email Address',['class'=>'control-label col-md-4']) !!}
                    <div class="col-md-8">
                        {!! Form::email('email', old('email',config('practice.email')), ['class' => 'form-control', 'placeholder' => 'Email address']) !!}
                        {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                <div class="form-group {{ $errors->has('fax') ? ' has-error' : '' }}">
                    {!! Form::label('fax', 'Fax No.',['class'=>'control-label col-md-4']) !!}
                    <div class="col-md-8">
                        {!! Form::text('fax', old('fax',config('practice.fax')), ['class' => 'form-control', 'placeholder' => 'Fax Number']) !!}
                        {!! $errors->first('fax', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('town') ? ' has-error' : '' }} req">
                    {!! Form::label('town', 'City/Town',['class'=>'control-label col-md-4']) !!}
                    <div class="col-md-8">
                        {!! Form::text('town', old('town'), ['class' => 'form-control', 'placeholder' => 'Town']) !!}
                        {!! $errors->first('town', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                <div class="form-group {{ $errors->has('location') ? ' has-error' : '' }}">
                    {!! Form::label('location', 'Facility Location',['class'=>'control-label col-md-4']) !!}
                    <div class="col-md-8">
                        {!! Form::text('location', old('location'), ['class' => 'form-control', 'placeholder' => 'Location']) !!}
                        {!! $errors->first('location', '<span class="help-block">:message</span>') !!}
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
                <div class="form-group {{ $errors->has('type') ? ' has-error' : '' }} req">
                    {!! Form::label('type', 'Facility Type',['class'=>'control-label col-md-4']) !!}
                    <div class="col-md-8">
                        {!! Form::select('type',mconfig('settings.system.clinic_types'),old('clinic'),['class' => 'form-control', 'placeholder' => 'Select...']) !!}
                        {!! $errors->first('type', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                <div class="form-group {{ $errors->has('status') ? ' has-error' : '' }}">
                    {!! Form::label('status', 'Status',['class'=>'control-label col-md-4']) !!}
                    <div class="col-md-8">
                        <label class="radio-inline">{!! Form::radio('status','active',true) !!} Active</label>
                        <label class="radio-inline">{!! Form::radio('status','inactive') !!} Inactive</label>
                        {!! $errors->first('status', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="box-footer">
            <div class="pull-left">
                <a href="{{URL::previous()}}" class="btn btn-default">
                    <i class="fa fa-arrow-circle-o-left"></i> Back
                </a>
            </div>
            <div class="pull-right">
                <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
</div>
@include('settings::partials.clinic-list')
@endsection