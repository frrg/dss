<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;

    protected $table = 'penilaian_t';
    protected $fillable = ['kriteria_id','bobot_kriteria_id','pelamar_id'];

    public function pelamar()
    {
        return $this->belongsTo(Kriteria::class,'pelamar_id');
    }

    public function bobot_kriteria()
    {
        return $this->belongsTo(BobotKriteria::class,'bobot_kriteria_id');
    }
    
    public function kriteria()
    {
        return $this->belongsTo(KriteriaM::class,'kriteria_id');
    }
    
}
