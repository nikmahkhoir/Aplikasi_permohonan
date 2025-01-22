<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data ASN</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data ASN</li>
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
                <h3 class="card-title">Data ASN</h3>
                <div class="card-tools">
                  <a href="/asn/create" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>
                </div>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example2" class="table table-bordered table-hover">
                  <thead>
                  <tr>
                  <th>No</th>
                  
                    <th>Nama</th>
                    <th>NIP</th>
                    <th>No KTP</th>
                    <th>No KK</th>
                    <th>NPWP</th>
                    <th>Alamat</th>
                    <th>No HP</th>
                    <th>Instansi</th>
                    <th>Golongan Pangkat</th>
                    <th>Jabatan</th>
                    <th>Gaji Pokok</th>
                    <th>Keluarga</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                  <?php
                  $no=1;
                   foreach ($asn as $item):
                             
                    ?>
                
                  <tr>
                  <td><?= $no++; ?></td>
                 
                    <td><?= htmlspecialchars($item['gelar_depan']).' '.htmlspecialchars($item['nama']).(!empty($item['gelar_belakang']) ? ', '.htmlspecialchars($item['gelar_belakang']) : '') ?></td>
                    <td><?= htmlspecialchars($item['nip']) ?></td>
                    <td><?= htmlspecialchars($item['no_ktp']) ?></td>
                    <td><?= htmlspecialchars($item['no_kk']) ?></td>
                    <td><?= htmlspecialchars($item['npwp']) ?></td>
                    <td><?= htmlspecialchars($item['alamat']) ?></td>
                    <td><?= htmlspecialchars($item['no_hp']) ?></td>
                    <td><?= htmlspecialchars($item['nama_instansipemohon']) ?></td>
                    <td><?= htmlspecialchars($item['nama_golonganpangkat']) ?></td>
                    <td><?= htmlspecialchars($item['jabatan']) ?></td>
                    <td><?= htmlspecialchars($item['gaji_pokok']) ?></td>
                    <td>
                      <a href="/keluarga/<?= $item['id_asn'] ?>" class="btn btn-primary btn-sm" title="lihat keluarga"><i class="fa fa-eye"></i></a>
                    </td>
                    <td>
                      <a href="/asn/edit/<?= $item['id_asn'] ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                      <a href="/asn/delete/<?= $item['id_asn'] ?>" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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