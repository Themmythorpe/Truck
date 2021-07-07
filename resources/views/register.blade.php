@include('/includes.header')
<body>
    <!-- ============================================================== -->
    <!-- signup form  -->
    <!-- ============================================================== -->
    <form class="splash-container" action="/pages_register" method="POST">
        @csrf
        <div class="card">
            <div class="card-header">
                <h3 class="mb-1">Registrations Form</h3>
                <p>Please enter your user information.</p>
            </div>
            @if (session()->has('err'))
                <div class="alert alert-danger">
                    You have to agree with the Term and Condition given!
                </div>
            @endif
            <div class="card-body">
                <div class="form-group">
                    <input class="form-control form-control-lg" id="username" name="name" type="text" placeholder="Username" autocomplete="off">
                    <p class="error">{{ $errors->first('name') }}</p>
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" id="email" name="email" type="text" placeholder="Email" autocomplete="off">
                    <p class="error">{{ $errors->first('email') }}</p>
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" id="password" name="password" type="password" placeholder="Password">
                    <p class="error">{{ $errors->first('password') }}</p>
                </div>
                <div class="form-group">
                    <input class="form-control form-control-lg" type="password" name="conf_pass" placeholder="Confirm">
                    <p class="error">{{ $errors->first('conf_pass') }}</p>
                </div>
                <div class="form-group pt-2">
                    <button class="btn btn-block btn-primary" type="submit">Register My Account</button>
                </div>
                <div class="form-group">
                    <label class="custom-control custom-checkbox">
                        <input class="custom-control-input" name="check" type="checkbox" checked><span class="custom-control-label">By creating an account, you agree the <a href="#">terms and conditions</a></span>
                    </label>
                </div>
            </div>
            <div class="card-footer bg-white">
                <p>Already member? <a href="/pages_login" class="text-secondary">Login Here.</a></p>
            </div>
        </div>
    </form>
</body>

 
</html>