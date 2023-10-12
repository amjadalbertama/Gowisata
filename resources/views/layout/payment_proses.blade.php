<!DOCTYPE html>
<html lang="en">

<head>
  <title>Gowisata</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="keywords" content="website">
  <meta name="description" content="website">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
  <link href="{{ asset('img/gowisata.png') }}" rel="icon">
  <!-- <link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon"> -->
  <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('lib/font-awesome/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <!-- <link rel="stylesheet" href="{{ asset('lib/datetimepicker/temp/jquery.datetimepicker.css') }}"> -->
  <link rel="stylesheet" href="{{ asset('lib/datetimepicker/temp/jquery.datetimepicker.css') }}">
  <link rel="stylesheet" href="{{ asset('lib/toastr/toastr.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('lib/loader/custom-loader/loading-overlay.jquery.css') }}">
  <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
  <!-- <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'> -->
  <script src="{{ asset('js/jquery-3-5-1.min.js') }}"></script>
</head>

<body id="admin-page" >
  <header id="header" class="fixed-top">
    <nav class="navbar navbar-expand-lg navbar-light border-bottom py-0 shadow-sm rounded bg-white" style="height:80px;">
      <div class="container">
        <a class="navbar-brand" href="{{ url('home') }}">
          <img src="{{ asset('img/gowisata.png') }}" alt="Logo" height="50" class="brand-logo mt-n1 mr-2"> 
        <!-- <div class="nav-link" style="font-size: 14px; font-weight: bold; "> Gowisata</div> -->
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
          <ul class="navbar-nav w-100 my-1">
            <li class="nav-item d-none" id="homeMenu">
              <a class="nav-link" title="Home" href="{{ url('home') }}"><i class="fa fa-home mr-2"></i>Home Menu</a>
            </li>
            <li class="nav-item d-none" id="flight1">
              <a class="nav-link" style="margin-top: 5px;" href="{{ url('/pesawat') }}"><i id="data_pax_navbar_flight" class="fa fa-chevron-circle-right mr-1"></i>Data Penumpang </a>
            </li>
            <li class="nav-item d-none" id="flight2">
              <a class="nav-link" style="margin-top: 5px;" href="{{ url('/pesawat/addPax') }}"><i id="fasilitas_navbar_flight" class="fa fa-chevron-circle-right mr-1"></i>Fasilitas </a>
            </li>
            <li class="nav-item d-none" id="flight3">
              <a class="nav-link" style="margin-top: 5px;" href="{{ url('/payment_method') }}"><i id="payment_navbar_flight" class="fa fa-chevron-circle-right mr-1"></i>Proses Pembayaran </a>
            </li>
            <li class="nav-item d-none" id="flight4">
              <a class="nav-link" style="margin-top: 5px;" href=""><i id="tiket_flight" class="fa fa-chevron-circle-right mr-1"></i>Pelunasan & Tiket</a>
            </li>

            <li class="nav-item d-none" id="trainreg1">
              <a class="nav-link" style="margin-top: 5px;" href=""><i id="data_pax_navbar_train_reg"  class="fa fa-chevron-circle-right mr-1"></i>Data Penumpang</a>
            </li>
            <li class="nav-item d-none" id="trainreg2">
              <a class="nav-link" style="margin-top: 5px;" href=""><i id="seat_navbar_train"  class="fa fa-chevron-circle-right mr-1"></i>Pilih Kursi</a>
            </li>
            <li class="nav-item d-none" id="trainreg3">
              <a class="nav-link" style="margin-top: 5px;" href=""><i id="payment_navbar_train_reg"  class="fa fa-chevron-circle-right mr-1"></i>Proses Pembayaran</a>
            </li>
            <li class="nav-item d-none" id="trainreg4">
              <a class="nav-link" style="margin-top: 5px;" href=""><i id="tiket_navbar_train_reg"  class="fa fa-chevron-circle-right mr-1"></i>Pelunasan & Tiket</a>
            </li>

            <li class="nav-item d-none" id="train_wis_klb_ist1">
             <a class="nav-link" style="margin-top: 5px;" href=""><i id="list_wagon_navbar_train" class="fa fa-chevron-circle-right mr-1"></i>Pilih Gerbong</a>
            </li>
            <li class="nav-item d-none" id="train_wis_klb_ist2">
              <a class="nav-link" style="margin-top: 5px;" href=""><i id="data_pax_navbar_train" class="fa fa-chevron-circle-right mr-1"></i>Data Pemesan</a>
            </li>
            <li class="nav-item d-none" id="train_wis_klb_ist3">
              <a class="nav-link" style="margin-top: 5px;" href=""><i id="payment_navbar_train" class="fa fa-chevron-circle-right mr-1"></i>Proses Pembayaran</a>
            </li>
            <li class="nav-item d-none" id="train_wis_klb_ist4">
              <a class="nav-link" style="margin-top: 5px;" href=""><i id="tiket_navbar_train_wis"  class="fa fa-chevron-circle-right mr-1"></i>Pelunasan & Tiket</a>
            </li>

            <li class="nav-item d-none" id="nav_hotel1">
             <a class="nav-link" style="margin-top: 5px;" href=""><i id="list_room_hotel" class="fa fa-chevron-circle-right mr-1"></i>Pilih Kamar</a>
            </li>
            <li class="nav-item d-none" id="nav_hotel2">
              <a class="nav-link" style="margin-top: 5px;" href=""><i id="data_pax_hotel" class="fa fa-chevron-circle-right mr-1"></i>Data Pemesan</a>
            </li>
            <li class="nav-item d-none" id="nav_hotel3">
              <a class="nav-link" style="margin-top: 5px;" href=""><i id="payment_navbar_hotel" class="fa fa-chevron-circle-right mr-1"></i>Proses Pembayaran</a>
            </li>
            <li class="nav-item d-none" id="nav_hotel4">
              <a class="nav-link" style="margin-top: 5px;" href=""><i id="payment_navbar_hotel_tiket" class="fa fa-chevron-circle-right mr-1"></i>Pelunasan & Tiket</a>
            </li>

            <li class="nav-item d-none" id="nav_mice1">
              <a class="nav-link" style="margin-top: 5px;" href=""><i id="payment_navbar_mice" class="fa fa-chevron-circle-right mr-1"></i>Proses Pembayaran</a>
            </li>
            <li class="nav-item d-none" id="nav_mice2">
              <a class="nav-link" style="margin-top: 5px;" href=""><i id="payment_navbar_mice_tiket" class="fa fa-chevron-circle-right mr-1"></i>Pelunasan & Tiket</a>
            </li>

            <li class="nav-item mr-auto">
              <a class="nav-link d-none" id="settings" title="Settings" href="{{ route('settings') }}"><i class="fa fa-cog mr-2"></i>Settings</a>
            </li>
            <li class="nav-item">
              <div class="dropdown">
                <a id="payment_tiket_flight" class="nav-link d-none" href="javascript:void(0);" title="Options" data-toggle="dropdown"><b class="text-colors-on" style="font-size:20px ;"><span class="fa fa-plane mr-1"></span> Tiket Pesawat</b></a>
                <a id="payment_tiket_train_wisata" class="nav-link d-none" href="javascript:void(0);" title="Options" data-toggle="dropdown"><b class="text-colors-on" style="font-size:20px ;"><span class="fa fa-train mr-1"></span> Kereta Wisata</b></a>
                <a id="payment_tiket_train_klb" class="nav-link d-none" href="javascript:void(0);" title="Options" data-toggle="dropdown"><b class="text-colors-on" style="font-size:20px ;"><span class="fa fa-train mr-1"></span> Kereta Luar Biasa</b></a>
                <a id="payment_tiket_train_istimewa" class="nav-link d-none" href="javascript:void(0);" title="Options" data-toggle="dropdown"><b class="text-colors-on" style="font-size:20px ;"><span class="fa fa-train mr-1"></span> Kereta Istimewa</b></a>
                <a id="payment_tiket_train_regular" class="nav-link d-none" href="javascript:void(0);" title="Options" data-toggle="dropdown"><b class="text-colors-on" style="font-size:20px ;"><span class="fa fa-train mr-1"></span> Kereta Regular</b></a>
                <a id="payment_tiket_hotel" class="nav-link d-none" href="javascript:void(0);" title="Options" data-toggle="dropdown"><b class="text-colors-on" style="font-size:20px ;"><span class="fa fa-bed mr-1"></span>Hotel</b></a>
                <a id="payment_tiket_mice" class="nav-link d-none" href="javascript:void(0);" title="Options" data-toggle="dropdown"><b class="text-colors-on" style="font-size:20px ;"><span class="fa fa-cloud mr-1"></span>Mice</b></a>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>

  @yield('sidebar')
  @yield('content')
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script> -->
  <script src="{{ asset('js/jquery-3-5-1.min.js') }}"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script> -->
  <script src="{{ asset('lib/jquery-loading/package/dist/loadingoverlay.min.js') }}"></script>
  <script src="{{ asset('lib/loader/custom-loader/loading-overlay.jquery.js') }}"></script>
  <script src="{{ asset('lib/popper/1.16.0/popper.min.js') }}"></script>
  <script src="{{ asset('js/bootstrap.min.js') }}"></script>
  <!-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> -->
  <script src="https://cdn.jsdelivr.net/npm/select2@4.0.3/dist/js/select2.min.js"></script>

  <!-- <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script> -->
  <!-- <script src="{{ asset('lib/jquery.inputmask/dist/jquery.inputmask.min.js') }}"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <!-- <script src="{{ asset('lib/inputmasking/jquery.inputmasking.bundle.min.js') }}"></script> -->
  <!-- <script src="{{ asset('lib/datetimepicker/temp/jquery.datetimepicker.full.js') }}"></script> -->
  <script src="{{ asset('lib/datetimepicker/temp/jquery.datetimepicker.full.js') }}"></script>
  <script src="{{ asset('lib/toastr/toastr.min.js') }}"></script>
  
  <script src="{{ asset('lib/axios/axios.min.js') }}"></script>

  <script src="{{ asset('lib/luxon/package/build/global/luxon.min.js') }}"></script>
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDXdvMmHAwmF8xHfJ1coefz9AsqMny6UfE&callback=initMap"></script>
  <script src="{{ asset('js/main.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/dashboard.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/account.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/krl_regular.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/krl_wisata.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/krl_luarbiasa.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/krl_istimewa.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/pesawat.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/hotel.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/digital_goods.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/companies.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/adminbtb.js') }}"></script>
  <script type="text/javascript" src="{{ asset('js/employer.js') }}"></script>
  <script>

  $(document).ready(function() {

    var auth = JSON.parse(localStorage.getItem('user_type'))
    var name = JSON.parse(localStorage.getItem('name_auth'))
    var pyment= JSON.parse(localStorage.getItem('product_payment'))

    if(pyment == "flight"){
      $('#flight1').removeClass('d-none')
      $('#flight2').removeClass('d-none')
      $('#flight3').removeClass('d-none')
      $('#flight4').removeClass('d-none')
      $('#payment_tiket_flight').removeClass('d-none')
    }

    if(pyment == "train_regular"){
      $('#trainreg1').removeClass('d-none')
      $('#trainreg2').removeClass('d-none')
      $('#trainreg3').removeClass('d-none')
      $('#trainreg4').removeClass('d-none')
      $('#payment_tiket_train_regular').removeClass('d-none')
    }

    if(pyment == "train_wisata"){
      $('#train_wis_klb_ist1').removeClass('d-none')
      $('#train_wis_klb_ist2').removeClass('d-none')
      $('#train_wis_klb_ist3').removeClass('d-none')
      $('#train_wis_klb_ist4').removeClass('d-none')
      $('#payment_tiket_train_wisata').removeClass('d-none')
    }

    if(pyment == "train_klb"){
      $('#train_wis_klb_ist1').removeClass('d-none')
      $('#train_wis_klb_ist2').removeClass('d-none')
      $('#train_wis_klb_ist3').removeClass('d-none')
      $('#train_wis_klb_ist4').removeClass('d-none')
      $('#payment_tiket_train_klb').removeClass('d-none')
    }

    if(pyment == "train_istimewa"){
      $('#train_wis_klb_ist1').removeClass('d-none')
      $('#train_wis_klb_ist2').removeClass('d-none')
      $('#train_wis_klb_ist3').removeClass('d-none')
      $('#train_wis_klb_ist4').removeClass('d-none')
      $('#payment_tiket_train_istimewa').removeClass('d-none')
    }

    if(pyment == "hotel"){
      $('#nav_hotel1').removeClass('d-none')
      $('#nav_hotel2').removeClass('d-none')
      $('#nav_hotel3').removeClass('d-none')
      $('#nav_hotel4').removeClass('d-none')
      $('#payment_tiket_hotel').removeClass('d-none')
    }

    if(pyment == "mice"){
      $('#nav_mice1').removeClass('d-none')
      $('#nav_mice2').removeClass('d-none')
      $('#payment_tiket_mice').removeClass('d-none')
    }

  });
  
  $('#logout').on('click', function() {
   
      localStorage.clear();
      window.location.href = "/";
      
  });

  function toListOrder(){
     
  }

  </script>
  @stack('scripts')
  
</body>

</html>