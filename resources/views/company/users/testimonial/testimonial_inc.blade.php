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
                <a class="nav-link <?php if($page == 'view_testimonial') echo 'active active_red'  ?>"
                 href="{{route('company.users.testimonial.view_testimonial',[$testimonial->id])}}"
                 aria-selected="false">View Tesimonial</a>
                <div class="dropdown-divider"></div>

                <a class="nav-link <?php if($page == 'edit_testimonial') echo 'active active_red'  ?>"
                 href="{{route('company.users.testimonial.edit_testimonial',[$testimonial->id])}}"
                 aria-selected="false">Edit Testimonial </a>
                <div class="dropdown-divider"></div>

                <a class="nav-link <?php if($page == 'all_testimonial') echo 'active active_red'  ?>"
                    href="{{route('company.users.testimonial.all_testimonials')}}"
                    aria-selected="false">All Testimonial </a>
                   <div class="dropdown-divider"></div>



                <a class="nav-link"
                    href="{{route('company.users.testimonial.delete_testimonial',[$testimonial->id])}}" onclick="return confirm('Are you sure you want to delete this testimonial?');"
                    aria-selected="false">Delete Testimonial </a>
                   <div class="dropdown-divider"></div>



            </div>

        </div>
    </div>
</div>
