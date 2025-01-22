<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah Keluarga</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tambah Keluarga</li>
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
                <h3 class="card-title">Tambah Keluarga</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <form action="/keluarga/store/<?php echo $id_asn ?>" method="post">
                            <div class="form-group">
                                <label for="nama">Nama <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="nama" name="nama" onkeypress="return hanyaHuruf(event)" required>
                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin <span class="text-danger">*</span></label>
                                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="usia">Usia <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="usia" name="usia" required>
                            </div>
                            <div class="form-group">
                                <label for="posisi">Status Hubungan dalam Keluarga (Suami / Istri / Anak) <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="posisi" name="posisi" required>
                            </div>
                            <button type="submit" class="btn btn-success">Simpan Data</button>
                            <a href="/keluarga" class="btn btn-danger">Batal</a>
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