@extends('layouts.two_col')

@section('left')
    <h1>AD</h1>
@endsection

@section('right')

    <div class="blockpara">
        <p>The main objectives of this educational are to :<br><br>
            1. Help students in understanding their subject, answering urgent questions, solving problems, exam
            preparation etc...<br><br>
            2. Educators will check the (asked) questions which apear in the appropriate level of the subject<br><br>
            3. If the Educator is interested in answering the question he/she click the student NP Code(unique code for
            the student). This enables the educator to initiate a contact between with the student.<br><br>
            4. Both parties (Educator/Student) can establish the collaboration method, either by hourly or whole
            semester fee.<br><br>
            5. It is hoped that fees will be very reasonable.<br><br>
            6. Educators establish the way of recieving the fee by Paypal, Safepay or whatever means.<br><br>
            7. No home or private lessons are permitted.<br><br>
            8. Registration on the No Problem website is FREE for one month. After that a fee of $10/year is requested.
        </p>
    </div>
    @if($educator)
        <a href="{{ action('ProfileController@editProfile') }}" class="btn btn-primary">My Profile</a>&nbsp;&nbsp;&nbsp;
        <a href="{{ action('EducatorController@getQuestions') }}" class="btn btn-success">Recent
            Questions</a>&nbsp;&nbsp;&nbsp;
        <a href="{{ action('EducatorController@getAnswers') }}" class="btn btn-primary">My Answers</a><br><br>
    @endif

@endsection