@extends('layouts.app')

@section('content')
<div class="container pt-5">
        <h2>Types</h2>
        <div class="row">
            <div class="col-12">
                <div class="d-flex justify-content-end">
                    <a href="{{route('types.create')}}" class="btn btn-secondary mb-3">Aggiungi Tipo</a>
                </div>
                <table class="table table-dark table-striped">
                    <thead>
                        <tr>
                        <th scope="col">ID</th>
                        <th scope="col">NOME</th>
                        <th scope="col">COLORE</th>
                        <th scope="col">AZIONI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($types as $type)
                        <tr>
                            <th scope="row">{{ $type->id}}</th>
                            <td>{{ $type->label}}</td>
                            <td>{{ $type->color}}</td>
                            <td>
                                <div class="d-flex flex-column">
                                    <a href="{{route('types.show', $type)}}"><i class="bi bi-eye ps-1 pe-1"></i></a>
                                    <a href="{{ route('types.edit', $type) }}"><i class="bi bi-pen text-warning ps-1 pe-1"></i></a>
                                    <a type="button"  data-bs-toggle="modal" data-bs-target="#type-card-modal-{{$type->id}}"><i class="bi bi-trash text-danger"></i></a>
                                </div>
                            </td>
                        </tr>
                        @include('partials._deletemodal_types')
                        @empty
                        <h2>Non ci sono Progetti</h2>
                        @endforelse
                    </tbody>
                </table>
                {{$types->links('pagination::bootstrap-5')}}
            </div>
        </div>
    </div>
@endsection