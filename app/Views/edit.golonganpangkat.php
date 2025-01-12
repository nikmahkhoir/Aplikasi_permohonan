            <!-- /.sidebar -->

            <div id="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">Edit Golongan Pangkat</h1>
                            <a href="/golonganpangkat" class="btn btn-primary">Kembali ke Daftar Golongan Pangkat</a> <!-- Button to go back to Golongan Pangkat list -->
                        </div>
                        <!-- /.col-lg-12 -->
                    </div>
                    <!-- /.row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Edit Data Golongan Pangkat
                                </div>
                                <!-- /.panel-heading -->
                                <div class="panel-body">
                                    <form action="/golonganpangkat/update/<?= $golonganpangkat['id_golonganpangkat']; ?>" method="post">
                                        <div class="form-group">
                                            <label for="nama_golonganpangkat">Nama Golongan Pangkat</label>
                                            <input type="text" class="form-control" id="nama_golonganpangkat" name="nama_golonganpangkat" value="<?= $golonganpangkat['nama_golonganpangkat']; ?>" required>
                                        </div>
                                        <button type="submit" class="btn btn-success">Update</button>
                                        <a href="/golonganpangkat" class="btn btn-danger">Batal</a>
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

        </div>
        <!-- /#wrapper -->
