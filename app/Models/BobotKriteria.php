<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BobotKriteria extends Model
{
    use HasFactory;

    protected $table = 'bobot_kriteria';
    protected $fillable = ['bobot','keterangan','kriteria_id'];

    public function kriteria()
    {
        return $this->belongsTo(KriteriaM::class,'kriteria_id');
    }
    
}
