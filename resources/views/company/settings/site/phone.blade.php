
@extends('company.layout.master')
@section('content')
@section('title', 'Company Phone')
@php $page = 'phone' @endphp
<style>
    .question{
        color:red;
        font-weight: bold;
        width: 20% !important;
    }
    th, td {
  padding: 5px;
}

#colorDisplay {
    margin-top: 20px;
    width: 100px;
    height: 100px;
    border: 1px solid #ccc;
}
</style>
    <div class="content">
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-md-6 float-start">
                    <h4 class="m-0 text-dark text-muted">Site Settings</h4>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb float-end">
                        <li class="breadcrumb-item"><a href="#"> Home</a></li>
                        <li class="breadcrumb-item active">Site Settings</li>
                    </ol>
                </div>
            </div>

            <div class="content">
                <div class="canvas-wrapper">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="row">
                                @include('company.settings.site.site_inc')

                                <div class="col-md-9 col-xl-9">
                                    <div class="card">
                                        <div class="card-header bg-white">
                                            <h5 class="card-title mb-0 text-muted">Change Company Phone</h5>
                                        </div>
                                        <div class="card-body h-100">
                                            <div class="align-items-start">
                                                <div class="tab-content" id="nav-tabContent">
                                                    <div class="tab-pane fade show active" id="nav-server"
                                                        role="tabpanel" aria-labelledby="nav-server-tab">

                                                        <div class="row g-3 mb-3 mt-3">
                                                            <div class="col-md-12">
                                                                <form method="POST"  id="phone" class="phone" >
                                                                    @csrf
                                                                    @method('POST')
                                                                    <div class="row">

                                                                        <div class="form-group mt-3 mb-3 col-md-4">
                                                                            <label for="phone_1">Phone 1 </label>
                                                                            <input type="text" required name="phone_1" class="form-control{{ $errors->has('phone_1') ? ' is-invalid' : '' }}" value="{{ old('phone_1') ?? @$site_details->phone_1 }}" id="phone_1">
                                                                            @error('phone_1')
                                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="form-group mt-3 mb-3 col-md-4">
                                                                            <label for="phone_2">Phone 2 </label>
                                                                            <input type="text"  name="phone_2" class="form-control{{ $errors->has('phone_2') ? ' is-invalid' : '' }}" value="{{ old('phone_2') ?? @$site_details->phone_2 }}" id="phone_2">
                                                                            @error('phone_2')
                                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>

                                                                        <div class="form-group mt-3 mb-3 col-md-4">
                                                                            <label for="phone_3">Phone 3 </label>
                                                                            <input type="text"  name="phone_3" class="form-control{{ $errors->has('phone_3') ? ' is-invalid' : '' }}" value="{{ old('phone_3') ?? @$site_details->phone_3 }}" id="phone_3">
                                                                            @error('phone_3')
                                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>

                                                                    <button class="btn btn-sm btn-danger" type="submit">
                                                                        <i class="text-white me-2" data-feather="check-circle"></i>Save
                                                                    </button>
                                                                </form>
                                                                {{-- <div id="colorDisplay"></div> --}}
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
