@extends('layout.app')

@section('content')
<div class="container-fluid mt-100">
    <div class="row" id="body-sidemenu">
        <div id="main-content" class="col with-fixed-sidebar pt-3 pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                    <h1 class="h6 font-weight-normal text-center text-uppercase pt-3 "> <b>Add New Employee</b> </h1><br>
                        <div class="card shadow p-3 mb-5 bg-body rounded">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                         <!-- <form  class="mb-30" id="form_add_user" method="POST"> -->
                                            @csrf
                                            <fieldset id="fieldset1" class="fieldsetForm">
                                                <div class="row">
                                                    <div class="col-12 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="email">Email: <span class="text-danger">*</span></label>
                                                            <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="">
                                                            <div class="invalid-feedback-email text-colors-block"></div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="pass1">Password: <span class="text-danger">*</span></label>
                                                            <input type="password" class="form-control" id="pass1" placeholder="Password..." value="" name="password">
                                                            <div class="valid-feedback">Valid.</div>
                                                            <div class="invalid-feedback-password text-colors-block"></div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="pass2">Konfirmasi Password: <span class="text-danger">*</span></label>
                                                            <input type="password" class="form-control" id="pass2" placeholder="Repeat password..." name="password_confirmation" value="">
                                                            <div id="valid_confirm_pass2" class="valid-feedback">Valid.</div>
                                                            <div id="invalid_confirm_pass2" class="invalid-feedback"></div>
                                                        </div>
                                                    </div> <!-- .col-* -->

                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label for="name">Fullname: <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" id="name" placeholder="Full name" name="name" value="">
                                                            <div class="invalid-feedback-name text-colors-block"></div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="name">Username: <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" id="username" placeholder="username" name="username" value="">
                                                            <div class="invalid-feedback-username text-colors-block"></div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Phone: <span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control" id="phone" placeholder="82274212126" name="phone" value="">
                                                            <div class="invalid-feedback-phone text-colors-block"></div>
                                                        </div>
                                                        
                                                        <!-- <div class="form-row">
                                                            <div class="col-6">
                                                                <div class="organization" >
                                                                    
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="roles">
                                                                    <label>Companies: <span class="text-danger">*</span></label>
                                                                    <select type="text" class="form-control @error('role_id') is-invalid @enderror" id="company" name="company">
                                                                        <option value="0">Choose Company.. </option>
                                                                    </select>
                                                                    <div class="invalid-feedback">
                                                                        @error('role_id')
                                                                            {{ $message }}
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div> -->
                                                    </div> <!-- .col-* -->
                                                </div> <!-- .row -->
                                                <div class="row">
                                                    <div class="col text-center">
                                                        <hr>
                                                        <button id="addOfficeb2b" class="btn main-color text-colors-off"><i class="fa fa-user-plus mr-2"></i><b>Save</b></button>
                                                        <button type="reset" class="btn btn-light"><i class="fa fa-refresh mr-2"></i>Reset</button>
                                                        <a href="{{ route('admins')}}" class="btn btn-light"><i class="fa fa-remove mr-2"></i>Batal</a>
                                                    </div> <!-- .col-* -->
                                                </div> <!-- .row -->
                                            </fieldset>
                                        <!-- </form> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- .col-* -->
                </div><!-- .row -->
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
  
    var pass1 = $("#pass1")
    var pass2 = $("#pass2")

    pass1.on("keyup change", function(e) {
        if ($(this).val().length !== 0 && pass2.val() != $(this).val()) {
            pass2.removeClass("is-valid").addClass("is-invalid")
            $("#valid_confirm_pass2").css("display", "none").html('Password is match!')
            $("#invalid_confirm_pass2").css("display", "block").html('Password is not match!')
        } else if ($(this).val().length !== 0 && pass2.val() == $(this).val()) {
            pass2.removeClass("is-invalid").addClass("is-valid")
            $("#valid_confirm_pass2").css("display", "block").html('Password is match!')
            $("#invalid_confirm_pass2").css("display", "none").html('Password is not match!')
        }

        if ($(this).val().length === 0) {
            $(this).removeClass("is-valid").addClass("is-invalid")
            $("#invalid_confirm_pass1").css("display", "block").html('This field cannot be empty!')
        } else {
            $(this).removeClass("is-invalid").addClass("is-valid")
            $("#invalid_confirm_pass1").removeClass("text-danger").html('')
        }
    })

    pass2.on("keyup change", function(e) {
        if ($(this).val().length !== 0 && $(this).val() != pass1.val()) {
            $(this).removeClass("is-valid").addClass("is-invalid")
            $("#valid_confirm_pass2").css("display", "none").html('Password is match!')
            $("#invalid_confirm_pass2").css("display", "block").html('Password is not match!')
        } else if ($(this).val().length === 0) {
            $(this).removeClass("is-valid").addClass("is-invalid")
            $("#valid_confirm_pass2").css("display", "none").html('Password is match!')
            $("#invalid_confirm_pass2").css("display", "block").html('This field cannot be empty!')
        } else {
            $(this).removeClass("is-invalid").addClass("is-valid")
            $("#valid_confirm_pass2").css("display", "block").html('Password is match!')
            $("#invalid_confirm_pass2").css("display", "none").html('')
        }
    })


    $(document).ready(function(){
        $('#addOfficeb2b').on('click', function(e){
           
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
            var name = $('#name').val();
            var username = $('#username').val();
            var email = $('#email').val();
            var phone = $('#phone').val();
            var password = $('#pass1').val();
            var password_confirmation = $('#pass2').val();

            $.ajax({
                url: "/save/add/office",
                method:'POST',
                dataType: 'json',
                data: {
                    name_to: name,
                    username_to: username,
                    email_to: email,
                    phone_to: phone,
                    password_to: password,
                    password_confirmation_to: password_confirmation,
                },
                success: function(response) {
                    if (response.success) {

                        window.location.replace("/officers")
                        toastr.success("Add New Employee Success!")
                    } else {
                    // response.data.name}

                        if(response.data != ""| response.data != null){
                            if(response.data.name != ""| response.data.name != null){
                                $("#name").removeClass("is-valid").removeClass("border-success")
                                $("#name").addClass("is-invalid").addClass("border-danger")
                                $(".invalid-feedback-name").css("display", "block").html(response.data.name)
                            }else{
                                $("#name").removeClass("is-invalid").removeClass("border-danger")
                                $("#name").addClass("is-valid").addClass("border-success")
                                $(".invalid-feedback-name").css("display", "none") 
                            }

                        }else{
                            $("#name").removeClass("is-invalid").removeClass("border-danger")
                            $("#name").addClass("is-valid").addClass("border-success")
                            $(".invalid-feedback-name").css("display", "none") 

                        }

                        if(response.data != ""| response.data != null){
                            if(response.data.username){
                                $("#username").removeClass("is-valid").removeClass("border-success")
                                $("#username").addClass("is-invalid").addClass("border-danger")
                                $(".invalid-feedback-username").css("display", "block").html(response.data.username)
                            }else{
                                $("#username").removeClass("is-invalid").removeClass("border-danger")
                                $("#username").addClass("is-valid").addClass("border-success")
                                $(".invalid-feedback-username").css("display", "none") 
                            }
                        }else{
                            $("#username").removeClass("is-invalid").removeClass("border-danger")
                            $("#username").addClass("is-valid").addClass("border-success")
                            $(".invalid-feedback-username").css("display", "none") 
                        }

                        if(response.data != ""| response.data != null){
                            if(response.data.email != ""| response.data.email != null){
                                $("#email").removeClass("is-valid").removeClass("border-success")
                                $("#email").addClass("is-invalid").addClass("border-danger")
                                $(".invalid-feedback-email").css("display", "block").html(response.data.email)
                            }else{
                                $("#email").removeClass("is-invalid").removeClass("border-danger")
                                $("#email").addClass("is-valid").addClass("border-success")
                                $(".invalid-feedback-email").css("display", "none") 
                            }
                        }else{
                            $("#email").removeClass("is-invalid").removeClass("border-danger")
                            $("#email").addClass("is-valid").addClass("border-success")
                            $(".invalid-feedback-email").css("display", "none") 
                        }

                        if(response.data != ""| response.data != null){
                            if(response.data.phone != ""| response.data.phone != null){
                                $("#phone").removeClass("is-valid").removeClass("border-success")
                                $("#phone").addClass("is-invalid").addClass("border-danger")
                                $(".invalid-feedback-phone").css("display", "block").html(response.data.phone)
                            }else{
                                $("#phone").removeClass("is-invalid").removeClass("border-danger")
                                $("#phone").addClass("is-valid").addClass("border-success")
                                $(".invalid-feedback-phone").css("display", "none") 
                            }
                        }else{
                            $("#phone").removeClass("is-invalid").removeClass("border-danger")
                            $("#phone").addClass("is-valid").addClass("border-success")
                            $(".invalid-feedback-phone").css("display", "none")  
                        }

                        if(response.data != ""| response.data != null){
                            if(response.data.password != ""| response.data.password != null){
                                $("#pass1").removeClass("is-valid").removeClass("border-success")
                                $("#pass1").addClass("is-invalid").addClass("border-danger")
                                $(".invalid-feedback-pass1").css("display", "block").html(response.data.password)
                            }else{
                                $("#pass1").removeClass("is-invalid").removeClass("border-danger")
                                $("#pass1").addClass("is-valid").addClass("border-success")
                                $(".invalid-feedback-pass1").css("display", "none") 
                            }
                        }else{
                            $("#pass1").removeClass("is-invalid").removeClass("border-danger")
                            $("#pass1").addClass("is-valid").addClass("border-success")
                            $(".invalid-feedback-pass1").css("display", "none") 
                        }
                        

                        
                        if($('#pass2').val() == ""| $('#pass2').val() == null){
                            $("#pass2").removeClass("is-valid").removeClass("border-success")
                            $("#pass2").addClass("is-invalid").addClass("border-danger")
                            $(".invalid-feedback-pass2").css("display", "block").html('This field cannot be empty!')
                        }else{
                            $("#pass2").removeClass("is-invalid").removeClass("border-danger")
                            $("#pass2").addClass("is-valid").addClass("border-success")
                            $(".invalid-feedback-pass2").css("display", "none") 
                        }

                        // window.location.replace("/companies/form/add")
                        toastr.error(response.message, "Error Add New Employee!")
                    }
                }
            })   
        })
    })
</script>

@endpush
