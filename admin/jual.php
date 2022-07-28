  <?php require_once('head.php');require_once('../koneksi.php'); require_once('../fungsi_indotgl.php'); require_once('../fungsi_rupiah.php'); error_reporting(0); 

$action = isset($_GET['action']) ? $_GET['action'] : '';  ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar Jual Hasil Tani KT</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Daftar Jual Hasil Tani KT</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <?php
switch($action){ default:
$sql = mysqli_query($koneksi, "SELECT * FROM jual INNER JOIN hasil ON jual.id_h=hasil.id_h");

$id_jual = $_GET['id_jual'];
$anggota = mysqli_query($koneksi, "SELECT * FROM jual INNER JOIN hasil ON jual.id_h=hasil.id_h WHERE id_jual = '$id_jual' ");

$anggota2 = mysqli_query($koneksi, "SELECT * FROM jual INNER JOIN hasil ON jual.id_h=hasil.id_h WHERE id_jual = '$id_jual'");
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
                <h3 class="card-title">Tabel Daftar Jual Hasil Tani KT</h3>
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
                    <th>Nama Tanaman Hasil Tani</th>
                    <th>Harga Jual</th>
                    <th>Satuan</th>
                    <th>Jumlah Jual</th>
                    <th>Tanggal Jual</th>
                    <th>Status</th>
                    <th><i class="fas fa-cogs"></th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <?php 
                    $no = 1;
                    while ($data = mysqli_fetch_array($sql)) { ?>
                    <td><?= $no++ ?></td>
                    <td><?= $data['nama_h'] ?></td>
                    <td><?= $data['satuan'] ?></td>
                    <td><?= rupiah($data['harga_j'])?></td>
                    <td><?= $data['jml_j'] ?></td>'
                    <td><?= tgl_indo($data['tgl_j']) ?></td>'
                    <td><?php 
                      if($data['jml_j']== 0){
                        echo '<p style="vertical-align: middle;" class="text-center text-danger"><b>Tidak Tersedia</b></p>';
                      }else if($data['jml_j']){
                        echo '<p style="vertical-align: middle;" class="text-center text-success"><b>Tersedia</b></p>';
                      } ?>
                    </td>

                    <td id="ikonbtn2" style="vertical-align: middle;">
                      <!-- <a title="Detail ?" name="id_k" href="?action=detail&id_k=<?php echo $data['id_k']; ?>" class="btn btn-primary btn-circle"><i class="fas fa-info-circle"></i></i></a> -->

                      <a title="Edit Data?" name="id_jual" href="?action=ubah&id_jual=<?php echo $data['id_jual']; ?>" class="btn btn-warning btn-circle"><i class="fas fa-edit"></i></a>
                      <a href="jual_hp.php?id_jual=<?php echo $data['id_jual']; ?>" class="btn btn-danger btn-circle" onClick="javascript: return confirm('Konfirmasi data akan dihapus?');"><i class="fas fa-trash"></i></a>
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
                <h3 class="card-title">Input Daftar Jual Hasil Tani KT</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="row">
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Nama Tanaman Hasil Tani</label>
                          <select name="id_h" class="form-control" required="" onchange='changeValue(this.value)'>
                              <option readonly="">-PILIH-</option>
                              <?php 
                                $sss = mysqli_query($koneksi, "SELECT * FROM hasil INNER JOIN kelompok_tani ON hasil.id_k=kelompok_tani.id_k INNER JOIN wilayah_binaan ON kelompok_tani.id_w=wilayah_binaan.id_w");
                                $z  = "var jml_h = new Array();\n;";
                                    while($data = mysqli_fetch_array($sss)) {?>

                                    <option name="id_h" value="<?= $data['id_h'] ?>"><?= $data['nama_h'] ?></option>
                                    <?php 
                                        $z .= "jml_h['" .$data['id_h']. "'] = {jml_h:'" . addslashes($data['jml_h'])."'};\n";?>
                                  <?php }?>
                          </select>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Jumlah Tersedia</label>
                        <input type="text" name="jml" class="form-control" id="jml_h">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Tanggal Jual</label>
                        <input type="date" class="form-control" name="tgl_j" value="<?=date('Y-m-d');?>">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Satuan Penjualan</label>
                        <select name="satuan" id="" class="form-control">
                          <option value="Satuan Tanaman">Satuan Tanaman</option>
                          <option value="Bijian">Bijian</option>
                          <option value="Dus">Dus</option>
                          <option value="Kilo">Kilo</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Harga Jual Hasil Tani</label>
                        <input type="number" class="form-control" name="harga_j" id="" placeholder="Jumlah Jual Hasil Tani">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Jumlah Jual Hasil Tani</label>
                        <input type="number" class="form-control" name="jml_j" id="" placeholder="Jumlah Jual Hasil Tani">
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
 $id_jual  = $_GET['id_jual'];
  $tb_dt = mysqli_query($koneksi,"SELECT * FROM jual INNER JOIN hasil ON jual.id_h=hasil.id_h WHERE id_jual = '$id_jual'");
  $row = mysqli_fetch_array($tb_dt);?>
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Daftar Jual Hasil Tani KT</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="row">
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Nama Tanaman Hasil Tani</label>
                          <select name="id_h" class="form-control" required="" onchange='changeValue(this.value)'>
                              <option value="<?=$row['id_h']?>"><?=$row['nama_h']?></option>
                              <?php 
                                $sss = mysqli_query($koneksi, "SELECT * FROM hasil INNER JOIN kelompok_tani ON hasil.id_k=kelompok_tani.id_k INNER JOIN wilayah_binaan ON kelompok_tani.id_w=wilayah_binaan.id_w");
                                $z  = "var jml_h = new Array();\n;";
                                    while($data = mysqli_fetch_array($sss)) {?>

                                    <option name="id_h" value="<?= $data['id_h'] ?>"><?= $data['nama_h'] ?></option>
                                    <?php 
                                        $z .= "jml_h['" .$data['id_h']. "'] = {jml_h:'" . addslashes($data['jml_h'])."'};\n";?>
                                  <?php }?>
                          </select>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Jumlah Tersedia</label>
                        <input type="text" name="jml" class="form-control" id="jml_h" value="<?=$row['jml']?>">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Tanggal Jual</label>
                        <input type="date" class="form-control" name="tgl_j" value="<?=$row['tgl_j']?>">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Satuan Penjualan</label>
                        <select name="satuan" id="" class="form-control">
                          <option value="<?=$row['satuan']?>"><?=$row['satuan']?></option>
                          <option value="Satuan Tanaman">Satuan Tanaman</option>
                          <option value="Bijian">Bijian</option>
                          <option value="Dus">Dus</option>
                          <option value="Kilo">Kilo</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Harga Jual Hasil Tani</label>
                        <input type="number" class="form-control" name="harga_j" id="" value="<?=$row['harga_j']?>">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Jumlah Jual Hasil Tani</label>
                        <input type="number" class="form-control" name="jml_j" id="" value="<?=$row['jml_j']?>">
                      </div>
                    </div>
                  </div>
                  <input type="hidden" name="id_jual" value="<?=$row['id_jual']?>">
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

    $id_h = $_REQUEST['id_h'];
    $jml = $_REQUEST['jml'];
    $satuan = $_REQUEST['satuan'];
    $tgl_j = $_REQUEST['tgl_j'];
    $harga_j = $_REQUEST['harga_j'];
    $jml_j = $_REQUEST['jml_j'];

    $tambah = mysqli_query($koneksi,"INSERT INTO jual (id_h,jml, satuan,tgl_j,harga_j,jml_j) VALUES(
          '$id_h',
          '$jml',
          '$satuan',
          '$tgl_j',
          '$harga_j',
          '$jml_j');");
    if($tambah){
          ?> <script>alert('Berhasil Disimpan!'); window.location = 'jual.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'jual.php';</script><?php
        }
    }
if (isset($_POST['edit'])) {

    $id_jual = $_REQUEST['id_jual'];
    $id_h = $_REQUEST['id_h'];
    $jml = $_REQUEST['jml'];
    $satuan = $_REQUEST['satuan'];
    $tgl_j = $_REQUEST['tgl_j'];
    $harga_j = $_REQUEST['harga_j'];
    $jml_j = $_REQUEST['jml_j'];

    $ubah = mysqli_query($koneksi,"UPDATE jual SET id_h='$id_h',jml='$jml',satuan='$satuan',tgl_j='$tgl_j',harga_j='$harga_j',jml_j='$jml_j' WHERE `jual`.`id_jual`='$id_jual'");
if($ubah){
        ?> <script>alert('Berhasil Disimpan!'); window.location = 'jual.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'jual.php';</script><?php
        }
    }
 ?>
  <?php require_once('foot.php'); ?>
   <script type="text/javascript">
    <?php echo $z;?>
     function changeValue(id){
      document.getElementById('jml_h').value = jml_h[id].jml_h;}
</script>