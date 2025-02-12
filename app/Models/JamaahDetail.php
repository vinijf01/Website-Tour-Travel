<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JamaahDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_name',
        'nohp',
        'type',
        'harga',
        'user_id',
        'tanggal_lahir',
        'usia',
        'tipe_kamar',
        'no_ktp',
        'nama_ayah',
        'no_passport',
        'tempat_passport',
        'tanggal_passport',
        'masa_berlaku_passport',
        'jenis_kelamin',
        'status',
        'alamat',
        'alamat_email',
        'no_telp_rumah',
        'riwayat_umrah',
        'tahun_umrah_terakhir',
        'pendidikan',
        'pekerjaan',
        'riwayat_kesehatan',
        'kontak_darurat',
        'kode_referensi',
        'nama_referensi',
        'foto_ktp',
        'pas_foto',
        'passport'
    ];
}
