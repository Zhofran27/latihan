<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pelanggaran;
use Illuminate\Database\Eloquent\Relations\hasMany;

class Siswa extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = 'siswa';
    public $timestamps = false;

    public function pelanggaran():hasMany
    {
        return $this->hasMany(Pelanggaran::class,'nis','nis');
    }
}
