<?php
	require_once("../koneksi.php");
	$id_w = $_REQUEST['id_w'];

	mysqli_query($koneksi, "DELETE FROM wilayah_binaan WHERE id_w='$id_w'") or die(mysqli_error());
	
	
	echo "<script>alert('Berhasil Dihapus!'); window.location = 'wilayah.php';</script>";
?>