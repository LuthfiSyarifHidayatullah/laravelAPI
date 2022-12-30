@extends('posts.admin-dash-layout')
@section('title', 'index')

@section('content')
<div class="container">
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Edit Buku</h2>
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

    <form action="{{ route('posts.update',$post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

         <div class="row">
            <div class="col-xs-10 col-sm-10 col-md-10">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="nama_buku" value="{{ $post->nama_buku }}" class="form-control" placeholder="Title">
                </div>
            </div>

            <div class="col-xs-10 col-sm-10 col-md-10">
                <div class="form-group">
                    <strong>Jurusan:</strong>
                    <select name="jurusan_id" id="jurusan" class="form-control select2">
                    <option  value="{{ $post->jurusan->nama_jurusan }}" disabled selected>{{ $post->jurusan->nama_jurusan }} </option>
                    @foreach($jur as $jr)
                    <option @if($jr->id == $post->jurusan_id) selected @endif value="{{ $jr->id }}"> {{$jr->nama_jurusan }}</option>
                    @endforeach
                </select>
                </div>
            </div>


            <div class="col-xs-10 col-sm-10 col-md-10">
                <div class="form-group">
                    <strong>Kelas:</strong>
                    <select name="kelas_id" id="kelas" class="form-control select2">
                    <option value="{{ $post->kelas->nama_kelas }}" disabled selected>{{ $post->kelas->nama_kelas }}</option>
                    @foreach($kelas as $kls)
                    <option @if($kls->id == $post->kelas_id) selected @endif value="{{ $kls->id }}"> {{ $kls->nama_kelas }}</option>
                    @endforeach
                </select>
                </div>
            </div>

            <div class="col-xs-10 col-sm-10 col-md-10">
            <div class="form-group">
                <strong>File</strong>
                <input type="file" name="name" class="form-control" placeholder="file" id="chooseFile">
                <p value="{{$post->name}}"> {{ $post->name }} </p>

            </div>
        </div>

        <div class="col-xs-10 col-sm-10 col-md-10">
            <div class="form-group">
                <strong>Gambar</strong>
                <input type="file" name="file_path" class="form-control" placeholder="file" id="chooseFile">
                <p value="{{$post->file_path}}"> {{ $post->file_path }} </p>

            </div>
        </div>
            
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
    </div>
@endsection
