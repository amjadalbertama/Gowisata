@extends('layout.app')

@section('content')
<div class="container-fluid mt-100">
    <div class="row" id="body-sidemenu">
        <div id="main-content" class="col with-fixed-sidebar pt-3 pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                    <h1 class="h6 font-weight-normal text-center text-uppercase pt-3 "> <b>Add New Company</b> </h1><br>
                        <div class="card shadow p-3 mb-5 bg-body rounded">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <!-- <form  id="eddCompanies" class="mb-30"  method="POST"> -->
                                            @csrf
                                            <fieldset id="fieldset1" class="fieldsetForm">
                                                    <h1 class="h6 font-weight-normal text-center text-uppercase" style="color:  rgb(251, 140, 1);"> <b>Data Company</b></h1>
                                                <hr>
                                                <div class="row">
                                                    <div class="col-12 col-sm-6">
                                                        <div class="form-group">
                                                            <label for="pass1" style="color:  rgb(251, 140, 1);"> <b>Company Name : <span class="text-danger">*</span> </b> </label>
                                                            <input type="text" class="form-control signup-text-input" id="name_companies" placeholder="" value="" name="name_companies">
                                                            <!-- @error('name_companies')
                                                                <div class="invalid-feedback">{{ $message }}</div>
                                                            @enderror -->
                                                           <div class="invalid-feedback-name_companies text-colors-block"></div>
                                                           <!-- <div class="valid-feedback-name_companies text-colors-block"></div> -->
                                                        </div>
                                                        <div class="form-group">
                                                            <label style="color:  rgb(251, 140, 1);"><b>Address: <span class="text-danger">*</span></b> </label>
                                                            <textarea type="text" class="form-control signup-text-input" id="address_companies" placeholder="" rows="4" name="address_companies" value=""> </textarea>
                                                            <div class="invalid-feedback-address_companies text-colors-block"></div>
                                                        </div>
                                                        
                                                        <!-- <div class="form-group">
                                                            <label for="type">Type:<span class="text-danger">*</span></label>
                                                            <input type="text" class="form-control @error('type_companies') is-invalid @enderror" id="type_companies" placeholder="" name="type_companies" value="">
                                                            <div id="valid_confirm_pass2" class="valid-feedback">Valid.</div>
                                                            <div id="invalid_confirm_pass2" class="invalid-feedback">
                                                                @error('type_companies')
                                                                    {{ $message }}
                                                                @enderror
                                                            </div>
                                                        </div> -->

                                                    </div> <!-- .col-* -->

                                                    <div class="col-12 col-md-6">
                                                        <div class="form-group">
                                                            <label for="email" style="color:  rgb(251, 140, 1);"> <b>Office Email: <span class="text-danger">*</span></b> </label>
                                                            <input type="email" class="form-control signup-text-input" id="email_office" placeholder="" name="email_office" value="">
                                                            <!-- <div class="valid-feedback">Valid.</div> -->
                                                            <div class="invalid-feedback-email_office text-colors-block"></div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="phone" style="color:  rgb(251, 140, 1);"> <b> Office Phone:<span class="text-danger">*</span> </b> </label>
                                                            <input type="number" class="form-control signup-text-input" id="phone_office" placeholder="" name="phone_office" value="">
                                                            <!-- <div class="valid-feedback">Valid.</div> -->
                                                            <div class="invalid-feedback-phone_office text-colors-block"></div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="npwp" style="color:  rgb(251, 140, 1);"> <b>No. NPWP:<span class="text-danger">*</span></b> </label>
                                                            <input type="text" class="form-control signup-text-input" id="npwp_companies" placeholder="" name="npwp_companies" value="">
                                                            <!-- <div class="valid-feedback">Valid.</div> -->
                                                            <div class="invalid-feedback-npwp_companies text-colors-block"></div>
                                                        </div>
                                                    </div> <!-- .col-* -->
                                                </div> <!-- .row -->
                                                <br>
                                                <h1 class="h6 font-weight-normal text-center text-uppercase " style="color:  rgb(251, 140, 1);"> <b>Data User Approver</b> </h1>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="form-group col-6">
                                                            <label for="name" style="color:  rgb(251, 140, 1);"> <b>Fullname: <span class="text-danger">*</span></b> </label>
                                                            <input type="text" id="name" name="name" placeholder="Masukan username..." class="form-control signup-text-input" value="">
                                                            <div id="valid_feedback_name" class="valid-feedback">Valid.</div>
                                                            <div id="invalid_feedback_name" class="invalid-feedback-name text-colors-block"></div>
                                                        </div>  
                                                        <div class="form-group col-6">
                                                            <label for="username" style="color:  rgb(251, 140, 1);"> <b>Username: <span class="text-danger">*</span></b> </label>
                                                            <input type="text" id="username" name="username" placeholder="Masukan username..." class="form-control signup-text-input" value="" >
                                                            <div id="" class="valid-feedback">Valid.</div>
                                                            <div id="" class="invalid-feedback-username text-colors-block"></div>
                                                        </div>
                                                        <div class="form-group col-6">
                                                            <label for="name" style="color:  rgb(251, 140, 1);"> <b>Email: <span class="text-danger">*</span></b> </label>
                                                            <input type="email" id="email" name="email" placeholder="Masukan email..." class="form-control signup-text-input" value="" >
                                                            <!-- <div id="" class="valid-feedback">Valid.</div> -->
                                                            <div id="email_company" class="invalid-feedback-email text-colors-block"></div>
                                                        </div>
                                                        <div class="form-group col-6">
                                                            <label for="phone" style="color:  rgb(251, 140, 1);"> <b>Phone: <span class="text-danger">*</span></b> <div>*Isi dengan contoh format 08226372632*</div> </label>
                                                            <input type="number" id="phone" name="phone" placeholder="" class="form-control signup-text-input" value="" >
                                                            <div id="" class="valid-feedback">Valid.</div>
                                                            <div id="" class="invalid-feedback-phone text-colors-block"></div>
                                                        </div>

                                                    <div class="form-group col-6">
                                                        <label for="password" style="color:  rgb(251, 140, 1);"> <b>Password: <span class="text-danger">*</span></b></label>
                                                        <input type="password" id="pass1" name="password" placeholder="Password" class="form-control signup-text-input">
                                                        <div id="valid_confirm_pass1" class="valid-feedback text-colors-none"></div>
                                                        <div id="invalid_confirm_pass1" class="invalid-feedback text-colors-block"></div>
                                                    </div>
                                                    <div class="form-group col-6" style="color:  rgb(251, 140, 1);">
                                                        <label for="password"> <b>Confirm Password: <span class="text-danger">*</span></b></label>
                                                        <input type="password" id="pass2" name="password_confirmation" placeholder="Confirm Password" class="form-control signup-text-input">
                                                        <!-- <div id="valid_confirm_pass2" class="invalid-feedback-password_confirmation text-colors-block"></div> -->
                                                        <div id="valid_confirm_pass2" class="valid-feedback text-colors-none"></div>
                                                        <div id="invalid_confirm_pass2" class="invalid-feedback text-colors-block"></div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col text-center">
                                                        <hr>
                                                        <button class="btn main-color text-colors-off" id="addNewCompanies"><i class="fa fa-user-plus mr-2"></i><b>Save</b></button>
                                                        <button type="reset" class="btn btn-light"><i class="fa fa-refresh mr-2"></i>Reset</button>
                                                        <a href="{{ route('companies')}}" class="btn btn-light"><i class="fa fa-remove mr-2"></i>Batal</a>
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
            $("#valid_confirm_pass2 ").css("display", "none").html('Password is match!')
            $("#invalid_confirm_pass2").css("display", "block").html('Password is not match!')
        } else if ($(this).val().length !== 0 && pass2.val() == $(this).val()) {
            pass2.removeClass("is-invalid").addClass("is-valid")
            $("#valid_confirm_pass2 ").css("display", "block").html('Password is match!')
            $("#invalid_confirm_pass2").css("display", "none").html('Password is not match!')
        }

        if ($(this).val().length === 0) {
            $(this).removeClass("is-valid").addClass("is-invalid")
            $("#invalid_confirm_pass1").css("display", "block").html('This field cannot be empty!')
            // $("#valid_confirm_pass1").css("display", "none")
        } else {
            $(this).removeClass("is-invalid").addClass("is-valid")
            $("#valid_confirm_pass1").css("display", "none").html('Valid!')
            $("#invalid_confirm_pass1").css("display", "none")
        }
    })

    pass2.on("keyup change", function(e) {
        if ($(this).val().length !== 0 && $(this).val() != pass1.val()) {
            $(this).removeClass("is-valid").addClass("is-invalid")
            $("#valid_confirm_pass2 ").css("display", "none").html('Password is match!')
            $("#invalid_confirm_pass2").css("display", "block").html('Password is not match!')
        } else if ($(this).val().length === 0) {
            $(this).removeClass("is-valid").addClass("is-invalid")
            $("#valid_confirm_pass2 ").css("display", "none").html('Password is match!')
            $("#invalid_confirm_pass2").css("display", "block").html('This field cannot be empty!')
        } else {
            $(this).removeClass("is-invalid").addClass("is-valid")
            $("#valid_confirm_pass2 ").css("display", "block").html('Password is match!')
            $("#invalid_confirm_pass2").css("display", "none").html('')
        }
    })

    $(document).ready(function(){
        $('#addNewCompanies').on('click', function(e){
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

            var get_token = JSON.parse(localStorage.getItem("data_token"));
            var token_set = get_token['access_token']
            var name_company = $('#name_companies').val();
            var address_companies = $('#address_companies').val();
            var email_office = $('#email_office').val();
            var phone_office = $('#phone_office').val();
            var npwp_companies = $('#npwp_companies').val();

            var name = $('#name').val();
            var username = $('#username').val();
            var email = $('#email').val();
            var phone = $('#phone').val();
            var password = $('#pass1').val();
            var password_confirmation = $('#pass2').val();

            $.ajax({
                url: "/companies/add/save",
                method:'POST',
                dataType: 'json',
                data: {
                    get_token_to: token_set,
                    name_company_to: name_company,
                    address_companies_to: address_companies,
                    email_office_to: email_office,
                    phone_office_to: phone_office,
                    npwp_companies_to: npwp_companies,

                    name_to: name,
                    username_to: username,
                    email_to: email,
                    phone_to: phone,
                    password_to: password,
                    password_confirmation_to: password_confirmation,
                },
                success: function(response) {
                    if (response.success) {
                        window.location.replace("/companies")
                        toastr.success("Add New Company Success!")
                    } else {
                        console.log(response)
                        
                        if($('#name_companies').val() == ""| $('#name_companies').val() == null){
                            $("#name_companies").removeClass("is-valid").removeClass("border-success")
                            $("#name_companies").addClass("is-invalid").addClass("border-danger")
                            $(".invalid-feedback-name_companies").css("display", "block").html('This field cannot be empty!')
                            // $(".valid-feedback-name_companies").css("display", "none")
                        }else{
                            $("#name_companies").removeClass("is-invalid").removeClass("border-danger")
                            $("#name_companies").addClass("is-valid").addClass("border-success")
                            $(".invalid-feedback-name_companies").css("display", "none")
                            // $(".valid-feedback-name_companies").css("display", "block").html('Correct!')
                        }

                        if($('#address_companies').val().trim().length < 1 | $('#address_companies').val().trim().length == null){
                            $("#address_companies").removeClass("is-valid").removeClass("border-success")
                            $("#address_companies").addClass("is-invalid").addClass("border-danger")
                            $(".invalid-feedback-address_companies").css("display", "block").html('This field cannot be empty!')
                        }else{
                            $("#address_companies").removeClass("is-invalid").removeClass("border-danger")
                            $("#address_companies").addClass("is-valid").addClass("border-success")
                            $(".invalid-feedback-address_companies").css("display", "none")
                        }

                        if($('#email_office').val() == ""| $('#email_office').val()  == null){
                            $("#email_office").removeClass("is-valid").removeClass("border-success")
                            $("#email_office").addClass("is-invalid").addClass("border-danger")
                            $(".invalid-feedback-email_office").css("display", "block").html('This field cannot be empty!')
                        }else{
                            $("#email_office").removeClass("is-invalid").removeClass("border-danger")
                            $("#email_office").addClass("is-valid").addClass("border-success")
                            $(".invalid-feedback-email_office").css("display", "none")
                        }

                        if($('#phone_office').val() == ""| $('#phone_office').val() == null){
                            $("#phone_office").removeClass("is-valid").removeClass("border-success")
                            $("#phone_office").addClass("is-invalid").addClass("border-danger")
                            $(".invalid-feedback-phone_office").css("display", "block").html('This field cannot be empty!')
                        }else{
                            $("#phone_office").removeClass("is-invalid").removeClass("border-danger")
                            $("#phone_office").addClass("is-valid").addClass("border-success")
                            $(".invalid-feedback-phone_office").css("display", "none")  
                        }

                        if($('#npwp_companies').val() == ""| $('#npwp_companies').val() == null){
                            $("#npwp_companies").removeClass("is-valid").removeClass("border-success")
                            $("#npwp_companies").addClass("is-invalid").addClass("border-danger")
                            $(".invalid-feedback-npwp_companies").css("display", "block").html('This field cannot be empty!')
                        }else{
                            $("#npwp_companies").removeClass("is-invalid").removeClass("border-danger")
                            $("#npwp_companies").addClass("is-valid").addClass("border-success")
                            $(".invalid-feedback-npwp_companies").css("display", "none") 
                        }

 
                        if($('#pass2').val() == ""| $('#pass2').val() == null){
                            $("#pass2").removeClass("is-valid").removeClass("border-success")
                            $("#pass2").addClass("is-invalid").addClass("border-danger")
                            $("#invalid_confirm_pass2 ").css("display", "block").html('This field cannot be empty!')
                        }else{
                            $("#pass2").removeClass("is-invalid").removeClass("border-danger")
                            $("#pass2").addClass("is-valid").addClass("border-success")
                            $("#valid_confirm_pass2 ").css("display", "none") 
                        }
                        
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
                                $("#email_company").css("display", "block").html(response.data.email)
                            }else{
                                $("#email").removeClass("is-invalid").removeClass("border-danger")
                                $("#email").addClass("is-valid").addClass("border-success")
                                $("#email_company").css("display", "none") 
                            }
                        }else{
                            $("#email").removeClass("is-invalid").removeClass("border-danger")
                            $("#email").addClass("is-valid").addClass("border-success")
                            $("#email_company").css("display", "none") 
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
                                $("#invalid_confirm_pass1").css("display", "block").html(response.data.password)
                            }else{
                                
                                $("#pass1").removeClass("is-invalid").removeClass("border-danger")
                                $("#pass1").addClass("is-valid").addClass("border-success")
                                $("#valid_confirm_pass1").css("display", "none").html('Valid!') 
                            }
                        }else{
                            $("#pass1").removeClass("is-invalid").removeClass("border-danger")
                            $("#pass1").addClass("is-valid").addClass("border-success")
                            // $("#invalid_confirm_pass1").css("display", "none") 
                            $("#valid_confirm_pass1").css("display", "none").html('Valid!')
                        }

                        // if($('#password').val() == ""| $('#password').val() == null){
                        //     $("#password").removeClass("is-valid").removeClass("border-success")
                        //     $("#password").addClass("is-invalid").addClass("border-danger")
                        //     $(".invalid-feedback-password").css("display", "block").html('This field cannot be empty!')
                        // }else{
                        //     $("#password").removeClass("is-invalid").removeClass("border-danger")
                        //     $("#password").addClass("is-valid").addClass("border-success")
                        //     $(".invalid-feedback-password").css("display", "none") 
                        // }

                        // if($('#password_confirmation').val() == ""| $('#password_confirmation').val() == null){
                        //     $("#password_confirmation").removeClass("is-valid").removeClass("border-success")
                        //     $("#password_confirmation").addClass("is-invalid").addClass("border-danger")
                        //     $(".invalid-feedback-password_confirmation").css("display", "block").html('This field cannot be empty!')
                        // }else{
                        //     $("#password_confirmation").removeClass("is-invalid").removeClass("border-danger")
                        //     $("#password_confirmation").addClass("is-valid").addClass("border-success")
                        //     $(".invalid-feedback-password_confirmation").css("display", "none") 
                        // }

                        // window.location.replace("/companies/form/add")
                        toastr.error(response.message, "Error Add New Company!")
                    }
                }
            })   
        })
    })

</script>

@endpush
