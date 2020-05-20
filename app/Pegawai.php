<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use Uuid;

    public function golongan()
    {
        return $this->BelongsTo(Golongan::class);
    }

    public function jabatan()
    {
        return $this->BelongsTo(Jabatan::class);
    }

    public function unit_kerja()
    {
        return $this->BelongsTo(Unit_kerja::class);
    }
}
