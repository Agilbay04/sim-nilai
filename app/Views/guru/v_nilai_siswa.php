<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><?= $title; ?> - Matpel <?= $guru['matpel']; ?></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active"><?= $title; ?> - Matpel <?= $guru['matpel']; ?></li>
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
                    <div class="card-header bg-purple">
                        <h5 class="text-center font-weight-bold text-uppercase">Siswa Kelas 8</h5>
                    </div>
                    <div class="card-body">
                        <table id="tb_role" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NIS</th>
                                    <th>Nama Siswa</th>
                                    <th>Kelas</th>
                                    <th>Nilai Matpel <?= $guru['matpel']; ?></th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($siswa_8 as $row) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $row['NIS']; ?></td>
                                        <td><?= $row['nama_siswa']; ?></td>
                                        <td><?= $row['kelas']; ?></td>
                                        <td><?= $row['nilai']; ?></td>
                                        <td>
                                            <button type="button" class="bt btn-sm btn-primary" title="Beri Nilai" data-toggle="modal" data-target="#modal-nilai-8<?= $row['id_siswa']; ?>"><i class="fas fa-edit"></i> Beri Nilai</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>

                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>NIS</th>
                                    <th>Nama Siswa</th>
                                    <th>Kelas</th>
                                    <th>Nilai Matpel <?= $guru['matpel']; ?></th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <div class="card">
                    <div class="card-header bg-purple">
                        <h5 class="text-center font-weight-bold text-uppercase">Siswa Kelas 9</h5>
                    </div>
                    <div class="card-body">
                        <table id="tb_role1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NIS</th>
                                    <th>Nama Siswa</th>
                                    <th>Kelas</th>
                                    <th>Nilai Matpel <?= $guru['matpel']; ?></th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($siswa_9 as $row) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $row['NIS']; ?></td>
                                        <td><?= $row['nama_siswa']; ?></td>
                                        <td><?= $row['kelas']; ?></td>
                                        <td><?= $row['nilai']; ?></td>
                                        <td>
                                            <button type="button" class="bt btn-sm btn-primary" title="Beri Nilai" data-toggle="modal" data-target="#modal-nilai-9<?= $row['id_siswa']; ?>"><i class="fas fa-edit"></i> Beri Nilai</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>

                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>NIS</th>
                                    <th>Nama Siswa</th>
                                    <th>Kelas</th>
                                    <th>Nilai Matpel <?= $guru['matpel']; ?></th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->

                <div class="card">
                    <div class="card-header bg-purple">
                        <h5 class="text-center font-weight-bold text-uppercase">Siswa Kelas 10</h5>
                    </div>
                    <div class="card-body">
                        <table id="tb_role2" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NIS</th>
                                    <th>Nama Siswa</th>
                                    <th>Kelas</th>
                                    <th>Nilai Matpel <?= $guru['matpel']; ?></th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($siswa_10 as $row) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $row['NIS']; ?></td>
                                        <td><?= $row['nama_siswa']; ?></td>
                                        <td><?= $row['kelas']; ?></td>
                                        <td><?= $row['nilai']; ?></td>
                                        <td>
                                            <button type="button" class="bt btn-sm btn-primary" title="Beri Nilai" data-toggle="modal" data-target="#modal-nilai-10<?= $row['id_siswa']; ?>"><i class="fas fa-edit"></i> Beri Nilai</button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>

                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>NIS</th>
                                    <th>Nama Siswa</th>
                                    <th>Kelas</th>
                                    <th>Nilai Matpel <?= $guru['matpel']; ?></th>
                                    <th>Aksi</th>
                                </tr>
                            </tfoot>
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


