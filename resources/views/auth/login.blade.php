<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link href="{{ asset('backend/css/bootstrap.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('backend/css/now-ui-dashboard.css?v=1.3.0') }}" rel="stylesheet" />
        <link href="{{ asset('backend/demo/demo.css') }}" rel="stylesheet" />
        <link rel="shortcut icon" href="{{ asset('frontend/images/Logo_main.png')  }}" type="image/x-icon">
        @stack('css')
    </head>
<body>
    <div class="container">
        <div class="row p-5">
            <div class="col-md-3"></div>
            <div class="col-xl-6 col-lg-12 col-md-10 d-flex no-block justify-content-center align-items-center">
                <div class="card">
                    <div class="card-header">
                        <div class="text-center">
                            <span class="mb-3"><img src="{{ asset('frontend/images/Logo_main.png')  }}" alt="logo" width="100px" class="mb-3 rounded-circle"/></span>
                            <h1 class="h3 text-gray-900 mb-4">SIGNIN</h1>
                        </div>
                      </div>
                      <div class="card-body mt-5">
                        <form  class="user" method="post" action="{{ route('login') }}" id="loginform">
                            @csrf
                            <div class="form-group">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter Email Address" autocomplete="email" autofocus>
                                @error('email')
                                    <p class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter Password" autocomplete="current-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <div class="custom-control custom-checkbox d-flex">
                                    <input type="checkbox" class="custom-control-input" id="customCheck" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="customCheck">Remember Me</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info btn-user btn-block mt-5">
                                LOGIN
                            </button>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="text-info" href="#" id="to-recover">Forgot Password?</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>