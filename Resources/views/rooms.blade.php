<?php
extract($data);
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
@section('content_title','Facility Rooms')
@section('content_description','Add Patient Evaluation Rooms')

@section('content')
    <div class="box box-info">
        {!! Form::model($data['room'],['id'=>'room_form','route'=>'settings.rooms.save']) !!}
        <div class="box-header with-border">
            <h3 class="box-title">Facility Rooms</h3>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="form-inline">
                    <div class="col-md-12">
                        {{Form::hidden('id')}}
                        <div class="form-group {{ $errors->has('facility_id') ? ' has-error' : '' }} req">
                            {!! Form::label('facility_id', 'Facility',['class'=>'control-label']) !!}
                            {!! Form::select('facility_id',$clinics, old('facility_id'), ['class' => 'form-control', 'placeholder' => 'Select practice']) !!}
                            {!! $errors->first('facility_id', '<span class="help-block">:message</span>') !!}
                        </div>
                        <div class="form-group {{ $errors->has('name') ? ' has-error' : '' }} req">
                            {!! Form::label('name', 'Room Name/Number',['class'=>'control-label']) !!}
                            {!! Form::text('name', old('name'), ['class' => 'form-control', 'placeholder' => 'Name or number']) !!}
                            {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
                        </div>
                        <button type="submit" class="btn btn-success"><i class="fa fa-save"></i> Save</button>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-stripped">
                        <tbody>
                        @foreach($rooms as $room)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$room->facility->name}}</td>
                                <td>{{$room->name}}</td>
                                <td><a href="{{route('settings.rooms',$room->id)}}" class="btn btn-xs btn-default"><i
                                                class="fa fa-edit"></i> Edit</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Facility</th>
                            <th>Name/Number</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                    </table>

                </div>
            </div>
        </div>
        {!! Form::close() !!}
    </div>
@endsection