// $(document).ready(function(){
//     $('#loginGowisata').on('click', function(e){
//         $.LoadingOverlay("show")
//         toastr.options = {
//           "closeButton": false,
//           "debug": false,
//           "newestOnTop": false,
//           "progressBar": true,
//           "positionClass": "toast-top-center",
//           "preventDuplicates": false,
//           "onclick": null,
//           "showDuration": "300",
//           "hideDuration": "1000",
//           "timeOut": "5000",
//           "extendedTimeOut": "1000",
//           "showEasing": "swing",
//           "hideEasing": "linear",
//           "showMethod": "fadeIn",
//           "hideMethod": "fadeOut"
//         }
//         $.ajax({
//             url: "/login",
//             method:'POST',
//             data:$('#loginForm').serialize(),
//             success: function(response) {
//                 if (response.success) {
//                     localStorage.setItem("data_token", JSON.stringify(response.data))
//                     localStorage.setItem("name_auth", JSON.stringify(response.user_auth))
//                     localStorage.setItem("user_type", JSON.stringify(response.acc_type))
//                     window.location = response.prev_url
//                     $.LoadingOverlay("hide")
//                     toastr.success("Anda berhasil masuk", "Login")
//                 } else {
//                     $.LoadingOverlay("hide")
//                     toastr.error(response.message, "Error Login")
//                 }
//             }, error: function(err) {
//                 $.LoadingOverlay("hide")
//                 // toastr.error(err.responseJSON.message, "Login")
//                 toastr.error("Your email / password is invalid, please check again!", "Login")
//             }
//         })
//         e.preventDefault()
//     })

//     $('#login_customer').on('click', function(e){
//         $('#text_bus').addClass("text-colors-on")
//         $('#text_bus').removeClass("text-colors-off")
//         $('#text_cus').addClass("text-colors-off")
//         $('#text_cus').removeClass("text-colors-on")
//         $('#login_customer').addClass("main-color")
//         $('#login_business').removeClass("main-color")
//         $('#acc_type').val("b2c").change()   
//     })

//     $('#login_business').on('click', function(e){
//         $('#text_cus').addClass("text-colors-on")
//         $('#text_cus').removeClass("text-colors-off")
//         $('#text_bus').addClass("text-colors-off")
//         $('#text_bus').removeClass("text-colors-on")
//         $('#login_business').addClass("main-color")
//         $('#login_customer').removeClass("main-color")
//         $('#acc_type').val("b2b").change()
        
//     })
// })

