@extends('admin.layouts.master')

@section('content')
<div class="content">
    <div class="col-12">
        <div class="box box-primary box-solid">
            <div class="box-header with-border">
                <h3 class="box-title">Product Detail</h3>
                <div class="box-tools pull-right">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                    </button>
                </div>
                <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="col-md-5">
                    <img class="img-responsive pad" src="{{$product->getPict()}}" alt="Photo"
                        style="height: 300px; width: 400px">
                </div>
                <div class="col-md-7">
                    <div class="mb-4">
                        <h2>{{$product->product_name}}</h2>
                    </div>
                    <div class="harga ">
                        <h3>Rp. {{number_format($product->product_price)}}</h3>
                        <h5>Stock : {{$product->product_stock}}</h5>
                        <h2>Description</h2>
                        <p>
                            {{$product->product_desc}}
                        </p>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
    </div>
</div>


@endsection