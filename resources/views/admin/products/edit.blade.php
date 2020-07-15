@extends('admin.layouts.master')

@section('header')
<link rel="stylesheet" href="{{asset('backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('content')
<div class="content">
    <div class="col-12">
        <div class="card">
            <form role="form" action="/admin/product/update/{{$product->product_id}}" method="post"
                enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="nim">Product Name</label>
                            <input name="product_name" type="text" class="form-control" id="name" placeholder="Name"
                                value="{{$product->product_name}}">
                        </div>
                        <div class="form-group">
                            <label>Brand</label>
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
                            <label>Category</label>
                            <select name="category_id" class="form-control">
                                <option value="">--Category--</option>
                                @foreach ($categories as $c)
                                <option @if($product->categories->category_id == $c->category_id) selected @endif
                                    value="{{$c->category_id}}">{{$c->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nama">Price</label>
                            <input name="product_price" type="num" class="form-control" placeholder="Price"
                                value="{{$product->product_price}}">
                        </div>
                        <div class="form-group">
                            <label for="nama">Stock</label>
                            <input name="product_stock" type="num" class="form-control" placeholder="Stock"
                                value="{{$product->product_stock}}">
                        </div>
                        <div class="form-group">
                            <label for="nama">Description</label>
                            <textarea name="product_desc" cols="30" rows="10"
                                class="form-control">{{$product->product_desc}}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Pict</label>
                            <input name="product_pict" type="file" id="exampleInputFile">
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