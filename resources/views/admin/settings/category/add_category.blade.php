
@extends('layout.master')
@section('content')
@section('title', 'Add Product')
@php $page = 'add_location' @endphp

    <div class="content">
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-md-6 float-start">
                    <h4 class="m-0 text-dark text-muted">Expense Category</h4>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb float-end">
                        {{-- <a href="{{route('job_order.location.all_locations')}}"><li class="active btn btn-primary" style="">Category List</li></a> --}}
                    </ol>
                </div>
            </div>

            <div class="content">
                <div class="canvas-wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">

                                <div class="col-md-12 col-xl-12">
                                    <div class="card">
                                        <div class="card-header bg-white">
                                            <h5 class="card-title mb-0 text-muted">Create Category</h5>
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

                                                                        <a id="add-product" class="btn btn-primary" >Add More</a>
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Name</th>
                                                                                <th></th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <!-- Initial row, can be hidden -->
                                                                            <tr class="product-row">
                                                                                <td style="width:100%"><input type="text" required class="form-control state"  name="name[]" /></td>
                                                                                <td>
                                                                                    <a class="remove-product btn btn-danger">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                                                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                                                                          </svg>
                                                                                    </a>
                                                                                </td>
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
