<?php
	require_once"core/init.php";
?>

<form id="form-index" class="row" method="GET">

	<?php
		$pt 			= "";
		$kategori = "";
		$perusahaan	= "";
		
		if(isset($_GET['pt'])){
			$pt 			=  $_GET['pt'];
		}
		if(isset($_GET['kategori'])){
			$kategori	=  $_GET['kategori'];
		}
	?>

	<div class="input-field col s5">
		<select name="pt" id="pt">
			<option value="" disabled selected>-</option>
			<?php
				$data_pt	= tampilkan_pt();
				while( $row = mysqli_fetch_assoc($data_pt) ): 
			?>
					<option value="<?=$row['pt']?>"<?php if($pt == $row['pt']) echo"selected"; ?>><?=$row['pt']?></option>
				<?php endwhile ?>
		</select>
		<label>Perusahaan :</label>
	</div>

	<div class="input-field col s5">
		<select name="kategori" id="kategori">
			<option value="" selected>-</option>
			<?php
				$data_kategori	= tampilkan_kategori();
				while( $row = mysqli_fetch_assoc($data_kategori) ): 
			?>
					<option value="<?=$row['kategori']?>"<?php if($kategori == $row['kategori']) echo"selected"; ?>><?=$row['kategori']?></option>
				<?php endwhile ?>
		</select>
		<label>Kategori :</label>
	</div>

	<div class="input-field col s2">
		<button class="btn">Submit</button>
	</div>

</form>

<?php
	$data 			= "";
	$kategori		= "";

	if(isset($_GET['pt'])){
			if(isset($_GET['kategori'])){
					$kategori	=  $_GET['kategori'];
			}
?>

	<h4 class="center-align"><u><?= $perusahaan ?></u></h4>
	<table class="table table-hover table-sm">

		<thead>
			<tr>
				<th class="center-align" scope="col" width="5%">No</th>
				<th class="center-align" scope="col" width="10%">Kategori</th>
				<th class="center-align" scope="col" width="45%">Nama Surat</th>
				<th class="center-align" scope="col" width="20%">Masa Berlaku</th>
				<th class="center-align" scope="col" width="20%">Control</th>
			</tr>
		</thead>

		<tbody>
			<?php
				$no 	= 0;
				if($kategori == ""){
					$data	= tampilkan_per_pt($pt);
				} else{
					$data	= tampilkan_pt_kategori($pt, $kategori);
				}
				// die( print_r($data) );
				while( $row = mysqli_fetch_assoc($data) ): 
				$no++  ;
			?>

			<tr>
				<th class="center-align" scope="row"><?= $no ?></th>
				<!-- <td class="center-align"><?= $row['pt'] ?></td> -->
				<td class="center-align"><?= $row['kategori'] ?></td>
				<td><?= $row['nama_file'] ?></td>
				<td class="center-align"><?= $row['masa_berlaku'] ?></td>
				<td class="center-align">
					<i class="material-icons modal-trigger icon-control" href="#modal-detail<?= $row['id'] ?>">search</i>
					<i class="material-icons modal-trigger icon-control" href="#modal-ubah<?= $row['id'] ?>">edit</i>
					<i class="material-icons modal-trigger icon-control" href="#modal-hapus<?= $row['id'] ?>">delete</i>

					<?php 
						$id      = $row['id'];
						$data_id = tampilkan_per_id($id);
						$row_id  = mysqli_fetch_assoc($data_id);
						// die( print_r($row_id) );
					?>

					<!-- -------------------------- Modal Detail ----------------------- -->	
						<div id="modal-detail<?= $row['id'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg">
							<div class="modal-content text-left">
								<h2 class="judul-modal"><?= $row['nama_file'] ?></h2>
								<div class="row">
									<span class="col">PT : <?= $row['pt'] ?></span>
									<span class="col">Kategori : <?= $row['kategori'] ?></span> 
								</div>
								<span>Tahun Pembuatan : <?= $row['pt'] ?></span>
								<span>Tgl Habis Masa Berlaku : <?= $row['masa_berlaku'] ?></span>
								<div class="button-modal">
									<button id="<?= $row['id'] ?>" class="tmbl_liat btn btn-success">View</button>
									<button id="<?= $row['id'] ?>" class="tmbl_hapus btn btn-danger float-right">Delete</button>
								</div>
							</div>
							</div>
						</div>
					<!-- -------------------------------------------------------- --

					<!-- -------------------------- Modal Ubah ------------------ -->	
						<div id="modal-ubah<?= $row['id'] ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
							<div class="modal-dialog modal-lg">
							<div class="modal-content text-left">
							<select id="perusahaan<?= $row['id'] ?>" name="perusahaan" class="custom-select float-left bagi-2">
								<option value="-" selected>Perusahaan</option>
								<option value="GCAL">GCAL</option>
								<option value="PACA">PACA</option>
								<option value="SR">SR</option>
							</select>	
							<select id="kategori<?= $row['id'] ?>" name="kategori" class="custom-select float-right bagi-2">
								<option value="-" selected>Kategori</option>
								<option value="SIUP">SIUP</option>
								<option value="Akta">Akta</option>
							</select>
							<div class="clearfix"></div>
							<div class="form-group margin-top-20">
								<label for="nama_file<?= $row['id'] ?>">Nama File</label>
								<input type="text" class="form-control form-control-sm" id="nama_file<?= $row['id'] ?>" name="nama_file" placeholder="Isi dengan nama file" value="<?= $row_id['nama_file'] ?>">
							</div>
							<div class="form-group float-left bagi-2">
								<label for="data_file<?= $row['id'] ?>">Upload File</label>
								<input type="file" class="form-control-file" id="data_file<?= $row['id'] ?>" name="data_file">
							</div>
						<div class="form-group float-right bagi-2">
								<label for="masa_berlaku<?= $row['id'] ?>">Masa Berlaku</label>
								<input type="date" id="masa_zberlaku<?= $row['id'] ?>" class="form-control" name="masa_berlaku" value="<?= $row_id['masa_berlaku'] ?>">
							</div>
							<div class="clearfix"></div>
							<button id="<?= $row['id'] ?>" class="tmbl_ubah btn btn-primary">Ubah</button>
							</div>
							</div>
						</div>
					<!-- -------------------------------------------------------- -->

					<!-- -------------------------- Modal Hapus ------------------ -->	
						<div id="modal-hapus<?= $row['id'] ?>" class="modal modal bottom-sheet">
							<div class="modal-content">
								<h4>Apakah anda yakin ingin menghapus data ?</h4>
								<p>Data yg sudah terhapus tidak dapat dikembalikan</p>
								<btn class="tmbl-hapus btn red waves-effect btn-flat" id="<?= $row['id'] ?>">Hapus</a>
							</div>
						</div>
					<!-- -------------------------------------------------------- -->

				</td>
			</tr>
				<?php endwhile ?>
					<tr>
						<td></td>
						<!-- <td></td> -->
						<td></td>
						<td></td>
						<td></td>
						<td class="center-align"><a data-target="modal-tambah" class="btn-floating waves-effect waves-light red modal-trigger"><i class="material-icons">add</i></a></td>
						<!-- -------------------------- Modal Tambah ------------------ -->	
						<div id="modal-tambah" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-lg">
									<div class="modal-content text-left">
									
									</div>
								</div>
							<!-- -------------------------------------------------------- -->
					</tr>
		</tbody>
	</table>			
	<?php
		}else{ }
	?>
