<?php

namespace App\Http\Controllers\Mobile;

use App\Http\Controllers\Controller;

class TestController extends Controller
{
    public function showProfile()
    {
        return view('mobile.mobile-profile');
    }

}
