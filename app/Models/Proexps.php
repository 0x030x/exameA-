<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proexps extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'exp',
    ];
}
