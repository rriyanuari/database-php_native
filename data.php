<?php
	
	require_once"core/init.php";
	// if (isset($_POST['submit'])) {
	// 	$perusahaan 		= $_get['perusahaan'];
	// 	$kategori 			= $_get['kategori'];
	// 	$nama_file 			= $_get['nama_file'];
	// 	$masa_berlaku 		= $_get['masa_berlaku'];

	// 	if ( tambah_data($perusahaan, $kategori, $nama_file, $masa_berlaku) ){
	// 		header ('location: index.php');
	// 	}else{
	// 		echo "gagal cuy";
	// 	}
	// }
 ?>	
<div id="tambah_data">	
		<select id="perusahaan" name="perusahaan" class="custom-select float-left bagi-2">
		  <option value="-">Perusahaan</option>
		  <option value="GCAL">GCAL</option>
		  <option value="PACA">PACA</option>
		  <option value="SR">SR</option>
		</select>	
		<select id="kategori" name="kategori" class="custom-select float-right bagi-2">
		  <option value="-">Kategori</option>
		  <option value="SIUP">SIUP</option>
		  <option value="Akta">Akta</option>
		</select>
		<div class="clearfix"></div>
		
		<div class="form-group margin-top-20">
		  <label for="nama_file">Nama File</label>
		  <input type="text" class="form-control form-control-sm" id="nama_file" name="nama_file" placeholder="Isi dengan nama file">
		</div>
		<div class="form-group float-left bagi-2">
		  <label for="data_file">Upload File</label>
		  <input type="file" class="form-control-file" id="data_file" name="data_file">
		</div>
	  	<div class="form-group float-right bagi-2">
		  <label for="masa_berlaku">Masa Berlaku</label>
		  <input type="date" id="masa_berlaku" class="form-control" name="masa_berlaku" >
		</div>
		<div class="clearfix"></div>
	  <button id="tmbl_tmbh" class="btn btn-primary">Submit</button>
</div>