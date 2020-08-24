<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Register & Signup | UBold - Responsive Admin Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{asset('backend/assets/images/favicon.ico')}}">
    {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"> --}}

    <!-- App css -->
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom_css.css')}}">


    <!-- icons -->
    <link href="{{asset('backend/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />

</head>

<body>

    <div class="container-fluid mt-4">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card mt-4">
                    <div class="text-center mt-4">    
                        <h2>Daftar akun baru</h2>
                    </div>
                    <form action="/register/post" method="post" id="formCheckPassword" class="m-5">
                        {{ csrf_field() }}
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-6">
                                    <input name="first_name"
                                        class="form-control @if($errors->has('first_name')) is-invalid @endif"
                                        type="text" id="fullname" placeholder="Nama Depan"
                                        data-parsley-id="53" aria-describedby="data-parsley-id"
                                        value="{{old('first_name')}}">
                                    @if($errors->has('first_name'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('first_name')}}
                                    </div>
                                    @endif
                                </div>
                                <div class="col-md-6">
                                    <input name="last_name"
                                        class="form-control @if($errors->has('last_name')) is-invalid @endif"
                                        type="text" id="fullname" placeholder="Nama Belakang"
                                        value="{{old('last_name')}}">
                                    @if($errors->has('last_name'))
                                    <div class="invalid-feedback">
                                        {{$errors->first('last_name')}}
                                    </div>
                                    @endif
                                </div>

                            </div>
                        </div>
                        <div class="form-group">
                            <input name="email" class="form-control @if($errors->has('email')) is-invalid @endif"
                                type="email" id="emailaddress" placeholder="Email" value="{{old('email')}}">
                            @if($errors->has('email'))
                            <div class="invalid-feedback">
                                {{$errors->first('email')}}
                            </div>
                            @endif
                        </div>
                        <div class="form-group">
                                <input name="password" type="password" id="password"
                                    class="password form-control @if($errors->has('password')) is-invalid @endif"
                                    placeholder="Password" value="{{old('password')}}">
                            @if($errors->has('password'))
                            <div class="invalid-feedback">
                                {{$errors->first('password')}}
                            </div>
                            @endif
                        </div>
                        <div class="form-group">
                                <input name="confirm_password" type="password" id="cfmPassword"
                                    class="form-control @if($errors->has('confirm_password')) is-invalid @endif"
                                    placeholder="Konfirmasi password" value="{{old('confirm_password')}}">
                            @if($errors->has('confirm_password'))
                            <div class="invalid-feedback">
                                {{$errors->first('confirm_password')}}
                            </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <div class="form-check form-check-inline @if($errors->has('sex')) is-invalid @endif">
                                <input class="form-check-input" type="radio" id="male" value="M" name="sex"
                                    @if(old('sex')) checked @endif>
                                <label class="form-check-label" for="male"> Laki-laki </label>
                            </div>
                            <div class="form-check form-check-inline @if($errors->has('sex')) is-invalid @endif">
                                <input class="form-check-input" type="radio" id="female" value="F" name="sex"
                                    @if(old('sex')) checked @endif>
                                <label class="form-check-label" for="female"> Perempuan </label>
                            </div>
                            @if($errors->has('sex'))
                            <div class="invalid-feedback">
                                {{$errors->first('sex')}}
                            </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <input name="phone_number" type="num"
                                class="form-control @if($errors->has('phone_number')) is-invalid @endif"
                                placeholder="Nomor Handphone" value="{{old('phone_number')}}">
                            @if($errors->has('phone_number'))
                            <div class="invalid-feedback">
                                {{$errors->first('phone_number')}}
                            </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="checkbox-signup">
                                <label class="custom-control-label" for="checkbox-signup">I accept <a
                                        href="javascript: void(0);" class="text-dark">Terms and
                                        Conditions</a></label>
                            </div>
                        </div>
                        <div class="form-group mb-0 text-center">
                            <button class="btn btn-primary btn-block" type="submit"> Daftar </button>
                        </div>
                        <div class="separator mt-4"> ATAU </div>
                        <div class="form-group mb-0 text-center mt-4">
                            <a class="btn btn-light btn-block" href="#"><i class="fab fa-google mr-2"></i> Daftar dengan Google </a>
                        </div>
                        <div class="form-group mb-0 text-center mt-4">
                            <a class="btn btn-light btn-block" href="#"><i class="fab fa-facebook mr-2"></i> Daftar dengan Facebook </a>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
    <!-- end page -->
    <script>
        function showPass() {
            const pass = document.getElementsByClassName('#password');
            const eye = document.getElementsByClassName('#eye')
            if ( pass.type === "password") {
                pass.type = "text"
            }else{
                pass.type = "password";
            }
        }
        $("#formCheckPassword").validate({
           rules: {
               password: { 
                    required: true,
                    minlength: 8,
                }, 
                cfmPassword: { 
                    equalTo: "#password",
                    required: true,
                    minlength: 8,
               }
           },
            messages:{
                password: { 
                    required:"the password is required"
               }
            }
        });
    </script>

    <!-- Vendor js -->
    <script src="{{asset('backend/assets/js/vendor.min.js')}}"></script>

    <!-- App js -->
    <script src="{{asset('backend/assets/js/app.min.js')}}"></script>

</body>

</html>