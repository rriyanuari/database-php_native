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
										<input type="date" id="masa_berlaku<?= $row['id'] ?>" class="form-control" name="masa_berlaku" value="<?= $row_id['masa_berlaku'] ?>">
									</div>
									<div class="clearfix"></div>
									<button id="<?= $row['id'] ?>" class="tmbl_ubah btn btn-primary">Ubah</button>
									</div>