<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    use HasFactory;

    protected $table = 'countries';

    protected function casts(): array {
        return [
            'nombre' => 'string',
            'descripcion' => 'string',
            'poblacion' => 'int',
            'area' => 'double'
            ];
    }
}
