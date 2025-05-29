<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    use HasFactory;

    protected $table = 'pendidikan';
    protected $primaryKey = 'id';
    
    protected $fillable = [
        'nama'
    ];
    public function pegawai()
    {
        return $this->hasMany(Pegawai::class, 'pendidikan_id');
    }
}
