<!DOCTYPE html >
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>No Problem Learning</title>

    @section('style')
        <!-- Bootstrap Core CSS -->
        <link href="/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom CSS -->
        <link href="/css/sb-admin-2.css" rel="stylesheet">
        {{--<link href="/css/flat-ui.min.css" rel="stylesheet">--}}
        {{--<link href="/css/bootstrap-flat-extras.css" rel="stylesheet">--}}
        {{--<link href="/css/bootstrap-flat-extras.css" rel="stylesheet">--}}

        <link href="/css/admin.css" rel="stylesheet">

        <!-- Custom Fonts -->
        <link href="/bower_components/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css">
        <link href="/bower_components/fontawesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    @show
</head>

<body>
<div id="wrapper">

    @include('admin.partials.sidebar')

    <div id="page-wrapper">
        <div class="container-fluid">
            @include('admin.partials.notifications')

            @section('content')

            @show
        </div>
        <!-- /.container-fluid -->
    </div>

</div>
@section('script')
    <!-- jQuery -->
    <script src="/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <script src="/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="/bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <script src="/bower_components/select2/dist/js/select2.full.min.js"></script>

    {{--<script src="/js/flat-ui.min.js"></script>--}}

    <!-- Custom Theme JavaScript -->
    <script src="/js/sb-admin-2.js"></script>
    <script src="/vendor/tinymce/tinymce.jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#dataTables').DataTable({
                responsive: true
            });
        });

        $("[data-toggle=tooltip]").tooltip();

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

        $(document).on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            if ( $( "#deleteModal" ).length ) {
                var link = button.data('link') // Extract info from data-* attributes
                $("#deleteModal").attr("action", link);
            }
        });

    </script>
@show

</body>
</html>
