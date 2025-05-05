<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Athlete extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'tempat_lahir',
        'tanggal_lahir',
        'nik',
        'user_id',
        'no_hp',
        'jenis_kelamin',
        'akte',
        'sertifikat_sabuk'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
