@extends('layouts.main')
@section('container')




    {{-- <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb">
          
            <div class="float-right">
                <a class="btn btn-success" href="{{ route('plcs.create') }}"> Tambah PLC</a>
            </div>
        </div>
    </div> --}}

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
          
        </tr>
        @endforeach
    </table>

    {!! $plcs->links() !!}

@endsection
