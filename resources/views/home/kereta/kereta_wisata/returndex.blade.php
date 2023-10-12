@extends('layout.app')

@section('content')
<div class="container-fluid mt-100 main-font">
    <div class="row" id="body-sidemenu">
        <div id="main-content" class="col with-fixed-sidebar pb-5 pt-3" style="margin-top:20px;">
            <div class="container">
                <div class="row">
                    <div class="col-9 pt-2"><br>
                        <h5 class="font-weight-normal text-center text-uppercase text-colors-on"> <b id="pas_data" class="d-none">Pilih Jadwal Kereta Pulang</b></h5>
                            <hr>
                        <div class="card shadow p-3 mb-5 bg-body rounded d-none" id="tabel_kereta_regular"></div>
                        <div class="card shadow p-3 mb-5 bg-body rounded d-none" id="formOdrDetailsPesawat"></div>
                        <!-- <div class="card shadow p-3 mb-5 bg-body rounded d-none" id="list_penumpang_adult"></div>
                        <div class="card shadow p-3 mb-5 bg-body rounded d-none" id="list_penumpang_child"></div>
                        <div class="card shadow p-3 mb-5 bg-body rounded d-none" id="list_penumpang_infant"></div> -->
                        <div class="col-4 d-none" id="button_booking_train" style="float: right;"> 
                            <button class="btn btn-block main-color" onclick="dataGetOnValidate()"> <b class="text-colors-off"><i class="fa fa-chevron-circle-right mr-1"></i> Selanjutnya</b></button>
                        </div>
                    </div>
                    
                    <div class="pt-2 col-3 d-none" id="detail_train">
                        <div class="card shadow-sm col-12">
                            <div class="card-body">
                                <div class="row" style="margin-top: 15px; margin-left: 0.5px;">
                                    <h6 id="rute_asal_dpt"></h6>
                                        <h6 style="margin-left: 10px;">
                                            <i class="fa fa-arrow-right text-colors-on"></i>
                                        </h6 > 
                                    <h6 id="rute_tujuan_dpt" style="margin-left: 10px;"></h6>
                                </div>
                                <hr style="margin-top: -10px;">
                                <h6 class="text-colors-on"><b>Kereta Berangkat</b> </h6>
                                <div class="row" style="margin-left: 0.5px;">
                                    <b id="train_dpt"></b>-<b id="no_train_dpt"></b>
                                </div>
                                <div class="row" style="margin-left: 0.5px;">
                                    <div id="class_train_dpt" style="font-size: 12px;"></div> - <div id="sub_class_train_dpt" style="font-size: 12px;"></div>
                                </div><br>
                                <div>
                                    Keberangkatan : <b id="date_scadule_depart_dpt"></b>
                                </div>
                                <div>
                                    Sampai : <b id="date_scadule_arrive_dpt"></b>
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
                                    <b id="pesawat_dpt"></b> <b id="no_train"></b>
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
<div id="codeBooking"></div>
@endsection

@push('scripts')
<script>
    $("#data_pax_navbar_flight" ).addClass('text-colors-on')
    $.LoadingOverlay("show")
  
    var data_train = JSON.parse(localStorage.getItem('data_scadule_wisata'))
    var pax_request = JSON.parse(localStorage.getItem('data_pax'))
    var token = JSON.parse(localStorage.getItem('data_token'))
    var data_train_search = JSON.parse(localStorage.getItem('data_scadule_wisata'))
    var data = JSON.parse(localStorage.getItem('data_train_return'))
        $("#detail_train" ).removeClass('d-none')
        $("#train_dpt").append(data_train[0]['name_train'])
        $("#no_train_dpt").append(data_train[0]['train_number'])
        $("#rute_asal_dpt").append(data_train[0]['org'])
        $("#rute_tujuan_dpt").append(data_train[0]['des'])
        $("#date_scadule_depart_dpt").append(data_train[0]['time_depart'])
        $("#date_scadule_arrive_dpt").append(data_train[0]['time_arrival'])
            
    var token_set = token['access_token']
    var url = fetch(mainurl +'train/get_schedule_all',{
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token_set,
        },
        body: JSON.stringify({
            "tags": data['tags'],
            "org": data['asal'],
            "des": data['tujuan'],
            "departure_date": data_train_search[0]['departure'],
            "pax_adult": parseInt(data_train_search[0]['pax_adl']),
            "pax_infant": parseInt(data_train_search[0]['pax_inf']),
            "return_date": data_train_search[0]['return'],
            "page": 1,
            "per_page": 10,
            "is_paging": false
        }),

   }).then((response) => response.json()).then((responseData) => {
    $("#pas_data").removeClass('d-none');
     var asal = responseData;
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
        $("#tabel_kereta_regular" ).removeClass('d-none')
        $("#tabel_kereta_regular" ).append(tabelkereta)
     $.LoadingOverlay("hide")
     if(responseData.success == false ||responseData.data == null || responseData.data == []){
       
         var tblend = `<tr>
                         <td id="" class="pl-3 text-center " colspan="6">Train Schedule not Found!</td>
                     </tr>`;
         $("#train_table_data").append(tblend);

     }else{

         var asal = responseData.data.return;
         var aol = responseData.data;
         console.log(aol)

                for(var i = 0; i < asal.length; i++){

                    var bilangan = asal[i].adult_price;
                    var number_string = bilangan.toString(),
                    split	= number_string.split(','),
                    sisa 	= split[0].length % 3,
                    rupiah 	= split[0].substr(0, sisa),
                    ribuan 	= split[0].substr(sisa).match(/\d{1,3}/gi);   
                  if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                  }
                  rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;

                 var n = i + 1
                 setSchedule = `<tr id="">
                                    <td id="" class="pl-3 text-center "><b>`+ asal[i].transporter_name +`</b><br>`+ asal[i].class +`</td>
                                    <td id="" class="pl-3 text-center "><b style=" font-size: 15px;">`+ asal[i].origin +`</b><br><a style=" font-size: 12px;">`+ asal[i].depature_time +`</a> <i class="fa fa-arrow-right fa-2x " style="margin-left: 45px; margin-top: -10px;"></i></td>
                                    <td id="" class="pl-3 text-center "><b style=" font-size: 15px;">`+ asal[i].destination +`</b><br><a style=" font-size: 12px;">`+ asal[i].arrival_time +`</a></td>
                                    <td id="" class="pl-3 text-center text-colors-on" style=" font-size: 17px;"> <b>Rp `+ rupiah +`</b></td>
                                    <td id="" class="pl-3 text-center"> <button id="getDetailsTrain`+ n +`" class="btn btn-block main-color" onclick="getdDataCartTrainReturn(`+ n +`);"><b class="text-colors-off">Pilih</b></button> 
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
                }
         
            }
        });

    function getdDataCartTrainReturn(id){
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

        var set_data_train_return =  {

            "vendor_id":vendor,
            "org" : org,
            "des" : des,
            "train_number" : number,
            "name_train" : name,
            "time_depart" : depart_date,
            "time_arrival" : arrive_date,
        }
        
        localStorage.setItem("data_train_wis_return", JSON.stringify(set_data_train_return))
        toChooseWagon()
    }

    function toChooseWagon(){
 
        window.location.href = "/kaiwisata/list/wagon";
 
    }
            
</script>
@endpush