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
<h2 class="my-4 text-center">Liste des Missions</h2>
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
<a href="{{route('mission.create')}}" class="btn btn-dark my-2">Crée une mission</a>
<div class="card mb-4 shadow">
    <div class="card-header">
        <i class="fas fa-project-diagram"></i>
        Liste des Missions
        {{-- //todo: boutton d'ajout --}}
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
                    <th>Status</th>
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
                    <th>Status</th>
                    <th>action</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($missions as $mission)
                <tr>
                    <td class="text-center"><strong>{{$loop->iteration}}</strong></td>
                    <td><strong><a href="{{route('mission.edit',$mission->id)}}" class="link-dark"
                                style="text-underline-position: none">{{$mission->num_missions}}</a></strong></td>
                    <td>{{ $mission->entreprise->raison_social }}</td>
                    <td>{{ $mission->prestation->designation }}</td>
                    <td>{{$mission->start}}</td>
                    <td>{{$mission->end}} <i class="fas fa-presentation "></i></td>
                    <td style="text-align: center">
                        {!!$mission->status_int!!}</span>
                    </td>


                    <td class="d-flex">
                        {{-- TO do consulter les missions aprés le setup des taches --}}
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