@extends('layout.payment_proses')

@section('content')
<div class="container-fluid mt-100 main-font">
    <div class="row" id="body-sidemenu">
        <div id="main-content" class="col with-fixed-sidebar pb-5 pt-3" style="margin-top:20px;">
            <div class="container">
                <div class="row">
                    <div class="col-9 pt-2"><br>
                        <h5 class=" font-weight-normal text-center text-uppercase text-colors-on"> <b>Fasilitas Tambahan</b></h5>
                            <hr>

                        <div class="card shadow p-3 mb-5 bg-body rounded d-none" id="seat_flight"></div>
                        <div class="card shadow p-3 mb-5 bg-body rounded d-none" id="baggage"></div>
                        <div class="card shadow p-3 mb-5 bg-body rounded d-none" id="meals"></div>

                        <div class="col-4 d-none" id="button_booking_flight" style="float: right;"> 
                            <button class="btn btn-block main-color" onclick="dataBookValidate()"> <b class="text-colors-off"><i class="fa fa-chevron-circle-right mr-1"></i> Selanjutnya</b></button>
                        </div>
                    </div>
                    
                    <div class="pt-2 col-3 d-none" id="detail_pesawat">
                        <div class="card shadow-sm col-12">
                            <div class="card-body">
                                <div class="row" style="margin-top: 15px; margin-left: 0.5px;">
                                    <h6 id="rute_asal"></h6>
                                        <h6 style="margin-left: 10px;">
                                            <i class="fa fa-arrow-right text-colors-on"></i>
                                        </h6 > 
                                    <h6 id="rute_tujuan" style="margin-left: 10px;"></h6>
                                </div>
                                <hr style="margin-top: -10px;">
                                <div class="row" style="margin-left: 0.5px; font-size: 15px;">
                                    <b id="pesawat"></b><b id="no_pesawat"></b>
                                </div>
                                <div id="class_pesawat" style="font-size: 12px;"></div>
                                <hr>
                                <div>
                                    Keberangkatan : <b id="date_scadule_depart"></b>
                                </div>
                                <div>
                                    Sampai : <b id="date_scadule_arrive"></b>
                                </div>
                            </div>
                        </div>
                        <div class="card shadow-sm col-12 mt-2">
                            <div class="card-body">
                                <div class="row" style="margin-top: 15px; margin-left: 0.5px;">
                                    <h6 class="text-colors-on"><b>Data Penumpang</b> </h6><br>
                                    <div id="penumpang_pesawat" ></div>
                                </div>
                                <hr style="margin-top: -10px;">
                            </div>
                        </div>
                    </div>

                    <div class="pt-2 col-3 d-none" id="detail_pesawat_roundtrip">
                        <div class="card shadow-sm col-12">
                            <div class="card-body">
                                <div class="row" style="margin-top: 15px; margin-left: 0.5px;">
                                    <h6 id="rute_asal_dpt"></h6>
                                        <h6 style="margin-left: 10px;">
                                            <i class="fa fa-exchange text-colors-on"></i>
                                            <!-- <i id="scadule_rd" class="fa fa-arrow-left text-colors-on"></i> -->
                                        </h6 > 
                                    <h6 id="rute_tujuan_dpt" style="margin-left: 10px;"></h6>
                                </div>
                                <hr style="margin-top: -10px;">
                                <h6 class="text-colors-on"><b>Pesawat Berangkat</b> </h6>
                                <div class="row" style="margin-left: 0.5px;">
                                    <b id="pesawat_dpt"></b> <b id="no_pesawat"></b>
                                </div>
                                    <div id="class_pesawat_dpt"></div><br>
                                <div>
                                    Keberangkatan : <b id="date_scadule_depart_dpt"></b>
                                </div>
                                <div>
                                    Sampai : <b id="date_scadule_arrive_dpt"></b>
                                </div>
                                <hr>
                                <h6 class="text-colors-on"><b>Pesawat Pulang</b> </h6>
                                <div class="row" style="margin-left: 0.5px;">
                                    <b id="pesawat_rtn"></b>  <b id="no_pesawat"></b>
                                </div>
                                    <div id="class_pesawat_rtn"></div><br>
                                <div>
                                    Keberangkatan : <b id="date_scadule_depart_rtn"></b>
                                </div>
                                <div>
                                    Sampai : <b id="date_scadule_arrive_rtn"></b>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="card shadow-sm col-12 mt-2">
                            <div class="card-body">
                                <div class="row" style="margin-top: 15px; margin-left: 0.5px;">
                                    <h6 class="text-colors-on"><b>Data Penumpang</b> </h6>
                                </div>
                                <hr style="margin-top: -10px;">
                            </div>
                        </div> -->
                    </div>
            </div>
        </div><!-- Main Col -->
    </div><!-- body-row -->
<div id="codeBooking"></div>
<div id="modalBooking"></div>
<div id="modalPilihKursiPesawat"></div>
<div id="modalPilihBagasiPesawat"></div>
<div id="modalPilihMealsPesawat"></div>
</div><!-- .container-fluid-->


@endsection

