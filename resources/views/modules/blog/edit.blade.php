@extends('layouts.two_col')

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
    <h1>Create Articles</h1>
@endsection

@section('left')

    <div class="panel">
        <div class="panel-body">
            <div class="col-md-12">
                <div class="row blog-post">
                    <div class="mTop10">
                        {!! Form::model($blog,['action' => ['BlogController@update',$blog->id], 'method' => 'patch', 'files'=>true], ['class'=>'form-horizontal']) !!}

                        <div class="form-group">
                            {!! Form::label('category', 'Select a category', ['class' => 'control-label']) !!} <span class="red">*</span>
                            {!! Form::select('category_id', $categories, null, ['class' => 'form-control','placeholder'=>'Category']) !!}
                        </div>


                        <div class="form-group">
                            {!! Form::label('title', 'Editorial Title', ['class' => 'control-label']) !!} <span class="red">*</span>
                            {!! Form::text('title_en', null, ['class' => 'form-control','placeholder'=>'Editorial title']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::label('description', 'Description', ['class' => 'control-label']) !!}
                            {!! Form::textarea('description_en', null, ['class' => 'form-control editor','placeholder'=>'Editorial Description']) !!}
                        </div>

                        <div class="form-group">
                            <span class="btn btn-default fileinput-button">
                                <i class="glyphicon glyphicon-plus"></i>
                                <span>Select Cover Image...</span>
                                <!-- The file input field used as target for the file upload widget -->
                                <input id="cover" type="file" name="cover" class="cover form-control">
                            </span>
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Save Draft', ['class' => 'btn btn-primary form-control']) !!}
                        </div>

                        {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="clear:both"></div>

@endsection
