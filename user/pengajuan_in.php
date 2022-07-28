  <?php require_once('head.php');require_once('../koneksi.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Input Data</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Form Input Data</li>
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
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Input Data Pengajuan Bantuan Kelompok Tani</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="row">
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Nama yang Mengajukan</label>
                          <select name="id_ke" class="form-control">
                            <?php 
                            $nik=$user_row['nik'];
                                $datasapras = mysqli_query($koneksi, "SELECT * FROM ketua WHERE nik=$nik");
                                  while($data = mysqli_fetch_array($datasapras)) {
                                    ?>
                                  <option name="id_ke" value="<?= $data['id_ke'] ?>"><?= $data['nama'] ?></option>
                                <?php 
                                }
                                 ?>
                          </select>
                  </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Nama Kelompok & Ketua</label>
                          <select name="id_k" class="form-control" required="">
                            <?php 
                             $nik=$user_row['nik'];
                              $sss = mysqli_query($koneksi, "SELECT * FROM kelompok_tani INNER JOIN wilayah_binaan ON kelompok_tani.id_w=wilayah_binaan.id_w INNER JOIN ketua ON kelompok_tani.id_ke=ketua.id_ke INNER JOIN pegawai ON kelompok_tani.id_pegawai=pegawai.id_pegawai WHERE nik = '$nik'");
                                  while($datak = mysqli_fetch_array($sss)) {?>
                                  <option name="id_k" value="<?= $datak['id_k'] ?>"><?= $datak['nama_k'] ?> | <?= $datak['nama'] ?></option>
                                <?php }?>
                        </select>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Keperluan Bantuan</label>
                        <input type="text" class="form-control" name="keperluan_p" placeholder="Keperluan Bantuan">

                        <input type="hidden" name="kode_u" value="<?php echo $user_row['kode_u']; ?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Anggaran yang Diajukan</label>
                        <input type="number" class="form-control" name="anggaran" id="" placeholder="Anggaran yang Diajukan">
                      </div>
                    </div>
                    <div class="col-8">
                      <div class="form-group">
                        <label for="exampleInputFile">File Proposal Pengajuan | pdf | docx | Maximal 800kb</label>
                          <div class="input-group">
                            <input type="file" name="file_p" class="custom-file-input" id="exampleInputFile">
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
  </div>
  <!-- /.content-wrapper -->

  <?php require_once('foot.php'); ?>
  <?php 
if (isset($_POST['input'])) {

    $now = date('Y-m-d');
    $id_ke = $_REQUEST['id_ke'];
    $id_k = $_REQUEST['id_k'];
    $keperluan_p = $_REQUEST['keperluan_p'];
    $anggaran = $_REQUEST['anggaran'];
    $file_p = $_REQUEST['file_p'];

    $ekstensi_diperbolehkan = array('pdf','docx');
    $namafoto = $_FILES['file_p']['name'];
    $x = explode('.', $namafoto);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['file_p']['size'];
    $file_tmp = $_FILES['file_p']['tmp_name'];

    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        if($ukuran < 2048000){  
          $namabaru = rand(1000,9999).preg_replace("/[^a-zA-Z0-9]/", ".", $namafoto);   
          move_uploaded_file($file_tmp, '../fileweb/'.$namabaru);

    $tambah = mysqli_query($koneksi,"INSERT INTO pengajuan (id_ke,  id_k, keperluan_p,anggaran,file_p,tgl_p,ket_p,status_p) VALUES(
          '$id_ke',
          '$id_k',
          '$keperluan_p',
          '$anggaran',
          '$namabaru',
          '$now',
          'Menunggu Persetujuan Atasan',
          'proses');");
if($tambah){
          ?> <script>alert('Berhasil Disimpan!'); window.location = 'pengajuan.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'pengajuan_in.php';</script><?php
        }
        }else{
        ?> <script>alert('Gagal, Ukuran File Maksimal 800kb!'); window.location = 'pengajuan_in.php';</script><?php
        }
      }else{
        ?> <script>alert('Gagal, File yang diupload format Harus PDF atau DOCX!'); window.location = 'pengajuan_in.php';</script><?php
      }

    }
 ?>