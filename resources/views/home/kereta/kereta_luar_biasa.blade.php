@extends('layout.app')

@section('content')
<div class="container-fluid mt-100">
    <div class="row" id="body-sidemenu">
        <div id="main-content" class="col with-fixed-sidebar bg-light pb-5 pt-3">
            <div class="container">
                <div class="row">
                    <!-- <div class="col-10 text-center pt-5">
                        <h5>Jumbotron</h5>
                    </div>  -->
                  <div class="pt-2">
                    @include('component.sidebar')
                  </div>
                    <div class="col-9 pt-2">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12">
                                        <h1 class="h6 font-weight-normal text-center text-uppercase "> <b>Cari Tiket Kereta Luar Biasa</b> </h1>
                                    <hr>
                                        <div class="row">
                                            <div class="form-group col-5">
                                                <label for="type">Asal: <span class="text-danger">*</span></label>
                                                <input list="type_li" class="form-control inputVal" id="type" name="type" placeholder="Asal..." value="" />
                                                <datalist id="type_li">
                                                    <option value="">tes</option>
                                                </datalist>
                                                <div class="valid-feedback">Valid.</div>
                                                <div class="invalid-feedback">Isian ini wajib diisi.</div>
                                            </div>
                                            <div class="form-group col-5">
                                                <label for="status">Tujuan: <span class="text-danger">*</span></label>
                                                <input list="status_li" class="form-control inputVal" id="status" name="status" placeholder="Tujuan.." value=""/>
                                                <datalist id="status_li">
                                                    <option value="">tes</option>
                                                </datalist>
                                                <div class="valid-feedback">Valid.</div>
                                                <div class="invalid-feedback">Isian ini wajib diisi.</div>
                                            </div>
                                            <div class="form-group col-2" style="margin-top: 30px;">
                                                <a href=""><i class="fa fa-refresh fa-2x"></i></a>
                                            </div>
                                        </div>
                                        <!-- <br> -->
                                        <div class="row ">
                                            <div class="form-group col-3">
                                                <label for="type">Tanggal Berangkat: <span class="text-danger">*</span></label>
                                                <input  class="form-control inputVal" type="date" id="type" name="type" value="" />
                                                <div class="valid-feedback">Valid.</div>
                                                <div class="invalid-feedback">Isian ini wajib diisi.</div>
                                            </div>
                                            <div class="form-group col-3">
                                                <label for="type">Tanggal Pulang: </label>
                                                <input  class="form-control inputVal" type="date" id="type" name="type" value="" />
                                                <div class="valid-feedback">Valid.</div>
                                                <div class="invalid-feedback">Isian ini wajib diisi.</div>
                                            </div>
                                            <div class="form-group col-3">
                                                <label for="type">Dewasa: </label>
                                                <input  class="form-control inputVal" type="number" id="type" name="type" value="" />
                                                <div class="valid-feedback">Valid.</div>
                                                <div class="invalid-feedback">Isian ini wajib diisi.</div>
                                            </div>
                                            <div class="form-group col-3">
                                                <label for="type">Anak: </label>
                                                <input  class="form-control inputVal" type="number" id="type" name="type" value="" />
                                                <div class="valid-feedback">Valid.</div>
                                                <div class="invalid-feedback">Isian ini wajib diisi.</div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-5">
                                                
                                            </div>
                                            <button class="btn btn-primary btn-block col-2 md-auto top-100 start-50" id="cariTiket">Cari Tiket</button>
                                        </div>
                                            
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    <div class="card shadow-sm mt-3 d-none" id="tabel_kereta">
                        <div class="table-responsive" >
                            <table class="table bg-white">
                                <thead class="thead-main text-nowrap">
                                    <tr class="text-uppercase font-11" id="header_account">
                                        <th class="text-center" colspan="7">List Tiket Tersedia</th>
                                    </tr>
                                    <!-- <tr class="text-uppercase font-11" id="header_account">
                                        <th class="text-center" colspan="7">filter</th>
                                    </tr> -->
                                    <tr id="">
                                        <th class="text-center col-md-1">Nama Kereta</th>
                                        <th class="text-center col-md-1">kelas</th>
                                        <th class="text-center col-md-1">Asal</th>
                                        <th class="text-center col-md-1">Tujuan</th>
                                        <th class="text-center col-md-1">Harga</th>
                                        <th class="text-center col-md-1">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody class="text-nowrap" id="tableFinance">
                                    <tr>
                                        <td id="" class="pl-3 text-center ">data tes</td>
                                        <td id="" class="pl-3 text-center ">data tes</td>
                                        <td id="" class="pl-3 text-center ">data tes</td>
                                        <td id="" class="pl-3 text-center ">data tes</td>
                                        <td id="" class="pl-3 text-center ">data tes</td>
                                        <td id="" class="pl-3 text-center ">data tes</td>
                                    </tr>
                                </tbody>
                                <tfoot class="border-bottom">
                                    <!-- <tr class="bg-brown">
                                        <td id="beforeAddData" colspan="7" class="pl-3 text-center font-12">Tidak ada data yang ditampilkan</td>
                                    </tr> -->
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div><!-- .row -->
            </div>
        </div><!-- Main Col -->
    </div><!-- body-row -->
</div><!-- .container-fluid-->
@endsection

@push('scripts')
<script>

    $('#cariTiket').on('click', function() {
        $("#tabel_kereta").removeClass('d-none');     
    })
    
    

   function dropFunc(){
        var tes = $("#tes").val();
        // console.log(tes);
        if (tes == 0) {
            $("#list_train").removeClass('d-none');
            var btnEdtComob = `<button class="list-group-item list-group-item-action flex-column align-items-start bg-transparent border-bottom-0" id="tes" value="1" onclick="dropFunc()"><span class="fa fa-train fa-fw mr-3"></span>Tiket Kereta
                <i class="fa fa-caret-down" style="margin-left: 60px;"></i>
            </button>`;
            $("#tes" ).replaceWith(btnEdtComob)
        } else if (tes == 1){
            $("#list_train").addClass('d-none'); 
            var btnEdtComob = `<button class="list-group-item list-group-item-action flex-column align-items-start bg-transparent border-bottom-0" id="tes" value="0" onclick="dropFunc()"><span class="fa fa-train fa-fw mr-3"></span>Tiket Kereta
                <i class="fa fa-caret-left" style="margin-left: 60px;"></i>
            </button>`;
            $("#tes" ).replaceWith(btnEdtComob)
        }  
    }
</script>
@endpush