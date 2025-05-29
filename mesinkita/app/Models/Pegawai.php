<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $table = 'pegawai';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'nama',
        'nik',
        'jenisPegawai_id',
        'statusPegawai_id',
        'unit',
        'sub_unit',
        'pendidikan_id',
        'tgl_lahir',
        'tmpt_lahir',
        'jnsKel_id',
        'agama_id',
        'gambar'
    ];
}
