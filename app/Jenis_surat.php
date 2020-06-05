<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Jenis_surat extends Model
{
    use Uuid;

    protected $fillable = [
        'jenis_surat',
    ];
}
