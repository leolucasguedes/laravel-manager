<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $table = 'empresas';

    protected $fillable = [
        'empresa_nome',
    ];

    public function usuarios()
    {
        return $this->hasMany(User::class);
    }
}
