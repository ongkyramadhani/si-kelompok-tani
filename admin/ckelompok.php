  <?php require_once('head.php');require_once('../koneksi.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cetak Data Kelompok Tani</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Cetak Data</li>
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
          <div class="col-md-3">
            <div class="card">
              <div class="card-header">
                <div class="card-body">
                  <form action="../dt/data_kelompok.php" method="post" >
                    <table>
                      <label class="form-label" >Berdasarkan Wilayah</label>
                        <div class="" style="margin-bottom: 10px;">
                          <?php $awe = mysqli_query($koneksi, "SELECT * FROM kelompok_tani INNER JOIN wilayah_binaan ON kelompok_tani.id_w=wilayah_binaan.id_w INNER JOIN pegawai ON kelompok_tani.id_pegawai=pegawai.id_pegawai GROUP BY kel ASC");?>
                          <select name="wilayah" class="form-control">
                            <option readonly="">-PILIH WILAYAH-</option>
                            <?php while ($awo = mysqli_fetch_array($awe)) { ?>
                              <option><?php echo $awo["kel"]; ?></option>
                              <?php } ?>
                          </select>
                        </div>
                      <div class="card-footer">
                      <button type="submit" title="Cetak Data" name="cetak2" class="btn btn-primary"><i class="fas fa-check"></i></button>
                    </table>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card">
              <div class="card-header">
                <div class="card-body">
                  <form action="../dt/data_kelompok.php" method="post" >
                    <table>
                      <label class="form-label">Berdasarkan Tahun Berdiri</label>
                          <div class="" style="margin-bottom: 10px;">
                          <?php $ewe = mysqli_query($koneksi, "SELECT * FROM kelompok_tani GROUP BY tahun_k ASC");?>
                          <select name="tahun_k" class="form-control">
                            <option readonly="">-PILIH-</option>
                            <?php while ($awoq = mysqli_fetch_array($ewe)) { ?>
                              <option><?php echo $awoq["tahun_k"]; ?></option>
                              <?php } ?>
                          </select>
                        </div>
                      <div class="card-footer">
                      <button type="submit" title="Cetak Data" name="cetak3" class="btn btn-primary"><i class="fas fa-check"></i></button>
                    </table>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4">
            <!-- general form elements -->
            <div class="card card-primary">
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">
                  <?php $qrytahun = mysqli_query($koneksi, "SELECT * FROM kelompok_tani INNER JOIN wilayah_binaan ON kelompok_tani.id_w=wilayah_binaan.id_w INNER JOIN pegawai ON kelompok_tani.id_pegawai=pegawai.id_pegawai GROUP BY YEAR(tgl_k) ASC");?>
                  <form action="../dt/data_kelompok.php" method="post"> 
                    <table>
                      <label class="form-label" >Berdasarkan Bulan Input Surat</label>
                        <div class="" style="margin-bottom: 10px;">
                          <select name="bulan-cetak" class="form-control">
                            <option readonly="">-PILIH BULAN-</option>
                            <option value="-01-">Januari</option>
                            <option value="-02-">Februari</option>
                            <option value="-03-">Maret</option>
                            <option value="-04-">April</option>
                            <option value="-05-">Mei</option>
                            <option value="-06-">Juni</option>
                            <option value="-07-">Juli</option>
                            <option value="-08-">Agustus</option>
                            <option value="-09-">September</option>
                            <option value="-10-">Oktober</option>
                            <option value="-11-">November</option>
                            <option value="-12-">Desember</option>
                          </select>
                        </div>
                        <label class="form-label">Berdasarkan Tahun Input Surat</label>
                          <div class="" style="margin-bottom: 10px;">
                            <select name="tahun-cetak" class="form-control" required>
                              <?php
                                $ahay = mysqli_query($koneksi, "SELECT DISTINCT YEAR(tgl_k) as tahun FROM kelompok_tani ORDER BY tahun DESC");
                                while($baris = mysqli_fetch_array($ahay)) {
                                    ?><option value="<?= $baris['tahun'] ?>"><?= $baris['tahun']; ?></option> 
                                <?php } ?>
                            </select>
                          </div>
                      <div class="card-footer">
                      <button type="submit" title="Cetak Data" name="cetak1" class="btn btn-primary"><i class="fas fa-check"></i></button>
                      <a name="cetak" title="Cetak Semua Data" href="../dt/data_kelompok.php?id_k=<?php echo $row['id_k']; ?>" class="btn btn-dark" target="_blank"><i class="fas fa-check-double"></i></a>
                    </div>
                  </form>
                </div>
                <!-- /.card-body -->
            <!-- /.card -->

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </section>
    </div><!-- /.container-fluid -->
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <?php require_once('foot.php'); ?>
