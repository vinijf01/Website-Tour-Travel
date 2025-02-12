<?php

namespace App\Models\admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhyUs extends Model
{
    protected $table = "why_us";
    protected $primaryKey = "id";

    protected $fillable = [
        'title',
        'description',
    ];
}
