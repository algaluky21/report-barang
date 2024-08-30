@extends('dashboard.index')
@section('conten') 




    <div class="row mt-2 mb-3">
        <div class="col-lg-12 margin-tb">
          
            <div class="float-left">
                <a class="btn btn-success" href="{{ route('plcs.create') }}"> Tambah PLC</a>
            </div>
        </div>
    </div>

{{-- <div class="row">
    <div class="input-group mb-3">
        <input type="text" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="basic-addon2">
        <div class="input-group-append">
          <button class="btn btn-outline-secondary" type="button">Button</button>
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
            <th>Nama PLC</th>
            <th>Variabel PLC</th>
            <th>Address</th>
            <th>Type</th>
            <th>Location</th>
            <th>Terakhir Diubah</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach ($plcs as $plc)
        <tr>
            <td class="text-center">{{ ++$i }}</td>
            <td>{{ $plc->nama_plc }}</td>
            <td>{{ $plc->var_plc }}</td>
            <td>{{ $plc->address }}</td>
            <td>{{ $plc->type }}</td>
            <td>{{ $plc->location }}</td>
            <td>{{ $plc->updated_at }}</td>
            <td class="text-center">
                <form action="{{ route('plcs.destroy',$plc->id) }}" method="POST">

                   <!-- <a class="btn btn-info btn-sm" href="{{ route('posts.show',$plc->id) }}">Show</a> -->

                    <a class="btn btn-primary btn-sm" href="{{ route('plcs.edit',$plc->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="bi bi-trash"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $plcs->links() !!}

@endsection
