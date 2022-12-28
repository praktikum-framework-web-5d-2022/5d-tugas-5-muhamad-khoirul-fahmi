<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembeli extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function barang()
    {
        return $this->hasOne('App\Models\Barang');
    }
}
