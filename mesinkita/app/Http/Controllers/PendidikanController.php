<?php

namespace App\Http\Controllers;

use App\Models\Pendidikan;
use Illuminate\Http\Request;

class PendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pendidikans = Pendidikan::all();
        return view('pian-app.tablePendidikan', compact('pendidikans'));
    }

    /**
     * Show the formPendidikan for creating a new resource.
     */
    public function create()
    {
        return view('pian-app.formPendidikan');
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
        $pendidikan = new Pendidikan();
        $pendidikan->nama = $request->nama;
        $pendidikan->save();
        return redirect('/tablePendidikan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the formPendidikan for editing the specified resource.
     */
    public function edit($id)
    {
        $pendidikan = Pendidikan::findOrFail($id);
        return view('pian-app.editPendidikan', compact('pendidikan'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required',
        ]);
        $pendidikan = Pendidikan::findOrFail($id);
        $pendidikan->nama = $request->nama;
        $pendidikan->save();
        return redirect('/tablePendidikan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pendidikan = Pendidikan::findOrFail($id);
        $pendidikan->delete();
        return redirect('/tablePendidikan');

    }
}
