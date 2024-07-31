  <!-- Modal Tambah Alternatif Batik-->
  @foreach ($Alternatif as $alternatif)
  <div class="modal fade" id="EditData{{ $alternatif->id_alternatif }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <Form action="{{route('alternatif.update', $alternatif->id_alternatif) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">

                    <div class="form-group">
                        <label for="nama_alternatif">Nilai Kualitas Kain</label>
                        <select class="custom-select" id="nama_alternatif" name="nama_alternatif" required>
                        @foreach ($produkbatik as $batik)                 
                        <option value="{{ old('nama_alternatif', $batik->nama_produk) }}" {{ old('nama_alternatif', $alternatif->nama_alternatif) == old('nama_alternatif', $batik->nama_produk) ? 'selected' : ''}}>
                          {{ old('nama_alternatif', $batik->nama_produk)}}
                        </option>
                        @endforeach                                             
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="kode">Kode Alternatif</label>
                        <input type="text" class="form-control" id="kode" name="kode" value="{{ old('alternatif', $alternatif->kode)}}" required>
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
  @endforeach