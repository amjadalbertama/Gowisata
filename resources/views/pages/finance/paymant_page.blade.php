@extends('layout.payment_proses')

@section('content')
<div class="container-fluid mt-100 main-font">
    <div class="row" id="body-sidemenu">
        <div id="main-content" class="col with-fixed-sidebar pb-5 pt-3" style="margin-top:20px;">
            <div class="container">
                <div class="row">
                    <div class="col-9 pt-2"><br>
                        <h1 class="h6 font-weight-normal text-center text-uppercase text-colors-on"> <b>Metode Pembayaran </b> </h1>
                            <hr>
                        <div class="card shadow p-3 mb-5 bg-body rounded">
                            <div class="card-body">
                                <div class="col-12">
                                        <h6>Anda dapat membayar dengan transfer melalui ATM, Internet Banking & Mobile Banking</h6><br>
                                        <!-- <div class="row">
                                            <div class="col-2">

                                            </div> -->
                                            <div class="form-group col-5">
                                                <label for="type">Pilih Metode Pembayaran <span class="text-danger">*</span></label>
                                                <select class="form-control inputVal" id="payment_method" name="payment_method">
                                                    <option value="">--Pilih--</option>
                                                    <option id="payment_name"></option>
                                                </select>
                                                <div class="valid-feedback">Valid.</div>
                                                <div class="invalid-feedback">Isian ini wajib diisi.</div>
                                            </div>
                                </div>
                                <!-- </div><br><br> -->
                                <br><br><br>
                                <div class="row col-12">
                                    <div class="col-4">
                                    </div>
                                    <button class="btn col-4" id="genKodeBayar" style="background-image: linear-gradient(red, rgb(251, 140, 1));"><b class="text-white"><i class="fa fa-credit-card-alt mr-1"></i> Lanjut Pembayaran</b></button>
                                    <button class="btn col-4 d-none" id="getTicketFlight" style="background-image: linear-gradient(red, rgb(251, 140, 1));" onclick="getTicketFlight()"><b class="text-white"><i class="fa fa-download mr-1"></i> Cetak Tiket</b></button>
                                    <button class="btn col-4 d-none" id="getTicketTrain" style="background-image: linear-gradient(red, rgb(251, 140, 1));" onclick="getTicketTrain()"><b class="text-white"> <i class="fa fa-download mr-1"></i> Cetak Tiket</b></button>
                                    <button class="btn col-4 d-none" id="getTicketHotel" style="background-image: linear-gradient(red, rgb(251, 140, 1));" onclick="getVoucHotel()"><b class="text-white"> <i class="fa fa-download mr-1"></i> Cetak Voucher Hotel</b></button>
                                    <button class="btn col-4 d-none" id="getTicketTrainDepart" style="background-image: linear-gradient(red, rgb(251, 140, 1));" onclick="getTicketTrainDepart()"><b class="text-white"> <i class="fa fa-download mr-1"></i> Cetak Tiket Keberangkatan</b></button>
                                    <button class="btn col-4 d-none" id="getTicketTrainReturn" style="background-image: linear-gradient(red, rgb(251, 140, 1));" onclick="getTicketTrainReturn()"><b class="text-white"> <i class="fa fa-download mr-1"></i> Cetak Tiket Kepulangan</b></button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="col-12">
                                    <h6>Anda dapat membayar dengan transfer melalui ATM, Internet Banking & Mobile Banking</h6><br>
                                    <div class="form-group col-5">
                                        <label for="type">Pilih Metode Pembayaran <span class="text-danger">*</span></label>
                                        <select class="form-control inputVal" id="payment_method" name="payment_method">
                                            <option value="">--Pilih--</option>
                                            <option id="payment_name"></option>
                                        </select>
                                        <div class="valid-feedback">Valid.</div>
                                        <div class="invalid-feedback">Isian ini wajib diisi.</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="card shadow-sm col-12">
                            <div class="card-body">
                                <h5 class="text-colors-on">Detail Pesanan</h5>
                                <hr>
                                <div class="form-group">
                                    ID Transaction <br><b style="font-size: 20px;"><div id="code_book" class=""></div></b>
                                </div>
                                <div>
                                    Invoice <br><b style="font-size: 20px;"><div id="invoice_nom"></div></b>
                                </div>
                                <input type="text" id="book_id_hotel" class="d-none" value="">
                                <hr>
                                <div>
                                   <div id="invoice_nom">OneWay</div>
                                </div>
                                <div>
                                    Type Produk: <div id="type_product"></div>
                                </div>
                                <div>
                                   <div id="invoice_nom">Nama Kereta</div>
                                </div>
                                <div>
                                    asal<div id="rute_asal"></div> - tujuan<div id="rute_tujuan"></div><br>
                                    time -> time
                                </div>
                                <hr>
                                <div>
                                   <div>Daftar Penumpang</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- .row -->
            </div>
        </div><!-- Main Col -->
    </div><!-- body-row -->
