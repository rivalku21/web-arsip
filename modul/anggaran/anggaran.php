<div class="card mt-3">
  <div class="card-header bg-info text-white">
    Anggaran Dana
  </div>
  <div class="card-body">
  	<a href="?halaman=anggaran&hal=tambahanggaran" class="btn btn-info mb-3">Tambah Data Baru</a>
  	<table class="table table-bordered table-hovered table-striped">
  		<tr>
  			<th>No</th>
  			<th>Nama File</th>
  			<th>Tanggal Upload</th>
  			<th>Keterangan</th>
  			<th>File</th>
  			<th>Aksi</th>
  		</tr>
  		<?php 
  			$tampil = mysqli_query($koneksi, "SELECT * from tbl_anggaran order by id_anggaran desc");
  			$no = 1;
  			while ($data = mysqli_fetch_array($tampil)) :

  		?>
  		<tr>
  			<td><?=$no++?></td>
  			<td><?=$data['nama_anggaran']?></td>
  			<td><?=$data['tanggal_upload']?></td>
  			<td><?=$data['keterangan_anggaran']?></td>
  			<td>
  				<?php 
  					// file ada atau tidak
  					if (empty($data['file'])) {
  						echo "-";
  					}
  					else {
  				?> <a href="file/<?=$data['file']?>" target="$_blank">lihat file</a>
  				<?php
  					}
  				?>
  			</td>
  			<td>
  				<a href="?halaman=anggaran&hal=edit&id=<?=$data['id_anggaran']?>" class="btn btn-success" >Edit</a>
  				<a href="?halaman=anggaran&hal=hapus&id=<?=$data['id_anggaran']?>" class="btn btn-danger" onclick="return confirm('Apakah Yakin Ingin Menghapus Data Ini?')">Hapus</a>
  			</td>
  		</tr>
  	<?php endwhile;?>
  	</table>
</div>