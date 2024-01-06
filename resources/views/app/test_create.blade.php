<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Questions and Options</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
            integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous">
        </script>
         <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js"
        integrity="sha512-WMEKGZ7L5LWgaPeJtw9MBM4i5w5OSBlSjTjCtSnvFJGSVD26gE5+Td12qN5pvWXhuWaWcVwF++F7aqu9cvqP0A=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer">
    </script>
</head>
<style>
.error{
    color:red;
}
</style>
<body>

    <h1>Quiz Time!</h1>

    <form action="{{route('store_answers',$register_user )}}" method="POST" id="test">
        @csrf
        
        <!-- Question 1 -->
        @php $index = 1 @endphp
        <input type="hidden" name="student_id" value="{{ $register_user }}">
        @forelse($questions as $key => $question)
        <fieldset>
          
            <legend>Question {{$index++}}: {{ $question->questions }}</legend>
            <label>
                <input type="radio" name="answers[{{$question->id}}]" value="{{ $question->option1 }}"> {{ $question->option1 }}
            </label>
            <label>
                <input type="radio" name="answers[{{$question->id}}]" value="{{ $question->option2 }}">{{ $question->option2 }}
            </label>
            <label>
                <input type="radio" name="answers[{{$question->id}}]" value="{{ $question->option3 }}"> {{ $question->option3 }}
            </label>
            <label>
                <input type="radio" name="answers[{{$question->id}}]" value="{{ $question->option4 }}">{{ $question->option4 }}
            </label>
        </fieldset>
      
       @empty

        @endforelse


      

        <!-- Add more questions as needed -->

        <input type="submit" value="Submit">
    </form>

</body>
<script>
$(document).ready(function(){
    $('#test').validate({
        rules: {
            @foreach($questions as $question)
                'answers[{{$question->id}}]': {
                    required: true,
                },
            @endforeach
        },
        messages: {
            @foreach($questions as $question)
                'answers[{{$question->id}}]': {
                    required: "Please select an answer for Question {{$loop->iteration}}",
                },
            @endforeach
        },
        errorPlacement: function (error, element) {
        // Customize the error placement if needed
        error.appendTo(element.closest('fieldset'));
    },
        submitHandler: function (form) {
            form.submit();
        }
    });
});



</script>
</html>