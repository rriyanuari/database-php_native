<?php
	require_once"core/init.php";
?>

	<!---------- FORM PT & KATEGORI -->
		<form id="filterDashboard" class="form row" method="GET">

			<div class="input-field col s5">
				<input type="text" id="searchPt" class="autocomplete">
				<label for="autocomplete-input">Perusahaan</label>
			</div> 

			<div class="input-field col s5">
				<input type="text" id="searchKategori" class="autocomplete">
				<label for="searchKategori">Kategori</label>
			</div>

      <div class="input-field col s2">
				<button class="btn">Submit</button>
			</div>
		</form>

		

	<!---------- TABEL DATA -->
		<table class="table table-hover table-sm">

			<thead>
				<tr>
					<th class="center-align" scope="col" width="5%">No</th>
					<th class="center-align" scope="col" width="10%">PT</th>
					<th class="center-align" scope="col" width="10%">Kategori</th>
					<th class="center-align" scope="col" width="30%">Nama Surat</th>
					<th class="center-align" scope="col" width="15%">Tgl Dibuat</th>
					<th class="center-align" scope="col" width="15%">Masa Berlaku</th>
					<th class="center-align" scope="col" width="20%">Control</th>
				</tr>
			</thead>

			<tbody>
				<?php
						// ---------- MENGAMBIL DATA => DB => PT / PT && KATEGORI
							if($kategori == ""){
								$data	= tampilkan_per_pt($pt);
							} else{
								$data	= tampilkan_pt_kategori($pt, $kategori);
							}
							// die( print_r($data) );

						// ---------- MENAMPILKAN DATA DENGAN LOOPING
							$no 	= 0;
							while( $row = mysqli_fetch_assoc($data) ): 
								$no++  ;

								$tgl_dibuat			= strtotime($row['masa_berlaku']);
								$jatuh_tempo		=	strtotime($row['masa_berlaku'], strtotime('-2 month'));
								// var_dump(strtotime(date('d/m/y')), $jatuh_tempo); die; ?>

								<tr class="<?php if(strtotime(date('d/m/y')) >= $jatuh_tempo) echo "telat"; ?>">
									<th class="center-align" scope="row">	<?= $no 									?>		</th>
									<td class="center-align"						>	<?= $row['kategori'] 			?>		</td>
									<td	class=""												>	<?= $row['nama_file'] 		?>		</td>
									<td class="center-align"						>	<?= $row['tgl_dibuat']		?>		</td>
									<td class="center-align"						>	<?= $row['masa_berlaku']	?>		</td>
									<td class="center-align"						>
										<a target="_blank" href="23-preview.php?id=<?= $row['id'] ?>"><i class="material-icons icon-control">	search	</i></a>
										<i class="material-icons modal-trigger icon-control" href="#modal-ubah<?= $row['id'] ?>">	edit		</i>
										<i class="material-icons modal-trigger icon-control" href="#modal-hapus<?= $row['id'] ?>">	delete	</i>

										<!---------- MENGAMBIL DATA => DB => ID  -->
											<?php 
												$id      = $row['id'];
												$data_id = tampilkan_per_id($id);
												$row_id  = mysqli_fetch_assoc($data_id);
												// die( print_r($row_id) );
											?>

										<!---------- MODAL UBAH -->	
											<div id="modal-ubah<?= $row['id'] ?>" class="modal fade left-align" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
												<div class="modal-dialog modal-lg">
													<div class="modal-content text-left">

														<div class="row">
															<div class="form-group margin-top-20">
																<label for="nama_file<?= $row['id'] ?>">Nama File</label>
																<input type="text" class="form-control form-control-sm" id="nama_file<?= $row['id'] ?>" name="nama_file" placeholder="Isi dengan nama file" value="<?= $row_id['nama_file'] ?>">
															</div>
														</div>

														<div class="row">
															<div class="form-group col s6">
																<label for="tgl_dibuat<?= $row['id'] ?>">Tgl Dibuat</label>
																<input type="date" id="tgl_dibuat<?= $row['id'] ?>" class="form-control" name="tgl_dibuat" value="<?= $row_id['tgl_dibuat'] ?>">
															</div>
															<div class="form-group col s6">
																<label for="masa_berlaku<?= $row['id'] ?>">Masa Berlaku</label>
																<input type="date" id="masa_zberlaku<?= $row['id'] ?>" class="form-control" name="masa_berlaku" value="<?= $row_id['masa_berlaku'] ?>">
															</div>
														</div>

														<button id="<?= $row['id'] ?>" class="tmbl_ubah btn btn-primary">Ubah</button>

													</div>
												</div>
											</div>

										<!---------- MODAL HAPUS -->	
											<div id="modal-hapus<?= $row['id'] ?>" class="modal modal bottom-sheet">
												<div class="modal-content">
													<h4>Apakah anda yakin ingin menghapus data ?</h4>
													<p>Data yg sudah terhapus tidak dapat dikembalikan</p>
													<btn class="tmbl-hapus btn red waves-effect btn-flat" id="<?= $row['id'] ?>">Hapus</a>
												</div>
											</div>

									</td>
								</tr>
							<?php endwhile ?>
			</tbody>

		</table>

		<script>
		</script>
