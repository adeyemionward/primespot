
@extends('company.layout.master')
@section('content')
@section('title', 'Site Theme')
@php $page = 'theme' @endphp
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

.color-box {
    width: 100px;
    height: 100px;
    margin: 20px;
    border: 1px solid #000;
}
</style>

    <div class="content">
        <div class="container-fluid">
            <div class="row mt-2">
                <div class="col-md-6 float-start">
                    <h4 class="m-0 text-dark text-muted">Change Theme</h4>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb float-end">
                        <li class="breadcrumb-item"><a href="#"> Home</a></li>
                        <li class="breadcrumb-item active">Change Theme</li>
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
                                            <h5 class="card-title mb-0 text-muted">Change Theme</h5>
                                        </div>
                                        <div class="card-body h-100">
                                            <div class="align-items-start">
                                                <div class="tab-content" id="nav-tabContent">
                                                    <div class="tab-pane fade show active" id="nav-server"
                                                        role="tabpanel" aria-labelledby="nav-server-tab">


                                                                <form method="POST"  id="colorPickerForm" class="logo_color" enctype="multipart/form-data">
                                                                    @csrf
                                                                    @method('POST')
                                                                        <div class="form-group mt-3 mb-3 row">
                                                                            <label for="secondary_color" class="col-md-12">Select Theme </label>
                                                                            <div class="col-md-4">
                                                                                @foreach ($themes as $theme)

                                                                                <div class="row row align-items-center">
                                                                                    <div class="col-md-8">
                                                                                        <input type="radio" style="display: inline-block; width: 24px; height: 24px;" required name="theme_id" class="{{ $errors->has('theme_id') ? ' is-invalid' : '' }}" {{@$theme->id == @$site_theme->site_theme_id ? 'checked' : ''}} value="{{$theme->id}}">
                                                                                        <span class="ml-2">{{$theme->name}}</span>
                                                                                    </div>
                                                                                    <div class="col-md-4">
                                                                                        <div class="color-box" style="background-color: {{$theme->color}}"></div>
                                                                                    </div>
                                                                                </div>
                                                                                @endforeach
                                                                                @error('theme')
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>

        </div>

    </div>

@endsection
