<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AlamatKantor extends Model
{
    use HasFactory;

    protected $table = 'alamat_kantor';
    protected $primaryKey = 'id_alamat';
    protected $fillable = ['jalan', 'kota', 'kode_pos', 'kantor_id'];

    public function kantor()
    {
        return $this->belongsTo(Kantor::class, 'kantor_id', 'id_kantor');
    }
}
