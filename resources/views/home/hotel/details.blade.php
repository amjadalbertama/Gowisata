@extends('layout.payment_proses')

@section('content')
<div class="container-fluid mt-100 main-font">
    <div class="row" id="body-sidemenu">
        <div id="main-content" class="col with-fixed-sidebar pb-5 pt-3" style="margin-top:20px;">
            <div class="container">
                <div class="row">
                    <div class="col-9 pt-2"><br>
                        <h1 class="h6 font-weight-normal text-center text-uppercase text-colors-on"> <b>Masukan Data Tamu</b></h1>
                            <hr>
                        <div class="card shadow p-3 mb-5 bg-body rounded d-none" id="list_penumpang_adult"></div>
                        <div class="card shadow p-3 mb-5 bg-body rounded d-none" id="list_penumpang_child"></div>
                        <div class="card shadow p-3 mb-5 bg-body rounded d-none" id="permintaan_khusus">
                            <div class="form-group col-12 ">
                                <label class="">Pesanan Khusus: </label>
                                <div id="sp_check"></div>
                                <div class="valid-feedback">Valid.</div>
                                <div class="invalid-feedback"></div>
                            </div>
                        </div>

                        <div class="row col-12 text-center">
                            <div class="col-4"></div>
                            <div id="btn_booking_hotel"></div>  
                        </div>
                    </div>
                    
                    <div class="pt-2 col-3 d-none" id="detail_kamarhotel">
                        <div class="card shadow-sm col-12">
                            <div class="card-body">
                                <h6 class="text-colors-on">Detail Pesanan</h6>
                                <hr>
                                <div>
                                    Nama Hotel : <b><div id="name_hotel"></div></b>
                                </div>
                                <div>
                                    Nama Kamar : <b><div id="name_room"></div></b>
                                </div>
                                <hr>
                                <div>
                                    Rp. <div id="harga_kamar"></div><br>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- Main Col -->
    </div><!-- body-row -->
</div><!-- .container-fluid-->
<div id="codeBooking"></div>
@endsection

