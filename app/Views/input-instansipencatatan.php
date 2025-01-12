<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Instansi Pencatatan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Instansi Pencatatan</li>
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
                <h3 class="card-title">Tambah Instansi Pencatatan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <form action="/instansipencatatan/store" method="post">
                                        <div class="form-group">
                                            <label for="nama_instansipencatatan">Nama Instansi Pencatatan</label>
                                            <input type="text" class="form-control" id="nama_instansipencatatan" name="nama_instansipencatatan" required>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-success">Simpan</button>
                                        <a href="/instansipencatatan" class="btn btn-danger">Batal</a>
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