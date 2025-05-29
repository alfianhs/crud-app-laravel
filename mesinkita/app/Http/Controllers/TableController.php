<?php

namespace App\Http\Controllers;

use App\Models\Agama;
use Illuminate\Http\Request;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $agamas = Agama::all();
        return view('pian-app.table', compact('agamas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pian-app.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
        ]);
        // dd ($request);
        $agama = new Agama();
        $agama->nama = $request->nama;
        $agama->save();
        return redirect('/table');
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
    public function edit($id)
    {
        $agama = Agama::findOrFail($id);
        return view('pian-app.edit', compact('agama'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required',
        ]);
        $agama = Agama::findOrFail($id);
        $agama->nama = $request->nama;
        $agama->save();
        return redirect('/table');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $agama = Agama::findOrFail($id);
        $agama->delete();
        return redirect('/table');

    }
}
