<div>
    <form action="{{route('Ajouter.store')}}" method="POST" enctype="multipart/form-data">
         @csrf
        <label for="nom">Nom de L'univer :</label>
        <input type="text" name="nom" value="">
        <label for="description">Description de l'univer:</label>
        <input type="text" name="description" value="">
        <label for="img">l'image de l'univer</label>
        <input type="file" name="img" id="">
        <label for="img">l'image de fond de l'univer</label>
        <input type="file" name="ImgDeFond" id="">
        <label for="couleur_principale">couleur principale</label>
        <input type="color" name="couleur_principale" id="">
        <label for="couleur_secondaire">couleur secoudaire</label>
        <input type="color" name="couleur_secondaire" id="">
        <button type="submit">Créer le nouvel univer</button>
    </form>
</div>
