<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Approver</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Approver</li>
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
                <h3 class="card-title">Tambah Approver</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="/approver/update/<?= $approver['id_approver']; ?>" method="post">
                                        <div class="form-group">
                                            <label for="nama">Nama</label>
                                            <input type="text" class="form-control" id="nama" name="nama" onkeypress="return hanyaHuruf(event)" value="<?= $approver['nama']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="nip">NIP</label>
                                            <input type="text" class="form-control" id="nip" name="nip" value="<?= $approver['nip']; ?>" maxlength="18" onkeypress="return hanyaAngka(event)" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="tingkatan">Tingkatan</label>
                                            <input type="text" class="form-control" id="tingkatan" name="tingkatan" value="<?= $approver['tingkatan']; ?>" required>
                                        </div>
                                        <!-- <div class="d-flex justify-content-between"> -->
                                            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                                            <a href="/approver" class="btn btn-danger">Batal</a>
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