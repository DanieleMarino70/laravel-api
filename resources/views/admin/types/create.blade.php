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

        <form action="{{ route('types.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="label" class="form-label">Nome Tipo</label>
                <input type="text" class="form-control" id="label" name="label" placeholder="Come si chiama il tipo?" value="{{old('label')}}">
            </div>

             <div class="mb-3">
                <label for="color" class="form-label">Nome Tipo</label>
                <input type="text" class="form-control" id="color" name="color" placeholder="Colore Esadecimale es #ffffff" value="{{old('color')}}">
            </div>

           

            <button class="btn btn-secondary">Aggiungi</button>
        </form>


           
    </div>
    
@endsection