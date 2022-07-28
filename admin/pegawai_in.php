<?php require_once("head.php"); require_once("../koneksi.php"); ?>
<div class="content-wrapper">
   <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>FORM INPUT</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Input Data Pegawai</li>
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
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Input Data Pegawai</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="" method="POST" enctype="multipart/form-data">
                <div class="card-body">

                    <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                    <label for="exampleInputEmail1">NIP</label>
                    <input type="text" name="nip" class="form-control" id="exampleInputEmail1" placeholder="NIP" required="">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                    <label for="exampleInputPassword1">Nama Lengkap</label>
                    <input type="text" class="form-control" name="nama_lengkap" id="exampleInputPassword1" placeholder="Nama Lengkap">
                  </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                    <label for="exampleInputEmail1">Golongan</label>
                    <input type="text" name="gol" class="form-control" placeholder="Golongan">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                    <label for="exampleInputEmail1">Jabatan</label>
                    <input type="text" name="jabatan" class="form-control" placeholder="Jabatan">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                    <label for="exampleInputEmail1">Nomor KTP</label>
                    <input type="text" name="no_ktp" class="form-control" placeholder="Nomor KTP">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                    <label for="exampleInputEmail1">Tempat Lahir</label>
                    <input type="text" name="tmp_lhr" class="form-control" placeholder="Tempat Lahir">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                    <label for="exampleInputEmail1">Tanggal Lahir</label>
                    <input type="date" name="tgl_lhr" class="form-control" >
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                    <label for="exampleInputEmail1">Jenis Kelamin</label>
                    <select name="jk" id="" class="form-control">
                      <option readonly="">Select</option>
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
                    <input type="text" name="alamat" class="form-control" placeholder="Alamat">
                      </div>
                    </div>
                    <div class="col-6">
                      <div class="form-group">
                    <label for="exampleInputEmail1">Nomor Telepon</label>
                    <input type="text" name="no_hp" class="form-control" placeholder="Nomor Telepon">
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-6">
                      <div class="form-group">
                    <label for="exampleInputEmail1">Tanggal Masuk Pegawai</label>
                    <input type="date" name="tgl_mp" class="form-control">
                      </div>
                    </div>
                  </div>

                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="button" class="btn btn-secondary" title="Kembali"><a style="color: white;" id="log" onclick="history.back()"><i class="fas fa-undo"></i></a></button>
                  <button type="reset" class="btn btn-danger" title="Reset"><i class="fas fa-trash-restore"></i></button>
                  <button type="submit" name="input" class="btn btn-primary float-sm-right" title="Save"><i class="fas fa-save"></i></button>
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
if (isset($_POST['input'])) {

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

    $tambah = mysqli_query($koneksi,"INSERT INTO `pegawai` (`id_pegawai`, `nip`, `nama_lengkap`, `gol`, `jabatan`, `no_ktp`, `tmp_lhr`, `tgl_lhr`, `jk`, `alamat`, `no_hp`, `tgl_mp`) VALUES (NULL, '$nip', '$nama_lengkap', '$gol', '$jabatan', '$no_ktp', '$tmp_lhr', '$tgl_lhr', '$jk', '$alamat', '$no_hp', '$tgl_mp');");
if($tambah){
          ?> <script>alert('Berhasil Disimpan!'); window.location = 'pegawai.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'pegawai_in.php';</script><?php
        }
      }

    
 ?>