@extends('layout.app')

@section('content')
<div class="container-fluid mt-100 main-font">
  <div class="row d-flex flex-column flex-md-row" id="body-sidemenu">
    <div id="main-content" class="col with-fixed-sidebar pb-5 pt-3 max-auto">
      <div class="container">
        <div class="row ">
        <div class="col-12 col-md-3 pt-3">
              @include('component.sidebar_order')
        </div>
        <div class="col-12 col-md-9 pt-3">
          <!-- <h1 class="h5 font-weight-normal text-center text-uppercase text-colors-on"> <b>List Orders</b> </h5><br> -->
          
          <div class="card shadow p-3 mb-5 bg-body rounded">
            <!-- <div class="card-body"> -->
          <div class="row mb-3">
            <div class="col-12 col-md-8 col-lg-9 col-xl-9">
            <label for="" class="text-colors-on"><b>Data Pesanan KAI Regular</b></label>
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
          <!-- <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body px-3 py-1 ">
                  <form class="form-inline" action="javascript:void(0);">
                    <label for="sel1" class="mt-2 mt-sm-0 mr-sm-2">Status Pembayaran:</label>
                    <select class="form-control form-control-sm mr-sm-2 bg-transparent border-0 px-0" id="sel1">
                      <option>All</option>
                      <option>Not Paid</option>
                      <option>Paid Off</option>
                      <option>Expired</option>
                    </select>
                  </form>
                </div>
                <div class="card-body px-3 py-1">
                  <form class="form-inline" action="javascript:void(0);">
                    <label for="sel1" class="mt-2 mt-sm-0 mr-sm-2">Id Pengguna:</label>
                    <select class="form-control form-control-sm mr-sm-2 bg-transparent border-0 px-0" id="sel1">
                      <option>All</option>
                      <option>Not Paid</option>
                      <option>Paid Off</option>
                      <option>Expired</option>
                    </select>
                  </form>
                </div>
                <div class="card-body px-3 py-1">
                  <form class="form-inline" action="javascript:void(0);">
                    <label for="sel1" class="mt-2 mt-sm-0 mr-sm-2">Jenis Pesanan:</label>
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
          </div> -->
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
                  <tbody class="text-nowrap" id="orderListBtc">
            
                  </tbody>
                </table>
                <hr>
                    <nav aria-label="Page navigation" class="bg-white ">
                        <ul class="pagination" id="total_pages">
                            <input type="text" id="no_page_table" value="1" hidden>
                        </ul>
                    </nav>
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
<div id="modalDetailKaiReg"></div>
@endsection

