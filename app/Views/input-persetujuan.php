<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Persetujuan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Data Persetujuan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Tambah Persetujuan</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <form action="/persetujuan/store" method="post">
                    <div class="form-group">
                       
                            <div class="form-group">
                                <label for="skpd">SKPD <span class="text-danger">*</span></label>
                                <select class="form-control" id="skpd" name="skpd" required onchange="updateGolonganAndBiaya(this.value)">
                                    <option value="" disabled selected>Pilih SKPD</option>
                                    <?php if (!empty($skpd) && is_array($skpd)): ?>
                                        <?php foreach ($skpd as $item): ?>
                                        <option value="<?= htmlspecialchars($item['id_skpd']) ?>" data-golongan="<?= isset($item['golongan_rumah']) ? htmlspecialchars($item['golongan_rumah']) : '' ?>" data-biaya="<?= isset($item['biaya_sewa']) ? htmlspecialchars($item['biaya_sewa']) : '' ?>"><?= htmlspecialchars($item['kop_skpd']) ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                </select>
                            </div>
                            
                            <div class="form-group">
                                <label for="golongan_rumah">Golongan Rumah <span class="text-danger">*</span></label>
                                <select class="form-control" id="golongan_rumah" name="golongan_rumah" required>
                                    <option value="" disabled selected>Pilih Golongan Rumah</option>
                                        <?php foreach ($golonganrumahdinas as $item): ?>
                                        <option value="<?= htmlspecialchars($item['id_golrum']) ?>" data-biaya="<?= isset($item['biaya_sewa']) ? htmlspecialchars($item['biaya_sewa']) : '' ?>"><?= htmlspecialchars($item['golongan_rumah']) ?></option>
                                        <?php endforeach; ?>
                             
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="biaya_sewa">Biaya Sewa <span class="text-danger">*</span></label>
                                <input type="number" class="form-control" id="biaya_sewa" name="biaya_sewa" readonly required>
                            </div>
                            <script>
                                function updateGolonganAndBiaya(selectedSkpd) {
                                    const selectedOption = document.querySelector(`#skpd option[value="${selectedSkpd}"]`);
                                    const golonganOptions = document.querySelectorAll('#golongan_rumah option');
                                    golonganOptions.forEach(option => {
                                        option.style.display = 'none'; // Hide all options initially
                                        if (option.value === selectedOption.getAttribute('data-golongan')) {
                                            option.style.display = 'block'; // Show the matching option
                                        }
                                    });
                                }

                                document.getElementById('golongan_rumah').addEventListener('change', function() {
                                    const selectedOption = this.options[this.selectedIndex];
                                    document.getElementById('biaya_sewa').value = selectedOption.getAttribute('data-biaya');
                                });
                            </script>
                    <div class="form-group">
                        <label for="tanggal_mulai">Tanggal Mulai <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" id="tanggal_mulai" name="tanggal_mulai" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_berakhir">Tanggal Berakhir <span class="text-danger">*</span></label>
                        <input type="date" class="form-control" id="tanggal_berakhir" name="tanggal_berakhir" required>
                    </div>
                  
                    <button type="submit" class="btn btn-success">Simpan Data</button>
                    <a href="/persetujuan" class="btn btn-danger">Batal</a>
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