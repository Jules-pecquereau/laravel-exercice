
<div>
    <form action="{{route('Ajouter.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <x-inputs.input-text property="nom" label="Nom de l'univers" />
        <x-inputs.input-text property="description" label="Description de l'univer:" />
        <x-inputs.input-img nom="img" libelle="l'image de l'univer" />
        <x-inputs.input-img nom="ImgDeFond" libelle="l'image de fond de l'univer" />
        <label for="couleur_principale">couleur principale</label>
        <input type="color" name="couleur_principale" id="">
        <label for="couleur_secondaire">couleur secoudaire</label>
        <input type="color" name="couleur_secondaire" id="">
        <button type="submit">Créer le nouvel univer</button>
    </form>
</div>
