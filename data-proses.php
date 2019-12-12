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
  }else if ($_GET['hal'] == 'tambah') {
		$perusahaan 		= $_POST['perusahaan'];
		$kategori 			= $_POST['kategori'];
		$nama_file 			= $_POST['nama_file'];
		$masa_berlaku 	= $_POST['masa_berlaku'];
      if ( tambah_data($perusahaan, $kategori, $nama_file, $masa_berlaku) ){
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
  }else if ($_GET['hal'] == 'hapus_kasir') {
    $no      = $_POST['no'];
      if ( hapus_data_kasir($no) ){
        echo 1;
      } else{
        echo 2;
      }
  }else if ($_GET['hal'] == 'cari_kasir') {
    $barang      = $_POST['barang'];
      if ( cek_cari($barang) ){
        $data = tampilkan_per_nama($barang);
        $row                  = mysqli_fetch_assoc($data);
        $harga                = $row['harga'];
        $stock                = $row['qty'];
          ?>
           
            <div class="row">
              <div class="col s3"> 
                <div class="input-field"> 
                  <input id="harga-kasir" type="text" class="validate" disabled value="Rp. <?= number_format($harga) ?>,-">
                  <label class='active' for="harga-kasir" class="">Harga</label>
                </div>
              </div>
              <div class="col s3"> 
                <div class="input-field"> 
                  <input id="stock-kasir" type="text" class="validate" disabled value="<?= $stock ?>">
                  <label class='active' for="stock-kasir" class="">Stock</label>
                </div>
              </div>
              <div class="col s3"> 
                <div class="input-field"> 
                  <input id="qty_kasir" type="number" class="validate">
                  <label for="qty_kasir" class="active">Qty</label>
                </div>
              </div>
              <div class="col s3"> 
                <submit class="btn waves-effect waves-light tmbl_kasir" id="add_kasir" type="submit" name="submit">Add</submit>
              </div>
            </div>


          <?php
      } else{
        echo 2;
      }
  }else if ($_GET['hal'] == 'cancel_transaksi') {
    $no_nota  = $_POST['no_nota'];
          if ( hapus_data_kasir_all($no_nota) ){ 
            echo 1;
          }else {
            echo 2;
          } 
  }else if ($_GET['hal'] == 'add_kasir') {
    $barang   = $_POST['barang'];
    $qty      = 1;
    $no_nota  = $_POST['no_nota'];
    if ( cek_cari($barang) ){
      if( cek_tambah($barang, $no_nota) ){
        if ( $data = tampilkan_per_nama($barang) ){
          $row                  = mysqli_fetch_assoc($data);
          $harga                = $row['harga'];
          $stock                = $row['qty'];
          $harga_total          = $harga*$qty;
          if ( riwayat_barang($barang, $harga, $qty, $harga_total, $no_nota, $stock) ){ 
          
          }else {
              echo 2;
          } 
        }else {
          echo 3; 
        }
      }else {
        echo 4;
      }
    } else {
      echo 5;
    }
  }else if ($_GET['hal'] == 'update_kasir_qty') {
    $barang   = $_POST['barang'];
    $qty      = $_POST['qty'];
    $no_nota  = $_POST['no_nota'];
        if ( $data = tampilkan_per_nama($barang) ){
          $row                  = mysqli_fetch_assoc($data);
          $harga                = $row['harga'];
          $harga_total          = $harga*$qty;
          if ( update_data_qty($barang, $qty, $harga_total, $no_nota) ){ 
            
          }else {
              echo 2;
          } 
        }else {
          echo 3; 
        }
  }else if ($_GET['hal'] == 'add_riwayat_nota') {
    $harga_total    = $_POST['harga_total'];
    $kembali        = $_POST['kembali'];
    $no_nota        = $_POST['no_nota'];
    $tgl            = $_POST['tgl'];
    $waktu          = $_POST['waktu'];
    $kembali_baru = 'kembalinya Rp.'.number_format($kembali);
      if( $data_baru = tampilkan_riwayat($no_nota) ){
        while( $row  = mysqli_fetch_assoc($data_baru) ):
          $nama    = $row['barang'];
          $stock   = $row['stock'];
          $qty     = $row['qty'];
          $stock_baru = $stock-$qty;
          edit_data_from_pembayaran($stock_baru, $nama);
        endwhile;
          if ( riwayat_nota($no_nota, $harga_total, $tgl, $waktu) ){ 
            echo $kembali_baru;
          }else {
              echo 2;
          }
      }else{
        echo 3;
      } 
  }else {
        echo 99; 
  }
?>