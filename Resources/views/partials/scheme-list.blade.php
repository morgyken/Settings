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
            <button  class="btn btn-primary" data-toggle="modal" data-target="#newScheme"><i class="fa fa-plus" ></i> Add Scheme</a></button>
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
                        @if(is_module_enabled('Inventory'))
                        <a href="{{route('settings.exclusions',$scheme->id)}}"><i class="fa fa-bell-slash"></i> Exclusions</a>
                        @endif
                        <!--
                        <button class="btn btn-danger btn-xs delete" value="{{$scheme->scheme_id}}">
                            <i class="fa fa-trash-o"></i> Delete</button>-->
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
                    <th></th>
                </tr>
            </thead>
        </table>
    </div>
</div>