@extends('main')
@section('style')
{{--
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.3/css/bootstrap.min.css"
    integrity="sha512-oc9+XSs1H243/FRN9Rw62Fn8EtxjEYWHXRvjS43YtueEewbS6ObfXcJNyohjHqVKFPoXXUxwc+q1K7Dee6vv9g=="
    crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
@endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex">
                <h2>{{ __('Frontend/frontend.invoices') }}</h2>
                <a href="" class="btn btn-primary ml-auto"><i class="fa fa-plus"></i> {{
                    __('Frontend/frontend.create_invoice') }}</a>
            </div>


            <div class="table-responsive">
                <table class="table card-table">
                    <thead>
                        <tr>
                            <th>{{ __('Frontend/frontend.customer_name') }}</th>
                            <th>{{ __('Frontend/frontend.invoice_date') }}</th>
                            <th>{{ __('Frontend/frontend.total_due') }}</th>
                            <th>{{ __('Frontend/frontend.actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- @foreach($invoices as $invoice) --}}
                        <tr>
                            <td><a href="">aze</a>
                            </td>
                            <td>2014-03-12</td>
                            <td>10 000 000.00</td>
                            <td>
                                <a href="" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i></a>
                                <a href="javascript:void(0)"
                                    onclick="if (confirm('{{ __('Frontend/frontend.r_u_sure') }}')) { document.getElementById('delete-').submit(); } else { return false; }"
                                    class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                <form action="" method="post" id="delete-5" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                        {{-- @endforeach --}}
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="4">
                                <div class="float-right">
                                    {{-- {!! $invoices->links() !!} --}}
                                </div>
                            </td>
                        </tr>
                    </tfoot>
                </table>
            </div>


        </div>
    </div>
</div>


@endsection
