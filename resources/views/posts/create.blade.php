@extends('template')

@section('content')
<div class="row mt-5 mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Create New Post</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-secondary" href="{{ route('posts.index') }}"> Back</a>
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
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama buku:</strong>
                <input type="text" name="nama_buku" class="form-control" placeholder="nama buku">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>File</strong>
                <input type="file" name="name" class="form-control" placeholder="file" id="chooseFile">
            </div>
        </div>

    
        <div class="col-xs-12 col-sm-12 col-md-12">
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

        <div class="col-xs-12 col-sm-12 col-md-12">
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


        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Url:</strong>
                <textarea class="form-control" style="height:150px" name="url" placeholder="url"></textarea>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>

</form>
@endsection
