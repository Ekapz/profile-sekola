<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
	public function kurikulum()
	{
		return $this->belongsTo(Kurikulum::class);
	}

    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class);
    }
}
