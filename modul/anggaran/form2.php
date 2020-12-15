<?php
	// pemanggilan function upload file
	include "config/function.php";

	// klik tombol edit/hapus
	if (isset($_GET['hal'])) {
		// menampilkan data yg diedit
		if ($_GET['hal'] == "edit") {
			$tampil = mysqli_query($koneksi, "SELECT * FROM tbl_anggaran where id_anggaran='$_GET[id]'");
			$data = mysqli_fetch_array($tampil);
			if($data) {
				$vnama_anggaran = $data['nama_anggaran'];
				$vtanggal_upload = $data['tanggal_upload'];
				$vketerangan_anggaran = $data['keterangan_anggaran'];
				$vfile = $data['file'];
			}
		}
		// akhir menampilkan data yg diedit

		// hapus data
		elseif ($_GET['hal'] == "hapus") {
		 	$hapus = mysqli_query($koneksi, "DELETE FROM tbl_anggaran WHERE id_anggaran='$_GET[id]'");
			if ($hapus) {
				echo "<script>
					alert('Hapus Data Sukses');
						document.location='?halaman=anggaran';
					  </script>";
			}
			else {
				echo "<script>
						alert('Hapus Data Gagal');
						document.location='?halaman=anggaran';
					  </script>";	
			}
		 } 
		// akhir hapus data
	}

	//tombol simpan
	if (isset($_POST['bsimpan'])) 
	{

		// data di edit/disimpan
		if (@$_GET['hal'] == "edit") {

			// edit data
			if($_FILES['file']['error'] == 4){
				$file = $vfile;
			}
			else {
				$file = upload();
			}
			$ubah = mysqli_query($koneksi, "UPDATE tbl_anggaran SET 
											nama_anggaran='$_POST[nama_anggaran]',
											tanggal_upload ='$_POST[tanggal_upload]',
											keterangan_anggaran ='$_POST[keterangan_anggaran]',
											file = '$file'
											where id_anggaran ='$_GET[id]' ");
			if ($ubah)
			{
				echo "<script>
					alert('Ubah Data Sukses');
					document.location='?halaman=anggaran';
					</script>";
			}
			else {
				echo "<script>
					alert('Ubah Data Gagal');
					document.location='?halaman=anggaran';
					</script>";
			}

			//akhir edit data

		}

		else {

			//simpan data
			$file = upload();
			$simpan = mysqli_query($koneksi, "INSERT INTO tbl_anggaran VALUES ('',
																				   '$_POST[nama_anggaran]',
																				   '$_POST[tanggal_upload]',
																				   '$_POST[keterangan_anggaran]',
																				   '$file'
																					)" );
			if ($simpan) 
			{
				echo "<script>
					alert('Simpan Data Sukses');
					document.location='?halaman=anggaran';
					</script>";
			}
			else {
				echo "<script>
					alert('Simpan Data Gagal');
					document.location='?halaman=anggaran';
					</script>";
			}
			//akhir simpan data
		}

	}

?>



<div class="card mt-3">
  <div class="card-header bg-info text-white">
    Form Anggaran Dana
  </div>
  <div class="card-body">
  	<form method="POST" action="" enctype="multipart/form-data">
	  <div class="form-group">
	    <label for="nama_anggaran">Nama File</label>
	    <input type="text" class="form-control" id="nama_anggaran" name="nama_anggaran" placeholder="Masukan Nama File" value="<?=@$vnama_anggaran?>">
	  </div>
	  <div class="form-group"> 
	    <label for="tanggal_upload">Tanggal Upload</label>
	    <input type="date" class="form-control" id="tanggal_upload" name="tanggal_upload" value="<?=@$vtanggal_upload?>">
	  </div>
	  <div class="form-group">
	    <label for="keterangan_anggaran">Keterangan</label>
	    <input type="text" class="form-control" id="keterangan_anggaran" name="keterangan_anggaran" placeholder="Keterangan" value="<?=@$vketerangan_anggaran?>">
	  </div>
	  <div class="form-group">
	    <label for="file">Pilih File (Penambahan Data Hanya Dalam File Excel, Word, .txt dan .pdf)</label>
	    <input type="file" class="form-control" id="file" name="file" placeholder="Masukkan File" value="<?=@$vfile?>">
	  </div>

	  <button type="submit" name="bsimpan" class="btn btn-primary">Simpan</button>
	  <button type="reset" name="bbatal" class="btn btn-danger">Batal</button>
	</form>
</div>