(function ($) {
  "use strict";
  // Preloader
  $(window).on('load', function () {
    if ($('#preloader').length) {
      $('#preloader').delay(100).fadeOut('slow', function () {
        $(this).remove();
      });
    }
  });

  // Back to top button
  $(window).scroll(function() {
    if ($(this).scrollTop() > 100) {
      $('.back-to-top').fadeIn('slow');
    } else {
      $('.back-to-top').fadeOut('slow');
    }
  });
  $('.back-to-top').click(function(){
    $('html, body').animate({scrollTop : 0},1500, 'easeInOutExpo');
    return false;
  });

  // Header scroll class
  $(window).scroll(function() {
    if ($(this).scrollTop() > 100) {
      $('#header').addClass('header-scrolled');
    } else {
      $('#header').removeClass('header-scrolled');
    }
  });
  if ($(window).scrollTop() > 100) {
    $('#header').addClass('header-scrolled');
  }

  $(document).ready(function(){

    // Table Filter
    $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();
      $("#myTable tr").filter(function() {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
      });
    });

    // Toast init.
    $('.toast').toast('show');

  });
  
  // Form Validation
  window.addEventListener('load', function() {
    var forms = document.getElementsByClassName('needs-validation');
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);

  // Sidebar Controller
  $('#body-sidemenu .collapse').collapse('hide'); // Hide submenus
  $('#collapse-icon').addClass('fa-angle-double-left'); // Collapse/Expand icon
  $('[data-toggle=sidebar-colapse]').click(function() { // Collapse click
      SidebarCollapse();
  });
  function SidebarCollapse () {
      $('.menu-collapsed').toggleClass('d-none');
      $('.sidebar-submenu').toggleClass('d-none');
      $('.submenu-icon').toggleClass('d-none');
      $('#sidebar-container').toggleClass('sidebar-expanded sidebar-collapsed');
      $('.sidebar-separator-title').toggleClass('d-flex');
      $('#collapse-icon').toggleClass('fa-angle-double-left fa-angle-double-right');
//      $('.pagination').toggleClass('justify-content-center');
  }
  $(window).on('load', function () {
    function check() {
      if ($(document).width() < 768) { 
        SidebarCollapse();
        $('#main-content.with-fixed-sidebar').toggleClass('ml-60');
        $('#sidebar-container.sidebar-fixed').toggleClass('position-fixed');
      }
    }
    check();
    var width = $(window).width();
    $(window).resize(function () { 
      if ($(window).width()==width) return;
      width = $(window).width();
      check();
    });
  });

  // (UN)CHECK ALL
  $('#selectAll').click(function (e) {
    $(this).closest('table').find('td div input:checkbox').prop('checked', this.checked);
  });

  // CURRENCY
})(jQuery);

$(document).ready(function() {
  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  function logout() {
    $.ajax({
      url: "{{ route('logout') }}",
      method: 'GET',
      success: function(response) {
        console.log(response)
      }
    })
  }

})
$.datetimepicker.setLocale('id');
// var mainurl = 'https://api-gowisata.aturtoko.site/api/';
var mainurl = 'https://app.gowisata.co.id/api/';

var urls = window.location.href;
var token = $('meta[name="csrf-token"]').attr('content');

function redirected() {
  window.location.reload()
}

function enableLoading() {
  $.LoadingOverlay("show")
}

function kaiRegAdmins() {
  console.log("tes")
  window.location.href = "/listorder/kai_regular/admin";
}
function kaiWisataAdmins() {
  window.location.href = "/listorder/kai_wisata/admin";
}
function kaiLuarBiasaAdmins() {
  window.location.href = "/listorder/kai_luarbiasa/admin";
}
function KaiIstimewaAdmins() {
  window.location.href = "/listorder/istimewa/admin";
}
function pesawatOrderAdmin() {
  window.location.href = "/listorder/flight/admin";
}
function hotelOrderAdmin() {
}
function miceOrderAdmin() {
  window.location.href = "/listorder/mice/admin";
}

//format harga
function formatPrice(nilai){
  var bilangan = Math.floor(nilai); // menghilangkan angka di belakang koma
  var number_string = bilangan.toString(),
  split	= number_string.split(','),
  sisa 	= split[0].length % 3,
  rupiah 	= split[0].substr(0, sisa),
  ribuan 	= split[0].substr(sisa).match(/\d{1,3}/gi);   
  if (ribuan) {
  separator = sisa ? '.' : '';
  rupiah += separator + ribuan.join('.');
  }

  return rupiah
}

