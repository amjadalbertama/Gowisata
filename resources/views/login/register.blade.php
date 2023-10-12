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
    <link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon">
    <link rel="preconnect" href="https://fonts.googleapis.com"><link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:wght@400;700&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="{{ asset('lib/font-awesome/css/font-awesome.min.css') }}"> -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/toastr/toastr.min.css')}}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('lib/loader/custom-loader/loading-overlay.jquery.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>
<body id="signup" class="h-100vh d-flex flex-column justify-content-between main-color" style=" height: 100%; background-repeat: no-repeat; background-attachment: fixed;">
        <header id="header" class="mt-1">
            
        </header>
    <div class="container d-flex justify-content-center mt-4">
        <div class="card-body col-12 col-lg-7 max-auto shadow p-3 mb-5 bg-white" style="background-color: white ; border-radius: 5%;">
                <div class="col text-center">
                    <img src="{{ asset('img/gowisata.png') }}" alt="Logo" height="160" class="brand-logo">
                </div> 
            <!-- MAIN -->
            <div id="main-content" class="col">
                <div class="row">
                    <div class="col-12">
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
                            @elseif(session('delete'))
                            <div class="sufee-alert alert with-close alert-success alert-dismissible fade show text-center" animation-duration="1000">
                                <span class="badge badge-pill badge-success">Success</span>
                                {{ session('delete') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            @endif
                            <h1 class="h6 mb-3 font-weight-normal text-center text-uppercase mb-4 "><b style="color:  rgb(251, 140, 1);">Register Customer</b></h1>
                                @csrf()
                                <div class="row">
                                    <div class="form-group col-6">
                                        <label for="name" style="color:  rgb(251, 140, 1);"> <b> Fullname: <span class="text-danger">*</span></b> </label>
                                        <input type="text" id="name" name="name" placeholder="" class="form-control signup-text-input" value="" required >
                                        <div class="invalid-feedback-name text-colors-block"></div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="username" style="color:  rgb(251, 140, 1);"> <b> Username: <span class="text-danger">*</span></b></label>
                                        <input type="text" id="username" name="username" placeholder="" class="form-control signup-text-input" value="" required >
                                        <div class="invalid-feedback-username text-colors-block"></div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="email" style="color:  rgb(251, 140, 1);"> <b>Email: <span class="text-danger">*</span></b></label>
                                        <input type="email" id="email" name="email" placeholder="" class="form-control signup-text-input" value="" required>
                                        <div class="invalid-feedback-email text-colors-block"></div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="phone" style="color:  rgb(251, 140, 1);"> <b>Phone: <span class="text-danger">*</span></b></label>
                                        <input type="number" id="phone" name="phone" placeholder="" class="form-control signup-text-input" value="" required >
                                        <div class="text-colors-on">Format pengisian: 62...</div>
                                        <div class="invalid-feedback-phone text-colors-block"></div>
                                    </div>

                                    <div class="form-group col-6">
                                        <label for="password"> <b class="text-colors-on">Password <span class="text-danger">*</span></b></label>
                                        <input type="password" id="pass1" name="password" placeholder="" class="form-control signup-text-input" required>
                                        <div class="valid-feedback-pass1 text-colors-none"></div>
                                        <div class="invalid-feedback-pass1 text-colors-block"></div>
                                    </div>
                                    <div class="form-group col-6">
                                        <label for="password"> <b class="text-colors-on"> Confirm Password <span class="text-danger">*</span></b></label>
                                        <input type="password" id="pass2" name="password_confirmation" placeholder="" class="form-control signup-text-input" required>
                                        <div class="valid-feedback-pass2 text-colors-none"></div>
                                        <div class="invalid-feedback-pass2 text-colors-block"></div>
                                    </div>
                                </div>
                            <div class="text-center mt-2 ">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input check_box_regis_terms" id="1" value="1" name="regis_terms_check"> 
                                    <label for="1" class="custom-control-label">
                                        <a href="" class="text-colors-on"><b>Kebijakan & Ketentuan</b></a>
                                    </label>
                                    <div class="invalid-feedback-terms text-colors-block"></div>
                                </div>
                            </div>
                                <button id="registerCusKa" type="submit" class="btn btn-block mt-4 text-uppercase signup-text-input col-5" style="background-image: linear-gradient(red, rgb(251, 140, 1)); margin-left:30%;"><b class="text-white">REGISTER </b></button>
                            <br>
                        <div class="text-center mt-2 ">
                            <a class="h6"  type="" id="" href="{{ route('login')}}" style="color:  rgb(251, 140, 1); ">Kembali ke LOGIN</a>
                        </div>
                        <div class="text-center mt-3 col-12">
                            <p><b>Register with</b></p>
                            <div class="row">
                                <div class="col-6">
                                   <a href=""><img src="{{ asset('img/google.png') }}" alt="Logo" height="30" class="brand-logo" style="padding-right: 20 px"></a> 
                                </div>
                                <div class="col-6">
                                    <a href=""><img src="{{ asset('img/apple.jpg') }}" alt="Logo" height="40" class="brand-logo" style="padding-right: 20 px; margin-top: -6px"></a>
                                </div>
                            </div>
                        </div>
                    </div> <!-- .col-* -->
                </div> <!-- .row -->
            </div><!-- #main-content -->
        </div>
    </div><!-- .container -->

    <footer id="footer" class="">
        <div class="container">
            <div class="copyright py-2 text-center text-black medium">
                &copy; <b> 2022 Created by Gowisata</b> 
            </div>
        </div>
    </footer><!-- #footer -->

    <script src="{{ asset('js/jquery-3-5-1.min.js') }}"></script>
    <script src="{{ asset('lib/jquery-loading/package/dist/loadingoverlay.min.js') }}"></script>
    <script src="{{ asset('lib/loader/custom-loader/loading-overlay.jquery.js') }}"></script>
    <script src="{{ asset('lib/popper/1.16.0/popper.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('lib/jquery.inputmask/dist/jquery.inputmask.min.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <!-- <script src="{{ asset('lib/inputmasking/jquery.inputmasking.bundle.min.js') }}"></script> -->
    <script src="{{ asset('lib/datetimepicker/temp/jquery.datetimepicker.full.js') }}"></script>
    <script src="{{ asset('lib/toastr/toastr.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>
    <!-- <script src="{{ asset('lib/chartjs/package/dist/chart.min.js') }}"></script>
    <script src="{{ asset('lib/chartjs/chartjs-plugin-datalabels-2-1-0/dist/chartjs-plugin-datalabels.min.js') }}"></script> -->
    <script src="{{ asset('lib/axios/axios.min.js') }}"></script>
    <script src="{{ asset('lib/jquery-validator/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('lib/jquery-validator/jquery-validate-additional-methods.min.js') }}"></script>
    <script src="{{ asset('lib/jquery-validator/messages_id.min.js') }}"></script>
    <script src="{{ asset('lib/luxon/package/build/global/luxon.min.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
</body>

<script>
    var pass1 = $("#pass1")
    var pass2 = $("#pass2")
    pass1.on("keyup change", function(e) {
        if ($(this).val().length !== 0 && pass2.val() != $(this).val()) {
            pass2.removeClass("is-valid").addClass("is-invalid")
            $(".valid-feedback-pass2 ").css("display", "none").html('Password is match!')
            $(".invalid-feedback-pass2").css("display", "block").html('Password is not match!')
        } else if ($(this).val().length !== 0 && pass2.val() == $(this).val()) {
            pass2.removeClass("is-invalid").addClass("is-valid")
            $(".valid-feedback-pass2").css("display", "block").html('Password is match!')
            $(".invalid-feedback-pass2").css("display", "none").html('Password is not match!')
        }

        if ($(this).val().length === 0) {
            $(this).removeClass("is-valid").addClass("is-invalid").removeClass("border-danger")
            $(".invalid-feedback-pass1").css("display", "block").html('This field cannot be empty!')
            // $("#valid-feedback-pass1").css("display", "none")
        } else {
            $(this).removeClass("is-invalid").addClass("is-valid").removeClass("border-danger")
            $(".valid-feedback-pass1").css("display", "none").html('Valid!')
            $(".invalid-feedback-pass1").css("display", "none")
        }
    })

    pass2.on("keyup change", function(e) {
        if ($(this).val().length !== 0 && $(this).val() != pass1.val()) {
            $(this).removeClass("is-valid").addClass("is-invalid")
            $(".valid-feedback-pass2 ").css("display", "none").html('Password is match!')
            $(".invalid-feedback-pass2").css("display", "block").html('Password is not match!')
        } else if ($(this).val().length === 0) {
            $(this).removeClass("is-valid").addClass("is-invalid")
            $(".valid-feedback-pass2 ").css("display", "none").html('Password is match!')
            $(".invalid-feedback-pass2").css("display", "block").html('This field cannot be empty!')
        } else {
            $(this).removeClass("is-invalid").addClass("is-valid")
            $(".valid-feedback-pass2 ").css("display", "block").html('Password is match!')
            $(".invalid-feedback-pass2").css("display", "none").html('')
        }
    })


    $(document).ready(function(){
        $('#registerCusKa').on('click', function(e){
            
            $.LoadingOverlay("show")
            toastr.options = {
              "closeButton": false,
              "debug": false,
              "newestOnTop": false,
              "progressBar": false,
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
            var terms = $("input[name='regis_terms_check']:checked").val();
            if(terms != undefined || terms != null){
                var terms_val = 1
            }else{
                var terms_val = false
            }
            // var terms = $("input[name='regis_terms_check']:checked").val();

            var name = $("#name").val();
            var username = $("#username").val();
            var email = $("#email").val();
            var phone = $("#phone").val();
            var password = $("#pass1").val();
            var password2 = $("#pass2").val();

            $.ajax({
                url: "/registerpost",
                method:"POST",
                data: {
                    reg_name: name,
                    reg_email: email,
                    reg_username: username,
                    reg_phone: phone,
                    reg_password: password,
                    reg_password2: password2,
                    reg_terms: terms_val,
                },
                dataType: 'json',
                success: function(response) {
                    if (response.success == true) {
                        $.LoadingOverlay("hide")
                        toastr.success("Success")
                        window.location = response.prev_url
                    } else {
                        $.LoadingOverlay("hide")
                        toastr.error(response.message, "Error")
                        // console.log(response.data.name)
                        if(response.data != ""|| response.data != null){
                            if(response.data.name != undefined){
                                $("#name").removeClass("is-valid").removeClass("border-success")
                                $("#name").addClass("is-invalid").addClass("border-danger")
                                $(".invalid-feedback-name").css("display", "block").html(response.data.name)
                            }else if(response.data.name == undefined){
                                $("#name").removeClass("is-invalid").removeClass("border-danger")
                                $("#name").addClass("is-valid").addClass("border-success")
                                $(".invalid-feedback-name").css("display", "none") 
                            }

                        }else{
                            $("#name").removeClass("is-invalid").removeClass("border-danger")
                            $("#name").addClass("is-valid").addClass("border-success")
                        }

                        if(response.data != ""|| response.data != null){
                            if(response.data.username != undefined){
                                $("#username").removeClass("is-valid").removeClass("border-success")
                                $("#username").addClass("is-invalid").addClass("border-danger")
                                $(".invalid-feedback-username").css("display", "block").html(response.data.username)
                            }else if(response.data.username == undefined){
                                $("#username").removeClass("is-invalid").removeClass("border-danger")
                                $("#username").addClass("is-valid").addClass("border-success")
                                $(".invalid-feedback-username").css("display", "none") 
                            }
                        }else{
                            $("#username").removeClass("is-invalid").removeClass("border-danger")
                            $("#username").addClass("is-valid").addClass("border-success")
                        }

                        if(response.data != ""|| response.data != null){
                            if(response.data.email != undefined){
                                $("#email").removeClass("is-valid").removeClass("border-success")
                                $("#email").addClass("is-invalid").addClass("border-danger")
                                $(".invalid-feedback-email").css("display", "block").html(response.data.email)
                            }else if(response.data.email == undefined){
                                $("#email").removeClass("is-invalid").removeClass("border-danger")
                                $("#email").addClass("is-valid").addClass("border-success")
                                $(".invalid-feedback-email").css("display", "none") 
                            }
                        }else{
                            $("#email").removeClass("is-invalid").removeClass("border-danger")
                            $("#email").addClass("is-valid").addClass("border-success")
                        }

                        if(response.data != ""|| response.data != null){
                            if(response.data.phone != undefined){
                                $("#phone").removeClass("is-valid").removeClass("border-success")
                                $("#phone").addClass("is-invalid").addClass("border-danger")
                                $(".invalid-feedback-phone").css("display", "block").html(response.data.phone)
                            }else if(response.data.phone == undefined){
                                $("#phone").removeClass("is-invalid").removeClass("border-danger")
                                $("#phone").addClass("is-valid").addClass("border-success")
                                $(".invalid-feedback-phone").css("display", "none") 
                            }
                        }else{
                            $("#phone").removeClass("is-invalid").removeClass("border-danger")
                            $("#phone").addClass("is-valid").addClass("border-success")
                        }

                        if(response.data != ""|| response.data != null){
                            if(response.data.password != undefined){
                                $("#pass1").removeClass("is-valid").removeClass("border-success")
                                $("#pass1").addClass("is-invalid").addClass("border-danger")
                                $(".invalid-feedback-pass1").css("display", "block").html(response.data.password)
                            }else if(response.data.password == undefined){
                                $("#pass1").removeClass("is-invalid").removeClass("border-danger")
                                $("#pass1").addClass("is-valid").addClass("border-success")
                                $(".invalid-feedback-pass1").css("display", "none")
                            }
                        }else{
                            $("#pass1").removeClass("is-invalid").removeClass("border-danger")
                            $("#pass1").addClass("is-valid").addClass("border-success")
                        }

                        if(response.data != ""|| response.data != null){
                            if(response.data.terms_n_cons_agreement != undefined){
                                $(".invalid-feedback-terms").css("display", "block").html("The checkbox field is required!")
                            }else if(response.data.terms_n_cons_agreement == undefined){
                                $(".invalid-feedback-terms").css("display", "none") 
                            }
                        }else{
                            $(".invalid-feedback-terms").css("display", "none")  
                        }
                    }
                }
            })
        })
    })
</script>

</html>