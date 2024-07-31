<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIdAlternatifToProdukBatikTable extends Migration
{
    public function up()
    {
        Schema::table('produk_batik', function (Blueprint $table) {
            // Menambahkan kolom id_alternatif yang akan menjadi foreign key
            $table->unsignedBigInteger('id_alternatif')->nullable()->after('id_produk');

            // Menambahkan foreign key constraint
            $table->foreign('id_alternatif')
                  ->references('id_alternatif')
                  ->on('alternatif')
                  ->onDelete('set null'); // Atur tindakan jika data alternatif dihapus
        });
    }

    public function down()
    {
        Schema::table('produk_batik', function (Blueprint $table) {
            // Menghapus foreign key constraint dan kolom
            $table->dropForeign(['id_alternatif']);
            $table->dropColumn('id_alternatif');
        });
    }
}
