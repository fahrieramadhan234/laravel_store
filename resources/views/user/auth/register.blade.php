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
    <link href="{{asset('backend/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css"
        id="bs-default-stylesheet" />
    <link href="{{asset('backend/assets/css/app.min.css')}}" rel="stylesheet" type="text/css"
        id="app-default-stylesheet" />

    <link href="{{asset('backend/assets/css/bootstrap-dark.min.css')}}" rel="stylesheet" type="text/css"
        id="bs-dark-stylesheet" disabled />
    <link href="{{asset('backend/assets/css/app-dark.min.css')}}" rel="stylesheet" type="text/css"
        id="app-dark-stylesheet" disabled />

    <!-- icons -->
    <link href="{{asset('backend/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />

</head>

<body class="authentication-bg authentication-bg-pattern">

    <div class="account-pages mt-5 mb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-pattern">

                        <div class="card-body p-4">

                            <div class="text-center w-75 m-auto">
                                <div class="auth-logo">
                                    <a href="index.html" class="logo logo-dark text-center">
                                        <span class="logo-lg">
                                            <img src="{{asset('backend/assets/images/logo-dark.png')}}" alt=""
                                                height="22">
                                        </span>
                                    </a>

                                    <a href="index.html" class="logo logo-light text-center">
                                        <span class="logo-lg">
                                            <img src="{{asset('backend/assets/images/logo-light.png')}}" alt=""
                                                height="22">
                                        </span>
                                    </a>
                                </div>
                                <p class="text-muted mb-4 mt-3">Don't have an account? Create your account, it takes
                                    less than a minute</p>
                            </div>

                            <form action="/register/post" method="post" id="formCheckPassword">
                                {{ csrf_field() }}
                                <div class="form-group ">
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
                                    @endif
                                </div>
                                <div class="form-group">
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
                                <div class="form-group">
                                    <label for="emailaddress">Email address</label>
                                    <input name="email"
                                        class="form-control @if($errors->has('email')) parsley-error @endif"
                                        type="email" id="emailaddress" placeholder="Enter your email"
                                        value="{{old('email')}}">
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
                                            class="form-control @if($errors->has('password')) parsley-error @endif"
                                            placeholder="Enter your password" value="{{old('password')}}">
                                        <div class="input-group-append" data-password="false">
                                            <div class="input-group-text">
                                                <span class="password-eye"></span>
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
                                                <span class="password-eye"></span>
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
                                    <div
                                        class="radio radio-info form-check-inline @if($errors->has('sex')) parsley-error @endif">
                                        <input type="radio" id="male" value="M" name="sex" @if(old('sex')) checked
                                            @endif>
                                        <label for="male"> Male </label>
                                    </div>
                                    <div
                                        class="radio radio-info form-check-inline @if($errors->has('sex')) parsley-error @endif">
                                        <input type="radio" id="female" value="F" name="sex" @if(old('sex')) checked
                                            @endif>
                                        <label for="female"> Female </label>
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
                                    <button class="btn btn-success btn-block" type="submit"> Sign Up </button>
                                </div>

                            </form>

                            <div class="text-center">
                                <h5 class="mt-3 text-muted">Sign up using</h5>
                                <ul class="social-list list-inline mt-3 mb-0">
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);"
                                            class="social-list-item border-primary text-primary"><i
                                                class="mdi mdi-facebook"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);"
                                            class="social-list-item border-danger text-danger"><i
                                                class="mdi mdi-google"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);" class="social-list-item border-info text-info"><i
                                                class="mdi mdi-twitter"></i></a>
                                    </li>
                                    <li class="list-inline-item">
                                        <a href="javascript: void(0);"
                                            class="social-list-item border-secondary text-secondary"><i
                                                class="mdi mdi-github"></i></a>
                                    </li>
                                </ul>
                            </div>

                        </div> <!-- end card-body -->
                    </div>
                    <!-- end card -->

                    <div class="row mt-3">
                        <div class="col-12 text-center">
                            <p class="text-white-50">Already have account? <a href="/login"
                                    class="text-white ml-1"><b>Sign In</b></a></p>
                        </div> <!-- end col -->
                    </div>
                    <!-- end row -->

                </div> <!-- end col -->
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>
    <!-- end page -->

    <footer class="footer footer-alt">
        2015 - <script>
            document.write(new Date().getFullYear())
        </script> &copy; UBold theme by <a href="" class="text-white-50">Coderthemes</a>
    </footer>
    <script>
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