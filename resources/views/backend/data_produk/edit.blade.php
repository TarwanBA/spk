@foreach ($produkbatik as $batik)
    
  <!-- Modal Tambah Produk Batik-->
  <div class="modal fade" id="EditData{{$batik->id_produk}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <Form action="{{route("produk.update", $batik->id_produk)}}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">

                    <div class="form-group">
                        <label for="nama_produk">Nama Produk</label>
                        <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="{{ old('nama_produk',$batik->nama_produk)}}" required>
                    </div>

                    <div class="form-group">
                    <label for="kualitas_kain">Nilai Kualitas Kain</label>
                    <select class="custom-select" id="kualitas_kain" name="kualitas_kain" required>
                        <option value="{{ old('kualitas_kain',$batik->kualitas_kain)}}">{{ old('kualitas_kain',$batik->kualitas_kain)}}</option>
                        <option value="5">Sangat Baik</option>
                        <option value="4">Baik</option>
                        <option value="3">Kurang</option>
                    </select>
                    </div>

                    <div class="form-group">
                    <label for="harga">Harga Produk</label>
                    <select class="custom-select" id="harga" name="harga" required>
                      <option value="{{ old('harga',$batik->harga)}}">{{ old('harga',$batik->harga)}}</option>
                        <option value="5">Rp.150.000 - Rp.200.000</option>
                        <option value="4">Rp.100.000 - Rp.150.000</option>
                        <option value="3">Rp.50.000 - Rp.100.000</option>
                    </select>
                    </div>

                    <div class="form-group">
                    <label for="warna">Nilai Kualitas Warna</label>
                    <select class="custom-select" id="warna" name="warna" required>
                      <option value="{{ old('warna',$batik->warna)}}">{{ old('warna',$batik->warna)}}</option>
                        <option value="5">Sangat Baik</option>
                        <option value="4">Baik</option>
                        <option value="3">Kurang</option>
                    </select>
                    </div>

                    <div class="form-group">
                    <label for="teknik_pembuatan">Nilai Teknik Pembuatan</label>
                    <select class="custom-select" id="teknik_pembuatan" name="teknik_pembuatan" required>
                      <option value="{{ old('teknik_pembuatan',$batik->teknik_pembuatan)}}">{{ old('teknik_pembuatan',$batik->teknik_pembuatan)}}</option>
                        <option value="5">Sangat Baik</option>
                        <option value="4">Baik</option>
                        <option value="3">Kurang</option>
                    </select>
                    </div>

                    <div class="form-group">
                    <label for="desain_motif">Nilai Dessain Motif</label>
                    <select class="custom-select" id="desain_motif" name="desain_motif" required>
                      <option value="{{ old('desain_motif',$batik->desain_motif)}}">{{ old('desain_motif',$batik->desain_motif)}}</option>
                        <option value="5">Sangat Baik</option>
                        <option value="4">Baik</option>
                        <option value="3">Kurang</option>
                    </select>
                    </div>

                    <div class="form-group">
                    <label for="keaslian">Nilai Keaslian & Asal</label>
                    <select class="custom-select" id="keaslian" name="keaslian" required>
                      <option value="{{ old('keaslian',$batik->keaslian)}}">{{ old('keaslian',$batik->keaslian)}}</option>
                        <option value="5">Sangat Baik</option>
                        <option value="4">Baik</option>
                        <option value="3">Kurang</option>
                    </select>
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