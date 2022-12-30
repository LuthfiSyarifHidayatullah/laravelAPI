@extends('posts.admin-dash-layout')
@section('title', 'index')

@section('content')
<div class="container">
<div class="row mt-3 mb-3">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Tambah Buku</h2>
        </div>
       
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data" >
    @csrf

     <div class="row">
        <div class="col-xs-10 col-sm-10 col-md-10">
            <div class="form-group">
                <strong>Nama buku:</strong>
                <input type="text" name="nama_buku" class="form-control" placeholder="nama buku">
            </div>
        </div>

        <div class="col-xs-10 col-sm-10 col-md-10">
            <div class="form-group">
                <strong>File</strong>
                <input type="file" name="name" class="form-control" placeholder="file" id="chooseFile">
            </div>
        </div>

        <div class="col-xs-10 col-sm-10 col-md-10">
            <div class="form-group">
                <strong>Gambar</strong>
                <input type="file" name="file_path" class="form-control" placeholder="file" id="chooseFile">
            </div>
        </div>
    
        <div class="col-xs-10 col-sm-10 col-md-10">
            <div class="form-group">
                <label for="jurusan">Jurusan</label>
                <select name="jurusan_id" id="jurusan" class="form-control">
                    <option disabled selected>Pilih Jurusan</option>
                    @foreach($jurusan as $jur)
                    <option value="{{ $jur->id }}"> {{ $jur->nama_jurusan }}</option>
                    @endforeach
                </select>
            </div>
        </div>



        <div class="col-xs-10 col-sm-10 col-md-10">
            <div class="form-group">
                <label for="kelas">Kelas</label>
                <select name="kelas_id" id="kelas" class="form-control">
                    <option disabled selected>Pilih Kelas</option>
                    @foreach($kelas as $kls)
                    <option value="{{ $kls->id }}"> {{ $kls->nama_kelas }}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="col-xs-10 col-sm-10 col-md-10">
            <div class="form-group">
                <strong>Nama Pengirim:</strong>
                <input type="text" name="author" class="form-control" placeholder="{{ Auth::user()->name }}" value=" {{ Auth::user()->name }}">
            </div>
        </div>

    
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
</div>
@endsection
