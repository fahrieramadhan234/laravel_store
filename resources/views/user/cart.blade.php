@extends('user.layouts.master')

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
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Ecommerce</a></li>
                                <li class="breadcrumb-item active">Shopping Cart</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Shopping Cart</h4>
                    </div>
                </div>
            </div>
            <!-- end page title -->

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="table-responsive">
                                        <table class="table table-borderless table-centered mb-0">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Price</th>
                                                    <th>Quantity</th>
                                                    <th>Total</th>
                                                    <th style="width: 50px;"></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(session('cart'))
                                                @foreach (session('cart') as $id => $detail)
                                                <?php $total = $detail['product_price'] * $detail['quantity']; ?>
                                                <tr>
                                                    <td>
                                                        <img src="{{$detail['product_pict']}}" alt="contact-img"
                                                            class="rounded mr-3" height="48">
                                                        <p class="m-0 d-inline-block align-middle font-16">
                                                            <a href="ecommerce-product-detail.html"
                                                                class="text-reset font-family-secondary">{{$detail['product_name']}}</a>
                                                        </p>
                                                    </td>
                                                    <td>
                                                        Rp.{{number_format($detail['product_price'])}}
                                                    </td>
                                                    <td>
                                                        <input type="number" min="1" value="{{$detail['quantity']}}"
                                                            class="form-control" placeholder="Qty" style="width: 90px;">
                                                    </td>
                                                    <td>
                                                        Rp.{{number_format($total)}}
                                                    </td>
                                                    <td>
                                                        <a href="javascript:void(0);" class="action-icon"> <i
                                                                class="mdi mdi-delete"></i></a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                @endif
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <td colspan="3"><b>Total</b></td>
                                                    {{-- <td><b>Rp.{{number_format($totalharga)}}</b></td> --}}
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div> <!-- end table-responsive-->

                                    <!-- Add note input-->
                                    <div class="mt-3">
                                        <label for="example-textarea">Add a Note:</label>
                                        <textarea class="form-control" id="example-textarea" rows="3"
                                            placeholder="Write some note.."></textarea>
                                    </div>

                                    <!-- action buttons-->
                                    <div class="row mt-4">
                                        <div class="col-sm-6">
                                            <a href="ecommerce-products.html"
                                                class="btn text-muted d-none d-sm-inline-block btn-link font-weight-semibold">
                                                <i class="mdi mdi-arrow-left"></i> Continue Shopping </a>
                                        </div> <!-- end col -->
                                        <div class="col-sm-6">
                                            <div class="text-sm-right">
                                                <a href="ecommerce-checkout.html" class="btn btn-danger"><i
                                                        class="mdi mdi-cart-plus mr-1"></i> Checkout </a>
                                            </div>
                                        </div> <!-- end col -->
                                    </div> <!-- end row-->
                                </div>
                                <!-- end col -->

                                {{-- <div class="col-lg-4">
                                    <div class="border p-3 mt-4 mt-lg-0 rounded">
                                        <h4 class="header-title mb-3">Order Summary</h4>

                                        <div class="table-responsive">
                                            <table class="table mb-0">
                                                <tbody>
                                                    <tr>
                                                        <td>Grand Total :</td>
                                                        <td>$1571.19</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Discount : </td>
                                                        <td>-$157.11</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Shipping Charge :</td>
                                                        <td>$25</td>
                                                    </tr>
                                                    <tr>
                                                        <td>Estimated Tax : </td>
                                                        <td>$19.22</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Total :</th>
                                                        <th>$1458.3</th>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- end table-responsive -->
                                    </div>

                                    <div class="alert alert-warning mt-3" role="alert">
                                        Use coupon code <strong>UBTF25</strong> and get 25% discount !
                                    </div>

                                    <div class="input-group mt-3">
                                        <input type="text" class="form-control form-control-light"
                                            placeholder="Coupon code" aria-label="Recipient's username">
                                        <div class="input-group-append">
                                            <button class="btn btn-light" type="button">Apply</button>
                                        </div>
                                    </div>

                                </div> <!-- end col --> --}}

                            </div> <!-- end row -->
                        </div> <!-- end card-body-->
                    </div> <!-- end card-->
                </div> <!-- end col -->
            </div>
            <!-- end row -->

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