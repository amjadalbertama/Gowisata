function getListCompany(){
    var url = fetch(mainurl+'company/all',{
          method: 'GET',
          headers: {
              'Accept': 'application/json',
              'Content-Type': 'application/json',
              'Authorization': 'Bearer ' + token_set,
          },
          }).then((response) => response.json()).then((responseData) => {
              console.log(responseData)
              if(responseData.success == true){
                var datas = responseData.data
                for( var i = 0; i < datas.length; i++){
                    var no = 1+i
                    var table_com = `<tr>
                        <td>
                            <div class="custom-control custom-checkbox ml-2">
                                <input type="checkbox" class="custom-control-input" id="`+no+`" name="checkbox">
                                <label class="custom-control-label" for="`+no+`"></label>
                            </div>
                        </td>
                        <td>`+no+`</td>
                        <td>`+datas[i].company_npwp+`</td>
                        <td>`+datas[i].company_name+`</td>
                        <td>`+datas[i].company_email+`</td>
                        <td>`+datas[i].company_phone_number+`</td>
                        <td>`+datas[i].company_address+`</td>
                        <td class="text-nowrap">
                            <div class="dropdown">
                                <a href="javascript:void(0);" class="btn btn-sm color-main py-0" title="View/Edit" data-toggle="dropdown"><i class="fa fa-bars"></i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="javascript:void(0);" title="Edit" onclick="editCompany(`+datas[i].id+`)"><i class="fa fa-edit fa-fw mr-1"></i>Edit</a>
                                <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="" title="Delete" onclick="modalCOmfirmDelCompany(`+datas[i].id+`)"><i class="fa fa-trash fa-fw mr-1"></i>Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>` 
                    $("#table_company" ).append(table_com)
                }
                    
              }else{

              }
        });
}

function modalCOmfirmDelCompany(id){
    var datahtml = `
        <div class="modal fade" id="modalConfirmDelCompany" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-md modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-colors-block"><b>Konfirmasi Hapus Perusahaan</b></h5>
                        <button type="button" class="close" data-dismiss="modal" onclick="closeModalConfirmDelBook()">×</button>
                    </div><br>
                    <center><b>Anda yakin akan menghapus Perusahaan ini `+ name +`? </b></center>
                    <br>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" id="bottonBook" onclick="deleteCompany(`+id+`)"><i class="fa fa-trash-o mr-1"></i>Ya</button>
                        <button type="button" class="btn btn-light" data-dismiss="modal" onclick="closeModalConfirmDelBook()"><i class="fa fa-times mr-1"></i>Kembali</button>
                    </div>
                </div>
            </div>
        </div> `;
      $("#modalConfirmDelCom").append(datahtml)
      $("#modalConfirmDelCompany").modal('show')
}

function closeModalConfirmDelBook(){
    $("#modalConfirmDelCompany").on("hidden.bs.modal", function(e) {
        $("#modalConfirmDelCompany").replaceWith(`<div id="modalConfirmDelCom"></div>`)
    })

    $("#addModalCompany").on("hidden.bs.modal", function(e) {
        $("#addModalCompany").replaceWith(`<div id="modalAddCompany"></div>`)
    })
}

