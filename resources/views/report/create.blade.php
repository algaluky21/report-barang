<div class="modal fade" id="modal-post" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
            <form action="{{ route('reports.store') }}" method="POST">
                @csrf
                <div class="card-body">
                  <div class="form-group">
                    <label for="">Nama Barang</label>
                    <select name=" " type="" class="form-control">
                      <option value="Pilih"></option>
                      {{-- @foreach($barangs as $brg)
                      <option value="{{ $brg->id }}">{{ $brg->$nama_barang }}</option> 
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="">Nama Pengambil</label>
                    <input type="text" class="form-control" id="" name="nama_pengambil" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="">Keperluan</label>
                    <input type="text" class="form-control" id="" name="keperluan" placeholder="">
                  </div>
                  <div class="form-group">
                      <label for="">Jumlah</label>
                      <input type="text" class="form-control" id="" name="jumlah" placeholder="">
                  </div> --}}
                  
                 
                  
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