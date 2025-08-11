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
                <a class="nav-link <?php if($page == 'color_logo') echo 'active active_red'  ?>"
                 href="{{route('company.settings.site.color_logo')}}"
                 aria-selected="false">Sit Logo</a>
                <div class="dropdown-divider"></div>

                <a class="nav-link <?php if($page == 'theme') echo 'active active_red'  ?>"
                    href="{{route('company.settings.site.theme')}}"
                    aria-selected="false">Site Theme</a>
                   <div class="dropdown-divider"></div>
   


                <a class="nav-link <?php if($page == 'hero_text') echo 'active active_red'  ?>"
                    href="{{route('company.settings.site.hero_text')}}"
                    aria-selected="false">Hero Text</a>
                   <div class="dropdown-divider"></div>

                <a class="nav-link <?php if($page == 'address') echo 'active active_red'  ?>"
                href="{{route('company.settings.site.address')}}"
                aria-selected="false">Office Address </a>
                <div class="dropdown-divider"></div>

                <a class="nav-link <?php if($page == 'phone') echo 'active active_red'  ?>"
                    href="{{route('company.settings.site.phone')}}"
                    aria-selected="false">Office Phone </a>
                   <div class="dropdown-divider"></div>

                   <a class="nav-link <?php if($page == 'email') echo 'active active_red'  ?>"
                    href="{{route('company.settings.site.email')}}"
                    aria-selected="false">Office Email </a>
                   <div class="dropdown-divider"></div>

            </div>

        </div>
    </div>
</div>
