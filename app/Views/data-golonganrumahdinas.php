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
                <h3 class="card-title">DataTable Golongan Rumah Dinas</h3>
                <div class="card-tools">
                  <a href="/golonganrumahdinas/create" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Golongan Rumah</th>
                    <th>Biaya Sewa</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php if (!empty($golongan_rumah) && is_array($golongan_rumah)): ?>
                  <?php foreach ($golongan_rumah as $item):
                  $no=1;
                     ?>
                  <tr>
                    <td><?= $no++; ?></td>
                    <td><?= htmlspecialchars($item['golongan_rumah']) ?></td>
                    <td><?= htmlspecialchars($item['biaya_sewa']) ?></td>
                    <td>
                      <a href="/golonganrumahdinas/edit/<?= htmlspecialchars($item['id_golrum']) ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                      <a href="/golonganrumahdinas/delete/<?= htmlspecialchars($item['id_golrum']) ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                  <?php else: ?>
                  <tr>
                    <td colspan="4" class="text-center">Tidak ada data golongan rumah dinas.</td>
                  </tr>
                  <?php endif; ?>
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
