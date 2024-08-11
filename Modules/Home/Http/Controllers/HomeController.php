<?php

namespace Modules\Home\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Admin\Entities\Setting\Setting;

class HomeController extends Controller
{

    public function index()
    {
        $setting = Setting::query()->first();
        return view('home::index' , compact('setting'));
    }

}
