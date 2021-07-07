<title>Truck Institute - Login</title>
@include('/includes.header')
<body>
    <!-- ============================================================== -->
    <!-- login page  -->
    <!-- ============================================================== -->
    <div class="splash-container">
        <div class="card ">
            <div class="card-header text-center"><a href="/"><img class="logo-img" src="../assets/images/logo.png" alt="logo"></a><span class="splash-description">Please enter your user information.</span></div>
            @if (session()->has('err'))
                <div class="alert alert-danger text-center">
                    Email or Password is not Correct!
                </div>
            @endif
            <div class="card-body">
                <form action="/pages_login" method="POST">
                    @csrf
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="email" name="email" type="email" placeholder="Email" autocomplete="off">
                        <p class="error">{{ $errors->first('email') }}</p>
                    </div>
                    <div class="form-group">
                        <input class="form-control form-control-lg" id="password" name="password" type="password" placeholder="Password">
                        <p class="error">{{ $errors->first('password') }}</p>
                    </div>
                    <div class="form-group">
                        <label class="custom-control custom-checkbox">
                            <input class="custom-control-input" type="checkbox"><span class="custom-control-label">Remember Me</span>
                        </label>
                    </div>
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>
                </form>
            </div>
            <div class="card-footer bg-white p-0  ">
                <div class="card-footer-item card-footer-item-bordered">
                    <a href="/pages_register" class="footer-link">Create An Account</a></div>
                {{-- <div class="card-footer-item card-footer-item-bordered">
                    <a href="#" class="footer-link">Forgot Password</a>
                </div> --}}
            </div>
        </div>
    </div>
  
    <!-- ============================================================== -->
    <!-- end login page  -->
    <!-- ============================================================== -->
    <!-- Optional JavaScript -->
    <script src="/assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
</body>
 
</html>