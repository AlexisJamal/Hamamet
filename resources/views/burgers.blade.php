@extends('layouts.app')

@section('content')
<title>Burgers</title>
<table class="table table-bordered table-stripped">
    <thead class="thead-dark">
    <th>Nom</th>
    <th>Image</th>
    <th>Prix</th>
    <th>Composition</th>
    <th>Commander</th>
    </thead>
    @foreach ($lesBurgers as $burger)
        <tr>
            <td>{{{ $burger->getNom() }}}</td>
            <td><img src="{{{ $burger->getImage() }}}" alt="{{{ $burger->getNom() }}}" /></td>
            <td>{{{ $burger->getPrix() }}}€</td>
            <td>{{{ $burger->getComposition() }}}</td>
            @auth
                <td><a class="btn btn-primary" href="{{ url('panier/' . $burger->getId()) }}">Ajouter au panier</a></td>
            @else
                <td><a class="btn btn-primary" href="{{ route('login') }}">Ajouter au panier</a></td>
            @endauth
        </tr>
    @endforeach
</table>
@endsection