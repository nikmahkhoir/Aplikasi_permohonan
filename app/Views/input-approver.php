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
              <form action="/approver/store" method="post">
                            <div class="form-group">
                                <label for="nama">Nama <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="nama" name="nama" onkeypress="return hanyaHuruf(event)" required>
                            </div>
                            <div class="form-group">
                                <label for="nip">NIP <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="nip" name="nip" maxlength="18" onkeypress="return hanyaAngka(event)" required>
                            </div>
                            <div class="form-group">
                                <label for="tingkatan">Tingkatan <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="tingkatan" name="tingkatan" required>
                            </div>
                            <div class="form-group">
                                <label for="tingkatan">Username <span class="text-danger">* email harus valid</span></label>
                                <input type="email" class="form-control" id="username" name="username" required>
                            </div>
                            <div class="form-group">
                                <label for="tingkatan">Password <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <button type="submit" class="btn btn-success">Simpan Data</button>
                            <a href="/approver" class="btn btn-danger">Batal</a>
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