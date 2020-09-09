@extends('admin.layouts.master')

@section('header')
<meta name="csrf-token" content="{{ csrf_token() }}" />
<link rel="stylesheet" href="{{asset('backend/bootstrap-editable.css')}}">
{{-- <link href="{{asset('backend/assets/libs/x-editable/bootstrap-editable/css/bootstrap-editable.css')}}"
rel="stylesheet"
type="text/css" /> --}}
<link href="{{asset('backend/assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css')}}" rel="stylesheet"
    type="text/css" />
<link href="{{asset('backend/assets/libs/datatables.net-responsive-bs4/css/responsive.bootstrap4.min.css')}}"
    rel="stylesheet" type="text/css" />
<link href="{{asset('backend/assets/libs/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css')}}" rel="stylesheet"
    type="text/css" />
<link href="{{asset('backend/assets/libs/datatables.net-select-bs4/css//select.bootstrap4.min.css')}}" rel="stylesheet"
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
                                    <h3 class="box-title">Data Products</h3>
                                </div>
                                <div class="col-lg-4">
                                    <div class="text-lg-right">
                                        <a href="" class="btn btn-primary" data-toggle="modal" data-target="#myModal"><i
                                                class="mdi mdi-plus-circle mr-1"></i>Add
                                            Data</a>
                                    </div>
                                </div>
                            </div>
                            <div id="basic-datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="myTable"
                                            class="table dt-responsive nowrap w-100 dataTable no-footer dtr-inline"
                                            role="grid" aria-describedby="basic-datatable_info" style="width: 1561px;">
                                            <thead>
                                                <tr role="row">
                                                    <th class="sorting_asc" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1" aria-sort="ascending"
                                                        aria-label="Rendering engine: activate to sort column descending"
                                                        style="width: 30px;">No</th>
                                                    <th class="sorting_asc" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1" aria-sort="ascending"
                                                        aria-label="Rendering engine: activate to sort column descending"
                                                        style="width: 300px;">Category</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="CSS grade: activate to sort column ascending"
                                                        style="width: 125px;">Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no=1; ?>
                                                @foreach ($categories as $c)
                                                <tr role="row" class="odd">
                                                    <td><?= $no; ?></td>
                                                    <td><a href="#" id="inline-username" data-type="text"
                                                            data-pk="{{$c->category_id}}"
                                                            data-url="/admin/categories/edit/{{$c->category_id}}"
                                                            data-title="Input Category"
                                                            class="editable editable-click categories"
                                                            style="">{{$c->category_name}}</a></td>
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
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div>
@endsection



@section('footer')
<script src="{{asset('backend/bootstrap-editable.min.js')}}"></script>


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
<script src="{{asset('backend/assets/js/pages/datatables.init.js')}}"></script>
<!-- Plugins js -->
<script src="{{asset('backend/assets/libs/moment/min/moment.min.js')}}"></script>
{{-- <script src="{{asset('backend/assets/libs/x-editable/bootstrap-editable/js/bootstrap-editable.min.js')}}"></script>
--}}

<!-- Init js-->
<script src="{{asset('backend/assets/js/pages/form-xeditable.init.js')}}"></script>

<script>
    $(document).ready( function () {
        $('.delete').click(function(){
            var id = $(this).attr('category-id');
            var name = $(this).attr('category-name');
            Swal.fire({
                title: 'Are you sure?',
                text: "Are you sure want to delete this category ?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            })
            .then((result) => {
                if (result.value) {
                    window.location = "/admin/categories/delete/"+id;
                }
            })
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