@extends('layouts.login')

@section('content')

    <div class="login-box">
        <div class="login-logo">
            <a href="{{ route('login') }}"><b>Admin</b>PANEL</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <p class="login-box-msg">Sign in to start your session</p>

            <form action="{{ route('login') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group has-feedback">
                    <input type="email" name="email" class="form-control" placeholder="Email">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    @if ($errors->has('email'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="form-group has-feedback">
                    <input type="password" name="password" class="form-control" placeholder="Password">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    @if ($errors->has('password'))
                        <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                    @endif
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">

                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-danger btn-block btn-flat">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>


        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->


@endsection
