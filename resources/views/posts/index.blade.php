@extends('dashboard.index')
@section('conten')

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>

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
          <i class="bi bi-clipboard2-plus"></i> Tambah Barang
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






    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
{{-- 
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
            <td>{{ $post->created_at ? $post->created_at->format('d-m-Y') : 'Tanggal tidak tersedia'}}</td>
            <td>{{ $post->updated_at ? $post->updated_at->format('d-m-Y') : 'Tanggal tidak tersedia'}}</td>
            <td class="text-center">
                <form action="{{ route('barang.destroy',$post->id) }}" method="POST">

                  {{-- <a class="btn btn-info btn-sm" href="{{ route('barang.show',$post->id) }}">Show</a>    

                    <a class="btn btn-primary btn-sm"  data-toggle="modal" data-target="#modal-editt{{ $post->id }}" href="#">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="bi bi-trash"></i></button>
                </form>
            </td>
            @include('posts.edit')
        </tr>
        @endforeach
    </table>




    {!! $barang->links() !!} --}}

    

   
     
      <table id="barangsTable" class="table">
          <thead class="thead-dark">
              <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Jenis Barang</th>
                <th>Stok</th>
                <th>Ditambahkan</th>
                <th>Di Updated</th>
                <th>Action</th>
              </tr>
          </thead>
      </table>


  <!-- Modal for editing -->
  <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="editModalLabel">Edit Barang</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <form id="editForm">
                      @csrf
                      @method('PUT')
                      <input type="hidden" id="barangId" name="id">
                      <div class="form-group">
                          <label for="nama_barang">Nama Barang</label>
                          <input type="text" class="form-control" id="nama_barang" name="nama_barang">
                      </div>
                      <div class="form-group">
                          <label for="jenis_barang">Jenis Barang</label>
                          <input type="text" class="form-control" id="jenis_barang" name="jenis_barang">
                      </div>
                      <div class="form-group">
                          <label for="stok">Stok</label>
                          <input type="number" class="form-control" id="stok" name="stok">
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

          var table = $('#barangsTable').DataTable({
          processing: true,
          serverSide: true,
          ajax: '{{ route('barangs.data') }}',
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
        { data: 'nama_barang', name: 'nama_barang' },
        { data: 'jenis_barang', name: 'jenis_barang' },
        { data: 'stok', name: 'stok' },
        { data: 'created_at', name: 'created_at' },
        { data: 'updated_at', name: 'updated_at' },
        { data: 'action', name: 'action', orderable: false, searchable: false }
    ]
});

          // Edit button click event
          $('#barangsTable').on('click', '.edit', function() {
              var id = $(this).data('id');
              $.get('{{ url('barangs') }}/' + id, function(data) {
                  $('#barangId').val(data.id);
                  $('#nama_barang').val(data.nama_barang);
                  $('#jenis_barang').val(data.jenis_barang);
                  $('#stok').val(data.stok);
                  $('#editModal').modal('show'); // Tampilkan modal
              }).fail(function() {
                  alert("Failed to fetch data.");
              });
          });

          // Handle form submit
          $('#editForm').on('submit', function(e) {
    e.preventDefault();

    var id = $('#barangId').val();
    $.ajax({
        url: '{{ url('barangs') }}/' + id,
        type: 'PUT',  // pastikan metode ini adalah PUT
        data: $(this).serialize(),
        success: function(result) {
            if (result.success) {
                $('#editModal').modal('hide');
                $('#barangsTable').DataTable().ajax.reload();
                Swal.fire(
                    'Updated!',
                    'Record updated successfully.',
                    'success'
                );
            } else {
                Swal.fire(
                    'Error!',
                    'There was an error updating the record.',
                    'error'
                );
            }
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

          // Delete button click event
          $('#barangsTable').on('click', '.delete', function() {
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
                          url: '{{ url('barangs/delete') }}/' + id,
                          type: 'DELETE',
                          success: function(result) {
                              if (result.success) {
                                  table.ajax.reload();
                                  Swal.fire(
                                      'Deleted!',
                                      'Your file has been deleted.',
                                      'success'
                                  );
                              } else {
                                  Swal.fire(
                                      'Error!',
                                      'There was an error deleting the record.',
                                      'error'
                                  );
                              }
                          }
                      });
                  }
              });
          });
      });
  </script>
      
     


@endsection
