

<div class="card mt-3">
  <div class="card-header bg-info text-white">
    Data Bantuan
  </div>
  <div class="card-body">
  	<a href="?halaman=bantuan&hal=tambahdata" class="btn btn-info mb-3">Tambah Data</a>
  	<table class="table table-bordered table-hovered table-striped">
  		<tr>
  			<th>No</th>
  			<th>Nama</th>
  			<th>Tanggal Terima</th>
  			<th>Nomer Telephone</th>
  			<th>Email</th>
  			<th>Bentuk Bantuan</th>
  			<th>Konfersi Dalam Rupiah</th>
  			<th>Aksi</th>
  		</tr>
  		<?php 
  			$tampil = mysqli_query($koneksi, "SELECT * from tbl_data_bantuan order by id_bantuan desc");
  			$no = 1;
  			while ($data = mysqli_fetch_array($tampil)) :

  		?>
  		<tr>
  			<td><?=$no++?></td>
  			<td><?=$data['nama_penerima']?></td>
  			<td><?=$data['tgl_terima']?></td>
  			<td><?=$data['no_tlp_penerima']?></td>
  			<td><?=$data['email_penerima']?></td>
  			<td><?=$data['bentuk_bantuan']?></td>
  			<td>Rp. <?=$data['besar_bantuan']?></td>
  			<td>
  				<a href="?halaman=bantuan&hal=edit&id=<?=$data['id_bantuan']?>" class="btn btn-success" >Edit</a>
  				<a href="?halaman=bantuan&hal=hapus&id=<?=$data['id_bantuan']?>" class="btn btn-danger" onclick="return confirm('Apakah Yakin Ingin Menghapus Data Ini?')">Hapus</a>
  			</td>
  		</tr>
  	<?php endwhile;?>
  	</table>
</div>