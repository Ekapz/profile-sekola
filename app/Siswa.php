<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
	public function jurusan()
	{
		return $this->belongsTo(Jurusan::class);

	}
	public function sekolah()
	{
		return $this->belongsTo(Sekolah::class);

	}
}
