@extends('layout.app')

@section('content')
<div class="container-fluid mt-100 main-font">
    <div class="row d-flex flex-column flex-md-row" id="body-sidemenu">
        <div id="main-content" class="col with-fixed-sidebar pb-5 pt-3 max-auto" style="margin-top:20px;">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-3 pt-1"><br>  
                        @include('component.sidebar_faq_admin')
                    </div>
                    <div class="col-12 col-md-9 pt-3">
                        <div id="list_faq"></div>
                        <button href="javascript:void(0);" onclick="tambahFaq()" class="btn px-4 mr-2 main-color">
                            <span id="collapse-icon" class="fa fa-fw fa-plus ml-auto text-colors-off"></span><b class="text-colors-off">Tambah Baru</b>
                        </button>
                    </div>
                </div><!-- .row -->
            </div>
        </div><!-- Main Col -->
    </div><!-- body-row -->
</div><!-- .container-fluid-->
<div id="modalEditFaqInti"></div>
<div id="modalAddFaqn"></div>
<div id="modalEditFaq"></div>
<div id="modalAddFaq"></div>
@endsection

@push('scripts')
<script type="text/javascript">
    // $("#flagSide1").addClass('text-colors-on')
localStorage.removeItem("id_faq")
var editor;
var content;
var question;
var answer;
var question_edit;
var answer_edit;
var id_cate = {};  
var token = JSON.parse(localStorage.getItem('data_token'));
var token_set = token['access_token']
getListFaq()

function getListFaq(){
    $.LoadingOverlay("show")
    var no_id_cek = localStorage.getItem("id_faq")
    if(no_id_cek == null || no_id_cek == ""){
        var no_id = 1
        $("#flagSide" + 1).addClass('text-colors-on')
    }else{
        var no_id = localStorage.getItem("id_faq")
        $("#flagSide" + no_id).addClass('text-colors-on')
    }

    var url = fetch(mainurl + 'faq/list?sort_by=id&order=asc',{
        method: 'GET',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token_set,
        },
      }).then((response) => response.json()).then((responseData) => {
        var list_cate_faq = responseData.data
        // console.log(list_cate_faq)
        $.LoadingOverlay("hide")
        $("#list_faq").empty()
        for(i = 0; i < list_cate_faq.length; i++){
            var no = i + 1
            if(list_cate_faq[i].category_id == no_id){
                var list = `
                <h6><b>`+list_cate_faq[i].question+`</b>
                    <a href="javascript:void(0);" onclick="editFaq(${list_cate_faq[i].id},'${list_cate_faq[i].question}','${list_cate_faq[i].answer}')">
                        <span class="fas fa-edit fa-fw ml-auto text-colors-on icon-edit-faq"></span>
                    </a>
                </h6>
                <div class="card p-3 mb-5 bg-body rounded">
                    <label style="font-size: 15px;">
                     `+list_cate_faq[i].answer+`
                    </label>
                </div>
                `;
            }else{
                var list = ``;
            }
            $("#list_faq").append(list);
        }
    })
}

function changeFaq(id){
    $.LoadingOverlay("show")
    $("#list_faq").empty()
    $("#list_category_faq").empty()
    localStorage.setItem("id_faq", JSON.stringify(id))
    getListFaq()
    getlistFaqCate()
}

