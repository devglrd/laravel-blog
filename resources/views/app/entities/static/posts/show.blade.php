@extends('app')

@section('content')
    <div class="container">

        <div class="row">
            <h1 class="my-4 ml-3">{{ $post->title }}
                @if($post->is_confirm === 0)
                    <span style="font-size: 16px" class="badge text-danger bg-light">En attente de confirmation</span>
                @endif
            </h1>

        </div>
        <div class="row">
            <!-- Blog Entries Column -->

            <div class="col-md-8">
                <!-- Blog Post -->
                    <div class="card mb-4">
                        <img class="card-img-top" src="http://placehold.it/{{ $post->url_img }}" alt="Card image cap">
                        <div class="card-body">
                            <p class="card-text">{{ $post->content }}</p>
                        </div>
                        <div class="card-footer text-muted">
                            Posted on {{ $post->created_at }},
                            <br>
                            by <a href="#">{{ $post->getUser->name }}</a>
                            <br>
                            Categories : {{ $post->getCategorie->categorie }}
                        </div>
                    </div>
            </div>

            <!-- Sidebar Widgets Column -->
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body d-flex flex-column">
                        <div class="d-flex">
                            <span class="pr-2">By : </span><a href="#" class="card-text">{{ $post->getUser->name }}</a>
                        </div>
                        <div class="d-flex ">
                            <span class="pr-2">Categories : </span> <a href="#" class="card-text">{{ $post->getCategorie->categorie }}</a>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        Posted on {{ $post->created_at }},
                    </div>
                </div>
                <div class="card mb-4">
                    <div class="card-body d-flex">
                        <span>Voter pour cette article </span><span class="ml-3 px-2 py-0 rounded badge-success">{{ $post->vote }}</span>
                    </div>
                    @if(Auth::check())
                        @if(Auth::user()->id === $post->fk_user)
                            <div class="card-footer text-muted">
                                <span>Vous ne pouvez pas voter pour votre propre article !</span>
                            </div>
                        @else
                            <div class="card-footer text-muted">
                                <a href="{{ action('App\StaticsController@vote', $slug = $post->slug) }}" class="btn btn-success">Votez !</a>
                            </div>
                        @endif
                    @else
                        Vous devez etre connecté pour vote !
                    @endif
                </div>
            </div>
        </div>
        <!-- /.row -->

    </div>
@stop