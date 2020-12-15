<?php
	//tombol simpan
	if (isset($_POST['bsimpan'])) 
	{

		// data di edit/disimpan
		if (@$_GET['hal'] == "edit") {

			// edit data
			$ubah = mysqli_query($koneksi, "UPDATE tbl_data_kependudukan SET 
											nama_penduduk ='$_POST[nama_penduduk]',
											tanggal_lahir ='$_POST[tanggal_lahir]',
											no_ktp ='$_POST[no_ktp]',
											kota ='$_POST[kota]',
											kecamatan ='$_POST[kecamatan]',
											kelurahan ='$_POST[kelurahan]',
											no_tlp ='$_POST[no_tlp]'
											where id_penduduk ='$_GET[id]' ");
			if ($ubah)
			{
				echo "<script>
					alert('Ubah Data Sukses');
					document.location='?halaman=penduduk';
					</script>";
			}
			else {
				echo "<script>
					alert('Ubah Data Gagal');
					document.location='?halaman=penduduk';
					</script>";
			}

			//akhir edit data

		}

		else {

			//simpan data
			$simpan = mysqli_query($koneksi, "INSERT INTO tbl_data_kependudukan VALUES ('',
																						'$_POST[nama_penduduk]',
																						'$_POST[tanggal_lahir]',
																						'$_POST[no_ktp]',
																						'$_POST[kota]',
																						'$_POST[kecamatan]',
																						'$_POST[kelurahan]',
																						'$_POST[no_tlp]'
																					)" );
			if ($simpan) 
			{
				echo "<script>
					alert('Simpan Data Sukses');
					document.location='?halaman=penduduk';
					</script>";
			}
			else {
				echo "<script>
					alert('Simpan Data Gagal');
					document.location='?halaman=penduduk';
					</script>";
			}
			//akhir simpan data
		}

	}
	// klik tombol edit/hapus
	if (isset($_GET['hal'])) {
		// menampilkan data yg diedit
		if ($_GET['hal'] == "edit") {
			$tampil = mysqli_query($koneksi, "SELECT * FROM tbl_data_kependudukan where id_penduduk='$_GET[id]'");
			$data = mysqli_fetch_array($tampil);
			if($data) {
				$vnama_penduduk = $data['nama_penduduk'];
				$vtanggal_lahir = $data['tanggal_lahir'];
				$vno_ktp = $data['no_ktp'];
				$vkota = $data['kota'];
				$vkecamatan = $data['kecamatan'];
				$vkelurahan = $data['kelurahan'];
				$vno_tlp = $data['no_tlp'];
			}
		}
		// akhir menampilkan data yg diedit

		// hapus data
		else {
			$hapus = mysqli_query($koneksi, "DELETE FROM tbl_data_kependudukan WHERE id_penduduk='$_GET[id]'");
			if ($hapus) {
				echo "<script>
						alert('Hapus Data Sukses');
						document.location='?halaman=penduduk';
					  </script>";
			}
			else {
				echo "<script>
						alert('Hapus Data Gagal');
						document.location='?halaman=penduduk';
					  </script>";	
			}
		}
		// akhir hapus data
	}

?>



<div class="card mt-3">
  <div class="card-header bg-info text-white">
    Form Data Kependudukan
  </div>
  <div class="card-body">
  	<form method="POST" action="">
	  <div class="form-group">
	    <label for="nama_penduduk">Nama</label>
	    <input type="text" class="form-control" id="nama_penduduk" name="nama_penduduk" placeholder="Masukan Nama" value="<?=@$vnama_penduduk?>">
	  </div>
	  <div class="form-group"> 
	    <label for="tanggal_lahir">Tanggal Lahir</label>
	    <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?=@$vtanggal_lahir?>">
	  </div>
	  <div class="form-group">
	    <label for="no_ktp">Nomer KTP</label>
	    <input type="number" class="form-control" id="no_ktp" name="no_ktp" placeholder="Masukan Nomer KTP" value="<?=@$vno_ktp?>">
	  </div>
	  <div class="form-group">
		 <div class="form-row">
		   <div class="col-4">
		   	<label for="kota">Kota/Kabupaten</label>
		     <input type="text" class="form-control" placeholder="Kota" id="kota" name="kota" value="<?=@$vkota?>">
		   </div>
		   <div class="col-4">
		   	<label for="kecamatan">Kecamatan</label>
		     <input type="text" class="form-control" placeholder="Kecamatan" id="kecamatan" name="kecamatan" value="<?=@$vkecamatan?>">
	       </div>
	       <div class="col-4">
	       	<label for="kelurahan">Kelurahan</label>
	    	<input type="text" class="form-control" placeholder="Kelurahan" id="kelurahan" name="kelurahan" value="<?=@$vkelurahan?>">
		   </div>
		  </div>
	  </div>
	  <div class="form-group">
	    <label for="no_tlp">Nomer Telephone</label>
	    <input type="number" class="form-control" id="no_tlp" name="no_tlp" placeholder="Masukan Nomer Telephone" value="<?=@$vno_tlp?>">
	  </div>
	  <button type="submit" name="bsimpan" class="btn btn-primary">Simpan</button>
	  <button type="reset" name="bbatal" class="btn btn-danger">Batal</button>
	</form>
</div>

<div class="card mt-3">
  <div class="card-header bg-info text-white">
    Data Kependudukan
  </div>
  <div class="card-body">
  	<table class="table table-bordered table-hovered table-striped">
  		<tr>
  			<th>No</th>
  			<th>Nama</th>
  			<th>Tanggal Lahir</th>
  			<th>Nomer KTP</th>
  			<th>Kota</th>
  			<th>Kecamatan</th>
  			<th>Kelurahan</th>
  			<th>Nomer Telephne</th>
  			<th>Aksi</th>
  		</tr>
  		<?php 
  			$tampil = mysqli_query($koneksi, "SELECT * from tbl_data_kependudukan order by id_penduduk desc");
  			$no = 1;
  			while ($data = mysqli_fetch_array($tampil)) :

  		?>
  		<tr>
  			<td><?=$no++?></td>
  			<td><?=$data['nama_penduduk']?></td>
  			<td><?=$data['tanggal_lahir']?></td>
  			<td><?=$data['no_ktp']?></td>
  			<td><?=$data['kota']?></td>
  			<td><?=$data['kecamatan']?></td>
  			<td><?=$data['kelurahan']?></td>
  			<td><?=$data['no_tlp']?></td>
  			<td>
  				<a href="?halaman=penduduk&hal=edit&id=<?=$data['id_penduduk']?>" class="btn btn-success">Edit</a>
  				<a href="?halaman=penduduk&hal=hapus&id=<?=$data['id_penduduk']?>" class="btn btn-danger" onclick="return confirm('Apakah yakin ingin menghapus data ini?')">Hapus</a>
  			</td>
  		</tr>
  	<?php endwhile;?>
  	</table>
</div>