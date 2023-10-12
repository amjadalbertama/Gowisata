@extends('layout.app')

@section('content')
<div class="container-fluid mt-100 main-font">
  <div class="row d-flex flex-column flex-md-row" id="body-sidemenu">
    <div id="main-content" class="col with-fixed-sidebar pb-5 pt-3 max-auto">
      <div class="container">
        <div class="row ">
        <div class="col-12 col-md-3 pt-3">
              @include('component.sidebar_order_admin')
        </div>
        <div class="col-12 col-md-9 pt-3">
          <!-- <h1 class="h5 font-weight-normal text-center text-uppercase text-colors-on"> <b>List Orders</b> </h5><br> -->
          <div class="card shadow p-3 mb-5 bg-body rounded">
            <!-- <div class="card-body"> -->
          <div class="row mb-3">
            <div class="col-12 col-md-8 col-lg-9 col-xl-9">
            <label for="" class="text-colors-on"><b>Data Pesanan KAI Luar Biasa</b></label>
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
                      <th>ID <div></div></th>
                      <th>Invoice </th>
                      <th>Kode Booking</th>
                      <th>Nama Pemesan</th>
                      <th>Email Pemesan</th>
                      <th>Harga</th>
                      <th>Status Pembayaran</th>
                      <th>Aksi</th>
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
<div id="modalDetailKaiWis"></div>
@endsection

