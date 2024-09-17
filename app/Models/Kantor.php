<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kantor extends Model
{
    use HasFactory;
    protected $table = 'kantor'; // Nama tabel

    protected $primaryKey = 'id_kantor'; // Nama kolom primary key

    protected $fillable = [
        'nama_kantor',
    ];

    public function karyawan()
    {
        return $this->hasMany(Karyawan::class, 'fk_id_kantor');
    }

    public function alamatKantor()
    {
        return $this->hasOne(AlamatKantor::class, 'kantor_id', 'id_kantor');
    }
}
