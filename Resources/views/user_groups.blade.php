<?php
/*
 * Collabmed Solutions Ltd
 * Project: iClinic
 * Author: Samuel Okoth <sodhiambo@collabmed.com>
 */
?>

@extends('layouts.app')
@section('content_title','User Groups and Roles')
@section('content_description','Add user groups and permissions')

@section('content')
<!--
<div class="box box-info">
<div class="box-body">

</div>
</div>-->
<div class="box box-info">
    <div class="box-body">
        <table class="table table-hover table-striped table-condensed">
            <tbody>
                @foreach($data['user_groups'] as $group)
                <tr>
                    <td>{{$group->name}}</td>
                    <td>{{ucfirst($group->type)}}</td>
                    <td>
                        <a href="{{route('setup.permissions',$group->id)}}">
                            <i class="fa fa-lock"></i> Edit Permissions</a>
                        @if($group->type!='inbuilt')
                      <!--  <button class="btn btn-xs btn-danger"><i class="fa fa-trash-o"></i> Remove</button>-->
                        <button class="btn btn-xs btn-warning"><i class="fa fa-ban"></i> Disable</button>
                        @endif
                    </td>
                </tr>
                @endforeach
            </tbody>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
        </table>
    </div>
</div>
@endsection