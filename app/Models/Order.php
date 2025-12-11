<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_name',
        'answers',
        'address',
        'feedback',
        'user_name',
        'user_email',
        'user_phone',
        'user_id',
    ];

    protected $casts = [
        'answers' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function worker() // Assuming you have an Employee model
    {
        return $this->belongsTo(Worker::class, 'employee_id');
    }
}
