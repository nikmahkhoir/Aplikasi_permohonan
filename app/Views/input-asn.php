<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tambah ASN</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tambah ASN</li>
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
                <h3 class="card-title">Tambah ASN</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <form action="/asn/store" method="post">
                            <div class="form-group">
                                <label for="nama">Nama <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="nama" name="nama" onkeypress="return hanyaHuruf(event)" required>
                            </div>
                            <div class="form-group">
                                <label for="gelar_depan">Gelar Depan</label>
                                <input type="text" class="form-control" id="gelar_depan" name="gelar_depan">
                            </div>
                            <div class="form-group">
                                <label for="gelar_belakang">Gelar Belakang</label>
                                <input type="text" class="form-control" id="gelar_belakang" name="gelar_belakang">
                            </div>
                            <div class="form-group">
                                <label for="nip">NIP <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="nip" name="nip" maxlength="18" onkeypress="return hanyaAngka(event)" required>
                            </div>
                            <div class="form-group">
                                <label for="no_ktp">No KTP <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="no_ktp" name="no_ktp" maxlength="16" onkeypress="return hanyaAngka(event)" required>
                            </div>
                            <div class="form-group">
                                <label for="no_kk">No KK <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="no_kk" name="no_kk" onkeypress="return hanyaAngka(event)" required>
                            </div>
                            <div class="form-group">
                                <label for="npwp">NPWP</label>
                                <input type="text" class="form-control" id="npwp" name="npwp">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat <span class="text-danger">*</span></label>
                                <textarea class="form-control" id="alamat" name="alamat" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="no_hp">No HP <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="no_hp" name="no_hp" onkeypress="return hanyaAngka(event)" required>
                            </div>
                            <div class="form-group">
                                <label for="instansi_pemohon">Instansi Pemohon <span class="text-danger">*</span></label>
                                <select class="form-control select2bs4" id="instansi_pemohon" name="instansi_pemohon" required>
                                    <option value="">Pilih Instansi Pemohon</option>
                                    <?php foreach ($instansipemohon as $item): ?>
                                        <option value="<?= $item['id_instansipemohon'] ?>"><?= $item['nama_instansipemohon'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="instansi_pemohon">Golongan Pangkat <span class="text-danger">*</span></label>
                                <select class="form-control select2bs4" id="id_golonganpangkat" name="id_golonganpangkat" required>
                                    <option value="">Pilih Golongan Pangkat</option>
                                    <?php foreach ($golongan as $item): ?>
                                        <option value="<?= $item['id_golonganpangkat'] ?>"><?= $item['nama_golonganpangkat'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="no_hp">Jabatan <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="jabatan" name="jabatan" required>
                            </div>
                            <div class="form-group">
                                <label for="no_hp">Gaji Pokok<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="gaji_pokok" name="gaji_pokok" onkeypress="return hanyaAngka(event)" onkeyup="formatRupiah(this)" required>
                            </div>
                            <button type="submit" class="btn btn-success">Simpan Data</button>
                            <a href="/asn" class="btn btn-danger">Batal</a>
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