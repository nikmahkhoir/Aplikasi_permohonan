<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit Keluarga</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit Keluarga</li>
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
                <h3 class="card-title">Edit Keluarga</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <form action="/keluarga/update/<?php echo $keluarga['id_keluarga']; ?>" method="post">
                            <div class="form-group">
                                <label for="nama">Nama <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $keluarga['nama']; ?>" onkeypress="return hanyaHuruf(event)" required>
                                <input type="hidden" class="form-control" id="id_asn" name="id_asn" value="<?php echo $keluarga['id_asn']; ?>"  required>
                            </div>
                            <div class="form-group">
                                <label for="jenis_kelamin">Jenis Kelamin <span class="text-danger">*</span></label>
                                <select class="form-control" id="jenis_kelamin" name="jenis_kelamin" required>
                                    <option value="">Pilih Jenis Kelamin</option>
                                    <option value="L" <?php echo ($keluarga['jenis_kelamin'] == 'L') ? 'selected' : ''; ?>>Laki-laki</option>
                                    <option value="P" <?php echo ($keluarga['jenis_kelamin'] == 'P') ? 'selected' : ''; ?>>Perempuan</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="usia">Usia <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="usia" name="usia" value="<?php echo $keluarga['usia']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="posisi">Posisi <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="posisi" name="posisi" value="<?php echo $keluarga['posisi']; ?>" required>
                            </div>
                            <button type="submit" class="btn btn-success">Update Data</button>
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