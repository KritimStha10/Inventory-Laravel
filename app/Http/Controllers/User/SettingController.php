<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = User::orderBy('created_at','desc')->get();
        return view('frontend.setting.index', compact('settings'));
    }
}
