<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class testimoni extends Model
{
    protected $table = "testimoni";
    protected $primaryKey = "id";

    protected $fillable = [
    	'nama',
        'ket'
    ];
}
