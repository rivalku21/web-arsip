<?php 
	$halaman = $_GET['halaman'];
	if($halaman == "penduduk"){
		include "modul/kependudukan/kependudukan.php";}
	elseif ($halaman == "bantuan") {
		if (@$_GET['hal'] == "tambahdata" || @$_GET['hal'] == "edit" || @$_GET['hal'] == "hapus") {
			include "modul/bantuan/form.php";}
		else {
			include "modul/bantuan/bantuan.php";}
	}
	elseif ($halaman == "pembangunan") {
		if (@$_GET['hal'] == "tambahbaru" || @$_GET['hal'] == "edit" || @$_GET['hal'] == "hapus") {
			include "modul/pembangunan/form1.php";}
		else {
			include "modul/pembangunan/pembangunan.php";}
	}
	elseif ($halaman == "anggaran") {
		if (@$_GET['hal'] == "tambahanggaran" || @$_GET['hal'] == "edit" || @$_GET['hal'] == "hapus") {
			include "modul/anggaran/form2.php";}
		else {
			include "modul/anggaran/anggaran.php";}
	}
	else {
		include "modul/home.php";}
?>