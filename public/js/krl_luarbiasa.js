function formKrlLuarBiasa(){
    $("#formMiceview").empty()
    $("#formOdrPesawat").addClass('d-none')
    $("#formOdrHotelview").addClass('d-none')
    $("#formKrlLuarBiasaview").empty()
    $("#formKrlLuarBiasaview").removeClass('d-none')
    $("#formKrlWisview").addClass('d-none')
    $("#formKrlReg").addClass('d-none')
    $("#formKrlIstview").addClass('d-none')
    $("#formKrlRegview").addClass('d-none')
    $("#formOdrHotelview").empty()

    $("#sideWisata").removeClass('text-warning')
    $("#wisata_title").addClass('d-none')
    $("#wisataList").empty()
    $("#wisataList").addClass('d-none')
    
    $("#hotelListLocation").empty()
    $("#hotelListLocation").addClass('d-none')
    
    $("#sideMice").removeClass('text-warning');
    $("#sideKrlWis").removeClass('text-warning')
    $("#sideKrlReg").removeClass('text-warning')
    $("#sideOdrPesawat").removeClass('text-warning') 
    $("#sideKrlIstimewa").removeClass('text-warning') 
    $("#sideKrlLuarBiasa").addClass('text-warning')
    $("#sideHotel").removeClass('text-warning')

    $("#tabel_kereta_wisata").addClass('d-none');
    $("#tabel_kereta").addClass('d-none');
    $("#tabel_Pesawat").addClass('d-none'); 

    var currentDate = new Date();
    var daysToAdd = 14; // number of days to add to current date
    var newDate = new Date(currentDate.getTime() + (daysToAdd * 24 * 60 * 60 * 1000)); // calculate new date
    var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'July', 'Augustus', 'September', 'October', 'November', 'Desember'];
    var monthName = months[newDate.getMonth()];
    var day = newDate.getDate();
    var year = newDate.getFullYear();
    var viewDate = day + ' ' + monthName + ' ' + year;
    var day_return = newDate.getDate()+1;
    var viewDateReturn = day_return  + ' ' + monthName + ' ' + year;
    
                var datahtml = `
                    <h1 class="h5 font-weight-normal text-center text-uppercase text-colors-on"> <b>Pesan Kereta Luar Biasa</b> </h5>
                    <hr>
                    <div class="row col-12">
                        <div class="form-check col-2">
                            <input class="form-check-input" type="radio" name="flexRadioDefaultKlb" id="flexRadioDefaultKlb1" value="0" checked>
                            <label class="form-check-label" for="flexRadioDefaultKlb1">
                                Sekali Jalan
                            </label>
                        </div>
                        <div class="form-check col-2">
                            <input class="form-check-input" type="radio" name="flexRadioDefaultKlb" id="flexRadioDefaultKlb2" value="1">
                            <label class="form-check-label" for="flexRadioDefaultKlb2">
                                Pulang Pergi
                            </label>
                        </div>
                        <input class="form-control inputVal" id="type_trip" name="type_trip" placeholder="Asal..." value="OneWay" hidden/>
                    </div>
                    <br>
                    <div class="row">
                        <div class="form-group col-5">
                            <label> Asal: <span class="text-danger">*</span></label> 
                            <select class="js-example-basic-single js-states form-control getOrgTrainKlb" id="id_label_single1">
                            </select>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback-getOrgTrainKlb text-colors-block"></div>
                            <div class="invalid-feedback-getOrgTrainKlb-same text-colors-block"></div>
                        </div>
                        <div class="form-group col-2 text-center text-colors-on" style="margin-top: 20px;">
                            <a id="ganti_arah_klb" href="javascript:void(0);" class="text-colors-on"><i class="fa fa-exchange fa-2x"></i></a>
                        </div>
                        <div class="form-group col-5">
                            <label> Tujuan: <span class="text-danger">*</span></label> 
                            <select class="js-example-basic-single js-states form-control getDesTrainKlb" id="id_label_single1">
                            </select>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback-getDesTrainKlb text-colors-block"></div>
                            <div class="invalid-feedback-getDesTrainKlb-same text-colors-block"></div>
                        </div>
                    </div>
                    <!-- <br> -->
                    <div class="row">
                        <div class="col-3">
                            <label for="type">Tanggal Berangkat: <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" id="startDate_krl_klb" name="startDate_krl_klb" min="" placeholder="`+viewDate+`" readonly/>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback-startDate_krl_klb text-colors-block"></div>
                        </div>
                        <div class="form-group col-3">
                            <label for="type">Tanggal Pulang: <span class="text-danger">*</span></label>
                            <input class="form-control" type="text" id="endDate_krl_klb" name="endDate_krl_klb" value="" placeholder="`+viewDateReturn+`" hidden readonly/>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback-endDate_krl_klb text-colors-block"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            
                        </div>
                        <button class="btn btn-block col-3 md-auto top-100 start-50 main-color" onclick="validSchaduleKlb()" style="margin-left: 5%;"><b class="text-colors-off"><i class="fa fa-calendar mr-1"></i>Set Jadwal</b></button>
                    </div>`
            $("#formKrlLuarBiasaview").append(datahtml)

            $('#startDate_krl_ist').on('click', function(){
                $("#endDate_krl_ist").val("")
                if($(this).val() != "" || $(this).val() != null){
                    $("#startDate_krl_ist").removeClass("is-invalid").removeClass("border-danger")
                    $(".invalid-feedback-startDate_krl_ist").css("display", "none")
                }
            })

            $('#endDate_krl_ist').on('click', function(){
                if($("#startDate_krl_ist").val() == "" || $("#startDate_krl_ist").val() == null){
                    $("#startDate_krl_ist").addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-startDate_krl_ist").css("display", "block").html("Tanggal keberangkatan Harus dipilih dahulu!")
                }
            })
            
            $('#ganti_arah_klb').on('click', function(){
                var asal_option = $('.getOrgTrainKlb option');
                // console.log(asal_option)
              
                var tujuan_option = $('.getDesTrainKlb option');
                // console.log(tujuan_option)

                $('.getDesTrainKlb').empty().append(asal_option.clone());
                $('.getOrgTrainKlb').empty().append(tujuan_option.clone());
            })

            var startdt = $('#startDate_krl_klb').datetimepicker({
                format: "d F Y",
                showButtonPanel: true,
                changeMonth: true,
                changeYear: true,
                showOn: "button",
                buttonImageOnly: false,
                inline: false,
                timepicker: false,
                minDate: newDate,
                maxDate: new Date(newDate.getFullYear(), newDate.getMonth() + 3, newDate.getDate()),
                onSelectDate:function(selectedDate){
                    var minDates = new Date(selectedDate);
                    minDates.setDate(minDates.getDate());
                    $('#endDate_krl_klb').datetimepicker({
                        format: "d F Y",
                        showButtonPanel: true,
                        changeMonth: true,
                        changeYear: true,
                        showOn: "button",
                        buttonImageOnly: false,
                        inline: false,
                        timepicker: false,
                        minDate: minDates,
                        maxDate: new Date(newDate.getFullYear(), newDate.getMonth() + 3, newDate.getDate()),
                    });
                }
            });

            var token = JSON.parse(localStorage.getItem('data_token'))
            var token_set = token['access_token']
            $('.getOrgTrainKlb').select2({
                ajax: {
                  url: mainurl+ 'train/station_all_kai',
                  method: 'GET',
                  headers: {
                      'Accept': 'application/json',
                      'Content-Type': 'application/json',
                      'Authorization': 'Bearer ' + token_set,
                  },
                  delay: 250,
                  data: function (params) {
                    return {
                        per_page: 1000,
                        page: 1,
                        group_by_city: 1,
                        search: params.term
                    }
                  },
                  processResults: function (response) {
                    var max_data = response.data
                    var data_train = [];
                    var data_id = [];
                    for(var i = 0; i < max_data.length; i++ ){
                        var dataCity = [insertCity(max_data[i])]

                        var inti = {
                            "tags" : insetTags(max_data[i]),
                            "name" : insetName(max_data[i]),
                            "code" : insertCode(max_data[i])
                        }
                        data_id.push(inti)
                        var n = dataCity.concat(data_id)
                    }
                    for(var i = 0; i < n.length; i++ ){

                        if( n[i].tags == "City"){
                            var code = ""
                        }else{
                            var code = `(` +n[i].code+`)`;
                        }
                        var name_display = ``+n[i].name+` `+code+``;
                        var data_isi_hotel = {
                            "id": JSON.stringify(n[i]),
                            "text":name_display,
                        }
                        data_train.push(data_isi_hotel)
                    }
                    $('.getOrgTrainKlb').empty()
                    return {
                        results: data_train
                    };
                },
                cache :true
                }
            });

            $('.getDesTrainKlb').select2({
                ajax: {
                  url: mainurl+ 'train/station_all_kai',
                  method: 'GET',
                  headers: {
                      'Accept': 'application/json',
                      'Content-Type': 'application/json',
                      'Authorization': 'Bearer ' + token_set,
                     
                  },
                  delay: 250,
                  data: function (params) {
                    return {
                        per_page: 1000,
                        page: 1,
                        group_by_city: 1,
                        search: params.term
                    }
                  },
                  processResults: function (response) {
                    var max_data = response.data
                    var data_train = [];
                    var data_id = [];
                    for(var i = 0; i < max_data.length; i++ ){
                        var dataCity = [insertCity(max_data[i])]

                        var inti = {
                            "tags" : insetTags(max_data[i]),
                            "name" : insetName(max_data[i]),
                            "code" : insertCode(max_data[i])
                        }
                        data_id.push(inti)
                        var n = dataCity.concat(data_id)
                    }
                    for(var i = 0; i < n.length; i++ ){

                        if(n[i].tags == "City"){
                            var code = ""
                        }else{
                            var code = `(`+n[i].code+`)`;
                        }
                        var name_display = ``+n[i].name+` `+code+``;
                        var data_isi_hotel = {
                            "id": JSON.stringify(n[i]),
                            "text":name_display,
                        }
                        data_train.push(data_isi_hotel)
                    }
                    $('.getDesTrainKlb').empty()
                    return {
                        results: data_train
                    };
                },
                cache :true
                }
            });

            $('#flexRadioDefaultKlb1').on('click', function(e){
                $("#endDate_krl_klb").attr('hidden', 'hidden')
                $("#type_trip").val("OneWay")
            })

            $('#flexRadioDefaultKlb2').on('click', function(e){
                $("#endDate_krl_klb").removeAttr('hidden')
                $("#type_trip").val("RoundTrip")
            })
}

