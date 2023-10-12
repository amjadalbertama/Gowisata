function formDgtGoodview(){

    $("#formOdrPesawat").empty();
    $("#formDgtGoodview").empty();
    $("#formDgtGoodview").removeClass('d-none');
    $("#formKrlRegview").empty();
    $("#formOdrHotelview").addClass('d-none');
    $("#formKrlWisview").empty();
    $("#formKrlWisview").addClass('d-none');
    $("#formKrlLuarBiasaview").addClass('d-none');
    $("#formKrlIstview").addClass('d-none');
    $("#formKrlReg").empty();
    $("#formKrlRegview").empty();
    $("#digitalGoods").addClass('text-warning'); 
    $("#sideKrlWis").removeClass('text-warning'); 
    $("#sideKrlReg").removeClass('text-warning'); 
    $("#sideOdrPesawat").removeClass('text-warning'); 
    $("#sideKrlLuarBiasa").removeClass('text-warning'); 
    $("#sideKrlIstimewa").removeClass('text-warning'); 
    $("#sideHotel").removeClass('text-warning'); 

    $("#tabel_Pesawat").addClass('d-none'); 
    $("#tabel_kereta").addClass('d-none'); 

                var datahtml = `
                    <h1 class="h6 font-weight-normal text-center text-uppercase "> <b>DIGITALS GOODS</b> </h1>
                    <hr>
                    <div class="row">
                        <div class="form-group col-5">
                            <label for="type">Asal: <span class="text-danger">*</span></label>
                            <input list="asal_train_wis" class="form-control inputVal" id="asalKrlWis" name="asalKrlWis" placeholder="Asal..." value="" />
                            <datalist id="asal_train_wis">
                               
                            </datalist>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Isian ini wajib diisi.</div>
                        </div>
                        <div class="form-group col-5">
                            <label for="status">Tujuan: <span class="text-danger">*</span></label>
                            <input list="tujuan_train_wis" class="form-control inputVal" id="tujuanKrlWis" name="tujuanKrlWis" placeholder="Tujuan.." value=""/>
                            <datalist id="tujuan_train_wis">
                               
                            </datalist>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Isian ini wajib diisi.</div>
                        </div>
                        <div class="form-group col-2" style="margin-top: 30px;">
                            <a href=""><i class="fa fa-refresh fa-2x"></i></a>
                        </div>
                    </div>
                    <!-- <br> -->
                    <div class="row">
                        <div class="form-group col-3">
                            <label for="type">Tanggal Berangkat: <span class="text-danger">*</span></label>
                            <input  class="form-control inputVal" type="date" id="type" name="type" value="" />
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Isian ini wajib diisi.</div>
                        </div>
                        <div class="form-group col-3">
                            <label for="type">Tanggal Pulang: </label>
                            <input  class="form-control inputVal" type="date" id="type" name="type" value="" />
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback">Isian ini wajib diisi.</div>
                        </div>
                        <div class="form-group col-4">
                            <label for="">Kereta:</label>
                            <select type="text" class="form-control">
                            <option value="" selected disabled class="text-center"> <-- Pilih Kereta--> </option>
                            <option value="" > Kereta Wisata Bali </option>
                            <option value="" > Kereta Wisata Imperial </option>
                            <option value="" > Kereta Wisata Jawa </option>
                            <option value="" > Kereta Wisata Nusantara  </option>
                            <option value="" > Kereta Wisata priority </option>
                            <option value="" > Kereta Wisata Retro </option>
                            <option value="" > Kereta Wisata Sumatra </option>
                            <option value="" > Kereta Wisata Toraja </option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-5">
                            
                        </div>
                        <button class="btn btn-primary btn-block col-2 md-auto top-100 start-50" onclick="cariTiketKereta()">Cari Tiket</button>
                    </div> `
            $("#formDgtGoodview").append(datahtml)     

            $('#adult').keyup(function(){
                var dul = $(this).val();
                var inf = $('#infant').val()
                if(inf > dul){

                    $("#adult").addClass("is-invalid")
                    $("#adult").addClass("border-danger")
                    $(".invalid-feedback-adult").css("display", "block").html("jumlah Dewasa tidak boleh kurang dari jumlah Balita!")
                    
                   }else if(inf <= dul){

                    $("#adult").removeClass("is-invalid")
                    $("#adult").removeClass("border-danger")
                    $(".invalid-feedback-adult").css("display", "none").html()

                    $("#infant").removeClass("is-invalid")
                    $("#infant").removeClass("border-danger")
                    $(".invalid-feedback-infant").css("display", "none").html()
                   }
            })

            $('#infant').keyup(function(){
                var inf = $(this).val();
                var dul = $('#adult').val()

               if(inf > dul){
                $("#infant").addClass("is-invalid")
                $("#infant").addClass("border-danger")
                $(".invalid-feedback-infant").css("display", "block").html("jumlah Balita tidak boleh lebih dari jumlah Dewasa!")

               }else if(inf <= dul){
                $("#infant").removeClass("is-invalid")
                $("#infant").removeClass("border-danger")
                $(".invalid-feedback-infant").css("display", "none").html()

                $("#adult").removeClass("is-invalid")
                $("#adult").removeClass("border-danger")
                $(".invalid-feedback-adult").css("display", "none").html()
               }
            })

            // var dewasa = $('#adult').val()
            // console.log(dewasa)
            // if(){

            // }

            $('#flexRadioDefault1').on('click', function(e){
                $("#endDate").attr('hidden', 'hidden')
                // console.log("on")
            })

            $('#flexRadioDefault2').on('click', function(e){
                $("#endDate").removeAttr('hidden')
                // console.log("off")
            })
           
            $("#asalKrlReg").keyup(function(){

                var asalText = $(this).val();
                var token = JSON.parse(localStorage.getItem('data_token'))
                var token_set = token['access_token']
                var url = fetch(mainurl+'train/station_all?sort_by=&order=&page=1&per_page=1000000&search='+ asalText,{
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + token_set,
                    },
                  }).then((response) => response.json()).then((responseData) => {
                    var asal = responseData.data;
                    console.log(asal);
                    var setPort = "";
                        $("#asal_train_reg").empty();
                        for (var i = 0; i < asal.length; i++)
                        {
                            setPort += '<option value="' + asal[i].code + '">'+ asal[i].name +'</option>';
                        }
                        $("#asal_train_reg").append(setPort);
    
                  });
            }); 

            $("#tujuanKrlReg").keyup(function(){

                var searchText = $(this).val();
                var token = JSON.parse(localStorage.getItem('data_token'))
                var token_set = token['access_token']
                var url = fetch(mainurl + 'train/station_all?sort_by=&order=&page=1&per_page=1000000&search='+ searchText,{
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json',
                        'Content-Type': 'application/json',
                        'Authorization': 'Bearer ' + token_set,
                    },
                  }).then((response) => response.json()).then((responseData) => {
                    var tujuan = responseData.data;
                    console.log(tujuan);
                    var endPort = "";
                        $("#tujuan_train_reg").empty();
                        for (var i = 0; i < tujuan.length; i++)
                        {
                            endPort += '<option value="' + tujuan[i].code + '">'+ tujuan[i].name +'</option>';
                        }
                        $("#tujuan_train_reg").append(endPort);
    
                  });
            }); 
           
}