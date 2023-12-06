<!-- Modal -->
<div class="modal fade" id="TambahDataModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Data</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method='POST' enctype="multipart/form-data">
                @csrf
				        <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12">
                        <div class="mb-3">
                            <label for="title" class="form-label">Judul</label>
                            <input type="text" class="form-control" name='title' id="title" placeholder="Masukkan judul modul.." value="{{ Session::get('title') }}">
                        </div>
                        <div class="mb-3">
                            <label for="modul" class="form-label">File Modul</label>
                            <input type="file" name="modul" id="modul" class="form-control">
                        </div>
                        
                    </div>
                    

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-success" name="submit">Simpan</button>
                </div>
            </form>
          
        </div>
      </div>
    </div>
  </div>