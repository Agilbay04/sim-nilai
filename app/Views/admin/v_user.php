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

                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID User</th>
                                    <th>Nama</th>
                                    <th>Prodi</th>
                                    <th>Semester</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($user as $u) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $u['id_user']; ?></td>
                                        <td><?= $u['nama']; ?></td>
                                        <td><?= $u['prodi']; ?></td>
                                        <td><?= $u['semester']; ?></td>
                                        <td>
                                            <button class="btn btn-sm btn-danger" title="hapus data" data-toggle="modal" data-target="#modal-del<?= $u['id_user']; ?>"><i class="fas fa-trash"></i></button>
                                            <a href="/user/hasilsaw/<?= $u['id_user']; ?>" class="btn btn-sm btn-primary"><i class="fas fa-eye"></i> Lihat hasil SAW</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>ID User</th>
                                    <th>Nama</th>
                                    <th>Prodi</th>
                                    <th>Semester</th>
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

<?php foreach ($user as $u) : ?>
    <!-- Modal Delete Data -->
    <div class="modal fade" id="modal-del<?= $u['id_user']; ?>">
        <div class="modal-dialog">
            <!-- form start -->
            <form action="/user/delete" method="post">
                <?= csrf_field(); ?>
                <div class="modal-content">
                    <div class="modal-header bg-purple">
                        <h4 class="modal-title">Hapus <?= $title; ?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda yakin ingin menghapus data ini?</p>
                        <input type="hidden" name="id" id="id" value="<?= $u['id_user']; ?>">
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