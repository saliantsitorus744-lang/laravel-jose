<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    protected $table = 'biodata_1180';

    protected $fillable = [
        'nama', 'nim', 'kelas', 'email', 'no_hp', 'alamat',
        'tentang_saya', 'pendidikan', 'pengalaman', 'keahlian', 'foto'
    ];
}
