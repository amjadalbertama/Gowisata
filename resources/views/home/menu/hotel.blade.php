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
                                    <h1 class="h6 font-weight-normal text-center text-uppercase ">Cari Tiket Kereta</h1>
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
                                            <button class="btn btn-primary btn-block col-2 md-auto top-100 start-50" id="">Cari Tiket</button>
                                        </div>
                                            
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- .col -->
                </div><!-- .row -->
            </div>
           
        </div><!-- Main Col -->
    </div><!-- body-row -->
</div><!-- .container-fluid-->
@endsection