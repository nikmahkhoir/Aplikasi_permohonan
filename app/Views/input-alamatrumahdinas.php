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
                <h3 class="card-title">Tambah Alamat Rumah Dinas</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <form action="/alamatrumahdinas/store" method="post">
                            <div class="form-group">
                                <label for="nama_alamatrumahdinas">Alamat Rumah Dinas<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="nama_alamatrumahdinas" name="nama_alamatrumahdinas" required>
                            </div>
                      
                            <button type="submit" class="btn btn-success">Simpan Data</button>
                            <a href="/alamatrumahdinas" class="btn btn-danger">Batal</a>
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