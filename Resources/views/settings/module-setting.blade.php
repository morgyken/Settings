<?php
/*
 * =============================================================================
 *
 * Collabmed Solutions Ltd
 * Project: Collabmed Health Platform
 * Author: Samuel Okoth <sodhiambo@collabmed.com>
 *
 * =============================================================================
 */
?>
@extends('layouts.app')

@section('content_title','Settings')
@section('content_description','Setting preferences')

@section('content')
{!! Form::open(['route' => ['settings.settings.save'], 'method' => 'post']) !!}
<div class="row">
    <div class="sidebar-nav col-sm-2">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title">Settings</h3>
            </div>
            <style>
                a.active {
                    text-decoration: none;
                    background-color: #eee;
                }
            </style>
            <ul class="nav nav-list">
                @foreach($data['modulesWithSettings'] as $module => $settings)
                <li>
                    <a href="{{ route('settings.module.settings', [$module]) }}"
                       class="{{ $module == $data['current_module']->getLowerName() ? 'active' : '' }}">
                        {{ ucfirst($module) }}
                        <small class="badge pull-right bg-blue">{{ count($settings) }}</small>
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="col-md-10">
        @if($data['setting'])
        <div class="box box-primary">
            <div class="box-header">
                Settings for <b>{{$data['current_module']}}</b> module
            </div>
            <div class="box-body">
                @include('settings::partials.fields', ['settings' => $data['setting']])
            </div>
        </div>
        @endif
        <div class="box-footer">
            <button type="submit" class="btn btn-primary btn-flat">Update</button>
            <button class="btn btn-default btn-flat" name="button" type="reset">Reset</button>
            <a class="btn btn-danger pull-right btn-flat" href="{{route('settings.settings')}}">
                <i class="fa fa-times"></i> Cancel</a>
        </div>
    </div>
</div>
{!! Form::close() !!}
@stop

@section('scripts')
<script>
    $(document).ready(function () {
        $('input[type="checkbox"].flat-blue, input[type="radio"].flat-blue').iCheck({
            checkboxClass: 'icheckbox_flat-blue',
            radioClass: 'iradio_flat-blue'
        });

        $('input[type="checkbox"]').on('ifChecked', function () {
            $(this).parent().find('input[type=hidden]').remove();
        });

        $('input[type="checkbox"]').on('ifUnchecked', function () {
            var name = $(this).attr('name'),
                    input = '<input type="hidden" name="' + name + '" value="0" />';
            $(this).parent().append(input);
        });
    });
</script>
@stop
