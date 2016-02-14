@extends('layouts.two_col')
@section('title')
    <h1>Notifications</h1>
@endsection
@section('left')
    <div class="blockpara">
        <ul class="list-group">
            @foreach($notifications as $notification)
                @if($notification->notifiable)
                    @if($notification->notifiable->question)
                        <li class="list-group-item">
                            <a href="{{ action('AnswerController@createAnswer',$notification->notifiable->question->id) }}">
                                {{ $notification->notifiable->question->user->np_code }} replied to you
                                {!! strip_tags($notification->notifiable->body) !!}
                            </a>
                            <span class="navy"> on {{ $notification->created_at->format('d-m-Y \a\t g:i:s a')  }}</span>
                        </li>
                    @endif
                @endif
            @endforeach
        </ul>
    </div>
@endsection

@section('right')

@endsection