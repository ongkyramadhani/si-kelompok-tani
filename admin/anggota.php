  <?php require_once('head.php');require_once('../koneksi.php'); require_once('../fungsi_indotgl.php'); error_reporting(0); 

$action = isset($_GET['action']) ? $_GET['action'] : '';  ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Anggota Kelompok Tani</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Data Anggota Kelompok Tani</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <?php
switch($action){ default:
$sql = mysqli_query($koneksi, "SELECT * FROM anggota INNER JOIN kelompok_tani ON anggota.id_k=kelompok_tani.id_k");

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
                <h3 class="card-title">Tabel Data Anggota Kelompok Tani</h3>
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
                    <th>NIK</th>
                    <th>Nama Lengkap</th>
                    <th>Nama Kelompok Tani (KT)</th>
                    <th>Tempat & Tgl Lahir</th>
                    <th>Alamat</th>
                    <th>Nomor HP</th>
                    <th>Jabatan Kelompok</th>
                    <th><i class="fas fa-cogs"></th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <?php 
                    $no = 1;
                    while ($data = mysqli_fetch_array($sql)) { ?>

                    <td><?php echo $no++ ?></td>
                    <td><?php echo $data['nik'] ?></td>
                    <td><?php echo $data['nama_a'] ?></td>
                    <td><?php echo $data['nama_k'] ?></td>
                    <td><?php echo $data['tempat_lahir'] ?>/<?php echo tgl_indo($data['tgl_lahir']) ?></td>
                    <td><?php echo $data['alamat'] ?></td>
                    <td><?php echo $data['no_hp'] ?></td>
                    <td><?php echo $data['jabatan'] ?></td>


                    <td id="ikonbtn2" style="vertical-align: middle;">
                      <!-- <a title="Detail ?" name="id_k" href="?action=detail&id_k=<?php echo $data['id_k']; ?>" class="btn btn-primary btn-circle"><i class="fas fa-info-circle"></i></i></a> -->

                      <a title="Edit Data?" name="id_a" href="?action=ubah&id_a=<?php echo $data['id_a']; ?>" class="btn btn-warning btn-circle"><i class="fas fa-edit"></i></a>
                      <a href="anggota_hp.php?id_a=<?php echo $data['id_a']; ?>" class="btn btn-danger btn-circle" onClick="javascript: return confirm('Konfirmasi data akan dihapus?');"><i class="fas fa-trash"></i></a>
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
          <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Input Data Anggota Kelompok Tani</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post">
                <div class="card-body">
                  <div class="row">
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Nama Kelompok Tani</label>
                          <select name="id_k" class="form-control" required="">
                              <option readonly="">-PILIH-</option>
                              <?php 
                                $sss = mysqli_query($koneksi, "SELECT * FROM kelompok_tani INNER JOIN ketua ON kelompok_tani.id_ke=ketua.id_ke");
                                    while($data = mysqli_fetch_array($sss)) {?>
                                    <option name="id_k" value="<?= $data['id_k'] ?>"><?= $data['nama_k'] ?></option>
                                  <?php }?>
                          </select>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">NIK</label>
                        <input type="text" class="form-control" name="nik" id="" placeholder="NIK">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama_a" id="" placeholder="Nama Lengkap">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Tempat Lahir</label>
                        <input type="text" class="form-control" name="tempat_lahir" id="" placeholder="Tempat Lahir">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tgl_lahir" id="">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Alamat</label>
                        <input type="text" class="form-control" name="alamat" id="" placeholder="Alamat">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Nomor Hp</label>
                        <input type="number" class="form-control" name="no_hp" id="" placeholder="Nomor Hp">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Jabatan</label>
                        <select name="jabatan" class="form-control">
                          <option readonly="">-PILIH-</option>
                          <option value="Sekretaris">Sekretaris</option>
                          <option value="Bendahara">Bendahara</option>
                          <option value="Anggota">Anggota</option>
                        </select>
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
 $id_a  = $_GET['id_a'];
  $tb_dt = mysqli_query($koneksi,"SELECT * FROM anggota INNER JOIN kelompok_tani ON anggota.id_k=kelompok_tani.id_k WHERE id_a = '$id_a'");
  $row = mysqli_fetch_array($tb_dt);?>
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Data Anggota Kelompok Tani</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post">
                <div class="card-body">
                  <div class="row">
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Nama Kelompok Tani</label>
                          <select name="id_k" class="form-control" required="">
                              <option value="<?=$row['id_k']?>"><?=$row['nama_k']?></option>
                              <?php 
                                $sss = mysqli_query($koneksi, "SELECT * FROM kelompok_tani INNER JOIN ketua ON kelompok_tani.id_ke=ketua.id_ke");
                                    while($data = mysqli_fetch_array($sss)) {?>
                                    <option name="id_k" value="<?= $data['id_k'] ?>"><?= $data['nama_k'] ?></option>
                                  <?php }?>
                          </select>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">NIK</label>
                        <input type="text" class="form-control" name="nik" id="" value="<?=$row['nik']?>">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama_a" id="" value="<?=$row['nama_a']?>">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Tempat Lahir</label>
                        <input type="text" class="form-control" name="tempat_lahir" id="" value="<?=$row['tempat_lahir']?>">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Tanggal Lahir</label>
                        <input type="date" class="form-control" name="tgl_lahir" id="" value="<?=$row['tgl_lahir']?>">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Alamat</label>
                        <input type="text" class="form-control" name="alamat" id="" value="<?=$row['alamat']?>">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Nomor Hp</label>
                        <input type="number" class="form-control" name="no_hp" id="" value="<?=$row['no_hp']?>">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Jabatan</label>
                        <select name="jabatan" class="form-control">
                          <option value="<?=$row['jabatan']?>"><?=$row['jabatan']?></option>
                          <option value="Sekretaris">Sekretaris</option>
                          <option value="Bendahara">Bendahara</option>
                          <option value="Anggota">Anggota</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <!-- <div class="form-group">
                    <label for="exampleInputFile">File input</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div> -->
                  <input type="hidden" name="id_a" value="<?=$row['id_a']?>">
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

    $now = date('Y-m-d');
    $id_k = $_REQUEST['id_k'];
    $nik = $_REQUEST['nik'];
    $nama_a = $_REQUEST['nama_a'];
    $tempat_lahir = $_REQUEST['tempat_lahir'];
    $tgl_lahir = $_REQUEST['tgl_lahir'];
    $alamat = $_REQUEST['alamat'];
    $no_hp = $_REQUEST['no_hp'];
    $jabatan = $_REQUEST['jabatan'];
    $tambah = mysqli_query($koneksi,"INSERT INTO anggota (id_k,nik, nama_a,tempat_lahir,tgl_lahir,alamat,no_hp,jabatan) VALUES(
          '$id_k',
          '$nik',
          '$nama_a',
          '$tempat_lahir',
          '$tgl_lahir',
          '$alamat',
          '$no_hp',
          '$jabatan');");
if($tambah){
          ?> <script>alert('Berhasil Disimpan!'); window.location = 'anggota.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'anggota_in.php';</script><?php
        }
      }
if (isset($_POST['edit'])) {

    $id_a = $_REQUEST['id_a'];
    $id_k = $_REQUEST['id_k'];
    $nik = $_REQUEST['nik'];
    $nama_a = $_REQUEST['nama_a'];
    $tempat_lahir = $_REQUEST['tempat_lahir'];
    $tgl_lahir = $_REQUEST['tgl_lahir'];
    $alamat = $_REQUEST['alamat'];
    $no_hp = $_REQUEST['no_hp'];
    $jabatan = $_REQUEST['jabatan'];
    $ubah = mysqli_query($koneksi,"UPDATE anggota SET id_k='$id_k',nik='$nik',nama_a='$nama_a',tempat_lahir='$tempat_lahir',tgl_lahir='$tgl_lahir',alamat='$alamat',no_hp='$no_hp',jabatan='$jabatan' WHERE `anggota`.`id_a`='$id_a'");
if($ubah){
          ?> <script>alert('Berhasil Diubah!'); window.location = 'anggota.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'anggota.php';</script><?php
        }

    }
 ?>
  <?php require_once('foot.php'); ?>