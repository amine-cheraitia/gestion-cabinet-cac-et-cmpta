@extends('main')
@section('title')
Modification de Facture d'Avoir {{$factavoir->num_fact}}
@endsection
@section('style')
{{--
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.3/css/bootstrap.min.css"
    integrity="sha512-oc9+XSs1H243/FRN9Rw62Fn8EtxjEYWHXRvjS43YtueEewbS6ObfXcJNyohjHqVKFPoXXUxwc+q1K7Dee6vv9g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js">
</script>
</script> --}}

@endsection
@section('content')
<h2 class="my-5 text-center">Modification de Facture d'Avoir N° {{$factavoir->num_fact}}</h2>



<div class="row justify-content-center mt-2">
    <div class="col-10">
        <div class="card shadow">
            <div class="card-header">
                <i class="fas fa-file-alt"></i> <strong>Modification de Facture d'Avoir N°
                    {{$factavoir->num_fact}}</strong>
            </div>

            <div class="card-body">
                <form action="{{route('facture.update',$factavoir->id)}}" method="post"
                    class="row g-3 needs-validation ">
                    @csrf
                    @method('PATCH')
                    <div class="row">

                        <div class="col-md-12 my-2">
                            <label for="fact_avoir_id" class="form-label">Facture Réf</label>
                            <select class="form-select shadow @error('fact_avoir_id')is-invalid
                                @enderror" id="fact_avoir_id" required name="fact_avoir_id">
                                <option selected disabled value="">...</option>
                                @foreach ($factures as $facture)
                                <option value="{{$facture->id}}" {{($factavoir->fact_avoir_id == $facture->id)?
                                    "selected" :
                                    ""}}>{{$facture->num_fact}}</option>
                                @endforeach
                            </select>
                            @error('fact_avoir_id')
                            <div class="invalid-feedback">{{$errors->first('fact_avoir_id')}}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 my-2">
                            <label for="date_facturation" class="form-label">Date de Facturation</label>
                            <input type="date" class="form-control shadow @error('date_facturation')is-invalid
                                @enderror" id="date_facturation" placeholder="Veuillez saisir la date"
                                value="{{$factavoir->date_facturation ?? old('date_facturation')}}" required
                                name="date_facturation">
                            @error('date_facturation')
                            <div class="invalid-feedback">{{$errors->first('date_facturation')}}</div>
                            @enderror
                        </div>
                        <div class="col-md-6  my-2">
                            <label for="validationCustom099" class="form-label">Exercice</label>
                            <select class="form-select shadow @error('exercice')is-invalid
                                @enderror" id="exercice_id" required name="exercice_id">
                                <option selected disabled value="">...</option>
                                @foreach ($exercices as $exercice)
                                <option value="{{$exercice->id}}" {{($exercice->id == $factavoir->exercice_id)
                                    ?
                                    'selected' : "" }} >{{$exercice->id}}</option>
                                @endforeach

                            </select>
                            @error('exercice')
                            <div class="invalid-feedback">{{$errors->first('exercice')}}</div>
                            @enderror
                        </div>

                    </div>


                    <div class="table-responsive">
                        <table class="table" id="invoice_details">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                <tr>
                                    <th></th>
                                    <th colspan="4">Désignation</th>
                                    {{-- <th>{{ __('Frontend/frontend.unit') }}</th>
                                    <th>{{ __('Frontend/frontend.quantity') }}</th> --}}
                                    {{-- <th>Tarif</th> --}}
                                    <th>Total</th>
                                </tr>
                            </thead>
                            {{-- <tbody> --}}
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                <tr class="cloning_row" id="0">
                                    <td><strong>#</strong></td>
                                    <td colspan="4">
                                        <input type="text" id="prestation" class="form-control shadow"
                                            value="{{$factavoir->mission->prestation->designation}}"
                                            readonly="readonly">
                                    </td>
                                    <td>
                                        <input type="text" {{-- step="0.01" name="sub_total" --}} id="montant"
                                            name="montant" class="row_sub_total form-control shadow"
                                            value="{{$factavoir->montant}}" readonly>
                                        @error('montant')<span class="help-block text-danger">{{ $message
                                            }}</span>@enderror
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="3"></td>
                                    <td colspan="2" class="text-end"><strong>Total a payé</strong></td>
                                    <td><input type="text" id="total" class="sub_total form-control shadow"
                                            readonly="readonly" value="{{$factavoir->montant}}"></td>
                                </tr>

                        </table>
                    </div>

                    <div class="text-center pt-3  my-5">
                        <button type="submit" class="btn btn-dark shadow">Enregistré</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


{{ csrf_field() }}
<script>
    $(document).ready(function(){

    $('#fact_avoir_id').click(function (e) {

            var facture_ref = $("#fact_avoir_id").val();

            var _token = $('input[name="_token"]').val();
            $.ajax({
            url:"{{ route('facture.factureInfo') }}",
            method:"POST",
            data:{facture_ref:facture_ref, _token:_token },
            success:function(result)
                {
                console.log(result);

                $('#montant').val(result.montant);
                $('#total').val(result.montant);
                $('#exercice_id').val(result.exercice_id);
                $('#prestation').val(result.prestation);

                }

            })

    })


});
</script>

@endsection
