@extends('admin.layouts.master')

@section('header')
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
                                    <a href="" class="btn btn-danger mb-2" data-toggle="modal" data-target="#myModal"><i
                                            class="mdi mdi-plus-circle mr-2"></i> Add
                                        Customers</a>
                                </div>
                            </div>
                            <div id="basic-datatable_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="datatable-buttons_wrapper"
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
                                                        style="width: 300px;">Customer</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending"
                                                        style="width: 246px;">Email</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="Browser: activate to sort column ascending"
                                                        style="width: 246px;">Phone Number</th>
                                                    <th class="sorting" tabindex="0" aria-controls="example1"
                                                        rowspan="1" colspan="1"
                                                        aria-label="CSS grade: activate to sort column ascending"
                                                        style="width: 125px;">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $no=1; ?>
                                                @foreach ($customer as $customer)
                                                <tr role="row" class="odd">
                                                    <td><?= $no; ?></td>
                                                    <td class="table-user"><img src="{{$customer->getAvatar()}}"
                                                            alt="table-user" class="mr-2 rounded-circle"><a
                                                            href="/admin/customer/profile/{{$customer->id}}">
                                                            {{$customer->first_name}}
                                                            {{$customer->last_name}}</a></td>
                                                    <td>{{$customer->email}}</td>
                                                    <td>{{$customer->phone_number}}</td>
                                                    <td>
                                                        {{-- <a href="#" class="btn btn-warning btn-sm">Edit</a> --}}
                                                        <a href="/admin/customer/edit/{{$customer->id}}"
                                                            class="action-icon"> <i class="mdi mdi-square-edit-outline"
                                                                data-toggle="tooltip" data-placement="top"
                                                                data-original-title="Edit"></i></a>
                                                        <a href="#" class="action-icon delete"
                                                            customer-id="{{$customer->id}}" customer-name="#"> <i
                                                                class="mdi mdi-delete" data-toggle="tooltip"
                                                                data-placement="top"
                                                                data-original-title="Delete"></i></a>
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
            <form role="form" action="/admin/customer/create" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label for="nim">First Name</label>
                            <input name="first_name" type="text" class="form-control" id="name"
                                placeholder="First Name">
                        </div>
                        <div class="form-group">
                            <label for="nim">Last Name</label>
                            <input name="last_name" type="text" class="form-control" id="name" placeholder="Last Name">
                        </div>
                        <div class="form-group">
                            <label for="nim">Email</label>
                            <input name="email" type="email" class="form-control" id="name" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="radio">Sex</label><br>
                            <div class="radio radio-info form-check-inline">
                                <input type="radio" id="male" value="M" name="sex">
                                <label for="male"> Male </label>
                            </div>
                            <div class="radio radio-info form-check-inline">
                                <input type="radio" id="female" value="F" name="sex">
                                <label for="female"> Female </label>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="nama">Phone Number</label>
                            <input name="phone_number" type="num" class="form-control" placeholder="Phone Number">
                        </div>
                        <div class="form-group">
                            <label for="nama">Address</label>
                            <textarea name="address" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Avatar</label>
                            <input name="avatar" type="file" id="exampleInputFile" class="form-control-file">
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
    $(document).ready( function () {
        $('.delete').click(function(){
            var id = $(this).attr('customer-id');
            var name = $(this).attr('customer-name');
            Swal.fire({
                title: 'Are you sure?',
                text: "Are you sure want to delete this customer ?",
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            })
            .then((result) => {
                if (result.value) {
                    window.location = "/admin/customer/delete/"+id;
                }
            })
        });
        $('#datatable-buttons_wrapper').DataTable();
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