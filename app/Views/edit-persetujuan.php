            <!-- /.sidebar -->
            <div id="page-wrapper" style="margin-left: 250px;">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Edit Persetujuan</h1>
                            <a href="/persetujuan" class="btn btn-primary">Kembali ke Daftar Persetujuan</a> <!-- Button to go back to Persetujuan list -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Edit Data Persetujuan
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <form action="/persetujuan/update/<?= htmlspecialchars($persetujuan['id_persetujuan']); ?>" method="post">
                                    <div class="form-group">
                                        <label for="golongan_rumah">Golongan Rumah <span class="text-danger">*</span></label>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Golongan Rumah</th>
                                                    <th>Biaya Sewa</th>
                                                    <th>Pilih</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php if (!empty($golonganrumahdinas) && is_array($golonganrumahdinas)): ?>
                                                    <?php foreach ($golonganrumahdinas as $item): ?>
                                                        <tr>
                                                            <td><?= isset($item['golongan_rumah']) ? htmlspecialchars($item['golongan_rumah']) : 'N/A' ?></td>
                                                            <td><?= isset($item['biaya_sewa']) ? htmlspecialchars($item['biaya_sewa']) : 'N/A' ?></td>
                                                            <td>
                                                                <!-- Input Radio untuk memilih Golongan Rumah -->
                                                                <input 
                                                                    type="radio" 
                                                                    name="golongan_rumah" 
                                                                    value="<?= isset($item['id_golrum']) ? htmlspecialchars($item['id_golrum']) : ''; ?>" 
                                                                    <?= (isset($persetujuan['id_golrum']) && $persetujuan['id_golrum'] == $item['id_golrum']) ? 'checked' : ''; ?>
                                                                    required>
                                                            </td>
                                                        </tr>
                                                    <?php endforeach; ?>
                                                <?php else: ?>
                                                    <tr>
                                                        <td colspan="3" class="text-center">Data Golongan Rumah tidak tersedia.</td>
                                                    </tr>
                                                <?php endif; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                            </select>
                                        </div>
                                       
                                      
                                        <div class="form-group">
                                            <label for="tanggal_mulai">Tanggal Mulai <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" value="<?= $persetujuan['tanggal_mulai']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal_berakhir">Tanggal Berakhir <span class="text-danger">*</span></label>
                                            <input type="date" class="form-control" id="tanggal_berakhir" name="tanggal_berakhir" value="<?= $persetujuan['tanggal_berakhir']; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="skpd">SKPD <span class="text-danger">*</span></label>
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr>
                                                        <th>Kop SKPD</th>
                                                        <th>Kepala SKPD</th>
                                                        <th>NIP Kepala SKPD</th>
                                                        <th>Pilih</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php if (!empty($skpd) && is_array($skpd)): ?>
                                                        <?php foreach ($skpd as $item): ?>
                                                            <tr>
                                                                <td><?= htmlspecialchars($item['kop_skpd']) ?></td>
                                                                <td><?= htmlspecialchars($item['kepala_skpd']) ?></td>
                                                                <td><?= htmlspecialchars($item['nip_kepala_skpd']) ?></td>
                                                                <td>
                                                                    <!-- Input Radio untuk memilih SKPD -->
                                                                    <input 
                                                                        type="radio" 
                                                                        name="skpd" 
                                                                        value="<?= htmlspecialchars($item['id_skpd']) ?>" 
                                                                        <?= isset($persetujuan['skpd']) && $persetujuan['skpd'] == $item['id_skpd'] ? 'checked' : ''; ?>
                                                                        required>
                                                                </td>
                                                            </tr>
                                                        <?php endforeach; ?>
                                                    <?php else: ?>
                                                        <tr>
                                                            <td colspan="4" class="text-center">Data SKPD tidak tersedia.</td>
                                                        </tr>
                                                    <?php endif; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <a href="/persetujuan" class="btn btn-danger">Batal</a>
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
