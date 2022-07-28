  <?php require_once('head.php');require_once('../koneksi.php');require_once('../fungsi_indotgl.php');require_once('../fungsi_rupiah.php');  error_reporting(0); 

$action = isset($_GET['action']) ? $_GET['action'] : '';

$id_b = $_GET['id_b'];
$anggota = mysqli_query($koneksi, "SELECT * FROM bantuan INNER JOIN pengajuan ON bantuan.id_p=pengajuan.id_p INNER JOIN pegawai ON bantuan.id_pegawai=pegawai.id_pegawai INNER JOIN kelompok_tani ON pengajuan.id_k=kelompok_tani.id_k INNER JOIN ketua ON kelompok_tani.id_ke=ketua.id_ke INNER JOIN wilayah_binaan ON kelompok_tani.id_w=wilayah_binaan.id_w WHERE id_b = '$id_b' ");

$anggota2 = mysqli_query($koneksi, "SELECT * FROM bantuan INNER JOIN pengajuan ON bantuan.id_p=pengajuan.id_p INNER JOIN pegawai ON bantuan.id_pegawai=pegawai.id_pegawai INNER JOIN kelompok_tani ON pengajuan.id_k=kelompok_tani.id_k INNER JOIN ketua ON kelompok_tani.id_ke=ketua.id_ke INNER JOIN wilayah_binaan ON kelompok_tani.id_w=wilayah_binaan.id_w WHERE id_b = '$id_b'");
$jul = mysqli_fetch_array($anggota2);?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Bantuan Kelompok Tani</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Data Bantuan Kelompok Tani</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

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
                      <h3>Rincian Surat</h3>
                      <?php $yaya = mysqli_fetch_array($anggota);{?>
                    </div>
                    <div class="card-body">
                    <form name="table" method="POST">
                      <div class="row justify-content-center mb-3">
                        <div class="col-5">
                          <h6>Kode Bantuan</h6>
                          <h6>Nama Kelompok</h6>
                          <h6>Nama Ketua Kelompok</h6>
                          <h6>Nama Pegawai Pendamping Bantuan</h6>
                          <h6>Jenis Bantuan</h6>
                          <h6>Jumlah Anggaran</h6>
                          <h6>Bantuan yang Diberikan</h6>
                          <h6>Tanggal Bantuan</h6>
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
                        </div>
                        <div class="col-6">
                          <h6><?= $yaya['kode_b'] ?></h6>
                          <h6><?= $yaya['nama_k'] ?></h6>
                          <h6><?= $yaya['nama'] ?></h6>
                          <h6><?= $yaya['nama_lengkap']?></h6>
                          <h6><?= $yaya['jenis_b']?></h6>
                          <h6><?= rupiah($yaya['jumlah_b']) ?></h6>
                          <h6><?= $yaya['bantuan'] ?></h6>
                          <h6><?= tgl_indo($yaya['tgl_b']) ?></h6>
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
                <h3 class="card-title">Tabel Data Bantuan Kelompok Tani</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card">
              <div class="card-header">
                <a title="Input Data" href="bantuan_in.php" class="btn btn-success"><i class="fas fa-plus-circle"></i></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Rincian</th>
                    <th>Kode Surat Bantuan</th>
                    <th>Nama Kelompok Tani (KT)</th>
                    <th>Tanggal Surat Bantuan</th>
                    <th>Pegawai Pendamping Bantuan</th>
                    <th><i class="fas fa-cogs"></th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <?php 
                    $no = 1;
                    $sql = mysqli_query($koneksi,"SELECT * FROM bantuan INNER JOIN pengajuan ON bantuan.id_p=pengajuan.id_p INNER JOIN pegawai ON bantuan.id_pegawai=pegawai.id_pegawai INNER JOIN kelompok_tani ON pengajuan.id_k=kelompok_tani.id_k INNER JOIN ketua ON kelompok_tani.id_ke=ketua.id_ke INNER JOIN wilayah_binaan ON kelompok_tani.id_w=wilayah_binaan.id_w");
                    while ($data = mysqli_fetch_array($sql)) { ?>

                    <td><?php echo $no++ ?></td>
                    <td style="vertical-align: middle;"><a title="Detail ?" name="id_b" href="?action=detail&id_b=<?php echo $data['id_b']; ?>" class="btn btn-primary btn-circle"><i class="fas fa-info-circle"></i></i></a></td>
                    <td><?php echo $data['kode_b'] ?></td>
                    <td><?php echo $data['nama_k'] ?></td>
                    <td><?php echo tgl_indo($data['tgl_b']) ?></td>
                    <td><?php echo $data['nama_lengkap'] ?></td>


                    <td id="ikonbtn2" style="vertical-align: middle;">
                      <a title="Edit Data?" name="id_b" href="bantuan_ed.php?id_b=<?php echo $data['id_b']; ?>" class="btn btn-warning btn-circle"><i class="fas fa-edit"></i></a>
                      <a href="bantuan_hp.php?id_b=<?php echo $data['id_b']; ?>" class="btn btn-danger btn-circle" onClick="javascript: return confirm('Konfirmasi data akan dihapus?');"><i class="fas fa-trash"></i></a>
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

  <?php require_once('foot.php'); ?>