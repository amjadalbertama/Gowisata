@extends('layout.payment_proses')

@section('content')
<div class="container-fluid mt-100 main-font">
    <div class="row" id="body-sidemenu">
        <div id="main-content" class="col with-fixed-sidebar pb-5 pt-3" style="margin-top:20px;">
            <div class="container">
                <div class="row">
                    <div class="col-9 pt-2"><br>
                        <h5 class=" font-weight-normal text-center text-uppercase text-colors-on"> <b>Pilih Gerbong Kereta Wisata</b> </h5>
                                    <hr>
                        <!-- <div class="card shadow p-3 mb-5 bg-body rounded"> -->
                            <div class="card-body">
                                <div class="" id="list_krl_wisata">
                                </div>
                                <br><br>
                                <div class="row col-12 text-center">
                                        <div class="col-4"></div>
                                        <div id="btn_nx_kaiwis"></div>       
                                </div>
                            </div>
                        <!-- </div> -->
                    </div>
                    <div class="pt-2 col-3 d-none" id="detail_kaiwisata">
                        <div class="card shadow-sm col-12">
                            <div class="card-body">
                                <h5 class="text-colors-on"><b>Detail Pesanan</b></h5>
                                <hr>
                                <div>
                                    Jadwal : <div id="date_scadule"></div>
                                </div>
                                <hr>
                                <div>
                                    Rute : <div id="rute_asal"></div> -> <div id="rute_tujuan"></div><br>
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
    $("#list_wagon_navbar_train" ).addClass('text-colors-on')

    var scadule = JSON.parse(localStorage.getItem('data_scadule_wisata'));
    $("#rute_asal").replaceWith(scadule[0]['org']);
    $("#rute_tujuan").replaceWith(scadule[0]['des']);
    $("#date_scadule").replaceWith(scadule[0]['departure']);
    
    var token = JSON.parse(localStorage.getItem('data_token'));
        var token_set = token['access_token'];
        var url = fetch(mainurl +'train/list_wagon?wagon_id=&wagon_type=Wisata',{
        method: 'GET',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token_set,
        },
        }).then((response) => response.json()).then((responseData) => {
        var train = responseData.data;
        console.log(responseData)
        $("#booking_train").removeClass('d-none');
        $("#tabel_kereta_wisata").addClass('d-none');   
        $("#formKrlWisview").addClass('d-none');
        // $("#tabel_kereta_wisata").empty();
        
        $("#slct_kai_wisata_lb").removeClass('d-none');
        $("#formlistKrlWisata").removeClass('d-none');
        $("#detail_kaiwisata").removeClass('d-none');
        
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
                                    <div class="col-5">
                                        <div> Nama Gerbong:<b> `+train[i].name+`</b></div>
                                        <div id="descrip" style="maxLength: 10;"> service: <b>`+train[i].services+`</b></div><br>
                                        <div id="descrip" style="maxLength: 10;"> price: <b>`+ formatPriceWisKlbIst(train[i].estimated_price)+`</b></div><br>
                                        <a id="" style="font-size:15px;" href=""><b>Lihat</b><b class="text-colors-on"> Galery</b></a>
                                        <input id="capacit_list_wagon_wisata`+train[i].id +`" value="`+train[i].capacity+`" hidden></input>
                                    </div> 
                                </div>
                            </label>
                        </div>
                    </div> `;
                    $("#list_krl_wisata").append(setPaxLght);
                }
                // var str = ('#descrip').strLength(10)
                // var checkboxes = document.getElementsByName('kai_wisata_check');
                var limit = 1;
                $('.check_box_kai_wisata').on('change', function() {
                    if($("input[name='kai_wisata_check']:checked").length > limit) {
                        this.checked = false;
                    }
                });

                var btn_selct_krl = `<button class="btn col-4" id="" style="background-image: linear-gradient(red, rgb(251, 140, 1));" onclick="setIdKaiWisata()"><b class="text-white">Next</b></button>`
                $("#btn_nx_kaiwis").replaceWith(btn_selct_krl);
                //  var checkboxes = document.getElementsByName('kai_wisata_check');
                //  console.log(checkboxes.length)  
            });   

            function setIdKaiWisata(){

                var kai_val = $("input[name='kai_wisata_check']:checked").val();
                if(kai_val == null || kai_val == "" || kai_val == 0){
                    $.LoadingOverlay("hide")
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

                }else {
                    var capa_wagon = $("#capacit_list_wagon_wisata" + kai_val).val()
                    localStorage.setItem("capa_kai_wisata", JSON.stringify(capa_wagon))
                    localStorage.setItem("id_kai_wisata", JSON.stringify(kai_val))
                    setNameWisata()
                }
               
            }

            function setNameWisata(){
                $.LoadingOverlay("show")
                var di_wagon = $("input[name='kai_wisata_check']:checked").val();
                var token = JSON.parse(localStorage.getItem('data_token'));
                var token_set = token['access_token'];
                var url = fetch(mainurl+'train/list_wagon?wagon_id='+di_wagon+'&wagon_type=Wisata',{
                method: 'GET',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'Authorization': 'Bearer ' + token_set,
                },
                }).then((response) => response.json()).then((responseData) => {
                var train = responseData.data;
                localStorage.setItem("name_kai_wisata", JSON.stringify(train[0].name))
                chooseDataContact()
                }); 
            }

            function chooseDataContact(){
                window.location.href = "/kaiwisata/list/contact";
            }

            
</script>
@endpush