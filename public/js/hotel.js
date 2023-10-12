
let data_search_hotel = {}

function formHotel(){
    $("#formMiceview").empty()
    $("#tabel_kereta_regular").empty()
    $("#formOdrPesawat").empty()
    $("#formOdrHotelview").empty()
    $("#formOdrHotelview").removeClass('d-none')
    $("#tabel_kereta_regular").addClass('d-none')
    $("#formKrlWisview").addClass('d-none')
    $("#formKrlLuarBiasaview").addClass('d-none')
    $("#formKrlIstview").addClass('d-none')
    $("#formKrlReg").addClass('d-none')
    $("#formKrlRegview").addClass('d-none')
    
    $("#sideMice").removeClass('text-warning');
    $("#sideKrlWis").removeClass('text-warning')
    $("#sideKrlReg").removeClass('text-warning')
    $("#sideKrlLuarBiasa").removeClass('text-warning')
    $("#sideKrlIstimewa").removeClass('text-warning') 
    $("#sideHotel").addClass('text-warning') 
    $("#sideOdrPesawat").removeClass('text-warning') 

    $("#tabel_pesawat" ).addClass('d-none')
    $("#tabel_kereta").addClass('d-none'); 
    
        var currentdate = new Date();
        var viewDate = moment(currentdate).format('DD MMMM YYYY');
        var viewDateReturn = moment(viewDate).add(1, "day").format('DD MMMM YYYY');

                var datahtml = `
                    <h6 class="font-weight-normal text-center text-uppercase text-colors-on"> <b>Cari Hotel</b></h6>
                    <hr>
                    <div class="row">
                        <div class="form-group col-8">
                            <label for="id_label_single" class="col-12">
                                Kota atau nama hotel:
                                <select class="js-example-basic-single js-states form-control" id="id_label_single">
                                </select>
                                <div class="invalid-feedback-id_label_single text-colors-block"></div>
                            </label>
                        </div>
                        <div class="form-group col-2">
                            <label for="type">Dewasa: </label>
                           <select class="form-control" id="adult_hotel" name="adult_hotel" required>
                                <option value="1" selected>1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback-adult text-colors-block"></div>
                        </div>
                        <div class="form-group col-2">
                            <label for="type">Anak: </label>
                           <select class="form-control" id="child_hotel" name="child_hotel" required>
                                <option value="0" selected>0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Isian ini wajib diisi.</div>
                        </div>
                    </div>
                    <!-- <br> -->
                    <div class="row ">
                        <div class="form-group col-2">
                            <label for="type">Kamar: </label>
                           <select class="form-control" id="kamar" name="kamar" required>
                                <option value="1" selected>1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback-kamar text-colors-block"></div>
                        </div>
                        <div class="form-group col-3">
                            <label for="type">Check-in: <span class="text-danger">*</span></label>
                            <input  class="form-control inputVal" type="text" id="date_in_hotel" name="date_in_hotel" value="" placeholder="`+viewDate+`"/>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback-date_in_hotel text-colors-block"></div>
                        </div>
                        <div class="form-group col-3">
                            <label for="type">Durasi: </label>
                            <div class="row" style="margin-left: 1px;">
                            <select class="form-control" id="jumlah_malam" name="jumlah_malam" required>
                                    `+dropdownDaysNight()+`
                            </select>
                            </div>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Isian ini wajib diisi.</div>
                        </div>
                        <div class="form-group col-4">
                            <label for="type">Check-out: </label><br>
                            <h6 style="margin-top: 10px;"><b id="check_out"> `+viewDateReturn+` </b></h6>
                            <input type="text" id="date_out_hotel" name="date_out_hotel" value="" hidden/>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Isian ini wajib diisi.</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            
                        </div>
                        <button class="btn btn-block col-3 md-auto top-100 start-50 main-color" onclick="setDataHotelSearch()"><b class="text-colors-off"><i class="fa fa-search mr-1"></i> Cari Hotel </b></button>
                    </div> `
            $("#formOdrHotelview" ).append(datahtml) 

            $('#adult').on('change',function(){
                var dul = $(this).val();
                var inf = $('#kamar').val()
                if(inf > dul){

                    $("#adult").addClass("is-invalid")
                    $("#adult").addClass("border-danger")
                    $(".invalid-feedback-adult").css("display", "block").html("jumlah Dewasa tidak boleh kurang dari jumlah Kamar!")
                    
                   }else if(inf <= dul){

                    $("#adult").removeClass("is-invalid")
                    $("#adult").removeClass("border-danger")
                    $(".invalid-feedback-adult").css("display", "none").html()

                    $("#kamar").removeClass("is-invalid")
                    $("#kamar").removeClass("border-danger")
                    $(".invalid-feedback-kamar").css("display", "none").html()
                }

                if(dul == 0 || dul == ""){
                    $("#adult").addClass("is-invalid")
                    $("#adult").addClass("border-danger")
                    $(".invalid-feedback-adult").css("display", "block").html("jumlah Dewasa tidak boleh kosong!")
                }
            })

            $('#kamar').on('change',function(){
                var inf = $(this).val();
                var dul = $('#adult').val()

               if(inf > dul){
                $("#kamar").addClass("is-invalid")
                $("#kamar").addClass("border-danger")
                $(".invalid-feedback-kamar").css("display", "block").html("jumlah Kamar tidak boleh lebih dari jumlah Dewasa!")

               }else if(inf <= dul){
                $("#kamar").removeClass("is-invalid")
                $("#kamar").removeClass("border-danger")
                $(".invalid-feedback-kamar").css("display", "none").html()

                $("#adult").removeClass("is-invalid")
                $("#adult").removeClass("border-danger")
                $(".invalid-feedback-adult").css("display", "none").html()
               }
            })
            // new DateTimePicker(document.getElementById('date_in_hotel'), {
            //     format: 'dd/mm/yyyy'
            // });
            var startdt = $('#date_in_hotel').datetimepicker({
                format:'d M Y',
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
                    var kali = $("#jumlah_malam").val()
                    var true_date = new Date(minDates)
                    var addDay = moment(true_date).add(kali, "day");
                    var viewDate = addDay.format('DD MMMM YYYY');
                    var Date_true = addDay.format('YYYY-MM-DD');
                    var date_out_display = `<b id="check_out"> `+viewDate+` </b>`;
                    $('#check_out').replaceWith(date_out_display)
                    $('#date_out_hotel').val(Date_true)

                    $("#date_in_hotel").removeClass("is-invalid").removeClass("border-danger")
                    $(".invalid-feedback-date_in_hotel").css("display", "none")
                }
            });
            // $('#date_in_hotel').on("change", function(){
            //     $('#jumlah_malam').val(1).selected == "";
            // })

            $("#jumlah_malam").on("change", function(){
                
                var in_date = $('#date_in_hotel').val()
                if(in_date == null || in_date == ""){

                    $("#date_in_hotel").addClass("border-danger")
                    $(".invalid-feedback-date_in_hotel").css("display", "block").html("Tanggal Check-in tidak boleh kosong!")

                }else{
                    $("#date_in_hotel").removeClass("is-invalid").removeClass("border-danger")
                    $(".invalid-feedback-date_in_hotel").css("display", "none")

                    var kali = $(this).val()
                    var true_date = new Date(in_date)
                    var addDay = moment(true_date).add(kali, "day");
                    var viewDate = addDay.format('DD MMMM YYYY');
                    var Date_true = addDay.format('YYYY-MM-DD');
                    var date_out_display = `<b id="check_out"> `+viewDate+` </b>`;
                    $('#check_out').replaceWith(date_out_display)
                    $('#date_out_hotel').val(Date_true)

                }
            });

            var token = JSON.parse(localStorage.getItem('data_token'))
            var token_set = token['access_token']
            // console.log($(".select2-search__field").val())
            $('.js-example-basic-single').select2({
                ajax: {
                  url: mainurl+ 'hotel/search_loc',
                  method: 'GET',
                  headers: {
                      'Accept': 'application/json',
                      'Content-Type': 'application/json',
                      'Authorization': 'Bearer ' + token_set,
                     
                  },
                  delay: 250,
                  data: function (params) {
                    console.log(params)
                    return {
                        page: 1,
                        size: 10,
                        search: params.term
                    }
                  },
                  processResults: function (response) {
                    console.log(response.data)
                    var max_data = response.data
                    var data_hotel = [];

                    for(var i = 0; i < max_data.length; i++ ){

                        var data_isi_hotel = {
                            "id": JSON.stringify(max_data[i]),
                            "text":max_data[i].name,
                        }
                        data_hotel.push(data_isi_hotel)
                    }
                    return {
                        results: data_hotel
                    };
                },
                cache :true
                }
            });
}

