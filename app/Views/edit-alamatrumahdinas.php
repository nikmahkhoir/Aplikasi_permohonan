<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Alamat Rumah Dinas</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Alamat Rumah Dinas</li>
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
                <h3 class="card-title">Edit Alamat Rumah Dinas</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <form action="/alamatrumahdinas/update/<?= $alamatrumahdinas['id_alamatrumahdinas']; ?>" method="post">
                                        <div class="form-group">
                                            <label for="nama_alamat">Alamat Rumah Dinas</label>
                                            <input type="text" class="form-control" id="nama_alamatrumahdinas" name="nama_alamatrumahdinas" value="<?= $alamatrumahdinas['nama_alamatrumahdinas']; ?>" required>
                                        </div>
                                        
                                        <div class="d-flex justify-content-between">
                                            <a href="/alamatrumahdinas" class="btn btn-danger">Batal</a>
                                            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                                        </div>
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