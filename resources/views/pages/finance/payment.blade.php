@extends('layout.payment_proses')

@section('content')
<div class="container-fluid mt-100 main-font">
    <div class="row" id="body-sidemenu">
        <div id="main-content" class="col with-fixed-sidebar pb-5 pt-3" style="margin-top:20px;">
            <div class="container">
                <div class="row">
                    <div class="col-9 pt-2"><br>
                        <h1 class="h6 font-weight-normal text-center text-uppercase text-colors-on"> <b>Metode Pembayaran</b> </h1>
                            <hr>
                        <div class="card shadow p-3 mb-5 bg-body rounded d-none" id="shape_pay_method">
                            <div class="card-body">
                                <div class="col-12">
                                        <h6>Anda dapat membayar dengan transfer melalui ATM, Internet Banking & Mobile Banking</h6><br>
                                        <!-- <div class="row">
                                            <div class="col-2">

                                            </div> -->
                                            <div class="form-group col-12">
                                                <label for="type">Pilih Metode Pembayaran <span class="text-danger">*</span></label><br>
                                                <!-- <select class="form-control inputVal" id="payment_method" name="payment_method">
                                                    <option value="0" selected>--Pilih--</option>
                                                    <option id="payment_name"></option>
                                                </select> -->
                                                <div id="payment_method_list"></div> 
                                                <div class="valid-feedback">Valid.</div>
                                                <div class="invalid-feedback">Isian ini wajib diisi.</div>
                                            </div>
                                        </div>
                                <!-- </div><br><br> -->
                                <br><br><br>
                                <div class="row col-12">
                                    <div class="col-4" id="allcol">
                                    </div>
                                    <div class="col-2 d-none" id="spaccol">
                                    </div>
                                    <div class="col-4 d-none" id="dp_col">
                                        <button class="btn col-12 d-none" id="genKodeBayarHalfPay" style="background-image: linear-gradient(red, rgb(251, 140, 1));"><b class="text-white"><i class="fa fa-credit-card-alt mr-1"></i> Down Payment(DP)</b></button>
                                        <button class="btn col-12 d-none" id="genKodeBayarHalfPayMice" style="background-image: linear-gradient(red, rgb(251, 140, 1));"><b class="text-white"><i class="fa fa-credit-card-alt mr-1"></i> Down Payment(DP)</b></button>
                                    </div>
                                    <div class="col-4 d-none" id="full_col">
                                        <button class="btn col-12 d-none" id="genKodeBayarFullPay" style="background-image: linear-gradient(red, rgb(251, 140, 1));"><b class="text-white"><i class="fa fa-credit-card-alt mr-1"></i> Full Payment</b></button>
                                        <button class="btn col-12 d-none" id="genKodeBayarFullPayMice" style="background-image: linear-gradient(red, rgb(251, 140, 1));"><b class="text-white"><i class="fa fa-credit-card-alt mr-1"></i> Full Payment</b></button>
                                    </div>
                                    <button class="btn col-4" id="genKodeBayar" style="background-image: linear-gradient(red, rgb(251, 140, 1));"><b class="text-white"><i class="fa fa-credit-card-alt mr-1"></i> Lanjut Pembayaran</b></button>
                                    <button class="btn col-4 d-none" id="genKodeBayarDPpay" style="background-image: linear-gradient(red, rgb(251, 140, 1));"><b class="text-white"><i class="fa fa-credit-card-alt mr-1"></i>Pelunasan sisa DP</b></button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pt-2 col-3">
                        <div class="card shadow-sm ">
                            <div class="card-body">
                                <h5 class="text-colors-on">Detail Pesanan</h5>
                                <hr>
                                <div class="form-group">
                                    ID Transaction <br><b style="font-size: 20px;"><div id="code_book" class=""></div></b>
                                </div>
                                <div>
                                    Invoice <br><b style="font-size: 20px;"><div id="invoice_nom"></div></b>
                                </div><br>
                                <div>
                                    Total Tagihan <br><b style="font-size: 20px;"><div id="total_tagihan"></div></b>
                                </div>
                                <input type="text" id="book_id_hotel" class="d-none" value="">
                                <input type="text" id="trip_transc" class="d-none" value="">
                                <hr>
                                <!-- <div>
                                    Type Produk: <div id="type_product"></div>
                                </div>
                                <div>
                                   <div id="invoice_nom">Nama Kereta</div>
                                </div>
                                <div>
                                    asal<div id="rute_asal"></div> - tujuan<div id="rute_tujuan"></div><br>
                                    time -> time
                                </div>--> 
                                <div id="upload_penumpang" class="d-none">
                                    <div>Upload Daftar Penumpang</div>
                                    <input type="file" class="form-control" id="file_xls_pax" onclick="cekfile(event)" name="file_xls_pax" accept="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/excel">
                                    <div class="valid-feedback successxls text-colors-none"></div>
                                    <div class="invalid-feedback failxls text-colors-block"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- .row -->
            </div>
        </div><!-- Main Col -->
    </div><!-- body-row -->
