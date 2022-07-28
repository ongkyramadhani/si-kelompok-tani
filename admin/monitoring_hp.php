<?php 
require_once('../koneksi.php');
$id_m = $_REQUEST['id_m'];
	mysqli_query($koneksi, "DELETE FROM monitoring WHERE id_m='$id_m'") or die(mysqli_error());
	echo "<script>alert('Berhasil Dihapus!'); window.location = 'monitoring.php';</script>"; ?>