@push('scripts')
<script>
    $.LoadingOverlay("show")
    $("#list_room_hotel" ).addClass('text-colors-on')
    $("#data_pax_hotel" ).addClass('text-colors-on')
    var btn_selct_krl = `<button class="btn col-4" id="" style="background-image: linear-gradient(red, rgb(251, 140, 1));" onclick="policyHotel()"><b class="text-white">selanjutnya</b></button>`
                $("#btn_booking_hotel").replaceWith(btn_selct_krl);
    $("#detail_kamarhotel").removeClass('d-none')
    // $("#permintaan_khusus").removeClass('d-none')
    
    var hotel = JSON.parse(localStorage.getItem('data_hotel_search'))
    var data_room = JSON.parse(localStorage.getItem('data_room_hotel'))
    var token = JSON.parse(localStorage.getItem('data_token'))

    var pax_request = JSON.parse(localStorage.getItem('data_pax'))
    var maxLoopPaxAd = pax_request[0].adult;
    var maxLoopPaxCh = pax_request[1].child;

    for( var i = 1; i <= maxLoopPaxAd; i++){
        
        var paxHotel = `<br>
            <label class="h6 text-colors-on"><b>Dewasa `+i+`</b></label><br>
            <div class="row ">
                <div class="form-group col-2">
                    <label for="type">Title: <span class="text-danger">*</span></label>
                    <select type="text" class="form-control" id="title_penumpang_ad`+i+`">
                        <option value="Mr."> Tuan </option>
                        <option value="Mrs."> Nyonya </option>
                        <option value="Ms."> Nona </option>
                    </select>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Isian ini wajib diisi.</div>
                </div>
                <div class="form-group col-5">
                    <label for="type">Nama Depan: <span class="text-danger">*</span></label>
                    <input class="form-control inputVal" id="first_name_ad`+i+`" name="first_name_ad`+i+`" type="text" value="" />
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Isian ini wajib diisi.</div>
                </div>
                <div class="form-group col-5">
                    <label for="type">Nama Belakang: <span class="text-danger">*</span></label>
                    <input class="form-control inputVal" id="last_name_ad`+i+`" name="last_name_ad`+i+`" type="text" value="" />
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Isian ini wajib diisi.</div>
                </div>
            </div>
            <div class="row ">
                <div class="form-group col-12">
                    <label for="type">Alamat: <span class="text-danger">*</span></label>
                    <textarea class="form-control inputVal" id="alamat`+i+`" name="alamat`+i+`" type="text" value="" row="3" ></textarea>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Isian ini wajib diisi.</div>
                </div>
            </div>`
        $("#list_penumpang_adult" ).removeClass('d-none')
        $("#list_penumpang_adult" ).append(paxHotel)

        $.LoadingOverlay("hide")
        $("#type_id_ad" + i).on('change',function(){

            var type = $(this).val();
            if(type == "Passport"){
                $("#ktp" + i).addClass('d-none')
                $("#ktp" + i).val('')
                $("#passport" + i).removeClass('d-none')
            }
            if(type == "KTP"){
                $("#ktp" + i).removeClass('d-none')
                $("#passport" + i).addClass('d-none')
            }
        })
    }

    for( var i = 1; i <= maxLoopPaxCh; i++){
        
    var paxHotel = `<br>

            <label class="h6 text-colors-on"><b> Anak `+i+`</b></label><br>
            <div class="row ">
                <div class="form-group col-2">
                    <label for="type">Title: <span class="text-danger">*</span></label>
                    <select type="text" class="form-control" id="title_penumpang_ch`+i+`">
                        <option value="MR">  Tuan </option>
                        <option value="MRS">  Nyonya </option>
                        <option value="MS">  Nona </option>
                    </select>
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Isian ini wajib diisi.</div>
                </div>
                <div class="form-group col-5">
                    <label for="type">Nama Depan: <span class="text-danger">*</span></label>
                    <input class="form-control inputVal" id="first_name_ch`+i+`" name="first_name_ch`+i+`" type="text" value="" />
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Isian ini wajib diisi.</div>
                </div>
                <div class="form-group col-5">
                    <label for="type">Nama Belakang: <span class="text-danger">*</span></label>
                    <input class="form-control inputVal" id="last_name_ch`+i+`" name="last_name_ch`+i+`" type="text" value="" />
                    <div class="valid-feedback">Valid.</div>
                    <div class="invalid-feedback">Isian ini wajib diisi.</div>
                </div>
            </div>
        </div>`
        $("#list_penumpang_child").removeClass('d-none')
        $("#list_penumpang_child").append(paxHotel)
    }
        var token_set = token['access_token']
        var url = fetch(mainurl +'hotel/price_policy',{
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token_set,
        },
        body: JSON.stringify({
            "hotel_id": hotel.hotel_id,
            "room_id": data_room.room_id,
            "breakfast": data_room.breakfast
        }),
        }).then((response) => response.json()).then((responseData) => {
        var hotel = responseData.data;
        console.log(hotel)
        // specialRequest(hotel.special_request_array)
        $.LoadingOverlay("hide")
            $("#name_hotel").replaceWith(hotel.hotel_name)  
            $("#name_room").replaceWith(hotel.room_name)  
            $("#harga_kamar").replaceWith(formatPrice(hotel.total_price))  
        });

function policyHotel(){
    $.LoadingOverlay("show")
    var hotel = JSON.parse(localStorage.getItem('data_hotel_search'))
    var data_room = JSON.parse(localStorage.getItem('data_room_hotel'))
   
        var token = JSON.parse(localStorage.getItem('data_token'))
        var token_set = token['access_token']
        var url = fetch(mainurl+'hotel/price_policy',{
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token_set,
        },
        body: JSON.stringify({
            "hotel_id": hotel.hotel_id,
            "room_id": data_room.room_id,
            "breakfast": "Room Only"
        }),
        }).then((response) => response.json()).then((responseData) => {
        var hotel = responseData;
        console.log(hotel)
            if(hotel.success == true){
                if(hotel.message == "Berhasil mendapatkan data price & policy"){
                    bookHotel()
                }else{
                    $.LoadingOverlay("hide")
                    toastr.error("Gagal mendapatkan data price & policy, silakan hubungi customer", "Error")
                }
            }else{
                $.LoadingOverlay("hide")
                toastr.error("Gagal mendapatkan data price & policy, silakan hubungi customer", "Error")
            }
        
        });
}

function bookHotel(){
    var hotel = JSON.parse(localStorage.getItem('data_hotel_search'))
    var data_room = JSON.parse(localStorage.getItem('data_room_hotel'))
    var pax_request = JSON.parse(localStorage.getItem('data_pax'))
    var maxLoopPaxAd = pax_request[0].adult;
    var maxLoopPaxCh = pax_request[1].child;
    var adl_train_pax =[]
        for (i = 1; i <= maxLoopPaxAd; i++){
            var type_ident = $("#title_penumpang_ad" + i).val();
            var first_name = $("#first_name_ad" + i).val();
            var last_name = $("#last_name_ad" + i).val();

            var paxDataAd = {
                "title": type_ident,
                "first_name": first_name,
                "last_name": last_name
            };

            adl_train_pax.push(paxDataAd)
        }

        // console.log(adl_train_pax);
        var ch_train_pax =[]
        for (i = 1; i <= maxLoopPaxCh; i++){
            var type_ident = $("#title_penumpang_ch" + i).val()
            var first_name = $("#first_name_ch" + i).val();
            var last_name = $("#last_name_ch" + i).val();
       
            var paxDataCh = {
                "title": type_ident,
                "first_name": first_name,
                "last_name": last_name
            };

            ch_train_pax.push(paxDataCh)
        }
    
        if(ch_train_pax == []){
            var all_pax = adl_train_pax; 
        }else{
            var all_pax = adl_train_pax.concat(ch_train_pax); 
        }
        console.log(all_pax)
        var phone = JSON.parse(localStorage.getItem('user_phone'))
        var email = JSON.parse(localStorage.getItem('user_email'))
        var token = JSON.parse(localStorage.getItem('data_token'))
        var token_set = token['access_token']
        var url = fetch(mainurl+'hotel/booking',{
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token_set,
        },
        body: JSON.stringify({
            "hotel_id": hotel.hotel_id,
            "room_id": data_room.room_id,
            "booking_type": "Issued",
            "pax_request": [
                {
                    "paxes":all_pax,
                    "is_smoking_room": false,
                    "phone": phone,
                    "special_request": null,
                    "email": email,
                    "request_description": ""
                }
            ],
            "bed_type": {
                "ID": null,
                "bed": null
            }
        }),
        }).then((response) => response.json()).then((responseData) => {
        var hotel = responseData;
        console.log(responseData)
           
            if(hotel.success == true){
                if(hotel.message == "Gagal melakukan booking hotel"){
                    $.LoadingOverlay("hide")
                    toastr.error("Gagal Booking Hotel, silakan hubungi customer", "Error")
                }else {
                    localStorage.setItem("transaction_id", JSON.stringify(hotel.data.transaction_id))
                    $.LoadingOverlay("hide")
                    var datahtml = `
                    <div class="modal fade sm-5" id="codeBookingModal" data-keyboard="false" data-backdrop="static">
                        <div class="modal-dialog modal-dialog-scrollable" style="margin-top:15%; height:300px;"><br>
                            <div class="modal-content text-center">
                                <div style="margin-top:5%;">
                                    <h4 class="text-colors-on"><b>Booking Success</b></h4>
                                <center>Invoice:<b> <br>`+ hotel.data.invoice_number +` </b></center>
                                <br>
                                <center>Time Limit : <b> <br>`+ hotel.data.time_limit +` </b></center>
                                <br>
                                </div>
                            
                                <div class="footer">
                                <button type="button" id="paymentHotel" class="btn btn-primary"><i class="fa fa-credit-card-alt mr-1"></i>Bayar Sekarang</button>
                                <button type="button" id="listOrderBooking" class="btn btn-primary"><i class="fa fa-shopping-cart mr-1"></i>Bayar Nanti</button>
                                </div>
                            </div>
                        </div>
                    </div>`
                    $("#codeBooking").append(datahtml)
                    $("#codeBookingModal").modal('show')

                    $("#listOrderBooking").on('click', function(){
                        window.location.href = "/listorder";
                    })

                    $("#paymentHotel").on('click', function(){
                        window.location.href = "/payment_method";
                    }) 
                }
            }else{
                $.LoadingOverlay("hide")
                toastr.error("Gagal Booking Hotel, silakan hubungi customer", "Error")
            }
        });
}

// function specialRequest(data_sp){
//     console.log(data_sp)
//     for(var i = 0; i <= data_sp.length; i++){
//         var no = i+1
//         setPaxLght = `
//         <div class="col-12" id="sp_form">
//             <div class="card p-3 mb-2 bg-body rounded">
//                 <div class="custom-control custom-checkbox">
//                 <input type="checkbox" class="custom-control-input check_box_sp" id="`+no+`" value="`+no+`" name="special_request"> 
//                     <label for="`+no +`" class="custom-control-label col-12">
//                         <div class="row">
//                             <div id="descrip"> <b>`+ data_sp[i].description +`</b></div>
//                             <input id="sp_id`+ no +`" value="`+data_sp[i].ID+`" hidden></input>
//                         </div>
//                     </label>
//                 </div>
//             </div> 
//         </div>`;
//         // $("#data_bagasi" ).removeClass('d-none')
//         $("#sp_check").append(setPaxLght);
//     }
        
// }

function chooseDataContact(){
    window.location.href = "/kaiwisata/list/contact";
}
</script>
@endpush