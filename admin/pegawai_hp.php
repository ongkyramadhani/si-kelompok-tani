<?php
	require_once("../koneksi.php");
	$id_pegawai = $_REQUEST['id_pegawai'];

	mysqli_query($koneksi, "DELETE FROM pegawai WHERE id_pegawai='$id_pegawai'") or die(mysqli_error());
	
	
	echo "<script>alert('Berhasil Dihapus!'); window.location = 'pegawai.php';</script>";
?>