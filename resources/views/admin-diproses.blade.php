@extends('layouts.admin')
@section('content')

<div class="wrapper">
        <!-- Sidebar  -->
       @include('layouts.partial.sidebar')
       
       <!-- Content here -->
       <h2>Pesanan Diproses</h2>
       <br>
       <div class="container-fluid">
        <!-- Modal diterima-->
        <div class="modal fade" id="terima" tabindex="-1" role="dialog" aria-labelledby="terima" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="terima">Terima Pesanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah anda ingin <b>Menerima Pesanan tersebut.</b>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tidak</button>
                <button type="button" class="btn btn-success">Iya</button>
            </div>
            </div>
        </div>
        </div>
        <!-- modal diterima -->
        <!-- Modal batalkan-->
        <div class="modal fade" id="batal" tabindex="-1" role="dialog" aria-labelledby="batal" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="batal">Batalkan Pesanan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah anda ingin <b>Membatalkan Pesanan tersebut.</b>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Tidak</button>
                <button type="button" class="btn btn-danger">Iya</button>
            </div>
            </div>
        </div>
        </div>
        <!-- modal batalkan -->

        <!-- tabel -->
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <table class="table">
                        <thead class="thead-light">
                            <tr>
                            <th scope="col">No.</th>
                            <th scope="col">First</th>
                            <th scope="col">Last</th>
                            <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>
                                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#terima">
                                Terima
                                </button>
                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#batal">
                                Batal
                                </button>
                            </td>
                            </tr>
                            <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                            </tr>
                            <tr>
                            <th scope="row">3</th>
                            <td>Larry</td>
                            <td>the Bird</td>
                            <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        


@endsection
@push('scripts')
    @include('layouts.partial.script')
    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
@endpush