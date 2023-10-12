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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" />
        <link rel="stylesheet" href="{{ asset('lib/toastr/toastr.min.css') }}">
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    </head>
    <body id="signup" class="h-100vh d-flex flex-column justify-content-between" style="background-image: linear-gradient(red, rgb(251, 140, 1)) ; height: 100%; background-repeat: no-repeat; background-attachment: fixed; ">
        <header id="header" class="mt-2">
        
        </header>
        <div class="container d-flex justify-content-center mt-5">
            <div class="card-body col-12 col-lg-5 max-auto shadow p-3 mb-5 bg-white" style="background-color: white ; border-radius: 5%;">
                <div class="btn-group col">
                    <button type="button" class="btn signup-text-input main-color" id="login_customer"><b class="text-colors-off" id="text_cus">Personal</b></button>
                    <button type="button" class="btn signup-text-input" id="login_business"><b class="text-colors-on" id="text_bus">Business</b> </button>
                </div>
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
                                    <h1 class="h6 mt-2 mb-3 font-weight-normal text-center text-uppercase mb-4" style="color:  rgb(251, 140, 1);"><b> Login Gowisata</b></h1>
                                    <div class="form-group">
                                        <label for="email" style="color:  rgb(251, 140, 1);"> <b>Email:</b> </label>
                                        <input type="email" class="form-control signup-text-input" id="emailLogin" placeholder="Masukkan alamat email..." name="emailLogin" required autofocus>
                                        <div class="valid-feedback">Valid.</div>
                                        <div class="invalid-feedback">Wajib diisi.</div>
                                    </div>
                                    <div class="form-group password-input-container">
                                        <label for="pass1" style="color: rgb(251, 140, 1);"><b>Password:</b></label>
                                        <div class="password-input-wrapper">
                                            <input type="password" class="form-control signup-text-input" id="passwordLogin" name="passwordLogin" placeholder="Masukkan password..." required>
                                            <i class="fas fa-eye toggle-password"></i>
                                        </div>
                                        <div class="valid-feedback">Valid.</div>
                                        <div class="invalid-feedback">Wajib diisi.</div>
                                    </div>
                                    <input type="hidden" id="acc_type" name="acc_type" value="b2c" hidden>
                                    <input type="hidden" class="form-control" id="type" placeholder="Masukkan type..." name="type" required value="web" autofocus>
                                    <button class="btn btn-block mt-4 text-uppercase signup-text-input" type="submit" style="background-image: linear-gradient(red, rgb(251, 140, 1));" id="loginGowisata"><b class="text-white">LOGIN </b></button>
                                </form>

                                <div class="row mt-3">
                                    <div class="col-6 text-center">
                                        <a class="h6" type="" id="" href="javascript:void(0);" onclick="lupaPassword()" style="color:  rgb(251, 140, 1);">Lupa Password</a>
                                    </div>
                                    <div class="col-6 text-center">
                                        <a class="h6" type="" id="" href="{{ url('formregister') }}" style="color:  rgb(251, 140, 1);">Register</a>
                                    </div>
                                </div>
                                <div class="text-center mt-3 col-12">
                                    <p><b>Login with</b></p>
                                    <div class="row">
                                        <div class="col-6">
                                        <a href="javascript:void(0);" onclick="loginGoogle()"><img src="{{ asset('img/google.png') }}" alt="Logo" height="30" class="brand-logo" style="padding-right: 20 px"></a> 
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
            <div id="loginGoogleModal"></div>
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
        $('#loginGowisata').on('click', function(e){
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
                url: "/login",
                method:'POST',
                data:$('#loginForm').serialize(),
                success: function(response) {
                    if (response.success) {
                        if(response.is_approval != null){
                            localStorage.setItem("approval", JSON.stringify(response.is_approval))
                        }
                        localStorage.setItem("user_email", JSON.stringify(response.user_email))
                        localStorage.setItem("user_phone", JSON.stringify(response.user_phone))
                        localStorage.setItem("data_token", JSON.stringify(response.data))
                        localStorage.setItem("name_auth", JSON.stringify(response.user_auth))
                        localStorage.setItem("user_type", JSON.stringify(response.acc_type))
                        localStorage.setItem("company_id", JSON.stringify(response.company_id))
                        window.location = response.prev_url
                        $.LoadingOverlay("hide")
                        toastr.success("Anda berhasil masuk", "Login")
                    } else {
                        $.LoadingOverlay("hide")
                        toastr.error(response.message, "Gagal Login")
                    }
                }, error: function(err) {
                    $.LoadingOverlay("hide")
                    // toastr.error(err.responseJSON.message, "Login")
                    toastr.error("Email/Password anda tidak benar, silakan cek kembali!", "Gagal Login")
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
            $('#acc_type').val("b2b").change()

        })
    })

    $('.toggle-password').click(function(){
        var passwordField = $('#passwordLogin');
        var passwordFieldType = passwordField.attr('type');
        if(passwordFieldType == 'password') {
        passwordField.attr('type', 'text');
        $(this).removeClass('fa-eye').addClass('fa-eye-slash');
        } else {
        passwordField.attr('type', 'password');
        $(this).removeClass('fa-eye-slash').addClass('fa-eye');
        }
    });

    function loginGoogle(){
        $.LoadingOverlay("hide")
        window.location.href = "https://jakarta.wednesday.my.id/api/user/login/google";
        const url = new URL(window.location.href);
        const params = new URLSearchParams(url.search);
        const token = params.get('token');

        localStorage.setItem('token', token);
        fetch(window.location.href)
            .then(response => response.text())
            .then(data => {
                console.log(data)
                localStorage.setItem('tes', data)
                // window.location.replace("/home");
                // simpan data di variabel atau lakukan sesuatu dengan data
        }).catch(error => console.log(error))

        // var n = window.location.href
        // var url = fetch('https://api-gowisata.aturtoko.site/api/user/login/google',{
        // method: 'POST',
        // headers: {
        //     'Accept': 'application/json',
        //     'Content-Type': 'application/json',
        // },
        // }).then((response) => response.json()).then((responseData) => {
        //     console.log(responseData)

            // var datahtml =`
            //     <div class="modal fade sm-5" id="googleLoginGo" data-keyboard="false" data-backdrop="static">
            //     <div class="modal-dialog modal-dialog-scrollable">
            //             <div class="modal-content">
            //                 <div class="modal-header">
            //                     <h5 class="modal-title text-colors-on">Add New Contact</h5>
            //                     <button type="button" class="close" data-dismiss="modal">×</button>
            //                 </div>
            //                 <div class="form-group">
            //                     <label class="">Name: <span class="text-danger">*</span></label>
            //                     <input id="namecont" type="text" class="form-control " name="namecont" placeholder="contact name" value="" required>
            //                     <div class="invalid-feedback-namecont text-colors-block"></div>
            //                 </div>
            //                 <div class="modal-footer">
            //                     <button type="submit" onclick="saveContactKaiwis(); enableLoading()"class="btn text-white" style="background-image: linear-gradient(red, rgb(251, 140, 1));"><i class="fa fa-floppy-o mr-1"></i>Save</button>
            //                     <button type="button" class="btn btn-light" data-dismiss="modal"><i class="fa fa-times mr-1"></i>Cancel</button>
            //                 </div>
            //             </div>
            //         </div>
            //     </div>`
            // $("#loginGoogleModal").append(datahtml)
            // $("#googleLoginGo").modal('show')
        // });
    }

    function lupaPassword(){
        var datahtml = `
            <div class="modal fade sm-10" id="googleLoginGo" data-keyboard="false" data-backdrop="static">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-colors-on">Kirim Email</h5>
                            <button type="button" class="close" data-dismiss="modal">×</button>
                        </div>
                        <div class="modal-body"> 
                            <div class="form-group">
                                <label class="">Email: <span class="text-danger">*</span></label>
                                <input id="email_f_pass" type="email" class="form-control " name="email_f_pass" placeholder="" value="" required>
                                <div class="invalid-feedback-namecont text-colors-block"></div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" onclick="sendEmail(); enableLoading()"class="btn text-white" style="background-image: linear-gradient(red, rgb(251, 140, 1));"><i class="fa fa-floppy-o mr-1"></i>Kirim</button>
                                <button type="button" class="btn btn-light" data-dismiss="modal"><i class="fa fa-times mr-1"></i>Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>`
            $("#loginGoogleModal").append(datahtml)
            $("#googleLoginGo").modal('show')
    }

    function sendEmail(){
        var d_email = $("#email_f_pass").val()
        var url = fetch(mainurl+'user/password/email',{
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({
            "email": d_email,
        }),
        }).then((response) => response.json()).then((responseData) => {
            console.log(responseData)
            toastr.success("Berhasil kirim request ke Email", "Success")
            $.LoadingOverlay("hide")
        });
    }

</script>

</html>

