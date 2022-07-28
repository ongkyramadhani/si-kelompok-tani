<?php require_once("head.php");require_once("../fungsi_indotgl.php");require_once("../koneksi.php"); error_reporting(0);
$action = isset($_GET['action']) ? $_GET['action'] : ''; ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Pegawai</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Data Pegawai</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
<?php
$id_pegawai = $_GET['id_pegawai'];
$anggota = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE id_pegawai = '$id_pegawai' ");

$anggota2 = mysqli_query($koneksi, "SELECT * FROM pegawai WHERE id_pegawai = '$id_pegawai'");
$yayal = mysqli_fetch_array($anggota2);
  ?>
  <!-- Content Wrapper. Contains page content -->


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <?php 
          if(mysqli_num_rows($anggota)> 0){ ?>
          <section class="content">
            <div class="container-fluid">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h3>Detail Pegawai</h3>
                      <?php $yaya = mysqli_fetch_array($anggota);{?>
                    </div>
                    <div class="card-body">
                    <form name="table" method="POST">
                      <div class="row justify-content-center mb-3">
                        <div class="col-5">
                          <h6>Nama Pegawai</h6>
                          <h6>NIP</h6>
                          <h6>NIK</h6>
                          <h6>Golongan</h6>
                          <h6>Jabatan</h6>
                          <h6>Tempat / TGL Lahir</h6>
                          <h6>Jenis Kelamin</h6>
                          <h6>Alamat</h6>
                          <h6>Nomor Telepon</h6>
                          <h6>Tanggal Masuk Pegawai</h6>
                        </div>
                        <div class="col-1">
                          <h6>:</h6>
                          <h6>:</h6>
                          <h6>:</h6>
                          <h6>:</h6>
                          <h6>:</h6>
                          <h6>:</h6>
                          <h6>:</h6>
                          <h6>:</h6>
                          <h6>:</h6>
                          <h6>:</h6>
                        </div>
                        <div class="col-6">
                          <h6><?= $yaya['nama_lengkap'] ?></h6>
                          <h6><?= $yaya['nip'] ?></h6>
                          <h6><?= $yaya['no_ktp'] ?></h6>
                          <h6><?= $yaya['gol']?> Hari</h6>
                          <h6><?= $yaya['jabatan']?></h6>
                          <h6>Tempat Lahir : <?= $yaya['tmp_lhr'] ?> | TGL Lahir : <?= tgl_indo($yaya['tgl_lhr']) ?></h6>
                          <h6><?= $yaya['jk'] ?></h6>
                          <h6><?= $yaya['alamat'] ?></h6>
                          <h6><?= $yaya['no_hp'] ?></h6>
                          <h6><?= tgl_indo($yaya['tgl_mp']) ?></h6>
                        </div>
                        <?php } ?>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
              <?php } ?>
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tabel Data Pegawai</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card">
                <div class="card-header">
                  <a title="Input Data" href="pegawai_in.php" class="btn btn-success"><i class="fas fa-plus-circle"></i></a>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>NO</th>
                      <th>Detail Pegawai</th>
                      <th>Nip</th>
                      <th>Nama Lengkap</th>
                      <th>Golongan</th>
                      <th>Jabatan</th>
                      <th id="ikonbtn"><i class="fas fa-cogs"></i></th>
                    </tr>
                    </thead>
                    <tbody class="text-center">
                    <tr >
                      <?php 
                      $no = 1;
                      $sql = mysqli_query($koneksi,"SELECT * FROM pegawai");
                      while ($data = mysqli_fetch_array($sql)) {
                      ?>
                      <td><?php echo $no++ ?></td>
                      <td><a title="Detail ?" name="id_pegawai" href="?action=detail&id_pegawai=<?php echo $data['id_pegawai']; ?>" class="btn btn-success btn-circle mb-2"><i class="fas fa-info-circle"></i></i></a></td>
                      <td><?php echo $data['nip'] ?></td>
                      <td><?php echo $data['nama_lengkap'] ?></td>
                      <td><?php echo $data['gol'] ?></td>
                      <td><?php echo $data['jabatan'] ?></td>
                      <td id="ikonbtn2">
                        <a title="Edit Data?" name="id_pegawai" href="pegawai_ed.php?id_pegawai=<?php echo $data['id_pegawai']; ?>" class="btn btn-warning btn-circle"><i class="fas fa-edit"></i></a>
                        <a href="pegawai_hp.php?id_pegawai=<?php echo $data['id_pegawai']; ?>" class="btn btn-danger btn-circle" onClick="javascript: return confirm('Konfirmasi data akan dihapus?');"><i class="fas fa-trash"></i></a>
                      </td>
                    </tr>
                    <?php } ?>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
            </div>
            <!-- /.card -->
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!--/.col (right) -->
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
  <!-- /.content-wrapper -->
  <?php require_once("foot.php"); ?>