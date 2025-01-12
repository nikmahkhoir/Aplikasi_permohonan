<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Golongan Rumah Dinas</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Golongan Rumah Dinas</li>
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
                <h3 class="card-title">Tambah Golongan Rumah Dinas</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <form action="/golonganrumahdinas/store" method="post">
                            <div class="form-group">
                                <label for="golongan_rumah">Golongan Rumah <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="golongan_rumah" name="golongan_rumah" required>
                            </div>
                            <div class="form-group">
                                <label for="biaya_sewa">Biaya Sewa <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" onkeypress="return hanyaAngka(event)" onkeyup="formatRupiah(this)" id="biaya_sewa" name="biaya_sewa" required>
                            </div>
                            <button type="submit" class="btn btn-success">Simpan Data</button>
                            <a href="/golonganrumahdinas" class="btn btn-danger">Batal</a>
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