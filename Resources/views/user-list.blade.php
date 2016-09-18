<?php
/*
 * Collabmed Solutions Ltd
 * Project: iClinic
 * Author: Samuel Okoth <sodhiambo@collabmed.com>
 */
?>

<div class="box box-info">
    <div class="box-header">
        <h3 class="box-title">Users</h3>
    </div>
    <div class="box-body">
        <table class="table table-condensed table-responsive">
            <tbody>
                @foreach($data['users'] as $user)
                <tr>
                    <td>{{$user->profile->full_name}}</td>
                    <td>{{$user->username}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{get_role($user->roles)}}</td>
                    <td>{{smart_date($user->created_at)}}</td>
                    <td>
                        <a class="btn btn-primary btn-xs" href="{{route('setup.userprofile',$user->id)}}" >
                            <i class="fa fa-pencil-square-o"></i> Edit
                        </a>
                        <!--|
                        <button class="btn btn-danger btn-xs delete" value="{{$user->user_id}}">
                            <i class="fa fa-trash-o"></i> Delete</button>-->
                    </td>
                </tr>
                @endforeach
            </tbody>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Registered</th>
                    <th>Actions</th>
                </tr>
            </thead>
        </table>
    </div>
</div>

