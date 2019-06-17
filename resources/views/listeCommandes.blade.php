@extends('layouts.app')

@section('content')
    <title>Liste des commandes</title>
    <table class="table table-bordered table-stripped">
        <thead class="thead-dark">
        <th>ID</th>
        <th>ID du User</th>
        <th>ID du produit</th>
        </thead>
        @foreach ($lesCommandes as $commande)
            <tr>
                <td>{{{ $commande->getIdCommande() }}}</td>
                <td>{{{ $commande->getIdUser() }}}</td>
                <td>{{{ $commande->getProduitId() }}}</td>
            </tr>
        @endforeach
    </table>
@endsection