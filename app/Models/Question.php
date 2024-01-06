<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $fillable = [
        'questions',
        'option1',
        'option2',
        'option3',
        'option4',
    ];
    public function questionAnswers()
    {
        return $this->hasOne(QuestionAnswer::class, 'question_id');
    }
    public function usersAnsers()
    {
        return $this->hasOne(UserAnswerDetails::class, 'question_id');
    }
}
