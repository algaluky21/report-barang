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
        <i class="bi bi-clipboard2-plus"></i> Tambah PLC
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

    {{-- <table class="table table-bordered">
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
            <td>{{ $plc->updated_at ? $plc->updated_at->format('d-m-Y') : 'Tanggal tidak tersedia'}}</td>
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

    {!! $plcs->links() !!} --}}

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
              <th>Action</th>
           
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
              { data: 'action', name: 'action', orderable: false, searchable: false }
          ]
      });

      // Handle edit button click
      $('#reportPlcTable').on('click', '.edit', function() {
          var id = $(this).data('id');
          $.get('{{ url('plcs') }}/' + id, function(data) {
                  $('#plcId').val(data.id);
                  $('#nama_plc').val(data.nama_plc);
                  $('#var_plc').val(data.var_plc);
                  $('#address').val(data.address);
                  $('#type').val(data.type);
                  $('#location').val(data.location);
                  $('#editModal').modal('show'); // Tampilkan modal
          }).fail(function() {
              alert("Failed to fetch data.");
          });
      });

      // Handle form submit for updating record
      $('#editForm').on('submit', function(e) {
          e.preventDefault();

          var id = $('#plcId').val();
          $.ajax({
              url: '{{ url('plcs') }}/' + id,
              type: 'PUT',
              data: $(this).serialize(),
              success: function(result) {
                  $('#editModal').modal('hide');
                  table.ajax.reload();
                  Swal.fire(
                      'Updated!',
                      'Record updated successfully.',
                      'success'
                  );
              },
              error: function(xhr) {
                  Swal.fire(
                      'Error!',
                      'There was an error updating the record.',
                      'error'
                  );
              }
          });
      });

      // Handle delete button click
      $('#reportPlcTable').on('click', '.delete', function() {
          var id = $(this).data('id');
          Swal.fire({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
              if (result.isConfirmed) {
                  $.ajax({
                      url: '{{ url('plc/delete') }}/' + id,
                      type: 'DELETE',
                      success: function(result) {
                          table.ajax.reload();
                          Swal.fire(
                              'Deleted!',
                              'Record has been deleted.',
                              'success'
                          );
                      },
                      error: function(xhr) {
                          Swal.fire(
                              'Error!',
                              'There was an error deleting the record.',
                              'error'
                          );
                      }
                  });
              }
          });
      });
  });
</script>

@endsection
