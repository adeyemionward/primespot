<style>
    .active_red{
        background-color: #df4226 !important;
    }
</style>
<div class="col-md-3 col-xl-3">
    <div class="card mb-3">
        <div class="card-body text-center">

            <div class="nav nav-pills flex-column bg-white"
                id="nav-tab" role="tablist">
                <a class="nav-link <?php if($page == 'view_location') echo 'active active_red'  ?>"
                 href="{{route('company.job_order.location.view_location',[$location->id])}}"
                 aria-selected="false">View Location</a>
                <div class="dropdown-divider"></div>

                <a class="nav-link <?php if($page == 'edit_location') echo 'active active_red'  ?>"
                 href="{{route('company.job_order.location.edit_location',[$location->id])}}"
                 aria-selected="false">Edit Location </a>
                <div class="dropdown-divider"></div>

                <a class="nav-link <?php if($page == 'all_location') echo 'active active_red'  ?>"
                    href="{{route('company.job_order.location.all_locations')}}"
                    aria-selected="false">All Location </a>
                   <div class="dropdown-divider"></div>



                <a class="nav-link <?php if($page == 'all_location') echo 'active active_red'  ?>"
                    href="{{route('company.job_order.location.delete_location',[$location->id])}}" onclick="return confirm('Are you sure you want to delete this location?');"
                    aria-selected="false">Delete Location </a>
                   <div class="dropdown-divider"></div>



            </div>

        </div>
    </div>
</div>
