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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
  <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
  <link href="{{ asset('img/gowisata.png') }}" rel="icon">
  <!-- <link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon"> -->
  <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <!-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> -->
  <link href="https://cdn.jsdelivr.net/npm/select2@4.0.3/dist/css/select2.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('lib/font-awesome/css/font-awesome.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
  <!-- <link rel="stylesheet" href="{{ asset('lib/datetimepicker/temp/jquery.datetimepicker.css') }}"> -->
  <link rel="stylesheet" href="{{ asset('lib/datetimepicker/temp/jquery.datetimepicker.css') }}">
  <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css"> -->
  <link rel="stylesheet" href="{{ asset('lib/toastr/toastr.min.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('lib/loader/custom-loader/loading-overlay.jquery.css') }}">
  <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
  
  <!-- <script src="{{ asset('js/jquery-3-5-1.min.js') }}"></script> -->
</head>

<body id="admin-page" >
  <header id="header" class="fixed-top">
    <nav class="navbar navbar-expand-lg navbar-light border-bottom py-0 shadow-sm rounded bg-white">
      <div class="container">
      <!-- <i class="fa-solid fa-shirt"></i> -->
        <a class="navbar-brand">
          <img id="logo" src="{{asset('img/gowisata.png') }}" alt="Logo" height="50" class="brand-logo mt-n1 mr-2"> 
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
          <ul class="navbar-nav w-100 my-1">
            <li class="nav-item d-none" id="dashboardAdmin">
              <a class="nav-link" title="Home" href="{{ url('dashboard') }}"><i class="fa fa-home mr-2"></i>Dashboard</a>
            </li>
            <li class="nav-item d-none" id="homeMenu">
              <a class="nav-link" title="Home" href="{{ url('home') }}"><i class="fa fa-home mr-2"></i>Home Menu</a>
            </li>
            <li class="nav-item d-none" id="myOrders">
              <a class="nav-link"  href="{{ url('listorder') }}"><i class="fa fa-list-alt mr-2"></i>Cek Order</a>
            </li>
            <li class="nav-item d-none" id="ordersB2b">
              <a class="nav-link"  href="{{ url('listorder') }}"><i class="fa fa-shopping-cart mr-2"></i>Cek Orders</a>
            </li>
            <li class="nav-item dropdown d-none" id="ordersAdmins">
              <a href="javascript:void(0);" class="nav-link dropdown-toggle" title="Risk" data-toggle="dropdown"><i class="fa fa-shopping-cart mr-2"></i>Daftar Pesanan</a>
              <div class="dropdown-menu">
              <!-- <a class="dropdown-item" href="{{ url('listorder/admin') }}" title="KAI Regular"><i class="fa fa-th-list fa-fw mr-2"></i>Semua Pesanan</a> -->
                <a class="dropdown-item" href="{{ url('listorder/kai_regular/admin') }}" title="KAI Regular"><i class="fa fa-train  fa-fw mr-2"></i>KAI Regular</a>
                <a class="dropdown-item" href="{{ url('listorder/kai_wisata/admin') }}" title="KAI Wisata"><i class="fa fa-train  fa-fw mr-2"></i>KAI Wisata</a>
                <a class="dropdown-item" href="{{ url('listorder/kai_luarbiasa/admin') }}" title="KAI Luar Biasa"><i class="fa fa-train  fa-fw mr-2"></i>KAI Luar Biasa</a>
                <a class="dropdown-item" href="{{ url('listorder/istimewa/admin') }}" title="KAI Istimewa"><i class="fa fa-train  fa-fw mr-2"></i>KAI Istimewa</a>
                <a class="dropdown-item" href="{{ url('listorder/flight/admin') }}" title="Pesawat"><i class="fa fa-plane fa-fw mr-2"></i>Pesawat</a>
                <!-- <a class="dropdown-item" href="javascript:void(0);" title="Hotel"><i class="fa fa-bed fa-fw mr-2"></i>Hotel</a> -->
                <a class="dropdown-item" href="{{ url('listorder/mice/admin') }}" title="Hotel"><i class="fa fa-cloud fa-fw mr-2"></i>Mice</a>
              </div>
            </li>
            <!-- <li class="nav-item d-none" id="ordersAdmins">
              <a class="nav-link"  href="{{ url('listorder/admin') }}"><i class="fa fa-shopping-cart mr-2"></i>Cek Orders</a>
            </li> -->
            <!-- <li class="nav-item d-none" id="roles">
              <a class="nav-link" href="{{ url('roles') }}"><i class="fa fa-table mr-2"></i>Data Role</a>
            </li> -->
            <li class="nav-item d-none" id="myOfficers">
              <a class="nav-link" href="{{ url('officers') }}"><i class="fa fa-users mr-2"></i>Data Pegawai Perusahaan</a>
            </li>
            <li class="nav-item d-none" id="adminb2b">
              <a class="nav-link" href="{{ url('admins') }}"><i class="fa fa-users mr-2"></i>Data Admin Perusahaan</a>
            </li>
            <li class="nav-item d-none" id="companies">
              <a class="nav-link" href="{{ url('companies') }}"><i class="fa fa-building  mr-2"></i>Data Companies</a>
            </li>
            <li class="nav-item d-none" id="customers">
              <a class="nav-link" href="{{ url('users') }}"><i class="fa fa-users mr-2"></i>Data Customers</a>
            </li>
            <li class="nav-item d-none" id="faq_btc">
              <a class="nav-link" href="{{ url('faq') }}"><i class="fa fa-question-circle mr-2"></i>F.A.Q</a>
            </li>
            <li class="nav-item d-none" id="faq_admin">
              <a class="nav-link" href="{{ url('faq/admin') }}"><i class="fa fa-question-circle mr-2"></i>F.A.Q</a>
            </li>
            <li class="nav-item mr-auto ">
              <a class="nav-link d-none" id="settings" title="Settings" href="{{ route('settings') }}"><i class="fa fa-cog mr-2"></i>Settings</a>
            </li>
            <li class="nav-item">
              <div class="dropdown">
                <a class="nav-link" href="javascript:void(0);" title="Options" data-toggle="dropdown" id="name_user"></a>
                <div class="dropdown-menu dropdown-menu-right">
                  <!-- <a class="dropdown-item" href="javascript:void(0);" title="Notifications">Notifications</a> -->
                  <a class="dropdown-item" href="javascript:void(0);" title="Profile">Profile</a>
                  <a id="ubah_password" class="dropdown-item" href="javascript:void(0);" title="Ubah Password">Ubah Password</a>
                  <div class="dropdown-divider"></div>
                  <button class="dropdown-item" id="logout" title="Logout">Logout</button>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
