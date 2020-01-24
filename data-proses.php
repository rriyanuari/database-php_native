<?php
    
  require_once "core/init.php";

  if ($_GET['hal'] == 'login') {
    $user 		= $_POST['user'];
		$pass 		= $_POST['pass'];
      if ( cek_login($user, $pass) ){
        $_SESSION['user'] = $user;
        echo 1;
      } else{
        echo 2;
      } 

    }else if ($_GET['hal'] == 'getFilter') { 
    }else if ($_GET['hal'] == 'tambah') {
      $perusahaan 		= $_POST['perusahaan'];
      $kategori 			= $_POST['kategori'];
      $nama_file 			= $_POST['nama_file'];
      $masa_berlaku 	= $_POST['masa_berlaku'];
        if ( tambah_data($perusahaan, $kategori, $nama_file, $masa_berlaku) ){
          // $barang = ucwords($barang);   <------------ uppercase
          // tambah_data($barang, $qty, $harga);
            echo 1;
        } else{
            echo 2;
        } 

    }else if ($_GET['hal'] == 'edit') {
      $perusahaan 		= $_POST['perusahaan'];
      $kategori 			= $_POST['kategori'];
      $nama_file 			= $_POST['nama_file'];
      $masa_berlaku 	= $_POST['masa_berlaku'];
      $id             = $_POST['id'];
        if ( cek_double_data($nama_file) ){
          if ( update_data($perusahaan, $kategori, $nama_file, $masa_berlaku, $id) ){
            echo 1;
          } else{
            echo 2;
          }
        } else{
          echo 3;
        } 

    }else if ($_GET['hal'] == 'hapus') {
      $id      = $_POST['id'];
        if ( hapus_data($id) ){
          echo 1;
        } else{
          echo 2;
        }

    }else {
        echo 99; 
  }
?>