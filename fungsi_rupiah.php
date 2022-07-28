<?php 

//membuat format rupiah dengan PHP

//tutorial www.malasngoding.com

 

function rupiah($angka){ //penamaan fungsi

	

	$hasil_rupiah = "Rp " . number_format($angka,0,',','.'); //pemberian format angka

	return $hasil_rupiah; //nilai balik

 

}

 

//echo rupiah(1000000);

?>