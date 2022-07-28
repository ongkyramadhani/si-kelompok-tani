<?php require_once("head.php"); ?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Data Pegawai</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="index.php">Home</a></li>
              <li class="breadcrumb-item active">Data Pegawai</li>
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
                <h3 class="card-title">Tabel Data Pegawai</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card">
                <div class="card-header">
                  <!-- <a title="Input Data" href="pegawai_in.php" class="btn btn-success"><i class="fas fa-plus-circle"></i></a> -->
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th>NO</th>
                      <th>Nip</th>
                      <th>Nama Lengkap</th>
                      <th>Golongan</th>
                      <th>Jabatan</th>
                      <!-- <th id="ikonbtn"><i class="fas fa-cogs"></i></th> -->
                    </tr>
                    </thead>
                    <tbody class="text-center">
                    <tr >
                      <?php 
                      $no = 1;
                      $sql = mysqli_query($koneksi,"SELECT * FROM pegawai");
                      while ($data = mysqli_fetch_array($sql)) {
                      ?>
                      <td><?php echo $no++ ?></td>
                      <td><?php echo $data['nip'] ?></td>
                      <td><?php echo $data['nama_lengkap'] ?></td>
                      <td><?php echo $data['gol'] ?></td>
                      <td><?php echo $data['jabatan'] ?></td>
                      <!-- <td id="ikonbtn2">
                        <a title="Edit Data?" name="id_pegawai" href="pegawai_ed.php?id_pegawai=<?php echo $data['id_pegawai']; ?>" class="btn btn-warning btn-circle"><i class="fas fa-edit"></i></a>
                        <a href="pegawai_hp.php?id_pegawai=<?php echo $data['id_pegawai']; ?>" class="btn btn-danger btn-circle" onClick="javascript: return confirm('Konfirmasi data akan dihapus?');"><i class="fas fa-trash"></i></a>
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
  <?php require_once("foot.php"); ?>