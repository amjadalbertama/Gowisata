function getListEmployer(){
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
                      $("#table_userbtb" ).append(table_com)
                  }
              }else{
                  var tblend = `<tr>
                      <td id="" class="pl-3 text-center" colspan="8"> Data tidak ada!</td>
                  </tr>`;

                  $("#table_userbtb").append(tblend);
              }
            }else{
              var tblend = `<tr>
                  <td id="" class="pl-3 text-center" colspan="8"> Data tidak ada!</td>
              </tr>`;

              $("#table_userbtb").append(tblend);
            }
      });
}

function modalAddEmployer(){
    var datahtml = `
    <div class="modal fade" id="addModalEmployer" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-colors-on"><b>Add New Pegawai</b></h5>
                    <button type="button" class="close" data-dismiss="modal" onclick="closeModalConfirmAdmin()">×</button>
                </div>
                <div class="modal-body scroll"> 
                    <div class="form-group">
                        <label class="">Nama Approval: <span class="text-danger">*</span></label>
                        <input id="name_employer" type="text" class="form-control" name="name_employer" placeholder="contact name" value="" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback-name_employer text-colors-block"></div>
                    </div>
                    <div class="form-group">
                        <label class="">Email Approval: <span class="text-danger">*</span></label>
                        <input id="email_employer" type="text" class="form-control" name="email_employer" placeholder="contact name" value="" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback-email_employer text-colors-block"></div>
                    </div>
                    <div class="form-group">
                        <label class="">Phone Approval: <span class="text-danger">*</span></label>
                        <input id="phone_employer" type="number" class="form-control" name="phone_employer" placeholder="contact name" value="" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback-phone_employer text-colors-block"></div>
                    </div>
                    <div class="form-group">
                        <label class="">Password: <span class="text-danger">*</span></label>
                        <input id="password_employer" type="password" class="form-control" name="password_employer" placeholder="contact name" value="" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback-password_employer text-colors-block"></div>
                    </div>
                    <div class="form-group">
                        <label class="">Password Confirmation: <span class="text-danger">*</span></label>
                        <input id="password_confirm_employer" type="password" class="form-control" name="password_confirm_employer" placeholder="contact name" value="" required>
                        <div class="valid-feedback">Valid.</div>
                        <div class="invalid-feedback-password_confirm_employer text-colors-block"></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" onclick="saveNewEmployer()"class="btn text-white" style="background-image: linear-gradient(red, rgb(251, 140, 1));"><i class="fa fa-floppy-o mr-1"></i>Save</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal" onclick="closeModalConfirmEmploy()"><i class="fa fa-times mr-1"></i>Cancel</button>
                </div>
            </div>
        </div>
    </div> `    
    $("#modalAddEmployer").append(datahtml)
    $("#addModalEmployer").modal('show')
}

function editFormEmployer(){
    var datahtml = `
    <div class="modal fade" id="editModalEmployer" data-keyboard="false" data-backdrop="static">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-colors-on"><b>Edit Pegawai</b></h5>
                    <button type="button" class="close" data-dismiss="modal" onclick="closeModalConfirmEmploy()">×</button>
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
                    <button type="button" class="btn btn-light" data-dismiss="modal" onclick="closeModalConfirmEmploy()"><i class="fa fa-times mr-1"></i>Cancel</button>
                </div>
            </div>
        </div>
    </div> `    
    $("#modalAddAdminBtb").append(datahtml)
    $("#editModalEmployer").modal('show')
}

function closeModalConfirmEmploy(){
    // $("#modalConfirmDelCompany").on("hidden.bs.modal", function(e) {
    //     $("#modalConfirmDelCompany").replaceWith(`<div id="modalConfirmDelCom"></div>`)
    // })

    $("#addModalEmployer").on("hidden.bs.modal", function(e) {
        $("#addModalEmployer").replaceWith(`<div id="modalAddEmployer"></div>`)
    })
}

