<?php
    
  require_once "core/init.php";

  if  ($_GET['hal'] == 'login') {
    $user 		= escape($_POST['user']);
		$pass 		= escape($_POST['pass']);
    $query = "SELECT * FROM users WHERE username='$user' AND password='$pass'";
		global $link;
		if ( $result = mysqli_query($link, $query) ){
			if ( mysqli_num_rows($result) != 0 ){
        $_SESSION['user'] = $user;
        echo 1;
      } else{
        echo 2;
      } 
  }else if ($_GET['hal'] == 'tambah') {
		$perusahaan 		= escape($_POST['perusahaan']);
		$kategori 			= escape($_POST['kategori']);
		$nama_file 			= escape($_POST['nama_file']);
		$masa_berlaku 	= escape($_POST['masa_berlaku']);
      if  ( $query 	= " INSERT INTO data (pt, kategori, nama_file, masa_berlaku) 
                        VALUES ('$perusahaan', '$kategori', '$nama_file', '$masa_berlaku')";
            return run($query); 
          ){
            echo 1;
      } else{
            echo 2;
      } 
  }else if ($_GET['hal'] == 'edit') {
    $perusahaan 		= escape($_POST['perusahaan']);
		$kategori 			= escape($_POST['kategori']);
		$nama_file 			= escape($_POST['nama_file']);
    $masa_berlaku 	= escape($_POST['masa_berlaku']);
    $id             = escape($_POST['id']);
      if ( cek_double_data($nama_file) ){
        if  ( $query 	= "UPDATE data SET pt='$perusahaan', kategori='$kategori', nama_file='$nama_file', masa_berlaku='$masa_berlaku' 
              WHERE id='$id' ";
              return run($query); 
            ){
              echo 1;
        } else{
              echo 2;
        }
      } else{
        echo 3;
      } 
  }else if ($_GET['hal'] == 'hapus') {
    $id = escape($_POST['id']);
    if  ( $query 	= "DELETE FROM data WHERE id='$id' ";
          return run($query); 
        ){
          echo 1;
    } else{
          echo 2;
      }
  }else {
        echo 99; 
  }
?>