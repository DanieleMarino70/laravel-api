@extends('layouts.app')



@section('content')
    <div class="container mt-5">
        @if($errors->any())
        <div class="alert alert-danger" role="alert">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('projects.update', $project) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Titolo" value="{{$project->title}}">
            </div>

            
            <div class="mb-3">
                <label for="author" class="form-label">Autore</label>
                <input type="text" class="form-control" id="author" name="author" placeholder="Nome Autore" value="{{$project->author}}">
            </div>

            <div class="mb-3">
                <label for="type">Tipo</label>
                <select id="type" name="type" class="form-select">
                    <option value="">Nessun Tipo</option>
                    @foreach ($types as $type)
                    <option value="{{$type->id}}" @if ($project->type?->id == $type->id ) selected @endif>{{$type->label}}</option>
                    @endforeach
                </select>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <label for="technology_id">Technologies:</label>
                        @foreach ($technologies as $technology)
                        <div class="col">
                           <label for="technology-{{$technology->id}} ">{{$technology->label}}</label> <input type="checkbox" id="technology-{{$technology->id}}" value="{{$technology->id}}" class="form-check-control" name="technologies[]" @if(in_array($technology->id, $project_technologies)) checked @endif>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="mb-3">
                <label for="album" class="form-label">Descrizione</label>
                <textarea type="text" class="form-control" id="description" name="description" placeholder="Descrizione">{{$project->description}}</textarea>
            </div>

            <button class="btn btn-secondary">Salva Modifica</button>
        </form>


           
    </div>
    
@endsection