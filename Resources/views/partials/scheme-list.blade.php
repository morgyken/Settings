<?php
/*
 * Collabmed Solutions Ltd
 * Project: iClinic
 * Author: Samuel Okoth <sodhiambo@collabmed.com>
 */
?>

<div class="box box-info">
    <div class="box-header">
        <h3 class="box-title">Insurance Schemes</h3><span class="pull-right">
            <button class="btn btn-primary" data-toggle="modal" data-target="#newScheme"><i class="fa fa-plus"></i> Add Scheme</a></button>
        </span>
    </div>
    <div class="box-body">
        <table class="table table-condensed table-responsive">
            <tbody>
            @foreach($data['schemes'] as $scheme)
                <tr id="scheme{{$scheme->id}}">
                    <td>{{$scheme->id}}</td>
                    <td>{{$scheme->name}}</td>
                    <td>{{$scheme->companies->name}}</td>
                    <td>{{mconfig('settings.system.scheme_types.'.$scheme->type)}} {{$scheme->amount}}</td>
                    <td>
                        <a href="{{route('settings.pne.drugs',$scheme->id)}}">Exclusions and Prices</a>
                    </td>
                    <td>
                        <a href="{{route('settings.pne.procedures',$scheme->id)}}">Exclusions and Prices</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Company</th>
                <th>Type</th>
                <th>Drugs</th>
                <th>Procedures</th>
            </tr>
            </thead>
        </table>
    </div>
</div>