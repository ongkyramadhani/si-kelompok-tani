  <?php require_once('head.php');require_once('../koneksi.php'); 

  $id_w  = $_GET['id_w'];
  $tb_dt = mysqli_query($koneksi,"SELECT * FROM wilayah_binaan WHERE id_w = '$id_w'");
  
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
          <div class="col-md-8">
            <!-- general form elements -->
            <div class="card card-warning">
              <div class="card-header">
                <h3 class="card-title">Input Data Wilayah</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post">
                <div class="card-body">
                  <div class="row">
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Kode Wilayah</label>
                        <input type="text" class="form-control" name="kode_w" id="" value="<?=$row['kode_w']?>">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Kelurahan</label>
                        <input type="text" class="form-control" name="kel" id="" value="<?=$row['kel']?>">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Luas Wilayah</label>
                        <input type="text" class="form-control" name="luas_w" id="" value="<?=$row['luas_w']?>">
                      </div>
                      <input type="hidden" name="id_w" value="<?=$row['id_w']?>">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Kecamatan</label>
                        <input type="text" class="form-control" name="kec" id="" value="<?=$row['kec']?>">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Kota</label>
                        <input type="text" class="form-control" name="kota" id="" value="<?=$row['kota']?>">
                      </div>
                    </div>
                    <?php } ?>
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

    $id_w = $_REQUEST['id_w'];
    $kode_w = $_REQUEST['kode_w'];
    $kel = $_REQUEST['kel'];
    $kec = $_REQUEST['kec'];
    $kota = $_REQUEST['kota'];
    $luas_w = $_REQUEST['luas_w'];
    $ubah = mysqli_query($koneksi,"UPDATE wilayah_binaan SET kode_w='$kode_w',kel='$kel',kec='$kec',kota='$kota',luas_w='$luas_w' WHERE `wilayah_binaan`.`id_w`='$id_w'");
if($ubah){
          ?> <script>alert('Berhasil Diubah!'); window.location = 'wilayah.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'wilayah.php';</script><?php
        }

    }
 ?>