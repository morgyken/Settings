<?php
/*
 * Collabmed Solutions Ltd
 * Project: iClinic
 * Author: Samuel Okoth <sodhiambo@collabmed.com>
 */
?>
<div class="box box-info">
    <div class="box-header">
        <h3 class="box-title">Insurance Companies</h3>
    </div>
    <div class="box-body">
        @if($data['companies']->count()>0)
        <table class="table table-condensed table-responsive">
            <tbody>
                @foreach($data['companies'] as $company)
                <tr id="company{{$company->id}}">
                    <td>{{$company->name}}</td>
                    <td>{{$company->telephone}}</td>
                    <td>{{$company->email}}</td>
                    <td>{{$company->address}} {{$company->post_code}} {{$company->town}}</td>
                    <td>
                        <a href="{{route('settings.companies',$company->id)}}" class="btn btn-primary btn-xs">
                            <i class="fa fa-edit"></i> Edit</a> |
                        <a href="{{route('settings.schemes',$company->id)}}" class="btn btn-success btn-xs">
                            <i class="fa fa-eye"></i> Schemes</a>|
                        <a href="{{route('settings.company.procedures',$company->id)}}" class="btn btn-primary btn-xs">
                            <i class="fa fa-eye"></i> Procedures</a>
                        <!--| <button class="btn btn-danger btn-xs delete" value="{{$company->id}}">
                        <i class="fa fa-trash-o"></i> Delete</button>-->
                    </td>
                </tr>
                @endforeach
            </tbody>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th></th>
                </tr>
            </thead>
        </table>
        @else
        <p>No companies!</p>
        @endif
    </div>
    <div class="box-footer">

    </div>
</div>