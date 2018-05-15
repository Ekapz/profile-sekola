<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class);
    }
}
