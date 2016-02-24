<section id="signup">
    <div class="container inner" style="padding-top: 0">

        <div class="row">
            <div class="col-md-8 col-sm-9 center-block text-center" >
                <h1>Sign up Now !!</h1>
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
                                    <figure><img src="/images/slider/10.jpg" alt=""></figure>
                                </div>
                                <!-- /.col -->

                                <div class="col-md-5 col-md-pull-5 col-sm-6 col-sm-pull-6 inner-top-xs inner-right-xs">
                                    <h2>Student Signup Process</h2>
                                    <li>Go to <a href="{{ action('Auth\AuthController@studentRegistration') }}">Registration Page</a></li>
                                    <li>Fill out the Requested Details</li>
                                    <li>Select one level: First year University, high school, medium or elementary school</li>
                                    <li>You can get assistance in different subjects. You have to specify the subject when you file a question</li>
                                    <li>Once you have filled out the requested details, press Register. You will receive a message on your Email. Activate the registration. The website will provide you with an ID number</li>
                                    <li>Your personal information will not be visible to others. When you ask a question, Educators will only see the question and your ID number. Educators will enter in contact with you to define a way of collaboration that suits you, either by hourly fees or by other ways</li>
                                    <li>Your question will appear for a week. However, if you get an answer earlier, you can delete your question</li>
                                    <li>Once you have finished, log out</li>
                                    <li>The subscription is FREE for one month. After that a fee of 5 dollars per semester will be requested for each subject</li>
                                </div>
                                <!-- /.col -->

                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.tab-content -->

                        <div class="tab-content" id="educator">
                            <div class="row">

                                <div class="col-md-5 col-md-offset-1 col-sm-6 inner-right-xs">
                                    <p>
                                        The objective is to help Students understand their subject by answering urgent questions, by explaining them how to solve problems, by guiding them in exam preparations, etc... Both parties (Educator/Student) can establish the collaboration method which suits them best, either by hourly or by whole semester payments. It is hoped that fees will be very reasonable. Educators fees could be arranged by Visa, Paypal, Safepay or whatever means. The website management could help in this matter. Registration on the No Problem website is FREE for one month. After that a fee of 10 dollars by semester for each subject is requested.
                                    </p>
                                    <figure><img src="/images/slider/12.jpg" alt=""></figure>
                                </div>
                                <!-- /.col -->

                                <div class="col-md-5 col-sm-6 inner-top-xs inner-left-xs">
                                    <h2 style="margin-top: 0px;padding-top: 0px">Educator Signup Process</h2>
                                    <li>Go to <a href="{{ action('Auth\AuthController@educatorRegistration') }}">Registration Page</a></li>
                                    <li>Fill out the Requested Details</li>
                                    <li>Select one level such as : first year University, high school, medium or elementary school</li>
                                    <li>Select one or two subjects of your competence</li><br>
                                    <h2>The Educator can help students in two ways:</h2>
                                    <li>by answering questions raised by students for FREE</li>
                                    <li>by establishing direct contact with the student for further assistance in terms of private, preferably on line paid assistance. The student NP code will appear next to the raised question.</li>
                                    <hr>
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