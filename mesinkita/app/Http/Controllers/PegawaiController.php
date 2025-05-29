<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Agama;
use App\Models\Pegawai;
use App\Models\JenisPegawai;
use App\Models\StatusPegawai;
use App\Models\Pendidikan;
use App\Models\JenisKelamin;
use Illuminate\Support\Facades\Storage;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pegawais = DB::table('pegawai')
             ->join('agama', 'pegawai.agama_id', '=', 'agama.id')
             ->join('jenis_pegawai', 'pegawai.jenisPegawai_id', '=', 'jenis_pegawai.id')
             ->join('status_pegawai', 'pegawai.statusPegawai_id', '=', 'status_pegawai.id')
             ->join('pendidikan', 'pegawai.pendidikan_id', '=', 'pendidikan.id')
             ->join('jenis_kelamin', 'pegawai.jnsKel_id', '=', 'jenis_kelamin.id')
             ->select('pegawai.*', 'agama.nama as nama_agama', 'jenis_pegawai.nama as nama_jenisPegawai', 'status_pegawai.nama as nama_statusPegawai', 'pendidikan.nama as nama_pendidikan', 'jenis_kelamin.nama as nama_jnsKel')
             ->get();
        return view('pian-app.table2', compact('pegawais'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $agamas = Agama::all();
        $jnsPegawais = JenisPegawai::all();
        $stsPegawais = StatusPegawai::all();
        $pendidikans = Pendidikan::all();
        $jnsKelamins = JenisKelamin::all();
        return view('pian-app.form2', compact('agamas', 'jnsPegawais', 'stsPegawais', 'pendidikans', 'jnsKelamins'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'nik'=> 'required',
            'jenisPegawai_id'=> 'required',
            'statusPegawai_id'=> 'required',
            'unit'=> 'required',
            'sub_unit'=> 'required',
            'pendidikan_id'=> 'required',
            'tgl_lahir'=> 'required',
            'tmpt_lahir'=> 'required',
            'jnsKel_id'=> 'required',
            'agama_id'=> 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif'
        ]);

        $image = $request->file('gambar');
        $nama_file = time() . '.' . $image->getClientOriginalExtension();
        $image->move('images/', $nama_file);
        
        $pegawai = new Pegawai();
        $pegawai->nama = $request->nama;
        $pegawai->nik = $request->nik;
        $pegawai->jenisPegawai_id = $request->jenisPegawai_id;
        $pegawai->statusPegawai_id = $request->statusPegawai_id;
        $pegawai->unit = $request->unit;
        $pegawai->sub_unit = $request->sub_unit;
        $pegawai->pendidikan_id = $request->pendidikan_id;
        $pegawai->tgl_lahir = $request->tgl_lahir;
        $pegawai->tmpt_lahir = $request->tmpt_lahir;
        $pegawai->jnsKel_id = $request->jnsKel_id;
        $pegawai->agama_id = $request->agama_id;
        $pegawai->gambar = $nama_file;
        $pegawai->save();
        return redirect('/tablePegawai');
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
        $pegawais = DB::table('pegawai')
             ->join('agama', 'pegawai.agama_id', '=', 'agama.id')
             ->join('jenis_pegawai', 'pegawai.jenisPegawai_id', '=', 'jenis_pegawai.id')
             ->join('status_pegawai', 'pegawai.statusPegawai_id', '=', 'status_pegawai.id')
             ->join('pendidikan', 'pegawai.pendidikan_id', '=', 'pendidikan.id')
             ->join('jenis_kelamin', 'pegawai.jnsKel_id', '=', 'jenis_kelamin.id')
             ->select('pegawai.*', 'agama.nama as nama_agama', 'jenis_pegawai.nama as nama_jenisPegawai', 'status_pegawai.nama as nama_statusPegawai', 'pendidikan.nama as nama_pendidikan', 'jenis_kelamin.nama as nama_jnsKel')
             ->where('pegawai.id', $id)
             ->first();
        $agamas = Agama::all();
        $jnsPegawais = JenisPegawai::all();
        $stsPegawais = StatusPegawai::all();
        $pendidikans = Pendidikan::all();
        $jnsKelamins = JenisKelamin::all();
        return view('pian-app.editpegawai', compact('pegawais','agamas', 'jnsPegawais', 'stsPegawais', 'pendidikans', 'jnsKelamins'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'nama' => 'required',
            'nik'=> 'required',
            'jenisPegawai_id'=> 'required',
            'statusPegawai_id'=> 'required',
            'unit'=> 'required',
            'sub_unit'=> 'required',
            'pendidikan_id'=> 'required',
            'tgl_lahir'=> 'required',
            'tmpt_lahir'=> 'required',
            'jnsKel_id'=> 'required',
            'agama_id'=> 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif'
        ]);
        
        $pegawai = Pegawai::findOrFail($id);

        $pegawai->nama = $request->nama;
        $pegawai->nik = $request->nik;
        $pegawai->jenisPegawai_id = $request->jenisPegawai_id;
        $pegawai->statusPegawai_id = $request->statusPegawai_id;
        $pegawai->unit = $request->unit;
        $pegawai->sub_unit = $request->sub_unit;
        $pegawai->pendidikan_id = $request->pendidikan_id;
        $pegawai->tgl_lahir = $request->tgl_lahir;
        $pegawai->tmpt_lahir = $request->tmpt_lahir;
        $pegawai->jnsKel_id = $request->jnsKel_id;
        $pegawai->agama_id = $request->agama_id;
        if ($request->hasFile('gambar')) {
            if ($pegawai->gambar) {
                if(file_exists('images/' . $pegawai->gambar)){
                    unlink('images/' . $pegawai->gambar);
                }
            }
            
            $image = $request->file('gambar');
            $nama_file = time() . '.' . $image->getClientOriginalExtension();
            $image->move('images/', $nama_file);
            $pegawai->gambar = $nama_file;
        }
        $pegawai->save();
        return redirect('/tablePegawai');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pegawai = Pegawai::findOrFail($id);
        if ($pegawai->gambar) {
            if(file_exists('images/' . $pegawai->gambar)){
                unlink('images/' . $pegawai->gambar);
            }
        }
        $pegawai->delete();
        return redirect('/tablePegawai');
    }
}

?>