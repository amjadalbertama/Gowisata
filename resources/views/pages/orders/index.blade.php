@extends('layout.app')

@section('content')
<div class="container-fluid mt-100 main-font">
  <div class="row" id="body-sidemenu">
    <div id="main-content" class="col with-fixed-sidebar pt-3 pb-5">
      <div class="container">
        <div class="row ">

        <div class="col-12 col-md-12 pt-3">
          <h1 class="h5 font-weight-normal text-center text-uppercase text-colors-on"> <b>List Semua Orders</b> </h5><br>
          <div class="card shadow p-3 mb-5 bg-body rounded">
            <!-- <div class="card-body"> -->
          <div class="row mb-3">
            <div class="col-12 col-md-8 col-lg-9 col-xl-9">
              
            </div>
            <!-- .col -->
            <div class="col-12 col-md-4 col-lg-3 col-xl-3">
              <form action="{{ route('users_search') }}" class="mb-30" id="form_search_user" method="POST">
                @csrf
                <div class="input-group">
                  <input class="form-control form-control-sm border-right-0 border" type="search" placeholder="Search..." id="search_user" name="search_user">
                  <span class="input-group-append">
                    <button class="input-group-text bg-white border-left-0 border"><i class="fa fa-search text-grey"></i></button>
                  </span>
                </div>
              </form>
            </div>
            <!-- .col -->
          </div>
          <!-- .row -->
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body px-3 py-1">
                  <form class="form-inline" action="javascript:void(0);">
                    <label for="sel1" class="mt-2 mt-sm-0 mr-sm-2">Payment Status:</label>
                    <select class="form-control form-control-sm mr-sm-2 bg-transparent border-0 px-0" id="sel1">
                      <option>All</option>
                      <option>Not Paid</option>
                      <option>Paid Off</option>
                      <option>Expired</option>
                    </select>
                  </form>
                </div>
              </div>
            </div>
            <!-- .col -->
          </div>
          <!-- .row -->
          <div class="row">
            <div class="col-12">
              <div class="table-responsive" >
                <table class="table bg-white text-center">
                  <thead class="thead-main text-nowrap">
                    <tr class="text-uppercase ">
                      <th>ID</th>
                      <th>Invoice </th>
                      <th>Kode Booking</th>
                      <th>Jenis Pesanan</th>
                      <th>Harga</th>
                      <th>Status Transaksi</th>
                      <th>Status Pembayaran</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody class="text-nowrap" id="orderListPesawat">
            
                  </tbody>
                  <tfoot class="border-bottom">
                    <tr>
                      <td colspan="8">
                        <div class="d-block d-md-flex flex-row justify-content-between">
                          <div class="d-block d-md-flex">
                          </div>
                      </td>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
            <!-- .col -->
          </div>
          <!-- .row -->
        </div>
        <!-- .col-* -->
      </div>
      </div>
      <!-- </div> -->
      </div>
      <!-- .row -->
    </div>
  </div>
</div>
<div id="modalConfirmCancel"></div>
<div id="detailModalKai"></div>
<div id="detailModalFlight"></div>
<div id="detailModalHotel"></div>
@endsection

