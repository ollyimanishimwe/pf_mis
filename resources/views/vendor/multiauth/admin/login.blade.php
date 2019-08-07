@extends('multiauth::layouts.loginapp')
@section('content')
<div class="sufee-login d-flex align-content-center flex-wrap" style="">
    <div class="container">
        <div class="login-content">

            <div class="login-form">
                <form method="POST" action="{{ route('admin.login') }}">
                    @csrf

                    <div class="card">
                        <div class="card-header">
                            <strong>Login/</strong> <small>Enter into the Account</small>
                        </div>
                        <div class="card-body card-block">


                            <div class="form-group">
                                <label class=" form-control-label">Email</label>
                                <div class="input-group">
                                    <div class="input-group-addon" style="color: red"><i class="fa fa-envelope"></i></div>
                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                </div>

                                @if ($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif

                            </div>


                            <div class="form-group">
                                <label class=" form-control-label">Password</label>
                                <div class="input-group">
                                    <div class="input-group-addon" style="color: red">
                                        <i class="fa fa-lock"></i>

                                    </div>
                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>

                            </div>
                            <button type="submit" class="btn btn-outline-success"><b>Submit</b></button>

                            {{-- @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                <button type="submit" class="btn btn-outline-danger"><b>Forgot Password</b></button>
                                </a>
                            @endif --}}


                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>
@endsection
