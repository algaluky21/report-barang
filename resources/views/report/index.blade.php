@extends('dashboard.index')
@section('conten')

<link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>


  <div class="row mt-2 mb-3">
    <div class="float-left">
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
        <i class="bi bi-clipboard2-plus"></i> Tambah Report 
      </button>
    </div>
</div>

    
    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="staticBackdropLabel">Tambah Report</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            
            <form action="{{ route('reports.store') }}" method="POST">
                @csrf
                <div class="card-body">
                  
                  <div class="form-group">
                    <label for="">Nama Pengambil</label>
                    <input type="text" class="form-control" id="" name="nama_pengambil" placeholder="">
                  </div>

                  <div class="form-group">
                    <label for="">Barang yang Diambil</label>
                    <select name="barang_id" type="" class="form-control">
                            <option value=" ">--Pilih--</option>
                      @foreach($barangs as $rpt)
                            <option value="{{ $rpt->id }}">{{ $rpt->nama_barang }}</option> 
                      @endforeach
                    </select>
                  </div>

                  <div class="form-group">
                    <label for="">Keperluan</label>
                    <input type="text" class="form-control" id="" name="keperluan" placeholder="">
                  </div>

                  <div class="form-group">
                      <label for="">Jumlah</label>
                      <input type="text" class="form-control" id="" name="jumlah" placeholder="">
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

    
    <!-- Modal -->
    

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

    {{-- <table class="table table-bordered">
        <tr>
            <th width="20px" class="text-center">No</th> 
            <th>Nama Pengambil</th>
            <th>Barang Yang Diambil</th>
            <th>Keperluan</th>
            <th>Jumblah Ambil</th>
            <th>Tanggal</th>
            
        </tr>
        @foreach ($report_barangs as $rpt)
        <tr>
            <td class="text-center">{{ ++$i }}</td> 
            <td>{{ $rpt?->nama_pengambil }}</td>
            <td>{{ $rpt?->barang?->nama_barang }}</td>
            <td>{{ $rpt?->keperluan }}</td>
            <td>{{ $rpt?->jumlah }}</td>
            <td>{{ $rpt?->created_at ? $rpt->created_at->format('d-m-Y') : 'Tanggal tidak tersedia'}}</td>
       
        </tr>
        @endforeach
    </table>

    {!! $report_barangs->links() !!}  --}}

   
  
    <table id="reportBarangsTable" class="table">
        <thead class="thead-dark">
            <tr>
                <th>No</th>
                <th>Nama Pengambil</th>
                <th>Barang Yang Diambil</th>
                <th>Jenis Barang</th>
                <th>Keperluan</th>
                <th>Jumlah</th>
                <th>Tgl Pengambilan</th>
             
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
                    <input type="hidden" id="reportBarangId" name="id">
                    <div class="form-group">
                        <label for="barang_id">Nama Barang</label>
                        <select id="barang_id" name="barang_id" class="form-control" required>
                            <!-- Isi dengan opsi barang dari database -->
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama_pengambil">Nama Pengambil</label>
                        <input type="text" id="nama_pengambil" name="nama_pengambil" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="keperluan">Keperluan</label>
                        <input type="text" id="keperluan" name="keperluan" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah</label>
                        <input type="number" id="jumlah" name="jumlah" class="form-control" required>
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

        var table = $('#reportBarangsTable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{{ route('report-barangs.data') }}',
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
                { data: 'nama_pengambil', name: 'nama_pengambil' },
                { data: 'barang_nama', name: 'barang.nama_barang' },
                { data: 'barang_jenis', name: 'barang.jenis_barang' },
                { data: 'keperluan', name: 'keperluan' },
                { data: 'jumlah', name: 'jumlah' },
                { data: 'created_at', name: 'created_at' },
                // { data: 'action', name: 'action', orderable: false, searchable: false }
            ]
        });

        // Handle edit button click
        $('#reportBarangsTable').on('click', '.edit', function() {
            var id = $(this).data('id');
            $.get('{{ url('report-barangs') }}/' + id, function(data) {
                $('#reportBarangId').val(data.id);
                $('#barang_id').val(data.barang_id);
                $('#nama_pengambil').val(data.nama_pengambil);
                $('#keperluan').val(data.keperluan);
                $('#jumlah').val(data.jumlah);
                $('#editModal').modal('show');
            }).fail(function() {
                alert("Failed to fetch data.");
            });
        });

        // Handle form submit for updating record
        $('#editForm').on('submit', function(e) {
            e.preventDefault();

            var id = $('#reportBarangId').val();
            $.ajax({
                url: '{{ url('report-barangs') }}/' + id,
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
        $('#reportBarangsTable').on('click', '.delete', function() {
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
                        url: '{{ url('report-barangs') }}/' + id,
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
