@extends('layout')
@section('content')

<h2>Modifier une Voiture</h2>
<h4>ancien voiture </h4>
<h4>Libellé : {{$voiture->label}}</h4>
<h4>Marque : {{$marque}}</h4>
<h4>Magasin : {{$magasin}}</h4>


<form method='POST' action="/cor/voiture/{{$voiture->id}}">
@csrf
        <label>Libelle :</label><br>
        <input type="text" id="label" name="label"><br><br>

        <label>Libellé marque:</label>
        <select name="marque" id="marque">
            @foreach ($allMarques as $uneMarque)
                <option value={{$uneMarque->id}}>{{$uneMarque->label}}</option>
            @endforeach
        </select>
        <br>
        <label>Libellé magasin:</label>
        <select name="magasin" id="magasin">
            @foreach ($allMagasins as $unMagasin)
                <option value={{$unMagasin->id}}>{{$unMagasin->label}}</option>
            @endforeach
        </select>
        <br><br>
@method('PUT')
        <input type="submit" value="modifier">
      </form>




@endsection
