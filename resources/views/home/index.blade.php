@extends('layout.app')

@section('content')
<div class="container-fluid mt-100 main-font">
    <div class="row" id="body-sidemenu">
        <div id="main-content" class="col with-fixed-sidebar pb-5 pt-3 max-auto">
            <div class="container">
                <div class="row">
                    <!-- <div class="col-12 text-center bg-black pt-5 width-300">
                        <h5>Jumbotron</h5>
                    </div>  -->
                <div class="pt-2">
                @include('component.sidebar')
                </div>
                    <div class="col-9 pt-2">
                        <div class="card shadow p-3 mb-2 bg-body rounded">
                            <div class="card-body"> 
                                <h1 id="tittle_krlreg" class="h6 font-weight-normal text-center text-uppercase text-colors-on d-none"> <b>Isi Data Penumpang Kereta Regular</b></h1>
                                <h1 id="slct_kai_wisata_lb" class="h6 font-weight-normal text-center text-uppercase text-colors-on d-none"> <b>Pilih Kereta Wisata</b></h1>
                                <h1 id="kontak_kai_wisata_lb" class="h6 font-weight-normal text-center text-uppercase text-colors-on d-none"> <b>Pilih Kontak Pemesan</b></h1>
                                <div class="row">
                                    <!-- krl luar biasa -->
                                    <div class="col-12 d-none" id="formKrlLuarBiasaview"></div>
                                    <!-- krl Istimewa -->
                                    <div class="col-12 d-none" id="formKrlIstview"></div>
                                    <!-- krl regular -->
                                    <div class="col-12 d-none" id="formKrlRegview"></div>
                                    <div class="col-12 d-none" id="formOdrDetailsKereta"></div>
                                    <!-- formOdrDetailsPesawat -->
                                    <!-- krl wisata -->
                                    <div class="col-12 d-none" id="formKrlWisview"></div>
                                    <div class="col-12 d-none" id="formOdrDetailKrlWisata"></div>
                                    <!-- <div class="col-12 d-none" id="formOdrDetailKrlWisata"></div> -->
                                    <!-- pesawat -->
                                    <div class="col-12 d-none" id="formOdrPesawat"></div>
                                    <div class="col-12 d-none" id="formOdrDetailsPesawat"></div>
                               
                                    <!-- hotel -->
                                    <div class="col-12 d-none" id="formOdrHotelview"></div>
                                    
                                    <!-- mice -->
                                    <div class="col-12 d-none" id="formMiceview"></div>

                                    <!-- menu default -->
                                    <div class="col-12" id="formKrlReg">
                                    
                                    <!-- menu Digital Goods -->
                                    <div class="col-12 d-none" id="formDgtGoodview"></div>
                                        <!-- <div class="col-12 d-none" id="formKrlReg"></div>
                                        <div class="col-12 d-none" id="formKrlReg"></div> -->
                                        <h5 class=" font-weight-normal text-center text-uppercase "> <b>Selamat Datang di Gowisata</b> </h5>
                                        <hr>
                                        <p>Silakan pilih form pemesanan di sebelah kiri</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card shadow p-3 mb-5 bg-body rounded d-none" id="tabel_pesawat"></div>
                        <div class="card shadow p-3 mb-5 bg-body rounded d-none" id="formDepartOrderPesawat"></div>
                        <div class="card shadow p-3 mb-5 bg-body rounded d-none" id="formReturnOrderPesawat"></div>
                        <div class="card shadow p-3 mb-5 bg-body rounded d-none" id="tabel_pesawat_return"></div>
                        <div class="card shadow p-3 mb-5 bg-body rounded d-none" id="baggage"></div>
                        <div class="card shadow p-3 mb-5 bg-body rounded d-none" id="meals"></div>

                        <div class="card shadow p-3 mb-5 bg-body rounded d-none" id="tabel_kereta_regular"></div>
                        <div class="card shadow p-3 mb-5 bg-body rounded d-none" id="tabel_kereta_wisata"></div>
                        <div class="card shadow p-3 mb-5 bg-body rounded d-none" id="list_penumpang_adult"></div>
                        <div class="card shadow p-3 mb-5 bg-body rounded d-none" id="list_penumpang_child"></div>
                        <div class="card shadow p-3 mb-5 bg-body rounded d-none" id="list_penumpang_infant"></div>
                        
                        <div id="hotelListLocation" class="card-body d-none">
                            <div class="" id="formlistHotel">
                                        
                            </div>
                        </div>
                        <!-- <div class="" id="button_booking"> -->
                            <div class="row">
                                <div class="col-12">
                                    <div class="row">
                                       <div class="form-group col-4">
                                            <!-- <label for="type">Pilih Metode Pembayaran <span class="text-danger">*</span></label>
                                            <select class="form-control inputVal" id="payment_method" name="payment_method">
                                                <option value="">--Pilih--</option>
                                                <option id="payment_name"></option>
                                            </select>
                                            <div class="valid-feedback">Valid.</div>
                                            <div class="invalid-feedback">Isian ini wajib diisi.</div>-->
                                        </div>
                                        <div class="col-4 d-none" id="button_booking"> 
                                            <button class="btn btn-block main-color" onclick="bookingTiketPesawat()"> <b class="text-colors-off"><i class="fa fa-bookmark mr-1"></i> Booking</b></button>
                                        </div>
                                        <div class="col-4 d-none" id="booking_train"> 
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <!-- </div> -->
                        <div class="card shadow-sm mt-3 d-none" >
                        <h1 class="h6 font-weight-normal text-center text-uppercase mt-2"> <b>List Tiket Tersedia</b> </h1>
                        <div class="table-responsive" >
                            <table class="table bg-white">
                                <thead class="thead-main text-nowrap">
                                    <tr id="formKrlWisview">
                                        <th class="text-center col-md-1">Nama Kereta</th>
                                        <th class="text-center col-md-1">kelas</th>
                                        <th class="text-center col-md-1">Asal</th>
                                        <th class="text-center col-md-1">Tujuan</th>
                                        <th class="text-center col-md-1">Harga</th>
                                        <th class="text-center col-md-1">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-nowrap" id="tableFinance">
                                    <tr>
                                        <td id="" class="pl-3 text-center ">data tes</td>
                                        <td id="" class="pl-3 text-center ">data tes</td>
                                        <td id="" class="pl-3 text-center ">data tes</td>
                                        <td id="" class="pl-3 text-center ">data tes</td>
                                        <td id="" class="pl-3 text-center ">data tes</td>
                                        <td id="" class="pl-3 text-center ">data tes</td>
                                    </tr>
                                </tbody>
                                <tfoot class="border-bottom">
                                    <!-- <tr class="bg-brown">
                                        <td id="beforeAddData" colspan="7" class="pl-3 text-center font-12">Tidak ada data yang ditampilkan</td>
                                    </tr> -->
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div><!-- .row -->
            </div>
        </div><!-- Main Col -->
    </div><!-- body-row -->
