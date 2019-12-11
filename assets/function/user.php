<?php

// -------------------FUNGSI2 BERMANFAAT-------------------------

	// FUNGSI RUN QUERY
		
		function run($query){
			global $link;
		
			if ( mysqli_query($link, $query) ) return true;
			else return false;
		}
		
	// FUNGSI RUN QUERY -> RETURN
		
		function result($query){
			global $link;
		
			if ( $result = mysqli_query($link, $query) or die("gagal menampilkan data") ){
				return $result;	
			} 
		}
		
	// FUNGSI BASIC SECURITY (SQL-INJECT)
		
		function escape($data){
			global $link;
			return mysqli_real_escape_string($link, $data);
		} 

// ---------------------------------------------------------------

// -----------------------MENAMPILKAN DATA-------------------------------

	// DATABASE --> MENU DATA
		
		function tampilkan(){
			$query 	= "SELECT * FROM data";
			return result($query);
		}

	// DATABASE --> Per ID
		
		function tampilkan_per_id($id){
			$query 	= "SELECT * FROM data WHERE id='$id'";
			return result($query);
		}
		
	// DATABASE --> Per ID
		
		function tampilkan_per_pt($pt){
			$query 	= "SELECT * FROM data WHERE pt='$pt'";
			return result($query);
		}

// --------------------------------------------------------------

// -----------------------MEMASUKAN DATA-------------------------------

	// ADD MENU DATA --> DATABASE --> DATA
		
		function tambah_data($perusahaan, $kategori, $nama_file, $masa_berlaku){
			$perusahaan 	= escape($perusahaan);
			$kategori 		= escape($kategori);
			$nama_file		= escape($nama_file);
			$masa_berlaku	= escape($masa_berlaku);
			
			$query 	= "INSERT INTO data (pt, kategori, nama_file, masa_berlaku) VALUES ('$perusahaan', '$kategori', '$nama_file', '$masa_berlaku')";
			return run($query);
		}

// -------------------------------------------------------------------

//-------------------HAPUS DATA------------------------------- 
		
	// DELETE DATABASE SORT BY "ID" --> MENU DATA

		function hapus_data($id){
			$query 	= "DELETE FROM data WHERE id='$id' ";
			return run($query);
		}

// -------------------------------------------------------------

// -------------------EDIT DATA---------------------------------------
	
	// EDIT DATABASE --> MENU DATA --> EDIT
		
		function update_data($perusahaan, $kategori, $nama_file, $masa_berlaku, $id){
			$perusahaan 	= escape($perusahaan);
			$kategori 		= escape($kategori);
			$nama_file		= escape($nama_file);
			$masa_berlaku	= escape($masa_berlaku);
			$id				= escape($id);
			
			$query 	= "UPDATE data SET pt='$perusahaan', kategori='$kategori', nama_file='$nama_file', masa_berlaku='$masa_berlaku' WHERE id='$id' ";
			return run($query);
		}
	
// ----------------------------------------------------------------

// --------------------FUNGSI CEK DATA-----------------------------
	
	// CEK DATA DOUBLE --> MENU DATA --> TAMBAH 

		function cek_double_data($nama_file){
			$nama_file	= escape($nama_file);

			$query = "SELECT * FROM data WHERE nama_file='$nama_file'";
			global $link;

			if ( $result = mysqli_query($link, $query) ){
				if ( mysqli_num_rows($result) == 0 ) return true;
				else return false;
			}
		} 

	// CEK USERNAME & PASS --> LOGIN 
		
	function cek_login($user, $pass){
		$user			= escape($user);
		$pass 		= escape($pass);
		
		$query = "SELECT * FROM users WHERE username='$user' AND password='$pass'";
		global $link;
	
		if ( $result = mysqli_query($link, $query) ){
			if ( mysqli_num_rows($result) != 0 ) return true;
			else return false;
		}
	}
// ------------------------------------------------------------------