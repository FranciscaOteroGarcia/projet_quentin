@extends('layout')
@section('content')

<h2>Liste de Magasins</h2>
@foreach ($magasin as $mag)
<h4>{{$mag->label}}</h4>
<a href='/cor/magasin/{{$mag->id}}/edit'>Editer</a>
<form action="/cor/magasin/{{ $mag->id }}" method="POST">
    @csrf
   @method('DELETE')
   <button type="submit" class="btn btn-danger">Effacer magasin</button>
</form>

@endforeach

<h2>Ajouter un Magasin</h2>
<form method='POST' action="/cor/magasin"> {{-- l'action c'est l'url de l'index --}}
@csrf
    <label>Libelle :</label><br>
    <input type="text" id="label" name="label"><br><br>

    <input type="submit" value="ajouter">
  </form>





@endsection
