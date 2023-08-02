<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth::guard('admin')->check()){
            return redirect()->route('dashboard.index');
        }
        return view('login.login', [
            'title' => 'Đăng nhập'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LoginRequest $request)
    {
        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], true)) {
            return redirect()->route('dashboard.index');
        }
        return back();
    }
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route('login.index');
    }
}
