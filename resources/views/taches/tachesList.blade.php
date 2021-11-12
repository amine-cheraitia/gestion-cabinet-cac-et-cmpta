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

    li a {
        color: #212529 !important
    }
</style>

@endsection
@section('content')
<h2 class="my-4 text-center">Liste des tâches</h2>
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
            Liste des tâches</div>
        {{-- //todo: boutton d'ajout --}}
        <a href="{{route('tache.create')}}" class="btn btn-dark {{-- my-2 --}} ">Crée une tâche</a>
    </div>
    <div class="card-body">
        <table id="datatablesSimple">
            <thead>
                <tr>
                    <th>#</th>
                    <th>N° de tâche</th>
                    <th>N° de mission</th>
                    <th>Collaborateur</th>
                    <th>Date de debut</th>
                    <th>Date de fin</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>#</th>
                    <th>N° de tâche</th>
                    <th>N° de mission</th>
                    <th>Collaborateur</th>
                    <th>Date de debut</th>
                    <th>Date de fin</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($taches as $tache)
                <tr>
                    <td class="text-center"><strong>{{$loop->iteration}}</strong></td>
                    <td><strong><a href="{{route('mission.show',$tache->id)}}" class="link-dark"
                                style="text-underline-position: none">{{$tache->num_tache}}</a></strong></td>
                    <td>{{ $tache->mission->num_missions }}</td>
                    <td>{{ $tache->user->name }}</td>
                    <td>{{$tache->start}}</td>
                    <td>{{$tache->end}} <i class="fas fa-presentation "></i></td>
                    <td style="text-align: center">
                        {!!$tache->status_int!!}</span>
                    </td>

                    <td class="d-flex">
                        {{-- TO do consulter les missions aprés le setup des taches --}}
                        <a href="{{route('tache.show',$tache->id)}}" class="btn btn-outline-primary"><i
                                style="font-size: 15px" class="fas fa-sign-in-alt"></i></a> &nbsp;
                        <a href="{{route('tache.edit',$tache->id)}}" class="btn btn-outline-secondary">
                            <i class="fas fa-minus"></i></a> &nbsp;
                        <a href="{{route('tache.destroy',$tache->id)}}" class="btn btn-outline-danger"><i
                                style="font-size: 20px" class="fas fa-times"></i></a>

                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>

@endsection