function editFaqCate(idn, kategory){
    id_cate.data = idn;
    var datahtml = `
        <div class="modal fade" id="modalEditCateFaq" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-md modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-colors-on"><b>Edit Kategori F.A.Q</b></h5>
                        <button type="button" class="close" data-dismiss="modal" onclick="closeModalEditFaq()">×</button>
                    </div>
                    <div class="modal-body">
                        <div id="list_cate_faq">
                            <p>`+kategory+`</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn main-color" data-dismiss="modal" onclick="saveContentFaqCate()"><b class="text-colors-off"><i class="fas fa-save mr-1"></i>Simpan</b></button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="deleteContentFaqCate()"><b class="text-colors-off"><i class="fa fa-trash mr-1"></i>Hapus</b></button>
                        <button type="button" class="btn btn-light" data-dismiss="modal"><i class="fa fa-times mr-1" onclick="closeModalEditFaq()"></i>Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    `
    $("#modalEditFaq").replaceWith(datahtml)
    $("#modalEditCateFaq").modal('show')

    if (editor) {
        // jika sudah, set konten editor dengan data terbaru
        editor.setData(kategory);
    } else {
        // jika belum, inisialisasi editor baru
        ClassicEditor
            .create( document.querySelector('#list_cate_faq'), {
                // konfigurasi editor
            })
            .then( newEditor => {
                editor = newEditor;
                editor.setData(kategory);
            } )
            .catch( error => {
                console.error( error );
            } );
    }
}

function tambahFaqCategory(){
    var datahtml = `
        <div class="modal fade" id="modalAddCateFaq" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-md modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-colors-on"><b>Tambah Kategori F.A.Q</b></h5>
                        <button type="button" class="close" data-dismiss="modal" onclick="closeModalEditFaq()">×</button>
                    </div>
                    <div class="modal-body">
                        <div id="list_cate_add">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn main-color" data-dismiss="modal" onclick="saveNewContentFaqCate()"><b class="text-colors-off"><i class="fas fa-save mr-1"></i>Simpan</b></button>
                        <button id="tutup1" type="button" class="btn btn-light" data-dismiss="modal"><i class="fa fa-times mr-1" onclick="closeModalEditFaq()"></i>Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    `
    $("#modalAddFaq").replaceWith(datahtml)
    $("#modalAddCateFaq").modal('show')
  
    if (content) {
        // Hancurkan editor sebelum membuat yang baru
        content.destroy();
    }
    // jika belum, inisialisasi editor baru
    ClassicEditor
        .create( document.querySelector('#list_cate_add'), {
            // konfigurasi editor
        })
        .then( newEditor => {
            content = newEditor;
            if (content) {
                content.setData();
            }
        })
        .catch( error => {
            console.error( error );
        });
}

function tambahFaq(id){
    id_cate.data = id;
    var datahtml = `
        <div class="modal fade" id="modalAddsFaq" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-colors-on"><b>Tambah F.A.Q</b></h5>
                        <button type="button" class="close" data-dismiss="modal" onclick="closeModalEditFaq()">×</button>
                    </div>
                    <div class="modal-body">
                        <label><b> Pertanyaan: </b></label>
                        <div id="list_add"></div><br><hr>
                        <label><b> Jawaban: </b></label>
                        <div id="list_add_answer"></div><br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn main-color" data-dismiss="modal" onclick="saveNewContentFaq()"><b class="text-colors-off"><i class="fas fa-save mr-1"></i>Simpan</b></button>
                        <button id="tutup1" type="button" class="btn btn-light" data-dismiss="modal"><i class="fa fa-times mr-1" onclick="closeModalEditFaq()"></i>Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    `
    $("#modalAddFaqn").replaceWith(datahtml)
    $("#modalAddsFaq").modal('show')
  
    if (question) {
        // Hancurkan editor sebelum membuat yang baru
        question.destroy();
    }
    // jika belum, inisialisasi editor baru
    ClassicEditor
        .create( document.querySelector('#list_add'), {
            // konfigurasi editor
        })
        .then( newEditor => {
            question = newEditor;
            if (question) {
                question.setData();
            }
        })
        .catch( error => {
            console.error( error );
        });

    
    if (answer) {
        // Hancurkan editor sebelum membuat yang baru
        answer.destroy();
    }
    // jika belum, inisialisasi editor baru
    ClassicEditor
        .create( document.querySelector('#list_add_answer'), {
            // konfigurasi editor
        })
        .then( newEditor => {
            answer = newEditor;
            if (answer) {
                answer.setData();
            }
        })
        .catch( error => {
            console.error( error );
        });
}

