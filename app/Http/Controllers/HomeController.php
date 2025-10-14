<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the home page
     */
    public function index()
    {
        $settings = Setting::allSettings();
        return view('home', compact('settings'));
    }

    /**
     * Show the maintenance page
     */
    public function maintenance()
    {
        $settings = Setting::allSettings();
        return view('maintenance', compact('settings'));
    }
}
