@extends('layouts.app')

@section('content')
<div class="container pt-5">
        <h2>Projects</h2>
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-end">
                    <a href="{{route('projects.create')}}" class="btn btn-secondary mb-3">Aggiungi Progetto</a>
                </div>
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">TIPO</th>
                        <th scope="col">TECNOLOGIA</th>
                        <th scope="col">TITOLO</th>
                        <th scope="col">DESCRIZIONE</th>
                        <th scope="col">AUTORE</th>
                        <th scope="col">AZIONI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($projects as $project)
                        <tr>
                            <th scope="row">{{ $project->id}}</th>
                            <td>{{ $project->type?->label}}</td>
                            <td>@forelse($project->technologies as $technology) {{ $technology->label}} @unless ($loop->last), @endunless @empty - @endforelse</td>
                            <td>{{ $project->title}}</td>
                            <td>{{ $project->getAbstract()}}</td>
                            <td>{{ $project->author}}</td>
                            <td>
                                <div class="d-flex flex-column">
                                    <a href="{{route('projects.show', $project)}}"><i class="bi bi-eye ps-1 pe-1"></i></a>
                                    <a href="{{ route('projects.edit', $project) }}"><i class="bi bi-pen text-warning ps-1 pe-1"></i></a>
                                    <a type="button"  data-bs-toggle="modal" data-bs-target="#project-card-modal-{{$project->id}}"><i class="bi bi-trash text-danger"></i></a>
                                </div>
                            </td>
                        </tr>
                        @include('partials._deletemodal')
                        @empty
                        <h2>Non ci sono Progetti</h2>
                        @endforelse
                    </tbody>
                </table>
                {{$projects->links('pagination::bootstrap-5')}}
            </div>
        </div>
    </div>
@endsection