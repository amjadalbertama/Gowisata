@extends('layout.payment_proses')

@section('content')
<div class="container-fluid mt-100">
    <div class="row" id="body-sidemenu">
        <div id="main-content" class="col with-fixed-sidebar pb-5 pt-3" style="margin-top:20px;">
            <div class="container">
                <div class="row">
                    <div class="col-9 pt-2"><br>
                        <h1 class="h6 font-weight-normal text-center text-uppercase text-colors-on"> <b>Pilih Kontak Pemesan</b> </h1>
                                    <hr>
                        <!-- <div class="card shadow p-3 mb-5 bg-body rounded"> -->
                            <div class="card-body">
                                <div class="" id="formlistKontak">
                                         
                                </div>
                            </div>
                            <div id="pax_kaiwisata" class="card-body pt-1 d-none">
                                <div class="card shadow p-4 bg-body rounded">
                                    <div class="form-group col-4">
                                        <label class="">Total Maksimum Jumlah Penumpang: <span class="text-danger">*</span></label>
                                        <input id="capacity" type="number" class="form-control " name="capacity" placeholder="" value="" required disabled>
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
                                <h6 class="text-colors-on">Detail Pesanan</h6>
                                <hr>
                                <div>
                                    Jadwal : <div id="date_scadule"></div>
                                </div>
                                <div>
                                    Kereta : <div id="train"></div>
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
<div id="modalBooking"></div>
<div id="codeBooking"></div>
<div id="modalAddContact"></div>
@endsection

