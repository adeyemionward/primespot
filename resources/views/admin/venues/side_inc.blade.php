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
                    href="{{route('admin.venues.view', request()->id)}}"
                    aria-selected="false">View Venue</a>
                   <div class="dropdown-divider"></div>

                <a class="nav-link <?php if($page == 'edit') echo 'active active_red'  ?>" id="nav-database-tab"
                href="{{route('admin.venues.edit', request()->id)}}"
                aria-selected="false">Edit Venue </a>
               <div class="dropdown-divider"></div>

               <a class="nav-link <?php if($page == 'screens') echo 'active active_red'  ?>" id="nav-database-tab"
                href="{{route('admin.venues.screens', request()->id)}}"
                aria-selected="false">Venue Screens </a>
               <div class="dropdown-divider"></div>
                
                @if ($venue->status == 'active')
                   <a class="nav-link" id="nav-database-tab" onclick="return confirm('Are you sure you want to deactivate this venue?');"
                    href="{{route('admin.venues.deactivate', request()->id)}}"
                    aria-selected="false">Deactivate Venue </a>
                @elseif ($venue->status == 'inactive')
                   <a class="nav-link" id="nav-database-tab" onclick="return confirm('Are you sure you want to activate this venue?');"
                    href="{{route('admin.venues.activate', request()->id)}}"
                    aria-selected="false">Activate Venue </a>
                @endif
                

            </div>

        </div>
    </div>
</div>
