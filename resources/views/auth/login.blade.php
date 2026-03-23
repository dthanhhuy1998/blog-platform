@extends('auth.layouts.master')

@section('content')
    <div class="login-box">
        <div class="login-logo">
            <a href="{{ route('login') }}"><b>TH</b>webshop.com</a>
        </div>
        <!-- /.login-logo -->
        <div class="login-box-body">
            <!-- <p class="login-box-msg">Đăng nhập để bắt đầu nhớ lần nhập đầu tiên</p> -->
            @if(session('success_msg'))
            <div class="callout callout-success">
                <p>{{ session('success_msg') }}</p>
            </div>
            @endif
            @if(session('error_msg'))
            <div class="callout callout-danger">
                <p>{{ session('error_msg') }}</p>
            </div>
            @endif
            <form action="{{ route('login') }}" method="post">
                @csrf
                <div class="form-group has-feedback @error('username') has-error @enderror">
                    <input type="text" class="form-control" placeholder="{{__('Username')}}" value="{{ old('username') }}" name="username">
                    @error('username')
                    <span class="help-block">{{ $message }}</span>
                    @enderror
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback @error('user_password') has-error @enderror">
                    <input type="password" class="form-control" placeholder="{{__('Password')}}" value="{{ old('user_password') }}" name="user_password">
                    @error('user_password')
                    <span class="help-block">{{ $message }}</span>
                    @enderror
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-8">
                        <div class="checkbox icheck">
                            <label>
                                <input type="checkbox"> &nbsp; {{__('Remember me')}}
                            </label>
                        </div>
                    </div>
                    <!-- /.col -->
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">{{__('Login')}}</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>

            <!-- <div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
        Facebook</a>
        <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
        Google+</a>
    </div> -->
            <!-- /.social-auth-links -->

            <!-- <a href="#">Tôi quên mật khẩu</a><br>
    <a href="register.html" class="text-center">Đăng ký tài khoản mới</a> -->

        </div>
        <!-- /.login-box-body -->
    </div>
    <!-- /.login-box -->
@endsection