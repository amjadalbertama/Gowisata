@extends('layout.payment_proses')

@section('content')
<div class="container-fluid mt-100 main-font">
    <div class="row" id="body-sidemenu">
        <div id="main-content" class="col with-fixed-sidebar pb-5 pt-3" style="margin-top:20px;">
            <div class="container">
                <div class="row">
                    <div class="col-9 pt-2"><br>
                        <h5 class="font-weight-normal text-center text-uppercase text-colors-on"> <b id="pas_data" class="d-none">Isi Data Penumpang</b></h5>
                            <hr>
                        <div class="card shadow p-3 mb-5 bg-body rounded d-none" id="data_pemesan_flight"></div>
                        <div class="card shadow p-3 mb-5 bg-body rounded d-none" id="tabel_pesawat"></div>
                        <div class="card shadow p-3 mb-5 bg-body rounded d-none" id="formOdrDetailsPesawat"></div>
                        <div class="card shadow p-3 mb-5 bg-body rounded d-none" id="list_penumpang_adult"></div>
                        <div class="card shadow p-3 mb-5 bg-body rounded d-none" id="list_penumpang_child"></div>
                        <div class="card shadow p-3 mb-5 bg-body rounded d-none" id="list_penumpang_infant"></div>
                        <div class="col-4 d-none" id="button_booking_flight" style="float: right;"> 
                            <button class="btn btn-block main-color" onclick="dataGetOnValidate()"> <b class="text-colors-off"><i class="fa fa-chevron-circle-right mr-1"></i> Selanjutnya</b></button>
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
                    </div>
            </div>
        </div><!-- Main Col -->
    </div><!-- body-row -->
</div><!-- .container-fluid-->
<div id="modalBooking"></div>
<div id="modalCodeAccess"></div>
<div id="codeBooking"></div>
@endsection

