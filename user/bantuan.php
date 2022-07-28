  <?php require_once('head.php');require_once('../koneksi.php');require_once('../fungsi_indotgl.php');require_once('../fungsi_rupiah.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Bantuan Kelompok Tani</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Data Bantuan Kelompok Tani</li>
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
                <h3 class="card-title">Tabel Data Bantuan Kelompok Tani</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card">
              <div class="card-header">
                <a title="Input Data" href="bantuan_in.php" class="btn btn-success"><i class="fas fa-plus-circle"></i></a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Jenis Bantuan</th>
                    <th>Nama Kelompok Tani (KT)</th>
                    <th>Ketua Kelompok</th>
                    <th>Tanggal Surat Bantuan</th>
                    <th>Pegawai Pendamping Bantuan</th>
                    <th><i class="fas fa-cogs"></th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <?php 
                    $no = 1;
                    $sql = mysqli_query($koneksi,"SELECT * FROM bantuan INNER JOIN pengajuan ON bantuan.id_p=pengajuan.id_p INNER JOIN pegawai ON bantuan.id_pegawai=pegawai.id_pegawai INNER JOIN kelompok_tani ON pengajuan.id_k=kelompok_tani.id_k INNER JOIN wilayah_binaan ON kelompok_tani.id_w=wilayah_binaan.id_w");
                    while ($data = mysqli_fetch_array($sql)) { ?>

                    <td><?php echo $no++ ?></td>
                    <td><?php echo $data['jenis_b'] ?></td>
                    <td><?php echo $data['nama_k'] ?></td>
                    <td><?php echo $data['nama_ke'] ?></td>
                    <td><?php echo tgl_indo($data['tgl_b']) ?></td>
                    <td><?php echo $data['nama_lengkap'] ?></td>


                    <td id="ikonbtn2" style="vertical-align: middle;">
                      <a title="Edit Data?" name="id_b" href="bantuan_ed.php?id_b=<?php echo $data['id_b']; ?>" class="btn btn-warning btn-circle"><i class="fas fa-edit"></i></a>
                      <a href="bantuan_hp.php?id_b=<?php echo $data['id_b']; ?>" class="btn btn-danger btn-circle" onClick="javascript: return confirm('Konfirmasi data akan dihapus?');"><i class="fas fa-trash"></i></a>
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