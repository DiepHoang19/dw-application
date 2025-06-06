<?php

namespace App\Http\Controllers;

use App\Models\Furniture;
use Illuminate\Http\Request;

class FurnitureController extends Controller
{
    public function index(Request $request)
    {
        $query = Furniture::query();

        if ($request->has('search')) {
            $query->where('name', 'like', '%' . $request->search . '%');
        }

        $furniture = $query->latest()->get();

        return view('admin.product.index', compact('furniture'));
    }

    
    public function create()
    {
        return view('admin.product.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_code' => 'required|unique:furniture',
            'name' => 'required',
            'price' => 'required|numeric',
            'avatar' => 'nullable|image|max:2048',
        ]);

        $avatarPath = null;
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
        }

        Furniture::create([
            'product_code' => $request->product_code,
            'name' => $request->name,
            'price' => $request->price,
            'avatar' => $avatarPath,
        ]);

     


        return redirect()->route('furniture.index')->with('success', 'Furniture added!');
    }


    public function edit($id)
    {
        $furniture = Furniture::findOrFail($id);
        return view('admin.product.edit', compact('furniture'));
    }


    // Xử lý cập nhật dữ liệu
    public function update(Request $request, $id)
    {
        $request->validate([
            'product_code' => 'required|unique:furniture,product_code,' . $id,
            'name' => 'required|string|max:255',
            'price' => 'required|numeric',
            'avatar' => 'nullable|string|max:255',
        ]);

        $furniture = Furniture::findOrFail($id);

        $furniture->product_code = $request->product_code;
        $furniture->name = $request->name;
        $furniture->price = $request->price;
        $furniture->avatar = $request->avatar;
        $furniture->save();

        return redirect()->route('admin.product.index')->with('success', 'Cập nhật sản phẩm thành công!');
    }



     // Xóa mềm sản phẩm
     public function destroy($id)
     {
         $furniture = Furniture::findOrFail($id);
         $furniture->delete();
 
         return redirect()->route('furniture.index')->with('success', 'Sản phẩm đã được chuyển vào thùng rác.');
     }
 
     // Hiển thị danh sách sản phẩm đã xóa (trash)
     public function trash()
     {
         $furnitures = Furniture::onlyTrashed()->get();
         return view('admin.product.trash', compact('furnitures'));
     }
 
     // Khôi phục sản phẩm đã xóa
     public function restore($id)
     {
         $furniture = Furniture::onlyTrashed()->findOrFail($id);
         $furniture->restore();
 
         return redirect()->route('furniture.trash')->with('success', 'Đã khôi phục sản phẩm.');
     }
 
     // Xóa vĩnh viễn
     public function forceDelete($id)
     {
         $furniture = Furniture::onlyTrashed()->findOrFail($id);
         $furniture->forceDelete();
 
         return redirect()->route('furniture.trash')->with('success', 'Đã xóa vĩnh viễn sản phẩm.');
     }
}