function dropdownDaysNight(){
    var options = '';
    for(var i = 1; i <= 30; i++){
        if(i == 1){
        options += '<option value='+ i +' selected> '+ i +' Malam </option>';
        }else{
        options += '<option value='+ i +'> '+ i +' Malam </option>';
        }
    }
    return options;
}

function setDataHotelSearch(){
    
    if($("#date_out_hotel").val() == null || $("#date_out_hotel").val() == ""){
        toastr.error("Gagal Mencari Hotel, periksa kembali data form pencarian anda", "Error")
    }else if($(".js-example-basic-single").val() == null || $(".js-example-basic-single").val() == ""){
        $("#id_label_single").addClass("border-danger")
        $(".invalid-feedback-id_label_single").css("display", "block").html("Field ini tidak boleh kosong!")
        toastr.error("Gagal Mencari Hotel, periksa kembali data form pencarian anda", "Error")
    }else{
        $("#id_label_single").removeClass("border-danger")
        $(".invalid-feedback-id_label_single").css("display", "none")

        $.LoadingOverlay("show")
        var kota_search_hotel = JSON.parse($(".js-example-basic-single").val())
        var dat_in_hotel = $("#date_in_hotel").val()
        var dat_after_format = moment(dat_in_hotel).format('YYYY-MM-DD');
        var dat_out_hotel = $("#date_out_hotel").val()
        var adult_hotel = $("#adult_hotel").val()
        var child_hotel = $("#child_hotel").val()
        var kamar = $("#kamar").val()
        var datasetPax = [
            {
                "adult" : adult_hotel
            },
            {
                "child" : child_hotel
            },
        ]
        // console.log(data);
        localStorage.setItem("data_pax", JSON.stringify(datasetPax))

        if (kota_search_hotel.tags == "City") {

            var token = JSON.parse(localStorage.getItem('data_token'))
            var token_set = token['access_token']
            var url = fetch(mainurl +'hotel/search_hotel',{
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + token_set,
            },
            body: JSON.stringify({
                "tags": kota_search_hotel.tags,
                "hotel_id": "",
                "city_id": JSON.stringify(kota_search_hotel.city_id),
                "country_id": kota_search_hotel.country_id,
                "check_in_date": dat_after_format,
                "check_out_date": dat_out_hotel,
                "guest_adult_amount": adult_hotel,
                "guest_child_amount": child_hotel,
                "guest_child_ages": [],
                "guest_child_bed": false,
                "room_amount": 1,
                "is_paging": 1,
                "page": 10,
                "size": 10
            }),
            }).then((response) => response.json()).then((responseData) => {
            var hotel = responseData.data.data;
            console.log(responseData)
                if(responseData.success == true){
                    if(hotel.length != 0 ){

                        $("#formlistHotel").empty()
                        $.LoadingOverlay("hide")
                        let list_icon = []
                        for(var i = 0; i< hotel.length; i++){

                            var no =i+1
                                setPaxLght = `
                                <div class="card shadow p-3 mb-2 bg-body rounded">
                                    <label for="`+hotel[i].ID +`" class="col-12">
                                        <div class="row">
                                            <img src="`+hotel[i].logo+`" alt="Logo" height="150" width="200" mt-n1 mr-2">
                                            <div class="col-8">
                                                <div> <b style="font-size:15px;"> `+hotel[i].name+`</b></div>
                                                <div> <b>` + bintangRating(hotel[i].rating) + `</b></div><br>
                                                <div id="descrip" style="maxLength: 10;">`+hotel[i].address+`</div><br>
                                                <div id="descrip" style="maxLength: 10;">`+listFasilities(hotel[i].facilities)+`</div><br>
                                                <div id="descrip" style="maxLength: 10;">Rp.`+formatPrice(hotel[i].priceStart)+`</div>
                                                <a id="" style="font-size:15px; margin-left: 90% ; margin-top:-80%;" href="javascript:void(0);" onclick="pilihHotel(`+no+`)"><b class="text-colors-on"> Pilih</b></a>
                                                <input id="hotel_id`+no +`" value="`+hotel[i].ID+`" hidden></input>
                                            </div> 
                                        </div>
                                    </label>
                                </div> `;

                                $("#hotelListLocation").removeClass('d-none');
                                $("#formlistHotel").append(setPaxLght);      
                        }
                     
                    }else{
                        $.LoadingOverlay("hide")
                        toastr.warning("Perncarian Berhasil, Maaf daftar hotel tidak ditemukan!", "Warning")
                    }
                }else{
                    $.LoadingOverlay("hide")
                    toastr.warning("Perncarian Berhasil, Maaf daftar hotel tidak ditemukan!", "Warning")
                }
            });
        }else if(kota_search_hotel.tags == "Hotel"){

            var product = "hotel"
            localStorage.setItem("product_payment", JSON.stringify(product))
            $.LoadingOverlay("hide")
            $("#hotelListLocation").addClass('d-none');
            $("#formlistHotel").empty()
            data_search_hotel.check_in_date = moment(dat_in_hotel).format("YYYY-MM-DD")
            data_search_hotel.check_out_date = moment(dat_out_hotel).format("YYYY-MM-DD")
            data_search_hotel.tags = kota_search_hotel.tags
            data_search_hotel.city_id = kota_search_hotel.city_id
            data_search_hotel.hotel_id = kota_search_hotel.id
            data_search_hotel.country_id = kota_search_hotel.country_id
            data_search_hotel.guest_adult_amount = adult_hotel
            data_search_hotel.guest_child_amount = child_hotel
            data_search_hotel.room_amount = kamar
            data_search_hotel.guest_child_ages = []
            data_search_hotel.guest_child_bed = false
            data_search_hotel.is_paging = 1
            data_search_hotel.page = 1
            data_search_hotel.size = 1000

            localStorage.setItem("data_hotel_search", JSON.stringify(data_search_hotel))
            cariDetailHotel()
        }  
    }
    
    
}

