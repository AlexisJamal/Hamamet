@extends('layouts.app')

@section('content')
<title>Tacos</title>
<table class="table table-bordered table-stripped">
    <thead class="thead-dark">
    <th>Nom</th>
    <th>Image</th>
    <th>Prix</th>
    <th>Composition</th>
    <th>Commander</th>
    </thead>
    @foreach ($lesViandes as $viande)
        <tr>
            <td>{{{ $viande->getNom() }}}</td>
            <td><img src="{{{ $viande->getImage() }}}" alt="{{{ $viande->getNom() }}}" /></td>
            <td>{{{ $viande->getPrix() }}}€</td>
            <td>{{{ $viande->getComposition() }}}</td>
            @auth
                <td><a class="btn btn-primary" href="{{ url('panier/' . $viande->getId()) }}">Ajouter au panier</a></td>
            @else
                <td><a class="btn btn-primary" href="{{ route('login') }}">Ajouter au panier</a></td>
            @endauth
        </tr>
    @endforeach


</table>

<p>Les sauces disponibles sont :
    @foreach ($lesSauces as $sauce)
        {{{$sauce->getNomSauce()}}},
    @endforeach
</p>
@endsection