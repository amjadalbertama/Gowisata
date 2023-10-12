@extends('layout.payment_proses')

@section('content')
<div class="container-fluid mt-100 main-font">
    <div class="row" id="body-sidemenu">
        <div id="main-content" class="col with-fixed-sidebar pb-5 pt-3"  style="margin-top:20px;">
            <div class="container">
                <div class="row">
                    <div class="col-9 pt-2"><br>
                        <h1 class="h5 font-weight-normal text-center text-uppercase text-colors-on"> <b>Pilih Gerbong Kereta Luar biasa</b></h5>
                                    <hr>
                        <!-- <div class="card shadow p-3 mb-5 bg-body rounded"> -->
                            <div class="card-body">
                                <div class="" id="list_krl_klb">
                                       
                                </div>
                                <br><br>
                                <div class="row col-12 text-center">
                                        <div class="col-4"></div>
                                        <div id="btn_nx_kaiwis"></div>  
                                </div>
                            </div>
                        <!-- </div> -->
                    </div>
                    <div class="pt-2 col-3 d-none" id="detail_kaiklb">
                        <div class="card shadow-sm col-12">
                            <div class="card-body">
                                <h5 class="text-colors-on"><b>Detail Pesanan</b></h5>
                                <hr>
                                <div>
                                    Jadwal : <div id="date_scadule"></div>
                                </div>
                                <hr>
                                <div>
                                    <div id="rute_asal"></div> <i class="fa fa-arrow-right mr-1 text-colors-on"></i><div id="rute_tujuan"></div><br>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div><!-- Main Col -->
    </div><!-- body-row -->
</div><!-- .container-fluid-->
<div id="modalValidate"></div>
@endsection

