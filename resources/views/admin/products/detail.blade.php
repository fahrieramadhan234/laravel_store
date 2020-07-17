@extends('admin.layouts.master')

@section('content')
<div class="content-page">
    <div class="content">

        <!-- Start Content-->
        <div class="container-fluid">

            <!-- start page title -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">UBold</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">eCommerce</a></li>
                                <li class="breadcrumb-item active">Product Detail</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Product Detail</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

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
                                    <div class="tab-pane" id="product-2-item">
                                        <img src="../assets/images/products/product-10.jpg" alt=""
                                            class="img-fluid mx-auto d-block rounded">
                                    </div>
                                    <div class="tab-pane" id="product-3-item">
                                        <img src="../assets/images/products/product-11.jpg" alt=""
                                            class="img-fluid mx-auto d-block rounded">
                                    </div>
                                    <div class="tab-pane" id="product-4-item">
                                        <img src="../assets/images/products/product-12.jpg" alt=""
                                            class="img-fluid mx-auto d-block rounded">
                                    </div>
                                </div>
                            </div> <!-- end col -->
                            <div class="col-lg-7">
                                <div class="pl-xl-3 mt-3 mt-xl-0">
                                    <a href="#" class="text-primary">Jack &amp; Jones</a>
                                    <h4 class="mb-3">{{$product->product_name}}</h4>
                                    <p class="text-muted float-left mr-3">
                                        <span class="mdi mdi-star text-warning"></span>
                                        <span class="mdi mdi-star text-warning"></span>
                                        <span class="mdi mdi-star text-warning"></span>
                                        <span class="mdi mdi-star text-warning"></span>
                                        <span class="mdi mdi-star"></span>
                                    </p>
                                    <p class="mb-4"><a href="" class="text-muted">( 36 Customer Reviews )</a></p>
                                    <h4 class="mb-4">Price : <span class="text-muted mr-2"></span>
                                        <b>Rp. {{number_format($product->product_price)}}</b></h4>
                                    <h4><span class="badge bg-soft-success text-success mb-4">{{$stock}}</span></h4>
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

                                    <div>
                                        <a href="/admin/product/edit/{{$product->product_id}}" class="btn btn-primary">
                                            Edit </a>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->

                    </div> <!-- end card-->
                </div> <!-- end col-->
            </div>
            <!-- end row-->

        </div> <!-- container -->

    </div> <!-- content -->

    <!-- Footer Start -->
    <footer class="footer">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    2015 - <script>
                        document.write(new Date().getFullYear())
                    </script>2020 © UBold theme by <a href="">Coderthemes</a>
                </div>
                <div class="col-md-6">
                    <div class="text-md-right footer-links d-none d-sm-block">
                        <a href="javascript:void(0);">About Us</a>
                        <a href="javascript:void(0);">Help</a>
                        <a href="javascript:void(0);">Contact Us</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- end Footer -->

</div>


@endsection