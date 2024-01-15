<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KI extends Model
{
    use HasFactory;

    protected $table = 'k_i_s';
    protected $fillable = [
        'nama',
        'nominal',
    ];
    protected $primaryKey = 'id';
}
