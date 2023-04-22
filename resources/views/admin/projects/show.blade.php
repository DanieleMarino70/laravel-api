@extends('layouts.app')


@section('content')
    <div class="container">
        <div class="text-center mt-5">
            <img src="{{ $project->cover_image ?  asset('storage/' . $project->cover_image) : 'https://upload.wikimedia.org/wikipedia/commons/thumb/3/3f/Placeholder_view_vector.svg/681px-Placeholder_view_vector.svg.png'}}"  alt="..." width="500">
        </div>
        <div class="card mt-5">
            <div class="card-header">
                <h5>Progetto di {{$project->author}}</h5>
            </div>
            <div class="card-body">

                <h5 class="card-title">{{$project->title}}</h5>
                <p class="card-text">{{$project->description}}</p>
                <a href="{{route('projects.index')}}" class="btn btn-primary">Ritorna indietro</a>
            </div>
        </div>
@endsection


