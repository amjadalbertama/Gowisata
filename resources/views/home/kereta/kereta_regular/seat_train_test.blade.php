@extends('layout.payment_proses')

@section('content')
<div class="container-fluid mt-100 main-font">
    <div class="row" id="body-sidemenu">
        <div id="main-content" class="col with-fixed-sidebar pb-5 pt-3">
            <div class="container">
                <div class="row">
                    <!-- <div class="col-10 text-center pt-5">
                        <h5>Jumbotron</h5>
                    </div>  -->
                  
                    <div class="col-12 pt-2">
                        <div class="card shadow p-3 mb-5 bg-body rounded">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-12">
                                        <h1 class="h5 font-weight-normal text-center text-uppercase text-colors-on"> <b>Pilih Kursi Kereta</b> </h5>
                                        <hr>
                                        <br>
                                        <div class="row">
                                            <div class="col-1">

                                            </div>
                                            <div class="col-4">
                                                <div class="card shadow-sm col-12">
                                                    <div class="card-body">
                                                        <h5 class="text-colors-on"><b> Detail Booking Kereta Regular</b></h5>
                                                        <hr>
                                                        <div>
                                                            Pemesan : <b><div id="name_pemesan"></div></b>
                                                        </div>
                                                        <div>
                                                            Nama Kereta: <b><div id="name_train"></div></b>
                                                        </div>
                                                        <div>
                                                            Kode Booking : <b><div id="code_book"></div></b>
                                                        </div>
                                                        <div>
                                                            Batas Waktu : <b><div id="time_limit"></div></b>
                                                        </div>
                                                        <div>
                                                            Harga Total :  <b>Rp. <div id="total_price"></div></b>
                                                        </div>
                                                        <hr>
                                                        <div>
                                                            <div id="name_produk"></div>
                                                        </div>
                                                        <div>
                                                            <div id="rute_asal"></div>  <i class="fa fa-arrow-right mr-1 "></i> <div id="rute_tujuan"></div><br>
                                                        </div>
                                                    </div>
                                                </div><br>
                                                <div class="card shadow-sm col-12">
                                                    <div class="card-body">
                                                        <h5>List Penumpang dan gerbong</h5>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="form-group col-8">
                                                                <label for="">Pilih Penumpang : </label>
                                                                <select class="form-control form-control-sm" id="list_pax" name="" value="2">

                                                                </select>
                                                            </div>
                                                            <div class="form-group col-4">
                                                                <div>
                                                                    Kursi : <b><div id="no_kursi"></div></b>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="map_seat" class="col-5 pt-2 d-none" style=" border: 4px solid; border-radius: 5px; border-color: rgb(251, 140, 1); margin-left:30px; overflow-x: scroll; height: 800px;">
                                                    <div class="row" id="main"> 
                                                        
                                                    </div>
                                            </div>
                                        </div>
                                    </div> 
        
                                <div class="row col-12 pt-5">
                                    <div class="col-3">
                                    </div>
                                    <div class="col-3">
                                        <button class="btn btn-block  md-auto top-100 start-50 main-color" onclick="simpanAbayar()"><b class="text-colors-off"><i class="fa fa-credit-card-alt mr-2"></i>Simpan, lanjut Bayar</b> </button>
                                    </div>
                                    <div class="col-3">
                                        <button class="btn btn-block  md-auto top-100 start-50 main-color" onclick="bayarNanty()"><b class="text-colors-off"><i class="fa fa-shopping-cart mr-2"></i>Simpan, bayar nanti</b></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- .row -->
            </div>
        </div><!-- Main Col -->
    </div><!-- body-row -->
</div><!-- .container-fluid-->
<div id="modalConfirmSeatKrlReg"></div>
<div id="modalConfirmSeatKrlRegsimpan"></div>
<!-- <div id="codeBooking"></div> -->
@endsection

