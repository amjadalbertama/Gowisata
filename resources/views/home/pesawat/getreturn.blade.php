@extends('layout.app')

@section('content')
<div class="container-fluid mt-100 main-font">
    <div class="row" id="body-sidemenu">
        <div id="main-content" class="col with-fixed-sidebar pb-5 pt-3" style="margin-top:20px;">
            <div class="container">
                <div class="row">
                    <div class="col-9 pt-2"><br>
                        <h5 class="font-weight-normal text-center text-uppercase text-colors-on"> <b id="pas_data" class="d-none">Isi Data Penumpang</b></h5>
                            <hr>
                        <div class="card shadow p-3 mb-5 bg-body rounded d-none" id="tabel_pesawat"></div>
                        <!-- <div class="card shadow p-3 mb-5 bg-body rounded d-none" id="formOdrDetailsPesawat"></div>
                        <div class="card shadow p-3 mb-5 bg-body rounded d-none" id="list_penumpang_adult"></div>
                        <div class="card shadow p-3 mb-5 bg-body rounded d-none" id="list_penumpang_child"></div>
                        <div class="card shadow p-3 mb-5 bg-body rounded d-none" id="list_penumpang_infant"></div> -->
                        <div class="col-4 d-none" id="button_booking_flight" style="float: right;"> 
                            <button class="btn btn-block main-color" onclick="dataGetOnValidate()"> <b class="text-colors-off"><i class="fa fa-chevron-circle-right mr-1"></i> Selanjutnya</b></button>
                        </div>
                    </div>

                    <div class="pt-2 col-3 d-none" id="detail_pesawat_roundtrip">
                        <div class="card shadow-sm col-12">
                            <div class="card-body">
                                <div class="row" style="margin-top: 15px; margin-left: 0.5px;">
                                    <h6 id="rute_asal"></h6>
                                        <h6 style="margin-left: 10px;">
                                            <i class="fa fa-exchange text-colors-on"></i>
                                            <!-- <i id="scadule_rd" class="fa fa-arrow-left text-colors-on"></i> -->
                                        </h6 > 
                                    <h6 id="rute_tujuan" style="margin-left: 10px;"></h6>
                                </div>
                                <hr style="margin-top: -10px;">
                                <h6 class="text-colors-on"><b>Pesawat Berangkat</b> </h6>
                                <div class="row" style="margin-left: 0.5px;">
                                    <b id="pesawat"></b> - <b id="no_pesawat"></b>
                                </div>
                                    <div id="class_pesawat"></div><br>
                                <div>
                                    Keberangkatan : <b id="date_scadule_depart"></b>
                                </div>
                                <div>
                                    Sampai : <b id="date_scadule_arrive"></b>
                                </div>
                                <hr>
                                <div id="data_return" class="d-none">
                                    <h6 class="text-colors-on">Pesawat Pulang</h6>
                                    <div class="row" style="margin-left: 0.5px;">
                                        <b id="pesawat"></b> - <b id="no_pesawat"></b>
                                    </div>
                                        <div id="class_pesawat"></div>
                                    <div>
                                        Keberangkatan : <b id="date_scadule_depart"></b>
                                    </div>
                                    <div>
                                        Sampai : <b id="date_scadule_arrive"></b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div><!-- Main Col -->
    </div><!-- body-row -->
</div><!-- .container-fluid-->
<div id="modalCodeAccess"></div>
<div></div>
@endsection

