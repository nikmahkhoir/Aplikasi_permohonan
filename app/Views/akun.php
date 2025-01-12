<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Periksa Permohonan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Periksa Permohonan</li>
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
                            <h3 class="card-title">Periksa Permohonan</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                        <?php
                                    if (session('level')=='asn') {
                                        # code...
                                        ?>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Field</th>
                                        <th>Value</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>Nama</th>
                                        <td><?= htmlspecialchars($akun['nama']) ?></td>
                                    </tr>
                                    <tr>
                                        <th>Gelar Depan</th>
                                        <td><?= htmlspecialchars($akun['gelar_depan']) ?></td>
                                    </tr>
                                    <tr>
                                        <th>Gelar Belakang</th>
                                        <td><?= htmlspecialchars($akun['gelar_belakang']) ?></td>
                                    </tr>
                                    <tr>
                                        <th>NIP</th>
                                        <td><?= htmlspecialchars($akun['nip']) ?></td>
                                    </tr>
                                    <tr>
                                        <th>No KTP</th>
                                        <td><?= htmlspecialchars($akun['no_ktp']) ?></td>
                                    </tr>
                                    <tr>
                                        <th>No KK</th>
                                        <td><?= htmlspecialchars($akun['no_kk']) ?></td>
                                    </tr>
                                    <tr>
                                        <th>NPWP</th>
                                        <td><?= htmlspecialchars($akun['npwp']) ?></td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td><?= htmlspecialchars($akun['alamat']) ?></td>
                                    </tr>
                                    <tr>
                                        <th>No HP</th>
                                        <td><?= htmlspecialchars($akun['no_hp']) ?></td>
                                    </tr>
                                    <tr>
                                        <th>Instansi Pemohon</th>
                                        <td><?= htmlspecialchars($akun['nama_instansipemohon']) ?></td>
                                    </tr>
                                    <tr>
                                        <th>Jabatan</th>
                                        <td><?= htmlspecialchars($akun['jabatan']) ?></td>
                                    </tr>
                                    <tr>
                                        <th>Gaji Pokok</th>
                                        <td><?= htmlspecialchars($akun['gaji_pokok']) ?></td>
                                    </tr>
                                    <tr>
                                        <th>Golongan Pangkat</th>
                                        <td><?= htmlspecialchars($akun['nama_golonganpangkat']) ?></td>
                                    </tr>
                                    
                                        <tr>
                                            <th>Jumlah Keluarga</th>
                                            <td><?= htmlspecialchars($keluarga) ?></td>
                                        </tr>
                                      
                                    <tr>
                                        <th>Username</th>
                                        <td><?= htmlspecialchars($akun['username']) ?></td>
                                    </tr>
                                    </tr>
                                    <tr>
                                        <th>Password</th>
                                        <td><?= htmlspecialchars($akun['password']) ?></td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                            <?php
                                    }
                                    if (session('level')=='approver') {
                                        ?>
                                        <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Field</th>
                                        <th>Value</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>Nama</th>
                                        <td><?= htmlspecialchars($akun['nama']) ?></td>
                                    </tr>
                                    <tr>
                                        <th>NIP</th>
                                        <td><?= htmlspecialchars($akun['nip']) ?></td>
                                    </tr>
                                    <tr>
                                        <th>Tingkatan</th>
                                        <td><?= htmlspecialchars($akun['tingkatan']) ?></td>
                                    </tr>
                                        <th>Username</th>
                                        <td><?= htmlspecialchars($akun['username']) ?></td>
                                    </tr>
                                    </tr>
                                    <tr>
                                        <th>Password</th>
                                        <td><?= htmlspecialchars($akun['password']) ?></td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                                        <?php
                                    }
                                    ?>
                            <form action="/home/update/<?= $akun['id_login'] ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="tanggal_ditempati">Username <span class="text-danger">*</span></label>
                                    <input type="email" class="form-control" id="username" name="username" required>
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_ditempati">Password <span class="text-danger">*</span></label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <button type="submit" class="btn btn-success" name="simpan" value="terima">Simpan</button>
                                <a href="/dashboard" class="btn btn-warning">Kembali</a>
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