@push('scripts')
<script>

    $.LoadingOverlay("show")
    $("#data_pax_navbar_flight" ).addClass('text-colors-on')
    $("#fasilitas_navbar_flight" ).addClass('text-colors-on')
    let data_book_flight_addons = {};

    var data_flight = JSON.parse(localStorage.getItem('data_flight_details'))
    var pax_request = JSON.parse(localStorage.getItem('data_pax'))
    var token = JSON.parse(localStorage.getItem('data_token'))
    var name_order = JSON.parse(localStorage.getItem('name_auth'));
    var email = JSON.parse(localStorage.getItem('user_email'));

    var data_flight_return = JSON.parse(localStorage.getItem('data_flight_return'))
    // console.log(data_flight_return['id_return'])
    var adl_flight_pax = JSON.parse(localStorage.getItem('data_pax_adl'))
    var paxDataCh = JSON.parse(localStorage.getItem('data_pax_chd'))
    var paxDataIn = JSON.parse(localStorage.getItem('data_pax_inf'))
    var type_trip = JSON.parse(localStorage.getItem('type_trip'))
    var pax_adl_all =[]
    for(i = 0; i < adl_flight_pax.length ; i++){
        pax_adl_all.push(adl_flight_pax[i])
    }
    var pax_chd_all =[]
    for(i = 0; i < paxDataCh.length; i++){
        pax_chd_all.push(paxDataCh[i])
    }
    var pax_inf_all =[]
    for(i = 0; i < paxDataIn.length; i++){
        pax_inf_all.push(paxDataIn[i])
    }

    if((pax_chd_all == []) & (pax_inf_all == [])){
        var all_pax = pax_adl_all; 
    }else if(pax_chd_all == []){
        var all_pax = pax_adl_all.concat(pax_inf_all); 
    }else if(pax_inf_all== []){
        var all_pax = pax_adl_all.concat(pax_chd_all); 
    }else{
        var all_pax = pax_adl_all.concat(pax_chd_all, pax_inf_all); 
    }
    console.log(all_pax)

    if(data_flight['types_trip'] == "OneWay"){
        var retrn_id = ""

    }else if(data_flight['types_trip'] == "RoundTrip"){
        var retrn_id = data_flight_return['id_return']
    }
    // console.log(tes);
    var token_set = token['access_token']
    var url = fetch(mainurl +'flight/get_add_on',{
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token_set,
        },
        body: JSON.stringify({
            "id_schedule_departure": data_flight['id_depart'],
            "id_schedule_return": retrn_id,
            "contact_title": "MR",
            "contact_email": email,
            "contact_first_name": name_order,
            "contact_last_name": "tes",
            "contact_country_code_phone": "62",
            "contact_area_code_phone": "812",
            "contact_remaining_phone": "87627241",
            "insurance": "",
            "pax_details": all_pax
        }),
      }).then((response) => response.json()).then((responseData) => {
        console.log(responseData)
        var addOns = responseData.data.baggageAddOns[0].baggageInfos
        if(addOns != null ){
            var n = {}
            localStorage.setItem("data_book_flight_addons_bagasi",JSON.stringify(n))
            localStorage.setItem("data_book_flight_addons_bagasi_return",JSON.stringify(n))
        }
        $("#button_booking_flight" ).removeClass('d-none')
        if(data_flight['types_trip'] == "OneWay"){
            $("#detail_pesawat").removeClass('d-none');

            $("#pesawat").append(data_flight['name'])
            $("#class_pesawat").append(data_flight['class'])
            $("#rute_asal").append(data_flight['org'])
            $("#rute_tujuan").append(data_flight['des'])
            $("#date_scadule_depart").append(data_flight['depart'])
            $("#date_scadule_arrive").append(data_flight['arrive'])
           
            if(responseData.data.baggageAddOns[0].baggageInfos != null){
                var bagasi = responseData.data.baggageAddOns[0].baggageInfos

                var seatpesawat = ` <div class="col-12" id="seat">
                        <h1 class="h6 font-weight-normal text-uppercase"> <b> Pilih Kursi </b></h1><hr>
                        <div style="float: right;" class="col-2"> 
                            <button class=" btn btn-block main-color" onclick="enableLoading(); modalPilihSeatPesawat()"> <b class="text-colors-off"><i class="fa fa-check mr-1"></i> Pilih</b></button>
                        </div>
                </div>`
                $("#seat_flight" ).removeClass('d-none')
                $("#seat_flight").append(seatpesawat)

                var bagasipesawat = ` <div class="col-12" id="bagasi_form">
                        <h1 class="h6 font-weight-normal text-uppercase"> <b> Pilih Bagasi </b></h1><hr>
                        <div style="float: right;" class="col-2"> 
                            <button class=" btn btn-block main-color" onclick="enableLoading(); modalPilihBagasi()"> <b class="text-colors-off"><i class="fa fa-suitcase mr-1"></i> Pilih</b></button>
                        </div>
                </div> `
                $("#baggage" ).removeClass('d-none')
                $("#baggage").append(bagasipesawat)

                var mealspesawat = ` <div class="col-12" id="meals">
                        <h1 class="h6 font-weight-normal text-uppercase"><b> Pilih Meals </b></h1><hr>
                        <div style="float: right;" class="col-2"> 
                            <button class=" btn btn-block main-color" onclick="enableLoading(); modalPilihMeals()"> <b class="text-colors-off"><i class="fa fa-life-ring mr-1"></i> Pilih</b></button>
                        </div>
                </div> `
                $("#meals" ).removeClass('d-none')
                $("#meals").append(mealspesawat)


            }else{
                var bagasipesawat = ` <div class="col-12" id="bagasi_form">
                <h1 class="h6 font-weight-normal text-uppercase"> <b> Pilih Bagasi </b></h1><hr>
                        <center><b>Untuk Maskapai ini Layanan Tidak Tersedia</b></center>
                </div> `
                $("#baggage" ).removeClass('d-none')
                $("#baggage").append(bagasipesawat)

                var meals = ` <div class="col-12" id="meals_form">
                <h1 class="h6 font-weight-normal text-uppercase"> <b> Pilih Meals </b></h1><hr>
                        <center><b>Untuk Maskapai ini Layanan Tidak Tersedia</b></center>
                </div> `
                $("#meals" ).removeClass('d-none')
                $("#meals").append(meals)

                var seat = ` <div class="col-12" id="seat_form">
                <h1 class="h6 font-weight-normal text-uppercase"> <b> Pilih Seat </b></h1><hr>
                       <center><b>Untuk Maskapai ini Layanan Tidak Tersedia</b></center>
                </div> `
                $("#seat_flight" ).removeClass('d-none')
                $("#seat_flight").append(seat)
            }
            $.LoadingOverlay("hide")

        }else if(data_flight['types_trip'] == "RoundTrip"){
            // $("#detail_pesawat").removeClass('d-none');
            $("#detail_pesawat_roundtrip").removeClass('d-none');
            $("#pesawat_dpt").append(data_flight['name'])
            $("#class_pesawat_dpt").append(data_flight['class'])
            $("#rute_asal_dpt").append(data_flight['org'])
            $("#rute_tujuan_dpt").append(data_flight['des'])
            var date_dpart = reformatDateListFlight(data_flight['depart'])
            var date_return = reformatDateListFlight(data_flight['arrive'])
            $("#date_scadule_depart_dpt").append(``+date_dpart.date+` - `+date_dpart.time+``)
            $("#date_scadule_arrive_dpt").append(``+date_return.date+` - `+date_return.time+``)
            var date_dpart_rtn = reformatDateListFlight(data_flight_return['depart'])
            var date_return_rtn = reformatDateListFlight(data_flight_return['arrive'])
            $("#pesawat_rtn").append(data_flight_return['name'])
            $("#class_pesawat_rtn").append(data_flight_return['class'])
            $("#rute_asal_rtn").append(data_flight_return['org'])
            $("#rute_tujuan_rtn").append(data_flight_return['des'])
            $("#date_scadule_depart_rtn").append(``+date_dpart_rtn.date+` - `+date_dpart_rtn.time+``)
            $("#date_scadule_arrive_rtn").append(``+date_return_rtn.date+` - `+date_return_rtn.time+``)

            if(responseData.data.baggageAddOns[0].baggageInfos != null){
                var bagasi = responseData.data.baggageAddOns[0].baggageInfos

                var seatpesawat = ` <div class="col-12" id="seat">
                <h1 class="h6 font-weight-normal text-uppercase"> <b> Pilih Kursi </b></h1><hr>
                <div class="row col-12" style="float: right;" >
                <div class="col-6"></div>
                    <div class="col-3"> 
                        <button class=" btn btn-block main-color" onclick="enableLoading(); modalPilihSeatPesawat()"> <b class="text-colors-off"><i class="fa fa-check mr-1"></i> Departure</b></button>
                    </div>
                    <div class="col-3"> 
                        <button class=" btn btn-block main-color" onclick="enableLoading(); modalPilihSeatPesawatReturn()"> <b class="text-colors-off"><i class="fa fa-check mr-1"></i> Return</b></button>
                    </div>
                </div>
                </div> `
                $("#seat_flight" ).removeClass('d-none')
                $("#seat_flight").append(seatpesawat)

                var bagasipesawat = ` <div class="col-12" id="bagasi_form">
                <h1 class="h6 font-weight-normal text-uppercase"> <b> Pilih Bagasi </b></h1><hr>
                <div class="row col-12" style="float: right;" >
                    <div class="col-6"></div>
                        <div class="col-3"> 
                            <button class=" btn btn-block main-color" onclick="enableLoading(); modalPilihBagasi()"> <b class="text-colors-off"><i class="fa fa-suitcase mr-1"></i> Departure</b></button>
                        </div>
                        <div class="col-3"> 
                            <button class=" btn btn-block main-color" onclick="enableLoading(); modalPilihBagasiReturn()"> <b class="text-colors-off"><i class="fa fa-suitcase mr-1"></i> Return</b></button>
                        </div>
                    </div>
                </div> `
                $("#baggage" ).removeClass('d-none')
                $("#baggage").append(bagasipesawat)

                var mealspesawat = ` <div class="col-12" id="meals">
                <h1 class="h6 font-weight-normal text-uppercase"> <b> Pilih Meals </b></h1><hr>
                <div class="row col-12" style="float: right;" >
                    <div class="col-6"></div>
                        <div class="col-3"> 
                            <button class=" btn btn-block main-color" onclick="enableLoading(); modalPilihMeals()"> <b class="text-colors-off"><i class="fa fa-life-ring  mr-1"></i> Departure</b></button>
                        </div>
                        <div class="col-3"> 
                            <button class=" btn btn-block main-color" onclick="enableLoading(); modalPilihMealsReturn()"> <b class="text-colors-off"><i class="fa fa-life-ring  mr-1"></i> Return</b></button>
                        </div>
                    </div>
                </div>`
                $("#meals" ).removeClass('d-none')
                $("#meals").append(mealspesawat)

            }else{
                
                var bagasipesawat = ` <div class="col-12" id="bagasi_form">
                <h1 class="h6 font-weight-normal text-uppercase"> <b> Pilih Bagasi </b></h1><hr>
                        <center><b>Untuk Maskapai ini Layanan Tidak Tersedia</b></center>
                </div> `
                $("#baggage" ).removeClass('d-none')
                $("#baggage").append(bagasipesawat)

                var meals = ` <div class="col-12" id="meals_form">
                <h1 class="h6 font-weight-normal text-uppercase"> <b> Pilih Meals </b></h1><hr>
                        <center><b>Untuk Maskapai ini Layanan Tidak Tersedia</b></center>
                </div> `
                $("#meals" ).removeClass('d-none')
                $("#meals").append(meals)

                var seat = ` <div class="col-12" id="seat_form">
                <h1 class="h6 font-weight-normal text-uppercase"> <b> Pilih Seat </b></h1><hr>
                       <center><b>Untuk Maskapai ini Layanan Tidak Tersedia</b></center>
                </div> `
                $("#seat_flight" ).removeClass('d-none')
                $("#seat_flight").append(seat)
            }
            $.LoadingOverlay("hide")
        }
        
    });

    function dataBookValidate(){
        $.LoadingOverlay("hide")
        var datahtml = `
        <div class="modal fade" id="modalConfirmBooking">
            <div class="modal-dialog modal-sm modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title"><b class="text-colors-on">Booking Confirmation</b></h5>
                        <button type="button" class="close" data-dismiss="modal">×</button>
                    </div><br>
                    <center><b> <i class="fa fa-exclamation-triangle fa-2x text-colors-on"></i> </b></center> 
                    <center><b>Pastikan anda telah mengisi data penumpang dengan benar </b></center>
                    <br>
                    <div class="modal-footer">
                        <button type="button" class="btn main-color" id="bottonBook" onclick="bookingFlight()"><b class="text-colors-off"><i class="fa fa-check mr-1"></i>Ya</b></button>
                        <button type="button" class="btn btn-light" data-dismiss="modal"><i class="fa fa-times mr-1"></i>Kembali</button>
                    </div>
                </div>
            </div>
        </div> `
        $("#modalBooking").append(datahtml)
        $("#modalConfirmBooking").modal('show')  
    }

    function modalPilihSeatPesawat(){
        $.LoadingOverlay("hide")
        $("#main").empty()
        var seat_book_in = JSON.parse(localStorage.getItem('data_book_flight_addons'));
        var datahtml = `
        <div class="modal fade" id="modalSeatFlight" data-keyboard="false" data-backdrop="static">
            <div style="height:600px; width:70%; margin: 0 auto;" class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-colors-on">Pilih Kursi</h5>
                        <button type="button" class="close" data-dismiss="modal" onclick="enableLoading();closeModalSeatFlight()">×</button>
                    </div><br>
                    <div class="row col-12">
                        <div class="col-6">
                            <div class="form-group col-6">
                                <label for="type">Type Penerbangan: </label>
                                <input class="form-control inputVal" id="type_flight" name="type_flight" type="text" value="" disabled/>
                                </select>
                            </div> <hr>
                            <div class="form-group col-6" >
                                <label for="type">Penumpang: </label>
                                    <select class="form-control" id="pax_list_seat" name="pax_list_seat" required>
                                    </select>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback-adult text-colors-block"></div>
                            </div>
                            <div class="row col-12">
                                <div class="col-4">
                                    <label for="type">Nomer Kursi:</label>
                                    <input class="form-control inputVal" id="nomer_kursi" name="nomer_kursi" type="text" value="" disabled/>
                                </div>
                                <div class="col-4">
                                    <label for="type">Harga Kursi:</label>
                                    <input class="form-control inputVal" id="harga_kursi" name="harga_kursi" type="text" value="" disabled/>
                                </div>
                            </div><br>
                            <div style="float: right;" class=""> 
                                <button type="button" class="btn btn main-color" id="bottonBook" onclick="saveSeat()"><b class="text-colors-off"><i class="fa fa-check mr-1" ></i>Simpan</b></button>
                            </div>
                        </div>
                        <div class=" col-6" >
                            <div class="row">
                                <div id="main" style="margin: 0 auto;" class="tambah-scroll">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn main-color d-none" id="bottonBookReturn" onclick="bookingFlight()"><b class="text-colors-off"><i class="fa fa-check mr-1" ></i>Pilih Kursi Kepulangan</b></button>
                        <button id="closeModalSeatFlight" type="button" class="btn btn-light" data-dismiss="modal" onclick="enableLoading();closeModalSeatFlight()"><i class="fa fa-times mr-1"></i>Kembali</button>
                    </div>
                </div>
            </div>
        </div> `
        $("#modalPilihKursiPesawat").append(datahtml)
        $("#modalSeatFlight").modal('show')
        getLayout()
        if(type_trip == "OneWay"){
            var dataOpt = "OneWay";
            $("#type_flight").val(dataOpt);

        }else if(type_trip == "RoundTrip"){
            var dataOpt = "RoundTrip";
            $("#type_flight").val(dataOpt);
        }

        for(var i = 0; i < all_pax.length; i++){
            var no = i+1
            var opts = `<option value="`+ no +`">`+ no +`-`+ all_pax[i].first_name+``+all_pax[i].last_name+`</option>`;
            $("#pax_list_seat").append(opts);
        }

        if(seat_book_in != undefined){
            $("#nomer_kursi").val(seat_book_in[0].number_seat)
            $("#harga_kursi").val(seat_book_in[0].price_seat)
        }
            
        $("#pax_list_seat").on('change', function(){
            $("#nomer_kursi").val('')
            $("#harga_kursi").val('Rp.'+ '')
            
            var seat_book_in = JSON.parse(localStorage.getItem('data_book_flight_addons'));
            if(seat_book_in == undefined){
                $("#nomer_kursi").val('')
                $("#harga_kursi").val('Rp.'+ '')
            }else{
                var data_flight_pax = seat_book_in
                for(var i = 0; i <data_flight_pax.length; i++){
                    var no = i+1
                    var ini = $(this).val()
                    if(no == ini){
                        $("#nomer_kursi").val(seat_book_in[i].number_seat)
                        $("#harga_kursi").val(seat_book_in[i].price_seat)
                    }
                }
            }
        });

    }

    function modalPilihSeatPesawatReturn(){
        $.LoadingOverlay("hide")
        $("#main").empty()
        var seat_book_in = JSON.parse(localStorage.getItem('data_book_flight_addons_return'));
        var datahtml = `
        <div class="modal fade" id="modalSeatFlightReturn" data-keyboard="false" data-backdrop="static">
            <div style="height:600px; width:70%; margin: 0 auto; "  class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-colors-on">Pilih Kursi Return</h5>
                        <button type="button" class="close" data-dismiss="modal" onclick="enableLoading(); closeModalSeatFlight()">×</button>
                    </div><br>
                    <div class="row col-12">
                        <div class="col-6">
                            <div class="form-group col-6">
                                <label for="type">Type Penerbangan: </label>
                                <input class="form-control inputVal" id="type_flight" name="type_flight" type="text" value="RoundTrip" disabled/>
                                </select>
                            </div> <hr>
                            <div class="form-group col-6" >
                                <label for="type">Penumpang: </label>
                                    <select class="form-control" id="pax_list_seat_return" name="pax_list_seat_return" required>
                                    </select>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback-adult text-colors-block"></div>
                            </div>
                            <div class="row col-12">
                                <div class="col-4">
                                    <label for="type">Nomer Kursi:</label>
                                    <input class="form-control inputVal" id="nomer_kursi_return" name="nomer_kursi_return" type="text" value="" disabled/>
                                </div>
                                <div class="col-4">
                                    <label for="type">Harga Kursi:</label>
                                    <input class="form-control inputVal" id="harga_kursi_return" name="harga_kursi_return" type="text" value="" disabled/>
                                </div>
                            </div><br>
                            <div style="float: right;" class=""> 
                                <button type="button" class="btn btn main-color" id="bottonBook" onclick="saveSeatReturn()"><b class="text-colors-off"><i class="fa fa-check mr-1" ></i>Simpan</b></button>
                            </div>
                        </div>
                        <div class=" col-6" >
                            <div class="row ">
                                <div id="main" style="margin: 0 auto;" class="tambah-scroll">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn main-color d-none" id="bottonBookReturn" onclick="bookingFlight()"><b class="text-colors-off"><i class="fa fa-check mr-1" ></i>Pilih Kursi Kepulangan</b></button>
                        <button id="closeModalSeatFlight" type="button" class="btn btn-light" data-dismiss="modal" onclick="enableLoading(); closeModalSeatFlight()"><i class="fa fa-times mr-1"></i>Kembali</button>
                    </div>
                </div>
            </div>
        </div> `
        $("#modalPilihKursiPesawat").append(datahtml)
        $("#modalSeatFlightReturn").modal('show')
        getLayoutReturn()

        for(var i = 0; i < all_pax.length; i++){
            var no = i+1
            var opts = `<option value="`+ no +`">`+ no +`-`+ all_pax[i].first_name+``+all_pax[i].last_name+`</option>`;
            $("#pax_list_seat_return").append(opts);
        }

        if(seat_book_in != undefined){
           
           $("#nomer_kursi_return").val(seat_book_in[0].number_seat)
       
           $("#harga_kursi_return").val(seat_book_in[0].price_seat)
  
       }

        $("#pax_list_seat_return").on('change', function(){
            $("#nomer_kursi_return").val('')
            $("#harga_kursi_return").val('Rp.'+ '')
            
            var seat_book_in = JSON.parse(localStorage.getItem('data_book_flight_addons_return'));
            if(seat_book_in == undefined){
                $("#nomer_kursi_return").val('')
                $("#harga_kursi_return").val('Rp.'+ '')
            }else{
                var data_flight_pax = seat_book_in
                for(var i = 0; i <data_flight_pax.length; i++){
                    var no = i+1
                    var ini = $(this).val()
                    if(no == ini){
                        $("#nomer_kursi_return").val(seat_book_in[i].number_seat)
                        $("#harga_kursi_return").val(seat_book_in[i].price_seat)
                    }
                }
            }
        });

    }

    function modalPilihBagasi(){
        $("#data_bagasi").empty()
        $.LoadingOverlay("hide")
        var seat_book_stand = JSON.parse(localStorage.getItem('data_book_flight_addons_bagasi'));
        var datahtml = `
        <div class="modal fade" id="modalBagasiFlight" data-keyboard="false" data-backdrop="static">
            <div style="height:600px; width:70%; margin: 0 auto;" class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-colors-on">Pilih Bagasi</h5>
                        <button type="button" class="close" data-dismiss="modal" onclick="enableLoading(); closeModalSeatFlight()">×</button>
                    </div><br>
                    <div class="row col-12">
                        <div class="col-6">
                            <div class="form-group col-6" >
                                <label for="type">Penumpang: </label>
                                    <select class="form-control" id="pax_list_baggage" name="pax_list_baggage" required>
                                    </select>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback-adult text-colors-block"></div>
                            </div>
                            <div class="row col-12">
                                <div class="col-7">
                                    <label for="type">Muat Berat:</label>
                                    <input class="form-control inputVal" id="muat_berat" name="muat_berat" type="text" value="" disabled/>
                                </div>
                                <div class="col-4">
                                    <label for="type">Harga:</label>
                                    <input class="form-control inputVal" id="muat_harga" name="muat_harga" type="text" value="" disabled/>
                                </div>
                            </div><br>
                            <div style="float: right;" class=""> 
                                <button type="button" class="btn btn main-color" id="bottonBook" onclick="saveBagasi()"><b class="text-colors-off"><i class="fa fa-check mr-1" ></i>Simpan</b></button>
                            </div>
                        </div>
                        <div class=" col-6" >
                            <div class="row ">
                                <div id="data_bagasi" style="margin: 0 auto;" >
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn main-color d-none" id="bottonBookReturn" onclick="bookingFlight()"><b class="text-colors-off"><i class="fa fa-check mr-1" ></i>Pilih Kursi Kepulangan</b></button>
                        <button id="closeModalBagasiFlight" type="button" class="btn btn-light" data-dismiss="modal" onclick=""><i class="fa fa-times mr-1"></i>Kembali</button>
                    </div>
                </div>
            </div>
        </div> `;
        $("#modalPilihBagasiPesawat").replaceWith(datahtml)
        $("#modalBagasiFlight").modal('show')
        getBagasi()
        if(type_trip == "OneWay"){
            var dataOpt = "OneWay";
            $("#type_flight").val(dataOpt);

        }else if(type_trip == "RoundTrip"){
            var dataOpt = "RoundTrip";
            $("#type_flight").val(dataOpt);
        }

        if(seat_book_stand != undefined){
            if(seat_book_stand[0] != null){
                $("#muat_berat").val(seat_book_stand[0].muat_berat)
                $("#muat_harga").val('Rp.'+ seat_book_stand[0].muat_harga)
            }else{
                $("#muat_berat").val('')
                $("#muat_harga").val('Rp.'+ '')
            } 
        }

        for(var i = 0; i < all_pax.length; i++){
            var no = i+1
            var opts = `<option value="`+ no +`">`+ no +`-`+ all_pax[i].first_name+``+all_pax[i].last_name+`</option>`;
            $("#pax_list_baggage").append(opts);
        }
        $("#pax_list_baggage").on('change', function(){
            $("#data_bagasi").empty()
            $("#muat_berat").val('')
            $("#muat_harga").val('Rp.'+ '')
            getBagasi()
            var seat_book_in = JSON.parse(localStorage.getItem('data_book_flight_addons_bagasi'));
            if(seat_book_in == undefined){
                $("#muat_berat").val('')
                $("#muat_harga").val('Rp.'+ '')
            }else{
                var data_flight_pax = seat_book_in
                for(var i = 0; i < data_flight_pax.length; i++){
                    var no = i+1
                    var ini = $(this).val()
                    if(no == ini){
                        $("#muat_berat").val(seat_book_in[i].muat_berat)
                        $("#muat_harga").val('Rp.'+seat_book_in[i].muat_harga)
                    }
                    console.log(seat_book_in[i].muat_harga)
                }
            }
        });
    }

    function modalPilihBagasiReturn(){
        $("#data_bagasi").empty()
        $.LoadingOverlay("hide")
        var seat_book_stand = JSON.parse(localStorage.getItem('data_book_flight_addons_bagasi_return'));
        var datahtml = `
        <div class="modal fade" id="modalBagasiFlightReturn" data-keyboard="false" data-backdrop="static">
            <div style="height:600px; width:70%; margin: 0 auto;" class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-colors-on">Pilih Bagasi Return</h5>
                        <button type="button" class="close" data-dismiss="modal" onclick="enableLoading(); closeModalSeatFlight()">×</button>
                    </div><br>
                    <div class="row col-12">
                        <div class="col-6">
                            <div class="form-group col-6" >
                                <label for="type">Penumpang: </label>
                                    <select class="form-control" id="pax_list_baggage_return" name="pax_list_baggage_return" required>
                                    </select>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback-adult text-colors-block"></div>
                            </div>
                            <div class="row col-12">
                                <div class="col-7">
                                    <label for="type">Muat Berat:</label>
                                    <input class="form-control inputVal" id="muat_berat_return" name="muat_berat_return" type="text" value="" disabled/>
                                </div>
                                <div class="col-4">
                                    <label for="type">Harga:</label>
                                    <input class="form-control inputVal" id="muat_harga_return" name="muat_harga_return" type="text" value="" disabled/>
                                </div>
                            </div><br>
                            <div style="float: right;" class=""> 
                                <button type="button" class="btn btn main-color" id="bottonBook" onclick="saveBagasiReturn()"><b class="text-colors-off"><i class="fa fa-check mr-1" ></i>Simpan</b></button>
                            </div>
                        </div>
                        <div class=" col-6" >
                            <div class="row ">
                                <div id="data_bagasi" style="margin: 0 auto;">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn main-color d-none" id="bottonBookReturn" onclick="bookingFlight()"><b class="text-colors-off"><i class="fa fa-check mr-1" ></i>Pilih Kursi Kepulangan</b></button>
                        <button id="closeModalSeatFlight" type="button" class="btn btn-light" data-dismiss="modal" onclick="enableLoading();closeModalSeatFlight()"><i class="fa fa-times mr-1"></i>Kembali</button>
                    </div>
                </div>
            </div>
        </div> `
        $("#modalPilihBagasiPesawat").append(datahtml)
        $("#modalBagasiFlightReturn").modal('show')
        getBagasiReturn()

        for(var i = 0; i < all_pax.length; i++){
            var no = i+1
            var opts = `<option value="`+ no +`">`+ no +`-`+ all_pax[i].first_name+``+all_pax[i].last_name+`</option>`;
            $("#pax_list_baggage_return").append(opts);
        }

        if(seat_book_stand != undefined){
           if(seat_book_stand[0] != null){
            $("#muat_berat_return").val(seat_book_stand[0].muat_berat)
            $("#muat_harga_return").val('Rp.'+ seat_book_stand[0].muat_harga)
           }else{
            $("#muat_berat_return").val('')
            $("#muat_harga_return").val('Rp.'+ '')
           }

        }

        $("#pax_list_baggage_return").on('change', function(){
            $("#data_bagasi").empty()
            $("#muat_berat_return").val('')
            $("#muat_harga_return").val('Rp.'+ '')
            
            getBagasiReturn()
            var seat_book_in = JSON.parse(localStorage.getItem('data_book_flight_addons_bagasi_return'));
            if(seat_book_in == undefined){
                $("#muat_berat_return").val('')
                $("#muat_harga_return").val('Rp.'+ '')
            }else{
                var data_flight_pax = seat_book_in
                for(var i = 0; i < data_flight_pax.length; i++){
                    var no = i+1
                    var ini = $(this).val()
                    if(no == ini){
                        $("#muat_berat_return").val(data_flight_pax[i].muat_berat)
                        $("#muat_harga_return").val('Rp.'+data_flight_pax[i].muat_harga)
                    }
                    console.log(seat_book_in[i].muat_harga)
                }
            }
        });
    }

    function modalPilihMeals(){
        $.LoadingOverlay("hide")
        $("#data_meals_flight").empty()
        var seat_book_stand = JSON.parse(localStorage.getItem('data_book_flight_addons_meals'));
        var datahtml = `
        <div class="modal fade" id="modalMealsFlight" data-keyboard="false" data-backdrop="static">
            <div style="height:600px; width:70%; margin: 0 auto;" class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-colors-on">Pilih Meals</h5>
                        <button type="button" class="close" data-dismiss="modal" onclick="enableLoading(); closeModalSeatFlight()">×</button>
                    </div><br>
                    <div class="row col-12">
                        <div class="col-6">
                            <div class="form-group col-6" >
                                <label for="type">Penumpang: </label>
                                    <select class="form-control" id="pax_list_meals" name="pax_list_meals" required>
                                    </select>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback-adult text-colors-block"></div>
                            </div>
                            <div class="row col-12" id="keterangan_data">
                            </div><br>
                            <div style="float: right;" class=""> 
                                <button type="button" class="btn btn main-color" id="bottonBook" onclick="saveMeals()"><b class="text-colors-off"><i class="fa fa-check mr-1" ></i>Simpan</b></button>
                            </div>
                        </div>
                        <div class=" col-6" >
                            <div class="row ">
                                <div id="data_meals_flight" style="margin: 0 auto;" class="tambah-scroll">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn main-color d-none" id="bottonBookReturn" onclick="bookingFlight()"><b class="text-colors-off"><i class="fa fa-check mr-1" ></i>Pilih Kursi Kepulangan</b></button>
                        <button id="closeModalSeatFlight" type="button" class="btn btn-light" data-dismiss="modal" onclick="enableLoading(); closeModalSeatFlight()"><i class="fa fa-times mr-1"></i>Kembali</button>
                    </div>
                </div>
            </div>
        </div> `
        $("#modalPilihMealsPesawat").append(datahtml)
        $("#modalMealsFlight").modal('show')
        getMeals()
        if(type_trip == "OneWay"){
            var dataOpt = "OneWay";
            $("#type_flight").val(dataOpt);

        }else if(type_trip == "RoundTrip"){
            var dataOpt = "RoundTrip";
            $("#type_flight").val(dataOpt);
        }

        for(var i = 0; i < all_pax.length; i++){
            var no = i+1
            var opts = `<option value="`+ no +`">`+ no +`-`+ all_pax[i].first_name+``+all_pax[i].last_name+`</option>`;
            $("#pax_list_meals").append(opts);
        }

        if(seat_book_stand != undefined){
            for(var i = 0; i < seat_book_stand.length; i++ ){
                var npax = $("#pax_list_meals").val();
                var no = i+1
                if(npax == no){
                    var hi = seat_book_stand[i].data_meals
                    for(j = 0; j < hi.length; j++ ){
                        var detail =`<div class="col-5">
                                    <label for="type">Tambahan:</label>
                                    <input class="form-control inputVal" id="tambah_meals" name="" type="text" value="`+hi[j].name_meals+`" disabled/>
                                </div>
                                <div class="col-4">
                                    <label for="type">Harga:</label>
                                    <input class="form-control inputVal" id="harga_meals" name="" type="text" value="`+hi[j].harga_meals+`" disabled/>
                                </div>`;   
                        $("#keterangan_data").append(detail)
                    }
                }
            }
        }

        $("#pax_list_meals").on('change', function(){

            $("#keterangan_data").empty()
            var seat_book_in = JSON.parse(localStorage.getItem('data_book_flight_addons_meals'));
            if(seat_book_in == undefined){
                for(var i = 0; i < seat_book_in.length; i++ ){
                    var detail =`<div class="col-5">
                                        <label for="type">Tambahan:</label>
                                        <input class="form-control inputVal" id="tambah_meals" name="" type="text" value=" belum pilih" disabled/>
                                    </div>
                                    <div class="col-4">
                                        <label for="type">Harga:</label>
                                        <input class="form-control inputVal" id="harga_meals" name="" type="text" value="belum pilih" disabled/>
                                    </div>`;   
                    $("#keterangan_data").append(detail)
                }
            }else{
                
                var data_flight_pax = seat_book_in
                
                for(var i = 0; i < data_flight_pax.length; i++){
                    var nas = data_flight_pax[i].data_meals
                    var no = i+1
                    var ini = $(this).val()
                    for(var j = 0; j < nas.length; j++){
                        if(no == ini){
                        var detail =`<div class="col-5">
                                        <label for="type">Tambahan:</label>
                                        <input class="form-control inputVal" id="tambah_meals" name="" type="text" value="`+nas[j].name_meals+`" disabled/>
                                    </div>
                                    <div class="col-4">
                                        <label for="type">Harga:</label>
                                        <input class="form-control inputVal" id="harga_meals" name="" type="text" value="Rp.`+nas[j].harga_meals+`" disabled/>
                                    </div>`;   
                        $("#keterangan_data").append(detail)

                        }
                    }
                  
                }
            }
        });
    }

    function modalPilihMealsReturn(){
        $("#data_meals_flight").empty()
        $.LoadingOverlay("hide")
        var seat_book_stand = JSON.parse(localStorage.getItem('data_book_flight_addons_meals_return'));
        var datahtml = `
        <div class="modal fade" id="modalMealsFlightReturn" data-keyboard="false" data-backdrop="static">
            <div style="height:600px; width:70%; margin: 0 auto;" class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-colors-on">Pilih Meals Return</h5>
                        <button type="button" class="close" data-dismiss="modal" onclick="enableLoading(); closeModalSeatFlight()">×</button>
                    </div><br>
                    <div class="row col-12">
                        <div class="col-6">
                            <div class="form-group col-6" >
                                <label for="type">Penumpang: </label>
                                    <select class="form-control" id="pax_list_meals" name="pax_list_meals" required>
                                    </select>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback-adult text-colors-block"></div>
                            </div>
                            <div class="row col-12" id="keterangan_data_return">
                                
                            </div><br>
                            <div style="float: right;" class=""> 
                                <button type="button" class="btn btn main-color" id="bottonBook" onclick="saveMealsReturn()"><b class="text-colors-off"><i class="fa fa-check mr-1" ></i>Simpan</b></button>
                            </div>
                        </div>
                        <div class=" col-6" >
                            <div class="row ">
                                <div id="data_meals_flight" class="tambah-scroll">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn main-color d-none" id="bottonBookReturn" onclick="bookingFlight()"><b class="text-colors-off"><i class="fa fa-check mr-1" ></i>Pilih Kursi Kepulangan</b></button>
                        <button id="closeModalSeatFlight" type="button" class="btn btn-light" data-dismiss="modal" onclick="enableLoading(); closeModalSeatFlight()"><i class="fa fa-times mr-1"></i>Kembali</button>
                    </div>
                </div>
            </div>
        </div> `
        $("#modalPilihMealsPesawat").append(datahtml)
        $("#modalMealsFlightReturn").modal('show')
        getMealsReturn()
        if(type_trip == "OneWay"){
            var dataOpt = "OneWay";
            $("#type_flight").val(dataOpt);

        }else if(type_trip == "RoundTrip"){
            var dataOpt = "RoundTrip";
            $("#type_flight").val(dataOpt);
        }

        for(var i = 0; i < all_pax.length; i++){
            var no = i+1
            var opts = `<option value="`+ no +`">`+ no +`-`+ all_pax[i].first_name+``+all_pax[i].last_name+`</option>`;
            $("#pax_list_meals").append(opts);
        }
        if(seat_book_stand != undefined){
            for(var i = 0; i < seat_book_stand.length; i++ ){
                var npax = $("#pax_list_meals").val();
                var no = i+1
                if(npax == no){
                    var hi = seat_book_stand[i].data_meals
                    for(j = 0; j < hi.length; j++ ){
                        
                        var detail =`<div class="col-5">
                                    <label for="type">Tambahan:</label>
                                    <input class="form-control inputVal" id="tambah_meals" name="" type="text" value="`+hi[j].name_meals+`" disabled/>
                                </div>
                                <div class="col-4">
                                    <label for="type">Harga:</label>
                                    <input class="form-control inputVal" id="harga_meals" name="" type="text" value="`+hi[j].harga_meals+`" disabled/>
                                </div>`;   
                        $("#keterangan_data_return").append(detail)
                    }
                }
            }
        }
        $("#pax_list_meals").on('change', function(){
            $("#keterangan_data_return").empty()
            var seat_book_in = JSON.parse(localStorage.getItem('data_book_flight_addons_meals_return'));
            if(seat_book_in == undefined){
                for(var i = 0; i < seat_book_in.length; i++ ){
                    var detail =`<div class="col-5">
                                        <label for="type">Tambahan:</label>
                                        <input class="form-control inputVal" id="tambah_meals" name="" type="text" value=" belum pilih" disabled/>
                                    </div>
                                    <div class="col-4">
                                        <label for="type">Harga:</label>
                                        <input class="form-control inputVal" id="harga_meals" name="" type="text" value="belum pilih" disabled/>
                                    </div>`;   
                    $("#keterangan_data_return").append(detail)
                }
            }else{
                var seat_book_in = JSON.parse(localStorage.getItem('data_book_flight_addons_meals_return'));
                var data_flight_pax = seat_book_in
                for(var i = 0; i < data_flight_pax.length; i++){
                    var nas = data_flight_pax[i].data_meals
                    var no = i+1
                    var ini = $(this).val()
                    for(var j = 0; j < nas.length; j++){
                        if(no == ini){
                        var detail =`<div class="col-5">
                                        <label for="type">Tambahan:</label>
                                        <input class="form-control inputVal" id="tambah_meals" name="" type="text" value="`+nas[j].name_meals+`" disabled/>
                                    </div>
                                    <div class="col-4">
                                        <label for="type">Harga:</label>
                                        <input class="form-control inputVal" id="harga_meals" name="" type="text" value="Rp.`+nas[j].harga_meals+`" disabled/>
                                    </div>`;   
                        $("#keterangan_data_return").append(detail)
                        
                        }
                    }
                }
            }
        });
    }

    function getLayout() {
        var token_set = token['access_token']
        var url = fetch(mainurl +'flight/get_add_on',{
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token_set,
        },
        body: JSON.stringify({
            "id_schedule_departure": data_flight['id_depart'],
            "id_schedule_return": retrn_id,
            "contact_title": "MR",
            "contact_email": email,
            "contact_first_name": name_order,
            "contact_last_name": "tes",
            "contact_country_code_phone": "62",
            "contact_area_code_phone": "812",
            "contact_remaining_phone": "87627241",
            "insurance": "",
            "pax_details": all_pax
        }),
        }).then(response => response.json())
        .then(layout => {
                let seatsAll = layout.data.seatAddOns[0].infos;
                let seats = seatsAll.filter(seat => { return seat.seatType === 'NS' })
                seats.sort((a, b) => {
                    if (a.Y !== b.Y) {
                    return a.Y < b.Y ? -1 : 1;
                    }
                    return a.X - b.X;
                })
                createTable(seats, getUniqueItemsByKey(seats, 'Y').length, getUniqueItemsByKey(seats, 'X').length)
        });
    }

    function getLayoutReturn() {
        var token_set = token['access_token']
        var url = fetch(mainurl +'flight/get_add_on',{
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token_set,
        },
        body: JSON.stringify({
            "id_schedule_departure": data_flight['id_depart'],
            "id_schedule_return": retrn_id,
            "contact_title": "MR",
            "contact_email": email,
            "contact_first_name": name_order,
            "contact_last_name": "tes",
            "contact_country_code_phone": "62",
            "contact_area_code_phone": "812",
            "contact_remaining_phone": "87627241",
            "insurance": "",
            "pax_details": all_pax
        }),
        }).then(response => response.json())
        .then(layout => {
            let seatsAll = layout.data.seatAddOns[1].infos;
            let seats = seatsAll.filter(seat => { return seat.seatType === 'NS' })
            seats.sort((a, b) => {
                if (a.Y !== b.Y) {
                return a.Y < b.Y ? -1 : 1;
                }
                return a.X - b.X;
            })
            createTable(seats, getUniqueItemsByKey(seats, 'Y').length, getUniqueItemsByKey(seats, 'X').length)
        });
    }

    function getUniqueItemsByKey(array, key) {
      var uniqueValues = new Set();
      array.map(item => uniqueValues.add(item[key]));
      return Array.from(uniqueValues);
    }

    function createTable(seats, rows, cols) {
      var table = document.createElement("table");
      table.className = 'table w-auto sm-1';
      table.style = ' border: 4px solid; border-radius: 5px; border-color: rgb(251, 140, 1);';
      for (var i = 0; i < rows; i++) {
        var row = table.insertRow();
        for (var j = 0; j < cols; j++) {

          var cell = row.insertCell();
          const label = getLabel(seats, getUniqueItemsByKey(seats, 'Y')[i], getUniqueItemsByKey(seats, 'X')[j]);
          const isOpen = getOpen(seats, getUniqueItemsByKey(seats, 'Y')[i], getUniqueItemsByKey(seats, 'X')[j]);
          const price = getPrice(seats, getUniqueItemsByKey(seats, 'Y')[i], getUniqueItemsByKey(seats, 'X')[j]);

          let btn = document.createElement('button');
        //   btn.type = 'button';
          btn.id = label;
          btn.className = 'btn btn-primary w-100';
          btn.onclick = function(){
            addSeat(label, price)
          }
          btn.innerHTML = label;
          btn.disabled = !isOpen;
          cell.appendChild(btn);
        }
      }
      document.getElementById('main').appendChild(table);
    }

    function getLabel(seats, row, column) {
      var seat = seats.find(seat => (seat.Y == row) && (seat.X == column));
      return seat ? seat.seatDesignator : null;
    }
    
    function getOpen(seats, row, column) {
      var seat = seats.find(seat => (seat.Y == row) && (seat.X == column));
      return seat.isOpen;
    }

    function getPrice(seats, row, column){
      var seat = seats.find(seat => (seat.Y == row) && (seat.X == column));
      return seat ? seat.seatPrice : null;
    }

    function addSeat(nomer, harga){
        $("#nomer_kursi").val(nomer)
        $("#harga_kursi").val('Rp.'+ harga)
        $("#nomer_kursi_return").val(nomer)
        $("#harga_kursi_return").val('Rp.'+ harga)
    }

    function saveSeat(){
      var seat_book_in = JSON.parse(localStorage.getItem('data_book_flight_addons'));
      var val_seat_cek = $("#nomer_kursi").val()
      var val_price_cek = $("#harga_kursi").val()

      if(val_seat_cek == ""){

        toastr.error("Seat belum dipilih", "Error")

      }else{

        if(seat_book_in == undefined){
        var data_flight_pax = ""
        }else{
            var data_flight_pax = seat_book_in
        }
        var val_seat = val_seat_cek
        var val_price = val_price_cek
        var total_pax = all_pax.length

        var data_pax_flight = [];

        for(var i = 0; i < total_pax; i++){
            var no_pax = $("#pax_list_seat").val()
            var no = i +1

          if(no_pax == no){
                var number_seat = val_seat
                var price_seat = val_price
          }else{
            if(data_flight_pax == ""){
                var number_seat = ""
                var price_seat = ""
            }else{
                var number_seat = data_flight_pax[i].number_seat
                var price_seat = data_flight_pax[i].price_seat
            }
               
          }

          var dataKursi = {
                    number_seat, price_seat
                }
          data_pax_flight.push(dataKursi)
    
        } 
        toastr.success("Berhasil Pilih Seat", "Success")
        localStorage.setItem("data_book_flight_addons", JSON.stringify(data_pax_flight))
      }
      
    }

    function saveSeatReturn(){
      var seat_book_in = JSON.parse(localStorage.getItem('data_book_flight_addons_return'));
      var val_seat_cek = $("#nomer_kursi_return").val()
      var val_price_cek = $("#harga_kursi_return").val()

        if(val_seat_cek == ""){
            toastr.error("Seat belum dipilih", "Error")
        }else{

            if(seat_book_in == undefined){
                var data_flight_pax = ""
            }else{
                var data_flight_pax = seat_book_in
            }
            var val_seat = val_seat_cek
            var val_price = val_price_cek
            var total_pax = all_pax.length

            var data_pax_flight = [];
            for(var i = 0; i < total_pax; i++){
                    var no_pax = $("#pax_list_seat_return").val()
                    var no = i +1

                if(no_pax == no){
                        var number_seat = val_seat
                        var price_seat = val_price
                }else{
                    if(data_flight_pax == ""){
                        var number_seat = ""
                        var price_seat = ""
                    }else{
                        var number_seat = data_flight_pax[i].number_seat
                        var price_seat = data_flight_pax[i].price_seat
                    }     
                }

                var dataKursi = {
                        number_seat, price_seat
                    }
                data_pax_flight.push(dataKursi)
                
            } 
            toastr.success("Berhasil Pilih Seat", "Success")
            localStorage.setItem("data_book_flight_addons_return", JSON.stringify(data_pax_flight))
        }
           
    }

    function getBagasi() {
        var token_set = token['access_token']
        var url = fetch(mainurl +'flight/get_add_on',{
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token_set,
        },
        body: JSON.stringify({
            "id_schedule_departure": data_flight['id_depart'],
            "id_schedule_return": retrn_id,
            "contact_title": "MR",
            "contact_email": email,
            "contact_first_name": name_order,
            "contact_last_name": "tes",
            "contact_country_code_phone": "62",
            "contact_area_code_phone": "812",
            "contact_remaining_phone": "87627241",
            "insurance": "",
            "pax_details": all_pax
        }),
        }).then((response) => response.json()).then((responseData) => {
        console.log(responseData)
        var bagasi = responseData.data.baggageAddOns[0].baggageInfos
        for(var i = 0; i < bagasi.length; i++){
                        var no = i+1
                    if(bagasi[i].fare != 0){
                        setPaxLght = `
                        <div class="col-12" id="bagasi_form">
                            <div class="card p-3 mb-2 bg-body rounded">
                                <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input check_box_baggage_pax" id="`+no+`" value="`+no+`" name="bagagge_check"> 
                                    <label for="`+no +`" class="custom-control-label col-12">
                                        <div class="row">
                                            <div id="descrip" style="maxLength: 10;"> <b>`+bagasi[i].code+`</b></div><br>
                                            <div id="descrip" style="maxLength: 10;"> - <b>`+bagasi[i].desc+`</b></div>
                                            <div id="descrip" style="maxLength: 10;"> - <b>`+bagasi[i].fare+`</b></div><br>
                                            <input id="bagasi_berat`+ no +`" value="`+bagasi[i].desc+`" hidden></input>
                                            <input id="bagasi_harga`+ no +`" value="`+bagasi[i].fare+`" hidden></input>
                                            <input id="bagasi_code`+ no +`" value="`+bagasi[i].code+`" hidden></input>
                                        </div>
                                    </label>
                                </div>
                            </div> 
                        </div>`;
                        // $("#data_bagasi" ).removeClass('d-none')
                        $("#data_bagasi").append(setPaxLght);
                    }
                }
            var limit = 1;
            $('.check_box_baggage_pax').on('change', function() {
                if($("input[name='bagagge_check']:checked").length > limit) {
                    this.checked = false;
                }
            });
        });
    }

    function getBagasiReturn() {
        var token_set = token['access_token']
        var url = fetch(mainurl +'flight/get_add_on',{
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token_set,
        },
        body: JSON.stringify({
            "id_schedule_departure": data_flight['id_depart'],
            "id_schedule_return": retrn_id,
            "contact_title": "MR",
            "contact_email": email,
            "contact_first_name": name_order,
            "contact_last_name": "tes",
            "contact_country_code_phone": "62",
            "contact_area_code_phone": "812",
            "contact_remaining_phone": "87627241",
            "insurance": "",
            "pax_details": all_pax
        }),
        }).then((response) => response.json()).then((responseData) => {
        console.log(responseData)
        var bagasi = responseData.data.baggageAddOns[1].baggageInfos
        for(var i = 0; i < bagasi.length; i++){
            var no = i+1
                if(bagasi[i].fare != 0){
                    setPaxLght = `
                    <div class="col-12" id="bagasi_form">
                        <div class="card p-3 mb-2 bg-body rounded">
                            <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input check_box_baggage_pax_return" id="`+no+`" value="`+no+`" name="bagagge_check_return"> 
                                <label for="`+no +`" class="custom-control-label col-12">
                                    <div class="row">
                                        <div id="descrip" style="maxLength: 10;"> <b>`+bagasi[i].code+`</b></div><br>
                                        <div id="descrip" style="maxLength: 10;"> - <b>`+bagasi[i].desc+`</b></div>
                                        <div id="descrip" style="maxLength: 10;"> - <b>`+bagasi[i].fare+`</b></div><br>
                                        <input id="bagasi_berat_return`+ no +`" value="`+bagasi[i].desc+`" hidden></input>
                                        <input id="bagasi_harga_return`+ no +`" value="`+bagasi[i].fare+`" hidden></input>
                                        <input id="bagasi_code_return`+ no +`" value="`+bagasi[i].code+`" hidden></input>
                                    </div>
                                </label>
                            </div>
                        </div> 
                    </div>`;
                    // $("#data_bagasi" ).removeClass('d-none')
                    $("#data_bagasi").append(setPaxLght);
                }
            }
            var limit = 1;
            $('.check_box_baggage_pax_return').on('change', function() {
                if($("input[name='bagagge_check_return']:checked").length > limit) {
                    this.checked = false;
                }
            });
        });
    }
        
    function saveBagasi(){

        var id_contact = $("input[name='bagagge_check']:checked").val();
        console.log(id_contact)
        
        if(id_contact == undefined){
            toastr.error("Bagasi belum dipilih", "Error")
        }else{
            var bagasi_book_in = JSON.parse(localStorage.getItem('data_book_flight_addons_bagasi'));

            if (bagasi_book_in == undefined){
                var data_flight_pax = ""
            }else{
                var data_flight_pax = bagasi_book_in
            }
            var val_seat = $("#bagasi_berat" + id_contact).val()
            var val_price = $("#bagasi_harga" + id_contact).val()
            var code_bagasis = $("#bagasi_code" + id_contact).val()
            var total_pax = all_pax.length

            $("#muat_berat").val(val_seat)
            $("#muat_harga").val('Rp.'+ val_price)
            var data_pax_flight = [];
            for(var i = 0; i < total_pax; i++){
                    var no_pax = $("#pax_list_baggage").val()
                    var no = i + 1

                if(no_pax == no){
                        var muat_berat = val_seat
                        var muat_harga = val_price
                        var code_bagasi = code_bagasis
                }else{

                    if(data_flight_pax == ""){
                        var muat_berat = ""
                        var muat_harga = ""
                        var code_bagasi = ""
                    }else{
                        
                        if(data_flight_pax[i] == null || data_flight_pax[i] == undefined){
                            var muat_berat = ""
                            var muat_harga = ""
                            var code_bagasi = ""
                        }else{
                            var muat_berat = data_flight_pax[i].muat_berat
                            var muat_harga = data_flight_pax[i].muat_harga
                            var code_bagasi = data_flight_pax[i].code_bagasi
                        }
                    }     
                }

                var dataBagasi = {
                        muat_berat, muat_harga, code_bagasi
                    }
                    
                data_pax_flight.push(dataBagasi)
            
            } 
            
            toastr.success("Berhasil tambah Bagasi", "Success")
            localStorage.setItem("data_book_flight_addons_bagasi", JSON.stringify(data_pax_flight))
        }
 
    } 

    function saveBagasiReturn(){
        var id_contact = $("input[name='bagagge_check_return']:checked").val();
        console.log(id_contact)

        if(id_contact == undefined){
            toastr.error("Bagasi belum dipilih", "Error")
        }else{
            var bagasi_book_in = JSON.parse(localStorage.getItem('data_book_flight_addons_bagasi_return'));
            if (bagasi_book_in == undefined){
                var data_flight_pax = ""
            }else{
                var data_flight_pax = bagasi_book_in
            }
            var val_seat = $("#bagasi_berat_return" + id_contact).val()
            var val_price = $("#bagasi_harga_return" + id_contact).val()
            var code_bagasis = $("#bagasi_code_return" + id_contact).val()
            var total_pax = all_pax.length

            $("#muat_berat_return").val(val_seat)
            $("#muat_harga_return").val('Rp.'+val_price)
            var data_pax_flight = [];
            for(var i = 0; i < total_pax; i++){
                    var no_pax = $("#pax_list_baggage_return").val()
                    var no = i + 1

                if(no_pax == no){
                        var muat_berat = val_seat
                        var muat_harga = val_price
                        var code_bagasi = code_bagasis
                }else{

                    if(data_flight_pax == ""){
                        var muat_berat = ""
                        var muat_harga = ""
                        var code_bagasi = ""
                    }else{
                        if(data_flight_pax[i] == null || data_flight_pax[i] == undefined){
                            var muat_berat = ""
                            var muat_harga = ""
                            var code_bagasi = ""
                        }else{
                            var muat_berat = data_flight_pax[i].muat_berat
                            var muat_harga = data_flight_pax[i].muat_harga
                            var code_bagasi = data_flight_pax[i].code_bagasi
                        }
                    }     
                }

                var dataBagasi = {
                        muat_berat, muat_harga, code_bagasi
                    }
                data_pax_flight.push(dataBagasi)
            } 

            toastr.success("Berhasil tambah Bagasi", "Success")
            localStorage.setItem("data_book_flight_addons_bagasi_return", JSON.stringify(data_pax_flight))
        }
            
    }
    
    function getMeals() {
        var token_set = token['access_token']
        var url = fetch(mainurl +'flight/get_add_on',{
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token_set,
        },
        body: JSON.stringify({
            "id_schedule_departure": data_flight['id_depart'],
            "id_schedule_return": retrn_id,
            "contact_title": "MR",
            "contact_email": email,
            "contact_first_name": name_order,
            "contact_last_name": "tes",
            "contact_country_code_phone": "62",
            "contact_area_code_phone": "812",
            "contact_remaining_phone": "87627241",
            "insurance": "",
            "pax_details": all_pax
        }),
        }).then((response) => response.json()).then((responseData) => {
        console.log(responseData)
            var meal = responseData.data.baggageAddOns[0].mealInfos
            console.log(meal)
                for(var i = 0; i <meal.length; i++){
                    var no = i+1
                    setPaxLght = `
                    <div class="col-12" id="meals_form">
                        <div class="card p-3 mb-2 bg-body rounded">
                            <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input check_box_meals" id="`+no+`" value="`+no+`" name="meals_check"> 
                                <label for="`+no +`" class="custom-control-label col-12">
                                    <div class="row">
                                            <div id="descrip" style="maxLength: 10;"> <b>`+meal[i].code+`</b></div><br>
                                            <div id="descrip" style="maxLength: 10;"> - <b>`+meal[i].desc+`</b></div>
                                            <div id="descrip" style="maxLength: 10;"> - <b>`+meal[i].fare+`</b></div><br>
                                            <input id="meals_name`+ no +`" value="`+meal[i].desc+`" hidden></input>
                                            <input id="meals_harga`+ no +`" value="`+meal[i].fare+`" hidden></input>
                                            <input id="meals_code`+ no +`" value="`+meal[i].code+`" hidden></input>
                                    </div>
                                </label>
                            </div>
                        </div> 
                    </div>`;
                    $("#data_meals_flight").append(setPaxLght);
                }
            var limit = 2;
            $('.check_box_meals').on('change', function() {
                if($("input[name='meals_check']:checked").length > limit) {
                    this.checked = false;
                }
            });
        });
    }
    function getMealsReturn() {
        var token_set = token['access_token']
        var url = fetch(mainurl +'flight/get_add_on',{
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token_set,
        },
        body: JSON.stringify({
            "id_schedule_departure": data_flight['id_depart'],
            "id_schedule_return": retrn_id,
            "contact_title": "MR",
            "contact_email": email,
            "contact_first_name": name_order,
            "contact_last_name": "tes",
            "contact_country_code_phone": "62",
            "contact_area_code_phone": "812",
            "contact_remaining_phone": "87627241",
            "insurance": "",
            "pax_details": all_pax
        }),
        }).then((response) => response.json()).then((responseData) => {
        console.log(responseData)
        var meal = responseData.data.baggageAddOns[1].mealInfos
        for(var i = 0; i < meal.length; i++){
                        var no = i+1
                    setPaxLght = `
                    <div class="col-12" id="meals_form">
                        <div class="card p-3 mb-2 bg-body rounded">
                            <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input check_box_meals" id="`+no+`" value="`+no+`" name="meals_check"> 
                                <label for="`+no +`" class="custom-control-label col-12">
                                    <div class="row">
                                            <div id="descrip" style="maxLength: 10;"> <b>`+meal[i].code+`</b></div><br>
                                            <div id="descrip" style="maxLength: 10;"> - <b>`+meal[i].desc+`</b></div>
                                            <div id="descrip" style="maxLength: 10;"> - <b>`+meal[i].fare+`</b></div><br>
                                            <input id="meals_name`+ no +`" value="`+meal[i].desc+`" hidden></input>
                                            <input id="meals_harga`+ no +`" value="`+meal[i].fare+`" hidden></input>
                                            <input id="meals_code`+ no +`" value="`+meal[i].code+`" hidden></input>
                                    </div>
                                </label>
                            </div>
                        </div> 
                    </div>`;
                    $("#data_meals_flight").append(setPaxLght);
                }
            var limit = 2;
            $('.check_box_meals').on('change', function() {
                if($("input[name='meals_check']:checked").length > limit) {
                    this.checked = false;
                }
            });
        });
    }  

    function saveMeals(){
        var list_meals = $("input[name='meals_check']:checked");

        if(list_meals.length == 0){

            toastr.error("Meals belum dipilih", "Error")

        }else{
            var bagasi_book_in = JSON.parse(localStorage.getItem('data_book_flight_addons_meals'));
            var bagasi_book_in_code = JSON.parse(localStorage.getItem('data_book_flight_addons_meals_code'));
            
            if (bagasi_book_in == undefined){
                var data_flight_pax = ""
            }else{
                var data_flight_pax = bagasi_book_in
            }

            if (bagasi_book_in_code == undefined){
                var data_flight_pax_code = ""
            }else{
                var data_flight_pax_code = bagasi_book_in_code
            }

            var total_pax = all_pax.length
    
            var data_pax_flight = [];
            var data_pax_code_meals = [];
            for(var i = 0; i < total_pax; i++){
                var no_pax = $("#pax_list_meals").val()
                var no = i + 1
    
                if(no_pax == no){
                    var data_meals = setarraymeals()
                    var code_meals = setarraymealsCode()
                }else{
        
                    if(data_flight_pax == ""){
                        var data_meals = ""
                        var code_meals = []
                    }else{
                        var data_meals = data_flight_pax[i].data_meals 
                        if(data_flight_pax_code[i] == null){
                            var code_meals = []
                        }else{
                            var code_meals = data_flight_pax_code[i]
                        }
                        
                    }     
                }

                var dataBagasi = {
                    data_meals, 
                }
            
                data_pax_flight.push(dataBagasi)
                data_pax_code_meals.push(code_meals)
                console.log(data_pax_flight)
            } 
            toastr.success("Berhasil tambah Meals", "Success")
            localStorage.setItem("data_book_flight_addons_meals", JSON.stringify(data_pax_flight))
            localStorage.setItem("data_book_flight_addons_meals_code", JSON.stringify(data_pax_code_meals))
        }
        
      } 

    function saveMealsReturn(){
        var list_meals = $("input[name='meals_check']:checked");
    
        if(list_meals.length == 0){
            toastr.error("Meals belum dipilih", "Error")
        }else{
            var bagasi_book_in = JSON.parse(localStorage.getItem('data_book_flight_addons_meals_return'));
            var bagasi_book_in_code = JSON.parse(localStorage.getItem('data_book_flight_addons_meals_code_return'));

            if (bagasi_book_in == undefined){
                var data_flight_pax = ""
            }else{
                var data_flight_pax = bagasi_book_in
            }

            if (bagasi_book_in_code == undefined){
                var data_flight_pax_code = ""
            }else{
                var data_flight_pax_code = bagasi_book_in_code
            }

            var total_pax = all_pax.length
    
            var data_pax_flight = [];
            var data_pax_code_meals = [];
            for(var i = 0; i < total_pax; i++){
                var no_pax = $("#pax_list_meals").val()
                var no = i + 1
    
                if(no_pax == no){
                    var data_meals = setarraymealsReturn()
                    var code_meals = setarraymealsCodeReturn()
                }else{
        
                    if(data_flight_pax == ""){
                        var data_meals = ""
                        var code_meals = []
                    }else{
                        var data_meals = data_flight_pax[i].data_meals 
                        if(data_flight_pax_code[i] == null){
                            var code_meals = []
                        }else{
                            var code_meals = data_flight_pax_code[i]
                        }
                        
                    }     
                }
                var dataBagasi = {
                    data_meals, 
                }
        
                data_pax_flight.push(dataBagasi)
                data_pax_code_meals.push(code_meals)
            } 
            toastr.success("Berhasil tambah Meals", "Success")
            localStorage.setItem("data_book_flight_addons_meals_return", JSON.stringify(data_pax_flight))
            localStorage.setItem("data_book_flight_addons_meals_code_return", JSON.stringify(data_pax_code_meals))
        }
        
    }

    function setarraymealsCode(){
        var list_meals = $("input[name='meals_check']:checked");
        var total_pax = all_pax.length
        var meals_in = []
  
        for (var i = 0; i < list_meals.length; i++) {
            var code_meals = $("#meals_code" + list_meals[i].value).val()

            meals_in.push(code_meals)   

        }
       return meals_in
      }

    function setarraymeals(){
        var list_meals = $("input[name='meals_check']:checked");
        var total_pax = all_pax.length
        var meals_in = []
        $("#keterangan_data").empty()
        for (var i = 0; i < list_meals.length; i++) {

            var names_meals= $("#meals_name" + list_meals[i].value).val()
            var harga_meals = $("#meals_harga" + list_meals[i].value).val()
            var code_meals = $("#meals_code" + list_meals[i].value).val()
            var no_pax = $("#pax_list_meals").val();

            var data_meals = 
                {
                    "id":no_pax,
                    "harga_meals":harga_meals,
                    "name_meals":names_meals,
                    "code_meals":code_meals,
                }
            meals_in.push(data_meals)   

            var detail =`<div class="col-5">
                                    <label for="type">Tambahan:</label>
                                    <input class="form-control inputVal" id="tambah_meals" name="" type="text" value="`+meals_in[i].name_meals+`" disabled/>
                                </div>
                                <div class="col-4">
                                    <label for="type">Harga:</label>
                                    <input class="form-control inputVal" id="harga_meals" name="" type="text" value="`+meals_in[i].harga_meals+`" disabled/>
                                </div>`;
                                
                $("#keterangan_data").append(detail)
        }
       return meals_in
    }

    function setarraymealsCodeReturn(){
        var list_meals = $("input[name='meals_check']:checked");
        var total_pax = all_pax.length
        var meals_in = []
        for (var i = 0; i < list_meals.length; i++) {
            var code_meals = $("#meals_code" + list_meals[i].value).val()

            meals_in.push(code_meals)   

        }
       return meals_in
      }

    function setarraymealsReturn(){
        var list_meals = $("input[name='meals_check']:checked");
        var total_pax = all_pax.length
        var meals_in = []
        $("#keterangan_data_return").empty()
        for (var i = 0; i < list_meals.length; i++) {

            var names_meals= $("#meals_name" + list_meals[i].value).val()
            var harga_meals = $("#meals_harga" + list_meals[i].value).val()
            var code_meals = $("#meals_code" + list_meals[i].value).val()
            var no_pax = $("#pax_list_meals").val();

            var data_meals = 
                {
                "id":no_pax,
                "harga_meals":harga_meals,
                "name_meals":names_meals,
                "code_meals":code_meals,
                }
            meals_in.push(data_meals)   

            var detail =`<div class="col-5">
                                    <label for="type">Tambahan:</label>
                                    <input class="form-control inputVal" id="tambah_meals" name="" type="text" value="`+meals_in[i].name_meals+`" disabled/>
                                </div>
                                <div class="col-4">
                                    <label for="type">Harga:</label>
                                    <input class="form-control inputVal" id="harga_meals" name="" type="text" value="`+meals_in[i].harga_meals+`" disabled/>
                                </div>`;
                                
                $("#keterangan_data_return").append(detail)
        }
       return meals_in
    }
    
    function closeModalSeatFlight() {
        $.LoadingOverlay("hide")

        $("#modalSeatFlight").on("hidden.bs.modal", function(e) {
            $("#modalSeatFlight").replaceWith(`<div id="modalPilihKursiPesawat"></div>`)
        })
        $("#modalSeatFlightReturn").on("hidden.bs.modal", function(e) {
            $("#modalSeatFlightReturn").replaceWith(`<div id="modalPilihKursiPesawat"></div>`)
        })

        $("#modalBagasiFlight").on("hidden.bs.modal", function(e) {
            $("#modalBagasiFlight").replaceWith(`<div id="modalPilihBagasiPesawat"></div>`)
        })
        $("#modalBagasiFlightReturn").on("hidden.bs.modal", function(e) {
            $("#modalBagasiFlightReturn").replaceWith(`<div id="modalPilihBagasiPesawat"></div>`)
        })
    
        $("#modalMealsFlight").on("hidden.bs.modal", function(e) {
            $("#modalMealsFlight").replaceWith(`<div id="modalPilihBagasiPesawat"></div>`)
        })
        $("#modalMealsFlightReturn").on("hidden.bs.modal", function(e) {
            $("#modalMealsFlightReturn").replaceWith(`<div id="modalPilihBagasiPesawat"></div>`)
        })
    }
</script>
@endpush