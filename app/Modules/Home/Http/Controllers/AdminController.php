<?php

namespace App\Modules\Home\Http\Controllers;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function admin()
    {
        return view('home::admin_home');
    }


}
