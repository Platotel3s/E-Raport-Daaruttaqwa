<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Login user page</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('login') }}" method="POST">
                            
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="form-group ">
                                <label for="password">Password</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="password">
                                    
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                            </div>
                            <div class="form-group d-flex flex-row justify-content-around">
                                <div class="form-check">
                                    <input type="checkbox" onclick="tampilPassword()" class="form-check-input" name="toggle" id="toggle">
                                    <label for="toggle">Tampil password</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                    <label class="form-check-label" for="remember">Remember me</label>
                                </div>
                            </div>
                            <div class="form-group d-flex flex-row justify-content-around">
                                <p>
                                    Click here for <a href="{{ route('register') }}" class="text-decoration-none text-primary">Register</a>
                                </p>
                                <p>
                                    Click here for <a href="#" class="text-decoration-none text-danger">Forget password</a>
                                </p>
                            </div>
                            <div class="form-group d-flex flex-row justify-content-around">
                                <button type="submit" class="btn btn-primary">Login</button>
                                <button type="reset" class="btn btn-warning">Cancle</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('js/login.js') }}"></script>
</body>
</html>