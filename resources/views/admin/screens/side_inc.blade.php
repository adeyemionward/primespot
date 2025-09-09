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
                    href="{{route('admin.screens.view', request()->id)}}"
                    aria-selected="false">View screen</a>
                   <div class="dropdown-divider"></div>

                <a class="nav-link <?php if($page == 'edit') echo 'active active_red'  ?>" id="nav-database-tab"
                href="{{route('admin.screens.edit', request()->id)}}"
                aria-selected="false">Edit screen </a>
               <div class="dropdown-divider"></div>

               <a class="nav-link" id="nav-database-tab"onclick="return confirm('Are you sure you want to delete this screen?');"
                href="{{route('admin.screens.delete', request()->id)}}"
                aria-selected="false">Delete screen </a>
               <div class="dropdown-divider"></div>

                @if ($screen->status == 'available')
                   <a class="nav-link" id="nav-database-tab" onclick="return confirm('Are you sure you want to deactivate this screen?');"
                    href="{{route('admin.screens.deactivate', request()->id)}}"
                    aria-selected="false">Deactivate screen </a>
                @elseif ($screen->status == 'unavailable')
                   <a class="nav-link" id="nav-database-tab" onclick="return confirm('Are you sure you want to activate this screen?');"
                    href="{{route('admin.screens.activate', request()->id)}}"
                    aria-selected="false">Activate screen </a>
                @endif


            </div>

        </div>
    </div>
</div>
