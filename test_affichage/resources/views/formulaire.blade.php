<div>
    <form action="{{route('Ajouter.store')}}" method="POST">
         @csrf
        <label for="nom">Nom de L'univer :</label>
        <input type="text" name="nom" value="">
        <label for="description">Description de l'univer:</label>
        <input type="text" name="description" value="">
        <label for="img">l'image de l'univer</label>
        <input type="file" name="img" id="">
        <label for="img">l'image de fond de l'univer</label>
        <input type="file" name="ImgDeFond" id="">
        <button type="submit">Créer le nouvel univer</button>
    </form>
</div>
