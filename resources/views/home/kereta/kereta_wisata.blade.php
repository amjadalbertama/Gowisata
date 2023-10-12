@extends('layout.app')

@section('content')
<div class="container-fluid mt-100">
    <div class="row" id="body-sidemenu">
        <div id="main-content" class="col with-fixed-sidebar pb-5 pt-3">
            <div class="container">
                <div class="row">
                    <!-- <div class="col-10 text-center pt-5">
                        <h5>Jumbotron</h5>
                    </div>  -->
                  <div class="pt-2">
                    @include('component.sidebar')
                  </div>
                  <div class="col-9 pt-2"><br>
                        <h1 class="h6 font-weight-normal text-center text-uppercase"> <b>Pilih Gerbong Kereta Wisata</b> </h1>
                                    <hr>
                        <div class="card shadow p-3 mb-5 bg-body rounded">
                            <div class="card-body">
                                <div class="col-12">
                                    <div class="custom-control custom-checkbox ">
                                        <input type="checkbox" class="custom-control-input" id="defaultUnchecked">
                                        <label class="custom-control-label" for="defaultUnchecked">Default unchecked</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="defaultUnchecked">
                                        <label class="custom-control-label" for="defaultUnchecked">Default unchecked</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="defaultUnchecked">
                                        <label class="custom-control-label" for="defaultUnchecked">Default unchecked</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="defaultUnchecked">
                                        <label class="custom-control-label" for="defaultUnchecked">Default unchecked</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="defaultUnchecked">
                                        <label class="custom-control-label" for="defaultUnchecked">Default unchecked</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="defaultUnchecked">
                                        <label class="custom-control-label" for="defaultUnchecked">Default unchecked</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="defaultUnchecked">
                                        <label class="custom-control-label" for="defaultUnchecked">Default unchecked</label>
                                    </div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="defaultUnchecked">
                                        <label class="custom-control-label" for="defaultUnchecked">Default unchecked</label>
                                    </div>
                                        
                                </div>
                                <br><br><br>
                                <div class="row col-12 text-center">
                                      
                                        <button class="btn col-4" id="genKodeBayar" style="background-image: linear-gradient(red, rgb(251, 140, 1));"><b class="text-white">Buat Pemesanan</b></button>
                                </div>
                            </div>
                        </div>
                    </div>
                
            </div>
        </div><!-- Main Col -->
    </div><!-- body-row -->
</div><!-- .container-fluid-->
@endsection

@push('scripts')
<script>
   
</script>
@endpush