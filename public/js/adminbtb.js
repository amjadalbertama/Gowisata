function getListAdmins(){
    var url = fetch(mainurl+'company/member',{
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
                if(responseData.data != []){
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
                            <td>`+datas[i].id+`</td>
                            <td>`+datas[i].name+`</td>
                            <td>`+datas[i].email+`</td>
                            <td>`+datas[i].phone+`</td>
                            <td>`+datas[i].role+`</td>
                            <td class="text-nowrap">
                                <div class="dropdown">
                                    <a href="javascript:void(0);" class="btn btn-sm color-main py-0" title="View/Edit" data-toggle="dropdown"><i class="fa fa-bars"></i></a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="" title="Edit"><i class="fa fa-edit fa-fw mr-1"></i>Edit</a>
                                    <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="" title="Delete" onclick="modalCOmfirmDelCompany(`+datas[i].id+`)"><i class="fa fa-trash fa-fw mr-1"></i>Delete</a>
                                    </div>
                                </div>
                            </td>
                        </tr>` 
                        $("#table_adminB2b" ).append(table_com)
                    }
                
                }else{
                    var tblend = `<tr>
                        <td id="" class="pl-3 text-center" colspan="6"> Data tidak ada!</td>
                    </tr>`;

                    $("#table_adminB2b").append(tblend);
                }
              }else{
                var tblend = `<tr>
                    <td id="" class="pl-3 text-center" colspan="6"> Data tidak ada!</td>
                </tr>`;

                $("#table_adminB2b").append(tblend);
              }
        });
}

// function modalCOmfirmDelCompany(id){
//     var datahtml = `
//         <div class="modal fade" id="modalConfirmDelCompany" data-keyboard="false" data-backdrop="static">
//             <div class="modal-dialog modal-md modal-dialog-scrollable">
//                 <div class="modal-content">
//                     <div class="modal-header">
//                         <h5 class="modal-title text-colors-block"><b>Konfirmasi Hapus Perusahaan</b></h5>
//                         <button type="button" class="close" data-dismiss="modal" onclick="closeModalConfirmDelBook()">×</button>
//                     </div><br>
//                     <center><b>Anda yakin akan menghapus Perusahaan ini `+ name +`? </b></center>
//                     <br>
//                     <div class="modal-footer">
//                         <button type="button" class="btn btn-danger" id="bottonBook" onclick="enableLoading(); deleteCompany(`+id+`)"><i class="fa fa-trash-o mr-1"></i>Ya</button>
//                         <button type="button" class="btn btn-light" data-dismiss="modal" onclick="closeModalConfirmDelBook()"><i class="fa fa-times mr-1"></i>Kembali</button>
//                     </div>
//                 </div>
//             </div>
//         </div> `;
//       $("#modalConfirmDelCom").append(datahtml)
//       $("#modalConfirmDelCompany").modal('show')
// }

function closeModalConfirmDelBook(){
    $("#modalConfirmDelCompany").on("hidden.bs.modal", function(e) {
        $("#modalConfirmDelCompany").replaceWith(`<div id="modalConfirmDelCom"></div>`)
    })
}

function addFormAdminBtb(){
    var datahtml = `
    <div class="modal fade" id="addModalAdminBtb" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-colors-on"><b>Add New Admin Btb</b></h5>
                    <button type="button" class="close" data-dismiss="modal" onclick="closeModalConfirmAdmin()">×</button>
                </div>
                <div class="modal-body scroll"> 
                    <div class="form-group">
                        <label class="">Nama Approval: <span class="text-danger">*</span></label>
                        <input id="name_adminbtb" type="text" class="form-control" name="name_adminbtb" placeholder="contact name" value="" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback-name_adminbtb text-colors-block"></div>
                    </div>
                    <div class="form-group">
                        <label class="">Email Approval: <span class="text-danger">*</span></label>
                        <input id="email_adminbtb" type="text" class="form-control" name="email_adminbtb" placeholder="contact name" value="" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback-email_adminbtb text-colors-block"></div>
                    </div>
                    <div class="form-group">
                        <label class="">Phone Approval: <span class="text-danger">*</span></label>
                        <input id="phone_adminbtb" type="number" class="form-control" name="phone_adminbtb" placeholder="contact name" value="" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback-phone_adminbtb text-colors-block"></div>
                    </div>
                    <div class="form-group">
                        <label class="">Password: <span class="text-danger">*</span></label>
                        <input id="password_adminbtb" type="password" class="form-control" name="password_adminbtb" placeholder="contact name" value="" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback-password_adminbtb text-colors-block"></div>
                    </div>
                    <div class="form-group">
                        <label class="">Password Confirmation: <span class="text-danger">*</span></label>
                        <input id="password_confirm_adminbtb" type="password" class="form-control" name="password_confirm_adminbtb" placeholder="contact name" value="" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback-password_confirm_adminbtb text-colors-block"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" onclick="saveNewAdminBtb()"class="btn text-white" style="background-image: linear-gradient(red, rgb(251, 140, 1));"><i class="fa fa-floppy-o mr-1"></i>Save</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal" onclick="closeModalConfirmAdmin()"><i class="fa fa-times mr-1"></i>Cancel</button>
                </div>
            </div>
        </div>
    </div> `    
    $("#modalAddAdminBtb").append(datahtml)
    $("#addModalAdminBtb").modal('show')
}

function editFormAdminBtb(){
    var datahtml = `
    <div class="modal fade" id="addModalAdminBtb" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-colors-on"><b>Edit Admin Btb</b></h5>
                    <button type="button" class="close" data-dismiss="modal" onclick="closeModalConfirmAdmin()">×</button>
                </div>
                <div class="modal-body scroll"> 
                    <div class="form-group">
                        <label class="">Nama Approval: <span class="text-danger">*</span></label>
                        <input id="name_adminbtb" type="text" class="form-control" name="name_adminbtb" placeholder="contact name" value="" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback-name_adminbtb text-colors-block"></div>
                    </div>
                    <div class="form-group">
                        <label class="">Email Approval: <span class="text-danger">*</span></label>
                        <input id="email_adminbtb" type="text" class="form-control" name="email_adminbtb" placeholder="contact name" value="" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback-email_adminbtb text-colors-block"></div>
                    </div>
                    <div class="form-group">
                        <label class="">Phone Approval: <span class="text-danger">*</span></label>
                        <input id="phone_adminbtb" type="number" class="form-control" name="phone_adminbtb" placeholder="contact name" value="" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback-phone_adminbtb text-colors-block"></div>
                    </div>
                    <div class="form-group">
                        <label class="">Password: <span class="text-danger">*</span></label>
                        <input id="password_adminbtb" type="password" class="form-control" name="password_adminbtb" placeholder="contact name" value="" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback-password_adminbtb text-colors-block"></div>
                    </div>
                    <div class="form-group">
                        <label class="">Password Confirmation: <span class="text-danger">*</span></label>
                        <input id="password_confirm_adminbtb" type="password" class="form-control" name="password_confirm_adminbtb" placeholder="contact name" value="" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback-password_confirm_adminbtb text-colors-block"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" onclick="saveNewAdminBtb()"class="btn text-white" style="background-image: linear-gradient(red, rgb(251, 140, 1));"><i class="fa fa-floppy-o mr-1"></i>Save</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal" onclick="closeModalConfirmAdmin()"><i class="fa fa-times mr-1"></i>Cancel</button>
                </div>
            </div>
        </div>
    </div> `    
    $("#modalAddAdminBtb").append(datahtml)
    $("#addModalAdminBtb").modal('show')
}

function closeModalConfirmAdmin(){
    // $("#modalConfirmDelCompany").on("hidden.bs.modal", function(e) {
    //     $("#modalConfirmDelCompany").replaceWith(`<div id="modalConfirmDelCom"></div>`)
    // })

    $("#addModalAdminBtb").on("hidden.bs.modal", function(e) {
        $("#addModalAdminBtb").replaceWith(`<div id="modalAddAdminBtb"></div>`)
    })
}

function saveNewAdminBtb(){
    var company_id = JSON.parse(localStorage.getItem('company_id'));
    var token = JSON.parse(localStorage.getItem('data_token'));
    var token_set = token['access_token']
    var url = fetch(mainurl +'user/register',{
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token_set,
        },
        body: JSON.stringify({
            "name": $("#name_adminbtb").val(),
            "email" : $("#email_adminbtb").val(),
            "phone": $("#phone_adminbtb").val(),
            "password": $("#password_adminbtb").val(),
            "password_confirmation": $("#password_confirm_adminbtb").val(),
            "type" : "web",
            "acc_type": "b2b",
            "role_id": 2,
            "company_id": company_id,
            "terms_n_cons_agreement": 1,
        }),
        }).then((response) => response.json()).then((responseData) => {
            console.log(responseData)
            if(responseData.success == true){
                toastr.success("Berhasil menambah admin B2B", "Success")
                closeModalConfirmAdmin()
                $("#table_company").empty()
                getListAdmins()
            }else{

                if(responseData != ""|| responseData != null){
                    if(responseData.name != undefined){
                        toastr.error(responseData.name, "Error")

                        $("#name_adminbtb").removeClass("is-valid").removeClass("border-success")
                        $("#name_adminbtb").addClass("is-invalid").addClass("border-danger")
                        $(".invalid-feedback-name_adminbtb").css("display", "block").html(responseData.name)
                    }else if(responseData.name == undefined){
                        $("#name_adminbtb").removeClass("is-invalid").removeClass("border-danger")
                        $("#name_adminbtb").addClass("is-valid").addClass("border-success")
                        $(".invalid-feedback-name_adminbtb").css("display", "none") 
                    }

                }else{
                    $("#name_adminbtb").removeClass("is-invalid").removeClass("border-danger")
                    $("#name_adminbtb").addClass("is-valid").addClass("border-success")
                }

                if(responseData != ""|| responseData != null){
                    if(responseData.email != undefined){
                        toastr.error(responseData.email, "Error")

                        $("#email_adminbtb").removeClass("is-valid").removeClass("border-success")
                        $("#email_adminbtb").addClass("is-invalid").addClass("border-danger")
                        $(".invalid-feedback-email_adminbtb").css("display", "block").html(responseData.email)
                    }else if(responseData.email == undefined){
                        $("#email_adminbtb").removeClass("is-invalid").removeClass("border-danger")
                        $("#email_adminbtb").addClass("is-valid").addClass("border-success")
                        $(".invalid-feedback-email_adminbtb").css("display", "none") 
                    }

                }else{
                    $("#email_adminbtb").removeClass("is-invalid").removeClass("border-danger")
                    $("#email_adminbtb").addClass("is-valid").addClass("border-success")
                }

                if(responseData != ""|| responseData != null){
                    if(responseData.phone != undefined){
                        toastr.error(responseData.phone, "Error")

                        $("#phone_adminbtb").removeClass("is-valid").removeClass("border-success")
                        $("#phone_adminbtb").addClass("is-invalid").addClass("border-danger")
                        $(".invalid-feedback-phone_adminbtb").css("display", "block").html(responseData.phone)
                    }else if(responseData.phone == undefined){
                        $("#phone_adminbtb").removeClass("is-invalid").removeClass("border-danger")
                        $("#phone_adminbtb").addClass("is-valid").addClass("border-success")
                        $(".invalid-feedback-phone_adminbtb").css("display", "none") 
                    }

                }else{
                    $("#phone_adminbtb").removeClass("is-invalid").removeClass("border-danger")
                    $("#phone_adminbtb").addClass("is-valid").addClass("border-success")
                }

                if(responseData != ""|| responseData != null){
                    if(responseData.password != undefined){
                        toastr.error(responseData.password, "Error")

                        $("#password_adminbtb").removeClass("is-valid").removeClass("border-success")
                        $("#password_adminbtb").addClass("is-invalid").addClass("border-danger")
                        $(".invalid-feedback-password_adminbtb").css("display", "block").html(responseData.password)
                    }else if(responseData.password == undefined){
                        $("#password_adminbtb").removeClass("is-invalid").removeClass("border-danger")
                        $("#password_adminbtb").addClass("is-valid").addClass("border-success")
                        $(".invalid-feedback-password_adminbtb").css("display", "none") 
                    }

                }else{
                    $("#password_adminbtb").removeClass("is-invalid").removeClass("border-danger")
                    $("#password_adminbtb").addClass("is-valid").addClass("border-success")
                }
            }
           
      });

}

// function deleteCompany(id){
//     var url = fetch(mainurl +'company/delete/'+ id,{
//         method: 'POST',
//         headers: {
//             'Accept': 'application/json',
//             'Content-Type': 'application/json',
//             'Authorization': 'Bearer ' + token_set,
//         },
//         }).then((response) => response.json()).then((responseData) => {
//             console.log(responseData)
//             toastr.success("Berhasil hapus perusahaan", "Success")
//             $("#table_company").empty()
//             getListCompany()
//       });
// }