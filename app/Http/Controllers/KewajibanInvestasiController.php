<?php

namespace App\Http\Controllers;

use App\Models\KI;
use App\Models\ModalDasar;
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
        $kewajibaninvestasis = KI::paginate(10);
        $modaldasar = ModalDasar::get();
        return view('ki.index', compact('pemegangsahams', 'kewajibaninvestasis', 'modaldasar'));
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
    
        return redirect()->route('kewajibaninvestasi.index')
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
    public function edit(KI $kewajibaninvestasi)
    {
        $modaldasars = ModalDasar::get();
        $pemegangsahams = User::where('role', 'pemegang_saham')->get();
        return view('ki.edit', compact('pemegangsahams', 'kewajibaninvestasi', 'modaldasars'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KI $kewajibaninvestasi)
    {
        $request->validate([
            'nama' => 'required',
            'nominal' => 'required',
        ]);
    
        $kewajibaninvestasi->update($request->all());
    
        return redirect()->route('kewajibaninvestasi.index')
                        ->with('success','Kewajiban Investasi updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KI $kewajibaninvestasi)
    {
        $kewajibaninvestasi->delete();
    
        return back()->with('success','Kewajiban Investasi deleted successfully');
    }
}
