  <?php require_once('head.php');require_once('../koneksi.php'); 

    $id_p  = $_GET['id_p'];
  $tb_dt = mysqli_query($koneksi,"SELECT * FROM pengajuan INNER JOIN user ON pengajuan.id_user=user.id_user INNER JOIN kelompok_tani ON pengajuan.id_k=kelompok_tani.id_k INNER JOIN ketua ON kelompok_tani.id_ke=ketua.id_ke WHERE id_p = '$id_p'");
  
  $row = mysqli_fetch_array($tb_dt);{?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Form Edit Data</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Form Edit Data</li>
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
                <h3 class="card-title">Edit Data Pengajuan Bantuan Kelompok Tani</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="row">
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Nama yang Mengajukan</label>
                          <select name="id_user" class="form-control" required="">
                              <option value="<?=$user_row['id_user']?>"><?=$user_row['username']?></option>
                              <?php 
                                $sss = mysqli_query($koneksi, "SELECT * FROM user WHERE level = 'admin'");
                                    while($data = mysqli_fetch_array($sss)) {?>
                                    <option name="id_user" value="<?= $data['id_user'] ?>"><?= $data['nama_u'] ?> | <?= $data['level'] ?></option>
                                  <?php }?>
                          </select>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Nama Kelompok & Ketua</label>
                          <select name="id_k" class="form-control" required="">
                            <option value="<?=$row['id_k']?>"><?=$row['nama']?> | <?=$row['nama_k']?></option>
                            <?php 
                              $sss = mysqli_query($koneksi, "SELECT * FROM kelompok_tani INNER JOIN ketua ON kelompok_tani.id_ke=ketua.id_ke");
                                  while($datak = mysqli_fetch_array($sss)) {?>
                                  <option name="id_k" value="<?= $datak['id_k'] ?>"><?= $datak['nama_k'] ?> | <?= $datak['nama'] ?></option>
                                <?php }?>
                        </select>
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Keperluan Bantuan</label>
                        <input type="text" class="form-control" name="keperluan_p" value="<?=$row['keperluan_p']?>">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Anggaran yang Diajukan</label>
                        <input type="number" class="form-control" name="anggaran" id="" value="<?=$row['anggaran']?>">
                      </div>
                    </div>
                    <div class="col-8">
                      <div class="form-group">
                        <label for="exampleInputFile">File Proposal Pengajuan | pdf | docx | Maximal 800kb</label>
                          <div class="input-group">
                            <input type="hidden" name="fl" value="<?=$row['file_p']?>">
                            <input type="file" name="file" class="custom-file-input">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                      </div>
                    </div>
                    <input type="hidden" name="id_p" value="<?=$row['id_p']?>">
                  <?php } ?>
                  </div>
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
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php require_once('foot.php'); ?>
  <?php 
if (isset($_POST['edit'])) {

    $now = date('Y-m-d');
    $id_user = $_REQUEST['id_user'];
    $id_k = $_REQUEST['id_k'];
    $keperluan_p = $_REQUEST['keperluan_p'];
    $anggaran = $_REQUEST['anggaran'];

    $ekstensi_diperbolehkan = array('pdf','docx');
    $file = $_FILES['file']['name'];
    $x = explode('.', $file);
    $ekstensi = strtolower(end($x));
    $ukuran = $_FILES['file']['size'];
    $file_tmp = $_FILES['file']['tmp_name'];
    $foto = $_FILES['file']['error'];
    $fl = $_REQUEST['fl'];

    if($foto){
    $tambahh = mysqli_query($koneksi,"UPDATE pengajuan SET id_user='$id_user',id_k='$id_k',keperluan_p='$keperluan_p',anggaran='$anggaran',file_p='$fl',tgl_p='$now' WHERE `pengajuan`.`id_p`='$id_p'");
    }if($tambahh){
      ?> <script>alert('Berhasil Diubah Tanpa Mengubah Foto!'); window.location = 'pengajuan.php';</script><?php
    }else{
    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
        if($ukuran < 2048000){  
          $namabaru = rand(1000,9999).preg_replace("/[^a-zA-Z0-9]/", ".", $file);   
          move_uploaded_file($file_tmp, '../fileweb/'.$namabaru);

    $tambah = mysqli_query($koneksi,"UPDATE pengajuan SET id_user='$id_user',id_k='$id_k',keperluan_p='$keperluan_p',anggaran='$anggaran',file_p='$namabaru',tgl_p='$now' WHERE `pengajuan`.`id_p`='$id_p'");
if($tambah){

          ?> <script>alert('Berhasil Disimpan!'); window.location = 'pengajuan.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'pengajuan.php';</script><?php
        }
        }else{
        ?> <script>alert('Gagal, Ukuran File Maksimal 800kb!'); window.location = 'pengajuan.php';</script><?php
        }
      }else{
        ?> <script>alert('Gagal, File yang diupload format Harus JPDF, DOCX!'); window.location = 'pengajuan.php';</script><?php
      }

    }
  }
  
 ?>
