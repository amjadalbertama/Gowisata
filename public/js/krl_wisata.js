function formKrlWisata(){
    $("#formOdrPesawat").empty();
    $("#formKrlRegview").empty();
    $("#formOdrHotelview").addClass('d-none');
    $("#formKrlWisview").empty();
    $("#formKrlWisview").removeClass('d-none');
    $("#formKrlLuarBiasaview").addClass('d-none');
    $("#formKrlIstview").addClass('d-none');
    $("#formKrlReg").empty();
    $("#formKrlRegview").empty();
    $("#formOdrHotelview").empty()

    $("#sideMice").removeClass('text-warning');
    $("#sideKrlWis").addClass('text-warning'); 
    $("#sideKrlReg").removeClass('text-warning'); 
    $("#sideOdrPesawat").removeClass('text-warning'); 
    $("#sideKrlLuarBiasa").removeClass('text-warning'); 
    $("#sideKrlIstimewa").removeClass('text-warning'); 
    $("#sideHotel").removeClass('text-warning');
    $("#sideMice").removeClass('text-warning') 

    $("#formMiceview").empty()
    $("#tabel_Pesawat").addClass('d-none'); 
    $("#tabel_kereta").addClass('d-none'); 
    $("#tabel_kereta_regular").addClass('d-none'); 
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
                    <h1 class="h5 font-weight-normal text-center text-uppercase text-colors-on"> <b>Cari Jadwal TIket Kereta Wisata</b> </h5>
                    <hr>
                    <div class="row col-12">
                        <div class="form-check col-2">
                            <input class="form-check-input" type="radio" name="flexRadioDefaultWis" id="flexRadioDefaultWis1" value="0" checked>
                            <label class="form-check-label" for="flexRadioDefaultWis1">
                                Sekali Jalan
                            </label>
                        </div>
                        <div class="form-check col-2">
                            <input class="form-check-input" type="radio" name="flexRadioDefaultWis" id="flexRadioDefaultWis2" value="1">
                            <label class="form-check-label" for="flexRadioDefaultWis2">
                                Pulang Pergi
                            </label>
                        </div>
                        <input class="form-control inputVal" id="type_trip" name="type_trip" placeholder="Asal..." value="OneWay" hidden/>
                    </div>
                    <br>
                    <div class="row">
                        <div class="form-group col-5">
                            <label> Asal: </label> 
                            <select class="js-example-basic-single js-states form-control asalKrlWis" id="id_label_single1">
                            </select>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback-asalKrlWis text-colors-block"></div>
                            <div class="invalid-feedback-asalKrlWis-same text-colors-block"></div>
                        </div>
                        <div class="form-group col-2 text-center" style="margin-top: 20px;">
                            <a id="ubah_arah_wis" href="javascript:void(0);" class="text-colors-on"><i class="fa fa-exchange fa-2x"></i></a>
                        </div>
                        <div class="form-group col-5">
                            <label> Tujuan: </label> 
                            <select class="js-example-basic-single js-states form-control tujuanKrlWis" id="id_label_single1">
                            </select>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback-tujuanKrlWis text-colors-block"></div>
                            <div class="invalid-feedback-tujuanKrlWis-same text-colors-block"></div>
                        </div>
                    </div>
                    <!-- <br> -->
                    <div class="row">
                        <div class="form-group col-3">
                            <label for="type">Tanggal Berangkat: <span class="text-danger">*</span></label>
                            <input  class="form-control inputVal" type="text" id="startDate_krl_wis" name="startDate_krl_wis" value="" placeholder="`+viewDate+`" readonly/>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback-startDate_krl_wis text-colors-block"></div>
                        </div>
                        <div class="form-group col-3">
                            <label for="type">Tanggal Pulang: </label>
                            <input  class="form-control inputVal" type="text" id="endDate_krl_wis" name="endDate_krl_wis" value="" hidden placeholder="`+viewDateReturn+`" readonly/>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback-endDate_krl_wis text-colors-block"></div>
                        </div>
                        <div class="form-group col-4" hidden>
                            <label for="type">Dewasa: </label>
                            <input  class="form-control inputVal" type="number" id="adult_krl_wis" name="adult_krl_wis" value="1" />
                            <div class="valid-feedback">Usia 3+</div>
                            <div class="invalid-feedback-adult text-colors-block"></div>
                        </div>
                        <div class="form-group col-4" hidden>
                            <label for="type">Bayi: </label>
                            <input  class="form-control inputVal" type="number" id="infant_krl_wis" name="infant_krl_wis" value="0" />
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback-infant text-colors-block"></div>
                        </div>
                    </div>
                        <div class="row">
                            <div class="col-5">
                                
                            </div>
                            <button class="btn btn-block col-3 md-auto top-100 start-50 main-color" onclick="validationKaiWisSchedule()" style="margin-left: -4%;"><b class="text-colors-off"><i class="fa fa-search mr-1"></i> Cari Jadwal </b></button>
                        </div> `
            $("#formKrlWisview").append(datahtml)

            $('#ubah_arah_wis').on('click', function(){
                var asal_option = $('.asalKrlWis option');
                // console.log(asal_option)
              
                var tujuan_option = $('.tujuanKrlWis option');
                // console.log(tujuan_option)

                $('.tujuanKrlWis').empty().append(asal_option.clone());
                $('.asalKrlWis').empty().append(tujuan_option.clone());
            })

            var token = JSON.parse(localStorage.getItem('data_token'))
            var token_set = token['access_token']
            $('.asalKrlWis').select2({
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
                    $('.asalKrlWis').empty()
                    return {
                        results: data_train
                    };
                },
                cache :true
                }
            });

            $('.tujuanKrlWis').select2({
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
                    $('.tujuanKrlWis').empty()
                    return {
                        results: data_train
                    };
                },
                cache :true
                }
            });

            var startdt = $('#startDate_krl_wis').datetimepicker({
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
                    $('#endDate_krl_wis').datetimepicker({
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

            $('#flexRadioDefaultWis1').on('click', function(e){
                $("#endDate_krl_wis").attr('hidden', 'hidden')
                $("#type_trip").val("OneWay")

            })

            $('#flexRadioDefaultWis2').on('click', function(e){
                $("#endDate_krl_wis").removeAttr('hidden')
                $("#type_trip").val("RoundTrip")
        
            })

            $('#startDate_krl_wis').on('click', function(){
                $("#endDate_krl_wis").val("")
                if($(this).val() != "" || $(this).val() != null){
                    $("#startDate_krl_wis").removeClass("is-invalid").removeClass("border-danger")
                    $(".invalid-feedback-startDate_krl_wis").css("display", "none")
                }
            })

            $('#endDate_krl_wis').on('click', function(){
                if($("#startDate_krl_wis").val() == "" || $("#startDate_krl_wis").val() == null){
                    $("#startDate_krl_wis").addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-startDate_krl_wis").css("display", "block").html("Tanggal keberangkatan Harus dipilih dahulu!")
                }
            })
}

function validationKaiWisSchedule(){
    var kaiWis_asal = JSON.parse($(".asalKrlWis").val())
    var kaiWis_tujuan = JSON.parse($(".tujuanKrlWis").val())
    $("#asalKrlWis").removeClass("is-invalid").removeClass("border-danger")
    $(".invalid-feedback-asalKrlWis").css("display", "none")
    $(".invalid-feedback-asalKrlWis-same").css("display", "none")
    $(".invalid-feedback-tujuanKrlWis-same").css("display", "none")
    $("#tujuanKrlWis").removeClass("is-invalid").removeClass("border-danger")
    $(".invalid-feedback-tujuanKrlWis").css("display", "none")
    $("#startDate_krl_wis").removeClass("is-invalid").removeClass("border-danger")
    $(".invalid-feedback-startDate_krl_wis").css("display", "none")
    $("#endDate_krl_wis").removeClass("is-invalid").removeClass("border-danger")
    $(".invalid-feedback-endDate_krl_wis").css("display", "none")

    if($("#type_trip").val() == "OneWay"){

            if(kaiWis_asal == null){
                $("#asalKrlWis").addClass("is-invalid").addClass("border-danger")
                $(".invalid-feedback-asalKrlWis").css("display", "block").html("Kolom ini tidak boleh kosong!")
            }else{
                $("#asalKrlWis").removeClass("is-invalid").removeClass("border-danger")
                $(".invalid-feedback-asalKrlWis").css("display", "none")
            }

            if(kaiWis_tujuan == null){
                $("#tujuanKrlWis").addClass("is-invalid").addClass("border-danger")
                $(".invalid-feedback-tujuanKrlWis").css("display", "block").html("Kolom ini tidak boleh kosong!")
            }else{
                $("#tujuanKrlWis").removeClass("is-invalid").removeClass("border-danger")
                $(".invalid-feedback-tujuanKrlWis").css("display", "none")
            }

            if($("#startDate_krl_wis").val() == ""){
                $("#startDate_krl_wis").addClass("is-invalid").addClass("border-danger")
                $(".invalid-feedback-startDate_krl_wis").css("display", "block").html("Kolom ini tidak boleh kosong!")
            }else{
                $("#startDate_krl_wis").removeClass("is-invalid").removeClass("border-danger")
                $(".invalid-feedback-startDate_krl_wis").css("display", "none")
            }
           
            if (kaiWis_asal != null || kaiWis_tujuan != null) {
                if (kaiWis_asal.name == kaiWis_tujuan.name) {
                    $("#asalKrlWis").addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-asalKrlWis-same").css("display", "block").html("Asal dan tujuan tidak boleh sama!")
    
                    $("#tujuanKrlWis").addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-tujuanKrlWis-same").css("display", "block").html("Asal dan tujuan tidak boleh sama!")
                } else {
                    $("#asalKrlWis").removeClass("is-invalid").removeClass("border-danger")
                    $(".invalid-feedback-asalKrlWis-same").css("display", "none")
                    $("#tujuanKrlWis").removeClass("is-invalid").removeClass("border-danger")
                    $(".invalid-feedback-tujuanKrlWis-same").css("display", "none")
                }
            }
            if (kaiWis_asal != null || kaiWis_tujuan != null) {
                if (kaiWis_asal.tags != kaiWis_tujuan.tags) {
                $("#asalKrlWis").addClass("is-invalid").addClass("border-danger")
                $(".invalid-feedback-asalKrlWis").css("display", "block").html("Asal dan tujuan harus antar Kota/Stasuin!")
            
                $("#tujuanKrlWis").addClass("is-invalid").addClass("border-danger")
                $(".invalid-feedback-tujuanKrlWis").css("display", "block").html("Asal dan tujuan harus antar Kota/Stasuin!")
            }else{
                $("#asalKrlWis").removeClass("is-invalid").removeClass("border-danger")
                $(".invalid-feedback-asalKrlWis").css("display", "none")
                $("#tujuanKrlWis").removeClass("is-invalid").removeClass("border-danger")
                $(".invalid-feedback-tujuanKrlWis").css("display", "none")
            }
        }

        if (kaiWis_asal != null && kaiWis_tujuan != null && $("#startDate_krl_wis").val() != "" && kaiWis_asal.tags == kaiWis_tujuan.tags && kaiWis_asal.name != kaiWis_tujuan.name) {
            toastr.success("Berhasil set jadwal", "Success")
            saveScadule()
        } else {
                toastr.error("Gagal cari tiket kereta", "Error")
            }

    }else{

            
            if(kaiWis_asal == null){
                $("#asalKrlWis").addClass("is-invalid").addClass("border-danger")
                $(".invalid-feedback-asalKrlWis").css("display", "block").html("Kolom ini tidak boleh kosong!")
            }else{
                $("#asalKrlWis").removeClass("is-invalid").removeClass("border-danger")
                $(".invalid-feedback-asalKrlWis").css("display", "none")
            }

            if(kaiWis_tujuan == null){
                $("#tujuanKrlWis").addClass("is-invalid").addClass("border-danger")
                $(".invalid-feedback-tujuanKrlWis").css("display", "block").html("Kolom ini tidak boleh kosong!")
            }else{
                $("#tujuanKrlWis").removeClass("is-invalid").removeClass("border-danger")
                $(".invalid-feedback-tujuanKrlWis").css("display", "none")
            }

            if($("#startDate_krl_wis").val() == ""){
                $("#startDate_krl_wis").addClass("is-invalid").addClass("border-danger")
                $(".invalid-feedback-startDate_krl_wis").css("display", "block").html("Kolom ini tidak boleh kosong!")
            }else{
                $("#startDate_krl_wis").removeClass("is-invalid").removeClass("border-danger")
                $(".invalid-feedback-startDate_krl_wis").css("display", "none")
            }

            if($("#endDate_krl_wis").val() == ""){
                $("#endDate_krl_wis").addClass("is-invalid").addClass("border-danger")
                $(".invalid-feedback-endDate_krl_wis").css("display", "block").html("Kolom ini tidak boleh kosong!")
            }else{
                $("#endDate_krl_wis").removeClass("is-invalid").removeClass("border-danger")
                $(".invalid-feedback-endDate_krl_wis").css("display", "none")
            }

            if (kaiWis_asal != null && kaiWis_tujuan != null) {
                if (kaiWis_asal.name == kaiWis_tujuan.name) {
                    $("#asalKrlWis").addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-asalKrlWis-same").css("display", "block").html("Asal dan tujuan tidak boleh sama!")
                
                    $("#tujuanKrlWis").addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-tujuanKrlWis-same").css("display", "block").html("Asal dan tujuan tidak boleh sama!")
                }else{
                    $("#asalKrlWis").removeClass("is-invalid").removeClass("border-danger")
                    $(".invalid-feedback-asalKrlWis-same").css("display", "none")
                    $("#tujuanKrlWis").removeClass("is-invalid").removeClass("border-danger")
                    $(".invalid-feedback-tujuanKrlWis-same").css("display", "none")
            }       
        }
    
        if (kaiWis_asal != null && kaiWis_tujuan != null) {
            if (kaiWis_asal.tags != kaiWis_tujuan.tags) {
                $("#asalKrlWis").addClass("is-invalid").addClass("border-danger")
                $(".invalid-feedback-asalKrlWis").css("display", "block").html("Asal dan tujuan harus antar Kota/Stasuin!!")

                $("#tujuanKrlWis").addClass("is-invalid").addClass("border-danger")
                $(".invalid-feedback-tujuanKrlWis").css("display", "block").html("Asal dan tujuan harus antar Kota/Stasuin!!")
            } else {
                $("#asalKrlWis").removeClass("is-invalid").removeClass("border-danger")
                $(".invalid-feedback-asalKrlWis").css("display", "none")
                $("#tujuanKrlWis").removeClass("is-invalid").removeClass("border-danger")
                $(".invalid-feedback-tujuanKrlWis").css("display", "none")
            }
        }

        if (kaiWis_asal.name != kaiWis_tujuan.name && kaiWis_asal.tags == kaiWis_tujuan.tags && $("#startDate_krl_wis").val() != "" && $("#endDate_krl_wis").val() != "") {
            toastr.success("Berhasil set jadwal", "Success")
            saveScadule()
        } else {
                toastr.error("Gagal cari tiket kereta", "Error")
            }
    }
}

function cariJadwalKrlWisata(){
    $("#train_table_data").empty();
    $("#tabel_pesawat").empty();
    $("#tabel_kereta_regular").empty();

   
    var kaiWis_asal = JSON.parse($(".asalKrlWis").val())
    var kaiWis_tujuan = JSON.parse($(".tujuanKrlWis").val())

    
        $.LoadingOverlay("show")

        $("#tabel_kereta_wisata" ).removeClass('d-none');
        $("#tabel_kereta_wisata").empty();

        var tabelkereta = `
        <h1 class="h6 font-weight-normal text-center text-uppercase mt-2"> <b>List Tiket Tersedia</b> </h1>
            <div class="table-responsive" >
                <table class="table bg-white">
                    <thead class="thead-main text-nowrap">
                     
                    </thead>
                    <tbody class="text-nowrap" id="train_wis_table_data">
                    </tbody>
                </table>
            </div>`;
        $("#tabel_kereta_wisata" ).append(tabelkereta)

        var startDate = $("#startDate_krl_wis" ).val()
        var true_date = new Date(startDate)
        var options = { year: 'numeric', month: '2-digit', day: '2-digit' };
        var dateString = true_date.toLocaleDateString('en-US', options);
        var dateStrDpart = moment(dateString).format('YYYY-MM-DD');
        var adult = $("#adult_krl_wis" ).val()
        // var child = $("#child" ).val()
        var infant = $("#infant_krl_wis" ).val()
        
        if(kaiWis_asal.tags == "City"){
            asal_kotacity = kaiWis_asal.name
            tujuan_kotacity = kaiWis_tujuan.name
            var save_data_train = {
                asal: kaiWis_asal.name,
                tujuan: kaiWis_tujuan.name,
                tags: kaiWis_asal.tags,
            }

            localStorage.setItem("data_train_return", JSON.stringify(save_data_train))

        }else if(kaiWis_asal.tags == "Station"){
            asal_kotacity = kaiWis_asal.code
            tujuan_kotacity = kaiWis_tujuan.code
            var save_data_train = {
                asal: kaiWis_asal.code,
                tujuan: kaiWis_tujuan.code,
                tags: kaiWis_asal.tags,
            }

            localStorage.setItem("data_train_return", JSON.stringify(save_data_train))
        }

        var tp = $("#type_trip").val()

        if( tp == "OneWay"){
            var dateReturn = ""
        }else if(tp == "RoundTrip"){
            var endDate = $("#endDate_krl_wis" ).val()
            var options = { year: 'numeric', month: '2-digit', day: '2-digit' };
            var dateString = true_date.toLocaleDateString('en-US', options);
            var dateReturn = moment(dateString).format('YYYY-MM-DD');
        }
        var token = JSON.parse(localStorage.getItem('data_token'))
        var token_set = token['access_token']
        var url = fetch(mainurl +'train/get_schedule_all',{
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + token_set,
            },
            body: JSON.stringify({
                "tags": kaiWis_asal.tags,
                "org": asal_kotacity,
                "des": tujuan_kotacity,
                "departure_date": dateStrDpart,
                "pax_adult": adult,
                "pax_infant": infant,
                "return_date": dateReturn,
                "page": 1,
                "per_page": 10,
                "sort_by": "id",
                "order": "asc"
            }),

        }).then((response) => response.json()).then((responseData) => {
            var asal = responseData.data;
            console.log(asal)
            
            $.LoadingOverlay("hide")
            if(responseData.success == false ||responseData.data == null || responseData.data == []){
            
                var tblend = `<tr>
                                <td id="" class="pl-3 text-center " colspan="6">Train Schedule not Found!</td>
                            </tr>`;
                $("#train_wis_table_data").append(tblend);

                }else{
                    var asal = responseData.data.departure;
                    console.log(asal)
            
                    for(var i = 0; i < asal.length; i++){
                        var result = reformatDateList(asal[i].depature_time);
                        var resultReturn = reformatDateList(asal[i].arrival_time);
                        var n = i+1
                        setSchedule = `<tr id="list_schadule_train`+n+`">
                                <td id="" class="pl-3 text-center "><b>`+ asal[i].transporter_name +` (`+ asal[i].transporter_no +`)</b><br>`+ asal[i].class +` <div id="seat_tersedia`+ n +`" class="d-none text-colors-block"> Kursi Tersedia: `+ asal[i].seat_available+`</div><div id="seat_tersedia_on`+ n +`" class="text-colors-none"> Kursi Tersedia: `+ asal[i].seat_available+`</div></td>
                                <td id="" class="pl-3 text-center "><b style=" font-size: 15px;">`+ asal[i].origin +`</b><br><a style=" font-size: 12px;">`+ result.date +` - <b>`+result.time+`</b></a> </td>
                                <td id="" class="pl-3 text-center "><i class="fa fa-arrow-right fa-2x " style=" margin-top: 10px;"></i></td>
                                <td id="" class="pl-3 text-center "><b style=" font-size: 15px;">`+ asal[i].destination +`</b><br><a style=" font-size: 12px;">`+ resultReturn.date +` - <b>`+resultReturn.time+`</a></td>
                                <td id="" class="pl-3 text-center text-colors-on" style=" font-size: 17px;"> <b style=" margin-top: 100px;">Rp `+ formatPrice(asal[i].adult_price) +`</b></td>
                                <td id="" class="pl-3 text-center"> <button class="btn btn-block main-color" onclick="enableLoading(); saveScadule(`+ n +`)"><b class="text-colors-off">Pilih</b></button>
                                                                    <input id="getVendTrainWis`+n+`" value="`+ asal[i].vendor_id +`" hidden></input> 
                                                                    <input id="getOrgTrainWis`+n+`" value="`+asal[i].origin +`" hidden></input>
                                                                    <input id="getDesTrainWis`+n+`" value="`+asal[i].destination +`" hidden></input>
                                                                    <input id="getTrainNumber`+n+`" value="`+asal[i].transporter_no +`" hidden></input>
                                                                    <input id="getSubClassKrlReg`+n+`" value="`+ asal[i].sub_class +`" hidden></input>
                                                                    <input id="getClassKrlReg`+n+`" value="`+ asal[i].class +`" hidden></input>
                                                                    <input id="getAdlPricKrlReg`+n+`" value="`+ asal[i].adult_price +`" hidden></input>
                                                                    <input id="getAdlDisPricKrlReg`+n+`" value="`+ asal[i].adult_discounted_price +`" hidden></input>
                                                                    <input id="getInfDisPricKrlReg`+n+`" value="`+ asal[i].infant_discounted_price +`" hidden></input>
                                                                    <input id="getInfPricKrlReg`+n+`" value="`+ asal[i].infant_price +`" hidden></input>

                                                                    <input id="name_train`+n+`" value="`+ asal[i].transporter_name +`" hidden></input>
                                                                    <input id="depart_date`+n+`" value="`+ asal[i].depature_time +`" hidden></input>
                                                                    <input id="arrive_date`+n+`" value="`+ asal[i].arrival_time +`" hidden></input>
                                </td>
                            </tr>`;
                        $("#train_wis_table_data").append(setSchedule);
                    }
                }
            });
}


function saveScadule(id){
    $.LoadingOverlay("hide")
    // var data = JSON.parse(localStorage.getItem('data_train_return'))

    var org = JSON.parse($(".asalKrlWis").val())
    var des = JSON.parse($(".tujuanKrlWis").val())
    if(org.tags == "City"){
        var asal_kotacity = org.name
        var tujuan_kotacity = des.name
        
    }else if(org.tags == "Station"){

        var asal_kotacity = org.code
        var tujuan_kotacity = des.code
        
    }

    var depart_date = $("#startDate_krl_wis" ).val()
    var return_date = $("#endDate_krl_wis" ).val()

    var type_trip = $("#type_trip").val()

        var true_date = new Date(depart_date)
        var options = { year: 'numeric', month: '2-digit', day: '2-digit'};
        var dateString = true_date.toLocaleDateString('en-US', options);
        var dateStrDpart = moment(dateString).format('YYYY-MM-DD');

        var true_date_return = new Date(return_date)
        var options_return = { year: 'numeric', month: '2-digit', day: '2-digit' };
        var dateString_return = true_date_return.toLocaleDateString('en-US', options_return);
        var dateStrDpart_return = moment(dateString_return).format('YYYY-MM-DD');

    var scadule_kaiwisata = [
                    {
            "org" : asal_kotacity,
            "des" : tujuan_kotacity,
            "departure" : dateStrDpart,
            "return" : dateStrDpart_return,
            "type_trip": type_trip
        }
    ]
    var product = "train_wisata"
    localStorage.setItem("product_payment", JSON.stringify(product))
    localStorage.setItem("data_scadule_wisata", JSON.stringify(scadule_kaiwisata))
    toChooseWagon()
}

function toChooseWagon(){

    window.location.href = "/kaiwisata/list/wagon";

}

