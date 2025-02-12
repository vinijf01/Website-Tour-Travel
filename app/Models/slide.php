<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class slide extends Model
{
    protected $table = "slide";
    protected $primaryKey = "id";

    protected $fillable = [
    	'judul',
    	'gambar'
    ];
}