function formatPriceWisKlbIst(nilai){
  var angka = nilai.split(".")
  var	reverse = angka[0].toString().split('').reverse().join(''),
          ribuan 	= reverse.match(/\d{1,3}/g);
          ribuan	= ribuan.join('.').split('').reverse().join('');
  return 'Rp ' + ribuan;
}
//lost icon falsilitas hotel
function listFasilities(fasilities){
    
  var list_icon = []
  if(fasilities == null || fasilities == []){
      list_icon = "-";
  }else if(fasilities != null && fasilities != [] && fasilities != 0){
      var faci = fasilities

      for(var i = 0; i <= faci.length; i++){
          console.log(faci[i])
          if(faci[i] == "Laundry"){
              var icon = `<i class="fa-solid fa-shirt mr-1"></i>`;
          }else if(faci[i] == "Spa"){
              var icon = `<i class="fa-solid fa-spa mr-1"></i>`;
          }else if(faci[i] == undefined){
              var icon = "-";
          }
         
          list_icon.push(icon)
      }

     list_icon = list_icon.join("")
  }
  return list_icon
}

function listGerbongKlb(data){
  var list = "";
  for(var i = 0; i < data.length; i++){
      var nm = data[i]['name_wagon'];
      if (list != "") {
          list += ", ";
      }
      list += nm;
  }
  return list;
}

function jumlahMaxPax(data){
  var total = 0;
    for(var i = 0; i < data.length; i++){
        var nm = parseInt(data[i]['capa_wagon']);
        total += nm;
    }
return total;
}

//format status payment
function formatPaymentStatus(data){
  if(data == "NOT_PAID"){
    var pay_stat = `<b style="color: red ;"> Belum Dibayar</b>`;
  }else if(data == "PAID"){
      var pay_stat = `<b style="color: green;">Telah Dibayar</b>`;
  }else if(data == "COMPLETED"){
      var pay_stat = `<b style="color: orange ;">Lunas</b>`;
  }else if(data == "EXPIRED"){
      var pay_stat = `<b style="color: black ;">Kadaluarsa</b>`;
  }

  return pay_stat

}


//format status transaksi
function formatTransactionStatus(data){
  if(data == "BOOKED"){
    var trans_stat = `<b style="color: green ;"> Dipesan</b>`;
  }else if(data == "PROCESSED"){
      var trans_stat = `<b style="color: blue ;"> Diproses</b>`;
  }else if(data == "SUCCEED"){
      var trans_stat = `<b style="color: orange ;"> Berhasil</b>`;
  }else if(data == "FAILED"){
      var trans_stat = `<b style="color: red ;"> Gagal</b>`;
  }else if(data == "CANCELED"){
      var trans_stat = `<b style="color: black ;"> Batal</b>`;
  }

  return trans_stat
}

function getImageBank(data){
  if(data == 1){
    var logo = 'bca_bank.png';
  }else if(data == 2){
      var logo = 'mandiri.png';
  }else if(data == 3){
      var logo = 'bsi_bank.png';
  }else if(data == 4){
      var logo = 'doku.png';
  }else if(data == 5){
      var logo = 'bri.png';
  }else if(data == 6){
      var logo = 'cimb.jpg';
  }else if(data == 7){
      var logo = 'permata.png';
  }else if(data == 8){
      var logo = 'bni.png';
  }else if(data == 9){
      var logo = 'danamon.png';
  }else if(data == 10){
      var logo = 'alfamart.png';
  }else if(data == 11){
      var logo = 'indomart.png';
  }
  return logo
}

function getNameBank(data){
  if(data == 1){
    var name = 'Bank Central Asia (BCA)';
  }else if(data == 2){
      var name = 'Mandiri';
  }else if(data == 3){
      var name = 'Bank Syariah Indonesia (BSI)';
  }else if(data == 4){
      var name = 'Doku';
  }else if(data == 5){
      var name = 'Bank Rakyat Indonesia (BRI)';
  }else if(data == 6){
      var name = 'Commerce International Merchant Bankers (CIMB)';
  }else if(data == 7){
      var name = 'Permata';
  }else if(data == 8){
      var name = 'Bank Negara Indonesia (BNI)';
  }else if(data == 9){
      var name = 'Danamon';
  }else if(data == 10){
      var name = 'Alfamart';
  }else if(data == 11){
      var name = 'Indomart';
  }
  return name
}

