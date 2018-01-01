@extends('app')

@section('content')
    <div class="container">

        <div class="row">
            <h1 class="my-4 ml-3">Categorie : {{ $categorie->categorie }}
            </h1>
        </div>
        <div class="row">
            <!-- Blog Entries Column -->

            <div class="col-md-8">
                <!-- Blog Post -->
                @if($categorie->getPost->isNotEmpty())
                    @foreach($categorie->getPost as $post)
                        @if($post->is_confirm > 0)
                        <div class="card mb-4">
                            <img class="card-img-top" src="http://placehold.it/{{ $post->url_img }}" alt="Card image cap">
                            <div class="card-body">
                                <h2 class="card-title">{{ $post->title }}</h2>
                                <p class="card-text">{{ $post->content }}</p>
                                <a href="{{ action('App\StaticsController@showPost', $slug = $post->slug) }}" class="btn btn-primary">Read More &rarr;</a>
                            </div>
                            <div class="card-footer text-muted">
                                Posted on {{ $post->created_at }},
                                <br>
                                by <a href="#">{{ $post->getUser->name }}</a>
                                <br>
                                Categories : <a href="{{ action('App\StaticsController@showPostByCategorie', $slug = $categorie->slug) }}">{{ $categorie->categorie }}</a>
                                <br>
                                Votes : <span class="rounded badge badge-success p-2">{{ $post->vote }}</span>
                            </div>
                        </div>
                        @endif
                    @endforeach
                @else
                    Pas D'article associé a cette categorie !
                @endif
            <!-- Pagination -->

            </div>

            <!-- Sidebar Widgets Column -->
            @include('app.partials.widget')

        </div>
        <!-- /.row -->

    </div>
@stop