@extends('main')
@section('title')
Liste des Devis
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
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js">
</script>
</script> --}}
@endsection
@section('content')

<h2 class="my-4 text-center">{{-- Liste des Entreprises --}}</h2>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active"><a class="text-dark" href="{{route('/')}}">Tableau de bord</a> / Liste des
        Devis</li>
</ol>
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
        <div><i class="fas fa-file-alt"></i>
            <strong>Liste des Devis</strong>
        </div>
        {{-- //todo: boutton d'ajout --}}
        <a href="{{route('devis.create')}}" class="btn btn-dark ">Crée un Devis</a>

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
                    <td><strong><a href="{{route('devis.edit',$d->id)}}" class="link-dark"
                                style="text-underline-position: none">{{$d->num_devis}}</a></strong></td>
                    <td>{{$d->entreprise->raison_social}}</td>
                    <td>{{$d->date_devis}}</td>
                    <td>{{ number_format($d->total, 2, ',', ' '); }} DA</td>

                    {{-- <td>{{$entreprise->num_registre_commerce}}</td>
                    <td>{{$entreprise->num_id_fiscale}}</td>
                    <td>{{$entreprise->num_art_imposition}}</td> --}}

                    <td class="d-flex justify-content-center">
                        <a target="_blank" href="{{route('devis.pdf',$d->id)}}" class="btn btn-outline-primary"><i
                                style="font-size: 15px;" class="fas fa-print"></i></a>&nbsp;
                        <a href="{{route('devis.edit',$d->id)}}" class="btn btn-outline-secondary">
                            <i class="fas fa-minus"></i></a> &nbsp;
                        <a href="{{route('devis.destroy',$d->id)}}" class="btn btn-outline-danger"><i
                                style="font-size: 20px" class="fas fa-times"></i></a>

                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>

@endsection