@push('scripts')
<script>
    $.LoadingOverlay("show")
    $("#data_pax_navbar_train_reg" ).addClass('text-colors-on')
    $("#seat_navbar_train" ).addClass('text-colors-on')
    //Details Info Order Kereta
    var data_train = JSON.parse(localStorage.getItem('data_train_depart'))
    var token = JSON.parse(localStorage.getItem('data_token'));
    var code_dpart= JSON.parse(localStorage.getItem('code_book_krl_reg'));

    var name_pemesan = JSON.parse(localStorage.getItem('name_auth'));
    $("#name_pemesan").replaceWith(name_pemesan);
    var token_set = token['access_token'];
    var url = fetch('https://api-gowisata.aturtoko.site/api/train/booking_detail',{
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token_set,
        },
        body: JSON.stringify({
            "booking_code": code_dpart,
            
        }),
        }).then((response) => response.json()).then((responseData) => {
        var train = responseData.data;
        console.log(train)
     
        var time =  train.time_limit ;
        var nomorKursi =  train.route_info[0].ticket[0].seat ;
        var name_pax =  train.name ;
        var code_book =  train.gds_book_code ;
        var name_krl =  train.route_info[0].transporter_name ;
        var tot_price =  train.route_info[0].total_price ;
        var org =  train.route_info[0].org ;
        var des =  train.route_info[0].des ;
        var pax_info =  train.pax_info ;
     
              $("#code_book").replaceWith(code_book);
              $("#name_train").replaceWith(name_krl);
              $("#time_limit").replaceWith(time);
              $("#total_price").replaceWith(tot_price);
              $("#rute_asal").replaceWith(org);
              $("#rute_tujuan").replaceWith(des);
              var no_kursi = `<div id="no_kursi">`+ nomorKursi +`</div>`;
              $("#no_kursi").replaceWith(no_kursi);
    
            var kursi = [];
            for (var i = 0; i < pax_info.length; i++){
                var pax_data =  pax_info[i];
                var tes = train.route_info[0].ticket[i]
                // var cam = tes.filter(t => t.seat !== '')
                if(tes.seat !== ""){
                    var cam = train.route_info[0].ticket[i].seat
                }
                if(pax_info[i].pax_type == "Adult" ){
                    var no = i+1
                    setPaxLght = '<option value="'+ no +'">'+ no +'-'+ pax_info[i].pax_name +'</option>';
                    $("#list_pax").append(setPaxLght);

                    var dataKursi = {
                        "nomer_kursi": cam
                    };
                    kursi.push(dataKursi)
                }
            }
            localStorage.setItem("data_seat", JSON.stringify(kursi))
        });

        $("#list_pax").on("change", function(){
            var id_pax = $("#list_pax").val();
            var kursi = JSON.parse(localStorage.getItem('data_seat'));
            for(i = 0; i < kursi.length; i++){
                var nos = i+1
                if(id_pax == nos){
                    var tes = nos-1
                    var seat = kursi[tes].nomer_kursi
                    var no_kursi = `<div id="no_kursi">`+ seat +`</div>`;
                    $("#no_kursi").replaceWith(no_kursi)
                }
            }
        })
    //Pax Kereta Reg

        function getSeatPax(seats){
           if(seats.seat != ''){
                var n_seat = seats.seat
           }
           return n_seat
        }

    var url = fetch('https://api-gowisata.aturtoko.site/api/train/seat_map',{
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token_set,
        },
        body: JSON.stringify({
            "booking_code": code_dpart,
        }),
      }).then((response) => response.json()).then((responseData) => {
        var tesseat = responseData.data.seat_map
        console.log(responseData)
        $("#map_seat").removeClass("d-none")
        $.LoadingOverlay("hide")
        for(var i = 0; i < tesseat.length; i++){
            var n = tesseat[i];
            // console.log(n)
            var nn = '<option value="'+ n[1] +'"> '+ n[0] +' - '+ n[1] +' <input id="no_ger'+n[1]+'" value="'+i+'"></input></option>';
            $("#wagon").append(nn);
        }
          const seatMap = responseData.data.seat_map;
          for (let train = 0; train < seatMap.length; train++) {
            console.log(seatMap[train]);
            const maxRow = Math.max(...seatMap[train][2].map(seat => seat[0]));
            const maxCol = Math.max(...seatMap[train][2].map(seat => seat[1]));
            const table = document.createElement("table");
            const div = document.createElement("div");
            div.innerHTML = '<h5><b style="margin-left: 40%;">Gerbong-'+seatMap[train][1]+' '+seatMap[train][0]+'</b> <br></h5>';
            table.createCaption().innerHTML = '<hr>' ;
            table.setAttribute('class', 'table w-auto sm-1');
            table.style.border = "none";
            table.setAttribute('id', seatMap[train][0]+seatMap[train][1]);
           
            for (let row = 1; row <= maxRow; row++) {
              const tr = document.createElement("tr");
              for (let col = 1; col <= maxCol; col++) {
                const td = document.createElement("td");
                td.setAttribute('class', 'text-center')
                const seat = seatMap[train][2].find(seat => seat[0] == row && seat[1] == col);
                let btn = document.createElement('button');
                btn.className = 'btn btn-primary w-100';
                btn.innerHTML = seat ? seat[0]+seat[3] : 'X';
                btn.onclick = function(){
                    changeSeatKai(btn.innerHTML , seatMap[train][1], seatMap[train][0])
                    }
                if (seat && (seat[5] === 1)) {
                  btn.disabled = true;
                  td.appendChild(btn);
                  btn.style.backgroundColor = "grey";
                  btn.className = 'btn w-100';
                  var seat_data = JSON.parse(localStorage.getItem('data_seat'));
                  for(let i = 0; i < seat_data.length; i++){
                    if(seatMap[train][1] == seatPaxOn()[i]['gerbong']){
                        if(btn.innerHTML == seatPaxOn()[i]['seats']){
                            btn.style.backgroundColor = "orange";
                            btn.className = 'btn w-100';
                            btn.innerHTML = seatPaxOn()[i]['no_pax'];
                        }
                    }
                  }
                } else if (!seat) {
                  btn.disabled = true;
                } else {
                  td.appendChild(btn);
                  btn.disabled = false;
                }
                tr.appendChild(td);
              }
              table.appendChild(tr);
            }
            div.appendChild(table)
            document.getElementById('main').appendChild(div);
          }
    });

   

    function seatPaxOn(){
        var seat_data = JSON.parse(localStorage.getItem('data_seat'));
        var changeSeat = [];
        for(var i = 0; i < seat_data.length; i++){
            var seats = seat_data[i].nomer_kursi.split("/")[1];
            var gerbongSet = seat_data[i].nomer_kursi.split("/")[0];
            var gerbong = gerbongSet.split("-")[1];
            var class_gerbong = gerbongSet.split("-")[0];
            var no_pax = i+1

            var data = {
                no_pax,
                seats,
                gerbong,
                class_gerbong
            }
            changeSeat.push(data)
        }
        localStorage.setItem("data_seat_loop", JSON.stringify(changeSeat))
        return changeSeat
   
    }

    function changeSeatKai(seat, no_wagon, code_wagon){
        var name_pax = $("#list_pax").val()
        // var no = nwag + 1
            var datahtml = `
                <div class="modal fade sm-5" id="modalConfirmSeat" data-keyboard="false" data-backdrop="static">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-colors-on" style="margin-left: 10%px;"><b>Change Seat Confirmation</b></h5>
                                <button type="button" class="close" data-dismiss="modal" onclick="closeModalDetailChgSeat()">×</button>
                            </div><br>
                            <center><b>Pastikan pilihan tempat duduk anda sesuai!</b></center>
                            <br>
                            <center><b>Penumpang: `+ name_pax +`</b></center>
                            <center><b>Yakni Gerbong `+ no_wagon +`-`+ code_wagon +` dengan kursi No: `+ seat +` !</b></center>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" id="bottonBook" onclick="okChangeSeat()"><b class="text-colors-off"><i class="fa fa-check mr-1"></i>Ya</b></button>
                                <input class="form-control inputVal" id="seatKai" name="" type="text" value="`+seat+`" hidden/>
                                <input class="form-control inputVal" id="nos_wagon" name="" type="text" value="`+no_wagon+`" hidden/>
                                <input class="form-control inputVal" id="codes_wagon" name="" type="text" value="`+code_wagon+`" hidden/>
                                <button type="button" class="btn btn-light" data-dismiss="modal" onclick="closeModalDetailChgSeat()"><i class="fa fa-times mr-1"></i>Kembali</button>
                            </div>
                        </div>
                    </div>
                </div> `
            $("#modalConfirmSeatKrlRegsimpan").replaceWith(datahtml)
            $("#modalConfirmSeat").modal('show')
    }

    function closeModalDetailChgSeat() {
        $("#modalConfirmSeat").on("hidden.bs.modal", function(e) {
            $("#modalConfirmSeat").replaceWith(`<div id="modalConfirmSeatKrlRegsimpan"></div>`)
        })
    }

   function okChangeSeat(){
        $.LoadingOverlay("show")
      
        var seat_data = JSON.parse(localStorage.getItem('data_seat'));

        var c_wagon = [];
        var stateSeat = [];
        var no_wagon = [];

        for(var i = 0; i <seat_data.length; i++){
            var pax = $("#list_pax").val();
            var no = i+1

            if(pax == no){
                var seats =  $("#seatKai").val()
                var no_wag = $("#nos_wagon").val()
                var code_wag = $("#codes_wagon").val()
            }else {
                var seats = seat_data[i].nomer_kursi.split("/")[1];
                var gerbongSet = seat_data[i].nomer_kursi.split("/")[0];
                var gerbong = gerbongSet.split("-")[1];
                var class_gerbong = gerbongSet.split("-")[0];

                var no_wag = gerbong
                var code_wag = class_gerbong
            }

            var dataKursi = { seats,}
            // changeSeat.push(dataKursi)
            stateSeat.push(seats)
            no_wagon.push(no_wag)
            c_wagon.push(code_wag)
        }

        
        var code_book = JSON.parse(localStorage.getItem('code_book_krl_reg'));
        var token = JSON.parse(localStorage.getItem('data_token'));
        var token_set = token['access_token']
        var url = fetch('https://api-gowisata.aturtoko.site/api/train/change_seat',{
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token_set,
        },
        body: JSON.stringify({
                    "booking_code": code_book,
                    "wagon_code": c_wagon,
                    "wagon_no": no_wagon,
                    "seat": stateSeat
            }),
        }).then((response) => response.json()).then((responseData) => {
        var train = responseData.data;
        console.log(train)
     
        location.reload();

        });
    }

   function simpanAbayar(){
        window.location.href = "/payment_method";
    }
    function bayarNanty(){
        window.location.href = "/listorder";
    }
</script>
@endpush