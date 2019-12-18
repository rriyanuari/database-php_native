$(document).ready(function () {

  $('#masa_berlaku-tambah').datepicker();

  //----------------------- Login --------------------------
  function login() {
    var user = $('#username');
    var pass = $('#password');
    if ($.trim(user.val()) == '') {
      $.toast({
        heading: 'Error',
        text: 'Username Tidak Boleh Kosong',
        showHideTransition: 'fade',
        icon: 'error'
      });
      user.focus();
    } else if ($.trim(pass.val()) == '') {
      $.toast({
        heading: 'Error',
        text: 'Password Tidak Boleh Kosong',
        showHideTransition: 'fade',
        icon: 'error'
      });
      pass.focus();
    } else {
      $.ajax({
        url: 'data-proses.php?hal=login',
        method: 'POST',
        data: {
          user: user.val(),
          pass: pass.val(),
        },
        success: function (msg) {
          if (msg == 1) {
            location.reload();
          } else if (msg == 2) {
            $.toast({
              heading: 'Error',
              text: 'Username atau Password salah',
              showHideTransition: 'fade',
              icon: 'error'
            });
          }else if (msg == 3){
            $.toast({
              heading: 'Error',
              text: 'Fungsi gagal',
              showHideTransition: 'fade',
              icon: 'error'
            });
          }
        }
      })
    }
  };
  $('#tmbl_login').on('click', login);
  // --------------------------------------------------------

  // -----------------------TAMBAH DATA------------------------    
  $('#isi').on('click', '#tmbl_tmbh', function() {
    var perusahaan    = $('#perusahaan-tambah    option:selected');
    var kategori      = $('#kategori-tambah  option:selected');
    var nama_file     = $('#nama_file-tambah');
    var masa_berlaku  = $('#masa_berlaku-tambah');
    if (perusahaan.attr('value') == '-') {
      $.toast({
        heading: 'Error',
        text: 'Pilih Perusahaan',
        showHideTransition: 'fade',
        icon: 'error'
      });
      perusahaan.focus();
    } else if (kategori.attr('value') == '-') {
      $.toast({
        heading: 'Error',
        text: 'Pilih Kategori',
        showHideTransition: 'fade',
        icon: 'error'
      });
      kategori.focus();
    } else if ($.trim(nama_file.val()) == '') {
      $.toast({
        heading: 'Error',
        text: 'Nama File Tidak Boleh Kosong',
        showHideTransition: 'fade',
        icon: 'error'
      });
      nama_file.focus();
    } else {
      $.ajax({
        url: 'data-proses.php?hal=tambah',
        method: 'POST',
        data: {
          perusahaan: perusahaan.attr('value'),
          kategori: kategori.attr('value'),
          nama_file: nama_file.val(),
          masa_berlaku: masa_berlaku.val(),
        },
        success: function (msg) {
          if (msg == 1) {
            $.toast({
              heading: 'Success',
              text: 'Data Berhasil Ditambahkan',
              showHideTransition: 'fade',
              icon: 'success'
            });
            $('#isi').load('21-dashboard.php');
          } else if (msg == 2) {
            nama.focus();
            $.toast({
              heading: 'Error',
              text: 'Nama File Sudah Ada',
              showHideTransition: 'fade',
              icon: 'error'
            });
          }
        }
      })
    }
  });
  // $('#isi').on('click', '#tmbl_tmbh', tambah);
  // -------------------------------------------------------------    



  // -------------------------------------------------------------

});


