<div class="card shadow-sm ">
    <div class="card-body">
        <ul class="list-group list-group-flush">
            <div class="d-flex w-100 justify-content-start align-items-center" style="border-bottom:1px solid #D3D3D3; margin-left: 10px;">
                <small id="collapse-text" class="h6 align-items-center text-colors-on"><b>MENU</b></small>
                <span id="collapse-icon" class="fa fa-fw fa-small-collapse ml-auto"></span>
            </div>
            <!-- <hr> -->
            <button class="list-group-item list-group-item-action flex-column align-items-start bg-transparent border-bottom-0" id="tes" value="0" onclick="dropFunc()"><span class="fa fa-train fa-fw mr-3"></span>Tiket Kereta
                    <i class="fa fa-caret-left" style="margin-left: 60px;"></i>
            </button>
                <!-- <div class="d-flex justify-content-start align-items-center"> -->
                    <div class="d-none" style="margin-left: 10px;" id="list_train">
                        <button class="list-group-item list-group-item-action list-group-item align-items-start bg-transparent border-0" id="sideKrlReg" onclick="formKrlRegular()">
                            <div class="d-flex justify-content-start align-items-center">
                                <span class="fa fa-ticket fa-fw mr-3"></span>
                                <span class="menu-collapsed ">Tiket Kereta Regular</span>
                            </div>
                        </button>
                        <button class="list-group-item list-group-item-action list-group-item align-items-start bg-transparent border-0" id="sideKrlWis" onclick="formKrlWisata()">
                            <div class="d-flex justify-content-start align-items-center">
                                <span class="fa fa-ticket fa-fw mr-3"></span>
                                <span class="menu-collapsed">Tiket Kereta Wisata</span>
                            </div>
                        </button>
                        <button class="list-group-item list-group-item-action list-group-item align-items-start bg-transparent border-0" id="sideKrlLuarBiasa" onclick="formKrlLuarBiasa()">
                            <div class="d-flex justify-content-start align-items-center">
                                <span class="fa fa-ticket fa-fw mr-3"></span>
                                <span class="menu-collapsed">Tiket Kereta Luar Biasa</span>
                            </div>
                        </button>
                        <button class="list-group-item list-group-item-action list-group-item align-items-start bg-transparent border-0" id="sideKrlIstimewa" onclick="formKrlIstimewa()">
                            <div class="d-flex justify-content-start align-items-center">
                                <span class="fa fa-ticket fa-fw mr-3"></span>
                                <span class="menu-collapsed">Tiket Kereta Istimewa</span>
                            </div>
                        </button>
                        <!-- <a href="" class="list-group-item list-group-item-action align-items-start bg-transparent  py-2 border-bottom-0">
                            
                        </a> -->
                    </div>
                <!-- </div> -->
            <button class="list-group-item list-group-item-action list-group-item align-items-start bg-transparent border-0" id="sideOdrPesawat" onclick="formOdrPesawat()">
                <div class="d-flex justify-content-start align-items-center">
                    <span class="fa fa-plane fa-fw mr-3"></span>
                    <span class="menu-collapsed">Tiket Pesawat</span>
                </div>
            </button>
            <button class="list-group-item list-group-item-action list-group-item align-items-start bg-transparent border-0" id="sideHotel" onclick="formHotel()">
                <div class="d-flex justify-content-start align-items-center">
                    <span class="fa fa-bed fa-fw mr-3"></span>
                    <span class="menu-collapsed">Hotel</span>
                </div>
            </button>
            <button class="list-group-item list-group-item-action list-group-item align-items-start bg-transparent border-0" >
                <div class="d-flex justify-content-start align-items-center">
                    <span class="fa fa-map fa-fw mr-3"></span>
                    <span class="menu-collapsed">Wisata</span>
                </div>
            </button>
            <button class="list-group-item list-group-item-action list-group-item align-items-start bg-transparent border-0" id="sideMice" onclick="formMice()">
                <div class="d-flex justify-content-start align-items-center">
                    <span class="fa fa-cloud fa-fw mr-3"></span>
                    <span class="menu-collapsed">MICE</span>
                </div>
            </button>
            <button class="list-group-item list-group-item-action list-group-item align-items-start bg-transparent border-0" id="digitalGoods" onclick="formDgtGoodview()">
                <div class="d-flex justify-content-start align-items-center">
                    <span class="fa fa-television fa-fw mr-3"></span>
                    <span class="menu-collapsed">Digital Goods</span>
                </div>
            </button>
        </ul>
    </div>
</div>