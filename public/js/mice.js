function formMice(){
    $("#formOdrPesawat").empty();
    $("#formKrlWisview").empty();
    $("#formOdrHotelview").addClass('d-none')
    $("#formKrlLuarBiasaview").addClass('d-none')
    $("#formKrlIstview").addClass('d-none')

    $("#formMiceview").empty()
    $("#formMiceview").removeClass('d-none')

    $("#hotelListLocation").empty()
    $("#hotelListLocation").addClass('d-none')

    $("#formKrlReg").addClass('d-none')
    $("#formKrlRegview").empty();
    $("#formKrlRegview").addClass('d-none')
    $("#tabel_kereta_regular").empty();
    $("#train_table_data").empty();
    $("#tabel_kereta_regular").addClass('d-none')

    $("#sideKrlReg").removeClass('text-warning')
    $("#sideKrlWis").removeClass('text-warning')
    $("#sideOdrPesawat").removeClass('text-warning') 
    $("#sideKrlLuarBiasa").removeClass('text-warning')
    $("#sideKrlIstimewa").removeClass('text-warning') 
    $("#sideHotel").removeClass('text-warning')
    $("#sideMice").addClass('text-warning')
    
    $("#tabel_kereta").addClass('d-none'); 
    $("#tabel_Pesawat").addClass('d-none'); 
    $("#tabel_kereta_wisata").addClass('d-none'); 
    $("#tabel_kereta_wisata").empty();
    
    $("#sideWisata").removeClass('text-warning')
    $("#wisata_title").addClass('d-none')
    $("#wisataList").empty()
    $("#wisataList").addClass('d-none')

                var currentdate = new Date();
                var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'July', 'Augustus', 'September', 'October', 'November', 'Desember'];
                var monthName = months[currentdate.getMonth()];
                var day = currentdate.getDate();
                var year = currentdate.getFullYear();
                var day_return = currentdate.getDate()+1;
                var viewDate = day + ' ' + monthName + ' ' + year;
                var viewDateReturn = day_return  + ' ' + monthName + ' ' + year;
                var datahtml = `
                    <h1 class="h5 font-weight-normal text-center text-uppercase text-colors-on"> <b>Pesan Mice</b></h5>
                    <hr>
                    <h6><b>Detail Mice :</b></h6>
                    <div class="row">
                        <div class="form-group col-6">
                            <label>
                                Nama Tempat: <span class="text-danger">*</span>
                            </label>
                            <input class="form-control inputVal" type="text" id="name_location_mice" name="name_location_mice" value="" placeholder="Contoh : Ballroom Hotel Ambarukmo"/>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback-name_location_mice text-colors-block"></div>
                        </div>
                        <div class="form-group col-6">
                            <label>
                                Kapasitas: <span class="text-danger">*</span>
                            </label>
                            <input class="form-control inputVal" type="number" id="capacity_mice" name="capacity_mice" value="" placeholder="Contoh jumlah kapasitas: 1000"/>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback-capacity_mice text-colors-block"></div>
                        </div>
                        <div class="form-group col-6">
                            <label>
                                Kota Lokasi: <span class="text-danger">*</span>
                            </label>
                            <input class="form-control inputVal" type="text" id="location_city" name="location_city" value="" placeholder="Contoh kota lokasi: Jakarta"/>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback-location_city text-colors-block"></div>
                        </div>
                        <div class="form-group col-6">
                            <label>
                                Jenis Kegiatan: <span class="text-danger">*</span>
                            </label>
                            <select class="form-control inputVal" id="type_of_activity" name="type_of_activity">
                                <option selected value="">-- Pilih Jenis Kegiatan --</option>
                                <option value="Meeting">Meeting</option>
                                <option value="Incentive">Incentive</option>
                                <option value="Convention">Convention</option>
                                <option value="Exhibition">Exhibition</option>
                            </select>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback-type_of_activity text-colors-block"></div>
                        </div>
                        <div class="form-group col-6">
                            <label>
                                Pilih Tanggal Mulai: <span class="text-danger">*</span>
                            </label>
                            <input class="form-control inputVal" type="date" id="time_start_mice" name="time_start_mice"/>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback-time_start_mice text-colors-block"></div>
                        </div>
                        <div class="form-group col-6">
                            <label>
                                Pilih Tanggal Selesai: <span class="text-danger">*</span>
                            </label>
                            <input class="form-control inputVal" type="date" id="time_end_mice" name="time_end_mice" disabled/>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback-time_end_mice text-colors-block"></div>
                        </div>
                    </div>
                    <hr>
                    <h6><b>Data Contact :</b></h6>
                    <div class="row">
                        <div class="form-group col-6">
                            <label>
                                Nama Depan: <span class="text-danger">*</span>
                            </label>
                            <input class="form-control inputVal" type="text" id="name_first_mice" name="name_first_mice" value="" placeholder="Nama depan anda ..."/>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback-name_first_mice text-colors-block"></div>
                        </div>
                        <div class="form-group col-6">
                            <label>
                                Nama Belakang: <span class="text-danger">*</span>
                            </label>
                            <input class="form-control inputVal" type="text" id="name_last_mice" name="name_last_mice" value="" placeholder="Nama belakang anda ..."/>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback-name_last_mice text-colors-block"></div>
                        </div>
                        <div class="form-group col-6">
                            <label>
                                Email: <span class="text-danger">*</span>
                            </label>
                            <input class="form-control inputVal" type="text" id="email_mice" name="email_mice" value="" placeholder="contoh@gmail.com"/>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback-email_mice text-colors-block"></div>
                        </div>
                        <div class="form-group col-6">
                            <label>
                                No. Hp: <span class="text-danger">*</span>
                            </label>
                            <input class="form-control inputVal" type="number" id="phone_mice" name="phone_mice" value="" placeholder="08131635xxxx"/>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback-phone_mice text-colors-block"></div>
                        </div>
                        <div class="form-group col-12">
                            <label>
                                Alamat: <span class="text-danger">*</span>
                            </label>
                            <textarea class="form-control inputVal" type="text" id="address_mice" name="address_mice" value="" rows="3" placeholder="Jl Abc No.01, Kota..."></textarea>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback-address_mice text-colors-block"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                        </div>
                        <button class="btn btn-block col-3 md-auto top-100 start-50 main-color" onclick="validateMice()" style="margin-left:5%;"> <b class="text-colors-off"><i class="fa fa-shopping-cart mr-1"></i> Buat Pesanan </b></button>
                    </div>`
            $("#formMiceview" ).append(datahtml)

            $('#time_start_mice').click(function(){
                var today = new Date();
                var minDate = today.toISOString().slice(0,10);
                $('#time_start_mice').attr('min', minDate);
                $('#time_start_mice').val(minDate);

                var departDate = $('#time_start_mice').val();
                var startDate = new Date(departDate);
                startDate.setDate(startDate.getDate() + 1);
                var minEndDate = startDate.toISOString().slice(0,10);
                $('#time_end_mice').prop("disabled", false);
                $("#time_end_mice").attr("min", minEndDate);
            });
}

