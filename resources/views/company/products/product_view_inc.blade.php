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
                <a class="nav-link <?php if($page == 'view_product') echo 'active active_red'  ?>"
                 href="{{route('company.products.view',[request()->job_title,request()->id])}}"
                 aria-selected="false">View Product</a>
                <div class="dropdown-divider"></div>


                <a class="nav-link <?php if($page == 'edit_product') echo 'active active_red'  ?>"
                 href="{{route('company.products.edit',[request()->job_title,request()->id])}}"
                 aria-selected="false">Edit Product </a>
                <div class="dropdown-divider"></div>


                {{-- <a class="nav-link <?php if($page == 'edit_pricing') echo 'active active_red'  ?>"
                href="{{route('company.products.edit_pricing', [request()->job_title,request()->id])}}"
                aria-selected="false">Update Product Pricing</a>
               <div class="dropdown-divider"></div> --}}


                <a onclick="return confirm('Are you sure you want to delete this product?');" class="nav-link  <?php if($page == 'forty_leaves') echo 'active active_red'  ?>"
                href="{{route('company.products.delete_product', [request()->id])}}"
                aria-selected="false">Delete Product</a>
               <div class="dropdown-divider"></div>


            </div>

        </div>
    </div>
</div>
