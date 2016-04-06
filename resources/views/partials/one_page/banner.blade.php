<div style="background:url(/images/top-bg.jpg) left top repeat-x; padding-bottom: 20px; ">
    <div class="container" >
        <div class="col-md-4" style="background-color: white; padding: 20px; height:315px; border-radius: 5px">
            <div class="editorial-wrapper">
                @if(!is_null($blogPost))
                    <div class="btn btn-danger text-center">
                        <a href="{{ action('BlogController@index') }}"  style="color:white">Editorial</a>
                    </div>
                    <div class="pTop10" style="font-size: 18px">
                        <a href="{{ action('BlogController@show',$blogPost->id) }}" >
                            {{ str_limit($blogPost->title,300) }}
                        </a>
                    </div>
                @endif

            </div>
        </div>
        <div class="col-md-8">
            <div id="owl-main" class="owl-carousel height-md owl-inner-nav owl-ui-lg" >

                <div class="item img-responsive img-banner" style="background-image: url(/images/slider/img1_1.jpg);">
                    <div class="container">
                        <div class="caption vertical-top text-right">
                            <h1 class="fadeInRight-1 dark-bg light-color"></h1>
                        </div>
                    </div>
                </div>

                <div class="item img-responsive" style="background-image: url(/images/slider/img1_2.jpg);">
                    <div class="container">
                        <div class="caption vertical-top text-left">
                            <h1 class="fadeInLeft-1 dark-bg light-color"></h1>
                        </div>
                    </div>
                </div>

                <div class="item img-responsive" style="background-image: url(/images/slider/img1_3.jpg);">
                    <div class="container">
                        <div class="caption vertical-top  text-center">
                            <h1 class="fadeInRight-1 dark-bg light-color">
                            </h1>
                        </div>
                    </div>
                </div>

                <div class="item img-responsive" style="background-image: url(/images/slider/img1_4.jpg);">
                    <div class="container">
                        <div class="caption vertical-top text-center">
                            <h1 class="fadeIn-1 dark-bg light-color"></h1>
                        </div>
                    </div>
                </div>

                <div class="item img-responsive" style="background-image: url(/images/slider/img1_5.jpg);">
                    <div class="container">
                        <div class="caption vertical-top text-center">
                            <h1 class="fadeIn-1 dark-bg light-color"></h1>
                        </div>
                    </div>
                </div>

                <div class="item img-responsive" style="background-image: url(/images/slider/img1_6.jpg);">
                    <div class="container">
                        <div class="caption vertical-top text-center">
                            <h1 class="fadeIn-1 dark-bg light-color"></h1>
                        </div>
                    </div>
                </div>

                <div class="item img-responsive" style="background-image: url(/images/slider/img1_7.jpg);">
                    <div class="container">
                        <div class="caption vertical-top text-center">
                            <h1 class="fadeIn-1 dark-bg light-color"></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>