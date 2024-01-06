<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        



$questionAnswers=  __('question_answer.question_answers'); 

   foreach($questionAnswers as $questionAnswer) {
      $question =  \App\Models\Question::create([
           'questions' => $questionAnswer[0],
           'option1' => $questionAnswer[1],
           'option2' => $questionAnswer[2],
           'option3' => $questionAnswer[3],
           'option4' => $questionAnswer[4],
       ]);
       $question_id = $question ->id;
   

       \App\Models\QuestionAnswer::create([
           'question_id' =>  $question_id ,
           'answers' => $questionAnswer[5],
       ]);
   }
    }
}
