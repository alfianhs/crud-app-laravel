<?php

namespace App\Http\Controllers;

use App\Models\JenisKelamin;
use Illuminate\Http\Request;

class JenisKelaminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jnsKelamins = JenisKelamin::all();
        return view('pian-app.tableJenisKelamin', compact('jnsKelamins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pian-app.formJenisKelamin');
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
        $jnsKelamin = new JenisKelamin();
        $jnsKelamin->nama = $request->nama;
        $jnsKelamin->save();
        return redirect('/tableJenisKelamin');
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
        $jnsKelamin = JenisKelamin::findOrFail($id);
        return view('pian-app.editJenisKelamin', compact('jnsKelamin'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama' => 'required',
        ]);
        $jnsKelamin = JenisKelamin::findOrFail($id);
        $jnsKelamin->nama = $request->nama;
        $jnsKelamin->save();
        return redirect('/tableJenisKelamin');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $jnsKelamin = JenisKelamin::findOrFail($id);
        $jnsKelamin->delete();
        return redirect('/tableJenisKelamin');

    }
}

?>