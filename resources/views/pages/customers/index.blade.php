@extends('layout.app')

@section('content')
<div class="container-fluid mt-100">
    <div class="row" id="body-sidemenu">
        <div id="main-content" class="col with-fixed-sidebar bg-light pb-5">
            <div class="container">
                    <nav aria-label="breadcrumb" class="no-side-margin bg-light mb-2">
                        <ol class="breadcrumb mb-0 rounded-0 bg-light">
                            <li class="breadcrumb-item active" aria-current="page">Rekap Transaksi POS</li>
                        </ol>
                    </nav>
                    <div class="row">
                        <div class="col-12">
                            <div class="row mb-3">
                                <div class="col-12 col-md-8 col-lg-9 col-xl-10">
                                    <input id="sales_date_rekap" name="sales_date_rekap" type="date" class="form-control col-2" value="">
                                </div><!-- .col -->
                                    <button id="postJurnal" type="submit" class="btn btn-primary col-2 d-none" onclick="postClick()"><i class="fa mr-1"></i>Post Jurnal</button>
                                    <div id="afterPost" class=""></div>
                            </div><!-- .row -->
                        </div> <!-- .col-* -->
                    </div><!-- .row -->

                <div class="row">
                    <div class="col-12">
                        <div class="row mb-3">
                            <div class="col-12 col-md-8 col-lg-9 col-xl-9">
                                <h7 style="font-size: 15px;" id="dateNowRT">Tanggal: </h7>
                            </div><!-- .col -->
                            <div class="col-3">
                                    <!-- <div class="input-group"> -->
                                    <h7 id="dateAfterPost" style="font-size: 15px; margin-left: 100px;"></h7>
                            </div><!-- .col -->
                        </div><!-- .row -->

                        <div class="row">
                            <div class="col-12">
                                <div class="table-responsive">
                                    <table class="table table-bordered bg-white">
                                        <thead class="thead-main text-nowrap">
                                            <tr class="text-uppercase font-11 text-center" bgcolor="#F5F5F5">
                                                <th class=" col-md-3 pl-3 ">Transaksi</th>
                                                <th class=" col-md-3 ">Nominal</th>
                                                <th class=" col-md-3 ">Metode Pembayaran</th>
                                            </tr>
                                        </thead>
                                        <tbody class="text-nowrap" id="tableFinance">
                                            <!-- <tr>
                                                <td id="" class="pl-3 text-center font-11 text-uppercase"><b>Tidak Ada Data Ditampilkan</b></td>
                                            </tr> -->
                                        </tbody>
                                        <tfoot class="border-bottom">
                                            <tr class="bg-brown">
                                                <td id="beforeAddData" colspan="3" class="pl-3 text-center font-12">Tidak ada data yang ditampilkan</td>
                                                <td id="afterAddData" class="pl-3 text-center font-11 text-uppercase d-none" bgcolor="#F5F5F5"><b>Jumlah</b></td>
                                                <td id="tdTotal" class="d-none"></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div><!-- .col -->
                        </div><!-- .row -->
                    </div> <!-- .col-* -->
                </div><!-- .row -->
            </div>
        </div><!-- Main Col -->
    </div><!-- body-row -->
</div><!-- .container-fluid-->
@endsection

@push('scripts')
<script>
      $('#sales_date_rekap').on('change', function() {
        var sales_date = $("#sales_date_rekap").val();
            $.ajax({
                url: "/transaksi/date",
                type: "POST",
                data: {
                    sales_date: sales_date
                },
                success: function(result) {
                if (result.success) {
                    $("#tableFinance").empty()
                    $("#dateNowRT").empty()
                    $("#tdTotal").empty()
                    $("#postJurnal").removeClass('d-none');
                    $("#afterPost").addClass('d-none');
                    $("#dateAfterPost").empty();
                    var date_sale = new Date(sales_date)
                    var dateEnd = moment(date_sale).format('DD/MM/YYYY');
                    //  console.log(dateEnd)
                        var setNTbale = result.data.map(function(datas, index){
                        // console.log(datas)
                        return `<tr class="text-center">
                                    <td class="col-md-3 pl-3">POS `+ datas.sale_id + `</td>
                                    <td class="col-md-3 text-right">`+ datas.payment_amount +`</td>
                                    <td class="col-md-3" >`+ datas.payment_method +`</td> 
                                </tr> `
                            }); 
                    $("#tableFinance").append(setNTbale)

                    var setJlah = `<td id="tdTotal" class="text-right">`+ result.jumlah +`.00</td>`;
                    $("#tdTotal").replaceWith(setJlah)
                    // console.log(result.cek)
                    if(result.cek != "-"){
                        $("#dateAfterPost").append(result.cek);
                        $("#postJurnal").addClass('d-none');
                        $("#afterPost").replaceWith(`<button id="afterPost" type="submit" class="btn btn-success col-2" onclick="postClick()" disabled><i class="fa mr-1"></i>Sudah Posting Jurnal</button>`)
                    }
                    
                    $("#afterAddData").removeClass('d-none')
                    $("#beforeAddData").addClass('d-none')
                    $("#dateNowRT").append("Tanggal: " + dateEnd);
                    toastr.success(result.message, "Notification");
                } else {
                    // $("#tdTotal").addClass('d-none');
                    // $("#dateNowRT").append("Tanggal: ");
                    // $("#beforeAddData").removeClass('d-none')
                    // $("#afterAddData").addClass('d-none')
                    toastr.error(result.message, "Warning");
                }
            } 
        })
    })
    
</script>
@endpush