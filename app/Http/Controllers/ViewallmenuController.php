<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class ViewallmenuController extends Controller
{
    public function viewAllMenus()
    {
        $menus = Menu::paginate(10);
        return view('admin.viewAllMenus', [
            "menus" => $menus,
        ]);
    }
}