function editFaq(id, quest, answers){
    id_cate.data = id;
    var datahtml = `
        <div class="modal fade" id="modalEditFaq" data-keyboard="false" data-backdrop="static">
            <div class="modal-dialog modal-lg modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-colors-on"><b>Edit F.A.Q</b></h5>
                        <button type="button" class="close" data-dismiss="modal" onclick="closeModalEditFaq()">×</button>
                    </div>
                    <div class="modal-body">
                        <label><b> Pertanyaan: </b></label>
                        <div id="list_add_edit">
                            <b>`+quest+`</b>
                        </div><br><hr>
                        <label><b> Jawaban: </b></label>
                        <div id="list_add_answer_edit">
                            `+answers+`
                        </div><br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn main-color" data-dismiss="modal" onclick="editContentFaq()"><b class="text-colors-off"><i class="fas fa-save mr-1"></i>Simpan</b></button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="deleteContentFaq()"><b class="text-colors-off"><i class="fa fa-trash mr-1"></i>Hapus</b></button>
                        <button type="button" class="btn btn-light" data-dismiss="modal"><i class="fa fa-times mr-1" onclick="closeModalEditFaq()"></i>Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    `
    $("#modalEditFaqInti").replaceWith(datahtml)
    $("#modalEditFaq").modal('show')

    if (question_edit) {
        question_edit.setData(quest);
    } else {
   
        ClassicEditor
            .create( document.querySelector('#list_add_edit'), {
            })
            .then( newEditor => {
                question_edit = newEditor;
                question_edit.setData(quest);
            } )
            .catch( error => {
                console.error( error );
            } );
    }

    if (answer_edit) {
        answer_edit.setData(answers);
    } else {
   
        ClassicEditor
            .create( document.querySelector('#list_add_answer_edit'), {
            })
            .then( newEditor => {
                answer_edit = newEditor;
                answer_edit.setData(answers);
            } )
            .catch( error => {
                console.error( error );
            } );
    }
}

function closeModalEditFaq(){
 
    $("#modalAddCateFaq").on("hidden.bs.modal", function(e) {
        $("#modalAddCateFaq").replaceWith(`<div id="modalAddFaq"></div>`)
    })

    $("#modalEditCateFaq").on("hidden.bs.modal", function(e) {
        $("#modalEditCateFaq").replaceWith(`<div id="modalEditFaq"></div>`)
    })
    
    $("#modalAddsFaq").on("hidden.bs.modal", function(e) {
        $("#modalAddsFaq").replaceWith(`<div id="modalAddFaqn"></div>`)
    })

    $("#modalEditFaq").on("hidden.bs.modal", function(e) {
        $("#modalEditFaq").replaceWith(`<div id="modalEditFaqInti"></div>`)
    })
}

function saveNewContentFaqCate(){
    $.LoadingOverlay("show")
    var kn = content.getData()
    var id_cat = id_cate.data
    content.setData('');
    id_cate.data = '';
    // console.log("tes simpan")
    var url = fetch(mainurl + 'faq_category/create',{
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token_set,
        },
        body: JSON.stringify({
            "category": kn,
            "is_active": 1
        }),

      }).then((response) => response.json()).then((responseData) => {
      
        if(responseData.success == true){
            toastr.success("Berhasil membuat kategory F.A.Q", "Success")
            $("#list_category_faq").empty()
            getlistFaqCate()
        }else{
            $.LoadingOverlay("hide")
            toastr.error("Gagal membuat kategory F.A.Q !", "Error")
        }
        
    })
}

function saveContentFaqCate(){
    $.LoadingOverlay("show")
    var kn = editor.getData()
    var id_cat = id_cate.data
    editor.setData('');
    id_cate.data = '';
    // console.log("tes simpan")
    var url = fetch(mainurl + 'faq_category/edit/'+id_cat,{
        method: 'PUT',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token_set,
        },
        body: JSON.stringify({
            "category": kn,
            "is_active": 1
        }),

      }).then((response) => response.json()).then((responseData) => {
      
        if(responseData.success == true){
            toastr.success("Berhasil mengubah kategory F.A.Q", "Success")
            $("#list_category_faq").empty()
            getlistFaqCate()
        }else{
            $.LoadingOverlay("hide")
            toastr.error("Gagal mengubah kategory F.A.Q !", "Error")
        }
        
    })
}

