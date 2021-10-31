@extends('main')
@section('title')
Liste des clients
@endsection
@section('content')
<h2 class="mt-4 text-center">Liste des Clients</h2>
<div class="table-responsive">
    <table class="table table-centered table-nowrap mb-0 rounded">
        <thead class="thead-light">
            <tr>
                <th class="border-0 rounded-start">Country</th>
                <th class="border-0">All</th>
                <th class="border-0 rounded-end">All Change</th>
            </tr>
        </thead>
        <tbody>
            <!-- Item -->
            <tr>
                <td class="border-0">
                    <a href="#" class="d-flex align-items-center">
                        <img class="me-2 image image-small rounded-circle" alt="Image placeholder"
                            src="../../assets/img/flags/united-states-of-america.svg">
                        <div><span class="h6">United States</span></div>
                    </a>
                </td>
                <td class="border-0 font-weight-bold">106</td>
                <td class="border-0 text-danger">
                    <span class="fas fa-angle-down"></span>
                    <span class="font-weight-bold">5</span>
                </td>
            </tr>
            <!-- End of Item -->
            <!-- Item -->
            <tr>
                <td class="border-0">
                    <a href="#" class="d-flex align-items-center">
                        <img class="me-2 image image-small rounded-circle" alt="Image placeholder"
                            src="../../assets/img/flags/canada.svg">
                        <div><span class="h6">Canada</span></div>
                    </a>
                </td>
                <td class="border-0 font-weight-bold">76</td>
                <td class="border-0 text-success">
                    <span class="fas fa-angle-up"></span>
                    <span class="font-weight-bold">17</span>
                </td>
            </tr>
            <!-- End of Item -->
            <!-- Item -->
            <tr>
                <td class="border-0">
                    <a href="#" class="d-flex align-items-center">
                        <img class="me-2 image image-small rounded-circle" alt="Image placeholder"
                            src="../../assets/img/flags/united-kingdom.svg">
                        <div><span class="h6">United Kingdom</span></div>
                    </a>
                </td>
                <td class="border-0 font-weight-bold">147</td>
                <td class="border-0 text-success">
                    <span class="fas fa-angle-up"></span>
                    <span class="font-weight-bold">10</span>
                </td>
            </tr>
            <!-- End of Item -->
            <!-- Item -->
            <tr>
                <td class="border-0">
                    <a href="#" class="d-flex align-items-center">
                        <img class="me-2 image image-small rounded-circle" alt="Image placeholder"
                            src="../../assets/img/flags/france.svg">
                        <div><span class="h6">France</span></div>
                    </a>
                </td>
                <td class="border-0 font-weight-bold">112</td>
                <td class="border-0 text-success">
                    <span class="fas fa-angle-up"></span>
                    <span class="font-weight-bold">3</span>
                </td>
            </tr>
            <!-- End of Item -->
            <!-- Item -->
            <tr>
                <td class="border-0">
                    <a href="#" class="d-flex align-items-center">
                        <img class="me-2 image image-small rounded-circle" alt="Image placeholder"
                            src="../../assets/img/flags/japan.svg">
                        <div><span class="h6">Japan</span></div>
                    </a>
                </td>
                <td class="border-0 font-weight-bold">115</td>
                <td class="border-0 text-danger">
                    <span class="fas fa-angle-down"></span>
                    <span class="font-weight-bold">12</span>
                </td>
            </tr>
            <!-- End of Item -->
            <!-- Item -->
            <tr>
                <td class="border-0">
                    <a href="#" class="d-flex align-items-center">
                        <img class="me-2 image image-small rounded-circle" alt="Image placeholder"
                            src="../../assets/img/flags/germany.svg">
                        <div><span class="h6">Germany</span></div>
                    </a>
                </td>
                <td class="border-0 font-weight-bold">220</td>
                <td class="border-0 text-danger">
                    <span class="fas fa-angle-down"></span>
                    <span class="font-weight-bold">56</span>
                </td>
            </tr>
            <!-- End of Item -->
        </tbody>
    </table>
</div>
@endsection
