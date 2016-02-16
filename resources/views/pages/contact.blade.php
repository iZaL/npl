@extends('layouts.one_col')

@section('title')
    <h1>Get in touch</h1>
    <p>Do you want to know more? We’d love to hear from you!</p>
@endsection

@section('middle')
<section id="contact-form">
    <div class="container ">
        <div class="row">
            <div class="col-sm-12">
                <div class="row">

                    <div class="col-sm-6 inner-right-sm">

                        <h2>Leave a Message</h2>

                        <form id="contactform" class="forms" action="/contact" method="post">
                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="text" name="name" class="form-control" placeholder="Name (Required)">
                                </div><!-- /.col -->
                            </div><!-- /.row -->

                            <div class="row">
                                <div class="col-sm-6">
                                    <input type="email" name="email" class="form-control" placeholder="Email (Required)">
                                </div><!-- /.col -->
                            </div><!-- /.row -->

                            <div class="row">
                                <div class="col-sm-12">
                                    <textarea name="body" class="form-control" placeholder="Enter your message ..."></textarea>
                                </div><!-- /.col -->
                            </div><!-- /.row -->

                            <button type="submit" class="btn btn-default btn-submit">Submit message</button>

                        </form>

                        <div id="response"></div>

                    </div><!-- ./col -->

                    <div class="col-sm-6 inner-left-sm border-left">

                        <h2>Contacts</h2>
                        <p> We love to hear from you :) </p>
                        <h3>No Problem Learning</h3>
                        <ul class="contacts">
                            <li><i class="icon-location contact"></i> 84 Street, City, State 24813</li>
                            <li><i class="icon-mobile contact"></i> +00 (123) 456 78 90</li>
                            <li><a href="mailto:info@reen.com"><i class="icon-mail-1 contact"></i> info@no-problem-learning.com</a></li>
                        </ul><!-- /.contacts -->

                        <div class="social-network">
                            <h3>Social</h3>
                            <ul class="social">
                                <li><a href="#"><i class="icon-s-facebook"></i></a></li>
                                <li><a href="#"><i class="icon-s-gplus"></i></a></li>
                                <li><a href="#"><i class="icon-s-twitter"></i></a></li>
                            </ul><!-- /.social -->
                        </div><!-- /.social-network -->

                    </div><!-- /.col -->

                </div><!-- /.row -->
            </div><!-- /.col -->
        </div><!-- /.row -->

    </div><!-- /.container -->
</section>
@endsection