@push('scripts')
<script type="text/javascript">
  $.LoadingOverlay("show")
  $("#kaiRegAdmin").addClass('text-warning')
  $("#kaiWisataAdmin").removeClass('text-warning')
  $("#kaiLuarBiasaAdmin").removeClass('text-warning')
  $("#KaiIstimewaAdmin").removeClass('text-warning')
  $("#pesawatOrderAdmin").removeClass('text-warning')
  $("#miceOrderAdmin").removeClass('text-warning')
  let dataBookCancel = {}
  getListOrderKaiRegular()
   
    var max_data = 1000;
    var pages = max_data/10;
    // console.log(pages)
        for(var i = 0; i <= 11; i++){
            var n = i+1
            if (i == 0) {
                var paging = `<li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">&laquo;</span>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>`;
                $("#total_pages").append(paging);
            continue;
            }
            if (i == 11) {
                var paging = `<li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>`;
                $("#total_pages").append(paging);
            continue;
            }
            var paging = `<li class="page-item" id="pilihPage`+i+` onclick="selectPage(`+n+`)"><a class="page-link">`+i+`</a> <input id="npage`+n+`" value=`+n+` hidden></input></li>`;
            $("#total_pages").append(paging);

            // $("#pilihPage"+n).on('click', function(){
            // var nomer_pages = $("#npage" +n).val()
            // console.log("tes")
            // $("#no_page_table").val(nomer_pages-1)
            // })
        }
    function getListOrderKaiRegular(){
        // $.LoadingOverlay("hide")
      var token = JSON.parse(localStorage.getItem('data_token'));
      var book_code = JSON.parse(localStorage.getItem('code_book_krl_reg'));
      var token_set = token['access_token']
      var no_page_toApi = $("#no_page_table").val()
      console.log(no_page_toApi)
      var url = fetch(mainurl+'transaction/list?order=desc&per_page=100',{
          method: 'GET',
          headers: {
              'Accept': 'application/json',
              'Content-Type': 'application/json',
              'Authorization': 'Bearer ' + token_set,
          },
        }).then((response) => response.json()).then((responseData) => {
          var transaction = responseData;
          console.log(transaction)
          $.LoadingOverlay("hide")
          var tot_transaction = transaction.data
          console.log(tot_transaction)
            if(transaction.message != "Data tidak ada!"){
              if(transaction.data != 0 || transaction.data != null){
                  for (var i = 0; i < tot_transaction.length; i++){ 
                    if(tot_transaction[i].details[0].product_type == "TRAIN"){
                      if(tot_transaction[i].details[0].booking_data.train_type == "Regular"){
                        
                        if(tot_transaction[i].details[0].booking_data.booking_code_gds !=null){
                            if (tot_transaction[i].payment_status == "COMPLETED") {
                                var book = tot_transaction[i].details[0].booking_data.booking_code_gds;
                            } else {
                                var book = "Silakan lakukan pelunasan";
                            }
                        } else {
                          var book = "Tidak Ada";
                        }

                        if(tot_transaction[i].details[0].booking_data.route_type != "OneWay"){
                          var name_allproduct_return = tot_transaction[i].details[1].booking_data.route_info[0].transporter_name;
                          var class_allproduct_return = tot_transaction[i].details[1].booking_data.route_info[0].transporter_class;
                          var no_allproduct_return = tot_transaction[i].details[1].booking_data.route_info[0].transporter_no;

                          var retrun_arv_time = tot_transaction[i].details[1].booking_data.route_info[0].arv_date
                          var retrun_dpar_time = tot_transaction[i].details[1].booking_data.route_info[0].dep_date
                          var book_return = tot_transaction[i].details[1].booking_data.booking_code_gds;
                            if (tot_transaction[i].payment_status == "COMPLETED") {
                                var book_return = tot_transaction[i].details[1].booking_data.booking_code_gds;
                            } else {
                                var book_return = "";
                            }
                        }else{
                          var retrun_dpar_time = ""
                          var retrun_arv_time =""
                          var book_return = ""

                          var name_allproduct_return = ""
                          var class_allproduct_return = ""
                          var no_allproduct_return = ""
                        }

                        var name_allproduct = tot_transaction[i].details[0].booking_data.route_info[0].transporter_name;
                        var class_allproduct = tot_transaction[i].details[0].booking_data.route_info[0].transporter_class;
                        var no_allproduct = tot_transaction[i].details[0].booking_data.route_info[0].transporter_no;
                        var date_limit = reformatDateList(tot_transaction[i].details[0].booking_data.booking_time_limit);
                        var date_arv_train = reformatDateList(tot_transaction[i].details[0].booking_data.route_info[0].arv_date);
                        var date_dpt_train = reformatDateList(tot_transaction[i].details[0].booking_data.route_info[0].dep_date);
                        var date_arv_train_return = reformatDateList(retrun_arv_time);
                        var date_dpt_train_return = reformatDateList(retrun_dpar_time);
                        var no = i+1
                        var setorder = `<tr>
                        <td>`+ tot_transaction[i].id +`</td>
                        <td>`+ tot_transaction[i].invoice_number +`</td>
                        <td>`+ book +`<br>`+ book_return+`</td>
                        <td>Kai Regular</td>
                        <td class="text-right">Rp. `+ formatPrice(tot_transaction[i].total) +`</td>
                        <td>`+ formatTransactionStatus(tot_transaction[i].transaction_status) +`</td>
                        <td>`+ formatPaymentStatus(tot_transaction[i].payment_status)+`</td>
                          <td class="text-nowrap">
                            <div class="dropdown">
                              <a href="javascript:void(0);" class="btn btn-sm color-main py-0" title="View/Edit" data-toggle="dropdown"><i class="fa fa-bars"></i></a>
                              <div class="dropdown-menu dropdown-menu-right">
                                <a id="detailsTrainWis"class="dropdown-item" href="javascript:void(0);" title="Details" onclick="toDetailsTr(`+no+`)"><i class="fa fa-info fa-fw mr-1"></i>Details Train</a>
                                <a id="pelunasanTrBtc`+no+`" class="dropdown-item" href="javascript:void(0);" title="Pelunasan" onclick="pelunasan(`+ tot_transaction[i].id +`); setTypeTrip(`+ no +`); toPayment()"><i class="fa fa-credit-card-alt fa-fw mr-1"></i>Pelunasan</a>
                                <a id="downloadTiket`+no+`" class="dropdown-item d-none" href="javascript:void(0);" title="Download Tiket" onclick="checkTiket(`+ no +`)"><i class="fa fa-download fa-fw mr-1 "></i>Download Tiket</a>
                                <a id="pilihKursiKrlRegBtc`+no+`" class="dropdown-item d-none" href="javascript:void(0);" title="Pilih" onclick="setCodeBook(`+ no +`); setSeatKrlReg()"><i class="fa fa-plus-circle fa-fw mr-1"></i>Ubah Kursi</a>
                                <input id="transaction_id`+no+`" value="`+ tot_transaction[i].details[0].transaction_id +`" hidden></input>
                                <input id="train_id_0`+no+`" value="`+ tot_transaction[i].details[0].id +`" hidden></input>
                                <input id="code_krl_reg`+no+`" value="`+ book +`" hidden></input>
                                <input id="code_krl_reg_return`+no+`" value="`+ book_return +`" hidden></input>
                                <input id="time_limit`+no+`" value="`+ date_limit.date +` - `+date_limit.time+`" hidden></input>
                                <input id="create_act`+no+`" value="`+ tot_transaction[i].created_act +`" hidden></input>
                                <input id="amount`+no+`" value="`+ tot_transaction[i].details[0].amount+`" hidden></input>
                                <input id="product_type`+no+`" value="`+ tot_transaction[i].details[0].product_type_id +`" hidden></input>
                                <input id="booking_id`+no+`" value="`+ tot_transaction[i].details[0].booking_id+`" hidden></input>
                                <input id="invoice`+no+`" value="`+ tot_transaction[i].invoice_number+`" hidden></input>
                                <input id="total`+no+`" value="`+ formatPrice(tot_transaction[i].total)+`" hidden></input>
                                <input id="trip`+no+`" value="`+ tot_transaction[i].details[0].booking_data.route_type+`" hidden></input>
                                <input id="payment_stat`+no+`" value="`+ tot_transaction[i].payment_status+`" hidden></input>
                                <input id="trans_stat`+no+`" value="`+ tot_transaction[i].transaction_status+`" hidden></input>

                                <input id="arival_date`+no+`" value="`+ date_arv_train.date +` - `+ date_arv_train.time +`" hidden></input>
                                <input id="depart_date`+no+`" value="`+ date_dpt_train.date +` - `+ date_dpt_train.time+`" hidden></input>
                                <input id="arival_date_return`+no+`" value="`+ date_arv_train_return.date +` - `+date_arv_train_return.time+`" hidden></input>
                                <input id="depart_date_return`+no+`" value="`+ date_dpt_train_return.date +` - `+date_dpt_train_return.time+`" hidden></input>
                                <input id="m_origin`+no+`" value="`+ tot_transaction[i].details[0].booking_data.route_info[0].org+`" hidden></input>
                                <input id="m_destination`+no+`" value="`+ tot_transaction[i].details[0].booking_data.route_info[0].des  +`" hidden></input>

                                <input id="name_product`+no+`" value="`+ name_allproduct +` (`+no_allproduct+`) - `+class_allproduct+`" hidden></input>
                                <input id="name_product_return`+no+`" value="`+ name_allproduct_return +` (`+no_allproduct_return+`) - `+class_allproduct_return+`" hidden></input>
                              </div>
                            </div>
                          </td>
                        </tr>
                        `;
                        $("#orderListBtc").append(setorder);
                        console.log("tes")
                        if(tot_transaction[i].details[0].product_type == "TRAIN"){
                            $("#pilihKursiKrlRegBtc"+ no ).removeClass('d-none')
                        }
                        if(tot_transaction[i].payment_status == "COMPLETED"){
                            $("#pelunasanTrBtc"+ no ).addClass('d-none')
                            $("#pilihKursiKrlRegBtc"+ no ).addClass('d-none')
                            $("#downloadTiket"+ no ).removeClass('d-none')
                        }
                      }
                    
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
    
        }).catch(error => {
            if (error.message === 'Unauthorized') {
            // Redirect ke halaman login
            window.location.href = '/';
            } 
        });
     }
    function pelunasan(id){
      localStorage.setItem("transaction_id", JSON.stringify(id))
    }

    function setTypeTrip(id){
      var trip =  $("#type_trip"+ id).val();
      console.log(trip)
      localStorage.setItem("type_trip", JSON.stringify(trip))
      
      var prod =  $("#products"+ id).val();
      localStorage.setItem("product_payment", JSON.stringify(prod))
    }

    function toDetailsTr(id){
      var name = $("#name_product" + id).val()
      var name_return = $("#name_product_return" + id).val()
     var id_transc = $("#transaction_id" + id).val()
     var limit_t =$("#time_limit" + id).val()
     var id_train  =$("#train_id_0" + id).val()
     var act =$("#create_act" + id).val()
     var harga =$("#amount" + id).val()
     var note = $("#note" + id).val()
     var product_t = $("#product_type" + id).val()
     var id_book =$("#booking_id" + id).val()
     var invoice =$("#invoice" + id).val()
     var total = $("#total" + id).val()
     var type_trip = $("#trip"+id).val()
     var booking = $("#code_krl_reg" + id).val()
     var booking_return = $("#code_krl_reg_return" + id).val()
     var arrival_time = $("#arival_date"+id).val()
     var depart_time = $("#depart_date"+id).val()
     var arrival_time_return = $("#arival_date_return"+id).val()
     var depart_time_return = $("#depart_date_return"+id).val()
     var orign = $("#m_origin" + id).val()
     var destin = $("#m_destination" + id).val()
     var pay_stat = formatPaymentStatus($("#payment_stat" + id).val())
     var tran_stat = formatTransactionStatus($("#trans_stat" + id).val())
    if(type_trip == "RoundTrip"){
        var codebookReturn = booking_return
        var arrival_date_return =  arrival_time_return
        var depart_date_return =  depart_time_return
    }else{
        var codebookReturn = "";
        var arrival_date_return = "";
        var depart_date_return = "";
    }
    var arrival_date =  arrival_time
    var depart_date =  depart_time
    // console.log(arrival_date)
    // console.log(depart_date)
    var booking_id = id_book
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
                            <input id="transaction_id" type="text" class="form-control bold-input" name="" placeholder="" value="`+id_transc+`" readonly>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback-adult text-colors-block"></div>
                        </div>
                        <div class="form-group col-3" >
                            <label for="type">Type Perjalanan: </label>
                                <input id="limit_time" type="text" class="form-control bold-input" name="" placeholder="" value="`+ type_trip +`" readonly>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback-adult text-colors-block"></div>
                        </div>
                        <div class="form-group col-3" >
                            <label for="type">Batas Waktu Pesanan: </label>
                                <input id="limit_time" type="text" class="form-control bold-input" name="" placeholder="" value="`+ limit_t +`" readonly>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback-adult text-colors-block"></div>
                        </div>
                        <div class="form-group col-3" >
                            <label for="type">No. Invoice: </label> 
                                <input id="invoice" type="text" class="form-control bold-input" name="" placeholder="" value="`+invoice+`" readonly>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback-adult text-colors-block"></div>
                        </div>
                        <div class="form-group col-3" >
                            <label for="type">Kode Booking: </label>
                                <input id="code_book_inp_depart" type="text" class="form-control bold-input" name="" placeholder="" value="`+booking+`" readonly>
                                <input id="code_book_inp_return" type="text" class="form-control bold-input d-none" name="" placeholder="" value="`+booking_return+`" readonly>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback-adult text-colors-block"></div>
                        </div>
                        <div class="form-group col-3" >
                            <label for="type">Total Harga Pesanan: </label>
                                <input id="harga_tot" type="text" class="form-control bold-input" name="" placeholder="" value="Rp. `+ total +`" readonly>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback-adult text-colors-block"></div>
                        </div>
                        <div class="form-group col-3" >
                            <label for="type">Status Pembayaran: </label><br>
                            `+pay_stat+`
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback-adult text-colors-block"></div>
                        </div>
                        <div class="form-group col-3" >
                            <label for="type">Status Transaksi: </label><br>
                               `+tran_stat+`
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback-adult text-colors-block"></div>
                        </div><br><br><br><br>
                        <input id="act" type="text" class="form-control " name="" placeholder="" value="`+ act +`" hidden>
                        <input id="train_id" type="text" class="form-control " name="" placeholder="" value="`+ id_train +`" hidden>
                        <input id="book_id" type="text" class="form-control " name="" placeholder="" value="`+ id_book +`" hidden>
                        <input id="type_trips" type="text" class="form-control " name="" placeholder="" value="`+ type_trip +`" hidden>
                        <input id="bookCancelKaiReg" type="text" class="form-control" name="" placeholder="" value="`+ booking +`" hidden>
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
        $("#modalDetailKaiReg").append(datahtml)
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
    }

    function closeModalDetailsOrder(){
      $.LoadingOverlay("hide")
      $("#modalDetailKai").on("hidden.bs.modal", function(e) {
            $("#modalDetailKai").replaceWith(`<div id="modalDetailKaiReg"></div>`)
        })

    }

    function update_kaiWis(){
    var trips = $("#type_trips").val()
    var tansaction_id = $("#transaction_id").val()
    var time_limit = $("#limit_time").val()
    var id_train = $("#train_id").val()
    var id_book = $("#book_id").val()
    var id_book_return = parseInt(id_book) + 1
    var code_book = $("#code_book_inp_depart").val()
    var code_book_return = $("#code_book_inp_return").val()
    var id_train_return = parseInt(id_train) + 1
    var harga_satuan = $("#harga_s").val()
    var harga_total = $("#harga_tot").val()

    if(trips == "OneWay"){
      var data_details = [
              {
                "id": id_train,
                "amount": parseInt(harga_satuan),
                "note": "Kereta Wisata",
                "status": "Depart",
                "product_type_id": 3,
                "booking_data": {
                    "id": id_book,
                    "booking_code": code_book,
                    "booking_status": "Unpaid"
                }
              }
    ]
    }else if(trips == "RoundTrip"){

      var data_details = [
                {
                "id": id_train,
                "amount": parseInt(harga_satuan),
                "note": "Kereta Wisata",
                "status": "Depart",
                "product_type_id": 5,
                "booking_data": {
                    "id": id_book,
                    "booking_code": code_book,
                    "booking_status": "Unpaid"
                  }
                },
                  {
                "id": id_train_return,
                "amount":  parseInt(harga_satuan),
                "note": "Kereta Wisata",
                "status": "Return",
                "product_type_id": 5,
                "booking_data": {
                    "id": id_book_return,
                    "booking_code": code_book_return,
                    "booking_status": "Unpaid"
                }
              }
          ]
    }

    // console.log(trips)
    var token = JSON.parse(localStorage.getItem('data_token'));
    var token_set = token['access_token'];
    var url = fetch(mainurl+'transaction/prosess/admin',{
      method: 'POST',
      headers: {
          'Accept': 'application/json',
          'Content-Type': 'application/json',
          'Authorization': 'Bearer ' + token_set,
      },
      body: JSON.stringify({
        "created_act": 1,
        "transaction_id": tansaction_id,
        "time_limit" : time_limit,
        "details": data_details
      }),
      }).then((response) => response.json()).then((responseData) => {
          console.log(responseData)
          if(responseData.success == true){
            $("#orderListAdmin").empty()
            getListOrderKaiWisataAdmin()
            // $("#modalDetailKaiWisAdmin").on("hidden.bs.modal", function(e) {
            //     $("#modalDetailKaiWisAdmin").replaceWith(`<div id="modalDetailKaiWis"></div>`)
            // })
            toastr.success("Berhasil Update Pesanan", "Success")
          }else{
            toastr.error("Gagal Update Pesanan", "Error")
          }
      });
    }
    function setCodeBook(id){
    
        var code_krl_reg =  $("#code_krl_reg"+ id).val();
        localStorage.setItem("code_book_krl_reg", JSON.stringify(code_krl_reg))

        var products = "train_regular"
        localStorage.setItem("product_payment", JSON.stringify(product))
    }

    function setSeatKrlReg(){
        $.LoadingOverlay("show")
        window.location.href = "/setSeatkrlreg";
    }

    function selectPage(id){
        var nomer_pages = $("#npage" +id).val()
        console.log(nomer_pages)
        $("#no_page_table").val(nomer_pages-1)
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