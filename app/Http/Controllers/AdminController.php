<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         // Kukuha ng lahat ng orders kasama ang detalye ng nag-order (User info)
        $products = Product::with('user')->latest()->get();

        // I-pass natin ang $orders variable sa adminpage view
        return view('adminpage', compact('products'));

        return view('adminpage')->with('success','Welcome to Admin page');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