@push('scripts')
<script type="text/javascript">
  localStorage.removeItem("timer_pay")    
  let dataBookCancel = {}
  $.LoadingOverlay("show")
  var token = JSON.parse(localStorage.getItem('data_token'));
  var token_set = token['access_token']
  getListOrderbtc()
    function getListOrderbtc(){
     
      var url = fetch(mainurl + 'transaction/list?order=desc&page=1',{
          method: 'GET',
          headers: {
              'Accept': 'application/json',
              'Content-Type': 'application/json',
              'Authorization': 'Bearer ' + token_set,
          },
          }).then((response) => response.json()).then((responseData) => {
            var transaction = responseData;
            console.log(transaction)
            var tot_transaction = transaction.data
              if(transaction.message != "Data tidak ada!"){
                if(transaction.data != 0 || transaction.data != null){
                    for (var i = 0; i < tot_transaction.length; i++){
                      
                      var bookingInfo = {
                        book: "",
                        book_return: "",
                        name_allproduct: "",
                        class_allproduct: "",
                        no_allproduct: "",
                        name_allproduct_return: "",
                        class_allproduct_return: "",
                        no_allproduct_return: "",
                      }
                      
                      if (tot_transaction[i].details[0].product_type === "TRAIN") {
                        if(tot_transaction[i].details[1] == undefined){
                          var bookdelReturn = ""
                        }else{
                          var bookdelReturn = tot_transaction[i].details[1].booking_data.route_info[0].booking_code_gds
                        }

                        if (tot_transaction[i].payment_status !== "COMPLETED") {
                          bookingInfo.book = "Silakan lakukan pelunasan";
                          var bookdel = tot_transaction[i].details[0].booking_data.booking_code_gds
                        } else {
                          if (tot_transaction[i].details[0].booking_data.booking_code_gds) {
                            bookingInfo.book = tot_transaction[i].details[0].booking_data.booking_code_gds;
                          } else {
                            bookingInfo.book = "Tidak ada";
                          }
                        }

                        bookingInfo.name_allproduct = tot_transaction[i].details[0].booking_data.route_info[0].transporter_name;
                        bookingInfo.class_allproduct = tot_transaction[i].details[0].booking_data.route_info[0].transporter_class;
                        bookingInfo.no_allproduct = tot_transaction[i].details[0].booking_data.route_info[0].transporter_no;

                        if (tot_transaction[i].details[0].booking_data.route_type === "RoundTrip") {

                          if (tot_transaction[i].payment_status !== "COMPLETED") {
                            bookingInfo.book_return = "";
                            var bookdel = tot_transaction[i].details[0].booking_data.booking_code_gds
                          } else {
                            if (tot_transaction[i].details[1].booking_data.booking_code_gds) {
                              bookingInfo.book_return = tot_transaction[i].details[1].booking_data.booking_code_gds;
                            } else {
                              bookingInfo.book_return = "Tidak ada";
                            }
                          }

                          bookingInfo.name_allproduct_return = tot_transaction[i].details[1].booking_data.route_info[0].transporter_name;
                          bookingInfo.class_allproduct_return = tot_transaction[i].details[1].booking_data.route_info[0].transporter_class;
                          bookingInfo.no_allproduct_return = tot_transaction[i].details[1].booking_data.route_info[0].transporter_no;
                        }

                        
                      }

                      if (tot_transaction[i].details[0].product_type === "TRAIN_SPEC") {
                        if(tot_transaction[i].details[1] == undefined){
                          var bookdelReturn = ""
                        }else{
                          var bookdelReturn = tot_transaction[i].details[1].booking_data.route_info[0].booking_code
                        }

                        if (tot_transaction[i].payment_status !== "COMPLETED") {
                          bookingInfo.book = "Silakan lakukan pelunasan";
                          var bookdel = tot_transaction[i].details[0].booking_data.booking_code
                        } else {
                          if (tot_transaction[i].details[0].booking_data.booking_code) {
                            bookingInfo.book = tot_transaction[i].details[0].booking_data.booking_code;
                          } else {
                            bookingInfo.book = "Tidak ada";
                          }
                        }

                        bookingInfo.name_allproduct = tot_transaction[i].details[0].booking_data.route_info[0].transporter_name;
                        bookingInfo.class_allproduct = tot_transaction[i].details[0].booking_data.route_info[0].transporter_class;
                        bookingInfo.no_allproduct = tot_transaction[i].details[0].booking_data.route_info[0].transporter_no;

                        if (tot_transaction[i].details[0].booking_data.route_type === "RoundTrip") {
                          if (tot_transaction[i].payment_status !== "COMPLETED") {
                            bookingInfo.book_return = "";
                            var bookdel = tot_transaction[i].details[0].booking_data.booking_code
                          } else {
                            if (tot_transaction[i].details[1].booking_data.booking_code) {
                              bookingInfo.book_return = tot_transaction[i].details[1].booking_data.booking_code;
                            } else {
                              bookingInfo.book_return = "Tidak ada";
                            }
                          }

                          bookingInfo.name_allproduct_return = tot_transaction[i].details[1].booking_data.route_info[0].transporter_name;
                          bookingInfo.class_allproduct_return = tot_transaction[i].details[1].booking_data.route_info[0].transporter_class;
                          bookingInfo.no_allproduct_return = tot_transaction[i].details[1].booking_data.route_info[0].transporter_no;
                        }

                        
                      }

                      if (tot_transaction[i].details[0].product_type === "HOTEL") {
                        if (tot_transaction[i].payment_status !== "COMPLETED") {
                          bookingInfo.book = "Silakan lakukan pelunasan";
                          var bookdel = "1";
                        } else {
                          if (tot_transaction[i].details[0].booking_data.reservation_no) {
                            bookingInfo.book = tot_transaction[i].details[0].booking_data.reservation_no
                          } else {
                            bookingInfo.book = "Tidak ada";
                          }
                        }

                        bookingInfo.name_allproduct = "";
                        bookingInfo.class_allproduct = "";
                        bookingInfo.no_allproduct = "";

                      }

                      if (tot_transaction[i].details[0].product_type === "FLIGHT") {
                        if (tot_transaction[i].payment_status !== "COMPLETED") {
                          bookingInfo.book = "Silakan lakukan pelunasan";
                          var bookdel = tot_transaction[i].details[0].booking_data.booking_code
                        } else {
                          if (tot_transaction[i].details[0].booking_data.booking_code) {
                            bookingInfo.book = tot_transaction[i].details[0].booking_data.booking_code;
                          } else {
                            bookingInfo.book = "Tidak ada";
                          }
                        }

                        bookingInfo.name_allproduct = tot_transaction[i].details[0].booking_data.route_info[0].transporter_name;
                        bookingInfo.class_allproduct = tot_transaction[i].details[0].booking_data.route_info[0].transporter_class;
                        bookingInfo.no_allproduct = tot_transaction[i].details[0].booking_data.route_info[0].transporter_no;

                      }

                      if (tot_transaction[i].details[0].product_type === "MICE") {
                        if (tot_transaction[i].payment_status !== "COMPLETED") {
                          bookingInfo.book = "Silakan lakukan pelunasan";
                          var bookdel = tot_transaction[i].details[0].booking_data.booking_code
                        } else {
                          if (tot_transaction[i].details[0].booking_data.booking_code) {
                            bookingInfo.book = tot_transaction[i].details[0].booking_data.booking_code;
                          } else {
                            bookingInfo.book = "Tidak ada";
                          }
                        }

                        bookingInfo.name_allproduct = "";
                        bookingInfo.class_allproduct = "";
                        bookingInfo.no_allproduct = "";
                      }

                      if (tot_transaction[i].details[0].product_type === "PPOB") {
                        if (tot_transaction[i].payment_status !== "COMPLETED") {
                          bookingInfo.book = "Silakan lakukan pelunasan";
                          var bookdel = tot_transaction[i].details[0].booking_data.booking_code
                        } else {
                          if (tot_transaction[i].details[0].booking_data.booking_code) {
                            bookingInfo.book = tot_transaction[i].details[0].booking_data.booking_code;
                          } else {
                            bookingInfo.book = "Tidak ada";
                          }
                        }

                        bookingInfo.name_allproduct = "";
                        bookingInfo.class_allproduct = "";
                        bookingInfo.no_allproduct = "";
                      }
             
                      if(tot_transaction[i].details[0].product_type == "TRAIN"){
                        var mori = tot_transaction[i].details[0].booking_data.route_info[0].org
                        var mdes = tot_transaction[i].details[0].booking_data.route_info[0].des 
                        var product = `Kereta Regular`;
                        var products = "train_regular";
                      }else if(tot_transaction[i].details[0].product_type == "TRAIN_SPEC"){
                        var mori = tot_transaction[i].details[0].booking_data.route_info[0].org
                        var mdes = tot_transaction[i].details[0].booking_data.route_info[0].des 
                        var product = tot_transaction[i].details[0].booking_data.train_type;
                        var products = "train_wisata";
                      }else if(tot_transaction[i].details[0].product_type == "FLIGHT"){
                        var mori = tot_transaction[i].details[0].booking_data.route_info[0].org
                        var mdes = tot_transaction[i].details[0].booking_data.route_info[0].des 
                        var product = `Pesawat`;
                        var products = "flight";
                      }else if(tot_transaction[i].details[0].product_type == "HOTEL"){
                        var mori = ""
                        var mdes = ""
                        var product = `Hotel`;
                        var products = "hotel";
                      }else if(tot_transaction[i].details[0].product_type == "MICE"){
                        var mori = ""
                        var mdes = ""
                        var product = `MICE`;
                        var products = "mice";
                      }else if(tot_transaction[i].details[0].product_type == "PPOB"){
                        var mori = ""
                        var mdes = ""
                        var product = `Pulsa`;
                        var products = "pulsa";
                      }

                      if(tot_transaction[i].details[0].booking_data.booking_time_limit == null){
                        var time_limit = "Tidak Tersedia"
                      }else{
                        var time_limit = tot_transaction[i].details[0].booking_data.booking_time_limit
                      }

                      var name_order = tot_transaction[i].details[0].booking_data.booking_time_limit
                      var no = i +1
                      setorder = `<tr>
                      <td>`+ tot_transaction[i].id +`</td>
                      <td>`+ tot_transaction[i].invoice_number +`</td>
                      <td>`+ bookingInfo.book +`<br>`+ bookingInfo.book_return+`</td>
                      <td>`+ product +`</td>
                      <td class="text-right">Rp `+ formatPrice(tot_transaction[i].total) +`</td>
                      <td>`+ formatTransactionStatus(tot_transaction[i].transaction_status) +`</td>
                      <td>`+ formatPaymentStatus(tot_transaction[i].payment_status)+`</td>
                      <td class="text-nowrap">
                        <div class="dropdown">
                          <a href="javascript:void(0);" class="btn btn-sm color-main py-0" title="View/Edit" data-toggle="dropdown"><i class="fa fa-bars"></i></a>
                          <div class="dropdown-menu dropdown-menu-right">
                            <a id="detailsTrainBtc`+no+`"class="dropdown-item" href="javascript:void(0);" title="Details" onclick="toDetailsBtc(`+ no +`)"><i class="fa fa-info fa-fw mr-1"></i>Detail Transaksi</a>
                            <a id="pelunasanTrBtc`+no+`" class="dropdown-item" href="javascript:void(0);" title="Pelunasan" onclick="pelunasan(`+ tot_transaction[i].id +`); setTypeTrip(`+ no +`); toPayment()"><i class="fa fa-credit-card-alt fa-fw mr-1"></i>Pelunasan</a>
                            <a id="downloadTiket`+no+`" class="dropdown-item d-none" href="javascript:void(0);" title="Download Tiket" onclick="checkTiket(`+ no +`)"><i class="fa fa-download fa-fw mr-1 "></i>Download Tiket</a>
                            <a id="batalPesanan`+no+`" class="dropdown-item d-none" href="javascript:void(0);" data-toggle="modal" onclick="cancelBooking(`+ bookdel +`)" title="Delete"><i class="fa fa-ban fa-fw mr-1"></i>Batalkan Pesanan</a>
                            <a id="pilihKursiKrlRegBtc`+no+`" class="dropdown-item d-none" href="javascript:void(0);" title="Pilih" onclick="setCodeBook(`+ no +`); setSeatKrlReg()"><i class="fa fa-plus-circle fa-fw mr-1"></i>Ubah Kursi</a><input id="code_krl_reg`+no+`" value="`+ bookingInfo.book +`" hidden></input>
                              <input id="type_trip`+no+`" value="`+ tot_transaction[i].details[0].booking_data.route_type +`" hidden></input>
                              <input id="code_krl_reg`+no+`" value="`+ bookingInfo.book +`" hidden></input>
                              <input id="products`+no+`" value="`+ products +`" hidden></input>
                              <input id="name_product`+no+`" value="`+ bookingInfo.name_allproduct +` (`+bookingInfo.no_allproduct+`) - `+bookingInfo.class_allproduct+`" hidden></input>
                              <input id="name_product_return`+no+`" value="`+ bookingInfo.name_allproduct_return +` (`+bookingInfo.no_allproduct_return+`) - `+bookingInfo.class_allproduct_return+`" hidden></input>

                              <input id="transaction_id`+no+`" value="`+ tot_transaction[i].details[0].transaction_id +`" hidden></input>
                              <input id="train_id_0`+no+`" value="`+ tot_transaction[i].details[0].id +`" hidden></input>
                              <input id="code_krl_reg_return`+no+`" value="`+ bookingInfo.book_return +`" hidden></input>
                              <input id="time_limit`+no+`" value="`+ time_limit +`" hidden></input>
                              <input id="create_act`+no+`" value="`+ tot_transaction[i].created_act +`" hidden></input>
                              <input id="amount`+no+`" value="`+ tot_transaction[i].details[0].amount+`" hidden></input>
                              <input id="product_type`+no+`" value="`+ tot_transaction[i].details[0].product_type_id +`" hidden></input>
                              <input id="booking_id`+no+`" value="`+ tot_transaction[i].details[0].booking_id+`" hidden></input>
                              <input id="invoice`+no+`" value="`+ tot_transaction[i].invoice_number+`" hidden></input>
                              <input id="total`+no+`" value="Rp.`+ formatPrice(tot_transaction[i].total) +`" hidden></input>
                              <input id="trip`+no+`" value="`+ tot_transaction[i].details[0].booking_data.route_type+`" hidden></input>
                              <input id="product_type_name`+no+`" value="`+ product+`" hidden></input>
                              <input id="booking_status`+no+`" value="`+ tot_transaction[i].details[0].booking_data.booking_status +`" hidden></input>
                              <input id="m_origin`+no+`" value="`+ mori+`" hidden></input>
                              <input id="m_destination`+no+`" value="`+ mdes +`" hidden></input>
                              <input id="bookingCancelCode`+no+`" value="`+ bookdel +`" hidden></input>
                              <input id="bookingCancelCodeReturn`+no+`" value="`+ bookdelReturn +`" hidden></input>
                          </div>
                        </div>
                      </td>
                    </tr>
                    `;
                    $("#orderListPesawat").append(setorder);
                  
                    if(tot_transaction[i].details[0].product_type == "TRAIN"){
                        $("#pilihKursiKrlRegBtc"+ no ).removeClass('d-none')
                    }

                    if(tot_transaction[i].payment_status == "COMPLETED"){
                        $("#pelunasanTrBtc"+ no ).addClass('d-none')
                        $("#pilihKursiKrlRegBtc"+ no ).addClass('d-none')
                        $("#batalPesanan"+ no ).addClass('d-none')
                        $("#downloadTiket"+ no ).removeClass('d-none')
                    }
                  }

                }else{
                  setorder = `<tr>
                      <td colspan="9" class="text-center"> Tidak Ada Data Pemesanan!</td>
                    </tr>
                    `;
                    $("#orderListPesawat").append(setorder);
                }
              }else{
                    setorder = `<tr>
                                  <td colspan="9" class="text-center"> Tidak Ada Data Pemesanan!</td>
                              </tr>`;
                    $("#orderListPesawat").append(setorder);
              }
              $.LoadingOverlay("hide")
        });
    }
    
    function pelunasan(id){
      localStorage.setItem("transaction_id", JSON.stringify(id))
    }

    function setTypeTrip(id){
      var trip =  $("#type_trip"+ id).val();
      // console.log(trip)
      localStorage.setItem("type_trip", JSON.stringify(trip))
      
      var prod =  $("#products"+ id).val();
      localStorage.setItem("product_payment", JSON.stringify(prod))
    }

    function checkTiket(id){
      var type_trip =  $("#type_trip"+ id).val();
      var type_order_pay = $("#products"+ id).val();
        if(type_order_pay == "flight"){
          var code_flight = $("#code_krl_reg" + id).val()
            getTicketFlight(code_flight)
        }else if(type_order_pay == "train_regular"){
          var code_regular = $("#code_krl_reg" + id).val()
          var code_regular_return = $("#code_krl_reg_return"+id).val()
            if(type_trip == "OneWay"){
                getTicketTrain(code_regular)
            }else if(type_trip == "RoundTrip"){
                getTicketTrainDepart(code_regular)
                getTicketTrainReturn(code_regular_return)
            }
        }else if(type_order_pay == "train_wisata"){
          var code_wisata = $("#code_krl_reg" + id).val()
          var code_wisata_return = $("#code_krl_reg_return"+id).val()
            // if(type_trip == "OneWay"){
            //     getTicketTrain(code_wisata)
            // }else if(type_trip == "RoundTrip"){
            //     getTicketTrainDepart(code_wisata)
            //     getTicketTrainReturn(code_wisata_return)
            // }
        }else if(type_order_pay == "train_klb"){
          var code_klb = $("#code_krl_reg" + id).val()
          var code_klb_return = $("#code_krl_reg_return"+id).val()
          // if(type_trip == "OneWay"){
          //       getTicketTrain(code_klb)
          //   }else if(type_trip == "RoundTrip"){
          //       getTicketTrainDepart(code_klb)
          //       getTicketTrainReturn(code_klb_return)
          //   }
        }else if(type_order_pay == "train_istimewa"){
          var code_ist = $("#code_krl_reg" + id).val()
          var code_ist_return = $("#code_krl_reg_return"+id).val()
          // if(type_trip == "OneWay"){
          //       getTicketTrain(code_ist)
          //   }else if(type_trip == "RoundTrip"){
          //       getTicketTrainDepart(code_ist)
          //       getTicketTrainReturn(code_ist_return)
          //   }
        }else if(type_order_pay == "hotel"){
            var invoice_hotel = $("#invoice"+id).val()
            getVoucHotel(invoice_hotel)
        }else if(type_order_pay == "mice"){

        }
    }

    function toDetailsBtc(id){
        var id_transc = $("#transaction_id" + id).val()
        console.log(id_transc)
        var limit_t = $("#time_limit" + id).val()
        var id_train = $("#train_id_0" + id).val()
        var act = $("#create_act" + id).val()
        var harga = $("#amount" + id).val()
        var note = $("#note" + id).val()
        var product_t = $("#product_type" + id).val()
        var id_book = $("#booking_id" + id).val()
        var invoice = $("#invoice" + id).val()
        var total = $("#total" + id).val()
        var type_trip = $("#trip" + id).val()
        var booking = $("#code_krl_reg" + id).val()
        var booking_return = $("#code_krl_reg_return" + id).val()
        var product_type_n = $("#product_type_name" + id).val()
        var booking_stat = $("#booking_status" + id).val()
        var name = $("#name_product" + id).val()
        var name_return = $("#name_product_return" + id).val()
        var orign = $("#m_origin" + id).val()
        var destin = $("#m_destination" + id).val()
        var bookBan = $("#bookingCancelCode" + id).val()

        var token_set = token['access_token']
        var url = fetch(mainurl + 'transaction/list?id='+ id_transc +'order=desc&page=1',{
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
                if(type_trip == "RoundTrip"){
                  var codebookReturn = transaction.details[1].booking_data.booking_code_gds;
                  var arrival_date_return =  transaction.details[1].booking_data.route_info[0].arv_date
                  var depart_date_return =  transaction.details[1].booking_data.route_info[0].dep_date
                }else{
                  var codebookReturn = "";
                  var arrival_date_return = "";
                  var depart_date_return = "";
                }
                var arrival_date =  transaction.details[0].booking_data.route_info[0].arv_date
                var depart_date =  transaction.details[0].booking_data.route_info[0].dep_date
                // console.log(arrival_date)
                // console.log(depart_date)
                var booking_id = transaction.details[0].booking_id;
                var datahtml = `
                <div class="modal fade" id="modalDetailKai" data-keyboard="false" data-backdrop="static">
                    <div class="modal-dialog modal-xl ">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-colors-on">Detail Pesanan KAI Regular</h5>
                                <button type="button" class="close" data-dismiss="modal" onclick="enableLoading(); closeModalDetailsOrder()">×</button>
                            </div><br>
                            <div class="row col-12">
                              <div class="form-group col-12">
                                <div class="row col-12">
                                  <h5>`+ orign +`</h5>
                                      <h5 id="icon_rute" style="margin-left: 10px;">
                                          <i class="fa fa-arrow-right text-colors-on"></i>
                                      </h5> 
                                      <h5 id="icon_rute_return" class="d-none" style="margin-left: 10px;">
                                          <i class="fa fa-exchange text-colors-on"></i>
                                      </h5> 
                                  <h5 style="margin-left: 10px;">`+ destin +`</h5>
                                </div>
                                <div id="train_name_depart" class="row col-12">
                                    <img src="{{ asset('img/kai.jpg') }}" alt="" height="70" style="" class="col-1">
                                  <div class="col-5" style="margin-top: 25px;">
                                    <div>`+name+`</div>
                                  </div>
                                  <div class="col-6" style="margin-top: 25px;">
                                    <div>
                                      <b>`+orign+`</b> `+depart_date+`
                                        <b id="" style="margin-left: 10px;">
                                            <i class="fa fa-arrow-right text-colors-on"></i>
                                        </b> 
                                      <b style="margin-left: 10px;">`+destin+`</b> `+arrival_date+`
                                    </div>
                                  </div>
                                </div>
                                <div id="train_name_return" class="row col-12 d-none">
                                    <img src="{{ asset('img/kai.jpg') }}" alt="" height="70" style="" class="col-1">
                                  <div class="col-5" style="margin-top: 15px;">
                                    <div>`+name+` ~ <b>Departure</b></div>
                                    <div>`+name_return+` ~ <b>Return</b></div>
                                  </div>
                                  <div class="col-6" style="margin-top: 15px;">
                                    <div>
                                      <b>`+orign+`</b> `+depart_date+`
                                        <b id="" style="margin-left: 10px;">
                                            <i class="fa fa-arrow-right text-colors-on"></i>
                                        </b> 
                                      <b style="margin-left: 10px;">`+destin+`</b> `+arrival_date+`
                                    </div>
                                    <div>
                                      <b>`+destin+`</b> `+depart_date_return+`
                                        <b id="" style="margin-left: 10px;">
                                            <i class="fa fa-arrow-right text-colors-on"></i>
                                        </b> 
                                      <b style="margin-left: 10px;">`+orign+`</b> `+arrival_date_return+`
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                            <div class="row col-12">
                              <div class="form-group col-3" >
                                  <label for="type">Id Transaksi: </label> 
                                      <input id="transaction_id" type="text" class="form-control " name="" placeholder="" value="`+id_transc+`" readonly>
                                  <div class="valid-feedback">Valid.</div>
                                  <div class="invalid-feedback-adult text-colors-block"></div>
                              </div>
                              <div class="form-group col-3" >
                                  <label for="type">Type Perjalanan: </label>
                                      <input id="limit_time" type="text" class="form-control " name="" placeholder="" value="`+ type_trip +`" readonly>
                                  <div class="valid-feedback">Valid.</div>
                                  <div class="invalid-feedback-adult text-colors-block"></div>
                              </div>
                              <div class="form-group col-3" >
                                  <label for="type">Batas Waktu Pesanan: </label>
                                      <input id="limit_time" type="text" class="form-control " name="" placeholder="" value="`+ limit_t +`" readonly>
                                  <div class="valid-feedback">Valid.</div>
                                  <div class="invalid-feedback-adult text-colors-block"></div>
                              </div>
                              <div class="form-group col-3" >
                                  <label for="type">No. Invoice: </label> 
                                      <input id="invoice" type="text" class="form-control " name="" placeholder="" value="`+invoice+`" readonly>
                                  <div class="valid-feedback">Valid.</div>
                                  <div class="invalid-feedback-adult text-colors-block"></div>
                              </div>
                              <div class="form-group col-3" >
                                  <label for="type">Kode Booking: </label>
                                      <input id="code_book_inp_depart" type="text" class="form-control " name="" placeholder="" value="`+booking+`" readonly>
                                      <input id="code_book_inp_return" type="text" class="form-control d-none" name="" placeholder="" value="`+booking_return+`" readonly>
                                  <div class="valid-feedback">Valid.</div>
                                  <div class="invalid-feedback-adult text-colors-block"></div>
                              </div>
                              <div class="form-group col-3" >
                                  <label for="type">Total Harga Pesanan: </label>
                                      <input id="harga_tot" type="text" class="form-control " name="" placeholder="" value="`+ total +`" readonly>
                                  <div class="valid-feedback">Valid.</div>
                                  <div class="invalid-feedback-adult text-colors-block"></div>
                              </div><br><br><br><br>
                              <input id="act" type="text" class="form-control " name="" placeholder="" value="`+ act +`" hidden>
                              <input id="train_id" type="text" class="form-control " name="" placeholder="" value="`+ id_train +`" hidden>
                              <input id="book_id" type="text" class="form-control " name="" placeholder="" value="`+ id_book +`" hidden>
                              <input id="type_trips" type="text" class="form-control " name="" placeholder="" value="`+ type_trip +`" hidden>
                              <input id="bookCancelKaiReg" type="text" class="form-control" name="" placeholder="" value="`+ bookBan +`" hidden>
                              <input id="bookCancelReturnKaiReg" type="text" class="form-control" name="" placeholder="" value="`+ codebookReturn +`" hidden>
                            </div><hr>
                              <div class="modal-footer">
                                <button id="bookingCancel" type="button" class="btn btn-danger" data-dismiss="modal" onclick="enableLoading(); cancelBooking()"><i class="fa fa-ban mr-1"></i>Batalkan Pesanan</button>
                                <button id="bookingCancelReturn" type="button" class="btn btn-danger d-none" data-dismiss="modal" onclick="enableLoading(); cancelBookingReturn()"><i class="fa fa-ban mr-1"></i>Batalkan Pesanan</button>
                                <button id="closeModalSeatFlight" type="button" class="btn btn-light" data-dismiss="modal" onclick="enableLoading(); closeModalDetailsOrder()"><i class="fa fa-times mr-1"></i>Kembali</button>
                              </div>
                        </div>
                    </div>
                </div> `
                $("#detailModalKai").append(datahtml)
                $("#modalDetailKai").modal('show')
                
                  if(type_trip == "RoundTrip"){
                    $("#code_book_inp_return").removeClass('d-none')
                    $("#train_name_return").removeClass('d-none')
                    $("#train_name_depart").addClass('d-none')
                    $("#bookingCancelReturn").removeClass('d-none')

                    $("#icon_rute_return").removeClass('d-none')
                    $("#icon_rute").addClass('d-none')
                    $("#bookingCancel").addClass('d-none')
                  }
                
            }else if(transaction.details[0].product_type == "HOTEL"){
                  var name_hotel = transaction.details[0].booking_data.hotel_data.hotel_name;
                  var address_hotel = transaction.details[0].booking_data.hotel_data.hotel_address;
                  var pay_status = transaction.payment_status;
                  var trans_status = transaction.transaction_status;
                   var datahtml = `
                 <div class="modal fade" id="modalDetailFlight" data-keyboard="false" data-backdrop="static">
                     <div class="modal-dialog modal-xl ">
                         <div class="modal-content">
                             <div class="modal-header">
                                 <h5 class="modal-title text-colors-on">Detail Pesanan Hotel</h5>
                                 <button type="button" class="close" data-dismiss="modal" onclick="enableLoading(); closeModalDetailsOrder()">×</button>
                             </div><br>
                             <div class="row col-12">
                             <div class="form-group col-12">
                                <div class="row col-12">
                                  <h5 class="h5 font-weight-normal text-uppercase "> <span class="fa fa-hotel fa-2x mr-2 text-colors-on"></span><b> `+name_hotel+` </b></h5>
                                </div>
                                <div class="col-12"> 
                                  <b><span class="fa fa-map-marker mr-1"></span> `+ address_hotel +`</b>
                                </div>
                              </div><br><br>
                               <div class="form-group col-3" >
                                   <label for="type">Id Transaksi: </label> 
                                       <input id="transaction_id" type="text" class="form-control " name="" placeholder="" value="`+id_transc+`" readonly>
                                   <div class="valid-feedback">Valid.</div>
                                   <div class="invalid-feedback-adult text-colors-block"></div>
                               </div>
                               <div class="form-group col-3" >
                                   <label for="type">Batas Waktu: </label>
                                       <input id="limit_time" type="text" class="form-control " name="" placeholder="" value="`+ limit_t +`" readonly>
                                   <div class="valid-feedback">Valid.</div>
                                   <div class="invalid-feedback-adult text-colors-block"></div>
                               </div>
                               <div class="form-group col-3" >
                                   <label for="type">No. Invoice: </label> 
                                       <input id="invoice" type="text" class="form-control " name="" placeholder="" value="`+invoice+`" readonly>
                                   <div class="valid-feedback">Valid.</div>
                                   <div class="invalid-feedback-adult text-colors-block"></div>
                               </div>
                               <div class="form-group col-3" >
                                   <label for="type">Status Pembayaran: </label><br>
                                   `+formatPaymentStatus(pay_status)+`
                                   <div class="valid-feedback">Valid.</div>
                                   <div class="invalid-feedback-adult text-colors-block"></div>
                               </div>
                               <div class="form-group col-3" >
                                   <label for="type">Status Transaksi: </label><br>
                                   `+formatTransactionStatus(trans_status)+`
                                   <div class="valid-feedback">Valid.</div>
                                   <div class="invalid-feedback-adult text-colors-block"></div>
                               </div>
                               <div class="form-group col-3" >
                                   <label for="type">Kode Booking: </label>
                                       <input id="code_book_inp_depart" type="text" class="form-control " name="" placeholder="" value="`+booking+`" readonly>
                                   <div class="valid-feedback">Valid.</div>
                                   <div class="invalid-feedback-adult text-colors-block"></div>
                               </div>
                               <div class="form-group col-3" >
                                   <label for="type">Total Harga Pesanan: </label>
                                       <input id="harga_tot" type="text" class="form-control " name="" placeholder="" value="`+ total +`" readonly>
                                   <div class="valid-feedback">Valid.</div>
                                   <div class="invalid-feedback-adult text-colors-block"></div>
                               </div><br>
                               <input id="act" type="text" class="form-control " name="" placeholder="" value="`+ act +`" hidden>
                               <input id="train_id" type="text" class="form-control " name="" placeholder="" value="`+ id_train +`" hidden>
                               <input id="book_id" type="text" class="form-control " name="" placeholder="" value="`+ id_book +`" hidden>
                               <input id="type_trips" type="text" class="form-control " name="" placeholder="" value="`+ type_trip +`" hidden>

                               <input id="bookCancelflight" type="text" class="form-control " name="" placeholder="" value="`+ codebook +`" hidden>
                               <input id="bookCancelReturnflight" type="text" class="form-control " name="" placeholder="" value="`+ codebookReturn +`" hidden>
                             </div>
                             <div class="modal-footer">
                               <button id="closeModalSeatFlight" type="button" class="btn btn-light" data-dismiss="modal" onclick="enableLoading(); closeModalDetailsOrder()"><i class="fa fa-times mr-1"></i>Kembali</button>
                             </div>
                         </div>
                     </div>
                 </div> `
                 $("#detailModalFlight").append(datahtml)
                 $("#modalDetailFlight").modal('show') 

           }else if(transaction.details[0].product_type == "FLIGHT"){
                   
                    var datahtml = `
                  <div class="modal fade" id="modalDetailFlight" data-keyboard="false" data-backdrop="static">
                      <div class="modal-dialog modal-xl ">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title text-colors-on">Detail Pesanan Pesawat</h5>
                                  <button type="button" class="close" data-dismiss="modal" onclick="enableLoading(); closeModalDetailsOrder()">×</button>
                              </div><br>
                              <div class="row col-12">
                                <div class="form-group col-3" >
                                    <label for="type">Id Transaksi: </label> 
                                        <input id="transaction_id" type="text" class="form-control " name="" placeholder="" value="`+id_transc+`" readonly>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback-adult text-colors-block"></div>
                                </div>
                                <div class="form-group col-3" >
                                    <label for="type">Batas Waktu: </label>
                                        <input id="limit_time" type="text" class="form-control " name="" placeholder="" value="`+ limit_t +`" readonly>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback-adult text-colors-block"></div>
                                </div>
                                <div class="form-group col-3" >
                                    <label for="type"> Pesawat: </label>
                                        <input id="" type="text" class="form-control" name="" placeholder="" value="`+name+`" readonly>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback-adult text-colors-block"></div>
                                </div>
                                <div class="form-group col-3" >
                                    <label for="type">No. Invoice: </label> 
                                        <input id="invoice" type="text" class="form-control " name="" placeholder="" value="`+invoice+`" readonly>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback-adult text-colors-block"></div>
                                </div>
                                <div class="form-group col-3" >
                                    <label for="type">Type Penerbangan: </label>
                                        <input id="code_book_inp_depart" type="text" class="form-control " name="" placeholder="" value="`+type_trip+`" readonly>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback-adult text-colors-block"></div>
                                </div>
                                <div class="form-group col-3" >
                                    <label for="type">Kode Booking: </label>
                                        <input id="code_book_inp_depart" type="text" class="form-control " name="" placeholder="" value="`+booking+`" readonly>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback-adult text-colors-block"></div>
                                </div>
                                <div class="form-group col-3" >
                                    <label for="type">Total Harga Pesanan: </label>
                                        <input id="harga_tot" type="text" class="form-control " name="" placeholder="" value="`+ total +`" readonly>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback-adult text-colors-block"></div>
                                </div><br>
                                <input id="act" type="text" class="form-control " name="" placeholder="" value="`+ act +`" hidden>
                                <input id="train_id" type="text" class="form-control " name="" placeholder="" value="`+ id_train +`" hidden>
                                <input id="book_id" type="text" class="form-control " name="" placeholder="" value="`+ id_book +`" hidden>
                                <input id="type_trips" type="text" class="form-control " name="" placeholder="" value="`+ type_trip +`" hidden>

                                <input id="bookCancelflight" type="text" class="form-control " name="" placeholder="" value="`+ codebook +`" hidden>
                                <input id="bookCancelReturnflight" type="text" class="form-control " name="" placeholder="" value="`+ codebookReturn +`" hidden>
                              </div>
                              <div class="modal-footer">
                                <button id="closeModalSeatFlight" type="button" class="btn btn-light" data-dismiss="modal" onclick="enableLoading(); closeModalDetailsOrder()"><i class="fa fa-times mr-1"></i>Kembali</button>
                              </div>
                          </div>
                      </div>
                  </div> `
                  $("#detailModalFlight").append(datahtml)
                  $("#modalDetailFlight").modal('show') 

            }else if(transaction.details[0].product_type == "TRAIN_SPEC"){
              var codebook = transaction.details[0].booking_data.booking_code_gds;
                if(type_trip == "RoundTrip"){
                  var codebookReturn = transaction.details[1].booking_data.booking_code_gds;
                  var arrival_date_return =  transaction.details[1].booking_data.route_info[0].arv_date
                  var depart_date_return =  transaction.details[1].booking_data.route_info[0].dep_date
                }else{
                  var codebookReturn = "";
                  var arrival_date_return = "";
                  var depart_date_return = "";
                }
                var arrival_date =  transaction.details[0].booking_data.route_info[0].arv_date
                var depart_date =  transaction.details[0].booking_data.route_info[0].dep_date
                // console.log(arrival_date)
                // console.log(depart_date)
                var booking_id = transaction.details[0].booking_id;
                var datahtml = `
                  <div class="modal fade" id="modalDetailKai" data-keyboard="false" data-backdrop="static">
                      <div class="modal-dialog modal-xl">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h5 class="modal-title text-colors-on">Detail Pesanan Kereta</h5>
                                  <button type="button" class="close" data-dismiss="modal" onclick="enableLoading(); closeModalDetailsOrder()">×</button>
                              </div><br>
                              <div class="row col-12">
                                <div class="form-group col-12">
                                  <div class="row col-12">
                                    <h5>`+orign+`</h5>
                                        <h5 id="icon_rute" style="margin-left: 10px;">
                                            <i class="fa fa-arrow-right text-colors-on"></i>
                                        </h5> 
                                        <h5 id="icon_rute_return" class="d-none" style="margin-left: 10px;">
                                            <i class="fa fa-exchange text-colors-on"></i>
                                        </h5> 
                                    <h5 style="margin-left: 10px;">`+destin+`</h5>
                                  </div>
                                <div id="train_name_depart" class="row col-12">
                                    <img src="{{ asset('img/kai.jpg') }}" alt="" height="70" style="" class="col-1">
                                    <div class="col-5" style="margin-top: 25px;">
                                      <div>`+getNameWagon(transaction.details[1].booking_data.list_wagon)+`</div>
                                    </div>
                                    <div class="col-6" style="margin-top: 25px;">
                                      <div>
                                        <b>`+orign+`</b>
                                          <b id="" style="margin-left: 10px;">
                                              <i class="fa fa-arrow-right text-colors-on"></i>
                                          </b> 
                                        <b style="margin-left: 10px;">`+destin+`</b> 
                                      </div>
                                    </div>
                                  </div>
                                  <div id="train_name_return" class="row col-12 d-none">
                                      <img src="{{ asset('img/kai.jpg') }}" alt="" height="70" style="" class="col-1">
                                    <div class="col-5" style="margin-top: 15px;">
                                      <div>`+getNameWagon(transaction.details[1].booking_data.list_wagon)+` ~ <b>Departure</b></div>
                                      <div>`+getNameWagon(transaction.details[1].booking_data.list_wagon)+` ~ <b>Return</b></div>
                                    </div>
                                    <div class="col-6" style="margin-top: 15px;">
                                      <div>
                                        <b>`+orign+`</b> 
                                          <b id="" style="margin-left: 10px;">
                                              <i class="fa fa-arrow-right text-colors-on"></i>
                                          </b> 
                                        <b style="margin-left: 10px;">`+destin+`</b>
                                      </div>
                                      <div>
                                        <b>`+destin+`</b> 
                                          <b id="" style="margin-left: 10px;">
                                              <i class="fa fa-arrow-right text-colors-on"></i>
                                          </b> 
                                        <b style="margin-left: 10px;">`+orign+`</b>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="row col-12">
                                <div class="form-group col-3" >
                                    <label for="type">Id Transaksi: </label> 
                                        <input id="transaction_id" type="text" class="form-control " name="" placeholder="" value="`+id_transc+`" readonly>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback-adult text-colors-block"></div>
                                </div>
                                <div class="form-group col-3" >
                                    <label for="type">Batas Waktu: </label>
                                        <input id="limit_time" type="text" class="form-control " name="" placeholder="" value="`+ limit_t +`" readonly>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback-adult text-colors-block"></div>
                                </div>
                                <div class="form-group col-3" >
                                    <label for="type">Jenis Pesanan: </label>
                                        <input id="type_produkt" type="text" class="form-control " name="" placeholder="" value="`+product_type_n+`" readonly>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback-adult text-colors-block"></div>
                                </div>
                                <div class="form-group col-3" >
                                    <label for="type">Status Booking: </label>
                                        <input id="harga_s" type="text" class="form-control " name="" placeholder="" value="`+booking_stat+`" readonly>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback-adult text-colors-block"></div>
                                </div>
                                <div class="form-group col-3" >
                                    <label for="type">No. Invoice: </label> 
                                        <input id="invoice" type="text" class="form-control " name="" placeholder="" value="`+invoice+`" readonly>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback-adult text-colors-block"></div>
                                </div>
                                <div class="form-group col-3" >
                                    <label for="type">Kode Booking: </label>
                                        <input id="code_book_inp_depart" type="text" class="form-control " name="" placeholder="" value="`+booking+`" readonly>
                                        <input id="code_book_inp_return" type="text" class="form-control d-none" name="" placeholder="" value="" readonly>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback-adult text-colors-block"></div>
                                </div>
                                <div class="form-group col-3" >
                                    <label for="type">Total Harga Pesanan: </label>
                                        <input id="harga_tot" type="text" class="form-control " name="" placeholder="" value="`+ total +`" readonly>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback-adult text-colors-block"></div>
                                </div><br>
                                <input id="act" type="text" class="form-control " name="" placeholder="" value="`+ act +`" hidden>
                                <input id="train_id" type="text" class="form-control " name="" placeholder="" value="`+ id_train +`" hidden>
                                <input id="book_id" type="text" class="form-control " name="" placeholder="" value="`+ id_book +`" hidden>
                                <input id="type_trips" type="text" class="form-control " name="" placeholder="" value="`+ type_trip +`" hidden>
                                <input id="bookCancelKaiWis" type="text" class="form-control" name="" placeholder="" value="`+ bookBan +`" hidden>
                                <input id="bookCancelReturnKaiWis" type="text" class="form-control" name="" placeholder="" value="`+ codebookReturn +`" hidden>
                              </div>
                              <div class="modal-footer">
                                <button id="closeModalSeatFlight" type="button" class="btn btn-light" data-dismiss="modal" onclick="enableLoading(); closeModalDetailsOrder()"><i class="fa fa-times mr-1"></i>Kembali</button>
                              </div>
                          </div>
                      </div>
                  </div> `
                  $("#detailModalKai").append(datahtml)
                  $("#modalDetailKai").modal('show') 

                  if(type_trip == "RoundTrip"){
                    $("#code_book_inp_return").removeClass('d-none')
                    $("#train_name_return").removeClass('d-none')
                    $("#train_name_depart").addClass('d-none')

                    $("#icon_rute_return").removeClass('d-none')
                    $("#icon_rute").addClass('d-none')
                  }
            }
        });
    }

    function closeModalDetailsOrder(){
      $.LoadingOverlay("hide")
      $("#modalDetailKai").on("hidden.bs.modal", function(e) {
          $("#modalDetailKai").replaceWith(`<div id="detailModalKai"></div>`)
      })

      $("#modalDetailFlight").on("hidden.bs.modal", function(e) {
          $("#modalDetailFlight").replaceWith(`<div id="detailModalFlight"></div>`)
      })
    }

    function toDetailsFl(){

    // window.location.href = "/detailsorder/btc/flight";

    }

    function toPayment(){
      
      window.location.href = "/payment_method";

    }
    function setCodeBook(id){
        var code_krl_reg =  $("#code_krl_reg"+ id).val();
        localStorage.setItem("code_book_krl_reg", JSON.stringify(code_krl_reg))

        var products = "train_regular"
        localStorage.setItem("product_payment", JSON.stringify(products))
    }

    function setSeatKrlReg(){
        $.LoadingOverlay("show")
        window.location.href = "/kai/seat/test";
    }

    function cancelBooking(){
      var booking_code = $("#bookCancelKaiReg").val()
      dataBookCancel.d_book = booking_code
      // $("#orderListPesawat").empty()
      // getListOrderbtc()
      closeModalDetailsOrder()
      $.LoadingOverlay("hide")
      var datahtml = `
        <div class="modal fade" id="modalBookConfirm" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-md modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-colors-block">Batal Booking Confirmation</h5>
                        <button type="button" class="close" data-dismiss="modal" onclick="closeModalConfirmCancelBook()">×</button>
                    </div><br>
                    <center><b>Anda yakin akan membatalkan pesanan? </b></center>
                    <br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" id="bottonBook" onclick="enableLoading(); cancelBook()"><i class="fa fa-ban mr-1" ></i>Ya</button>
                        <button type="button" class="btn btn-light" data-dismiss="modal" onclick="closeModalConfirmCancelBook()"><i class="fa fa-times mr-1"></i>Kembali</button>
                    </div>
                </div>
            </div>
        </div> `;
      $("#modalConfirmCancel").append(datahtml)
      $("#modalBookConfirm").modal('show')
    }

    function cancelBookingReturn(){
      var booking_code = $("#bookCancelKaiReg").val()
      var booking_code_return = $("#bookCancelReturnKaiReg").val()
      dataBookCancel.d_book = booking_code
      dataBookCancel.r_book = booking_code_return
      // $("#orderListPesawat").empty()
      // getListOrderbtc()
      closeModalDetailsOrder()
      
      console.log(booking_code)
      $.LoadingOverlay("hide")
      var datahtml = `
        <div class="modal fade" id="modalBookConfirm" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-md modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-colors-block">Batal Booking Confirmation</h5>
                        <button type="button" class="close" data-dismiss="modal" onclick="closeModalConfirmCancelBook()">×</button>
                    </div><br>
                    <center><b>Anda yakin akan membatalkan pesanan? </b></center>
                    <br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" id="bottonBook" onclick="enableLoading(); cancelBookReturn(); cancelBookReturn2()"><i class="fa fa-ban mr-1" ></i>Ya</button>
                        <button type="button" class="btn btn-light" data-dismiss="modal" onclick="closeModalConfirmCancelBook()"><i class="fa fa-times mr-1"></i>Kembali</button>
                    </div>
                </div>
            </div>
        </div> `;
      $("#modalConfirmCancel").append(datahtml)
      $("#modalBookConfirm").modal('show')
    }
    function closeModalConfirmCancelBook(){

      var booking_code = $("#bookCancelKaiReg").val()
      console.log(booking_code)
      $.LoadingOverlay("hide")
      $("#modalBookConfirm").on("hidden.bs.modal", function(e) {
          $("#modalBookConfirm").replaceWith(`<div id="modalConfirmCancel"></div>`)
      })

    }
    function cancelBook(){
      // console.log( dataBookCancel.d_book )
      var url = fetch(mainurl + 'train/cancel_booking',{
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token_set,
        },
      body: JSON.stringify({
        "booking_code": dataBookCancel.d_book
      }),
      }).then((response) => response.json()).then((responseData) => {
        console.log(responseData)
        if(responseData.success == true){
          $("#orderListPesawat").empty()
          getListOrderbtc()
          toastr.success(responseData.message, "Success")
          $.LoadingOverlay("hide")
        }else{
          $("#orderListPesawat").empty()
          getListOrderbtc()
          toastr.error(responseData.message, "Error")
          $.LoadingOverlay("hide")
        }
        
      })

    }

    function cancelBookReturn(){
      $.LoadingOverlay("hide")

      var url = fetch(mainurl+'train/cancel_booking',{
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token_set,
        },
      body: JSON.stringify({
        "booking_code": dataBookCancel.d_book
      }),
      }).then((response) => response.json()).then((responseData) => {
        console.log(responseData)
        if(responseData.success == true){
          // $("#orderListPesawat").empty()
          // getListOrderbtc()
          // toastr.success(responseData.message, "Success")
          // $.LoadingOverlay("hide")
        }else{
          // $("#orderListPesawat").empty()
          // getListOrderbtc()
          // toastr.error(responseData.message, "Error")
          // $.LoadingOverlay("hide")
        }
        
      })
    }

    function cancelBookReturn2(){
      $.LoadingOverlay("hide")

      var url = fetch(mainurl+'train/cancel_booking',{
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer' + token_set,
        },
      body: JSON.stringify({
        "booking_code": dataBookCancel.r_book
      }),
      }).then((response) => response.json()).then((responseData) => {
        console.log(responseData)
        if(responseData.success == true){
          $("#orderListPesawat").empty()
          getListOrderbtc()
          toastr.success(responseData.message, "Success")
          $.LoadingOverlay("hide")
        }else{
          $("#orderListPesawat").empty()
          getListOrderbtc()
          toastr.error(responseData.message, "Error")
          $.LoadingOverlay("hide")
        }
        
      })
    }


    </script>
  @endpush