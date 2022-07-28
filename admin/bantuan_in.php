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
                <h3 class="card-title">Input Data Bantuan Kelompok Tani</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="" method="post">
                <div class="card-body">
                  <div class="row">
                    <div class="col-8">
                      <div class="form-group">
                        <label for="">Cari Pengajuan (Berdasarkan Pengajuan yang Sudah Disetujui Atasan)</label>
                          <select name="id_p" class="form-control"  onchange='changeValue(this.value)' required="">
                              <option readonly="">-PILIH-</option>
                              <?php 
                                $sss = mysqli_query($koneksi, "SELECT * FROM pengajuan INNER JOIN kelompok_tani ON pengajuan.id_k=kelompok_tani.id_k INNER JOIN ketua ON kelompok_tani.id_ke=ketua.id_ke INNER JOIN wilayah_binaan ON kelompok_tani.id_w=wilayah_binaan.id_w WHERE status_p = 'Disetujui'");
                                    $z  = "var keperluan_p = new Array();\n;";
                                    $a  = "var kota = new Array();\n;";
                                    $az  = "var anggaran = new Array();\n;";
                                    while($data = mysqli_fetch_array($sss)) {?>
                                    <option name="id_p" value="<?= $data['id_p'] ?>">Nama Ketua : <?= $data['nama'] ?> | <?= $data['nama_k'] ?></option>
                                    <?php 
                                        $z .= "keperluan_p['" .$data['id_p']. "'] = {keperluan_p:'" . addslashes($data['keperluan_p'])."'};\n";
                                        $a .= "kota['" .$data['id_p']. "'] = {kota:'" . addslashes($data['kota'])."'};\n";
                                        $az .= "anggaran['" .$data['id_p']. "'] = {anggaran:'" . addslashes($data['anggaran'])."'};\n";?>
                                  <?php }?>
                          </select>
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
                        <label for="">Keperluan Bantuan</label>
                        <input readonly="" type="text" class="form-control" name="keperluan_p" id="keperluan_p" placeholder="Keperluan Bantuan">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Dana Anggaran yang Diajukan</label>
                        <input readonly="" type="text" class="form-control" name="jumlah_b" id="anggaran" placeholder="Dana Anggaran yang Diajukan">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Jenis Bantuan</label>
                        <select name="jenis_b" id="" class="form-control">
                          <option readonly="">Select</option>
                          <option value="Barang">Barang</option>
                          <option value="Uang">Uang</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Bantuan yang Diberikan</label>
                        <input type="text" class="form-control" name="bantuan" placeholder="Bantuan yang Diberikan">
                      </div>
                    </div>
                    <div class="col-4">
                      <div class="form-group">
                        <label for="">Tanggal Pembuatan Surat ini</label>
                        <input type="date" class="form-control" name="tgl_b" value="<?=date('Y-m-d')?>">
                      </div>
                    </div>
                    <div class="col-4">
                      <label for="">Pegawai Pendamping Bantuan</label>
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
  </div>
  <!-- /.content-wrapper -->

  <?php require_once('foot.php'); ?>
  <?php 
if (isset($_POST['input'])) {

    function random($panjang)   
    {   
      $karakter = 'abcdefghijkl1234567890mnopqrstuvwxyz';     
      $string = '';   
      for($i = 0; $i < $panjang; $i++) {   
         $pos = rand(0, strlen($karakter)-1);   
         $string .= $karakter{$pos};   
      }   
    return $string;   
    }   

    $kode_b = random(4); //jFodd9UWwG 
    $id_p = $_REQUEST['id_p'];
    $id_pegawai = $_REQUEST['id_pegawai'];
    $jenis_b = $_REQUEST['jenis_b'];
    $jumlah_b = $_REQUEST['jumlah_b'];
    $tgl_b = $_REQUEST['tgl_b'];
    $bantuan = $_REQUEST['bantuan'];
    $tambah = mysqli_query($koneksi,"INSERT INTO bantuan (id_p, id_pegawai, jenis_b,jumlah_b,tgl_b,kode_b,bantuan) VALUES(
          '$id_p',
          '$id_pegawai',
          '$jenis_b',
          '$jumlah_b',
          '$tgl_b',
          '$kode_b',
          '$bantuan');");
if($tambah){
          ?> <script>alert('Berhasil Disimpan!'); window.location = 'bantuan.php';</script><?php
        }else{
          ?> <script>alert('Gagal, cek kembali!.'); window.location = 'bantuan_in.php';</script><?php
        }
      }
 ?>
 <script type="text/javascript">
    <?php echo $z;echo $a;echo $az;?>
     function changeValue(id){
      document.getElementById('keperluan_p').value = keperluan_p[id].keperluan_p;
      document.getElementById('anggaran').value = anggaran[id].anggaran;
       document.getElementById('kota').value = kota[id].kota;}
</script>