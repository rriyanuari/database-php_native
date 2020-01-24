$(document).ready(function () {
  M.AutoInit();
  // $('input#input_text, textarea#textarea2').characterCounter();
  $('.sidenav').sidenav();
  $('.collapsible').collapsible();
  $('.modal').modal();
  $('.tabs').tabs();

  function getFilterPt(){
    $.ajax({
      url: 'data-proses.php?hal=getFilter',
      success: function(response) {
      $('#pt').append(response);
      }
    });
  }

  // ---------- Check URL
    function cekUrl(){
      var url_string = $(location).attr('href')
      var url = new URL(url_string);
      var status = url.searchParams.get("status");
      if(status == 'add'){
        $('#isi').load('22-add.php')
      }else{
        $('#isi').load('21-dashboard.php')
      }
    }

  // ---------  Param Status
      $('#dashboard').on('click', function (){
        window.history.pushState("", "", "index.php");
        cekUrl();
        getFilterPt();
      });

      $('#add').on('click', function (){
        window.history.pushState("", "", "index.php?status=add");
        cekUrl();
      });

  // ---------------------- Nav Kategori ---------------------
    var kat = $("input[name=group1]:checked").next().text();

});