<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Mail\ContactForm;
use Illuminate\Support\Facades\Mail;

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
    public function getContact(Request $request) {
        return view('pages/contact');
    }
    public function getLogin() {
        return view('pages/auth/login');
    }
    public function getSignup() {
        return view('pages/auth/signup');
    }
    public function getResetPassword() {
        return view('pages/auth/resetpassword');
    }
    public function getResetPasswordForm(Request $request) {
        return view('pages/auth/resetpasswordform', ['token' => $request->token, 'email' => $request->email]);
    }
    public function postContact(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'min:2', 'max:50', 'string'],
            'email' => ['required', 'email'],
            'contact_message' => ['required', 'min:5', 'max:500', 'string']
        ]);

        Mail::to(env('SITE_ADMIN_EMAIL', 'contact@pepijncolenbrander.com'))->send(new ContactForm($request->name, $request->email, $request->contact_message));

        return redirect('/contact')->with('sent', 'success');
    }
}
