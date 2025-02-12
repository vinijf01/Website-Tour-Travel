<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class mitra extends Model
{
    protected $table = "mitra";
    protected $primaryKey = "id";

    protected $fillable = [
    	'gambar',
        'ket'
    ];
}
