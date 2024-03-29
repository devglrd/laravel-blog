@extends('app')

@section('content')
    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <h1 class="my-4 ml-3">Lasted Posts
            </h1>
        </div>
        <div class="row">
            <!-- Blog Entries Column -->

            <div class="col-md-8">
                <!-- Blog Post -->
                @foreach($posts as $post)
                <div class="card mb-4">
                    <img class="card-img-top" src="http://placehold.it/{{ $post->url_img }}" alt="Card image cap">
                    <div class="card-body">
                        <h2 class="card-title">{{ $post->title }}</h2>
                        <p class="card-text">{{ $post->content }}</p>
                        <a href="{{ action('App\StaticsController@showPost', $slug = $post->slug) }}" data-id="{{$post->id}}" id="showPost" class="btn btn-primary">Read More &rarr;</a>
                    </div>
                    <div class="card-footer text-muted">
                        Posted on {{ $post->created_at }},
                        <br>
                        by <a href="{{ action('App\StaticsController@showAccount', $name = $post->getUser->name) }}">{{ $post->getUser->name }}</a>
                        <br>
                        Categories : <a href="{{ action('App\StaticsController@showPostByCategorie', $slug = $post->getCategorie->slug) }}">{{ $post->getCategorie->categorie }}</a>
                        <br>
                        Votes : <span class="rounded badge badge-success p-2">{{ $post->vote }}</span>
                    </div>
                </div>
                @endforeach


                <!-- Pagination -->
                <ul class="pagination justify-content-center mb-4">
                    {{ $posts->links() }}
                </ul>

            </div>

            <!-- Sidebar Widgets Column -->
            @include('app.partials.widget')

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
@stop