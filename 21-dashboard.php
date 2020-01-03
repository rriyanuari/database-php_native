<?php
	require_once"core/init.php";

	// ---------- SYARAT 1 : JIKA ADA STATUS DI URL  
		if( isset($_GET['status']) ){
			if($_GET['status'] == 'add'){
					require_once "22-add.php";
			}
	// ---------- SYARAT 1 : JIKA TDK ADA STATUS DI URL
		}else{ ?>

			<!---------- FORM PT & KATEGORI -->
				<form class="form row" method="GET">

					<?php
						$pt 			= "";
						$kategori = "";
						$perusahaan	= "";
						
						if(isset($_GET['pt'])){
							$pt 					=  $_GET['pt'];
							$data_nama_pt	=tampilkan_nama_per_pt($pt);
							$row_nama_pt 	= mysqli_fetch_assoc($data_nama_pt);
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
								while( $row_pt = mysqli_fetch_assoc($data_pt) ): 
							?>
									<option value="<?=$row_pt['pt']?>"<?php if($pt == $row_pt['pt']) echo"selected"; ?>><?=$row_pt['pt']?></option>
								<?php endwhile ?>
						</select>
						<label>Perusahaan :</label>
					</div>

					<div class="input-field col s5">
						<select name="kategori" id="kategori">
							<option value="" selected>-</option>
							<?php
								$data_kategori	= tampilkan_kategori();
								while( $row_kategori = mysqli_fetch_assoc($data_kategori) ): 
							?>
									<option value="<?=$row_kategori['kategori']?>"<?php if($kategori == $row_kategori['kategori']) echo"selected"; ?>><?=$row_kategori['kategori']?></option>
								<?php endwhile ?>
						</select>
						<label>Kategori :</label>
					</div>

					<div class="input-field col s2">
						<button class="btn">Submit</button>
					</div>

				</form>

			<?php

				// ---------- SYARAT 2 : JIKA ADA PT DI URL
					if(isset($_GET['pt'])){

						// ---------- SYARAT 3 : JIKA ADA KATEGORI DI URL
							if(isset($_GET['kategori'])){
									$kategori	=  $_GET['kategori'];
							}
						?>

						<h4 class="center-align"><u><?=$row_nama_pt['nama']?></u></h4>
						
						<!---------- TABEL DATA -->
							<table class="table table-hover table-sm">

								<thead>
									<tr>
										<th class="center-align" scope="col" width="5%">No</th>
										<th class="center-align" scope="col" width="10%">Kategori</th>
										<th class="center-align" scope="col" width="35%">Nama Surat</th>
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
													$no++  ; ?>

													<tr>
														<th class="center-align" scope="row">	<?= $no 									?>		</th>
														<td class="center-align"						>	<?= $row['kategori'] 			?>		</td>
														<td	class=""												>	<?= $row['nama_file'] 		?>		</td>
														<td class="center-align"						>	<?= $row['tgl_dibuat']	?>		</td>
														<td class="center-align"						>	<?= $row['masa_berlaku']	?>		</td>
														<td class="center-align"						>
															<a target="blank" href="23-preview.php?id=<?= $row['id'] ?>"><i class="material-icons icon-control">	search	</i></a>
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

					<?php	} ?>
		<?php } ?>