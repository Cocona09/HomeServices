<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    public function question()
    {
        return $this->belongsTo(Question::class, 'question_id', 'id');
    }

    // Only the 'answer' and 'question_id' fields can be mass-assigned
    protected $fillable = [
        'answer',
        'question_id'
    ];
}
