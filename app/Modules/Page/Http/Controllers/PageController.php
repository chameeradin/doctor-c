<?php

namespace App\Modules\Page\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function __construct()
    {

    }

    public function aboutUs()
    {
        $data = [
            'metaTitle'    => 'About us',
        ];

        return view('page::about', $data);
    }

    public function contactUs()
    {
        $data = [
            'metaTitle'    => 'Contact us',
        ];

        return view('page::contact', $data);
    }

    public function doctors()
    {
        $data = [
            'metaTitle'    => 'Doctor',
        ];

        return view('page::doctor', $data);
    }

    public function departments()
    {
        $data = [
            'metaTitle'    => 'Department',
        ];

        return view('page::department', $data);
    }

    public function appointment()
    {
        $data = [
            'metaTitle'    => 'Appointment',
        ];

        return view('page::appointment', $data);
    }



}
