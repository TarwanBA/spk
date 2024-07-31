  <!-- Modal Tambah Produk Batik-->
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
            <Form action="{{route('produk.tambah')}}" method="POST">
                @csrf
                <div class="modal-body">

                    <div class="form-group">
                        <label for="nama_produk">Nama Produk</label>
                        <input type="text" class="form-control" id="nama_produk" name="nama_produk" placeholder="Isi Nama Produk" required>
                    </div>

                    <div class="form-group">
                    <label for="kualitas_kain">Nilai Kualitas Kain</label>
                    <select class="custom-select" id="kualitas_kain" name="kualitas_kain" required>
                        <option value="" disabled selected>Silahkan Pilih</option>
                        <option value="5">Sangat Baik</option>
                        <option value="4">Baik</option>
                        <option value="3">Kurang</option>
                    </select>
                    </div>

                    <div class="form-group">
                    <label for="harga">Harga Produk</label>
                    <select class="custom-select" id="harga" name="harga" required>
                        <option value="" disabled selected>Silahkan Pilih Rentang Harga</option>
                        <option value="5">Rp.150.000 - Rp.200.000</option>
                        <option value="4">Rp.100.000 - Rp.150.000</option>
                        <option value="3">Rp.50.000 - Rp.100.000</option>
                    </select>
                    </div>

                    <div class="form-group">
                    <label for="warna">Nilai Kualitas Warna</label>
                    <select class="custom-select" id="warna" name="warna" required>
                        <option value="" disabled selected>Silahkan Pilih</option>
                        <option value="5">Sangat Baik</option>
                        <option value="4">Baik</option>
                        <option value="3">Kurang</option>
                    </select>
                    </div>

                    <div class="form-group">
                    <label for="teknik_pembuatan">Nilai Teknik Pembuatan</label>
                    <select class="custom-select" id="teknik_pembuatan" name="teknik_pembuatan" required>
                        <option value="" disabled selected>Silahkan Pilih</option>
                        <option value="5">Sangat Baik</option>
                        <option value="4">Baik</option>
                        <option value="3">Kurang</option>
                    </select>
                    </div>

                    <div class="form-group">
                    <label for="desain_motif">Nilai Dessain Motif</label>
                    <select class="custom-select" id="desain_motif" name="desain_motif" required>
                        <option value="" disabled selected>Silahkan Pilih</option>
                        <option value="5">Sangat Baik</option>
                        <option value="4">Baik</option>
                        <option value="3">Kurang</option>
                    </select>
                    </div>

                    <div class="form-group">
                    <label for="keaslian">Nilai Keaslian & Asal</label>
                    <select class="custom-select" id="keaslian" name="keaslian" required>
                        <option value="" disabled selected>Silahkan Pilih</option>
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

  