function saveNewEmployer(){
    var token = JSON.parse(localStorage.getItem('data_token'));
    var token_set = token['access_token']
    var company_id = JSON.parse(localStorage.getItem('company_id'));
    var url = fetch(mainurl +'user/register',{
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token_set,
        },
        body: JSON.stringify({
            "name": $("#name_employer").val(),
            "email" : $("#email_employer").val(),
            "phone": $("#phone_employer").val(),
            "password": $("#password_employer").val(),
            "password_confirmation": $("#password_confirm_employer").val(),
            "type" : "web",
            "acc_type": "b2b",
            "role_id": 4,
            "company_id": company_id,
            "terms_n_cons_agreement": 1,
        }),
        }).then((response) => response.json()).then((responseData) => {
            console.log(responseData)
            if(responseData.success == true){
                toastr.success("Berhasil menambah admin B2B", "Success")
                closeModalConfirmEmploy()
                $("#table_company").empty()
                getListEmployer()

            }else{

                if(responseData != ""|| responseData != null){
                    if(responseData.name != undefined){
                        toastr.error(responseData.name, "Error")
                        $("#name_employer").removeClass("is-valid").removeClass("border-success")
                        $("#name_employer").addClass("is-invalid").addClass("border-danger")
                        $(".invalid-feedback-name_employer").css("display", "block").html(responseData.name)
                    }else if(responseData.name == undefined){
                        $("#name_employer").removeClass("is-invalid").removeClass("border-danger")
                        $("#name_employer").addClass("is-valid").addClass("border-success")
                        $(".invalid-feedback-name_employer").css("display", "none") 
                    }

                }else{
                    $("#name_employer").removeClass("is-invalid").removeClass("border-danger")
                    $("#name_employer").addClass("is-valid").addClass("border-success")
                }

                if(responseData != ""|| responseData != null){
                    if(responseData.email != undefined ){
                        toastr.error(responseData.email, "Error")

                        $("#email_employer").removeClass("is-valid").removeClass("border-success")
                        $("#email_employer").addClass("is-invalid").addClass("border-danger")
                        $(".invalid-feedback-email_employer").css("display", "block").html(responseData.email)
                    }else if(responseData.email == undefined){
                        $("#email_employer").removeClass("is-invalid").removeClass("border-danger")
                        $("#email_employer").addClass("is-valid").addClass("border-success")
                        $(".invalid-feedback-email_employer").css("display", "none") 
                    }

                }else{
                    $("#email_employer").removeClass("is-invalid").removeClass("border-danger")
                    $("#email_employer").addClass("is-valid").addClass("border-success")
                }

                if(responseData != ""|| responseData != null){
                    if(responseData.phone != undefined){
                        toastr.error(responseData.phone, "Error")

                        $("#phone_employer").removeClass("is-valid").removeClass("border-success")
                        $("#phone_employer").addClass("is-invalid").addClass("border-danger")
                        $(".invalid-feedback-phone_employer").css("display", "block").html(responseData.phone)
                    }else if(responseData.phone == undefined){
                        $("#phone_employer").removeClass("is-invalid").removeClass("border-danger")
                        $("#phone_employer").addClass("is-valid").addClass("border-success")
                        $(".invalid-feedback-phone_employer").css("display", "none") 
                    }

                }else{
                    $("#phone_employer").removeClass("is-invalid").removeClass("border-danger")
                    $("#phone_employer").addClass("is-valid").addClass("border-success")
                }

                if(responseData != ""|| responseData != null){
                    if(responseData.password != undefined){
                        toastr.error(responseData.password, "Error")

                        $("#password_employer").removeClass("is-valid").removeClass("border-success")
                        $("#password_employer").addClass("is-invalid").addClass("border-danger")
                        $(".invalid-feedback-password_employer").css("display", "block").html(responseData.password)
                    }else if(responseData.password == undefined){
                        $("#password_employer").removeClass("is-invalid").removeClass("border-danger")
                        $("#password_employer").addClass("is-valid").addClass("border-success")
                        $(".invalid-feedback-password_employer").css("display", "none") 
                    }

                }else{
                    $("#password_employer").removeClass("is-invalid").removeClass("border-danger")
                    $("#password_employer").addClass("is-valid").addClass("border-success")
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
