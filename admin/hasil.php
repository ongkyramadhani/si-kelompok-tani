  <?php require_once('head.php');require_once('../koneksi.php'); require_once('../fungsi_indotgl.php'); require_once('../fungsi_rupiah.php'); error_reporting(0); 

$action = isset($_GET['action']) ? $_GET['action'] : '';  ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Hasil Tani KT</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Data Hasil Tani KT</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <?php
switch($action){ default:
$sql = mysqli_query($koneksi, "SELECT * FROM hasil INNER JOIN kelompok_tani ON hasil.id_k=kelompok_tani.id_k INNER JOIN wilayah_binaan ON kelompok_tani.id_w=wilayah_binaan.id_w");

$id_h = $_GET['id_h'];
$anggota = mysqli_query($koneksi, "SELECT * FROM hasil INNER JOIN kelompok_tani ON hasil.id_k=kelompok_tani.id_k INNER JOIN wilayah_binaan ON kelompok_tani.id_w=wilayah_binaan.id_w WHERE id_h = '$id_h' ");

$anggota2 = mysqli_query($koneksi, "SELECT * FROM hasil INNER JOIN kelompok_tani ON hasil.id_k=kelompok_tani.id_k INNER JOIN wilayah_binaan ON kelompok_tani.id_w=wilayah_binaan.id_w WHERE id_h = '$id_h'");
$jul = mysqli_fetch_array($anggota2);
  ?>
  <!-- Content Wrapper. Contains page content -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Tabel Data Hasil Tani KT</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card">
              <div class="card-header">
                <a title="Input Data" href="?action=tambah" class="btn btn-success"><i class="fas fa-plus-circle"></i></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama KT</th>
                    <th>Nama Tanaman Hasil Tani</th>
                    <th>Jenis Tanaman Hasil Tani</th>
                    <th>Jumlah Hasil Tani</th>
                    <th>Periode</th>
                    <th><i class="fas fa-cogs"></th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <?php 
                    $no = 1;
                    while ($data = mysqli_fetch_array($sql)) { ?>

                    <td><?php echo $no++ ?></td>
                    <td><?php echo $data['nama_k'] ?></td>
                    <td><?php echo $data['nama_h'] ?></td>
                    <td><?php echo $data['jenis_h']?></td>
                    <td><?php echo $data['jml_h'] ?></td>
                    <td><?php echo tgl_indo($data['tgl_awal']) ?> - <?php echo tgl_indo($data['tgl_akhir']) ?></td>

                    <td id="ikonbtn2" style="vertical-align: middle;">
                      <!-- <a title="Detail ?" name="id_k" href="?action=detail&id_k=<?php echo $data['id_k']; ?>" class="btn btn-primary btn-circle"><i class="fas fa-info-circle"></i></i></a> -->

                      <a title="Edit Data?" name="id_h" href="?action=ubah&id_h=<?php echo $data['id_h']; ?>" class="btn btn-warning btn-circle"><i class="fas fa-edit"></i></a>
                      <a href="hasil_hp.php?id_h=<?php echo $data['id_h']; ?>" class="btn btn-danger btn-circle" onClick="javascript: return confirm('Konfirmasi data akan dihapus?');"><i class="fas fa-trash"></i></a>
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

<?php break;
case "tambah": ?>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Input Data Hasil Tani KT</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="row">
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Nama Kelompok Tani</label>
                          <select name="id_k" class="form-control" required="">
                              <option readonly="">-PILIH-</option>
                              <?php 
                                $sss = mysqli_query($koneksi, "SELECT * FROM kelompok_tani INNER JOIN wilayah_binaan ON kelompok_tani.id_w=wilayah_binaan.id_w INNER JOIN ketua ON kelompok_tani.id_ke=ketua.id_ke INNER JOIN pegawai ON kelompok_tani.id_pegawai=pegawai.id_pegawai");
                                    while($data = mysqli_fetch_array($sss)) {?>
                                    <option name="id_k" value="<?= $data['id_k'] ?>"><?= $data['nama_k'] ?></option>
                                  <?php }?>
                          </select>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Tanggal Awal</label>
                        <input type="date" class="form-control" name="tgl_awal" value="<?=date('Y-m-d');?>">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Tanggal Akhir</label>
                        <input type="date" class="form-control" name="tgl_akhir" id="" placeholder="Tanggal Akhir">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Nama Tanaman Hasil Tani</label>
                        <input type="text" class="form-control" name="nama_h" id="" placeholder="Nama Tanaman Hasil Tani">
                      </div>
                    </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label for="">Jenis Tanaman Hasil Tani</label>
                        <select name="jenis_h" id="" class="form-control">
                          <option readonly="">Select</option>
                          <option value="Sayuran">Sayuran</option>
                          <option value="Buah-buahan">Buah-buahan</option>
                          <option value="Biji-bijian">Biji-bijian</option>
                          <option value="Umbi-umbian">Umbi-umbian</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Jumlah Hasil Tani</label>
                        <input type="number" class="form-control" name="jml_h" id="" placeholder="Jumlah Hasil Tani">
                      </div>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <a title="Back" onclick="history.back()" type="reset" class="btn btn-secondary"><i class="fas fa-undo"></i></a>
                  <button title="Reset Data" type="reset" class="btn btn-danger"><i class="fas fa-trash-restore"></i></button>
                  <button title="Save Data" name="input" type="submit" class="btn btn-primary float-sm-right"><i class="far fa-save"></i></button>
                </div>
              </form>
            </div>
            <!-- /.card -->

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

<?php break;
case "ubah": 
 $id_h  = $_GET['id_h'];
  $tb_dt = mysqli_query($koneksi,"SELECT * FROM hasil INNER JOIN kelompok_tani ON hasil.id_k=kelompok_tani.id_k INNER JOIN wilayah_binaan ON kelompok_tani.id_w=wilayah_binaan.id_w WHERE id_h = '$id_h'");
  $row = mysqli_fetch_array($tb_dt);?>
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Data Hasil Tani KT</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="row">
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Nama Kelompok Tani</label>
                          <select name="id_k" class="form-control" required="">
                              <option value="<?=$row['id_k']?>"><?=$row['nama_k']?></option>
                              <?php 
                                $sss = mysqli_query($koneksi, "SELECT * FROM kelompok_tani INNER JOIN wilayah_binaan ON kelompok_tani.id_w=wilayah_binaan.id_w INNER JOIN ketua ON kelompok_tani.id_ke=ketua.id_ke INNER JOIN pegawai ON kelompok_tani.id_pegawai=pegawai.id_pegawai");
                                    while($data = mysqli_fetch_array($sss)) {?>
                                    <option name="id_k" value="<?= $data['id_k'] ?>"><?= $data['nama_k'] ?></option>
                                  <?php }?>
                          </select>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Tanggal Awal</label>
                        <input type="date" class="form-control" name="tgl_awal" value="<?=$row['tgl_awal']?>">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Tanggal Akhir</label>
                        <input type="date" class="form-control" name="tgl_akhir" id="" value="<?=$row['tgl_akhir']?>">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Nama Tanaman Hasil Tani</label>
                        <input type="text" class="form-control" name="nama_h" id="" value="<?=$row['nama_h']?>">
                      </div>
                    </div>
                  <div class="col-4">
                    <div class="form-group">
                      <label for="">Jenis Tanaman Hasil Tani</label>
                        <select name="jenis_h" id="" class="form-control">
                          <option value="<?=$row['id_k']?>"><?=$row['jenis_h']?></option>
                          <option value="Sayuran">Sayuran</option>
                          <option value="Buah-buahan">Buah-buahan</option>
                          <option value="Biji-bijian">Biji-bijian</option>
                          <option value="Umbi-umbian">Umbi-umbian</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Jumlah Hasil Tani</label>
                        <input type="text" class="form-control" name="jml_h" id="" value="<?=$row['jml_h']?>">
                      </div>
                    </div>
                  </div>
                  <input type="hidden" name="id_h" value="<?=$row['id_h']?>">
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <a title="Back" onclick="history.back()" type="reset" class="btn btn-secondary"><i class="fas fa-undo"></i></a>
                  <button title="Reset Data" type="reset" class="btn btn-danger"><i class="fas fa-trash-restore"></i></button>
                  <button title="Save Data" name="edit" type="submit" class="btn btn-warning float-sm-right"><i class="far fa-save"></i></button>
                </div>
              </form>
            </div>
            <!-- /.card -->

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
<?php break; } ?>

<?php 
if (isset($_POST['input'])) {

    $id_k = $_REQUEST['id_k'];
    $tgl_awal = $_REQUEST['tgl_awal'];
    $tgl_akhir = $_REQUEST['tgl_akhir'];
    $nama_h = $_REQUEST['nama_h'];
    $jenis_h = $_REQUEST['jenis_h'];
    $jml_h = $_REQUEST['jml_h'];

    $tambah = mysqli_query($koneksi,"INSERT INTO hasil (id_k,tgl_awal, tgl_akhir,nama_h,jenis_h,jml_h) VALUES(
          '$id_k',
          '$tgl_awal',
          '$tgl_akhir',
          '$nama_h',
          '$jenis_h',
          '$jml_h');");
    if($tambah){
          ?> <script>alert('Berhasil Disimpan!'); window.location = 'hasil.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'hasil.php';</script><?php
        }
    }
if (isset($_POST['edit'])) {

    $id_h = $_REQUEST['id_h'];
    $id_k = $_REQUEST['id_k'];
    $tgl_awal = $_REQUEST['tgl_awal'];
    $tgl_akhir = $_REQUEST['tgl_akhir'];
    $nama_h = $_REQUEST['nama_h'];
    $jenis_h = $_REQUEST['jenis_h'];
    $jml_h = $_REQUEST['jml_h'];

    $ubah = mysqli_query($koneksi,"UPDATE hasil SET id_k='$id_k',tgl_awal='$tgl_awal',tgl_akhir='$tgl_akhir',nama_h='$nama_h',jenis_h='$jenis_h',jml_h='$jml_h' WHERE `hasil`.`id_h`='$id_h'");
if($ubah){
        ?> <script>alert('Berhasil Disimpan!'); window.location = 'hasil.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'hasil.php';</script><?php
        }
    }
 ?>
  <?php require_once('foot.php'); ?>