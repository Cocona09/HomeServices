<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Worker extends Model
{
    use HasFactory;
    protected $fillable = [
        'image', 'firstname', 'lastname','job', 'email', 'phone', 'gender',
        'age', 'address',
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
