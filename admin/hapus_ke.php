<?php
	require_once("../koneksi.php");
	$id_ke = $_REQUEST['id_ke'];

	mysqli_query($koneksi, "DELETE FROM ketua WHERE id_ke='$id_ke'") or die(mysqli_error());
	
	
	echo "<script>alert('Berhasil Dihapus!'); window.location = 'ketua.php';</script>";
?>