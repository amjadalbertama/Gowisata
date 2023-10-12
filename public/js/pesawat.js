function formOdrPesawat(){
            // formKrlRegview
            $("#list_penumpang_adult").empty();
            $("#list_penumpang_adult").addClass('d-none');
            $("#list_penumpang_child").empty();
            $("#list_penumpang_child").addClass('d-none');
            $("#list_penumpang_infant").empty();
            $("#list_penumpang_infant").addClass('d-none');
            $("#button_booking").addClass('d-none');

            $("#hotelListLocation").empty()
            $("#hotelListLocation").addClass('d-none')

            $("#formOdrPesawat").empty();
            $("#formOdrPesawat").removeClass('d-none')
            $("#formOdrHotelview").empty()
            $("#formKrlWisview").empty();
            $("#formKrlLuarBiasaview").addClass('d-none')
            $("#formKrlIstview").addClass('d-none')
            $("#formKrlReg").addClass('d-none')
            // $("#formKrlRegview").addClass('d-none')
            $("#formKrlRegview").empty()
            $("#formMiceview").empty()
            $("#formMiceview").addClass('d-none')
            $("#sideMice").removeClass('text-warning')
            $("#sideKrlWis").removeClass('text-warning')
            $("#sideKrlReg").removeClass('text-warning')
            $("#sideKrlLuarBiasa").removeClass('text-warning')
            $("#sideKrlIstimewa").removeClass('text-warning') 
            $("#tabel_kereta_regular").empty();
            $("#train_table_data").empty();
            $("#tabel_kereta_regular").addClass('d-none')

            $("#sideHotel").removeClass('text-warning') 
            $("#sideOdrPesawat").addClass('text-warning') 

            $("#flight_table_data").empty();
            $("#tabel_kereta").addClass('d-none'); 
            $("#tabel_Pesawat").removeClass('d-none');
            $("#tabel_Pesawat").addClass();
            $("#formDetailsOrderPesawat").addClass('d-none');

            $("#sideWisata").removeClass('text-warning')
            $("#wisata_title").addClass('d-none')
            $("#wisataList").empty()
            $("#wisataList").addClass('d-none')

            var currentdate = new Date();
            // var days = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum at', 'Sabtu'];
            // var dayName = days[currentdate.getDay()];
            var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Augustus', 'September', 'October', 'November', 'Desember'];
            var monthName = months[currentdate.getMonth()];
            var day = currentdate.getDate();
            var year = currentdate.getFullYear();
            var day_return = currentdate.getDate()+1;
            var viewDate = day  + ' ' + monthName + ' ' + year;
            var viewDateReturn = day_return  + ' ' + monthName + ' ' + year;

                var datahtml = `
                    <h1 class="h5 font-weight-normal text-center text-uppercase text-colors-on"> <b>Cari Tiket Pesawat</b></h5>
                    <hr>
                    <div class="row col-12">
                        <div class="form-check col-2">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="0" checked>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Sekali Jalan
                            </label>
                        </div>
                        <div class="form-check col-2">
                            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="1">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Pulang Pergi
                            </label>
                        </div>
                        <input class="form-control inputVal" id="type_trip" name="type_trip" placeholder="Asal..." value="" hidden/>
                    </div>
                    <br>
                    <div class="row">
                        <div class="form-group col-5">
                            <label for="type">Asal: <span class="text-danger">*</span></label>
                            <input list="asal_li" class="form-control inputVal" id="asal" name="asal" placeholder="Asal..." value="" />
                            <datalist id="asal_li">
                            </datalist>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback-flightorg text-colors-block"></div>
                        </div>
                        <div class="form-group text-center col-2" style="margin-top: 20px;" >
                            <a id="ganti_arah_flight" href="javascript:void(0);" class="text-colors-on"><i class="fa fa-exchange fa-2x"></i></a>
                        </div>
                        <div class="form-group col-5">
                            <label for="status">Tujuan: <span class="text-danger">*</span></label>
                            <input list="tujuan_li" class="form-control inputVal" id="tujuan" name="tujuan" placeholder="Tujuan.." value=""/>
                            <datalist id="tujuan_li">
                            </datalist>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback-flightdes text-colors-block"></div>
                        </div>
                    </div>
                    <!-- <br> -->
                    <div class="row ">
                        <div class="form-group col-3">
                            <label for="type">Tanggal Berangkat: <span class="text-danger">*</span></label>
                            <input  class="form-control inputVal" type="text" id="startDate" name="startDate" value="" min=""  placeholder="`+viewDate+`" readonly/>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback-flightdateorg text-colors-block"></div>
                        </div>
                        <div class="form-group col-3" id="dateEnd">
                            <label for="type">Tanggal Pulang: </label>
                            <input  class="form-control inputVal" type="text" id="endDate" name="endDate" value="" placeholder="`+viewDateReturn+`" hidden readonly/>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback-flightdatedes text-colors-block"></div>
                        </div>
                        <div class="form-group col-2">
                            <label for="type">Dewasa: </label>
                            <select class="form-control" id="adult" name="adult" required>
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
                            <select class="form-control" id="child" name="child" required>
                                <option value="0" selected>0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback"></div>
                        </div>
                        <div class="form-group col-2">
                            <label for="type">Balita: </label>
                            <select class="form-control" id="infant" name="infant" required>
                                <option value="0" selected>0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                            <div class="valid-feedback"></div>
                            <div class="invalid-feedback-infant text-colors-block"></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4">
                            
                        </div>
                        <button class="btn btn-block col-4 md-auto top-100 start-50 main-color" onclick="cekValidationFlightSchedule()"><b class="text-colors-off"><i class="fa fa-search mr-1"></i> Cari Tiket Pesawat</b></button>
                    </div>`
            $("#formOdrPesawat").append(datahtml)

            $('#ganti_arah_flight').on('click', function(){
           
                var valueAsal = $('#asal').val();
                var valueTujuan = $('#tujuan').val();

                console.log(valueAsal)
                console.log(valueTujuan)
                $('#asal').val(valueTujuan)
                $('#tujuan').val(valueAsal)

            })

            $('#adult').on('change',function(){
                var dul = $(this).val();
                var inf = $('#infant').val()
                if(inf > dul){

                    $("#adult").addClass("is-invalid")
                    $("#adult").addClass("border-danger")
                    $(".invalid-feedback-adult").css("display", "block").html("jumlah Dewasa tidak boleh kurang dari jumlah Balita!")
                    
                   }else if(inf <= dul){

                    $("#adult").removeClass("is-invalid")
                    $("#adult").removeClass("border-danger")
                    $(".invalid-feedback-adult").css("display", "none").html()

                    $("#infant").removeClass("is-invalid")
                    $("#infant").removeClass("border-danger")
                    $(".invalid-feedback-infant").css("display", "none").html()
                
                }

                if(dul == 0 || dul == ""){
                    $("#adult").addClass("is-invalid")
                    $("#adult").addClass("border-danger")
                    $(".invalid-feedback-adult").css("display", "block").html("jumlah Dewasa tidak boleh kosong!")
                }
            })

            $('#infant').on('change',function(){
                var inf = $(this).val();
                var dul = $('#adult').val()

               if(inf > dul){
                $("#infant").addClass("is-invalid")
                $("#infant").addClass("border-danger")
                $(".invalid-feedback-infant").css("display", "block").html("jumlah Balita tidak boleh lebih dari jumlah Dewasa!")

               }else if(inf <= dul){
                $("#infant").removeClass("is-invalid")
                $("#infant").removeClass("border-danger")
                $(".invalid-feedback-infant").css("display", "none").html()

                $("#adult").removeClass("is-invalid")
                $("#adult").removeClass("border-danger")
                $(".invalid-feedback-adult").css("display", "none").html()
               }
            })

            $('#flexRadioDefault1').on('click', function(e){
                $("#endDate").attr('hidden', 'hidden')
                $("#type_trip").val("OneWay")

            })

            $('#flexRadioDefault2').on('click', function(e){
                $("#endDate").removeAttr('hidden')
                $("#type_trip").val("RoundTrip")
            
            })
           
            $("#asal").keyup(function(){

                var asalText = $(this).val();
                var token = JSON.parse(localStorage.getItem('data_token'))
                var token_set = token['access_token']
                var url = fetch(mainurl +'flight/airport_all?sort_by=&order=&page=1&per_page=1000000&search='+ asalText,{
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + token_set,
                    },
                  }).then((response) => response.json()).then((responseData) => {
                    var asal = responseData.data;
                    var setPort = "";
                        $("#asal_li").empty();
                        for (var i = 0; i < asal.length; i++)
                        {
                            setPort += '<option value="' + asal[i].code + '">'+ asal[i].name +'</option>';
                        }
                        $("#asal_li").append(setPort);
    
                  });
            }); 

            $("#tujuan").keyup(function(){

                var searchText = $(this).val();
                var token = JSON.parse(localStorage.getItem('data_token'))
                var token_set = token['access_token']
                var url = fetch(mainurl +'flight/airport_all?sort_by=&order=&page=1&per_page=1000000&search='+ searchText,{
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + token_set,
                    },
                  }).then((response) => response.json()).then((responseData) => {
                    var tujuan = responseData.data;
                    var endPort = "";
                        $("#tujuan_li").empty();
                        for (var i = 0; i < tujuan.length; i++)
                        {
                            endPort += '<option value="' + tujuan[i].code + '">'+ tujuan[i].name +'</option>';
                        }
                        $("#tujuan_li").append(endPort);
                  });
            }); 
           
            var startdt = $('#startDate').datetimepicker({
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
                    $('#endDate').datetimepicker({
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

        var type_trip = $("#type_trip" ).val()
        if(type_trip == "" || type_trip == null){
            $("#type_trip" ).val("OneWay")
        }

        $('#startDate').on('click', function(){
            $("#endDate").val("")
            if($(this).val() != "" || $(this).val() != null){
                $("#startDate").removeClass("is-invalid").removeClass("border-danger")
                $(".invalid-feedback-flightdateorg").css("display", "none")
            }
        })

        $('#endDate').on('click', function(){
            if($("#startDate").val() == "" || $("#startDate").val() == null){
                $("#startDate").addClass("is-invalid").addClass("border-danger")
                $(".invalid-feedback-flightdatedes").css("display", "block").html("Tanggal keberangkatan Harus dipilih dahulu!")
            }
        })
}

function cekValidationFlightSchedule(){
    var type_trip = $("#type_trip" ).val()

    $("#asal").removeClass("is-invalid").removeClass("border-danger")
    $(".invalid-feedback-flightorg").css("display", "none")

    $("#tujuan").removeClass("is-invalid").removeClass("border-danger")
    $(".invalid-feedback-flightdes").css("display", "none")
  
    $("#startDate").removeClass("is-invalid").removeClass("border-danger")
    $(".invalid-feedback-flightdateorg").css("display", "none")

    $("#endDate").removeClass("is-invalid").removeClass("border-danger")
    $(".invalid-feedback-flightdatedes").css("display", "none")

    if(type_trip == "OneWay"){
        if($("#asal").val() == "" || $("#tujuan").val() == "" || $("#startDate").val() == ""){

            if($("#asal").val() == ""){
                $("#asal").addClass("is-invalid").addClass("border-danger")
                $(".invalid-feedback-flightorg").css("display", "block").html("Kolom ini tidak boleh kosong!")
            }else{
                $("#asal").removeClass("is-invalid").removeClass("border-danger")
                $(".invalid-feedback-flightorg").css("display", "none")
            }

            if($("#tujuan").val() == ""){
                $("#tujuan").addClass("is-invalid").addClass("border-danger")
                $(".invalid-feedback-flightdes").css("display", "block").html("Kolom ini tidak boleh kosong!")
            }else{
                $("#tujuan").removeClass("is-invalid").removeClass("border-danger")
                $(".invalid-feedback-flightdes").css("display", "none")
            }
           
            if($("#startDate").val() == ""){
                $("#startDate").addClass("is-invalid").addClass("border-danger")
                $(".invalid-feedback-flightdateorg").css("display", "block").html("Kolom ini tidak boleh kosong!")
            }else{
                $("#startDate").removeClass("is-invalid").removeClass("border-danger")
                $(".invalid-feedback-flightdateorg").css("display", "none")
            }
    
        }else if($("#asal").val() != ""  && $("#tujuan").val() != "" && $("#startDate").val() != ""){
            
            var valid = {}
            if($("#asal").val() == $("#tujuan").val()){
                $("#asal").addClass("is-invalid").addClass("border-danger")
                $(".invalid-feedback-flightorg").css("display", "block").html("Asal dan tujuan tidak boleh sama!")
                $("#tujuan").addClass("is-invalid").addClass("border-danger")
                $(".invalid-feedback-flightdes").css("display", "block").html("Asal dan tujuan tidak boleh sama!")
                valid.success = 0
            }else{
                $("#asal").removeClass("is-invalid").removeClass("border-danger")
                $(".invalid-feedback-flightorg").css("display", "none")
                $("#tujuan").removeClass("is-invalid").removeClass("border-danger")
                $(".invalid-feedback-flightdes").css("display", "none")

                valid.success = 1
            }

            if(valid.success == 1){
                cariTiketPesawat()
            }else{
                toastr.error("Gagal, Pencarian jadwal pesawat gagal!", "Error")
            }
        }
    }else{

        if($("#asal").val() == "" || $("#tujuan").val() == "" || $("#startDate").val() == "" || $("#endDate").val() == ""){

            if($("#asal").val() == ""){
                $("#asal").addClass("is-invalid").addClass("border-danger")
                $(".invalid-feedback-flightorg").css("display", "block").html("Kolom ini tidak boleh kosong!")
            }else{
                $("#asal").removeClass("is-invalid").removeClass("border-danger")
                $(".invalid-feedback-flightorg").css("display", "none")
            }

            if($("#tujuan").val() == ""){
                $("#tujuan").addClass("is-invalid").addClass("border-danger")
                $(".invalid-feedback-flightdes").css("display", "block").html("Kolom ini tidak boleh kosong!")
            }else{
                $("#tujuan").removeClass("is-invalid").removeClass("border-danger")
                $(".invalid-feedback-flightdes").css("display", "none")
            }
           
            if($("#startDate").val() == ""){
                $("#startDate").addClass("is-invalid").addClass("border-danger")
                $(".invalid-feedback-flightdateorg").css("display", "block").html("Kolom ini tidak boleh kosong!")
            }else{
                $("#startDate").removeClass("is-invalid").removeClass("border-danger")
                $(".invalid-feedback-flightdateorg").css("display", "none")
            }

            if($("#endDate").val() == ""){
                $("#endDate").addClass("is-invalid").addClass("border-danger")
                $(".invalid-feedback-flightdatedes").css("display", "block").html("Kolom ini tidak boleh kosong!")
            }else{
                $("#endDate").removeClass("is-invalid").removeClass("border-danger")
                $(".invalid-feedback-flightdatedes").css("display", "none")
            }
           
    
        }else if($("#asal").val() != ""  && $("#tujuan").val() != "" && $("#startDate").val() != "" && $("#endDate").val() != ""){
            
            var valid = {}
            if($("#asal").val() == $("#tujuan").val()){
                $("#asal").addClass("is-invalid").addClass("border-danger")
                $(".invalid-feedback-flightorg").css("display", "block").html("Asal dan tujuan tidak boleh sama!")
                $("#tujuan").addClass("is-invalid").addClass("border-danger")
                $(".invalid-feedback-flightdes").css("display", "block").html("Asal dan tujuan tidak boleh sama!")
                valid.success = 0
            }else{
                $("#asal").removeClass("is-invalid").removeClass("border-danger")
                $(".invalid-feedback-flightorg").css("display", "none")
                $("#tujuan").removeClass("is-invalid").removeClass("border-danger")
                $(".invalid-feedback-flightdes").css("display", "none")

                valid.success = 1
            }

            if(valid.success == 1){
                cariTiketPesawat()
            }else{
                toastr.error("Gagal, Pencarian jadwal pesawat gagal!", "Error")
            }
        }
    }
    
}

function cariTiketPesawat(){
    $.LoadingOverlay("show")
    $("#flight_table_data").empty();
    // $("#modalAccessCode").addClass('d-none');
    $("#modalAccessCode").modal('hide');
    // $("#modalCodeAccess").replaceWith('<div id="modalCodeAccess"></div>');
    $("#tabel_pesawat").removeClass('d-none');
    $("#tabel_pesawat").empty();

    var type_trip = $("#type_trip").val()
    localStorage.setItem("type_trip", JSON.stringify(type_trip))

        var tabelPesawat = `
        <h1 class="h6 font-weight-normal text-center text-uppercase mt-2"> <b id="ow" class=""> List Tiket Tersedia </b> <b id="rd" class=""> Pilih Jadwal Keberangkatan </b> </h1>
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
                    <tbody class="text-nowrap" id="flight_table_data">
                    
                    </tbody>
                    <tfoot class="border-bottom">
                        <!-- <tr class="bg-brown">
                            <td id="beforeAddData" colspan="7" class="pl-3 text-center font-12">Tidak ada data yang ditampilkan</td>
                        </tr> -->
                    </tfoot>
                </table>
            </div>`
        $("#tabel_pesawat" ).append(tabelPesawat)

        var get_code = localStorage.getItem('acc_code')
        if(get_code == null || get_code == undefined){
            var access_code = "";
        }else if(get_code != null || get_code != undefined){
            var access_code = localStorage.getItem('acc_code');
        }

        var type_trip = $("#type_trip" ).val()
        if(type_trip == "OneWay"){
            $('#rd').addClass('d-none')
        }else if(type_trip == "RoundTrip"){
            $('#ow').addClass('d-none')
        }
        var org = $("#asal" ).val()
        var des = $("#tujuan" ).val()
        var adult = $("#adult" ).val()
        var child = $("#child" ).val()
        var infant = $("#infant" ).val()
        var datasetPax = [
            {
                "adult" : adult
            },
            {
                "child" : child
            },
            {
                "infant" : infant
            },
        ]

        localStorage.setItem("data_pax", JSON.stringify(datasetPax))
        var token = JSON.parse(localStorage.getItem('data_token'))
        var token_set = token['access_token']

        var depart_date = $("#startDate" ).val()
            var true_date = new Date(depart_date)
            var options = { year: 'numeric', month: '2-digit', day: '2-digit' };
            var dateString = true_date.toLocaleDateString('en-US', options);
            var dateStrDpart = moment(dateString).format('YYYY-MM-DD');

        var endDate = $("#endDate" ).val()
            var true_date = new Date(endDate)
            var options = { year: 'numeric', month: '2-digit', day: '2-digit' };
            var dateString = true_date.toLocaleDateString('en-US', options);
            var dateStrReturn = moment(dateString).format('YYYY-MM-DD');

        if(endDate == null || endDate == ""){
            var dateStrReturnSet = null
        }else{
            var dateStrReturnSet = dateStrReturn
        }

        var url = fetch(mainurl + 'flight/get_schedule_all',{
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + token_set,
            },
            body: JSON.stringify({
                "access_code": access_code,
                "trip_type": type_trip,
                "org": org,
                "des": des,
                "departure_date": dateStrDpart,
                "return_date": dateStrReturnSet,
                "pax_adult": adult,
                "pax_child": child,
                "pax_infant": infant,
                "page": 1,
                "per_page": 1000,
                "sort_by": "id",
                "order": "asc"
            }),

        }).then((response) => response.json()).then((responseData) => {
            var asal = responseData;
            $.LoadingOverlay("hide")
            console.log(asal)
            if(responseData.message == "Data Airline Schedule tidak ada!"){
                $.LoadingOverlay("hide")
                var tblend = `<tr>
                                <td id="" class="pl-3 text-center " colspan="6"> Airline Schedule not Found!</td>
                            </tr>`;

                $("#flight_table_data").append(tblend);

            }else if(responseData.success == false){
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
                                <input class="form-control inputVal " type="text" id="access_code" name="access_code" />
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary" id="bottonBook" onclick=" pushAccCode(); cariTiketPesawat1()" push"><i class="fa fa-check mr-1" ></i>Confirm</button>
                                </div>
                            </div>
                        </div>
                    </div> `;
                $("#modalCodeAccess").append(valid_code)
                $("#modalAccessCode").modal('show')

            }else if(responseData.success == true){
                $.LoadingOverlay("hide")
                var asal = responseData.data.schedules.departure[0];
                var retur = responseData.data.schedules.return;
                    var cube = asal;
                    for(var t = 0; t < asal.length; t++){
                        var result = reformatDateListFlight(asal[t].departure_date);
                        var resultReturn = reformatDateListFlight(asal[t].arrive_date);
                        var id = t + 1;

                        setSchedule = `<tr id="listPewasat`+ id +`">
                            <td id="`+ id +`" class="pl-3 text-center "><img src="`+asal[t].airline_logo+`" alt="Logo" height="50" width="50" mt-n1 mr-2"> <b>`+ asal[t].airline +`</b><br>`+ asal[t].flight_class +`<br>`+asal[t].travel_time+`</td>
                            <td id="" class="pl-3 text-center "><b style=" font-size: 15px;">`+ asal[t].origin +`</b><br><a style=" font-size: 12px;">`+ result.date +` - <b>`+result.time+`</a></td>
                            <td id="" class="pl-3 text-center "><i class="fa fa-arrow-right fa-2x"></i><br><p>`+asal[t].flight_type+`</p></td>
                            <td id="" class="pl-3 text-center "><b style=" font-size: 15px;">`+ asal[t].destination +`</b><br><a style=" font-size: 12px;">`+ resultReturn.date +` - <b>`+resultReturn.time+`</a></td>
                            <td id="" class="pl-3 text-right text-colors-on" style=" font-size: 20px;"> <b>Rp `+ formatPrice(asal[t].price_per_person) +`</b><br> </td>
                            <td id="" class="pl-3 text-center"> <button id="btn_ow`+id+`" class="btn btn-block main-color" onclick="enableLoading(); setflightDepart(`+ id +`); todetailsflight();"><b class="text-colors-off">Pilih</b></button>
                            <button id="btn_rd`+id+`" class="btn btn-block main-color" onclick="enableLoading(); setflightDepart(`+ id +`); setflightsearch(); toreturnflight() "><b class="text-colors-off">Pilih</b></button>
                                <input id="getDetails`+ id +`" value="`+ asal[t].id_reference +`" hidden></input>
                                <input id="getOrigin`+ id +`" value="`+ asal[t].origin +`" hidden></input>
                                <input id="getDestinasi`+ id +`" value="`+ asal[t].destination +`" hidden></input>
                                <input id="getName`+ id +`" value="`+ asal[t].airline +`" hidden></input>
                                <input id="getClass`+ id +`" value="`+ asal[t].flight_class +`" hidden></input>
                                <input id="getDepart`+ id +`" value="`+ asal[t].departure_date +`" hidden></input>
                                <input id="getArrive`+ id +`" value="`+ asal[t].arrive_date +`" hidden></input></td>
                        </tr>`;
                        
                        $("#flight_table_data").append(setSchedule);
                        if(type_trip == "OneWay"){
                            $('#btn_rd' + id).addClass('d-none')
                            $('#btn_ow'+ id).removeClass('d-none')
                        }else if(type_trip == "RoundTrip"){
                            $('#btn_ow'+ id).addClass('d-none')
                            $('#btn_rd'+ id).removeClass('d-none')
                        }
                        var timestampBerangkat = new Date(asal[t].departure_date).getTime();
                        var timestampNow = Date.now();
                        if(timestampNow > timestampBerangkat){
                            $("#btn_ow"+id). attr("disabled", true);
                            $("#btn_ow1"+id). attr("disabled", true);
                            $("#listPewasat"+id).css({backgroundColor: '#cacaca'});
                        }

                    }

            }
        });
}

function cariTiketPesawat1(){
    $.LoadingOverlay("show")
    $("#flight_table_data").empty();
    
    // $("#modalAccessCode").addClass('d-none');
    $("#modalAccessCode").modal('hide');
    // $("#modalCodeAccess").replaceWith('<div id="modalCodeAccess"></div>');
    $("#tabel_pesawat" ).removeClass('d-none');
    $("#tabel_pesawat").empty();
   
    var tabelPesawat = `
    <h1 class="h6 font-weight-normal text-center text-uppercase mt-2"> <b id="ow" class=""> List Tiket Tersedia </b> <b id="rd" class=""> Pilih Jadwal Keberangkatan </b>  </h1>
        <div class="table-responsive" >
            <table class="table bg-white">
                <thead class="thead-main text-nowrap">
                    <!-- <tr class="text-uppercase font-11" id="header_account">
                        <th class="text-center h7" colspan="7"><b> List Tiket Tersedia </b> </th>
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
                <tbody class="text-nowrap" id="flight_table_data">
                 
                </tbody>
                <tfoot class="border-bottom">
                    <!-- <tr class="bg-brown">
                        <td id="beforeAddData" colspan="7" class="pl-3 text-center font-12">Tidak ada data yang ditampilkan</td>
                    </tr> -->
                </tfoot>
            </table>
        </div>`;
    $("#tabel_pesawat" ).append(tabelPesawat)

    var access_code = JSON.parse(localStorage.getItem('acc_code'))
    // var access_code = $("#access_code").val()
    var type_trip = $("#type_trip" ).val()
    if(type_trip == "OneWay"){
        $('#rd').addClass('d-none')
    }else if(type_trip == "RoundTrip"){
        $('#ow').addClass('d-none')
    }
    // console.log(access_code);
    var org = $("#asal" ).val()
    var des = $("#tujuan" ).val()
    var adult = $("#adult" ).val()
    var child = $("#child" ).val()
    var infant = $("#infant" ).val()
    var datasetPax = [
        {
            "adult" : adult
        },
        {
            "child" : child
        },
        {
            "infant" : infant
        },
    ]
    // console.log(data);
    localStorage.setItem("data_pax", JSON.stringify(datasetPax))
    var token = JSON.parse(localStorage.getItem('data_token'))
    var token_set = token['access_token']
   
        var depart_date = $("#startDate" ).val()
            var true_date = new Date(depart_date)
            var options = { year: 'numeric', month: '2-digit', day: '2-digit' };
            var dateString = true_date.toLocaleDateString('en-US', options);
            var dateStrDpart = moment(dateString).format('YYYY-MM-DD');

        var endDate = $("#endDate" ).val()
            var true_date = new Date(endDate)
            var options = { year: 'numeric', month: '2-digit', day: '2-digit' };
            var dateString = true_date.toLocaleDateString('en-US', options);
            var dateStrReturn = moment(dateString).format('YYYY-MM-DD');

        if(endDate == null || endDate == ""){
            var dateStrReturnSet = null
        }else{
            var dateStrReturnSet = dateStrReturn
        }
   
    var url = fetch(mainurl+'flight/get_schedule_all',{
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token_set,
        },
        body: JSON.stringify({
            "access_code": access_code,
            "trip_type": type_trip,
            "org": org,
            "des": des,
            "departure_date": dateStrDpart,
            "return_date": dateStrReturnSet,
            "pax_adult": adult,
            "pax_child": child,
            "pax_infant": infant,
            "page": 1,
            "per_page": 1000,
            "sort_by": "id",
            "order": "asc"
        }),

      }).then((response) => response.json()).then((responseData) => {
        var asal = responseData;
        $.LoadingOverlay("hide")
        console.log(asal)
        if(responseData.message == "Data Airline Schedule tidak ada!"){

            $.LoadingOverlay("hide")
            var tblend = `<tr>
                            <td id="" class="pl-3 text-center " colspan="6">Data Airline Schedule tidak ada!</td>
                        </tr>`;
            $("#flight_table_data").append(tblend);

        }else if(responseData.success == false){
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
                                <button type="button" class="btn btn-primary" id="bottonBook" onclick="cariTiketPesawat(); pushAccCode()"><i class="fa fa-check mr-1" ></i>Confirm</button>
                            </div>
                        </div>
                    </div>
                </div> `;
            $("#modalCodeAccess").append(valid_code)
            $("#modalAccessCode").modal('show')

        }else if(responseData.success == true){
            var asal = responseData.data.schedules.departure[0];
            var retur = responseData.data.schedules.return;
            console.log(asal)
 
            // for (var i = 0; i < asal.length; i++){
            //     var cube = asal[i];
                for(var t = 0; t < asal.length; t++){
               
                    var id = t + 1;

                    var result = reformatDateListFlight(asal[t].departure_date);
                    var resultReturn = reformatDateListFlight(asal[t].arrive_date);

                    setSchedule = `<tr id="listPewasat`+ id +`">
                            <td id="`+ id +`" class="pl-3 text-center "><img src="`+asal[t].airline_logo+`" alt="Logo" height="50" width="50" mt-n1 mr-2"> <b>`+ asal[t].airline +`</b><br>`+ asal[t].flight_class +`</td>
                            <td id="" class="pl-3 text-center "><b style=" font-size: 15px;">`+ asal[t].origin +`</b><br><a style=" font-size: 12px;">`+ result.date +` - <b>`+result.time+`</a></td>
                            <td id="" class="pl-3 text-center "><i class="fa fa-arrow-right fa-2x"></i><br><p>`+asal[t].flight_type+`</p></td>
                            <td id="" class="pl-3 text-center "><b style=" font-size: 15px;">`+ asal[t].destination +`</b><br><a style=" font-size: 12px;">`+ resultReturn.date +` - <b>`+resultReturn.time+`</a></td>
                            <td id="" class="pl-3 text-right text-colors-on" style=" font-size: 17px;"><b>Rp `+ formatPrice(asal[t].price_per_person) +`</b></td>
                            <td id="" class="pl-3 text-center"> <button id="btn_ow1`+id+`" class="btn btn-block main-color" onclick="enableLoading(); setflightDepart(`+ id +`); todetailsflight();"><b class="text-colors-off">Pilih</b></button>
                            <button id="btn_rd1`+id+`" class="btn btn-block main-color" onclick="enableLoading(); setflightDepart(`+ id +`); setflightsearch(); toreturnflight();"><b class="text-colors-off">Pilih</b></button>
                                <input id="getDetails`+ id +`" value="`+ asal[t].id_reference +`" hidden></input>
                                <input id="getOrigin`+ id +`" value="`+ asal[t].origin +`" hidden></input>
                                <input id="getDestinasi`+ id +`" value="`+ asal[t].destination +`" hidden></input>
                                <input id="getName`+ id +`" value="`+ asal[t].airline +`" hidden></input>
                                <input id="getClass`+ id +`" value="`+ asal[t].flight_class +`" hidden></input>
                                <input id="getDepart`+ id +`" value="`+ asal[t].departure_date +`" hidden></input>
                                <input id="getArrive`+ id +`" value="`+ asal[t].arrive_date +`" hidden></input></td>
                        </tr>`;

                    $("#flight_table_data").append(setSchedule);

                    if(type_trip == "OneWay"){
                        $('#btn_rd1' + id).addClass('d-none')
                        $('#btn_ow1' + id).removeClass('d-none')
                    }else if(type_trip == "RoundTrip"){
                        $('#btn_ow1' + id).addClass('d-none')
                        $('#btn_rd1' + id).removeClass('d-none')
                    }
                    var timestampBerangkat = new Date(asal[t].departure_date).getTime();
                        var timestampNow = Date.now();
                        if(timestampNow > timestampBerangkat){
                            $("#btn_ow"+id). attr("disabled", true);
                            $("#btn_ow1"+id). attr("disabled", true);
                            $("#listPewasat"+id).css({backgroundColor: '#cacaca'});
                        }
                }
           
        }
    });
}

function pushAccCode(){
    var code = $("#access_code").val()
    console.log(code)
    localStorage.setItem("acc_code", JSON.stringify(code))
}

function setflightDepart(id){

    var id_flight = $("#getDetails"+ id).val()
    var org_flight = $("#getOrigin"+ id).val()
    var des_flight = $("#getDestinasi"+ id).val()
    var name_flight = $("#getName"+ id).val()
    var class_flight = $("#getClass"+ id).val()
    var deprt_flight = $("#getDepart"+ id).val()
    var arrive_flight = $("#getArrive"+ id).val()
    var type_trip = $("#type_trip" ).val()

    var data_flight_depart = {
        "id_depart": id_flight,
        "org" : org_flight,
        "des" : des_flight,
        "name" : name_flight,
        "class" : class_flight,
        "depart" : deprt_flight,
        "arrive" : arrive_flight,
        "types_trip": type_trip
    }
    var product = "flight"
    localStorage.setItem("product_payment", JSON.stringify(product))
    localStorage.setItem("data_flight_details", JSON.stringify(data_flight_depart))
}

function setflightsearch(){

        var type_trip = $("#type_trip" ).val()
        var org = $("#asal" ).val()
        var des = $("#tujuan" ).val()
        var adult = $("#adult" ).val()
        var child = $("#child" ).val()
        var infant = $("#infant" ).val()
        var datasetPax = [
            {
                "adult" : adult
            },
            {
                "child" : child
            },
            {
                "infant" : infant
            },
        ]

        var depart_date = $("#startDate" ).val()
            var true_date = new Date(depart_date)
            var options = { year: 'numeric', month: '2-digit', day: '2-digit' };
            var dateString = true_date.toLocaleDateString('en-US', options);
            var dateStrDpart = moment(dateString).format('YYYY-MM-DD');

        var endDate = $("#endDate" ).val()
            var true_date = new Date(endDate)
            var options = { year: 'numeric', month: '2-digit', day: '2-digit' };
            var dateString = true_date.toLocaleDateString('en-US', options);
            var dateStrReturn = moment(dateString).format('YYYY-MM-DD');

        var data_flight_search = {
            "type_trip": type_trip,
            "org" : org,
            "des" : des,
            "depart" : dateStrDpart,
            "arrive" : dateStrReturn,
            "pax": datasetPax
        }

    localStorage.setItem("data_flight_search", JSON.stringify(data_flight_search))
}

function toreturnflight(){
    window.location.href = "/pesawat/return";
   
}

function todetailsflight(){
    window.location.href = "/pesawat"
}

function bookingTiketPesawat(){

    $("#flight_table_data").empty();
    $("#formOdrPesawat").addClass('d-none')
    $("#tabel_Pesawat").empty();
    $("#tabel_pesawat").addClass('d-none')
    var type_trip = $("#type_trip" ).val()
    var token = JSON.parse(localStorage.getItem('data_token'))
    var id_flight = JSON.parse(localStorage.getItem('id_flight_details'))
    var pax_request = JSON.parse(localStorage.getItem('data_pax'))
    // var pax_all= localStorage.getItem('data_pax_intent')
    // console.log(pax_all);
    // console.log(pax_request[0].adult);

    var maxLoopPaxAd = pax_request[0].adult;
    var maxLoopPaxCh = pax_request[1].child;
    var maxLoopPaxIn = pax_request[2].infant;
    
    var adl_flight_pax = []
    for (i = 1; i <= maxLoopPaxAd; i++){
        // var nik = $("#id_number" + i).val();
        // var tgl_lahir = $("#birth_date").val();
        var title = $("#title_penumpang_ad"+ i).val();
        var type_ident = $("#type_id_ad" + i).val();
        if(type_ident == "Passport"){
            var id_number = $("#id_npass_ad" + i).val();
        }else if(type_ident == "KTP"){
            var id_number = $("#id_number_ad" + i).val();
        }
        // localStorage.setItem("transaction_id", JSON.stringify(id_transaction))
        var first_name = $("#first_name_ad" + i).val();
        var last_name = $("#last_name_ad" + i).val();
        // var type_flight = $("#type_flight_penumpang").val();
        var kelamin = $("#j_kelamin_ad"+ i).val();
        // var no_hp = $("#no_hp").val();
        // console.log(first_name);
        var paxDataAd = {
            "id_number": id_number,
            "title_name": title,
            "first_name": first_name,
            "last_name": last_name,
            "birth_date": "1998-10-10",
            "gender": kelamin,
            "nationality": "ID",
            "birth_country": "ID",
            "doc_type": type_ident,
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
    for (i = 1; i <= maxLoopPaxCh; i++){
        var title = $("#title_penumpang_ch"+ i).val();
        var type_ident = $("#type_id_ch" + i).val();
        if(type_ident == "Passport"){
            var id_number = $("#id_npass_ch" + i).val();
        }else if(type_ident == "KTP"){
            var id_number = $("#id_number_ch" + i).val();
        }
       
        var first_name = $("#first_name_ch" + i).val();
        var last_name = $("#last_name_ch" + i).val();
        // var type_flight = $("#type_flight_penumpang").val();
        var kelamin = $("#j_kelamin_ch"+ i).val();
        // var no_hp = $("#no_hp").val();
        // console.log(first_name);
        var paxDataCh = {
            "id_number": id_number,
            "title_name": title,
            "first_name": first_name,
            "last_name": last_name,
            "birth_date": "1998-10-10",
            "gender": kelamin,
            "nationality": "ID",
            "birth_country": "ID",
            "doc_type": type_ident,
            "parent": "",
            "passport_number": "",
            "passport_issued_country": "",
            "passport_issued_date": "",
            "passport_expired_date": "",
            "type": "Child",
        } 

    }
    console.log(paxDataCh);

    for (i = 1; i <= maxLoopPaxIn; i++){
        var title = $("#title_penumpang_in"+ i).val();
        var type_ident = $("#type_id_in" + i).val();
        if(type_ident == "Passport"){
            var id_number = $("#id_npass_in" + i).val();
        }else if(type_ident == "KTP"){
            var id_number = $("#id_number_in" + i).val();
        }
        // var id_number = $("#id_number_in" + i).val();
        var first_name = $("#first_name_in" + i).val();
        var last_name = $("#last_name_in" + i).val();
        // var type_flight = $("#type_flight_penumpang").val();
        var kelamin = $("#j_kelamin_in"+ i).val();
        // var no_hp = $("#no_hp").val();
        // console.log(first_name);
        var paxDataIn = {
            "id_number": id_number,
            "title_name": title,
            "first_name": first_name,
            "last_name": last_name,
            "birth_date": "1998-10-10",
            "gender": kelamin,
            "nationality": "ID",
            "birth_country": "ID",
            "doc_type": type_ident,
            "parent": 0,
            "passport_number": "",
            "passport_issued_country": "",
            "passport_issued_date": "",
            "passport_expired_date": "",
            "type": "Infant",
        } 

    }
    console.log(paxDataIn);
    
    if((maxLoopPaxCh == null || maxLoopPaxCh == 0) & (maxLoopPaxIn == null || maxLoopPaxIn == 0)){
        var all_pax = adl_flight_pax; 
    }else if(maxLoopPaxCh == null || maxLoopPaxCh == 0){
        var all_pax = adl_flight_pax.concat(paxDataIn); 
    }else if(maxLoopPaxIn == null || maxLoopPaxIn == 0){
        var all_pax = adl_flight_pax.concat(paxDataCh); 
    }else{
        var all_pax = adl_flight_pax.concat(paxDataCh, paxDataIn); 
    }

    // console.log(all_pax);
    var name_order = JSON.parse(localStorage.getItem('name_auth'));
    // console.log(name_order)
    var email = JSON.parse(localStorage.getItem('user_email'));
  
    var id_flight_return = JSON.parse(localStorage.getItem('id_flight_return'))

    if(type_trip == "OneWay"){
        var retrn_id = ""

    }else if(type_trip == "RoundTrip"){
        var retrn_id = id_flight_return
    }
    console.log(id_flight_return)
    var token_set = token['access_token'];
    var url = fetch(mainurl+'flight/get_add_on',{
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token_set,
        },
        body: JSON.stringify({
            "id_schedule_departure": id_flight,
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
        if(responseData.data.baggageAddOns[0].baggageInfos != null){
            var bagasi = responseData.data.baggageAddOns[0].baggageInfos
            for(var i; i <bagasi.length; i++){

            }

            var meal = responseData.data.baggageAddOns[0].mealInfos
            for(var i; i <bagasi.length; i++){

            }

        }
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
                        <button type="button" class="btn main-color" id="bottonBook" onclick="bookingFlight()"><b class="text-colors-off"><i class="fa fa-check mr-1"></i>Ya</b></button>
                        <button type="button" class="btn btn-light" data-dismiss="modal"><i class="fa fa-times mr-1"></i>Kembali</button>
                    </div>
                </div>
            </div>
        </div> `
        $("#modalBooking").append(datahtml)
        $("#modalConfirmBooking").modal('show')
    });

}

function bookingFlight(){
    $.LoadingOverlay("show")
    $("#modalBooking").empty()
    $("#modalConfirmBooking").empty()
    var adl_flight_pax = JSON.parse(localStorage.getItem('data_pax_adl'))
    var paxDataCh = JSON.parse(localStorage.getItem('data_pax_chd'))
    var paxDataIn = JSON.parse(localStorage.getItem('data_pax_inf'))
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
    var token = JSON.parse(localStorage.getItem('data_token'))
    var id_flight = JSON.parse(localStorage.getItem('data_flight_details'))
  
    var data_flight_return = JSON.parse(localStorage.getItem('data_flight_return'))

    var seat_depart = JSON.parse(localStorage.getItem('data_book_flight_addons'))
    var baggage_depart = JSON.parse(localStorage.getItem('data_book_flight_addons_bagasi'))
    var meals_depart = JSON.parse(localStorage.getItem('data_book_flight_addons_meals_code'))

    

    var data_addons_depart = []
    var data_addons_return = []
    
    for(var i = 0; i < all_pax.length; i++){
        
        if(seat_depart == undefined){
            var seat_depart_cek = ""
        }else{
            var seat_depart_cek = seat_depart[i].number_seat
        }
    
        if(baggage_depart == undefined){
            var baggage_depart_cek =[]
        }else{
            if(baggage_depart[i] != null){
                if(baggage_depart[i].code_bagasi==""){
                    var baggage_depart_cek ="PBAA"
                }else{
                    var baggage_depart_cek = baggage_depart[i].code_bagasi
                }
            }else{
                var baggage_depart_cek ="PBAA"
            }
        }
    
        if(meals_depart == undefined){
            var meals_depart_cek =[]
        }else{
            var meals_depart_cek = meals_depart[i]
        }

        var indatadepart = {
            "baggage_code": baggage_depart_cek,
            "meals_code": meals_depart_cek,
            "seat_code": seat_depart_cek,
            "compartment_code": ""
        }
        data_addons_depart.push(indatadepart)
    }

    if(id_flight['types_trip'] == "OneWay"){
        var retrn_id = ""
        var data_book_return = []
        if(baggage_depart == undefined){
            var data_book_depart = []
        }else{
            var data_book_depart = data_addons_depart
        }
    }else if(id_flight['types_trip'] == "RoundTrip"){
        var retrn_id = data_flight_return['id_return']
        var seat_return = JSON.parse(localStorage.getItem('data_book_flight_addons_return'))
        var baggage_return = JSON.parse(localStorage.getItem('data_book_flight_addons_bagasi_return'))
        var meals_return = JSON.parse(localStorage.getItem('data_book_flight_addons_meals_code_return'))
        
        if(baggage_depart == undefined){
            var data_book_depart = []
        }else{
            var data_book_depart = data_addons_depart
        }
        
        for(var i = 0; i < all_pax.length; i++){
            if(seat_return == undefined){
                var seat_return_cek =""
            }else{
                var seat_return_cek = seat_return[i].number_seat
            }
    
            if(baggage_return == undefined){
                var baggage_return_cek = ""
            }else{
                if(baggage_return[i] != null){
                    if(baggage_return[i].code_bagasi == ""){
                        var baggage_return_cek ="PBAA"
                    }else{
                        var baggage_return_cek = baggage_return[i].code_bagasi
                    }  
                }else{
                    var baggage_return_cek = "PBAA"
                } 
            }
    
            if(meals_return == undefined){
                var meals_return_cek =[]
            }else{
                var meals_return_cek = meals_return[i]
            }
  
            var indatareturn = {
                "baggage_code":baggage_return_cek,
                "meals_code": meals_return_cek,
                "seat_code": seat_return_cek,
                "compartment_code": ""
            }
            data_addons_return.push(indatareturn)
        }
        var data_book_return = data_addons_return
    }

    var token_set = token['access_token'];
    var url = fetch(mainurl+'flight/booking',{
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token_set,
        },
        body: JSON.stringify({
            "id_schedule_departure": id_flight['id_depart'],
            "id_schedule_return": retrn_id,
            "pax_add_on_depart": data_book_depart,
            "pax_add_on_return": data_book_return
        }),
    }).then((response) => response.json()).then((responseData) => {
        console.log(responseData)
        var id_transaction = responseData.data.transaction_id
        localStorage.setItem("transaction_id", JSON.stringify(id_transaction))
       if(responseData.success == true){
            $.LoadingOverlay("hide")
            // var datahtml = `
            // <div class="modal fade sm-5" id="codeBookingModal"  data-keyboard="false" data-backdrop="static">
            //     <div class="modal-dialog modal-dialog-scrollable modal-ku" style="margin-top:15%;"><br>
            //         <div class="modal-content text-center">
            //             <div style="margin-top:5%;">
            //                 <h4>Booking Success</h4>
            //             <center>Kode Booking :<b> <br>`+ responseData.data.booking_code+` </b></center>
            //             <br>
            //             <center>Time Limit : <b> <br>`+ responseData.data.time_limit+` </b></center>
            //             <br>
            //             </div>
            //             <div class="footer">
            //                 <button type="button" id="paymentFlight" class="btn btn-primary"><i class="fa fa-credit-card-alt mr-1"></i>Bayar Sekarang</button>
            //                 <button type="button" id="listOrderBooking" class="btn btn-primary"><i class="fa fa-shopping-cart mr-1"></i>Bayar Nanti</button>
            //             </div>
            //         </div>
            //     </div>
            // </div>`
            if(responseData.message != "Booking Flight gagal!"){
                var datahtml = `
                <div class="modal fade sm-5" id="codeBookingModal"  data-keyboard="false" data-backdrop="static">
                    <div class="modal-dialog modal-dialog-scrollable modal-ku" style="margin-top:15%;"><br>
                        <div class="modal-content text-center">
                            <div style="margin-top:5%;">
                                <h4><b class="text-colors-on">Booking Success</b></h4>
                            </div>
                            <b class="text-colors-on"><i class="fa fa-check-circle fa-5x"></i></b><br><br>
                            <div class="footer">
                                <button type="button" id="paymentFlight" class="btn main-color"><b class="text-colors-off"><i class="fa fa-credit-card-alt mr-1"></i>Bayar Sekarang</b></button>
                                <button type="button" id="listOrderBooking" class="btn main-color"><b class="text-colors-off"><i class="fa fa-shopping-cart mr-1"></i>Bayar Nanti</b></button>
                            </div>
                        </div>
                    </div>
                </div>`
                $("#codeBooking").append(datahtml)
                $("#codeBookingModal").modal('show')

                $("#listOrderBooking").on('click', function(){
                        window.location.href = "/listorder";
                })

                $("#paymentFlight").on('click', function(){
                        window.location.href = "/payment_method";
                })
            }else{
                $.LoadingOverlay("hide")
                toastr.error("Booking Gagal, Sedang terjadi kesalahan pada Server", "Error")
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
                    
            }
            
       }else{
        $.LoadingOverlay("hide")
        toastr.error("Maaf, Sedang terjadi kesalahan pada Server", "Error")
       }
             
       
    });
} 

function pushIssueBooking(){
    $("#modalBooking").empty()
    $("#modalConfirmBooking").addClass('d-none')
    $("#codeBookingModal").addClass('d-none')

    var token = JSON.parse(localStorage.getItem('data_token'))
    var id_flight = JSON.parse(localStorage.getItem('id_flight_details'))
    var id_transaction = JSON.parse(localStorage.getItem('transaction_id'))

    var token_set = token['access_token'];
    var url = fetch(mainurl+'flight/issued_booking',{
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token_set,
        },
        body: JSON.stringify({
            "transaction_id": id_transaction,
        }),
      }).then((response) => response.json()).then((responseData) => {
        console.log(responseData)

        // var datahtml = `
        // <div class="modal fade sm-5" id="codeBookingModal">
        //     <div class="modal-dialog modal-sm modal-dialog-scrollable">
        //         <div class="modal-content">
        //             <div class="modal-header">
        //                 <h5 class="modal-title">Booking Success</h5>
        //                 <button type="button" class="close" data-dismiss="modal">×</button>
        //             </div><br>
        //             <center><b>`+ responseData.data.booking_code+` </b></center>
        //             <br>
        //             <center><b>`+ responseData.data.time_limit+` </b></center>
        //             <br>
        //             <div class="modal-footer">
        //                 <button type="button" class="btn btn-primary" id="bottonBook" onclick="pushIssueBooking()"><i class="fa fa-check mr-1" ></i>Ya</button>
        //                 <button type="button" class="btn btn-light" data-dismiss="modal"><i class="fa fa-times mr-1"></i>Kembali</button>
        //             </div>
        //         </div>
        //     </div>
        // </div>
        //     `
        // $("#codeBooking").replaceWith(datahtml)
        // $("#codeBookingModal").modal('show')
    });
}


