<?php

namespace App\Http\Controllers\Admin;

use App\Models\Menu;
use App\Models\Order;
use App\Models\Category;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    public function index()
    {
        $menus = Menu::with('category')->get();
        // $users = DB::table('users')->get();
        // $orders = Order::with(['user', 'menu'])->orderBy('created_at', 'desc')->get();
        
//        dd($menus);
        return view('admin.index', compact('menus'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required',
            'price' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg,gif,svg',
            'description' => 'required',
            'category_id' => 'required',
        ]);
    
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('storage/images/'), $filename);

            $menu = Menu::create([
                'name' => $request->name,
                'price' => $request->price,
                'image' => '/storage/images/' . $filename,
                'description' => $request->description,
                'category_id' => $request->category_id,
            ]);
    
            if ($menu) {
                return redirect()->route('admin.index')->with(['success' => 'Data Berhasil Disimpan!']);
            }
        }
    }

            // if ($request->hasFile('image')) {
            //     $file = $request->file('image');
            //     $filename = time() . '.' . $file->getClientOriginalExtension();
            //     $file->move(public_path('storage/images/'), $filename);


            //     $menu = Menu::create([
            //         'name' => $request->name,
            //         'price' => $request->price,
            //         'image' => 'images/' . $filename, // Store the image path, not $request->image
            //         'description' => $request->description,
            //         'category_id' => $request->category_id,
            //     ]);

                // $menu = new Request([
                //     'name' => 'Nasi Goreng',
                //     'price' => 15000,
                //     'image' => $request->file('image'),
                //     'description' => 'dilengkapi dengan telur mata sapi',
                //     'categories' => 2,
                // ]);
                
                // Menu::create($request);

    //             if ($menu) {
    //                 return redirect()->route('admin.index')->with(['success' => 'Data Berhasil Disimpan!']);
    //             }
    //         }
    // }

    public function edit($id)
    {
        $menu = Menu::findOrFail($id);
        $categories = Category::all();
        return view('admin.edit', compact('menu', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $menu = Menu::where('id', $id)->first();
//        $validator = $request->validate([
//            'name' => 'required',
//            'price' => 'required',
//            'image' => 'required|mimes:jpeg,png,jpg,gif,svg',
//            'description' => 'required',
//            'category_id' => 'required',
//        ]);

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('storage/images/'), $filename);
            $menu = Menu::where('id', $id)->update([
                'name' => $request->name,
                'price' => $request->price,
                'image' => 'images/' . $filename, // Store the image path, not $request->image
                'description' => $request->description,
                'category_id' => $request->category_id,
            ]);
            return redirect()->route('admin.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            $menu = Menu::where('id', $id)->update([
                'name' => $request->name,
                'price' => $request->price,
                'description' => $request->description,
                'category_id' => $request->category_id,
            ]);
            return redirect()->route('admin.index')->with(['success' => 'Data Berhasil Disimpan!']);

        }
    }

    public function destroy($id)
    {
        $menu = Menu::findOrFail($id);
        $menu->delete();
        return redirect()->route('admin.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
    
    public function viewAllMenus()
    {
        $menus = Menu::with('category')->get();
        return view('admin.viewAllMenus', compact('menus'));
    }
}