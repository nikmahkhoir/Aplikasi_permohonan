<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar</title>
    <!-- Link to Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card mt-5">
                    <div class="card-header text-center">
                        <h4>Daftar</h4>
                    </div>
                    <div class="card-body">
                    <form action="/daftar/asn" method="post">
                        <div class="form-group">
                            <label for="nama">Nama</label>
                            <input type="hidden" class="form-control" id="id_login" name="id_login" value="<?php echo session('id_login') ?>" required>
                            <input type="text" class="form-control" id="nama" name="nama" onkeypress="return hanyaHuruf(event)" required>
                        </div>
                        <div class="form-group">
                                <label for="gelar_depan">Gelar Depan</label>
                                <input type="text" class="form-control" id="gelar_depan" name="gelar_depan">
                            </div>
                            <div class="form-group">
                                <label for="gelar_belakang">Gelar Belakang</label>
                                <input type="text" class="form-control" id="gelar_belakang" name="gelar_belakang">
                            </div>
                            <div class="form-group">
                                <label for="nip">NIP <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="nip" name="nip" maxlength="18" onkeypress="return hanyaAngka(event)" required>
                            </div>
                            <div class="form-group">
                                <label for="no_ktp">No KTP <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="no_ktp" name="no_ktp" maxlength="16" onkeypress="return hanyaAngka(event)" required>
                            </div>
                            <div class="form-group">
                                <label for="no_kk">No KK <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="no_kk" name="no_kk" onkeypress="return hanyaAngka(event)" required>
                            </div>
                            <div class="form-group">
                                <label for="npwp">NPWP</label>
                                <input type="text" class="form-control" id="npwp" name="npwp">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat <span class="text-danger">*</span></label>
                                <textarea class="form-control" id="alamat" name="alamat" required></textarea>
                            </div>
                            <div class="form-group">
                                <label for="no_hp">No HP <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="no_hp" name="no_hp" onkeypress="return hanyaAngka(event)" required>
                            </div>
                            <div class="form-group">
                                <label for="instansi_pemohon">Instansi Pemohon <span class="text-danger">*</span></label>
                                <select class="form-control select2bs4" id="instansi_pemohon" name="instansi_pemohon" required>
                                    <option value="">Pilih Instansi Pemohon</option>
                                    <?php foreach ($instansipemohon as $item): ?>
                                        <option value="<?= $item['id_instansipemohon'] ?>"><?= $item['nama_instansipemohon'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="instansi_pemohon">Golongan Pangkat <span class="text-danger">*</span></label>
                                <select class="form-control select2bs4" id="id_golonganpangkat" name="id_golonganpangkat" required>
                                    <option value="">Pilih Golongan Pangkat</option>
                                    <?php foreach ($golongan as $item): ?>
                                        <option value="<?= $item['id_golonganpangkat'] ?>"><?= $item['nama_golonganpangkat'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="no_hp">Jabatan <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="jabatan" name="jabatan" required>
                            </div>
                            <div class="form-group">
                                <label for="no_hp">Gaji Pokok<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="gaji_pokok" name="gaji_pokok" onkeypress="return hanyaAngka(event)" onkeyup="formatRupiah(this)" required>
                            </div>
                        <div class="form-group">
                            <label for="password">Password <span class="text-danger">*</span></label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter new password" required>
                        </div>
                        <button type="submit" class="btn btn-success">Simpan Data</button>
                        <a href="/" class="btn btn-danger">Batal</a>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Link to Bootstrap JS (optional, for functionality like modals) -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script> -->
</body>
<script>
  $(function () {

    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });

  function hanyaAngka(evt) {
		  var charCode = (evt.which) ? evt.which : event.keyCode
		   if (charCode > 31 && (charCode < 48 || charCode > 57))
 
		    return false;
		  return true;
		}
    function hanyaHuruf(evt) {
				var charCode = (evt.which) ? evt.which : event.keyCode;
				// Izinkan huruf (A-Z, a-z), spasi (32), titik (46), koma (44), dan petik satu (39)
				if (charCode > 31 && 
					!(charCode >= 65 && charCode <= 90) &&  // A-Z
					!(charCode >= 97 && charCode <= 122) && // a-z
					charCode !== 32 && // spasi
					charCode !== 46 && // titik (.)
					charCode !== 44 && // koma (,)
					charCode !== 39) { // petik satu (')
					return false;
				}
				return true;
			}
      function formatRupiah(angka) {
        let number_string = angka.value.replace(/[^,\d]/g, '').toString(),
            split = number_string.split(','),
            sisa = split[0].length % 3,
            rupiah = split[0].substr(0, sisa),
            ribuan = split[0].substr(sisa).match(/\d{3}/gi);
        
        // tambahkan titik setiap 3 angka
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }

        rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah;
        angka.value = 'Rp ' + rupiah; // Menambahkan 'Rp ' di depan nilai
      }
</script>
</html>