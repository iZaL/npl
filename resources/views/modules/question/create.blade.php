@extends('layouts.one_col')
@section('title')
    <h1 class="text-center"> Ask a Question </h1>
@endsection
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

@section('middle')

    <div class="row">
        <div class="col-sm-12 text-center">
            <div class="row inner-top-xs">
                <div class="col-md-12 col-sm-12 inner-right-xs inner-bottom-xs">
                    {!! Form::open(['action' => 'QuestionController@store', 'method' => 'post','files'=>true, 'class'=>'form-horizontal'])!!}
                    <div class="form-group">
                        {!! Form::label('subject', 'Select a subject', ['class' => 'control-label pull-left']) !!} <span
                                class="red pull-left">*</span>
                        {!! Form::select('subject_id', $subjects, null, ['class' => 'form-control ','placeholder'=>'Subject']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('body', 'body', ['class' => 'control-label pull-left']) !!} <span class="red pull-left">*</span>
                        {!! Form::textarea('body_en', null, ['class' => 'form-control editor','placeholder'=>'Your Question']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::submit('Submit',  ['class' => 'btn btn-green form-control']) !!}
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endsection