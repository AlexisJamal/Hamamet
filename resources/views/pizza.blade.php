@extends('layouts.app')

@section('content')
<title>Pizzas</title>
<table class="table table-bordered table-stripped">
    <thead class="thead-dark">
    <th>Nom</th>
    <th>Image</th>
    <th>Prix</th>
    <th>Composition</th>
    <th>Commander</th>
    </thead>
    @foreach ($lesPizzas as $pizza)
        <tr>
            <td>{{{ $pizza->getNom() }}}</td>
            <td><img src="{{{ $pizza->getImage() }}}" alt="{{{ $pizza->getNom() }}}" /></td>
            <td>{{{ $pizza->getPrix() }}}€</td>
            <td>{{{ $pizza->getComposition() }}}</td>
            @auth
                <td><a class="btn btn-primary" href="{{ url('panier/' . $pizza->getId()) }}">Ajouter au panier</a></td>
            @else
                <td><a class="btn btn-primary" href="{{ route('login') }}">Ajouter au panier</a></td>
            @endauth
        </tr>
    @endforeach
</table>
@endsection