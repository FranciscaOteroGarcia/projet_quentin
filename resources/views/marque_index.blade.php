@extends('layout')
@section('content')

@foreach ($marque as $mar)
<h2>{{$mar->label}}</h2>

<a href='/cor/marque/{{$mar->id}}/edit'>Editer</a>
<form action="/cor/marque/{{ $mar->id }}" method="POST">
    @csrf
   @method('DELETE')
   <button type="submit" class="btn btn-danger">Effacer marque</button>
</form>

@endforeach

<form method='POST' action="/cor/marque"> {{-- l'action c'est l'url de l'index --}}
    @csrf
    <label>Marque:</label><br>
    <input type="text" id="label" name="label"><br>

    <input type="submit" value="Ajouter">
  </form>

@endsection
