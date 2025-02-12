<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Model;

class bank extends Model
{
    protected $table = "bank_admin";
    protected $primaryKey = "id";

    protected $fillable = [
    	'nama_bank',
        'norek',
        'atas_nama'
    ];
}
