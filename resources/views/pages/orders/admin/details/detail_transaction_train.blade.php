@extends('layout.app')

@section('content')
<div class="container-fluid mt-100 main-font">
    <div class="row" id="body-sidemenu">
        <div id="main-content" class="col with-fixed-sidebar pt-3 pb-5">
            <div class="container">
                <div class="row ">
                    <div class="col-12 pt-2">
                        <div class="card shadow p-3 mb-5 bg-body rounded">
                        <h1 class="h5 font-weight-normal text-center text-uppercase text-colors-on"> <b>Details Pesanan</b></h5>
                    <hr>
                        <div class="row">
                            <div class=" col-6">
                                <h1 class="h5 font-weight-normal text-uppercase text-colors-on"> <b><span class="fa fa-train mr-1"></span> Kereta Regular</b> - OneWay</h5><br>
                                <img src="{{ asset('img/kai.jpg') }}" alt=""  height="80" style="margin-top:-20px;"><b style="font-size:16px ;">ARGO PARAHYANGAN EXCELLENCE</b> Class<br>
                                <h6>20001</h6>
                            </div>
                            <div class="col-6">
                                <div class="row" style="margin: 30px 0px 0px 150px;"><div id="rute_asal" class="h5"><b>ASAL</b> </div><i class="fa fa-arrow-right fa-2x text-colors-on" style="margin:0px 10px 0px 10px;"></i><div id="rute_tujuan" class="h5"><b>TUJUAN</b></div></div>
                                <div><br><br><h6> Kode Booking : 20001</h6>
                                <h6> Invoice : 20001</h6></div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-2">
                                <label for="type">Waktu Kedatangan:</label>
                                <input list="asal_li" class="form-control inputVal" id="asal" name="asal" placeholder="Asal..." value="" disabled/>
                                <datalist id="asal_li">
                                </datalist>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback-flightorg text-colors-block"></div>
                            </div>
                            <div class="form-group col-2">
                                <label for="status">Waktu Keberangkatan:</label>
                                <input list="tujuan_li" class="form-control inputVal" id="tujuan" name="tujuan" placeholder="Tujuan.." value=""disabled/>
                                <datalist id="tujuan_li">
                                </datalist>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback-flightdes text-colors-block"></div>
                            </div>
                        </div><hr>
                        <!-- <br> -->
                            <div class="row ">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script type="text/javascript">
    var token = JSON.parse(localStorage.getItem('data_token'));
    var book_code = JSON.parse(localStorage.getItem('code_book_krl_reg'));
    var token_set = token['access_token']
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

                  setorder = `<tr>
                  <td>`+ tot_transaction[i].id +`</td>
                  <td>`+ tot_transaction[i].invoice_number +`</td>
                  <td>`+ book +`</td>
                  <td>`+ tot_transaction[i].details[0].product_type +`</td>
                  <td class="text-right">Rp `+ rupiah +`</td>
                  <td>`+ trans_stat +`</td>
                  <td>`+ pay_stat+`</td>
                  <td class="text-nowrap">
                    <div class="dropdown">
                      <a href="javascript:void(0);" class="btn btn-sm color-main py-0" title="View/Edit" data-toggle="dropdown"><i class="fa fa-bars"></i></a>
                      <div class="dropdown-menu dropdown-menu-right">
                        <a id="detailsTr`+i+`"class="dropdown-item" title="Details" onclick="toDetailsTr()"><i class="fa fa-info fa-fw mr-1"></i>Details</a>
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
    function toDetailsTr(){

        window.location.href = "/detailsorder";

    }
    function toPayment(){

      window.location.href = "/payment_method";

    }
    function setCodeBook(id){
    
        var code_krl_reg =  $("#code_krl_reg"+ id).val();
        localStorage.setItem("code_book_krl_reg", JSON.stringify(code_krl_reg))

    }

    function setSeatKrlReg(){
        $.LoadingOverlay("show")
        window.location.href = "/setSeatkrlreg";
    }

    </script>
  @endpush