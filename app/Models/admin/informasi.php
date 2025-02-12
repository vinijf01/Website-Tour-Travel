<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class informasi extends Model
{
    protected $table = "informasi";
    protected $primaryKey = "id";

    protected $fillable = [
    	'gambar',
        'judul',
        'deskripsi'
    ];
}
