$(document).ready(function () {

  // ---------------------- Nav Kategori ---------------------
  var kat = $("input[name=group1]:checked").next().text();




  //----------------------- Nav PT --------------------------
  // $("#isi").hide();

  var url_string = $(location).attr('href')
  var url = new URL(url_string);
  var pt = url.searchParams.get("pt");
  // $.ajax({
  //   url    : '21-dashboard.php',
  //   method : 'GET',
  //   data   : { 
  //       pt       : pt,  
  //   }
  // )};

  // $('#gcal').on('click', function(){
  //   $("#isi").hide();
  //   $("#isi").load("data.php", function(){
  //     $(this).fadeIn('slow');
  //   });
  // data   : { 
  //     user       : user.val(),  
  //     pass       : pass.val(),  
  // },
  // success : function(msg){
  //     if ( msg == 1 ){
  //         location.reload();
  //     } else if ( msg == 2 ){
  //         $.toast({
  //             heading: 'Error',
  //             text: 'Username atau Password salah',
  //             showHideTransition: 'fade',
  //             icon: 'error'
  //         });
  //     }
  // }
  // });   
  // --------------------------------------------------------




  // $("#isi").hide();
  // $("#isi").load("21-dashboard.php", function(){
  //           $(this).fadeIn('slow');
  //   });

  // $('#dashboard').click(function(){
  // 	$("#isi").hide();
  // 	$('#isi').load("21-dashboard.php", function(){
  //           $(this).fadeIn('slow');
  //   	});
  //   });

  // $('#data').click(function(){
  // 	$("#isi").hide();
  // 	$('#isi').load("data.php", function(){
  //           $(this).fadeIn('slow');
  //       });
  //   });

});