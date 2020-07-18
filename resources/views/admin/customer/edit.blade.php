@extends('admin.layouts.master')

@section('header')
<link rel="stylesheet" href="{{asset('backend/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection

@section('content')
<div class="content-page">
    <div class="content">
        <div class="content-fluid">
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
                    <form role="form" action="/admin/customer/update/{{$customer->id}}" method="post"
                        enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="modal-body">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="nim">First Name</label>
                                    <input name="first_name" type="text" class="form-control" id="name"
                                        placeholder="First Name" value="{{$customer->first_name}}">
                                </div>
                                <div class="form-group">
                                    <label for="nim">Last Name</label>
                                    <input name="last_name" type="text" class="form-control" id="name"
                                        placeholder="Last Name" value="{{$customer->last_name}}">
                                </div>
                                <div class="form-group">
                                    <label for="nim">Email</label>
                                    <input name="email" type="text" class="form-control" id="name" placeholder="Name"
                                        value="{{$customer->email}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="radio">Sex</label><br>
                                    <div class="radio radio-info form-check-inline">
                                        <input type="radio" id="male" value="M" name="sex" @if($customer->sex == "M")
                                        checked @endif>
                                        <label for="male">
                                            Male </label>
                                    </div>
                                    <div class="radio radio-info form-check-inline">
                                        <input type="radio" id="female" value="F" name="sex" @if($customer->sex == "F")
                                        checked @endif>
                                        <label for="female"> Female </label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="nim">Phone Number</label>
                                    <input name="phone_number" type="num" class="form-control" id="phone_number"
                                        placeholder="Phone Number" value="{{$customer->phone_number}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="">Address</label>
                                    <textarea name="address" id="address" cols="30" rows="10"
                                        class="form-control">{{$customer->address}}</textarea>
                                </div>
                                <div class="form-group mb-0">
                                    <label>Avatar</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input name="avatar" type="file" class="custom-file-input"
                                                id="inputGroupFile04">
                                            <label class="custom-file-label" for="inputGroupFile04">Choose file</label>
                                        </div>
                                    </div>
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
@endsection