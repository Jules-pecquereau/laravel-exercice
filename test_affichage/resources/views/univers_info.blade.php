@extends('layout.header')

@section("content")
<div>
    <table class="table table-success table-striped">
        <thead>
            <tr>
                <th>nom et prénom</th>
                <th>logo de l'univers</th>
                <th>la bannière de l'univers</th>
                <th>la couleur principale de l'univers</th>
                <th>la couleur secondaire de l'univers</th>
                <th>action</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($liste as $Univers)
                <tr>
                    <td>{{ $Univers->nom }}</td>
                    <td><img src="{{ asset('storage/' . $Univers->lien_vers_le_logo) }}" alt=""></td>
                    <td><img src="{{ asset('storage/' . $Univers->lien_vers_l_image) }}" alt=""></td>
                    <td style="background-color: {{ $Univers->couleur_principale }}">{{ $Univers->couleur_principale }}</td>
                    <td style="background-color: {{ $Univers->couleur_secondaire }}">{{ $Univers->couleur_secondaire }}</td>
                    <td>
                        <div class="dropdown">
                            <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                les actions
                            </a>
                            <ul class="dropdown-menu">
                                <li>
                                    <a class="dropdown-item" href="#">modifier</a>
                                </li>
                                <li>
                                    <form action="{{ route('univers.supprimer', $Univers->id) }}" method="POST" onsubmit="return confirm('Supprimer cet univers ?')" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item text-danger">supprimer</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Aucun univers trouvé</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
