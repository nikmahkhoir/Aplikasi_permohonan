<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Permohonan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit Permohonan</li>
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
                            <h3 class="card-title">Edit Permohonan</h3>
                        </div>
                        <!-- /.card-header -->

                        <div class="card-body">
                               <!-- Tambahkan pesan error di atas form -->
                            <?php if (session()->getFlashdata('error')): ?>
                                <div class="alert alert-danger">
                                    <?= session()->getFlashdata('error') ?>
                                </div>
                            <?php endif; ?>

                        <div class="card-body">
                            <form action="/proses_edit_detail_permohonan/<?= $permohonan['id_pemohon'] ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="id_asn">ASN <span class="text-danger">*</span></label>
                                    <select class="form-control select2bs4" id="id_asn" name="id_asn" required onchange="updatePemohonDetails(this)">
                                        <option value="" disabled selected>Pilih ASN</option>
                                        <?php foreach ($asn as $item): ?>
                                            <option value="<?= htmlspecialchars($item['id_asn']) ?>" ><?= htmlspecialchars($item['nip']).' - '.htmlspecialchars($item['gelar_depan']).' '.htmlspecialchars($item['nama']).(!empty($item['gelar_belakang']) ? ', '.htmlspecialchars($item['gelar_belakang']) : '') ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="nip_pemohon_display">NIP <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="nip_pemohon_display" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="no_hp_pemohon_display">No HP <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="no_hp_pemohon_display" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="alamat_pemohon_display">Alamat <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="alamat_pemohon_display" readonly>
                                </div>

                                <div class="form-group">
                                    <label for="jabatan">Jabatan <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="jabatan_pemohon_display" name="jabatan" readonly required>
                                </div>

                                <div class="form-group">
                                    <label for="gaji_pokok">Gaji Pokok <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="gaji_pokok_pemohon_display" name="gaji_pokok" readonly required>
                                </div>

                                <div class="form-group">
                                    <label for="instansi">Instansi Pemohon <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="instansi_pemohon_display" name="instansi" required readonly>
                                </div>

                                <div class="form-group">
                                    <label for="instansi">Golongan Pangkat <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="golongan_pangkat_pemohon_display" name="instansi" required readonly>
                                </div>

                                <div class="form-group">
                                    <label for="instansi">Jumlah Keluarga <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="keluarga_pemohon_display" name="instansi" required readonly>
                                </div>

                                <div class="form-group">
                                    <label for="id_asn">Alamat Rumah Dinas <span class="text-danger">*</span></label>
                                    <select class="form-control select2bs4" id="id_alamatrumahdinas" name="id_alamatrumahdinas" required>
                                        <option value="" disabled selected>Pilih Alamat Rumah Dinas</option>
                                        <?php foreach ($alamatrumahdinas as $item): ?>
                                            <option value="<?= htmlspecialchars($item['id_alamatrumahdinas']) ?>" <?= ($item['id_alamatrumahdinas'] == $permohonan['id_alamatrumahdinas']) ? 'selected' : '' ?>><?= htmlspecialchars($item['nama_alamatrumahdinas']) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="nomor_rumah_dinas">Nomor Rumah Dinas <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="nomor_rumah_dinas" name="nomor_rumah_dinas" value="<?= $permohonan['nomor_rumah_dinas'] ?>" required>
                                </div>

                                <div class="form-group">
                                    <label for="bersedia_menaati_peraturan">Apakah Bersedia Menaati Peraturan <span class="text-danger">*</span></label>
                                    <div>
                                        <label>
                                            <input type="radio" name="bersedia_menaati_peraturan" value="ya" <?= ($permohonan['bersedia_menaati_peraturan'] == 'ya') ? 'checked' : '' ?>> ya
                                        </label>
                                        <label>
                                            <input type="radio" name="bersedia_menaati_peraturan" value="tidak" <?= ($permohonan['bersedia_menaati_peraturan'] == 'tidak') ? 'checked' : '' ?>> tidak
                                        </label>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="rumah_ditempati">Apakah Rumah Dinas Pernah Ditempati <span class="text-danger">*</span></label>
                                    <select class="form-control" id="rumah_ditempati" name="rumah_ditempati" required>
                                        <option value="" disabled>Pilih Opsi</option>
                                        <option value="Ya" <?= $permohonan['rumah_ditempati'] == 'Ya' ? 'selected' : '' ?>>Ya</option>
                                        <option value="Tidak" <?= $permohonan['rumah_ditempati'] == 'Tidak' ? 'selected' : '' ?>>Tidak</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="tanggal_ditempati">Tanggal Ditempati</label>
                                    <input type="date" class="form-control" id="tanggal_ditempati" name="tanggal_ditempati" value="<?= $permohonan['tanggal_ditempati'] ?>">
                                </div>

                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea class="form-control" id="keterangan" name="keterangan"><?= $permohonan['keterangan'] ?></textarea>
                                </div>
                                <div class="form-group">
    <label for="file_sk">File SK Kepegawaian Terakhir</label>
    <small class="form-text text-muted">Upload file dalam format PDF. Ukuran file maksimal 100KB.</small>
    <input type="file" class="form-control" id="file_sk" name="file_sk" accept="application/pdf">
    <?php if (!empty($permohonan['file_sk'])): ?>
        <small>Current File: <a href="<?= base_url('uploads/permohonan/' . $permohonan['file_sk']) ?>" target="_blank">View File SK</a></small>
    <?php endif; ?>
