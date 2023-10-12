@extends('layout.payment_proses')

@section('content')
<div class="container-fluid mt-100">
    <div class="row" id="body-sidemenu">
        <div id="main-content" class="col with-fixed-sidebar pb-5 pt-3" style="margin-top:20px;">
            <div class="container">
                <div class="row">
                    <div class="col-9 pt-2"><br>
                        <h6 class="font-weight-normal text-center text-uppercase text-colors-on"> <b>Pilih Kontak Pemesan</b> </h6>
                                    <hr>
                        <!-- <div class="card shadow p-3 mb-5 bg-body rounded"> -->
                            <div class="card-body">
                                <div class="" id="formlistKontak">
                                         
                                </div>
                            </div>
                            <div id="pax_kaiwisata" class="card-body pt-1 d-none">
                                <div class="card shadow p-4 bg-body rounded">
                                    <div class="form-group col-4">
                                        <label class="">Total Maksimum Jumlah Penumpang:</label>
                                        <input id="capacity" type="number" class="form-control " name="capacity" placeholder="" value="" disabled>
                                        <div class="valid-feedback">Valid.</div>
                                        <div class="invalid-feedback namecat">Please fill out this field.</div>
                                    </div>
                                </div><br>
                            </div>
                        <!-- </div> -->
                        <!-- <div class="row"> -->
                            <center>
                                <div id="btn_save_cont"></div>
                                <div id="btn_nx_kaiwis"></div>
                            </center>
                            <!-- <div id="skaiwis"class="col-9"></div> -->
                        <!-- </div> -->
                    </div>
                    
                    <div class="pt-2 col-3 d-none" id="detail_kaiwisata">
                        <div class="card shadow-sm col-12">
                        <div class="card-body">
                                <h5 class="text-colors-on"> <b>Detail Pesanan</b></h5>
                                <hr>
                                <div>
                                    Jadwal : <div id="date_scadule"></div>
                                </div>
                                <div>
                                    Kereta : <div id="train1"></div>
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
<div id="modalBooking"></div>
<div id="codeBooking"></div>
<div id="modalAddContact"></div>
@endsection

