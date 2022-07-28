<?php 
require_once('../koneksi.php');
$id_jual = $_REQUEST['id_jual'];
	mysqli_query($koneksi, "DELETE FROM jual WHERE id_jual='$id_jual'") or die(mysqli_error());
	echo "<script>alert('Berhasil Dihapus!'); window.location = 'jual.php';</script>"; ?>