@push('scripts')
<script>
    localStorage.removeItem("data_pemesan_flight")
    localStorage.removeItem("data_paxAdl_flight_temporare")
    localStorage.removeItem("data_paxChl_flight_temporare")
    localStorage.removeItem("data_paxInf_flight_temporare")
    $("#data_pax_navbar_flight" ).addClass('text-colors-on')
    $.LoadingOverlay("show")
  
    var access_code = JSON.parse(localStorage.getItem('acc_code_as'))

    var data_flight = JSON.parse(localStorage.getItem('data_flight_details'))
    var pax_request = JSON.parse(localStorage.getItem('data_pax'))
    var token = JSON.parse(localStorage.getItem('data_token'))

    var pax_request = JSON.parse(localStorage.getItem('data_pax'))
    var maxLoopPaxAd = pax_request[0].adult;
    var maxLoopPaxCh = pax_request[1].child;
    var maxLoopPaxIn = pax_request[2].infant;
    // var maxLoopPax = 2;
    var total_pax_count = parseInt(maxLoopPaxAd) + parseInt(maxLoopPaxCh) + parseInt(maxLoopPaxIn)
    
    var data_flight_return = JSON.parse(localStorage.getItem('data_flight_return'))

    // console.log(id_flight_return)
    if(data_flight['types_trip'] == "OneWay"){
        var retrn_id = ""

    }else if(data_flight['types_trip'] == "RoundTrip"){
        var retrn_id = data_flight_return['id_return']
    }

    if(access_code == undefined){
        var acc_code = ""
    }else{
        var acc_code = access_code
    }
    // console.log(tes);
    var token_set = token['access_token']
    var url = fetch(mainurl + 'flight/get_schedule_detail',{
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token_set,
        },
        body: JSON.stringify({
            "id_schedule_departure": data_flight['id_depart'],
            "id_schedule_return": retrn_id,
            "access_code": acc_code
        }),
      }).then((response) => response.json()).then((responseData) => {
        console.log(responseData)

        if(responseData.success == false){
            if(responseData.message == "Trying to access array offset on value of type null"){
                $.LoadingOverlay("hide")
                var datahtml = `
                    <div class="modal fade sm-5" id="codeBookingModal" data-keyboard="false" data-backdrop="static">
                        <div class="modal-dialog modal-dialog-scrollable modal-ku" style="margin-top:15%;"><br>
                            <div class="modal-content text-center" >
                                <div style="margin-top:5%;">
                                    <h4 class="text-colors-block"><b>Booking Failed</b></h4><br>
                                <center>`+ responseData.message+` </b></center>
                                <br>
                                </div><br>
                            
                                <div class="footer">
                                    <button type="button" id="kembaliFailedBook" class="btn main-color"><b class="text-colors-off"></i>Kembali</b></button>
                                </div>
                            </div>
                        </div>
                    </div>`
                $("#codeBooking").append(datahtml)
                $("#codeBookingModal").modal('show')

                $("#kembaliFailedBook").on('click', function(){
                    window.location.href = "/home";
                })
            }else{
                $.LoadingOverlay("hide")
                var valid_code = `<div class="modal fade" id="modalAccessCode">
                        <div class="modal-dialog modal-sm modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Access Code</h5>
                                    <button type="button" class="close" data-dismiss="modal">×</button>
                                </div><br>
                                `+ responseData.image +`
                                <br>
                                <center><b>Masukan Access Code dengan benar !</b></center>
                                <br> 
                                <input  class="form-control inputVal " type="text" id="access_code" name="access_code" />
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" id="bottonBook" onclick="pushAccCodeIndex(); refreshPage()"><i class="fa fa-check mr-1" ></i>Confirm</button>
                                </div>
                            </div>
                        </div>
                    </div> `;
                $("#modalCodeAccess").append(valid_code)
                $("#modalAccessCode").modal('show')
            }
            
        }else{

        if(data_flight['types_trip'] == "OneWay"){
            $("#detail_pesawat").removeClass('d-none');

            $("#pesawat").append(data_flight['name'])
            $("#class_pesawat").append(data_flight['class'])
            $("#rute_asal").append(data_flight['org'])
            $("#rute_tujuan").append(data_flight['des'])
            var date_dpart = reformatDateListFlight(data_flight['depart'])
            var date_return = reformatDateListFlight(data_flight['arrive'])
            $("#date_scadule_depart").append(``+date_dpart.date+` - `+date_dpart.time+``)
            $("#date_scadule_arrive").append(``+date_return.date+` - `+date_return.time+``)
            $("#button_booking_flight" ).removeClass('d-none')
            $("#pas_data" ).removeClass('d-none')
            
            $.LoadingOverlay("hide")
        }else if(data_flight['types_trip'] == "RoundTrip"){
            
            $("#detail_pesawat_roundtrip").removeClass('d-none');
            $("#pas_data" ).removeClass('d-none')
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
            $("#button_booking_flight" ).removeClass('d-none')
            $.LoadingOverlay("hide")
        }

        var paxTrain = `<br>
                    <h1 class="h6 font-weight-normal text-center text-uppercase col-12"> <b> Data Pemesan </b> </h1><hr>
                <div class="row col-12">
                    <div class="custom-control custom-checkbox col-12">
                        <input type="checkbox" class="custom-control-input check_box_kai_reg" id="1" value="1" name="kai_reg_pemesan_check" > 
                        <label for="1" class="custom-control-label col-12">
                            <div class="row" >
                                Data Pemesan sesuai data akun user
                            </div>
                        </label>
                    </div>
                </div><br>
                <div class="row ">
                    <div class="form-group col-6">
                        <label for="type">Email: <span class="text-danger">*</span></label>
                        <input class="form-control inputVal" id="email_pemesan" name="email_pemesan" type="text" value="" />
                        <div class="invalid-feedback-email_pemesan text-colors-block"></div>
                    </div>
                    <div class="form-group col-6">
                        <label for="type">Phone: <span class="text-danger">*</span></label>
                        <input class="form-control inputVal" id="phone_pemesan" name="phone_pemesan" type="number" value="" />
                        <div>*format isi nomer telepon 62..*</div>
                        <div class="invalid-feedback-phone_pemesan text-colors-block"></div>
                    </div>
                </div>
                <div class="row ">
                    <div class="form-group col-2">
                        <label for="type">Title: <span class="text-danger">*</span></label>
                        <select type="text" class="form-control" id="title_pemesan">
                            <option value="MR" selected>  Tuan </option>
                            <option value="MRS">  Nyonya </option>
                            <option value="MS">  Nona </option>
                        </select>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback">Isian ini wajib diisi.</div>
                    </div>
                    <div class="form-group col-5">
                        <label for="type">Nama Pemesan: <span class="text-danger">*</span></label>
                        <input class="form-control inputVal" id="name_pemesan" name="name_pemesan" type="text" value="" />
                        <div class="invalid-feedback-name_pemesan text-colors-block"></div>
                    </div>
                    <div class="col-2"></div>
                    <div class="col-3">
                        <button id="savedatapenumpangFlight" type="button" class="btn btn-block background-orange" style="margin-top: 25px;" onclick="simpanPaxPemesanFlight()"> <b class="text-colors-off"><i class="fa fa-floppy-o mr-1"></i> Simpan</b></button>
                        <button id="cek_success_sv_pax_order_flight" type="button" class="btn btn-block background-green d-none" onclick="editPaxPemesanFlight()" style="margin-top: 25px;"> <b class="text-colors-off"><i class="fa fa-check-square-o mr-1"></i> Edit</b></button>
                    </div>
                </div>`
            $("#data_pemesan_flight" ).removeClass('d-none')
            $("#data_pemesan_flight" ).append(paxTrain)

            $('.check_box_kai_reg').on('change', function() {
                var data_user = $("input[name='kai_reg_pemesan_check']:checked").length
                if(data_user == 1){
                    var name = JSON.parse(localStorage.getItem('name_auth'))
                    var phone = JSON.parse(localStorage.getItem('user_phone'))
                    var email = JSON.parse(localStorage.getItem('user_email'))
                    // console.log(0)
                    $("#name_pemesan").val(name)
                    $("#email_pemesan").val(email)
                    $("#phone_pemesan").val(phone)
                }else{
                    $("#name_pemesan").val("") 
                    $("#email_pemesan").val("")
                    $("#phone_pemesan").val("")
                }
            });
        
        for( var i = 1; i <= maxLoopPaxAd; i++){
            
            var tabelPesawat = `<br>
                <label class="h6"><b>Dewasa `+i+`</b>
                    <button id="editBtnPaxAdlFlight`+i+`" type="button" class="col-2 btn btn-block background-green d-none" style="float: right;" onclick="editPaxAdlFlight(`+i+`)"> <b class="text-colors-off"><i class="fa fa-check-square-o mr-1"></i> Edit</b></button> 
                    <button id="saveBtnPaxAdlFlight`+i+`" type="button" class="col-2 btn btn-block background-orange" style="float: right;" onclick="simpanPaxAdlFlight(`+i+`)"> <b class="text-colors-off"> <i class="fa fa-floppy-o mr-1"></i> Simpan</b></button>
                </label><br>  
                <div class="row ">
                    <div class="form-group col-3">
                        <label for="type">Type Identitas: <span class="text-danger">*</span></label>
                        <select type="text" class="form-control" id="type_id_ad_flight`+i+`">
                            <option value="KTP" selected>  NIK/KK </option>
                            <option value="Passport">  Passport </option>
                        </select>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback-type_id_ad_flight`+i+`"></div>
                    </div>
                    <div class="form-group col-9" id="ktp_ad_flight`+i+`">
                        <label for="type">Nomor Identitas: <span class="text-danger">*</span></label>
                        <input class="form-control inputVal" id="id_number_ad_flight`+i+`" name="id_number_ad_flight`+i+`" type="number" value="" onkeypress="if(this.value.length==16) return false;" />
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback-id_number_ad_flight`+i+` text-colors-block"></div>
                    </div>
                    <div class="form-group col-9 d-none" id="passport_ad_flight`+i+`">
                        <label for="type">Nomor Identitas: <span class="text-danger">*</span></label>
                        <div class="row" style="margin-left:1%;">
                            <input class="form-control inputVal col-10" id="id_npass_ad_flight`+i+`" name="id_npass_ad_flight`+i+`" type="number" value="" />
                        </div>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback-id_npass_ad_flight`+i+` text-colors-block"></div>
                    </div>
                </div>
                <div class="row ">
                    <div class="form-group col-2">
                        <label for="type">Title: <span class="text-danger">*</span></label>
                        <select type="text" class="form-control" id="title_penumpang_ad_flight`+i+`">
                            <option value="MR">  Tuan </option>
                            <option value="MRS">  Nyonya </option>
                        </select>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback-title_penumpang_ad_flight`+i+`"></div>
                    </div>
                    <div class="form-group col-5">
                        <label for="type">Nama Depan: <span class="text-danger">*</span></label>
                        <input class="form-control inputVal" id="first_name_ad_flight`+i+`" name="first_name_ad_flight`+i+`" type="text" value=""/>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback-first_name_ad_flight`+i+` text-colors-block"></div>
                    </div>
                    <div class="form-group col-5">
                        <label for="type">Nama Belakang: <span class="text-danger">*</span></label>
                        <input class="form-control inputVal" id="last_name_ad_flight`+i+`" name="last_name_ad_flight`+i+`" type="text" value="" >
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback-last_name_ad_flight`+i+` text-colors-block"></div>
                    </div>
                </div>
                <div class="row ">
                    <div class="form-group col-6">
                        <label for="type">Kebangsaan : <span class="text-danger">*</span></label>
                        <input class="form-control inputVal" id="kebangsaan_ad`+i+`" name="kebangsaan_ad`+i+`" type="text" value="" list="kebangsaan_li_ad`+i+`" onclick="cariNation(`+i+`)"/>
                            <datalist id="kebangsaan_li_ad`+i+`">
                                <option value="ID" selected>  Indonesia </option>
                            </datalist>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback-kebangsaan_ad`+i+` text-colors-block"></div>
                    </div>
                    <div class="form-group col-6">
                        <label for="type">Jenis Kelamin : <span class="text-danger">*</span></label>
                        <select type="text" class="form-control" id="j_kelamin_ad_flight`+i+`">
                            <option value="Male"> Pria </option>
                            <option value="Fimale"> Wanita </option>
                        </select>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback-j_kelamin_ad_flight`+i+` "></div>
                    </div>
                </div><hr>`
        $("#list_penumpang_adult" ).removeClass('d-none')
        $("#list_penumpang_adult" ).append(tabelPesawat)
        
        $("#type_id_ad_flight" + i).on('change',function(){
            var type = $(this).val();
            if(type == "Passport"){
                $("#ktp_ad_flight" + i).addClass('d-none')
                $("#ktp_ad_flight" + i).val('')
                $("#passport_ad_flight" + i).removeClass('d-none')
            }
            if(type == "KTP"){
                $("#ktp_ad_flight" + i).removeClass('d-none')
                $("#passport_ad_flight" + i).addClass('d-none')
            }
        });

      }
        
      for( var i = 1; i <= maxLoopPaxCh; i++){
            
        var tabelPesawat = `<br>
                <label class="h6"><b>Anak `+i+`</b>
                    <button id="editBtnPaxChlFlight`+i+`" type="button" class="col-2 btn btn-block background-green d-none" style="float: right;" onclick="editPaxChlFlight(`+i+`)"> <b class="text-colors-off"><i class="fa fa-check-square-o mr-1"></i> Edit</b></button> 
                    <button id="saveBtnPaxChlFlight`+i+`" type="button" class="col-2 btn btn-block background-orange" style="float: right;" onclick="simpanPaxChlFlight(`+i+`)"> <b class="text-colors-off"> <i class="fa fa-floppy-o mr-1"></i> Simpan </b></button>
                </label><br>
                <div class="row ">
                    <div class="form-group col-3">
                        <label for="type">Type Identitas: <span class="text-danger">*</span></label>
                        <select type="text" class="form-control" id="type_id_ch_flight`+i+`">
                            <option value="KTP"> NIK/KK </option>
                            <option value="Passport">  Passport </option>
                        </select>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback-type_id_ch_flight`+i+`"></div>
                    </div>
                    <div class="form-group col-9" id="ktp_ch_flight`+i+`">
                        <label for="type">Nomor Identitas: <span class="text-danger">*</span></label>
                        <input class="form-control inputVal" id="id_number_ch_flight`+i+`" name="id_number_ch`+i+`" type="number" value="" />
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback-id_number_ch_flight`+i+` text-colors-block"></div>
                    </div>
                    <div class="form-group col-9 d-none" id="passport_ch_flight`+i+`">
                    <label for="type">Nomor Identitas: <span class="text-danger">*</span></label>
                    <div class="row" style="margin-left:1%;">
                        <input class="form-control inputVal col-10" id="id_npass_ch_flight`+i+`" name="id_npass_ch`+i+`" type="number" value="" />
                    </div>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback-id_npass_ch_flight`+i+` text-colors-block"></div>
                    </div>
                </div>
                <div class="row ">
                    <div class="form-group col-2">
                        <label for="type">Title: <span class="text-danger">*</span></label>
                        <select type="text" class="form-control" id="title_penumpang_ch_flight`+i+`">
                            <option value="MR"> Tuan </option>
                            <option value="MRS"> Nyonya </option>
                        </select>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback-title_penumpang_ch_flight`+i+`"></div>
                    </div>
                    <div class="form-group col-5">
                        <label for="type">Nama Depan: <span class="text-danger">*</span></label>
                        <input class="form-control inputVal" id="first_name_ch_flight`+i+`" name="first_name_ch_flight`+i+`" type="text" value="" />
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback-first_name_ch_flight`+i+` text-colors-block"></div>
                    </div>
                    <div class="form-group col-5">
                        <label for="type">Nama Belakang: <span class="text-danger">*</span></label>
                        <input class="form-control inputVal" id="last_name_ch_flight`+i+`" name="last_name_ch_flight`+i+`" type="text" value="" />
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback-last_name_ch_flight`+i+` text-colors-block"></div>
                    </div>
                </div>
        
                <div class="row ">
                    <div class="form-group col-6">
                        <label for="type">Kebangsaan : <span class="text-danger">*</span></label>
                        <input class="form-control inputVal" id="kebangsaan_ch`+i+`" name="kebangsaan_ch`+i+`" type="text" value="" list="kebangsaan_li_ch`+i+`" onclick="cariNation(`+i+`)"/>
                            <datalist id="kebangsaan_li_ch`+i+`">
                            </datalist>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback-kebangsaan_ch`+i+` text-colors-block"></div>
                    </div>
                    <div class="form-group col-6">
                        <label for="type">Jenis Kelamin : <span class="text-danger">*</span></label>
                        <select type="text" class="form-control" id="j_kelamin_ch_flight`+i+`">
                            <option value="Male">  Pria </option>
                            <option value="Fimale">  Wanita </option>
                        </select>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback-j_kelamin_ch_flight`+i+`"></div>
                    </div>
                </div><hr>`
        $("#list_penumpang_child" ).removeClass('d-none')
        $("#list_penumpang_child" ).append(tabelPesawat)

        $("#type_id_ch_flight" + i).on('change',function(){
            var type = $(this).val();
            if(type == "Passport"){
                $("#ktp_ch_flight" + i).addClass('d-none')
                $("#ktp_ch_flight" + i).val('')
                $("#passport_ch_flight" + i).removeClass('d-none')
            }
            if(type == "KTP"){
                $("#ktp_ch_flight" + i).removeClass('d-none')
                $("#passport_ch_flight" + i).addClass('d-none')
            }
        })
      }

      for( var i = 1; i <= maxLoopPaxIn; i++){
            
        var tabelPesawat = `<br>
                <label class="h6"><b>Balita `+i+`</b>
                    <button id="editBtnPaxInfFlight`+i+`" type="button" class="col-2 btn btn-block background-green d-none" style="float: right;" onclick="editPaxInfFlight(`+i+`)"> <b class="text-colors-off"><i class="fa fa-check-square-o mr-1"></i> Edit</b></button> 
                    <button id="saveBtnPaxInfFlight`+i+`" type="button" class="col-2 btn btn-block background-orange" style="float: right;" onclick="simpanPaxInfFlight(`+i+`)"> <b class="text-colors-off"> <i class="fa fa-floppy-o mr-1"></i> Simpan </b></button>
                </label><br>
                <div class="row ">
                    <div class="form-group col-3">
                        <label for="type">Type Identitas: <span class="text-danger">*</span></label>
                        <select type="text" class="form-control" id="type_id_in_flight`+i+`">
                            <option value="KTP"> NIK/KK </option>
                            <option value="Passport">  Passport </option>
                        </select>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback-type_id_in_flight"></div>
                    </div>
                    <div class="form-group col-9" id="Ktp`+i+`">
                        <label for="type">Nomor Identitas: <span class="text-danger">*</span></label>
                        <input class="form-control inputVal" id="id_number_in_flight`+i+`" name="id_number_in_flight`+i+`" type="number" value="" />
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback-id_number_in_flight`+i+` text-colors-block"></div>
                    </div>
                    <div class="form-group col-9 d-none" id="passport`+i+`">
                    <label for="type">Nomor Identitas: <span class="text-danger">*</span></label>
                    <div class="row" style="margin-left:1%;">
                        <input class="form-control inputVal col-10" id="id_npass_in_flight`+i+`" name="id_npass_in_flight`+i+`" type="number" value="" />
                    </div>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback-id_npass_in_flight`+i+` text-colors-block"></div>
                    </div>
                </div>
                <div class="row ">
                    <div class="form-group col-2">
                        <label for="type">Title: <span class="text-danger">*</span></label>
                        <select type="text" class="form-control" id="title_penumpang_in_flight`+i+`">
                            <option value="MR">  Tuan </option>
                            <option value="MRS">  Nyonya </option>
                        </select>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback-title_penumpang_in_flight`+i+` text-colors-block"></div>
                    </div>
                    <div class="form-group col-5">
                        <label for="type">Nama Depan: <span class="text-danger">*</span></label>
                        <input class="form-control inputVal" id="first_name_in_flight`+i+`" name="first_name_in_flight`+i+`" type="text" value="" />
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback-first_name_in_flight`+i+` text-colors-block"></div>
                    </div>
                    <div class="form-group col-5">
                        <label for="type">Nama Belakang: <span class="text-danger">*</span></label>
                        <input class="form-control inputVal" id="last_name_in_flight`+i+`" name="last_name_in_flight`+i+`" type="text" value="" />
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback-last_name_in_flight`+i+` text-colors-block"></div>
                    </div>
                </div>
        
                <div class="row ">
                    <div class="form-group col-6">
                        <label for="type">Kebangsaan : <span class="text-danger">*</span></label>
                        <input class="form-control inputVal" id="kebangsaan_in`+i+`" name="kebangsaan_in_flight`+i+`" type="text" value="" list="kebangsaan_li_in`+i+`" onclick="cariNation(`+i+`)"/>
                            <datalist id="kebangsaan_li_in`+i+`">
                            </datalist>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback-kebangsaan_in`+i+` text-colors-block"></div>
                    </div>
                    <div class="form-group col-6">
                        <label for="type">Jenis Kelamin : <span class="text-danger">*</span></label>
                        <select type="text" class="form-control" id="j_kelamin_in_flight`+i+`">
                            <option value="Male">  Pria </option>
                            <option value="Fimale">  Wanita </option>
                        </select>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback"></div>
                    </div>
                </div><hr>`
            $("#list_penumpang_infant" ).removeClass('d-none')
            $("#list_penumpang_infant" ).append(tabelPesawat)

                $("#type_id_in_flight" + i).on('change',function(){
                    var type = $(this).val();
                    if(type == "Passport"){
                        $("#ktp_in_flight" + i).addClass('d-none')
                        $("#ktp_in_flight" + i).val('')
                        $("#passport_in_flight" + i).removeClass('d-none')
                    }
                    if(type == "KTP"){
                        $("#ktp_in_flight" + i).removeClass('d-none')
                        $("#passport_in_flight" + i).addClass('d-none')
                    }
                })
            }
            $.LoadingOverlay("hide")
        }
    });

    function dataGetOnValidate(){
        var datahtml = `
        <div class="modal fade" id="modalConfirmBooking">
            <div class="modal-dialog modal-sm modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Booking Confirmation</h5>
                        <button type="button" class="close" data-dismiss="modal">×</button>
                    </div><br>
                    <center><b>Pastikan anda telah mengisi data penumpang dengan benar </b></center>
                    <br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="bottonBook" onclick="enableLoading(); cekdataPaxFlight()"><i class="fa fa-check mr-1" ></i>Ya</button>
                        <button type="button" class="btn btn-light" data-dismiss="modal"><i class="fa fa-times mr-1"></i>Kembali</button>
                    </div>
                </div>
            </div>
        </div>`
        $("#modalBooking").append(datahtml)
        $("#modalConfirmBooking").modal('show')
    }

    function simpanPaxAdlFlight(id){
        var first_name_pax = $("#first_name_ad_flight" + id).val();
        var last_name_pax = $("#last_name_ad_flight" + id).val();
        var titles = $("#title_penumpang_ad_flight" + id).val();
        var nation = $("#kebangsaan_ad" + id).val();
        var kn = $("#type_id_ad_flight"+ id).val()

        if(kn == "KTP"){
            var id_number = $("#id_number_ad_flight" + id).val();
            var idbefore = id - 1;
            var idbefore1 = id - 2;
            var id_numberbefore = $("#id_number_ad_flight" + idbefore).val();
            var id_numberbefore1 = $("#id_number_ad_flight" + idbefore1).val();
        }else{
            var id_number = $("#id_npass_ad_flight" + id).val();
        }

        if(id_number == "" || first_name_pax == "" || last_name_pax == "" || nation == ""){

            $("#id_number_ad_flight" + id).removeClass("is-invalid").removeClass("border-danger")
            $(".invalid-feedback-id_number_ad_flight" + id).css("display", "none")

            $("#first_name_ad_flight" + id).removeClass("is-invalid").removeClass("border-danger")
            $(".invalid-feedback-first_name_ad_flight" + id).css("display", "none")

            $("#last_name_ad_flight" + id).removeClass("is-invalid").removeClass("border-danger")
            $(".invalid-feedback-last_name_ad_flight" + id).css("display", "none")

            $("#id_npass_ad_flight" + id).removeClass("is-invalid").removeClass("border-danger")
            $(".invalid-feedback-id_npass_ad_flight" + id).css("display", "none")

            $("#kebangsaan_ad" + id).removeClass("is-invalid").removeClass("border-danger")
            $(".invalid-feedback-kebangsaan_ad" + id).css("display", "none")

            if(first_name_pax == ""){
                $("#first_name_ad_flight" + id).addClass("is-invalid").addClass("border-danger")
                $(".invalid-feedback-first_name_ad_flight" + id).css("display", "block").html("Nama Tidak Boleh Kosong !")
            }

            if(last_name_pax == ""){
                $("#last_name_ad_flight" + id).addClass("is-invalid").addClass("border-danger")
                $(".invalid-feedback-last_name_ad_flight" + id).css("display", "block").html("Nama Tidak Boleh Kosong !")
            }

            if(kn == "KTP"){
                if(id_number == ""){
                    $("#id_number_ad_flight" + id).addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-id_number_ad_flight" + id).css("display", "block").html("No KTP/NIK Tidak Boleh Kosong !")
                }

                if(id_number.length < 16){
                    $("#id_number_ad_flight" + id).addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-id_number_ad_flight" + id).css("display", "block").html("No KTP/NIK tidak boleh kurang dari 16 digit !")
                }
                if(id_number === id_numberbefore || id_number === id_numberbefore1){
                    $("#id_number_ad_flight" + id).addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-id_number_ad_flight" + id).css("display", "block").html("No KTP/NIK tidak boleh sama dengan penumpang lain !")
                }
            }else{
                if(id_number == ""){
                    $("#id_npass_ad_flight" + id).addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-id_npass_ad_flight" + id).css("display", "block").html("No Passport Tidak Boleh Kosong !")
                }

                if(id_number.length < 9){
                    $("#id_npass_ad_flight" + id).addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-id_npass_ad_flight" + id).css("display", "block").html("No Passport tidak boleh kurang dari 9 digit !")
                }
            }

            if(nation == ""){
                $("#kebangsaan_ad" + id).addClass("is-invalid").addClass("border-danger")
                $(".invalid-feedback-kebangsaan_ad" + id).css("display", "block").html("Kebangsaan Tidak Boleh Kosong !")
            }

            toastr.error("Gagal Simpan Data Pemesan", "Error")
        
        }else if(id_number != "" && first_name_pax != "" && last_name_pax != "" && nation != ""){

            $("#id_number_ad_flight" + id).removeClass("is-invalid").removeClass("border-danger")
            $(".invalid-feedback-id_number_ad_flight" + id).css("display", "none")

            $("#first_name_ad_flight" + id).removeClass("is-invalid").removeClass("border-danger")
            $(".invalid-feedback-first_name_ad_flight" + id).css("display", "none")

            $("#last_name_ad_flight" + id).removeClass("is-invalid").removeClass("border-danger")
            $(".invalid-feedback-last_name_ad_flight" + id).css("display", "none")

            $("#id_npass_ad_flight" + id).removeClass("is-invalid").removeClass("border-danger")
            $(".invalid-feedback-id_npass_ad_flight" + id).css("display", "none")

            $("#kebangsaan_ad" + id).removeClass("is-invalid").removeClass("border-danger")
            $(".invalid-feedback-kebangsaan_ad" + id).css("display", "none")

            var km = {}
            if(kn == "KTP"){
                if(id_number == ""){
                    $("#id_number_ad_flight" + id).addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-id_number_ad_flight" + id).css("display", "block").html("No KTP/NIK Tidak Boleh Kosong !")
                    km.number = 0
                }else{
                    km.number = 1
                }

                if(id_number.length < 16){
                    $("#id_number_ad_flight" + id).addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-id_number_ad_flight" + id).css("display", "block").html("No KTP/NIK tidak boleh kurang dari 16 digit !")
                    km.number = 0
                }else{
                    km.number = 1
                }
                if(id_number === id_numberbefore || id_number === id_numberbefore1){
                    $("#id_number_ad_flight" + id).addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-id_number_ad_flight" + id).css("display", "block").html("No KTP/NIK tidak boleh sama dengan penumpang lain !")
                    km.number = 0
                }else{
                    km.number = 1
                }
            }else{
                if(id_number == ""){
                    $("#id_npass_ad_flight" + id).addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-id_npass_ad_flight" + id).css("display", "block").html("No Passport Tidak Boleh Kosong !")
                    km.number = 0
                }else{
                    km.number = 1
                }

                if(id_number.length < 9){
                    $("#id_npass_ad_flight" + id).addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-id_npass_ad_flight" + id).css("display", "block").html("No Passport tidak boleh kurang dari 9 digit !")
                    km.number = 0
                }else{
                    km.number = 1
                }
            }

            if(km.number == 1 ){
                setPaxAdlFlight(id)
            }
            
        }
    }

    function simpanPaxChlFlight(id){
        var first_name_pax = $("#first_name_ch_flight" + id).val();
        var last_name_pax = $("#last_name_ch_flight" + id).val();
        var titles = $("#title_penumpang_ch_flight" + id).val();
        var nation = $("#kebangsaan_ch" + id).val();
        var kn = $("#type_id_ch_flight"+ id).val()

        if(kn == "KTP"){
            var id_number = $("#id_number_ch_flight" + id).val();
            var id_number = $("#id_number_ad_flight" + id).val();
            var idbefore = id - 1;
            var idbefore1 = id - 2;
            var id_numberbefore = $("#id_number_ad_flight" + idbefore).val();
            var id_numberbefore1 = $("#id_number_ad_flight" + idbefore1).val();
        }else{
            var id_number = $("#id_npass_ch_flight" + id).val();
        }

        if(id_number == "" || first_name_pax == "" || last_name_pax == "" || nation == ""){

            $("#id_number_ch_flight" + id).removeClass("is-invalid").removeClass("border-danger")
            $(".invalid-feedback-id_number_ch_flight" + id).css("display", "none")

            $("#first_name_ch_flight" + id).removeClass("is-invalid").removeClass("border-danger")
            $(".invalid-feedback-first_name_ch_flight" + id).css("display", "none")

            $("#last_name_ch_flight" + id).removeClass("is-invalid").removeClass("border-danger")
            $(".invalid-feedback-last_name_ch_flight" + id).css("display", "none")

            $("#id_npass_ch_flight" + id).removeClass("is-invalid").removeClass("border-danger")
            $(".invalid-feedback-id_npass_ch_flight" + id).css("display", "none")

            $("#kebangsaan_ch" + id).removeClass("is-invalid").removeClass("border-danger")
            $(".invalid-feedback-kebangsaan_ch" + id).css("display", "none")

            if(first_name_pax == ""){
                $("#first_name_ch_flight" + id).addClass("is-invalid").addClass("border-danger")
                $(".invalid-feedback-first_name_ch_flight" + id).css("display", "block").html("Nama Tidak Boleh Kosong !")
            }

            if(last_name_pax == ""){
                $("#last_name_ch_flight" + id).addClass("is-invalid").addClass("border-danger")
                $(".invalid-feedback-last_name_ch_flight" + id).css("display", "block").html("Nama Tidak Boleh Kosong !")
            }

            if(kn == "KTP"){
                if(id_number == ""){
                    $("#id_number_ch_flight" + id).addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-id_number_ch_flight" + id).css("display", "block").html("No KTP/NIK Tidak Boleh Kosong !")
                }

                if(id_number.length < 16){
                    $("#id_number_ch_flight" + id).addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-id_number_ch_flight" + id).css("display", "block").html("No KTP/NIK tidak boleh kurang dari 16 digit !")
                }
                if(id_number === id_numberbefore || id_number === id_numberbefore1){
                    $("#id_number_ad_flight" + id).addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-id_number_ad_flight" + id).css("display", "block").html("No KTP/NIK tidak boleh sama dengan penumpang lain !")
                }
            }else{
                if(id_number == ""){
                    $("#id_npass_ch_flight" + id).addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-id_npass_ch_flight" + id).css("display", "block").html("No Passport Tidak Boleh Kosong !")
                }

                if(id_number.length < 9){
                    $("#id_npass_ch_flight" + id).addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-id_npass_ch_flight" + id).css("display", "block").html("No Passport tidak boleh kurang dari 9 digit !")
                }
            }

            if(nation == ""){
                $("#kebangsaan_ch" + id).addClass("is-invalid").addClass("border-danger")
                $(".invalid-feedback-kebangsaan_ch" + id).css("display", "block").html("Kebangsaan Tidak Boleh Kosong !")
            }

            toastr.error("Gagal Simpan Data Pemesan", "Error")
        
        }else if(id_number != "" && first_name_pax != "" && last_name_pax != "" && nation != ""){

            $("#id_number_ch_flight" + id).removeClass("is-invalid").removeClass("border-danger")
            $(".invalid-feedback-id_number_ch_flight" + id).css("display", "none")

            $("#first_name_ch_flight" + id).removeClass("is-invalid").removeClass("border-danger")
            $(".invalid-feedback-first_name_ch_flight" + id).css("display", "none")

            $("#last_name_ch_flight" + id).removeClass("is-invalid").removeClass("border-danger")
            $(".invalid-feedback-last_name_ch_flight" + id).css("display", "none")

            $("#id_npass_ch_flight" + id).removeClass("is-invalid").removeClass("border-danger")
            $(".invalid-feedback-id_npass_ch_flight" + id).css("display", "none")

            $("#kebangsaan_ch" + id).removeClass("is-invalid").removeClass("border-danger")
            $(".invalid-feedback-kebangsaan_ch" + id).css("display", "none")

            var km = {}
            if(kn == "KTP"){
                if(id_number == ""){
                    $("#id_number_ch_flight" + id).addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-id_number_ch_flight" + id).css("display", "block").html("No KTP/NIK Tidak Boleh Kosong !")
                    km.number = 0
                }else{
                    km.number = 1
                }

                if(id_number.length < 16){
                    $("#id_number_ch_flight" + id).addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-id_number_ch_flight" + id).css("display", "block").html("No KTP/NIK tidak boleh kurang dari 16 digit !")
                    km.number = 0
                }else{
                    km.number = 1
                }
            }else{
                if(id_number == ""){
                    $("#id_npass_ch_flight" + id).addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-id_npass_ch_flight" + id).css("display", "block").html("No Passport Tidak Boleh Kosong !")
                    km.number = 0
                }else{
                    km.number = 1
                }

                if(id_number.length < 9){
                    $("#id_npass_ch_flight" + id).addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-id_npass_ch_flight" + id).css("display", "block").html("No Passport tidak boleh kurang dari 9 digit !")
                    km.number = 0
                }else{
                    km.number = 1
                }
            }

            if(nation == ""){
                $("#kebangsaan_ch" + id).addClass("is-invalid").addClass("border-danger")
                $(".invalid-feedback-kebangsaan_ch" + id).css("display", "block").html("Kebangsaan Tidak Boleh Kosong !")
                km.nation = 0
            }else{
                km.nation = 1
            }

            if(km.nation == 1 && km.number == 1){
                setPaxChlFlight(id)
            }
            
        }
    }

    function simpanPaxInfFlight(id){
        var first_name_pax = $("#first_name_in_flight" + id).val();
        var last_name_pax = $("#last_name_in_flight" + id).val();
        var titles = $("#title_penumpang_in_flight" + id).val();
        var nation = $("#kebangsaan_in" + id).val();
        var kn = $("#type_id_in_flight"+ id).val()

        if(kn == "KTP"){
            var id_number = $("#id_number_in_flight" + id).val();
        }else{
            var id_number = $("#id_npass_in_flight" + id).val();
        }

        if(id_number == "" || first_name_pax == "" || last_name_pax == "" || nation == ""){

            $("#id_number_in_flight" + id).removeClass("is-invalid").removeClass("border-danger")
            $(".invalid-feedback-id_number_in_flight" + id).css("display", "none")

            $("#first_name_in_flight" + id).removeClass("is-invalid").removeClass("border-danger")
            $(".invalid-feedback-first_name_in_flight" + id).css("display", "none")

            $("#last_name_in_flight" + id).removeClass("is-invalid").removeClass("border-danger")
            $(".invalid-feedback-last_name_in_flight" + id).css("display", "none")

            $("#id_npass_in_flight" + id).removeClass("is-invalid").removeClass("border-danger")
            $(".invalid-feedback-id_npass_in_flight" + id).css("display", "none")

            $("#kebangsaan_in" + id).removeClass("is-invalid").removeClass("border-danger")
            $(".invalid-feedback-kebangsaan_in" + id).css("display", "none")

            if(first_name_pax == ""){
                $("#first_name_in_flight" + id).addClass("is-invalid").addClass("border-danger")
                $(".invalid-feedback-first_name_in_flight" + id).css("display", "block").html("Nama Tidak Boleh Kosong !")
            }

            if(last_name_pax == ""){
                $("#last_name_in_flight" + id).addClass("is-invalid").addClass("border-danger")
                $(".invalid-feedback-last_name_in_flight" + id).css("display", "block").html("Nama Tidak Boleh Kosong !")
            }

            if(kn == "KTP"){
                if(id_number == ""){
                    $("#id_number_in_flight" + id).addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-id_number_in_flight" + id).css("display", "block").html("No KTP/NIK Tidak Boleh Kosong !")
                }

                if(id_number.length < 16){
                    $("#id_number_in_flight" + id).addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-id_number_in_flight" + id).css("display", "block").html("No KTP/NIK tidak boleh kurang dari 16 digit !")
                }
            }else{
                if(id_number == ""){
                    $("#id_npass_in_flight" + id).addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-id_npass_in_flight" + id).css("display", "block").html("No Passport Tidak Boleh Kosong !")
                }

                if(id_number.length < 9){
                    $("#id_npass_in_flight" + id).addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-id_npass_in_flight" + id).css("display", "block").html("No Passport tidak boleh kurang dari 9 digit !")
                }
            }

            if(nation == ""){
                $("#kebangsaan_in" + id).addClass("is-invalid").addClass("border-danger")
                $(".invalid-feedback-kebangsaan_in" + id).css("display", "block").html("Kebangsaan Tidak Boleh Kosong !")
            }

            toastr.error("Gagal Simpan Data Pemesan", "Error")
        
        }else if(id_number != "" && first_name_pax != "" && last_name_pax != "" && nation != ""){

            $("#id_number_in_flight" + id).removeClass("is-invalid").removeClass("border-danger")
            $(".invalid-feedback-id_number_in_flight" + id).css("display", "none")

            $("#first_name_in_flight" + id).removeClass("is-invalid").removeClass("border-danger")
            $(".invalid-feedback-first_name_in_flight" + id).css("display", "none")

            $("#last_name_in_flight" + id).removeClass("is-invalid").removeClass("border-danger")
            $(".invalid-feedback-last_name_in_flight" + id).css("display", "none")

            $("#id_npass_in_flight" + id).removeClass("is-invalid").removeClass("border-danger")
            $(".invalid-feedback-id_npass_in_flight" + id).css("display", "none")

            $("#kebangsaan_in" + id).removeClass("is-invalid").removeClass("border-danger")
            $(".invalid-feedback-kebangsaan_in" + id).css("display", "none")

            var km = {}
            if(kn == "KTP"){
                if(id_number == ""){
                    $("#id_number_in_flight" + id).addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-id_number_in_flight" + id).css("display", "block").html("No KTP/NIK Tidak Boleh Kosong !")
                    km.number = 0
                }else{
                    km.number = 1
                }

                if(id_number.length < 16){
                    $("#id_number_in_flight" + id).addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-id_number_in_flight" + id).css("display", "block").html("No KTP/NIK tidak boleh kurang dari 16 digit !")
                    km.number = 0
                }else{
                    km.number = 1
                }
            }else{
                if(id_number == ""){
                    $("#id_npass_in_flight" + id).addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-id_npass_in_flight" + id).css("display", "block").html("No Passport Tidak Boleh Kosong !")
                    km.number = 0
                }else{
                    km.number = 1
                }

                if(id_number.length < 9){
                    $("#id_npass_in_flight" + id).addClass("is-invalid").addClass("border-danger")
                    $(".invalid-feedback-id_npass_in_flight" + id).css("display", "block").html("No Passport tidak boleh kurang dari 9 digit !")
                    km.number = 0
                }else{
                    km.number = 1
                }
            }

            if(km.number == 1){
                setPaxInfFlight(id)
            }
        }
    }
    
    function setPaxAdlFlight(id){
        var first_name_pax = $("#first_name_ad_flight" + id).val();
        var last_name_pax = $("#last_name_ad_flight" + id).val();
        var titles = $("#title_penumpang_ad_flight" + id).val();
        var nation = $("#kebangsaan_ad" + id).val();
        var gander = $("#j_kelamin_ad_flight" + id).val();
        var kn = $("#type_id_ad_flight"+ id).val();

        if(kn == "KTP"){
            var id_number = $("#id_number_ad_flight" + id).val();
        }else{
            var id_number = $("#id_npass_ad_flight" + id).val();
        }

        var dataDetailsPaxAll = JSON.parse(localStorage.getItem('data_paxAdl_flight_temporare'));
        if (dataDetailsPaxAll == undefined){
            var data_flight_pax = ""
        }else{
            var data_flight_pax = dataDetailsPaxAll
        }

        var data_pax_flight = [];
        for(var i = 0; i < maxLoopPaxAd; i++){
            var n = i+1
            if(n == id){
                    var title = titles
                    var name_first = first_name_pax
                    var name_last = last_name_pax
                    var identity = id_number
                    var nations = nation
                    var ganders = gander
                    var type_ident = kn
            }else{

                if(data_flight_pax == ""){

                    var title = ""
                    var name_first = ""
                    var name_last = ""
                    var identity = ""
                    var nations = ""
                    var ganders = ""
                    var type_ident = ""

                }else{
                    if(data_flight_pax[i] == null || data_flight_pax[i] == undefined){
                        var title = ""
                        var name_first = ""
                        var name_last = ""
                        var identity = ""
                        var nations = ""
                        var ganders = ""
                        var type_ident = ""
                    }else{
                        var title = data_flight_pax[i].title
                        var name_first = data_flight_pax[i].name_first
                        var name_last = data_flight_pax[i].name_last
                        var identity = data_flight_pax[i].identity
                        var nations = data_flight_pax[i].nations
                        var ganders = data_flight_pax[i].ganders
                        var type_ident = data_flight_pax[i].type_ident
                    }
                }     
            } 
                    var dataPaxFlight = {
                        title, name_first, name_last, identity, nations, ganders, type_ident
                    }
                    data_pax_flight.push(dataPaxFlight)
        }
        
            $("#id_number_ad_flight" + id).prop("disabled", true);
            $("#first_name_ad_flight" + id).prop("disabled", true);
            $("#last_name_ad_flight" + id).prop("disabled", true);
            $("#title_penumpang_ad_flight" + id).prop("disabled", true);
            $("#j_kelamin_ad_flight" + id).prop("disabled", true);
            $("#kebangsaan_ad" + id).prop("disabled", true);
            $("#type_id_ad_flight" + id).prop("disabled", true);
            $("#id_npass_ad_flight" + id).prop("disabled", true);

            $("#saveBtnPaxAdlFlight" + id).addClass('d-none');
            $("#editBtnPaxAdlFlight" + id).removeClass('d-none');
            toastr.success("Berhasil simpan Penumpang Dewasa" + id, "Success")
            localStorage.setItem("data_paxAdl_flight_temporare", JSON.stringify(data_pax_flight))
    }

    function editPaxAdlFlight(id){
            $("#id_number_ad_flight" + id).prop("disabled", false);
            $("#first_name_ad_flight" + id).prop("disabled", false);
            $("#last_name_ad_flight" + id).prop("disabled", false);
            $("#title_penumpang_ad_flight" + id).prop("disabled", false);
            $("#j_kelamin_ad_flight" + id).prop("disabled", false);
            $("#kebangsaan_ad" + id).prop("disabled", false);
            $("#type_id_ad_flight" + id).prop("disabled", false);
            $("#id_npass_ad_flight" + id).prop("disabled", false);

            $("#saveBtnPaxAdlFlight" + id).removeClass('d-none');
            $("#editBtnPaxAdlFlight" + id).addClass('d-none');
    }

    function setPaxChlFlight(id){
        var first_name_pax = $("#first_name_ch_flight" + id).val();
        var last_name_pax = $("#last_name_ch_flight" + id).val();
        var titles = $("#title_penumpang_ch_flight" + id).val();
        var nation = $("#kebangsaan_ch" + id).val();
        var gander = $("#j_kelamin_ch_flight" + id).val();
        var kn = $("#type_id_ch_flight"+ id).val();

        if(kn == "KTP"){
            var id_number = $("#id_number_ch_flight" + id).val();
        }else{
            var id_number = $("#id_npass_ch_flight" + id).val();
        }

        var dataDetailsPaxAll = JSON.parse(localStorage.getItem('data_paxChl_flight_temporare'));
        if (dataDetailsPaxAll == undefined){
            var data_flight_pax = ""
        }else{
            var data_flight_pax = dataDetailsPaxAll
        }

        var data_pax_flight = [];
        for(var i = 0; i < maxLoopPaxCh; i++){
            var n = i+1
            if(n == id){
                    var title = titles
                    var name_first = first_name_pax
                    var name_last = last_name_pax
                    var identity = id_number
                    var nations = nation
                    var ganders = gander
                    var type_ident = kn
            }else{

                if(data_flight_pax == ""){

                    var title = ""
                    var name_first = ""
                    var name_last = ""
                    var identity = ""
                    var nations = ""
                    var ganders = ""
                    var type_ident = ""

                }else{
                    if(data_flight_pax[i] == null || data_flight_pax[i] == undefined){
                        var title = ""
                        var name_first = ""
                        var name_last = ""
                        var identity = ""
                        var nations = ""
                        var ganders = ""
                        var type_ident = ""
                    }else{
                        var title = data_flight_pax[i].title
                        var name_first = data_flight_pax[i].name_first
                        var name_last = data_flight_pax[i].name_last
                        var identity = data_flight_pax[i].identity
                        var nations = data_flight_pax[i].nations
                        var ganders = data_flight_pax[i].ganders
                        var type_ident = data_flight_pax[i].type_ident
                    }
                }     
            } 
                    var dataPaxFlight = {
                        title, name_first, name_last, identity, nations, ganders, type_ident
                    }
                    data_pax_flight.push(dataPaxFlight)
        }
        
            $("#id_number_ch_flight" + id).prop("disabled", true);
            $("#first_name_ch_flight" + id).prop("disabled", true);
            $("#last_name_ch_flight" + id).prop("disabled", true);
            $("#title_penumpang_ch_flight" + id).prop("disabled", true);
            $("#j_kelamin_ch_flight" + id).prop("disabled", true);
            $("#kebangsaan_ch" + id).prop("disabled", true);
            $("#type_id_ch_flight" + id).prop("disabled", true);
            $("#id_npass_ch_flight" + id).prop("disabled", true);

            $("#saveBtnPaxChlFlight" + id).addClass('d-none');
            $("#editBtnPaxChlFlight" + id).removeClass('d-none');
            toastr.success("Berhasil simpan Penumpang Anak" + id, "Success")
            localStorage.setItem("data_paxChl_flight_temporare", JSON.stringify(data_pax_flight))
    }

    function editPaxChlFlight(id){
            $("#id_number_ch_flight" + id).prop("disabled", false);
            $("#first_name_ch_flight" + id).prop("disabled", false);
            $("#last_name_ch_flight" + id).prop("disabled", false);
            $("#title_penumpang_ch_flight" + id).prop("disabled", false);
            $("#j_kelamin_ch_flight" + id).prop("disabled", false);
            $("#kebangsaan_ch" + id).prop("disabled", false);
            $("#type_id_ch_flight" + id).prop("disabled", false);
            $("#id_npass_ch_flight" + id).prop("disabled", false);

            $("#saveBtnPaxChlFlight" + id).removeClass('d-none');
            $("#editBtnPaxChlFlight" + id).addClass('d-none');
    }

    function setPaxInfFlight(id){
        var first_name_pax = $("#first_name_in_flight" + id).val();
        var last_name_pax = $("#last_name_in_flight" + id).val();
        var titles = $("#title_penumpang_in_flight" + id).val();
        var nation = $("#kebangsaan_in" + id).val();
        var gander = $("#j_kelamin_in_flight" + id).val();
        var kn = $("#type_id_in_flight"+ id).val();

        if(kn == "KTP"){
            var id_number = $("#id_number_in_flight" + id).val();
        }else{
            var id_number = $("#id_npass_in_flight" + id).val();
        }

        var dataDetailsPaxAll = JSON.parse(localStorage.getItem('data_paxInf_flight_temporare'));
        if (dataDetailsPaxAll == undefined){
            var data_flight_pax = ""
        }else{
            var data_flight_pax = dataDetailsPaxAll
        }

        var data_pax_flight = [];
        for(var i = 0; i < maxLoopPaxIn; i++){
            var n = i+1
            if(n == id){
                    var title = titles
                    var name_first = first_name_pax
                    var name_last = last_name_pax
                    var identity = id_number
                    var nations = nation
                    var ganders = gander
                    var type_ident = kn
            }else{

                if(data_flight_pax == ""){
                    var title = ""
                    var name_first = ""
                    var name_last = ""
                    var identity = ""
                    var nations = ""
                    var ganders = ""
                    var type_ident = ""

                }else{
                    if(data_flight_pax[i] == null || data_flight_pax[i] == undefined){
                        var title = ""
                        var name_first = ""
                        var name_last = ""
                        var identity = ""
                        var nations = ""
                        var ganders = ""
                        var type_ident = ""
                    }else{
                        var title = data_flight_pax[i].title
                        var name_first = data_flight_pax[i].name_first
                        var name_last = data_flight_pax[i].name_last
                        var identity = data_flight_pax[i].identity
                        var nations = data_flight_pax[i].nations
                        var ganders = data_flight_pax[i].ganders
                        var type_ident = data_flight_pax[i].type_ident
                    }
                }     
            } 
                    var dataPaxFlight = {
                        title, name_first, name_last, identity, nations, ganders, type_ident
                    }
                    data_pax_flight.push(dataPaxFlight)
        }
        
            $("#id_number_in_flight" + id).prop("disabled", true);
            $("#first_name_in_flight" + id).prop("disabled", true);
            $("#last_name_in_flight" + id).prop("disabled", true);
            $("#title_penumpang_in_flight" + id).prop("disabled", true);
            $("#j_kelamin_in_flight" + id).prop("disabled", true);
            $("#kebangsaan_in" + id).prop("disabled", true);
            $("#type_id_in_flight" + id).prop("disabled", true);
            $("#id_npass_in_flight" + id).prop("disabled", true);

            $("#saveBtnPaxInfFlight" + id).addClass('d-none');
            $("#editBtnPaxInfFlight" + id).removeClass('d-none');
            toastr.success("Berhasil simpan Penumpang Balita" + id, "Success")
            localStorage.setItem("data_paxInf_flight_temporare", JSON.stringify(data_pax_flight))
    }

    function editPaxInfFlight(id){
            $("#id_number_in_flight" + id).prop("disabled", false);
            $("#first_name_in_flight" + id).prop("disabled", false);
            $("#last_name_in_flight" + id).prop("disabled", false);
            $("#title_penumpang_in_flight" + id).prop("disabled", false);
            $("#j_kelamin_in_flight" + id).prop("disabled", false);
            $("#kebangsaan_in" + id).prop("disabled", false);
            $("#type_id_in_flight" + id).prop("disabled", false);
            $("#id_npass_in_flight" + id).prop("disabled", false);

            $("#saveBtnPaxInfFlight" + id).removeClass('d-none');
            $("#editBtnPaxInfFlight" + id).addClass('d-none');
    }
    
    function cekdataPaxFlight(){
        var pax_adl = JSON.parse(localStorage.getItem('data_paxAdl_flight_temporare'))
        var pax_chl = JSON.parse(localStorage.getItem('data_paxChl_flight_temporare'))
        var pax_inf = JSON.parse(localStorage.getItem('data_paxInf_flight_temporare'))
        var pax_request = JSON.parse(localStorage.getItem('data_pax'))
        var maxLoopPaxAd = pax_request[0].adult;
        var maxLoopPaxCh = pax_request[1].child;
        var maxLoopPaxIn = pax_request[2].infant;

       
        if(maxLoopPaxCh != 0 && maxLoopPaxIn != 0){
            var km = {}
            if(pax_adl == undefined || pax_chl == undefined || pax_inf == undefined){
                $.LoadingOverlay("hide")
                toastr.error("Anda belum menyimpan semua data penumpang", "Error")

            }else if(pax_adl == undefined && pax_chl == undefined && pax_inf == undefined){
                $.LoadingOverlay("hide")
                toastr.error("Anda belum menyimpan semua data penumpang", "Error")

            }else{

                if(pax_adl.length == maxLoopPaxAd){
                    var hasEmptyValue = pax_adl.find(function(obj) {
                        return obj.identity === "";
                    });

                    if (hasEmptyValue) {
                        km.adl = 0
                    } else {
                        km.adl = 1
                    }
                  
                }else{
                    $.LoadingOverlay("hide")
                    toastr.error("Anda belum menyimpan semua data penumpang Dewasa", "Error")
                    km.adl = 0
                }

                if(pax_chl.length == maxLoopPaxCh){
                    var hasEmptyValue = pax_chl.find(function(obj) {
                        return obj.identity === "";
                    });

                    if (hasEmptyValue) {
                        km.chl = 0
                    } else {
                        km.chl = 1
                    }
                }else{
                    $.LoadingOverlay("hide")
                    toastr.error("Anda belum menyimpan semua data penumpang Anak", "Error")
                    km.chl = 0
                }

                if(pax_inf.length == maxLoopPaxIn){
                    var hasEmptyValue = pax_inf.find(function(obj) {
                        return obj.identity === "";
                    });

                    if (hasEmptyValue) {
                        km.inf = 0
                    } else {
                        km.inf = 1
                    }
                }else{
                    $.LoadingOverlay("hide")
                    toastr.error("Anda belum menyimpan semua data penumpang Balita", "Error")
                    km.inf = 0
                }

                if(km.adl == 1 && km.chl == 1 && km.inf == 1){
                    dataGetOn()
                }else{
                    $.LoadingOverlay("hide")
                    toastr.error("Anda belum menyimpan semua data penumpang!", "Error")
                }
            }
        }else if(maxLoopPaxCh != 0){
            var km = {}
            if(pax_adl == null || pax_chl == null){
                $.LoadingOverlay("hide")
                toastr.error("Anda belum menyimpan semua data penumpang", "Error")

            }else if(pax_adl == null && pax_chl == null){
                $.LoadingOverlay("hide")
                toastr.error("Anda belum menyimpan semua data penumpang", "Error")

            }else{

                if(pax_adl.length == maxLoopPaxAd){
                    var hasEmptyValue = pax_adl.find(function(obj) {
                        return obj.identity === "";
                    });

                    if (hasEmptyValue) {
                        km.adl = 0
                    } else {
                        km.adl = 1
                    }
                }else{
                    $.LoadingOverlay("hide")
                    toastr.error("Anda belum menyimpan semua data penumpang Dewasa", "Error")
                    km.adl = 0
                }

                if(pax_chl.length == maxLoopPaxCh){
        
                    var hasEmptyValue = pax_chl.find(function(obj) {
                        return obj.identity === "";
                    });

                    if (hasEmptyValue) {
                        km.chl = 0
                    } else {
                        km.chl = 1
                    }

                }else{
                    $.LoadingOverlay("hide")
                    toastr.error("Anda belum menyimpan semua data penumpang Anak", "Error")
                    km.chl = 0
                }

                if(km.adl == 1 && km.chl == 1){
                    dataGetOn()
                }else{
                    $.LoadingOverlay("hide")
                    toastr.error("Anda belum menyimpan semua data penumpang!", "Error")
                }
            }
        }else if(maxLoopPaxIn != 0){
            if(pax_adl == null || pax_inf == null){

                $.LoadingOverlay("hide")
                toastr.error("Anda belum menyimpan semua data penumpang", "Error")

            }else if(pax_adl == null && pax_inf == null){

                $.LoadingOverlay("hide")
                toastr.error("Anda belum menyimpan semua data penumpang", "Error")

            }else{

                if(pax_adl.length == maxLoopPaxAd){
                    km.adl = 1
                }else{
                    $.LoadingOverlay("hide")
                    toastr.error("Anda belum menyimpan semua data penumpang Dewasa", "Error")
                    km.adl = 0
                }

                if(pax_inf.length == maxLoopPaxIn){
                    km.inf = 1
                }else{
                    $.LoadingOverlay("hide")
                    toastr.error("Anda belum menyimpan semua data penumpang Balita", "Error")
                    km.inf = 0
                }

                if(km.adl == 1 && km.inf == 1){
                    dataGetOn()
                }else{
                    $.LoadingOverlay("hide")
                    toastr.error("Anda belum menyimpan semua data penumpang!", "Error")
                }
            }
        }else{
            if(pax_adl != undefined || pax_adl != null){
                if(pax_adl.length == maxLoopPaxAd){
                    if(pax_adl.length == maxLoopPaxAd){
                    var km = {}
                        var hasEmptyValue = pax_adl.find(function(obj) {
                            return obj.identity === "";
                        });

                        if (hasEmptyValue) {
                            km.adl = 0
                        } else {
                            km.adl = 1
                        }

                    }else{
                        $.LoadingOverlay("hide")
                        toastr.error("Anda belum menyimpan semua data penumpang Dewasa", "Error")
                        km.adl = 0
                    }

                    if(km.adl == 1){
                        dataGetOn()
                    }else{
                        $.LoadingOverlay("hide")
                        toastr.error("Anda belum menyimpan semua data penumpang!", "Error")
                    }
                }else{
                    $.LoadingOverlay("hide")
                    toastr.error("Anda belum menyimpan semua data penumpang", "Error")
                }
            }else{
                $.LoadingOverlay("hide")
                toastr.error("Anda belum menyimpan semua data penumpang", "Error")
            }
        }
  
    }

    function dataGetOn(){
        var data_pax_flight = localStorage.getItem("data_pemesan_flight")
        if(data_pax_flight != undefined){
            var pax_adl = JSON.parse(localStorage.getItem('data_paxAdl_flight_temporare'))
            var pax_chl = JSON.parse(localStorage.getItem('data_paxChl_flight_temporare'))
            var pax_inf = JSON.parse(localStorage.getItem('data_paxInf_flight_temporare'))
      
            var type_trip = $("#type_trip" ).val()
            var token = JSON.parse(localStorage.getItem('data_token'))
            var id_flight = JSON.parse(localStorage.getItem('id_flight_details'))
            var pax_request = JSON.parse(localStorage.getItem('data_pax'))

            var maxLoopPaxAd = pax_request[0].adult;
            var maxLoopPaxCh = pax_request[1].child;
            var maxLoopPaxIn = pax_request[2].infant;
            
            var adl_flight_pax = []
            var chl_flight_pax = []
            var inf_flight_pax = []

            for (i = 0; i < maxLoopPaxAd; i++){
                var n = i+1
                
                var paxDataAd = {
                    "index": n,
                    "id_number": pax_adl[i].identity,
                    "title_name": pax_adl[i].title,
                    "first_name": pax_adl[i].name_first,
                    "last_name": pax_adl[i].name_last,
                    "birth_date": "1998-10-10",
                    "gender": pax_adl[i].ganders,
                    "nationality": "ID",
                    "birth_country": "ID",
                    "doc_type": pax_adl[i].type_ident,
                    "parent": "",
                    "passport_number": "",
                    "passport_issued_country": "",
                    "passport_issued_date": "",
                    "passport_expired_date": "",
                    "type": "Adult",
                }

                adl_flight_pax.push(paxDataAd)
            }

            console.log(paxDataAd);

            for (i = 0; i < maxLoopPaxCh; i++){
                var n = i+1

                var paxDataCh = {
                    "index": n,
                    "id_number": pax_chl[i].identity,
                    "title_name": pax_chl[i].title,
                    "first_name": pax_chl[i].name_first,
                    "last_name": pax_chl[i].name_last,
                    "birth_date": "1998-10-10",
                    "gender": pax_chl[i].ganders,
                    "nationality": "ID",
                    "birth_country": "ID",
                    "doc_type": pax_chl[i].type_ident,
                    "parent": "",
                    "passport_number": "",
                    "passport_issued_country": "",
                    "passport_issued_date": "",
                    "passport_expired_date": "",
                    "type": "Child",
                } 
                chl_flight_pax.push(paxDataCh)
            }

            console.log(paxDataCh);

            for (i = 0; i < maxLoopPaxIn; i++){
                var n = i+1
   
                var paxDataIn = {
                    "index": n,
                    "id_number": pax_inf[i].identity,
                    "title_name": pax_inf[i].title,
                    "first_name": pax_inf[i].name_first,
                    "last_name": pax_inf[i].name_last,
                    "birth_date": "1998-10-10",
                    "gender": pax_inf[i].ganders,
                    "nationality": "ID",
                    "birth_country": "ID",
                    "doc_type": pax_inf[i].type_ident,
                    "parent": 0,
                    "passport_number": "",
                    "passport_issued_country": "",
                    "passport_issued_date": "",
                    "passport_expired_date": "",
                    "type": "Infant",
                } 
                inf_flight_pax.push(paxDataIn)
            }

            localStorage.setItem("data_pax_adl", JSON.stringify(adl_flight_pax))
            localStorage.setItem("data_pax_chd", JSON.stringify(chl_flight_pax))
            localStorage.setItem("data_pax_inf", JSON.stringify(inf_flight_pax))

            toLpFlight()
        }else{
            $.LoadingOverlay("hide")
            toastr.error("Gagal, Anda belum menyimpan data pemesan!", "Error")
        } 
    }

    function refreshPage(){
        location.reload();
    }
    function toLpFlight(){
        window.location.href = "/pesawat/addPax";
    }
    
    function pushAccCodeIndex(){
        var kode_acc_indx = $("#access_code").val()
        localStorage.setItem("acc_code_as", JSON.stringify(kode_acc_indx))
    }

    function getCountryList(searchText, token, listId, elmntId) {
        return fetch(mainurl +'services/country_code?search='+searchText, {
            method: 'GET',
            headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token,
            },
        }).then((response) => response.json()).then((responseData) => {
            var countries = responseData.data;
            // console.log(countries)
            if(responseData.message == "Data Country Code berhasil didapatkan!"){
                var options = "";
                for (var i = 0; i < countries.length; i++) {
                    var no = i+1
                    // if(countries[i].name = "Indonesian"){
                    //     options += '<option value="'+ countries[i].name + '">' + countries[i].code + '<input id="code_nation" value="'+ countries[i].code +'" hidden></option>';
                    // }else{
                        options += '<option value="'+ countries[i].code + '">' + countries[i].name + '</option>';
                    // }
                }
                $("#" + listId).empty().append(options);

                console.log(countries)
                $("#" + elmntId).removeClass("is-invalid").removeClass("border-danger")
                $(".invalid-feedback-"+ elmntId).css("display", "none")

            }else if(responseData.message == "Data Country Code tidak ada!"){

                $("#" + elmntId).addClass("is-invalid").addClass("border-danger")
                $(".invalid-feedback-"+ elmntId).css("display", "block").html("Data Negara tidak ada!")
            }
            
        });
    }

    function cariNation(id) {
        var token = JSON.parse(localStorage.getItem('data_token'))
        var token_set = token['access_token']
        $("#kebangsaan_ad" + id).keyup(function() {
            getCountryList($(this).val(), token_set, "kebangsaan_li_ad" + id, "kebangsaan_ad" + id);
        });
        $("#kebangsaan_ch" + id).keyup(function() {
            getCountryList($(this).val(), token_set, "kebangsaan_li_ch" + id, "kebangsaan_ch" + id, "code_kota_addons_flight_ch" + id);
        });
        $("#kebangsaan_in" + id).keyup(function() {
            getCountryList($(this).val(), token_set, "kebangsaan_li_in" + id, "kebangsaan_in" + id, "code_kota_addons_flight_in" + id);
        });
    }

    

    // function changeType(id) {
    //     var token = JSON.parse(localStorage.getItem('data_token'))
    //     var token_set = token['access_token']
    //     $("#kebangsaan_ad" + id).keyup(function() {
    //         getCountryList($(this).val(), token_set, "kebangsaan_li_ad" + id, "kebangsaan_ad" + id);
    //     });
    //     $("#kebangsaan_ch" + id).keyup(function() {
    //         getCountryList($(this).val(), token_set, "kebangsaan_li_ch" + id, "kebangsaan_ch" + id);
    //     });
    //     $("#kebangsaan_in" + id).keyup(function() {
    //         getCountryList($(this).val(), token_set, "kebangsaan_li_in" + id, "kebangsaan_in" + id);
    //     });
    // }
    // $("#kebangsaan_ad"+id).keyup(function(){
    //     var searchText = $(this).val();
    //     var token = JSON.parse(localStorage.getItem('data_token'))
    //     var token_set = token['access_token']
    //     var url = fetch(mainurl +'services/country_code?search='+searchText,{
    //         method: 'GET',
    //         headers: {
    //             'Accept': 'application/json',
    //             'Content-Type': 'application/json',
    //             'Authorization': 'Bearer ' + token_set,
    //         },
    //     }).then((response) => response.json()).then((responseData) => {
    //         var countries = responseData.data;
    //     // console.log(countries)
    //     if(responseData.message == "Data Country Code berhasil didapatkan!"){
    //         var options = "";
    //         $("#kebangsaan_li_ad1" ).empty()
    //         for (var i = 0; i < countries.length; i++) {
    //             var no = i+1
    //             // if(countries[i].name = "Indonesian"){
    //             //     options += '<option value="'+ countries[i].name + '">' + countries[i].code + '<input id="code_nation" value="'+ countries[i].code +'" hidden></option>';
    //             // }else{
    //                 options += '<option value="'+ countries[i].name + '">' + countries[i].code + '<input id="code_nation" value="'+ countries[i].code +'" hidden></option>';
    //             // }
    //         }
    //         $("#kebangsaan_li_ad" +id).append(options);

    //         console.log(countries)
    //         $("#kebangsaan_li_ad" +id).removeClass("is-invalid").removeClass("border-danger")
    //         $(".invalid-feedback-kebangsaan_ad1").css("display", "none")

    //     }else if(responseData.message == "Data Country Code tidak ada!"){

    //         $("#kebangsaan_li_ad"+id).addClass("is-invalid").addClass("border-danger")
    //         $(".invalid-feedback-kebangsaan_ad"+id).css("display", "block").html("Data Negara tidak ada!")
    //     }
    //     });
    // });

 function simpanPaxPemesanFlight(){
    if($("#name_pemesan").val() == "" && $("#email_pemesan").val() == "" && $("#phone_pemesan").val() == ""){
        $("#name_pemesan").addClass("is-invalid").addClass("border-danger")
        $(".invalid-feedback-name_pemesan").css("display", "block").html("Nama Tidak Boleh Kosong")

        $("#email_pemesan").addClass("is-invalid").addClass("border-danger")
        $(".invalid-feedback-email_pemesan").css("display", "block").html("Email Tidak Boleh Kosong")

        $("#phone_pemesan").addClass("is-invalid").addClass("border-danger")
        $(".invalid-feedback-phone_pemesan").css("display", "block").html("Phone Tidak Boleh Kosong")
        toastr.error("Gagal Simpan Data Pemesan", "Error")

    }else if($("#name_pemesan").val() == "" && $("#email_pemesan").val() == ""){
        $("#name_pemesan").addClass("is-invalid").addClass("border-danger")
        $(".invalid-feedback-name_pemesan").css("display", "block").html("Nama Tidak Boleh Kosong")

        $("#email_pemesan").addClass("is-invalid").addClass("border-danger")
        $(".invalid-feedback-email_pemesan").css("display", "block").html("Email Tidak Boleh Kosong")

        toastr.error("Gagal Simpan Data Pemesan", "Error")
    }else if($("#email_pemesan").val() == "" && $("#phone_pemesan").val() == ""){
        $("#email_pemesan").addClass("is-invalid").addClass("border-danger")
        $(".invalid-feedback-email_pemesan").css("display", "block").html("Email Tidak Boleh Kosong")

        $("#phone_pemesan").addClass("is-invalid").addClass("border-danger")
        $(".invalid-feedback-phone_pemesan").css("display", "block").html("Phone Tidak Boleh Kosong")
        
        toastr.error("Gagal Simpan Data Pemesan", "Error")
    }else if($("#name_pemesan").val() == "" && $("#phone_pemesan").val() == ""){
        $("#name_pemesan").addClass("is-invalid").addClass("border-danger")
        $(".invalid-feedback-name_pemesan").css("display", "block").html("Nama Tidak Boleh Kosong")

        $("#phone_pemesan").addClass("is-invalid").addClass("border-danger")
        $(".invalid-feedback-phone_pemesan").css("display", "block").html("Phone Tidak Boleh Kosong")
        
        toastr.error("Gagal Simpan Data Pemesan", "Error")
    }else if($("#name_pemesan").val() == "" ){
        $("#name_pemesan").addClass("is-invalid").addClass("border-danger")
        $(".invalid-feedback-name_pemesan").css("display", "block").html("Nama Tidak Boleh Kosong")

        toastr.error("Gagal Simpan Data Pemesan", "Error")
    }else if($("#phone_pemesan").val() == ""){
        $("#phone_pemesan").addClass("is-invalid").addClass("border-danger")
        $(".invalid-feedback-phone_pemesan").css("display", "block").html("Phone Tidak Boleh Kosong")
        
        toastr.error("Gagal Simpan Data Pemesan", "Error")
    }else if($("#email_pemesan").val() == ""){
        $("#email_pemesan").addClass("is-invalid").addClass("border-danger")
        $(".invalid-feedback-email_pemesan").css("display", "block").html("Email Tidak Boleh Kosong")

        toastr.error("Gagal Simpan Data Pemesan", "Error")
    }else{
        $("#name_pemesan").removeClass("is-invalid").removeClass("border-danger")
        $(".invalid-feedback-name_pemesan").css("display", "none") 

        $("#email_pemesan").removeClass("is-invalid").removeClass("border-danger")
        $(".invalid-feedback-email_pemesan").css("display", "none") 

        $("#phone_pemesan").removeClass("is-invalid").removeClass("border-danger")
        $(".invalid-feedback-phone_pemesan").css("display", "none") 

        var data_pax_order = {
            "name": $("#name_pemesan").val(),
            "email": $("#email_pemesan").val(),
            "phone": $("#phone_pemesan").val()
        }
        $("#name_pemesan").prop("disabled", true);
        $("#email_pemesan").prop("disabled", true);
        $("#phone_pemesan").prop("disabled", true);
        $("#title_pemesan").prop("disabled", true);

        $("#cek_success_sv_pax_order_flight").removeClass("d-none")
        $("#savedatapenumpangFlight").addClass("d-none")

        toastr.success("Berhasil Simpan Data Pemesan", "Success")
        localStorage.setItem("data_pemesan_flight", JSON.stringify(data_pax_order))
        }

    }

   function editPaxPemesanFlight() {
        localStorage.removeItem("data_pemesan_flight")
        $("#name_pemesan").prop("disabled", false);
        $("#email_pemesan").prop("disabled", false);
        $("#phone_pemesan").prop("disabled", false);
        $("#title_pemesan").prop("disabled", false);

        var data_pax_order = {
            "name": $("#name_pemesan").val(),
            "email": $("#email_pemesan").val(),
            "phone": $("#phone_pemesan").val()
        }

        $("#cek_success_sv_pax_order_flight").addClass("d-none")
        $("#savedatapenumpangFlight").removeClass("d-none")

    }
            
</script>
@endpush