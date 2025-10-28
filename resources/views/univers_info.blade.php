@extends('layout.header')
@php
    $favoris = auth()->user()->favoris()->pluck('univers_id')->toArray();
@endphp
@section("content")
<div>
    <table class="table table-success ">
        <thead>
            <tr>
                <th>favoris </th>
                <th>{{__('name of the universe')}}</th>
                <th>{{__('universe logo')}}</th>
                <th>{{__('universe banner')}}</th>
                <th>{{__('main color of the universe')}}</th>
                <th>{{__('the secondary colour of the universe')}}</th>
                <th>{{__('actions')}}</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($liste as $Univers)
                <tr>
                    <td><img src="{{ asset('icon/' . 'favoris.png') }}" alt="" width="50" class="favori-img" data-id="{{ $Univers->id }}" </td>


                    <td>{{ $Univers->nom }}</td>
                    <td><img src="{{ asset('storage/' . $Univers->lien_vers_le_logo) }}" alt="" style="width:80px"></td>
                    <td><img src="{{ asset('storage/' . $Univers->lien_vers_l_image) }}" alt="" style="width:80px"></td>
                    <td style="background-color: {{ $Univers->couleur_principale }}">{{ $Univers->couleur_principale }}</td>
                    <td style="background-color: {{ $Univers->couleur_secondaire }}">{{ $Univers->couleur_secondaire }}</td>
                    <td>
                        @auth
                            <div class="dropdown">

                                <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    les actions
                                </a>
                                <ul class="dropdown-menu">
                                    @can('update_univer')
                                        <li>
                                            <a class="dropdown-item" href="{{ route('univers.edit', $Univers->id) }}">modifier</a>
                                        </li>
                                    @endcan
                                    <li>
                                    @can('delete_univer')
                                        <form action="{{ route('univers.supprimer', $Univers->id) }}" method="POST" onsubmit="return confirm('Supprimer cet univers ?')" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="dropdown-item text-danger">supprimer</button>
                                        </form>
                                    @endcan
                                    </li>
                                </ul>
                            </div>
                        @endauth
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Aucun univers trouvé</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    @auth
        @can('create_univer')
            <div class="mt-3 text-center">
                <a href="{{ route('Ajouter.form') }}" class="btn btn-success">Ajouter un univers</a>
            </div>
        @endcan
    @endauth
</div>
@endsection
<script>
document.querySelectorAll('.favori-img').forEach(img => {
    img.addEventListener('click', async () => {
        const universId = img.dataset.id;

        const response = await fetch('/favoris/toggle', {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ univers_id: universId })
        });

        const data = await response.json();

        if (data.status === 'added') {
            img.src = '{{ asset("icon/etoile.png") }}';
        } else {
            img.src = '{{ asset("icon/favoris.png") }}';
        }
    });
});
</script>
