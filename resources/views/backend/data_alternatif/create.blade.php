  <!-- Modal Tambah Alternatif Batik-->
  <div class="modal fade" id="TambahData" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <Form action="{{route('alternatif.tambah')}}" method="POST">
                @csrf
                <div class="modal-body">

                    <div class="form-group">
                        <label for="nama_alternatif">Nilai Kualitas Kain</label>
                        <select class="custom-select" id="nama_alternatif" name="nama_alternatif" required>
                            @foreach ($produkbatik as $batik)
                        <option value="{{$batik->nama_produk}}">{{$batik->nama_produk}}</option>
                        @endforeach                                             
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="kode">Kode Alternatif</label>
                        <input type="text" class="form-control" id="kode" name="kode" placeholder="Isi Nama Produk" required>
                    </div>
                    
                </div>

                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>

            </Form>
        </div>
      </div>
    </div>
  </div>

  