@extends('main')
@section('title')
Création de Mission
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
<h2 class="mt-5 text-center">{{-- <i class="fas fa-project-diagram"> --}}Création de Mission</h2>
<div class="card-body">


    <form class="row g-3 needs-validation shadow " novalidate method="POST" action="{{route('mission.store')}}">
        @csrf
        <div class="col-md-12">
            <label for="devis_id" class="form-label">Via un Devis</label>
            <select class="form-select shadow @error('devis_id')is-invalid
                    @enderror" id="devis_id" required name="devis_id">
                <option selected disabled value="{{null}}">...</option>
                @foreach ($devis as $d)
                <option value="{{$d->id}}">{{$d->num_devis}}</option>
                @endforeach
            </select>
            @error('entreprise_id')
            <div class="invalid-feedback">{{$errors->first('entreprise_id')}}</div>
            @enderror
        </div>
        <div class="col-md-12">
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
        <div class="col-md-12">
            <label for="prestation_id" class="form-label">Désignation de la prestation</label>
            <select class="form-select shadow @error('prestation_id')is-invalid
                @enderror" id="prestation_id" required name="prestation_id">
                <option selected disabled value="">...</option>
                @foreach ($prestations as $prestation)
                <option value="{{$prestation->id}}">{{$prestation->designation}}</option>
                @endforeach
            </select>
            @error('prestation_id')
            <div class="invalid-feedback">{{$errors->first('prestation_id')}}</div>
            @enderror
        </div>
        <div class="col-md-3">
            <label for="start" class="form-label">Date de debut</label>
            <input type="date" class="form-control shadow @error('start')is-invalid
                @enderror" id="start" placeholder="Veuillez saisir la raison social" value="{{old('start')}}" required
                name="start">
            @error('start')
            <div class="invalid-feedback">{{$errors->first('start')}}</div>
            @enderror
        </div>
        <div class="col-md-3">
            <label for="end" class="form-label">Date de fin</label>
            <input type="date" class="form-control shadow @error('end')is-invalid
                @enderror" id="end" placeholder="Veuillez saisir la raison social" value="{{old('end')}}" required
                name="end">
            @error('end')
            <div class="invalid-feedback">{{$errors->first('end')}}</div>
            @enderror
        </div>
        <div class="col-md-3">
            <label for="color" class="form-label">Couleur du text</label>
            <input style="height: 38px" type="color" class="form-control shadow  @error('color')is-invalid
            @enderror" id="color" value="{{old('color')}}" required name="color">
            @error('color')
            <div class="invalid-feedback">{{$errors->first('color')}}</div>
            @enderror
        </div>
        <div class="col-md-3">
            <label for="textColor" class="form-label">Couleur du fond</label>
            <input style="height: 38px" type="color" class="form-control shadow  @error('textColor')is-invalid
            @enderror" id="textColor" value="{{old('num_art_imposition')}}" required name="textColor">
            @error('textColor')
            <div class="invalid-feedback">{{$errors->first('textColor')}}</div>
            @enderror
        </div>


        <div class="col-12 text-center mt-5">
            <button class="btn btn-dark shadow mb-5 " type="submit">Enregistré</button>
        </div>
    </form>
</div>
@endsection
