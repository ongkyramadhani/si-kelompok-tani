  <?php require_once('head.php');require_once('../koneksi.php'); require_once('../fungsi_indotgl.php'); require_once('../fungsi_rupiah.php'); error_reporting(0); 

$action = isset($_GET['action']) ? $_GET['action'] : '';  ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Monitoring Bantuan KT</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Data Monitoring Bantuan KT</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <?php
switch($action){ default:
$sql = mysqli_query($koneksi, "SELECT * FROM monitoring INNER JOIN bantuan ON monitoring.id_b=bantuan.id_b INNER JOIN pengajuan ON bantuan.id_p=pengajuan.id_p INNER JOIN pegawai ON bantuan.id_pegawai=pegawai.id_pegawai INNER JOIN kelompok_tani ON pengajuan.id_k=kelompok_tani.id_k");

$id_k = $_GET['id_k'];
$anggota = mysqli_query($koneksi, "SELECT * FROM anggota WHERE id_k = '$id_k' ");

$anggota2 = mysqli_query($koneksi, "SELECT * FROM kelompok_tani WHERE id_k = '$id_k'");
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
                <h3 class="card-title">Tabel Data Monitoring Bantuan KT</h3>
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
                    <th>Jenis Bantuan</th>
                    <th>Bantuan yang Diberikan</th>
                    <th>Anggaran Bantuan</th>
                    <th>TGL Awal & Akhir Monitoring</th>
                    <th>Kesimpulan Monitoring</th>
                    <th>Foto Aktivitas Bantuan</th>
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
                    <td><?php echo $data['jenis_b'] ?></td>
                    <td><?php echo $data['bantuan'] ?></td>
                    <td><?php echo rupiah($data['anggaran']) ?></td>
                    <td><?php echo tgl_indo($data['tgl_awal']) ?> => <?php echo tgl_indo($data['tgl_akhir'])?></td>
                    <td><?php echo $data['kesimpulan'] ?></td>
                    <td><a target="_blank" href="../fileweb/<?php echo $data['foto']; ?>"><img src="<?php echo '../fileweb/'.$data['foto'] ?>" width="95px;"></a></td>


                    <td id="ikonbtn2" style="vertical-align: middle;">
                      <!-- <a title="Detail ?" name="id_k" href="?action=detail&id_k=<?php echo $data['id_k']; ?>" class="btn btn-primary btn-circle"><i class="fas fa-info-circle"></i></i></a> -->

                      <a title="Edit Data?" name="id_m" href="?action=ubah&id_m=<?php echo $data['id_m']; ?>" class="btn btn-warning btn-circle"><i class="fas fa-edit"></i></a>
                      <a href="monitoring_hp.php?id_m=<?php echo $data['id_m']; ?>" class="btn btn-danger btn-circle" onClick="javascript: return confirm('Konfirmasi data akan dihapus?');"><i class="fas fa-trash"></i></a>
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
                <h3 class="card-title">Input Data Monitoring Bantuan KT</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="row">
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Nama KT Berdasarkan Surat Bantuan</label>
                          <select name="id_b" class="form-control" required="">
                              <option readonly="">-PILIH-</option>
                              <?php 
                                $sss = mysqli_query($koneksi, "SELECT * FROM bantuan INNER JOIN pengajuan ON bantuan.id_p=pengajuan.id_p INNER JOIN pegawai ON bantuan.id_pegawai=pegawai.id_pegawai INNER JOIN kelompok_tani ON pengajuan.id_k=kelompok_tani.id_k INNER JOIN ketua ON kelompok_tani.id_ke=ketua.id_ke INNER JOIN wilayah_binaan ON kelompok_tani.id_w=wilayah_binaan.id_w");
                                    while($data = mysqli_fetch_array($sss)) {?>
                                    <option name="id_b" value="<?= $data['id_b'] ?>"><?= $data['nama_k'] ?></option>
                                  <?php }?>
                          </select>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Tanggal Aawal</label>
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
                        <label for="">Kesimpulan Monitoring</label>
                        <textarea class="form-control" name="kesimpulan" id="" cols="30" rows="10"></textarea>
                        
                      </div>
                    </div>
                    <div class="col-8">
                      <div class="form-group">
                        <label for="exampleInputFile">Foto Aktivitas Bantuan KT | png | jpg | jpeg | Maximal 800kb</label>
                          <div class="input-group">
                            <input type="file" name="foto" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
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
 $id_m  = $_GET['id_m'];
  $tb_dt = mysqli_query($koneksi,"SELECT * FROM monitoring INNER JOIN bantuan ON monitoring.id_b=bantuan.id_b INNER JOIN pengajuan ON bantuan.id_p=pengajuan.id_p INNER JOIN pegawai ON bantuan.id_pegawai=pegawai.id_pegawai INNER JOIN kelompok_tani ON pengajuan.id_k=kelompok_tani.id_k WHERE id_m = '$id_m'");
  $row = mysqli_fetch_array($tb_dt);?>
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Data Monitoring Bantuan KT</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="row">
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Nama Kelompok Tani</label>
                          <select name="id_b" class="form-control" required="">
                              <option value="<?=$row['id_b']?>"><?=$row['nama_k']?></option>
                              <?php 
                                $sss = mysqli_query($koneksi, "SELECT * FROM bantuan INNER JOIN pengajuan ON bantuan.id_p=pengajuan.id_p INNER JOIN pegawai ON bantuan.id_pegawai=pegawai.id_pegawai INNER JOIN kelompok_tani ON pengajuan.id_k=kelompok_tani.id_k INNER JOIN ketua ON kelompok_tani.id_ke=ketua.id_ke INNER JOIN wilayah_binaan ON kelompok_tani.id_w=wilayah_binaan.id_w");
                                    while($data = mysqli_fetch_array($sss)) {?>
                                    <option name="id_b" value="<?= $data['id_b'] ?>"><?= $data['nama_k'] ?></option>
                                  <?php }?>
                          </select>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Tanggal Aawal Monitoring</label>
                        <input type="date" class="form-control" name="tgl_awal" value="<?=$row['tgl_awal']?>">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Tanggal Akhir Monitoring</label>
                        <input type="date" class="form-control" name="tgl_akhir" value="<?=$row['tgl_akhir']?>">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Kesimpulan Monitoring</label>
                        <textarea class="form-control" name="kesimpulan" id="" cols="30" rows="10"><?=$row['kesimpulan']?></textarea>
                        
                      </div>
                    </div>
                    <div class="col-8">
                      <div class="form-group">
                        <label for="exampleInputFile">Foto Aktivitas Bantuan KT | png | jpg | jpeg | Maximal 800kb</label>
                          <div class="input-group">
                            <input type="hidden" name="fl" value="<?=$row['foto']?>">
                            <input type="file" name="file" class="custom-file-input" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                      </div>
                    </div>
                  </div>
                  <input type="hidden" name="id_m" value="<?=$row['id_m']?>">
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

    $id_b = $_REQUEST['id_b'];
    $tgl_awal = $_REQUEST['tgl_awal'];
    $tgl_akhir = $_REQUEST['tgl_akhir'];
    $kesimpulan = $_REQUEST['kesimpulan'];

    $ekstensi_diperbolehkan = array('png','jpg','jpeg');
    $namafoto = $_FILES['foto']['name'];
    $x = explode('.', $namafoto);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['foto']['size'];
    $file_tmp = $_FILES['foto']['tmp_name'];

    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        if($ukuran < 2048000){  
          $namabaru = rand(1000,9999).preg_replace("/[^a-zA-Z0-9]/", ".", $namafoto);   
          move_uploaded_file($file_tmp, '../fileweb/'.$namabaru);

    $tambah = mysqli_query($koneksi,"INSERT INTO monitoring (id_b,tgl_awal, tgl_akhir,kesimpulan,foto) VALUES(
          '$id_b',
          '$tgl_awal',
          '$tgl_akhir',
          '$kesimpulan',
          '$namabaru');");
if($tambah){
          ?> <script>alert('Berhasil Disimpan!'); window.location = 'monitoring.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'monitoring.php';</script><?php
        }
        }else{
        ?> <script>alert('Gagal, Ukuran File Maksimal 800kb!'); window.location = 'monitoring.php';</script><?php
        }
      }else{
        ?> <script>alert('Gagal, File yang diupload format Harus PNG, JPEG atau JPG!'); window.location = 'monitoring.php';</script><?php
      }

    }
