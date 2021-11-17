@extends('main')
@section('title')
Enregistrement de Paiement
@endsection
@section('style')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<style>
    footer {
        position: absolute;
        bottom: 0px;
    }
</style>
@endsection
@section('content')
<h2 class="my-5 text-center">Enregistrement de Paiement</h2>



<div class="row justify-content-center mt-2 mb-5">
    <div class="col-10">
        <div class="card shadow">
            <div class="card-header">
                <i class="fas fa-file-alt"></i> <strong>Enregistrement de Paiement</strong>
            </div>

            <div class="card-body">
                <form action="{{route('paiement.store')}}" method="post" class="row g-3 needs-validation ">
                    @csrf
                    <div class="row">

                        <div class="col-md-12 my-2">
                            <label for="facture_id" class="form-label">Facture Réf</label>
                            <select class="form-select shadow @error('facture_id')is-invalid
                                @enderror" id="facture_id" required name="facture_id">
                                <option selected disabled value="">...</option>
                                @foreach ($factures as $facture)
                                <option value="{{$facture->id}}">{{$facture->num_fact}}</option>
                                @endforeach
                            </select>
                            @error('facture_id')
                            <div class="invalid-feedback">{{$errors->first('facture_id')}}</div>
                            @enderror
                        </div>
                        <div class="col-md-6  my-2">
                            <label for="type_paiement_id" class="form-label">Type de Paiement</label>
                            <select class="form-select shadow @error('type_paiement_id')is-invalid
                                @enderror" id="type_paiement_id" required name="type_paiement_id">
                                <option selected disabled value="">...</option>
                                @foreach ($typePaiements as $type)
                                <option value="{{$type->id}}">{{$type->designation}}</option>
                                @endforeach

                            </select>
                            @error('type_paiement_id')
                            <div class="invalid-feedback">{{$errors->first('type_paiement_id')}}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 my-2">
                            <label for="date_paiement" class="form-label">Date de Paiement</label>
                            <input type="date" class="form-control shadow @error('date_paiement')is-invalid
                                @enderror" id="date_paiement" placeholder="Veuillez saisir la date"
                                value="{{old('date_paiement')}}" required name="date_paiement">
                            @error('date_paiement')
                            <div class="invalid-feedback">{{$errors->first('date_paiement')}}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 my-2">
                            <label for="montant" class="form-label">Montant</label>

                            <div class="input-group mb-2">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">DZD</div>
                                </div>



                                <input type="text" class="form-control shadow  @error('montant')is-invalid
                                @enderror" id="montant" placeholder="Veuillez Saisir le montant"
                                    value="{{old('montant')}}" required name="montant">
                            </div>
                            @error('montant')
                            <div class="invalid-feedback">{{$errors->first('montant')}}</div>
                            @enderror
                        </div>

                        <div class="col-md-6 my-2">
                            <label for="num_piece_c" class="form-label">N° de la piéce Comptable</label>
                            <input type="text" class="form-control shadow  @error('num_piece_c')is-invalid
                                @enderror" id="num_piece_c" placeholder="Veuillez saisir le N° de piéce Comptable"
                                value="{{old('num_piece_c')}}" required name="num_piece_c">
                            @error('num_piece_c')
                            <div class="invalid-feedback">{{$errors->first('num_piece_c')}}</div>
                            @enderror
                        </div>
                        {{-- --}}


                        <div class="col-12 text-center mt-5">
                            <button class="btn btn-dark shadow mb-5 " type="submit">Enregistré</button>
                        </div>

                    </div>
                </form>
            </div>

        </div>
    </div>



    {{ csrf_field() }}
    <script>
        $(document).ready(function(){


            $("#type_paiement_id").change(function (e) {
                $("#num_piece_c").val('-')

            });
    $('#facture_id').change(function (e) {

            var facture_id = $("#facture_id").val();
            console.log(facture_id);
            var _token = $('input[name="_token"]').val();
            $.ajax({
            url:"{{ route('paiement.fetch') }}",
            method:"POST",
            data:{facture_id:facture_id, _token:_token },
            success:function(result)
                {
                console.log(result);

                $('#montant').val(result);

                }

            })

    })


});
    </script>

    @endsection
