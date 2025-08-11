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

                <a class="nav-link <?php if($page == 'video_brochure') echo 'active active_red'  ?>"
                    href="{{route('company.products.add_video_brochure')}}"
                    aria-selected="false">Video Brochure</a>
                   <div class="dropdown-divider"></div>


                <a class="nav-link <?php if($page == 'higher_education') echo 'active active_red'  ?>"
                 href="{{route('company.products.add_higher_education')}}"
                 aria-selected="false">Higher Note Book</a>
                <div class="dropdown-divider"></div>

                <a class="nav-link <?php if($page == 'twenty_leaves') echo 'active active_red'  ?>"
                 href="{{route('company.products.add_twenty_leaves')}}"
                 aria-selected="false">20 Leaves Note Book </a>
                <div class="dropdown-divider"></div>

                <a class="nav-link <?php if($page == 'forty_leaves') echo 'active active_red'  ?>"
                href="{{route('company.products.add_forty_leaves')}}"
                aria-selected="false">40 Leaves Note Book</a>
               <div class="dropdown-divider"></div>

               <a class="nav-link <?php if($page == 'sixty_leaves') echo 'active active_red'  ?>"
                href="{{route('company.products.add_sixty_leaves')}}"
                aria-selected="false">60 Leaves Note Book</a>
               <div class="dropdown-divider"></div>

                <a class="nav-link <?php if($page == 'eighty_leaves') echo 'active active_red'  ?>"
                href="{{route('company.products.add_eighty_leaves')}}"
                aria-selected="false">80 Leaves Note Book</a>
               <div class="dropdown-divider"></div>

               <a class="nav-link <?php if($page == '2A_notebook') echo 'active active_red'  ?>"
                href="{{route('company.products.add_2A_notebook')}}"
                aria-selected="false">2A  Note Book</a>
               <div class="dropdown-divider"></div>

               <a class="nav-link <?php if($page == '2B_notebook') echo 'active active_red'  ?>"
                href="{{route('company.products.add_2B_notebook')}}"
                aria-selected="false">2B  Note Book</a>
               <div class="dropdown-divider"></div>

               <a class="nav-link <?php if($page == '2D_notebook') echo 'active active_red'  ?>"
                href="{{route('company.products.add_2D_notebook')}}"
                aria-selected="false">2D Note Book</a>
               <div class="dropdown-divider"></div>

                <a class="nav-link <?php if($page == 'drawing_book') echo 'active active_red'  ?>"
                href="{{route('company.products.add_drawing_book')}}"
                aria-selected="false">Drawing Book</a>
               <div class="dropdown-divider"></div>

            </div>

        </div>
    </div>
</div>
