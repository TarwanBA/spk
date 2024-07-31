<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BobotProdukSAW extends Model
{
    protected $table = 'bobot_produk_saw';

    protected $fillable = [
        'produk_batik_id',
        'alternatif_id',
        'hasil_saw',
    ];

    public function produkBatik()
    {
        return $this->belongsTo(ProdukBatik::class, 'produk_batik_id');
    }

    public function alternatif()
    {
        return $this->belongsTo(Alternatif::class, 'alternatif_id');
    }
}
