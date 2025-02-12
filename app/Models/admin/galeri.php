<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class galeri extends Model
{
    protected $table = "galeri";
    protected $primaryKey = "id";

    protected $fillable = [
    	'gambar',
        'ket'
    ];
}
