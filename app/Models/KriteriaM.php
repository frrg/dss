<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KriteriaM extends Model
{
    use HasFactory;

    protected $table = 'kriteria_m';
    protected $fillable = ['kriteria_kode','kriteria_keterangan','kriteria_jenis'];
}
