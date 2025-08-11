
@extends('company.layout.master')
@section('content')
@section('title', 'Edit Product')
@php $page = 'edit_product' @endphp
<style>
    .question{
        color:red;
        font-weight: bold;
        width: 20% !important;
    }
    th, td {
  padding: 5px;
}
</style>
    <div class="content">
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-md-6 float-start">
                    <h4 class="m-0 text-dark text-muted">Edit Product</h4>
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
                                @include('company.products.product_view_inc')

                                <div class="col-md-9 col-xl-9">
                                    @if(request()->job_title == 'video_brochure')
                                    <div class="card">
                                        <div class="card-header bg-white">
                                            <h5 class="card-title mb-0 text-muted">Edit Video Brochure Product</h5>
                                        </div>
                                        <div class="card-body h-100">
                                            <div class="align-items-start">
                                                <div class="tab-content" id="nav-tabContent">
                                                    <div class="tab-pane fade show active" id="nav-server"
                                                        role="tabpanel" aria-labelledby="nav-server-tab">

                                                        <form method="POST"  id="add_twenty_leaves" class="add_twenty_leaves" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('POST')
                                                            <input type="hidden" name="note_type" value="Higher NoteBook">


                                                            <div class="row">

                                                                <div class="form-group mt-3 mb-3 col-md-4">
                                                                    <label for="screenSizeSelect">Screen Size</label>
                                                                        <select name="screen_size" required class="form-control form-select"  id="screenSizeSelect">

                                                                            <option value="4.3 Inch TFT Screen" @php if($product->screen_size == '4.3 Inch TFT Screen') echo 'selected' @endphp>4.3 Inch TFT Screen</option>
                                                                            <option value="5 Inch TFT Screen" @php if($product->screen_size == '5 Inch TFT Screen') echo 'selected' @endphp>5 Inch TFT Screen</option>

                                                                            <option value="7 Inch TFT Screen" @php if($product->screen_size == '7 Inch TFT Screen') echo 'selected' @endphp>7 Inch TFT Screen</option>

                                                                        </select>
                                                                </div>

                                                                <div class="form-group mt-3 mb-3 col-md-4">
                                                                    <label for="production_time">Product Name</label>
                                                                    <input required readonly name="product_name" class="form-control" value="{{$product->title}}" id="productName">
                                                                </div>

                                                                <div class="form-group mt-3 mb-3 col-md-4">
                                                                    <label for="proof_needed">Display Area</label>
                                                                    <select name="display_area" required class="form-control form-select"  id="displayAreaSelect">
                                                                        <option value="{{$product->display_area}}">{{$product->display_area}}</option>

                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="row">

                                                                <div class="form-group mt-3 mb-3 col-md-3">
                                                                    <label for="battery">Battery
                                                                        </label>
                                                                        <select name="battery" required class="form-control form-select"  id="battery">
                                                                            <option value="320~2000mAH">320~2000mAH</option>
                                                                        </select>
                                                                </div>

                                                                <div class="form-group mt-3 mb-3 col-md-3">
                                                                    <label for="Resolution">Resolution
                                                                        </label>
                                                                        <select name="resolution" required class="form-control form-select"  id="Resolution">

                                                                            <option value="{{$product->resolution}}">{{$product->resolution}}</option>

                                                                        </select>
                                                                </div>

                                                                <div class="form-group mt-3 mb-3 col-md-3">
                                                                        <label for="screenRatio">Screen Ratio</label>
                                                                            <select name="screen_ratio" required class="form-control form-select"  id="screenRatio">
                                                                                <option value="16:9">16:9</option>
                                                                            </select>
                                                                </div>
                                                                <div class="form-group mt-3 mb-3 col-md-3">
                                                                    <label for="production_time">Upload Image <span class="text-warning">(Only upload a new image) </span> </label>
                                                                        <input  type="file" name="image" class="form-control"
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
                                                                    @forelse($product_variations as $val)

                                                                        <tr class="product-row">
                                                                            <input type="text" name="product_cost_id[]" value="{{$val->id}}" style="display:none">
                                                                            <td style="width:25%">
                                                                                <select class="form-control form-select" required  name="cover_paper[]" id="thickness">
                                                                                    <option value="soft_cover" @php if($val->cover_paper == 'soft_cover') echo 'selected' @endphp>Soft Paper Cover</option>
                                                                                    <option value="hard_cover" @php if($val->cover_paper == 'hard_cover') echo 'selected' @endphp>Hard Paper Cover</option>
                                                                                </select>
                                                                            </td>
                                                                            <td style="width:25%">
                                                                                <select name="memory[]" required class="form-control form-select"  id="exampleFormControlSelect1">
                                                                                    <option value="128M" @php if($val->memory == '128M') echo 'selected' @endphp>128M</option>
                                                                                    <option value="256M" @php if($val->memory == '256M') echo 'selected' @endphp>256M</option>
                                                                                    <option value="512M" @php if($val->memory == '512M') echo 'selected' @endphp>512M</option>
                                                                                    <option value="1GB" @php if($val->memory == '1GB') echo 'selected' @endphp>1GB</option>
                                                                                    <option value="2GB" @php if($val->memory == '2GB') echo 'selected' @endphp>2GB</option>
                                                                                    <option value="4GB" @php if($val->memory == '4GB') echo 'selected' @endphp>4GB</option>
                                                                                </select>
                                                                            </td>
                                                                            <td style="width:25%"><input type="number" required class="form-control quantity" value="{{$val->quantity}}"  name="quantity[]" /></td>
                                                                            <td style="width:25%"><input type="number" required class="form-control price"  value="{{$val->total_cost}}"   name="total_cost[]" /></td>

                                                                            <td>
                                                                                <a class="remove-product btn btn-danger">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                                                                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                                                                    </svg>
                                                                                    </a>
                                                                            </td>
                                                                        </tr>
                                                                    @empty
                                                                    @endforelse


                                                                </tbody>
                                                            </table>

                                                            <div class="row">
                                                                <div class="form-group mt-3 mb-3 col-md-12">
                                                                    <label for="address">Product Description
                                                                        </label>
                                                                        <textarea name="description" required  class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" value="{{ old('description') }}"
                                                                        id="description">{{$product->description}}</textarea>
                                                                        @error('description')
                                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                                        @enderror
                                                                </div>



                                                            </div>

                                                            <button class="btn btn-sm btn-danger" type="submit">
                                                                <i class="text-white me-2" data-feather="check-circle"></i>Create Video Brochure
                                                            </button>
                                                        </form>
                                                        <hr/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                                    @if(request()->job_title == 'higher_notebook')
                                        <div class="card">
                                            <div class="card-header bg-white">
                                                <h5 class="card-title mb-0 text-muted">Edit Product</h5>
                                            </div>
                                            <div class="card-body h-100">
                                                <div class="align-items-start">
                                                    <div class="tab-content" id="nav-tabContent">
                                                        <div class="tab-pane fade show active" id="nav-server"
                                                            role="tabpanel" aria-labelledby="nav-server-tab">

                                                            <form method="POST"  id="add_twenty_leaves" class="add_twenty_leaves" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('POST')
                                                                <div class="row">
                                                                    <div class="form-group mt-3 mb-3 col-md-4">
                                                                        <label for="production_time">Product Name</label>
                                                                        <select name="product_name" required class="form-control{{ $errors->has('product_name') ? ' is-invalid' : '' }} form-select">
                                                                            <option value="higher_notebook" <?php if ($product->name == request()->job_title) echo 'selected' ?>>Higher NoteBook</option>
                                                                            @error('product_name')
                                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group mt-3 mb-3 col-md-4">
                                                                        <label for="production_time">Production Time (Days)
                                                                            </label> <input required type="number" value={{$product->production_days}} name="production_time" class="form-control"
                                                                            id="quantity" placeholder="eg: 4">
                                                                    </div>

                                                                    <div class="form-group mt-3 mb-3 col-md-4">
                                                                        <label for="production_time">Upload Image <span class="text-warning">(Only upload new image) </span>
                                                                        </label>
                                                                            <input  type="file" name="image" class="form-control"
                                                                            id="image">
                                                                    </div>
                                                                </div>


                                                                <div class="row">


                                                                </div>

                                                                <table id="products" style="margin-top:20px">

                                                                    <a id="add-product" class="btn btn-primary" >Add Variation</a>
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Color</th>
                                                                            <th>Paper</th>
                                                                            <th>Thickness</th>
                                                                            <th>Quantity</th>
                                                                            <th>Price</th>
                                                                            <th></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <!-- Initial row, can be hidden -->
                                                                        @forelse($product_variations as $val)
                                                                            <tr class="product-row" style="margin-top:20px">
                                                                                <input type="text" name="product_cost_id[]" value="{{$val->id}}" style="display:none">
                                                                                <td style="width:20%">
                                                                                    <select required name="ink[]" class="form-control form-select" id="exampleFormControlSelect1">

                                                                                        <option value="single" @php if($val->ink == 'single') echo 'selected' @endphp>Single Color</option>
                                                                                        <option value="full" @php if($val->ink == 'full') echo 'selected' @endphp>Full Color</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td style="width:20%">
                                                                                    <select name="paper_type[]" required class="form-control form-select"  id="exampleFormControlSelect1">

                                                                                        <option value="50g" @php if($val->paper_type == '50g') echo 'selected' @endphp>50g</option>
                                                                                        <option value="60g" @php if($val->paper_type == '60g') echo 'selected' @endphp>60g</option>
                                                                                        <option value="70g" @php if($val->paper_type == '70g') echo 'selected' @endphp>70g</option>
                                                                                        <option value="80g" @php if($val->paper_type == '80g') echo 'selected' @endphp>80g</option>
                                                                                    </select>
                                                                                </td>

                                                                                <td style="width:20%">
                                                                                    <select required class="form-control form-select"  name="thickness[]" id="thickness">
                                                                                        <option value="199g" @php if($val->thickness == '199g') echo 'selected' @endphp>199g</option>
                                                                                        <option value="280g" @php if($val->thickness == '280g') echo 'selected' @endphp>280g</option>
                                                                                        <option value="300g" @php if($val->thickness == '300g') echo 'selected' @endphp>300g</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td style="width:20%"><input type="number" required class="form-control quantity" value="{{$val->quantity}}"  name="quantity[]" /></td>
                                                                                <td style="width:20%"><input type="number" required class="form-control price" value="{{$val->total_cost}}"  name="total_cost[]" /></td>



                                                                                <td>
                                                                                    <a class="remove-product btn btn-danger">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                                                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                                                                        </svg>
                                                                                        </a>
                                                                                </td>
                                                                            </tr>
                                                                        @empty
                                                                        @endforelse

                                                                    </tbody>
                                                                </table>

                                                                <div class="row">
                                                                    <div class="form-group mt-3 mb-3 col-md-12">
                                                                        <label for="address">Product Description
                                                                            </label>
                                                                            <textarea name="description" required  class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                                                                            id="description">{{$product->description}}</textarea>
                                                                            @error('description')
                                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                    </div>



                                                                </div>

                                                                <button class="btn btn-sm btn-danger" type="submit">
                                                                    <i class="text-white me-2" data-feather="check-circle"></i>Save
                                                                </button>
                                                            </form>
                                                            <hr/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if(request()->job_title == 'eighty_leaves')
                                        <div class="card">
                                            <div class="card-header bg-white">
                                                <h5 class="card-title mb-0 text-muted">Edit Eighty Leaves Product</h5>
                                            </div>
                                            <div class="card-body h-100">
                                                <div class="align-items-start">
                                                    <div class="tab-content" id="nav-tabContent">
                                                        <div class="tab-pane fade show active" id="nav-server"
                                                            role="tabpanel" aria-labelledby="nav-server-tab">
                                                            <form method="POST"  id="add_twenty_leaves" class="add_twenty_leaves" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('POST')
                                                                <div class="row">
                                                                    <div class="form-group mt-3 mb-3 col-md-4">
                                                                        <label for="production_time">Product Name</label>
                                                                        <select name="product_name" required class="form-control{{ $errors->has('product_name') ? ' is-invalid' : '' }} form-select">
                                                                            <option value="eighty_leaves" <?php if ($product->name == request()->job_title) echo 'selected' ?>>Eighty Leaves</option>
                                                                            @error('product_name')
                                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group mt-3 mb-3 col-md-4">
                                                                        <label for="production_time">Production Time (Days)
                                                                            </label> <input required type="number" value={{$product->production_days}} name="production_time" class="form-control"
                                                                            id="quantity" placeholder="eg: 4">
                                                                    </div>

                                                                    <div class="form-group mt-3 mb-3 col-md-4">
                                                                        <label for="production_time">Upload Image <span class="text-warning">(Only upload new image) </span>
                                                                        </label>
                                                                            <input  type="file" name="image" class="form-control"
                                                                            id="image">
                                                                    </div>
                                                                </div>


                                                                <div class="row">


                                                                </div>

                                                                <table id="products" style="margin-top:20px">

                                                                    <a id="add-product" class="btn btn-primary" >Add Variation</a>
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Color</th>
                                                                            <th>Paper</th>
                                                                            <th>Thickness</th>
                                                                            <th>Quantity</th>
                                                                            <th>Price</th>
                                                                            <th></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <!-- Initial row, can be hidden -->
                                                                        @forelse($product_variations as $val)
                                                                            <tr class="product-row" style="margin-top:20px">
                                                                                <input type="text" name="product_cost_id[]" value="{{$val->id}}" style="display:none">
                                                                                <td style="width:20%">
                                                                                    <select required name="ink[]" class="form-control form-select" id="exampleFormControlSelect1">

                                                                                        <option value="single" @php if($val->ink == 'single') echo 'selected' @endphp>Single Color</option>
                                                                                        <option value="full" @php if($val->ink == 'full') echo 'selected' @endphp>Full Color</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td style="width:20%">
                                                                                    <select name="paper_type[]" required class="form-control form-select"  id="exampleFormControlSelect1">

                                                                                        <option value="50g" @php if($val->paper_type == '50g') echo 'selected' @endphp>50g</option>
                                                                                        <option value="60g" @php if($val->paper_type == '60g') echo 'selected' @endphp>60g</option>
                                                                                        <option value="70g" @php if($val->paper_type == '70g') echo 'selected' @endphp>70g</option>
                                                                                        <option value="80g" @php if($val->paper_type == '80g') echo 'selected' @endphp>80g</option>
                                                                                    </select>
                                                                                </td>

                                                                                <td style="width:20%">
                                                                                    <select required class="form-control form-select"  name="thickness[]" id="thickness">
                                                                                        <option value="199g" @php if($val->thickness == '199g') echo 'selected' @endphp>199g</option>
                                                                                        <option value="280g" @php if($val->thickness == '280g') echo 'selected' @endphp>280g</option>
                                                                                        <option value="300g" @php if($val->thickness == '300g') echo 'selected' @endphp>300g</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td style="width:20%"><input type="number" required class="form-control quantity" value="{{$val->quantity}}"  name="quantity[]" /></td>
                                                                                <td style="width:20%"><input type="number" required class="form-control price" value="{{$val->total_cost}}"  name="total_cost[]" /></td>



                                                                                <td>
                                                                                    <a class="remove-product btn btn-danger">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                                                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                                                                        </svg>
                                                                                        </a>
                                                                                </td>
                                                                            </tr>
                                                                        @empty
                                                                        @endforelse

                                                                    </tbody>
                                                                </table>

                                                                <div class="row">
                                                                    <div class="form-group mt-3 mb-3 col-md-12">
                                                                        <label for="address">Product Description
                                                                            </label>
                                                                            <textarea name="description" required  class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                                                                            id="description">{{$product->description}}</textarea>
                                                                            @error('description')
                                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                    </div>



                                                                </div>

                                                                <button class="btn btn-sm btn-danger" type="submit">
                                                                    <i class="text-white me-2" data-feather="check-circle"></i>Save
                                                                </button>
                                                            </form>
                                                            <hr/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if(request()->job_title == 'forty_leaves')
                                        <div class="card">
                                            <div class="card-header bg-white">
                                                <h5 class="card-title mb-0 text-muted">Edit Product</h5>
                                            </div>
                                            <div class="card-body h-100">
                                                <div class="align-items-start">
                                                    <div class="tab-content" id="nav-tabContent">
                                                        <div class="tab-pane fade show active" id="nav-server"
                                                            role="tabpanel" aria-labelledby="nav-server-tab">

                                                            <form method="POST"  id="add_twenty_leaves" class="add_twenty_leaves" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('POST')
                                                                <div class="row">
                                                                    <div class="form-group mt-3 mb-3 col-md-4">
                                                                        <label for="production_time">Product Name</label>
                                                                        <select name="product_name" required class="form-control{{ $errors->has('product_name') ? ' is-invalid' : '' }} form-select">
                                                                            <option value="forty_leaves" <?php if ($product->name == request()->job_title) echo 'selected' ?>>Forty Leaves</option>
                                                                            @error('product_name')
                                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group mt-3 mb-3 col-md-4">
                                                                        <label for="production_time">Production Time (Days)
                                                                            </label> <input required type="number" value={{$product->production_days}} name="production_time" class="form-control"
                                                                            id="quantity" placeholder="eg: 4">
                                                                    </div>

                                                                    <div class="form-group mt-3 mb-3 col-md-4">
                                                                        <label for="production_time">Upload Image <span class="text-warning">(Only upload new image) </span>
                                                                        </label>
                                                                            <input  type="file" name="image" class="form-control"
                                                                            id="image">
                                                                    </div>
                                                                </div>


                                                                <div class="row">


                                                                </div>

                                                                <table id="products" style="margin-top:20px">

                                                                    <a id="add-product" class="btn btn-primary" >Add Variation</a>
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Color</th>
                                                                            <th>Paper</th>
                                                                            <th>Thickness</th>
                                                                            <th>Quantity</th>
                                                                            <th>Price</th>
                                                                            <th></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <!-- Initial row, can be hidden -->
                                                                        @forelse($product_variations as $val)
                                                                            <tr class="product-row" style="margin-top:20px">
                                                                                <input type="text" name="product_cost_id[]" value="{{$val->id}}" style="display:none">
                                                                                <td style="width:20%">
                                                                                    <select required name="ink[]" class="form-control form-select" id="exampleFormControlSelect1">

                                                                                        <option value="single" @php if($val->ink == 'single') echo 'selected' @endphp>Single Color</option>
                                                                                        <option value="full" @php if($val->ink == 'full') echo 'selected' @endphp>Full Color</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td style="width:20%">
                                                                                    <select name="paper_type[]" required class="form-control form-select"  id="exampleFormControlSelect1">

                                                                                        <option value="50g" @php if($val->paper_type == '50g') echo 'selected' @endphp>50g</option>
                                                                                        <option value="60g" @php if($val->paper_type == '60g') echo 'selected' @endphp>60g</option>
                                                                                        <option value="70g" @php if($val->paper_type == '70g') echo 'selected' @endphp>70g</option>
                                                                                        <option value="80g" @php if($val->paper_type == '80g') echo 'selected' @endphp>80g</option>
                                                                                    </select>
                                                                                </td>

                                                                                <td style="width:20%">
                                                                                    <select required class="form-control form-select"  name="thickness[]" id="thickness">
                                                                                        <option value="199g" @php if($val->thickness == '199g') echo 'selected' @endphp>199g</option>
                                                                                        <option value="280g" @php if($val->thickness == '280g') echo 'selected' @endphp>280g</option>
                                                                                        <option value="300g" @php if($val->thickness == '300g') echo 'selected' @endphp>300g</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td style="width:20%"><input type="number" required class="form-control quantity" value="{{$val->quantity}}"  name="quantity[]" /></td>
                                                                                <td style="width:20%"><input type="number" required class="form-control price" value="{{$val->total_cost}}"  name="total_cost[]" /></td>



                                                                                <td>
                                                                                    <a class="remove-product btn btn-danger">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                                                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                                                                        </svg>
                                                                                        </a>
                                                                                </td>
                                                                            </tr>
                                                                        @empty
                                                                        @endforelse

                                                                    </tbody>
                                                                </table>

                                                                <div class="row">
                                                                    <div class="form-group mt-3 mb-3 col-md-12">
                                                                        <label for="address">Product Description
                                                                            </label>
                                                                            <textarea name="description" required  class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                                                                            id="description">{{$product->description}}</textarea>
                                                                            @error('description')
                                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                    </div>



                                                                </div>

                                                                <button class="btn btn-sm btn-danger" type="submit">
                                                                    <i class="text-white me-2" data-feather="check-circle"></i>Save
                                                                </button>
                                                            </form>
                                                            <hr/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if(request()->job_title == 'sixty_leaves')
                                        <div class="card">
                                            <div class="card-header bg-white">
                                                <h5 class="card-title mb-0 text-muted">Edit Product</h5>
                                            </div>
                                            <div class="card-body h-100">
                                                <div class="align-items-start">
                                                    <div class="tab-content" id="nav-tabContent">
                                                        <div class="tab-pane fade show active" id="nav-server"
                                                            role="tabpanel" aria-labelledby="nav-server-tab">

                                                            <form method="POST"  id="add_twenty_leaves" class="add_twenty_leaves" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('POST')
                                                                <div class="row">
                                                                    <div class="form-group mt-3 mb-3 col-md-4">
                                                                        <label for="production_time">Product Name</label>
                                                                        <select name="product_name" required class="form-control{{ $errors->has('product_name') ? ' is-invalid' : '' }} form-select">
                                                                            <option value="sixty_leaves" <?php if ($product->name == request()->job_title) echo 'selected' ?>>Sixty Leaves</option>
                                                                            @error('product_name')
                                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group mt-3 mb-3 col-md-4">
                                                                        <label for="production_time">Production Time (Days)
                                                                            </label> <input required type="number" value={{$product->production_days}} name="production_time" class="form-control"
                                                                            id="quantity" placeholder="eg: 4">
                                                                    </div>

                                                                    <div class="form-group mt-3 mb-3 col-md-4">
                                                                        <label for="production_time">Upload Image <span class="text-warning">(Only upload new image) </span>
                                                                        </label>
                                                                            <input  type="file" name="image" class="form-control"
                                                                            id="image">
                                                                    </div>
                                                                </div>


                                                                <div class="row">


                                                                </div>

                                                                <table id="products" style="margin-top:20px">

                                                                    <a id="add-product" class="btn btn-primary" >Add Variation</a>
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Color</th>
                                                                            <th>Paper</th>
                                                                            <th>Thickness</th>
                                                                            <th>Quantity</th>
                                                                            <th>Price</th>
                                                                            <th></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <!-- Initial row, can be hidden -->
                                                                        @forelse($product_variations as $val)
                                                                            <tr class="product-row" style="margin-top:20px">
                                                                                <input type="text" name="product_cost_id[]" value="{{$val->id}}" style="display:none">
                                                                                <td style="width:20%">
                                                                                    <select required name="ink[]" class="form-control form-select" id="exampleFormControlSelect1">

                                                                                        <option value="single" @php if($val->ink == 'single') echo 'selected' @endphp>Single Color</option>
                                                                                        <option value="full" @php if($val->ink == 'full') echo 'selected' @endphp>Full Color</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td style="width:20%">
                                                                                    <select name="paper_type[]" required class="form-control form-select"  id="exampleFormControlSelect1">

                                                                                        <option value="50g" @php if($val->paper_type == '50g') echo 'selected' @endphp>50g</option>
                                                                                        <option value="60g" @php if($val->paper_type == '60g') echo 'selected' @endphp>60g</option>
                                                                                        <option value="70g" @php if($val->paper_type == '70g') echo 'selected' @endphp>70g</option>
                                                                                        <option value="80g" @php if($val->paper_type == '80g') echo 'selected' @endphp>80g</option>
                                                                                    </select>
                                                                                </td>

                                                                                <td style="width:20%">
                                                                                    <select required class="form-control form-select"  name="thickness[]" id="thickness">
                                                                                        <option value="199g" @php if($val->thickness == '199g') echo 'selected' @endphp>199g</option>
                                                                                        <option value="280g" @php if($val->thickness == '280g') echo 'selected' @endphp>280g</option>
                                                                                        <option value="300g" @php if($val->thickness == '300g') echo 'selected' @endphp>300g</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td style="width:20%"><input type="number" required class="form-control quantity" value="{{$val->quantity}}"  name="quantity[]" /></td>
                                                                                <td style="width:20%"><input type="number" required class="form-control price" value="{{$val->total_cost}}"  name="total_cost[]" /></td>



                                                                                <td>
                                                                                    <a class="remove-product btn btn-danger">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                                                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                                                                        </svg>
                                                                                        </a>
                                                                                </td>
                                                                            </tr>
                                                                        @empty
                                                                        @endforelse

                                                                    </tbody>
                                                                </table>

                                                                <div class="row">
                                                                    <div class="form-group mt-3 mb-3 col-md-12">
                                                                        <label for="address">Product Description
                                                                            </label>
                                                                            <textarea name="description" required  class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                                                                            id="description">{{$product->description}}</textarea>
                                                                            @error('description')
                                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                    </div>



                                                                </div>

                                                                <button class="btn btn-sm btn-danger" type="submit">
                                                                    <i class="text-white me-2" data-feather="check-circle"></i>Save
                                                                </button>
                                                            </form>
                                                            <hr/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if(request()->job_title == 'twenty_leaves')
                                        <div class="card">
                                            <div class="card-header bg-white">
                                                <h5 class="card-title mb-0 text-muted">Edit Product</h5>
                                            </div>
                                            <div class="card-body h-100">
                                                <div class="align-items-start">
                                                    <div class="tab-content" id="nav-tabContent">
                                                        <div class="tab-pane fade show active" id="nav-server"
                                                            role="tabpanel" aria-labelledby="nav-server-tab">

                                                            <form method="POST"  id="add_twenty_leaves" class="add_twenty_leaves" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('POST')
                                                                <div class="row">
                                                                    <div class="form-group mt-3 mb-3 col-md-4">
                                                                        <label for="production_time">Product Name</label>
                                                                        <select name="product_name" required class="form-control{{ $errors->has('product_name') ? ' is-invalid' : '' }} form-select">
                                                                            <option value="twenty_leaves" <?php if ($product->name == request()->job_title) echo 'selected' ?>>Twenty Leaves</option>
                                                                            @error('product_name')
                                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group mt-3 mb-3 col-md-4">
                                                                        <label for="production_time">Production Time (Days)
                                                                            </label> <input required type="number" value={{$product->production_days}} name="production_time" class="form-control"
                                                                            id="quantity" placeholder="eg: 4">
                                                                    </div>

                                                                    <div class="form-group mt-3 mb-3 col-md-4">
                                                                        <label for="production_time">Upload Image <span class="text-warning">(Only upload new image) </span>
                                                                        </label>
                                                                            <input  type="file" name="image" class="form-control"
                                                                            id="image">
                                                                    </div>
                                                                </div>


                                                                <div class="row">


                                                                </div>

                                                                <table id="products" style="margin-top:20px">

                                                                    <a id="add-product" class="btn btn-primary" >Add Variation</a>
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Color</th>
                                                                            <th>Paper</th>
                                                                            <th>Thickness</th>
                                                                            <th>Quantity</th>
                                                                            <th>Price</th>
                                                                            <th></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <!-- Initial row, can be hidden -->
                                                                        @forelse($product_variations as $val)
                                                                            <tr class="product-row" style="margin-top:20px">
                                                                                <input type="text" name="product_cost_id[]" value="{{$val->id}}" style="display:none">
                                                                                <td style="width:20%">
                                                                                    <select required name="ink[]" class="form-control form-select" id="exampleFormControlSelect1">

                                                                                        <option value="single" @php if($val->ink == 'single') echo 'selected' @endphp>Single Color</option>
                                                                                        <option value="full" @php if($val->ink == 'full') echo 'selected' @endphp>Full Color</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td style="width:20%">
                                                                                    <select name="paper_type[]" required class="form-control form-select"  id="exampleFormControlSelect1">

                                                                                        <option value="50g" @php if($val->paper_type == '50g') echo 'selected' @endphp>50g</option>
                                                                                        <option value="60g" @php if($val->paper_type == '60g') echo 'selected' @endphp>60g</option>
                                                                                        <option value="70g" @php if($val->paper_type == '70g') echo 'selected' @endphp>70g</option>
                                                                                        <option value="80g" @php if($val->paper_type == '80g') echo 'selected' @endphp>80g</option>
                                                                                    </select>
                                                                                </td>

                                                                                <td style="width:20%">
                                                                                    <select required class="form-control form-select"  name="thickness[]" id="thickness">
                                                                                        <option value="199g" @php if($val->thickness == '199g') echo 'selected' @endphp>199g</option>
                                                                                        <option value="280g" @php if($val->thickness == '280g') echo 'selected' @endphp>280g</option>
                                                                                        <option value="300g" @php if($val->thickness == '300g') echo 'selected' @endphp>300g</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td style="width:20%"><input type="number" required class="form-control quantity" value="{{$val->quantity}}"  name="quantity[]" /></td>
                                                                                <td style="width:20%"><input type="number" required class="form-control price" value="{{$val->total_cost}}"  name="total_cost[]" /></td>



                                                                                <td>
                                                                                    <a class="remove-product btn btn-danger">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                                                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                                                                        </svg>
                                                                                        </a>
                                                                                </td>
                                                                            </tr>
                                                                        @empty
                                                                        @endforelse

                                                                    </tbody>
                                                                </table>

                                                                <div class="row">
                                                                    <div class="form-group mt-3 mb-3 col-md-12">
                                                                        <label for="address">Product Description
                                                                            </label>
                                                                            <textarea name="description" required  class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                                                                            id="description">{{$product->description}}</textarea>
                                                                            @error('description')
                                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                    </div>



                                                                </div>

                                                                <button class="btn btn-sm btn-danger" type="submit">
                                                                    <i class="text-white me-2" data-feather="check-circle"></i>Save
                                                                </button>
                                                            </form>
                                                            <hr/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if(request()->job_title == '2A_notebook')
                                        <div class="card">
                                            <div class="card-header bg-white">
                                                <h5 class="card-title mb-0 text-muted">Edit Product</h5>
                                            </div>
                                            <div class="card-body h-100">
                                                <div class="align-items-start">
                                                    <div class="tab-content" id="nav-tabContent">
                                                        <div class="tab-pane fade show active" id="nav-server"
                                                            role="tabpanel" aria-labelledby="nav-server-tab">

                                                            <form method="POST"  id="add_twenty_leaves" class="add_twenty_leaves" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('POST')
                                                                <div class="row">
                                                                    <div class="form-group mt-3 mb-3 col-md-4">
                                                                        <label for="production_time">Product Name</label>
                                                                        <select name="product_name" required class="form-control{{ $errors->has('product_name') ? ' is-invalid' : '' }} form-select">
                                                                            <option value="2A_notebook" <?php if ($product->name == request()->job_title) echo 'selected' ?>>2A NoteBook</option>
                                                                            @error('product_name')
                                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group mt-3 mb-3 col-md-4">
                                                                        <label for="production_time">Production Time (Days)
                                                                            </label> <input required type="number" value={{$product->production_days}} name="production_time" class="form-control"
                                                                            id="quantity" placeholder="eg: 4">
                                                                    </div>

                                                                    <div class="form-group mt-3 mb-3 col-md-4">
                                                                        <label for="production_time">Upload Image <span class="text-warning">(Only upload new image) </span>
                                                                        </label>
                                                                            <input  type="file" name="image" class="form-control"
                                                                            id="image">
                                                                    </div>
                                                                </div>


                                                                <div class="row">


                                                                </div>

                                                                <table id="products" style="margin-top:20px">

                                                                    <a id="add-product" class="btn btn-primary" >Add Variation</a>
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Leaves</th>
                                                                            <th>Color</th>
                                                                            <th>Paper</th>
                                                                            <th>Thickness</th>
                                                                            <th>Quantity</th>
                                                                            <th>Price</th>
                                                                            <th></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <!-- Initial row, can be hidden -->
                                                                        @forelse($product_variations as $val)
                                                                            <tr class="product-row" style="margin-top:20px">
                                                                                <input type="text" name="product_cost_id[]" value="{{$val->id}}" style="display:none">
                                                                                <td style="width:15%">
                                                                                    <select name="leaves[]" required class="form-control form-select"  id="exampleFormControlSelect1">

                                                                                        <option value="40" @php if($val->leaves == '40') echo 'selected' @endphp>40 Leaves</option>
                                                                                        <option value="60" @php if($val->leaves == '60') echo 'selected' @endphp>60 Leaves</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td style="width:20%">
                                                                                    <select required name="ink[]" class="form-control form-select" id="exampleFormControlSelect1">
                                                                                        <option value="single" @php if($val->ink == 'single') echo 'selected'  @endphp>Single Color</option>
                                                                                        <option value="full"   @php if($val->ink == 'full')   echo 'selected'   @endphp>Full Color</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td style="width:20%">
                                                                                    <select name="paper_type[]" required class="form-control form-select"  id="exampleFormControlSelect1">

                                                                                        <option value="50g" @php if($val->paper_type == '50g') echo 'selected' @endphp>50g</option>
                                                                                        <option value="60g" @php if($val->paper_type == '60g') echo 'selected' @endphp>60g</option>
                                                                                        <option value="70g" @php if($val->paper_type == '70g') echo 'selected' @endphp>70g</option>
                                                                                        <option value="80g" @php if($val->paper_type == '80g') echo 'selected' @endphp>80g</option>
                                                                                    </select>
                                                                                </td>

                                                                                <td style="width:20%">
                                                                                    <select required class="form-control form-select"  name="thickness[]" id="thickness">
                                                                                        <option value="199g" @php if($val->thickness == '199g') echo 'selected' @endphp>199g</option>
                                                                                        <option value="280g" @php if($val->thickness == '280g') echo 'selected' @endphp>280g</option>
                                                                                        <option value="300g" @php if($val->thickness == '300g') echo 'selected' @endphp>300g</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td style="width:20%"><input type="number" required class="form-control quantity" value="{{$val->quantity}}"  name="quantity[]" /></td>
                                                                                <td style="width:20%"><input type="number" required class="form-control price" value="{{$val->total_cost}}"  name="total_cost[]" /></td>



                                                                                <td>
                                                                                    <a class="remove-product btn btn-danger">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                                                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                                                                        </svg>
                                                                                        </a>
                                                                                </td>
                                                                            </tr>
                                                                        @empty
                                                                        @endforelse
                                                                    </tbody>
                                                                </table>

                                                                <div class="row">
                                                                    <div class="form-group mt-3 mb-3 col-md-12">
                                                                        <label for="address">Product Description
                                                                            </label>
                                                                            <textarea name="description" required  class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                                                                            id="description">{{$product->description}}</textarea>
                                                                            @error('description')
                                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                    </div>

                                                                </div>

                                                                <button class="btn btn-sm btn-danger" type="submit">
                                                                    <i class="text-white me-2" data-feather="check-circle"></i>Save
                                                                </button>
                                                            </form>
                                                            <hr/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif


                                    @if(request()->job_title == '2B_notebook')
                                        <div class="card">
                                            <div class="card-header bg-white">
                                                <h5 class="card-title mb-0 text-muted">Edit Product</h5>
                                            </div>
                                            <div class="card-body h-100">
                                                <div class="align-items-start">
                                                    <div class="tab-content" id="nav-tabContent">
                                                        <div class="tab-pane fade show active" id="nav-server"
                                                            role="tabpanel" aria-labelledby="nav-server-tab">

                                                            <form method="POST"  id="add_twenty_leaves" class="add_twenty_leaves" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('POST')
                                                                <div class="row">
                                                                    <div class="form-group mt-3 mb-3 col-md-4">
                                                                        <label for="production_time">Product Name</label>
                                                                        <select name="product_name" required class="form-control{{ $errors->has('product_name') ? ' is-invalid' : '' }} form-select">
                                                                            <option value="2B_notebook" <?php if ($product->name == request()->job_title) echo 'selected' ?>>2B NoteBook</option>
                                                                            @error('product_name')
                                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group mt-3 mb-3 col-md-4">
                                                                        <label for="production_time">Production Time (Days)
                                                                            </label> <input required type="number" value={{$product->production_days}} name="production_time" class="form-control"
                                                                            id="quantity" placeholder="eg: 4">
                                                                    </div>

                                                                    <div class="form-group mt-3 mb-3 col-md-4">
                                                                        <label for="production_time">Upload Image <span class="text-warning">(Only upload new image) </span>
                                                                        </label>
                                                                            <input  type="file" name="image" class="form-control"
                                                                            id="image">
                                                                    </div>
                                                                </div>


                                                                <table id="products" style="margin-top:20px">

                                                                    <a id="add-product" class="btn btn-primary" >Add Variation</a>
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Leaves</th>
                                                                            <th>Color</th>
                                                                            <th>Paper</th>
                                                                            <th>Thickness</th>
                                                                            <th>Quantity</th>
                                                                            <th>Price</th>
                                                                            <th></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <!-- Initial row, can be hidden -->
                                                                        @forelse($product_variations as $val)
                                                                            <tr class="product-row" style="margin-top:20px">
                                                                                <input type="text" name="product_cost_id[]" value="{{$val->id}}" style="display:none">
                                                                                <td style="width:15%">
                                                                                    <select name="leaves" required class="form-control form-select"  id="exampleFormControlSelect1">

                                                                                        <option value="40" @php if($val->leaves == '40') echo 'selected' @endphp>40 Leaves</option>
                                                                                        <option value="60" @php if($val->leaves == '60') echo 'selected' @endphp>60 Leaves</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td style="width:20%">
                                                                                    <select required name="ink[]" class="form-control form-select" id="exampleFormControlSelect1">

                                                                                        <option value="single" @php if($val->ink == 'single') echo 'selected' @endphp>Single Color</option>
                                                                                        <option value="full" @php if($val->ink == 'full') echo 'selected' @endphp>Full Color</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td style="width:20%">
                                                                                    <select name="paper_type[]" required class="form-control form-select"  id="exampleFormControlSelect1">
                                                                                        <option value="50g" @php if($val->paper_type == '50g') echo 'selected' @endphp>50g</option>
                                                                                        <option value="60g" @php if($val->paper_type == '60g') echo 'selected' @endphp>60g</option>
                                                                                        <option value="70g" @php if($val->paper_type == '70g') echo 'selected' @endphp>70g</option>
                                                                                        <option value="80g" @php if($val->paper_type == '80g') echo 'selected' @endphp>80g</option>
                                                                                    </select>
                                                                                </td>

                                                                                <td style="width:18%">
                                                                                    <select required class="form-control form-select"  name="thickness[]" id="thickness">
                                                                                        <option value="199g" @php if($val->thickness == '199g') echo 'selected' @endphp>199g</option>
                                                                                        <option value="280g" @php if($val->thickness == '280g') echo 'selected' @endphp>280g</option>
                                                                                        <option value="300g" @php if($val->thickness == '300g') echo 'selected' @endphp>300g</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td style="width:18%"><input type="number" required class="form-control quantity" value="{{$val->quantity}}"  name="quantity[]" /></td>
                                                                                <td style="width:18%"><input type="number" required class="form-control price" value="{{$val->total_cost}}"  name="total_cost[]" /></td>



                                                                                <td>
                                                                                    <a class="remove-product btn btn-danger">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                                                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                                                                        </svg>
                                                                                        </a>
                                                                                </td>
                                                                            </tr>
                                                                        @empty
                                                                        @endforelse

                                                                    </tbody>
                                                                </table>

                                                                <div class="row">
                                                                    <div class="form-group mt-3 mb-3 col-md-12">
                                                                        <label for="address">Product Description
                                                                            </label>
                                                                            <textarea name="description" required  class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                                                                            id="description">{{$product->description}}</textarea>
                                                                            @error('description')
                                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                    </div>



                                                                </div>

                                                                <button class="btn btn-sm btn-danger" type="submit">
                                                                    <i class="text-white me-2" data-feather="check-circle"></i>Save
                                                                </button>
                                                            </form>
                                                            <hr/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif


                                    @if(request()->job_title == '2D_notebook')
                                        <div class="card">
                                            <div class="card-header bg-white">
                                                <h5 class="card-title mb-0 text-muted">Edit Product</h5>
                                            </div>
                                            <div class="card-body h-100">
                                                <div class="align-items-start">
                                                    <div class="tab-content" id="nav-tabContent">
                                                        <div class="tab-pane fade show active" id="nav-server"
                                                            role="tabpanel" aria-labelledby="nav-server-tab">

                                                            <form method="POST"  id="add_twenty_leaves" class="add_twenty_leaves" enctype="multipart/form-data">
                                                                @csrf
                                                                @method('POST')
                                                                <div class="row">
                                                                    <div class="form-group mt-3 mb-3 col-md-4">
                                                                        <label for="production_time">Product Name</label>
                                                                        <select name="product_name" required class="form-control{{ $errors->has('product_name') ? ' is-invalid' : '' }} form-select">
                                                                            <option value="2D_notebook" <?php if ($product->name == request()->job_title) echo 'selected' ?>>2D NoteBook</option>
                                                                            @error('product_name')
                                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </select>
                                                                    </div>

                                                                    <div class="form-group mt-3 mb-3 col-md-4">
                                                                        <label for="production_time">Production Time (Days)
                                                                            </label> <input required type="number" value={{$product->production_days}} name="production_time" class="form-control"
                                                                            id="quantity" placeholder="eg: 4">
                                                                    </div>

                                                                    <div class="form-group mt-3 mb-3 col-md-4">
                                                                        <label for="production_time">Upload Image <span class="text-warning">(Only upload new image) </span>
                                                                        </label>
                                                                            <input  type="file" name="image" class="form-control"
                                                                            id="image">
                                                                    </div>
                                                                </div>


                                                                <div class="row">


                                                                </div>

                                                                <table id="products" style="margin-top:20px">

                                                                    <a id="add-product" class="btn btn-primary" >Add Variation</a>
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Leaves</th>
                                                                            <th>Color</th>
                                                                            <th>Paper</th>
                                                                            <th>Thickness</th>
                                                                            <th>Quantity</th>
                                                                            <th>Price</th>
                                                                            <th></th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <!-- Initial row, can be hidden -->
                                                                        @forelse($product_variations as $val)
                                                                            <tr class="product-row" style="margin-top:20px">
                                                                                <input type="text" name="product_cost_id[]" value="{{$val->id}}" style="display:none">

                                                                                <td style="width:15%">
                                                                                    <select name="leaves" required class="form-control form-select"  id="exampleFormControlSelect1">

                                                                                        <option value="40" @php if($val->leaves == '40') echo 'selected' @endphp>40 Leaves</option>
                                                                                        <option value="60" @php if($val->leaves == '60') echo 'selected' @endphp>60 Leaves</option>
                                                                                    </select>
                                                                                </td>

                                                                                <td style="width:20%">
                                                                                    <select required name="ink[]" class="form-control form-select" id="exampleFormControlSelect1">

                                                                                        <option value="single" @php if($val->ink == 'single') echo 'selected' @endphp>Single Color</option>
                                                                                        <option value="full" @php if($val->ink == 'full') echo 'selected' @endphp>Full Color</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td style="width:20%">
                                                                                    <select name="paper_type[]" required class="form-control form-select"  id="exampleFormControlSelect1">

                                                                                        <option value="50g" @php if($val->paper_type == '50g') echo 'selected' @endphp>50g</option>
                                                                                        <option value="60g" @php if($val->paper_type == '60g') echo 'selected' @endphp>60g</option>
                                                                                        <option value="70g" @php if($val->paper_type == '70g') echo 'selected' @endphp>70g</option>
                                                                                        <option value="80g" @php if($val->paper_type == '80g') echo 'selected' @endphp>80g</option>
                                                                                    </select>
                                                                                </td>

                                                                                <td style="width:18%">
                                                                                    <select required class="form-control form-select"  name="thickness[]" id="thickness">
                                                                                        <option value="199g" @php if($val->thickness == '199g') echo 'selected' @endphp>199g</option>
                                                                                        <option value="280g" @php if($val->thickness == '280g') echo 'selected' @endphp>280g</option>
                                                                                        <option value="300g" @php if($val->thickness == '300g') echo 'selected' @endphp>300g</option>
                                                                                    </select>
                                                                                </td>
                                                                                <td style="width:18%"><input type="number" required class="form-control quantity" value="{{$val->quantity}}"  name="quantity[]" /></td>
                                                                                <td style="width:18%"><input type="number" required class="form-control price" value="{{$val->total_cost}}"  name="total_cost[]" /></td>



                                                                                <td>
                                                                                    <a class="remove-product btn btn-danger">
                                                                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                                                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                                                                        </svg>
                                                                                        </a>
                                                                                </td>
                                                                            </tr>
                                                                        @empty
                                                                        @endforelse

                                                                    </tbody>
                                                                </table>

                                                                <div class="row">
                                                                    <div class="form-group mt-3 mb-3 col-md-12">
                                                                        <label for="address">Product Description
                                                                            </label>
                                                                            <textarea name="description" required  class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                                                                            id="description">{{$product->description}}</textarea>
                                                                            @error('description')
                                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                    </div>



                                                                </div>

                                                                <button class="btn btn-sm btn-danger" type="submit">
                                                                    <i class="text-white me-2" data-feather="check-circle"></i>Save
                                                                </button>
                                                            </form>
                                                            <hr/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif

                                    @if(request()->job_title == 'drawing_book')
                                    <div class="card">
                                        <div class="card-header bg-white">
                                            <h5 class="card-title mb-0 text-muted">Edit Product</h5>
                                        </div>
                                        <div class="card-body h-100">
                                            <div class="align-items-start">
                                                <div class="tab-content" id="nav-tabContent">
                                                    <div class="tab-pane fade show active" id="nav-server"
                                                        role="tabpanel" aria-labelledby="nav-server-tab">

                                                        <form method="POST"  id="add_drawing_book" class="add_drawing_book" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('POST')
                                                            <div class="row">
                                                                <div class="form-group mt-3 mb-3 col-md-4">
                                                                    <label for="production_time">Product Name</label>
                                                                    <select name="product_name" required class="form-control{{ $errors->has('product_name') ? ' is-invalid' : '' }} form-select">
                                                                        <option value="drawing_book" <?php if ($product->name == request()->job_title) echo 'selected' ?>>Drawing Book</option>
                                                                        @error('product_name')
                                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                                        @enderror
                                                                    </select>
                                                                </div>

                                                                <div class="form-group mt-3 mb-3 col-md-4">
                                                                    <label for="production_time">Production Time (Days)
                                                                        </label> <input required type="number" value={{$product->production_days}} name="production_time" class="form-control"
                                                                        id="quantity" placeholder="eg: 4">
                                                                </div>

                                                                <div class="form-group mt-3 mb-3 col-md-4">
                                                                    <label for="production_time">Upload Image <span class="text-warning">(Only upload new image) </span>
                                                                    </label>
                                                                        <input  type="file" name="image" class="form-control"
                                                                        id="image">
                                                                </div>
                                                            </div>


                                                            <div class="row">


                                                            </div>

                                                            <table id="products" style="margin-top:20px">

                                                                <a id="add-product" class="btn btn-primary" >Add Variation</a>
                                                                <thead>
                                                                    <tr>
                                                                        <th>Leaves</th>
                                                                        <th>Color</th>
                                                                        <th>Paper</th>
                                                                        <th>Thickness</th>
                                                                        <th>Quantity</th>
                                                                        <th>Price</th>
                                                                        <th></th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <!-- Initial row, can be hidden -->
                                                                    @forelse($product_variations as $val)
                                                                        <tr class="product-row" style="margin-top:20px">
                                                                            <input type="text" name="product_cost_id[]" value="{{$val->id}}" style="display:none">
                                                                            <td style="width:15%">
                                                                                <select name="leaves[]" required class="form-control form-select"  id="exampleFormControlSelect1">

                                                                                    <option value="10" @php if($val->leaves == '10') echo 'selected' @endphp>10 Leaves</option>
                                                                                    <option value="20" @php if($val->leaves == '20') echo 'selected' @endphp>20 Leaves</option>
                                                                                    <option value="40" @php if($val->leaves == '40') echo 'selected' @endphp>40 Leaves</option>
                                                                                </select>
                                                                            </td>
                                                                            <td style="width:20%">
                                                                                <select required name="ink[]" class="form-control form-select" id="exampleFormControlSelect1">
                                                                                    <option value="single" @php if($val->ink == 'single') echo 'selected'  @endphp>Single Color</option>
                                                                                    <option value="full"   @php if($val->ink == 'full')   echo 'selected'   @endphp>Full Color</option>
                                                                                </select>
                                                                            </td>
                                                                            <td style="width:20%">
                                                                                <select name="paper_type[]" required class="form-control form-select"  id="exampleFormControlSelect1">

                                                                                    <option value="50g" @php if($val->paper_type == '50g') echo 'selected' @endphp>50g</option>
                                                                                    <option value="60g" @php if($val->paper_type == '60g') echo 'selected' @endphp>60g</option>
                                                                                    <option value="70g" @php if($val->paper_type == '70g') echo 'selected' @endphp>70g</option>
                                                                                    <option value="80g" @php if($val->paper_type == '80g') echo 'selected' @endphp>80g</option>
                                                                                </select>
                                                                            </td>

                                                                            <td style="width:20%">
                                                                                <select required class="form-control form-select"  name="thickness[]" id="thickness">
                                                                                    <option value="199g" @php if($val->thickness == '199g') echo 'selected' @endphp>199g</option>
                                                                                    <option value="280g" @php if($val->thickness == '280g') echo 'selected' @endphp>280g</option>
                                                                                    <option value="300g" @php if($val->thickness == '300g') echo 'selected' @endphp>300g</option>
                                                                                </select>
                                                                            </td>
                                                                            <td style="width:10%"><input type="number" required class="form-control quantity" value="{{$val->quantity}}"  name="quantity[]" /></td>
                                                                            <td style="width:30%"><input type="number" required class="form-control price" value="{{$val->total_cost}}"  name="total_cost[]" /></td>



                                                                            <td>
                                                                                <a class="remove-product btn btn-danger">
                                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                                                                        <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
                                                                                        <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
                                                                                    </svg>
                                                                                    </a>
                                                                            </td>
                                                                        </tr>
                                                                    @empty
                                                                    @endforelse
                                                                </tbody>
                                                            </table>

                                                            <div class="row">
                                                                <div class="form-group mt-3 mb-3 col-md-12">
                                                                    <label for="address">Product Description
                                                                        </label>
                                                                        <textarea name="description" required  class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}"
                                                                        id="description">{{$product->description}}</textarea>
                                                                        @error('description')
                                                                            <div class="invalid-feedback">{{ $message }}</div>
                                                                        @enderror
                                                                </div>

                                                            </div>

                                                            <button class="btn btn-sm btn-danger" type="submit">
                                                                <i class="text-white me-2" data-feather="check-circle"></i>Save
                                                            </button>
                                                        </form>
                                                        <hr/>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
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
