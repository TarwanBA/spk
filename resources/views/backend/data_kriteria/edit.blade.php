  <!-- Modal Tambah Alternatif Batik-->
  @foreach ($Kriteria as $kriteria)
  <div class="modal fade" id="EditData{{ $kriteria->id_kriteria }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <Form action="{{route('kriteria.update', $kriteria->id_kriteria) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">

                    <div class="form-group">
                        <label for="nama_kriteria">Nama Kriteria</label>
                        <input type="text" class="form-control" id="nama_kriteria" name="nama_kriteria" value="{{old('kriteria', $kriteria->nama_kriteria)}}" required>
                    </div>

                    <div class="form-group">
                        <label for="kode">Kode Kriteria</label>
                        <input type="text" class="form-control" id="kode" name="kode" value="{{old('kriteria', $kriteria->kode)}}" required>
                    </div>

                    <div class="form-group">
                        <label for="bobot_kriteria">Nilai Kriteria</label>
                        <input type="text" class="form-control" id="bobot_kriteria" name="bobot_kriteria" value="{{old('kriteria', $kriteria->bobot_kriteria)}}" required>
                    </div>

                    <div class="form-group">
                        <label for="bobot_kepentingan">Bobot Kriteria</label>
                        <input type="text" class="form-control" id="bobot_kepentingan" name="bobot_kepentingan" value="{{old('kriteria', $kriteria->bobot_kepentingan)}}" required>
                    </div>

                    <div class="form-group">
                        <label for="jenis">Jenis Kriteria</label>
                        <input type="text" class="form-control" id="jenis" name="jenis" value="{{old('kriteria', $kriteria->jenis)}}" required>
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