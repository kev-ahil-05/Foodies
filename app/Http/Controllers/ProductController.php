<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Exception;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Kukuha ng pinakabagong 20 na orders
        $products = Product::with('user')->latest()->take(20)->get();
           
        // Gagamitin ang 'Total_Amount' base sa iyong live database structure sa image_91f0fc.jpg
        $totalSales = Product::sum('Total') ?? 0; 
        
        // Bilang ng lahat ng orders
        $totalOrders = Product::count();

        // Siguraduhing kasama sa compact() lahat ng variables na tinatawag sa blade
        return view('dashboard', compact('products', 'totalSales', 'totalOrders'));
    }

    /**
     * Store a newly created resource in storage.
     */
     public function store(Request $request)
{
    // Inayos ang validation rules para tanggapin ang decimal prices at mahahabang pangalan ng produkto
    $validatedData = $request->validate([
        'Product_name' => 'required|string|max:255', // Tinaasan natin mula 25 para sa mga mahahabang pangalan
        'Quantity'     => 'required|integer|min:1',
        'Price'        => 'required|numeric|min:0',  // Pinalitan ng numeric mula integer para tanggapin ang may .00
    ]);
    

    $validatedData['user_id'] = auth()->id();
    // Eksaktong kalkulasyon ng Total Amount (Decimal-safe)
    $validatedData['Total'] = $validatedData['Price'] * $validatedData['Quantity'];
    
    // Siguraduhing ang mga fields na ito ay nasa $fillable ng Product model mo
    Product::create($validatedData);
    
    return redirect('dashboard')->with('success', 'Order Placed Successfully!');
}

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        $validatedData = $request->validate([
            'Product_name' => 'required|string|max:25',
            'Quantity'     => 'required|integer|min:1',
            'Price'        => 'required|numeric|min:0',
        ]);

        $validatedData['Total'] = $validatedData['Price'] * $validatedData['Quantity'];

        $product->update($validatedData);
        
        return redirect('dashboard')->with('success', 'Order Updated Successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {  
        try {
            $product->delete();
            return redirect('dashboard')->with('success', 'Order Deleted Successfully!');
        } catch (Exception $e) {
            return redirect('dashboard')->with('error', 'Something went wrong!');
        }
    }
}