</div><!-- .container-fluid-->
<div id="validateModalShow"></div>
@endsection

@push('scripts')
<script>
$.LoadingOverlay("show")
    localStorage.removeItem("timer_pay")    
    let kode_book_all = {}
    $("#data_pax_navbar_flight" ).addClass('text-colors-on')
    $("#fasilitas_navbar_flight" ).addClass('text-colors-on')
    $("#payment_navbar_flight" ).addClass('text-colors-on')
    $("#data_pax_navbar_train" ).addClass('text-colors-on')
    $("#data_pax_navbar_train_reg" ).addClass('text-colors-on')
    $("#seat_navbar_train" ).addClass('text-colors-on')
    $("#payment_navbar_train_reg" ).addClass('text-colors-on')
    $("#list_wagon_navbar_train" ).addClass('text-colors-on')
    $("#payment_navbar_train" ).addClass('text-colors-on')
    $("#list_room_hotel" ).addClass('text-colors-on')
    $("#data_pax_hotel" ).addClass('text-colors-on')
    $("#payment_navbar_hotel" ).addClass('text-colors-on')
    $("#payment_navbar_mice" ).addClass('text-colors-on')

    var token = JSON.parse(localStorage.getItem('data_token'));
    var id_trans = JSON.parse(localStorage.getItem('transaction_id'));
    var data_train = JSON.parse(localStorage.getItem('data_train_depart'))

    var token_set = token['access_token']
    var url = fetch(mainurl + 'transaction/list?id='+ id_trans +'order=desc&page=1',{
        method: 'GET',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token_set,
        },
      }).then((response) => response.json()).then((responseData) => {
        var transaction = responseData.data;
        console.log(transaction)
        $.LoadingOverlay("hide")
        $("#shape_pay_method").removeClass('d-none');
        if(transaction.details[0].product_type == "TRAIN"){
            var codebook = transaction.details[0].booking_data.booking_code_gds;
            var tipe = transaction.details[0].booking_data.route_type
            kode_book_all.code = codebook
            if(tipe != "OneWay"){
            kode_book_all.code_return = transaction.details[1].booking_data.booking_code_gds;
                $("#trip_transc").val(tipe);
            }else{
                $("#trip_transc").val(tipe);
            }
            var booking_id = transaction.details[0].booking_id;
            $("#book_id_train").val(codebook);
            // console.log(kode_book_all)
            if(transaction.details.length == 1){
                if(transaction.payment_status == "COMPLETED"){
                    $("#getTicketFlight").addClass('d-none');
                    $("#genKodeBayar").addClass('d-none');
                    $("#getTicketTrain").removeClass('d-none');
                }else{
                    $("#getTicketFlight").addClass('d-none');
                    $("#genKodeBayar").removeClass('d-none');
                    $("#getTicketTrain").addClass('d-none');
                }

            }else if(transaction.details.length > 1){
           
                if(transaction.payment_status == "COMPLETED"){

                    $("#getTicketFlight").addClass('d-none');
                    $("#genKodeBayar").addClass('d-none');
                    $("#getTicketTrain").addClass('d-none');

                    $("#getTicketTrainDepart").removeClass('d-none');
                    $("#getTicketTrainReturn").removeClass('d-none');
                }else{

                    $("#getTicketFlight").addClass('d-none');
                    $("#genKodeBayar").removeClass('d-none');
                    $("#getTicketTrain").addClass('d-none');

                    $("#getTicketTrainDepart").addClass('d-none');
                    $("#getTicketTrainReturn").addClass('d-none');
                }
            }
        }else if(transaction.details[0].product_type == "FLIGHT"){
            var codebook = transaction.details[0].booking_data.booking_code ;
            kode_book_all.code = codebook
            var booking_id = transaction.details[0].booking_data.id ;
            $("#book_id_flight").val(codebook);
            if(transaction.payment_status == "COMPLETED"){
                $("#getTicketFlight").removeClass('d-none');
                $("#genKodeBayar").addClass('d-none');
                $("#getTicketTrain").addClass('d-none');

                $("#getTicketTrainDepart").addClass('d-none');
                $("#getTicketTrainReturn").addClass('d-none');
            }
        }else if(transaction.details[0].product_type == "HOTEL"){
            var codebook = transaction.invoice_number 
            kode_book_all.transaction = codebook
            $("#book_id_hotel").val(codebook);
            if(transaction.payment_status == "COMPLETED"){
                
                $("#getTicketHotel").removeClass('d-none');
                $("#getTicketFlight").addClass('d-none');
                $("#genKodeBayar").addClass('d-none');
                $("#getTicketTrain").addClass('d-none');

                $("#getTicketTrainDepart").addClass('d-none');
                $("#getTicketTrainReturn").addClass('d-none');
            }
        }else if(transaction.details[0].product_type == "TRAIN_SPEC"){
            var codebook = transaction.details[0].booking_data.booking_code_gds;
            var tipe = transaction.details[0].booking_data.route_type
            kode_book_all.code = codebook
            if(tipe != "OneWay"){
                kode_book_all.code_return = transaction.details[1].booking_data.booking_code_gds;
                $("#trip_transc").val(tipe);
            }else{
                $("#trip_transc").val(tipe);
            }
            var booking_id = transaction.details[0].booking_id;
            $("#book_id_train").val(codebook);
            // console.log(kode_book_all)
            
            $("#genKodeBayar").addClass('d-none');
            $("#allcol").addClass('d-none');
            $("#dp_col").removeClass('d-none');
            $("#genKodeBayarHalfPay").removeClass('d-none');
            $("#genKodeBayarFullPay").removeClass('d-none');
            $("#upload_penumpang").removeClass('d-none');
            $("#full_col").removeClass('d-none');
            $("#spaccol").removeClass('d-none');

            if(transaction.payment_status == "PAID"){
                $("#genKodeBayarDPpay").removeClass('d-none');
                $("#allcol").removeClass('d-none');
                $("#dp_col").addClass('d-none');
                $("#full_col").addClass('d-none');
                $("#spaccol").addClass('d-none');
                $("#upload_penumpang").addClass('d-none');
            }
        
        }else if(transaction.details[0].product_type == "MICE"){
            var codebook = transaction.details[0].booking_data.booking_code;
            kode_book_all.code = codebook
            $("#genKodeBayar").addClass('d-none');
            $("#allcol").addClass('d-none');
            $("#dp_col").removeClass('d-none');
            $("#full_col").removeClass('d-none');
            $("#spaccol").removeClass('d-none');

            $("#genKodeBayarHalfPayMice").removeClass('d-none');
            $("#genKodeBayarFullPayMice").removeClass('d-none');

            if(transaction.payment_status == "PAID"){
                $("#genKodeBayarDPpay").removeClass('d-none');
                $("#allcol").removeClass('d-none');
                $("#dp_col").addClass('d-none');
                $("#full_col").addClass('d-none');
                $("#spaccol").addClass('d-none');
                $("#upload_penumpang").addClass('d-none');
            }
        }
        

        if(transaction.details[0].booking_data.route_info[0].dep_date != ''){
            var dateString = transaction.details[0].booking_data.route_info[0].dep_date;
            var [datePart, timePart] = dateString.split(' - ');
            var [year, month, day] = datePart.split('-');
            var [hour, minute] = timePart.split(':');
            var date = new Date(year, month - 1, day, hour, minute);
            var timestampBook = date.getTime();
            
            var currentDate = new Date();
            var futureDate = new Date(currentDate.getTime() + 7 * 24 * 60 * 60 * 1000);
            var timestampNowWithPlus7Days = futureDate.getTime();
            console.log(timestampNowWithPlus7Days)
            console.log(timestampBook)

            if(timestampNowWithPlus7Days > timestampBook){
                console.log(timestampNowWithPlus7Days);
                console.log(timestampBook);
            $("#genKodeBayarHalfPay").replaceWith('<button class="btn col-12" data-toggle="modal" data-target="#validateModal" style="background-image: linear-gradient(red, rgb(251, 140, 1));"><b class="text-white"><i class="fa fa-credit-card-alt mr-1"></i> Down Payment(DP)</b></button>');
            var datahtml = `
                        <div class="modal fade" id="validateModal" data-keyboard="false" data-backdrop="static">
                            <div class="modal-dialog modal-sm modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-colors-block">Pemberitahuan!</h5>
                                        <button type="button" class="close" data-dismiss="modal" onclick="closeModalvalidateIst()">×</button>
                                    </div>
                                    <div class="modal-body">
                                    <center><b class="text-color-block"><h6>Pembayaran DP sudah tidak bisa dilakukan karena melebihi batas waktu, silahkan lakukan langsung Full Payment!</h6></b></center>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `;
                    $("#validateModalShow").replaceWith(datahtml)
                    
                    toastr.error("lakukan langsung Full Payment!", "Error")
        }
    }

        var produk_type =  transaction.details[0].product_type ;
        var invoice =  transaction.invoice_number ;
        var total =  transaction.total ;
        // localStorage.setItem("status_interval", )
        $("#type_product").replaceWith(produk_type);
        $("#invoice_nom").replaceWith(invoice);
        $("#total_tagihan").replaceWith(`Rp. `+formatPrice(total));
        $("#code_book").replaceWith(id_trans);
           
    });
