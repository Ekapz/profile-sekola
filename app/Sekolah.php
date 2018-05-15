<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    public function desa()
    {
        return $this->belongsTo(Desa::class);
    }
}
