@extends('layout.app')

@section('content')
<div class="container-fluid mt-100 main-font">
  <div class="row d-flex flex-column flex-md-row" id="body-sidemenu">
      <div id="main-content" class="col with-fixed-sidebar pb-5 pt-3 max-auto">
      <div class="container">
        <div class="row">
        <div class="col-12 col-md-3 pt-3">
          @include('component.sidebar_order_admin')
        </div>
        <div class="col-12 col-md-9 pt-3">
          <!-- <h1 class="h5 font-weight-normal text-center text-uppercase text-colors-on"> <b>List Orders</b> </h5><br> -->
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
            <!-- .col -->
          </div>
          <!-- .row -->
          <div class="row">
            <div class="col-12">
            
              <div class="table-responsive" >
                <table class="table bg-white text-center">
                  <thead class="thead-main text-nowrap">
                    <tr class="text-uppercase ">
                      <th>ID <div></div></th>
                      <th>Invoice </th>
                      <th>Kode Booking</th>
                      <th>id pengguna</th>
                      <th>Jenis Pesanan</th>
                      <th>Harga</th>
                      <th>Status Pembayaran</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody class="text-nowrap" id="orderListAdmin">
            
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

@endsection

@push('scripts')
<script type="text/javascript">
  $.LoadingOverlay("show")
    // for (var t = 1; t <= 10; t++) {
    //     if (String(t)[0] || String(t)[-1]) {
    //         t="tes"
    //         continue;
    //     }
    //     console.log(t);
    // }
   
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
        
    var token = JSON.parse(localStorage.getItem('data_token'));
    var book_code = JSON.parse(localStorage.getItem('code_book_krl_reg'));
    var token_set = token['access_token']
    var no_page_toApi = $("#no_page_table").val()
    console.log(no_page_toApi)
    var url = fetch(mainurl+'transaction/admin/list?order=desc&per_page=10&page='+no_page_toApi,{
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
    
    function setTypeTrip(id){
      var trip =  $("#type_trip"+ id).val();
      console.log(trip)
      localStorage.setItem("type_trip", JSON.stringify(trip))
      
      var prod =  $("#products"+ id).val();
      localStorage.setItem("product_payment", JSON.stringify(prod))
    }

    function toDetailsTr(){

        // window.location.href = "/detailsorder/btc/train";

    }
    function toDetailsFl(){

    // window.location.href = "/detailsorder/btc/flight";

    }

    function selectPage(id){
        var nomer_pages = $("#npage" +id).val()
        console.log(nomer_pages)
        $("#no_page_table").val(nomer_pages-1)
    }

    function kaiWisataAdmins(){
        window.location.href = "/listorder/kai_wisata/admin";
    }

    </script>
  @endpush