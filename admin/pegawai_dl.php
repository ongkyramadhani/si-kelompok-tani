<?php require_once("head.php"); require_once("../koneksi.php"); require_once("../fungsi_indotgl.php"); ?>
<?php
    $id_pemilik = $_GET['id_pemilik'];
      $data_m = mysqli_query($koneksi,"SELECT * FROM pemilik LEFT JOIN ranmor ON pemilik.tipe=ranmor.tipe WHERE id_pemilik = '$id_pemilik' ");
?>
<?php
  $row = mysqli_fetch_array($data_m);{ 
?>
<?php $now = date('2020-01-01'); ?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Detail Data Pemilik An. <?=$row['nama_p'];?></h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Detail Data Pemilik Kendaraan</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Detail Data Pemilik</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
          <div class="row justify-content-center">
      <div class="col-3">
        <h6>Tipe Kendaraan</h6>
        <h6>Merk Kendaraan</h6>
        <h6>Jenis Model</h6>
        <h6>Nama Pemilik</h6>
        <h6>Nomor Plat</h6>
        <h6>Alamat</h6>
        <h6>Warna</h6>
        <h6>Nomor Rangka</h6>
        <h6>Nomor Mesin</h6>
        <h6>Nomor Polisi/STNK</h6>
        <h6>Terakhir Bayar Pajak</h6>
      </div>
      <div class="col-0">
        <h6>:</h6>
        <h6>:</h6>
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
      <div class="col-8">
        <h6><?=$row['tipe'];?></h6>
        <h6><?=$row['merk'];?></h6>
        <h6><?=$row['jenis_model'];?></h6>
        <h6><?=$row['nama_p'];?></h6>
        <h6><?=$row['no_plat'];?></h6>
        <h6><?=$row['alamat'];?></h6>
        <h6><?=$row['warna_kb'];?></h6>
        <h6><?=$row['no_rangka'];?></h6>
        <h6><?=$row['no_mesin'];?></h6>
        <h6><?=$row['no_stnk'];?></h6>
        <h6><?=tgl_indo($row['pajak_last']);?></h6>
      </div>
    </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
          <button type="button" class="btn btn-secondary"><a style="color: white;" id="log" onclick="history.back()"><i class="fas fa-arrow-left"></i></a></button>
        </div>
    <?php } ?>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<?php require_once("foot.php"); ?>