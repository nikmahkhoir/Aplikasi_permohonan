<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Pemohon Baru </h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pemohon Baru </li>
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
          
        <div class="col-2"></div>
          <div class="col-8">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Pemohon Baru</h3>
                <?php

                            if (session('level')!='approver') {
                                ?>
                <div class="card-tools">
                  <a href="/permohonan/create" class="btn btn-primary"><i class="fa fa-plus"></i>Tambah</a>
                </div>
                <?php } ?>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <table class="table table-striped table-bordered table-hover">
        
        <tbody>
            <?php if (!empty($pemohon)): ?>
                <?php foreach ($pemohon as $index => $item): ?>
                <tr>
                    <td class="text-center"><?= $index + 1 ?></td>
                    <td class="text-center"><?= htmlspecialchars($item['nama']) ?></td>
                    <td class="text-center">
                        <a href="/permohonan/detail/<?= $item['id_pemohon'] ?>" class="btn btn-primary btn-sm">Periksa Permohonan</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="3" class="text-center">Tidak ada permohonan yang harus diproses.</td>
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
