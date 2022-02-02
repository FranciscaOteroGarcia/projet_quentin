@extends('layout')
@section('content')

<h2>Liste de Voitures</h2>

    @foreach ($allVoitures as $voiture )
        @php
        $marque = App\Models\Marque::find($voiture->id_marque);
        $magasin = App\Models\Magasin::find($voiture->id_magasin);
        @endphp
        <h4>{{$voiture->label}}</h4>
        <h6>{{$marque->label}}</h6>
        <h6>{{$magasin->label}}</h6>

        @method('PUT')
        <a href="/cor/voiture/{{$voiture->id}}/edit">Editer</a>
        <br><br>

        <form action="/cor/voiture/{{ $voiture->id }}" method="POST">
            @csrf
           @method('DELETE')
           <button type="submit" class="btn btn-danger">Effacer voiture</button>
        </form>

    @endforeach


    <h4>Ajouter une Voiture</h4>
    <form method="POST" action="/cor/voiture/"> {{-- l'action c'est l'url de l'index --}}
       @csrf
        <label>Libellé voiture:</label>
        <input type="text" id="label" name="label" ><br>

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
        <input type="submit" value="Ajouter">
      </form>
@endsection
