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
  
    var data_train = JSON.parse(localStorage.getItem('data_train_depart'))
    var pax_request = JSON.parse(localStorage.getItem('data_pax'))
    var token = JSON.parse(localStorage.getItem('data_token'))
    var data_train_search = JSON.parse(localStorage.getItem('data_search_train_return'))
    var data_train_return = JSON.parse(localStorage.getItem('data_train_return'))

        $("#detail_train" ).removeClass('d-none')
        $("#train_dpt").append(data_train['name_train'])
        $("#no_train_dpt").append(data_train['transporter_no'])
        $("#class_train_dpt").append(data_train['transporter_class'])
        $("#sub_class_train_dpt").append(data_train['transporter_sub_class'])
        $("#rute_asal_dpt").append(data_train['origin'])
        $("#rute_tujuan_dpt").append(data_train['destination'])
        $("#date_scadule_depart_dpt").append(data_train['departure_date'])
        $("#date_scadule_arrive_dpt").append(data_train['arrive_date'])
            
    var token_set = token['access_token']
    var url = fetch(mainurl +'train/get_schedule_all',{
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token_set,
        },
        body: JSON.stringify({
            "tags": data_train_return['tags'],
            "org": data_train_return['asal'],
            "des": data_train_return['tujuan'],
            "departure_date": data_train_search['start_date'],
            "pax_adult": parseInt(data_train_search['adult']),
            "pax_infant": parseInt(data_train_search['infant']),
            "return_date": data_train_search['end_date'],
            "page": 1,
            "per_page": 25,
            "sort_by": "id",
            "order": "asc"
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

            let datePartss = data_train['arrive_date'].split(" - ");
            let date = new Date(datePartss[0].replace(/(\d{2})\/(\d{2})\/(\d{4})/, "$2/$1/$3") + " " + datePartss[1]);
            date.setHours(date.getHours() + 1);
            let updatedDepartureDate = formatDate(date);

            function formatDate(date) {
            let day = date.getDate();
            let month = date.getMonth() + 1;
            let year = date.getFullYear();
            let hours = date.getHours();
            let minutes = date.getMinutes();
            let formattedDate = `${day.toString().padStart(2, '0')}/${month.toString().padStart(2, '0')}/${year} - ${hours.toString().padStart(2, '0')}:${minutes.toString().padStart(2, '0')}`;
            return formattedDate;
            }
                for(var i = 0; i < asal.length; i++)if(asal[i].depature_time >= updatedDepartureDate){

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
                 setSchedule = `<tr id="list_schadule_train_return`+n+`">
                                    <td id="" class="pl-3 text-center "><b>`+ asal[i].transporter_name +`(`+ asal[i].transporter_no +`)</b><br>`+ asal[i].class +`<div id="seat_tersedia`+ n +`" class="d-none text-colors-block"> Kursi Tersedia: `+ asal[i].seat_available+`</div><div id="seat_tersedia_on`+ n +`" class="text-colors-none"> Kursi Tersedia: `+ asal[i].seat_available+`</div></td>
                                    <td id="" class="pl-3 text-center "><b style=" font-size: 15px;">`+ asal[i].origin +`</b><br><a style=" font-size: 12px;">`+ asal[i].depature_time +`</a></td>
                                    <td id="" class="pl-3 text-center "><i class="fa fa-arrow-right fa-2x " style=" margin-top: 10px;"></i></td>
                                    <td id="" class="pl-3 text-center "><b style=" font-size: 15px;">`+ asal[i].destination +`</b><br><a style=" font-size: 12px;">`+ asal[i].arrival_time +`</a></td>
                                    <td id="" class="pl-3 text-center text-colors-on" style=" font-size: 17px;"> <b>Rp `+ rupiah +`</b></td>
                                    <td id="" class="pl-3 text-center"> <button id="getDetailsTrain`+ n +`" class="btn btn-block main-color" onclick="getdDataCartTrainReturn(`+ n +`); getIdCartTrainReturn(`+ n +`)"><b class="text-colors-off">Pilih</b></button> 
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

                    if(asal[i].seat_available == 0 || asal[i].seat_available == null){
                        $('#list_schadule_train'+ n).addClass("background-disabled2")
                        $('#getDetailsTrain'+ n).attr('disabled', true).removeClass("main-color").addClass("background-disabled")
                        $('#getDetailsTrainRegReturn'+ n).attr('disabled', true).removeClass("main-color").addClass("background-disabled")
                    }

                    if(asal[i].seat_available <= 4){
                        $('#seat_tersedia'+ n).removeClass('d-none')
                        $('#seat_tersedia_on'+ n).addClass('d-none')
                    }
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
        
        var product = "train_regular";
        localStorage.setItem("product_payment", JSON.stringify(product))
        localStorage.setItem("data_train_return", JSON.stringify(set_data_train_depart))
    }


    function getIdCartTrainReturn(id){
    
    var data_train_search = JSON.parse(localStorage.getItem('data_search_train_return'))
    var data_train = JSON.parse(localStorage.getItem('data_train_depart'))

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
    // var startDate = $("#startDate_krl_reg").val()
    
    // console.log(adpric)
    var token = JSON.parse(localStorage.getItem('data_token'))
    var pax_request = JSON.parse(localStorage.getItem('data_pax'))
    var maxLoopPaxAd = pax_request[0].adult;
    var maxLoopPaxIn = pax_request[1].infant;

    var depart_date = data_train_search['start_date']

    var arrive_date = data_train_search['end_date']

    var token_set = token['access_token']
    var url = fetch(mainurl+ 'train/booking_cart',{
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token_set,
        },
        body: JSON.stringify({

            "data_schedule_depart": {
                "origin": data_train['origin'],
                "destination": data_train['destination'],
                "departure_date": data_train_search['start_date'],
                // "arrival_date": formatDateTimeToBook(arrivalTime),
                "transporter_no": data_train['transporter_no'],
                "transporter_class": data_train['transporter_class'],
                "transporter_sub_class": data_train['transporter_sub_class'],
                "vendor_id": data_train['vendor_id'],
                "adult_price":  data_train['adult_price'],
                "adult_discounted_price": data_train['adult_discounted_price'],
                "infant_price": data_train['infant_price'],
                "infant_discounted_price": data_train['infant_discounted_price']
            },
            "data_schedule_return": {
                "origin": org,
                "destination": des,
                "return_date": data_train_search['end_date'],
                // "arrival_date": formatDateTimeToBook(arrivalTime),
                "transporter_no": number,
                "transporter_class": clas,
                "transporter_sub_class": subclas,
                "vendor_id": vendor,
                "adult_price": adpric,
                "adult_discounted_price": adispric,
                "infant_price": inpric,
                "infant_discounted_price": indispric
            },
            "data_pax": {
                "adult": maxLoopPaxAd,
                "infant": maxLoopPaxIn
            }
        }),
      }).then((response) => response.json()).then((responseData) => {
        $.LoadingOverlay("hide")
        console.log(responseData)
        
        var data_cart = {
            "id_depart":responseData.data.depart_cart.id,
            "id_return":responseData.data.return_cart.id,
        }
        
        localStorage.setItem("data_train_id_cart", JSON.stringify(data_cart))
   
        toAddPaxTrainReg()
      
        })  
    }
            
</script>
@endpush