function bintangRating(rating){
    var og = rating + 1    
    var n =[]
    for( var i = 1 ; i < og; i++ ) {
        var hj = '<span class="fa fa-star mr-1 text-colors-on"></span>';
        n.push(hj)
    };
    var n_naxt = n.join("")
    return n_naxt
}

function pilihHotel(id){
    $.LoadingOverlay("hide")
    var dat_in_hotel = $("#date_in_hotel").val()
    var dat_out_hotel = $("#date_out_hotel").val()
    var adult_hotel = $("#adult_hotel").val()
    var child_hotel = $("#child_hotel").val()
    var kamar = $("#kamar").val()
    var tags_hotel = JSON.stringify($("#tags_hotels" + id).val())
    var hotel_id = $("#hotel_id" + id).val()
    var city_id = $("#city_id" + id).val()
    var country_id = $("#country_id" + id).val()

    var kota_search_hotel = JSON.parse($(".js-example-basic-single").val())
    
    // console.log(hotel_id)
    data_search_hotel.check_in_date = moment(dat_in_hotel).format("YYYY-MM-DD")
    data_search_hotel.check_out_date = moment(dat_out_hotel).format("YYYY-MM-DD")
    data_search_hotel.tags = "Hotel"
    data_search_hotel.city_id = JSON.stringify(kota_search_hotel.city_id)
    data_search_hotel.hotel_id = hotel_id
    data_search_hotel.country_id = kota_search_hotel.country_id
    data_search_hotel.guest_adult_amount = adult_hotel
    data_search_hotel.guest_child_amount = child_hotel
    data_search_hotel.room_amount = kamar
    data_search_hotel.guest_child_ages = []
    data_search_hotel.guest_child_bed = false
    data_search_hotel.is_paging = 1
    data_search_hotel.page = 1
    data_search_hotel.size = 10
    var product = "hotel"
    localStorage.setItem("product_payment", JSON.stringify(product))
     localStorage.setItem("data_hotel_search", JSON.stringify(data_search_hotel))
     cariDetailHotel()
}

function cariDetailHotel(){
    window.location.href = "/hotel";
}