function modalAddCompany(){
    var datahtml = `
    <div class="modal fade" id="addModalCompany" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-colors-on"><b>Add New Company</b></h5>
                    <button type="button" class="close" data-dismiss="modal" onclick="closeModalConfirmDelBook()">×</button>
                </div>
                <div class="modal-body scroll"> 
                    <div class="form-group">
                        <label class="">Nama Perusahaan: <span class="text-danger">*</span></label>
                        <input id="name_company" type="text" class="form-control" name="name_company" placeholder="contact name" value="" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback-name_company text-colors-block"></div>
                    </div>
                    <div class="form-group">
                        <label class="">Email Perusahaan: <span class="text-danger">*</span></label>
                        <input id="email_company" type="text" class="form-control" name="email_company" placeholder="contact email" value="" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback-email_company text-colors-block"></div>
                    </div>
                    <div class="form-group">
                        <label class="">Phone Perusahaan: <span class="text-danger">*</span></label>
                        <input id="phone_company" type="number" class="form-control" name="phone_company" placeholder="phone number" value="" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback-phone_company text-colors-block"></div>
                    </div>
                    <div class="form-group">
                        <label class="">NPWP Perusahaan: </label>
                        <input id="npwp_company" type="text" class="form-control" name="npwp_company" placeholder="" value="" >
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback-npwp_company text-colors-block"></div>
                    </div>
                    <div class="form-group">
                        <label class="">Alamat Perusahaan:</label>
                        <textarea id="address_company" class="form-control" rows="3" name="address_company" placeholder="Description" value="" > </textarea>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback-address_company text-colors-block"></div>
                    </div>
                    <hr>
                    <h6><b> Masukan Data Approval Perusahaan </b></h6>
                    <div class="form-group">
                        <label class="">Nama Approval: <span class="text-danger">*</span></label>
                        <input id="name_approval" type="text" class="form-control" name="name_approval" placeholder="contact name" value="" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback-name_approval text-colors-block"></div>
                    </div>
                    <div class="form-group">
                        <label class="">Email Approval: <span class="text-danger">*</span></label>
                        <input id="email_approval" type="text" class="form-control" name="email_approval" placeholder="contact name" value="" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback-email_approval text-colors-block"></div>
                    </div>
                    <div class="form-group">
                        <label class="">Phone Approval: <span class="text-danger">*</span></label>
                        <input id="phone_approval" type="number" class="form-control" name="phone_approval" placeholder="contact name" value="" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback-phone_approval text-colors-block"></div>
                    </div>
                    <div class="form-group">
                        <label class="">Password: <span class="text-danger">*</span></label>
                        <input id="password_approval" type="password" class="form-control" name="password_approval" placeholder="contact name" value="" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback-password_approval text-colors-block"></div>
                    </div>
                    <div class="form-group">
                        <label class="">Password Confirmation: <span class="text-danger">*</span></label>
                        <input id="password_conf_approval" type="password" class="form-control" name="password_conf_approval" placeholder="contact name" value="" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback-password_conf_approval text-colors-block"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" onclick="saveNewCompany()"class="btn text-white" style="background-image: linear-gradient(red, rgb(251, 140, 1));"><i class="fa fa-floppy-o mr-1"></i>Save</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal" onclick="closeModalConfirmDelBook()"><i class="fa fa-times mr-1"></i>Cancel</button>
                </div>
            </div>
        </div>
    </div> `    
    $("#modalAddCompany").append(datahtml)
    $("#addModalCompany").modal('show')
}


