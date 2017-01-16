@extends('layouts.one_col')

@section('script')
    @parent
    <script src="/vendor/tinymce/tinymce.min.js"></script>
    <script>
      tinymce.init({
        selector: "textarea.editor",
        plugins: [
          "advlist autolink autoresize link image lists charmap print preview hr anchor pagebreak spellchecker",
          "searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking",
          "save table emoticons template textcolor jbimages directionality powerpaste tiny_mce_wiris",
        ],
        toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages | print preview media fullpage | forecolor backcolor emoticons | ltr rtl | tiny_mce_wiris",
        relative_urls: false,
        powerpaste_word_import: 'clean',
        powerpaste_html_import: 'merge',
        powerpaste_allow_local_images : true
      });
    </script>
@endsection

@section('title')
    <h1>{!! $question->body !!}</h1>
@endsection

@section('middle')

    {!! Form::open(['action' => 'AnswerController@storeReply', 'method' => 'post','files'=>true, 'class'=>'form-horizontal'])
    !!}

    <input type="hidden" name="question_id" id="question_id" value="{{ $question->id }}">
    <input type="hidden" name="answer_id" id="question_id" value="{{ $answer->id }}">

    <ul class="list-group">
        <li class="list-group-item col-md-8 {{ $answer->user_id == Auth::user()->id ? 'pull-left' : 'pull-right' }}" style="margin-bottom: 10px;">
            <i class="pull-left fa fa-user" style="color: grey;padding-top: 4px"></i> {{ $answer->user_id == Auth::user()->id ? 'Me  ' : $answer->user->np_code .' ' }}  <small class="gray"><i> on {{ $answer->created_at->format('d-m-Y \a\t g:i:s a')  }}</i></small>
            <h3>{!! $answer->body !!}</h3>
        </li>
        @foreach($childAnswers as $answer)
            <li class="list-group-item col-md-8 {{ $answer->user_id == Auth::user()->id ? 'pull-left' : 'pull-right bg-gray' }}" style="margin-bottom: 10px;">
                <i class="pull-left fa fa-user" style="color: grey;padding-top: 4px"></i> {{ $answer->user_id == Auth::user()->id ? 'Me  ' : $answer->user->np_code .' ' }}  <small class="gray"><i> on {{ $answer->created_at->format('d-m-Y \a\t g:i:s a') }}</i></small>
                <h3>{!! $answer->body !!}</h3>
            </li>
        @endforeach
    </ul>

    <div class="clear" style="clear:both;"></div>
    {!! Form::label('body', 'Message', ['class' => 'control-label']) !!} <span class="red">*</span>
    {!! Form::textarea('body_en', null, ['class' => 'form-control editor','placeholder'=>'Your Question']) !!}
    {!! Form::submit('Submit',  ['class' => 'form-control btn btn-green','placeholder'=>'Your Question']) !!}
    {!! Form::close() !!}
@endsection