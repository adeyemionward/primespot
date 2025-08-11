
@extends('company.layout.master')
@section('content')
@section('title', 'Add Role')
    @can('role-create')

        <div class="content">
            <div class="container-fluid">
                <div class="row mt-2">
                    <div class="col-md-6 float-start">
                        <h4 class="m-0 text-dark text-muted">Role</h4>
                    </div>
                    <div class="col-md-6">
                        <ol class="breadcrumb float-end">
                            <a href="{{route('company.roles.all_roles')}}"><li class="active btn btn-primary" style="">Role List</li></a>
                        </ol>
                    </div>
                </div>
                <div class="content">
                    <div class="canvas-wrapper">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12 col-xl-12">
                                        <div class="card">
                                            <div class="card-header bg-white">
                                                <h5 class="card-title mb-0 text-muted">Create User Role </h5>
                                            </div>
                                            <div class="card-body h-100"> 
                                                <div class="align-items-start">
                                                    <div class="tab-content" id="nav-tabContent">
                                                        <div class="tab-pane fade show active" id="nav-server" role="tabpanel" aria-labelledby="nav-server-tab">
                                                            <div class="row g-3 mb-3 mt-3">
                                                                <div class="col-md-12">
                                                                    <form method="POST"  id="add_user" class="add_user">
                                                                        @csrf
                                                                        @method('POST')
                                                                        <div class="row">
                                                                            <div class="form-group mt-3 mb-3 col-md-12">
                                                                                <label for="name">Role Name:</label>
                                                                                <input type="text" required  name="name" id="role" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{ old('name') }}">
                                                                                @error('name')
                                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                                @enderror
                                                                            </div>


                                                                            <div class="form-group mt-3 mb-3 row">
                                                                                <div class="col-md-12">
                                                                                    <input type="checkbox" id="selectAll"><strong> &nbsp;Select All Permissions</strong>  <br>


                                                                                    <div class="row">
                                                                                        @foreach ($groupedPermissions as $prefix => $permissions)
                                                                                            <div class="col-md-4">
                                                                                                <h4>{{ ucfirst($prefix) }} Permissions</h4>
                                                                                                <ul>
                                                                                                    @foreach ($permissions as $permission)
                                                                                                        <li>
                                                                                                            <input type="checkbox" name="permission[]" value="{{ $permission->name }}" id="permission_{{ $permission->id }}" class="checkbox{{ $errors->has('permission') ? ' is-invalid' : '' }}">
                                                                                                            <label for="permission_{{ $permission->id }}">{{ $permission->name }}</label>
                                                                                                        </li>
                                                                                                    @endforeach
                                                                                                </ul>
                                                                                            </div>
                                                                                        @endforeach
                                                                                    </div>

                                                                                    @error('permission')
                                                                                        <div class="invalid-feedback">{{ $message }}</div>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>


                                                                        </div>

                                                                        <button class="btn btn-sm btn-danger" type="submit">
                                                                            <i class="text-white me-2" data-feather="check-circle"></i>Save
                                                                        </button>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endcan
@endsection

@section('scripts')
    <script>
        $(document).ready(function(){
            // When the "Select All" button is clicked
            $("#selectAll").click(function(){
                // Set the 'checked' property of all checkboxes with the class 'checkbox' to true
                $('.checkbox').prop('checked', this.checked);
            });
        });
    </script>
@endsection



