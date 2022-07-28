<?php 
require_once('../koneksi.php');
$id_a = $_REQUEST['id_a'];
	mysqli_query($koneksi, "DELETE FROM anggota WHERE id_a='$id_a'") or die(mysqli_error());
	echo "<script>alert('Berhasil Dihapus!'); window.location = 'anggota.php';</script>"; ?>