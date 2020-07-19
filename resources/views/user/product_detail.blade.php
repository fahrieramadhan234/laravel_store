@extends('user.layouts.master')

@section('content')
<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="row">
                    <div class="col-12">
                        <div class="card-box">
                            <div class="row">
                                <div class="col-lg-5">
                                    <div class="tab-content pt-0">
                                        <div class="tab-pane active show" id="product-1-item">
                                            <img src="{{$product->getPict()}}" alt=""
                                                class="img-fluid mx-auto d-block rounded">
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                                <div class="col-lg-7">
                                    <div class="pl-xl-3 mt-3 mt-xl-0">
                                        <h4 class="mb-3">{{$product->product_name}}</h4>
                                        <p class="text-muted float-left mr-3">
                                            <span class="mdi mdi-star text-warning"></span>
                                            <span class="mdi mdi-star text-warning"></span>
                                            <span class="mdi mdi-star text-warning"></span>
                                            <span class="mdi mdi-star text-warning"></span>
                                            <span class="mdi mdi-star"></span>
                                        </p>
                                        <p class="mb-4"><a href="" class="text-muted">( 36 Customer Reviews )</a></p>
                                        <h6 class="text-danger text-uppercase">20 % Off</h6>
                                        <h4 class="mb-4">Price : <b>Rp. {{ number_format($product->product_price)}}</b>
                                        </h4>
                                        <h4><span class="badge bg-soft-success text-success mb-4">Instock</span></h4>
                                        <p class="text-muted mb-4">{{$product->product_desc}}</p>
                                        <div class="row mb-3">
                                            <div class="col-md-6">
                                                <div>
                                                    <p class="text-muted"><i
                                                            class="mdi mdi-checkbox-marked-circle-outline h6 text-primary mr-2"></i>
                                                        Sed ut perspiciatis unde</p>
                                                    <p class="text-muted"><i
                                                            class="mdi mdi-checkbox-marked-circle-outline h6 text-primary mr-2"></i>
                                                        Nemo enim ipsam voluptatem</p>
                                                    <p class="text-muted"><i
                                                            class="mdi mdi-checkbox-marked-circle-outline h6 text-primary mr-2"></i>
                                                        Temporibus autem quibusdam et</p>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div>
                                                    <p class="text-muted"><i
                                                            class="mdi mdi-checkbox-marked-circle-outline h6 text-primary mr-2"></i>
                                                        Itaque earum rerum hic</p>
                                                    <p class="text-muted"><i
                                                            class="mdi mdi-checkbox-marked-circle-outline h6 text-primary mr-2"></i>
                                                        Donec quam felis ultricies nec</p>
                                                </div>
                                            </div>
                                        </div>
                                        <form class="form-inline mb-4">
                                            <label class="my-1 mr-2" for="quantityinput">Quantity</label>
                                            <input type="num" class="custom-select my-1 mr-sm-3" id="quantityinput"
                                                max="3">
                                        </form>

                                        <div>
                                            <button type="button" class="btn btn-danger mr-2"><i
                                                    class="mdi mdi-heart-outline"></i></button>
                                            <button type="button" class="btn btn-success waves-effect waves-light">
                                                <span class="btn-label"><i class="mdi mdi-cart"></i></span>Add to cart
                                            </button>
                                        </div>
                                    </div>
                                </div> <!-- end col -->
                            </div>
                            <!-- end row -->

                        </div> <!-- end card-->
                    </div> <!-- end col-->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection