@extends('layouts.app')
@section('content')
<div class="container">    
<div class="row mt-5 mb-5">
        
        <div class="col-lg-12 margin-tb">
            
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('posts.create') }}"> Tambah Buku</a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th width="10px" class="text-center">No</th>
            <th>Nama buku</th>
            <th>Jurusan</th>
            <th>Kelas</th>
           <th>File</th>
           <th>gambar</th>
            <th width="300px"class="text-center">Action</th>
        </tr>
        @foreach ($posts as $post)
        <tr>
            <td class="text-center"></td>
            <td>{{ $post->nama_buku }}</td>
            <td>{{ $post->jurusan->nama_jurusan ?? 'None' }}</td>
            <td>{{ $post->kelas->nama_kelas ?? 'None' }}</td>
            <td>{{ $post->name }}</td>
            <td class="text-center"><img src="{{ Storage::url('public/img/').$post->file_path }}" class="rounded" style="width: 150px"></td>
            <td class="text-center">
                <form action="{{ route('posts.destroy',$post->id) }}" method="POST">

                    <a class="btn btn-primary btn-sm" href="{{ route('posts.edit',$post->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</div>


@endsection