function deleteContentFaqCate(){
    $.LoadingOverlay("show")
    var id_cat = id_cate.data
    id_cate.data = '';
    var url = fetch(mainurl + 'faq_category/delete/'+id_cat,{
        method: 'DELETE',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token_set,
        },
      }).then((response) => response.json()).then((responseData) => {
        if(responseData.success == true){
            toastr.success("Berhasil hapus kategory F.A.Q", "Success")
            $("#list_category_faq").empty()
            getlistFaqCate()
        }else{
            $.LoadingOverlay("hide")
            toastr.error("Gagal hapus kategory F.A.Q !", "Error")
        }
    })
}

function saveNewContentFaq(){
    $.LoadingOverlay("show")
    var no_id_cek = localStorage.getItem("id_faq")
    if(no_id_cek == null || no_id_cek == ""){
        var no_id = 1
    }else{
        var no_id = localStorage.getItem("id_faq")
    }

    var qws = question.getData()
    var ans = answer.getData()
    var id_cat = id_cate.data
    var qws_format = qws.replace(/(<([^>]+)>)/ig,"").trim(); 

    id_cate.data = '';
    question.setData('');
    answer.setData('');

    var url = fetch(mainurl + 'faq/create',{
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token_set,
        },
        body: JSON.stringify({
            "question": qws_format,
            "answer": ans,
            "category_id": no_id,
            "is_active": 1
        }),
      }).then((response) => response.json()).then((responseData) => {
        if(responseData.success == true){
            toastr.success("Berhasil menambahkan F.A.Q", "Success")
            $("#list_faq").empty()
            getListFaq()
        }else{
            $.LoadingOverlay("hide")
            toastr.error("Gagal menambahkan F.A.Q !", "Error")
        }
    })
}

function editContentFaq(){
    $.LoadingOverlay("show")
    var no_id_cek = localStorage.getItem("id_faq")
    if(no_id_cek == null || no_id_cek == ""){
        var no_id = 1
    }else{
        var no_id = localStorage.getItem("id_faq")
    }

    var qws = question_edit.getData()
    var ans = answer_edit.getData()
    var qws_format = qws.replace(/(<([^>]+)>)/ig,"").trim(); 
    var id_cat = id_cate.data

    id_cate.data = '';
    question_edit.setData('');
    answer_edit.setData('');

    var url = fetch(mainurl + 'faq/edit/' +id_cat,{
        method: 'PUT',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token_set,
        },
        body: JSON.stringify({
            "question": qws_format,
            "answer": ans,
            "category_id": no_id,
            "is_active": 1
        }),
      }).then((response) => response.json()).then((responseData) => {
        if(responseData.success == true){
            toastr.success("Berhasil mengubah F.A.Q", "Success")
            $("#list_faq").empty()
            getListFaq()
        }else{
            $.LoadingOverlay("hide")
            toastr.error("Gagal mengubah F.A.Q !", "Error")
        }
    })
}

function deleteContentFaq(){
    $.LoadingOverlay("show")
    var id_cat = id_cate.data
    id_cate.data = '';
    var url = fetch(mainurl + 'faq/delete/'+id_cat,{
        method: 'DELETE',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token_set,
        },
      }).then((response) => response.json()).then((responseData) => {
        if(responseData.success == true){
            toastr.success("Berhasil menghapus F.A.Q", "Success")
            $("#list_faq").empty()
            getListFaq()
        }else{
            $.LoadingOverlay("hide")
            toastr.error("Gagal menghapus F.A.Q !", "Error")
        }
    })
}

</script>
@endpush