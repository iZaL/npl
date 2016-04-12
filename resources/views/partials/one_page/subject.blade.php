<section id="subjects" style="background-color: #e7e7e7">
    <div class="container inner">

        <div class="row">
            <div class="col-md-8 col-sm-9 center-block text-center">
                <header>
                    <h1>Browse Subjects</h1>
                </header>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row inner-top-sm">
            @foreach($subjects as $subject)
                <div class="item col-md-4" style="margin-bottom: 20px" >
                    <a href="{{ action('SubjectController@show',$subject->id) }}">
                        <div class="subject-icon-info"  >
                            {{ ucfirst($subject->name) }}
                        </div>
                        <!-- /.info -->
                        <div class="" >
                            <img src="/images/lang/{{strtolower($subject->name)}}.jpg" class="img img-responisve"/>
                        </div>
                    </a>
                </div>
                <!-- /.item -->
            @endforeach
        <!-- /.owl-carousel -->
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
</section>