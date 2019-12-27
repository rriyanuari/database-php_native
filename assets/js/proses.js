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
    var perusahaan = $('#perusahaan    option:selected');
    var kategori = $('#kategori  option:selected');
    var nama_file = $('#nama_file');
    var masa_berlaku = $('#masa_berlaku');
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



  // -----------------------MENU KASIR : CARI------------------------

  // $('#container').on('change','#barang_kasir', function(){
  //     var barang  = $('#barang_kasir');
  //         if ($.trim( barang.val() ) == ''){
  //             M.toast({
  //                 html: 'Barang apa yang mau dicari !!'
  //             });
  //             barang.focus();
  //         } else {
  //             $.ajax({
  //                 url    : 'data-proses.php?hal=cari_kasir',
  //                 method : "POST",
  //                 data   : { 
  //                     barang  : barang.val(),  
  //                 },
  //                 success : function(isi){
  //                     if ( isi == 2 ){
  //                         barang.focus();
  //                         M.toast({
  //                             html: 'Barang tidak ada di database !'
  //                         });
  //                     } else{
  //                         M.toast({
  //                             html: 'Data ada, silahkan isi qty  !'
  //                         });$('#box1').html(isi);
  //                     }
  //                 }
  //             })    
  //         }
  // });


  // -------------------------------------------------------------



  // -----------------------MENU KASIR : TAMBAH------------------------

  $('#container').on('change', '#barang_kasir', function () {
    var barang = $('#barang_kasir');
    // var qty     = $('#qty_kasir');
    var harga = $('#harga-kasir');
    var stock = $('#stock-kasir');
    var barang = $('#barang_kasir');
    var no_nota = $('#no_nota').html();
    if ($.trim(barang.val()) == '') {
      M.toast({
        html: 'Barang apa yang mau dicari !!'
      });
      barang.focus();
      // } else if ($.trim( qty.val() ) == ''){
      //     M.toast({
      //         html: 'berapa banyak barangnya ?'
      //     });
      //     qty.focus();
    } else {
      $.ajax({
        url: 'data-proses.php?hal=add_kasir',
        method: "POST",
        data: {
          barang: barang.val(),
          // qty     : qty.val(),
          no_nota: $('#no_nota').html()
        },
        success: function (tes) {
          if (tes == 2) {
            M.toast({
              html: 'gagal memasukan data !'
            });
          } else if (tes == 3) {
            M.toast({
              html: 'ada isian yang salah !'
            });
          } else if (tes == 4) {
            M.toast({
              html: 'Barang sudah ada di list !'
            });
          } else if (tes == 5) {
            M.toast({
              html: 'Barang tidak ada di database  !'
            });
          } else {
            barang.val('');
            // qty.val('');
            harga.val('');
            stock.val('');
            M.toast({
              html: 'Data berhasil ditambahkan  !'
            });
            $('#container').load('kasir.php');
          }
        }
      })
    }
  });


  // -------------------------------------------------------------

  // -----------------------HAPUS DATA ALL----------------------------

  $('#container').on('click', '.tmbl_cancel', function () {
    $('.modal').modal('close');
  });

  $('#container').on('click', '#tmbl_cancel_yes', function () {
    $.ajax({
      url: 'data-proses.php?hal=cancel_transaksi',
      method: "POST",
      data: {
        no_nota: $('#no_nota').html()
      },
      success: function (msg) {
        if (msg == 1) {
          $('.modal').modal('close');
          M.toast({
            html: 'Transaksi dibatalkan'
          });
          $('#container').load('kasir.php');
        } else if (msg == 2) {
          M.toast({
            html: 'Hapus data gagal !!'
          });
        }
      }
    });
  });

  // -------------------------------------------------------------




  // -----------------------MENU KASIR : EDIT - QTY ------------------------

  $('#container').on('change', '.qty_kasir', function () {
    var id = $(this).attr('id');
    var qty_val = $('#' + id);
    var no_nota = $('#no_nota').html();
    var qty_stock = document.getElementById("stock_kasir" + id).innerHTML;
    var barang = document.getElementById("barang_kasir" + id).innerHTML;
    if (qty_val.val() <= 0) {
      qty_val.val(1);
      M.toast({
        html: 'Masa Qty nya 0/mines'
      });
    } else if (qty_val.val() > parseInt(qty_stock)) {
      qty_val.val(qty_stock);
      M.toast({
        html: 'Masa Qty nya lebih dari stock'
      });
    }
    $.ajax({
      url: 'data-proses.php?hal=update_kasir_qty',
      method: "POST",
      data: {
        qty: qty_val.val(),
        barang: barang,
        no_nota: no_nota
      },
      success: function (msg) {
        if (msg == 2) {
          M.toast({
            html: 'Gagal Edit Qty !'
          });
        } else if (msg == 3) {
          M.toast({
            html: 'ada isian yang salah !'
          });
        } else {
          M.toast({
            html: 'Qty sudah diganti  !'
          }); $('#container').load('kasir.php');
        }
      }
    })
  });


  // -------------------------------------------------------------

  // ---------------------- MENU KASIR : DELETE PER ITEM ----------------------------

  $('#container').on('click', '.tmbl_cancel', function () {
    $('.modal').modal('close');
  });

  $('#container').on('click', '.tmbl_hapus_kasir', function () {
    $.ajax({
      url: 'data-proses.php?hal=hapus_kasir',
      method: "POST",
      data: {
        no: $(this).attr('id')
      },
      success: function (msg) {
        if (msg == 1) {
          $('.modal').modal('close');
          M.toast({
            html: 'Data berhasil dihapus !!'
          });
          $('#container').load('kasir.php');
        } else if (msg == 2) {
          M.toast({
            html: 'Hapus data gagal !!'
          });
        }
      }
    });
  });

  // --------------------------------------------------------------------


  // -----------------------MENU KASIR : PROSES_BAYAR ------------------------

  $('#container').on('click', '#bayar_10', function () {
    $('#input_bayar_kasir').val(10000)

  });
  $('#container').on('click', '#bayar_20', function () {
    $('#input_bayar_kasir').val(20000)

  });
  $('#container').on('click', '#bayar_50', function () {
    $('#input_bayar_kasir').val(50000)

  });
  $('#container').on('click', '#bayar_100', function () {
    $('#input_bayar_kasir').val(100000)

  });

  $('#container').on('click', '#tmbl_proses_bayar_kasir', function () {
    var harga_total = $('#harga_total_pembayaran').html();
    var pembayaran = $('#input_bayar_kasir');
    var kembali = parseInt(pembayaran.val() - harga_total);
    var no_nota = $('#no_nota').html();
    var tgl = $('#tgl_kasir').html();
    var waktu = $('#waktu_kasir').html();
    // if (harga_total.html() = 0 ) {
    //     M.toast({
    //         html: 'Mau bayar apa ?'
    //     });
    if (pembayaran.val() <= parseInt(harga_total)) {
      M.toast({
        html: 'Kurang uangnya'
      });
    } else {
      $.ajax({
        url: 'data-proses.php?hal=add_riwayat_nota',
        method: "POST",
        data: {
          harga_total: harga_total,
          kembali: kembali,
          no_nota: no_nota,
          tgl: tgl,
          waktu: waktu
        },
        success: function (msg) {
          if (msg == 2) {
            M.toast({
              html: 'Gagal melakukan transaksi !'
            });
          } else if (msg == 3) {
            M.toast({
              html: 'Gagal melakukan transaksi, karena qty data !'
            });
          } else {
            M.toast({
              html: 'Transaksi berhasil  !'
            }); $('.modal').modal('close');
            $('#container').load('kasir.php');
            alert(msg);
          }
        }
      })
    }
  });


  // -------------------------------------------------------------

});


