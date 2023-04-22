@extends('layouts.app')


@section('content')
    <div class="container">
        
        <div class="card mt-5">
            <div class="card-body">
                <p class="card-text badge" style="background-color:{{$type->color}} ">{{$type->label}}</p>
                <p>COLORE HEX: {{$type->color}}</p>
                <hr>
                <a href="{{route('types.index')}}" class="btn btn-primary">Ritorna indietro</a>
            </div>
        </div>
@endsection


