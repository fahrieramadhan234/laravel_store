@extends('admin.layouts.master')

@section('css')
<link href="{{asset('backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet"
    type="text/css" />
<link href="{{asset('backend/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}"
    rel="stylesheet" type="text/css" />
<link href="{{asset('backend/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet"
    type="text/css" />
<link href="{{asset('backend/assets/libs/datatables.net-select-bs4/css/select.bootstrap4.min.css')}}" rel="stylesheet"
    type="text/css" />
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
                                <li class="breadcrumb-item active">Datatables</li>
                            </ol>
                        </div>
                        <h4 class="page-title">Datatables</h4>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-lg-8">
                                    <h3 class="box-title">Filter</h3>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="">Brand</label>
                                        <select name="brand_filter" id="brand_filter" class="form-control">
                                            <option value="">-- Select --</option>
                                                @foreach ($brands as $b)
                                                <option value="{{$b->brand_id}}" @if (old('brand_id')==$b->brand_id) selected
                                                    @endif>{{$b->brand_name}} </option>
                                                @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Category</label>
                                        <select name="category_filter" id="category_filter" class="form-control select2">
                                            <option value="">-- Select --</option>
                                                @foreach ($categories as $c)
                                                <option value="{{$c->category_id}}" @if (old('category_id')==$c->category_id) selected
                                                    @endif>{{$c->category_name}}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Start Price</label>
                                        <input type="number" name="start_price" id="start_price" class="form-control money">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Endt Price</label>
                                        <input type="number" name="end_price" id="end_price" class="form-control money">
                                    </div>
                                    <div class="form-group">
                                        <button class="btn btn-primary" type="button" onClick="submit()">Filter</button>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row mb-4">
                                <div class="col-lg-8">
                                    <h3 class="box-title">Data Products</h3>
                                </div>
                                <div class="col-lg-4">
                                    <div class="text-lg-right">
                                        <div class="dt-buttons btn-group flex-wrap mr-2">
                                            <button class="btn btn-secondary buttons-copy buttons-html5 btn-light"
                                                tabindex="0" aria-controls="datatable-buttons"
                                                type="button">
                                                <span>Copy</span>
                                            </button>
                                            <a href="#" onclick="print()"
                                                class="btn btn-secondary buttons-print btn-light" type="button">
                                                <span>Print</span>
                                            </a>
                                            <a href="/admin/products/print_pdf"
                                                class="btn btn-secondary buttons-pdf btn-light"
                                                type="button"><span>PDF</span>
                                            </a> 
                                        </div>
                                        <a href="" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i
                                                class="mdi mdi-plus-circle mr-1"></i>Add
                                            Data</a>
                                    </div>
                                </div>
                            </div>
                            <div id="basic-datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="table-product"
                                            class="table dt-responsive nowrap w-100 dataTable no-footer dtr-inline"
                                            role="grid" aria-describedby="basic-datatable_info" style="width: 1561px;">
                                            <thead>
                                                <tr role="row">
                                                    <th>#</th>
                                                    <th>Product Name</th>
                                                    <th>Brand</th>
                                                    <th>Category</th>
                                                    <th>Price</th>
                                                    <th>Stock</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- end card body-->
                    </div> <!-- end card -->
                </div><!-- end col-->
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
<script src="{{asset('backend/assets/libs/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/assets/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend/assets/libs/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('backend/assets/libs/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend/assets/libs/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{asset('backend/assets/libs/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend/assets/libs/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{asset('backend/assets/libs/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
<script src="{{asset('backend/assets/libs/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{asset('backend/assets/libs/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
<script src="{{asset('backend/assets/libs/datatables.net-select/js/dataTables.select.min.js')}}"></script>
<script src="{{asset('backend/assets/libs/pdfmake/build/pdfmake.min.js')}}"></script>
<script src="{{asset('backend/assets/libs/pdfmake/build/vfs_fonts.js')}}"></script>
<script src="{{asset('backend/assets/js/pages/datatables.init.js')}}"></script>
<script>
    function print() {
        print("lul")
    }
</script>
<script>
    @if($errors->any())
        $(document).ready( function () {
            $('#myModal').modal('show');
        });
    @endif
</script>
<script type="text/javascript">
    var table = null;

    (function(){
        loadTable();
    })();

    function loadTable() {
        table = $('#table-product').DataTable({
            scrollX: true,
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
                        return '<span class="badge badge-soft-success text-success">In Stock</span>'
                    }else if(data > 0 && data <= 10){
                        return '<span class="badge badge-soft-warning text-warning">Limited</span>'
                    }else if(data == 0) {
                        return '<span class="badge badge-soft-danger text-danger">Out of Stock</span>'
                    }
                }},
                { data: 'id', name: 'id', render: function(data){
                    let url = '{{url("/admin/product")}}'
                    return '<div class="btn-group">' +
                    '<a class="btn btn-sm btn-info" href="' + url +'/detail/' + data +'"><i class="mdi mdi-eye" style="color: white"></i></a>' +
                    '<a class="btn btn-sm btn-warning" href="' + url +'/edit/' + data +'"><i class="mdi mdi-pencil" style="color: white"></i></a>' +
                    '<a class="btn btn-sm btn-danger delete" href="#" onClick="deleteConfirm(' + data + ')"><i class="mdi mdi-delete" style="color: white"></i></a>' +
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

</script>
<script>
    $(document).ready( function () {
        // $('.delete').click(function(){
        //     const id = $(this).attr('product-id');
        //     Swal.fire({
        //         title: 'Are you sure?',
        //         text: "Are you sure want to delete this product ?",
        //         type: 'warning',
        //         showCancelButton: true,
        //         confirmButtonColor: '#3085d6',
        //         cancelButtonColor: '#d33',
        //         confirmButtonText: 'Yes, delete it!'
        //     })
        //     .then((result) => {
        //         if (result.value) {
        //             window.location ="/admin/product/delete/"+id ;
        //         }
        //     })
        // });
        $('.datepicker').datepicker({
            autoclose: true,
            format:'yyyy-mm-dd'
        });
    });
</script>
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