@push('scripts')
<script>
    $.LoadingOverlay("show")
    $("#list_wagon_navbar_train" ).addClass('text-colors-on')
    $("#data_pax_navbar_train" ).addClass('text-colors-on')

    var name_kai_side = JSON.parse(localStorage.getItem('name_kai_wisata'));
    var scadule_side = JSON.parse(localStorage.getItem('data_scadule_wisata'));
    $("#rute_asal").replaceWith(scadule_side[0]['org']);
    $("#rute_tujuan").replaceWith(scadule_side[0]['des']);
    $("#date_scadule").replaceWith(scadule_side[0]['departure'])
    $("#train").replaceWith(name_kai_side)
    var cap_tot = JSON.parse(localStorage.getItem('capa_kai_wisata'));
    $("#capacity").val(cap_tot);

        var token = JSON.parse(localStorage.getItem('data_token'));
        var token_set = token['access_token'];
        var url = fetch(mainurl + 'train/list_contact',{
        method: 'GET',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token_set,
        },
    }).then((response) => response.json()).then((responseData) => {
        var train = responseData.data;
        $("#detail_kaiwisata").removeClass('d-none');
        console.log(train)
        if(train == 0 || train == null || train == ""){
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
        }else if(train.success == true || train != null){
            $.LoadingOverlay("hide")
            $("#pax_kaiwisata").removeClass('d-none');
            if(train.length > 4){
                var max = 4
            }else{
                var max = train.length 
            }
            for(var i = 0; i < max; i++){
                //  var cube = asal[i];
                //  for(var t = 0; t < cube.length; t++){
                console.log(train[i])
                setSchedule = `<div class="card shadow p-3 mb-2 bg-body rounded">
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input check_box_list_contact" id="`+train[i].id+`" value="`+train[i].id+`" name="list_kontak_check"> 
                                        <label for="`+train[i].id +`" class="custom-control-label">
                                            <div> Nama: `+train[i].name+` <input id="name_contact`+train[i].id +`" value="`+train[i].name+`" hidden></input></div>
                                            <div id="" style="maxLength: 10;"> Email: `+train[i].email+`</div>
                                            <div id="" style="maxLength: 10;"> Phone: `+train[i].phone+`</div>
                                            <div id="" style="maxLength: 10;"> Nama perusahaan: `+train[i].company_name+`</div>
                                            <div id="" style="maxLength: 10;"> Alamat perusahaan: `+train[i].company_address+`</div>
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
        localStorage.setItem("id_contact_wisata", JSON.stringify(id_contact))
        
    }
  
    function createOrderCheck(){
        $.LoadingOverlay("hide")
        // window.location.href = "/kaiwisata/list/contact";
        var id_contact = $("input[name='list_kontak_check']:checked").val();
        console.log(id_contact)
        var name_contact = $("#name_contact" + id_contact).val()
        var name_kai = JSON.parse(localStorage.getItem('name_kai_wisata'));
        var scadule = JSON.parse(localStorage.getItem('data_scadule_wisata'));
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
                            <div> Kereta: <b>`+name_kai+`</b></div>
                            <div> Nama Kontak: <b>`+name_contact+`</b></div>
                            <div> Jadwal Keberangkatan: <b>`+scadule[0]['departure']+`</b></div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-primary" id="bottonBook" onclick="createOrderaKiwisata()"><i class="fa fa-check mr-1" ></i>Ya</button>
                            <button type="button" class="btn btn-light" data-dismiss="modal" onclick="closeModalConfmBook()"><i class="fa fa-times mr-1" ></i>Kembali</button>
                        </div>
                    </div>
                </div>
            </div>`
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
        var datahtml = `
        <div class="modal fade" id="addModalContact" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add New Contact</h5>
                        <button type="button" class="close" data-dismiss="modal">×</button>
                    </div>
                    <div class="modal-body scroll"> 
                        <div class="form-group">
                            <label class="">Name: <span class="text-danger">*</span></label>
                            <input id="namecont" type="text" class="form-control " name="namecont" placeholder="contact name" value="" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback namecat">Please fill out this field.</div>
                        </div>
                        <div class="form-group">
                            <label class="">Email: <span class="text-danger">*</span></label>
                            <input id="emailcont" type="text" class="form-control " name="emailcont" placeholder="contact email" value="" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback namecat">Please fill out this field.</div>
                        </div>
                        <div class="form-group">
                            <label class="">Phone: <span class="text-danger">*</span></label>
                            <input id="phone_contact" type="number" class="form-control " name="phone_contact" placeholder="phone number" value="" required>
                            <div class="valid-feedback">Valid.</div>
                            <div class="invalid-feedback namecat">Please fill out this field.</div>
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
                url:"/kaiwisata/add/contact",
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
                        // location.reload();
                    } else {
                        $.LoadingOverlay("hide")
                        toastr.error(result.message, "Add new contact Error");
                    }
                }
            })
        })
    }

    function createOrderaKiwisata(){
            $.LoadingOverlay("show")
            var id_contact = JSON.parse(localStorage.getItem('id_contact_wisata'));
            var id_wagon = JSON.parse(localStorage.getItem('id_kai_wisata'));
            var scadule = JSON.parse(localStorage.getItem('data_scadule_wisata'));
            var kai_wis_return = JSON.parse(localStorage.getItem('data_train_wis_return'));
            console.log(scadule)
            var capacity = $("#capacity").val();

            if(scadule[0]['type_trip'] == "OneWay"){
                var data_return_kai_wis = {
                 
                }
            }else if(scadule[0]['type_trip'] == "RoundTrip"){
                var data_return_kai_wis = {
                    "train_number": "-",
                    "train_name": "-",
                    "vendor_id": "2",
                    "departure_time": scadule[0]['return']+ " - 00:00",
                    "arrival_time":  scadule[0]['return']+ " - 00:00"
                }
            }
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
                    "return_date": scadule[0]['return'],
                    "detail_departure": {
                        "train_number": "-",
                        "train_name": "-",
                        "vendor_id": "2",
                        "departure_time": scadule[0]['departure']+ " - 00:00",
                        "arrival_time":  scadule[0]['departure']+ " - 00:00"
                    },
                    "detail_return": data_return_kai_wis,
                    "train_wagon": [parseInt(id_wagon)],
                },
                "contact_id": id_contact,
                "pax_amount": capacity,
                "notes": "tambahan notes order",
                "order_type": "Wisata"
            }),
            }).then((response) => response.json()).then((responseData) => {
                var train = responseData;
                console.log(train)
        
                $("#modalBooking").empty()
                $("#modalConfirmBooking").modal('hide')
                $.LoadingOverlay("hide")

                if(train.success == true){
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

                }else{
                    $("#modalBooking").empty()
                        var datahtml = `
                        <div class="modal fade sm-5" id="codeBookingModal" data-keyboard="false" data-backdrop="static">
                            <div class="modal-dialog modal-dialog-scrollable modal-ku" style="margin-top:15%;"><br>
                                <div class="modal-content text-center" >
                                    <div style="margin-top:5%;">
                                        <h4 class="text-colors-block"><b>Booking Failed</b></h4><br>
                                    <center>`+ responseData.message+`!</b></center>
                                    <br>
                                    </div><br><br><br>
                                
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
    }
</script>

@endpush