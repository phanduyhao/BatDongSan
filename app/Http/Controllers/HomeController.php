<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Baidang;
use App\Models\Setting;
use App\Models\Loainhadat;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $listnhadats = Loainhadat::select('title', 'id', 'slug', 'icon')->get();
        $settings = Setting::pluck('value', 'key')->toArray();
        $baidangnews = Baidang::orderByDesc('id')->where('status','cosan')->where('adminduyet',1)->take(6)->get();
        $topUsers = User::withCount('baidangs')
        ->orderByDesc('baidangs_count')
        ->take(8)
        ->get();
        return view('home',compact('listnhadats','settings','baidangnews','topUsers'),[
            'title' => 'Trang chủ'
        ]);
    }
}
