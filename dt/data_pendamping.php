<?php 
	
	require_once("../fungsi_indotgl.php"); 
  require_once("../koneksi.php"); 
  require_once("../fungsi_rupiah.php"); 
	require_once("../tgl_indo.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Data Pendamping Desa</title>
	<link rel="stylesheet" href="../cssCetak/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="../cssCetak/dist/css/bootstrap.min.css.map">
	<link rel="stylesheet" href="../cssCetak/dist/css/bootstrap-grid.min.css">
	<link rel="stylesheet" href="../cssCetak/dist/css/bootstrap-grid.min.css.map">
	<link rel="stylesheet" href="../cssCetak/dist/css/bootstrap-reboot.min.css">
	<link rel="stylesheet" href="../cssCetak/dist/css/bootstrap-reboot.min.css.map">
  <style>
    .text-content{
      text-indent: 50px;
    }
    .ttd{
      margin-left: 75%;
    }
    #isi{
      line-height: 1.7;
    }
    .kiri{
      margin-top: -4%;
      position: absolute;
      width: 100px;
    }
    .tengah{
      margin-left: -18%;
      margin-top: -2%;
      position: absolute;
      width: 380px;
    }
    .kanan{
      margin-top: -7%;
      margin-left: 82%;
      width: 115px;
      position: absolute;
    }
    img{
      
      width: 220px;
    }
    hr{
      border: solid;
      color: #333;
    }
    .wew{
      
    }
    .tujuan{
      margin-left: 70%;
      margin-top: -16%;
    }
    h5, td, h2, h4, h6{
      color: black;
    }
  </style>
</head>

    <div class="container" style="font-family: Times;"><br>
    
  <h3 class="text-center"><b>PEMERINTAH PROVINSI KALIMANTAN SELATAN</b></h3>
  <img src="../dist/img/kalsel.png" class="float-left kiri"><h3 class="text-center wew"><b>DINAS PEMBERDAYAAN MASYARAKAT DAN DESA</b></h3>
  <h5 class="text-center">Jl. Bangun Praja Nomor 1 Kawan Perkantoran Pemprov Kalsel Kelurahan Cempaka <p>
    Telepon (0511) 6749206, Fax.(0511) 6749212
  </p></h5>
  <h5 class="text-center">Website : dinaspmd.kalselprov.go.id Email : <u>dinaspmdkalsel@gmail.com</u></h5>
  <h5 class="text-center">Banjarbaru (70733)</h5>
  <hr>
  <br>

  <table class="">
  <tbody>
    <tr>
      <td><h5>Nomor</h5></td>
      <td>:</td>
      <td><h5>511.2/ 598.A-PEG / UPMDD / 2022</h5></td>
    </tr>
    <tr>
      <td><h5>Sifat</h5></td>
      <td>:</td>
      <td><h5>Penting</h5></td>
    </tr>
    <tr>
      <td><h5>Lampiran</h5></td>
      <td>:</td>
      <td><h5>- 1 Lembar</h5></td>
    </tr>
    <tr>
      <td><h5>Perihal</h5></td>
      <td>:</td>
      <td><h5>Seluruh Data Pendamping Desa</h5></td>
    </tr>
  </tbody>
</table>

 
	<div class="tujuan">
		<h5><p>Banjarbaru <?php echo tgl_indo(date('Y-m-d')); ?></p>
		<p>
			Kepada&ensp;&ensp;&ensp;:
		<p>
			Yth. Kepala Dinas Pemberdayaan Masyarakat Dan Desa Prov. Kal-Sel 
			<p>
			Di&ensp;-
			<p>
				&ensp;&ensp;&ensp;Tempat
			</p>	
			</p>
		</p>
		</p>
	</h5>
	</div>
	<br>


	<div class="container">
	<h2 class="text-center">DATA PENDAMPING DESA</h2>
  <h3 class="text-center">Dinas Pemberdayaan Masyarakat dan Desa Prov-Kalsel</h3><br>
	<table class="table table-bordered table-hover table-sm" style="margin: 0 auto">
			<thead class="">
				<tr class="text-center">
					<th style="vertical-align: middle;">NO</th>
					<th>Nama Lengkap</th>
          <th>NIK</th>
          <th>Alamat</th>
          <th>No. Telepon</th>
				</tr>
				<tbody>	
			</thead>	

				<?php session_start(); 

      if (isset($_POST['cetak'])) {
        $bulan = $_REQUEST['bulan-cetak'];
        $tahun = $_REQUEST['tahun-cetak'];
        $result = mysqli_query($koneksi, "SELECT * FROM pendamping WHERE pendamping.tgl_pd LIKE '%$bulan%' AND pendamping.tgl_pd LIKE '%$tahun%' ORDER BY tgl_pd ASC");

      }else{
        $result = mysqli_query($koneksi, "SELECT * FROM pendamping");
      }

$no = 1;
			while($data = mysqli_fetch_array($result)) {?>
					<tr>
						<td style="vertical-align: middle;"><?=$no++;?></td>
						<td><?php echo $data['nama_pd'] ?></td>
            <td><?php echo $data['nik'] ?></td>
            <td><?php echo $data['alamat'] ?></td>
            <td><?php echo $data['no_hp'] ?></td>
					</tr>
				<?php } ?>
			</tbody>
		</thead>
	</table>
</div>
</div>

<br>
<br>
<table class="text-center ttd">
  <tbody>
    <tr>
      <td><h5><b>KEPALA DINAS PEMBERDAYAAN MASYARAKAT DAN DESA PROV. KAL-SEL</b></h5></td>
    </tr>

    <tr>
      <td><br>
      <br>
      <br>
      <br></td>
    </tr>

    <tr>
      <td><h5><b>Drs. Zulkipli , MP</b></h5></td>
    </tr>

    <tr>
      <td><h5><b></b></h5></td>
    </tr>
  </tbody>
</table>



	<script>
		window.print();
	</script>
