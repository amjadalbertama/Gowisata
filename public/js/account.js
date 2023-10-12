function modalAddAccount() {
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
		$('[data-toggle="popover"]').popover();
		    var token = $('meta[name="csrf-token"]').attr('content');
	    $.ajax({
	    	url: baseurl + "/api/v1/view/add/account",
            type: "GET",
            dataType: 'json',
            success: function(result) {
                // console.log(result.data)
				if (result.success) {
                   var datas = result.data
                //    console.log(datas)
                    var datahtml = `
                    <div class="modal fade" id="addModalAccount" data-keyboard="false" data-backdrop="static">
                        <div class="modal-dialog modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Tambah Akun Baru</h5>
                                    <button type="button" class="close" data-dismiss="modal" onclick="closeModalAccount()">×</button>
                                </div>
                                    <div class="modal-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                <label for="">Nama Akun:</label>
                                                <input type="text" class="form-control" id="name_akun" placeholder="Masukkan Nama Akun" name="name_akun">
                                                <div id="valid_confirm_pass1" class="valid-feedback">Valid.</div>
                                                    <div id="invalid_confirm_pass1" class="invalid-feedback">
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                <label for="">Kategory:</label>
                                                    <select onchange="selectCategory()" type="text" class="form-control" name="kategori" id="kategori">
                                                    <option value="" selected disabled> <-- pilih kategori --> </option>
                                                    `+ cateAccount(datas) +` 
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                <label for="">Kode Akun:</label>
                                                    <input id="codeAkun" type="text" class="form-control" name="codeAkun" placeholder="" value="" required="">
                                                    <div id="valid_confirm_pass2" class="valid-feedback">Valid.</div>
                                                    <div id="invalid_confirm_pass2" class="invalid-feedback">
                                                    </div>
                                                </div>
                                                <!-- <div class="form-group">
                                                <label for="">Detail:</label>
                                                <select type="text" class="form-control" name="detail" value="">
                                                        <option value="">Sub Akun</option>
                                                        <option value="">Header Akun</option>
                                                </select>
                                                </div> -->
                                                <div class="form-group">
                                                <label for="">Saldo Awal:</label>
                                                <input type="number" class="form-control" id="saldo_awal" placeholder="masukan saldo awal" name="saldo_awal">
                                                    <div id="valid_confirm_pass2" class="valid-feedback">Valid.</div>
                                                    <div id="invalid_confirm_pass2" class="invalid-feedback"></div>
                                                </div>
                                                <div class="form-group">
                                                <label for="">Description:</label>
                                                <input type="text" class="form-control" id="deskripsi" placeholder="masukan deskripsi" name="deskripsi">
                                                <div id="valid_confirm_pass2" class="valid-feedback">Valid.</div>
                                                    <div id="invalid_confirm_pass2" class="invalid-feedback">
                                                    </div>
                                                </div>
                                            </div> <!-- .col-* -->
                                        </div> <!-- .row -->
                                    </div>
                                <div class="modal-footer">
                                    <button type="button" onclick="saveAddAccount()" class="btn btn-success"><i class="fa fa-floppy-o mr-2"></i>Simpan</button>
                                    <button type="button" class="btn btn-light" data-dismiss="modal" onclick="closeModalAccount()" ><i class="fa fa-times mr-1"></i>Close</button>
                                </div>
                            </div>
                        </div>
                    </div> `
                    $("#modaladdAccount" ).replaceWith(datahtml)
                    $("#addModalAccount" ).modal('show')

                    // $('#kategori').change(function(){
                    //     $('#kode_akun').removeClass('d-none')
                    // })
                    // if(){

                    // }
                } else {
                    toastr.error(result.message, "API Get Kategory Account Error");
                }
            }
	    })
	})
}

function closeModalAccount() {
	$("#modaladdAccount").on("hidden.bs.modal", function(e) {
		$("#modaladdAccount").replaceWith(`<div id="addModalAccount"></div>`)
	})
    // $("#editModalCompob").on("hidden.bs.modal", function(e) {
	// 	$("#editModalCompob").replaceWith(`<div id="modalEditCompob"></div>`)
	// })
}

function cateAccount(datas) {
    return datas.map(function (item) {
        var cate = item.name;
        var id = item.id;
        return '<option value='+ id +'> '+ cate +'</option>';
    }).join("");
}

function selectCategory(){
    $(document).ready(function() {
        var id = $("#kategori").val();
        $.ajax({
            url: baseurl + "/api/v1/selectcate",
            type: "POST",
            data: {
                id_cate: id,
            },
            dataType: 'json',
            success: function(result) {
                console.log(result.data.number)
                    if (result.success) {
                        $("#codeAkun").replaceWith('<input id="codeAkun" type="text" class="form-control" name="codeAkun" placeholder="" value="'+ result.data.number +'" required="">');
                        // toastr.success(result.message, "Notification");
                    } else {
                        $("#codeAkun").val("");
                        // toastr.error(result.message, "Warning!");
                    }
            }
        })
    })
}

function saveAddAccount(){
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

        var nameakun = $("#name_akun").val();
        var kodeakun = $("#codeAkun").val();
        var kategori = $("#kategori").val();
        var saldoawal = $("#saldo_awal").val();
        var deskripsi = $("#descripsi").val();
        // console.log(kategori)
        $.ajax({
            url: baseurl + "/api/v1/add/account",
            type: "POST",
            data: {
                name: nameakun,
                number: kodeakun,
                category_id: kategori,
                balance: saldoawal,
                desc: deskripsi,
            },
            dataType: 'json',
            success: function(result) {
                // console.log(result.data)
                if (result.success) {
                    setTimeout(redirected, 2000)
                    toastr.success(result.message, "Tambah data Account Berhasil");
                } else {
                    toastr.error(result.message, "Call select data Compliance Owner Error");
                }
            }
        })
    })
}

function deleteAccount(id_ac){
    $(document).ready(function() {
        $.ajax({
            url: baseurl + "/delete/account",
            type: "POST",
            data: {
                id: id_ac,
            },
            dataType: 'json',
            success: function(result) {
                // console.log(result.data)
                if (result.success) {
                    setTimeout(redirected, 1000)
                    toastr.success(result.message, "Notification");
                } else {
                    toastr.error(result.message, "Warning!");
                }
            }
        })
    })
}
