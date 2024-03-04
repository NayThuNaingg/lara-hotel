<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lara Hotel</title>
    
    <link rel="shortcut icon" href="{{ URL::asset('assets/backend/compiled/svg/favicon.svg') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ URL::asset('assets/backend/compiled/css/app.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/backend/compiled/css/app-dark.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/backend/compiled/css/auth.css') }}">
</head>

<body>
    <script src="{{ URL::asset('assets/backend/static/js/initTheme.js') }}"></script>
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
                                    <h4 class="card-title">Login</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form" data-parsley-validate data-parsley-trigger="input" />
                                            <div class="row">
                                                <div class="col-md-12 col-12">
                                                    <div class="form-group mandatory">
                                                        <label for="first-name-column" class="form-label">Name</label>
                                                        <input type="text" id="first-name-column" class="form-control" placeholder="First Name" name="fname-column" data-parsley-required="true" />
                                                    </div>
                                                </div>
        
                                                <div class="col-md-12 col-12">
                                                    <div class="form-group mandatory">
                                                        <label for="email-id-column" class="form-label">Email</label>
                                                        <input type="email" id="email-id-column" class="form-control" name="email-id-column" placeholder="Email" data-parsley-required="true" />
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <div class="form-check mandatory">
                                                            <input type="checkbox" id="checkbox5" class="form-check-input" checked data-parsley-required="true" data-parsley-errors-container="#checkbox-errors" />
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
    <script src="{{ URL::asset('assets/backend/static/js/components/dark.js') }}"></script>
    <script src="{{ URL::asset('assets/backend/extensions/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ URL::asset('assets/backend/compiled/js/app.js') }}"></script>
    <script src="{{ URL::asset('assets/backend/extensions/jquery/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('assets/backend/extensions/parsleyjs/parsley.min.js') }}"></script>
    <script src="{{ URL::asset('assets/backend/static/js/pages/parsley.js') }}"></script>
    <script>
</script>
</body>

</html>