@extends('dashboard.index')
@section('conten') 




    {{-- <div class="row mt-2 mb-3">
        <div class="col-lg-12 margin-tb">
          
            <div class="float-left">
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
<div class="row mt-2 mb-3">
    <div class="float-left">
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
      Tambah PLC
      </button>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah PLC</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        
          <form action="{{ route('plcs.store') }}" method="POST">
              @csrf
              <div class="card-body">
                <div class="form-group">
                  <label for="">Nama PLC</label>
                  <input type="text" class="form-control" id="" name="nama_plc" placeholder="">
                </div>
                <div class="form-group">
                  <label for="">Variable PLC</label>
                  <input type="text" class="form-control" id="" name="var_plc" placeholder="">
                </div>
                <div class="form-group">
                  <label for="">Adress</label>
                  <input type="text" class="form-control" id="" name="address" placeholder="">
                </div>

                <div class="form-group">
                  <label for="">Type</label>
                  <input type="text" class="form-control" id="" name="type" placeholder="">
                </div>

                <div class="form-group">
                  <label for="">Location</label>
                  <input type="text" class="form-control" id="" name="location" placeholder="">
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

                   <!-- <a class="btn btn-info btn-sm" href="{{ route('plcs.index',$plc->id) }}">Show</a> -->

                    <a class="btn btn-primary btn-sm" data-toggle="modal" data-target="#modal-edit{{ $plc->id }}" href="#" >Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="bi bi-trash"></i></button>
                </form>
            </td>
            @include('plc.edit')
        </tr>
        @endforeach
    </table>

    {!! $plcs->links() !!}

@endsection
