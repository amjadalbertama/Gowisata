@extends('layout.payment_proses')

@section('content')
<div class="container-fluid mt-100 main-font">
    <div class="row" id="body-sidemenu">
        <div id="main-content" class="col with-fixed-sidebar pb-5 pt-3" style="margin-top:20px;">
            <div class="container">
                <div class="row">
                    <div class="col-9 pt-2"><br>
                        <h6><b>Silakan Transfer Ke</b></h6>
                        <div class="card shadow p-3 mb-5 bg-body rounded">
                            <div class="card-body">
                                <div class="col-12">
                                    <div class="form-group col-12">
                                        <label style="font-size: 15px;">Virtual Account Number / Kode Pembayaran</label>
                                        <div class="row"><h3><b class="col-6" id="code_pembayaran"></b></h3><b><a class="col-1" href="javascript:void(0);" id="copy_no_rek"><span class="fa fa-copy fa-lg text-colors-on"></span></a></div></b>
                                        <input type="text" id="code_pra_payment" hidden>
                                    </div><br>
                                    <div class="row" style="margin-left: 0.3%;">
                                        <div class="form-group col-6">
                                            <label style="font-size: 15px;">Virtual Account</label>
                                            <h5><b id="name_bank"></b></h5>
                                        </div>
                                        <div class="form-group col-6 text-right">
                                            
                                            <label style="margin-top: 15px;" id="image_bank"></label>
                                            <!-- <h2><b>Mandiri</b></h2> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <h6><b>Cara Pembayaran</b></h6>
                        <div class="card shadow p-3 mb-5 bg-body rounded">
                            <div class="card-body">
                                <div class="col-12">
                                    <h6>1. Login ke Livin’</h6>
                                    <h6>2. Pilih menu "Bayar"</h6>
                                    <h6>3. Ketik \"DOKU VA Aggregator\" atau \"88899\" pada bagian search</h6>
                                    <h6>4. Masukkan No VA \"<b id="intrs_kode"></b>\" secara keseluruhan, lalu masukan nominal, kemudian tekan Lanjutkan</h6>
                                    <h6>5. Pastikan detail pembayaran sudah sesuai seperti no VA, Jumlah Pembayaran dan detail lainnya</h6>
                                    <h6>6. Pilih Rekening Sumber</h6>
                                    <h6>7. Pilih Lanjut Bayar kemudian masukkan PIN dan konfirmasi</h6>
                                    <h6>8. Transaksi selesai dan simpan resi sebagai bukti transaksi</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pt-2">
                        <div class="card shadow-sm col-12">
                            <div class="card-body">
                                <h5 class="text-colors-on">Detail Pembayaran</h5>
                                <hr>
                                <div class="form-group">
                                    Invoice <br><b style="font-size: 20px;" id="invoice_nom"></b>
                                </div>
                                <div class="form-group">
                                    Status <br><div class="row"><b class="col-6" style="font-size: 20px;" id="status"></b><span class="col-6 blink d-none" id="time_limit_payment"></span></div>
                                    <input type="text" id="time_limit_payment_in" value="" hidden>
                                </div>
                                    <input type="text" id="book_id_hotel" class="d-none" value="">
                                <div class="form-group">
                                    Jumlah Tagihan <br><b style="font-size: 20px;" id="tagihan"></b>
                                </div>
                                <hr>
                                <div>
                                   <div class="text-colors-on"> <b>Pemesan :</b> </div>
                                </div><hr>
                                <div class="form-group">
                                   <b><div id="name_order"></div></b>
                                </div>
                                <div class="form-group">
                                    <b><div id="email_order"></div></b>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- .row -->
            </div>
        </div><!-- Main Col -->
    </div><!-- body-row -->
</div><!-- .container-fluid-->
<div id="codeBooking"></div>
@endsection

