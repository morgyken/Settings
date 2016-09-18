<?php
/*
 * Collabmed Solutions Ltd
 * Project: iClinic
 *  Author: Samuel Okoth <sodhiambo@collabmed.com>
 */
$role = $data['user_group'];
$group = 0;
//$allowed = $role->roles->pluck('permission_id')->toArray();
?>

@extends('layouts.app')
@section('content_title','Access privileges and permissions')
@section('content_description','Edit access areas for user group')

@section('content')
<div class="box box-info">
    <div class="box-header">
        <div class="col-md-5">
            <dl class="dl-horizontal">
                <dt>Name:</dt><dd>{{$role->name}}</dd>
                <dt>System Name:</dt><dd><code>{{$role->name}}</code></dd>

            </dl>
        </div>
        <div class="col-md-7">
            <dl class="dl-horizontal">
                <dt>Group Type:</dt><dd>{{$role->type}}</dd>
                <dt>Description:</dt><dd>{{$role->description ?? 'Not available'}}</dd>
            </dl>
        </div>
    </div>
    <div class="box-body">
        <div class="col-md-12">
            {!! Form::open(['route' => ['setup.permissions.update', $role->id]]) !!}
            <div class="row">
                <div class="col-md-12">
                    <div class="nav-tabs-custom">
                        <ul class="nav nav-tabs">
                            <li><a href="#tab_1-1" data-toggle="tab">User Group</a></li>
                            <li class="active"><a href="#tab_2-2" data-toggle="tab">Permissions</a></li>
                            <li><a href="#tab_3-3" data-toggle="tab">Users</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane " id="tab_1-1">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                                {!! Form::label('name', 'Group name') !!}
                                                {!! Form::text('name', old('name', $role->name), ['class' => 'form-control', 'data-slug' => 'source', 'placeholder' => 'Name']) !!}
                                                {!! $errors->first('name', '<span class="help-block">:message</span>') !!}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.tab-pane -->
                            <div class="tab-pane active" id="tab_2-2">
                                @include('setup::partials.permissions', ['model' => $role])
                            </div><!-- /.tab-pane -->
                            <div class="tab-pane" id="tab_3-3">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h3>Users with role</h3>
                                            <ul>
                                                <?php foreach ($role->users as $user): ?>
                                                    <li>
                                                        {{ $user->full_name }}
                                                    </li>
                                                <?php endforeach; ?>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary btn-flat"><i class="fa fa-save"></i> Save</button>
                                <a class="btn btn-danger pull-right btn-flat" href="{{ route('setup.user_groups')}}"><i class="fa fa-times"></i> Cancel</a>
                            </div>
                        </div><!-- /.tab-content -->
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function () {
        $('.jsSelectAllInGroup').on('click', function (event) {
            event.preventDefault();
            $(this).closest('.permissionGroup').find('input[type=checkbox]').each(function (index, value) {
                $(value).iCheck('check');
            });
        });
        $('.jsDeselectAllInGroup').on('click', function (event) {
            event.preventDefault();
            $(this).closest('.permissionGroup').find('input[type=checkbox]').each(function (index, value) {
                $(value).iCheck('uncheck');
            });
        });
    });
</script>

<style>
    .larger {
        font-weight: bold;
    }
    .small-size{
        color: gray;
        padding-left: 30px !important;
    }
</style>
@endsection