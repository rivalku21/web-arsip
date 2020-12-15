<div class="card mt-3">
  <div class="card-header bg-info text-white">
    Data Pembangunan
  </div>
  <div class="card-body">
  	<a href="?halaman=pembangunan&hal=tambahbaru" class="btn btn-info mb-3">Tambah Data Baru</a>
  	<table class="table table-bordered table-hovered table-striped">
  		<tr>
  			<th>No</th>
  			<th>Nama Barang</th>
  			<th>Tanggal Terima</th>
  			<th>Harga @</th>
  			<th>Jumlah</th>
  			<th>Harga Total</th>
  			<th>Keterangan</th>
  			<th>File</th>
  			<th>Aksi</th>
  		</tr>
  		<?php 
  			$tampil = mysqli_query($koneksi, "SELECT * from tbl_data_pembangunan order by id_barang desc");
  			$no = 1;
  			while ($data = mysqli_fetch_array($tampil)) :

  		?>
  		<tr>
  			<td><?=$no++?></td>
  			<td><?=$data['nama_barang']?></td>
  			<td><?=$data['tgl_diterima']?></td>
  			<td>Rp. <?=$data['harga_satuan']?></td>
  			<td><?=$data['jumlah_barang']?></td>
  			<td>Rp. <?=$data['harga_total']?></td>
  			<td><?=$data['keterangan']?></td>
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
  				<a href="?halaman=pembangunan&hal=edit&id=<?=$data['id_barang']?>" class="btn btn-success" >Edit</a>
  				<a href="?halaman=pembangunan&hal=hapus&id=<?=$data['id_barang']?>" class="btn btn-danger" onclick="return confirm('Apakah Yakin Ingin Menghapus Data Ini?')">Hapus</a>
  			</td>
  		</tr>
  	<?php endwhile;?>
  	</table>
</div>