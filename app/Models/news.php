<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class news extends Model
{
    protected $table = "news";
    protected $primaryKey = "id";

    protected $fillable = [
    	'judul',
    	'gambar',
        'deskripsi'
    ];
}
