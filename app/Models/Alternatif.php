<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProdukBatik;

class Alternatif extends Model
{
    protected $table = 'alternatif';
    protected $primaryKey = 'id_alternatif';
    protected $fillable = [
        'nama_alternatif',
        'kode',
        'id_produk',
        'produk_id'
    ];

    public function produkBatik()
    {
        return $this->belongsTo(ProdukBatik::class, 'id_produk', 'id_produk');
    }
}
