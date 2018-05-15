<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class);
    }
}
