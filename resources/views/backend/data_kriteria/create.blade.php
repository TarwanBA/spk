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
            <Form action="{{route('kriteria.tambah')}}" method="POST">
                @csrf
                <div class="modal-body">
                    
                    <div class="form-group">
                        <label for="nama_kriteria">Nama Kriteria</label>
                        <input type="text" class="form-control" id="nama_kriteria" name="nama_kriteria" placeholder="Isi Nama Kriteria" required>
                    </div>

                    <div class="form-group">
                        <label for="kode">Kode Kriteria</label>
                        <input type="text" class="form-control" id="kode" name="kode" placeholder="Isi Kode Kriteria" required>
                    </div>

                    <div class="form-group">
                        <label for="bobot_kriteria">Nilai Kriteria</label>
                        <input type="text" class="form-control" id="bobot_kriteria" name="bobot_kriteria" placeholder="Isi Nilai Kriteria" required>
                    </div>

                    <div class="form-group">
                        <label for="bobot_kepentingan">Bobot Kriteria</label>
                        <input type="text" class="form-control" id="bobot_kepentingan" name="bobot_kepentingan" placeholder="Isi Bobot Kriteria" required>
                    </div>

                    <div class="form-group">
                        <label for="jenis">Jenis Kriteria</label>
                        <input type="text" class="form-control" id="jenis" name="jenis" placeholder="Isi Jenis Kriteria" required>
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

  