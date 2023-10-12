<div class="card shadow-sm" style="width: 250px;">
    <div class="card-body">
        <ul class="list-group list-group-flush flex-column">
            <div class="d-flex w-100 justify-content-start align-items-center" style="border-bottom:1px solid #D3D3D3; margin-left: 10px;">
                <small id="collapse-text" class="h6 align-items-center"><b>Kategori Pesanan</b></small>
                <span id="collapse-icon" class="fa fa-fw fa-small-collapse ml-auto"></span>
            </div>
            <button class="list-group-item list-group-item-action list-group-item align-items-start bg-transparent border-0" id="allOrder" onclick="allOrder()">
                <div class="d-flex justify-content-start align-items-center">
                    <span class="fa fa-th-list fa-fw mr-3"></span>
                    <span class="menu-collapsed">Semua Pesanan</span>
                </div>
            </button>
            <button class="list-group-item list-group-item-action list-group-item align-items-start bg-transparent border-0" id="kaiReg" onclick="kaiReg()">
                <div class="d-flex justify-content-start align-items-center">
                    <span class="fa fa-train fa-fw mr-3"></span>
                    <span class="menu-collapsed">KAI Regular</span>
                </div>
            </button>
            <button class="list-group-item list-group-item-action list-group-item align-items-start bg-transparent border-0" id="kaiWisata" onclick="kaiWisata()">
                <div class="d-flex justify-content-start align-items-center">
                    <span class="fa fa-subway fa-fw mr-3"></span>
                    <span class="menu-collapsed">KAI Wisata</span>
                </div>
            </button>
            <button class="list-group-item list-group-item-action list-group-item align-items-start bg-transparent border-0" id="kaiLuar" onclick="kaiLuarBiasa()">
                <div class="d-flex justify-content-start align-items-center">
                    <span class="fa fa-subway fa-fw mr-3"></span>
                    <span class="menu-collapsed">KAI Luar Biasa</span>
                </div>
            </button>
            <button class="list-group-item list-group-item-action list-group-item align-items-start bg-transparent border-0" id="KaiIstimewa" onclick="KaiIstimewa()">
                <div class="d-flex justify-content-start align-items-center">
                    <span class="fa fad fa-subway fa-fw mr-3"></span>
                    <span class="menu-collapsed">KAI Istimewa</span>
                </div>
            </button>
            <button class="list-group-item list-group-item-action list-group-item align-items-start bg-transparent border-0" id="pesawatOrder" onclick="pesawatOrder()">
                <div class="d-flex justify-content-start align-items-center">
                    <span class="fa fa-plane fa-fw mr-3"></span>
                    <span class="menu-collapsed">Tiket Pesawat</span>
                </div>
            </button>
            <button class="list-group-item list-group-item-action list-group-item align-items-start bg-transparent border-0" id="hotelOrder" onclick="hotelOrder()">
                <div class="d-flex justify-content-start align-items-center">
                    <span class="fa fa-bed fa-fw mr-3"></span>
                    <span class="menu-collapsed">Hotel</span>
                </div>
            </button>
            <!-- <button class="list-group-item list-group-item-action list-group-item align-items-start bg-transparent border-0" >
                <div class="d-flex justify-content-start align-items-center">
                    <span class="fa fa-map fa-fw mr-3"></span>
                    <span class="menu-collapsed">Wisata</span>
                </div>
            </button> -->
            <button class="list-group-item list-group-item-action list-group-item align-items-start bg-transparent border-0" id="miceOrder" onclick="miceOrder()">
                <div class="d-flex justify-content-start align-items-center">
                    <span class="fa fa-digital-tachograph fa-fw mr-3"></span>
                    <span class="menu-collapsed">MICE</span>
                </div>
            </button>
            <!-- <button class="list-group-item list-group-item-action list-group-item align-items-start bg-transparent border-0" id="digitalGoods" onclick="formDgtGoodview()">
                <div class="d-flex justify-content-start align-items-center">
                    <span class="fa fa-television fa-fw mr-3"></span>
                    <span class="menu-collapsed">Digital Goods</span>
                </div>
            </button> -->
        </ul>
    </div>
</div>
@push('scripts')
<script>
function allOrder(){
    window.location.href = "/listorder";
}
function kaiReg(){
    window.location.href = "/order/kaiRegular";
}
function kaiWisata(){
    window.location.href = "/order/kaiWisata";
}
function kaiLuarBiasa(){
    window.location.href = "/order/kaiLuarbiasa";
}
function KaiIstimewa(){
    window.location.href = "/order/kaiIstimewa";
}
function pesawatOrder(){
    window.location.href = "/order/pesawat";
}
function hotelOrder(){
    window.location.href = "/order/hotel";
}
function miceOrder(){
    window.location.href = "/order/mice";
}
</script>
@endpush