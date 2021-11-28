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

    .rouge {
        background: rgb(167, 112, 112) !important;
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
    <div class="card-body text-center">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    {{-- <th>#</th> --}}
                    <th>Mission Réf</th>
                    {{-- <th>Nbr Facture</th> --}}
                    <th>Total payée</th>
                    <th>Total mission</th>

                    <th>différence</th>

                    <th>Date première tr</th>
                    <th>Première tr</th>
                    <th>Date Deuxieme tr</th>
                    <th>Deuxième tr</th>
                    <th>Date Troisième tr</th>
                    <th>Troisième tr</th>

                </tr>
            </thead>
            <tfoot>
                <tr>
                    {{-- <th>#</th> --}}
                    <th>Mission Réf</th>
                    {{-- <th>Nbr Facture</th> --}}
                    <th>Total payée</th>
                    <th>Total mission</th>
                    <th>différence</th>
                    <th>date premiére tranche</th>
                    <th>Montant première tranche</th>
                    <th>date prévu pour deuxieme tranche</th>
                    <th>Montant deuxième tranche</th>
                    <th>date prévu pour troisième tranche</th>
                    <th>Montant troisième tranche</th>
                </tr>
            </tfoot>
            <tbody>

                @foreach ($creances as $creance)
                <tr class="">
                    {{-- <td class="text-center"><strong>{{$loop->iteration}}</strong></td> --}}
                    <td><strong><a href="{{-- {{route('devis.edit',$facture->id)}} --}}" class="link-dark"
                                style="text-underline-position: none">{{$creance->num_missions}}</a></strong></td>
                    {{-- <td>{{$creance->nbr}}</td> --}}
                    <td>{{ number_format($creance->totalfacture, 2, ',', ' '); }}</td>
                    <td>{{ number_format($creance->totalmission, 2, ',', ' '); }}</td>
                    <td>{{ number_format($creance->dif, 2, ',', ' '); }}</td>
                    <td @if(($creance->nbr == 0) AND ($creance->start<Carbon\Carbon::now()))
                            class="rouge font-weight-bold"><i class="fas fa-presentation "></i>@else > @endif
                            {{Carbon\Carbon::parse($creance->start)->format('d-m-Y')}}</td>
                    <td @if($creance->nbr == 0) class="rouge" @endif>{{
                        number_format($creance->ApayePremiereTranche, 2, ',',
                        ' '); }}</td>
                    <td @if(($creance->nbr == 1) OR ($creance->deuxiemeTranche<Carbon\Carbon::now()))
                            class="rouge font-weight-bold"><i class="fas fa-presentation "></i>@else > @endif
                            {{Carbon\Carbon::parse($creance->deuxiemeTranche)->format('d-m-Y')}}</td>
                    <td @if($creance->nbr < 2) class="rouge" @endif>{{ number_format($creance->ApayeDeuxiemeTranche, 2,
                            ',', ' '); }}</td>
                    <td @if(($creance->nbr == 2) OR ($creance->derniéreTranche<Carbon\Carbon::now()))
                            class="rouge font-weight-bold"><i class="fas fa-presentation "></i> @else > @endif
                            {{Carbon\Carbon::parse($creance->derniéreTranche)->format('d-m-Y')}}</td>
                    <td @if($creance->nbr < 3) class="rouge" @endif>{{ number_format($creance->ApayeDerniereTranche, 2,
                            ',', ' '); }}</td>
                    {{-- <td class="text-center">{{ $paiement->fact_avoir_id ? $facture->factureAvoir->num_fact : "-"}}
                    </td> --}}
                    {{-- <td>{{ number_format($paiement->montant, 2, ',', ' '); }} DA</td> --}}

                    {{-- <td>{{$entreprise->num_registre_commerce}}</td>
                    <td>{{$entreprise->num_id_fiscale}}</td>
                    <td>{{$entreprise->num_art_imposition}}</td> --}}


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
