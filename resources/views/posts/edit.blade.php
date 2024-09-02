<div class="modal fade" id="modal-editt{{ $post->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ route('barang.update',$post->id) }}" method="POST"> 
          @csrf
          @method('PUT')
              <div class="card-body">
                <div class="form-group">
                  <label for="">Nama Barang</label>
                  <input type="text" class="form-control" id=""   value="{{$post->nama_barang }}" name="nama_barang" placeholder="">
                </div>
                <div class="form-group">
                  <label for="">Jenis Barang</label>
                  <input type="text" class="form-control" id=""   value="{{ $post->jenis_barang }}" name="jenis_barang" placeholder="">
                </div>
                <div class="form-group">
                  <label for="">Stok</label>
                  <input type="text" class="form-control" id=""  value="{{ $post->stok }}" name="stok" placeholder="">
                </div>
                <div class="form-group">
            
               
                
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