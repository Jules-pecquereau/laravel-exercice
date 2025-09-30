@extends('layout.header')
@section("content")
<div>
    <table class="table table-success table-striped">
        <th>nom et prénom</th>
        <th>logo de l'univers</th>
        <th>la bannière de l'univers</th>
        <th>la couleur principale de l'univers</th>
        <th>la couleur secondaire de l'univers</th>
        <th>action</th>
        @forelse ( $liste as $Univers )
            <tr><td >{{$Univers->nom}}</td>
                <td><img src="{{asset('storage/'.$Univers->lien_vers_le_logo)}}" alt=""></td>
                <td><img src="{{asset("storage/".$Univers->lien_vers_l_image)}}" alt=""></td>
                <td style="background-color: {{$Univers->couleur_principale}}">{{$Univers->couleur_principale}}</td>
                <td style="background-color: {{$Univers->couleur_secondaire}}">{{$Univers->couleur_secondaire}}</td>
                <td>
                    <div class="dropdown">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">les actions</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{}}">modifier</a></li>
                        <li><a class="dropdown-item" href="#">supprimer</a></li>
                    </ul>
</div>

</td>

            </tr>
        @empty

        @endforelse
    </table>

    </div>
@endsection
