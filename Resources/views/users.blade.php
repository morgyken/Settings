<?php
/*
 * Collabmed Solutions Ltd
 * Project: iClinic
 * Author: Samuel Okoth <sodhiambo@collabmed.com>
 */
?>

@extends('layouts.app')
@section('content_title','System Users')
@section('content_description','Add and view users')

@section('content')
<div class="form-horizontal">
    {!! Form::open() !!}
    <div class="box box-info">
        <div class="box-body">
            <div class="col-md-6">
                <div class="form-group req {{ $errors->has('title') ? ' has-error' : '' }}">
                    {!! Form::label('title', 'Title',['class'=>'control-label col-md-4']) !!}
                    <div class="col-md-8">
                        {!! Form::select('title',config('users.titles') ,old('title'), ['class' => 'form-control',]) !!}
                        {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                <div class="form-group req {{ $errors->has('first_name') ? ' has-error' : '' }}">
                    {!! Form::label('name', 'First Name',['class'=>'control-label col-md-4']) !!}
                    <div class="col-md-8">
                        {!! Form::text('first_name', old('first_name'), ['class' => 'form-control', 'placeholder' => 'First Name']) !!}
                        {!! $errors->first('first_name', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                <div class="form-group  {{ $errors->has('middle_name') ? ' has-error' : '' }}">
                    {!! Form::label('name', 'Middle Name',['class'=>'control-label col-md-4']) !!}
                    <div class="col-md-8">
                        {!! Form::text('middle_name', old('middle_name'), ['class' => 'form-control', 'placeholder' => 'Middle Name']) !!}
                        {!! $errors->first('middle_name', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                <div class="form-group req {{ $errors->has('last_name') ? ' has-error' : '' }}">
                    {!! Form::label('name', 'Last Name',['class'=>'control-label col-md-4']) !!}
                    <div class="col-md-8">
                        {!! Form::text('last_name', old('last_name'), ['class' => 'form-control', 'placeholder' => 'Last Name']) !!}
                        {!! $errors->first('last_name', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>

                <div class="form-group {{ $errors->has('job') ? ' has-error' : '' }}">
                    {!! Form::label('job', 'Job Description',['class'=>'control-label col-md-4']) !!}
                    <div class="col-md-8">
                        {!! Form::textarea('job', old('job'), ['class' => 'form-control', 'placeholder' => 'Job Description','rows'=>3]) !!}
                        {!! $errors->first('job', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group {{ $errors->has('mpdb') ? ' has-error' : '' }}">
                    {!! Form::label('mpdb', 'MPDB No',['class'=>'control-label col-md-4']) !!}
                    <div class="col-md-8">
                        {!! Form::text('mpdb', old('mpdb'), ['class' => 'form-control', 'placeholder' => 'MPDB number']) !!}
                        {!! $errors->first('mpdb', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                <div class="form-group req {{ $errors->has('mobile') ? ' has-error' : '' }}">
                    {!! Form::label('tel', 'Mobile',['class'=>'control-label col-md-4']) !!}
                    <div class="col-md-8">
                        {!! Form::text('mobile', old('mobile'), ['class' => 'form-control', 'placeholder' => 'Mobile No.']) !!}
                        {!! $errors->first('mobile', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                <div class="form-group req {{ $errors->has('email') ? ' has-error' : '' }}">
                    {!! Form::label('email', 'Email',['class'=>'control-label col-md-4']) !!}
                    <div class="col-md-8">
                        {!! Form::email('email', old('email'), ['class' => 'form-control', 'placeholder' => 'User email']) !!}
                        {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                <div class="form-group req {{ $errors->has('login') ? ' has-error' : '' }}">
                    {!! Form::label('login', 'Login ID',['class'=>'control-label col-md-4']) !!}
                    <div class="col-md-8">
                        {!! Form::text('login', old('login'), ['class' => 'form-control', 'placeholder' => 'Username','autocomplete'=>'off']) !!}
                        {!! $errors->first('login', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                <div class="form-group req {{ $errors->has('password') ? ' has-error' : '' }}">
                    {!! Form::label('password', 'Password',['class'=>'control-label col-md-4']) !!}
                    <div class="col-md-8">
                        {!! Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password','autocomplete'=>'off']) !!}
                        {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                    </div>
                </div>
                <div class="form-group req {{ $errors->has('user_group') ? ' has-error' : '' }}">
                    {!! Form::label('user_group', 'Group',['class'=>'control-label col-md-4']) !!}
                    <div class="col-md-8">
                        {!! Form::select('user_group',$data['roles'], old('user_group'), ['class' => 'form-control', 'placeholder' => 'select...']) !!}
                        {!! $errors->first('user_group', '<span class="help-block">:message</span>') !!}
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
                <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Add User</button>
            </div>
        </div>
    </div>
    {!! Form::close() !!}
</div>
@include('setup::user-list')
@endsection