function validSchaduleKlb(){
    var kaiKlb_asal = JSON.parse($(".getOrgTrainKlb").val())
    var kaiKlb_tujuan = JSON.parse($(".getDesTrainKlb").val())
    localStorage.setItem("type_trip", JSON.stringify($("#type_trip").val()))
    $(".getOrgTrainKlb").removeClass("is-invalid").removeClass("border-danger")
    $(".invalid-feedback-getOrgTrainKlb").css("display", "none")
    $(".invalid-feedback-getOrgTrainKlb-same").css("display", "none")
    $(".getDesTrainKlb").removeClass("is-invalid").removeClass("border-danger")
    $(".invalid-feedback-getDesTrainKlb").css("display", "none")
    $(".invalid-feedback-getDesTrainKlb-same").css("display", "none")
    $("#startDate_krl_klb").removeClass("is-invalid").removeClass("border-danger")
    $(".invalid-feedback-startDate_krl_klb").css("display", "none")
    $("#endDate_krl_klb").removeClass("is-invalid").removeClass("border-danger")
    $(".invalid-feedback-endDate_krl_klb").css("display", "none")

    if($("#type_trip").val() == "OneWay"){ 
            if(kaiKlb_asal == null){
                $("#getOrgTrainKlb").addClass("is-invalid").addClass("border-danger")
                $(".invalid-feedback-getOrgTrainKlb").css("display", "block").html("Kolom ini tidak boleh kosong!")
            }else{
                $("#getOrgTrainKlb").removeClass("is-invalid").removeClass("border-danger")
                $(".invalid-feedback-getOrgTrainKlb").css("display", "none")
            }

            if(kaiKlb_tujuan == null){
                $("#getDesTrainKlb").addClass("is-invalid").addClass("border-danger")
                $(".invalid-feedback-getDesTrainKlb").css("display", "block").html("Kolom ini tidak boleh kosong!")
            }else{
                $("#getDesTrainKlb").removeClass("is-invalid").removeClass("border-danger")
                $(".invalid-feedback-getDesTrainKlb").css("display", "none")
            }

            if($("#startDate_krl_klb").val() == ""){
                $("#startDate_krl_klb").addClass("is-invalid").addClass("border-danger")
                $(".invalid-feedback-startDate_krl_klb").css("display", "block").html("Kolom ini tidak boleh kosong!")
            }else{
                $("#startDate_krl_klb").removeClass("is-invalid").removeClass("border-danger")
                $(".invalid-feedback-startDate_krl_klb").css("display", "none")
            }

            if(kaiKlb_asal != null && kaiKlb_tujuan != null){
                if(kaiKlb_asal.name == kaiKlb_tujuan.name){
                    $("#getOrgTrainKlb").addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-getOrgTrainKlb-same").css("display", "block").html("Asal dan tujuan tidak boleh sama!")
                
                    $("#getDesTrainKlb").addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-getDesTrainKlb-same").css("display", "block").html("Asal dan tujuan tidak boleh sama!")
                
                }else{
                    $("#getOrgTrainKlb").removeClass("is-invalid").removeClass("border-danger")
                    $(".invalid-feedback-getOrgTrainKlb-same").css("display", "none")
                    $("#getDesTrainKlb").removeClass("is-invalid").removeClass("border-danger")
                    $(".invalid-feedback-getDesTrainKlb-same").css("display", "none")
             
                }
            }
    
                if (kaiKlb_asal != null && kaiKlb_tujuan != null) {
                    if (kaiKlb_asal.tags != kaiKlb_tujuan.tags) {
                    $("#getOrgTrainKlb").addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-getOrgTrainKlb").css("display", "block").html("Asal dan tujuan harus antar Kota/Stasuin!")
                
                    $("#getDesTrainKlb").addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-getDesTrainKlb").css("display", "block").html("Asal dan tujuan harus antar Kota/Stasuin!")
          
                }else{
                    $("#getOrgTrainKlb").removeClass("is-invalid").removeClass("border-danger")
                    $(".invalid-feedback-getOrgTrainKlb").css("display", "none")
                    $("#getDesTrainKlb").removeClass("is-invalid").removeClass("border-danger")
                    $(".invalid-feedback-getDesTrainKlb").css("display", "none")
   
                }
            }
           
            if (kaiKlb_asal != null && kaiKlb_tujuan != null && $("#startDate_krl_klb").val() != "" && kaiKlb_asal.name != kaiKlb_tujuan.name && kaiKlb_asal.tags == kaiKlb_tujuan.tags) {
                toastr.success("Berhasil set jadwal", "Success")
                saveDataTrainKlb()
            }else{
                toastr.error("Gagal cari tiket kereta", "Error")
            }
    }else{
            
            if(kaiKlb_asal == null){
                $("#getOrgTrainKlb").addClass("is-invalid").addClass("border-danger")
                $(".invalid-feedback-getOrgTrainKlb").css("display", "block").html("Kolom ini tidak boleh kosong!")
            }else{
                $("#getOrgTrainKlb").removeClass("is-invalid").removeClass("border-danger")
                $(".invalid-feedback-getOrgTrainKlb").css("display", "none")
            }

            if(kaiKlb_tujuan == null){
                $("#getDesTrainKlb").addClass("is-invalid").addClass("border-danger")
                $(".invalid-feedback-getDesTrainKlb").css("display", "block").html("Kolom ini tidak boleh kosong!")
            }else{
                $("#getDesTrainKlb").removeClass("is-invalid").removeClass("border-danger")
                $(".invalid-feedback-getDesTrainKlb").css("display", "none")
            }

            if($("#startDate_krl_klb").val() == ""){
                $("#startDate_krl_klb").addClass("is-invalid").addClass("border-danger")
                $(".invalid-feedback-startDate_krl_klb").css("display", "block").html("Kolom ini tidak boleh kosong!")
            }else{
                $("#startDate_krl_klb").removeClass("is-invalid").removeClass("border-danger")
                $(".invalid-feedback-startDate_krl_klb").css("display", "none")
            }

            if($("#endDate_krl_klb").val() == ""){
                $("#endDate_krl_klb").addClass("is-invalid").addClass("border-danger")
                $(".invalid-feedback-endDate_krl_klb").css("display", "block").html("Kolom ini tidak boleh kosong!")
            }else{
                $("#endDate_krl_klb").removeClass("is-invalid").removeClass("border-danger")
                $(".invalid-feedback-endDate_krl_klb").css("display", "none")
            }

            if(kaiKlb_asal != null && kaiKlb_tujuan != null){
                if(kaiKlb_asal.name == kaiKlb_tujuan.name){
                    $("#getOrgTrainKlb").addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-getOrgTrainKlb-same").css("display", "block").html("Asal dan tujuan tidak boleh sama!")
                
                    $("#getDesTrainKlb").addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-getDesTrainKlb-same").css("display", "block").html("Asal dan tujuan tidak boleh sama!")
                    
                }else{
                    $("#getOrgTrainKlb").removeClass("is-invalid").removeClass("border-danger")
                    $(".invalid-feedback-getOrgTrainKlb-same").css("display", "none")
                    $("#getDesTrainKlb").removeClass("is-invalid").removeClass("border-danger")
                    $(".invalid-feedback-getDesTrainKlb-same").css("display", "none")
                 
                }
            }
    
                if (kaiKlb_asal != null && kaiKlb_tujuan != null) {
                    if (kaiKlb_asal.tags != kaiKlb_tujuan.tags) {
                    $("#getOrgTrainKlb").addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-getOrgTrainKlb").css("display", "block").html("Asal dan tujuan harus antar Kota/Stasuin!")
                
                    $("#getDesTrainKlb").addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-getDesTrainKlb").css("display", "block").html("Asal dan tujuan harus antar Kota/Stasuin!")
              
                }else{
                    $("#getOrgTrainKlb").removeClass("is-invalid").removeClass("border-danger")
                    $(".invalid-feedback-getOrgTrainKlb").css("display", "none")
                    $("#getDesTrainKlb").removeClass("is-invalid").removeClass("border-danger")
                    $(".invalid-feedback-getDesTrainKlb").css("display", "none")
                 
                }
            }
            if (kaiKlb_asal.name != kaiKlb_tujuan.name && kaiKlb_asal.tags == kaiKlb_tujuan.tags && $("#startDate_krl_klb").val() != "" && $("#endDate_krl_klb").val() != "") {
                toastr.success("Berhasil set jadwal", "Success")
                saveDataTrainKlb()
            }else{
                toastr.error("Gagal cari tiket kereta", "Error")
            }
            
    }
}

