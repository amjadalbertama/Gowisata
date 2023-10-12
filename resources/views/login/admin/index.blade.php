<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Gowisata</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="website">
        <meta name="description" content="website">
        <link href="./img/favicon.png" rel="icon">
        <link href="./img/apple-touch-icon.png" rel="apple-touch-icon">
        <link rel="stylesheet" href="./lib/font-awesome/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('lib/toastr/toastr.min.css') }}">
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    </head>
    <body id="signup" class="h-100vh d-flex flex-column justify-content-between" style="background-image: linear-gradient(red, rgb(251, 140, 1)) ; background-repeat: no-repeat; background-attachment: fixed; ">
        <header id="header" class="mt-2">
        
        </header>
        <div class="container d-flex justify-content-center mt-5">
            <div class="card-body col-12 col-lg-5 max-auto shadow p-3 mb-5 bg-white" style="background-color: white ; border-radius: 5%;">
                <!-- <div class="btn-group col-12">
                    <button type="button" class="btn signup-text-input main-color" id="login_customer"><b class="text-colors-off" id="text_cus">Customer</b> </button>
                    <button type="button" class="btn signup-text-input" id="login_business"><b class="text-colors-on" id="text_bus">Business</b> </button>
                </div> -->
                <div class="col text-center">
                    <img src="{{ asset('img/gowisata.png') }}" alt="Logo" height="160" class="brand-logo ">
                </div> 
                <div class="row" id="body-sidemenu">
                    <!-- MAIN -->
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

                                <form class="form-signin needs-validation"  action="{{route('login_submit')}}" method="post" id="loginForm">
                                    @csrf()
                                    <h1 class="h6 mt-2 mb-3 font-weight-normal text-center text-uppercase mb-4" style="color:  rgb(251, 140, 1);"><b> Login Admin Gowisata</b></h1>
                                    <div class="form-group">
                                        <label for="email" style="color:  rgb(251, 140, 1);"> <b>Email:</b> </label>
                                        <input type="email" class="form-control signup-text-input" id="emailLogin" placeholder="Masukkan alamat email..." name="emailLogin" required autofocus>
                                        <div class="valid-feedback">Valid.</div>
                                        <div class="invalid-feedback">Wajib diisi.</div>
                                    </div>
                                    <div class="form-group">
                                        <label for="pass1" style="color:  rgb(251, 140, 1);"><b>Password:</b></label>
                                        <input type="password" class="form-control signup-text-input" id="passwordLogin" name="passwordLogin" placeholder="Masukkan password..." required>
                                        <div class="valid-feedback">Valid.</div>
                                        <div class="invalid-feedback">Wajib diisi.</div>
                                    </div>
                                        <input type="hidden" id="acc_type" name="acc_type" value="admin" hidden>
                                    <input type="hidden" class="form-control" id="type" placeholder="Masukkan type..." name="type" required value="web" autofocus>
                                    <button class="btn btn-block mt-4 text-uppercase signup-text-input" type="submit" style="background-image: linear-gradient(red, rgb(251, 140, 1));" id="loginGRC"><b class="text-white">LOGIN </b></button>
                                </form>

                                <!-- <div class="row mt-3">
                                    <div class="col-6 text-center">
                                    <a class="h6" type="" id="" href="" style="color:  rgb(251, 140, 1);">Lupa Password</a>
                                        
                                    </div>
                                    <div class="col-6 text-center">
                                    <a class="h6" type="" id="" href="{{ url('formregister') }}" style="color:  rgb(251, 140, 1);">Register</a>
                                      
                                    </div>
                                </div> -->
                                <div class="text-center mt-3 col-12">
                                    <p><b>Login with</b></p>
                                    <div class="row">
                                        <div class="col-6">
                                        <a href=""><img src="{{ asset('img/google.png') }}" alt="Logo" height="30" class="brand-logo" style="padding-right: 20 px"></a> 
                                        </div>
                                        <div class="col-6">
                                            <a href=""><img src="{{ asset('img/apple.jpg') }}" alt="Logo" height="40" class="brand-logo" style="padding-right: 20 px; margin-top: -6px"></a>
                                        </div>
                                    </div>
                                </div>
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
        $('#loginGRC').on('click', function(e){
            $.LoadingOverlay("show")
            toastr.options = {
                // "positions" : "center",
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
                url: "/login",
                method:'POST',
                data: $('#loginForm').serialize(),
                success: function(response) {
                    if (response.success) {
                        $.LoadingOverlay("hide")
                        toastr.success("Anda berhasil masuk", "Login")
                        localStorage.setItem("data_token", JSON.stringify(response.data))
                        localStorage.setItem("name_auth", JSON.stringify(response.user_auth))
                        localStorage.setItem("user_type", JSON.stringify(response.acc_type))
                        window.location = response.prev_url
                    } else {
                        $.LoadingOverlay("hide")
                        toastr.error(response.message, "Error Login")
                    }
                }, error: function(err) {
                    $.LoadingOverlay("hide")
                    // toastr.error(err.responseJSON.message, "Login")
                    toastr.error("Your email / password is invalid, please check again!", "Login")
                }
            })
            e.preventDefault()
        })

        $('#login_customer').on('click', function(e){
            $('#text_bus').addClass("text-colors-on")
            $('#text_bus').removeClass("text-colors-off")
            $('#text_cus').addClass("text-colors-off")
            $('#text_cus').removeClass("text-colors-on")
            $('#login_customer').addClass("main-color")
            $('#login_business').removeClass("main-color")

            $('#acc_type').val("b2c").change()
           
        })

        $('#login_business').on('click', function(e){
            $('#text_cus').addClass("text-colors-on")
            $('#text_cus').removeClass("text-colors-off")
            $('#text_bus').addClass("text-colors-off")
            $('#text_bus').removeClass("text-colors-on")
            $('#login_business').addClass("main-color")
            $('#login_customer').removeClass("main-color")

            $('#acc_type').val("b2b")
            $('#acc_type').val("b2b").change()
            
        })
    })
</script>

</html>

