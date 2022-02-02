@extends('layout')
@section('content')

Marque à éditer : {{$marque->label}}


<form method='POST' action="/cor/marque/{{$marque->id}}"> {{-- l'action c'est l'url de l'index --}}
    @csrf
    <label>Nouveau libellé de Marque:</label><br>
    <input type="text" id="label" name="label"><br>
    
    @method('PUT')
    <input type="submit" value="Modifier">
  </form>


@endsection