//payment_method
    var token = JSON.parse(localStorage.getItem('data_token'));
    var token_set = token['access_token'];
    var url = fetch(mainurl + 'payment/method-list',{
        method: 'GET',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token_set,
        },
    }).then((response) => response.json()).then((responseData) => {
        var asal = responseData.data;
        console.log(asal)
       
        for(var i = 0; i <= asal.length; i++){
            var no = i+1
            setPaxLght = `
            <div class="col-12">
                <div class="card p-3 mb-2 bg-body rounded">
                    <div class="custom-control custom-radio">
                        <input type="radio" class="custom-control-input" id="`+no+`" value="`+no+`" name="payment_method"> 
                        <label for="`+no+`" class="custom-control-label col-12">
                            <div class="row">
                                <div id="descrip"><img src="{{asset('img/`+getImageBank(asal[i].id)+`') }}" alt="Logo" height="20" class ="mt-n1 mr-2"> <b>`+ asal[i].type +`-`+ asal[i].name +`</b></div>
                                <input id="metode_payment`+ no +`" value="`+ asal[i].id+`" hidden></input>
                            </div>
                        </label>
                    </div>
                </div> 
            </div>`;
            $("#payment_method_list").append(setPaxLght);
        }
    });

    $("#genKodeBayar").on('click', function(){
    var id_payment = $("input[name='payment_method']:checked").val();
    if(id_payment != undefined){
        localStorage.setItem('id_payment_metode',id_payment)
        localStorage.setItem('kode_book_alls', kode_book_all.code)
        if($("#trip_transc").val() != "OneWay"){
            localStorage.setItem('kode_book_return_alls', kode_book_all.code_return)
        }else{
            localStorage.setItem('kode_book_return_alls', kode_book_all)
        }
        var token = JSON.parse(localStorage.getItem('data_token'))
        var token_set = token['access_token'];
        var transaction = JSON.parse(localStorage.getItem('transaction_id'))
        var url = fetch(mainurl + 'payment/generateVA',{
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + token_set,
            },
            body: JSON.stringify({
                "transaction_id": transaction,
                "payment_method_id": id_payment,
            }),
            }).then((response) => response.json()).then((responseData) => {
            console.log(responseData)
            if(responseData.success == true){
                // var transaction = {}
                // transaction.
                localStorage.setItem("payment_api", responseData.data.virtual_account_info.how_to_pay_api)
                // $.LoadingOverlay("hide")
                window.location.href = "/payment_page";
            }else if(responseData.success == false){
                toastr.error(responseData.message + "!", "Error")
            }
        
            });
        }else{
            toastr.error("Anda belum pilih metode pembayaran!", "Error")
        }
    });

    $("#genKodeBayarDPpay").on('click', function(){
    var id_payment = $("input[name='payment_method']:checked").val();
    if(id_payment != undefined){
        localStorage.setItem('id_payment_metode',id_payment)
        localStorage.setItem('kode_book_alls', kode_book_all.code)
        if($("#trip_transc").val() != "OneWay"){
            localStorage.setItem('kode_book_return_alls', kode_book_all.code_return)
        }else{
            localStorage.setItem('kode_book_return_alls', kode_book_all)
        }
        var token = JSON.parse(localStorage.getItem('data_token'))
        var token_set = token['access_token'];
        var transaction = JSON.parse(localStorage.getItem('transaction_id'))
        var url = fetch(mainurl + 'payment/generateVA',{
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + token_set,
            },
            body: JSON.stringify({
                "transaction_id": transaction,
                "payment_method_id": id_payment,
            }),
            }).then((response) => response.json()).then((responseData) => {
            console.log(responseData)
            if(responseData.success == true){
                // var transaction = {}
                // transaction.
                localStorage.setItem("payment_api", responseData.data.virtual_account_info.how_to_pay_api)
                // $.LoadingOverlay("hide")
                window.location.href = "/payment_page";
            }else if(responseData.success == false){
                toastr.error(responseData.message + "!", "Error")
            }
        
            });
        }else{
            toastr.error("Anda belum pilih metode pembayaran!", "Error")
        }
    });

    $("#genKodeBayarHalfPay").on('click', function(){
        $("#file_xls_pax").removeClass("is-invalid")
            $("#file_xls_pax").removeClass("border-danger")
            $(".failxls").css("display", "none")

        var id_payment = $("input[name='payment_method']:checked").val();
        var fileInput = document.getElementById("file_xls_pax");
        var fileName = fileInput.value;
        console.log(fileName)
        if(id_payment != undefined && fileName != ""){
        console.log(id_payment);
        localStorage.setItem('id_payment_metode',id_payment)
        localStorage.setItem('kode_book_alls', kode_book_all.code)
        if($("#trip_transc").val() != "OneWay"){
            localStorage.setItem('kode_book_return_alls', kode_book_all.code_return)
        }else{
            localStorage.setItem('kode_book_return_alls', kode_book_all)
        }
        var token = JSON.parse(localStorage.getItem('data_token'))
        var token_set = token['access_token'];
        var transaction = JSON.parse(localStorage.getItem('transaction_id'))
        var url = fetch(mainurl + 'payment/generateVA',{
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + token_set,
            },
            body: JSON.stringify({
                "transaction_id": transaction,
                "payment_method_id": id_payment,
                "type" : "dp"
            }),
            }).then((response) => response.json()).then((responseData) => {
            console.log(responseData)
            if(responseData.success == true){
                // var transaction = {}
                // transaction.
                localStorage.setItem("payment_api", responseData.data.virtual_account_info.how_to_pay_api)
                // $.LoadingOverlay("hide")
                window.location.href = "/payment_page";
            }else if(responseData.success == false){
                toastr.error(responseData.message + "!", "Error")
            }
        
            });
        }else if(id_payment == undefined){
            toastr.error("Anda belum pilih metode pembayaran!", "Error")
        }else if(fileName == ""){
            toastr.error("Anda belum upload file data penumpang!", "Error")
            $("#file_xls_pax").addClass("is-invalid")
            $("#file_xls_pax").addClass("border-danger")
            $(".failxls").css("display", "block").html('Form ini tidak boleh kosong!')
        }else if(id_payment == undefined && fileName == ""){
            toastr.error("Anda belum upload file data penumpang dan memilih metode pembayaran!", "Error")
            $("#file_xls_pax").addClass("is-invalid")
            $("#file_xls_pax").addClass("border-danger")
            $(".failxls").css("display", "block").html('Form ini tidak boleh kosong!')
        }
    })

    $("#genKodeBayarFullPay").on('click', function(){
            $("#file_xls_pax").removeClass("is-invalid")
            $("#file_xls_pax").removeClass("border-danger")
            $(".failxls").css("display", "none")

        var id_payment = $("input[name='payment_method']:checked").val();
        var fileInput = document.getElementById("file_xls_pax");
        var fileName = fileInput.value;
        console.log(fileName)
        if(id_payment != undefined && fileName != ""){
        console.log(id_payment);
        localStorage.setItem('id_payment_metode',id_payment)
        localStorage.setItem('kode_book_alls', kode_book_all.code)
        if($("#trip_transc").val() != "OneWay"){
            localStorage.setItem('kode_book_return_alls', kode_book_all.code_return)
        }else{
            localStorage.setItem('kode_book_return_alls', kode_book_all)
        }
        var token = JSON.parse(localStorage.getItem('data_token'))
        var token_set = token['access_token'];
        var transaction = JSON.parse(localStorage.getItem('transaction_id'))
        var url = fetch(mainurl + 'payment/generateVA',{
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + token_set,
            },
            body: JSON.stringify({
                "transaction_id": transaction,
                "payment_method_id": id_payment,
            }),
            }).then((response) => response.json()).then((responseData) => {
            console.log(responseData)
            if(responseData.success == true){
                // var transaction = {}
                // transaction.
                localStorage.setItem("payment_api", responseData.data.virtual_account_info.how_to_pay_api)
                // $.LoadingOverlay("hide")
                window.location.href = "/payment_page";
            }else if(responseData.success == false){
                toastr.error(responseData.message + "!", "Error")
            }
        
            });
        }else if(id_payment == undefined){
            toastr.error("Anda belum pilih metode pembayaran!", "Error")
        }else if(fileName == ""){
            toastr.error("Anda belum upload file data penumpang!", "Error")
            $("#file_xls_pax").addClass("is-invalid")
            $("#file_xls_pax").addClass("border-danger")
            $(".failxls").css("display", "block").html('Form ini tidak boleh kosong!')
        }else if(id_payment == undefined && fileName == ""){
            toastr.error("Anda belum upload file data penumpang dan memilih metode pembayaran!", "Error")
            $("#file_xls_pax").addClass("is-invalid")
            $("#file_xls_pax").addClass("border-danger")
            $(".failxls").css("display", "block").html('Form ini tidak boleh kosong!')
        }
    });

    $("#genKodeBayarHalfPayMice").on('click', function(){
        var id_payment = $("input[name='payment_method']:checked").val();
        if(id_payment != undefined){
            localStorage.setItem('id_payment_metode', id_payment)
            localStorage.setItem('kode_book_alls', kode_book_all.code)
            if($("#trip_transc").val() != "OneWay"){
                localStorage.setItem('kode_book_return_alls', kode_book_all.code_return)
            }else{
                localStorage.setItem('kode_book_return_alls', kode_book_all)
            }
            var token = JSON.parse(localStorage.getItem('data_token'))
            var token_set = token['access_token'];
            var transaction = JSON.parse(localStorage.getItem('transaction_id'))
            var url = fetch(mainurl + 'payment/generateVA',{
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + token_set,
                },
                body: JSON.stringify({
                    "transaction_id": transaction,
                    "payment_method_id": id_payment,
                    "type" : "dp"
                }),
                }).then((response) => response.json()).then((responseData) => {
                console.log(responseData)
                if(responseData.success == true){
                    // var transaction = {}
                    // transaction.
                    localStorage.setItem("payment_api", responseData.data.virtual_account_info.how_to_pay_api)
                    // $.LoadingOverlay("hide")
                    window.location.href = "/payment_page";
                }else if(responseData.success == false){
                    toastr.error(responseData.message + "!", "Error")
                }
            });

        }else{
            toastr.error("Anda belum pilih metode pembayaran!", "Error")
        }
    })

    $("#genKodeBayarFullPayMice").on('click', function(){
        var id_payment = $("input[name='payment_method']:checked").val();
        if(id_payment != undefined){
            localStorage.setItem('id_payment_metode', id_payment)
            localStorage.setItem('kode_book_alls', kode_book_all.code)
            if($("#trip_transc").val() != "OneWay"){
                localStorage.setItem('kode_book_return_alls', kode_book_all.code_return)
            }else{
                localStorage.setItem('kode_book_return_alls', kode_book_all)
            }
            var token = JSON.parse(localStorage.getItem('data_token'))
            var token_set = token['access_token'];
            var transaction = JSON.parse(localStorage.getItem('transaction_id'))
            var url = fetch(mainurl + 'payment/generateVA',{
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + token_set,
                },
                body: JSON.stringify({
                    "transaction_id": transaction,
                    "payment_method_id": id_payment,
                }),
                }).then((response) => response.json()).then((responseData) => {
                console.log(responseData)
                if(responseData.success == true){
                    // var transaction = {}
                    // transaction.
                    localStorage.setItem("payment_api", responseData.data.virtual_account_info.how_to_pay_api)
                    // $.LoadingOverlay("hide")
                    window.location.href = "/payment_page";
                }else if(responseData.success == false){
                    toastr.error(responseData.message + "!", "Error")
                }
            });

        }else{
            toastr.error("Anda belum pilih metode pembayaran!", "Error")
        }
    })

