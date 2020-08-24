@extends('user.layouts.master')

@section('content')
<div class="content-page mt-4 bg-dark container">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="row">
                    @foreach ($products as $p)
                    <div class="col-md-6 col-xl-3">
                        <a href="/product/detail/{{$p->product_id}}">
                            <div class="card-box">
                                <div class="bg-dark">
                                    {{-- {{dd($p->product_picture[0]->product_pict)}} --}}
                                    <img src="{{asset('backend/images/products_image/' . $p->product_picture[0]->product_pict)}}"
                                        alt="product-pic" class="img-fluid" style="height: 250px">
                                </div>
                                <div class="product-info">
                                    <div class="row align-items-center">
                                        <div class="col">
                                            <h5 class="font-16 mt-0 sp-line-1"><a href="ecommerce-product-detail.html"
                                                    class="text-dark">{{$p->product_name}}</a> </h5>
                                            <div class="text-warning mb-2 font-13">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <h5 class="m-0"> <span class="text-muted"> Stocks :
                                                    {{number_format($p->product_stock)}}</span></h5>
                                        </div>
                                        <div class="col-auto">
                                            <h3 class="text-success">Rp. {{number_format($p->product_price)}}</h3>
                                        </div>
                                    </div> <!-- end row -->
                                </div> <!-- end product info-->
                            </div> <!-- end card-box-->
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer')
<script>
    @if (Session::has('Success'))
        Swal.fire(
            'Success!',
            "{{Session::get('Success')}}",
            'success'
        )
    @elseif (Session::has('Error'))
        Swal.fire({
            title: "Error!",
            text: "{{Session::get('Error')}}",
            type: "error",
            button: "Close!",
        });
    @endif
</script>
@endsection