</div><!-- .container-fluid-->
@endsection

@push('scripts')
<script>
$.LoadingOverlay("show")

    $("#data_pax_navbar_flight" ).addClass('text-colors-on')
    $("#fasilitas_navbar_flight" ).addClass('text-colors-on')
    $("#payment_navbar_flight" ).addClass('text-colors-on')
    $("#data_pax_navbar_train" ).addClass('text-colors-on')
    $("#data_pax_navbar_train_reg" ).addClass('text-colors-on')
    $("#seat_navbar_train" ).addClass('text-colors-on')
    $("#payment_navbar_train_reg" ).addClass('text-colors-on')
    $("#list_wagon_navbar_train" ).addClass('text-colors-on')
    $("#payment_navbar_train" ).addClass('text-colors-on')
    var token = JSON.parse(localStorage.getItem('data_token'));
    var id_trans = JSON.parse(localStorage.getItem('transaction_id'));
    var data_train = JSON.parse(localStorage.getItem('data_train_depart'))

    var token_set = token['access_token']
    var url = fetch('https://api-gowisata.aturtoko.site/api/transaction/list?id='+ id_trans +'order=desc&page=1',{
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
        if(transaction.details[0].product_type == "TRAIN"){
            var codebook = transaction.details[0].booking_data.booking_code_gds;
            var booking_id = transaction.details[0].booking_id;
            $("#book_id_train").val(codebook);

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
            $("#book_id_hotel").val(codebook);
            if(transaction.payment_status == "COMPLETED"){
                
                $("#getTicketHotel").removeClass('d-none');
                $("#getTicketFlight").addClass('d-none');
                $("#genKodeBayar").addClass('d-none');
                $("#getTicketTrain").addClass('d-none');

                $("#getTicketTrainDepart").addClass('d-none');
                $("#getTicketTrainReturn").addClass('d-none');
            }
        }

        var produk_type =  transaction.details[0].product_type ;
        var invoice =  transaction.invoice_number ;
       
        $("#type_product").replaceWith(produk_type);
        $("#invoice_nom").replaceWith(invoice);
        $("#code_book").replaceWith(id_trans);
           
    });

    

