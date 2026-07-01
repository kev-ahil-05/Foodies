<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('contact');
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
        // 1. I-validate ang data mula sa form
        $validatedData = $request->validate([
            'name'    => 'required|string|max:50',
            'email'   => 'required|email|max:100',
            'message' => 'required|string|max:1000',
        ]);

        // 2. I-save sa 'contacts' table
        Contact::create($validatedData);

        // 3. Mag-redirect pabalik na may kasamang tagumpay na mensahe
        return redirect()->back()->with('success', 'Salamat! Ang iyong mensahe ay matagumpay na naipadala.');
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
