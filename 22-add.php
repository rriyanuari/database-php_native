<?php

	if(isset($_POST['submit'])){
		// var_dump($_FILES); die;
		$pt 					= $_POST['pt'];
		$kategori 		= $_POST['kategori'];
		$nama_file		= $_POST['nama_file'];
		$tgl_dibuat		= $_POST['tgl_dibuat'];
		$masa_berlaku	= $_POST['masa_berlaku'];
		
		if ($loc_file			= upload()){
			if( tambah_data($pt, $kategori, $nama_file, $masa_berlaku, $tgl_dibuat, $loc_file) ){
				echo "<script>
								alert('data berhasil ditambahkan')
							</script>";
			}else{
				echo "<script>
								alert('data gagal ditambahkan')
							</script>";
			}
		}else{
			echo "<script>
							alert('file gagal diupload')
						</script>";
		}
	}

?>

<div class="row center-align">
	<h4>Tambah Data</h4>
</div>

<form class="form" method="POST" action="index.php?status=add" enctype="multipart/form-data">

	<div class="row">
		<div class="input-field col s6">
			<select name="pt" id="pt">
				<option value="" disabled selected>-</option>
				<?php
					$data_pt	= tampilkan_pt();
					while( $row_pt = mysqli_fetch_assoc($data_pt) ): 
				?>
						<option value="<?=$row_pt['pt']?>"><?=$row_pt['pt']?></option>
					<?php endwhile ?>
			</select>
			<label>Perusahaan :</label>
		</div>

		<div class="input-field col s6">
			<select name="kategori" id="kategori">
				<option value="" selected>-</option>
				<?php
					$data_kategori	= tampilkan_kategori();
					while( $row_kategori = mysqli_fetch_assoc($data_kategori) ): 
				?>
						<option value="<?=$row_kategori['kategori']?>"><?=$row_kategori['kategori']?></option>
					<?php endwhile ?>
			</select>
			<label>Kategori :</label>
		</div>
	</div>

	<div class="row">
		<div class="form-group col s12">
			<label for="nama_file">Nama File</label>
			<input type="text" id="nama_file" class="form-control form-control-sm" name="nama_file" placeholder="Isi dengan nama file">
		</div>
	</div>

	<div class="row">
		<div class="form-group col s6">
			<label for="tgl_dibuat">Tgl Dibuat</label>
			<input type="date" id="tgl_dibuat" class="form-control" name="tgl_dibuat">
		</div>

		<div class="form-group col s6">
			<label for="masa_berlaku">Masa Berlaku</label>
			<input type="date" id="masa_berlaku" class="form-control" name="masa_berlaku">
		</div>
	</div>

	<div class="row">
		<div class="form-group col s6">
			<input type="file" id="loc_file" class="form-control-file" name="loc_file">
		</div>
		
		<button class="btn btn-primary col s6" id=tmbl_tmbh name="submit">Tambah Data</button>
	</div>

	<div class="row">
	</div>

</form>