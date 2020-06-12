<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    use Uuid;

    public function surat_masuk()
    {
        return $this->hasMany(Surat_masuk::class);
    }

    public function surat_keluar()
    {
        return $this->hasMany(Surat_keluar::class);
    }

}
