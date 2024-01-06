<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuestionAnswer extends Model
{
    use HasFactory;
    protected $fillable = [
        'question_id',
        'answers',
       
       
    ];
    public function questions()
    {
        return $this->belongsTo(Question::class);
    }
   
}
