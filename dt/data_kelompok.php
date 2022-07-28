<?php 
	
	require_once("../fungsi_indotgl.php"); 
  require_once("../koneksi.php"); 
  require_once("../fungsi_rupiah.php"); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<title>Data Kelompok Tani</title>
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
  <img src="../gambar/kalsel.png" class="float-left kiri"><h3 class="text-center wew"><b>DINAS PERKEBUNAN DAN PETERNAKAN</b></h3>
  <h5 class="text-center">Alamat :Jl. Jenderal A. Yani km 35 No. 29 Banjarbaru Kode Pos 70711 <p>
    Telepon. 5011-47725304, Fax. 0511-4772847
  </p></h5>
  <h5 class="text-center">Website : disbunnakkalsel@gmail.com Website : <u>http/disbunnak.kalselprov.go.id</u></h5>
  <hr>
  <br>

  <table class="">
  <tbody>
    <tr>
      <td><h5>Nomor</h5></td>
      <td>:</td>
      <td><h5>0662/ 8854-DSN / DISBUNNAK / 2022</h5></td>
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
      <td><h5>Data Kelompok Tani</h5></td>
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
	<h2 class="text-center">DAFTAR KELOMPOK TANI </h2>
  <h2 class="text-center">Dinas Pertanian Dan Peternakan Prov. Kal-Sel</h2><br>
	<table class="table table-bordered table-hover table-sm" style="margin: 0 auto">
			<thead class="">
				<tr class="text-center">
					<th style="vertical-align: middle;">NO</th>
					<th>Wilayah</th>
          <th>Nama Kelompok Tani (KT)</th>
          <th>Alamat Kelompok Tani (KT)</th>
          <th>Tahun Bediri</th>
          <th>Komoditas Unggulan</th>
          <th>Luas Wilayah</th>
          <th>Nama Ketua</th>
          <th>Pegawai Pendamping</th>
				</tr>
				<tbody>	
			</thead>	

				<?php session_start(); 
      if (isset($_POST['cetak1'])) {
        $bulan = $_REQUEST['bulan-cetak'];
        $tahun = $_REQUEST['tahun-cetak'];
        $result = mysqli_query($koneksi, "SELECT * FROM kelompok_tani INNER JOIN wilayah_binaan ON kelompok_tani.id_w=wilayah_binaan.id_w INNER JOIN pegawai ON kelompok_tani.id_pegawai=pegawai.id_pegawai INNER JOIN ketua ON kelompok_tani.id_ke=ketua.id_ke WHERE kelompok_tani.tgl_k LIKE '%$bulan%' AND kelompok_tani.tgl_k LIKE '%$tahun%' ORDER BY nama_k ASC");

        }else if (isset($_POST['cetak2'])) {
        $wilayah = $_REQUEST['wilayah'];
        $result = mysqli_query($koneksi, "SELECT * FROM kelompok_tani INNER JOIN wilayah_binaan ON kelompok_tani.id_w=wilayah_binaan.id_w INNER JOIN pegawai ON kelompok_tani.id_pegawai=pegawai.id_pegawai INNER JOIN ketua ON kelompok_tani.id_ke=ketua.id_ke WHERE kel = '$wilayah' ORDER BY kel ASC");

        }else if (isset($_POST['cetak3'])) {
        $tahun_k = $_REQUEST['tahun_k'];
        $result = mysqli_query($koneksi, "SELECT * FROM kelompok_tani INNER JOIN wilayah_binaan ON kelompok_tani.id_w=wilayah_binaan.id_w INNER JOIN pegawai ON kelompok_tani.id_pegawai=pegawai.id_pegawai INNER JOIN ketua ON kelompok_tani.id_ke=ketua.id_ke WHERE tahun_k = '$tahun_k' ORDER BY nama_k ASC");

        }else{
          $result = mysqli_query($koneksi, "SELECT * FROM kelompok_tani INNER JOIN wilayah_binaan ON kelompok_tani.id_w=wilayah_binaan.id_w INNER JOIN pegawai ON kelompok_tani.id_pegawai=pegawai.id_pegawai INNER JOIN ketua ON kelompok_tani.id_ke=ketua.id_ke");
        } 
        if(mysqli_num_rows($result)==0) {
        echo '<script>alert("Data Tidak Ada !"); window.location.href="../admin/ckelompok.php";</script>';
        
      }

$no = 1;
			while($data = mysqli_fetch_array($result)) {?>
					<tr>
						<td style="vertical-align: middle;"><?=$no++;?></td>
						<td>Kelurahan : <?php echo $data['kel'] ?> | Kecamatan : <?php echo $data['kec'] ?> | Kota : <?php echo $data['kota'] ?></td>
            <td><?php echo $data['nama_k'] ?></td>
            <td><?php echo $data['alamat_k'] ?></td>
            <td><?php echo $data['tahun_k'] ?></td>
            <td><?php echo $data['unggulan'] ?></td>
            <td><?php echo $data['luas_w'] ?></td>
            <td><?php echo $data['nama'] ?></td>
            <td><?php echo $data['nama_lengkap'] ?></td>
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
      <td><h5><b>Kepala Dinas Pertanian dan Peternakan PROV. KAL-SEL</b></h5></td>
    </tr>

    <tr>
      <td><br>
      <br>
      <br>
      <br></td>
    </tr>

    <tr>
      <td><h5><b>Drh. Hj. Suparmi , MS</b></h5> <p>Pembina Muda Utama</p><p><b>NIP. 19680911 199503 2 003</b></p></td>
    </tr>

    <tr>
      <td><h5><b></b></h5></td>
    </tr>
  </tbody>
</table>


	<script>
		window.print();
	</script>
