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
@section('content_title','Define Exclusions')
@section('content_description','Define product exclusions')

@section('content')
<div class="box box-info">
    <div class="box-body">
        <div class="row">
            <div class="col-md-12">
                @if(!$data['products']->isEmpty())
                <table class="table table-responsive table-striped">
                    <tbody>
                        @foreach($data['products'] as $product)
                        <?php $excluded = is_excluded($data['excluded'], $product); ?>
                        <tr id="category{{$product->id}}">
                            <td>{{$product->product_code}}</td>
                            <td>{{$product->name}}</td>
                            <td>{{$product->prices->price ?? '-'}}</td>
                            <td>N/A</td>
                            <td><span>{{$excluded?'Excluded':'Included'}}</span>
                            </td>
                            <td><button value="{{$product->id}}" class="btn btn-xs btn-primary {{$excluded?'include':'exclude'}}">
                                    {{$excluded?'Include':'Exclude'}}</button>
                                <!--|
                                <button class="btn btn-danger btn-xs delete" value="{{$product->id}}">
                                    <i class="fa fa-trash-o"></i> Delete
                                </button>-->
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    <thead>
                        <tr>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Cost</th>
                            <th>Scheme Cost</th>
                            <th style="width: 20%;">Status</th>
                            <th></th>
                        </tr>
                    </thead>
                </table>
                @else
                <div class="alert alert-info">
                    <p>No products</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
<script>
    var EXCLUDE_URL = "{{route('setup.ajax.exclude_scheme')}}";
    var scheme_id = "{{$data['scheme']->id}}";
</script>
<script src="{{Module::asset('setup:js/exclusions.min.js')}}"></script>
@endsection