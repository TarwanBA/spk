<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KriteriaPenilaian extends Model
{
    
    protected $table = 'kriteria_penilaian';

    protected $primaryKey = 'id_kriteria';

    protected $fillable = [
        'nama_kriteria',
        'bobot_kriteria',
        'kode',
        'jenis',
        'bobot_kepentingan',
    ];
}
