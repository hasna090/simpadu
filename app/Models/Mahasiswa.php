<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Mahasiswa extends Model
{
    //

    protected $table = 'mahasiswa';

    public function Prodi(): BelongsTo
    {
        return $this->belongsTo(Prodi::class, 'idprodi', 'id_prodi');
    }
}
