<?php
/*
 * Collabmed Solutions Ltd
 * Project: iClinic
 * Author: Samuel Okoth <sodhiambo@collabmed.com>
 */
$user = $data['user'];
$profile = $user->profile;
?>
@extends('layouts.app')

@section('content_title','Profile')
@section('content_description','Edit your profile information')

@section('content')
<div class="box box-info">
    <div class="form-horizontal">
        {!! Form::open(['route'=>['setup.userprofile',$user->id]]) !!}
        <div class="box-body">
            <div class="box-body">
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('title') ? ' has-error' : '' }}">
                        {!! Form::label('title', 'Title',['class'=>'control-label col-md-4']) !!}
                        <div class="col-md-8">
                            {!! Form::select('title',config('users.titles') ,old('title',$profile->title), ['class' => 'form-control',]) !!}
                            {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('first_name') ? ' has-error' : '' }}">
                        {!! Form::label('name', 'First Name',['class'=>'control-label col-md-4']) !!}
                        <div class="col-md-8">
                            {!! Form::text('first_name', old('first_name',$profile->first_name), ['class' => 'form-control', 'placeholder' => 'First Name']) !!}
                            {!! $errors->first('first_name', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('middle_name') ? ' has-error' : '' }}">
                        {!! Form::label('name', 'Middle Name',['class'=>'control-label col-md-4']) !!}
                        <div class="col-md-8">
                            {!! Form::text('middle_name', old('middle_name',$profile->middle_name), ['class' => 'form-control', 'placeholder' => 'Middle Name']) !!}
                            {!! $errors->first('middle_name', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('last_name') ? ' has-error' : '' }}">
                        {!! Form::label('name', 'Last Name',['class'=>'control-label col-md-4']) !!}
                        <div class="col-md-8">
                            {!! Form::text('last_name', old('last_name',$profile->last_name), ['class' => 'form-control', 'placeholder' => 'Last Name']) !!}
                            {!! $errors->first('last_name', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>

                    <div class="form-group {{ $errors->has('job') ? ' has-error' : '' }}">
                        {!! Form::label('job', 'Job Description',['class'=>'control-label col-md-4']) !!}
                        <div class="col-md-8">
                            {!! Form::textarea('job', old('job',$profile->job_description), ['class' => 'form-control', 'placeholder' => 'Job Description','rows'=>3]) !!}
                            {!! $errors->first('job', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group {{ $errors->has('mobile') ? ' has-error' : '' }}">
                        {!! Form::label('mobile', 'Mobile',['class'=>'control-label col-md-4']) !!}
                        <div class="col-md-8">
                            {!! Form::text('mobile', old('mobile',$profile->phone), ['class' => 'form-control', 'placeholder' => 'Mobile No.']) !!}
                            {!! $errors->first('mobile', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('mpdb') ? ' has-error' : '' }}">
                        {!! Form::label('mpdb', 'MPDB No',['class'=>'control-label col-md-4']) !!}
                        <div class="col-md-8">
                            {!! Form::text('mpdb', old('mpdb',$profile->mpdb), ['class' => 'form-control', 'placeholder' => 'MPDB number']) !!}
                            {!! $errors->first('mpdb', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('pin') ? ' has-error' : '' }}">
                        {!! Form::label('pin', 'PIN',['class'=>'control-label col-md-4']) !!}
                        <div class="col-md-8">
                            {!! Form::text('pin', old('pin',$profile->pin), ['class' => 'form-control', 'placeholder' => 'PIN']) !!}
                            {!! $errors->first('pin', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                        {!! Form::label('email', 'Email',['class'=>'control-label col-md-4']) !!}
                        <div class="col-md-8">
                            {!! Form::email('email', old('email',$user->email), ['class' => 'form-control', 'placeholder' => 'User email']) !!}
                            {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('login') ? ' has-error' : '' }}">
                        {!! Form::label('login', 'Login ID',['class'=>'control-label col-md-4']) !!}
                        <div class="col-md-8">
                            {!! Form::text('login', old('login',$user->username), ['class' => 'form-control', 'placeholder' => 'Username','readonly']) !!}
                            {!! $errors->first('login', '<span class="help-block">:message</span>') !!}
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
        </div>
        {!! Form::close() !!}
    </div>
</div>
@endsection