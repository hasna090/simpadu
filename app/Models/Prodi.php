<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Prodi extends Model
{
    //
    protected $table = 'prodi';
    protected $primaryKey = 'id_prodi';
    protected $keyType = 'string';

    protected $fillable = [
        'id_prodi',
        'nama',
        'kaprodi',
        'jurusan'
    ];

    public function Mahasiswa(): BelongsTo
    {
        return $this->belongsTo(Mahasiswa::class, 'id_prodi', 'idprodi');
    }
}
