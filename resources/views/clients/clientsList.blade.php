@extends('main')
@section('title')
Liste des clients
@endsection
@section('content')
<h2 class="mt-4 text-center">Liste des Entreprises</h2>
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table me-1"></i>
        Liste des Entreprises
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>Raison social</th>
                    <th>Adresse</th>
                    <th>Email</th>
                    <th>N° Registre de Commerce</th>
                    <th>N° Identifiant fiscal</th>
                    <th>N° Article d'imposition</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>Raison social</th>
                    <th>Adresse</th>
                    <th>N° de télephone</th>
                    <th>Email</th>
                    <th>N° Registre de Commerce</th>
                    <th>N° Identifiant fiscal</th>
                    <th>N° Article d'imposition</th>
                    <th>Régime fiscal</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($entreprises as $entreprise)
                <tr>
                    <td>{{$entreprise->raison_social}}</td>
                    <td>{{$entreprise->adresse}}</td>
                    <td>{{$entreprise->num_tel}}</td>
                    <td>{{$entreprise->email}}</td>

                    <td>{{$entreprise->num_registre_commerce}}</td>
                    <td>{{$entreprise->num_id_fiscale}}</td>
                    <td>{{$entreprise->num_art_imposition}}</td>
                    <td>{{$entreprise->RegimeFiscal->designation}}</td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>

@endsection
