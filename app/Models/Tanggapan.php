<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
 

class Tanggapan extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'tanggapan';

    public function pelanggaran():BelongsTo
    {
        return $this->BelongsTo(Pelanggaran::class,'id_pelanggaran','id_pelanggaran');
    }

    public function petugas():BelongsTo
    {
        return $this->belongsTo(Petugas::class,'id_petugas','id_petugas');
    }
}