function cekfile(event) {
    $("#file_xls_pax").on("change",function() {
    var myFile = this.files[0];
    var myFileType = myFile["type"];
    var validFileTypes = ["application/vnd.ms-excel", "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"];

    if ($.inArray(myFileType, validFileTypes) < 0) {
      $("#file_xls_pax").addClass("is-invalid")
      $("#file_xls_pax").addClass("border-danger")
      $(".failxls").css("display", "block").html('Mohon masukan file type Xls/Xlsx !')
      $(".successxls").css("display", "none")
      toastr.error("Gagal upload file data penumpang", "Error")
    } else {
      $("#file_xls_pax").removeClass("is-invalid").addClass("is-valid")
      $("#file_xls_pax").removeClass("border-danger").addClass("border-success")
      $(".successxls").css("display", "block").html('file is correct!')
      $(".failxls").css("display", "none")
    //   move_uploaded_file($myFile['tmp_name'], 'uploads/' . $myFile['name']);
      uploadNow()
    }

    });
    
}  

function uploadNow(){
        var token = JSON.parse(localStorage.getItem('data_token'))
        var token_set = token['access_token'];
        var formData = new FormData();
        formData.append('file', $('input[name=file_xls_pax]')[0].files[0]);
        // $("#file_xls_pax")
        var url = fetch(mainurl + 'passenger/import',{
            method: 'POST',
            headers: {
                'Accept': 'application/excel',
                'Authorization': 'Bearer ' + token_set,
            },
            body: formData,
         
            }).then((response) => response.json()).then((responseData) => {
            console.log(responseData)
            if(responseData.success == true){
                toastr.success("Berhasil upload file data penumpang", "Success")
            }else if(responseData.success == false){
                toastr.error("Gagal upload file data penumpang", "Error")
            }
        
        });
}
</script>
@endpush