            <!-- /.sidebar -->
            <div id="page-wrapper" style="margin-left: 250px;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Edit Permohonan</h1>
                            <a href="/permohonan" class="btn btn-primary">Kembali ke Daftar Permohonan</a> <!-- Button to go back to Permohonan list -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Edit Data Permohonan
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <form action="/permohonan/update/<?= $permohonan['id_pemohon']; ?>" method="post">
                                        <div class="form-group">
                                            <label for="nama_pemohon">Nama Pemohon</label>
                                            <input type="text" class="form-control" id="nama_pemohon" name="nama_pemohon" value="<?= $permohonan['nama_pemohon']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="nip">NIP</label>
                                            <input type="text" class="form-control" id="nip" name="nip" value="<?= $permohonan['nip']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="no_hp">No HP</label>
                                            <input type="text" class="form-control" id="no_hp" name="no_hp" value="<?= $permohonan['no_hp']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="jabatan">Jabatan</label>
                                            <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?= $permohonan['jabatan']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="gaji_pokok">Gaji Pokok</label>
                                            <input type="text" class="form-control" id="gaji_pokok" name="gaji_pokok" value="<?= $permohonan['gaji_pokok']; ?>">
                                        </div>
                                        

                                      <div class="form-group">
                                        <label for="instansi_pemohon">Instansi Pemohon <span class="text-danger">*</span></label>
                                        <select class="form-control" id="instansi_pemohon" name="instansi_pemohon" required>
                                            <option value="">Pilih Instansi Pemohon</option>
                                            <?php if (!empty($instansipemohon) && is_array($instansipemohon)): ?>
                                                <?php foreach ($instansipemohon as $item): ?>
                                                    <option value="<?= isset($item['id_instansipemohon']) ? htmlspecialchars($item['id_instansipemohon']) : ''; ?>" 
                                                        <?= (isset($permohonan['id_instansipemohon']) && $permohonan['id_instansipemohon'] == $item['id_instansipemohon']) ? 'selected' : ''; ?>>
                                                        <?= isset($item['nama_instansipemohon']) ? htmlspecialchars($item['nama_instansipemohon']) : 'N/A' ?>
                                                    </option>
                                                <?php endforeach; ?>
                                            <?php else: ?>
                                                <option value="" disabled>Data Instansi Pemohon tidak tersedia.</option>
                                            <?php endif; ?>
                                        </select>
                                    </div>
                                        <div class="form-group">
                                            <label for="alamat_sekarang">Alamat Sekarang</label>
                                            <textarea class="form-control" id="alamat_sekarang" name="alamat_sekarang" required><?= $permohonan['alamat_sekarang']; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="bersedia_menaati">Bersedia Menaati <span class="text-danger">*</span></label>
                                            <select class="form-control" id="bersedia_menaati" name="bersedia_menaati_peraturan" required>
                                                <option value="ya" <?= (isset($permohonan['bersedia_menaati']) && $permohonan['bersedia_menaati'] == 'ya') ? 'selected' : ''; ?>>Iya</option>
                                                <option value="tidak" <?= (isset($permohonan['bersedia_menaati']) && $permohonan['bersedia_menaati'] == 'tidak') ? 'selected' : ''; ?>>Tidak</option>
                                            </select>
                                        </div>
                                     
                                        <div class="form-group">
                                            <label for="nomor_rumah_dinas">Nomor Rumah Dinas</label>
                                            <input type="text" class="form-control" id="nomor_rumah_dinas" name="nomor_rumah_dinas" value="<?= $permohonan['nomor_rumah_dinas']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="rumah_ditempati">Rumah Ditempati</label>
                                            <input type="text" class="form-control" id="rumah_ditempati" name="rumah_ditempati" value="<?= $permohonan['rumah_ditempati']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal_ditempati">Tanggal Ditempati</label>
                                            <input type="date" class="form-control" id="tanggal_ditempati" name="tanggal_ditempati" value="<?= $permohonan['tanggal_ditempati']; ?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="keterangan">Keterangan</label>
                                            <textarea class="form-control" id="keterangan" name="keterangan"><?= $permohonan['keterangan']; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="file_sk">File SK</label>
                                            <input type="file" class="form-control" id="file_sk" name="file_sk">
                                            <?php if (!empty($permohonan['file_sk'])): ?>
                                                <small>Current File: <a href="<?= base_url('uploads/permohonan/' . $permohonan['file_sk']) ?>" target="_blank">View File SK</a></small>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="file_ktp">File KTP</label>
                                            <input type="file" class="form-control" id="file_ktp" name="file_ktp">
                                            <?php if (!empty($permohonan['file_ktp'])): ?>
                                                <small>Current File: <a href="<?= base_url('uploads/permohonan/' . $permohonan['file_ktp']) ?>" target="_blank">View File KTP</a></small>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="file_kk">File KK</label>
                                            <input type="file" class="form-control" id="file_kk" name="file_kk">
                                            <?php if (!empty($permohonan['file_kk'])): ?>
                                                <small>Current File: <a href="<?= base_url('uploads/permohonan/' . $permohonan['file_kk']) ?>" target="_blank">View File KK</a></small>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="file_pas_foto">File Pas Foto</label>
                                            <input type="file" class="form-control" id="file_pas_foto" name="file_pas_foto">
                                            <?php if (!empty($permohonan['file_pas_foto'])): ?>
                                                <small>Current File: <a href="<?= base_url('uploads/permohonan/' . $permohonan['file_pas_foto']) ?>" target="_blank">View File Pas Foto</a></small>
                                            <?php endif; ?>
                                        </div>
                                        <div class="form-group">
                                            <label for="file_foto_rumah">File Foto Rumah</label>
                                            <input type="file" class="form-control" id="file_foto_rumah" name="file_foto_rumah">
                                            <?php if (!empty($permohonan['file_foto_rumah'])): ?>
                                                <small>Current File: <a href="<?= base_url('uploads/permohonan/' . $permohonan['file_foto_rumah']) ?>" target="_blank">View File Foto Rumah</a></small>
                                            <?php endif; ?>
                                        </div>
                                        <input type="hidden" name="id_asn" value="<?= $permohonan['id_asn']; ?>">
                                        <input type="hidden" name="id_keluarga" value="<?= $permohonan['id_keluarga']; ?>">
                                        <div class="d-flex justify-content-between">
                                            <a href="/permohonan" class="btn btn-danger">Batal</a>
                                            <button type="submit" class="btn btn-success">Simpan Perubahan</button>
                                        </div>
                                    </form>
                                    <!-- /.table-responsive -->
                                    
                                </div>
                                <!-- /.panel-body -->
                            </div>
                            <!-- /.panel -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                 
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /#page-wrapper -->
