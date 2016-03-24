<section id="objective" style="background: url(/images/bg1.jpg) left top repeat; ">
    <div class="container inner">
        <div class="row" >
            <div class="col-md-12">
                <h1 style=" font-size: 57.17px; text-align: center;color: #333a40;font-weight: 700;padding: 5px 0;">
                    Do You Have a Question?
                </h1>
            </div>
            <!-- /.col -->
            <div class="col-md-12 text-center">
                <h1 style="color: #9d1c1c;font-weight: bold">
                    Qualified Educators will Answer and Help You
                </h1>
            </div>
            <!-- /.col -->
            <div class="row inner-top-sm">
                @foreach($subjects as $subject)
                    <div class="item col-md-4" style="margin-bottom: 20px" >
                        <a href="{{ action('SubjectController@show',$subject->id) }}">
                            <div class="subject-icon-info"  >
                                {{ ucfirst($subject->name) }}
                            </div>
                            <!-- /.info -->
                            <div class="" >
                                <img src="/images/lang/{{strtolower($subject->name)}}.jpg"/>
                            </div>
                        </a>
                    </div>
                    <!-- /.item -->
                    @endforeach
                            <!-- /.owl-carousel -->
            </div>
        </div>
    </div>
</section>