<?php require_once("head.php");require_once("../fungsi_indotgl.php");require_once("../koneksi.php"); error_reporting(0);
$action = isset($_GET['action']) ? $_GET['action'] : ''; ?>

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Grafik Data</h1>
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
  <!-- Content Wrapper. Contains page content -->


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header">
                <?php $awe = mysqli_query($koneksi, "SELECT *,YEAR(tgl_akhir) as thun FROM hasil GROUP BY YEAR(tgl_akhir) ASC");?>
                <h3 class="card-title">Grafik Data</h3>
                <form action="" method="post">
                  <div class="float-right">
                    <select class="form-control" name="asw" id="">
                      <option value="">Semua</option>
                    <?php while ($row = mysqli_fetch_array($awe)) { ?>
                    <option value="<?=$row['thun']?>"><?php $formatwaktu = $row["tgl_akhir"];echo date('Y',strtotime($formatwaktu)); ?></option>
                    <?php } ?>
                </select>
                <button type="submit" title="Cetak Data" name="asuw" class="btn btn-primary"><i class="fas fa-check"></i></button></div>
                </form>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <div class="card">
                <!-- /.card-header -->
                <div class="card-body">
                  <div class="col-12">
                      <figure class="highcharts-figure">
                          <div id="container"></div>
                          <p class="highcharts-description">
                              Line chart
                          </p>
                      </figure>
                    </div>
                    <script src="dist/js/highcharts.js"></script>
            <script src="dist/js/exporting.js"></script>
            <script src="dist/js/export-data.js"></script>
            <script src="dist/js/accessibility.js"></script>
            <script type="text/javascript">
              <?php 
                if(isset($_POST['asuw'])){
                $asem = $_REQUEST['asw'];
                  $heynama = mysqli_query($koneksi,"SELECT * FROM hasil WHERE tgl_akhir LIKE '%$asem%' ORDER BY nama_h ");
                }else{
                  $heynama = mysqli_query($koneksi,"SELECT * FROM hasil ORDER BY nama_h");
                }
                
                $nama = [];
                $jml = [];
                while($baris=mysqli_fetch_array($heynama)){
                  $nama[] = (string)$baris['nama_h'];
                  $jml[] = (float)$baris['jml_h'];
                  
                } //penutup while 
              ?>

			      
  Highcharts.chart('container', {
    chart: {
        type: 'line'
    },
    title: {
        text: "Grafik Data Hasil Tani"
    },
    subtitle: {
        text: ''
    },
   
    xAxis: {
        categories: <?=json_encode($nama);?>,
        title: {
            text: null
        }

    } ,
    yAxis: {
        min: 0,
        title: {
            text: 'Jumlah Data',
            align: 'high'
        },
        labels: {
            overflow: 'justify'
        }
    },
    tooltip: {
        valueSuffix: ''
    },
    plotOptions: {
        bar: {
            dataLabels: {
                enabled: true
            }
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'top',
        x: -40,
        y: 80,
        floating: true,
        borderWidth: 1,
        backgroundColor:
            Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
        shadow: true
    },
    credits: {
        enabled: false
    },
    series: [{
        name: 'Jumlah Hasil Tani',
        data: <?=json_encode($jml);?>,
        backgroundColor : ['#343a40'],
    }]
});
</script>
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