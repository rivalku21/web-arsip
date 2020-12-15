<?php
	// pemanggilan function upload file
	include "config/function.php";

	// klik tombol edit/hapus
	if (isset($_GET['hal'])) {
		// menampilkan data yg diedit
		if ($_GET['hal'] == "edit") {
			$tampil = mysqli_query($koneksi, "SELECT * FROM tbl_data_pembangunan where id_barang='$_GET[id]'");
			$data = mysqli_fetch_array($tampil);
			if($data) {
				$vnama_barang = $data['nama_barang'];
				$vtgl_diterima = $data['tgl_diterima'];
				$vharga_satuan = $data['harga_satuan'];
				$vjumlah_barang = $data['jumlah_barang'];
				$vharga_total = $data['harga_total'];
				$vketerangan = $data['keterangan'];
				$vfile = $data['file'];
			}
		}
		// akhir menampilkan data yg diedit

		// hapus data
		elseif ($_GET['hal'] == "hapus") {
		 	$hapus = mysqli_query($koneksi, "DELETE FROM tbl_data_pembangunan WHERE id_barang='$_GET[id]'");
			if ($hapus) {
				echo "<script>
					alert('Hapus Data Sukses');
						document.location='?halaman=pembangunan';
					  </script>";
			}
			else {
				echo "<script>
						alert('Hapus Data Gagal');
						document.location='?halaman=pembangunan';
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
			$ubah = mysqli_query($koneksi, "UPDATE tbl_data_pembangunan SET 
											nama_barang ='$_POST[nama_barang]',
											tgl_diterima ='$_POST[tgl_diterima]',
											harga_satuan ='$_POST[harga_satuan]',
											jumlah_barang ='$_POST[jumlah_barang]',
											harga_total ='$_POST[harga_total]',
											keterangan ='$_POST[keterangan]',
											file = '$file'
											where id_barang ='$_GET[id]' ");
			if ($ubah)
			{
				echo "<script>
					alert('Ubah Data Sukses');
					document.location='?halaman=pembangunan';
					</script>";
			}
			else {
				echo "<script>
					alert('Ubah Data Gagal');
					document.location='?halaman=pembangunan';
					</script>";
			}

			//akhir edit data

		}

		else {

			//simpan data
			$file = upload();
			$simpan = mysqli_query($koneksi, "INSERT INTO tbl_data_pembangunan VALUES ('',
																				   '$_POST[nama_barang]',
																				   '$_POST[tgl_diterima]',
																				   '$_POST[harga_satuan]',
																				   '$_POST[jumlah_barang]',
																				   '$_POST[harga_total]',
																				   '$_POST[keterangan]',
																				   '$file'
																					)" );
			if ($simpan) 
			{
				echo "<script>
					alert('Simpan Data Sukses');
					document.location='?halaman=pembangunan';
					</script>";
			}
			else {
				echo "<script>
					alert('Simpan Data Gagal');
					document.location='?halaman=pembangunan';
					</script>";
			}
			//akhir simpan data
		}

	}

?>



<div class="card mt-3">
  <div class="card-header bg-info text-white">
    Form Data Pembangunan
  </div>
  <div class="card-body">
  	<form method="POST" action="" enctype="multipart/form-data">
	  <div class="form-group">
	    <label for="nama_barang">Nama Barang</label>
	    <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Masukan Nama Barang" value="<?=@$vnama_barang?>">
	  </div>
	  <div class="form-group"> 
	    <label for="tgl_diterima">Tanggal Terima</label>
	    <input type="date" class="form-control" id="tgl_diterima" name="tgl_diterima" value="<?=@$vtgl_diterima?>">
	  </div>
	  <div class="form-group">
	    <label for="harga_satuan">Harga @</label>
	    <input type="number" class="form-control" id="harga_satuan" name="harga_satuan" placeholder="Masukan Harga @" value="<?=@$vharga_satuan?>">
	  </div>
	  <div class="form-group">
	    <label for="jumlah_barang">Jumlah</label>
	    <input type="number" class="form-control" id="jumlah_barang" name="jumlah_barang" placeholder="Masukan Jumlah Barang" value="<?=@$vjumlah_barang?>">
	  </div>
	  <div class="form-group">
	    <label for="harga_total">Harga Total</label>
	    <input type="text" class="form-control" id="harga_total" name="harga_total" placeholder="Masukan Harga Total" value="<?=@$vharga_total?>">
	  </div>
	  <div class="form-group">
	    <label for="keterangan">Keterangan</label>
	    <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" value="<?=@$vketerangan?>">
	  </div>
	  <div class="form-group">
	    <label for="file">Pilih File (Penambahan Data Hanya Dalam Format .jpg .jpeg .png dan .docx)</label>
	    <input type="file" class="form-control" id="file" name="file" placeholder="Masukkan File" value="<?=@$vfile?>">
	  </div>

	  <button type="submit" name="bsimpan" class="btn btn-primary">Simpan</button>
	  <button type="reset" name="bbatal" class="btn btn-danger">Batal</button>
	</form>
</div>