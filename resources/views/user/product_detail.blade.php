@extends('user.layouts.master')

@section('content')
<div class="container">
    <div class="col-md-12">
        <form action="" method="post">
            <div class="row">
                <div class="col-md-3">
                    <img src="{{$product->getPict()}}" class="img-fluid" alt="Responsive image">
                </div>
                <div class="col-md-9">
                    <h1>{{$product->product_name}}</h1>
                    <h3>Rp. {{ number_format($product->product_price)}}</h3>
                    <input type="text" class="form-control" name="quantity">
                    <input type="button" value="Add to cart" class="btn btn-primary mt-4">
                </div>
            </div>
        </form>
    </div>
</div>
@endsection