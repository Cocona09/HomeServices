<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $fillable = [
        'firstname', 'lastname', 'email', 'gender', 'phone', 'job',
        'languages', 'experience', 'age', 'address', 'message', 'image',
    ];
}
