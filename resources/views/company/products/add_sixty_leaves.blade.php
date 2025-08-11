
@extends('company.layout.master')
@section('content')
@section('title', 'Add Product')
@php $page = 'sixty_leaves' @endphp

    <div class="content">
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-md-6 float-start">
                    <h4 class="m-0 text-dark text-muted">Product</h4>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb float-end">
                        <li class="breadcrumb-item"><a href="#"> Home</a></li>
                        <li class="breadcrumb-item active">Product</li>
                    </ol>
                </div>
            </div>

            <div class="content">
                <div class="canvas-wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                @include('company.products.product_inc')

                                <div class="col-md-9 col-xl-9">
                                    <div class="card">
                                        <div class="card-header bg-white">
                                            <h5 class="card-title mb-0 text-muted">Create Sixty Leaves Product</h5>
                                        </div>
                                        <div class="card-body h-100">
                                            <div class="align-items-start">
                                                <div class="tab-content" id="nav-tabContent">
                                                    <div class="tab-pane fade show active" id="nav-server"
                                                        role="tabpanel" aria-labelledby="nav-server-tab">

                                                        <div class="row g-3 mb-3 mt-3">
                                                            <div class="col-md-12">
                                                                <form method="POST"  id="add_sixty_leaves" class="add_sixty_leaves" enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('POST')
                                                                    <div class="row">
                                                                        <div class="form-group mt-3 mb-3 col-md-4">
                                                                            <label for="production_time">Product Name</label>
                                                                            <select name="product_name" required class="form-control{{ $errors->has('product_name') ? ' is-invalid' : '' }} form-select" value="{{ old('product_name') }}">
                                                                                <option value="sixty_leaves">Sixty Leaves</option>
                                                                                @error('product_name')
                                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                                @enderror
                                                                            </select>
                                                                        </div>

                                                                        <div class="form-group mt-3 mb-3 col-md-4">
                                                                            <label for="production_time">Production Time (Days)
                                                                                </label> <input required type="number" name="production_time" class="form-control"
                                                                                id="quantity" placeholder="eg: 4">
                                                                        </div>

                                                                        <div class="form-group mt-3 mb-3 col-md-4">
                                                                            <label for="production_time">Upload Image
                                                                                </label>
                                                                                <input required type="file" name="image" accept="image/png, image/jpeg, image/webp" class="form-control"
                                                                                id="image">
                                                                        </div>

                                                                        {{-- <div class="form-group mt-3 mb-3 col-md-4">
                                                                            <label for="exampleFormControlSelect1">Default Ink

                                                                            </label>
                                                                            <select name="ink" required class="form-control form-select"
                                                                                id="exampleFormControlSelect1">
                                                                                <option value="">--Select Default Color Type--</option>
                                                                                <option value="single">Single Color</option>
                                                                                <option value="full">Full Color</option>
                                                                            </select>
                                                                        </div> --}}


                                                                    </div>


                                                                    <div class="row">


                                                                        {{-- <div class="form-group mt-3 mb-3 col-md-4">
                                                                            <label for="thickness">Default Cover Thickness</label>
                                                                            <select class="form-control form-select" required  name="thickness" id="thickness">
                                                                                <option value="">--Select Default Cover Thickness--</option>
                                                                                <option value="199g">199g</option>
                                                                                <option value="280g">280g</option>
                                                                                <option value="300g">300g</option>
                                                                            </select>
                                                                        </div> --}}
                                                                        {{-- <div class="form-group mt-3 mb-3 col-md-4">
                                                                            <label for="paper_type">Default Paper Type </label>
                                                                            <select name="paper_type" required class="form-control form-select"  id="exampleFormControlSelect1">
                                                                                <option value="">--Select Default Paper Type--</option>
                                                                                <option value="50g">50g</option>
                                                                                <option value="60g">60g</option>
                                                                                <option value="70g">70g</option>
                                                                                <option value="80g">80g</option>
                                                                            </select>
                                                                        </div> --}}

                                                                        {{-- <div class="form-group mt-3 mb-3 col-md-4">
                                                                            <label for="proof_needed">Proof Needed</label>
                                                                            <select required class="form-control form-select"  name="proof_needed" id="proof_needed">
                                                                                <option value="">--Select Proof Needed--</option>
                                                                                <option value="yes">Yes</option>
                                                                                <option value="no">No</option>
                                                                            </select>
                                                                        </div> --}}
                                                                    </div>

                                                                    <table id="products" style="margin-top:20px">

                                                                        <a id="add-product" class="btn btn-primary" >Add Variation</a>
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Color</th>
                                                                                <th>Paper</th>
                                                                                <th>Thickness</th>
                                                                                <th>Quantiy</th>
                                                                                <th>Price</th>
                                                                                <th></th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <!-- Initial row, can be hidden -->


                                                                            <tr class="product-row" style="margin-top:20px">
                                                                                <td style="width:20%">
                                                                                    <select required name="ink[]" class="form-control form-select" id="exampleFormControlSelect1">
                                                                                        <option value="">--Select Color Type--</option>
                                                                                        <option value="single">Single Color</option>
                                                                                        <option value="full">Full Color</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td style="width:20%">
                                                                                    <select name="paper_type[]" required class="form-control form-select"  id="exampleFormControlSelect1">
                                                                                        <option value="">--Select Paper Type--</option>
                                                                                        <option value="50g">50g</option>
                                                                                        <option value="60g">60g</option>
                                                                                        <option value="70g">70g</option>
                                                                                        <option value="80g">80g</option>
                                                                                    </select>
                                                                                </td>

                                                                                <td style="width:20%">
                                                                                    <select required class="form-control form-select"  name="thickness[]" id="thickness">
                                                                                        <option value="">--Select Cover Thickness--</option>
                                                                                        <option value="199g">199g</option>
                                                                                        <option value="280g">280g</option>
                                                                                        <option value="300g">300g</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td style="width:20%"><input type="number" required class="form-control quantity"  name="quantity[]" /></td>
                                                                                <td style="width:20%"><input type="number" required class="form-control price"  name="total_cost[]" /></td>



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

                                                                    <div class="row">
                                                                        <div class="form-group mt-3 mb-3 col-md-12">
                                                                            <label for="address">Product Description
                                                                                </label>
                                                                                <textarea name="description" required  class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" value="{{ old('description') }}"
                                                                                id="description"></textarea>
                                                                                @error('description')
                                                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                                                @enderror
                                                                        </div>



                                                                    </div>

                                                                    <button class="btn btn-sm btn-danger" type="submit">
                                                                        <i class="text-white me-2" data-feather="check-circle"></i>Save
                                                                    </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                        <hr/>
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