$("#payment_method").on('click', function(){
    var token = JSON.parse(localStorage.getItem('data_token'));
    var token_set = token['access_token'];
    var url = fetch('https://api-gowisata.aturtoko.site/api/payment/method-list',{
        method: 'GET',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token_set,
        },
      }).then((response) => response.json()).then((responseData) => {
        var asal = responseData.data;
        console.log(asal)
       
        // window.location.href = "/listorder";
        var setorder = "";
        //     $("#asal_li").empty();
            for (var i = 0; i < asal.length; i++){
             
                setorder += `<option value="`+ asal[i].id +`"> `+ asal[i].type + `-`+ asal[i].name +`</option>`;
            }
            $("#payment_name").replaceWith(setorder);
        });
    });

    $("#genKodeBayar").on('click', function(){
    $.LoadingOverlay("show")
    var id_payment = $("#payment_method").val();
    console.log(id_payment);

    var token = JSON.parse(localStorage.getItem('data_token'))
    var token_set = token['access_token'];
    var transaction = JSON.parse(localStorage.getItem('transaction_id'))
    var url = fetch('https://api-gowisata.aturtoko.site/api/payment/generateVA',{
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
        console.log(responseData.data)
        $.LoadingOverlay("hide")
        window.location.href = responseData.data.virtual_account_info.how_to_pay_page;
        });
    });

    function getTicketTrain(){
        $.LoadingOverlay("show")
        var book_id = JSON.parse(localStorage.getItem('code_book_krl_reg'))
        var response = fetch("https://api-gowisata.aturtoko.site/api/train/e_ticket",{
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'Authorization': 'Bearer' + token_set,
            },
            body: JSON.stringify({
                "booking_code": book_id,
            }),
        }).then((response) => response.blob()).then((responseData) => {
            // console.log(responseData)
            $.LoadingOverlay("hide")
            var url = URL.createObjectURL(responseData) ;
            var a = document.createElement('a') ;
            a.style.display = 'none';
            a.href = url ;
            a.download = 'ticket_train.pdf';
            document.body.appendChild(a) ;
            a.click() ;
            URL.revokeObjectURL(url) ;

        });
    };

    function getTicketFlight(){
        $.LoadingOverlay("show")
        var book_id = $("#book_id_flight").val();
        var response = fetch("https://api-gowisata.aturtoko.site/api/flight/e_ticket",{
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'Authorization': 'Bearer' + token_set,
            },
            body: JSON.stringify({
                "booking_code": book_id,
            }),
        }).then((response) => response.blob()).then((responseData) => {
            $.LoadingOverlay("hide")
            var url = URL.createObjectURL(responseData);
            var a = document.createElement('a');
            a.style.display = 'none';
            a.href = url;
            a.download = 'ticket_flight.pdf';
            document.body.appendChild(a);
            a.click();
            URL.revokeObjectURL(url);
        });
      
    };

    function getTicketTrainDepart(){
        $.LoadingOverlay("show")
        var code_cart = JSON.parse(localStorage.getItem('code_book_krl_reg'))
        var code_dpart = code_cart['depart_code']

        var response = fetch("https://api-gowisata.aturtoko.site/api/train/e_ticket?booking_code="+code_dpart,{
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'Authorization': 'Bearer' + token_set,
            },
            body: JSON.stringify({
                "booking_code": code_dpart,
            }),
        }).then((response) => response.blob()).then((responseData) => {
            console.log(responseData)
            $.LoadingOverlay("hide")
            var url = URL.createObjectURL(responseData);
            var a = document.createElement('a');
            a.style.display = 'none';
            a.href = url;
            a.download = 'ticket_train_keberangkatan.pdf';
            document.body.appendChild(a);
            a.click();
            URL.revokeObjectURL(url);
        });

    };

    function getTicketTrainReturn(){
        $.LoadingOverlay("show")
        var code_cart = JSON.parse(localStorage.getItem('code_book_krl_reg'))
        var code_retrn = code_cart['return_code']
        // var book_id = JSON.parse(localStorage.getItem('code_book_krl_reg'))
        var response = fetch("https://api-gowisata.aturtoko.site/api/train/e_ticket",{
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'Authorization': 'Bearer' + token_set,
            },
            body: JSON.stringify({
                "booking_code": code_retrn,
            }),
        }).then((response) => response.blob()).then((responseData) => {
            $.LoadingOverlay("hide")
            var url = URL.createObjectURL(responseData);
            var a = document.createElement('a');
            a.style.display = 'none';
            a.href = url;
            a.download = 'ticket_train_kepulangan.pdf';
            document.body.appendChild(a);
            a.click();
            URL.revokeObjectURL(url);
        });
    };

    function getVoucHotel(){
        $.LoadingOverlay("show")
        // var code_cart = JSON.parse(localStorage.getItem('code_book_krl_reg'))
        // var code_retrn = code_cart['return_code']
        var code_hotel_book = $("#book_id_hotel").val()
        // var book_id = JSON.parse(localStorage.getItem('code_book_krl_reg'))
        var response = fetch("https://api-gowisata.aturtoko.site/api/hotel/e_voucher",{
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'Authorization': 'Bearer' + token_set,
            },
            body: JSON.stringify({
                "invoice_no": code_hotel_book,
                "reservation_no": ""
            }),
        }).then((response) => response.blob()).then((responseData) => {
            console.log(responseData)
            $.LoadingOverlay("hide")
            var url = URL.createObjectURL(responseData);
            var a = document.createElement('a');
            a.style.display = 'none';
            a.href = url;
            a.download = 'voucher_hotel.pdf';
            document.body.appendChild(a);
            a.click();
            URL.revokeObjectURL(url);
        });
    };
</script>
@endpush