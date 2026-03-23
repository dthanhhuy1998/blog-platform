<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AuthController extends Controller
{
    public function __construct()
    {

    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username'          => 'required|min:3|max:50',
            'user_password'     => 'required|min:6|max:50',
        ],[
            'username.required'         => 'Vui lòng nhập tên tài khoản!',
            'username.min'              => 'Tên tài khoản phải từ 3 ký tự!',
            'username.max'              => 'Tên tài khoản tối đa 50 ký tự!',
            'user_password.required'    => 'Vui lòng nhập mật khẩu!',
            'user_password.min'         => 'Mật khẩu phải từ 6 ký tự!',
            'user_password.max'         => 'Mật khẩu tối đa 50 ký tự!',
        ]);

        if(Auth::attempt(['username' => $request->username, 'password' => $request->user_password, 'status' => 1])) {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->back()->with('error_msg', 'Tên tài khoản hoặc mật khẩu không đúng!');
        }
    } 
}
