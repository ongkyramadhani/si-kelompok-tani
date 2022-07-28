  <?php require_once('head.php');require_once('../koneksi.php'); error_reporting(0); 

$action = isset($_GET['action']) ? $_GET['action'] : '';  ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Akun Ketua Kelompok</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Data Akun Ketua Kelompok</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <?php
switch($action){ default:
$sql = mysqli_query($koneksi, "SELECT * FROM ketua");
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
                <h3 class="card-title">Tabel Data Akun Ketua Kelompok</h3>
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
                    <th>Username</th>
                    <th>Nama Lengkap</th>
                    <th>NIK</th>
                    <th>Alamat</th>
                    <th>Nomor Telepon</th>
                    <th><i class="fas fa-cogs"></th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <?php 
                    $no = 1;
                    while ($data = mysqli_fetch_array($sql)) { ?>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $data['username'] ?></td>
                    <td><?php echo $data['nama'] ?></td>
                    <td><?php echo $data['nik'] ?></td>
                    <td><?php echo $data['alamat'] ?></td>
                    <td><?php echo $data['telp'] ?></td>
                    <td id="ikonbtn2" style="vertical-align: middle;">
                      <!-- <a title="Detail ?" name="id_k" href="?action=detail&id_k=<?php echo $data['id_k']; ?>" class="btn btn-primary btn-circle"><i class="fas fa-edit"></i></a> -->
                      <a title="Edit Data?" name="id_ke" href="?action=ubah&id_ke=<?php echo $data['id_ke']; ?>" class="btn btn-warning btn-circle"><i class="fas fa-edit"></i></a>
                      <a href="ketua_hp.php?id_ke=<?php echo $data['id_ke']; ?>" class="btn btn-danger btn-circle" onClick="javascript: return confirm('Konfirmasi data akan dihapus?');"><i class="fas fa-trash"></i></a>
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
                <h3 class="card-title">Input Data Akun Ketua Kelompok</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post">
                <div class="card-body">
                  <div class="row">
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Username</label>
                          <input type="text" class="form-control" name="username" placeholder="Username">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" class="form-control" name="password" placeholder="Password">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-4">
                      <div class="form-group">
                        <label for=""> NIK</label>
                        <input type="text" class="form-control" name="nik" id="" placeholder="NIK">
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
                        <label for="">Nomor Telepon (Aktif)</label>
                        <input type="number" class="form-control" name="telp" id="" placeholder="Nomor Telepon">
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
 $id_ke  = $_GET['id_ke'];
  $tb_dt = mysqli_query($koneksi,"SELECT * FROM ketua WHERE id_ke = '$id_ke'");
  $row = mysqli_fetch_array($tb_dt);?>
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Data Akun Ketua Kelompok</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post">
                <div class="card-body">
                  <div class="row">
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Username</label>
                          <input type="text" class="form-control" name="username" value="<?=$row['username']?>">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Password</label>
                        <input type="text" class="form-control" name="password" value="<?=$row['password']?>">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Nama Lengkap</label>
                        <input type="text" class="form-control" name="nama" value="<?=$row['nama']?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-4">
                      <div class="form-group">
                        <label for=""> NIK</label>
                        <input type="text" class="form-control" name="nik" value="<?=$row['nik']?>">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Alamat</label>
                        <input type="text" class="form-control" name="alamat" value="<?=$row['alamat']?>">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Nomor Telepon (Aktif)</label>
                        <input type="number" class="form-control" name="telp" value="<?=$row['telp']?>">
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
                  <input type="hidden" name="id_ke" value="<?=$row['id_ke']?>">
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
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $nama = $_REQUEST['nama'];
    $nik = $_REQUEST['nik'];
    $alamat = $_REQUEST['alamat'];
    $telp = $_REQUEST['telp'];
    $tambah = mysqli_query($koneksi,"INSERT INTO ketua (username,  password,level,nama,nik,alamat,telp) VALUES(
          '$username',
          '$password',
          'ketua',
          '$nama',
          '$nik',
          '$alamat',
          '$telp');");
if($tambah){
          ?> <script>alert('Berhasil Disimpan!'); window.location = 'ketua.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'ketua_in.php';</script><?php
        }
      }
if (isset($_POST['edit'])) {

    $id_ke = $_REQUEST['id_ke'];
    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $nama = $_REQUEST['nama'];
    $nik = $_REQUEST['nik'];
    $alamat = $_REQUEST['alamat'];
    $telp = $_REQUEST['telp'];
    $ubah = mysqli_query($koneksi,"UPDATE ketua SET username='$username',password='$password',level='ketua',nama='$nama',nik='$nik',alamat='$alamat',telp='$telp' WHERE `ketua`.`id_ke`='$id_ke'");
if($ubah){
          ?> <script>alert('Berhasil Diubah!'); window.location = 'ketua.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'ketua.php';</script><?php
        }

    }
 ?>

  <?php require_once('foot.php'); ?>
