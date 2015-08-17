@extends('layouts.two_col')

@section('left')

    <h1>AD</h1>

@endsection


@section('right')

    <h2 class="blockhead">My Questions</h2>
    <div class="blockpara">

        @foreach($questions as $question)
            <div class="questionBorder">
                <div style="float:left;">
                    <strong>
                        <font color="#f96464">
                            {{ $question->subject->name }}
                        </font>
                    </strong>
                </div>
                <div style="float:right;"><i><font color="#f96464">{{ $question->created_at->format('d-m-Y')  }}</font></i></div>
                <br/>

                <p align="justify"><b>{{ $question->body }}</b></p>

                @foreach($answers as $answer)
                <p align="justify">
                    <a href="student_question_answer_history.php?qid=<?php echo $value['question_id'];?>&educator_id=<?php echo $dvalue['educator_id'];?>"
                       class="np_code">
                        <i>Answer from <?php echo $dvalue['np_code'];?></i>&nbsp;&nbsp;&nbsp;
                        <!--<img src="images/view_profile.ico" height="16" width="16">-->
                    </a>
                </p>
                @endforeach
                {{--<p align="justify">--}}
                    {{--No answer posted for this question--}}
                {{--</p>--}}
            </div>
        @endforeach
    </div>
@endsection