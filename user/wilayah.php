  <?php require_once('head.php');require_once('../koneksi.php'); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Wilayah</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Data Wilayah</li>
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
                <h3 class="card-title">Tabel Data Wilayah</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card">
              <div class="card-header">
                <!-- <a title="Input Data" href="wilayah_in.php" class="btn btn-success"><i class="fas fa-plus-circle"></i></a> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Kode Wilayah</th>
                    <th>Nama Kelurahan Wilayah</th>
                    <th>Nama Kecamatan Wilayah</th>
                    <th>Nama Kota Wilayah</th>
                    <th>Luas Wilayah</th>
                    <!-- <th><i class="fas fa-cogs"></th> -->
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <?php 
                    $no = 1;
                    $sql = mysqli_query($koneksi,"SELECT * FROM wilayah_binaan");
                    while ($data = mysqli_fetch_array($sql)) { ?>

                    <td><?php echo $no++ ?></td>
                    <td><?php echo $data['kode_w'] ?></td>
                    <td><?php echo $data['kel'] ?></td>
                    <td><?php echo $data['kec'] ?></td>
                    <td><?php echo $data['kota'] ?></td>
                    <td><?php echo $data['luas_w'] ?></td>
                    <!-- <td id="ikonbtn2" style="vertical-align: middle;">
                      <a title="Edit Data?" name="id_w" href="wilayah_ed.php?id_w=<?php echo $data['id_w']; ?>" class="btn btn-warning btn-circle"><i class="fas fa-edit"></i></a>
                      <a href="wilayah_hp.php?id_w=<?php echo $data['id_w']; ?>" class="btn btn-danger btn-circle" onClick="javascript: return confirm('Konfirmasi data akan dihapus?');"><i class="fas fa-trash"></i></a>
                    </td> -->
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