@extends('layouts.one_col')

@section('script')
    @parent
    <script src="/vendor/tinymce/tinymce.jquery.min.js"></script>

    <script>
        tinymce.init({
            selector: "textarea.editor",
            plugins: [
                "advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker",
                "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
                "save table contextmenu directionality emoticons template paste textcolor jbimages directionality"
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages | print preview media fullpage | forecolor backcolor emoticons | ltr rtl ",
            relative_urls: false
        });
    </script>
@endsection

@section('title')
    <h1>{{ $question->body }}</h1>
@endsection

@section('middle')

    {!! Form::open(['action' => 'AnswerController@storeReply', 'method' => 'post','files'=>true, 'class'=>'form-horizontal'])
    !!}

    <input type="hidden" name="question_id" id="question_id" value="{{ $question->id }}">
    <input type="hidden" name="answer_id" id="question_id" value="{{ $answer->id }}">

    <ul class="list-group">
        <li class="list-group-item col-md-8 {{ $answer->user_id == Auth::user()->id ? 'pull-left' : 'pull-right text-rtl' }}" style="margin-bottom: 10px;">
            {{ $answer->user_id == Auth::user()->id ? 'Me  ' : $answer->user->np_code .' ' }}  <small class="gray"><i> on {{ $answer->created_at->format('d-m-Y \a\t g:i:s a')  }}</i></small>
            <h3>{!! $answer->body !!}</h3>
        </li>
        @foreach($childAnswers as $answer)
            <li class="list-group-item col-md-8 {{ $answer->user_id == Auth::user()->id ? 'pull-left' : 'pull-right text-rtl' }}" style="margin-bottom: 10px;">
                {{ $answer->user_id == Auth::user()->id ? 'Me  ' : $answer->user->np_code .' ' }}  <small class="gray"><i> on {{ $answer->created_at->format('d-m-Y \a\t g:i:s a') }}</i></small>
                <h3>{!! $answer->body !!}</h3>

            </li>
        @endforeach
    </ul>

    <div class="clear" style="clear:both;"></div>
    {!! Form::label('body', 'Message', ['class' => 'control-label']) !!} <span class="red">*</span>
    {!! Form::textarea('body_en', null, ['class' => 'form-control editor','placeholder'=>'Your Question']) !!}
    {!! Form::submit('Reply',  ['class' => 'form-control btn btn-positive','placeholder'=>'Your Question']) !!}
    {!! Form::close() !!}
@endsection