@extends('dashboard.index')
@section('conten')



    {{-- <div class="row mt-3 mb-3">
        <div class="col-lg-12 margin-tb">

            <div class="float-left">
                <a class="btn btn-success" href="{{ route('barang.create') }}"> Tambah Barang</a>
            </div>
        </div>
    </div> --}}

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

    <div class="row mt-2 mb-3">
      <div class="float-left">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        Tambah Barang
        </button>
      </div>
  </div>


      <!-- Modal -->
      <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Barang</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form action="{{ route('barang.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                      <div class="form-group">
                        <label for="">Nama Barang</label>
                        <input type="text" class="form-control" id="" name="nama_barang" placeholder="">
                      </div>
                      <div class="form-group">
                        <label for="">Jenis Barang</label>
                        <input type="text" class="form-control" id="" name="jenis_barang" placeholder="">
                      </div>
                      <div class="form-group">
                        <label for="">Stok</label>
                        <input type="text" class="form-control" id="" name="stok" placeholder="">
                      </div>


                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                  </form>
            </div>

          </div>
        </div>
      </div>




<!-- Modal Edit -->


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
        @foreach ($barang as $post)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $post->nama_barang }}</td>
            <td>{{ $post->jenis_barang }}</td>
            <td>{{ $post->stok }}</td>
            <td>{{ $post->created_at }}</td>
            <td>{{ $post->updated_at }}</td>
            <td class="text-center">
                <form action="{{ route('barang.destroy',$post->id) }}" method="POST">

                  {{-- <a class="btn btn-info btn-sm" href="{{ route('barang.show',$post->id) }}">Show</a>  --}}

                    <a class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#modal-edit{{ $post->id }}" href="#">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="bi bi-trash"></i></button>
                </form>
            </td>
            @include('posts.edit')
        </tr>
        @endforeach
    </table>




    {!! $barang->links() !!}

@endsection
