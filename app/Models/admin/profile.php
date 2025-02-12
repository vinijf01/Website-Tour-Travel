<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class profile extends Model
{
    protected $table = "profile";
    protected $primaryKey = "id";

    protected $fillable = [
    	'judul',
        'ket'
    ];
}
