@extends('admin.layouts.master')

@section('header')
<link rel="stylesheet" href="{{asset('backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('content')
<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="javascript: void(0);">UBold</a></li>
                                <li class="breadcrumb-item"><a href="javascript: void(0);">Tables</a></li>
                                <li class="breadcrumb-item active">Update Product</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Datatables</h4>
                    </div>
                </div>
            </div>
            <div class="col-12">
                <div class="card">
                    <form role="form" action="/admin/product/update/{{$product->product_id}}" method="post"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="nim">Product Name</label><span class="text-danger">*</span>
                                    <input name="product_name" type="text" class="form-control" id="name"
                                        placeholder="Name" value="{{$product->product_name}}">
                                </div>
                                <div class="form-group">
                                    <label>Brand</label><span class="text-danger">*</span>
                                    <select name="brand_id" class="form-control">
                                        <option value="">--Brand--</option>
                                        @foreach ($brands as $b)
                                        <option @if($product->brands->brand_id == $b->brand_id) selected @endif
                                            value="{{$b->brand_id}}"
                                            >{{$b->brand_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Category</label><span class="text-danger">*</span>
                                    <select name="category_id" class="form-control">
                                        <option value="">--Category--</option>
                                        @foreach ($categories as $c)
                                        <option @if($product->categories->category_id == $c->category_id) selected
                                            @endif
                                            value="{{$c->category_id}}">{{$c->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="nama">Price</label><span class="text-danger">*</span>
                                    <input name="product_price" type="num" class="form-control" placeholder="Price"
                                        value="{{$product->product_price}}">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Stock</label><span class="text-danger">*</span>
                                    <input name="product_stock" type="num" class="form-control" placeholder="Stock"
                                        value="{{$product->product_stock}}">
                                </div>
                                <div class="form-group">
                                    <label for="weight">Weight</label><span class="text-danger">*</span>
                                    <input type="text" name="weight" class="form-control" placeholder="Weight (gram)"
                                        value="{{$product->product_weight}}">
                                </div>
                                <div class="form-group">
                                    <label for="nama">Description</label><span class="text-danger">*</span>
                                    <textarea name="product_desc" cols="30" rows="10"
                                        class="form-control">{{$product->product_desc}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Pict</label>
                                    <input name="product_pict" type="file" id="exampleInputFile"
                                        class="form-control-file">
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('footer')
<script src="{{asset('backend/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script>
    $(document).ready( function () {
        $('#myTable').DataTable();
        $('#datepicker').datepicker({
            autoclose: true,
            format:'yyyy-mm-dd'
        });
    });
</script>
@endsection