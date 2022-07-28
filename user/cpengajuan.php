  <?php require_once('head.php');require_once('../koneksi.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Cetak Data</h1>
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
          <div class="col-md-4">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Cetak Data Pengajuan Bantuan Kelompok Tani</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
                <div class="card-body">
                  <?php $qrytahun = mysqli_query($koneksi, "SELECT * FROM pengajuan INNER JOIN user ON pengajuan.id_user=user.id_user INNER JOIN kelompok_tani ON pengajuan.id_k=kelompok_tani.id_k GROUP BY YEAR(tgl_p) ASC"); ?>
                  <form action="../dt/data_pengajuan.php" method="post" target="_blank"> 
                    <table>
                      <label class="form-label" >Berdasarkan Bulan</label>
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
                        <label class="form-label">Berdasarkan Tahun</label>
                          <div class="" style="margin-bottom: 10px;">
                            <select name="tahun-cetak" class="form-control">
                              <option readonly="">-PILIH TAHUN-</option>
                              <?php if(mysqli_num_rows($qrytahun)) { ?>
                              <?php while ($row = mysqli_fetch_array($qrytahun)) { ?>
                              <option><?php $formatwaktu = $row["tgl_p"];echo date('Y',strtotime($formatwaktu)); ?></option>
                              <?php } ?>
                              <?php } ?>
                            </select>
                          </div>
                      <div class="card-footer">
                      <button type="submit" title="Cetak Data" name="cetak" class="btn btn-primary"><i class="fas fa-check"></i></button>
                      <a name="cetak" title="Cetak Semua Data" href="../dt/data_pengajuan.php?id_p=<?php echo $row['id_p']; ?>" class="btn btn-dark" target="_blank"><i class="fas fa-check-double"></i></a>
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
