@extends('pian-app.master')

@method('GET')

@section('title', 'AdminLTE 3 | Edit Data Pegawai')

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>General Form</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
              <li class="breadcrumb-item active">Edit Data Pegawai</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Data Pegawai</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{ route('pian-app.updatepegawai', $pegawais->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="card-body">
                    <div class="form-group">
                        <label for="nama_pegawai">Nama Pegawai:</label>
                        <input type="text" class="form-control" id="nama_pegawai" name="nama" value="{{ $pegawais->nama }}"> 
                        <label for="nik">NIK Pegawai :</label>
                        <input type="text" class="form-control" id="nik" name="nik" value="{{ $pegawais->nik }}">
                        <label for="ktp">Ganti Foto KTP :</label> </br>
                        <td><img src="{{ asset('images/' . $pegawais->gambar) }}" height="200" width="200"></td>
                        <input type="file" class="form-control" id="ktp" name="gambar">
                        <label for="jns_pegawai">Jenis Pegawai :</label>
                        <select name="jenisPegawai_id" id="jns_pegawai" class="form-control">
                            <option value="{{ $pegawais->jenisPegawai_id }}" selected hidden>{{ $pegawais->nama_jenisPegawai }}</option>
                            @foreach($jnsPegawais as $jnsPegawai)
                            <option value="{{ $jnsPegawai->id }}">{{ $jnsPegawai->nama }}</option>
                            @endforeach
                        </select>
                        <label for="status_pegawai">Status Pegawai :</label>
                        <select name="statusPegawai_id" id="status_pegawai" class="form-control">
                            <option value="{{ $pegawais->statusPegawai_id }}" selected hidden>{{ $pegawais->nama_statusPegawai }}</option>
                            @foreach($stsPegawais as $stsPegawai)
                            <option value="{{ $stsPegawai->id }}">{{ $stsPegawai->nama }}</option>
                            @endforeach
                        </select>
                        <label for="unit">Unit :</label>
                        <input type="text" class="form-control" id="unit" name="unit" value="{{ $pegawais->unit }}">
                        <label for="sub_unit">Sub-Unit :</label>
                        <input type="text" class="form-control" id="sub_unit" name="sub_unit" value="{{ $pegawais->sub_unit }}">
                        <label for="pendidikan">Pendidikan :</label>
                        <select name="pendidikan_id" id="pendidikan" class="form-control">
                            <option value="{{ $pegawais->pendidikan_id }}" selected hidden>{{ $pegawais->nama_pendidikan }}</option>
                            @foreach($pendidikans as $pendidikan)
                            <option value="{{ $pendidikan->id }}">{{ $pendidikan->nama }}</option>
                            @endforeach
                        </select>
                        <label for="tgl_lahir">Tanggal Lahir :</label>
                        <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="{{ $pegawais->tgl_lahir }}">
                        <label for="tmpt_lahir">Kota Kelahiran :</label>
                        <input type="text" class="form-control" id="tmpt_lahir" name="tmpt_lahir" value="{{ $pegawais->tmpt_lahir }}">
                        <label for="jns_kel">Jenis Kelamin :</label>
                        <select name="jnsKel_id" id="jns_kel" class="form-control">
                            <option value="{{ $pegawais->jnsKel_id }}" selected hidden>{{ $pegawais->nama_jnsKel }}</option>
                            @foreach($jnsKelamins as $jnsKel)
                            <option value="{{ $jnsKel->id }}">{{ $jnsKel->nama }}</option>
                            @endforeach
                        </select>
                        <label for="nama_agama">Agama Pegawai :</label>
                        <select name="agama_id" id="nama_agama" class="form-control">
                            <option value="{{ $pegawais->agama_id }}" selected hidden>{{ $pegawais->nama_agama }}</option>
                            @foreach($agamas as $agama)
                            <option value="{{ $agama->id }}">{{ $agama->nama }}</option>
                            @endforeach
                        </select>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
                <!-- /.card-body -->

                
              </form>
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
@endsection

@push('aditional-css')
    <link rel="stylesheet" href="path-to-aditional-css.css">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
@endpush

@push('aditional-js')
    <script src="path-to-aditional-script.js"></script>
    <!-- jQuery -->
    <script src="plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- bs-custom-file-input -->
    <script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
    <!-- AdminLTE App -->
    <script src="dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="dist/js/demo.js"></script>
    <!-- Page specific script -->
    <script>
    $(function () {
    bsCustomFileInput.init();
    });
    </script>
@endpush