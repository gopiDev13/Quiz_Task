<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestUser extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_name',
        'mobile_number',
    ];
    public function userAnswerDetails()
    {
        return $this->belongsTo(UserAnswerDetails::class);
    }
}
