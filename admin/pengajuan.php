  <?php require_once('head.php');require_once('../koneksi.php');require_once('../fungsi_indotgl.php');require_once('../fungsi_rupiah.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Pengajuan Bantuan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Data Pengajuan Bantuan</li>
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
                <h3 class="card-title">Tabel Data Pengajuan Bantuan</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card">
              <div class="card-header">
                <a title="Input Data" href="pengajuan_in.php" class="btn btn-success"><i class="fas fa-plus-circle"></i></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Nama Kelompok Tani</th>
                    <th>Wilayah Kelompok</th>
                    <th>Keperluan Pengajuan Banatuan</th>
                    <th>Anggaran Yang Diajukan</th>
                    <th>File Proposal Pengajuan</th>
                    <th>Tanggal Pengajuan</th>
                    <th>Keterangan Surat</th>
                    <th>Status Surat</th>
                    <th><i class="fas fa-cogs"></th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <?php 
                    $no = 1;
                    $sql = mysqli_query($koneksi,"SELECT * FROM pengajuan INNER JOIN kelompok_tani ON pengajuan.id_k=kelompok_tani.id_k INNER JOIN ketua ON kelompok_tani.id_ke=ketua.id_ke INNER JOIN wilayah_binaan ON kelompok_tani.id_w=wilayah_binaan.id_w");
                    while ($data = mysqli_fetch_array($sql)) { ?>

                    <td><?php echo $no++ ?></td>
                    <td>Nama Kelompok : <?php echo $data['nama_k'] ?> - Nama Ketua : <?php echo $data['nama'] ?></td>
                    <td>Kelurahan : <?php echo $data['kel'] ?> | Kecamatan : <?php echo $data['kec'] ?> | Kota : <?php echo $data['kota'] ?></td>
                    <td><?php echo $data['keperluan_p'] ?></td>
                    <td><?php echo rupiah($data['anggaran']) ?></td>
                    <td><a target="_blank" href="../fileweb/<?php echo $data['file_p']; ?>"><?php echo substr(strip_tags($data['file_p']),0,15).'...'?></a></td>
                    <td><?php echo tgl_indo($data['tgl_p']) ?></td>
                    <td><?php echo $data['ket_p'] ?></td>
                    <td><?php 
                    if($data['status_p']== 'proses'){
                      echo "<p class='badge badge-warning'><b>Sedang Diproses Atasan</b></p>";
                    }else if($data['status_p']== 'Disetujui'){
                      echo "<p class='badge badge-success'><b>Disetujui Atasan</b></p>";
                    }else if($data['status_p']== "Ditolak"){
                      echo "<p class='badge badge-danger'><b>Data Ditolak Atasan</b></p>";
                    }?></td>
                    
                    <td id="ikonbtn2" style="vertical-align: middle;">
                      <a title="Edit Data?" name="id_p" href="pengajuan_ed.php?id_p=<?php echo $data['id_p']; ?>" class="btn btn-warning btn-circle"><i class="fas fa-edit"></i></a>
                      <a href="pengajuan_hp.php?id_p=<?php echo $data['id_p']; ?>" class="btn btn-danger btn-circle" onClick="javascript: return confirm('Konfirmasi data akan dihapus?');"><i class="fas fa-trash"></i></a>
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

  <?php require_once('foot.php'); ?>