<?php
	require_once("../koneksi.php");
	$id_p = $_REQUEST['id_p'];

	mysqli_query($koneksi, "DELETE FROM pengajuan WHERE id_p='$id_p'") or die(mysqli_error());
	
	
	echo "<script>alert('Berhasil Dihapus!'); window.location = 'pengajuan.php';</script>";
?>