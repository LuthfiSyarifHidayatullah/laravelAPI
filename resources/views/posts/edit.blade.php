@extends('template')

@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
            <div class="float-left">
                <h2>Edit Buku</h2>
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

    <form action="{{ route('posts.update',$post->id) }}" method="POST"
    enctype="multipart/form-data">
        @csrf
        @method('PUT')

         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Title:</strong>
                    <input type="text" name="nama_buku" value="{{ $post->nama_buku }}" class="form-control" placeholder="Title">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Jurusan:</strong>
                    <select name="jurusan_id" id="jurusan" class="form-control select2">
                    <option  value="{{ $post->jurusan->nama_jurusan }}" disabled selected>{{ $post->jurusan->nama_jurusan }} </option>
                    @foreach($jur as $jr)
                    <option value="{{ $jr->id }}"> {{$jr->nama_jurusan }}</option>
                    @endforeach
                </select>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>File</strong>
                <input type="file" name="name" class="form-control" placeholder="file" id="chooseFile">
                <p value="{{$post->name}}"> {{ $post->name }} </p>

            </div>
        </div>

            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Kelas:</strong>
                    <select name="kelas_id" id="kelas" class="form-control select2">
                    <option value="{{ $post->kelas->nama_kelas }}" disabled selected>{{ $post->kelas->nama_kelas }}</option>
                    @foreach($kelas as $kls)
                    <option value="{{ $kls->id }}"> {{ $kls->nama_kelas }}</option>
                    @endforeach
                </select>
                </div>
            </div>

            


            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>url:</strong>
                    <textarea class="form-control" style="height:150px" name="url" placeholder="url">{{ $post->url }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>

    </form>
@endsection
