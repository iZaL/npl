@extends('layouts.two_col')
@section('title')
    <h1>Notifications</h1>
@endsection
@section('left')
    <div class="blockpara">
        <ul class="list-group">
            @foreach($user->notifications as $notification)
                @if($notification->notifiable instanceof App\Src\Answer\Answer)
                    <li class="list-group-item">
                        <h2>{!! ucfirst($notification->notifiable->question->body) !!}</h2>
                        @if($isEducator)
                            <span class="author-name"><a href="{{action('ProfileController@show',$notification->notifiable->question->user->id)}}">{{ $notification->notifiable->question->user->np_code }} </a></span>
                        @elseif($isStudent)
                            <span class="author-name">{{ $notification->notifiable->user->np_code }}</span>
                        @endif
                        <span class="replied">replied</span>
                        <a href="{{ action('AnswerController@createReply',['question_id'=>$notification->notifiable->question->id,'answer_id'=>$notification->notifiable->id]) }}">
                            {!! str_limit(strip_tags($notification->notifiable->body),100) !!}
                        </a>
                        <span class="date pull-right gray"> {{ $notification->created_at->format('d-m-Y \a\t g:i:s a')  }}</span>
                    </li>
                @elseif($notification->notifiable instanceof App\Src\Question\Question)
                    <li class="list-group-item">
                        <span class="author-name">{{ $notification->notifiable->user->np_code }}</span>
                        <span class="replied">asked</span>
                        <a href="{{ action('AnswerController@createAnswer',['question_id'=>$notification->notifiable->id]) }}">
                            {!! str_limit(strip_tags($notification->notifiable->body),100) !!}
                        </a>
                        <span class="date pull-right gray"> {{ $notification->created_at->format('d-m-Y \a\t g:i:s a')  }}</span>
                    </li>
                @endif
            @endforeach
        </ul>
    </div>
@endsection

@section('right')

@endsection