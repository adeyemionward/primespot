<style>
    .active_red{
        background-color: #df4226 !important;
    }
</style>
<div class="col-md-3 col-xl-3">
    <div class="card mb-3">
        <div class="card-body text-center">
            <!--<h5 class="card-title mb-3 text-primary">Select Entity</h5> -->

            <div class="nav nav-pills flex-column bg-white"
                id="nav-tab" role="tablist">
                <a class="nav-link <?php if($page == 'view') echo 'active active_red'  ?>"
                    href="{{route('admin.users.view', request()->id)}}"
                    aria-selected="false">View User</a>
                   <div class="dropdown-divider"></div>

                <a class="nav-link <?php if($page == 'edit') echo 'active active_red'  ?>" id="nav-database-tab"
                href="{{route('admin.users.edit', request()->id)}}"
                aria-selected="false">Edit User </a>
               <div class="dropdown-divider"></div>
                
                @if ($user->status == 'active')
                   <a class="nav-link" id="nav-database-tab" onclick="return confirm('Are you sure you want to deactivate this user?');"
                    href="{{route('admin.users.deactivate', request()->id)}}"
                    aria-selected="false">Deactivate User </a>
                @elseif ($user->status == 'inactive')
                   <a class="nav-link" id="nav-database-tab" onclick="return confirm('Are you sure you want to activate this user?');"
                    href="{{route('admin.users.activate', request()->id)}}"
                    aria-selected="false">Activate User </a>
                @endif
                
                <a class="nav-link" id="nav-database-tab" onclick="return confirm('Are you sure you want to delete this user?');"
                 href="{{route('admin.users.delete', request()->id)}}"
                 aria-selected="false">Delete User </a>
                <div class="dropdown-divider"></div>

            </div>

        </div>
    </div>
</div>
