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
                <a class="nav-link <?php if($page == 'higher_education') echo 'active active_red'  ?>"
                 href="{{route('job_order.higher_education')}}"
                 aria-selected="false">Higher Note Book</a>
                <div class="dropdown-divider"></div>

                <a class="nav-link <?php if($page == 'twenty_leaves') echo 'active active_red'  ?>"
                 href="{{route('job_order.20_leaves_book')}}"
                 aria-selected="false">20 Leaves Note Book </a>
                <div class="dropdown-divider"></div>



                <a class="nav-link <?php if($page == 'forty_leaves') echo 'active active_red'  ?>"
                href="{{route('job_order.40_leaves_book')}}"
                aria-selected="false">40 Leaves Note Book</a>
               <div class="dropdown-divider"></div>

                <a class="nav-link <?php if($page == 'eighty_leaves') echo 'active active_red'  ?>"
                href="{{route('job_order.80_leaves_book')}}"
                aria-selected="false">80 Leaves Note Book</a>
               <div class="dropdown-divider"></div>

                {{-- <a class="nav-link" id="nav-database-tab"
                 href="{{route('job_order.small_invoice')}}"
                 aria-selected="false">Invoice Form Template</a>
                <div class="dropdown-divider"></div> --}}



                {{-- <a class="nav-link" id="nav-database-tab"
                data-bs-toggle="tab" href="#nav-database" role="tab"
                aria-controls="nav-database" aria-selected="false">Receipt Form Templates </a>
                <div class="dropdown-divider"></div> --}}



                <a class="nav-link <?php if($page == 'small_invoice') echo 'active active_red'  ?>"
                href="{{route('job_order.small_invoice')}}"
                aria-selected="false">Small Invoice Templates</a>
               <div class="dropdown-divider"></div>

                {{-- <a class="nav-link" id="nav-database-tab"
                 href="{{route('job_order.work_order_templates')}}"
                 aria-selected="false">Work and Service Order Templates </a>
                <div class="dropdown-divider"></div> --}}


               <a class="nav-link <?php if($page == 'bronchures') echo 'active active_red'  ?>"
                href="{{route('job_order.bronchures')}}"
                aria-selected="false">Brochures</a>
               <div class="dropdown-divider"></div>

               <a class="nav-link <?php if($page == 'flyers') echo 'active active_red'  ?>"
                href="{{route('job_order.flyers')}}"
                aria-selected="false">Flyers</a>
               <div class="dropdown-divider"></div>

                {{-- <a class="nav-link" id="nav-config-tab"
                    data-bs-toggle="tab" href="#nav-database" role="tab"
                    aria-controls="nav-config-tab" aria-selected="false">Other Forms Templates</a>
                <div class="dropdown-divider"></div> --}}

                {{-- <a class="nav-link" id="nav-global-params-tab"
                    data-bs-toggle="tab" href="#nav-application" role="tab"
                    aria-controls="nav-global-params-tab"
                    aria-selected="false">View All Specialty Carbonless</a>
                <div class="dropdown-divider"></div> --}}


               <a class="nav-link <?php if($page == 'business_cards') echo 'active active_red'  ?>"
                href="{{route('job_order.business_cards')}}"
                aria-selected="false">Business Cards</a>
               <div class="dropdown-divider"></div>



              <a class="nav-link <?php if($page == 'envelopes') echo 'active active_red'  ?>"
                href="{{route('job_order.envelopes')}}"
                aria-selected="false">Envelopes</a>
               <div class="dropdown-divider"></div>

              <a class="nav-link <?php if($page == 'notepads') echo 'active active_red'  ?>"
                href="{{route('job_order.notepads')}}"
                aria-selected="false">Notepads</a>
               <div class="dropdown-divider"></div>

             <a class="nav-link <?php if($page == 'booklets') echo 'active active_red'  ?>"
                href="{{route('job_order.booklets')}}"
                aria-selected="false">Booklets</a>
               <div class="dropdown-divider"></div>

             <a class="nav-link <?php if($page == 'stickers') echo 'active active_red'  ?>"
                href="{{route('job_order.stickers')}}"
                aria-selected="false">Stickers</a>
               <div class="dropdown-divider"></div>


            </div>

        </div>
    </div>
</div>
