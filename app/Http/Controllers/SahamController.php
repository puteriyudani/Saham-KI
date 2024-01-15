<?php

namespace App\Http\Controllers;

use App\Models\Saham;
use App\Models\User;
use Illuminate\Http\Request;

class SahamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sahams = Saham::paginate(10);
        return view('saham.index', compact('sahams'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pemegangsahams = User::where('role', 'pemegang_saham')->get();
        return view('saham.create', compact('pemegangsahams'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nominal' => 'required',
            'tanggal' => 'required',
            'nama' => 'required',
            'keterangan' => 'required',
        ]);

        $input = $request->all();
    
        Saham::create($input);
    
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
    public function edit(Saham $saham)
    {
        $pemegangsahams = User::where('role', 'pemegang_saham')->get();
        return view('saham.edit', compact('saham', 'pemegangsahams'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Saham $saham)
    {
        $request->validate([
            'nominal' => 'required',
            'tanggal' => 'required',
            'nama' => 'required',
            'keterangan' => 'required',
        ]);
    
        $saham->update($request->all());
    
        return redirect()->route('dashboard')
                        ->with('success','Investasi Saham updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Saham $saham)
    {
        $saham->delete();
    
        return back()->with('success','Investasi Saham deleted successfully');
    }
}
