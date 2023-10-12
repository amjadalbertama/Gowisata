<div class="card shadow-sm">
    <div class="card-body">
        <ul class="list-group list-group-flush flex-column">
            <div class="d-flex w-100 justify-content-start align-items-center" style="border-bottom:1px solid #D3D3D3; margin-left: 10px;">
                <small id="collapse-text" class="h6 align-items-center text-colors-on"><b>Kategori</b></small>
                <span id="collapse-icon" class="fa fa-fw fa-small-collapse ml-auto"></span>
            </div><br>
            <div id="list_category_faq"></div>
            <br>
            <a href="javascript:void(0);" onclick="tambahFaqCategory()">
                <span id="collapse-icon" class="fa fa-fw fa-plus ml-auto text-colors-on"></span><b class="text-colors-on">Tambah Baru</b>
            </a>
        </ul>
    </div>
</div>
@push('scripts')
<script>
getlistFaqCate()
function getlistFaqCate(){
    var token = JSON.parse(localStorage.getItem('data_token'));
    var token_set = token['access_token']
    var url = fetch(mainurl + 'faq_category/list?sort_by=id&order=asc',{
        method: 'GET',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token_set,
        },
        }).then((response) => response.json()).then((responseData) => {
        var list_cate_faq = responseData.data
        console.log(list_cate_faq)
        for(i = 0; i < list_cate_faq.length; i++){
            var no = i + 1
            var k = list_cate_faq[i].category
            var list = `
            <div class="d-flex justify-content-start align-items-start" >
                <a href="javascript:void(0);" id="flagSide`+list_cate_faq[i].id+`" class="list-group-item-action align-items-center bg-transparent border-0" onclick="changeFaq(`+list_cate_faq[i].id+`)" style="max-width: 80%; display: inline-block;">
                    <b><div class="menu-collapsed">`+list_cate_faq[i].category+`</div></b>
                </a>
                <a href="javascript:void(0);" onclick="editFaqCate(${list_cate_faq[i].id}, '${k}')" style="max-width: 20%;">
                <span class="fas fa-edit fa-fw ml-auto text-colors-on" style="display: inline-block; vertical-align: middle; margin-bottom:110%;"></span>
                </a>
            </div>`;
            $("#list_category_faq").append(list);
            
        }
        var no_id_cek = localStorage.getItem("id_faq")
        if(no_id_cek == null || no_id_cek == ""){
            var no_id = 1
            $("#flagSide" + 1).addClass('text-colors-on')
        }else{
            var no_id = localStorage.getItem("id_faq")
            $("#flagSide" + no_id).addClass('text-colors-on')
        }
        $.LoadingOverlay("hide")
    })
}


</script>
@endpush