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
                        <table id="tb_matpel" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Matpel</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($matpel as $row) : ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $row['matpel']; ?></td>
                                        <td>
                                            <button type="button" class="bt btn-sm btn-primary" title="Edit Data" data-toggle="modal" data-target="#modal-edit<?= $row['id_matpel']; ?>"><i class="fas fa-edit"></i></button>
                                            <button type="button" class="bt btn-sm btn-danger" title="Hapus Data" data-toggle="modal" data-target="#modal-hapus<?= $row['id_matpel']; ?>"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>

                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>Matpel</th>
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
        <form action="/matpel/save_matpel" method="POST" id="quickForm">
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
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="matpel">Matpel</label>
                                <input type="text" name="matpel" class="form-control" id="matpel" placeholder="Matpel" autocomplete="off">
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

<?php foreach ($matpel as $row) : ?>
    <!-- Modal Edit Data -->
    <div class="modal fade" id="modal-edit<?= $row['id_matpel']; ?>">
        <div class="modal-dialog">
            <!-- form start -->
            <form action="/matpel/edit_matpel" method="POST" id="quickForm">
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
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="matpel">matpel</label>
                                    <input type="hidden" name="id" value="<?= $row['id_matpel']; ?>">
                                    <input type="text" name="matpel" class="form-control" id="matpel" placeholder="Matpel" value="<?= $row['matpel']; ?>" autocomplete="off">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-danger btn_clsmatpel" data-dismiss="modal">Tutup <i class="fas fa-times-circle"></i></button>
                        <button type="submit" class="btn btn-primary" id="btn_updatematpel">Update <i class="fas fa-check-circle"></i></button>
                    </div>
                </div>
            </form>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.Modal Edit Data -->


    <!-- Modal Delete Data -->
    <div class="modal fade" id="modal-hapus<?= $row['id_matpel']; ?>">
        <div class="modal-dialog">
            <!-- form start -->
            <form action="/matpel/hapus_matpel" method="POST" id="quickForm">
                <?= csrf_field(); ?>
                <div class="modal-content">
                    <div class="modal-header bg-purple">
                        <h4 class="modal-title">Hapus <?= $title; ?></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda yakin ingin menghapus data matpel <?= $row['matpel']; ?>?</p>
                        <input type="hidden" name="id" value="<?= $row['id_matpel']; ?>">
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