<?php
	require_once"core/init.php";

	$data 			= "";
	$pt 				= "";
	$perusahaan	= "";

	if(isset($_GET['pt'])){
		if($_GET['pt'] == 'gcal'){
			$pt = "GCAL";
			$perusahaan = "PT. GRAHA CITRA ANUGERAH LESTARI";
		}else if($_GET['pt'] == 'ffi'){
			$pt = "FFI";
			$perusahaan = "PT. FYFE FYBREWRAP INDONESIA";
		}else if($_GET['pt'] == 'wkk'){
			$pt = "WKK";
			$perusahaan = "PT. WAHANA KRIDA KONSULINDO";
		}else if($_GET['pt'] == 'paca'){
			$pt = "PACA";
			$perusahaan = "PT. PRASETYA ADI CITRA ANUGERAH";
		}else if($_GET['pt'] == 'sr'){
			$pt = "SR";
			$perusahaan = "PT. SOBO REJO";
		}
?>
	<h4 class="center-align"><u><?= $perusahaan ?></u></h4>
	<p>Pilih Kategori :</p>
		<div class="select-kategori row">
			<div class= "col s3">
				<label>
					<input class="with-gap" name="group1" type="radio" checked />
					<span>Akta</span>
				</label>
			</div>
			<div class= "col s3">
				<label>	
					<input class="with-gap" name="group1" type="radio" />
					<span>SIUP</span>
				</label>
			</div>
			<div class= "col s3">
				<label>
					<input class="with-gap" name="group1" type="radio" />
					<span>TDP</span>
				</label>
			</div>
			<div class= "col s3">
				<label>
					<input class="with-gap" name="group1" type="radio" />
					<span>NPWP</span>
				</label> 
			</div> 
			<div class= "col s3">
				<label>
					<input class="with-gap" name="group1" type="radio" />
					<span>IUJK</span>
				</label>
			</div>
			<div class= "col s3">
				<label>
					<input class="with-gap" name="group1" type="radio" />
					<span>NIB</span>
				</label>
			</div>
			<div class= "col s3">
				<label>
					<input class="with-gap" name="group1" type="radio" />
					<span>Domisili</span>
				</label>
			</div>
			<div class= "col s3">
				<label>
					<input class="with-gap" name="group1" type="radio" />
					<span>SPPKP</span>
				</label>
			</div>
			<div class= "col s3">
				<label>
					<input class="with-gap" name="group1" type="radio" />
					<span>SBU</span>
				</label>
			</div>
			<div class= "col s3">
				<label>
					<input class="with-gap" name="group1" type="radio" />
					<span>KTA</span>
				</label>
			</div>
			<div class= "col s3">
				<label>
					<input class="with-gap" name="group1" type="radio" />
					<span>SKT</span>
				</label>
			</div>
			<div class= "col s3">
				<label>
					<input class="with-gap" name="group1" type="radio" />
					<span>ISO</span>
				</label>
			</div>
		</div>
	<table class="table table-hover table-sm">
		<thead>
			<tr>
				<th class="center-align" scope="col" width="5%">No</th>
				<!-- <th class="center-align" scope="col" width="15%">Perusahaan</th> -->
				<th class="center-align" scope="col" width="10%">Kategori</th>
				<th class="center-align" scope="col" width="45%">Nama Surat</th>
				<th class="center-align" scope="col" width="20%">Masa Berlaku</th>
				<th class="center-align" scope="col" width="20%">Control</th>
			</tr>
		</thead>
		<tbody>
				<?php
					$no 	= 0; 
					$data	= tampilkan_per_pt($pt);
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
							<i class="material-icons" data-toggle="modal" data-target="#modal-detail<?= $row['id'] ?>">search</i>
							<i class="material-icons" data-toggle="modal" data-target="#modal-ubah<?= $row['id'] ?>">edit</i>
							<i class="material-icons" data-toggle="modal" data-target="#<?= $row['id'] ?>">delete</i>

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
							<!-- -------------------------------------------------------- -->
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
										<input type="date" id="masa_berlaku<?= $row['id'] ?>" class="form-control" name="masa_berlaku">
									</div>
									<div class="clearfix"></div>
									<button id="<?= $row['id'] ?>" class="tmbl_ubah btn btn-primary">Ubah</button>
									</div>
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
									<select id="perusahaan-tambah" name="perusahaan" class="custom-select float-left bagi-2">
										<option value="-" selected>Perusahaan</option>
										<option value="GCAL">GCAL</option>
										<option value="PACA">PACA</option>
										<option value="SR">SR</option>
									</select>	
									<select id="kategori-tambah" name="kategori" class="custom-select float-right bagi-2">
										<option value="-" selected>Kategori</option>
										<option value="SIUP">SIUP</option>
										<option value="Akta">Akta</option>
									</select>
									<div class="clearfix"></div>
									<div class="form-group margin-top-20">
										<label for="nama_file-tambah">Nama File</label>
										<input type="text" class="form-control form-control-sm" id="nama_file-tambah" name="nama_file" placeholder="Isi dengan nama file">
									</div>
									<div class="form-group margin-top-20">
										<label for="data_file-tambah">Upload File</label>
										<input type="file" class="form-control-file" id="data_file-tambah" name="data_file">
									</div>
									<div class="form-group margin-top-20">
										<label for="masa_berlaku-tambah">Masa Berlaku</label>
										<input id="masa_berlaku-tambah" name="masa_berlaku" class="text" value="">
									</div>
									<div class="clearfix"></div>
									<button id="tmbl_tmbh" class="tmbl_ubah btn btn-primary">Tambah</button>
									</div>
									</div>
								</div>
							<!-- -------------------------------------------------------- -->
					</tr>
		</tbody>
	</table>
			
	<?php
		}else{ }
	?>

		