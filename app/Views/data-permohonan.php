<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Permohonan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Permohonan</li>
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
                <h3 class="card-title">DataTable Permohonan</h3>
                <?php

                            if (session('level')!='approver') {
                                ?>
                <div class="card-tools">
                  <a href="/permohonan/create" class="btn btn-primary"><i class="fa fa-plus"></i>Tambah</a>
                </div>
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
                    <th>NIP</th>
                    <th>No HP</th>
                    <th>Jabatan</th>
                    <th>Gaji Pokok</th>
                    <th>Golongan Pangkat</th>
                    <th>Instansi Pemohon</th>
                    <th>Alamat Sekarang</th>
                    <th>Nomor Rumah Dinas</th>
                    <th>Rumah Ditempati</th>
                    <th>Tanggal Ditempati</th>
                    <th>Keterangan</th>
                    <th>File SK</th>
                    <th>File KTP</th>
                    <th>File KK</th>
                    <th>File Pas Foto</th>
                    <th>File Foto Rumah</th>
                    <th>ID ASN</th>
                    <th>ID Keluarga</th>
                    <th>Bersedia Menaati Peraturan</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php foreach ($permohonan as $item): 
                       $no=1;?>
                  <tr>
                  <td><?= $no++; ?></td>
                    <td><?= htmlspecialchars($item['nama_pemohon']) ?></td>
                    <td><?= htmlspecialchars($item['nip']) ?></td>
                    <td><?= htmlspecialchars($item['no_hp']) ?></td>
                    <td><?= htmlspecialchars($item['jabatan']) ?></td>
                    <td><?= htmlspecialchars($item['gaji_pokok']) ?></td>
                    
           
              
                    <td><?= isset($item['id_instansipemohon']) ? htmlspecialchars($instansipemohon[$item['id_instansipemohon']]['nama_instansipemohon']) : 'N/A' ?></td>
                    <td><?= htmlspecialchars($item['alamat_sekarang']) ?></td>
                   
                    <td><?= htmlspecialchars($item['nomor_rumah_dinas']) ?></td>
                    <td><?= htmlspecialchars($item['rumah_ditempati']) ?></td>
                    <td><?= htmlspecialchars($item['tanggal_ditempati']) ?></td>
                    <td><?= htmlspecialchars($item['keterangan']) ?></td>
                    <td>
                      <a href="<?= base_url('uploads/permohonan/' . $item['file_sk']) ?>" target="_blank">View File SK</a>
                    </td>
                    <td>
                      <a href="<?= base_url('uploads/permohonan/' . $item['file_ktp']) ?>" target="_blank">View File KTP</a>
                    </td>
                    <td>
                      <a href="<?= base_url('uploads/permohonan/' . $item['file_kk']) ?>" target="_blank">View File KK</a>
                    </td>
                    <td>
                      <a href="<?= base_url('uploads/permohonan/' . $item['file_pas_foto']) ?>" target="_blank">View File Pas Foto</a>
                    </td>
                    <td>
                      <a href="<?= base_url('uploads/permohonan/' . $item['file_foto_rumah']) ?>" target="_blank">View File Foto Rumah</a>
                    </td>
                   
                    <td><?= htmlspecialchars($item['id_asn']) ?></td>
                    <td><?= htmlspecialchars($item['id_keluarga']) ?></td>
                    <td><?= htmlspecialchars($item['bersedia_menaati_peraturan']) ?></td>
                    <td>
                      <a href="/permohonan/edit/<?= $item['id_pemohon'] ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                      <a href="/permohonan/delete/<?= $item['id_pemohon'] ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
