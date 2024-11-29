<?php

namespace App\Http\Controllers;

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
}
