<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saham extends Model
{
    use HasFactory;

    protected $table = 'saham';
    protected $fillable = [
        'nominal',
        'tanggal',
        'nama',
        'keterangan',
    ];
    protected $primaryKey = 'id';
}
