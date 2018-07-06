@extends('layout')

@section('content')
    <!--main content start-->
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">



                    <article class="post">
                        <div class="post-thumb">
                            <a href="blog.html"><img src="{{ $post->getImage() }}" alt=""></a>
                        </div>
                        <div class="post-content">
                            <header class="entry-header text-center text-uppercase">
                                <h6><a href="#">{{ $post->getCategoryTitle() }}</a></h6>

                                <h1 class="entry-title"><a href="blog.html">{{ $post->title }}</a></h1>


                            </header>
                            <div class="entry-content">


                                {!! $post->contenido !!}


                            </div>
                            <div class="decoration">
                                @foreach($post->tags as $tag)
                                    <a href="{{route('tag.show', $tag->slug)}}" class="btn btn-default">
                                        {{$tag->title}}
                                    </a>
                                @endforeach
                            </div>

                            <div class="social-share">
							<span
                                    class="social-share-title pull-left text-capitalize">
                            {{ $post->getDate() }}
                            </span>
                                <ul class="text-center pull-right">
                                    <li><a class="s-facebook" href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a class="s-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a class="s-google-plus" href="#"><i class="fa fa-google-plus"></i></a></li>
                                    <li><a class="s-linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
                                    <li><a class="s-instagram" href="#"><i class="fa fa-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </article>





                    <div class="top-comment"><!--top comment-->
                        <img src="/images/comment.jpg" class="pull-left img-circle" alt="">
                        <h4>Rubel Miah</h4>

                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy hello ro mod tempor
                            invidunt ut labore et dolore magna aliquyam erat.</p>
                    </div><!--top comment end-->


                    <div class="row"><!--blog next previous-->
                        <div class="col-md-6">
                            <div class="single-blog-box">
                                <a href="#">
                                    <img src="/images/blog-next.jpg" alt="">

                                    <div class="overlay">

                                        <div class="promo-text">
                                            <p><i class=" pull-left fa fa-angle-left"></i></p>
                                            <h5>Rubel is doing Cherry theme</h5>
                                        </div>
                                    </div>


                                </a>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="single-blog-box">
                                <a href="#">
                                    <img src="/images/blog-next.jpg" alt="">

                                    <div class="overlay">
                                        <div class="promo-text">
                                            <p><i class=" pull-right fa fa-angle-right"></i></p>
                                            <h5>Rubel is doing Cherry theme</h5>

                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div><!--blog next previous end-->

                </div>



            </div>
        </div>
    </div>
    <!-- end main content-->
@endsection