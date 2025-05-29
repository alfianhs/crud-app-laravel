<?php

namespace App\Http\Controllers;

use App\Models\StatusPegawai;
use Illuminate\Http\Request;

class StatusPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stsPegawais = StatusPegawai::all();
        return view('pian-app.tableStatusPegawai', compact('stsPegawais'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pian-app.formStatusPegawai');
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
        $stsPegawai = new StatusPegawai();
        $stsPegawai->nama = $request->nama;
        $stsPegawai->save();
        return redirect('/tableStatusPegawai');
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
        $stsPegawai = StatusPegawai::findOrFail($id);
        return view('pian-app.editStatusPegawai', compact('stsPegawai'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required',
        ]);
        $stsPegawai = StatusPegawai::findOrFail($id);
        $stsPegawai->nama = $request->nama;
        $stsPegawai->save();
        return redirect('/tableStatusPegawai');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $stsPegawai = StatusPegawai::findOrFail($id);
        $stsPegawai->delete();
        return redirect('/tableStatusPegawai');

    }
}

?>