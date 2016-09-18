<?php
/**
 * Created by PhpStorm.
 * User: samuel
 * Date: 3/27/16
 * Time: 4:29 PM
 */
?>
<div class="box box-info">
    <div class="box-header">
        <h3 class="box-title">Facilities</h3>
    </div>
    <div class="box-body">
        @if($data['clinics']->count()>0)
        <table class="table table-condensed table-responsive">
            <tbody>
                @foreach($data['clinics'] as $clinic)
                <tr id="clinic{{$clinic->id}}">
                    <td>{{$clinic->id}}</td>
                    <td>{{$clinic->name}}</td>
                    <td>{{$clinic->town}}</td>
                    <td>{{mconfig('settings.system.clinic_types.'.$clinic->type)}}</td>
                    <td>
                        <a class="btn btn-primary btn-xs"
                           href="{{route('settings.clinics',$clinic->id)}}" >
                            <i class="fa fa-pencil-square-o"></i> Edit
                        </a><!-- |
                        <button class="btn btn-danger btn-xs delete" value="{{$clinic->clinic_id}}">
                            <i class="fa fa-trash-o"></i> Delete</button>-->
                    </td>
                </tr>
                @endforeach
            </tbody>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Town</th>
                    <th>Type</th>
                    <th>Actions</th>
                </tr>
            </thead>
        </table>
        @else
        <p>No facilities!</p>
        @endif
    </div>
    <div class="box-footer">

    </div>
</div>