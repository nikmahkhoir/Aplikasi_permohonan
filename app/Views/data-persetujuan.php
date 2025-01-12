<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Persetujuan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Persetujuan</li>
            </ol>
          </div>
        </div>
        <?php if (session()->getFlashdata('success')): ?>
              <div class="alert alert-success" id="success-alert">
                  <?= session()->getFlashdata('success') ?>
              </div>
          <?php endif; ?>

          <?php if (session()->getFlashdata('error')): ?>
              <div class="alert alert-danger" id="error-alert">
                  <?= session()->getFlashdata('error') ?>
              </div>
          <?php endif; ?>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Data Persetujuan</h3><br>
                <?php
                if (session('level')!='asn') {
                  ?>
                <form method="POST" action="/persetujuan/export_excel" class="mb-3">
                    <div class="row">
                      <div class="col-md-3">

                        <input type="date" name="tanggal_dari" class="form-control" placeholder="Tanggal Dari" required>
                      </div>
                      <div class="col-md-3">
                        <input type="date" name="tanggal_sampai" class="form-control" placeholder="Tanggal Sampai" required>
                      </div>
                      <div class="input-group-append">
    <button class="btn btn-primary" type="submit" style="background-color: green; color: white;">Cetak Excel</button> &nbsp;&nbsp;&nbsp;
</div>

                        <?php
                          if (session('level')!='asn') {
                            ?>
                          <div class="card-tools">
                            <a href="/pemohon_baru" class="btn btn-primary">Tambah</a>
                          </div>
                            <?php
                          }
                          ?>
                    </div>
                </form>
                  <?php
                }
                ?>
               
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                  <th>No</th>
                    <th>Nama Pemohon</th>
                    <th>Nomor Rumah Dinas</th>
                    <th>Nip</th>
                    <th>No KTP</th>
                    <th>No KK</th>
                    <th>No HP</th>
                    <th>Jabatan</th>
                    <th>Gaji Pokok</th>
                    <th>Golongan Rumah</th>
                    <th>Biaya Sewa</th>
                    <th>Tanggal Mulai</th>
                    <th>Tanggal Berakhir</th>
                    <th>Instansi Pencatatan</th>
                    <th>SKPD Bersangkutan</th>
                    <th>Kepala SKPD</th>
                    <th>NIP Kepala SKPD</th>
                    <th>File SK</th>
                    <th>File KTP</th>
                    <th>File KK</th>
                    <th>File Pas Foto</th>
                    <th>File Foto Rumah</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php $no = 1; foreach ($persetujuan as $item): ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?=$item['nama'] ?></td>
                    <td><?=$item['nomor_rumah_dinas'] ?></td>
                    <td><?=$item['nip'] ?></td>
                    <td><?=$item['no_ktp'] ?></td>
                    <td><?=$item['no_kk'] ?></td>
                    <td><?=$item['no_hp'] ?></td>
                    <td><?=$item['jabatan'] ?></td>
                    <td><?=$item['gaji_pokok'] ?></td>
                    <td><?=$item['golongan_rumah'] ?></td>
                    <td><?=$item['biaya_sewa'] ?></td>
                    <td><?=$item['tanggal_mulai'] ?></td>
                    <td><?=$item['tanggal_berakhir'] ?></td>
                    <td><?=$item['nama_instansipencatatan'] ?></td>
                    <td><?=$item['kop_skpd'] ?></td>
                    <td><?=$item['kepala_skpd'] ?></td>
                    <td><?=$item['nip_kepala_skpd'] ?></td>
                
    <td>
    <a href="data:application/pdf;base64,<?= $item['file_sk']; ?>" download="Surat_Keterangan.pdf">Download SK</a>
    </td>
    <td>
    <a href="data:image/png;base64,<?= $item['file_ktp']; ?>" download="KTP_<?php echo $item['nama'] ?>"><img src="data:image/jpg;base64,<?= $item['file_ktp']; ?>" alt="KTP" height="80px" width="80px"></a>
    </td>
    <td>
    <a href="data:image/png;base64,<?= $item['file_kk']; ?>" download="KK_<?php echo $item['nama'] ?>"><img src="data:image/jpg;base64,<?= $item['file_kk']; ?>" alt="KK" height="80px" width="80px"></a>
    </td>
    <td>
    <a href="data:image/png;base64,<?= $item['file_pas_foto']; ?>" download="Pas_foto_<?php echo $item['nama'] ?>"><img src="data:image/jpg;base64,<?= $item['file_pas_foto']; ?>" alt="Pas Foto" height="80px" width="80px"></a>
    </td>
    <td>
    <a href="data:image/png;base64,<?= $item['file_foto_rumah']; ?>" download="Foto_rumah_<?php echo $item['nama'] ?>"><img src="data:image/jpg;base64,<?= $item['file_foto_rumah']; ?>" alt="File Foto Rumah" height="80px" width="80px"></a>
    </td>

                    <td>
                      <a href="/persetujuan/download/<?= $item['id_persetujuan'] ?>" class="btn btn-success btn-sm"><i class="fa fa-download"></i></a>
                      <!-- <a href="/persetujuan/delete/<?= $item['id_persetujuan'] ?>" class="btn btn-danger btn-sm">Hapus</a> -->
                    </td>
                  </tr>
                  <?php endforeach; ?>
                  </tbody>
                
                </table>
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

  <script>
    // Function to hide alerts after 2 seconds
    setTimeout(function() {
        var successAlert = document.getElementById('success-alert');
        var errorAlert = document.getElementById('error-alert');
        if (successAlert) {
            successAlert.style.display = 'none';
        }
        if (errorAlert) {
            errorAlert.style.display = 'none';
        }
    }, 3000);
</script>
