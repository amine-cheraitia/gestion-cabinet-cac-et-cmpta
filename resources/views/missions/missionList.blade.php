@extends('main')
@section('title')
Liste des missions
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

@endsection
@section('content')
<h2 class="my-4 text-center">{{-- Liste des Missions --}}</h2>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active"><a class="text-dark" href="{{route('/')}}">Tableau de bord</a> / Liste des
        Missions</li>
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
        <div><i class="fas fa-project-diagram"></i>
            <strong>Liste des Missions</strong>
        </div>
        {{-- //todo: boutton d'ajout --}}
        <a href="{{route('mission.create')}}" class="btn btn-dark {{-- my-2 --}} ">Crée une mission</a>
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>#</th>
                    <th>N° de mission</th>
                    <th>Raison social</th>
                    <th>Prestation</th>
                    <th>Date de debut</th>
                    <th>Date de fin</th>
                    <th>Statut</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>N° de Devis</th>
                    <th>Raison social</th>
                    <th>Prestation</th>
                    <th>Date de Devis</th>
                    <th>Montal total</th>
                    <th>Statut</th>
                    <th>action</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($missions as $mission)
                <tr>
                    <td class="text-center"><strong>{{$loop->iteration}}</strong></td>
                    <td><strong><a href="{{route('mission.show',$mission->id)}}" class="link-dark"
                                style="text-underline-position: none">{{$mission->num_missions}}</a></strong></td>
                    <td>{{ $mission->entreprise->raison_social }}</td>
                    <td>{{ $mission->prestation->designation }}</td>
                    <td>{{Carbon\Carbon::parse($mission->starte)->format('d-m-Y') }}</td>
                    <td>{{Carbon\Carbon::parse($mission->ende)->format('d-m-Y') }}</i></td>
                    <td style="text-align: center">
                        {!!$mission->status_int!!}</span>
                    </td>


                    <td class="d-flex">
                        {{-- TO do consulter les missions aprés le setup des taches --}}
                        <a href="{{route('mission.show',$mission->id)}}" class="btn btn-outline-primary"><i
                                style="font-size: 15px" class="fas fa-sign-in-alt"></i></a> &nbsp;
                        <a href="{{route('mission.edit',$mission->id)}}" class="btn btn-outline-secondary">
                            <i class="fas fa-minus"></i></a> &nbsp;
                        <a href="{{route('mission.destroy',$mission->id)}}" class="btn btn-outline-danger"><i
                                style="font-size: 20px" class="fas fa-times"></i></a>

                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>

@endsection
