@extends('admin.layouts.master')

@section('header')
<link rel="stylesheet" href="{{asset('backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('content')
<div class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <div class="col-6">
                        <h3 class="box-title">Data Products</h3>
                    </div>
                    <div class="col-6 pull-right">
                        <a href="" class="btn btn-primary" data-toggle="modal" data-target="#myModal">Add Data</a>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div id="example1_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="myTable" class="table table-bordered table-striped dataTable" role="grid"
                                    aria-describedby="example1_info">
                                    <thead>
                                        <tr role="row">
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending"
                                                style="width: 30px;">No</th>
                                            <th class="sorting_asc" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-sort="ascending"
                                                aria-label="Rendering engine: activate to sort column descending"
                                                style="width: 300px;">Product Name</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending"
                                                style="width: 246px;">Brand</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Browser: activate to sort column ascending"
                                                style="width: 246px;">Category</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="Platform(s): activate to sort column ascending"
                                                style="width: 219px;">Price</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1"
                                                aria-label="Engine version: activate to sort column ascending"
                                                style="width: 172px;">Stock</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 125px;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; ?>
                                        @foreach ($products as $p)
                                        <tr role="row" class="odd">
                                            <td><?= $no; ?></td>
                                            <td><a
                                                    href="/admin/product/detail/{{$p->product_id}}">{{$p->product_name}}</a>
                                            </td>
                                            <td>{{$p->brands->brand_name}}</td>
                                            <td>{{$p->categories->category_name}}</td>
                                            <td>Rp. {{number_format($p->product_price)}}</td>
                                            <td>{{$p->product_stock}}</td>
                                            <td>
                                                <a href="/admin/product/edit/{{$p->product_id}}"
                                                    class="btn btn-warning btn-sm">Edit</a>
                                                <a href="#" class="btn btn-danger btn-sm delete"
                                                    product-id="{{$p->product_id}}"
                                                    product-name="{{$p->product_name}}">Hapus</a>
                                            </td>
                                        </tr>
                                        <?php $no++; ?>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="myModal" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Default Modal</h4>
            </div>
            <form role="form" action="/admin/product/create" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="nim">Product Name</label>
                            <input name="product_name" type="text" class="form-control" id="name" placeholder="Name">
                        </div>
                        <div class="form-group">
                            <label>Brand</label>
                            <select name="brand_id" class="form-control">
                                <option value="">--Brand--</option>
                                @foreach ($brands as $b)
                                <option value="{{$b->brand_id}}">{{$b->brand_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Category</label>
                            <select name="category_id" class="form-control">
                                <option value="">--Category--</option>
                                @foreach ($categories as $c)
                                <option value="{{$c->category_id}}">{{$c->category_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nama">Price</label>
                            <input name="product_price" type="num" class="form-control" placeholder="Price">
                        </div>
                        <div class="form-group">
                            <label for="nama">Stock</label>
                            <input name="product_stock" type="num" class="form-control" placeholder="Stock">
                        </div>
                        <div class="form-group">
                            <label for="nama">Description</label>
                            <textarea name="product_desc" cols="30" rows="10" class="form-control"></textarea>
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
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
@endsection

@section('footer')
<script src="{{asset('backend/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script>
    $(document).ready( function () {
        $('.delete').click(function(){
            var id = $(this).attr('product-id');
            var name = $(this).attr('product-name');
            swal({
            title: "Delete data?",
            text: "Are you sure want to delete this product ?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
                console.log(willDelete);
                if (willDelete) {
                    window.location = "/admin/product/delete/"+id;
                } 
            });
        });
        $('#myTable').DataTable(
            {
                // "language" : {
                //     "sEmptyTable":   "Tidak ada data yang tersedia pada tabel ini",
                //     "sProcessing":   "Sedang memproses...",
                //     "sLengthMenu":   "Tampilkan _MENU_ entri",
                //     "sZeroRecords":  "Tidak ditemukan data yang sesuai",
                //     "sInfo":         "Menampilkan _START_ sampai _END_ dari _TOTAL_ entri",
                //     "sInfoEmpty":    "Menampilkan 0 sampai 0 dari 0 entri",
                //     "sInfoFiltered": "(disaring dari _MAX_ entri keseluruhan)",
                //     "sInfoPostFix":  "",
                //     "sSearch":       "Cari:",
                //     "sUrl":          "",
                //     "oPaginate": {
                //         "sFirst":    "Pertama",
                //         "sPrevious": "Sebelumnya",
                //         "sNext":     "Selanjutnya",
                //         "sLast":     "Terakhir"
                //     }
                // }
            }
        );
        $('.datepicker').datepicker({
            autoclose: true,
            format:'yyyy-mm-dd'
        });
    });
</script>
<script>
    @if (Session::has('Success'))
        swal({
            title: "Success!",
            text: "{{Session::get('Success')}}",
            icon: "success",
            button: "Close!",
        });
    @endif
</script>
@endsection