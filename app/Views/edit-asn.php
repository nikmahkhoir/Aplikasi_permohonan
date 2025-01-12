<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Edit ASN</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Edit ASN</li>
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
                <h3 class="card-title">Edit ASN</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <form action="/asn/update/<?= $asn['id_asn']; ?>" method="post">
                                        <div class="form-group">
                                            <label for="nama">Nama</label>
                                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $asn['nama']; ?>" onkeypress="return hanyaHuruf(event)" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="gelar_depan">Gelar Depan</label>
                                            <input type="text" class="form-control" id="gelar_depan" name="gelar_depan" value="<?= $asn['gelar_depan']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="gelar_belakang">Gelar Belakang</label>
                                            <input type="text" class="form-control" id="gelar_belakang" name="gelar_belakang" value="<?= $asn['gelar_belakang']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="nip">NIP</label>
                                            <input type="text" class="form-control" id="nip" name="nip" value="<?= $asn['nip']; ?>" maxlength="18" onkeypress="return hanyaAngka(event)" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="no_ktp">No KTP</label>
                                            <input type="text" class="form-control" id="no_ktp" name="no_ktp" maxlength="16" onkeypress="return hanyaAngka(event)" value="<?= $asn['no_ktp']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="no_kk">No KK</label>
                                            <input type="text" class="form-control" id="no_kk" name="no_kk" onkeypress="return hanyaAngka(event)" value="<?= $asn['no_kk']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="npwp">NPWP</label>
                                            <input type="text" class="form-control" id="npwp" name="npwp" value="<?= $asn['npwp']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <textarea class="form-control" id="alamat" name="alamat" required><?= $asn['alamat']; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="no_hp">No HP</label>
                                            <input type="text" class="form-control" id="no_hp" name="no_hp" onkeypress="return hanyaAngka(event)" value="<?= $asn['no_hp']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="instansi_pemohon">Instansi Pemohon <span class="text-danger">*</span></label>
                                            <select class="form-control select2bs4" id="instansi_pemohon" name="instansi_pemohon" required>
                                                <option value="">Pilih Instansi Pemohon</option>
                                                <?php foreach ($instansipemohon as $item): ?>
                                                    <option <?php echo $asn['id_instansipemohon']==$item['id_instansipemohon']?'selected':'' ?> value="<?= $item['id_instansipemohon'] ?>"><?= $item['nama_instansipemohon'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="instansi_pemohon">Golongan Pangkat <span class="text-danger">*</span></label>
                                            <select class="form-control select2bs4" id="id_golonganpangkat" name="id_golonganpangkat" required>
                                                <option value="">Pilih Golongan Pangkat</option>
                                                <?php foreach ($golongan as $item): ?>
                                                    <option <?php echo $asn['id_golonganpangkat']==$item['id_golonganpangkat']?'selected':'' ?> value="<?= $item['id_golonganpangkat'] ?>"><?= $item['nama_golonganpangkat'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="no_hp">Jabatan <span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="jabatan" value="<?= $asn['jabatan']; ?>" name="jabatan" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="no_hp">Gaji Pokok<span class="text-danger">*</span></label>
                                            <input type="text" class="form-control" id="gaji_pokok" value="<?= $asn['gaji_pokok']; ?>" name="gaji_pokok" onkeypress="return hanyaAngka(event)" onkeyup="formatRupiah(this)" required>
                                        </div>
                                        <button type="submit" class="btn btn-success">Simpan Perubahan</button>
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