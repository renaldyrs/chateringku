@extends('layouts.admin')
@section('content')

<div class="wrapper">
        <!-- Sidebar  -->
       @include('layouts.partial.sidebar')
       
       <!-- Content here -->
       <h2>Daftar Pegawai</h2>
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
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add_pegawai"><i class="fas fa-user-plus"></i>  Add Pegawai</button>
            </div>
        </div>
        </div>
        
        <!-- modal add_pegawai begin -->
        <form action="/admin_pegawai/tambah" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="modal fade" id="add_pegawai" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"><i class="fas fa-user-plus"></i>  Tambah Karyawan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-3">Nama Lengkap</div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Nama Depan" name="depan"> 
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Nama Depan" name="belakang">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-3">No HP</div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="No Hp" name="no_hp">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-3">Alamat</div>
                            <div class="col-md-9">
                                <textarea class="form-control" rows="5" id="comment" name="alamat"></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-3">Foto Profil</div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="foto">Masukkan Foto</label>
                                    <input type="file" class="form-control-file" id="foto" name="file">
                                </div>
                            </div>
                        </div>
                    
                    </div>
                </div>
                <div class="modal-footer">
                    <button  class="btn btn-danger" data-dismiss="modal"><i class="fas fa-times"></i>  Batal</button>
                    <button  class="btn btn-primary"><i class="fas fa-save"></i> Simpan</button>
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
                            <div class="col-3">Nama Lengkap</div>
                            <div class="col-md-9">
                                <div class="row">
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Nama Depan">
                                    </div>
                                    <div class="col">
                                        <input type="text" class="form-control" placeholder="Nama Depan">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-3">Email</div>
                            <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="Email">
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-3">Alamat</div>
                            <div class="col-md-9">
                                <textarea class="form-control" rows="5" id="comment"></textarea>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-3">Foto Profil</div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="foto">Masukkan Foto</label>
                                    <input type="file" class="form-control-file" id="foto">
                                </div>
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
        <!-- profil begin -->
        <div class="container-fluid">
            <div class="card-deck">
            @if($pegawai)
                @foreach($pegawai as $p)
                <div class="card">
                    <img class="card-img-top" src="..." alt="Card image cap">
                    <div class="card-body">
                        <h5 class="card-title">{{$p['nama_pegawai']}}</h5>
                        <p class="card-text">{{$p['bagian']}}</p>
                        <p class="card-text">{{$p['no_hp']}}</p>
                        <p class="card-text">{{$p['alamat']}}</p>
                    </div>
                    <div class="card-footer">
                        <small><center>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#ubah_pegawai"><i class="fas fa-user-edit"></i>  Ubah</button>
                        <a  class="btn btn-warning" href="/admin_pegawai/hapus/{{$p->id_pegawai}}"><i class="fas fa-times"></i> Hapus</a>
                        </center></small>
                    </div>
                </div>
                @endforeach
            @endif
            </div>
        </div>
        <!-- profil end -->


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