<?php

namespace App\Http\Controllers;

use App\Models\ModalDasar;
use Illuminate\Http\Request;

class ModalDasarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function edit(ModalDasar $modaldasar)
    {
        return view('modal.edit', compact('modaldasar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ModalDasar $modaldasar)
    {
        $request->validate([
            'nominal' => 'required',
        ]);
    
        $modaldasar->update($request->all());
    
        return redirect('admin')->with('success','Modal Dasar updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