function editCompany(id){
    var token = JSON.parse(localStorage.getItem('data_token'));
    var token_set = token['access_token']
    var url = fetch(mainurl +'company/edit/'+id,{
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token_set,
        },
        body: JSON.stringify({
            "company_npwp": $("#npwp_company").val(),
            "company_name" : $("#name_company").val(),
            "company_email": $("#email_company").val(),
            "company_phone_number": $("#phone_company").val(),
            "company_address": $("#address_company").val(),
            "detail_data_approver" : {
                "fullname" : $("#name_approval").val(),
                "email": $("#email_approval").val(),
                "phone": $("#phone_approval").val(),
                "password": $("#password_approval").val(),
                "password_confirmation": $("#password_conf_approval").val(),
            }
        }),
        }).then((response) => response.json()).then((responseData) => {

                    var datahtml = `
                    <div class="modal fade" id="editModalCompany" data-keyboard="false" data-backdrop="static">
                        <div class="modal-dialog modal-lg modal-dialog-scrollable">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title text-colors-on"><b>Edit Company</b></h5>
                                    <button type="button" class="close" data-dismiss="modal" onclick="closeModalConfirmDelBook()">×</button>
                                </div>
                                <div class="modal-body scroll"> 
                                    <div class="form-group">
                                        <label class="">Nama Perusahaan: <span class="text-danger">*</span></label>
                                        <input id="name_company" type="text" class="form-control" name="name_company" placeholder="contact name" value="" required>
                                        <div class="valid-feedback">Valid.</div>
                                        <div class="invalid-feedback-name_company text-colors-block"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="">Email Perusahaan: <span class="text-danger">*</span></label>
                                        <input id="email_company" type="text" class="form-control" name="email_company" placeholder="contact email" value="" required>
                                        <div class="valid-feedback">Valid.</div>
                                        <div class="invalid-feedback-email_company text-colors-block"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="">Phone Perusahaan: <span class="text-danger">*</span></label>
                                        <input id="phone_company" type="number" class="form-control" name="phone_company" placeholder="phone number" value="" required>
                                        <div class="valid-feedback">Valid.</div>
                                        <div class="invalid-feedback-phone_company text-colors-block"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="">NPWP Perusahaan: </label>
                                        <input id="npwp_company" type="text" class="form-control" name="npwp_company" placeholder="" value="" >
                                        <div class="valid-feedback">Valid.</div>
                                        <div class="invalid-feedback-npwp_company text-colors-block"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="">Alamat Perusahaan:</label>
                                        <textarea id="address_company" class="form-control" rows="3" name="address_company" placeholder="Description" value="" > </textarea>
                                        <div class="valid-feedback">Valid.</div>
                                        <div class="invalid-feedback-address_company text-colors-block"></div>
                                    </div>
                                    <hr>
                                    <h6><b> Masukan Data Approval Perusahaan </b></h6>
                                    <div class="form-group">
                                        <label class="">Nama Approval: <span class="text-danger">*</span></label>
                                        <input id="name_approval" type="text" class="form-control" name="name_approval" placeholder="contact name" value="" required>
                                        <div class="valid-feedback">Valid.</div>
                                        <div class="invalid-feedback-name_approval text-colors-block"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="">Email Approval: <span class="text-danger">*</span></label>
                                        <input id="email_approval" type="text" class="form-control" name="email_approval" placeholder="contact name" value="" required>
                                        <div class="valid-feedback">Valid.</div>
                                        <div class="invalid-feedback-email_approval text-colors-block"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="">Phone Approval: <span class="text-danger">*</span></label>
                                        <input id="phone_approval" type="number" class="form-control" name="phone_approval" placeholder="contact name" value="" required>
                                        <div class="valid-feedback">Valid.</div>
                                        <div class="invalid-feedback-phone_approval text-colors-block"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="">Password: <span class="text-danger">*</span></label>
                                        <input id="password_approval" type="password" class="form-control" name="password_approval" placeholder="contact name" value="" required>
                                        <div class="valid-feedback">Valid.</div>
                                        <div class="invalid-feedback-password_approval text-colors-block"></div>
                                    </div>
                                    <div class="form-group">
                                        <label class="">Password Confirmation: <span class="text-danger">*</span></label>
                                        <input id="password_conf_approval" type="password" class="form-control" name="password_conf_approval" placeholder="contact name" value="" required>
                                        <div class="valid-feedback">Valid.</div>
                                        <div class="invalid-feedback-password_conf_approval text-colors-block"></div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="submit" onclick="saveNewCompany()"class="btn text-white" style="background-image: linear-gradient(red, rgb(251, 140, 1));"><i class="fa fa-floppy-o mr-1"></i>Save</button>
                                    <button type="button" class="btn btn-light" data-dismiss="modal" onclick="closeModalConfirmDelBook()"><i class="fa fa-times mr-1"></i>Cancel</button>
                                </div>
                            </div>
                        </div>
                    </div> `    
                    $("#modalEditCompany").append(datahtml)
                    $("#editModalCompany").modal('show')

        })
}

