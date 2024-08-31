@extends('dashboard.index')
@section('conten') 



    <div class="row mt-3 mb-3">
        <div class="col-lg-12 margin-tb">
          
            <div class="float-left">
                <a class="btn btn-success" href="{{ route('posts.create') }}"> Tambah Barang</a>
            </div>
        </div>
    </div>

    {{-- <div class="row justify-content-center">
        <div class="col-md-6">
            <form action="/posts">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="Search.." name="search">
                    <button class="btn btn-dark" type="submit"><i class="bi bi-search "></i> Search </button>
                </div>
            </div>
        </div>
    </div> --}}
    
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th width="20px" class="text-center">No</th>
            <th>Nama Barang</th>
            <th>Jenis Barang</th>
            <th>Stock Barang</th>
            <th>Ditambahkan</th>
            <th>Diupdate</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach ($posts as $post)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $post->nama_barang }}</td>
            <td>{{ $post->jenis_barang }}</td>
            <td>{{ $post->stok }}</td>
            <td>{{ $post->created_at }}</td>
            <td>{{ $post->updated_at }}</td>
            <td class="text-center">
                <form action="{{ route('posts.destroy',$post->id) }}" method="POST">

                   <!-- <a class="btn btn-info btn-sm" href="{{ route('posts.show',$post->id) }}">Show</a> -->

                    <a class="btn btn-primary btn-sm" href="{{ route('posts.edit',$post->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="bi bi-trash"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    

    {!! $posts->links() !!}

@endsection