@push('scripts')
<script>
    $.LoadingOverlay("show")
    $("#tiket_flight").addClass('text-colors-on')
    $("#data_pax_navbar_flight" ).addClass('text-colors-on')
    $("#fasilitas_navbar_flight" ).addClass('text-colors-on')
    $("#payment_navbar_flight" ).addClass('text-colors-on')
    $("#data_pax_navbar_train" ).addClass('text-colors-on')
    $("#data_pax_navbar_train_reg" ).addClass('text-colors-on')
    $("#seat_navbar_train" ).addClass('text-colors-on')
    $("#payment_navbar_train_reg" ).addClass('text-colors-on')
    $("#list_wagon_navbar_train" ).addClass('text-colors-on')
    $("#payment_navbar_train" ).addClass('text-colors-on')
    $("#tiket_navbar_train_reg" ).addClass('text-colors-on')
    $("#tiket_navbar_train_wis" ).addClass('text-colors-on')
    $("#payment_navbar_mice" ).addClass('text-colors-on')

    $("#list_room_hotel" ).addClass('text-colors-on')
    $("#data_pax_hotel" ).addClass('text-colors-on')
    $("#payment_navbar_hotel" ).addClass('text-colors-on')
    $("#payment_navbar_hotel_tiket" ).addClass('text-colors-on')
    $("#payment_navbar_mice_tiket" ).addClass('text-colors-on')
    var limit = {}
    var print_tiket = {}
    var payment_id = JSON.parse(localStorage.getItem('id_payment_metode'))
    var token = JSON.parse(localStorage.getItem('data_token'));
    var token_set = token['access_token']
    var id_trans = JSON.parse(localStorage.getItem('transaction_id'));
    var data_train = JSON.parse(localStorage.getItem('data_train_depart'))
    var payment = localStorage.getItem('payment_api')
    var type_order_pay = JSON.parse(localStorage.getItem('product_payment'))
    var type_trip = JSON.parse(localStorage.getItem('type_trip'))
    var timer = JSON.parse(localStorage.getItem('timer_pay'))
    // console.log(type_trip)
    // console.log(payment)

    getDataFromAPI()
    getPaymentCode()
    setTimerPayment()

    $("#copy_no_rek").on('click', function(){
        var text_copy = $("#code_pra_payment").val()
        navigator.clipboard.writeText(text_copy);

        toastr.success("Berhasil copy code pembayaran", "Success")
    })

    if(timer == undefined || timer == [] || timer == null){

        if(type_order_pay == "train_regular" || type_order_pay == "train_wisata" || type_order_pay == "train_klb" || type_order_pay == "train_istimewa"){
            var duration = "50:00";
        }else if(type_order_pay == "hotel"){
            var duration = "15:00";
        }else if(type_order_pay == "flight"){
            var duration = "40:00";
        }else if(type_order_pay == "mice"){
            var duration = "40:00";
        }
 
    }else{
        var duration = JSON.parse(localStorage.getItem('timer_pay'))
    }
    console.log(duration)
    var durationArray = duration.split(":");

    var minutes = parseInt(durationArray[0]);
    var seconds = parseInt(durationArray[1]);

    var timeLimit = (minutes * 60) + seconds;
    var timeLeft = timeLimit;

function updateTimer(){
    timeLeft--;

    var minutes = Math.floor(timeLeft / 60);
    var seconds = timeLeft % 60;

    if (seconds < 10) {
        seconds = "0" + seconds;
    }

    if (minutes < 10) {
        minutes = "0" + minutes;
    }

    var timerString = minutes + ":" + seconds;
    $("#time_limit_payment").empty().append(timerString)
    $("#time_limit_payment_in").val(timerString)
    localStorage.setItem('timer_pay', JSON.stringify(timerString))
}

function setTimerPayment(){
    setInterval(updateTimer, 1000);
    var rtime = $("#time_limit_payment_in").val()
}

