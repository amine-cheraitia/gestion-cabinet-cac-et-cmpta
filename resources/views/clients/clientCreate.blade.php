@extends('main')
@section('title')
Création de client
@endsection
@section('content')
<h2 class="mt-5 text-center">Création d'une fiche entreprise</h2>
<div class="card-body">
    <form class="row g-3 needs-validation" novalidate method="POST" action="{{route('client.store')}}">
        @csrf
        <div class="col-md-12">
            <label for="validationCustom01" class="form-label">Raison Social</label>
            <input type="text" class="form-control" id="validationCustom01"
                placeholder="Veuillez saisir la raison social" value="" required name="raison_social">
            <div class="valid-feedback">
                Donnée correcte!
            </div>
        </div>
        <div class="col-md-4">
            <label for="validationCustom02" class="form-label">N° de Registre de Commerce</label>
            <input type="text" class="form-control" id="validationCustom02" value="" required
                name="num_registre_commerce">
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-md-4">
            <label for="validationCustom02" class="form-label">N° d'Article d'Imposition</label>
            <input type="text" class="form-control" id="validationCustom02" value="" required name="num_art_imposition">
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-md-4">
            <label for="validationCustom02" class="form-label">N° d'Identification fiscal</label>
            <input type="text" class="form-control" id="validationCustom02" value="" required name="num_id_fiscales">
            <div class="valid-feedback">
                Looks good!
            </div>
        </div>
        <div class="col-md-12">
            <label for="validationCustom01" class="form-label">Adresse</label>
            <input type="text" class="form-control" id="validationCustom01" value="" required name="adresse">
            <div class="valid-feedback">
                Donnée correcte!
            </div>
        </div>
        <div class="col-md-6">
            <label for="validationCustomUsername" class="form-label">Adresse Email</label>
            <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-at"></i></span>
                <input type="text" class="form-control" id="validationCustomUsername"
                    aria-describedby="inputGroupPrepend" required name="email">
                <div class="invalid-feedback">
                    Please choose a username.
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <label for="validationCustomUsername" class="form-label">Numéro Tel</label>
            <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-phone-square-alt"></i></span>
                <input type="text" class="form-control" id="validationCustomUsername"
                    aria-describedby="inputGroupPrepend" required name="num_tel">
                <div class="invalid-feedback">
                    Please choose a username.
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <label for="validationCustom04" class="form-label">Régime fiscal</label>
            <select class="form-select" id="validationCustom04" required name="fiscal_id">
                <option selected disabled value="">Choose...</option>
                @foreach ($regimeFiscal as $fiscal)
                <option value="{{$fiscal->id}}">{{$fiscal->designation}}</option>
                @endforeach

            </select>
            <div class="invalid-feedback">
                Please select a valid state.
            </div>
        </div>
        <div class="col-md-4">
            <label for="validationCustom04" class="form-label">Type d'activité</label>
            <select class="form-select" id="validationCustom04" required name="activite_id">
                <option selected disabled value="">Choose...</option>
                @foreach ($typeActivite as $activité)
                <option value="{{$activité->id}}">{{$activité->designation}}</option>
                @endforeach

            </select>
            <div class="invalid-feedback">
                Please select a valid state.
            </div>
        </div>
        <div class="col-md-4">
            <label for="validationCustom04" class="form-label">Categorie d'entreprise</label>
            <select class="form-select" id="validationCustom04" required name="categorie_id">
                <option selected disabled value="">Choose...</option>
                @foreach ($categorie as $cat)
                <option value="{{$cat->id}}">{{$cat->designation}}</option>
                @endforeach


            </select>
            <div class="invalid-feedback">
                Please select a valid state.
            </div>
        </div>

        <div class="col-12">
            <button class="btn btn-dark" type="submit">Enregistré</button>
        </div>
    </form>
</div>
@endsection
