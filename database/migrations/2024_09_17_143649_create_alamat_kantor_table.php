<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('alamat_kantor', function (Blueprint $table) {
            $table->id('id_alamat');
            $table->string('jalan');
            $table->string('kota');
            $table->string('kode_pos');
            $table->foreignId('kantor_id')->constrained('kantor', 'id_kantor'); // Pastikan `kantor_id` merujuk ke `id_kantor`
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alamat_kantor');
    }
};
