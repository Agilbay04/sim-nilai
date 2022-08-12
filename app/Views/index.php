<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>
<!-- FLash Data -->
<div class="flash-data" data-flashdata="<?= session()->get('message'); ?>"></div>

<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Dashboard</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <!-- <li class="breadcrumb-item"><a href="/">Dashboard</a></li> -->
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">

    <!-- Small boxes (Stat box) -->
    <div class="row">
      <?php if (session()->get('role') == 1) : ?>
        <div class="col-lg-4 col-md-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <h3><?= $jml_siswa; ?></h3>

              <p>Jumlah Siswa</p>
            </div>
            <div class="icon">
              <i class="fas fa-users"></i>
            </div>
            <a href="/siswa" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-4 col-md-6">
          <!-- small box -->
          <div class="small-box bg-dark">
            <div class="inner">
              <h3><?= $jml_guru; ?></h3>

              <p>Jumlah Guru</p>
            </div>
            <div class="icon">
              <i class="fas fa-user-tie"></i>
            </div>
            <a href="/guru" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->

        <div class="col-lg-4 col-md-6">
          <!-- small box -->
          <div class="small-box bg-purple">
            <div class="inner">
              <h3><?= $jml_matpel; ?></h3>

              <p>Jumlah Matpel</p>
            </div>
            <div class="icon">
              <i class="fas fa-book"></i>
            </div>
            <a href="/matpel" class="small-box-footer">Selengkapnya <i class="fas fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      <?php elseif (session()->get('role') == 2) : ?>
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <h3 class="font-weight-bolder">Hai selamat datang <?= $guru['nama_guru']; ?></h3>
              <p class="text-muted">Selamat datang di halaman dashboard, di sini anda dapat melihat data siswa dan matpel yang anda ajar.</p>
              <label for="">NIP (Nomor Induk Pegawai):</label>
              <p><?= $guru['NIP']; ?></p>
              <label for="">Matpel yang diampu:</label>
              <p><?= $guru['matpel']; ?></p>
            </div>
          </div>
        </div>
      <?php elseif (session()->get('role') == 3) : ?>
        <div class="col-md-12">
          <div class="card">
            <div class="card-body">
              <h3 class="font-weight-bolder">Hai selamat datang <?= $siswa['nama_siswa']; ?></h3>
              <p class="text-muted">Selamat datang di halaman dashboard, di sini anda dapat melihat nilai mata pelajaran anda.</p>
              <label for="">NIS (Nomor Induk Siswa):</label>
              <p><?= $siswa['NIS']; ?></p>
              <label for="">Kelas:</label>
              <p><?= $siswa['kelas']; ?></p>
            </div>
          </div>
        </div>
      <?php endif; ?>
    </div>
    <!-- /.row -->
  </div>
  <!-- /.container-fluid -->
</section>
<!-- /.content -->

<?= $this->endSection(); ?>