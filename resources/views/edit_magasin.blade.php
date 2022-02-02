@extends('layout')
@section('content')

<h2>Modifier un Magasin</h2>
<h4>ancien libelle : {{$magasin->label}}</h4>

<form method='POST' action="/cor/magasin/{{$magasin->id}}">
    @csrf
        <label>Libelle :</label><br>
        <input type="text" id="label" name="label"><br><br>
@method('PUT')
        <input type="submit" value="modifier">
      </form>

@endsection