@push('scripts')
<script>
    $.LoadingOverlay("show")
    $("#list_wagon_navbar_train" ).addClass('text-colors-on')
    $("#data_pax_navbar_train" ).addClass('text-colors-on')
    
    var name_kai_side = JSON.parse(localStorage.getItem('id_kai_klb'));
    var scadule_side = JSON.parse(localStorage.getItem('data_scadule_luarbiasa'));
    $("#rute_asal").replaceWith(scadule_side[0]['org']);
    $("#rute_tujuan").replaceWith(scadule_side[0]['des']);
    $("#date_scadule").replaceWith(scadule_side[0]['departure']);
    $("#train1").replaceWith(listGerbongKlb(name_kai_side));
    // if(name_kai_side[0] != null){
    //     $("#train1").replaceWith(name_kai_side[0]['name_wagon']);
    //     var namekai1 = name_kai_side[0]['name_wagon']
    //     var cap1 = parseInt(name_kai_side[0]['capa_wagon']);
    // }else{
    //     $("#train1").replaceWith("")
    //     var namekai1 = ""
    //     var cap1 = 0
    // }
    // if(name_kai_side[1] != null){
    //     $("#train2").replaceWith(name_kai_side[1]['name_wagon']);
    //     var namekai2 = name_kai_side[1]['name_wagon']
    //     var cap2 = parseInt(name_kai_side[1]['capa_wagon']);
    // }else{
    //     $("#train2").replaceWith("")
    //     var namekai2 = ""
    //     var cap2 = 0
    // }
    // if(name_kai_side[2] != null){
    //     $("#train3").replaceWith(name_kai_side[2]['name_wagon']);
    //     var namekai3 = name_kai_side[2]['name_wagon']
    //     var cap3 = parseInt(name_kai_side[2]['capa_wagon']);
    // }else{
    //     $("#train3").replaceWith("")
    //     var namekai3 = ""
    //     var cap3 = 0
    // }
    // if(name_kai_side[3] != null){
    //     $("#train4").replaceWith(name_kai_side[3]['name_wagon']);
    //     var namekai4 = name_kai_side[3]['name_wagon']
    //     var cap4 = parseInt(name_kai_side[3]['capa_wagon']);
    // }else{
    //     $("#train4").replaceWith("")
    //     var namekai4 = ""
    //     var cap4 = 0
    // }

    // var cap_tot = cap1+cap2+cap3+cap4;
    $("#capacity").val(jumlahMaxPax(name_kai_side));

        var token = JSON.parse(localStorage.getItem('data_token'));
        var token_set = token['access_token'];
        var url = fetch(mainurl +'train/list_contact',{
        method: 'GET',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token_set,
        },
    }).then((response) => response.json()).then((responseData) => {
        var contact = responseData.data;
        $("#detail_kaiwisata").removeClass('d-none');
        console.log(contact)
        if(contact == 0 || contact == null || contact == ""){
            $.LoadingOverlay("hide")
            setPaxLght = `
            <div class="card shadow p-3 mb-2 bg-body rounded">
                <center>
                    <div> Data Kontak Belum Ada! </div>
                </center>
            </div> `;
            $("#formlistKontak").append(setPaxLght);
            var btn_save_cont = `<button type="button" class="btn px-4 mr-2" id="" style="background-image: linear-gradient(red, rgb(251, 140, 1));" onclick="enableLoading(); addContact()"><b class="text-white">Add Contact</b></button>`
            $("#btn_save_cont").replaceWith(btn_save_cont);
        }else if(contact.success == true || contact != null){
            $.LoadingOverlay("hide")
            $("#pax_kaiwisata").removeClass('d-none');
            for(var i = 0; i < contact.length; i++){
                //  var cube = asal[i];
                //  for(var t = 0; t < cube.length; t++){
                console.log(contact[i])
                setSchedule = `<div class="card shadow p-3 mb-2 bg-body rounded">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input check_box_list_contact" id="`+contact[i].id+`" value="`+contact[i].id+`" name="list_kontak_check"> 
                                        <label for="`+contact[i].id +`" class="custom-control-label">
                                            <div> Nama: `+contact[i].name+` <input id="name_contact`+contact[i].id +`" value="`+contact[i].name+`" hidden></input></div>
                                            <div id="" style="maxLength: 10;"> Email: `+contact[i].email+`</div>
                                            <div id="" style="maxLength: 10;"> Phone: `+contact[i].phone+`</div>
                                            <div id="" style="maxLength: 10;"> Nama perusahaan: `+contact[i].company_name+`</div>
                                            <div id="" style="maxLength: 10;"> Alamat perusahaan: `+contact[i].company_address+`</div>
                                        </label>
                                    </div>
                                </div> `;
                $("#formlistKontak").append(setSchedule);
                    }
                var limit = 1;
                $('.check_box_list_contact').on('change', function() {
                    if($("input[name='list_kontak_check']:checked").length > limit) {
                        this.checked = false;
                    }
                });

            var btn_selct_krl = `<button type="button" class="btn col-3 mr-2 shadow" id="" style="background-image: linear-gradient(red, rgb(251, 140, 1));" onclick="enableLoading(); setIdContact(); createOrderCheck() "><b class="text-white">Create Order</b></button>`
            $("#btn_nx_kaiwis").replaceWith(btn_selct_krl);

            var btn_save_cont = `<button type="button" class="btn col-3 mr-2 shadow" id="" style="background-image: linear-gradient(red, rgb(251, 140, 1));" onclick="enableLoading(); addContact()"><b class="text-white">Add Contact</b></button>`
            $("#btn_save_cont").replaceWith(btn_save_cont);
        }
        
    });    

    function setIdContact(){
        var id_contact = $("input[name='list_kontak_check']:checked").val();
        if(id_contact == null || id_contact == "" || id_contact == 0){
            var datahtml = `
                        <div class="modal fade" id="validateModal" data-keyboard="false" data-backdrop="static">
                            <div class="modal-dialog modal-sm modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title text-colors-block">Pemberitahuan!</h5>
                                        <button type="button" class="close" data-dismiss="modal" onclick="closeModalvalidateKlb()">×</button>
                                    </div>
                                    <div class="modal-body">
                                    <center><b class="text-color-block"><h6>Anda belum memilih kontak Pemesan!</h6></b></center>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-light" data-dismiss="modal"><i class="fa fa-times mr-1" onclick="closeModalvalidateKlb()"></i>Cancel</button>
                                    </div>
                                </div>
                            </div>
                        </div>`
            $("#modalValidate").replaceWith(datahtml)
            $("#validateModal").modal('show')
        }else{
            localStorage.setItem("id_contact_wisata", JSON.stringify(id_contact))
        }
    }

    function closeModalvalidateKlb() {
        $("#validateModal").on("hidden.bs.modal", function(e) {
            $("#validateModal").replaceWith(`<div id="modalValidate"></div>`)
        })
    }

    function createOrderCheck(){
        $.LoadingOverlay("hide")
        var capacity = $("#capacity").val();
        var id_contact = $("input[name='list_kontak_check']:checked").val();
        if(id_contact == null || id_contact == "" || id_contact == 0){
            var datahtml = `
                <div class="modal fade" id="validateModal" data-keyboard="false" data-backdrop="static">
                    <div class="modal-dialog modal-sm modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-colors-block">Pemberitahuan!</h5>
                                <button type="button" class="close" data-dismiss="modal" onclick="closeModalvalidateKlb()">×</button>
                            </div>
                            <div class="modal-body">
                            <center><b class="text-color-block"><h6>Anda belum memilih data Pemesan!</h6></b></center>
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
        var id_contact = $("input[name='list_kontak_check']:checked").val();
        console.log(id_contact)
        var name_contact = $("#name_contact" + id_contact).val()
        var name_kai_side = JSON.parse(localStorage.getItem('id_kai_klb'));
        var scadule = JSON.parse(localStorage.getItem('data_scadule_luarbiasa'));
        localStorage.setItem("id_contact_klb", JSON.stringify(id_contact))

       
        var datahtml = `
        <div class="modal fade" id="modalConfirmBooking" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Booking Confirmation</h5>
                        <button type="button" class="close" data-dismiss="modal" onclick="closeModalConfmBook()">×</button>
                    </div><br>
                    <center><b>Apakah anda yakin, Data pemesanan sudah benar? </b></center>
                    <br>
                    <div class="modal-body scroll"> 
                        <div> Kereta: <b>`+listGerbongKlb(name_kai_side)+`</b></div>
                        <div> Nama Kontak: <b>`+name_contact+`</b></div>
                        <div> Jadwal Keberangkatan: <b>`+scadule[0]['departure']+`</b></div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="bottonBook" onclick="createOrderaKiwisata()"><i class="fa fa-check mr-1" ></i>Ya</button>
                        <button type="button" class="btn btn-light" data-dismiss="modal" onclick="closeModalConfmBook()"><i class="fa fa-times mr-1" ></i>Kembali</button>
                    </div>
                </div>
            </div>
        </div> `
        $("#modalBooking").replaceWith(datahtml)
        $("#modalConfirmBooking").modal('show')
        }  
    }   

    function closeModalConfmBook() {
        $("#modalConfirmBooking").on("hidden.bs.modal", function(e) {
            $("#modalConfirmBooking").replaceWith(`<div id="modalBooking"></div>`)
        })
    }

    function addContact(){
        $.LoadingOverlay("hide")
        // window.location.href = "/kaiwisata/list/contact";
        var datahtml = `
        <div class="modal fade" id="addModalContact" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-colors-on">Add New Contact</h5>
                        <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>
                    <div class="modal-body scroll"> 
                        <div class="form-group">
                            <label class="">Name: <span class="text-danger">*</span></label>
                            <input id="namecont" type="text" class="form-control " name="namecont" placeholder="contact name" value="" required>
                            <div class="invalid-feedback-namecont text-colors-block"></div>
                        </div>
                        <div class="form-group">
                            <label class="">Email: <span class="text-danger">*</span></label>
                            <input id="emailcont" type="text" class="form-control " name="emailcont" placeholder="contact email" value="" required>
                            <div class="invalid-feedback-emailcont text-colors-block"></div>
                        </div>
                        <div class="form-group">
                            <label class="">Phone: <span class="text-danger">*</span></label>
                            <input id="phone_contact" type="number" class="form-control " name="phone_contact" placeholder="phone number" value="" required>
                            <div class="invalid-feedback-phone_contact text-colors-block"></div>
                        </div>
                        <div class="form-group">
                            <label class="">Company Name: </label>
                            <input id="name_company" type="text" class="form-control " name="name_company" placeholder="" value="" >
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback namecat">Please fill out this field.</div>
                        </div>
                        <div class="form-group">
                            <label class="">Company Address:</label>
                            <textarea id="company_address" class="form-control" rows="3" name="company_address" placeholder="Description" value="" > </textarea>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback descat">Please fill out this field.</div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" onclick="saveContactKaiwis(); enableLoading()"class="btn text-white" style="background-image: linear-gradient(red, rgb(251, 140, 1));"><i class="fa fa-floppy-o mr-1"></i>Save</button>
                        <button type="button" class="btn btn-light" data-dismiss="modal"><i class="fa fa-times mr-1"></i>Cancel</button>
                    </div>
                </div>
            </div>
        </div> `    
        $("#modalAddContact").append(datahtml)
        $("#addModalContact").modal('show')
    } 

    function saveContactKaiwis(){
        $(document).ready(function() {
            toastr.options = {
              "closeButton": false,
              "debug": false,
              "newestOnTop": false,
              "progressBar": false,
              "positionClass": "toast-top-right",
              "preventDuplicates": false,
              "onclick": null,
              "showDuration": "300",
              "hideDuration": "1000",
              "timeOut": "5000",
              "extendedTimeOut": "1000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            }
            // $('[data-toggle="popover"]').popover();
            // var token = $('meta[name="csrf-token"]').attr('content');
            var name = $("#namecont").val();
            var email = $("#emailcont").val();
            var phone = $("#phone_contact").val();
            var name_company = $("#name_company").val();
            var company_address = $("#company_address").val();
            var token = JSON.parse(localStorage.getItem('data_token'));
            var token_set = token['access_token'];
            $.ajax({
                url: mainurl + "/kaiwisata/add/contact",
                type: "POST",
                data: {
                    name_cont: name,
                    email_cont: email,
                    phone_cont: phone,
                    company_cont: name_company,
                    address_cont: company_address,
                    token_cont: token_set,
                },
                dataType: 'json',
                success: function(result) {
                    // console.log(result.data)
                    if (result.success) {
                        toastr.success(result.message, "Success");
                        location.reload();
                    } else {
                        $.LoadingOverlay("hide")
                        toastr.error(result.message, "Add new contact Error");

                        if(result.message != ""|| result.message != null){
                            if(result.message.name != undefined){
                                $("#namecont").removeClass("is-valid").removeClass("border-success")
                                $("#namecont").addClass("is-invalid").addClass("border-danger")
                                $(".invalid-feedback-namecont").css("display", "block").html(result.message.name)
                            }else if(result.message.name == undefined){
                                $("#namecont").removeClass("is-invalid").removeClass("border-danger")
                                $("#namecont").addClass("is-valid").addClass("border-success")
                                $(".invalid-feedback-namecont").css("display", "none") 
                            }

                        }else{
                            $("#namecont").removeClass("is-invalid").removeClass("border-danger")
                            $("#namecont").addClass("is-valid").addClass("border-success")
                        }

                        if(result.message != ""|| result.message != null){
                            if(result.message.email != undefined){
                                $("#emailcont").removeClass("is-valid").removeClass("border-success")
                                $("#emailcont").addClass("is-invalid").addClass("border-danger")
                                $(".invalid-feedback-emailcont").css("display", "block").html(result.message.email)
                            }else if(result.message.email == undefined){
                                $("#emailcont").removeClass("is-invalid").removeClass("border-danger")
                                $("#emailcont").addClass("is-valid").addClass("border-success")
                                $(".invalid-feedback-emailcont").css("display", "none") 
                            }
                        }else{
                            $("#emailcont").removeClass("is-invalid").removeClass("border-danger")
                            $("#emailcont").addClass("is-valid").addClass("border-success")
                        }

                        if(result.message != ""|| result.message != null){
                            if(result.message.phone != undefined){
                                $("#phone_contact").removeClass("is-valid").removeClass("border-success")
                                $("#phone_contact").addClass("is-invalid").addClass("border-danger")
                                $(".invalid-feedback-phone_contact").css("display", "block").html(result.message.phone)
                            }else if(result.message.phone == undefined){
                                $("#phone_contact").removeClass("is-invalid").removeClass("border-danger")
                                $("#phone_contact").addClass("is-valid").addClass("border-success")
                                $(".invalid-feedback-phone_contact").css("display", "none") 
                            }
                        }else{
                            $("#phone_contact").removeClass("is-invalid").removeClass("border-danger")
                            $("#phone_contact").addClass("is-valid").addClass("border-success")
                        }
                    }
                }
            })
        })
    }

    function createOrderaKiwisata(){
            $.LoadingOverlay("show")
            var id_contact = JSON.parse(localStorage.getItem('id_contact_klb'));
            var scadule = JSON.parse(localStorage.getItem('data_scadule_luarbiasa'));
            var name_kai_side = JSON.parse(localStorage.getItem('id_kai_klb'));
            var trip = JSON.parse(localStorage.getItem('type_trip'));
            console.log(scadule)
            if(trip == "RoundTrip"){
                var date_return = scadule[0]['return']
                var detail_return = {
                    "train_number": "-",
                    "train_name": "-",
                    "vendor_id": "2",
                    "departure_time": scadule[0]['return']+ " - 00:00",
                    "arrival_time":  scadule[0]['return']+ " - 00:00",
                }
            }else{
                var date_return = scadule[0]['departure']
                var detail_return = {}
            }
            var list_id_kai = []
            for(var i = 0; i < name_kai_side.length; i++){
                var id_klb = parseInt(name_kai_side[i]['id_wagon'])
                
                list_id_kai.push(id_klb)
            }

            var capacity = $("#capacity").val();
            var token = JSON.parse(localStorage.getItem('data_token'));
            var token_set = token['access_token'];
            var url = fetch(mainurl +'train/booking_spec',{
            method: 'POST',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'Authorization': 'Bearer ' + token_set,
            },
            body: JSON.stringify({
                "detail_train": {
                    "org": scadule[0]['org'],
                    "des": scadule[0]['des'],
                    "departure_date": scadule[0]['departure'],
                    "return_date": date_return,
                    "detail_departure": {
                        "train_number": "-",
                        "train_name": "-",
                        "vendor_id": "2",
                        "departure_time": scadule[0]['departure']+ " - 00:00",
                        "arrival_time":  scadule[0]['departure']+ " - 00:00",
                    },
                    detail_return,
                    "train_wagon": list_id_kai
                },
                "contact_id": id_contact,
                "pax_amount": capacity,
                "notes": "tambahan notes order",
                "order_type": "Luar Biasa"
            }),
            }).then((response) => response.json()).then((responseData) => {
                var train = responseData;
                console.log(train)
                if(train.success == false){
                    $("#modalBooking").empty()
                    $("#modalConfirmBooking").modal('hide')
                    $.LoadingOverlay("hide")
                    var datahtml = `
                        <div class="modal fade sm-5" id="codeBookingModal" data-keyboard="false" data-backdrop="static">
                            <div class="modal-dialog modal-dialog-scrollable modal-ku" style="margin-top:15%;"><br>
                                <div class="modal-content text-center" >
                                    <div style="margin-top:5%;">
                                        <h4 class="text-colors-block"><b>Booking Failed !</b></h4><br><br>
                                    <center>`+ train.message+` </b></center>
                                    <br>
                                    </div><br><br>
                                
                                    <div class="footer">
                                        <button type="button" id="kembaliFailedBook" class="btn main-color"><b class="text-colors-off"></i>Kembali</b></button>
                                    </div>
                                </div>
                            </div>
                        </div>`
                        $("#codeBooking").append(datahtml)
                        $("#codeBookingModal").modal('show')

                        $("#kembaliFailedBook").on('click', function(){
                            window.location.href = "/";
                        })
                }else{
                    $("#modalBooking").empty()
                    $("#modalConfirmBooking").modal('hide')
                    $.LoadingOverlay("hide")
                    var datahtml = `
                    <div class="modal fade sm-3" id="codeBookingModal"  data-keyboard="false" data-backdrop="static">
                        <div class="modal-dialog modal-dialog-scrollable" style="margin-top:10%; height: 370px;"><br>
                            <div class="modal-content text-center" >
                                <div style="margin-top:5%;">
                                    <h4><b class="text-colors-on">Booking Success</b></h4>
                                    <b class="text-colors-on"><i class="fa fa-check-circle fa-5x"></i></b><br>
                                <center>Invoice :<b> <br>`+ responseData.data.invoice_number+` </b></center>
                                <br>
                                <center><b>Pesanan Anda akan segera kami proses</b></center>
                                <center><b> mohon tunggu beberapa saat lagi</b></center>
                                <br>
                                <center><b><h6>Terimakasih!</h6></b></center>
                                </div>
                                <div class="footer">
                                    <button type="button" id="listOrderBooking" class="btn main-color"><b class="text-colors-off"><i class="fa fa-chevron-left mr-1"></i>Kembali</b></button>
                                </div>
                            </div>
                        </div>
                    </div>`
                    $("#codeBooking").append(datahtml)
                    $("#codeBookingModal").modal('show')

                    $("#listOrderBooking").on('click', function(){
                        window.location.href = "/listorder";
                    })

                    var token = JSON.parse(localStorage.getItem('data_token'))
                    var token_set = token['access_token'];

                    var response = fetch(mainurl+"passenger/template/download",{
                        method: 'GET',
                        headers: {
                            'Accept': 'application/json',
                            'Content-Type': 'application/json',
                            'Authorization': 'Bearer' + token_set,
                        },
                    }).then((response) => response.blob()).then((responseData) => {
                        console.log(responseData)
                        $.LoadingOverlay("hide")
                        var url = URL.createObjectURL(responseData);
                        var a = document.createElement('a');
                        a.style.display = 'none';
                        a.href = url;
                        a.download = 'Form_data_penumpang.xlsx';
                        document.body.appendChild(a);
                        a.click();
                        URL.revokeObjectURL(url);
                    });
                }
                
        }); 
    }
</script>

@endpush