<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Instansi Pemohon</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Instansi PemohonDinas</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
        <div class="col-2"></div>
          <div class="col-8">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Edit Instansi Pemohon</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <form action="/instansipemohon/update/<?= htmlspecialchars($instansipemohon['id_instansipemohon']); ?>" method="post">
                                        <div class="form-group">
                                            <label for="nama_instansipemohon">Nama Instansi Pemohon</label>
                                            <input type="text" class="form-control" id="nama_instansipemohon" name="nama_instansipemohon" value="<?= htmlspecialchars($instansipemohon['nama_instansipemohon']); ?>" required>
                                        </div>
                                        <!-- <div class="d-flex justify-content-between"> -->
                                          <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                                            <a href="/instansipemohon" class="btn btn-danger">Batal</a>
                                        <!-- </div> -->
                                    </form>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>