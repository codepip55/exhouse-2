<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController
{
    public function getHome() {
        return view('pages/home');
    }
    public function getHuizen() {
        return view('pages/huizen');
    }
    public function getOverOns() {
        return view('pages/overons');
    }
    public function getContact() {
        return view('pages/contact');
    }
    public function getLogin() {
        return view('pages/login');
    }
    public function getSignup() {
        return view('pages/signup');
    }
    public function getResetPassword() {
        return view('pages/resetpassword');
    }
    public function getResetPasswordForm(Request $request) {
        return view('pages/resetpasswordform', ['token' => $request->token, 'email' => $request->email]);
    }
}
