<div>
    <table>
        <th>nom et prénom</th>
        @foreach ( $liste as $Univers )
            <tr ><td >{{$Univers->nom}}</td></tr>


        @endforeach
    </table>
    <a href="/AjouterForm">ajouter des univers</a>
    </div>
