<?php
	//tombol simpan
	if (isset($_POST['bsimpan'])) 
	{

		// data di edit/disimpan
		if (@$_GET['hal'] == "edit") {

			// edit data
			$ubah = mysqli_query($koneksi, "UPDATE tbl_data_bantuan SET 
											nama_penerima ='$_POST[nama_penerima]',
											tgl_terima ='$_POST[tgl_terima]',
											no_tlp_penerima ='$_POST[no_tlp_penerima]',
											email_penerima ='$_POST[email_penerima]',
											bentuk_bantuan ='$_POST[bentuk_bantuan]',
											besar_bantuan ='$_POST[besar_bantuan]'
											where id_bantuan ='$_GET[id]' ");
			if ($ubah)
			{
				echo "<script>
					alert('Ubah Data Sukses');
					document.location='?halaman=bantuan';
					</script>";
			}
			else {
				echo "<script>
					alert('Ubah Data Gagal');
					document.location='?halaman=bantuan';
					</script>";
			}

			//akhir edit data

		}

		else {

			//simpan data
			$simpan = mysqli_query($koneksi, "INSERT INTO tbl_data_bantuan VALUES ('',
																				   '$_POST[nama_penerima]',
																				   '$_POST[tgl_terima]',
																				   '$_POST[no_tlp_penerima]',
																				   '$_POST[email_penerima]',
																				   '$_POST[bentuk_bantuan]',
																				   '$_POST[besar_bantuan]'
																					)" );
			if ($simpan) 
			{
				echo "<script>
					alert('Simpan Data Sukses');
					document.location='?halaman=bantuan';
					</script>";
			}
			else {
				echo "<script>
					alert('Simpan Data Gagal');
					document.location='?halaman=bantuan';
					</script>";
			}
			//akhir simpan data
		}

	}
	// klik tombol edit/hapus
	if (isset($_GET['hal'])) {
		// menampilkan data yg diedit
		if ($_GET['hal'] == "edit") {
			$tampil = mysqli_query($koneksi, "SELECT * FROM tbl_data_bantuan where id_bantuan='$_GET[id]'");
			$data = mysqli_fetch_array($tampil);
			if($data) {
				$vnama_penerima = $data['nama_penerima'];
				$vtgl_terima = $data['tgl_terima'];
				$vno_tlp_penerima = $data['no_tlp_penerima'];
				$vemail_penerima = $data['email_penerima'];
				$vbentuk_bantuan = $data['bentuk_bantuan'];
				$vbesar_bantuan = $data['besar_bantuan'];
			}
		}
		// akhir menampilkan data yg diedit

		// hapus data
		elseif ($_GET['hal'] == "hapus") {
		 	$hapus = mysqli_query($koneksi, "DELETE FROM tbl_data_bantuan WHERE id_bantuan='$_GET[id]'");
			if ($hapus) {
				echo "<script>
					alert('Hapus Data Sukses');
						document.location='?halaman=bantuan';
					  </script>";
			}
			else {
				echo "<script>
						alert('Hapus Data Gagal');
						document.location='?halaman=bantuan';
					  </script>";	
			}
		 } 
		// akhir hapus data
	}

?>



<div class="card mt-3">
  <div class="card-header bg-info text-white">
    Form Data Bantuan
  </div>
  <div class="card-body">
  	<form method="POST" action="">
	  <div class="form-group">
	    <label for="nama_penerima">Nama</label>
	    <input type="text" class="form-control" id="nama_penerima" name="nama_penerima" placeholder="Masukan Nama" value="<?=@$vnama_penerima?>">
	  </div>
	  <div class="form-group"> 
	    <label for="tgl_terima">Tanggal Terima</label>
	    <input type="date" class="form-control" id="tgl_terima" name="tgl_terima" value="<?=@$vtgl_terima?>">
	  </div>
	  <div class="form-group">
	    <label for="no_tlp_penerima">Nomer Telephone</label>
	    <input type="number" class="form-control" id="no_tlp_penerima" name="no_tlp_penerima" placeholder="Masukan Nomer Telephone" value="<?=@$vno_tlp_penerima?>">
	  </div>
	  <div class="form-group">
	    <label for="email_penerima">Email</label>
	    <input type="email" class="form-control" id="email_penerima" name="email_penerima" placeholder="Masukan Email" value="<?=@$vemail_penerima?>">
	  </div>
	  <div class="form-group">
	    <label for="bentuk_bantuan">Nama Barang</label>
	    <input type="text" class="form-control" id="bentuk_bantuan" name="bentuk_bantuan" placeholder="Masukan Nama Barang" value="<?=@$vbentuk_bantuan?>">
	  </div>
	  <div class="form-group">
	    <label for="besar_bantuan">Konfersi Dalam Bentuk Rupiah</label>
	    <input type="number" class="form-control" id="besar_bantuan" name="besar_bantuan" placeholder="Masukkan Angka" value="<?=@$vbesar_bantuan?>">
	  </div>

	  <button type="submit" name="bsimpan" class="btn btn-primary">Simpan</button>
	  <button type="reset" name="bbatal" class="btn btn-danger">Batal</button>
	</form>
</div>