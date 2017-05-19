@extends('layouts.adapp')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md form_padding_login">
            <div class="panel-wrap">
                <div class="panel-heading">
                    <h1 class="text-center">ADMIN</h1>
                    <p class="text-center">Wellcome to Vacation World
                    <br>
                    Please login your account!
                    </p>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ route('admin.login.submit') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            

                            <div class="col-md">
                                <input id="email" type="email" class="form-control " name="email" placeholder="E-mail" value="{{ old('email') }}" required autofocus>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                           

                            <div class="col-md">
                                <input id="password" type="password" class="form-control " placeholder="Password" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md">
                                <button type="submit" class="btn btn-success btn-block">
                                    Login
                                </button>

                                <a class="btn btn-link btn-block" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                                <div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
