<div class="modal fade" id="modal-edit{{ $plc->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Data PLC</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form action="{{ route('plcs.update',$plc->id) }}" method="POST"> 
            @csrf
            @method('PUT')
                <div class="card-body">
                  <div class="form-group">
                    <label for="">Nama Barang</label>
                    <input type="text" class="form-control" id=""   value="{{$plc->nama_plc }}" name="nama_plc" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="">Jenis Barang</label>
                    <input type="text" class="form-control" id=""   value="{{ $plc->var_plc }}" name="var_plc" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="">Stok</label>
                    <input type="text" class="form-control" id=""  value="{{ $plc->address }}" name="address" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="">Stok</label>
                    <input type="text" class="form-control" id=""  value="{{ $plc->type }}" name="type" placeholder="">
                  </div>
                  <div class="form-group">
                    <label for="">Stok</label>
                    <input type="text" class="form-control" id=""  value="{{ $plc->location }}" name="location" placeholder="">
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