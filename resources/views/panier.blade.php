@extends('layouts.app')

@section('content')
    <title>Panier</title>

    <table class="table table-bordered table-stripped">
        <thead class="thead-dark">
        <th width="20%">Mon produit</th>
        <th>Photo</th>
        <th>Compo</th>
        <th>Prix</th>
        <th>Supprimer</th>
        </thead>



            @foreach ($lesCommandes as $commande)
                @foreach ($commande as $commandes)
                    <tr>
                        <td>{{{ $commandes->getNom() }}}</td>
                        <td><img src="{{{ $commandes->getImage() }}}"></td>
                        <td>{{{ $commandes->getComposition() }}}</td>
                        <td>{{{ $commandes->getPrix() }}}</td>
                        <td><a class="btn btn-danger" href="{{ url('supprimer/' . $commandes->getId()) }}">Supprimer</a></td>
                    </tr>
                @endforeach
            @endforeach





    </table>

@endsection