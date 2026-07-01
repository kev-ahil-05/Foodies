<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Facades\File; // Gagamitin para sa pagbura ng lumang file

class MenuController extends Controller
{
    public function index()
    {
        $Menus = Menu::all(); 
        return view('menu', compact('Menus')); 
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'product_name'  => 'required|string|max:255',
            'price'         => 'required|numeric|min:0',
            'product_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('product_image')) {
            $imageName = time() . '.' . $request->product_image->extension();
            $request->product_image->move(public_path('assets'), $imageName);
            $validated['product_image'] = $imageName;
        }

        Menu::create($validated);
        return redirect('/menu')->with('success', 'New menu item added successfully!');
    }

    /**
     * UPDATE FUNCTION PARA SA MENU ITEM
     */
    public function update(Request $request, Menu $menu)
    {
        // 1. I-validate ang mga fields ng Menu (HINDI ng Product/Order)
        $validatedData = $request->validate([
            'product_name'  => 'required|string|max:255',
            'price'         => 'required|numeric|min:0',
            'product_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // nullable para pwedeng hindi palitan ang image
        ]);

        // 2. Pag-handle kung may bagong larawang in-upload
        if ($request->hasFile('product_image')) {
            // Burahin ang lumang larawan sa assets folder para hindi mapuno ang server
            $oldImagePath = public_path('assets/' . $menu->product_image);
            if (File::exists($oldImagePath)) {
                File::delete($oldImagePath);
            }

            // I-save ang bagong larawan
            $imageName = time() . '.' . $request->product_image->extension();
            $request->product_image->move(public_path('assets'), $imageName);
            $validatedData['product_image'] = $imageName;
        }

        // 3. I-update ang Menu row
        $menu->update($validatedData);
        
        return redirect('/menu')->with('success', 'Menu Item Updated Successfully!');
    }

    /**
     * DESTROY FUNCTION PARA SA MENU ITEM
     */
    public function destroy(Menu $menu)
    {
        try {
            // Burahin ang larawan sa public/assets folder bago i-delete ang record
            $imagePath = public_path('assets/' . $menu->product_image);
            if (File::exists($imagePath)) {
                File::delete($imagePath);
            }

            $menu->delete();
            return redirect('/menu')->with('success', 'Menu Item Deleted Successfully!');
        } catch (\Exception $e) {
            return redirect('/menu')->with('error', 'Something went wrong!');
        }
    }
}