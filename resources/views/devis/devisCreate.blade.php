@extends('main')
@section('title')
Création de Devis
@endsection
@section('style')
{{--
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.3/css/bootstrap.min.css"
    integrity="sha512-oc9+XSs1H243/FRN9Rw62Fn8EtxjEYWHXRvjS43YtueEewbS6ObfXcJNyohjHqVKFPoXXUxwc+q1K7Dee6vv9g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js">
</script>
</script>

@endsection
@section('content')
<h2 class="my-5 text-center">Création de Devis</h2>



<div class="row justify-content-center mt-2">
    <div class="col-10">
        <div class="card shadow">
            <div class="card-header">
                <i class="fas fa-file-invoice"></i> <strong>Creation de Devis</strong>
            </div>

            <div class="card-body">
                <form action="" method="post" class="row g-3 needs-validation ">
                    @csrf
                    <div class="row">

                        <div class="col-md-12 my-2">
                            <label for="entreprise_id" class="form-label">Raison Social de l'Entreprise</label>
                            <select class="form-select shadow @error('entreprise_id')is-invalid
                                @enderror" id="entreprise_id" required name="entreprise_id">
                                <option selected disabled value="">...</option>
                                @foreach ($entreprises as $entreprise)
                                <option value="{{$entreprise->id}}">{{$entreprise->raison_social}}</option>
                                @endforeach
                            </select>
                            @error('entreprise_id')
                            <div class="invalid-feedback">{{$errors->first('entreprise_id')}}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 my-2">
                            <label for="date_devis" class="form-label">Date de création</label>
                            <input type="date" class="form-control shadow @error('date_devis')is-invalid
                                @enderror" id="date_devis" placeholder="Veuillez saisir la raison social"
                                value="{{old('date_devis')}}" required name="date_devis">
                            @error('date_devis')
                            <div class="invalid-feedback">{{$errors->first('date_devis')}}</div>
                            @enderror
                        </div>
                        <div class="col-md-6  my-2">
                            <label for="validationCustom099" class="form-label">Exercice</label>
                            <select class="form-select shadow @error('exercice')is-invalid
                                @enderror" id="validationCustom099" required name="exercice">
                                <option selected disabled value="">...</option>
                                @foreach ($exercices as $exercice)
                                <option value="{{$exercice->id}}" {{($exercice->id == 2021) ?
                                    'selected' : "" }}>{{$exercice->id}}</option>
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
                                    <td class="py-2" colspan="4">
                                        {{-- <input type="text" name="product_name[0]" id="product_name"
                                            class="product_name form-control">
                                        @error('product_name')<span class="help-block text-danger">{{ $message
                                            }}</span>@enderror --}}
                                        <select name="prestation_id" id="prestation_id" class="form-select shadow @error('prestation_id')is-invalid
                                            @enderror" id="validationCustom04" required>
                                            <option selected disabled value="">...</option>
                                            @foreach ($prestations as $prestation)
                                            <option value="{{$prestation->id}}" {{old('prestation')==$prestation->id ?
                                                "selected" : "" }}>{{$prestation->designation}} </option>
                                            @endforeach

                                        </select>
                                        @error('prestation_id')
                                        <div class="invalid-feedback">{{$errors->first('prestation_id')}}</div>
                                        @enderror
                                    </td>
                                    <td>
                                        <input type="text" {{-- step="0.01" --}} name="sub_total" id="row_sub_total"
                                            class="row_sub_total form-control shadow" readonly>
                                        @error('row_sub_total')<span class="help-block text-danger">{{ $message
                                            }}</span>@enderror
                                    </td>
                                </tr>

                                <tr>
                                    <td colspan="3"></td>
                                    <td colspan="2" class="text-end"><strong>Total a payé</strong></td>
                                    <td><input type="text" name="sub_total" id="total"
                                            class="sub_total form-control shadow" readonly="readonly"></td>
                                </tr>

                        </table>
                    </div>

                    <div class="text-center pt-3  my-5">
                        <button type="submit" name="save" class="btn btn-dark shadow">Enregistré</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Erreur</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Veuillez choisir une entreprise !
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Ok</button>
                {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
            </div>
        </div>
    </div>


    {{ csrf_field() }}
    <script>
        $(document).ready(function(){
        $('#prestation_id').val(null).change();
        $('#entreprise_id').val(null).change();
        if(($("#entreprise_id").val()==null ) || ($("#prestation_id").val()==null)){
            $('#row_sub_total').val("");
            $('#total').val("");
        }
/*     console.log($('#entreprise_id').val()); */
    $('#entreprise_id').click(function (e) {
        if($("#prestation_id").val()!==null){
            var entreprise_id = $("#entreprise_id").val();

            var prestation_id =  $('#prestation_id').val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
            url:"{{ route('devis.calculPrix') }}",
            method:"POST",
            data:{entreprise_id:entreprise_id, prestation_id:prestation_id,_token:_token },
            success:function(result)
                {
                console.log(result);
                $('#total').val(result+' DZD');
                $('#row_sub_total').val(result+' DZD');
                }

            })
        }
    })

    $('#prestation_id').click(function (e) {

        if( ($("#entreprise_id").val()=="" ) || ($("#entreprise_id").val()==null) ){
            /* alert('Veuillez choisir une entreprise'); */
            //$('#myModal').modal(show);
            $("#exampleModal").modal('show');


             $('#prestation_id').val(null).change();
        }else{
            var entreprise_id = $("#entreprise_id").val();

            var prestation_id =  $('#prestation_id').val();
            var _token = $('input[name="_token"]').val();
            $.ajax({
            url:"{{ route('devis.calculPrix') }}",
            method:"POST",
            data:{entreprise_id:entreprise_id, prestation_id:prestation_id,_token:_token },
            success:function(result)
            {
                console.log(result);
            $('#total').val(result+' DZD');
            $('#row_sub_total').val(result+' DZD');
            }

           } )




        }




    });
});
    </script>

    @endsection