function saveNewCompany(){
    var token = JSON.parse(localStorage.getItem('data_token'));
    var token_set = token['access_token']
    var url = fetch(mainurl +'company/add',{
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token_set,
        },
        body: JSON.stringify({
            "company_npwp": $("#npwp_company").val(),
            "company_name" : $("#name_company").val(),
            "company_email": $("#email_company").val(),
            "company_phone_number": $("#phone_company").val(),
            "company_address": $("#address_company").val(),
            "detail_data_approver" : {
                "fullname" : $("#name_approval").val(),
                "email": $("#email_approval").val(),
                "phone": $("#phone_approval").val(),
                "password": $("#password_approval").val(),
                "password_confirmation": $("#password_conf_approval").val(),
            }
        }),
        }).then((response) => response.json()).then((responseData) => {
            console.log(responseData)
            if(responseData.success == true){
                toastr.success("Berhasil hapus perusahaan", "Success")
                closeModalConfirmDelBook()
                $("#table_company").empty()
                getListCompany()
            }else{
            
                if(responseData != ""|| responseData != null){
                    if(responseData.company_name != undefined){
                        toastr.error(responseData.company_name, "Error")

                        $("#name_company").removeClass("is-valid").removeClass("border-success")
                        $("#name_company").addClass("is-invalid").addClass("border-danger")
                        $(".invalid-feedback-name_company").css("display", "block").html(responseData.company_name)
                    }else if(responseData.company_name == undefined){
                        $("#name_company").removeClass("is-invalid").removeClass("border-danger")
                        $("#name_company").addClass("is-valid").addClass("border-success")
                        $(".invalid-feedback-name_company").css("display", "none") 
                    }

                }else{
                    $("#name_company").removeClass("is-invalid").removeClass("border-danger")
                    $("#name_company").addClass("is-valid").addClass("border-success")
                }

                if(responseData != ""|| responseData != null){
                    if(responseData.company_npwp != undefined){
                        toastr.error(responseData.company_npwp, "Error")

                        $("#npwp_company").removeClass("is-valid").removeClass("border-success")
                        $("#npwp_company").addClass("is-invalid").addClass("border-danger")
                        $(".invalid-feedback-npwp_company").css("display", "block").html(responseData.company_npwp)
                    }else if(responseData.company_npwp == undefined){
                        $("#npwp_company").removeClass("is-invalid").removeClass("border-danger")
                        $("#npwp_company").addClass("is-valid").addClass("border-success")
                        $(".invalid-feedback-npwp_company").css("display", "none") 
                    }

                }else{
                    $("#npwp_company").removeClass("is-invalid").removeClass("border-danger")
                    $("#npwp_company").addClass("is-valid").addClass("border-success")
                }

                if(responseData != ""|| responseData != null){
                    if(responseData.company_email != undefined){
                        toastr.error(responseData.company_email, "Error")

                        $("#email_company").removeClass("is-valid").removeClass("border-success")
                        $("#email_company").addClass("is-invalid").addClass("border-danger")
                        $(".invalid-feedback-email_company").css("display", "block").html(responseData.company_email)
                    }else if(responseData.company_email == undefined){
                        $("#email_company").removeClass("is-invalid").removeClass("border-danger")
                        $("#email_company").addClass("is-valid").addClass("border-success")
                        $(".invalid-feedback-email_company").css("display", "none") 
                    }

                }else{
                    $("#email_company").removeClass("is-invalid").removeClass("border-danger")
                    $("#email_company").addClass("is-valid").addClass("border-success")
                }

                if(responseData != ""|| responseData != null){
                    if(responseData.company_phone_number != undefined){
                        toastr.error(responseData.company_phone_number, "Error")

                        $("#phone_company").removeClass("is-valid").removeClass("border-success")
                        $("#phone_company").addClass("is-invalid").addClass("border-danger")
                        $(".invalid-feedback-phone_company").css("display", "block").html(responseData.company_phone_number)
                    }else if(responseData.company_phone_number == undefined){
                        $("#phone_company").removeClass("is-invalid").removeClass("border-danger")
                        $("#phone_company").addClass("is-valid").addClass("border-success")
                        $(".invalid-feedback-phone_company").css("display", "none") 
                    }

                }else{
                    $("#phone_company").removeClass("is-invalid").removeClass("border-danger")
                    $("#phone_company").addClass("is-valid").addClass("border-success")
                }

                if(responseData != ""|| responseData != null){
                    if(responseData.company_address != undefined){
                        toastr.error(responseData.company_address, "Error")

                        $("#address_company").removeClass("is-valid").removeClass("border-success")
                        $("#address_company").addClass("is-invalid").addClass("border-danger")
                        $(".invalid-feedback-address_company").css("display", "block").html(responseData.company_address)
                    }else if(responseData.company_address == undefined){
                        $("#address_company").removeClass("is-invalid").removeClass("border-danger")
                        $("#address_company").addClass("is-valid").addClass("border-success")
                        $(".invalid-feedback-address_company").css("display", "none") 
                    }

                }else{
                    $("#address_company").removeClass("is-invalid").removeClass("border-danger")
                    $("#address_company").addClass("is-valid").addClass("border-success")
                }

                if(responseData != ""|| responseData != null){
                    if(responseData.fullname != undefined){
                        toastr.error(responseData.fullname, "Error")

                        $("#name_approval").removeClass("is-valid").removeClass("border-success")
                        $("#name_approval").addClass("is-invalid").addClass("border-danger")
                        $(".invalid-feedback-name_approval").css("display", "block").html(responseData.fullname)
                    }else if(responseData.fullname == undefined){
                        $("#name_approval").removeClass("is-invalid").removeClass("border-danger")
                        $("#name_approval").addClass("is-valid").addClass("border-success")
                        $(".invalid-feedback-name_approval").css("display", "none") 
                    }

                }else{
                    $("#name_approval").removeClass("is-invalid").removeClass("border-danger")
                    $("#name_approval").addClass("is-valid").addClass("border-success")
                }

                if(responseData != ""|| responseData != null){
                    if(responseData.email != undefined){
                        toastr.error(responseData.email, "Error")

                        $("#email_approval").removeClass("is-valid").removeClass("border-success")
                        $("#email_approval").addClass("is-invalid").addClass("border-danger")
                        $(".invalid-feedback-email_approval").css("display", "block").html(responseData.email)
                    }else if(responseData.email == undefined){
                        $("#email_approval").removeClass("is-invalid").removeClass("border-danger")
                        $("#email_approval").addClass("is-valid").addClass("border-success")
                        $(".invalid-feedback-email_approval").css("display", "none") 
                    }

                }else{
                    $("#email_approval").removeClass("is-invalid").removeClass("border-danger")
                    $("#email_approval").addClass("is-valid").addClass("border-success")
                }

                if(responseData != ""|| responseData != null){
                    if(responseData.phone != undefined){
                        toastr.error(responseData.phone , "Error")

                        $("#phone_approval").removeClass("is-valid").removeClass("border-success")
                        $("#phone_approval").addClass("is-invalid").addClass("border-danger")
                        $(".invalid-feedback-phone_approval").css("display", "block").html(responseData.phone)
                    }else if(responseData.phone == undefined){
                        $("#phone_approval").removeClass("is-invalid").removeClass("border-danger")
                        $("#phone_approval").addClass("is-valid").addClass("border-success")
                        $(".invalid-feedback-phone_approval").css("display", "none") 
                    }

                }else{
                    $("#phone_approval").removeClass("is-invalid").removeClass("border-danger")
                    $("#phone_approval").addClass("is-valid").addClass("border-success")
                }

                if(responseData != ""|| responseData != null){
                    if(responseData.password != undefined){
                        toastr.error(responseData.password, "Error")

                        $("#password_approval").removeClass("is-valid").removeClass("border-success")
                        $("#password_approval").addClass("is-invalid").addClass("border-danger")
                        $(".invalid-feedback-password_approval").css("display", "block").html(responseData.password)

                        $("#password_conf_approval").removeClass("is-valid").removeClass("border-success")
                        $("#password_conf_approval").addClass("is-invalid").addClass("border-danger")
                        $(".invalid-feedback-password_conf_approval").css("display", "block").html(responseData.password)
                    }else if(responseData.password == undefined){
                        $("#password_approval").removeClass("is-invalid").removeClass("border-danger")
                        $("#password_approval").addClass("is-valid").addClass("border-success")
                        $(".invalid-feedback-password_approval").css("display", "none")
                        
                        $("#password_conf_approval").removeClass("is-invalid").removeClass("border-danger")
                        $("#password_conf_approval").addClass("is-valid").addClass("border-success")
                        $(".invalid-feedback-password_conf_approval").css("display", "none")
                    }

                }else{
                    $("#password_approval").removeClass("is-invalid").removeClass("border-danger")
                    $("#password_approval").addClass("is-valid").addClass("border-success")

                    $("#password_conf_approval").removeClass("is-invalid").removeClass("border-danger")
                    $("#password_conf_approval").addClass("is-valid").addClass("border-success")
                }
            }
           
      });

}

function deleteCompany(id){
    var url = fetch(mainurl +'company/delete/'+ id,{
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token_set,
        },
        }).then((response) => response.json()).then((responseData) => {
            console.log(responseData)
            toastr.success("Berhasil hapus perusahaan", "Success")
            $("#table_company").empty()
            getListCompany()
      });
}