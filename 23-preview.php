<?php
  require_once "core/init.php";

  $id         = $_GET['id'];
  $data       = tampilkan_per_id($id);
  
  $row        = mysqli_fetch_assoc($data);
  $nama_file  = $row['loc_file'];
  // var_dump($path);die;

  // Store the file name into variable 
  $file = "assets/pdf/".$nama_file;
  $filename = 'filename.pdf'; 

  // Header content type 
  header('Content-type: application/pdf'); 

  header('Content-Disposition: inline; filename="' . $filename . '"'); 

  header('Content-Transfer-Encoding: binary'); 

  header('Accept-Ranges: bytes'); 

  // Read the file 
  @readfile($file);
?>