function reformatDateMice(data){
    var true_date = new Date(data)
    var options = { year: 'numeric', month: '2-digit', day: '2-digit' };
    var dateString = true_date.toLocaleDateString('en-US', options);
    var dateFormated = moment(dateString).format('DD-MM-YYYY');

    return dateFormated
}

function reformatDateMicestartdate(data){
  var true_date = moment(data, "DD MMMM YYYY HH:mm");
  var dateFormatted = true_date.format('DD-MM-YYYY HH:mm');

  return dateFormatted
}

var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
function reformatDateList(data){
  var dateTime = moment(data, 'D/MM/YYYY - HH:mm');
  var dateOnly = dateTime.format('D') + ' ' + months[dateTime.format('MM') - 1] + ' ' + dateTime.format('YYYY');
  var timeOnly = dateTime.format('HH:mm');

  return { date: dateOnly, time: timeOnly };
}

function reformatDateListFlight(data) {
  var dateTime = moment(data);
  var dateOnly = dateTime.format('DD') + ' ' + months[dateTime.format('MM') - 1] + ' ' + dateTime.format('YYYY');
  var timeOnly = dateTime.format('HH:mm');

  return { date: dateOnly, time: timeOnly };
}

function getNameWagon(Data){

  for( var i = 0 ; i < Data.length; i++ ) {
      var hj = Data[i].wagon_name;
  };
  return hj
}

function loopNameStationOrCity(list_station){

  for( var i = 0 ; i < list_station.length; i++ ) {
      var hj = list_station[i].name;
  };
  return hj
}

function insetTags(data){
  var datas = data.station_list
  for( var i = 0 ; i < datas.length; i++ ) {
      var hj = datas[i].tags;
  };
  return hj
}

function insetName(data){
  var datas = data.station_list
  for( var i = 0 ; i < datas.length; i++ ) {
      var hj = datas[i].name;
  };
  return hj
}

function insertCode(data){
  var datas = data.station_list
  for( var i = 0 ; i < datas.length; i++ ) {
      var hj = datas[i].code;
     
  };
  return hj
}

function insertCity(data){
  var code_data = {
      "tags": data.tags,
      "name": data.name,
      "code": ""
  }
  return code_data
}

function loopCodeStationOrCity(list_code){

  for( var i = 0 ; i < list_code.length; i++ ) {
      var hj = list_code[i].code;
  };
  return hj
}

function initMap() {
  var kord = JSON.parse(localStorage.getItem('data_kordinat'))
  var latitude = parseFloat(kord['latitude']);
  var longitude = parseFloat(kord['longitude']);
  console.log(latitude)
  var myLatLng = {lat: latitude, lng: longitude};
  var map = new google.maps.Map(document.getElementById('map'), {
  zoom: 17,
  center: myLatLng
  });

  var kordinat = new google.maps.LatLng( latitude,  longitude);
  var marker = new google.maps.Marker({
  position: kordinat,
  map: map
  });
}

