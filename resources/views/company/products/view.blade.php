
@extends('company.layout.master')
@section('content')
@section('title', 'Dashboard')
@php $page = 'view_product' @endphp
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
                    <h4 class="m-0 text-dark text-muted">Job Order</h4>
                </div>
                <div class="col-md-6">
                    <ol class="breadcrumb float-end">
                        <li class="breadcrumb-item"><a href="#"> Home</a></li>
                        <li class="breadcrumb-item active">Job Order</li>
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
                                    <div class="card">
                                        <div class="card-header bg-white">
                                            <h5 class="card-title mb-0 text-muted">View Job Order</h5>
                                        </div>
                                        <div class="card-body h-100">
                                            <div class="align-items-start">
                                                <div class="tab-content" id="nav-tabContent">
                                                    <div class="tab-pane fade show active" id="nav-server"
                                                        role="tabpanel" aria-labelledby="nav-server-tab">

                                                        <div class="row g-3 ">
                                                            <div class="col-md-12">
                                                                <table width="100%"  class="details">
                                                                    <tr class="det">
                                                                      <td width="10%" class="question">Job Id :</td>
                                                                      <td>{{$product->id ?? 'N/A'}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td width="10%" class="question">Created By :</td>
                                                                        <td>{{@$product->createdBy->firstname.' '.@$product->createdBy->lastname ?? 'N/A'}}</td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td width="10%" class="question">Created At :</td>
                                                                        <td>{{$product->created_at ?? 'N/A'}}</td>
                                                                    </tr>


                                                                    <tr>
                                                                        <td width="10%" class="question">Updated By :</td>
                                                                        <td>{{@$product->updatedBy->firstname.' '.@$product->updatedBy->lastname ?? 'N/A'}}</td>
                                                                    </tr>

                                                                    <tr>
                                                                        <td width="10%" class="question">Updated At :</td>
                                                                        <td>{{$product->updated_at ?? 'N/A'}}</td>
                                                                    </tr>
                                                                    <tr class="det">
                                                                        <td width="10%" class="question">Product Name :</td>
                                                                        <td>{{$product->name ?? 'N/A'}}</td>
                                                                    </tr>

                                                                    <tr class="det">
                                                                        <td width="10%" class="question">Production Days :</td>
                                                                        <td>{{$product->production_days ?? 'N/A'}}</td>
                                                                    </tr class="det">

                                                                    <tr class="det">
                                                                        <td width="10%" class="question">Ink :</td>
                                                                        <td>{{$product->ink ?? 'N/A'}} Color</td>
                                                                    </tr>




                                                                    <tr class="det">
                                                                        <td width="10%" class="question">Paper Type :</td>
                                                                        <td>{{$product->paper_type ?? 'N/A'}}</td>
                                                                    </tr>
                                                                    <tr class="det">
                                                                        <td width="10%" class="question">Thickness :</td>
                                                                        <td>{{$product->thickness ?? 'N/A'}}</td>
                                                                    </tr>
                                                                    <tr class="det">
                                                                        <td width="10%" class="question">Proof Needed :</td>
                                                                        <td>{{$product->proof_needed ?? 'N/A'}}</td>
                                                                    </tr>

                                                                    <tr class="det">
                                                                        <td width="10%" class="question">Description :</td>
                                                                        <td>{{$product->description ?? 'N/A'}}</td>
                                                                    </tr>

                                                                </table>
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
