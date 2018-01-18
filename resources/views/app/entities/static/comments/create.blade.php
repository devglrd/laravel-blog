@extends('app')

@section('content')
    <div class="container">

        <div class="row">
            <h1 class="my-4 ml-3">Update Comments
            </h1>
        </div>
        <div class="row">
            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <!-- Blog Post -->
                <form method="POST" action="{{ action('App\StaticsController@postUpdateComment', $id = $comment->id) }}" enctype="multipart/form-data">
                    <div class="card mb-4">
                        <div class="card-body">
                            {{ csrf_field() }}
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Comment</label>
                                    <textarea name="comment" id="" class="form-control">{{ $comment->content }}</textarea>
                                </div>
                        </div>
                    </div>
                    <div class="card-footer text-muted">
                        <button class="btn btn-success" type="submit">
                            Modifié le commentaire
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@stop