<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Siswa;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pelanggaran extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'pelanggaran';
    public $timestamps = false;

    public function siswa():BelongsTo
    {
        return $this->BelongsTo(Siswa::class,'nis','nis');
    }

    public function tanggapan():HasMany
    {
        return $this->hasMany(Tanggapan::class,'id_pelanggaran','id_pelanggaran');
    }
}