<?php foreach ($siswa_8 as $row) : ?>
    <!-- Modal Tambah Data -->
    <div class="modal fade" id="modal-nilai-8<?= $row['id_siswa']; ?>">
        <div class="modal-dialog">
            <!-- form start -->
            <form action="/nilaisiswa/save_nilaisiswa" method="POST" id="quickForm">
                <?= csrf_field(); ?>
                <div class="modal-content">
                    <div class="modal-header bg-purple">
                        <h4 class="modal-title"><?= $title; ?> - Matpel <?= $guru['matpel']; ?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nis">NIS</label>
                                    <input type="text" name="nis" class="form-control" id="nis" value="<?= $row['NIS']; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="nis">Nama Siswa</label>
                                    <input type="text" name="nis" class="form-control" id="nis" value="<?= $row['nama_siswa']; ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nis">Nilai matpel - <?= $guru['matpel']; ?></label>
                                    <input type="hidden" name="id_nilai" value="<?= $row['id_nilai']; ?>">
                                    <input type="number" name="nilai" class="form-control" id="nis" placeholder="Nilai matpel <?= $guru['matpel']; ?>" value="<?= $row['nilai']; ?>" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup <i class="fas fa-times-circle"></i></button>
                        <button type="submit" class="btn btn-primary">Simpan <i class="fas fa-check-circle"></i></button>
                    </div>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.Modal Tambah Data -->
<?php endforeach; ?>

<?php foreach ($siswa_9 as $row) : ?>
    <!-- Modal Tambah Data -->
    <div class="modal fade" id="modal-nilai-9<?= $row['id_siswa']; ?>">
        <div class="modal-dialog">
            <!-- form start -->
            <form action="/nilaisiswa/save_nilaisiswa" method="POST" id="quickForm">
                <?= csrf_field(); ?>
                <div class="modal-content">
                    <div class="modal-header bg-purple">
                        <h4 class="modal-title"><?= $title; ?> - Matpel <?= $guru['matpel']; ?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nis">NIS</label>
                                    <input type="text" name="nis" class="form-control" id="nis" value="<?= $row['NIS']; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="nis">Nama Siswa</label>
                                    <input type="text" name="nis" class="form-control" id="nis" value="<?= $row['nama_siswa']; ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nis">Nilai matpel - <?= $guru['matpel']; ?></label>
                                    <input type="hidden" name="id_nilai" value="<?= $row['id_nilai']; ?>">
                                    <input type="number" name="nilai" class="form-control" id="nis" placeholder="Nilai matpel <?= $guru['matpel']; ?>" value="<?= $row['nilai']; ?>" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup <i class="fas fa-times-circle"></i></button>
                        <button type="submit" class="btn btn-primary">Simpan <i class="fas fa-check-circle"></i></button>
                    </div>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.Modal Tambah Data -->
<?php endforeach; ?>

<?php foreach ($siswa_10 as $row) : ?>
    <!-- Modal Tambah Data -->
    <div class="modal fade" id="modal-nilai-10<?= $row['id_siswa']; ?>">
        <div class="modal-dialog">
            <!-- form start -->
            <form action="/nilaisiswa/save_nilaisiswa" method="POST" id="quickForm">
                <?= csrf_field(); ?>
                <div class="modal-content">
                    <div class="modal-header bg-purple">
                        <h4 class="modal-title"><?= $title; ?> - Matpel <?= $guru['matpel']; ?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="nis">NIS</label>
                                    <input type="text" name="nis" class="form-control" id="nis" value="<?= $row['NIS']; ?>" readonly>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for="nis">Nama Siswa</label>
                                    <input type="text" name="nis" class="form-control" id="nis" value="<?= $row['nama_siswa']; ?>" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nis">Nilai matpel - <?= $guru['matpel']; ?></label>
                                    <input type="hidden" name="id_nilai" value="<?= $row['id_nilai']; ?>">
                                    <input type="number" name="nilai" class="form-control" id="nis" placeholder="Nilai matpel <?= $guru['matpel']; ?>" value="<?= $row['nilai']; ?>" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup <i class="fas fa-times-circle"></i></button>
                        <button type="submit" class="btn btn-primary">Simpan <i class="fas fa-check-circle"></i></button>
                    </div>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.Modal Tambah Data -->
<?php endforeach; ?>
<?= $this->endSection(); ?>