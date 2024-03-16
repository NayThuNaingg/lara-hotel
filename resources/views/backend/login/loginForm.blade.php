<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lara Hotel :: Admin Login</title>
    
    <link rel="shortcut icon" href="{{ URL::asset('assets/backend/compiled/svg/favicon.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ URL::asset('assets/backend/compiled/css/app.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/backend/compiled/css/auth.css') }}">
</head>

<body>
    <!-- <script src="{{ URL::asset('assets/backend/static/js/initTheme.js') }}"></script> -->
    <div> 
        <div class="d-flex align-items-center justify-content-center">
            <div class="col-lg-5 col-12">
                <div id="auth-left" class="align-item-center justify-content-center">
                    <div class="auth-logo text-center">
                        <a href=""><img src="{{ URL::asset('assets/upload/logo/logo.png') }}" alt="Logo" style="width:200px; height:200px"></a>
                    </div>
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header text-center">
                                    <h4 class="card-title">{{ getSiteSetting() !== null ? getSiteSetting()->name : '' }}</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form action="{{route('postLogin')}}" method="POST" class="form needs-validation" novalidate />
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-12 col-12">
                                                    <div class="form-group mandatory">
                                                        <label for="login" class="form-label">Username or Email</label>
                                                        <input type="text" id="login" class="form-control" placeholder="Username or Email" name="login" value="{{ old('login') }}" data-parsley-required="true" required />
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        Please fill Username or Email
                                                    </div>
                                                    @error('login')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>

                                                <div class="col-md-12 col-12">
                                                    <div class="form-group mandatory">
                                                        <label for="password" class="form-label">Password</label>
                                                        <input type="password" id="password" class="form-control" name="password" placeholder="Enter Password" data-parsley-required="true" required/>
                                                    </div>
                                                    <div class="invalid-feedback">
                                                        Please fill Password
                                                    </div>
                                                    @error('password')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="form-check mandatory">
                                                            <input type="checkbox" id="checkbox5" class="form-check-input" checked data-parsley-required="true" data-parsley-errors-container="#checkbox-errors" required/>
                                                            <label for="checkbox5" class="form-check-label form-label">I accept these terms and conditions.</label>
                                                        </div>
                                                        <div id="checkbox-errors"></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 d-flex justify-content-end">
                                                    <input type="submit" class="btn btn-primary btn-block shadow-md">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ URL::asset('assets/backend/compiled/js/app.js') }}"></script>
    <script src="{{ URL::asset('assets/backend/extensions/jquery/jquery.min.js') }}"></script>
    <script>
        (function () {
        'use strict'

        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
            .forEach(function (form) {
            form.addEventListener('submit', function (event) {
                if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
                }

                form.classList.add('was-validated')
            }, false)
            })
        })()
    </script>
</body>
</html>