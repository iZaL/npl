@extends('layouts.two_col')

@section('left')

    <h1>AD</h1>

@endsection


@section('right')
    <div class="blockpara">
        <p>The main objectives of this website are to help students understand their courses, answer urgent
            questions, prepare for examinations, correct homework etc. This is done by establishing direct
            contact between students and well qualified educators.<br><br>
            <b>Practical Steps:</b><br>
            1. Open Registration Page<br><br>
            2. Fill the requested details<br><br>
            3. The website will provide you with an ID number and password<br><br>
            &nbsp;&nbsp;&nbsp;-&nbsp;Your personal information will not be visible to others.<br><br>
            &nbsp;&nbsp;&nbsp;-&nbsp;When you file a question, Educator(s) will see the question and your ID
            number. This way they enter in contact with you to define a way of collabration either by hourly
            fees or other ways.<br><br>
            &nbsp;&nbsp;&nbsp;-&nbsp;Your question will appear(advertised) for one week. However, if you get an
            answer earlier, you can delete the question.<br><br>
            4. Subscription is FREE for one month. After that a fee of $5/year is requested.
        </p>
    </div>

    @if($student)
        <a href="" class="btn btn-primary">YOUR PROFILE</a>&nbsp;&nbsp;&nbsp;
        <a href="inside.php?action=ask_a_question" class="btn btn-success">ASK A
            QUESTION</a>&nbsp;&nbsp;&nbsp;
        <a href="inside.php?action=student_questions" class="btn btn-primary">YOUR QUESTIONS</a><br><br>

    @endif
@endsection