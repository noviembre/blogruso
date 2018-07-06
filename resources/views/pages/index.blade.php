@extends('layout')

@section('content')

    <!--main content start-->
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">


                    @foreach($posts as $post)
                        <article class="post">
                            <div class="post-thumb">
                                <a href="#"><img src="{{$post->getImage()}}" alt=""></a>

                                <a href="#" class="post-thumb-overlay text-center">
                                    <div class="text-uppercase text-center">View Post</div>
                                </a>
                            </div>
                            <div class="post-content">


                                <header class="entry-header text-center text-uppercase">

                                    <h6><a href="#">{{$post->getCategoryTitle()}}</a></h6>


                                </header>


                                <div class="entry-content">

                                    {!! $post->description !!}

                                    <div class="btn-continue-reading text-center text-uppercase">
                                        <a href="#" class="more-link">
                                            Continue Reading
                                        </a>
                                    </div>
                                </div>


                                <div class="social-share">

                                    <span class="social-share-title pull-left text-capitalize">

                                        <a href="#">Author</a>
                                        On {{$post->getDate()}}
                                    </span>

                                    <ul class="text-center pull-right">
                                        <li><a class="s-facebook" href="#">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li><a class="s-twitter" href="#">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li><a class="s-google-plus" href="#">
                                                <i class="fa fa-google-plus"></i>
                                            </a>
                                        </li>
                                        <li><a class="s-linkedin" href="#">
                                                <i class="fa fa-linkedin"></i>
                                            </a>
                                        </li>
                                        <li><a class="s-instagram" href="#">
                                                <i class="fa fa-instagram"></i>
                                            </a>
                                        </li>
                                    </ul>

                                </div>
                            </div>
                        </article>
                    @endforeach



                    {{--

                    hay unos archivos que copie manualmente
                    no me pudo salir pero solo era copiar la carpeta pagination de
                    vendor/laravel/framewor/src/Illuminate/Pagination/resources/views/
                    a resources/views/vendor/Pagination
                     este era el codigo: php artisan vendor:publish --tag-laravel-pagination


                    --}}
                    {{$posts->links()}}


                </div>
                @include('pages._sidebar')
            </div>
        </div>
    </div>
    <!-- end main content-->
@endsection