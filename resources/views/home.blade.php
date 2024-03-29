@extends('posts.admin-dash-layout')
@section('title', 'index')

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <table class="table table-bordered">
        <tr>
           
            <th>Nama buku</th>
            <th>Jurusan</th>
            <th>Kelas</th>
           <th>File</th>
           <th>Author</th>
            <th width="300px"class="text-center">Action</th>
        </tr>
        @foreach ($posts as $post)
        <tr>
          
            <td>{{ $post->nama_buku }}</td>
            <td>{{ $post->jurusan->nama_jurusan ?? 'None' }}</td>
            <td>{{ $post->kelas->nama_kelas ?? 'None' }}</td>
            <td>{{ $post->name }}</td>
            <td>{{ $post->author }}</td>
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

{{ $posts->links() }}



@endsection