function validateMice(){
    $(".invalid-feedback-name_location_mice").css("display", "none")
    $(".invalid-feedback-name_last_mice").css("display", "none")
    $(".invalid-feedback-email_mice").css("display", "none")
    $(".invalid-feedback-phone_mice").css("display", "none")
    $(".invalid-feedback-address_mice").css("display", "none")
    $(".invalid-feedback-location_city").css("display", "none")
    $(".invalid-feedback-time_start_mice").css("display", "none")
    $(".invalid-feedback-time_end_mice").css("display", "none")
    $(".invalid-feedback-capacity_mice").css("display", "none")
    $(".invalid-feedback-type_of_activity").css("display", "none")
    $(".invalid-feedback-name_first_mice").css("display", "none")

    if($("#name_location_mice").val() == ""){
        $("#name_location_mice").addClass("is-invalid").addClass("border-danger")
        $(".invalid-feedback-name_location_mice").css("display", "block").html("Kolom ini tidak boleh kosong!")
    }else{
        $("#name_location_mice").removeClass("is-invalid").removeClass("border-danger")
        $(".invalid-feedback-name_location_mice").css("display", "none")
    }
    if($("#name_last_mice").val() == ""){
        $("#name_last_mice").addClass("is-invalid").addClass("border-danger")
        $(".invalid-feedback-name_last_mice").css("display", "block").html("Kolom ini tidak boleh kosong!")
    }else{
        $("#name_last_mice").removeClass("is-invalid").removeClass("border-danger")
        $(".invalid-feedback-name_last_mice").css("display", "none")
    }
    if($("#email_mice").val() == ""){
        $("#email_mice").addClass("is-invalid").addClass("border-danger")
        $(".invalid-feedback-email_mice").css("display", "block").html("Kolom ini tidak boleh kosong!")
    }else{
        $("#email_mice").removeClass("is-invalid").removeClass("border-danger")
        $(".invalid-feedback-email_mice").css("display", "none")
    }
    if($("#phone_mice").val() == ""){
        $("#phone_mice").addClass("is-invalid").addClass("border-danger")
        $(".invalid-feedback-phone_mice").css("display", "block").html("Kolom ini tidak boleh kosong!")
    }else{
        $("#phone_mice").removeClass("is-invalid").removeClass("border-danger")
        $(".invalid-feedback-phone_mice").css("display", "none")
    }
    if($("#address_mice").val() == ""){
        $("#address_mice").addClass("is-invalid").addClass("border-danger")
        $(".invalid-feedback-address_mice").css("display", "block").html("Kolom ini tidak boleh kosong!")
    }else{
        $("#address_mice").removeClass("is-invalid").removeClass("border-danger")
        $(".invalid-feedback-address_mice").css("display", "none")
    }
    if($("#location_city").val() == ""){
        $("#location_city").addClass("is-invalid").addClass("border-danger")
        $(".invalid-feedback-location_city").css("display", "block").html("Kolom ini tidak boleh kosong!")
    }else{
        $("#location_city").removeClass("is-invalid").removeClass("border-danger")
        $(".invalid-feedback-location_city").css("display", "none")
    }
    if($("#time_start_mice").val() == ""){
        $("#time_start_mice").addClass("is-invalid").addClass("border-danger")
        $(".invalid-feedback-time_start_mice").css("display", "block").html("Kolom ini tidak boleh kosong!")
    }else{
        $("#time_start_mice").removeClass("is-invalid").removeClass("border-danger")
        $(".invalid-feedback-time_start_mice").css("display", "none")
    }
    if($("#time_end_mice").val() == ""){
        $("#time_end_mice").addClass("is-invalid").addClass("border-danger")
        $(".invalid-feedback-time_end_mice").css("display", "block").html("Kolom ini tidak boleh kosong, silahkan pilih tanggal mulai dahulu!")
    }else{
        $("#time_end_mice").removeClass("is-invalid").removeClass("border-danger")
        $(".invalid-feedback-time_end_mice").css("display", "none")
    }
    if($("#capacity_mice").val() == ""){
        $("#capacity_mice").addClass("is-invalid").addClass("border-danger")
        $(".invalid-feedback-capacity_mice").css("display", "block").html("Kolom ini tidak boleh kosong!")
    }else{
        $("#capacity_mice").removeClass("is-invalid").removeClass("border-danger")
        $(".invalid-feedback-capacity_mice").css("display", "none")
    }
    if($("#type_of_activity").val() == ""){
        $("#type_of_activity").addClass("is-invalid").addClass("border-danger")
        $(".invalid-feedback-type_of_activity").css("display", "block").html("Kolom ini tidak boleh kosong!")
    }else{
        $("#type_of_activity").removeClass("is-invalid").removeClass("border-danger")
        $(".invalid-feedback-type_of_activity").css("display", "none")
    }
    if($("#name_first_mice").val() == ""){
        $("#name_first_mice").addClass("is-invalid").addClass("border-danger")
        $(".invalid-feedback-name_first_mice").css("display", "block").html("Kolom ini tidak boleh kosong!")
    }else{
        $("#name_first_mice").removeClass("is-invalid").removeClass("border-danger")
        $(".invalid-feedback-name_first_mice").css("display", "none")
    }

    if ($("#capacity_mice").val() != "" && $("#type_of_activity").val() != "" && $("#name_first_mice").val() != "" && $("#name_last_mice").val() != "" && $("#email_mice").val() != "" && $("#phone_mice").val() != "" && $("#address_mice").val() != "" && $("#location_city").val() != "" && $("#time_start_mice").val() != "" && $("#time_end_mice").val() != "" ) {
        toastr.success("Berhasil lakukan pemesanan", "Success")
        pesanMice()
    } else {
            toastr.error("Gagal lakukan pemesanan cek kembali pengisian form", "Error")
        }
}

