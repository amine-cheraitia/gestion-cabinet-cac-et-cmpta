@extends('main')
@section('title')
Création de client
@endsection
@section('content')
<h2 class="mt-5 text-center">Création d'une fiche entreprise</h2>
<div class="card-body">
    {{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif --}}
    <form class="row g-3 needs-validation" novalidate method="POST" action="{{route('client.store')}}">
        @csrf
        <div class="col-md-12">
            <label for="validationCustom01" class="form-label">Raison Social</label>
            <input type="text" class="form-control @error('raison_social')is-invalid
            @enderror" id="validationCustom01" placeholder="Veuillez saisir la raison social"
                value="{{old('raison_social')}}" required name="raison_social">
            @error('raison_social')
            <div class="invalid-feedback">{{$errors->first('raison_social')}}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="validationCustom02" class="form-label">N° de Registre de Commerce</label>
            <input type="text" class="form-control @error('num_registre_commerce')is-invalid
            @enderror" id="validationCustom02" value="{{old('num_registre_commerce')}}" required
                name="num_registre_commerce">
            @error('num_registre_commerce')
            <div class="invalid-feedback">{{$errors->first('num_registre_commerce')}}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="validationCustom02" class="form-label">N° d'Article d'Imposition</label>
            <input type="text" class="form-control @error('num_art_imposition')is-invalid
            @enderror" id="validationCustom02" value="{{old('num_art_imposition')}}" required
                name="num_art_imposition">
            @error('num_art_imposition')
            <div class="invalid-feedback">{{$errors->first('num_art_imposition')}}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="validationCustom02" class="form-label">N° d'Identification fiscal</label>
            <input type="text" class="form-control @error('num_id_fiscale')is-invalid
            @enderror" id="validationCustom02" value="{{old('num_id_fiscale')}}" required name="num_id_fiscale">
            @error('num_id_fiscale')
            <div class="invalid-feedback">{{$errors->first('num_id_fiscale')}}</div>
            @enderror
        </div>
        <div class="col-md-12">
            <label for="validationCustom01" class="form-label">Adresse</label>
            <input type="text" class="form-control @error('adresse')is-invalid
            @enderror" id="validationCustom01" value="{{old('adresse')}}" required name="adresse">
            @error('adresse')
            <div class="invalid-feedback">{{$errors->first('adresse')}}</div>
            @enderror
        </div>
        <div class="col-md-6">
            <label for="validationCustomUsername" class="form-label">Adresse Email</label>
            <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-at"></i></span>
                <input type="text" class="form-control @error('email')is-invalid
                @enderror" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required name="email">
                @error('email')
                <div class="invalid-feedback">{{$errors->first('email')}}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <label for="validationCustomUsername" class="form-label">Numéro Tel</label>
            <div class="input-group has-validation">
                <span class="input-group-text" id="inputGroupPrepend"><i class="fas fa-phone-square-alt"></i></span>
                <input type="text" class="form-control @error('num_tel')is-invalid
                @enderror" id="validationCustomUsername" aria-describedby="inputGroupPrepend" required name="num_tel">
                @error('num_tel')
                <div class="invalid-feedback">{{$errors->first('num_tel')}}</div>
                @enderror
            </div>
        </div>
        <div class="col-md-4">
            <label for="validationCustom04" class="form-label">Régime fiscal</label>
            <select class="form-select @error('fiscal_id')is-invalid
            @enderror" id="validationCustom04" required name="fiscal_id">
                <option selected disabled value="">Choose...</option>
                @foreach ($regimeFiscal as $fiscal)
                <option value="{{$fiscal->id}}">{{$fiscal->designation}}</option>
                @endforeach

            </select>
            @error('fiscal_id')
            <div class="invalid-feedback">{{$errors->first('fiscal_id')}}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="validationCustom04" class="form-label">Type d'activité</label>
            <select class="form-select @error('activite_id')is-invalid
            @enderror" id="validationCustom04" required name="activite_id">
                <option selected disabled value="">Choose...</option>
                @foreach ($typeActivite as $activité)
                <option value="{{$activité->id}}">{{$activité->designation}}</option>
                @endforeach

            </select>
            @error('activite_id')
            <div class="invalid-feedback">{{$errors->first('activite_id')}}</div>
            @enderror
        </div>
        <div class="col-md-4">
            <label for="validationCustom04" class="form-label">Categorie d'entreprise</label>
            <select class="form-select @error('categorie_id')is-invalid
            @enderror" id="validationCustom04" required name="categorie_id">
                <option selected disabled value="">Choose...</option>
                @foreach ($categorie as $cat)
                <option value="{{$cat->id}}">{{$cat->designation}}</option>
                @endforeach


            </select>
            @error('categorie_id')
            <div class="invalid-feedback">{{$errors->first('categorie_id')}}</div>
            @enderror
        </div>

        <div class="col-12">
            <button class="btn btn-dark" type="submit">Enregistré</button>
        </div>
    </form>
</div>
@endsection