@push('scripts')
<script>

    $.LoadingOverlay("show")
  
    var data_flight = JSON.parse(localStorage.getItem('data_flight_details'))
    var pax_request = JSON.parse(localStorage.getItem('data_pax'))
    var token = JSON.parse(localStorage.getItem('data_token'))
    var access_code = JSON.parse(localStorage.getItem('acc_code'))
    // var id_flight_dept = JSON.parse(localStorage.getItem('id_flight_details'))
    var data_search = JSON.parse(localStorage.getItem('data_flight_search'))

    console.log(data_search['depart'])
  
    var token_set = token['access_token']
    var url = fetch(mainurl + 'flight/get_schedule_all',{
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token_set,
        },
        body: JSON.stringify({
            "access_code": access_code,
            "trip_type": data_search['type_trip'],
            "org": data_search['org'],
            "des": data_search['des'],
            "departure_date": data_search['depart'],
            "return_date": data_search['arrive'],
            "pax_adult": data_search['pax'][0].adult,
            "pax_child": data_search['pax'][1].child,
            "pax_infant": data_search['pax'][2].infant,
            "page": 1,
            "per_page": 1000,
            "sort_by": "id",
            "order": "asc"
        }),
      }).then((response) => response.json()).then((responseData) => {
        console.log(responseData)
        if(responseData.success == false){
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
                                <button type="button" class="btn btn-primary" id="bottonBook" onclick="pushAccCode(); refreshPage()"><i class="fa fa-check mr-1" ></i>Confirm</button>
                            </div>
                        </div>
                    </div>
                </div> `;
            $("#modalCodeAccess").append(valid_code)
            $("#modalAccessCode").modal('show')

        }else if(responseData.success == true){
            $("#detail_pesawat_roundtrip" ).removeClass('d-none')
            $("#pesawat").append(data_flight['name'])
            $("#class_pesawat").append(data_flight['class'])
            $("#rute_asal").append(data_flight['org'])
            $("#rute_tujuan").append(data_flight['des'])
            var date_dpart = reformatDateListFlight(data_flight['depart'])
            var date_return = reformatDateListFlight(data_flight['arrive'])
            $("#date_scadule_depart").append(``+date_dpart.date+` - `+date_dpart.time+``)
            $("#date_scadule_arrive").append(``+date_return.date+` - `+date_return.time+``)
            var tabelPesawat = `
                <h1 class="h6 font-weight-normal text-center text-uppercase mt-2"> <b id="rd" class="text-colors-on"> Pilih Jadwal Kepulangan </b></h1>
                    <div class="table-responsive" >
                        <table class="table bg-white">
                            <thead class="thead-main text-nowrap">
                                <!-- <tr class="text-uppercase font-11" id="header_account">
                                    <th class="text-center h7" colspan="7"><b>  List Tiket Tersedia </b> </th>
                                </tr> -->
                                <!-- <tr class="text-uppercase font-11" id="header_account">
                                    <th class="text-center" colspan="7">filter</th>
                                </tr> -->
                                <tr id="">
                                    <th class="text-center col-md-1">Nama Pesawat</th>
                                    <th class="text-center col-md-1">Asal</th>
                                    <th class="text-center col-md-1"></th>
                                    <th class="text-center col-md-1">Tujuan</th>
                                    <th class="text-center col-md-1">Harga</th>
                                    <th class="text-center col-md-1">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-nowrap" id="flight_table_data_return">
                            
                            </tbody>
                            <tfoot class="border-bottom">
                                <!-- <tr class="bg-brown">
                                    <td id="beforeAddData" colspan="7" class="pl-3 text-center font-12">Tidak ada data yang ditampilkan</td>
                                </tr> -->
                            </tfoot>
                        </table>
                    </div>`;
                $("#tabel_pesawat" ).removeClass('d-none')
                $("#tabel_pesawat" ).append(tabelPesawat)

        var retur = responseData.data.schedules.return[0];
            // for (var i = 0; i < retur.length; i++){
            //     var cube = retur[i];
                for(var t = 0; t < retur.length; t++)if(data_flight['arrive'] < retur[t].departure_date){
                    var result = reformatDateListFlight(retur[t].departure_date);
                    var resultReturn = reformatDateListFlight(retur[t].arrive_date);
                    var id = t + 1;
                    
                    setSchedule = `<tr id="">
                        <td id="`+ id +`" class="pl-3 text-center "><img src="`+retur[t].airline_logo+`" alt="Logo" height="50" width="50" mt-n1 mr-2"> <b>`+ retur[t].airline +`</b><br>`+ retur[t].flight_class +`<br>`+retur[t].travel_time+`</td>
                        <td id="" class="pl-3 text-center "><b style=" font-size: 15px;">`+ retur[t].origin +`</b><br><a style=" font-size: 12px;">`+ result.date +` - <b>`+result.time+`</a></td>
                        <td id="" class="pl-3 text-center "><i class="fa fa-arrow-right fa-2x"></i><br><p>`+retur[t].flight_type+`</p></td>
                        <td id="" class="pl-3 text-center "><b style=" font-size: 15px;">`+ retur[t].destination +`</b><br><a style=" font-size: 12px;">`+ resultReturn.date +` - <b>`+resultReturn.time+`</a></td>
                        <td id="" class="pl-3 text-right text-colors-on" style=" font-size: 17px;"> <b>Rp `+ formatPrice(retur[t].price_per_person) +`</b></td>
                        <td id="" class="pl-3 text-center"> <button id="btn_rd_return`+id+`" class="btn btn-block main-color" onclick="enableLoading(); setidflightReturn(`+ id +`); todetailFlight();"><b class="text-colors-off">Pilih</b></button>
                            <input id="getDetails_return`+ id +`" value="`+ retur[t].id_reference +`" hidden></input>
                            <input id="getOrigin_rn`+ id +`" value="`+ retur[t].origin +`" hidden></input>
                            <input id="getDestinasi_rn`+ id +`" value="`+ retur[t].destination +`" hidden></input>
                            <input id="getName_rn`+ id +`" value="`+ retur[t].airline +`" hidden></input>
                            <input id="getClass_rn`+ id +`" value="`+ retur[t].flight_class +`" hidden></input>
                            <input id="getDepart_rn`+ id +`" value="`+ retur[t].departure_date +`" hidden></input>
                            <input id="getArrive_rn`+ id +`" value="`+ retur[t].arrive_date +`" hidden></input></td>
                    </tr>`;
                    
                    $("#flight_table_data_return").append(setSchedule);
                    
                    // if(type_trip == "OneWay"){
                    //     $('#btn_rd' + id).addClass('d-none')
                    //     $('#btn_ow'+ id).removeClass('d-none')
                    // }else if(type_trip == "RoundTrip"){
                    //     $('#btn_ow'+ id).addClass('d-none')
                    //     $('#btn_rd'+ id).removeClass('d-none')
                    // }

                }
            
        }
            $.LoadingOverlay("hide")
    });

    function refreshPage(){
        location.reload();
    }

    function setidflightReturn(id){

        var id_flight = $("#getDetails_return"+ id).val()
        var org_flight = $("#getOrigin_rn"+ id).val()
        var des_flight = $("#getDestinasi_rn"+ id).val()
        var name_flight = $("#getName_rn"+ id).val()
        var class_flight = $("#getClass_rn"+ id).val()
        var deprt_flight = $("#getDepart_rn"+ id).val()
        var arrive_flight = $("#getArrive_rn"+ id).val()
     
        var data_flight_return = {
            "id_return": id_flight,
            "org" : org_flight,
            "des" : des_flight,
            "name" : name_flight,
            "class" : class_flight,
            "depart" : deprt_flight,
            "arrive" : arrive_flight,
        }

        localStorage.setItem("data_flight_return", JSON.stringify(data_flight_return))
    }
    
    function todetailFlight(){
        window.location.href = "/pesawat"
    }
    // function toLpFlight(){
    //     window.location.href = "/pesawat/addPax";
    // }


            
</script>
@endpush