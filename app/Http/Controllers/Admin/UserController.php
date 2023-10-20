<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function users(){
        $users = DB::table('users')->get();
        return view('admin.users', compact('users'));
    }
}
