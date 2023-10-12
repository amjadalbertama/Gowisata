@extends('layout.app')

@section('content')
<div class="container-fluid mt-100 main-font">
  <div class="row" id="body-sidemenu">
    <div id="main-content" class="col with-fixed-sidebar pt-3 pb-5">
      <div class="container">
        <div class="row ">
        <div class="col-12 pt-2">
        <h1 class="h6 font-weight-normal text-center text-uppercase text-colors-on"> <b>List Orders</b> </h1><br>
          <div class="card shadow p-3 mb-5 bg-body rounded">
            <!-- <div class="card-body"> -->
          <div class="row mb-3">
            <div class="col-12 col-md-8 col-lg-9 col-xl-9">
              <!-- <a href="{{ route('formAddCompanies') }}" class="btn btn-sm px-4 mr-2" style="background-image: linear-gradient(red, rgb(251, 140, 1));"><b class="text-white"><i class="fa fa-user-plus mr-2"></i>New Company</b></a>
              <a class="btn btn-sm btn-secondary px-4 mr-2 disabled"><i class="fa fa-trash mr-2"></i>Delete Selection</a> -->
              <!-- <a class="btn btn-sm btn-secondary px-4 mr-2"><i class="fa fa-download mr-2"></i>Download</a> -->
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
                      <th>Invoice Number</th>
                      <th>Booking Code</th>
                      <th>Product Type </th>
                      <th>Price</th>
                      <th>Transaction Status</th>
                      <th>Transaction Type</th>
                      <th>Payment Status</th>
                      <th>Action</th>
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

@endsection

@push('scripts')
<script type="text/javascript">
    var token = JSON.parse(localStorage.getItem('data_token'));
    var book_code = JSON.parse(localStorage.getItem('code_book_krl_reg'));
    var token_set = token['access_token']
    var url = fetch('https://api-gowisata.aturtoko.site/api/transaction/list?order=desc&page=1',{
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
                  
                  if(tot_transaction[i].details[0].product_type == "TRAIN"){
                    if(tot_transaction[i].details[0] !=null){
                      var book = tot_transaction[i].details[0].booking_data.booking_code_gds;
                    } else {
                      var book = "";
                    }
                  }else if(tot_transaction[i].details[0].product_type == "FLIGHT"){
                      var book = tot_transaction[i].details[0].booking_data.booking_code ;
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


                  //Payment Status
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

                  //Sransaction Type
                  if(tot_transaction[i].transaction_type == "PREPAID"){
                      var trans_type = ` Prabayar`;
                  }
                  
                  setorder = `<tr>
                  <td>`+ tot_transaction[i].id +`</td>
                  <td>`+ tot_transaction[i].invoice_number +`</td>
                  <td>`+ book +`</td>
                  <td>`+ tot_transaction[i].details[0].product_type +`</td>
                  <td class="text-right">Rp `+ rupiah +`</td>
                  <td>`+ trans_stat +`</td>
                  <td>`+ trans_type+`</td>
                  <td>`+ pay_stat+`</td>
                  <td class="text-nowrap">
                    <div class="dropdown">
                      <a href="javascript:void(0);" class="btn btn-sm color-main py-0" title="View/Edit" data-toggle="dropdown"><i class="fa fa-bars"></i></a>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="" title="Details"><i class="fa fa-info fa-fw mr-1"></i>Details</a>
                        <a id="pelunasanTr`+i+`" class="dropdown-item" href="javascript:void(0);" title="Pelunasan" onclick="pelunasan(`+ tot_transaction[i].id +`); toPayment()"><i class="fa fa-credit-card-alt fa-fw mr-1"></i>Pelunasan</a>
                        <a class="dropdown-item d-none" href="javascript:void(0);" data-toggle="modal" data-target="" title="Delete"><i class="fa fa-trash fa-fw mr-1"></i>Delete</a>
                        <a id="pilihKursiKrlReg`+i+`" class="dropdown-item d-none" href="javascript:void(0);" title="Pilih" onclick="setCodeBook(`+ i +`); setSeatKrlReg()"><i class="fa fa-plus-circle fa-fw mr-1"></i>Ubah Kursi</a><input id="code_krl_reg`+i+`" value="`+ book +`" hidden></input>
                      </div>
                    </div>
                  </td>
                </tr>
                `;
                $("#orderListPesawat").append(setorder);
              
                if(tot_transaction[i].details[0].product_type == "TRAIN"){
                    $("#pilihKursiKrlReg"+ i ).removeClass('d-none')
                }
                if(tot_transaction[i].payment_status == "COMPLETED"){
                    $("#pelunasanTr"+ i ).addClass('d-none')
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
            
    });
    
    function pelunasan(id){

      localStorage.setItem("transaction_id", JSON.stringify(id))

    }

    function toPayment(){

      window.location.href = "/payment_method";

    }
    function setCodeBook(id){
    
    var code_krl_reg =  $("#code_krl_reg"+ id).val();
    // console.log();
    localStorage.setItem("code_book_krl_reg", JSON.stringify(code_krl_reg))

    }

    function setSeatKrlReg(){
    $.LoadingOverlay("show")
    window.location.href = "/setSeatkrlreg";

    }
    </script>
  @endpush