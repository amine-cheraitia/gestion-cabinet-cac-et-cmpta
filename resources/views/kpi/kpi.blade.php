@extends('main')
@section('title')
Performance globale du cabinet
@endsection
@section('content')

<div class="container-fluid px-4">
    <h1 class="mt-4">{{-- Tableau de bord --}}</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active"><a class="text-dark" href="{{route('/')}}">Tableau de bord</a> / Performance
            globale du cabinet
    </ol>


    <hr>
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="card mb-4">

                <div class="card-header">
                    <i class="fas fa-chart-area me-1"></i>
                    Chiffre d'Affaire par mois
                </div>

                <div class="card-body"><canvas id="myBarChart" width="50%" height="30%"></canvas></div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="card mb-4">

                <div class="card-header">
                    <i class="fas fa-chart-pie"></i>
                    Etat des Missions
                </div>

                <div class="card-body"><canvas id="myPieChart" width="50%" height="30%"></canvas></div>
            </div>
        </div>

        {{-- <div class="card-body col-6"><canvas id="myBarChart" width="50%" height="30%"></canvas></div> --}}
        {{-- <div class="card-body col-md-6  col-sm-12"><canvas id="myPieChart" width="50%" height="30%"></canvas></div>
        celui d'avant --}}
        {{-- <div class="card-body"><canvas id="myBarChart2" width="100%" height="40"></canvas></div> --}}
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-12">
            <div class="card mb-4">

                <div class="card-header">
                    <i class="fas fa-chart-line"></i>
                    Prestations les plus demandées
                </div>

                <div class="card-body"><canvas id="myPieChart2" width="50%" height="30%"></canvas></div>
            </div>
        </div>
        <div class="col-md-6 col-sm-12">
            <div class="card mb-4">

                <div class="card-header">
                    <i class="fas fa-chart-bar"></i>
                    Contribution des Prestations dans le Chiffre d'Affaire
                </div>

                <div class="card-body"><canvas id="myBarChart2" width="50%" height="30%"></canvas></div>
            </div>
        </div>

    </div>

</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    x_data= JSON.parse('{!! json_encode($xdata) !!}');
    x_max = JSON.parse('{!! json_encode($x_max) !!}');
    missionAchevé = JSON.parse('{!! json_encode($missionAchevé) !!}');
    missionEncours = JSON.parse('{!! json_encode($missionEncours) !!}');

    prestationLabel= JSON.parse('{!! json_encode($prestationDemande) !!}');
    prestationNbr= JSON.parse('{!! json_encode($prestationDemandeeNbr) !!}');

    prestationCaLabel= JSON.parse('{!! json_encode($prestationCALabel) !!}');
    prestationCaMontant= JSON.parse('{!! json_encode($prestationCaMontant) !!}');
    max_montant= JSON.parse('{!! json_encode($max_montant) !!}');

    console.log(prestationLabel+" "+prestationNbr);
    /*y_data=JSON.parse(); */

/*     $('#year').change(function (e) {

        var y = $('#year').val();
        var _token = $('input[name="_token"]').val();
        console.log(y);
        $.ajax({
            type: "post",
            url: "{{route('fetchCA')}}",
            data: {y:y,_token:_token },
            dataType: "dataType",
            success: function (response) {
                console.log(response);
                x_data= response.xdata,
                x_max=response.x_max
            }
        });

    }); */
</script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="{{asset('assets/charts/chart-bar-Chiffre-dAffaire.js')}}"></script>
<script src="{{asset('assets/charts/chart-pie-prestation-demandé.js')}}"></script>
<script src="{{asset('assets/charts/chart-pie-missions.js')}}"></script>
<script src="{{asset('assets/charts/chart-pie-contribution-ca.js')}}"></script>
@endsection