@push('scripts')
<script>
    $.LoadingOverlay("show")

    var scadule = JSON.parse(localStorage.getItem('data_scadule_luarbiasa'));
    $("#rute_asal").replaceWith(scadule[0]['org']);
    $("#rute_tujuan").replaceWith(scadule[0]['des']);
    $("#date_scadule").replaceWith(scadule[0]['departure']);

    $("#list_wagon_navbar_train" ).addClass('text-colors-on')
    var token = JSON.parse(localStorage.getItem('data_token'));
        var token_set = token['access_token'];
        var url = fetch(mainurl +'train/list_wagon?wagon_id=&wagon_type=Luar_Biasa',{
        method: 'GET',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token_set,
        },
        }).then((response) => response.json()).then((responseData) => {
        var train = responseData.data;
        console.log(train)
        $("#booking_train").removeClass('d-none');
        $("#tabel_kereta_wisata").addClass('d-none');   
        $("#formKrlWisview").addClass('d-none');
        // $("#tabel_kereta_wisata").empty();
        
        $("#slct_kai_wisata_lb").removeClass('d-none');
        $("#formlistKrlWisata").removeClass('d-none');
        $("#detail_kaiklb").removeClass('d-none');
        
            for (var i = 0; i < train.length; i++){
                // var data_train =  train[i];
                // console.log(pax_data)
                $.LoadingOverlay("hide")
                
                    var no = i+1
                    setPaxLght = `
                    <div class="card shadow p-3 mb-2 bg-body rounded">
                        <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input check_box_kai_wisata" id="`+train[i].id+`" value="`+train[i].id+`" name="kai_wisata_check"> 
                            <label for="`+train[i].id +`" class="custom-control-label col-12">
                                 <div class="row">
                                    <img src="`+ train[i].gallery_wagon[0] +`" alt="Logo" height="200" mt-n1 mr-2">
                                    <div class="col-8">
                                        <div> <h5><b class> `+train[i].name+`</b></h5></div>
                                        <div id="descrip" style="maxLength: 10;">`+train[i].services+`</div><br>
                                        <div id="descrip" style="maxLength: 10;"> Capacity: <b>`+train[i].capacity+`</b></div>
                                        <div id="descrip" style="maxLength: 10;"> Harga Estimasi: <b>`+formatPriceWisKlbIst(train[i].estimated_price)+`</b></div><br>
                                        <a id="" style="font-size:15px;" href=""><b>Lihat</b><b class="text-colors-on"> Galery</b></a>
                                        <input id="name_list_wagon_klb`+train[i].id +`" value="`+train[i].name+`" hidden></input>
                                        <input id="capacit_list_wagon_klb`+train[i].id +`" value="`+train[i].capacity+`" hidden></input>
                                    </div> 
                                </div>
                            </label>
                        </div>
                    </div> `;
                    $("#list_krl_klb").append(setPaxLght);
                }
                // var str = ('#descrip').strLength(10)
                // var checkboxes = document.getElementsByName('kai_wisata_check');
                var limit = 10;
                $('.check_box_kai_wisata').on('change', function() {
                    if($("input[name='kai_wisata_check']:checked").length > limit) {
                        this.checked = false;
                    }
                });

                var btn_selct_krl = `<button class="btn col-4" id="" style="background-image: linear-gradient(red, rgb(251, 140, 1));" onclick="setIdKaiklb()"><b class="text-white">Next</b></button>`
                $("#btn_nx_kaiwis").replaceWith(btn_selct_krl);
                //  var checkboxes = document.getElementsByName('kai_wisata_check');
                //  console.log(checkboxes.length)  
            });   

            function setIdKaiklb(){

                var kai_val = $("input[name='kai_wisata_check']:checked");
                if(kai_val == null || kai_val == "" || kai_val == 0){

                    var datahtml = `
                        <div class="modal fade" id="validateModal" data-keyboard="false" data-backdrop="static">
                            <div class="modal-dialog modal-sm modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-colors-block">Pemberitahuan!</h5>
                                        <button type="button" class="close" data-dismiss="modal" onclick="closeModalvalidateKlb()">×</button>
                                    </div>
                                    <div class="modal-body">
                                    <center><b class="text-color-block"><h6>Anda belum memilih Kereta!</h6></b></center>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light" data-dismiss="modal"><i class="fa fa-times mr-1" onclick="closeModalvalidateKlb()"></i>Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `
                    $("#modalValidate").replaceWith(datahtml)
                    $("#validateModal").modal('show')
                    
                }else if(kai_val.length < 4){
                    var datahtml = `
                        <div class="modal fade" id="validateModal" data-keyboard="false" data-backdrop="static">
                            <div class="modal-dialog modal-sm modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-colors-block">Pemberitahuan!</h5>
                                        <button type="button" class="close" data-dismiss="modal" onclick="closeModalvalidateKlb()">×</button>
                                    </div>
                                    <div class="modal-body">
                                    <center><b class="text-color-block"><h6>Anda harus memilih minimal 4 kereta!</h6></b></center>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light" data-dismiss="modal"><i class="fa fa-times mr-1" onclick="closeModalvalidateKlb()"></i>Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    `
                    $("#modalValidate").replaceWith(datahtml)
                    $("#validateModal").modal('show')
                }else{
                    idwagon = []
                // name_wagon = []
                    for (var i = 0; i < kai_val.length; i++) {
                        var names = $("#name_list_wagon_klb" + kai_val[i].value).val()
                        var capa_wagon = $("#capacit_list_wagon_klb" + kai_val[i].value).val()
                        var checkbox = kai_val[i].value;
                        var data_id_wagon = {
                            "id_wagon": kai_val[i].value,
                            "name_wagon":names,
                            "capa_wagon":capa_wagon,
                        };  
                        idwagon.push(data_id_wagon)   
                    }
                    // console.log(idwagon);
                    localStorage.setItem("id_kai_klb", JSON.stringify(idwagon));
                    chooseDataContact()
                }
            }

            function closeModalvalidateKlb() {
                $("#validateModal").on("hidden.bs.modal", function(e) {
                    $("#validateModal").replaceWith(`<div id="modalValidate"></div>`)
                })
            }

            function chooseDataContact(){
                window.location.href = "/kaiklb/list/contact";
            }

            
</script>
@endpush