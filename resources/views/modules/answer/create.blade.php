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
                "save table emoticons template textcolor jbimages directionality powerpaste",
            ],
            toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image jbimages | print preview media fullpage | forecolor backcolor emoticons | ltr rtl ",
            relative_urls: false,
            powerpaste_word_import: 'clean',
            powerpaste_html_import: 'merge',
        });
    </script>
@endsection

@section('title')
    <h1 class="text-center">{{ $question->body }}</h1>
@endsection

@section('middle')
    <div class="row">
        <div class="col-sm-12">
            <div class="row inner-top-xs">
                <div class="col-md-12 col-sm-12 inner-right-xs inner-bottom-xs">
                    {!! Form::open(['action' => 'AnswerController@store', 'method' => 'post','files'=>true, 'class'=>'form-horizontal'])!!}
                    {!! Form::hidden('question_id',$question->id) !!}
                    {!! Form::label('body', 'Answer', ['class' => 'control-label']) !!} <span class="red">*</span>
                    {!! Form::textarea('body_en', null, ['class' => 'form-control editor','placeholder'=>'Your Answer']) !!}
                    {!! Form::submit('Reply',  ['class' => 'form-control  btn btn-green']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection