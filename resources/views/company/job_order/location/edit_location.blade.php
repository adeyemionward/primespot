
@extends('company.layout.master')
@section('content')
@section('title', 'Add Product')
@php $page = 'edit_location' @endphp

    <div class="content">
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-md-6 float-start">
                    <h4 class="m-0 text-dark text-muted">Job Location</h4>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb float-end">
                        <a href="{{route('company.job_order.location.all_locations')}}"><li class="active btn btn-primary" style="">Location List</li></a>
                    </ol>
                </div>
            </div>

            <div class="content">
                <div class="canvas-wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                @include('company.job_order.location.location_inc')

                                <div class="col-md-9 col-xl-9">
                                    <div class="card">
                                        <div class="card-header bg-white">
                                            <h5 class="card-title mb-0 text-muted">Edit Job Locations</h5>
                                        </div>
                                        <div class="card-body h-100">
                                            <div class="align-items-start">
                                                <div class="tab-content" id="nav-tabContent">
                                                    <div class="tab-pane fade show active" id="nav-server"
                                                        role="tabpanel" aria-labelledby="nav-server-tab">

                                                        <div class="row g-3 mb-3 mt-3">
                                                            <div class="col-md-12">
                                                                <form method="POST"  id="add_twenty_leaves" class="add_twenty_leaves" enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('POST')

                                                                    <table id="products">

                                                                        {{-- <a id="add-product" class="btn btn-primary" >Add More</a> --}}
                                                                        <thead>
                                                                            <tr>
                                                                                <th>State </th>
                                                                                <th>City</th>
                                                                                <th></th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <!-- Initial row, can be hidden -->
                                                                            <tr class="product-row">
                                                                                <td style="width:50%"><input type="text" required class="form-control state"  name="state" value="{{$location->state}}" /></td>
                                                                                <td style="width:50%"><input type="text" required class="form-control city"  name="city" value="{{$location->city}}"  /></td>


                                                                            </tr>

                                                                        </tbody>
                                                                    </table>

                                                            </div>
                                                        </div>
                                                        <hr/>
                                                    </div>
                                                    <button class="btn btn-sm btn-danger" type="submit">
                                                        <i class="text-white me-2" data-feather="check-circle"></i>Save
                                                    </button>
                                                </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
<script>
$(document).ready(function() {

    $('#add-product').on('click', function() {
            var newRow = $('.product-row:first').clone();
            $('#products tbody').append(newRow);
        });

        $('#products').on('click', '.remove-product', function() {
            $(this).closest('tr').remove();
            calculateTotal();
        });
    });
</script>