function saveDataTrainKlb(){
    var kaiKlb_asal = JSON.parse($(".getOrgTrainKlb").val())
    var kaiKlb_tujuan = JSON.parse($(".getDesTrainKlb").val())
    var depart_date = $("#startDate_krl_klb" ).val()
        var true_date = new Date(depart_date)
        var options = { year: 'numeric', month: '2-digit', day: '2-digit' };
        var dateString = true_date.toLocaleDateString('en-US', options);
        var dateStrDpart = moment(dateString).format('YYYY-MM-DD');
    
    var return_date = $("#endDate_krl_klb" ).val()
        var true_date_return = new Date(return_date)
        var options_return = { year: 'numeric', month: '2-digit', day: '2-digit' };
        var dateString_return = true_date_return.toLocaleDateString('en-US', options_return);
        var dateStrReturn = moment(dateString_return).format('YYYY-MM-DD');

    if(kaiKlb_asal.tags == "City"){
        asal_kotacity = kaiKlb_asal.name
        tujuan_kotacity = kaiKlb_tujuan.name
        var save_data_train = {
            asal: kaiKlb_asal.name,
            tujuan: kaiKlb_tujuan.name,
            tags: kaiKlb_asal.tags,
        }

        localStorage.setItem("data_train_return", JSON.stringify(save_data_train))

    }else if(kaiKlb_asal.tags == "Station"){
        asal_kotacity = kaiKlb_asal.code
        tujuan_kotacity = kaiKlb_tujuan.code
        var save_data_train = {
            asal: kaiKlb_asal.code,
            tujuan: kaiKlb_tujuan.code,
            tags: kaiKlb_asal.tags,
        }

        localStorage.setItem("data_train_return", JSON.stringify(save_data_train))
    }

    var scadule_klb = [
        {
            "org" : asal_kotacity,
            "des" : tujuan_kotacity,
            "departure" : dateStrDpart,
            "return" : dateStrReturn,
        }
    ]
    var product = "train_klb"
    localStorage.setItem("product_payment", JSON.stringify(product))
    localStorage.setItem("data_scadule_luarbiasa", JSON.stringify(scadule_klb))
    changeToListKlb()
}
function changeToListKlb(){
    window.location.href = "/kaiklb/list/wagon";
}
