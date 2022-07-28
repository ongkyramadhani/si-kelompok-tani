<?php
	require_once("../koneksi.php");
	$id_b = $_REQUEST['id_b'];

	mysqli_query($koneksi, "DELETE FROM bantuan WHERE id_b='$id_b'") or die(mysqli_error());
	
	
	echo "<script>alert('Berhasil Dihapus!'); window.location = 'bantuan.php';</script>";
?>