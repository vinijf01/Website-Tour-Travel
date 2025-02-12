<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class sertifikasi extends Model
{
    protected $table = "sertifikasi";
    protected $primaryKey = "id";

    protected $fillable = [
    	'gambar',
        'ket'
    ];
}
