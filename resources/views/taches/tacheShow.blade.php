@extends('main')
@section('title')
Tâche
{{$tache->num_tache}}
@endsection
@section('style')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<style>
    .dataTable-pagination li.active a {
        background-color: #212529 !important;
        border-color: #212529 !important;
        color: #fff !important;
    }

    li a {
        color: #212529 !important
    }

    @media (max-width: 576px) {

        .text-right,
        .text-left {
            text-align: center;
        }

        #btn {
            flex-direction: column;
        }
    }
</style>



@endsection
@section('content')

<h2 class="my-4 text-center">Détail de la tâche {{$tache->num_tache}}</h2>
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

{{-- @php
Carbon\Carbon::setLocale('fr');
@endphp --}}
<div class="card mb-4 shadow">

    <div class="card-header d-flex justify-content-between align-items-center">
        <div><i class="fa fa-tasks" aria-hidden="true"></i> <strong>{{$tache->title}}</strong>

        </div>
    </div>
    <div class="card-body p-4">
        <div class="row ">
            <figure>
                <blockquote class="blockquote">
                    <div class=" d-flex justify-content-between row">
                        <div class="col-sm-12 col-md-6 text-left text-sm-center">Tache Ref:
                            <strong>{{$tache->title}}</strong>
                        </div>
                        <div class="col-sm-12 col-md-6 text-right text-sm-center col-xs-text-center">
                            Affecté à:
                            <strong>{{$tache->user->role_f}}</strong>
                        </div>
                    </div>
                </blockquote>
                <figcaption class="blockquote-footer text-center my-2">
                    Debut de la mission <cite
                        title="Source Title"><strong>{{Carbon\Carbon::parse($tache->start)->isoFormat('LL')}}</strong></cite>
                    , Fin de la mission <cite
                        title="Source Title"><strong>{{Carbon\Carbon::parse($tache->end)->isoFormat('LL')/*
                            ->format('d-M-Y' )*/}}</strong></cite>
                </figcaption>
            </figure>

        </div>
        <hr>
        <div class="row my-3">
            <div class=" d-flex justify-content-between row my-2">
                <div class="col-sm-12 col-md-6 text-left text-sm-center"><strong>Statut:</strong>
                    {!!$tache->status_int!!}
                </div>
                <div class="col-sm-12 col-md-6 text-right text-sm-center col-xs-text-center">
                    Désignation: <strong><i> {{$tache->designation}}</i></strong>
                </div>
            </div>


        </div>

        <div class="row my-3">
            <div id="btn" class="d-flex flex text-center justify-content-center">
                {{--
                @if ($mission->mandat)
                <a target="_blank" href="{{route('mandat.pdf',$mission->id)}}" class="btn btn-outline-primary"><i
                        style="font-size: 15px;" class="fas fa-print"></i> Imprimer le Mandat</a>&nbsp;
                @else
                <a href="{{route('mandat.generate',$mission->id)}}" class="btn btn-primary"><i
                        class="fas fa-cogs"></i></i>
                    Générer le
                    Mandat</a> &nbsp;
                @endif

                @if ($mission->convention)

                <a target="_blank" href="{{route('convention.pdf',$mission->id)}}" class="btn btn-outline-dark"><i
                        style="font-size: 15px;" class="fas fa-print"></i> Imprimer la convention </a>
                @else

                <a href="{{route('convention.generate',$mission->id)}}" class="btn btn-dark"><i class="fas fa-cogs"></i>
                    Générer la convention</a>
                @endif
                --}}



            </div>


        </div>
    </div>

    @endsection
