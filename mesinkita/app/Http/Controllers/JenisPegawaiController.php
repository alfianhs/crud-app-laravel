<?php

namespace App\Http\Controllers;

use App\Models\JenisPegawai;
use Illuminate\Http\Request;

class JenisPegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jnsPegawais = JenisPegawai::all();
        return view('pian-app.tableJenisPegawai', compact('jnsPegawais'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pian-app.formJenisPegawai');
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
        $jnsPegawai = new JenisPegawai();
        $jnsPegawai->nama = $request->nama;
        $jnsPegawai->save();
        return redirect('/tableJenisPegawai');
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
        $jnsPegawai = JenisPegawai::findOrFail($id);
        return view('pian-app.editJenisPegawai', compact('jnsPegawai'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required',
        ]);
        $jnsPegawai = JenisPegawai::findOrFail($id);
        $jnsPegawai->nama = $request->nama;
        $jnsPegawai->save();
        return redirect('/tableJenisPegawai');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $jnsPegawai = JenisPegawai::findOrFail($id);
        $jnsPegawai->delete();
        return redirect('/tableJenisPegawai');

    }
}

?>