<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pos System</title>
    {!! Html::style('css/login.css') !!}
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    
        <section id="login-page">
            <div class="login-form login-r">
            <form method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
                @if ($errors->has('email'))
                    <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
            
            <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}" style="margin-top: 25px;">
                    <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <div class="col-md-8" style="text-align: right; margin-top: 15px;">
                        <a class="btn btn-link" href="{{ route('password.request') }}">
                            Forgot Your Password?
                        </a>
                    </div>
                </div>
                <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">SIGN IN</button>
              </form>
            </div>
        </section>
</body>
</html>


