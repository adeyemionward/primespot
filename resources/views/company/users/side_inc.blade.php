<style>
    .active_red{
        background-color: #df4226 !important;
    }
</style>
{{-- add role to user modal --}}
<form method="POST"  action="{{route('company.users.add_user_role',[request()->user_company_id])}}" class="user_role">
    @csrf
    @method('POST')
    <div class="modal fade" id="exampleModal" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Role to User</h5>
                    <button type="button" class="btn-close"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group col-md-12">
                        <label for="backsided">Select a Role</label>
                        <select required class="form-control form-select"  name="role" id="role">
                            <option value="">--select a role--</option>
                            {{-- <option value="Designed">Admin</option> --}}
                            @foreach ($roles as $val)
                                <option value="{{$val->name}}" <?php if($val->name == $current_role) echo 'selected' ?>>{{$val->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary"
                        data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-sm btn-danger" type="submit">
                        <i class="text-white me-2" data-feather="check-circle"></i>Save changes
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>


{{-- update password of  user modal --}}
<form method="POST"  action="{{route('company.users.update_password',[request()->user_company_id])}}" class="update_password">
    @csrf
    @method('POST')
    <div class="modal fade" id="exampleModal1" tabindex="-1"
    aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Update User Password</h5>
                    <button type="button" class="btn-close"
                        data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="form-group mt-3 mb-3 col-md-12">
                        <label for="password">Password:</label>
                        <input type="password" required name="password" id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}">
                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-3 mb-3 col-md-12">
                        <label for="confirm_password">Confirm Password:</label>
                        <input type="password" required name="password_confirmation" id="password_confirmation" class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}">
                        @error('password_confirmation')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-secondary"
                        data-bs-dismiss="modal">Close</button>
                    <button class="btn btn-sm btn-danger" type="submit">
                        <i class="text-white me-2" data-feather="check-circle"></i>Save changes
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
<div class="col-md-3 col-xl-3">
    <div class="card mb-3">
        <div class="card-body text-center">

            <div class="nav nav-pills flex-column bg-white"
                id="nav-tab" role="tablist">
                <a class="nav-link <?php if($page == 'view') echo 'active active_red'  ?>"
                    href="{{route('company.users.view_user', request()->user_company_id)}}"
                    aria-selected="false">View User</a>
                   <div class="dropdown-divider"></div>

                <a  class="nav-link <?php if($page == 'edit') echo 'active active_red'  ?>" id="nav-database-tab"
                    href="{{route('company.users.edit_user', request()->user_company_id)}}"
                    aria-selected="false">Update User Details </a>


                <div class="dropdown-divider"></div>


                <a style="cursor: pointer" id="myBtn1" data-bs-toggle="modal" data-bs-target="#exampleModal1" class="nav-link <?php if($page == 'password') echo 'active active_red'  ?>" id="nav-database-tab"

                    aria-selected="false">Update User Password </a>

                <div class="dropdown-divider"></div>

                <a style="cursor: pointer" id="myBtn1" data-bs-toggle="modal" data-bs-target="#exampleModal" class="nav-link <?php if($page == 'role') echo 'active active_red'  ?>" id="nav-database-tab"

                    aria-selected="false">Add Role to User </a>
                <div class="dropdown-divider"></div>

                <a class="nav-link" id="nav-database-tab" onclick="return confirm('Are you sure you want to deactivate this user?');"
                    href="{{route('company.users.delete_user', request()->user_company_id)}}"
                    aria-selected="false">Deactivate User </a>
                <div class="dropdown-divider"></div>

            </div>
        </div>
    </div>
</div>
