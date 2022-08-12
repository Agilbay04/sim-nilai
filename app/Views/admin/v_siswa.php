<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1><?= $title; ?></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                    <li class="breadcrumb-item active"><?= $title; ?></li>
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
                        <button class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah"><i class="fas fa-plus"></i> Tambah Data</button>
                    </div>
                    <div class="card-body">
                        <table id="tb_role" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>NIS</th>
                                    <th>Nama Siswa</th>
                                    <th>Kelas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($siswa as $row) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $row['NIS']; ?></td>
                                        <td><?= $row['nama_siswa']; ?></td>
                                        <td><?= $row['kelas']; ?></td>
                                        <td>
                                            <button type="button" class="bt btn-sm btn-primary" title="Edit Data" data-toggle="modal" data-target="#modal-edit<?= $row['id_siswa']; ?>"><i class="fas fa-edit"></i></button>
                                            <button type="button" class="bt btn-sm btn-danger" title="Hapus Data" data-toggle="modal" data-target="#modal-hapus<?= $row['id_siswa']; ?>"><i class="fas fa-trash"></i></button>
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


<!-- Modal Tambah Data -->
<div class="modal fade" id="modal-tambah">
    <div class="modal-dialog">
        <!-- form start -->
        <form action="/siswa/save_siswa" method="POST" id="quickForm">
            <?= csrf_field(); ?>
            <div class="modal-content">
                <div class="modal-header bg-purple">
                    <h4 class="modal-title">Tambah <?= $title; ?></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nis">NIS</label>
                                <input type="text" name="nis" class="form-control" id="nis" placeholder="NIS Siswa" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama_siswa">Nama Siswa</label>
                                <input type="text" name="nama_siswa" class="form-control" id="nama_siswa" placeholder="Nama Siswa" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="kelas">Kelas</label>
                                <select name="kelas" class="form-control" id="matpel">
                                    <option value="">Pilih Kelas</option>
                                    <?php foreach ($kelas as $row) : ?>
                                        <option value="<?= $row['id_kelas']; ?>"><?= $row['kelas']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" id="username" placeholder="Username" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password" autocomplete="off">
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

<?php foreach ($siswa as $row) : ?>
    <!-- Modal Edit Data -->
    <div class="modal fade" id="modal-edit<?= $row['id_siswa']; ?>">
        <div class="modal-dialog">
            <!-- form start -->
            <form action="/siswa/edit_siswa" method="POST" id="quickForm">
                <?= csrf_field(); ?>
                <div class="modal-content">
                    <div class="modal-header bg-purple">
                        <h4 class="modal-title">Tambah <?= $title; ?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <input type="hidden" name="id_user" value="<?= $row['id_user']; ?>">
                            <input type="hidden" name="id_siswa" value="<?= $row['id_siswa']; ?>">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nip">NIS</label>
                                    <input type="text" name="nis" class="form-control" id="nis" placeholder="NIS Siswa" value="<?= $row['NIS']; ?>" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_siswa">Nama Siswa</label>
                                    <input type="text" name="nama_siswa" class="form-control" id="nama_siswa" placeholder="Nama Siswa" value="<?= $row['nama_siswa']; ?>" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="kelas">Kelas</label>
                                    <select name="kelas" class="form-control" id="kelas">
                                        <option value="">Pilih Kelas</option>
                                        <?php foreach ($kelas as $k) : ?>
                                            <option value="<?= $k['id_kelas']; ?>" <?= $k['id_kelas'] == $row['kelas_id'] ? "selected" : ""; ?>><?= $k['kelas']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" name="username" class="form-control" id="username" placeholder="Username" value="<?= $row['username']; ?>" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" class="form-control" id="password" placeholder="Password" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger btn_clsRole" data-dismiss="modal">Tutup <i class="fas fa-times-circle"></i></button>
                        <button type="submit" class="btn btn-primary" id="btn_updateRole">Update <i class="fas fa-check-circle"></i></button>
                    </div>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.Modal Edit Data -->


    <!-- Modal Delete Data -->
    <div class="modal fade" id="modal-hapus<?= $row['id_siswa']; ?>">
        <div class="modal-dialog">
            <!-- form start -->
            <form action="/siswa/hapus_siswa" method="POST" id="quickForm">
                <?= csrf_field(); ?>
                <div class="modal-content">
                    <input type="hidden" name="id_user" value="<?= $row['id_user']; ?>">
                    <input type="hidden" name="id_siswa" value="<?= $row['id_siswa']; ?>">
                    <div class="modal-header bg-purple">
                        <h4 class="modal-title">Hapus <?= $title; ?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda yakin ingin menghapus data siswa <?= $row['nama_siswa']; ?>?</p>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup <i class="fas fa-times-circle"></i></button>
                        <button type="submit" class="btn btn-primary">Hapus <i class="fas fa-trash"></i></button>
                    </div>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.Modal Delete Data -->
<?php endforeach; ?>

<?= $this->endSection(); ?>