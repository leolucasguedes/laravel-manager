<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $table = 'clientes';

    protected $fillable = [
        'cliente_nome',
        'usuario_id',
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }
}
