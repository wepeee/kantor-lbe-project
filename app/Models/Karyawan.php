<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $primaryKey = 'id_karyawan';

    protected $table = 'karyawan'; // Pastikan nama tabel di sini benar

    protected $fillable = [
        'nama_karyawan',
        'nohp_karyawan',
        'fk_id_kantor',
    ];

    public function kantor()
    {
        return $this->belongsTo(Kantor::class, 'kantor_id');
    }
}