function getDataFromAPI(){
    var url = fetch(payment,{
        method: 'GET',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
        },
      }).then((response) => response.json()).then((responseData) => {
        var transaction = responseData;
        console.log(transaction)
        $.LoadingOverlay("hide")
        $("#time_limit_payment").removeClass('d-none')
        // $("#time_limit_payment_in").val(responseData.virtual_account_info.expired_in)
        // limit.time = responseData.virtual_account_info.expired_in
        $("#code_pra_payment").val(responseData.virtual_account_info.virtual_account_number)
        $("#code_pembayaran").empty().append(responseData.virtual_account_info.virtual_account_number);
        $("#intrs_kode").empty().append(responseData.virtual_account_info.virtual_account_number);
        $("#name_order").empty().append(`<i class="fa fa-user"></i> `+responseData.customer.name);
        $("#email_order").empty().append(`<i class="fa fa-envelope"></i> `+responseData.customer.email);
        $("#tagihan").empty().append("Rp."+formatPrice(responseData.order.amount));
        $("#invoice_nom").empty().append(responseData.order.invoice_number);
        $("#status").empty().append(responseData.virtual_account_info.status);
        // var kk = getImageBank(payment_id)
        var bank_logo = `<img src="{{ asset('img/`+getImageBank(payment_id)+`') }}" alt="Logo" height="60" class ="mt-n1 mr-2">`;
        console.log(bank_logo)
        $("#image_bank").empty().append(bank_logo);
        $("#name_bank").empty().append(getNameBank(payment_id));
        print_tiket.invoice_hotel = responseData.order.invoice_number;
        if(responseData.virtual_account_info.status == "PAID"){ 
            $("#time_limit_payment").addClass('d-none')
            var datahtml = `
                <div class="modal fade sm-5" id="sucessPembayaran" data-keyboard="false" data-backdrop="static">
                    <div class="modal-dialog modal-dialog-scrollable modal-ku" style="margin-top:15%;"><br>
                        <div class="modal-content text-center" >
                            <div style="margin-top:8%;">
                               <b class="text-colors-none"><i class="fa fa-check-circle fa-5x"></i></b>
                            <center class="text-colors-none"><b>Pembayaran Berhasil</b></center>
                            <br>
                            </div><br>
                            <div class="footer">
                                <button type="button" id="kembaliFailedBook" class="btn main-color"><b class="text-colors-off"><i class="fa fa-chevron-left mr-1"></i>Kembali</b></button>
                            </div>
                        </div>
                    </div>
                </div>`
                $("#codeBooking").append(datahtml)
                $("#sucessPembayaran").modal('show')

                $("#kembaliFailedBook").on('click', function(){
                    window.location.href = "/listorder";
                })

        }else if(responseData.virtual_account_info.status == "EXPIRED"){
            $("#time_limit_payment").addClass('d-none')
            var datahtml = `
                <div class="modal fade sm-5" id="gagalPembayaran" data-keyboard="false" data-backdrop="static">
                    <div class="modal-dialog modal-dialog-scrollable modal-ku" style="margin-top:15%;"><br>
                        <div class="modal-content text-center" >
                            <div style="margin-top:5%;">
                                <h4 class="text-colors-block"><b>Booking Failed</b></h4><br>
                            <center>Status Pembayaran Expired!</b></center>
                            <br>
                            </div><br><br><br>
                            <div class="footer">
                                <button type="button" id="kembaliFailedBook" class="btn main-color"><b class="text-colors-off"></i>Kembali</b></button>
                            </div>
                        </div>
                    </div>
                </div>`
                $("#codeBooking").append(datahtml)
                $("#gagalPembayaran").modal('show')

                $("#kembaliFailedBook").on('click', function(){
                    window.location.href = "/home";
            })
        }  
    });
}

function getforSetInterval(){
    var url = fetch(payment,{
        method: 'GET',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
        },
      }).then((response) => response.json()).then((responseData) => {
        var transaction = responseData;
        if(responseData.virtual_account_info.status == "OPEN"){

        }else if(responseData.virtual_account_info.status == "PAID"){
            getDataFromAPI()
        }else if(responseData.virtual_account_info.status == "EXPIRED"){
            getDataFromAPI()
        }
    });
}

function getPaymentCode(){
  getforSetInterval()
  var intervl = localStorage.getItem('status_interval')
//console.log(intervl)
  if(intervl == undefined || intervl == null || intervl == ""){
    setInterval(getforSetInterval, 1000);
  }else{
    clearInterval(getforSetInterval);
  }
}

function downloadTicketKaiReg(){
    if(type_order_pay == "flight"){
        getTicketFlight()
    }else if(type_order_pay == "train_regular"){
        if(type_trip == "OneWay"){
            getTicketTrain()
        }else if(type_trip == "RoundTrip"){
            getTicketTrainDepart()
            getTicketTrainReturn()
        }
    }else if(type_order_pay == "train_wisata"){

    }else if(type_order_pay == "train_klb"){

    }else if(type_order_pay == "train_istimewa"){

    }else if(type_order_pay == "hotel"){
        getVoucHotel()
    }else if(type_order_pay == "mice"){

    }
}
    

</script>
@endpush