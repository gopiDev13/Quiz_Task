<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TestRequest;
use App\Models\TestUser;
use App\Models\Question;
use App\Models\UserAnswerDetails;
use App\Models\QuestionAnswer;



class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('app.student_register');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TestRequest $request)
    {
        //
        $validated_user = $request->validated();
        $user = TestUser::create($validated_user);
        // $user = TestUser::create([
        //     'student_name' => $request->student_name,
        //     'mobile_number' => $request->mobile_number,
        // ]);
        $register_user = $user->id;
        $questions =   Question::all();
        return view('app.test_create', compact('questions' , 'register_user'));
       
    }

    public function store_answers(Request $request)
    {
        
        $answers = $request->answers;
        foreach($answers as $index => $answer){
             UserAnswerDetails::create([
              'test_user_id' => $request->student_id,
              'question_id' => $index,
              'answers' =>  $answer,

             
             ]);
        }
        $user_id = $request->student_id;
        $user_answers =  UserAnswerDetails::where('test_user_id',$request->student_id)->get();
        $original_answers =  QuestionAnswer::whereIn('question_id' , $user_answers->pluck('question_id')->toArray())->get();
       $count = 0;
        foreach($original_answers as $key => $original_answer){

            foreach($user_answers as $index => $user_answer){
                if($original_answer->answers == $user_answer->answers){
                       $count++;
                }

            }
        }
        $questions =   Question::all();
        return view('app.answer_details',compact('count','questions','user_answers', 'user_id'));
    }
    public static function get_user_answers($test_user_id, $question_id) {
        $user_answers =  UserAnswerDetails::where('test_user_id',$test_user_id)
                                                ->where('question_id',$question_id)
                                                ->first();
                                                return $user_answers->answers;

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
