@extends('main')
@section('title')
Création de Devis
@endsection
@section('style')
{{--
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.3/css/bootstrap.min.css"
    integrity="sha512-oc9+XSs1H243/FRN9Rw62Fn8EtxjEYWHXRvjS43YtueEewbS6ObfXcJNyohjHqVKFPoXXUxwc+q1K7Dee6vv9g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
@endsection
@section('content')
<h2 class="my-5 text-center">Création de DEvis</h2>
<div class="">


    <div class="row justify-content-center mt-2">
        <div class="col-10">
            <div class="card">
                <div class="card-header">
                    <i class="fas fa-file-invoice"></i> <strong>Creation de Devis</strong>
                </div>

                <div class="card-body">
                    <form action="" method="post" class="g-3">
                        @csrf
                        <div class="row">

                            <div class="col-md-12">
                                <label for="validationCustom04" class="form-label">Raison Social</label>
                                <select class="form-select @error('entreprise_id')is-invalid
                                @enderror" id="validationCustom04" required name="entreprise_id">
                                    <option selected disabled value="">...</option>
                                    @foreach ($entreprises as $entreprise)
                                    <option value="{{$entreprise->id}}">{{$entreprise->raison_social}}</option>
                                    @endforeach
                                </select>
                                @error('entreprise_id')
                                <div class="invalid-feedback">{{$errors->first('entreprise_id')}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="validationCustom01" class="form-label">Date de création</label>
                                <input type="date" class="form-control @error('raison_social')is-invalid
                                @enderror" id="validationCustom01" placeholder="Veuillez saisir la raison social"
                                    value="{{old('raison_social')}}" required name="raison_social">
                                @error('raison_social')
                                <div class="invalid-feedback">{{$errors->first('raison_social')}}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="validationCustom04" class="form-label">Exercice</label>
                                <select class="form-select @error('entreprise_id')is-invalid
                                @enderror" id="validationCustom04" required name="entreprise_id">
                                    <option selected disabled value="">...</option>
                                    <option selected value="2021">2021</option>
                                    @foreach ($entreprises as $entreprise)
                                    <option value="{{$entreprise->id}}">{{$entreprise->raison_social}}</option>
                                    @endforeach
                                </select>
                                @error('entreprise_id')
                                <div class="invalid-feedback">{{$errors->first('entreprise_id')}}</div>
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
                                        <th>Désignation</th>
                                        <th>{{ __('Frontend/frontend.unit') }}</th>
                                        <th>{{ __('Frontend/frontend.quantity') }}</th>
                                        <th>Tarif</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="cloning_row" id="0">
                                        <td>#</td>
                                        <td>
                                            {{-- <input type="text" name="product_name[0]" id="product_name"
                                                class="product_name form-control">
                                            @error('product_name')<span class="help-block text-danger">{{ $message
                                                }}</span>@enderror --}}
                                            <select name="unit[0]" id="unit" class="unit form-control">
                                                <option></option>
                                                <option value="piece">Audit Légal</option>
                                                <option value="g">Assistance Comptable</option>
                                                <option value="kg">Consolidation</option>
                                            </select>
                                            @error('unit')<span class="help-block text-danger">{{ $message
                                                }}</span>@enderror
                                        </td>
                                        <td>
                                            <select name="unit[0]" id="unit" class="unit form-control">
                                                <option></option>
                                                <option value="piece">{{ __('Frontend/frontend.piece') }}</option>
                                                <option value="g">{{ __('Frontend/frontend.gram') }}</option>
                                                <option value="kg">{{ __('Frontend/frontend.kilo_gram') }}</option>
                                            </select>
                                            @error('unit')<span class="help-block text-danger">{{ $message
                                                }}</span>@enderror
                                        </td>
                                        <td>
                                            <input type="number" name="quantity[0]" step="0.01" id="quantity"
                                                class="quantity form-control">
                                            @error('quantity')<span class="help-block text-danger">{{ $message
                                                }}</span>@enderror
                                        </td>
                                        <td>
                                            <input type="number" name="unit_price[0]" step="0.01" id="unit_price"
                                                class="unit_price form-control">
                                            @error('unit_price')<span class="help-block text-danger">{{ $message
                                                }}</span>@enderror
                                        </td>
                                        <td>
                                            <input type="number" step="0.01" name="row_sub_total[0]" id="row_sub_total"
                                                class="row_sub_total form-control" readonly="readonly">
                                            @error('row_sub_total')<span class="help-block text-danger">{{ $message
                                                }}</span>@enderror
                                        </td>
                                    </tr>
                                </tbody>

                                <tfoot>
                                    {{-- <tr>
                                        <td colspan="6">
                                            <button type="button" class="btn_add btn btn-primary">{{
                                                __('Frontend/frontend.add_another_product') }}</button>
                                        </td>
                                    </tr> --}}
                                    <tr>
                                        <td colspan="3"></td>
                                        <td colspan="2">Total a payé</td>
                                        <td><input type="number" step="0.01" name="sub_total" id="sub_total"
                                                class="sub_total form-control" readonly="readonly"></td>
                                    </tr>
                                    {{-- <tr>
                                        <td colspan="3"></td>
                                        <td colspan="2">{{ __('Frontend/frontend.discount') }}</td>
                                        <td>
                                            <div class="input-group mb-3">
                                                <select name="discount_type" id="discount_type"
                                                    class="discount_type custom-select">
                                                    <option value="fixed">{{ __('Frontend/frontend.sr') }}</option>
                                                    <option value="percentage">{{ __('Frontend/frontend.percentage') }}
                                                    </option>
                                                </select>
                                                <div class="input-group-append">
                                                    <input type="number" step="0.01" name="discount_value"
                                                        id="discount_value" class="discount_value form-control"
                                                        value="0.00">
                                                </div>
                                            </div>
                                        </td>
                                    </tr> --}}
                                    {{-- <tr>
                                        <td colspan="3"></td>
                                        <td colspan="2">{{ __('Frontend/frontend.vat') }}</td>
                                        <td><input type="number" step="0.01" name="vat_value" id="vat_value"
                                                class="vat_value form-control" readonly="readonly"></td>
                                    </tr>
                                    <tr>
                                        <td colspan="3"></td>
                                        <td colspan="2">{{ __('Frontend/frontend.shipping') }}</td>
                                        <td><input type="number" step="0.01" name="shipping" id="shipping"
                                                class="shipping form-control"></td>
                                    </tr> --}}
                                    {{-- <tr>
                                        <td colspan="3"></td>
                                        <td colspan="2">{{ __('Frontend/frontend.total_due') }}</td>
                                        <td><input type="number" step="0.01" name="total_due" id="total_due"
                                                class="total_due form-control" readonly="readonly"></td>
                                    </tr> --}}
                                </tfoot>
                            </table>
                        </div>

                        <div class="text-center pt-3">
                            <button type="submit" name="save" class="btn btn-dark">Enregistré</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