if (isset($_POST['edit'])) {

    $id_m = $_REQUEST['id_m'];
    $id_b = $_REQUEST['id_b'];
    $tgl_awal = $_REQUEST['tgl_awal'];
    $tgl_akhir = $_REQUEST['tgl_akhir'];
    $kesimpulan = $_REQUEST['kesimpulan'];

    $ekstensi_diperbolehkan = array('png','jpg','jpeg');
    $file = $_FILES['file']['name'];
    $x = explode('.', $file);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $foto = $_FILES['file']['error'];
    $fl = $_REQUEST['fl'];

     if($foto){
    $tambahh = mysqli_query($koneksi,"UPDATE monitoring SET id_b='$id_b',tgl_awal='$tgl_awal',tgl_akhir='$tgl_akhir',kesimpulan='$kesimpulan',foto='$fl' WHERE `monitoring`.`id_m`='$id_m'");
    }if($tambahh){
      ?> <script>alert('Berhasil Diubah Tanpa Mengubah Foto!'); window.location = 'monitoring.php';</script><?php
    }else{
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        if($ukuran < 2048000){  
          $namabaru = rand(1000,9999).preg_replace("/[^a-zA-Z0-9]/", ".", $file);   
          move_uploaded_file($file_tmp, '../fileweb/'.$namabaru);

    $ubah = mysqli_query($koneksi,"UPDATE monitoring SET id_b='$id_b',tgl_awal='$tgl_awal',tgl_akhir='$tgl_akhir',kesimpulan='$kesimpulan',foto='$namabaru' WHERE `monitoring`.`id_m`='$id_m'");
if($ubah){
        ?> <script>alert('Berhasil Disimpan!'); window.location = 'monitoring.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'monitoring.php';</script><?php
        }
        }else{
        ?> <script>alert('Gagal, Ukuran File Maksimal 800kb!'); window.location = 'monitoring.php';</script><?php
        }
      }else{
        ?> <script>alert('Gagal, File yang diupload format Harus PNG, JPEG atau JPG!'); window.location = 'monitoring.php';</script><?php
      }
    }
  }
 ?>
  <?php require_once('foot.php'); ?>