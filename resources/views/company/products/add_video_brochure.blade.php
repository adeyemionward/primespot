@extends('company.layout.master')
@section('content')
@section('title', 'Video Brochure')
@php $page = 'video_brochure' @endphp

    <div class="content">
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-md-6 float-start">
                    <h4 class="m-0 text-dark text-muted">Video Brochure</h4>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb float-end">
                        <li class="breadcrumb-item"><a href="#"> Home</a></li>
                        <li class="breadcrumb-item active">Video Brochure</li>
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
                                            <h5 class="card-title mb-0 text-muted">Create Video Brochure</h5>
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
                                                                    <input type="hidden" name="note_type" value="Higher NoteBook" >


                                                                    <div class="row">


                                                                        <div class="form-group mt-3 mb-3 col-md-4">
                                                                            <label for="exampleFormControlSelect1">Screen Size</label>
                                                                            <select name="screen_size" required class="form-control form-select" id="screenSizeSelect">
                                                                                <option value="">--Select Screen Size--</option>
                                                                                <option value="4.3 Inch TFT Screen">4.3 Inch TFT Screen</option>
                                                                                <option value="5 Inch TFT Screen">5 Inch TFT Screen</option>
                                                                                <option value="7 Inch TFT Screen">7 Inch TFT Screen</option>
                                                                            </select>
                                                                        </div>

                                                                        <div class="form-group mt-3 mb-3 col-md-4">
                                                                            <label for="production_time">Product Name</label>
                                                                            <input required readonly name="product_name" class="form-control" id="productName">
                                                                        </div>

                                                                        <div class="form-group mt-3 mb-3 col-md-4">
                                                                            <label for="proof_needed">Display Area</label>
                                                                            <select name="display_area" required class="form-control form-select" id="displayAreaSelect">
                                                                                <option value="">--Select Display Area--</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row">


                                                                        <div class="form-group mt-3 mb-3 col-md-3">
                                                                            <label for="exampleFormControlSelect1">Battery
                                                                                </label>
                                                                                <select name="battery" required class="form-control form-select"  id="exampleFormControlSelect1">

                                                                                    <option value="320~2000mAH">320~2000mAH</option>
                                                                                </select>
                                                                        </div>

                                                                        <div class="form-group mt-3 mb-3 col-md-3">
                                                                            <label for="proof_needed">Resolution</label>
                                                                            <select name="resolution" required class="form-control form-select" id="Resolution">
                                                                                <option value="">--Select Resolution--</option>
                                                                            </select>
                                                                        </div>

                                                                        <div class="form-group mt-3 mb-3 col-md-3">
                                                                                <label for="exampleFormControlSelect1">Screen Ratio</label>
                                                                                    <select name="screen_ratio" required class="form-control form-select"  id="exampleFormControlSelect1">

                                                                                        <option value="16:9">16:9</option>
                                                                                    </select>
                                                                        </div>
                                                                        <div class="form-group mt-3 mb-3 col-md-3">
                                                                            <label for="production_time">Upload Image
                                                                                </label>
                                                                                <input required type="file" name="image" class="form-control"
                                                                                id="image">
                                                                        </div>


                                                                    </div>

                                                                    <table id="products" style="margin-top:20px">

                                                                        <a id="add-product" class="btn btn-primary" >Add Variation</a>
                                                                        <thead>
                                                                            <tr>
                                                                                <th>Cover Type</th>
                                                                                <th>Memory</th>
                                                                                <th>Quantity</th>
                                                                                <th>Price</th>
                                                                                <th></th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <!-- Initial row, can be hidden -->
                                                                            <tr class="product-row">
                                                                                <td style="width:25%">
                                                                                    <select class="form-control form-select" required  name="cover_paper[]" id="thickness">
                                                                                        <option value="">--Select Cover Paper--</option>
                                                                                        <option value="soft_cover">Soft Paper Cover</option>
                                                                                        <option value="hard_cover">Hard Paper Cover</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td style="width:25%">
                                                                                    <select name="memory[]" required class="form-control form-select"  id="exampleFormControlSelect1">
                                                                                        <option value="">--Select Memory Information--</option>
                                                                                        <option value="128M">128M</option>
                                                                                        <option value="256M">256M</option>
                                                                                        <option value="512M">512M</option>
                                                                                        <option value="1GB">1GB</option>
                                                                                        <option value="2GB">2GB</option>
                                                                                        <option value="4GB">4GB</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td style="width:25%"><input type="number" required class="form-control quantity"  name="quantity[]" /></td>
                                                                                <td style="width:25%"><input type="number" required class="form-control price"  name="total_cost[]" /></td>

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
                                                                        <i class="text-white me-2" data-feather="check-circle"></i>Create Video Brochure
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
    $('#screenSizeSelect').on('change', function() {
        var screenSize = $(this).val();
        var productName = '';
        var displayAreas = {};
        var resolution = {};

        if (screenSize === "4.3 Inch TFT Screen") {
            productName = screenSize+' Video Brochure';
            displayAreas = {
                "94mm*53mm": "94mm*53mm",
            };
            resolution = {
                "480*272": "480*272",
            };
        } else if (screenSize === "5 Inch TFT Screen") {
            productName = screenSize+' Video Brochure';
            displayAreas = {
                "110mm*61mm": "110mm*61mm",
            };
            resolution = {
                "800*480": "800*480",
            };
        } else if (screenSize === "7 Inch TFT Screen") {
            productName = screenSize+' Video Brochure';
            displayAreas = {
                "152mm*85mm": "152mm*85mm",
            };
            resolution = {
                "1024*600": "1024*600",
            };
        }

        $('#displayAreaSelect').empty();
        $('#Resolution').empty();
        $('#productName').val(productName);

        $.each(displayAreas, function(key, value) {
            $('#displayAreaSelect').append('<option value="' + value + '">' + value + '</option>');
        });

        $.each(resolution, function(key, value) {
            $('#Resolution').append('<option value="' + value + '">' + value + '</option>');
        });
    });
});
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
