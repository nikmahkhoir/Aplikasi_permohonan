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
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Field</th>
                                        <th>Value</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>NIP</th>
                                        <td><?= htmlspecialchars($permohonan['nip']) ?></td>
                                    </tr>
                                    <tr>
                                        <th>No HP</th>
                                        <td><?= htmlspecialchars($permohonan['no_hp']) ?></td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td><?= htmlspecialchars($permohonan['alamat']) ?></td>
                                    </tr>
                                    <tr>
                                        <th>Jabatan</th>
                                        <td><?= htmlspecialchars($permohonan['jabatan']) ?></td>
                                    </tr>
                                    <tr>
                                        <th>Gaji Pokok</th>
                                        <td><?= htmlspecialchars($permohonan['gaji_pokok']) ?></td>
                                    </tr>
                                    <tr>
                                        <th>Instansi Pemohon</th>
                                        <td><?= htmlspecialchars($permohonan['nama_instansipemohon']) ?></td>
                                    </tr>
                                    <tr>
                                        <th>Golongan Pangkat</th>
                                        <td><?= htmlspecialchars($permohonan['nama_golonganpangkat']) ?></td>
                                    </tr>
                                    <tr>
                                        <th>Jumlah Keluarga</th>
                                        <td><?= htmlspecialchars($jumlah_keluarga) ?></td>
                                    </tr>
                                    <tr>
                                        <th>Alamat Rumah Dinas</th>
                                        <td><?= htmlspecialchars($permohonan['nama_alamatrumahdinas']) ?></td>
                                    </tr>
                                    <tr>
                                        <th>Nomor Rumah Dinas</th>
                                        <td><?= htmlspecialchars($permohonan['nomor_rumah_dinas']) ?></td>
                                    </tr>
                                    <tr>
                                        <th>Apakah Bersedia Menaati Peraturan</th>
                                        <td><?= htmlspecialchars($permohonan['bersedia_menaati_peraturan']) ?></td>
                                    </tr>
                                    <tr>
                                        <th>Apakah Rumah Dinas Pernah Ditempati</th>
                                        <td><?= htmlspecialchars($permohonan['rumah_ditempati']) ?></td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Ditempati</th>
                                        <td><?= htmlspecialchars($permohonan['tanggal_ditempati']) ?></td>
                                    </tr>
                                    <tr>
                                        <th>Keterangan</th>
                                        <td><?= htmlspecialchars($permohonan['keterangan']) ?></td>
                                    </tr>
                                <tr>
                                    <th>File SK</th>
                                    <td>
                                        <?php if (!empty($permohonan['file_sk'])): ?>
                                            <a href="data:application/pdf;base64,<?= $permohonan['file_sk']; ?>" download="Surat_Keterangan.pdf">Unduh Surat Keterangan</a>
                                        <?php else: ?>
                                            Tidak ada file SK
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>File KTP</th>
                                    <td>
                                        <?php if (!empty($permohonan['file_ktp'])): ?>
                                            <img src="data:image/jpg;base64,<?= $permohonan['file_ktp']; ?>" alt="KTP" height="80px" width="80px">
                                        <?php else: ?>
                                            Tidak ada file KTP
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>File KK</th>
                                    <td>
                                        <?php if (!empty($permohonan['file_kk'])): ?>
                                            <img src="data:image/jpg;base64,<?= $permohonan['file_kk']; ?>" alt="File KK" height="80px" width="80px">
                                        <?php else: ?>
                                            Tidak ada file KK
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>File Pas Foto</th>
                                    <td>
                                        <?php if (!empty($permohonan['file_pas_foto'])): ?>
                                            <img src="data:image/jpg;base64,<?= $permohonan['file_pas_foto']; ?>" alt="File Pas Foto" height="80px" width="80px">
                                        <?php else: ?>
                                            Tidak ada file Pas Foto
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th>File Foto Rumah</th>
                                    <td>
                                        <?php if (!empty($permohonan['file_foto_rumah'])): ?>
                                            <img src="data:image/jpg;base64,<?= $permohonan['file_foto_rumah']; ?>" alt="File Foto Rumah" height="80px" width="80px">
                                        <?php else: ?>
                                            Tidak ada file Foto Rumah
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                            <form action="/permohonan/update_status_terima/<?= $permohonan['id_pemohon'] ?>" method="post" enctype="multipart/form-data">
                            <?php

                            if (session('level')=='approver') {
                                ?>
                                <div class="form-group">
                                    <label for="id_asn">SKPD <span class="text-danger">*</span></label>
                                    <select class="form-control select2bs4" id="id_skpd" name="id_skpd" required >
                                        <option value="" disabled selected>Pilih SKPD</option>
                                        <?php foreach ($skpd as $item): ?>
                                            <option value="<?= htmlspecialchars($item['id_skpd']) ?>"><?= htmlspecialchars($item['kop_skpd']).' - '.htmlspecialchars($item['kepala_skpd']).' - '.htmlspecialchars($item['nip_kepala_skpd']) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="id_asn">Golongan Rumah <span class="text-danger">*</span></label>
                                    <select class="form-control select2bs4" id="id_golrum" name="id_golrum" required >
                                        <option value="" disabled selected>Pilih Golongan Rumah</option>
                                        <?php foreach ($golrum as $item): ?>
                                            <option value="<?= htmlspecialchars($item['id_golrum']) ?>"><?= htmlspecialchars($item['golongan_rumah']).' - '.htmlspecialchars($item['biaya_sewa']) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="id_asn">Instansi Pencatatan <span class="text-danger">*</span></label>
                                    <select class="form-control select2bs4" id="id_instansipencatatan" name="id_instansipencatatan" required >
                                        <option value="" disabled selected>Pilih Instansi Pencatatan</option>
                                        <?php foreach ($pencatatan as $item): ?>
                                            <option value="<?= htmlspecialchars($item['id_instansipencatatan']) ?>"><?= htmlspecialchars($item['nama_instansipencatatan']) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="tanggal_ditempati">Tanggal Mulai <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai">
                                </div>
                                <div class="form-group">
                                    <label for="tanggal_ditempati">Tanggal Berakhir <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" id="tanggal_berakhir" name="tanggal_berakhir">
                                </div>
                                

                                        <button type="submit" class="btn btn-success" name="terima" value="terima">Terima</button>
                                        <button type="submit" class="btn btn-danger" name="tolak" value="tolak">Tolak</button>
                                    <?php
                                }

                                ?>
                                
                                <a href="/pemohon_baru" class="btn btn-warning">Kembali</a>
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

<!-- <script>
    function handleAction(action) {
        const confirmationMessage = action === 'accept'
            ? 'Apakah Anda yakin ingin menerima permohonan ini?'
            : 'Apakah Anda yakin ingin menolak permohonan ini?';

        if (!confirm(confirmationMessage)) return;

        const form = document.querySelector('form');
        const formData = new FormData(form);
        for (const [key, value] of formData.entries()) {
            console.log(`${key}: ${value}`);
        }
        formData.append('action', action);

        const url = action === 'accept'
            ? '/permohonan/update_status_terima/<?= $permohonan['id_pemohon'] ?>'
            : '/permohonan/update_status_tolak/<?= $permohonan['id_pemohon'] ?>';

        fetch(url, {
            method: 'POST',
            body: formData,
        })
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                alert(`Permohonan berhasil ${action === 'accept' ? 'diterima' : 'ditolak'}!`);
                window.location.href = '/pemohon_baru';
            } else {
                alert('Terjadi kesalahan: ' + data.message);
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Terjadi kesalahan saat mengirim data.');
        });
    }

    function handleAccept() {
        handleAction('accept');
    }

    function handleReject() {
        handleAction('reject');
    }
</script> -->
