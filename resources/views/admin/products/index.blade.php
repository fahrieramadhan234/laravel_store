@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">FILTER</h6>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Brand</label>
                        <select name="brand_filter" id="brand_filter" class="form-control">
                            <option value="">-- Select --</option>
                            @foreach ($brands as $b)
                            <option value="{{$b->brand_id}}" @if (old('brand_id')==$b->brand_id) selected
                                @endif>{{$b->brand_name}}
                            </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Category</label>
                        <select name="category_filter" id="category_filter" class="form-control select2">
                            <option value="">-- Select --</option>
                            @foreach ($categories as $c)
                                <option value="{{$c->category_id}}" @if (old('category_id')==$c->category_id) selected
                                    @endif>{{$c->category_name}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-6">
                    <div class="form-group">
                        <label for="">Start Price</label>
                        <input type="number" name="start_price" id="start_price" class="form-control money" placeholder="Rp.">
                    </div>
                    <div class="form-group">
                        <label for="">End Price</label>
                        <input type="number" name="end_price" id="end_price" class="form-control money" placeholder="Rp.">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12 mb-4">
                    <label for="">Stock</label>
                    <select name="stock_filter" class="form-control" id="stock_filter">
                        <option value="">-- Select --</option>
                        <option value="in_stock">In Stock</option>
                        <option value="limited">Limited</option>
                        <option value="out_of_stock">Out of Stock</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <button class="btn btn-primary" type="button" onClick="submit()">Filter</button>
                <button class="btn btn-light" type="button" onClick="reset()">Reset</button>
            </div>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3 justify-content-between">
            <div class="d-sm-flex align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">Data Products</h6>
                <a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">Add Product</a>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="table-product" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Product Name</th>
                            <th>Brand</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Barcode</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>

<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="standard-modalLabel"
    style="display: none;" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="standard-modalLabel">Modal Heading</h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form role="form" action="{{route('admin.product.create')}}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="nim">Product Name</label>
                            <input name="product_name" type="text"
                                class="form-control @if($errors->has('product_name')) parsley-error @endif" id="name"
                                placeholder="Name" value="{{old('product_name')}}">
                            @if ($errors->has('product_name'))
                            <ul class="parsley-errors-list filled" id="parsley-id-7" aria-hidden="false">
                                <li class="parsley-required">{{$errors->first('product_name')}}</li>
                            </ul>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Brand</label>
                            <select name="brand_id"
                                class="form-control @if($errors->has('brand_id')) parsley-error @endif">
                                <option value="">--Brand--</option>
                                @foreach ($brands as $b)
                                <option value="{{$b->brand_id}}" @if (old('brand_id')==$b->brand_id) selected
                                    @endif>{{$b->brand_name}} </option>
                                @endforeach
                            </select>
                            @if ($errors->has('brand_id'))
                            <ul class="parsley-errors-list filled" id="parsley-id-7" aria-hidden="false">
                                <li class="parsley-required">{{$errors->first('brand_id')}}</li>
                            </ul>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select name="category_id"
                                class="form-control @if($errors->has('category_id')) parsley-error @endif">
                                <option value="">--Category--</option>
                                @foreach ($categories as $c)
                                <option value="{{$c->category_id}}" @if (old('category_id')==$c->category_id) selected
                                    @endif>{{$c->category_name}}</option>
                                @endforeach
                            </select>
                            @if ($errors->has('category_id'))
                            <ul class="parsley-errors-list filled" id="parsley-id-7" aria-hidden="false">
                                <li class="parsley-required">{{$errors->first('category_id')}}</li>
                            </ul>
                            @endif
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="nama">Price</label>
                                <input name="product_price" type="num"
                                    class="form-control @if($errors->has('product_price')) parsley-error @endif"
                                    placeholder="Price" value="{{old('product_price')}}">
                                @if ($errors->has('product_price'))
                                <ul class="parsley-errors-list filled" id="parsley-id-7" aria-hidden="false">
                                    <li class="parsley-required">{{$errors->first('product_price')}}</li>
                                </ul>
                                @endif
                            </div>
                            <div class="form-group col-md-6">
                                <label for="nama">Stock</label>
                                <input name="product_stock" type="num"
                                    class="form-control @if($errors->has('product_stock')) parsley-error @endif"
                                    placeholder="Stock" value="{{old('product_stock')}}">
                                @if ($errors->has('product_stock'))
                                <ul class="parsley-errors-list filled" id="parsley-id-7" aria-hidden="false">
                                    <li class="parsley-required">{{$errors->first('product_stock')}}</li>
                                </ul>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nama">Description</label>
                            <textarea name="product_desc" cols="30" rows="10"
                                class="form-control @if($errors->has('product_desc')) parsley-error @endif">{{old('product_desc')}}</textarea>
                            @if ($errors->has('product_desc'))
                            <ul class="parsley-errors-list filled" id="parsley-id-7" aria-hidden="false">
                                <li class="parsley-required">{{$errors->first('product_desc')}}</li>
                            </ul>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Pict</label>
                            <input name="product_pict[]" type="file" multiple="multiple" id="exampleInputFile"
                                class="form-control-file @if($errors->has('product_pict')) parsley-error @endif"
                                value="{{old('product_pict')}}">
                            @if ($errors->has('product_pict'))
                            <ul class="parsley-errors-list filled" id="parsley-id-7" aria-hidden="false">
                                <li class="parsley-required">{{$errors->first('product_pict')}}</li>
                            </ul>
                            @endif
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>

@endsection

@section('javascript')
    <script>

        var table = null;

        (function(){
            loadTable();
            selectFilter();
        })();

        function loadTable() {
            table = $('#table-product').DataTable({
                // scrollX: true,
                processing: true,
                serverSide: true,
                ajax: {
                    url : '{{route("admin.product.data")}}',
                    method: 'GET',
                    data: function(value) {
                        value.brand_id = $('#brand_filter').val();
                        value.category_id = $('#category_filter').val();
                        value.start_price = $('#start_price').val();
                        value.end_price = $('#end_price').val();
                        value.stock = $('#stock_filter').val();
                    },
                },
                columns: [
                    { data: 'DT_RowIndex', name: 'no', sorting: false},
                    { data: 'name', name: 'name'},
                    { data: 'brand', name: 'brand'},
                    { data: 'category', name: 'category'},
                    { data: 'price', name: 'price'},
                    { data: 'stock', name: 'stock', render: function(data){
                        if(data >= 10){
                            return '<span class="badge text-success">In Stock</span>'
                        }else if(data > 0 && data < 10){
                            return '<span class="badge text-warning">Limited</span>'
                        }else if(data == 0) {
                            return '<span class="badge text-danger">Out of Stock</span>'
                        }
                    }},
                    { data: 'barcode', name: 'barcode', render: function(data) {
                        return "awa"
                    }},
                    { data: 'id', name: 'id', render: function(data){
                        let url = '{{url("/admin/product")}}'
                        return '<div class="btn-group">' +
                        '<a class="btn btn-sm btn-info" href="' + url +'/detail/' + data +'"><i class="fas fa-eye" style="color: white"></i></a>' +
                        '<a class="btn btn-sm btn-warning" href="' + url +'/edit/' + data +'"><i class="fas fa-edit" style="color: white"></i></a>' +
                        '<a class="btn btn-sm btn-danger delete" href="#" onClick="deleteConfirm(' + data + ')"><i class="fas fa-trash" style="color: white"></i></a>' +
                        '</div>';

                    }}
                ]
            });
        }

        function drawTable(){
            table.draw();
        }

        function submit() {
            drawTable();
        }

        function reset() {
            $('#brand_filter').val("");
            $('#category_filter').val("");
            $('#start_price').val("");
            $('#end_price').val("");
            $('#stock_filter').val("");
        }
        

        function deleteConfirm(id) {
            Swal.fire({
                    title: 'Are you sure?',
                    text: "Are you sure want to delete this product ?",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                })
                .then((result) => {
                    if (result.value) {
                        window.location ="/admin/product/delete/"+id ;
                    }
                })
        }

        @if($errors->any())
            $('#myModal').modal('show');
        @endif

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