function formKrlRegular(){
    $("#formMiceview").empty()
    $("#formOdrPesawat").empty();
    $("#formKrlWisview").empty();
    $("#formOdrHotelview").addClass('d-none')
    $("#formKrlLuarBiasaview").addClass('d-none')
    $("#formKrlIstview").addClass('d-none')
    $("#formOdrHotelview").empty()

    $("#formKrlReg").addClass('d-none')
    $("#formKrlRegview").empty();
    $("#formKrlRegview").removeClass('d-none')
    $("#tabel_kereta_regular").empty();
    $("#train_table_data").empty();
    $("#tabel_kereta_regular").addClass('d-none')

    $("#sideMice").removeClass('text-warning');
    $("#sideKrlReg").addClass('text-warning')
    $("#sideKrlWis").removeClass('text-warning')
    $("#sideOdrPesawat").removeClass('text-warning') 
    $("#sideKrlLuarBiasa").removeClass('text-warning')
    $("#sideKrlIstimewa").removeClass('text-warning') 
    $("#sideHotel").removeClass('text-warning') 
    $("#tabel_kereta").addClass('d-none'); 
    $("#tabel_Pesawat").addClass('d-none'); 
    $("#tabel_kereta_wisata").addClass('d-none'); 
    $("#tabel_kereta_wisata").empty();

                var currentdate = new Date();
                var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'July', 'Augustus', 'September', 'October', 'November', 'Desember'];
                var monthName = months[currentdate.getMonth()];
                var day = currentdate.getDate();
                var year = currentdate.getFullYear();
                var day_return = currentdate.getDate()+1;
                var viewDate = day  + ' ' + monthName + ' ' + year;
                var viewDateReturn = day_return  + ' ' + monthName + ' ' + year;
                
                var datahtml = `
                    <h1 class="h5 font-weight-normal text-center text-uppercase text-colors-on"> <b>Cari Tiket Kereta Regular</b></h5>
                    <hr>
                    <div class="row col-12">
                        <div class="form-check col-2">
                            <input class="form-check-input" type="radio" name="flexRadioDefaultReg" id="flexRadioDefaultReg1" value="0" checked>
                            <label class="form-check-label" for="flexRadioDefaultReg1">
                                Sekali Jalan
                            </label>
                        </div>
                        <div class="form-check col-2">
                            <input class="form-check-input" type="radio" name="flexRadioDefaultReg" id="flexRadioDefaultReg2" value="1">
                            <label class="form-check-label" for="flexRadioDefaultReg2">
                                Pulang Pergi
                            </label>
                        </div>
                        <input class="form-control inputVal" id="type_trip" name="type_trip" placeholder="Asal..." value="" hidden/>
                    </div>
                    <br>
                    <div class="row">
                        <div class="form-group col-5">
                            <label> Asal: </label> 
                            <select class="js-example-basic-single js-states form-control kaiReg-asal" id="id_label_single1">
                            </select>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback-kairegorg text-colors-block"></div>
                        </div>
                        <div class="form-group text-center col-2" style="margin-top: 20px;" >
                            <a id="ganti_arah" href="javascript:void(0);" class="text-colors-on"><i class="fa fa-exchange fa-2x"></i></a>
                        </div>
                        <div class="form-group col-5">
                            <label> Tujuan: </label>
                            <select class="js-example-basic-single js-states form-control kaiReg-tujuan" id="id_label_single2">
                            </select>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback-kairegdes text-colors-block"></div>
                        </div>
                        <input class="form-control inputVal" type="text" id="rute_perjalan" name="rute_perjalan" value="1" hidden />
                    </div>
                    <!-- <br> -->
                    <div class="row ">
                        <div class="form-group col-3">
                            <label for="type">Tanggal Berangkat: <span class="text-danger">*</span></label>
                            <input class="form-control inputVal" type="text" id="startDate_krl_reg" name="startDate_krl_reg" value=""  placeholder="`+viewDate+`" min="" readonly/>
                            <input class="form-control inputVal" type="text" id="startDate_krl_reg_in" name="startDate_krl_reg_in" value="" hidden />
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback-kairegdateorg text-colors-block"></div>
                        </div>
                        <div class="form-group col-3">
                            <label for="type">Tanggal Pulang: </label>
                            <input class="form-control inputVal" type="text" id="endDate_krl_reg" name="endDate_krl_reg" value=""  placeholder="`+viewDateReturn+`" min="" hidden readonly/>
                            <input class="form-control inputVal" type="text" id="startDate_krl_reg_in" name="startDate_krl_reg_in" value="" hidden />
                            <div class="invalid-feedback-endDate_krl_reg text-colors-block"></div>
                        </div>
                        <div class="form-group col-3">
                            <label for="type">Dewasa: <span class="text-danger">*</span></label>
                            <select class="form-control" id="adult_krl_reg" name="adult_krl_reg" required>
                                <option value="1" selected>1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                            <div class="">Usia 3+</div>
                            <div class="invalid-feedback-adult text-colors-block"></div>
                        </div>
                        <div class="form-group col-3">
                            <label for="type">Bayi: </label>
                            <select class="form-control" id="infant_krl_reg" name="infant_krl_reg" required>
                                <option value="0" selected>0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                            <div class="">Dibawah 3</div>
                            <div class="invalid-feedback-infant text-colors-block"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            
                        </div>
                        <button class="btn btn-block col-3 md-auto top-100 start-50 main-color" onclick="cariTiketKereta()" style="margin-left:5%;"> <b class="text-colors-off"><i class="fa fa-search mr-1"></i> Cari Tiket </b></button>
                    </div>`
            $("#formKrlRegview" ).append(datahtml)
            
            $('#ganti_arah').on('click', function(){
                var asal_option = $('.kaiReg-asal option');
                // console.log(asal_option)
              
                var tujuan_option = $('.kaiReg-tujuan option');
                // console.log(tujuan_option)

                $('.kaiReg-tujuan').empty().append(asal_option.clone());
                $('.kaiReg-asal').empty().append(tujuan_option.clone());
            })
            
            $('#adult_krl_reg').on('change', function(){
                var dul = $(this).val();
                var inf = $('#infant_krl_reg').val()
                if(inf > dul){

                    $("#adult_krl_reg").addClass("is-invalid")
                    $("#adult_krl_reg").addClass("border-danger")
                    $(".invalid-feedback-adult").css("display", "block").html("jumlah Dewasa tidak boleh kurang dari jumlah Balita!")
                    
                }else if(inf <= dul){

                    $("#adult_krl_reg").removeClass("is-invalid")
                    $("#adult_krl_reg").removeClass("border-danger")
                    $(".invalid-feedback-adult").css("display", "none").html()

                    $("#infant_krl_reg").removeClass("is-invalid")
                    $("#infant_krl_reg").removeClass("border-danger")
                    $(".invalid-feedback-infant").css("display", "none").html()
                }
            })

            $('#infant_krl_reg').on('change', function(){
                var inf = $(this).val();
                var dul = $('#adult_krl_reg').val()

               if(inf > dul){
                $("#infant_krl_reg").addClass("is-invalid")
                $("#infant_krl_reg").addClass("border-danger")
                $(".invalid-feedback-infant").css("display", "block").html("jumlah Balita tidak boleh lebih dari jumlah Dewasa!")

               }else if(inf <= dul){
                $("#infant_krl_reg").removeClass("is-invalid")
                $("#infant_krl_reg").removeClass("border-danger")
                $(".invalid-feedback-infant").css("display", "none").html()

                $("#adult").removeClass("is-invalid")
                $("#adult").removeClass("border-danger")
                $(".invalid-feedback-adult").css("display", "none").html()
               }
            })

            var token = JSON.parse(localStorage.getItem('data_token'))
            var token_set = token['access_token']
            $('.kaiReg-asal').select2({
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
                    $('.kaiReg-asal').empty();
                    return {
                        results: data_train
                    };
                },
                cache :true
                }
            });


            $('.kaiReg-tujuan').select2({
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
                    // console.log(params)
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
                    $('.kaiReg-tujuan').empty();
                    return {
                        results: data_train
                    };
                },
                cache :true
                }
            });

                $('#flexRadioDefaultReg1').on('click', function(e){
                    $("#endDate_krl_reg").attr('hidden', 'hidden')
                    $("#type_trip").val("OneWay")
                })
    
                $('#flexRadioDefaultReg2').on('click', function(e){
                    $("#endDate_krl_reg").removeAttr('hidden')
                    $("#type_trip").val("RoundTrip")
                })

                var type_trip = $("#type_trip" ).val()
                if(type_trip == "" || type_trip == null){
                    $("#type_trip" ).val("OneWay")
                }
         
                var startdt = $('#startDate_krl_reg').datetimepicker({
                    format: "d F Y",
                    showButtonPanel: true,
                    changeMonth: true,
                    changeYear: true,
                    showOn: "button",
                    buttonImageOnly: false,
                    inline: false,
                    timepicker: false,
                    minDate: currentdate,
                    maxDate: new Date(currentdate.getFullYear(), currentdate.getMonth() + 3, currentdate.getDate()),
                    onSelectDate:function(selectedDate){
                        var minDates = new Date(selectedDate);
                        minDates.setDate(minDates.getDate());
                        $('#endDate_krl_reg').datetimepicker({
                            format: "d F Y",
                            showButtonPanel: true,
                            changeMonth: true,
                            changeYear: true,
                            showOn: "button",
                            buttonImageOnly: false,
                            inline: false,
                            timepicker: false,
                            minDate: minDates,
                            maxDate: new Date(currentdate.getFullYear(), currentdate.getMonth() + 3, currentdate.getDate()),
                        });
                    }
                });
             
                //validation
                $('#startDate_krl_reg').on('click', function(){
                    $("#endDate_krl_reg").val("")
                    if($(this).val() != "" || $(this).val() != null){
                        $("#startDate_krl_reg").removeClass("is-invalid").removeClass("border-danger")
                        $(".invalid-feedback-kairegdateorg").css("display", "none")
                    }
                })

                $('#endDate_krl_reg').on('click', function(){
                    if($("#startDate_krl_reg").val() == "" || $("#startDate_krl_reg").val() == null){
                        $("#startDate_krl_reg").addClass("is-invalid").addClass("border-danger")
                        $(".invalid-feedback-kairegdateorg").css("display", "block").html("Tanggal keberangkatan Harus dipilih dahulu!")
                    }
                })

}
function cariTiketKereta(){
    
    if($("#rute_perjalan").val() == 1){
        var kaireg_asal = JSON.parse($(".kaiReg-asal").val())
        var kaireg_tujuan = JSON.parse($(".kaiReg-tujuan").val())
    }else if($("#rute_perjalan").val() == 2){
        var kaireg_asal = JSON.parse($(".kaiReg-tujuan").val())
        var kaireg_tujuan = JSON.parse($(".kaiReg-asal").val())
    }

    $(".invalid-feedback-kairegorg").css("display", "none");
    $(".invalid-feedback-kairegdes").css("display", "none");
    $(".invalid-feedback-startDate_krl_reg").css("display", "none");
    $("#train_table_data").empty();
    $("#tabel_kereta_regular" ).removeClass('d-none');
    $("#tabel_kereta_regular").empty();

    // console.log(kaireg_asal)
    var type_trip = $("#type_trip").val()
    localStorage.setItem("type_trip", JSON.stringify(type_trip))

 if(kaireg_asal == "" || kaireg_asal == null){
    
    $("#asalKrlReg").addClass("is-invalid").addClass("border-danger")
    $(".invalid-feedback-kairegorg").css("display", "block").html("This field cannot be empty!")
    toastr.error("Gagal cari tiket kereta", "Error")

 }else if(kaireg_tujuan == "" || kaireg_tujuan == null){
  
    $("#tujuanKrlReg").addClass("is-invalid").addClass("border-danger")
    $(".invalid-feedback-kairegdes").css("display", "block").html("This field cannot be empty!")
    toastr.error("Gagal cari tiket kereta", "Error")

 }else if($("#startDate_krl_reg").val() == "" || $("#startDate_krl_reg").val() == null){

    $("#startDate_krl_reg").addClass("is-invalid").addClass("border-danger")
    $(".invalid-feedback-kairegdateorg").css("display", "block").html("This field cannot be empty!")
    toastr.error("Gagal cari tiket kereta", "Error")
    
 } else if(kaireg_asal.name == kaireg_tujuan.name){

    $("#asalKrlReg").addClass("is-invalid").addClass("border-danger")
    $(".invalid-feedback-kairegorg").css("display", "block").html("Asal dan tujuan tidak boleh sama!")

    $("#tujuanKrlReg").addClass("is-invalid").addClass("border-danger")
    $(".invalid-feedback-kairegdes").css("display", "block").html("Asal dan tujuan tidak boleh sama!")
    toastr.error("Gagal cari tiket kereta", "Error")

}else if(kaireg_asal.tags != kaireg_tujuan.tags){
  
    $("#asalKrlReg").addClass("is-invalid").addClass("border-danger")
    $(".invalid-feedback-kairegorg").css("display", "block").html("Asal dan tujuan mohon disamakan, stasiun ke stasiun / kota ke kota!")

    $("#tujuanKrlReg").addClass("is-invalid").addClass("border-danger")
    $(".invalid-feedback-kairegdes").css("display", "block").html("Asal dan tujuan mohon disamakan, stasiun ke stasiun / kota ke kota!")

    toastr.error("Asal dan tujuan harus jenis yang sama, kota ke kota / stasiun ke stasiun", "Error")

}else{
    $.LoadingOverlay("show")
    $("#asalKrlReg").removeClass("is-invalid").removeClass("border-danger")
    $(".invalid-feedback-kairegorg").css("display", "none")
    $("#tujuanKrlReg").removeClass("is-invalid").removeClass("border-danger")
    $(".invalid-feedback-kairegdes").css("display", "none")
    $("#startDate_krl_reg").removeClass("is-invalid").removeClass("border-danger")
    $(".invalid-feedback-kairegdateorg").css("display", "none")
    $("#endDate_krl_reg").removeClass("is-invalid").removeClass("border-danger")
    $(".invalid-feedback-endDate_krl_reg").css("display", "none")

    $("#tabel_kereta_regular" ).removeClass('d-none');
    $("#tabel_kereta_regular").empty();

    var org = $("#asalKrlReg").val()
    var des = $("#tujuanKrlReg").val()
    var depart_date = $("#startDate_krl_reg" ).val()
        var true_date = new Date(depart_date)
        var options = { year: 'numeric', month: '2-digit', day: '2-digit' };
        var dateString = true_date.toLocaleDateString('en-US', options);
        var dateStrDpart = moment(dateString).format('YYYY-MM-DD');

    var adult = $("#adult_krl_reg" ).val()
    var infant = $("#infant_krl_reg" ).val()
    var datasetPax = [
                {
                    "adult" : adult
                },
                {
                    "infant" : infant
                },
            ]
    
    var type_trip = $("#type_trip" ).val()

    if(type_trip == "OneWay"){
        var dateStrReturn = ""
    }else if(type_trip == "RoundTrip"){
        if($("#endDate_krl_reg" ).val() == "" || $("#endDate_krl_reg" ).val() == null){
            $.LoadingOverlay("hide")
            toastr.error("Gagal cari tiket kereta", "Error")

            $("#endDate_krl_reg").addClass("is-invalid").addClass("border-danger")
            $(".invalid-feedback-endDate_krl_reg").css("display", "block").html("Tipe perjalanan pulang pergi, tanggal pulang wajib diisi!")
        }else{
            var endDate = $("#endDate_krl_reg" ).val()
                var true_date = new Date(endDate)
                var options = { year: 'numeric', month: '2-digit', day: '2-digit' };
                var dateString = true_date.toLocaleDateString('en-US', options);
                var dateStrReturn = moment(dateString).format('YYYY-MM-DD');
        }
    }

    if(kaireg_asal.tags == "City"){
        asal_kotacity = kaireg_asal.name
        tujuan_kotacity = kaireg_tujuan.name
        var save_data_train = {
            asal: kaireg_asal.name,
            tujuan: kaireg_tujuan.name,
            tags: kaireg_asal.tags,
        }

        localStorage.setItem("data_train_return", JSON.stringify(save_data_train))

    }else if(kaireg_asal.tags == "Station"){
        asal_kotacity = kaireg_asal.code
        tujuan_kotacity = kaireg_tujuan.code
        var save_data_train = {
            asal: kaireg_asal.code,
            tujuan: kaireg_tujuan.code,
            tags: kaireg_asal.tags,
        }

        localStorage.setItem("data_train_return", JSON.stringify(save_data_train))
    }
    localStorage.setItem("data_pax", JSON.stringify(datasetPax))
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
            "tags":kaireg_asal.tags,
            "org": asal_kotacity,
            "des": tujuan_kotacity,
            "departure_date": dateStrDpart,
            "pax_adult": adult,
            "pax_infant": infant,
            "return_date": dateStrReturn,
            "page": 1,
            "per_page": -1,
            "sort_by": "id",
            "order": "asc"
        }),

        }).then((response) => response.json()).then((responseData) => {
            var asal = responseData;
 
            console.log(asal)
            if(responseData.success == false ||responseData.data == null || responseData.data == []){
                    var tabelkereta = `
                    <h1 class="h6 font-weight-normal text-center text-uppercase mt-2"> <b>List Tiket Tersedia</b> </h1>
                        <div class="table-responsive" >
                            <table class="table bg-white">
                                <thead class="thead-main text-nowrap">
                                
                                </thead>
                                <br>
                                <tbody class="text-nowrap" id="train_table_data">
                                </tbody>
                            </table>
                        </div>`;
                $("#tabel_kereta_regular" ).append(tabelkereta)
       
            var tblend = `<tr>
                            <td id="" class="pl-3 text-center " colspan="6">Train Schedule not Found!</td>
                        </tr>`;
            $("#train_table_data").append(tblend);
            $.LoadingOverlay("hide")
        }else{
            $.LoadingOverlay("hide")
            var asal = responseData.data.departure;
             console.log(asal)
            var tabelkereta = `
            <h1 class="h6 font-weight-normal text-center text-uppercase mt-2"> <b>List Tiket Tersedia</b> </h1>
                <div class="table-responsive" >
                    <table class="table bg-white">
                        <thead class="thead-main text-nowrap">
                        
                        </thead>
                        <br>
                        <tbody class="text-nowrap" id="train_table_data">
                        </tbody>
                    </table>
                </div>`;
            $("#tabel_kereta_regular" ).append(tabelkereta)

            if(asal == [] || asal == null){

                var tblend = `<tr>
                            <td id="" class="pl-3 text-center " colspan="6">Jadwal kereta tidak ditemukan!</td>
                        </tr>`;
                $("#train_table_data").append(tblend);
            }else{
                $.LoadingOverlay("hide")
                for(var i = 0; i < asal.length; i++){
                    var result = reformatDateList(asal[i].depature_time);
                    var resultReturn = reformatDateList(asal[i].arrival_time);
                        var n = i + 1
                        setSchedule = `<tr id="list_schadule_train`+n+`">
                                        <td id="" class="pl-3 text-center "><b>`+ asal[i].transporter_name +` (`+ asal[i].transporter_no +`)</b><br>`+ asal[i].class +` <div id="seat_tersedia`+ n +`" class="d-none text-colors-block"> Kursi Tersedia: `+ asal[i].seat_available+`</div><div id="seat_tersedia_on`+ n +`" class="text-colors-none"> Kursi Tersedia: `+ asal[i].seat_available+`</div></td>
                                        <td id="" class="pl-3 text-center "><b style=" font-size: 15px;">`+ asal[i].origin +`</b><br><a style=" font-size: 12px;">`+ result.date +` - <b>`+ result.time +`</b></a> </td>
                                        <td id="" class="pl-3 text-center "><i class="fa fa-arrow-right fa-2x " style=" margin-top: 10px;"></i></td>
                                        <td id="" class="pl-3 text-center "><b style=" font-size: 15px;">`+ asal[i].destination +`</b><br><a style=" font-size: 12px;">`+ resultReturn.date +` - <b>`+ resultReturn.time +`</b></a></td>
                                        <td id="" class="pl-3 text-center text-colors-on" style=" font-size: 17px;"> <b style=" margin-top: 100px;">Rp `+ formatPrice(asal[i].adult_price) +`</b></td>
                                        <td id="" class="pl-3 text-center"> <button id="getDetailsTrain`+ n +`" class="btn btn-block main-color" onclick="setDataTrainRegDepart(`+ n +`); setPaxTrain(`+ n +`)"><b class="text-colors-off">Pilih</b></button> 
                                                                            <button id="getDetailsTrainRegReturn`+ n +`" class="btn btn-block main-color" onclick="enableLoading(); setDataTrainRegDepart(`+ n +`); saveDataSearchTrainReg(`+ n +`)"><b class="text-colors-off">Pilih</b></button>
                                                                            <input id="getVendTrainReg`+n+`" value="`+ asal[i].vendor_id +`" hidden></input> 
                                                                            <input id="getOrgTrainReg`+n+`" value="`+asal[i].origin +`" hidden></input>
                                                                            <input id="getDesTrainReg`+n+`" value="`+asal[i].destination +`" hidden></input>
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
                        $("#train_table_data").append(setSchedule);

                        if(type_trip == "OneWay"){
                            $('#getDetailsTrainRegReturn' + n).addClass('d-none')
                            $('#getDetailsTrain'+ n).removeClass('d-none')
                        }else if(type_trip == "RoundTrip"){
                            $('#getDetailsTrain'+ n).addClass('d-none')
                            $('#getDetailsTrainRegReturn'+ n).removeClass('d-none')
                        }

                        if(asal[i].seat_available == 0 || asal[i].seat_available == null){
                            $('#list_schadule_train'+ n).addClass("background-disabled2")
                            $('#getDetailsTrain'+ n).attr('disabled', true).removeClass("main-color").addClass("background-disabled")
                            $('#getDetailsTrainRegReturn'+ n).attr('disabled', true).removeClass("main-color").addClass("background-disabled")
                        }

                        if(asal[i].seat_available <= 4){
                            $('#seat_tersedia'+ n).removeClass('d-none')
                            $('#seat_tersedia_on'+ n).addClass('d-none')
                        }

                        const dateString = asal[i].depature_time;
                        const [dateStringPart, timeStringPart] = dateString.split(' - ');
                        const [day, month, year] = dateStringPart.split('/');
                        const [hour, minute] = timeStringPart.split(':');
                        const date = new Date(year, month - 1, day, hour, minute);
                        const timestampBerangkat = date.getTime();

                        var timestampNow = Date.now();
                        console.log(asal[i].depature_time)
                        console.log(timestampBerangkat)
                        console.log(timestampNow)
                        if(timestampNow > timestampBerangkat){
                            $("#getDetailsTrain"+n). attr("disabled", true);
                            $("#list_schadule_train"+n).css({backgroundColor: '#cacaca'});
                        }
                        
                    }
                }
            
            }
                
        });
    }
}

function setDataTrainRegDepart(id){

    var vendor = $("#getVendTrainReg"+ id ).val()
    var org = $("#getOrgTrainReg"+ id ).val()
    var des = $("#getDesTrainReg"+ id ).val()
    var number = $("#getTrainNumber"+ id).val()
    var subclas = $("#getSubClassKrlReg" + id).val()
    var clas = $("#getClassKrlReg" + id).val()
    var adpric = $("#getAdlPricKrlReg" + id).val()
    var adispric = $("#getAdlDisPricKrlReg" + id).val()
    var inpric = $("#getInfDisPricKrlReg" + id).val()
    var indispric = $("#getInfPricKrlReg" + id).val()

    var name = $("#name_train" + id).val()
    var depart_date = $("#depart_date" + id).val()
    var arrive_date = $("#arrive_date" + id).val()

    var type_trip = $("#type_trip").val()
    var set_data_train_depart = {
        "origin": org,
        "destination": des,
        "departure_date": depart_date,
        "transporter_no": number,
        "transporter_class": clas,
        "transporter_sub_class": subclas,
        "vendor_id": vendor,
        "adult_price": adpric,
        "adult_discounted_price": adispric,
        "infant_price": inpric,
        "infant_discounted_price": indispric,
        "name_train": name,
        "arrive_date": arrive_date,
        "type_trip": type_trip
    }

    var product = "train_regular"
    localStorage.setItem("product_payment", JSON.stringify(product))
    localStorage.setItem("data_train_depart", JSON.stringify(set_data_train_depart))
}

function saveDataSearchTrainReg(id){
    var org = $("#getOrgTrainReg"+ id ).val()
    var des = $("#getDesTrainReg"+ id ).val()
    var depart_date = $("#startDate_krl_reg" ).val()
        var true_date = new Date(depart_date)
        var options = { year: 'numeric', month: '2-digit', day: '2-digit' };
        var dateString = true_date.toLocaleDateString('en-US', options);
        var dateStrDpart = moment(dateString).format('YYYY-MM-DD');

    var endDate = $("#endDate_krl_reg" ).val()
        var true_date = new Date(endDate)
        var options = { year: 'numeric', month: '2-digit', day: '2-digit' };
        var dateString = true_date.toLocaleDateString('en-US', options);
        var dateStrReturn = moment(dateString).format('YYYY-MM-DD');
        
    var set_data_train_search = {
        "origin": org,
        "destination": des,
        "start_date": dateStrDpart,
        "end_date": dateStrReturn,
        "adult": $("#adult_krl_reg" ).val(),
        "infant": $("#infant_krl_reg" ).val(),
    }

    localStorage.setItem("data_search_train_return", JSON.stringify(set_data_train_search))

    toReturnTrainReg()
}

function toAddPaxTrainReg(){
    window.location.href = "/kairegular"
}

function toReturnTrainReg(){
    window.location.href = "/kai/reg/return"
}

function setPaxTrain(id){
    $.LoadingOverlay("show")
    var vendor = $("#getVendTrainReg"+ id ).val()
    var org = $("#getOrgTrainReg"+ id ).val()
    var des = $("#getDesTrainReg"+ id ).val()
    var number = $("#getTrainNumber"+ id).val()
    var subclas = $("#getSubClassKrlReg" + id).val()
    var clas = $("#getClassKrlReg" + id).val()
    var adpric = $("#getAdlPricKrlReg" + id).val()
    var adispric = $("#getAdlDisPricKrlReg" + id).val()
    var inpric = $("#getInfDisPricKrlReg" + id).val()
    var indispric = $("#getInfPricKrlReg" + id).val()
    
    var name = $("#name_train" + id).val()
    var depart_date = $("#startDate_krl_reg" ).val()

    var true_date = new Date(depart_date)
    var options = { year: 'numeric', month: '2-digit', day: '2-digit'};
    var dateString = true_date.toLocaleDateString('en-US', options);
    var dateStrDpart = moment(dateString).format('YYYY-MM-DD');
   
    var token = JSON.parse(localStorage.getItem('data_token'))
    var pax_request = JSON.parse(localStorage.getItem('data_pax'))
    var maxLoopPaxAd = pax_request[0].adult;
    var maxLoopPaxIn = pax_request[1].infant;

    var type_trip = $("#type_trip" ).val()
    if(type_trip == "OneWay"){
        var dateStrReturn =""
    }else if(type_trip == "RoundTrip"){
        var endDate = $("#endDate_krl_reg" ).val()

        var true_date = new Date(endDate)
        var options = { year: 'numeric', month: '2-digit', day: '2-digit' };
        var dateString = true_date.toLocaleDateString('en-US', options);
        var dateStrReturn = moment(dateString).format('YYYY-MM-DD');
    }
    var token_set = token['access_token']
    var url = fetch(mainurl +'train/booking_cart',{
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token_set,
        },
        body: JSON.stringify({
            "data_schedule_depart": {
                "origin": org,
                "destination": des,
                "departure_date": dateStrDpart,
                "return_date": dateStrReturn,
                "transporter_no": number,
                "transporter_class": clas,
                "transporter_sub_class": subclas,
                "vendor_id": vendor,
                "adult_price": adpric,
                "adult_discounted_price": adispric,
                "infant_price": inpric,
                "infant_discounted_price": indispric
            },
            "data_schedule_return": {
            },
            "data_pax": {
                "adult": maxLoopPaxAd,
                "infant": maxLoopPaxIn
            }
        }),
      }).then((response) => response.json()).then((responseData) => {
        $.LoadingOverlay("hide")
        console.log(responseData)
        localStorage.setItem("data_train_depart_cart", JSON.stringify(responseData.data.depart_cart.id))
        
        toAddPaxTrainReg()
       
    })  

}

