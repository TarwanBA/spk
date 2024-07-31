<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Alternatif;

class ProdukBatik extends Model
{
    protected $table = 'produk_batik';

    protected $primaryKey = 'id_produk';

    protected $fillable = [
        'nama_produk',
        'kualitas_kain',
        'harga',
        'warna',
        'teknik_pembuatan',
        'desain_motif',
        'keaslian',
        'id_alternatif',
        'alternatif_id'
    ];

     public function alternatif()
     {
         return $this->hasMany(Alternatif::class, 'id_produk', 'id_produk');
     }


      protected static function boot()
        {
            parent::boot();

            static::created(function ($produkBatik) {
                Alternatif::create([
                    'nama_alternatif' => $produkBatik->nama_produk,
                    'kode' => 'A' . $produkBatik->id_produk,
                    'id_produk' => $produkBatik->id_produk
                ]);
            });
        }

}


   
