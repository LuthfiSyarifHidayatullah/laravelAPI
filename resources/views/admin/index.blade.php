@extends('posts.admin-dash-layout')
@section('title', 'index')

@section('content')
<div class="container">    
<div class="row mt-5 mb-3">
        
        <div class="col-lg-12 margin-tb">
            
          
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th width="10px" class="text-center">No</th>
            <th>Nama</th>
            <th>Email</th>
            <th>role</th>
           
        </tr>
        @foreach ($admin as $adm)
        <tr>
            <td class="text-center"></td>
            <td>{{ $adm->name }}</td>
            <td>{{ $adm->email }}</td>
            <td>{{ $adm->role }}</td>
        </tr>
       
        @endforeach
        
    </table>
    
</div>


@endsection
