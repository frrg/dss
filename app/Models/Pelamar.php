<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelamar extends Model
{
    use HasFactory;

    protected $table = 'pelamar';
    protected $fillable = ['pelamar_nama','pelamar_alamat','pelamar_jekel'];

    public function penilaian()
    {
        return $this->hasMany(Penilaian::class,'pelamar_id');
    }

}
