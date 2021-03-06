<?php

namespace App;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Model;

class Transportasi extends Model
{
    use Uuid;

    protected $fillable = [
        'jenis_transportasi', 'nama_transportasi',
    ];
}
