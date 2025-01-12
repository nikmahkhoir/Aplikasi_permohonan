<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Golongan Pangkat</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Golongan Pangkat</li>
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
                <h3 class="card-title">Data Golongan Pangkat</h3>
                <div class="card-tools">
                  <a href="/golonganpangkat/create" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Nama Golongan Pangkat</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($golonganpangkat as $index => $item): ?>
                                                <tr>
                                                    <td><?= $index + 1 ?></td>
                                                    <td><?= $item['nama_golonganpangkat'] ?></td>
                                                    <td>
                                                        <a href="/golonganpangkat/edit/<?= $item['id_golonganpangkat'] ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                                        <a href="/golonganpangkat/delete/<?= $item['id_golonganpangkat'] ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
</div>
    <!-- /.content -->
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
