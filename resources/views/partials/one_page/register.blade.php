<section id="signup">
    <div class="container inner" style="padding-top: 0">

        <div class="row">
            <div class="col-md-8 col-sm-9 center-block text-center">
                <header>
                    <h1>Sign up Now !!</h1>
                </header>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

        <div class="row inner-top-sm">
            <div class="col-xs-12">
                <div class="tabs tabs-reasons tabs-circle-top tab-container">

                    <ul class="etabs text-center">
                        <li class="tab">
                            <a href="#student">
                                As a Student
                            </a>
                        </li>
                        <li class="tab">
                            <a href="#educator">
                                As an Educator
                            </a>
                        </li>
                    </ul>
                    <!-- /.etabs -->

                    <div class="panel-container">

                        <div class="tab-content" id="student">
                            <div class="row">

                                <div class="col-md-5 col-md-push-5 col-md-offset-1 col-sm-6 col-sm-push-6 inner-left-xs">
                                    <figure><img src="/images/slider/student1.png" alt=""></figure>
                                </div>
                                <!-- /.col -->

                                <div class="col-md-5 col-md-pull-5 col-sm-6 col-sm-pull-6 inner-top-xs inner-right-xs">
                                    <h2>Student Signup Process</h2>

                                    <li>Go to <a href="{{ action('Auth\AuthController@studentRegistration') }}">Registration Page</a></li>
                                    <li>Fill the Requested Details</li>
                                    <li>The website will provide you with an ID number and Password. <br>
                                        Your personal information will not be visible to others.<br>
                                        When you ask a Question, Educator(s) will see the question and your ID
                                        number. <br>
                                        This way they enter in contact with you to define a way of collabration
                                        either by
                                        hourly fees or other ways.<br>
                                        Your question will appear(advertised) for
                                        one week. However, if you get an answer earlier, you can delete the
                                        question.
                                    </li>
                                    <li> Subscription is FREE for one month. After that a fee of $5/semester (6
                                        months) is requested.
                                    </li>
                                </div>
                                <!-- /.col -->

                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.tab-content -->

                        <div class="tab-content" id="educator">
                            <div class="row">

                                <div class="col-md-5 col-md-offset-1 col-sm-6 inner-right-xs">
                                    <figure><img src="/images/slider/educator1.png" alt=""></figure>
                                </div>
                                <!-- /.col -->

                                <div class="col-md-5 col-sm-6 inner-top-xs inner-left-xs">
                                    <h2>Educator Signup Process</h2>
                                    <li>Go to <a href="{{ action('Auth\AuthController@educatorRegistration') }}">Registration Page</a></li>
                                    <li>Fill the Requested Details</li>
                                    <li>
                                        1. Help students in understanding their subject, answering urgent questions,
                                        solving problems, exam preparation etc...<br>

                                        2. Educators will check the (asked) questions which apear in the appropriate
                                        level of the subject<br>

                                        3. If the Educator is interested in answering the question he/she click the
                                        student NP Code(unique code for the student). This enables the educator to
                                        initiate a contact between with the student.<br>

                                        4. Both parties (Educator/Student) can establish the collaboration method,
                                        either by hourly or whole semester fee.<br>

                                        5. It is hoped that fees will be very reasonable.<br>

                                        6. Educators establish the way of recieving the fee by Paypal, Safepay or
                                        whatever means.<br>

                                        7. No home or private lessons are permitted.<br>

                                        8. Registration on the No Problem website is FREE for one month. After that
                                        a fee of $10/year is requested.<br>
                                    </li>
                                </div>
                                <!-- /.col -->

                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.tab-content -->

                    </div>
                    <!-- /.panel-container -->

                </div>
                <!-- /.tabs -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
</section>