</div><!-- .container-fluid-->
<div id="listHotel_temporer"></div>
<div id="modalConfirmKrlLB"></div>
<div id="modalBooking"></div>
<div id="codeBooking"></div>
<div id="modalCodeAccess"></div>

<!-- <div id="modalCodeAccess1"></div> -->
@endsection

@push('scripts')
<script>
    localStorage.removeItem("id_payment_metode")
    localStorage.removeItem("timer_pay")        
    localStorage.removeItem("product_payment")
    localStorage.removeItem("status_interval")
    localStorage.removeItem("acc_code")
    localStorage.removeItem("data_pax")
    localStorage.removeItem("data_pax_inf")
    localStorage.removeItem("data_pax_adl")
    localStorage.removeItem("data_pax_chd")
    localStorage.removeItem("data_pax_inf")
    localStorage.removeItem("data_book_flight_addons")
    localStorage.removeItem("data_book_flight_addons_return")
    localStorage.removeItem("data_book_flight_addons_bagasi")
    localStorage.removeItem("data_book_flight_addons_bagasi_return")
    localStorage.removeItem("data_book_flight_addons_meals")
    localStorage.removeItem("data_book_flight_addons_meals_return")
    localStorage.removeItem("data_book_flight_addons_meals_code")
    localStorage.removeItem("data_book_flight_addons_meals_code_return")
    localStorage.removeItem("data_flight_search")
    localStorage.removeItem("data_flight_return")

    localStorage.removeItem("data_pemesan_kai_reg")
    localStorage.removeItem("data_train_depart")
    localStorage.removeItem("code_book_krl_reg")
    localStorage.removeItem("data_train_depart_cart")

    localStorage.removeItem("data_kordinat")

    localStorage.removeItem("id_kai_klb")
    localStorage.removeItem("payment_api")
    localStorage.removeItem("name_kai_wisata")
    localStorage.removeItem("capa_kai_wisata")
    localStorage.removeItem("data_search_train_return")
    localStorage.removeItem("data_scadule_wisata")
    localStorage.removeItem("type_trip")
    localStorage.removeItem("data_train_wis_return")
    localStorage.removeItem("kode_book_alls")
    localStorage.removeItem("data_seat_loop")
    localStorage.removeItem("id_kai_wisata")
    localStorage.removeItem("kode_book_return_alls")
    localStorage.removeItem("data_train_return")
    localStorage.removeItem("data_train_id_cart")
    localStorage.removeItem("data_scadule_luarbiasa")
    localStorage.removeItem("id_contact_wisata")
    localStorage.removeItem("data_paxAdl_kai_reg_temporare")
    localStorage.removeItem("data_seat")
    localStorage.removeItem("id_contact_klb")
    localStorage.removeItem("transaction_id")
 
    function dropFunc(){
        var tes = $("#tes").val();
        // console.log(tes);
        if (tes == 0) {
            $("#list_train").removeClass('d-none');
            var btnEdtComob = `<button class="list-group-item list-group-item-action flex-column align-items-start bg-transparent border-bottom-0" id="tes" value="1" onclick="dropFunc()"><span class="fa fa-train fa-fw mr-3"></span>Tiket Kereta
                <i class="fa fa-caret-down" style="margin-left: 60px;"></i>
            </button>`;
            $("#tes" ).replaceWith(btnEdtComob)
        } else if (tes == 1){
            $("#list_train").addClass('d-none'); 
            var btnEdtComob = `<button class="list-group-item list-group-item-action flex-column align-items-start bg-transparent border-bottom-0" id="tes" value="0" onclick="dropFunc()"><span class="fa fa-train fa-fw mr-3"></span>Tiket Kereta
                <i class="fa fa-caret-left" style="margin-left: 60px;"></i>
            </button>`;
            $("#tes" ).replaceWith(btnEdtComob)
        }  
    }
</script>
@endpush