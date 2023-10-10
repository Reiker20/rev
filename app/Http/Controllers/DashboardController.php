<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $menus = Menu::with('category')->get();
        $users = DB::table('users')->get();
        //        dd($menus);
        return view('dashboard', compact('menus', 'users'));
    }
}