<div id="modal_ubah_password"></div>

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
  <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>
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
  <script type="text/javascript" src="{{ asset('js/mice.js') }}"></script>
 
  <script>

  $(document).ready(function() {

    var auth = localStorage.getItem('user_type')
    var name = localStorage.getItem('name_auth')
    var is_approval = localStorage.getItem('approval')

    var profile = JSON.parse(name);
    var auth_user = JSON.parse(auth);
    var this_approve = JSON.parse(is_approval);
    // var profile= json_decode(name);
    // console.log(is_approval);
    $('#name_user').append('<b class="text-colors-on"><i class="fa fa-user-circle mr-2"></i>'+ profile +'</b>')
      if(auth_user == "b2c"){
        $('#faq_btc').removeClass('d-none')
        $('#homeMenu').removeClass('d-none')
        $('#myOrders').removeClass('d-none')
        $('#nonAdmin').removeClass('d-none')
      }else if(auth_user == "b2b"){
        if(this_approve == 3){

          $('#faq_btc').removeClass('d-none')
          $('#ordersB2b').removeClass('d-none')
          $('#adminb2b').removeClass('d-none')

        }else if(this_approve == 2){

          $('#ordersB2b').removeClass('d-none')
          $('#myOfficers').removeClass('d-none')
          $('#faq_btc').removeClass('d-none')

        }else if(this_approve == 4){
          $('#homeMenu').removeClass('d-none')
          $('#myOrders').removeClass('d-none')
          $('#nonAdmin').removeClass('d-none')
          $('#faq_btc').removeClass('d-none')
        }

      }else{
        
        $('#roles').removeClass('d-none')
        // $('#adminb2b').removeClass('d-none')
        $('#dashboardAdmin').removeClass('d-none')
        $('#settings').removeClass('d-none')
        $('#ordersAdmins').removeClass('d-none')
        $('#companies').removeClass('d-none')
        $('#customers').removeClass('d-none')
        $('#isAdmin').removeClass('d-none')
        $('#faq_admin').removeClass('d-none')
        
      }
  });
  
  $('#logout').on('click', function() {
      localStorage.clear();
      window.location.href = "/";
  });

  $('#logo').on('click', function() {
    var auth_user = JSON.parse(localStorage.getItem('user_type'));
      if(auth_user != "admin"){
          window.location.href = "home";
      }
  });

  $('#ubah_password').on('click', function() {
    var datahtml = `
      <div class="modal fade sm-10" id="modalUbahPassword" data-keyboard="false" data-backdrop="static">
          <div class="modal-dialog modal-dialog-scrollable">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title text-colors-on">Form Ubah Password</h5>
                      <button type="button" class="close" data-dismiss="modal">×</button>
                  </div>
                  <div class="modal-body"> 
                      <div class="form-group">
                          <label class="">Password lama: <span class="text-danger">*</span></label>
                          <input id="passOld" type="password" class="form-control " name="passOld" placeholder="" value="" required>
                          <div class="invalid-feedback-namecont text-colors-block"></div>
                      </div>
                      <div class="form-group">
                          <label class="">Password Baru: <span class="text-danger">*</span></label>
                          <input id="pass1new" type="password" class="form-control " name="pass1new" placeholder="" value="" required>
                          <div class="invalid-feedback-namecont text-colors-block"></div>
                      </div>
                      <div class="form-group">
                          <label class="">Confirm Password Baru : <span class="text-danger">*</span></label>
                          <input id="pass2new" type="password" class="form-control " name="pass2new" placeholder="" value="" required>
                          <div class="invalid-feedback-namecont text-colors-block"></div>
                      </div>
                      <div class="modal-footer">
                          <button type="submit" onclick="sendRequestPass(); enableLoading()"class="btn text-white" style="background-image: linear-gradient(red, rgb(251, 140, 1));"><i class="fa fa-floppy-o mr-1"></i>Kirim</button>
                          <button type="button" class="btn btn-light" data-dismiss="modal"><i class="fa fa-times mr-1"></i>Cancel</button>
                      </div>
                  </div>
              </div>
          </div>
      </div>`
    $("#modal_ubah_password").append(datahtml)
    $("#modalUbahPassword").modal('show')
  });

  function sendRequestPass(){
    var old_pass = $("#passOld").val()
    var passnew = $("#pass1new").val()
    var passnew2 = $("#pass2new").val()

    var token = JSON.parse(localStorage.getItem('data_token'));
    var token_set = token['access_token'];
    var url = fetch(mainurl + 'user/changePassword',{
      method: 'POST',
      headers: {
          'Accept': 'application/json',
          'Content-Type': 'application/json',
          'Authorization': 'Bearer ' + token_set,
      },
      body: JSON.stringify({
          "old_password": old_pass,
          "password": passnew,
          "password_confirmation": passnew2,
      }),
      }).then((response) => response.json()).then((responseData) => {
          console.log(responseData)
        
          if(responseData.old_password != null || responseData.old_password != undefined){
            toastr.error(responseData.old_password, "Error")
          }

          if(responseData.password != null || responseData.password != undefined){
            toastr.error(responseData.password, "Error")
          }

          if(responseData.success == false){
            toastr.error(responseData.message, "Error")
 
          }else{
            toastr.success(responseData.message, "Success")
             $("#modalUbahPassword").modal('hide')
             $.LoadingOverlay("hide")
          }

      });
  }

  </script>
  @stack('scripts')
  
</body>

</html>
<!-- <footer id="footer" class="">
      <div class="container">
          <div class="copyright py-3 text-center text-black medium">
              &copy; <b> 2022 Created by Gowisata</b> 
          </div>
      </div>
  </footer> -->