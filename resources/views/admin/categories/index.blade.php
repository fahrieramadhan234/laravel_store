@extends('admin.layouts.master')

@section('header')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link rel="stylesheet" href="{{asset('backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
<link rel="stylesheet" href="{{asset('backend/bootstrap-editable.css')}}">
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
                                                style="width: 300px;">Category</th>
                                            <th class="sorting" tabindex="0" aria-controls="example1" rowspan="1"
                                                colspan="1" aria-label="CSS grade: activate to sort column ascending"
                                                style="width: 125px;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; ?>
                                        @foreach ($categories as $c)
                                        <tr role="row" class="odd">
                                            <td><?= $no; ?></td>
                                            <td><a href="#" class="categories" data-type="text"
                                                    data-pk="{{$c->category_id}}" data-name="name"
                                                    data-url="/admin/categories/edit/{{$c->category_id}}"
                                                    data-title="Input Category">{{$c->category_name}}</a></td>
                                            <td>
                                                <a href="#" class="btn btn-danger btn-sm delete"
                                                    category-id="{{$c->category_id}}"
                                                    category-name="{{$c->category_name}}">Delete</a>
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

@endsection

<div class="modal fade" id="myModal" style="display: none;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title">Default Modal</h4>
            </div>
            <form role="form" action="/admin/categories/create" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="nim">Category Name</label>
                            <input name="category_name" type="text" class="form-control" id="name" placeholder="Name">
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

@section('footer')
<script src="{{asset('backend/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script src="{{asset('backend/bootstrap-editable.min.js')}}"></script>
<script>
    $(document).ready( function () {
        $('.delete').click(function(){
            var id = $(this).attr('category-id');
            var name = $(this).attr('category-name');
            swal({
            title: "Delete data?",
            text: "Are you sure want to delete this category ?",
            icon: "warning",
            buttons: true,
            dangerMode: true,
            })
            .then((willDelete) => {
                console.log(willDelete);
                if (willDelete) {
                    window.location = "/admin/categories/delete/"+id;
                } 
            });
        });
        $('#myTable').DataTable();
        $('.datepicker').datepicker({
            autoclose: true,
            format:'yyyy-mm-dd'
        });
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('.categories').editable();
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
    @elseif (Session::has('Error'))
        swal({
            title: "Error!",
            text: "{{Session::get('Error')}}",
            icon: "error",
            button: "Close!",
        });
    @endif
</script>
@endsection