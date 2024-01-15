<?php

namespace App\Http\Controllers;

use App\Models\KI;
use App\Models\User;
use Illuminate\Http\Request;

class KewajibanInvestasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pemegangsahams = User::where('role', 'pemegang_saham')->get();
        return view('ki.create', compact('pemegangsahams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pemegangsahams = User::where('role', 'pemegang_saham')->get();
        return view('ki.create', compact('pemegangsahams'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'nominal' => 'required',
        ]);

        $input = $request->all();
    
        KI::create($input);
    
        return redirect()->route('dashboard')
                        ->with('success','Investasi Saham created successfully.');
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
