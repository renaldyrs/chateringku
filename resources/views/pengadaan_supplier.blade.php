@extends('layouts.admin')
@section('content')

<div class="wrapper">
        <!-- Sidebar  -->
       @include('layouts.partial.sidebar2')
       
       <!-- Content here -->
       <h2>Daftar Supplier</h2>
       <br>
       <div class="container-fluid">
            
       <div class="row">
        <div class="col">
            colom kosong
            </div>
            <div class="col-12 col-md-auto">
            colom search
            </div>
            <div class="col col-lg-2">
                <button type="button" class="btn btn-success btn-lg active" data-toggle="modal" data-target="#add_pegawai"><i class='fas fa-plus'></i></i>  Add Supplier</button>
            </div>
        </div>
        </div>
        
        <!-- modal add_produk begin -->
        <form action="">
        <div class="modal fade" id="add_pegawai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class='fas fa-plus'></i>  Tambah Supplier</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-3">Nama Supplier</div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" placeholder="Email">
                                </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-3">Alamat Produk</div>
                            <div class="col-md-9">
                                <textarea class="form-control" rows="5" id="comment"></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-3">No. Handphone</div>
                                <div class="col-md-9">
                                    <input type="text" class="form-control" placeholder="Email">
                                </div>
                        </div>
                        <br>
                        
                    
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i>  Batal</button>
                    <button type="button" class="btn btn-primary "><i class="fas fa-save"></i> Simpan</button>
                </div>
            </div>
            </div>
        </div>
        </form>
        <!-- modal add_pegawai end -->
        <!-- modal ubah begin -->
        <form action="">
        <div class="modal fade" id="ubah_pegawai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user-edit"></i>  Edit Data Karyawan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                    <div class="row">
                            <div class="col-3">Nama Supplier</div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="Email">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-3">Alamat Supplier</div>
                            <div class="col-md-9">
                                <textarea class="form-control" rows="5" id="comment"></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-3">No. Handphone</div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="Email">
                            </div>
                        </div>
                    
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i>  Batal</button>
                    <button type="button" class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
                </div>
            </div>
            </div>
        </div>
        </form>
        <!-- modal ubah end -->
        <br><br>
        <!-- tabel begin -->
        <div class="container-fluid">
        <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col"><center>No.</center></th>
                    <th scope="col"><center>Nama Supplier</center></th>
                    <th scope="col"><center>Alamat Supplier</center></th>
                    <th scope="col"><center>No.HP Supplier</center></th>
                    <th scope="col"><center>Action</center></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                    <th scope="row">1</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td><center><button type="button" class="btn btn-info" data-toggle="modal" data-target="#ubah_pegawai"><i class='fas fa-pencil-alt'></i>  Ubah</button>
                            <button type="button" class="btn btn-warning"><i class="fas fa-times"></i> Hapus</button>
                        </center></td>
                    </tr>
                    <tr>
                    <th scope="row">2</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td><center><button type="button" class="btn btn-info" data-toggle="modal" data-target="#ubah_pegawai"><i class='fas fa-pencil-alt'></i>  Ubah</button>
                            <button type="button" class="btn btn-warning"><i class="fas fa-times"></i> Hapus</button>
                        </center></td>
                    </tr>
                    <tr>
                    <th scope="row">3</th>
                        <td>Mark</td>
                        <td>Otto</td>
                        <td>@mdo</td>
                        <td><center><button type="button" class="btn btn-info" data-toggle="modal" data-target="#ubah_pegawai"><i class='fas fa-pencil-alt'></i>  Ubah</button>
                            <button type="button" class="btn btn-warning"><i class="fas fa-times"></i> Hapus</button>
                        </center></td>
                    </tr>
                </tbody>
            </table>
        </div>
        </div>
        </div>
        <!-- tabel end -->


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