</div>

<div class="form-group">
    <label for="file_ktp">File KTP <span class="text-danger">*</span></label>
    <small class="form-text text-muted">Upload file dalam format JPG, PNG, atau JPEG. Ukuran file maksimal 120KB.</small>
    <input type="file" class="form-control" id="file_ktp" accept=".jpg,.png,.jpeg" name="file_ktp">
    <?php if (!empty($permohonan['file_ktp'])): ?>
        <img src="data:image/jpg;base64,<?= $permohonan['file_ktp']; ?>" alt="KTP" height="80px" width="80px">
    <?php else: ?>
        Tidak ada file KTP
    <?php endif; ?>
</div>

<div class="form-group">
    <label for="file_kk">File KK <span class="text-danger">*</span></label>
    <small class="form-text text-muted">Upload file dalam format JPG, PNG, atau JPEG. Ukuran file maksimal 120KB.</small>
    <input type="file" class="form-control" id="file_kk" accept=".jpg,.png,.jpeg" name="file_kk">
    <?php if (!empty($permohonan['file_kk'])): ?>
        <img src="data:image/jpg;base64,<?= $permohonan['file_kk']; ?>" alt="KK" height="80px" width="80px">
    <?php else: ?>
        Tidak ada file KK
    <?php endif; ?>
</div>

<div class="form-group">
    <label for="file_pas_foto">File Pas Foto Berwarna Ukuran 2x3 <span class="text-danger">*</span></label>
    <small class="form-text text-muted">Upload file dalam format JPG, PNG, atau JPEG. Ukuran file maksimal 120KB.</small>
    <input type="file" class="form-control" id="file_pas_foto" accept=".jpg,.png,.jpeg" name="file_pas_foto">
    <?php if (!empty($permohonan['file_pas_foto'])): ?>
        <img src="data:image/jpg;base64,<?= $permohonan['file_pas_foto']; ?>" alt="Pas Foto" height="80px" width="80px">
    <?php else: ?>
        Tidak ada file Pas Foto
    <?php endif; ?>
</div>

<div class="form-group">
    <label for="file_foto_rumah">File Foto Rumah Bangunan Asli Dari Depan Dan Bangunan Tambahan <span class="text-danger">*</span></label>
    <small class="form-text text-muted">Upload file dalam format JPG, PNG, atau JPEG. Ukuran file maksimal 120KB.</small>
    <input type="file" class="form-control" id="file_foto_rumah" accept=".jpg,.png,.jpeg" name="file_foto_rumah">
    <?php if (!empty($permohonan['file_foto_rumah'])): ?>
        <img src="data:image/jpg;base64,<?= $permohonan['file_foto_rumah']; ?>" alt="Foto Rumah" height="80px" width="80px">
    <?php else: ?>
        Tidak ada file Foto Rumah
    <?php endif; ?>
</div>


                                <button type="submit" class="btn btn-success">Update Data</button>
                                <a href="/permohonan" class="btn btn-danger">Batal</a>
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

<script>
function updatePemohonDetails(selectElement) {
    const asnId = selectElement.value;
    if (asnId) {
        fetch(/permohonan/getPemohonDetails/${asnId})
            .then(response => response.json())
            .then(data => {
                document.getElementById('nip_pemohon_display').value = data.nip;
                document.getElementById('no_hp_pemohon_display').value = data.no_hp;
                document.getElementById('alamat_pemohon_display').value = data.alamat;
                document.getElementById('jabatan_pemohon_display').value = data.jabatan;
                document.getElementById('gaji_pokok_pemohon_display').value = data.gaji_pokok;
                document.getElementById('instansi_pemohon_display').value = data.nama_instansipemohon;
                document.getElementById('golongan_pangkat_pemohon_display').value = data.nama_golonganpangkat;
                document.getElementById('keluarga_pemohon_display').value = data.keluarga;
            })
            .catch(error => console.error('Error fetching ASN details:', error));
    } else {
        // Clear the fields if no ASN is selected
        document.getElementById('nip_pemohon_display').value = '';
        document.getElementById('no_hp_pemohon_display').value = '';
        document.getElementById('alamat_pemohon_display').value = '';
        document.getElementById('jabatan_pemohon_display').value = '';
        document.getElementById('gaji_pokok_pemohon_display').value = '';
        document.getElementById('instansi_pemohon_display').value = '';
        document.getElementById('golongan_pangkat_pemohon_display').value = '';
        document.getElementById('keluarga_pemohon_display').value = '';
    }
}
</script>