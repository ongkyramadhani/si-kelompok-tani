  <?php require_once('head.php');require_once('../koneksi.php'); require_once('../fungsi_indotgl.php'); error_reporting(0); 

$action = isset($_GET['action']) ? $_GET['action'] : '';  ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Kelompok Tani</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Data Kelompok Tani</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <?php
switch($action){ default:
  $nik = $user_row['nik'];
$sql = mysqli_query($koneksi, "SELECT * FROM kelompok_tani INNER JOIN wilayah_binaan ON kelompok_tani.id_w=wilayah_binaan.id_w INNER JOIN ketua ON kelompok_tani.id_ke=ketua.id_ke INNER JOIN pegawai ON kelompok_tani.id_pegawai=pegawai.id_pegawai WHERE nik = '$nik'");

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
                <h3 class="card-title">Tabel Data Kelompok Tani</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card">
              <div class="card-header">
                <!-- <a title="Input Data" href="?action=tambah" class="btn btn-success"><i class="fas fa-plus-circle"></i></a> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr >
                    <th>No.</th>
                    <th>Daftar Anggota</th>
                    <th>Wilayah</th>
                    <th>Nama Kelompok Tani (KT)</th>
                    <th>Alamat Kelompok Tani (KT)</th>
                    <th>Tahun Bediri</th>
                    <th>Komoditas Unggulan</th>
                    <th>Luas Wilayah</th>
                    <th>Nama Ketua</th>
                    <th>Pegawai Pendamping</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr >
                    <?php 
                    $no = 1;
                    while ($data = mysqli_fetch_array($sql)) { ?>

                    <td><?php echo $no++ ?></td>
                    <td style="vertical-align: middle;"><a title="Detail ?" name="id_k" href="?action=detail&id_k=<?php echo $data['id_k']; ?>" class="btn btn-primary btn-circle"><i class="fas fa-info-circle"></i></i></a></td>
                    <td>Kelurahan : <?php echo $data['kel'] ?> | Kecamatan : <?php echo $data['kec'] ?> | Kota : <?php echo $data['kota'] ?></td>
                    <td><?php echo $data['nama_k'] ?></td>
                    <td><?php echo $data['alamat_k'] ?></td>
                    <td><?php echo $data['tahun_k'] ?></td>
                    <td><?php echo $data['unggulan'] ?></td>
                    <td><?php echo $data['luas_w'] ?></td>
                    <td><?php echo $data['nama'] ?></td>
                    <td><?php echo $data['nama_lengkap'] ?></td>
                    <!-- <td id="ikonbtn2" style="vertical-align: middle;">
                      <a title="Detail ?" name="id_k" href="?action=detail&id_k=<?php echo $data['id_k']; ?>" class="btn btn-primary btn-circle"><i class="fas fa-info-circle"></i></i></a>

                      <a title="Edit Data?" name="id_k" href="?action=ubah&id_k=<?php echo $data['id_k']; ?>" class="btn btn-warning btn-circle"><i class="fas fa-edit"></i></a>
                      <a href="kelompok_hp.php?id_k=<?php echo $data['id_k']; ?>" class="btn btn-danger btn-circle" onClick="javascript: return confirm('Konfirmasi data akan dihapus?');"><i class="fas fa-trash"></i></a>
                    </td> -->
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
    <?php 
if(mysqli_num_rows($anggota)> 0){ ?>
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3>Daftar Anggota Dari : <?= $jul['nama_k'] ?></h3>
          </div>
          <div class="card-body">
          <form name="table" method="POST">
            <table id="table" class="table table-bordered table-hover">
              <thead class="bg-black">
                <tr class="text-center">
                  <th>No</th>
                  <th>Nama</th>
                  <th>NIK</th>
                  <th>Tempat Lahir</th>
                  <th>Tanggal Lahir</th>
                  <th>Alamat Kelompok</th>
                  <th>Nomor Hp</th>
                  <th>Jabatan</th>
                </tr>
              </thead>
              <tbody>
              <?php $no = 1;
                while($ju = mysqli_fetch_array($anggota)){ ?>
                  <tr class="text-center">
                    <td><?= $no++ ?></td>
                    <td><?= $ju['nama_a'] ?></td>
                    <td><?= $ju['nik'] ?></td>           
                    <td><?= $ju['tempat_lahir'] ?></td>
                    <td><?= tgl_indo($ju['tgl_lahir']) ?></td>
                    <td><?= $ju['alamat'] ?></td>
                    <td><?= $ju['no_hp'] ?></td>
                    <td><?= $ju['jabatan'] ?></td>
                  </tr>
                <?php } ?>
              </tbody>
            </table>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<?php } ?>
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
                <h3 class="card-title">Input Data Kelompok Tani</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post">
                <div class="card-body">
                  <div class="row">
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Kelurahan</label>
                          <select name="id_w" class="form-control"  onchange='changeValue(this.value)' required="">
                              <option readonly="">-PILIH-</option>
                              <?php 
                                $sss = mysqli_query($koneksi, "SELECT * FROM wilayah_binaan");
                                    $z  = "var kec = new Array();\n;";
                                    $a  = "var kota = new Array();\n;";
                                    while($data = mysqli_fetch_array($sss)) {?>
                                    <option name="id_w" value="<?= $data['id_w'] ?>"><?= $data['kel'] ?></option>
                                    <?php 
                                        $z .= "kec['" .$data['id_w']. "'] = {kec:'" . addslashes($data['kec'])."'};\n";
                                        $a .= "kota['" .$data['id_w']. "'] = {kota:'" . addslashes($data['kota'])."'};\n";?>
                                  <?php }?>
                          </select>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Kecamatan</label>
                        <input readonly="" type="text" class="form-control" id="kec" placeholder="Kecamatan">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Kota</label>
                        <input readonly="" type="text" class="form-control" id="kota" placeholder="Kota">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Nama Kelompok Tani (KT)</label>
                        <input type="text" class="form-control" name="nama_k" id="" placeholder="Nama Kelompok Tani (KT)">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Alamat Kelompok Tani</label>
                        <input type="text" class="form-control" name="alamat_k" id="" placeholder="Alamat Kelompok Tani">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Tahun Berdiri</label>
                        <input type="number" class="form-control" name="tahun_k" id="" placeholder="Tahun Berdiri">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Komoditas Unggulan</label>
                        <input type="text" class="form-control" name="unggulan" id="" placeholder="Hasil Tani Unggulan">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Nama Ketua</label>
                        <select name="id_ke" class="form-control" required="">
                              <option readonly="">-PILIH-</option>
                              <?php 
                                $sss = mysqli_query($koneksi, "SELECT * FROM ketua");
                                    while($data = mysqli_fetch_array($sss)) {?>
                                    <option name="id_ke" value="<?= $data['id_ke'] ?>"><?= $data['nama'] ?></option>
                                  <?php }?>
                          </select>
                      </div>
                    </div>
                    <div class="col-4">
                      <label for="">Pegawai Pendamping</label>
                      <select name="id_pegawai" class="form-control"  onchange='changeValue(this.value)' required="">
                          <option readonly="">-PILIH-</option>
                          <?php 
                          $sss = mysqli_query($koneksi, "SELECT * FROM pegawai");
                            while($datak = mysqli_fetch_array($sss)) {?>
                            <option name="id_pegawai" value="<?= $datak['id_pegawai'] ?>"><?= $datak['nama_lengkap'] ?></option>
                          <?php }?>
                      </select>
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
 $id_k  = $_GET['id_k'];
  $tb_dt = mysqli_query($koneksi,"SELECT * FROM kelompok_tani INNER JOIN wilayah_binaan ON kelompok_tani.id_w=wilayah_binaan.id_w INNER JOIN pegawai ON kelompok_tani.id_pegawai=pegawai.id_pegawai WHERE id_k = '$id_k'");
  $row = mysqli_fetch_array($tb_dt);?>
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Data Kelompok Tani</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post">
                <div class="card-body">
                  <div class="row">
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Kelurahan</label>
                          <select name="id_w" class="form-control"  onchange='changeValue(this.value)' required="">
                              <option value="<?=$row['id_w']?>"><?=$row['kel']?></option>
                              <?php 
                                $sss = mysqli_query($koneksi, "SELECT * FROM wilayah_binaan");
                                    $z  = "var kec = new Array();\n;";
                                    $a  = "var kota = new Array();\n;";
                                    while($data = mysqli_fetch_array($sss)) {?>
                                    <option name="id_w" value="<?= $data['id_w'] ?>"><?= $data['kel'] ?></option>
                                    <?php 
                                        $z .= "kec['" .$data['id_w']. "'] = {kec:'" . addslashes($data['kec'])."'};\n";
                                        $a .= "kota['" .$data['id_w']. "'] = {kota:'" . addslashes($data['kota'])."'};\n";?>
                                  <?php }?>
                          </select>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Kecamatan</label>
                        <input readonly="" type="text" class="form-control" id="kec" placeholder="Kecamatan">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Kota</label>
                        <input readonly="" type="text" class="form-control" id="kota" placeholder="Kota">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Nama Kelompok Tani (KT)</label>
                        <input type="text" class="form-control" name="nama_k" id="" value="<?=$row['nama_k']?>">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Alamat Kelompok Tani</label>
                        <input type="text" class="form-control" name="alamat_k" id="" value="<?=$row['alamat_k']?>">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Tahun Berdiri</label>
                        <input type="number" class="form-control" name="tahun_k" id="" value="<?=$row['tahun_k']?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Total Anggota</label>
                        <input type="number" class="form-control" name="total_k" id="" value="<?=$row['total_k']?>">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Komoditas Unggulan</label>
                        <input type="text" class="form-control" name="unggulan" id="" value="<?=$row['unggulan']?>">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Nama Ketua</label>
                        <input type="text" class="form-control" name="nama_ke" id="" value="<?=$row['nama_ke']?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-4">
                      <label for="">Pegawai Pendamping</label>
                      <select name="id_pegawai" class="form-control" required="">
                          <option value="<?=$row['id_pegawai']?>"><?=$row['nama_lengkap']?></option>
                          <?php 
                          $sss = mysqli_query($koneksi, "SELECT * FROM pegawai");
                            while($datak = mysqli_fetch_array($sss)) {?>
                            <option name="id_pegawai" value="<?= $datak['id_pegawai'] ?>"><?= $datak['nama_lengkap'] ?></option>
                          <?php }?>
                      </select>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Tanggal Input Data</label>
                        <input type="date" class="form-control" name="tgl_k" id="" value="<?=$row['tgl_k']?>">
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
                  <input type="hidden" name="id_k" value="<?=$row['id_k']?>">
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
    $id_w = $_REQUEST['id_w'];
    $id_ke = $_REQUEST['id_ke'];
    $nama_k = $_REQUEST['nama_k'];
    $alamat_k = $_REQUEST['alamat_k'];
    $tahun_k = $_REQUEST['tahun_k'];
    $unggulan = $_REQUEST['unggulan'];
    $id_pegawai = $_REQUEST['id_pegawai'];
    $tambah = mysqli_query($koneksi,"INSERT INTO kelompok_tani (id_w,id_ke, nama_k,alamat_k,tahun_k,unggulan,id_pegawai,tgl_k) VALUES(
          '$id_w',
          '$id_ke',
          '$nama_k',
          '$alamat_k',
          '$tahun_k',
          '$unggulan',
          '$id_pegawai',
          '$now');");
if($tambah){
          ?> <script>alert('Berhasil Disimpan!'); window.location = 'kelompok.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'kelompok_in.php';</script><?php
        }
      }
if (isset($_POST['edit'])) {

    $id_k = $_REQUEST['id_k'];
    $id_w = $_REQUEST['id_w'];
    $nama_k = $_REQUEST['nama_k'];
    $alamat_k = $_REQUEST['alamat_k'];
    $tahun_k = $_REQUEST['tahun_k'];
    $total_k = $_REQUEST['total_k'];
    $unggulan = $_REQUEST['unggulan'];
    $nama_ke = $_REQUEST['nama_ke'];
    $id_pegawai = $_REQUEST['id_pegawai'];
    $tgl_k = $_REQUEST['tgl_k'];
    $ubah = mysqli_query($koneksi,"UPDATE kelompok_tani SET id_w='$id_w',nama_k='$nama_k',alamat_k='$alamat_k',tahun_k='$tahun_k',total_k='$total_k',unggulan='$unggulan',nama_ke='$nama_ke',id_pegawai='$id_pegawai',tgl_k='$tgl_k' WHERE `kelompok_tani`.`id_k`='$id_k'");
if($ubah){
          ?> <script>alert('Berhasil Diubah!'); window.location = 'kelompok.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'kelompok.php';</script><?php
        }

    }
 ?>
  <?php require_once('foot.php'); ?>
 <script type="text/javascript">
    <?php echo $z;echo $a;?>
     function changeValue(id){
      document.getElementById('kec').value = kec[id].kec;
       document.getElementById('kota').value = kota[id].kota;}
</script>