<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class login extends Model
{
    
    protected $fillable = [
        'email',
        'password',
    ];
    /** @use HasFactory<\Database\Factories\LoginFactory> */
    use HasFactory;
}
