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
                                    <th>NIP</th>
                                    <th>Nama Guru</th>
                                    <th>Mata Pelajaran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($guru as $row) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $row['NIP']; ?></td>
                                        <td><?= $row['nama_guru']; ?></td>
                                        <td><?= $row['matpel']; ?></td>
                                        <td>
                                            <button type="button" class="bt btn-sm btn-primary" title="Edit Data" data-toggle="modal" data-target="#modal-edit<?= $row['id_guru']; ?>"><i class="fas fa-edit"></i></button>
                                            <button type="button" class="bt btn-sm btn-danger" title="Hapus Data" data-toggle="modal" data-target="#modal-hapus<?= $row['id_guru']; ?>"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>

                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>NIP</th>
                                    <th>Nama Guru</th>
                                    <th>Mata Pelajaran</th>
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
        <form action="/guru/save_guru" method="POST" id="quickForm">
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
                                <label for="nip">NIP</label>
                                <input type="text" name="nip" class="form-control" id="nip" placeholder="NIP Guru" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama_guru">Nama Guru</label>
                                <input type="text" name="nama_guru" class="form-control" id="nama_guru" placeholder="Nama Guru" autocomplete="off">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="matpel">Mata Pelajaran</label>
                                <select name="matpel" class="form-control" id="matpel">
                                    <option value="">Pilih Mata Pelajaran</option>
                                    <?php foreach ($matpel as $row) : ?>
                                        <option value="<?= $row['id_matpel']; ?>"><?= $row['matpel']; ?></option>
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

<?php foreach ($guru as $row) : ?>
    <!-- Modal Edit Data -->
    <div class="modal fade" id="modal-edit<?= $row['id_guru']; ?>">
        <div class="modal-dialog">
            <!-- form start -->
            <form action="/guru/edit_guru" method="POST" id="quickForm">
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
                            <input type="hidden" name="id_guru" value="<?= $row['id_guru']; ?>">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nip">NIP</label>
                                    <input type="text" name="nip" class="form-control" id="nip" placeholder="NIP Guru" value="<?= $row['NIP']; ?>" autocomplete="off">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_guru">Nama Guru</label>
                                    <input type="text" name="nama_guru" class="form-control" id="nama_guru" placeholder="Nama Guru" value="<?= $row['nama_guru']; ?>" autocomplete="off">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="matpel">Mata Pelajaran</label>
                                    <select name="matpel" class="form-control" id="matpel">
                                        <option value="">Pilih Mata Pelajaran</option>
                                        <?php foreach ($matpel as $m) : ?>
                                            <option value="<?= $m['id_matpel']; ?>" <?= $m['id_matpel'] == $row['id_matpel'] ? "selected" : ""; ?>><?= $m['matpel']; ?></option>
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
    <div class="modal fade" id="modal-hapus<?= $row['id_guru']; ?>">
        <div class="modal-dialog">
            <!-- form start -->
            <form action="/guru/hapus_guru" method="POST" id="quickForm">
                <?= csrf_field(); ?>
                <div class="modal-content">
                    <input type="hidden" name="id_user" value="<?= $row['id_user']; ?>">
                    <input type="hidden" name="id_guru" value="<?= $row['id_guru']; ?>">
                    <div class="modal-header bg-purple">
                        <h4 class="modal-title">Hapus <?= $title; ?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda yakin ingin menghapus data guru <?= $row['nama_guru']; ?>?</p>
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