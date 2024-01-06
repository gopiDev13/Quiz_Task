<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAnswerDetails extends Model
{
    use HasFactory;
    protected $fillable = [
        'test_user_id',
        'question_id',
        'answers',
    ];
    public function questions()
    {
        return $this->belongsTo(Question::class);
    }
    public function testUser()
    {
        return $this->belongsTo(TestUser::class);
    }


}
