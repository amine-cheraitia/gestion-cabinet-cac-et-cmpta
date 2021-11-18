@extends('main')
@section('title')
Liste des Paiements
@endsection
@section('style')

<style>
    .dataTable-pagination li.active a {
        background-color: #212529 !important;
        border-color: #212529 !important;
        color: #fff !important;
    }

    .dataTable-pagination-list li a {
        color: #212529 !important
    }
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

@endsection
@section('content')
<h2 class="my-4 text-center">Liste des Paiements</h2>
@if(session('errors'))
<div class="col-lg-12">
    <div class="alert alert-danger" role="alert">{{ session('errors') }}</div>
</div>
@endif
@if(session('message'))
<div class="col-lg-12">
    <div class="alert alert-success" role="alert">{{ session('message') }}</div>
</div>
@endif

<div class="card mb-4 shadow">

    <div class="card-header d-flex justify-content-between align-items-center">
        <div><i class="fas fa-file-invoice-dollar"></i>
            Liste des Paiements</div>
        {{-- //todo: boutton d'ajout --}}
        <a href="{{route('paiement.create')}}" id="cree" class="btn btn-dark ">Crée un Paiement</a>

    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Facture Réf</th>
                    <th>Raison social</th>
                    <th>Mission Réf</th>
                    <th>N° piéce</th>
                    <th>Date de paiement</th>
                    <th>Montant</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>Facture Réf</th>
                    <th>Raison social</th>
                    <th>Mission Réf</th>
                    <th>N° piéce</th>
                    <th>Date de paiement</th>
                    <th>Montant</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($paiements as $paiement)
                <tr>
                    <td class="text-center"><strong>{{$loop->iteration}}</strong></td>
                    <td><strong><a href="{{-- {{route('devis.edit',$facture->id)}} --}}" class="link-dark"
                                style="text-underline-position: none">{{$paiement->facture->num_fact}}</a></strong></td>
                    <td>{{$paiement->facture->mission->entreprise->raison_social}}</td>
                    <td>{{$paiement->facture->mission->num_missions}}</td>
                    <td>{{$paiement->num_piece_c}}</td>
                    <td>{{Carbon\Carbon::parse($paiement->date_paiement)->format('d-m-Y')}}</td>
                    {{-- <td class="text-center">{{ $paiement->fact_avoir_id ? $facture->factureAvoir->num_fact : "-"}}
                    </td> --}}
                    <td>{{ number_format($paiement->montant, 2, ',', ' '); }} DA</td>

                    {{-- <td>{{$entreprise->num_registre_commerce}}</td>
                    <td>{{$entreprise->num_id_fiscale}}</td>
                    <td>{{$entreprise->num_art_imposition}}</td> --}}

                    <td class="d-flex">
                        <a target="_blank" href="{{-- {{route('facture.pdf',$facture->id)}} --}}"
                            class="btn btn-outline-primary"><i style="font-size: 15px;"
                                class="fas fa-print"></i></a>&nbsp;
                        <a href="{{route('paiement.edit',$paiement->id)}}" class="btn btn-outline-secondary">
                            <i class="fas fa-minus"></i></a> &nbsp;
                        <a href="{{-- {{route('facture.destroy',$facture->id)}} --}}" class="btn btn-outline-danger"><i
                                style="font-size: 20px" class="fas fa-times"></i></a>

                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>



<script>
    /*     $('#cree').click(function (e) {
         e.preventDefault();

        $('#editModal').modal('show')
    }); */
</script>
@endsection
