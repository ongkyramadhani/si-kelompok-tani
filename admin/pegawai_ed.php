<?php require_once("head.php"); require_once("../koneksi.php"); ?>
<?php 
  $id_pegawai  = $_GET['id_pegawai'];
  $tb_dt = mysqli_query($koneksi,"SELECT * FROM pegawai WHERE id_pegawai = '$id_pegawai'");
  
  $data = mysqli_fetch_array($tb_dt);{
?>

<div class="content-wrapper">
   <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>FORM EDIT</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Edit Data Pegawai</li>
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
                <h3 class="card-title">Edit Data Pegawai</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="" method="post" enctype="multipart/from-data">
                <div class="card-body">
                  
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                    <label for="exampleInputEmail1">NIP</label>
                    <input type="text" name="nip" value="<?=$data['nip']?>" class="form-control" id="exampleInputEmail1" placeholder="NIP" required="">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                    <label for="exampleInputPassword1">Nama Lengkap</label>
                    <input type="text" class="form-control" value="<?=$data['nama_lengkap']?>" name="nama_lengkap" id="exampleInputPassword1" placeholder="Nama Lengkap">
                  </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                    <label for="exampleInputEmail1">Golongan</label>
                    <input type="text" name="gol" class="form-control" value="<?=$data['gol']?>" placeholder="Golongan">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                    <label for="exampleInputEmail1">Jabatan</label>
                    <input type="text" name="jabatan" class="form-control" value="<?=$data['jabatan']?>" placeholder="Jabatan">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                    <label for="exampleInputEmail1">Nomor KTP</label>
                    <input type="text" name="no_ktp" class="form-control" value="<?=$data['no_ktp']?>">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                    <label for="exampleInputEmail1">Tempat Lahir</label>
                    <input type="text" name="tmp_lhr" class="form-control" value="<?=$data['tmp_lhr']?>">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                    <label for="exampleInputEmail1">Tanggal Lahir</label>
                    <input type="date" name="tgl_lhr" class="form-control" value="<?=$data['tgl_lhr']?>">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                    <label for="exampleInputEmail1">Jenis Kelamin</label>
                    <select name="jk" id="" class="form-control">
                      <option value="<?=$data['jk']?>"><?=$data['jk']?></option>
                      <option value="Laki-laki">Laki-laki</option>
                      <option value="Perempuan">Perempuan</option>
                    </select>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                    <label for="exampleInputEmail1">Alamat</label>
                    <input type="text" name="alamat" class="form-control" value="<?=$data['alamat']?>">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                    <label for="exampleInputEmail1">Nomor Telepon</label>
                    <input type="text" name="no_hp" class="form-control" value="<?=$data['no_hp']?>">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                    <label for="exampleInputEmail1">Tanggal Masuk Pegawai</label>
                    <input type="date" name="tgl_mp" class="form-control" value="<?=$data['tgl_mp']?>">
                      </div>
                    </div>
                  </div>

                  <input type="hidden" name="id_pegawai" value="<?=$data['id_pegawai']?>">

                <!-- /.card-body -->
              <?php } ?>
                <div class="card-footer">
                  <button type="button" class="btn btn-secondary" title="Kembali"><a style="color: white;" id="log" onclick="history.back()"><i class="fas fa-undo"></i></a></button>
                  <button type="reset" class="btn btn-danger" title="Reset"><i class="fas fa-trash-restore"></i></button>
                  <button type="submit" name="edit" class="btn btn-warning float-sm-right" title="Ubah"><i class="fas far fa-save"></i></button>
                </div>
              </form>
            </div>
            <!-- /.card -->
           </div>
       </div>
   </div>
</section>
</div>
  <?php require_once("foot.php"); ?>

<?php 
if (isset($_POST['edit'])) {

    $id_pegawai = $_REQUEST['id_pegawai'];
    $nip = $_REQUEST['nip'];
    $nama_lengkap = $_REQUEST['nama_lengkap'];
    $gol = $_REQUEST['gol'];
    $jabatan = $_REQUEST['jabatan'];
    $no_ktp = $_REQUEST['no_ktp'];
    $tmp_lhr = $_REQUEST['tmp_lhr'];
    $tgl_lhr = $_REQUEST['tgl_lhr'];
    $jk = $_REQUEST['jk'];
    $alamat = $_REQUEST['alamat'];
    $no_hp = $_REQUEST['no_hp'];
    $tgl_mp = $_REQUEST['tgl_mp'];

    $ubah = mysqli_query($koneksi,"UPDATE pegawai SET nip='$nip',nama_lengkap='$nama_lengkap',gol='$gol',jabatan='$jabatan',no_ktp='$no_ktp',tmp_lhr='$tmp_lhr',tgl_lhr='$tgl_lhr',jk='$jk',alamat='$alamat',no_hp='$no_hp',tgl_mp='$tgl_mp' WHERE `pegawai`.`id_pegawai`='$id_pegawai'");
if($ubah){
          ?> <script>alert('Berhasil Diubah!'); window.location = 'pegawai.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'pegawai.php';</script><?php
        }

    }
 ?>