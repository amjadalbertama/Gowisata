function formKrlIstimewa(){
    $("#formMiceview").empty()
    $("#formOdrPesawat").addClass('d-none')
    $("#formOdrHotelview").addClass('d-none')
    $("#formKrlIstview").empty()
    $("#formKrlIstview").removeClass('d-none')
    $("#formKrlLuarBiasaview").addClass('d-none')
    $("#formKrlWisview").addClass('d-none')
    $("#formKrlReg").addClass('d-none')
    $("#formKrlRegview").addClass('d-none')
    $("#formOdrHotelview").empty()

    $("#sideWisata").removeClass('text-warning')
    $("#wisata_title").addClass('d-none')
    $("#wisataList").empty()
    $("#wisataList").addClass('d-none')
    
    $("#hotelListLocation").empty()
    $("#hotelListLocation").addClass('d-none')
    
    $("#sideMice").removeClass('text-warning')
    $("#sideKrlWis").removeClass('text-warning')
    $("#sideKrlReg").removeClass('text-warning')
    $("#sideKrlLuarBiasa").removeClass('text-warning')
    $("#sideOdrPesawat").removeClass('text-warning') 
    $("#sideKrlIstimewa").addClass('text-warning')
    $("#sideHotel").removeClass('text-warning')

    $("#tabel_Pesawat").addClass('d-none'); 
    $("#tabel_kereta").addClass('d-none');
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
                <h1 class="h5 font-weight-normal text-center text-uppercase text-colors-on"> <b>Pesan Kereta Istimewa</b> </h5>
                <hr>
                <div class="row col-12">
                    <div class="form-check col-2">
                        <input class="form-check-input" type="radio" name="flexRadioDefaultIst" id="flexRadioDefaultIst1" value="0" checked>
                        <label class="form-check-label" for="flexRadioDefaultIst1">
                            Sekali Jalan
                        </label>
                    </div>
                    <div class="form-check col-2">
                        <input class="form-check-input" type="radio" name="flexRadioDefaultIst" id="flexRadioDefaultIst2" value="1">
                        <label class="form-check-label" for="flexRadioDefaultIst2">
                            Pulang Pergi
                        </label>
                    </div>
                    <input class="form-control inputVal" id="type_trip" name="type_trip" placeholder="Asal..." value="OneWay" hidden/>
                </div><br>
                <div class="row">
                    <div class="form-group col-5">
                        <label> Asal: <span class="text-danger">*</span></label> 
                        <select class="js-example-basic-single js-states form-control getOrgTrainIst" id="">
                        </select>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback-getOrgTrainIst text-colors-block"></div>
                        <div class="invalid-feedback-getOrgTrainIst-same text-colors-block"></div>
                    </div>
                    <div class="form-group col-2 text-center" style="margin-top: 20px;">
                    <a id="ganti_arah_ist" href="javascript:void(0);" class="text-colors-on"><i class="fa fa-exchange fa-2x"></i></a>
                    </div>
                    <div class="form-group col-5">
                        <label> Tujuan: <span class="text-danger">*</span></label> 
                        <select class="js-example-basic-single js-states form-control getDesTrainIst" id="">
                        </select>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback-getDesTrainIst text-colors-block"></div>
                        <div class="invalid-feedback-getDesTrainIst-same text-colors-block"></div>
                    </div>
                </div>
                <!-- <br> -->
                <div class="row">
                    <div class="form-group col-3">
                        <label for="type">Tanggal Berangkat: <span class="text-danger">*</span></label>
                        <input  class="form-control inputVal" type="input" id="startDate_krl_ist" name="startDate_krl_ist" value="" placeholder="`+viewDate+`" readonly/>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback-startDate_krl_ist text-colors-block"></div>
                    </div>
                    <div class="form-group col-3 ">
                        <label for="type">Tanggal Pulang: </label>
                        <input  class="form-control inputVal" type="input" id="endDate_krl_ist" name="endDate_krl_ist" value="" placeholder="`+viewDateReturn+`" readonly hidden/>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback-endDate_krl_ist text-colors-block"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        
                    </div>
                    <button class="btn btn-block col-3 md-auto top-100 start-50 main-color" onclick="validSchaduleIst()" style="margin-left:5%;"><b class="text-colors-off"><i class="fa fa-calendar mr-1"></i>Set Jadwal</b></button>
                </div>`
        $("#formKrlIstview" ).append(datahtml)  

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
             $('#ganti_arah_ist').on('click', function(){
                var asal_option = $('.getOrgTrainIst option');
                // console.log(asal_option)
              
                var tujuan_option = $('.getDesTrainIst option');
                // console.log(tujuan_option)

                $('.getDesTrainIst').empty().append(asal_option.clone());
                $('.getOrgTrainIst').empty().append(tujuan_option.clone());
            })

            var startdt = $('#startDate_krl_ist').datetimepicker({
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
                    $('#endDate_krl_ist').datetimepicker({
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
            $('.getOrgTrainIst').select2({
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
                    $('.getOrgTrainIst').empty()
                    return {
                        results: data_train
                    };
                },
                cache :true
                }
            });

            $('.getDesTrainIst').select2({
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
                    $('.getDesTrainIst').empty()
                    return {
                        results: data_train
                    };
                },
                cache :true
                }
            });

        $('#flexRadioDefaultIst1').on('click', function(e){
            $("#endDate_krl_ist").attr('hidden', 'hidden')
            $("#type_trip").val("OneWay")
        })

        $('#flexRadioDefaultIst2').on('click', function(e){
            $("#endDate_krl_ist").removeAttr('hidden')
            $("#type_trip").val("RoundTrip")
        })
}

function validSchaduleIst(){
    var kaiIst_asal = JSON.parse($(".getOrgTrainIst").val())
    var kaiIst_tujuan = JSON.parse($(".getDesTrainIst").val())
    localStorage.setItem("type_trip", JSON.stringify($("#type_trip").val()))
    $(".getOrgTrainIst").removeClass("is-invalid").removeClass("border-danger")
    $(".invalid-feedback-getOrgTrainIst").css("display", "none")
    $(".invalid-feedback-getOrgTrainIst-same").css("display", "none")
    $(".getDesTrainIst").removeClass("is-invalid").removeClass("border-danger")
    $(".invalid-feedback-getDesTrainIst").css("display", "none")
    $(".invalid-feedback-getOrgTrainIst-same").css("display", "none")
    $("#startDate_krl_ist").removeClass("is-invalid").removeClass("border-danger")
    $(".invalid-feedback-startDate_krl_ist").css("display", "none")
    $("#endDate_krl_ist").removeClass("is-invalid").removeClass("border-danger")
    $(".invalid-feedback-endDate_krl_ist").css("display", "none")

    if($("#type_trip").val() == "OneWay"){  
            if(kaiIst_asal == null){
                $("#getOrgTrainIst").addClass("is-invalid").addClass("border-danger")
                $(".invalid-feedback-getOrgTrainIst").css("display", "block").html("Kolom ini tidak boleh kosong!")
            }else{
                $("#getOrgTrainIst").removeClass("is-invalid").removeClass("border-danger")
                $(".invalid-feedback-getOrgTrainIst").css("display", "none")
            }

            if(kaiIst_tujuan == null){
                $("#getDesTrainIst").addClass("is-invalid").addClass("border-danger")
                $(".invalid-feedback-getDesTrainIst").css("display", "block").html("Kolom ini tidak boleh kosong!")
            }else{
                $("#getDesTrainIst").removeClass("is-invalid").removeClass("border-danger")
                $(".invalid-feedback-getDesTrainIst").css("display", "none")
            }

            if($("#startDate_krl_ist").val() == ""){
                $("#startDate_krl_ist").addClass("is-invalid").addClass("border-danger")
                $(".invalid-feedback-startDate_krl_ist").css("display", "block").html("Kolom ini tidak boleh kosong!")
            }else{
                $("#startDate_krl_ist").removeClass("is-invalid").removeClass("border-danger")
                $(".invalid-feedback-startDate_krl_ist").css("display", "none")
            }

            if(kaiIst_asal != null && kaiIst_tujuan != null){
                if(kaiIst_asal.name == kaiIst_tujuan.name){
                    $("#getOrgTrainIst").addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-getOrgTrainIst-same").css("display", "block").html("Asal dan tujuan tidak boleh sama!")
                
                    $("#getDesTrainIst").addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-getDesTrainIst-same").css("display", "block").html("Asal dan tujuan tidak boleh sama!")
                
                }else{
                    $("#getOrgTrainIst").removeClass("is-invalid").removeClass("border-danger")
                    $(".invalid-feedback-getOrgTrainIst-same").css("display", "none")
                    $("#getDesTrainIst").removeClass("is-invalid").removeClass("border-danger")
                    $(".invalid-feedback-getDesTrainIst-same").css("display", "none")
             
                }
    
                if(kaiIst_asal.tags != kaiIst_tujuan.tags){
                    $("#getOrgTrainIst").addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-getOrgTrainIst").css("display", "block").html("Asal dan tujuan harus antar Kota/Stasuin!")
                
                    $("#getDesTrainIst").addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-getDesTrainIst").css("display", "block").html("Asal dan tujuan harus antar Kota/Stasuin!")
          
                }else{
                    $("#getOrgTrainIst").removeClass("is-invalid").removeClass("border-danger")
                    $(".invalid-feedback-getOrgTrainIst").css("display", "none")
                    $("#getDesTrainIst").removeClass("is-invalid").removeClass("border-danger")
                    $(".invalid-feedback-getDesTrainIst").css("display", "none")
   
                }
            }
           
            if (kaiIst_asal.name != kaiIst_tujuan.name && kaiIst_asal.tags == kaiIst_tujuan.tags && kaiIst_asal != null && kaiIst_tujuan != null && $("#startDate_krl_ist").val() != "") {
                toastr.success("Berhasil set jadwal", "Success")
                saveDataTrainIst()
            }else{
                toastr.error("Gagal cari tiket kereta", "Error")
            }
    }else{

            if(kaiIst_asal == null){
                $("#getOrgTrainIst").addClass("is-invalid").addClass("border-danger")
                $(".invalid-feedback-getOrgTrainIst").css("display", "block").html("Kolom ini tidak boleh kosong!")
            }else{
                $("#getOrgTrainIst").removeClass("is-invalid").removeClass("border-danger")
                $(".invalid-feedback-getOrgTrainIst").css("display", "none")
            }

            if(kaiIst_tujuan == null){
                $("#getDesTrainIst").addClass("is-invalid").addClass("border-danger")
                $(".invalid-feedback-getDesTrainIst").css("display", "block").html("Kolom ini tidak boleh kosong!")
            }else{
                $("#getDesTrainIst").removeClass("is-invalid").removeClass("border-danger")
                $(".invalid-feedback-getDesTrainIst").css("display", "none")
            }

            if($("#startDate_krl_ist").val() == ""){
                $("#startDate_krl_ist").addClass("is-invalid").addClass("border-danger")
                $(".invalid-feedback-startDate_krl_ist").css("display", "block").html("Kolom ini tidak boleh kosong!")
            }else{
                $("#startDate_krl_ist").removeClass("is-invalid").removeClass("border-danger")
                $(".invalid-feedback-startDate_krl_ist").css("display", "none")
            }

            if($("#endDate_krl_ist").val() == ""){
                $("#endDate_krl_ist").addClass("is-invalid").addClass("border-danger")
                $(".invalid-feedback-endDate_krl_ist").css("display", "block").html("Kolom ini tidak boleh kosong!")
            }else{
                $("#endDate_krl_ist").removeClass("is-invalid").removeClass("border-danger")
                $(".invalid-feedback-endDate_krl_ist").css("display", "none")
            }

            if(kaiIst_asal != null && kaiIst_tujuan != null){
                if(kaiIst_asal.name == kaiIst_tujuan.name){
                    $("#getOrgTrainIst").addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-getOrgTrainIst-same").css("display", "block").html("Asal dan tujuan tidak boleh sama!")
                
                    $("#getDesTrainIst").addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-getDesTrainIst-same").css("display", "block").html("Asal dan tujuan tidak boleh sama!")
                    
                }else{
                    $("#getOrgTrainIst").removeClass("is-invalid").removeClass("border-danger")
                    $(".invalid-feedback-getOrgTrainIst-same").css("display", "none")
                    $("#getDesTrainIst").removeClass("is-invalid").removeClass("border-danger")
                    $(".invalid-feedback-getDesTrainIst-same").css("display", "none")
                 
                }
    
                if(kaiIst_asal.tags != kaiIst_tujuan.tags){
                    $("#getOrgTrainIst").addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-getOrgTrainIst").css("display", "block").html("Asal dan tujuan harus antar Kota/Stasuin!")
                
                    $("#getDesTrainIst").addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-getDesTrainIst").css("display", "block").html("Asal dan tujuan harus antar Kota/Stasuin!")
              
                }else{
                    $("#getOrgTrainIst").removeClass("is-invalid").removeClass("border-danger")
                    $(".invalid-feedback-getOrgTrainIst").css("display", "none")
                    $("#getDesTrainIst").removeClass("is-invalid").removeClass("border-danger")
                    $(".invalid-feedback-getDesTrainIst").css("display", "none")
                 
                }
            }

            if (kaiIst_asal.name != kaiIst_tujuan.name && kaiIst_asal.tags == kaiIst_tujuan.tags && kaiIst_asal != null && kaiIst_tujuan != null && $("#startDate_krl_ist").val() != "" && $("#endDate_krl_ist").val() != "") {
                toastr.success("Berhasil set jadwal", "Success")
                saveDataTrainIst()
            }else{
                toastr.error("Gagal cari tiket kereta", "Error")
            }
        
        } 
}


function saveDataTrainIst(){
    var kaiIst_asal = JSON.parse($(".getOrgTrainIst").val())
    var kaiIst_tujuan = JSON.parse($(".getDesTrainIst").val())

    var depart_date = $("#startDate_krl_ist" ).val()
        var true_date = new Date(depart_date)
        var options = { year: 'numeric', month: '2-digit', day: '2-digit' };
        var dateString = true_date.toLocaleDateString('en-US', options);
        var dateStrDpart = moment(dateString).format('YYYY-MM-DD');
    
    var return_date = $("#endDate_krl_ist" ).val()
        var true_date_return = new Date(return_date)
        var options_return = { year: 'numeric', month: '2-digit', day: '2-digit' };
        var dateString_return = true_date_return.toLocaleDateString('en-US', options_return);
        var dateStrReturn = moment(dateString_return).format('YYYY-MM-DD');

    if(kaiIst_asal.tags == "City"){
        asal_kotacity = kaiIst_asal.name
        tujuan_kotacity = kaiIst_tujuan.name
        var save_data_train = {
            asal: kaiIst_asal.name,
            tujuan: kaiIst_tujuan.name,
            tags: kaiIst_asal.tags,
        }

        localStorage.setItem("data_train_return", JSON.stringify(save_data_train))
    }else if(kaiIst_asal.tags == "Station"){
        asal_kotacity = kaiIst_asal.code
        tujuan_kotacity = kaiIst_tujuan.code
        var save_data_train = {
            asal: kaiIst_asal.code,
            tujuan: kaiIst_tujuan.code,
            tags: kaiIst_asal.tags,
        }
        localStorage.setItem("data_train_return", JSON.stringify(save_data_train))
    }

    var scadule_ist = [
        {
            "org" : asal_kotacity,
            "des" : tujuan_kotacity,
            "departure" : dateStrDpart,
            "return" : dateStrReturn,
        }
    ]

    var product = "train_istimewa"
    localStorage.setItem("product_payment", JSON.stringify(product))
    localStorage.setItem("data_scadule_istimewa", JSON.stringify(scadule_ist))
    changeToListKaiIstimewa()
}

function changeToListKaiIstimewa(){
    window.location.href = "/kaiist/list/wagon";
}