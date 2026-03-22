@extends('catalog.common.layout')

@section('title')
    {!! $headingTitle !!}
@endsection

@section('content')
   <!-- Banner Title -->
   <div class="banner" style="background-image: url('{{ asset('public/catalog/assets//img/bg1.jpg') }}')">
        <h1 class="banner-title">{{ $pageTitle }}</h1>
    </div>
    <!-- ./end Banner title -->
    <nav class="breadcrumb__wrap">
        <div class="container">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $pageTitle }}</li>
            </ol>
        </div>
    </nav>
    <div class="article-wrap">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="card card-payment info">
                        <h2 class="card-head" style="background-color: #2980B9; color: #fff;"><i class="fa fa-lock"></i> ĐĂNG NHẬP TÀI KHOẢN</h2>
                        <div class="card-body">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" name="lastName" class="form-control" placeholder="Nhập email đã đăng ký">
                                </div>
                                <div class="form-group">
                                    <label>Mật khẩu</label>
                                    <input type="password" name="lastName" class="form-control" placeholder="Nhập mật khẩu">
                                </div>
                                <button type="submit" class="btn btn-primary btn-xs mt-3" style="background-color: #2980B9;"><i class="fa fa-check-circle"></i> Đăng nhập tài khoản</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="card card-payment info">
                        <h2 class="card-head" style="background-color: #2980B9; color: #fff;"><i class="fa fa-edit"></i> ĐĂNG KÝ TÀI KHOẢN</h2>
                        <div class="card-body">
                            <form action="{{ route('catalog.postClientRegister') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label><strong style="color: red;">*</strong> Họ</label>
                                    <input type="text" name="lastName" class="form-control @error('lastName') is-invalid @enderror" placeholder="Nhập họ của bạn" value="{{ old('lastName') }}">
                                    @error('lastName')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label><strong style="color: red;">*</strong> Tên</label>
                                    <input type="text" name="firstName" class="form-control @error('firstName') is-invalid @enderror" placeholder="Nhập tên của bạn" value="{{ old('firstName') }}">
                                    @error('firstName')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label><strong style="color: red;">*</strong> Email</label>
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Nhập email của bạn" value="{{ old('email') }}">
                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Số điện thoại</label>
                                    <input type="number" name="phoneNumber" class="form-control @error('phoneNumber') is-invalid @enderror" placeholder="Nhập số điện thoại của bạn" value="{{ old('phoneNumber') }}">
                                    @error('phoneNumber')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label><strong style="color: red;">*</strong> Mật khẩu</label>
                                    <input type="password" name="userPassword" class="form-control @error('userPassword') is-invalid @enderror" placeholder="Nhập mật khẩu" value="{{ old('userPassword') }}">
                                    @error('userPassword')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label><strong style="color: red;">*</strong> Xác nhận mật khẩu</label>
                                    <input type="password" name="confirmPassword" class="form-control @error('confirmPassword') is-invalid @enderror" placeholder="Nhập mật khẩu" value="{{ old('confirmPassword') }}">
                                    @error('confirmPassword')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Đăng ký nhận tin</label>
                                    <select name="newsletter" class="form-control">
                                        <option value="0">Không</option>
                                        <option value="1">Đăng ký</option>
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary btn-xs mt-3" style="background-color: #2980B9;"><i class="fa fa-edit"></i> Đăng ký tài khoản</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection