@extends('layout.payment_proses')

@section('content')
<div class="container-fluid mt-100 main-font">
    <div class="row" id="body-sidemenu">
        <div id="main-content" class="col with-fixed-sidebar pb-5 pt-3" style="margin-top:20px;">
            <div class="container">
                <div class="row">
                    <div class="col-12 pt-2">
                        <div class="card shadow p-3 mb-2 bg-body rounded" >
                            <div class="row">
                                <div class="col-12">
                                    <h1 class="h5 font-weight-normal text-uppercase "> <span class="fa fa-hotel fa-2x mr-2 text-colors-on"></span><b> <b id="title_hotel"></b> </b></h5>
                                    <b id="rating_hotel" class="text-colors-on" style="margin-top:-10px;"></b><br><br>
                                    <span class="fa fa-map-marker mr-1"></span> <b id="alamat_hotel" class=""></b><br><br>
                                    <div id="images_hotel" class="images_hotels"></div>
                                </div>
                            </div><br><br><br>
                            <div class="row">
                                <div class="form-group col-12 ">
                                    <label for="type">fasilitas:</label>
                                    <!-- <input list="asal_li" class="form-control inputVal" id="asal" name="asal" placeholder="Asal..." value="" disabled/> -->
                                    <datalist id="asal_li">
                                    </datalist>
                                    <div class="valid-feedback">Valid.</div>
                                    <div class="invalid-feedback-flightorg text-colors-block"></div>
                                </div>
                                <div class="form-group col-12">
                                    
                                </div>
                            </div>
                        </div>
                        <div class="card shadow p-3 mb-2 bg-body rounded" >
                            <div id="map" style="width:100%; height:400px;"></div>
                        </div>
                        <div class="p-1 mb-5 " id="formlistHotelRooms"></div>
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
    let kordinat = {}
    $.LoadingOverlay("show")
    $("#list_room_hotel" ).addClass('text-colors-on')
    var hotel = JSON.parse(localStorage.getItem('data_hotel_search'))
    var token = JSON.parse(localStorage.getItem('data_token'))
    console.log(hotel.tags)
        var token_set = token['access_token']
        var url = fetch(mainurl +'hotel/search_hotel',{
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token_set,
        },
        body: JSON.stringify({
            "tags": hotel.tags,
            "hotel_id": hotel.hotel_id,
            "city_id": hotel.city_id,
            "country_id": hotel.country_id,
            "check_in_date": hotel.check_in_date,
            "check_out_date": hotel.check_out_date,
            "guest_adult_amount": 1,
            "guest_child_amount": 0,
            "guest_child_ages": [],
            "guest_child_bed": false,
            "room_amount": 1,
            "is_paging": 1,
            "page": 1,
            "size": 10
        }),
        }).then((response) => response.json()).then((responseData) => {
            var hotel = responseData.data;
            var valid = responseData
            console.log(responseData)
            if(valid.success == true){
                if(valid.data != "no room found"){
                    $.LoadingOverlay("hide")
 
                    kordinat.latitude = hotel.latitude
                    kordinat.longitude = hotel.longitude

                    localStorage.setItem("data_kordinat", JSON.stringify(kordinat))
                    var img = `<img src="`+ hotel.rooms[0].image +`" alt="" height="90%" width="90%">`;
                    $("#images_hotel").append(img)
                    $("#title_hotel").replaceWith(hotel.name)
                    $("#alamat_hotel").append(hotel.address)

                    var ratings = hotel.rating
                    var roomAll = hotel.rooms

                    for(var i = 0; i < ratings; i++){
                        var bintang = `<span class="fa fa-star mr-1"></span>`;
                        $("#rating_hotel").append(bintang)
                    }
                    initMap()

                    for(var t = 0; t <roomAll.length; t++ ){

                        var no = t+1
                        setPaxLght = `
                            <div class="card shadow p-3 mb-2 bg-body rounded">
                                <label for="`+roomAll[t].ID+`" class="col-12" >
                                    <div class="row">
                                        <img src="`+ roomAll[t].image +`" alt="Logo" height="150" mt-n1 mr-2">
                                        <div class="col-8">
                                            <div> <h6><b class> `+roomAll[t].name+`</b></h6></div>
                                            <div id="descrip" style="maxLength: 10;">Fasilitas: `+roomAll[t].facilities[0]+`,`+roomAll[t].facilities[1]+`,`+roomAll[t].facilities[2]+`</div><br>
                                            <div id="descrip" style="maxLength: 10;">Rp.`+formatPrice(roomAll[t].price)+`</div><br> 
                                            <a id="" style="font-size:15px;" href="javascript:void(0);" onclick="pilihRooms(`+no+`)"><b class="text-colors-on"> Pilih</b></a>
                                            <input id="rooms_id`+no +`" value="`+roomAll[t].ID+`" hidden></input>
                                            <input id="room_breakfast`+no +`" value="`+roomAll[t].breakfast+`" hidden></input>
                                        </div> 
                                    </div>
                                </label>
                            </div> `;
                        $("#formlistHotelRooms").removeClass('d-none');
                        $("#formlistHotelRooms").append(setPaxLght);
                    }
                }else{
                    $.LoadingOverlay("hide")
                    var datahtml = `
                        <div class="modal fade sm-5" id="codeBookingModal" data-keyboard="false" data-backdrop="static">
                            <div class="modal-dialog modal-dialog-scrollable modal-ku" style="margin-top:15%;"><br>
                                <div class="modal-content text-center" >
                                    <div style="margin-top:5%;">
                                        <h4 class="text-colors-block"><b>Booking Failed</b></h4><br>
                                    <center>`+ valid.data+` </b></center>
                                    <br>
                                    </div><br>
                                
                                    <div class="footer">
                                        <button type="button" id="kembaliFailedBook" class="btn main-color"><b class="text-colors-off"></i>Kembali</b></button>
                                    </div>
                                </div>
                            </div>
                        </div>`
                    $("#codeBooking").append(datahtml)
                    $("#codeBookingModal").modal('show')

                    $("#kembaliFailedBook").on('click', function(){
                        window.location.href = "/home";
                    })
                }
            }else{
                $.LoadingOverlay("hide")
                var datahtml = `
                    <div class="modal fade sm-5" id="codeBookingModal" data-keyboard="false" data-backdrop="static">
                        <div class="modal-dialog modal-dialog-scrollable modal-ku" style="margin-top:15%;"><br>
                            <div class="modal-content text-center" >
                                <div style="margin-top:5%;">
                                    <h4 class="text-colors-block"><b>Booking Failed</b></h4><br>
                                <center>`+ valid.data+` </b></center>
                                <br>
                                </div><br>
                            
                                <div class="footer">
                                    <button type="button" id="kembaliFailedBook" class="btn main-color"><b class="text-colors-off"></i>Kembali</b></button>
                                </div>
                            </div>
                        </div>
                    </div>`
                $("#codeBooking").append(datahtml)
                $("#codeBookingModal").modal('show')

                $("#kembaliFailedBook").on('click', function(){
                    window.location.href = "/home";
                })
            }
        
        });

    function pilihRooms(id){
     
        var dataroom ={}
        var id_room = $("#rooms_id" + id).val();
        var breakfast_room = $("#room_breakfast" + id).val();
        dataroom.room_id = id_room
        dataroom.breakfast = breakfast_room
        localStorage.setItem("data_room_hotel", JSON.stringify(dataroom))

        detailsHotel()
    }

    function detailsHotel(){
        window.location.href = "/hotel/rooms";
    }
    

</script>
@endpush