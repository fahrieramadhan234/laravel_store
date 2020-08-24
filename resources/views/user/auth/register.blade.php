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

    <!-- App css -->
    {{-- <link href="{{asset('backend/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"
    id="bs-default-stylesheet" />
    <link href="{{asset('backend/assets/css/app.min.css')}}" rel="stylesheet" type="text/css"
        id="app-default-stylesheet" />

    <link href="{{asset('backend/assets/css/bootstrap-dark.min.css')}}" rel="stylesheet" type="text/css"
        id="bs-dark-stylesheet" disabled />
    <link href="{{asset('backend/assets/css/app-dark.min.css')}}" rel="stylesheet" type="text/css"
        id="app-dark-stylesheet" disabled /> --}}
    <link rel="stylesheet" href="{{asset('frontend/css/bootstrap.min.css')}}">


    <!-- icons -->
    <link href="{{asset('backend/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />

</head>

<body>

    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-4">
                    <form action="/register/post" method="post" id="formCheckPassword" class="m-5">
                        {{ csrf_field() }}
                        <div class="form-group ">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="fullname">First Name</label>
                                    <input name="first_name"
                                        class="form-control @if($errors->has('first_name')) parsley-error @endif"
                                        type="text" id="fullname" placeholder="Enter your First Name"
                                        data-parsley-id="53" aria-describedby="data-parsley-id"
                                        value="{{old('first_name')}}">
                                    @if($errors->has('first_name'))
                                    <ul class="parsley-errors-list filled" id="parsley-id-53" aria-hidden="false">
                                        <li class="parsley-required">{{$errors->first('first_name')}}</li>
                                    </ul>
                                    @endif</div>
                                <div class="col-md-6">
                                    <label for="fullname">Last Name</label>
                                    <input name="last_name"
                                        class="form-control @if($errors->has('last_name')) parsley-error @endif"
                                        type="text" id="fullname" placeholder="Enter your Last Name"
                                        value="{{old('last_name')}}">
                                    @if($errors->has('last_name'))
                                    <ul class="parsley-errors-list filled" id="parsley-id-53" aria-hidden="false">
                                        <li class="parsley-required">{{$errors->first('last_name')}}</li>
                                    </ul>
                                    @endif
                                </div>

                            </div>
                        </div>
                        {{-- <div class="form-group">
                           
                        </div> --}}
                        <div class="form-group">
                            <label for="emailaddress">Email address</label>
                            <input name="email" class="form-control @if($errors->has('email')) parsley-error @endif"
                                type="email" id="emailaddress" placeholder="Enter your email" value="{{old('email')}}">
                            @if($errors->has('email'))
                            <ul class="parsley-errors-list filled" id="parsley-id-53" aria-hidden="false">
                                <li class="parsley-required">{{$errors->first('email')}}</li>
                            </ul>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <div class="input-group input-group-merge">
                                <input name="password" type="password" id="password"
                                    class="password form-control @if($errors->has('password')) parsley-error @endif"
                                    placeholder="Enter your password" value="{{old('password')}}">
                                <div class="input-group-append" data-password="false">
                                    <div class="input-group-text">
                                        <a href="#" onclick="showPass()"><span class="password-eye"><i
                                                    class="eye fa fa-eye"></i></span></a>
                                    </div>
                                </div>
                            </div>
                            @if($errors->has('password'))
                            <ul class="parsley-errors-list filled" id="parsley-id-53" aria-hidden="false">
                                <li class="parsley-required">{{$errors->first('password')}}</li>
                            </ul>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="password">Confirm Password</label>
                            <div class="input-group input-group-merge">
                                <input name="confirm_password" type="password" id="cfmPassword"
                                    class="form-control @if($errors->has('confirm_password')) parsley-error @endif"
                                    placeholder="Enter your password" value="{{old('confirm_password')}}">
                                <div class="input-group-append" data-password="false">
                                    <div class="input-group-text">
                                        <a href="#" onclick="showPass()"><span class="password-eye"><i
                                                    class="eye fa fa-eye"></i></span></a>
                                    </div>
                                </div>
                            </div>
                            @if($errors->has('confirm_password'))
                            <ul class="parsley-errors-list filled" id="parsley-id-53" aria-hidden="false">
                                <li class="parsley-required">{{$errors->first('confirm_password')}}</li>
                            </ul>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="radio">Sex</label><br>
                            <div class="form-check form-check-inline @if($errors->has('sex')) parsley-error @endif">
                                <input class="form-check-input" type="radio" id="male" value="M" name="sex"
                                    @if(old('sex')) checked @endif>
                                <label class="form-check-label" for="male"> Male </label>
                            </div>
                            <div class="form-check form-check-inline @if($errors->has('sex')) parsley-error @endif">
                                <input class="form-check-input" type="radio" id="female" value="F" name="sex"
                                    @if(old('sex')) checked @endif>
                                <label class="form-check-label" for="female"> Female </label>
                            </div>
                            @if($errors->has('sex'))
                            <ul class="parsley-errors-list filled" id="parsley-id-53" aria-hidden="false">
                                <li class="parsley-required">{{$errors->first('sex')}}</li>
                            </ul>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="nama">Phone Number</label>
                            <input name="phone_number" type="num"
                                class="form-control @if($errors->has('phone_number')) parsley-error @endif"
                                placeholder="Phone Number" value="{{old('phone_number')}}">
                            @if($errors->has('phone_number'))
                            <ul class="parsley-errors-list filled" id="parsley-id-53" aria-hidden="false">
                                <li class="parsley-required">{{$errors->first('phone_number')}}</li>
                            </ul>
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
                            <button class="btn btn-primary btn-block" type="submit"> Sign Up </button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- end page -->

    <footer class="footer footer-alt">
        2015 - <script>
            document.write(new Date().getFullYear())
        </script> &copy; UBold theme by <a href="" class="text-white-50">Coderthemes</a>
    </footer>
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