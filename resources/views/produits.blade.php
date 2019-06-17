<table class="table table-bordered table-stripped">
    <thead>
    <th>Produit</th>
    <th>Image</th>
    <th>Composition</th>
    <th>Prix</th>
    <th>Supprimer</th>
    </thead>
    @foreach ($lesProduits as $produit)
        <tr>
            <td>{{{ $produit->getNom() }}}</td>
            <img src="{{{ $produit->getImage() }}}" alt="{{{ $produit->getNom() }}}">
            <td>{{{ $produit->getComposition() }}}</td>
            <td>{{{ $produit->getPrix() }}}</td>

        </tr>
    @endforeach
</table>
