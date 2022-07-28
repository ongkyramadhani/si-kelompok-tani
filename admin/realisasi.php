  <?php require_once('head.php');require_once('../koneksi.php'); require_once('../fungsi_indotgl.php'); require_once('../fungsi_rupiah.php'); error_reporting(0); 

$action = isset($_GET['action']) ? $_GET['action'] : '';  ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Realisasi Anggaran Bantuan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Data Realisasi Anggaran Bantuan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <?php
switch($action){ default:
$sql = mysqli_query($koneksi, "SELECT * FROM realisasi INNER JOIN bantuan ON realisasi.id_b=bantuan.id_b INNER JOIN pengajuan ON bantuan.id_p=pengajuan.id_p INNER JOIN kelompok_tani ON pengajuan.id_k=kelompok_tani.id_k INNER JOIN wilayah_binaan ON kelompok_tani.id_w=wilayah_binaan.id_w");

$id_r = $_GET['id_r'];
$anggota = mysqli_query($koneksi, "SELECT * FROM realisasi INNER JOIN bantuan ON realisasi.id_b=bantuan.id_b INNER JOIN pengajuan ON bantuan.id_p=pengajuan.id_p INNER JOIN kelompok_tani ON pengajuan.id_k=kelompok_tani.id_k INNER JOIN wilayah_binaan ON kelompok_tani.id_w=wilayah_binaan.id_w WHERE id_r = '$id_r' ");

$anggota2 = mysqli_query($koneksi, "SELECT * FROM realisasi INNER JOIN bantuan ON realisasi.id_b=bantuan.id_b INNER JOIN pengajuan ON bantuan.id_p=pengajuan.id_p INNER JOIN kelompok_tani ON pengajuan.id_k=kelompok_tani.id_k INNER JOIN wilayah_binaan ON kelompok_tani.id_w=wilayah_binaan.id_w WHERE id_r = '$id_r'");
$jul = mysqli_fetch_array($anggota2);
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
            <h3>Rincian Realisasi</h3>
            <?php $yaya = mysqli_fetch_array($anggota);{?>
          </div>
          <div class="card-body">
          <form name="table" method="POST">
            <div class="row justify-content-center mb-3">
              <div class="col-5">
                <h6>Kode Bantuan</h6>
                <h6>Nama Kelompok</h6>
                <h6>Anggaran Semula</h6>
                <h6>Anggaran Setelah Direvisi</h6>
                <h6>Total Belanja</h6>
                <h6>Kembalian Belanja</h6>
                <h6>Belanja NETTO</h6>
                <h6>Realisasi Anggaran %</h6>
                <h6>Sisa Anggaran</h6>
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
              </div>
              <div class="col-6">
                <h6><?= $yaya['kode_b'] ?></h6>
                <h6><?= $yaya['nama_k'] ?></h6>
                <h6><?= rupiah($yaya['jumlah_b']) ?></h6>
                <h6><?= rupiah($yaya['anggaran_r'])?></h6>
                <h6><?= rupiah($yaya['terpakai_r'])?></h6>
                <h6><?= rupiah($yaya['kembalian_r'])?></h6>
                <h6><?= rupiah($yaya['belanja_netto']) ?></h6>
                <h6><?= round($yaya['realisasi_a'], 2); ?></h6>
                <h6><?= rupiah($yaya['sisa_a']) ?></h6>
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
                <h3 class="card-title">Tabel Data Realisasi Anggaran Bantuan</h3>
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
                  <tr >
                    <th>No.</th>
                    <th>Detail</th>
                    <th>Kode Bantuan</th>
                    <th>Tgl Realisasi</th>
                    <th>Anggaran Semula</th>
                    <th>Digunakan</th>
                    <th>Sisa Anggaran</th>
                    <th><i class="fas fa-cogs"></th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr >
                    <?php 
                    $no = 1;
                    while ($data = mysqli_fetch_array($sql)) { ?>

                    <td><?php echo $no++ ?></td>
                    <td style="vertical-align: middle;"><a title="Detail ?" name="id_r" href="?action=detail&id_r=<?php echo $data['id_r']; ?>" class="btn btn-primary btn-circle"><i class="fas fa-info-circle"></i></i></a></td>
                    <td><?php echo $data['kode_b'] ?></td>
                    <td><?php echo tgl_indo($data['tgl_r']) ?></td>
                    <td><?php echo rupiah($data['jumlah_b']) ?></td>
                    <td><?php echo rupiah($data['terpakai_r']) ?></td>
                    <td><?php echo rupiah($data['sisa_a']) ?></td>


                    <td id="ikonbtn2" style="vertical-align: middle;">
                      <a title="Edit Data?" name="id_r" href="?action=ubah&id_r=<?php echo $data['id_r']; ?>" class="btn btn-warning btn-circle"><i class="fas fa-edit"></i></a>
                      <a href="kelompok_hp.php?id_r=<?php echo $data['id_r']; ?>" class="btn btn-danger btn-circle" onClick="javascript: return confirm('Konfirmasi data akan dihapus?');"><i class="fas fa-trash"></i></a>
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
                <h3 class="card-title">Input Data Realisasi Anggaran Bantuan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post">
                <div class="card-body">
                  <div class="row">
                    <div class="col-8">
                      <div class="form-group">
                        <label for="">Kelompok Tani (Berdasarkan Surat Bantuan)</label>
                          <select name="id_b" class="form-control"  onchange='changeValue(this.value)' required="">
                              <option readonly="">-PILIH-</option>
                              <?php 
                                $sss = mysqli_query($koneksi, "SELECT * FROM bantuan INNER JOIN pengajuan ON bantuan.id_p=pengajuan.id_p INNER JOIN pegawai ON bantuan.id_pegawai=pegawai.id_pegawai INNER JOIN kelompok_tani ON pengajuan.id_k=kelompok_tani.id_k INNER JOIN ketua ON kelompok_tani.id_ke=ketua.id_ke INNER JOIN wilayah_binaan ON kelompok_tani.id_w=wilayah_binaan.id_w");
                                    $z  = "var jumlah_b = new Array();\n;";
                                    while($data = mysqli_fetch_array($sss)) {?>
                                    <option name="id_b" value="<?= $data['id_b'] ?>"><?= $data['kode_b'] ?> | <?= $data['nama_k'] ?></option>
                                    <?php 
                                        $z .= "jumlah_b['" .$data['id_b']. "'] = {jumlah_b:'" . addslashes($data['jumlah_b'])."'};\n";?>
                                  <?php }?>
                          </select>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Tanggal Surat</label>
                        <input type="date" class="form-control" name="tgl_r" value="<?=date('Y-m-d')?>">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Jumlah Anggaran Semula</label>
                        <input readonly="" type="text" class="form-control" name="jumlah_b" id="jumlah_b" placeholder="Jumlah">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Revisi Anggaran</label>
                        <input type="number" name="anggaran_r" class="form-control" placeholder="Revisi Anggaran">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Anggaran Terpakai</label>
                        <input type="number" class="form-control" name="terpakai_r" placeholder="Anggaran Terpakai">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Kembalian</label>
                        <input type="number" class="form-control" name="kembalian_r" id="" placeholder="Kembalian">
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
 $id_r  = $_GET['id_r'];
  $tb_dt = mysqli_query($koneksi,"SELECT * FROM realisasi INNER JOIN bantuan ON realisasi.id_b=bantuan.id_b INNER JOIN pengajuan ON bantuan.id_p=pengajuan.id_p INNER JOIN kelompok_tani ON pengajuan.id_k=kelompok_tani.id_k INNER JOIN wilayah_binaan ON kelompok_tani.id_w=wilayah_binaan.id_w WHERE id_r = '$id_r'");
  $row = mysqli_fetch_array($tb_dt);?>
<section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Edit Data Realisasi Anggaran Bantuan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post">
                <div class="card-body">
                  <div class="row">
                    <div class="col-8">
                      <div class="form-group">
                        <label for="">Kelompok Tani (Berdasarkan Surat Bantuan)</label>
                          <select name="id_b" class="form-control"  onchange='changeValue(this.value)' required="">
                              <option value="<?=$row['id_b']?>"><?=$row['nama_k']?></option>
                              <?php 
                                $sss = mysqli_query($koneksi, "SELECT * FROM bantuan INNER JOIN pengajuan ON bantuan.id_p=pengajuan.id_p INNER JOIN pegawai ON bantuan.id_pegawai=pegawai.id_pegawai INNER JOIN kelompok_tani ON pengajuan.id_k=kelompok_tani.id_k INNER JOIN ketua ON kelompok_tani.id_ke=ketua.id_ke INNER JOIN wilayah_binaan ON kelompok_tani.id_w=wilayah_binaan.id_w");
                                    $z  = "var jumlah_b = new Array();\n;";
                                    while($data = mysqli_fetch_array($sss)) {?>
                                    <option name="id_b" value="<?= $data['id_b'] ?>"><?= $data['kode_b'] ?> | <?= $data['nama_k'] ?></option>
                                    <?php 
                                        $z .= "jumlah_b['" .$data['id_b']. "'] = {jumlah_b:'" . addslashes($data['jumlah_b'])."'};\n";?>
                                  <?php }?>
                          </select>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Tanggal Surat</label>
                        <input type="date" class="form-control" name="tgl_r" value="<?=$row['tgl_r']?>">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Jumlah Anggaran Semula</label>
                        <input readonly="" type="text" class="form-control" name="jumlah_b" id="jumlah_b" value="<?=$row['jumlah_b']?>">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Revisi Anggaran</label>
                        <input type="number" name="anggaran_r" class="form-control" value="<?=$row['anggaran_r']?>">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Anggaran Terpakai</label>
                        <input type="number" class="form-control" name="terpakai_r" value="<?=$row['terpakai_r']?>">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Kembalian</label>
                        <input type="number" class="form-control" name="kembalian_r" id="" value="<?=$row['kembalian_r']?>">
                      </div>
                    </div>
                  </div>
                  <input type="hidden" name="id_r" value="<?=$row['id_r']?>">
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
    $tgl_r = $_REQUEST['tgl_r'];
    $jumlah_b = $_REQUEST['jumlah_b'];
    $anggaran_r = $_REQUEST['anggaran_r'];
    $terpakai_r = $_REQUEST['terpakai_r'];
    $kembalian_r = $_REQUEST['kembalian_r'];

    $ter1 = $terpakai_r;
    $ter2 = $terpakai_r;
    $ang1 = $anggaran_r;
    $ang2 = $anggaran_r;

    $belanja_netto = $ter1 - $kembalian_r;
    $realisasi_a = $ter2 / $ang1 * 100;
    $sisa_a = $ang2 - $belanja_netto;

    $tambah = mysqli_query($koneksi,"INSERT INTO realisasi VALUES(NULL,
          '$id_b',
          '$tgl_r',
          '$jumlah_b',
          '$anggaran_r',
          '$terpakai_r',
          '$kembalian_r',
          '$belanja_netto',
          '$realisasi_a',
          '$sisa_a');");
if($tambah){
          ?> <script>alert('Berhasil Disimpan!'); window.location = 'realisasi.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'realisasi.php';</script><?php
        }
      }
if (isset($_POST['edit'])) {

    $id_r = $_REQUEST['id_r'];
    $id_b = $_REQUEST['id_b'];
    $tgl_r = $_REQUEST['tgl_r'];
    $jumlah_b = $_REQUEST['jumlah_b'];
    $anggaran_r = $_REQUEST['anggaran_r'];
    $terpakai_r = $_REQUEST['terpakai_r'];
    $kembalian_r = $_REQUEST['kembalian_r'];

$ter1 = $terpakai_r;
$ter2 = $terpakai_r;
$ang1 = $anggaran_r;
$ang2 = $anggaran_r;

    $belanja_netto = $ter1 - $kembalian_r;
    $realisasi_a = $ter2 / $ang1 * 100;
    $sisa_a = $ang2 - $belanja_netto;
    $ubah = mysqli_query($koneksi,"UPDATE realisasi SET id_b='$id_b',tgl_r='$tgl_r',jumlah_b='$jumlah_b',anggaran_r='$anggaran_r',terpakai_r='$terpakai_r',kembalian_r='$kembalian_r',belanja_netto='$belanja_netto',realisasi_a='$realisasi_a',sisa_a='$sisa_a' WHERE `realisasi`.`id_r`='$id_r'");
if($ubah){
          ?> <script>alert('Berhasil Diubah!'); window.location = 'realisasi.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'realisasi.php';</script><?php
        }

    }
 ?>
  <?php require_once('foot.php'); ?>
 <script type="text/javascript">
    <?php echo $z;?>
     function changeValue(id){
      document.getElementById('jumlah_b').value = jumlah_b[id].jumlah_b;}
</script>