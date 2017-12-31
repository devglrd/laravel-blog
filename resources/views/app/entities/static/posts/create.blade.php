@extends('app')

@section('content')
    <div class="container">

        <div class="row">
            <h1 class="my-4 ml-3">Created Posts
            </h1>
        </div>
        <div class="row">
            <!-- Blog Entries Column -->
            <div class="col-md-8">
                <!-- Blog Post -->
                    <form method="POST" action="{{ action('App\StaticsController@postPost') }}" enctype="multipart/form-data">
                    <div class="card mb-4">
                        <div class="card-body">
                            {{ csrf_field() }}
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Titre</label>
                                    <input type="text" name="title" class="form-control" id="inputEmail4" placeholder="titre">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Categories</label>
                                    <select class="form-control js-example-basic-single" name="categorie[]">
                                        @foreach($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->categorie }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputAddress">Contenue</label>
                                <textarea class="form-control" name="content" rows="3"></textarea>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputCity">Image</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="file" id="customFile">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-muted">
                            <button class="btn btn-success">
                                Ajouter le post
                            </button>
                            <button class="btn btn-secondary">
                                Placer comme brouillon
                            </button>
                        </div>
                    </div>
                    </form>
                <!-- Pagination -->
                <ul class="pagination justify-content-center mb-4">
                </ul>

            </div>
            @include('app.partials.widget');
    </div>
@stop