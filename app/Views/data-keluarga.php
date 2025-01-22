<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Keluarga</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Keluarga</li>
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
                <h3 class="card-title">Data Keluarga</h3>
                <div class="card-tools">
                  <?php
                  if (session('level')!='asn') {
                    ?>
                  <a href="/asn" class="btn btn-secondary"><i class="fa fa-arrow-left"></i> Kembali</a>
                    <?php
                  }
                  ?>
                  <a href="/keluarga/create/<?php echo $id_asn ?>" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>
                </div>
              </div>
              
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                  <th>No</th>
                  <th>Nama</th>
                  <th>Jenis Kelamin</th>
                  <th>Usia</th>
                  <th>Status Hubungan dalam Keluarga</th>
                  <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $no=1;
                   foreach ($keluarga as $item):
                    ?>
                  <tr>
                  <td><?= $no++; ?></td>
                  <td><?= htmlspecialchars($item['nama']) ?></td>
                  <td><?= htmlspecialchars($item['jenis_kelamin']) ?></td>
                  <td><?= htmlspecialchars($item['usia']).' Tahun' ?></td>
                  <td><?= htmlspecialchars($item['posisi']) ?></td>
                  <td>
                      <a href="/keluarga/edit/<?= $item['id_keluarga'] ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                      <a href="/keluarga/delete/<?= $item['id_keluarga'] ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
