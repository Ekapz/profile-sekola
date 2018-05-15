<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Desa extends Model
{
    public function kecamatan()
    {
        return $this->belongsTo(Kecamatan::class);
    }
}
