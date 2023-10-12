<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Gowisata</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="website">
        <meta name="description" content="website">
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
        <link href="./img/gowisata.png" rel="icon">
        <link href="./img/apple-touch-icon.png" rel="apple-touch-icon">
        <link rel="stylesheet" href="./lib/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('lib/toastr/toastr.min.css') }}">
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    </head>
    <body id="signup" class="h-100vh d-flex flex-column justify-content-between" style="background-image: linear-gradient(red, rgb(251, 140, 1)) ; height: 100%; background-repeat: no-repeat; background-attachment: fixed; ">
        <header id="header" class="mt-2">
        
        </header>
        <div class="container d-flex justify-content-center mt-5">
            <div class="card-body col-5 shadow p-3 mb-5 bg-white" style="background-color: white ; border-radius: 5%;">
                <div class="col text-center">
                    <img src="{{ asset('img/gowisata.png') }}" alt="Logo" height="160" class="brand-logo ">
                </div> 
                <div class="row" id="body-sidemenu">

                    <div id="main-content" class="col">
                        <div class="row d-flex justify-content-center">
                            <div class="col-11">
                                    @if(session('register_btc'))
                                    <div class="sufee-alert alert with-close alert-success alert-dismissible fade show text-center" :animation-duration="1000">
                                        <span class="badge badge-pill badge-success">Success</span>
                                        {{ session('register_btc') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @elseif(session('fail'))
                                    <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show text-center">
                                        <span class="badge badge-pill badge-danger">Failed</span>
                                        {{ session('fail') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    @endif

                                <form class="form-signin needs-validation"  action="{{route('login_submit')}}" method="post" id="change_password">
                                    @csrf()
                                    <h1 class="h6 mt-2 mb-3 font-weight-normal text-center text-uppercase mb-4" style="color:  rgb(251, 140, 1);"><b> Lupa Password</b></h1>
                                    <div class="form-group">
                                        <label for="passOld" style="color:  rgb(251, 140, 1);"><b>Password Lama:</b></label>
                                        <input type="password" class="form-control signup-text-input" id="password_old" name="password_old" placeholder="Masukkan password lama" required>
                                        <div class="valid-feedback">Valid.</div>
                                        <div class="invalid-feedback">Wajib diisi.</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="pass1" style="color:  rgb(251, 140, 1);"><b>Password Baru:</b></label>
                                        <input type="password" class="form-control signup-text-input" id="password_new" name="password_new" placeholder="Masukkan password baru" required>
                                        <div class="valid-feedback">Valid.</div>
                                        <div class="invalid-feedback">Wajib diisi.</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="pass2" style="color:  rgb(251, 140, 1);"><b>Confirm Password Baru:</b></label>
                                        <input type="password" class="form-control signup-text-input" id="password_new_confirm" name="password_new_confirm" placeholder="Masukkan password baru" required>
                                        <div class="valid-feedback">Valid.</div>
                                        <div class="invalid-feedback">Wajib diisi.</div>
                                    </div>
                                    <button class="btn btn-block mt-4 text-uppercase signup-text-input" type="submit" style="background-image: linear-gradient(red, rgb(251, 140, 1));" id="gantiPassGoWisata"><b class="text-white">Ganti Password </b></button>
                                </form>
                            </div>
                            <!-- .col-* -->
                        </div>
                        <!-- .row -->
                    </div>
                </div>
                <!-- #main-content -->
            </div>
            <!-- .row -->
        </div>

        <!-- .container -->
        <footer id="footer" class="">
            <div class="container">
                <div class="copyright py-3 text-center text-black medium">
                    &copy; <b> 2022 Created by Gowisata</b> 
                </div>
            </div>
        </footer>
        <!-- #footer -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script src="{{ asset('lib/jquery-loading/package/dist/loadingoverlay.min.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="{{ asset('lib/toastr/toastr.min.js') }}"></script>
        <script src="{{ asset('./js/main.js') }}"></script>

    </body>

<script>
    $(document).ready(function(){
        $('#gantiPassGoWisata').on('click', function(e){
            $.LoadingOverlay("show")
            toastr.options = {
              "closeButton": false,
              "debug": false,
              "newestOnTop": false,
              "progressBar": true,
              "positionClass": "toast-top-center",
              "preventDuplicates": false,
              "onclick": null,
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            }
            $.ajax({
                url: "/change/password",
                method:'POST',
                data:$('#change_password').serialize(),
                success: function(response) {
                    if (response.success) {

                        if(response.is_approval != null){

                        window.location = response.prev_url

                        $.LoadingOverlay("hide")
                        toastr.success("Anda berhasil Ubanh Password", "Ubah Password")
                        }
                    } else {

                        $.LoadingOverlay("hide")
                        toastr.error(response.message, "Gagal Ubah Password")
                    }
                }, error: function(err) {
                    
                    $.LoadingOverlay("hide")
                    toastr.error("Data Error, silakan cek kembali!", "Gagal Ubah Password")
                }
            })
            e.preventDefault()
        })
    })

</script>

</html>

