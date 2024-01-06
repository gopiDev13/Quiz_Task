<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questions With Answers</title>
</head>
<body>

    <h1>Quiz Time!</h1>

        @csrf
        
        <!-- Question 1 -->
        @php $index = 1 @endphp
        @forelse($questions as $key => $question)
        <fieldset>
          
            <p>Question {{ $index++ }}: {{ $question->questions }}</legend>
                   
                <p> Your Answer : {{ \App\Http\Controllers\TestController::get_user_answers($user_id, $question->id) }}</p>
                <p> Correct Answer :</p>
                <p> {{ $question->questionAnswers->answers }}</p>
        </fieldset>
      
       @empty

        @endforelse


      

        <!-- Add more questions as needed -->
<p>Total marks : {{$count}}/10</p>
       <a href="{{ route('test.index') }}"> <button type="button">Back </button></a>
    </form>

</body>
</html>