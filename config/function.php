<?php 
function upload() {
	$namafile = $_FILES['file']['name'];
	$ukuranfile = $_FILES['file']['size'];
	$error = $_FILES['file']['error'];
	$tmpname = $_FILES['file']['tmp_name'];
	$eksfilevalid = ['jpg', 'jpeg', 'png', 'pdf', 'docx', 'txt', 'xlsx', 'xlsm', 'xlsb', 'xltx', 'xltm', 'xls', 'xlt', 'xls', 'xml', 'xlam'];
	$eksfile = explode('.', $namafile);
	$eksfile = strtolower(end($eksfile));
	if (!in_array($eksfile, $eksfilevalid)) {
		echo "<script> alert('File Yang Anda upload Salah..!') </script>";
		return false;	}
	if ($ukuranfile > 2000000) {
		echo "<script> alert('Ukuran File Anda Lebih Dari 2 Mb..!')</script>";
		return false;	}
	$namafilebaru = uniqid();
	$namafilebaru .= '.';
	$namafilebaru .= $eksfile;
	move_uploaded_file($tmpname, 'file/'.$namafilebaru);
	return $namafilebaru;
}
?>