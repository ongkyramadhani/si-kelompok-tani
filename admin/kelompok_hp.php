<?php
	require_once("../koneksi.php");
	$id_k = $_REQUEST['id_k'];
	mysqli_query($koneksi, "DELETE FROM kelompok_tani WHERE id_k='$id_k'") or die(mysqli_error());
	echo "<script>alert('Berhasil Dihapus!'); window.location = 'kelompok.php';</script>";
?>