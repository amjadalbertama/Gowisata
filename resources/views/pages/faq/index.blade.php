@extends('layout.app')

@section('content')
<div class="container-fluid mt-100 main-font">
    <div class="row" id="body-sidemenu">
        <div id="main-content" class="col with-fixed-sidebar pb-5 pt-3" style="margin-top:20px;">
            <div class="container">
                <div class="row">
                    <div class="col-2 pt-2"><br>  
                        @include('component.sidebar_faq')
                    </div>
                    <div class="col-10 pt-2" id="list_faq">
                   
                    </div>
                </div><!-- .row -->
            </div>
        </div><!-- Main Col -->
    </div><!-- body-row -->
</div><!-- .container-fluid-->
<div id="codeBooking"></div>
@endsection

@push('scripts')
<script type="text/javascript">
localStorage.removeItem("id_faq")
var token = JSON.parse(localStorage.getItem('data_token'));
var token_set = token['access_token']
getListFaq()

function getListFaq(){
    $.LoadingOverlay("show")
    var no_id_cek = localStorage.getItem("id_faq")
    if(no_id_cek == null || no_id_cek == ""){
        var no_id = 1
        $("#flagSidebtc" + 1).addClass('text-colors-on')
    }else{
        var no_id = localStorage.getItem("id_faq")
        $("#flagSidebtc" + no_id).addClass('text-colors-on')
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
                <h6><b>`+list_cate_faq[i].question+`</b></h6>
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

function changeFaqbtc(id){
    $.LoadingOverlay("show")
    $("#list_faq").empty()
    $("#list_category_faq").empty()
    localStorage.setItem("id_faq", JSON.stringify(id))
    getListFaq()
    getlistFaqCate()
}
</script>
@endpush