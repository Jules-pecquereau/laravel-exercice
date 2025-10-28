@extends('layout.header')
<div>
<form
    action="{{ isset($univers) ? route('univers.update', $univers->id) : route('Ajouter.store') }}"
    method="POST"
    enctype="multipart/form-data"
    class="container mt-4 p-4 shadow rounded bg-light"
    style="max-width: 700px;"
>
    @csrf
    @if(isset($univers))
        @method('PUT')
    @endif

    <h3 class="text-center mb-4">
        {{ isset($univers) ? 'Modifier un Univers' : 'Créer un Univers' }}
    </h3>

    {{-- Nom --}}
    <div class="mb-3">
        <label for="nom" class="form-label fw-bold">Nom :</label>
        <input type="text" name="nom" id="nom" class="form-control"
               value="{{ old('nom', $univers->nom ?? '') }}" placeholder="Entrez le nom de l'univers" required>
    </div>

    {{-- Description --}}
    <div class="mb-3">
        <label for="description" class="form-label fw-bold">Description :</label>
        <textarea name="description" id="description" class="form-control" rows="4"
                  placeholder="Décrivez l'univers..." required>{{ old('description', $univers->description ?? '') }}</textarea>
    </div>

    {{-- Logo --}}
    <div class="mb-3">
        <label for="img" class="form-label fw-bold">Logo :</label>
        <input type="file" name="img" id="img" class="form-control">
        @if(isset($univers) && $univers->lien_vers_le_logo)
            <div class="mt-2">
                <img src="{{ asset('storage/' . $univers->lien_vers_le_logo) }}" alt="Logo actuel" width="100" class="rounded border">
                <p class="small text-muted mt-1">Logo actuel</p>
            </div>
        @endif
    </div>

    {{-- Image de fond --}}
    <div class="mb-3">
        <label for="ImgDeFond" class="form-label fw-bold">Image de fond :</label>
        <input type="file" name="ImgDeFond" id="ImgDeFond" class="form-control">
        @if(isset($univers) && $univers->lien_vers_l_image)
            <div class="mt-2">
                <img src="{{ asset('storage/' . $univers->lien_vers_l_image) }}" alt="Image actuelle" width="100" class="rounded border">
                <p class="small text-muted mt-1">Image actuelle</p>
            </div>
        @endif
    </div>

    {{-- Couleurs --}}
    <div class="row mb-3">
        <div class="col-md-6">
            <label for="couleur_principale" class="form-label fw-bold">Couleur principale :</label>
            <input type="color" name="couleur_principale" id="couleur_principale" class="form-control form-control-color"
                   value="{{ old('couleur_principale', $univers->couleur_principale ?? '#000000') }}" required>
        </div>
        <div class="col-md-6">
            <label for="couleur_secondaire" class="form-label fw-bold">Couleur secondaire :</label>
            <input type="color" name="couleur_secondaire" id="couleur_secondaire" class="form-control form-control-color"
                   value="{{ old('couleur_secondaire', $univers->couleur_secondaire ?? '#ffffff') }}" required>
        </div>
    </div>

    {{-- Bouton --}}
    <div class="text-center">
        <button type="submit" class="btn btn-primary px-5">
            {{ isset($univers) ? 'Mettre à jour' : 'Créer' }}
        </button>
    </div>
</form>


</div>
