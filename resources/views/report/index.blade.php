@extends('dashboard.index')
@section('conten')



<div class="row mt-2 mb-3">
    <div class="float-left">
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-target="#modal-post">
      Report
      </button>
    </div>
</div>
{{-- @include('report.create') --}}

    
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

    <table class="table table-bordered">
        <tr>
            {{-- <th width="20px" class="text-center">No</th> --}}
            <th>Nama Pengambil</th>
            <th>Nama barang</th>
            <th>Keperluan</th>
            <th>Jumblah Ambil</th>
            <th>Tanggal</th>
            <th width="280px"class="text-center">Action</th>
        </tr>
        @foreach ($report_barangs as $rpt)
        <tr>
            {{-- <td class="text-center">{{ ++$i }}</td> --}}
            <td>{{ $rpt?->nama_pengambil }}</td>
            <td>{{ $rpt?->barang?->nama_barang }}</td>
            <td>{{ $rpt?->keperluan }}</td>
            <td>{{ $rpt?->jumlah }}</td>
            <td>{{ $rpt?->created_at }}</td>
            <td class="text-center">
                <form action="{{ route('barang.destroy',$rpt->id) }}" method="POST">
{{-- 
                    <a class="btn btn-info btn-sm" href="{{ route('report.show') }}">Show</a>  --}}

                    <a class="btn btn-primary btn-sm" href="{{ route('barang.edit',$rpt->id) }}">Edit</a>

                    @csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')"><i class="bi bi-trash"></i></button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>

    {!! $report_barangs->links() !!}

@endsection