@push('scripts')
<script type="text/javascript">
  $.LoadingOverlay("show")
  $("#kaiRegAdmin").removeClass('text-warning')
  $("#kaiWisataAdmin").removeClass('text-warning')
  $("#kaiLuarBiasaAdmin").addClass('text-warning')
  $("#KaiIstimewaAdmin").removeClass('text-warning')
  $("#pesawatOrderAdmin").removeClass('text-warning')
  $("#miceOrderAdmin").removeClass('text-warning')

  getListOrderKaiWisataAdmin()
   
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
    function getListOrderKaiWisataAdmin(){
   
      var token = JSON.parse(localStorage.getItem('data_token'));
      var book_code = JSON.parse(localStorage.getItem('code_book_krl_reg'));
      var token_set = token['access_token']
      var no_page_toApi = $("#no_page_table").val()
      console.log(no_page_toApi)
      var url = fetch(mainurl+'transaction/admin/list?order=desc&per_page=10&product_type=TRAIN_SPEC',{
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
                    if(tot_transaction[i].details[0].product_type == "TRAIN_SPEC"){
                      if(tot_transaction[i].details[0].booking_data.train_type == "Luar Biasa"){
                        
                        if(tot_transaction[i].details[0].booking_data.booking_code !=null){
                          var book = tot_transaction[i].details[0].booking_data.booking_code;
                        } else {
                          var book = "Belum Ada";
                        }

                        var bilangan = tot_transaction[i].total;
                        var	number_string = bilangan.toString(),
                          split	= number_string.split(','),
                          sisa 	= split[0].length % 3,
                          rupiah 	= split[0].substr(0, sisa),
                          ribuan 	= split[0].substr(sisa).match(/\d{1,3}/gi);   
                        if (ribuan) {
                          separator = sisa ? '.' : '';
                          rupiah += separator + ribuan.join('.');
                        }
                        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;

                        if(tot_transaction[i].payment_status == "NOT_PAID"){
                            var pay_stat = `<b style="color: red ;"> Belum Dibayar</b>`;
                        }else if(tot_transaction[i].payment_status == "PAID"){
                            var pay_stat = `<b style="color: green;">Telah DIbayar</b>`;
                        }else if(tot_transaction[i].payment_status == "COMPLETED"){
                            var pay_stat = `<b style="color: orange ;">Selesai</b>`;
                        }else if(tot_transaction[i].payment_status == "EXPIRED"){
                            var pay_stat = `<b style="color: black ;">Kadaluarsa</b>`;
                        }

                        //Transaction Status
                        if(tot_transaction[i].transaction_status == "BOOKED"){
                            var trans_stat = `<b style="color: green ;"> Dipesan</b>`;
                        }else if(tot_transaction[i].transaction_status == "PROCESSED"){
                            var trans_stat = `<b style="color: blue ;"> Diproses</b>`;
                        }else if(tot_transaction[i].transaction_status == "SUCCEED"){
                            var trans_stat = `<b style="color: orange ;"> Berhasil</b>`;
                        }else if(tot_transaction[i].transaction_status == "FAILED"){
                            var trans_stat = `<b style="color: red ;"> Gagal</b>`;
                        }else if(tot_transaction[i].transaction_status == "CANCELED"){
                            var trans_stat = `<b style="color: black ;"> Batal</b>`;
                        }

                        var no = i+1
                        setorder = `<tr>
                          <td>`+ tot_transaction[i].id +`</td>
                          <td>`+ tot_transaction[i].invoice_number +`</td>
                          <td>`+ book +`</td>
                          <td>`+ tot_transaction[i].details[0].booking_data.caller.name+`</td>
                          <td>`+ tot_transaction[i].details[0].booking_data.caller.email+`</td>
                          <td class="text-right">Rp `+ formatPrice(tot_transaction[i].total) +`</td>
                          <td>`+ pay_stat+`</td>
                          <td class="text-nowrap">
                            <div class="dropdown">
                              <a href="javascript:void(0);" class="btn btn-sm color-main py-0" title="View/Edit" data-toggle="dropdown"><i class="fa fa-bars"></i></a>
                              <div class="dropdown-menu dropdown-menu-right">
                                <a id="detailsTrainWis"class="dropdown-item" href="javascript:void(0);" title="Details" onclick="toDetailsTr(`+no+`)"><i class="fa fa-info fa-fw mr-1"></i>Details Train</a>
                                <a class="dropdown-item d-none" href="javascript:void(0);" data-toggle="modal" data-target="" title="Delete"><i class="fa fa-trash fa-fw mr-1"></i>Delete</a>
                                <input id="transaction_id`+no+`" value="`+ tot_transaction[i].details[0].transaction_id +`" hidden></input>
                                <input id="train_id_0`+no+`" value="`+ tot_transaction[i].details[0].id +`" hidden></input>
                                <input id="code_krl_reg`+no+`" value="`+ book +`" hidden></input>
                                <input id="time_limit`+no+`" value="`+ tot_transaction[i].details[0].booking_data.booking_time_limit +`" hidden></input>
                                <input id="create_act`+no+`" value="`+ tot_transaction[i].created_act +`" hidden></input>
                                <input id="amount`+no+`" value="`+ tot_transaction[i].details[0].amount+`" hidden></input>
                                <input id="product_type`+no+`" value="`+ tot_transaction[i].details[0].product_type_id +`" hidden></input>
                                <input id="booking_id`+no+`" value="`+ tot_transaction[i].details[0].booking_id+`" hidden></input>
                                <input id="invoice`+no+`" value="`+ tot_transaction[i].invoice_number+`" hidden></input>
                                <input id="total`+no+`" value="`+ tot_transaction[i].total+`" hidden></input>
                                <input id="trip`+no+`" value="`+ tot_transaction[i].details[0].booking_data.route_type+`" hidden></input>
                                <input id="booking_code`+no+`" value="`+ tot_transaction[i].details[0].booking_data.route_type+`" hidden></input>

                                <input id="contact_name`+no+`" value="`+ tot_transaction[i].details[0].booking_data.caller.name +`" hidden></input>
                                <input id="contact_email`+no+`" value="`+ tot_transaction[i].details[0].booking_data.caller.email +`" hidden></input>
                                <input id="contact_hp`+no+`" value="`+ tot_transaction[i].details[0].booking_data.caller.phone +`" hidden></input>
                                <input id="gerbong`+no+`" value="`+ tot_transaction[i].details[0].booking_data.list_wagon[0].wagon_name +`" hidden></input>
                              </div>
                            </div>
                          </td>
                        </tr>
                        `;
                        $("#orderListAdmin").append(setorder);
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
            $.LoadingOverlay("hide")
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

     var name_contact = $("#contact_name"+id).val()
     var email_contact = $("#contact_email"+id).val()
     var no_contact = $("#contact_hp"+id).val()
     var gerbong = $("#gerbong"+id).val()
      var datahtml = `
        <div class="modal fade" id="modalDetailKaiWisAdmin" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-lg ">
                <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title text-colors-on">Detail Pesanan</h5>
                      <button type="button" class="close" data-dismiss="modal" onclick="enableLoading(); closeModalDetailsOrderAdmin()">×</button>
                  </div><br>
                  <div class="col-12">
                    <b> Data Pesanan:</b>
                    <div class="row">
                      <div class="form-group col-4" >
                          <label for="type">Id Transaksi: </label> 
                              <input id="transaction_id" type="text" class="form-control " name="" placeholder="" value="`+id_transc+`" readonly>
                          <div class="valid-feedback">Valid.</div>
                          <div class="invalid-feedback-adult text-colors-block"></div>
                      </div>
                      <div class="form-group col-4" >
                        <label for="type">No. Invoice: </label> 
                              <input id="invoice" type="text" class="form-control " name="" placeholder="" value="`+invoice+`" readonly>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback-adult text-colors-block"></div>
                      </div>
                      <div class="form-group col-3" >
                          <label for="type">Kode Booking Depart: </label>
                              <input id="code_book_inp_depart" type="text" class="form-control " name="" placeholder="" value="" required>
                          <div class="valid-feedback">Valid.</div>
                          <div class="invalid-feedback-adult text-colors-block"></div>
                      </div>
                    </div>
                  </div>
                  <div class="row col-12">
                    <div class="form-group col-4 d-none" id="code_book_inp_return" >
                        <label for="type">Kode Booking Return: </label>
                            <input  type="text" class="form-control d-none" name="" placeholder="" value="" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback-adult text-colors-block"></div>
                    </div>
                    <div class="form-group col-4" >
                        <label for="type">Harga Satuan Gerbong: </label>
                            <input id="harga_s" type="number" class="form-control " name="" placeholder="Rp. `+ formatPrice(harga)+`" value="" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback-adult text-colors-block"></div>
                    </div>
                    <div class="form-group col-4" >
                      <label for="type">Total Harga Pesanan: </label>
                            <input id="harga_tot" type="text" class="form-control " name="" placeholder="" value="Rp. `+ formatPrice(total) +`" readonly>
                      <div class="valid-feedback">Valid.</div>
                      <div class="invalid-feedback-adult text-colors-block"></div>
                    </div>
                  </div>
                  <div class="col-12">
                    <b> Gerbong:</b>
                      <div class="row">
                        <div class="form-group col-4" >
                                <input id="" type="text" class="form-control" name="" placeholder="" value="`+gerbong+`" readonly>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback-adult text-colors-block"></div>
                        </div>
                      </div>
                  </div>
                  <div class="col-12">
                    <b> Kontak Pemesan:</b>
                    <div class="row">
                      <div class="form-group col-4" >
                          <label for="type">Nama Pesanan: </label>
                              <input id="harga_tot" type="text" class="form-control " name="" placeholder="" value="`+ name_contact +`" readonly>
                          <div class="valid-feedback">Valid.</div>
                          <div class="invalid-feedback-adult text-colors-block"></div>
                      </div>
                      <div class="form-group col-4" >
                          <label for="type">Email Pesanan: </label>
                              <input id="harga_tot" type="text" class="form-control " name="" placeholder="" value="`+ email_contact +`" readonly>
                          <div class="valid-feedback">Valid.</div>
                          <div class="invalid-feedback-adult text-colors-block"></div>
                      </div>
                      <div class="form-group col-4" >
                          <label for="type">No.Hp Pesanan: </label>
                              <input id="harga_tot" type="text" class="form-control " name="" placeholder="" value="+`+ no_contact +`" readonly>
                          <div class="valid-feedback">Valid.</div>
                          <div class="invalid-feedback-adult text-colors-block"></div>
                      </div>
                      <input id="act" type="text" class="form-control " name="" placeholder="" value="`+ act +`" hidden>
                      <input id="train_id" type="text" class="form-control " name="" placeholder="" value="`+ id_train +`" hidden>
                      <input id="book_id" type="text" class="form-control " name="" placeholder="" value="`+ id_book +`" hidden>
                      <input id="type_trips" type="text" class="form-control " name="" placeholder="" value="`+ type_trip +`" hidden>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn main-color" id="update_kaiWis" onclick="update_kaiWis()"><b class="text-colors-off"><i class="fa fa-check mr-1" ></i>Update Pesanan</b></button>
                        <button id="closeModalSeatFlight" type="button" class="btn btn-light" data-dismiss="modal" onclick="enableLoading(); closeModalDetailsOrderAdmin()"><i class="fa fa-times mr-1"></i>Kembali</button>
                    </div>
                </div>
            </div>
        </div> `
        $("#modalDetailKaiWis").append(datahtml)
        $("#modalDetailKaiWisAdmin").modal('show') 

        if(type_trip == "RoundTrip"){
          $("#code_book_inp_return").removeClass("d-none")
        }
    }

    function closeModalDetailsOrderAdmin(){
      $.LoadingOverlay("hide")
      $("#modalDetailKaiWisAdmin").on("hidden.bs.modal", function(e) {
            $("#modalDetailKaiWisAdmin").replaceWith(`<div id="modalDetailKaiWis"></div>`)
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
                "product_type_id": 5,
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

    </script>
  @endpush