<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit SKPD</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Edit SKPD</li>
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
                            <h3 class="card-title">Edit SKPD</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="/skpd/update/<?= $skpd['id_skpd']; ?>" method="post">
                                <div class="form-group">
                                    <label for="kop_skpd">SKPD Bersangkutan</label>
                                    <input type="text" class="form-control" id="kop_skpd" name="kop_skpd" value="<?= $skpd['kop_skpd']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="kepala_skpd">Kepala SKPD</label>
                                    <input type="text" class="form-control" id="kepala_skpd" name="kepala_skpd" value="<?= $skpd['kepala_skpd']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="nip_kepala_skpd">NIP Kepala SKPD</label>
                                    <input type="text" class="form-control" id="nip_kepala_skpd" name="nip_kepala_skpd" value="<?= $skpd['nip_kepala_skpd']; ?>" required>
                                </div>
                                <div class="form-group">
                                    <label for="golongan">Golongan</label>
                                    <input type="text" class="form-control" id="golongan" name="golongan" value="<?= $skpd['golongan']; ?>" required>
                                </div>
                                <button type="submit" class="btn btn-success">Update</button>
                                <a href="/skpd" class="btn btn-danger">Batal</a>
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