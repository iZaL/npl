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
    <h1 class="text-center">{{ strip_tags($question->body) }}</h1>
@endsection

@section('middle')
    <div class="row">
        <div class="col-sm-12">
            <div class="row inner-top-xs">
                <div class="col-md-offset-3 col-md-6 col-sm-6 inner-right-xs inner-bottom-xs">
                    {!! Form::open(['action' => 'AnswerController@store', 'method' => 'post','files'=>true, 'class'=>'form-horizontal'])!!}
                    {!! Form::hidden('question_id',$question->id) !!}
                    {!! Form::label('body', 'Answer', ['class' => 'control-label']) !!} <span class="red">*</span>
                    {!! Form::textarea('body_en', null, ['class' => 'form-control editor','placeholder'=>'Your Answer']) !!}
                    {!! Form::submit('Submit',  ['class' => 'form-control  btn btn-green']) !!}
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection