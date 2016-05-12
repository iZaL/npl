@extends('layouts.one_col')

@section('title')
    <h1>Get in touch</h1>
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

                                <button type="submit" class="btn btn-green">Send Message</button>

                            </form>

                            <div id="response"></div>

                        </div><!-- ./col -->

                        <div class="col-sm-6 inner-left-sm border-left">

                            <h2>No Problem Learning</h2>
                            <h3>Marketing is Managed by Ideas Owners Co</h3>
                            <ul class="contacts">
                                <li>
                                    <p>
                                        <i class="fa fa-map-marker"></i>
                                        IdeasOwners Co.
                                        Kuwait - Sharq - Khaled ibn Al-waleed Street
                                        Sawaber6 Tower - Floor 3 - Office 6
                                    </p>
                                </li>
                                <li><i class="fa fa-phone"></i>+965 97123253</li>
                                <li><i class="fa fa-envelope"></i><a href="info@ideasowners.com"> info@ideasowners.com</a></li>
                            </ul><!-- /.contacts -->

                            <div class="social-network">
                                <h3>Social</h3>
                                <h2>
                                    <a href="https://ideasowners.net/" target="_blank"><i class="fa fa-globe"></i></a>
                                    <a href="https://twitter.com/ideasowners" target="_blank"><i class="fa fa-twitter"></i></a>
                                    <a href="https://instagram.com/ideasowners" target="_blank"><i class="fa fa-instagram"></i></a>
                                </h2>
                            </div><!-- /.social-network -->

                        </div><!-- /.col -->

                    </div><!-- /.row -->
                </div><!-- /.col -->
            </div><!-- /.row -->

        </div><!-- /.container -->
    </section>
@endsection