function getTicketTrain(code){
  $.LoadingOverlay("show")
  var book_id = localStorage.getItem('kode_book_alls')
  var response = fetch(mainurl + "train/e_ticket",{
      method: 'POST',
      headers: {
          'Accept': 'application/json',
          'Content-Type': 'application/json',
          'Authorization': 'Bearer' + token_set,
      },
      body: JSON.stringify({
          "booking_code": code,
      }),
  }).then((response) => response.blob()).then((responseData) => {
      // console.log(responseData)
      toastr.success("Berhasil download tiket", "Success")
      var url = URL.createObjectURL(responseData) ;
      var a = document.createElement('a') ;
      a.style.display = 'none';
      a.href = url ;
      a.download = 'ticket_train.pdf';
      document.body.appendChild(a) ;
      a.click() ;
      URL.revokeObjectURL(url) ;
      $.LoadingOverlay("hide")
  });
};

  function getTicketFlight(code){
      $.LoadingOverlay("show")
      var book_id = localStorage.getItem('kode_book_alls')
      var response = fetch(mainurl + "flight/e_ticket",{
          method: 'POST',
          headers: {
              'Accept': 'application/json',
              'Content-Type': 'application/json',
              'Authorization': 'Bearer' + token_set,
          },
          body: JSON.stringify({
              "booking_code": code,
          }),
      }).then((response) => response.blob()).then((responseData) => {
          $.LoadingOverlay("hide")
          toastr.success("Berhasil download tiket", "Success")
          var url = URL.createObjectURL(responseData);
          var a = document.createElement('a');
          a.style.display = 'none';
          a.href = url;
          a.download = 'ticket_flight.pdf';
          document.body.appendChild(a);
          a.click();
          URL.revokeObjectURL(url);
      });
  };

  function getTicketTrainDepart(code){
      $.LoadingOverlay("show")
      var code_cart = localStorage.getItem('kode_book_alls')
      var response = fetch(mainurl+"train/e_ticket?booking_code="+code_cart,{
          method: 'POST',
          headers: {
              'Accept': 'application/json',
              'Content-Type': 'application/json',
              'Authorization': 'Bearer' + token_set,
          },
          body: JSON.stringify({
              "booking_code": code,
          }),
      }).then((response) => response.blob()).then((responseData) => {
          console.log(responseData)
          $.LoadingOverlay("hide")
          var url = URL.createObjectURL(responseData);
          var a = document.createElement('a');
          a.style.display = 'none';
          a.href = url;
          a.download = 'ticket_train_keberangkatan.pdf';
          document.body.appendChild(a);
          a.click();
          URL.revokeObjectURL(url);
      });

  };

  function getTicketTrainReturn(code){
      $.LoadingOverlay("show")
      var code_retrn = localStorage.getItem('kode_book_return_alls')
      // var code_retrn = code_cart['code_return']
      // var book_id = JSON.parse(localStorage.getItem('kode_book_alls'))
      var response = fetch(mainurl+"train/e_ticket",{
          method: 'POST',
          headers: {
              'Accept': 'application/json',
              'Content-Type': 'application/json',
              'Authorization': 'Bearer' + token_set,
          },
          body: JSON.stringify({
              "booking_code": code,
          }),
      }).then((response) => response.blob()).then((responseData) => {
          $.LoadingOverlay("hide")
          toastr.success("Berhasil download tiket", "Success")
          var url = URL.createObjectURL(responseData);
          var a = document.createElement('a');
          a.style.display = 'none';
          a.href = url;
          a.download = 'ticket_train_kepulangan.pdf';
          document.body.appendChild(a);
          a.click();
          URL.revokeObjectURL(url);
      });
  };

  function getVoucHotel(code){
      $.LoadingOverlay("show")
      // var code_cart = JSON.parse(localStorage.getItem('code_book_krl_reg'))
      // var code_retrn = code_cart['return_code']
      // var code_hotel_book = print_tiket.invoice_hotel
      // var book_id = JSON.parse(localStorage.getItem('code_book_krl_reg'))
      var response = fetch(mainurl+"hotel/e_voucher",{
          method: 'POST',
          headers: {
              'Accept': 'application/json',
              'Content-Type': 'application/json',
              'Authorization': 'Bearer' + token_set,
          },
          body: JSON.stringify({
              "invoice_no": code,
              "reservation_no": ""
          }),
      }).then((response) => response.blob()).then((responseData) => {
          console.log(responseData)
          $.LoadingOverlay("hide")
          var url = URL.createObjectURL(responseData);
          var a = document.createElement('a');
          a.style.display = 'none';
          a.href = url;
          a.download = 'voucher_hotel.pdf';
          document.body.appendChild(a);
          a.click();
          URL.revokeObjectURL(url);
      });
  };


// let dataInfo
// $.ajax({
//   url: baseurl + "/api/v1/issue/list_information_source",
//   type: "GET",
//   dataType: 'json',
//   success: function(result) {
//     if (result.success) {
//       dataInfo = result.data
//     } else {
//       toastr.error("Run Seeder Database first!")
//     }
//   }
// })

// let dataOrg
// $.ajax({
//   url: baseurl + "/api/v1/organization/get",
//   type: "GET",
//   dataType: 'json',
//   success: function(result) {
//     if (result.success) {
//       dataOrg = result.data
//     } else {
//       toastr.error(result.message, "Organization Error")
//     }
//   }
// })

// const DateTime = luxon.DateTime