function pesanMice(){
    $.LoadingOverlay("show")
    var token = JSON.parse(localStorage.getItem('data_token'))
    var token_set = token['access_token'];
    var url = fetch(mainurl+'mice/inquiry',{
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token_set,
        },
        body: JSON.stringify({
            "detail_contact" : {
                "first_name": $("#name_first_mice").val(),
                "last_name": $("#name_last_mice").val(),
                "email": $("#email_mice").val(),
                "phone": $("#phone_mice").val(),
                "address": $("#address_mice").val()
            },
            "detail_mice" : {
                "location_name": $("#name_location_mice").val(),
                "location_capacity": $("#capacity_mice").val(),
                "location_city": $("#location_city").val(),
                "event_type": $('#type_of_activity').find(":selected").val(),
                "reservation_date": $("#time_start_mice").val(),
                "reservation_start_time": $("#time_start_mice").val(),
                "reservation_end_time": $("#time_end_mice").val()
            }
        }),
      }).then((response) => response.json()).then((responseData) => {
        console.log(responseData)
        if(responseData.success == true){
            $.LoadingOverlay("hide")
            var datahtml = `
                <div class="modal fade sm-3" id="codeBookingModal"  data-keyboard="false" data-backdrop="static">
                    <div class="modal-dialog modal-dialog-scrollable modal-ku" style="margin-top:15%; height: 370px;"><br>
                        <div class="modal-content text-center">
                            <div style="margin-top:5%;">
                                <h4><b class="text-colors-on">Booking Success</b></h4>
                            </div>
                            <b class="text-colors-on"><i class="fa fa-check-circle fa-5x"></i></b><br><br>
                            <center><b>Pesanan Anda akan segera kami proses</b></center>
                            <center><b> mohon tunggu beberapa saat lagi</b></center>
                            <br>
                            <center><b><h6>Terimakasih!</h6></b></center>
                            <div class="footer">
                                <button type="button" id="listOrderBooking" class="btn main-color"><b class="text-colors-off"><i class="fa fa-chevron-left mr-1"></i>Kembali</b></button>
                            </div>
                        </div>
                    </div>
                </div>`
                $("#codeBooking").append(datahtml)
                $("#codeBookingModal").modal('show')

            $("#listOrderBooking").on('click', function(){
                window.location.href = "/home";
            })

        }else{
            $.LoadingOverlay("hide")
            toastr.error("Gagal melakukan pemesanan", "Error")
        }
        
    });
}