@extends('main')
@section('title')
Liste des clients
@endsection
@section('style')

<style>
    .dataTable-pagination li.active a {
        background-color: #212529 !important;
        border-color: #212529 !important;
        color: #fff !important;
    }

    li a {
        color: #212529 !important
    }
</style>
@endsection
@section('content')
<h2 class="mt-4 text-center">Liste des Devis</h2>
<div class="card mb-4 shadow">
    <div class="card-header">
        <i class="fas fa-file-alt"></i>
        Liste des Devis
        {{-- //todo: boutton d'ajout --}}
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>#</th>
                    <th>N° de Devis</th>
                    <th>Raison social</th>
                    <th>Date de Devis</th>
                    <th>Montal total</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>N° de Devis</th>
                    <th>Raison social</th>
                    <th>Date de Devis</th>
                    <th>Montal total</th>
                    <th>action</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($devis as $d)
                <tr>
                    <td class="text-center"><strong>{{$loop->iteration}}</strong></td>
                    <td><strong><a href="{{route('client.edit',$d->id)}}" class="link-dark"
                                style="text-underline-position: none">{{$d->num_devis}}</a></strong></td>
                    <td>{{$d->entreprise->raison_social}}</td>
                    <td>{{$d->date_devis}}</td>
                    <td>{{$d->total}} DA</td>

                    {{-- <td>{{$entreprise->num_registre_commerce}}</td>
                    <td>{{$entreprise->num_id_fiscale}}</td>
                    <td>{{$entreprise->num_art_imposition}}</td> --}}

                    <td class="d-flex"><a href="{{route('devis.edit',$d->id)}}" class="btn btn-outline-secondary">
                            <i class="fas fa-minus"></i></a> &nbsp;
                        <a href="{{route('devis.destroy',$d->id)}}" class="btn btn-outline-secondary"><i
                                style="font-size: 20px" class="fas fa-times"></i></a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>

@endsection
