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
                        <h2 class="card-title"{{ $post->title }}></h2>
                        <p class="card-text">{{ $post->content }}</p>
                        <a href="#" class="btn btn-primary">Read More &rarr;</a>
                    </div>
                    <div class="card-footer text-muted">
                        Posted on {{ $post->created_at }},
                        <br>
                        by <a href="#">{{ $post->getUser->name }}</a>
                        <br>
                        Categories : {{ $post->getCategorie->categorie }}
                    </div>
                </div>
                @endforeach


                <!-- Pagination -->
                <ul class="pagination justify-content-center mb-4">
                    {{-- $posts->links() --}}
                </ul>

            </div>

            <!-- Sidebar Widgets Column -->
            <div class="col-md-4">
                <!-- Search Widget -->
                <div class="card mb-4">
                    <h5 class="card-header">Search</h5>
                    <div class="card-body">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                  <button class="btn btn-secondary" type="button">Go!</button>
                </span>
                        </div>
                    </div>
                </div>

                @if(Auth::check())
                    <!-- Side Widget -->
                    <div class="card my-4">
                        <h5 class="card-header">Action</h5>
                        <div class="card-body">
                            You can put anything you want inside of these side widgets. They are easy to use, and feature the new Bootstrap 4 card containers!
                        </div>
                    </div>
                @endif


                <!-- Categories Widget -->
                <div class="card my-4">
                    <h5 class="card-header">Categories</h5>
                    <div class="card-body">
                        <div class="row">
                            @foreach($categories as $category)
                            <div class="col-lg-6">
                                <ul class="list-unstyled mb-0">
                                    <li>
                                        <a href="#">{{ $category->categorie }}</a>
                                    </li>
                                </ul>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
@stop