
@extends('company.layout.master')
@section('content')
@section('title', 'All Roles')
    <div class="content">
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-md-6 float-start">
                    <h4 class="m-0 text-dark text-muted">Roles & Permission</h4>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb float-end">
                        <a href="{{route('company.roles.add_role')}}"><li class="active btn btn-primary" style="">Add Role</li></a>
                    </ol>
                </div>
            </div>

            <div class="card">
                <div class="content" id="tableContent">

                    <div class="canvas-wrapper">

                        <table id="example" class="table no-margin" style="width:100%">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Role&nbsp;Name</th>
                                    <th>Role Permissions</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($rolesWithPermissions as $index => $roleWithPermissions)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td><strong>{{ ucfirst($roleWithPermissions['role']) }}</strong></td>
                                        <td>{{ $roleWithPermissions['permissions'] }}</td>
                                        <td>
                                            <a href="{{route('company.roles.edit_role',$roleWithPermissions['role_id'])}}"><span><i class="fa fa-edit"></i></span></a>
                                            <a href="{{route('company.roles.delete_role',$roleWithPermissions['role_id'])}} " onclick="return confirm('Are you sure you want to delete this role?');"><span><i class="fa fa-trash"></i></span></a>
                                        </td>
                                    </tr>
                                @endforeach


                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection

