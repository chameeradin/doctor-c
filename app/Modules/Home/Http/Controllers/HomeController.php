<?php

namespace App\Modules\Home\Http\Controllers;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{

    protected $categoryRepo;
    public function __construct()
    {
        parent::__construct();
    }
    public function index()
    {
        return view('home::home');
    }
}
