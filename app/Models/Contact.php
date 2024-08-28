<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    // Define the fillable attributes
    protected $fillable = [
        'name', 'email', 'phone', 'picture',
    ];
}

