@extends('layouts.main')
@section('container')


<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

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

    {{-- <table  class="table" >
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

    {!! $plcs->links() !!} --}}

    <p class="h1">Addres PLC</p>
    <table id="reportPlcTable" class="table">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Nama PLC</th>
                <th>Variable PLC</th>
                <th>Address</th>
                <th>Type</th>
                <th>Location</th>
                <th>Di Update</th>
               
             
            </tr>
        </thead>
    </table>
  
  
  <!-- Edit Modal -->
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Report Barang</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="editForm">
                    @csrf
                    @method('PUT')
                    <input type="hidden" id="plcId" name="id">
                    <div class="form-group">
                        <label for="nama_barang">Nama Plc</label>
                        <input type="text" class="form-control" id="nama_plc" name="nama_plc">
                    </div>
                    <div class="form-group">
                        <label for="jenis_barang">Var PLC</label>
                        <input type="text" class="form-control" id="var_plc" name="var_plc">
                    </div>
                    <div class="form-group">
                        <label for="stok">Address</label>
                        <input type="text" class="form-control" id="address" name="address">
                    </div>
                    <div class="form-group">
                      <label for="stok">Type</label>
                      <input type="text" class="form-control" id="type" name="type">
                    </div>
                    <div class="form-group">
                      <label for="stok">Location</label>
                      <input type="text" class="form-control" id="location" name="location">
                  </div>
  
  
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
  </div>
  
  <script>
    $(document).ready(function() {
        // Mengatur token CSRF di header permintaan AJAX
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
  
        var table = $('#reportPlcTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('plc.data') }}',
            columns: [
                { 
                    data: null, 
                    name: 'no', 
                    orderable: false, 
                    searchable: false, 
                    render: function (data, type, row, meta) {
                        return meta.row + meta.settings._iDisplayStart + 1;
                    } 
                },
                { data: 'nama_plc', name: 'nama_plc' },
                { data: 'var_plc', name: 'var_plc' },
                { data: 'address', name: 'address' },
                { data: 'type', name: 'type' },
                { data: 'location', name: 'location' },
                { data: 'updated_at', name: 'updated_at' },
              
            ]
        });
  
       
  
        // Handle form submit for updating record
        
  
        // Handle delete button click
       
    });
  </script>
  
  

@endsection
