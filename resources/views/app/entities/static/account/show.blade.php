@extends('app')

@section('content')
    <!-- Page Content -->
    <div class="container">

        <div class="row">
            <h1 class="my-4 ml-3">{{ $user->name }}
            @if($user->getRole->id === 1)
                <span style="font-size: 16px" class="badge text-white bg-primary">En attente de confirmation</span>
            @endif
            </h1>
        </div>
        <div class="row">
            <!-- Blog Entries Column -->

            <div class="col-md-8">
                <!-- Blog Post -->


            <!-- Pagination -->
            </div>
            <div class="col-md-4">

            </div>

            <!-- Sidebar Widgets Column -->

        </div>
        <!-- /.row -->

    </div>
    <!-- /.container -->
@stop