<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Mahasiswa extends Model
{
    //
    protected $table = 'mahasiswa';
    protected $primaryKey = 'nim';
    protected $keyType = 'string';

    protected $fillable = [
        'nim',
        'nama',
        'tanggalLahir',
        'telp',
        'email',
        'password',
        'foto',
        'idprodi'
    ];

    public function Prodi(): BelongsTo
    {
        return $this->belongsTo(Prodi::class, 'idprodi', 'id_prodi');
    }
}
