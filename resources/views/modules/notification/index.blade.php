@extends('layouts.two_col')
@section('title')
    <h1>Notifications</h1>
@endsection
@section('left')
    <div class="blockpara">
        <ul class="list-group">
            @foreach($notifications as $notification)
                @if(is_a($notification->notifiable,\App\Src\Answer\Answer::class))
                    @if($notification->notifiable->question)
                        @if($notification->notifiable->question->user)
                            <li class="list-group-item">
                                @if($isEducator)
                                    <span><b><a href="{{action('ProfileController@show',$notification->notifiable->question->user->id)}}" style="color:#000000">{{ $notification->notifiable->question->user->np_code }} </a></b>replied to you</span>
                                @elseif($isStudent)
                                    {{ $notification->notifiable->user->np_code }}
                                @endif
                                <a href="{{ action('AnswerController@createAnswer',$notification->notifiable->question->id) }}">
                                    {!! strip_tags($notification->notifiable->body) !!}
                                </a>
                                <span class="navy"> &nbsp; on {{ $notification->created_at->format('d-m-Y \a\t g:i:s a')  }}</span>
                            </li>
                        @endif
                    @endif
                @endif
            @endforeach
        </ul>
    </div>
@endsection

@section('right')

@endsection