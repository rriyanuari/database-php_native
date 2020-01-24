$(document).ready(function () {

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
          }
        }
      })
    }
  };
  $('#tmbl_login').on('click', login);
  // --------------------------------------------------------

  // -----------------------TAMBAH DATA------------------------    
    function tambah() {
      var perusahaan    = $('#pt       option:selected');
      var kategori      = $('#kategori option:selected');
      var nama_file     = $('#nama_file');
      var tgl_dibuat    = $('#tgl_dibuat');
      var masa_berlaku  = $('#masa_berlaku');
      var loc_file      = $('#loc_file');

      if (perusahaan.attr('value') == '') {
        $.toast({
          heading: 'Error',
          text: 'Pilih Perusahaan',
          showHideTransition: 'fade',
          icon: 'error'
        });
        perusahaan.focus();
        return false;

      } else if (kategori.attr('value') == '') {
        $.toast({
          heading: 'Error',
          text: 'Pilih Kategori',
          showHideTransition: 'fade',
          icon: 'error'
        });
        kategori.focus();
        return false;

      } else if ($.trim(nama_file.val()) == '') {
        $.toast({
          heading: 'Error',
          text: 'Nama File Tidak Boleh Kosong',
          showHideTransition: 'fade',
          icon: 'error'
        });
        nama_file.focus();
        return false;

      } else if ($.trim(tgl_dibuat.val()) == '') {
        $.toast({
          heading: 'Error',
          text: 'Tgl dibuat Tidak Boleh Kosong',
          showHideTransition: 'fade',
          icon: 'error'
        });
        tgl_dibuat.focus();
        return false;

      } else if ($.trim(masa_berlaku.val()) == '') {
        $.toast({
          heading: 'Error',
          text: 'Masa Berlaku Tidak Boleh Kosong',
          showHideTransition: 'fade',
          icon: 'error'
        });
        masa_berlaku.focus();
        return false;

      } else if ($.trim(loc_file.val()) == '') {
        $.toast({
          heading: 'Error',
          text: 'Pilih file untuk diupload',
          showHideTransition: 'fade',
          icon: 'error'
        });
        loc_file.focus();
        return false;

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
              $('#isi').load('dashboard.php');
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
    };
    $('#isi').on('click', '#tmbl_tmbh', tambah);
  // -------------------------------------------------------------    



  // ------------------------- EDIT DATA -------------------------------
    function ubah() {
      var id = $(this).attr('id');
      var perusahaan = document.getElementById("perusahaan" + id);
      var kategori = document.getElementById("kategori" + id);
      var nama_file = document.getElementById("nama_file" + id);
      var masa_berlaku = document.getElementById("masa_berlaku" + id);
      if (perusahaan.options[perusahaan.selectedIndex].value == '-') {
        $.toast({
          heading: 'Error',
          text: 'Pilih Perusahaan',
          showHideTransition: 'fade',
          icon: 'error'
        });
        perusahaan.focus();
      } else if (kategori.options[kategori.selectedIndex].value == '-') {
        $.toast({
          heading: 'Error',
          text: 'Pilih Kategori',
          showHideTransition: 'fade',
          icon: 'error'
        });
        kategori.focus();
      } else if ($.trim(nama_file.value) == '') {
        $.toast({
          heading: 'Error',
          text: 'Nama File Tidak Boleh Kosong',
          showHideTransition: 'fade',
          icon: 'error'
        });
        nama_file.focus();
      } else if (id == '') {
        $.toast({
          heading: 'Error',
          text: 'ID nya gamuncul cuy',
          showHideTransition: 'fade',
          icon: 'error'
        });
      } else {
        $.ajax({
          url: 'data-proses.php?hal=edit',
          method: 'POST',
          data: {
            perusahaan: perusahaan.options[perusahaan.selectedIndex].value,
            kategori: kategori.options[kategori.selectedIndex].value,
            nama_file: nama_file.value,
            masa_berlaku: masa_berlaku.value,
            id: $(this).attr('id'),
          },
          success: function (msg) {
            if (msg == 1) {
              $('.modal').modal('hide');
              $('.modal-backdrop').remove();
              $.toast({
                heading: 'Success',
                text: 'Data Berhasil Ditambahkan',
                showHideTransition: 'fade',
                icon: 'success'
              });
              $('#isi').load('dashboard.php');
            } else if (msg == 2) {
              nama_file.focus();
              $.toast({
                heading: 'Error',
                text: 'Gagal Update Data',
                showHideTransition: 'fade',
                icon: 'error'
              });
            } else if (msg == 3) {
              nama_file.focus();
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
    };
    $('#isi').on('click', '.tmbl_ubah', ubah)
  // ------------------------------------------------------------- 



  // -----------------------HAPUS DATA----------------------------
    $('#isi').on('click', '.tmbl-hapus', function () {
      var id = $(this).attr('id');
      $.ajax({
        url: 'data-proses.php?hal=hapus',
        method: "POST",
        data: {
          id: id
        },
        success: function (msg) {
          if (msg == 1) {
            $('.modal').modal('close');
            $.toast({
              heading: 'Success',
              text: 'Data Berhasil Dihapus',
              showHideTransition: 'fade',
              icon: 'success'
            });
            location.reload();

          } else if (msg == 2) {
            $.toast({
              heading: 'Error',
              text: 'Data Gagal Dihapus',
              showHideTransition: 'fade',
              icon: 'error'
            });
          }
        }
      });
    });
  // -------------------------------------------------------------

});


