@extends('layout.app')

@section('content')
<div class="container-fluid mt-100 main-font">
    <div class="row" id="body-sidemenu">
        <div id="main-content" class="col with-fixed-sidebar pb-5 pt-3">
            <div class="container">
                <div class="row">
                    <!-- <div class="col-10 text-center pt-5">
                        <h5>Jumbotron</h5>
                    </div>  -->
                  
                    <div class="col-12 pt-2">
                        <div class="card shadow p-3 mb-5 bg-body rounded">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-12">
                                        <h1 class="h5 font-weight-normal text-center text-uppercase text-colors-on"> <b>Pilih Kursi Kereta</b> </h5>
                                        <hr>

                                        <div class="row">
                                            <div class="col-2"></div>
                                            <div class="form-group col-2">
                                                <label for="">Pilih Gerbong : </label>
                                                <select class="form-control form-control-sm " id="wagon" name="" value="">

                                                </select>
                                            </div>
                                            <div class="form-group col-3">
                                                <label for="">Pilih Penumpang : </label>
                                                <select class="form-control form-control-sm" id="list_pax" name="" value="2">

                                                </select>
                                            </div>
                                            <div class="form-group col-3">
                                                <div>
                                                    Nomor Kursi : <b><div id="no_kursi"></div></b>
                                                </div>
                                            </div>
                                        </div>
                                        <br>
                                        <div class="row">
                                            <div class="col-2">

                                            </div>
                                            <div class="col-4">
                                                <div class="card shadow-sm col-12">
                                                    <div class="card-body">
                                                        <h5 class="text-colors-on"><b> Detail Booking Kereta Regular</b></h5>
                                                        <hr>
                                                        <div>
                                                            Pemesan : <b><div id="name_pemesan"></div></b>
                                                        </div>
                                                        <div>
                                                            Nama Kereta: <b><div id="name_train"></div></b>
                                                        </div>
                                                        <div>
                                                            Kode Booking : <b><div id="code_book"></div></b>
                                                        </div>
                                                        <div>
                                                            Batas Waktu : <b><div id="time_limit"></div></b>
                                                        </div>
                                                        <div>
                                                            Harga Total :  <b>Rp. <div id="total_price"></div></b>
                                                        </div>
                                                        <hr>
                                                        <div>
                                                            <div id="name_produk"></div>
                                                        </div>
                                                        <div>
                                                            <div id="rute_asal"></div>  <i class="fa fa-arrow-right mr-1 "></i> <div id="rute_tujuan"></div><br>
                                                        </div>
                                                    </div>
                                                </div><br>
                                                <!-- <div class="card shadow-sm col-12">
                                                    <div class="card-body">
                                                        <h5>List Penumpang dan gerbong</h5>
                                                        <hr>
                                                    </div>
                                                </div> -->
                                            </div>
                                            <div class="col-4 pt-2 " style=" border: 4px solid; border-radius: 5px; border-color: rgb(251, 140, 1);">
                                                <div class="" >
                                                    <div class="row"> 
                                                        <table class="table-sm text-center text-nowrap col-12">
                                                            <!-- Ekonomi -->
                                                            <tbody id="layout_ekonomi" class="d-none">
                                                                <tr id="">
                                                                    <td class="" id="seatTrainA1">
                                                                        <a id="seatA1" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">A</a>
                                                                    </td>
                                                                    <td class="" id="seatTrainB1">
                                                                        <a id="seatB1" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">B</a>
                                                                    </td>
                                                                    <td class="">
                                                                        <a id=""><b>1</b></a>
                                                                    </td>
                                                                    <td class="" id="seatTrainC1">
                                                                        <a id="seatC1" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">C</a>
                                                                    </td>
                                                                    <td class="" id="seatTrainD1">
                                                                        <a id="seatD1" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">D</a>
                                                                    </td>
                                                                 </tr>
                                                                 <tr id="">
                                                                    <td class="" id="seatTrainA2">
                                                                        <a id="seatA2" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">A</a>
                                                                    </td>
                                                                    <td class="" id="seatTrainB2">
                                                                        <a id="seatB2" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">B</a>
                                                                    </td>
                                                                    <td class="">
                                                                        <a id=""><b>2</b></a>
                                                                    </td>
                                                                    <td class="" id="seatTrainC2">
                                                                        <a id="seatC2" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">C</a>
                                                                    </td>
                                                                    <td class="" id="seatTrainD2">
                                                                        <a id="seatD2" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">D</a>
                                                                    </td>
                                                                 </tr>
                                                                 <tr id="">
                                                                    <td class="" id="seatTrainA3">
                                                                        <a id="seatA3" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">A</a>
                                                                    </td>
                                                                    <td class="" id="seatTrainB3">
                                                                        <a id="seatB3" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">B</a>
                                                                    </td>
                                                                    <td class="">
                                                                        <a id=""><b>3</b></a>
                                                                    </td>
                                                                    <td class="" id="seatTrainC3">
                                                                        <a id="seatC3" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">C</a>
                                                                    </td>
                                                                    <td class="" id="seatTrainD3">
                                                                        <a id="seatD3" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">D</a>
                                                                    </td>
                                                                 </tr>
                                                                 <tr id="">
                                                                    <td class="" id="seatTrainA4">
                                                                        <a id="seatA4" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">A</a>
                                                                    </td>
                                                                    <td class="" id="seatTrainB4">
                                                                        <a id="seatB4" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">B</a>
                                                                    </td>
                                                                    <td class="">
                                                                        <a id=""><b>4</b></a>
                                                                    </td>
                                                                    <td class="" id="seatTrainC4">
                                                                        <a id="seatC4" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">C</a>
                                                                    </td>
                                                                    <td class="" id="seatTrainD4">
                                                                        <a id="seatD4" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">D</a>
                                                                    </td>
                                                                 </tr>
                                                                 <tr id="">
                                                                    <td class="" id="seatTrainA5">
                                                                        <a id="seatA5" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">A</a>
                                                                    </td>
                                                                    <td class="" id="seatTrainB5">
                                                                        <a id="seatB5" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">B</a>
                                                                    </td>
                                                                    <td class="">
                                                                        <a id=""><b>5</b></a>
                                                                    </td>
                                                                    <td class="" id="seatTrainC5">
                                                                        <a id="seatC5" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">C</a>
                                                                    </td>
                                                                    <td class="" id="seatTrainD5">
                                                                        <a id="seatD5" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">D</a>
                                                                    </td>
                                                                 </tr>
                                                                 <tr id="">
                                                                    <td class="" id="seatTrainA6">
                                                                        <a id="seatA6" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">A</a>
                                                                    </td>
                                                                    <td class="" id="seatTrainB6">
                                                                        <a id="seatB6" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">B</a>
                                                                    </td>
                                                                    <td class="">
                                                                        <a id=""><b>6</b></a>
                                                                    </td>
                                                                    <td class="" id="seatTrainC6">
                                                                        <a id="seatC6" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">C</a>
                                                                    </td>
                                                                    <td class="" id="seatTrainD6">
                                                                        <a id="seatD6" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">D</a>
                                                                    </td>
                                                                 </tr>
                                                                 <tr id="">
                                                                    <td class="" id="seatTrainA7">
                                                                        <a id="seatA7" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">A</a>
                                                                    </td>
                                                                    <td class="" id="seatTrainB7">
                                                                        <a id="seatB7" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">B</a>
                                                                    </td>
                                                                    <td class="">
                                                                        <a id=""><b>7</b></a>
                                                                    </td>
                                                                    <td class="" id="seatTrainC7">
                                                                        <a id="seatC7" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">C</a>
                                                                    </td>
                                                                    <td class="" id="seatTrainD7">
                                                                        <a id="seatD7" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">D</a>
                                                                    </td>
                                                                 </tr>
                                                                 <tr id="">
                                                                    <td class="" id="seatTrainA8">
                                                                        <a id="seatA8" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">A</a>
                                                                    </td>
                                                                    <td class="" id="seatTrainB8">
                                                                        <a id="seatB8" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">B</a>
                                                                    </td>
                                                                    <td class="">
                                                                        <a id=""><b>8</b></a>
                                                                    </td>
                                                                    <td class="" id="seatTrainC8">
                                                                        <a id="seatC8" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">C</a>
                                                                    </td>
                                                                    <td class="" id="seatTrainD8">
                                                                        <a id="seatD8" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">D</a>
                                                                    </td>
                                                                 </tr>
                                                                 <tr id="">
                                                                    <td class="" id="seatTrainA9">
                                                                        <a id="seatA9" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">A</a>
                                                                    </td>
                                                                    <td class="" id="seatTrainB9">
                                                                        <a id="seatB9" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">B</a>
                                                                    </td>
                                                                    <td class="">
                                                                        <a id=""><b>9</b></a>
                                                                    </td>
                                                                    <td class="" id="seatTrainC9">
                                                                        <a id="seatC9" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">C</a>
                                                                    </td>
                                                                    <td class="" id="seatTrainD9">
                                                                        <a id="seatD9" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">D</a>
                                                                    </td>
                                                                 </tr>
                                                                 <tr id="">
                                                                    <td class="" id="seatTrainA10">
                                                                        <a id="seatA10" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">A</a>
                                                                    </td>
                                                                    <td class="" id="seatTrainB10">
                                                                        <a id="seatB10" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">B</a>
                                                                    </td>
                                                                    <td class="">
                                                                        <a id=""><b>10</b></a>
                                                                    </td>
                                                                    <td class="" id="seatTrainC10">
                                                                        <a id="seatC10" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">C</a>
                                                                    </td>
                                                                    <td class="" id="seatTrainD10">
                                                                        <a id="seatD10" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">D</a>
                                                                    </td>
                                                                 </tr>
                                                                 <tr id="">
                                                                    <td class="" id="seatTrainA11">
                                                                        <a id="seatA11" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">A</a>
                                                                    </td>
                                                                    <td class="" id="seatTrainB11">
                                                                        <a id="seatB11" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">B</a>
                                                                    </td>
                                                                    <td class="">
                                                                        <a id=""><b>11</b></a>
                                                                    </td>
                                                                    <td class="" id="seatTrainC11">
                                                                        <a id="seatC11" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">C</a>
                                                                    </td>
                                                                    <td class="" id="seatTrainD11">
                                                                        <a id="seatD11" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">D</a>
                                                                    </td>
                                                                 </tr>
                                                                 <tr id="">
                                                                    <td class="" id="seatTrainA12">
                                                                        <a id="seatA12" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">A</a>
                                                                    </td>
                                                                    <td class="" id="seatTrainB12">
                                                                        <a id="seatB12" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">B</a>
                                                                    </td>
                                                                    <td class="">
                                                                        <a id=""><b>12</b></a>
                                                                    </td>
                                                                    <td class="" id="seatTrainC12">
                                                                        <a id="seatC12" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">C</a>
                                                                    </td>
                                                                    <td class="" id="seatTrainD12">
                                                                        <a id="seatD12" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">D</a>
                                                                    </td>
                                                                 </tr>
                                                                 <tr id="">
                                                                    <td class="" id="seatTrainA13">
                                                                        <a id="seatA13" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">A</a>
                                                                    </td>
                                                                    <td class="" id="seatTrainB13">
                                                                        <a id="seatB13" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">B</a>
                                                                    </td>
                                                                    <td class="">
                                                                        <a id=""><b>13</b></a>
                                                                    </td>
                                                                    <td class="" id="seatTrainC13">
                                                                        <a id="seatC13" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">C</a>
                                                                    </td>
                                                                    <td class="" id="seatTrainD13">
                                                                        <a id="seatD13" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">D</a>
                                                                    </td>
                                                                 </tr>
                                                                 <tr id="">
                                                                    <td class="" id="seatTrainA14">
                                                                        <a id="seatA14" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">A</a>
                                                                    </td>
                                                                    <td class="" id="seatTrainB14">
                                                                        <a id="seatB14" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">B</a>
                                                                    </td>
                                                                    <td class="">
                                                                        <a id=""><b>14</b></a>
                                                                    </td>
                                                                    <td class="" id="seatTrainC14">
                                                                        <a id="seatC14" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">C</a>
                                                                    </td>
                                                                    <td class="" id="seatTrainD14">
                                                                        <a id="seatD14" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">D</a>
                                                                    </td>
                                                                 </tr>
                                                                 <tr id="">
                                                                    <td class="" id="seatTrainA15">
                                                                        <a id="seatA15" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">A</a>
                                                                    </td>
                                                                    <td class="" id="seatTrainB15">
                                                                        <a id="seatB15" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">B</a>
                                                                    </td>
                                                                    <td class="">
                                                                        <a id=""><b>15</b></a>
                                                                    </td>
                                                                    <td class="" id="seatTrainC15">
                                                                        <a id="seatC15" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">C</a>
                                                                    </td>
                                                                    <td class="" id="seatTrainD15">
                                                                        <a id="seatD15" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">D</a>
                                                                    </td>
                                                                 </tr>
                                                                 <tr id="">
                                                                    <td class="" id="seatTrainA16">
                                                                        <a id="seatA16" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">A</a>
                                                                    </td>
                                                                    <td class="" id="seatTrainB16">
                                                                        <a id="seatB16" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">B</a>
                                                                    </td>
                                                                    <td class="">
                                                                        <a id=""><b>16</b></a>
                                                                    </td>
                                                                    <td class="" id="seatTrainC16">
                                                                        <a id="seatC16" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">C</a>
                                                                    </td>
                                                                    <td class="" id="seatTrainD16">
                                                                        <a id="seatD16" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">D</a>
                                                                    </td>
                                                                 </tr>
                                                                 <tr id="">
                                                                    <td class="" id="seatTrainA17">
                                                                        <a id="seatA17" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">A</a>
                                                                    </td>
                                                                    <td class="" id="seatTrainB17">
                                                                        <a id="seatB17" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">B</a>
                                                                    </td>
                                                                    <td class="" >
                                                                        <a id=""><b>17</b></a>
                                                                    </td>
                                                                    <td class="" id="seatTrainC17">
                                                                        <a id="seatC17" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">C</a>
                                                                    </td>
                                                                    <td class="" id="seatTrainD17">
                                                                        <a id="seatD17" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">D</a>
                                                                    </td>
                                                                 </tr>
                                                                 <tr id="">
                                                                    <td class="" id="seatTrainA18">
                                                                        <a id="seatA18" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">A</a>
                                                                    </td>
                                                                    <td class="" id="seatTrainB18">
                                                                        <a id="seatB18" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">B</a>
                                                                    </td>
                                                                    <td class="">
                                                                        <a id=""><b>18</b></a>
                                                                    </td>
                                                                    <td class="" id="seatTrainC18">
                                                                        <a id="seatC18" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">C</a>
                                                                    </td>
                                                                    <td class="" id="seatTrainD18">
                                                                        <a id="seatD18" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">D</a>
                                                                    </td>
                                                                 </tr>
                                                                 <tr id="">
                                                                    <td class="" id="seatTrainA19">
                                                                        <a id="seatA19" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">A</a>
                                                                    </td>
                                                                    <td class="" id="seatTrainB19">
                                                                        <a id="seatB19" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">B</a>
                                                                    </td>
                                                                    <td class="">
                                                                        <a id=""><b>19</b></a>
                                                                    </td>
                                                                    <td class="" id="seatTrainC19">
                                                                        <a id="seatC19" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">C</a>
                                                                    </td>
                                                                    <td class="" id="seatTrainC19">
                                                                        <a id="seatD19" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">D</a>
                                                                    </td>
                                                                 </tr>
                                                                 <tr id="">
                                                                    <td class="" id="seatTrainC20">
                                                                        <a id="seatA20" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">A</a>
                                                                    </td>
                                                                    <td class="" id="seatTrainC20">
                                                                        <a id="seatB20" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">B</a>
                                                                    </td>
                                                                    <td class="">
                                                                        <a id=""><b>20</b></a>
                                                                    </td>
                                                                    <td class="" id="seatTrainC20">
                                                                        <a id="seatC20" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">C</a>
                                                                    </td>
                                                                    <td class="" id="seatTrainC20">
                                                                        <a id="seatD20" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">D</a>
                                                                    </td>
                                                                 </tr>
                                                            </tbody>


                                                            <!-- Eksekutif -->
                                                            <tbody id="layout_eksekutif" class="">
                                                                <tr id="">
                                                                    <td class="" id="seatTrainA1">
                                                                        <a id="seatEksA1" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">A</a>
                                                                    </td>
                                                                    <td class="" id="seatTrainB1">
                                                                        <a id="seatEksB1" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">B</a>
                                                                    </td>
                                                                    <td class="">
                                                                        <a id=""><b>1</b></a>
                                                                    </td>
                                                                    <td class="" id="seatTrainC1">
                                                                        <a id="seatEksC1" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">C</a>
                                                                    </td>
                                                                    <td class="" id="seatTrainD1">
                                                                    </td>
                                                                 </tr>
                                                                 <tr id="">
                                                                    <td class="" id="seatTrainA2">
                                                                        <a id="seatEksA2" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">A</a>
                                                                    </td>
                                                                    <td class="" id="seatTrainB2">
                                                                        <a id="seatEksB2" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">B</a>
                                                                    </td>
                                                                    <td class="">
                                                                        <a id=""><b>2</b></a>
                                                                    </td>
                                                                    <td class="" id="seatTrainC2">
                                                                        <a id="seatEksC2" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">C</a>
                                                                    </td>
                                                                    <td class="" id="seatTrainD2">
                                                                        <a id="seatEksD2" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">D</a>
                                                                    </td>
                                                                 </tr>
                                                                 <tr id="">
                                                                    <td class="" id="seatTrainA3">
                                                                        <a id="seatEksA3" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">A</a>
                                                                    </td>
                                                                    <td class="" id="seatTrainB3">
                                                                        <a id="seatEksB3" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">B</a>
                                                                    </td>
                                                                    <td class="">
                                                                        <a id=""><b>3</b></a>
                                                                    </td>
                                                                    <td class="" id="seatTrainC3">
                                                                        <a id="seatEksC3" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">C</a>
                                                                    </td>
                                                                    <td class="" id="seatTrainD3">
                                                                        <a id="seatEksD3" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">D</a>
                                                                    </td>
                                                                 </tr>
                                                                 <tr id="">
                                                                    <td class="" id="seatTrainA4">
                                                                        <a id="seatEksA4" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">A</a>
                                                                    </td>
                                                                    <td class="" id="seatTrainB4">
                                                                        <a id="seatEksB4" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">B</a>
                                                                    </td>
                                                                    <td class="">
                                                                        <a id=""><b>4</b></a>
                                                                    </td>
                                                                    <td class="" id="seatTrainC4">
                                                                        <a id="seatEksC4" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">C</a>
                                                                    </td>
                                                                    <td class="" id="seatTrainD4">
                                                                        <a id="seatEksD4" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">D</a>
                                                                    </td>
                                                                 </tr>
                                                                 <tr id="">
                                                                    <td class="" id="seatTrainA5">
                                                                        <a id="seatEksA5" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">A</a>
                                                                    </td>
                                                                    <td class="" id="seatTrainB5">
                                                                        <a id="seatEksB5" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">B</a>
                                                                    </td>
                                                                    <td class="">
                                                                        <a id=""><b>5</b></a>
                                                                    </td>
                                                                    <td class="" id="seatTrainC5">
                                                                        <a id="seatEksC5" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">C</a>
                                                                    </td>
                                                                    <td class="" id="seatTrainD5">
                                                                        <a id="seatEksD5" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">D</a>
                                                                    </td>
                                                                 </tr>
                                                                 <tr id="">
                                                                    <td class="" id="seatTrainA6">
                                                                        <a id="seatEksA6" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">A</a>
                                                                    </td>
                                                                    <td class="" id="seatTrainB6">
                                                                        <a id="seatEksB6" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">B</a>
                                                                    </td>
                                                                    <td class="">
                                                                        <a id=""><b>6</b></a>
                                                                    </td>
                                                                    <td class="" id="seatTrainC6">
                                                                        <a id="seatEksC6" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">C</a>
                                                                    </td>
                                                                    <td class="" id="seatTrainD6">
                                                                        <a id="seatEksD6" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">D</a>
                                                                    </td>
                                                                 </tr>
                                                                 <tr id="">
                                                                    <td class="" id="seatTrainA7">
                                                                        <a id="seatEksA7" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">A</a>
                                                                    </td>
                                                                    <td class="" id="seatTrainB7">
                                                                        <a id="seatEksB7" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">B</a>
                                                                    </td>
                                                                    <td class="">
                                                                        <a id=""><b>7</b></a>
                                                                    </td>
                                                                    <td class="" id="seatTrainC7">
                                                                        <a id="seatEksC7" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="">C</a>
                                                                    </td>
                                                                    <td class="" id="seatTrainD7">
                                                                        <a id="seatEksD7" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">D</a>
                                                                    </td>
                                                                 </tr>
                                                                 <tr id="">
                                                                    <td class="" id="seatTrainA8">
                                                                        <a id="seatEksA8" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">A</a>
                                                                    </td>
                                                                    <td class="" id="seatTrainB8">
                                                                        <a id="seatEksB8" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">B</a>
                                                                    </td>
                                                                    <td class="">
                                                                        <a id=""><b>8</b></a>
                                                                    </td>
                                                                    <td class="" id="seatTrainC8">
                                                                        <a id="seatEksC8" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">C</a>
                                                                    </td>
                                                                    <td class="" id="seatTrainD8">
                                                                        <a id="seatEksD8" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">D</a>
                                                                    </td>
                                                                 </tr>
                                                                 <tr id="">
                                                                    <td class="" id="seatTrainA9">
                                                                        <a id="seatEksA9" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">A</a>
                                                                    </td>
                                                                    <td class="" id="seatTrainB9">
                                                                        <a id="seatEksB9" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">B</a>
                                                                    </td>
                                                                    <td class="">
                                                                        <a id=""><b>9</b></a>
                                                                    </td>
                                                                    <td class="" id="seatTrainC9">
                                                                        <a id="seatEksC9" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">C</a>
                                                                    </td>
                                                                    <td class="" id="seatTrainD9">
                                                                        <a id="seatEksD9" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">D</a>
                                                                    </td>
                                                                 </tr>
                                                                 <tr id="">
                                                                    <td class="" id="seatTrainA10">
                                                                        <a id="seatEksA10" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">A</a>
                                                                    </td>
                                                                    <td class="" id="seatTrainB10">
                                                                        <a id="seatEksB10" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">B</a>
                                                                    </td>
                                                                    <td class="">
                                                                        <a id=""><b>10</b></a>
                                                                    </td>
                                                                    <td class="" id="seatTrainC10">
                                                                        <a id="seatEksC10" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">C</a>
                                                                    </td>
                                                                    <td class="" id="seatTrainD10">
                                                                        <a id="seatEksD10" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">D</a>
                                                                    </td>
                                                                 </tr>
                                                                 <tr id="">
                                                                    <td class="" id="seatTrainA11">
                                                                        <a id="seatEksA11" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">A</a>
                                                                    </td>
                                                                    <td class="" id="seatTrainB11">
                                                                        <a id="seatEksB11" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">B</a>
                                                                    </td>
                                                                    <td class="">
                                                                        <a id=""><b>11</b></a>
                                                                    </td>
                                                                    <td class="" id="seatTrainC11">
                                                                        <a id="seatEksC11" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">C</a>
                                                                    </td>
                                                                    <td class="" id="seatTrainD11">
                                                                        <a id="seatEksD11" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">D</a>
                                                                    </td>
                                                                 </tr>
                                                                 <tr id="">
                                                                    <td class="" id="seatTrainA12">
                                                                        <a id="seatEksA12" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">A</a>
                                                                    </td>
                                                                    <td class="" id="seatTrainB12">
                                                                        <a id="seatEksB12" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">B</a>
                                                                    </td>
                                                                    <td class="">
                                                                        <a id=""><b>12</b></a>
                                                                    </td>
                                                                    <td class="" id="seatTrainC12">
                                                                        <a id="seatEksC12" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">C</a>
                                                                    </td>
                                                                    <td class="" id="seatTrainD12">
                                                                        <a id="seatEksD12" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">D</a>
                                                                    </td>
                                                                 </tr>
                                                                 <tr id="">
                                                                    <td class="" id="seatTrainA13">
                                                                        <!-- <a id="seatA13" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">A</a> -->
                                                                    </td>
                                                                    <td class="" id="seatTrainB13">
                                                                        <a id="seatEksB13" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">B</a>
                                                                    </td>
                                                                    <td class="">
                                                                        <a id=""><b>13</b></a>
                                                                    </td>
                                                                    <td class="" id="seatTrainC13">
                                                                        <a id="seatEksC13" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">C</a>
                                                                    </td>
                                                                    <td class="" id="seatTrainD13">
                                                                        <a id="seatEksD13" class="card shadow-sm p-3 mb-2 bg-body rounded text-colors-off" href="javascript:void(0);">D</a>
                                                                    </td>
                                                                 </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div> 
        
                                <div class="row col-12 pt-5">
                                    <div class="col-3">
                                    </div>
                                    <div class="col-3">
                                        <button class="btn btn-block  md-auto top-100 start-50 main-color" onclick="simpanAbayar()"><b class="text-colors-off"><i class="fa fa-credit-card-alt mr-2"></i>Simpan, lanjut Bayar</b> </button>
                                    </div>
                                    <div class="col-3">
                                        <button class="btn btn-block  md-auto top-100 start-50 main-color" onclick="bayarNanty()"><b class="text-colors-off"><i class="fa fa-shopping-cart mr-2"></i>Simpan, bayar nanti</b></button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- .row -->
            </div>
        </div><!-- Main Col -->
    </div><!-- body-row -->
</div><!-- .container-fluid-->
<div id="modalConfirmSeatKrlReg"></div>
<div id="modalConfirmSeatKrlRegsimpan"></div>
<!-- <div id="codeBooking"></div> -->
@endsection

@push('scripts')
<script>
    $.LoadingOverlay("show")
    //Details Info Order Kereta
    var token = JSON.parse(localStorage.getItem('data_token'));
    var code_book = JSON.parse(localStorage.getItem('code_book_krl_reg'));
    var name_pemesan = JSON.parse(localStorage.getItem('name_auth'));
    $("#name_pemesan").replaceWith(name_pemesan);
    var token_set = token['access_token']
    var url = fetch('https://api-gowisata.aturtoko.site/api/train/booking_detail',{
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token_set,
        },
        body: JSON.stringify({
            "booking_code": code_book,
        }),
        }).then((response) => response.json()).then((responseData) => {
        var train = responseData.data;
        console.log(train)
     
        var time =  train.time_limit ;
        var nomorKursi =  train.route_info[0].ticket[0].seat;
        var name_pax =  train.name ;
        var code_book =  train.gds_book_code ;
        var name_krl =  train.route_info[0].transporter_name;
        var tot_price =  train.route_info[0].total_price ;
        var org =  train.route_info[0].org ;
        var des =  train.route_info[0].des ;
        var pax_info =  train.pax_info;
        // console.log(pax_info)

              $("#code_book").replaceWith(code_book);
              $("#name_train").replaceWith(name_krl);
              $("#time_limit").replaceWith(time);
              $("#total_price").replaceWith(tot_price);
              $("#rute_asal").replaceWith(org);
              $("#rute_tujuan").replaceWith(des);
              var no_kursi = `<div id="no_kursi">`+ nomorKursi +`</div>`;
              $("#no_kursi").replaceWith(no_kursi);
            //   var sat = train.route_info[0].ticket[0].seat
            //     var net = sat.substr(6, 2);
            //     console.log(net)
            //   $("#rute_tujuan").replaceWith(pesawat);
            //   }
            var kursi = [];
            for (var i = 0; i < pax_info.length; i++){
                var pax_data =  pax_info[i];
                // console.log(pax_data)
                var no = i+1
                setPaxLght = '<option value="'+no+'">'+no+'- '+ pax_info[i].pax_name +'</option>';
                $("#list_pax").append(setPaxLght);

                var dataKursi = {
                    "nomer_kursi": train.route_info[0].ticket[i].seat
                };
                kursi.push(dataKursi)
            }
            localStorage.setItem("data_seat", JSON.stringify(kursi))
        });

        $("#list_pax").on("change", function(){
            var id_pax = $("#list_pax").val();
            var kursi = JSON.parse(localStorage.getItem('data_seat'));
            for(i = 0; i < kursi.length; i++){
                
                var nos = i+1
                if(id_pax == nos){
                    var tes = nos-1
                    var seat = kursi[tes].nomer_kursi
                    var no_kursi = `<div id="no_kursi">`+ seat +`</div>`;
                    $("#no_kursi").replaceWith(no_kursi)
                }
            }

        })
    //Pax Kereta Reg
    var url = fetch('https://api-gowisata.aturtoko.site/api/train/seat_map',{
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token_set,
        },
        body: JSON.stringify({
            "booking_code": code_book,
        }),
      }).then((response) => response.json()).then((responseData) => {
        var tesseat = responseData.data.seat_map;
        console.log(tesseat)
        $.LoadingOverlay("hide")
        for(var i = 0; i < tesseat.length; i++){
            var n = tesseat[i];
            // console.log(n)
            var nn = '<option value="'+ n[1] +'"> '+ n[0] +' - '+ n[1] +' <input id="no_ger'+n[1]+'" value="'+i+'"></input></option>';
            $("#wagon").append(nn);
            // console.log(n[2].length)
        }

        if(tesseat[0][0] == "EKO"){
            $('#layout_ekonomi').removeClass('d-none')
            $('#layout_eksekutif').addClass('d-none')
            var no_wagon = 0
            // console.log(tesseat[0][2])
            var seatWagon = tesseat[0][2]
            // console.log(seatWagon[0][5])
            if(seatWagon[0][5] != ""){
                var seat = `<a id="seatA1" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>A</a>`;
                $("#seatA1").replaceWith(seat); 
            }else{
                var seat = `<a id="seatA1" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlA(`+seatWagon[0][0]+`)">A</a>`;
                $("#seatA1").replaceWith(seat); 
            }

            if(seatWagon[1][5] != ""){
                var seat = `<a id="seatB1" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>B</a>`;
                $("#seatB1").replaceWith(seat); 
            }else{
                var seat = `<a id="seatB1" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlB(`+seatWagon[1][0]+`)">B</a>`;
                $("#seatB1").replaceWith(seat); 
            }

            if(seatWagon[2][5] != ""){
                var seat = `<a id="seatC1" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>C</a>`;
                $("#seatC1").replaceWith(seat); 
            }else{
                var seat = `<a id="seatC1" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlC(`+seatWagon[2][0]+`)">C</a>`;
                $("#seatC1").replaceWith(seat); 
            }


            if(seatWagon[3][5] != ""){
                var seat = `<a id="seatD1" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>D</a>`;
                $("#seatD1").replaceWith(seat); 
            }else{
                var seat = `<a id="seatD1" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlD(`+seatWagon[3][0]+`)">D</a>`;
                $("#seatD1").replaceWith(seat); 
            }
            if(seatWagon[4][5] != ""){
                var seat = `<a id="seatA2" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>A</a>`;
                $("#seatA2").replaceWith(seat); 
            }else{
                var seat = `<a id="seatA2" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlA(`+seatWagon[4][0]+`)">A</a>`;
                $("#seatA2").replaceWith(seat); 
            }
            if(seatWagon[5][5] != ""){
                var seat = `<a id="seatB2" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>B</a>`;
                $("#seatB2").replaceWith(seat); 
            }else{
                var seat = `<a id="seatB2" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlB(`+seatWagon[5][0]+`)">B</a>`;
                $("#seatB2").replaceWith(seat); 
            }
            if(seatWagon[6][5] != ""){
                var seat = `<a id="seatC2" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>C</a>`;
                $("#seatC2").replaceWith(seat); 
            }else{
                var seat = `<a id="seatC2" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlC(`+seatWagon[6][0]+`)">C</a>`;
                $("#seatC2").replaceWith(seat); 
            }
            if(seatWagon[7][5] != ""){
                var seat = `<a id="seatD2" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>D</a>`;
                $("#seatD2").replaceWith(seat); 
            }else{
                var seat = `<a id="seatD2" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlD(`+seatWagon[7][0]+`)">D</a>`;
                $("#seatD2").replaceWith(seat); 
            }
            if(seatWagon[8][5] != ""){
                var seat = `<a id="seatA3" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>A</a>`;
                $("#seatA3").replaceWith(seat); 
            }else{
                var seat = `<a id="seatA3" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlA(`+seatWagon[8][0]+`)">A</a>`;
                $("#seatA3").replaceWith(seat); 
            }
            if(seatWagon[9][5] != ""){
                var seat = `<a id="seatB3" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>B</a>`;
                $("#seatB3").replaceWith(seat); 
            }else{
                var seat = `<a id="seatB3" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlB(`+seatWagon[9][0]+`)">B</a>`;
                $("#seatB3").replaceWith(seat); 
            }
            if(seatWagon[10][5] != ""){
                var seat = `<a id="seatC3" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>C</a>`;
                $("#seatC3").replaceWith(seat); 
            }else{
                var seat = `<a id="seatC3" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlC(`+seatWagon[10][0]+`)">C</a>`;
                $("#seatC3").replaceWith(seat); 
            }
            if(seatWagon[11][5] != ""){
                var seat = `<a id="seatD3" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>D</a>`;
                $("#seatD3").replaceWith(seat); 
            }else{
                var seat = `<a id="seatD3" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlD(`+seatWagon[11][0]+`)">D</a>`;
                $("#seatD3").replaceWith(seat); 
            }
            if(seatWagon[12][5] != ""){
                var seat = `<a id="seatA4" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>A</a>`;
                $("#seatA4").replaceWith(seat); 
            }else{
                var seat = `<a id="seatA4" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlA(`+seatWagon[12][0]+`)">A</a>`;
                $("#seatA4").replaceWith(seat); 
            }
            if(seatWagon[13][5] != ""){
                var seat = `<a id="seatB4" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>B</a>`;
                $("#seatB4").replaceWith(seat); 
            }else{
                var seat = `<a id="seatB4" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlB(`+seatWagon[13][0]+`)">B</a>`;
                $("#seatB4").replaceWith(seat); 
            }
            if(seatWagon[14][5] != ""){
                var seat = `<a id="seatC4" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>C</a>`;
                $("#seatC4").replaceWith(seat); 
            }else{
                var seat = `<a id="seatC4" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlC(`+seatWagon[14][0]+`)">C</a>`;
                $("#seatC4").replaceWith(seat); 
            }
            if(seatWagon[15][5] != ""){
                var seat = `<a id="seatD4" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>D</a>`;
                $("#seatD4").replaceWith(seat); 
            }else{
                var seat = `<a id="seatD4" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlD(`+seatWagon[15][0]+`)">D</a>`;
                $("#seatD4").replaceWith(seat); 
            }
            if(seatWagon[16][5] != ""){
                var seat = `<a id="seatA5" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>A</a>`;
                $("#seatA5").replaceWith(seat); 
            }else{
                var seat = `<a id="seatA5" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlA(`+seatWagon[16][0]+`)">A</a>`;
                $("#seatA5").replaceWith(seat); 
            }
            if(seatWagon[17][5] != ""){
                var seat = `<a id="seatB5" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>B</a>`;
                $("#seatB5").replaceWith(seat); 
            }else{
                var seat = `<a id="seatB5" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlB(`+seatWagon[17][0]+`)">B</a>`;
                $("#seatB5").replaceWith(seat); 
            }
            if(seatWagon[18][5] != ""){
                var seat = `<a id="seatC5" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>C</a>`;
                $("#seatC5").replaceWith(seat); 
            }else{
                var seat = `<a id="seatC5" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlC(`+seatWagon[18][0]+`)">C</a>`;
                $("#seatC5").replaceWith(seat); 
            }
            if(seatWagon[19][5] != ""){
                var seat = `<a id="seatD5" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>D</a>`;
                $("#seatD5").replaceWith(seat); 
            }else{
                var seat = `<a id="seatD5" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlD(`+seatWagon[19][0]+`)">D</a>`;
                $("#seatD5").replaceWith(seat); 
            }
            if(seatWagon[20][5] != ""){
                var seat = `<a id="seatA6" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>A</a>`;
                $("#seatA6").replaceWith(seat); 
            }else{
                var seat = `<a id="seatA6" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlA(`+seatWagon[20][0]+`)">A</a>`;
                $("#seatA6").replaceWith(seat); 
            }
            if(seatWagon[21][5] != ""){
                var seat = `<a id="seatB6" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>B</a>`;
                $("#seatB6").replaceWith(seat); 
            }else{
                var seat = `<a id="seatB6" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlB(`+seatWagon[21][0]+`)">B</a>`;
                $("#seatB6").replaceWith(seat); 
            }
            if(seatWagon[22][5] != ""){
                var seat = `<a id="seatC6" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>C</a>`;
                $("#seatC6").replaceWith(seat); 
            }else{
                var seat = `<a id="seatC6" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlC(`+seatWagon[22][0]+`)">C</a>`;
                $("#seatC6").replaceWith(seat); 
            }
            if(seatWagon[23][5] != ""){
                var seat = `<a id="seatD6" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>D</a>`;
                $("#seatD6").replaceWith(seat); 
            }else{
                var seat = `<a id="seatD6" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlD(`+seatWagon[23][0]+`)">D</a>`;
                $("#seatD6").replaceWith(seat); 
            }
            if(seatWagon[24][5] != ""){
                var seat = `<a id="seatA7" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>A</a>`;
                $("#seatA7").replaceWith(seat); 
            }else{
                var seat = `<a id="seatA7" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlA(`+seatWagon[24][0]+`)">A</a>`;
                $("#seatA7").replaceWith(seat); 
            }
            if(seatWagon[25][5] != ""){
                var seat = `<a id="seatB7" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>B</a>`;
                $("#seatB7").replaceWith(seat); 
            }else{
                var seat = `<a id="seatB7" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlB(`+seatWagon[25][0]+`)">B</a>`;
                $("#seatB7").replaceWith(seat); 
            }
            if(seatWagon[26][5] != ""){
                var seat = `<a id="seatC7" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>C</a>`;
                $("#seatC7").replaceWith(seat); 
            }else{
                var seat = `<a id="seatC7" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlC(`+seatWagon[26][0]+`)">C</a>`;
                $("#seatC7").replaceWith(seat); 
            }
            if(seatWagon[27][5] != ""){
                var seat = `<a id="seatD7" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>D</a>`;
                $("#seatD7").replaceWith(seat); 
            }else{
                var seat = `<a id="seatD7" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlD(`+seatWagon[27][0]+`)">D</a>`;
                $("#seatD7").replaceWith(seat); 
            }
            if(seatWagon[28][5] != ""){
                var seat = `<a id="seatA8" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>A</a>`;
                $("#seatA8").replaceWith(seat); 
            }else{
                var seat = `<a id="seatA8" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlA(`+seatWagon[28][0]+`)">A</a>`;
                $("#seatA8").replaceWith(seat); 
            }
            if(seatWagon[29][5] != ""){
                var seat = `<a id="seatB8" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>B</a>`;
                $("#seatB8").replaceWith(seat); 
            }else{
                var seat = `<a id="seatB8" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlB(`+seatWagon[29][0]+`)">B</a>`;
                $("#seatB8").replaceWith(seat); 
            }
            if(seatWagon[30][5] != ""){
                var seat = `<a id="seatC8" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>C</a>`;
                $("#seatC8").replaceWith(seat); 
            }else{
                var seat = `<a id="seatC8" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlC(`+seatWagon[30][0]+`)">C</a>`;
                $("#seatC8").replaceWith(seat); 
            }
            if(seatWagon[31][5] != ""){
                var seat = `<a id="seatD8" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>D</a>`;
                $("#seatD8").replaceWith(seat); 
            }else{
                var seat = `<a id="seatD8" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlD(`+seatWagon[31][0]+`)">D</a>`;
                $("#seatD8").replaceWith(seat); 
            }
            if(seatWagon[32][5] != ""){
                var seat = `<a id="seatA9" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>A</a>`;
                $("#seatA9").replaceWith(seat); 
            }else{
                var seat = `<a id="seatA9" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlA(`+seatWagon[32][0]+`)">A</a>`;
                $("#seatA9").replaceWith(seat); 
            }
            if(seatWagon[33][5] != ""){
                var seat = `<a id="seatB9" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>B</a>`;
                $("#seatB9").replaceWith(seat); 
            }else{
                var seat = `<a id="seatB9" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlB(`+seatWagon[33][0]+`)">B</a>`;
                $("#seatB9").replaceWith(seat); 
            }
            if(seatWagon[34][5] != ""){
                var seat = `<a id="seatC9" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>C</a>`;
                $("#seatC9").replaceWith(seat); 
            }else{
                var seat = `<a id="seatC9" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlC(`+seatWagon[34][0]+`)">C</a>`;
                $("#seatC9").replaceWith(seat); 
            }
            if(seatWagon[35][5] != ""){
                var seat = `<a id="seatD9" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>D</a>`;
                $("#seatD9").replaceWith(seat); 
            }else{
                var seat = `<a id="seatD9" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlD(`+seatWagon[35][0]+`)">D</a>`;
                $("#seatD9").replaceWith(seat); 
            }
            if(seatWagon[36][5] != ""){
                var seat = `<a id="seatA10" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>A</a>`;
                $("#seatA10").replaceWith(seat); 
            }else{
                var seat = `<a id="seatA10" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlA(`+seatWagon[36][0]+`)">A</a>`;
                $("#seatA10").replaceWith(seat); 
            }
            if(seatWagon[37][5] != ""){
                var seat = `<a id="seatB10" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>B</a>`;
                $("#seatB10").replaceWith(seat); 
            }else{
                var seat = `<a id="seatB10" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlB(`+seatWagon[37][0]+`)">B</a>`;
                $("#seatB10").replaceWith(seat); 
            }
            if(seatWagon[38][5] != ""){
                var seat = `<a id="seatC10" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>C</a>`;
                $("#seatC10").replaceWith(seat); 
            }else{
                var seat = `<a id="seatC10" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlC(`+seatWagon[38][0]+`)">C</a>`;
                $("#seatC10").replaceWith(seat); 
            }
            if(seatWagon[39][5] != ""){
                var seat = `<a id="seatD10" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>D</a>`;
                $("#seatD10").replaceWith(seat); 
            }else{
                var seat = `<a id="seatD10" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlD(`+seatWagon[39][0]+`)">D</a>`;
                $("#seatD10").replaceWith(seat); 
            }
            if(seatWagon[40][5] != ""){
                var seat = `<a id="seatA11" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>A</a>`;
                $("#seatA11").replaceWith(seat); 
            }else{
                var seat = `<a id="seatA11" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlA(`+seatWagon[40][0]+`)">A</a>`;
                $("#seatA11").replaceWith(seat); 
            }
            if(seatWagon[41][5] != ""){
                var seat = `<a id="seatB11" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>B</a>`;
                $("#seatB11").replaceWith(seat); 
            }else{
                var seat = `<a id="seatB11" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlB(`+seatWagon[41][0]+`)">B</a>`;
                $("#seatB11").replaceWith(seat); 
            }
            if(seatWagon[42][5] != ""){
                var seat = `<a id="seatC11" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>C</a>`;
                $("#seatC11").replaceWith(seat); 
            }else{
                var seat = `<a id="seatC11" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlC(`+seatWagon[42][0]+`)">C</a>`;
                $("#seatC11").replaceWith(seat); 
            }
            if(seatWagon[43][5] != ""){
                var seat = `<a id="seatD11" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>D</a>`;
                $("#seatD11").replaceWith(seat); 
            }else{
                var seat = `<a id="seatD11" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlD(`+seatWagon[43][0]+`)">D</a>`;
                $("#seatD11").replaceWith(seat); 
            }
            if(seatWagon[44][5] != ""){
                var seat = `<a id="seatA12" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>A</a>`;
                $("#seatA12").replaceWith(seat); 
            }else{
                var seat = `<a id="seatA12" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlA(`+seatWagon[44][0]+`)">A</a>`;
                $("#seatA12").replaceWith(seat); 
            }
            if(seatWagon[45][5] != ""){
                var seat = `<a id="seatB12" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>B</a>`;
                $("#seatB12").replaceWith(seat); 
            }else{
                var seat = `<a id="seatB12" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlB(`+seatWagon[45][0]+`)">B</a>`;
                $("#seatB12").replaceWith(seat); 
            }
            if(seatWagon[46][5] != ""){
                var seat = `<a id="seatC12" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>C</a>`;
                $("#seatC12").replaceWith(seat); 
            }else{
                var seat = `<a id="seatC12" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlC(`+seatWagon[46][0]+`)">C</a>`;
                $("#seatC12").replaceWith(seat); 
            }
            if(seatWagon[47][5] != ""){
                var seat = `<a id="seatD12" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>D</a>`;
                $("#seatD12").replaceWith(seat); 
            }else{
                var seat = `<a id="seatD12" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlD(`+seatWagon[47][0]+`)">D</a>`;
                $("#seatD12").replaceWith(seat); 
            }
            if(seatWagon[48][5] != ""){
                var seat = `<a id="seatA13" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>A</a>`;
                $("#seatA13").replaceWith(seat); 
            }else{
                var seat = `<a id="seatA13" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlA(`+seatWagon[48][0]+`)">A</a>`;
                $("#seatA13").replaceWith(seat); 
            }
            if(seatWagon[49][5] != ""){
                var seat = `<a id="seatB13" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>B</a>`;
                $("#seatB13").replaceWith(seat); 
            }else{
                var seat = `<a id="seatB13" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlB(`+seatWagon[49][0]+`)">B</a>`;
                $("#seatB13").replaceWith(seat); 
            }
            if(seatWagon[50][5] != ""){
                var seat = `<a id="seatC13" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>C</a>`;
                $("#seatC13").replaceWith(seat); 
            }else{
                var seat = `<a id="seatC13" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlC(`+seatWagon[50][0]+`)">C</a>`;
                $("#seatC13").replaceWith(seat); 
            }

            if(seatWagon[51][5] != ""){
                var seat = `<a id="seatD13" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>D</a>`;
                $("#seatD13").replaceWith(seat); 
            }else{
                var seat = `<a id="seatD13" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlD(`+seatWagon[51][0]+`)">D</a>`;
                $("#seatD13").replaceWith(seat); 
            }

            if(seatWagon[52][5] != ""){
                var seat = `<a id="seatA14" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>A</a>`;
                $("#seatA14").replaceWith(seat); 
            }else{
                var seat = `<a id="seatA14" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlA(`+seatWagon[52][0]+`)">A</a>`;
                $("#seatA14").replaceWith(seat); 
            }

            if(seatWagon[53][5] != ""){
                var seat = `<a id="seatB14" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>B</a>`;
                $("#seatB14").replaceWith(seat); 
            }else{
                var seat = `<a id="seatB14" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlB(`+seatWagon[53][0]+`)">B</a>`;
                $("#seatB14").replaceWith(seat); 
            }

            if(seatWagon[54][5] != ""){
                var seat = `<a id="seatC14" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>C</a>`;
                $("#seatC14").replaceWith(seat); 
            }else{
                var seat = `<a id="seatC14" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlC(`+seatWagon[54][0]+`)">C</a>`;
                $("#seatC14").replaceWith(seat); 
            }

            if(seatWagon[55][5] != ""){
                var seat = `<a id="seatD14" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>D</a>`;
                $("#seatD14").replaceWith(seat); 
            }else{
                var seat = `<a id="seatD14" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlD(`+seatWagon[55][0]+`)">D</a>`;
                $("#seatD14").replaceWith(seat); 
            }

            if(seatWagon[56][5] != ""){
                var seat = `<a id="seatA15" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>A</a>`;
                $("#seatA15").replaceWith(seat); 
            }else{
                var seat = `<a id="seatA15" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlA(`+seatWagon[56][0]+`)">A</a>`;
                $("#seatA15").replaceWith(seat); 
            }

            if(seatWagon[57][5] != ""){
                var seat = `<a id="seatB15" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>B</a>`;
                $("#seatB15").replaceWith(seat); 
            }else{
                var seat = `<a id="seatB15" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlB(`+seatWagon[57][0]+`)">B</a>`;
                $("#seatB15").replaceWith(seat); 
            }

            if(seatWagon[58][5] != ""){
                var seat = `<a id="seatC15" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>C</a>`;
                $("#seatC15").replaceWith(seat); 
            }else{
                var seat = `<a id="seatC15" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlC(`+seatWagon[58][0]+`)">C</a>`;
                $("#seatC15").replaceWith(seat); 
            }

            if(seatWagon[59][5] != ""){
                var seat = `<a id="seatD15" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>D</a>`;
                $("#seatD15").replaceWith(seat); 
            }else{
                var seat = `<a id="seatD15" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlD(`+seatWagon[59][0]+`)">D</a>`;
                $("#seatD15").replaceWith(seat); 
            }

            if(seatWagon[60][5] != ""){
                var seat = `<a id="seatA16" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>A</a>`;
                $("#seatA16").replaceWith(seat); 
            }else{
                var seat = `<a id="seatA16" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlA(`+seatWagon[60][0]+`)">A</a>`;
                $("#seatA16").replaceWith(seat); 
            }

            if(seatWagon[61][5] != ""){
                var seat = `<a id="seatB16" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>B</a>`;
                $("#seatB16").replaceWith(seat); 
            }else{
                var seat = `<a id="seatB16" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlB(`+seatWagon[61][0]+`)">B</a>`;
                $("#seatB16").replaceWith(seat); 
            }

            if(seatWagon[62][5] != ""){
                var seat = `<a id="seatC16" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>C</a>`;
                $("#seatC16").replaceWith(seat); 
            }else{
                var seat = `<a id="seatC16" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlC(`+seatWagon[62][0]+`)">C</a>`;
                $("#seatC16").replaceWith(seat); 
            }

            if(seatWagon[63][5] != ""){
                var seat = `<a id="seatD16" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>D</a>`;
                $("#seatD16").replaceWith(seat); 
            }else{
                var seat = `<a id="seatD16" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlD(`+seatWagon[63][0]+`)">D</a>`;
                $("#seatD16").replaceWith(seat); 
            }

            if(seatWagon[64][5] != ""){
                var seat = `<a id="seatA17" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>A</a>`;
                $("#seatA17").replaceWith(seat); 
            }else{
                var seat = `<a id="seatA17" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlA(`+seatWagon[64][0]+`)">A</a>`;
                $("#seatA17").replaceWith(seat); 
            }

            if(seatWagon[65][5] != ""){
                var seat = `<a id="seatB17" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>B</a>`;
                $("#seatB17").replaceWith(seat); 
            }else{
                var seat = `<a id="seatB17" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlB(`+seatWagon[65][0]+`)">B</a>`;
                $("#seatB17").replaceWith(seat); 
            }

            if(seatWagon[66][5] != ""){
                var seat = `<a id="seatC17" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>C</a>`;
                $("#seatC17").replaceWith(seat); 
            }else{
                var seat = `<a id="seatC17" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlC(`+seatWagon[66][0]+`)">C</a>`;
                $("#seatC17").replaceWith(seat); 
            }

            if(seatWagon[67][5] != ""){
                var seat = `<a id="seatD17" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>D</a>`;
                $("#seatD17").replaceWith(seat); 
            }else{
                var seat = `<a id="seatD17" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlD(`+seatWagon[67][0]+`)">D</a>`;
                $("#seatD17").replaceWith(seat); 
            }

            if(seatWagon[68][5] != ""){
                var seat = `<a id="seatA18" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>A</a>`;
                $("#seatA18").replaceWith(seat); 
            }else{
                var seat = `<a id="seatA18" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlA(`+seatWagon[68][0]+`)">A</a>`;
                $("#seatA18").replaceWith(seat); 
            }

            if(seatWagon[69][5] != ""){
                var seat = `<a id="seatB18" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>B</a>`;
                $("#seatB18").replaceWith(seat); 
            }else{
                var seat = `<a id="seatB18" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlB(`+seatWagon[69][0]+`)">B</a>`;
                $("#seatB18").replaceWith(seat); 
            }

            if(seatWagon[70][5] != ""){
                var seat = `<a id="seatC18" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>C</a>`;
                $("#seatC18").replaceWith(seat); 
            }else{
                var seat = `<a id="seatC18" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlC(`+seatWagon[70][0]+`)">C</a>`;
                $("#seatC18").replaceWith(seat); 
            }

            if(seatWagon[71][5] != ""){
                var seat = `<a id="seatD18" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>D</a>`;
                $("#seatD18").replaceWith(seat); 
            }else{
                var seat = `<a id="seatD18" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlD(`+seatWagon[71][0]+`)">D</a>`;
                $("#seatD18").replaceWith(seat); 
            }

            if(seatWagon[72][5] != ""){
                var seat = `<a id="seatA19" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>A</a>`;
                $("#seatA19").replaceWith(seat); 
            }else{
                var seat = `<a id="seatA19" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlA(`+seatWagon[72][0]+`)">A</a>`;
                $("#seatA19").replaceWith(seat); 
            }

            if(seatWagon[73][5] != ""){
                var seat = `<a id="seatB19" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>B</a>`;
                $("#seatB19").replaceWith(seat); 
            }else{
                var seat = `<a id="seatB19" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlB(`+seatWagon[73][0]+`)">B</a>`;
                $("#seatB19").replaceWith(seat); 
            }

            if(seatWagon[74][5] != ""){
                var seat = `<a id="seatC19" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>C</a>`;
                $("#seatC19").replaceWith(seat); 
            }else{
                var seat = `<a id="seatC19" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlC(`+seatWagon[74][0]+`)">C</a>`;
                $("#seatC19").replaceWith(seat); 
            }

            if(seatWagon[75][5] != ""){
                var seat = `<a id="seatD19" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>D</a>`;
                $("#seatD19").replaceWith(seat); 
            }else{
                var seat = `<a id="seatD19" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlD(`+seatWagon[75][0]+`)">D</a>`;
                $("#seatD19").replaceWith(seat); 
            }

            if(seatWagon[76][5] != ""){
                var seat = `<a id="seatA20" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>A</a>`;
                $("#seatA20").replaceWith(seat); 
            }else{
                var seat = `<a id="seatA20" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlA(`+seatWagon[76][0]+`)">A</a>`;
                $("#seatA20").replaceWith(seat); 
            }

            if(seatWagon[77][5] != ""){
                var seat = `<a id="seatB20" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>B</a>`;
                $("#seatB20").replaceWith(seat); 
            }else{
                var seat = `<a id="seatB20" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlB(`+seatWagon[77][0]+`)">B</a>`;
                $("#seatB20").replaceWith(seat); 
            }

            if(seatWagon[78][5] != ""){
                var seat = `<a id="seatC20" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>C</a>`;
                $("#seatC20").replaceWith(seat); 
            }else{
                var seat = `<a id="seatC20" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlC(`+seatWagon[78][0]+`)">C</a>`;
                $("#seatC20").replaceWith(seat); 
            }

            if(seatWagon[79][5] != ""){
                var seat = `<a id="seatD20" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>D</a>`;
                $("#seatD20").replaceWith(seat); 
            }else{
                var seat = `<a id="seatD20" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlD(`+seatWagon[79][0]+`)">D</a>`;
                $("#seatD20").replaceWith(seat); 
            }
            //Eksekutif                         
        }else if(tesseat[0][0] == "EKS"){
            $('#layout_ekonomi').addClass('d-none')
            $('#layout_eksekutif').removeClass('d-none')
            var no_wagon = 0
            // console.log(tesseat[0][2])
            var seatWagon = tesseat[0][2]
            // console.log(seatWagon[0][5])
            if(seatWagon[0][5] != ""){
                var seat = `<a id="seatEksA1" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>A</a>`;
                $("#seatEksA1").replaceWith(seat); 
            }else{
                var seat = `<a id="seatEksA1" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlEksA(`+seatWagon[0][0]+`)" >A</a>`;
                $("#seatEksA1").replaceWith(seat); 
            }

            if(seatWagon[1][5] != ""){
                var seat = `<a id="seatEksB1" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>B</a>`;
                $("#seatEksB1").replaceWith(seat); 
            }else{
                var seat = `<a id="seatEksB1" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlEksB(`+seatWagon[1][0]+`)" >B</a>`;
                $("#seatEksB1").replaceWith(seat); 
            }

            if(seatWagon[2][5] != ""){
                var seat = `<a id="seatEksC1" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>C</a>`;
                $("#seatEksC1").replaceWith(seat); 
            }else{
                var seat = `<a id="seatEksC1" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlEksC(`+seatWagon[2][0]+`)" >C</a>`;
                $("#seatEksC1").replaceWith(seat); 
            }
            if(seatWagon[3][5] != ""){
                var seat = `<a id="seatEksA2" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>A</a>`;
                $("#seatEksA2").replaceWith(seat); 
            }else{
                var seat = `<a id="seatEksA2" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlEksA(`+seatWagon[3][0]+`)">A</a>`;
                $("#seatEksA2").replaceWith(seat); 
            }
            if(seatWagon[4][5] != ""){
                var seat = `<a id="seatEksB2" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>B</a>`;
                $("#seatEksB2").replaceWith(seat); 
            }else{
                var seat = `<a id="seatEksB2" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlEksB(`+seatWagon[4][0]+`)">B</a>`;
                $("#seatEksB2").replaceWith(seat); 
            }
            if(seatWagon[5][5] != ""){
                var seat = `<a id="seatEksC2" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>C</a>`;
                $("#seatEksC2").replaceWith(seat); 
            }else{
                var seat = `<a id="seatEksC2" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlEksC(`+seatWagon[5][0]+`)">C</a>`;
                $("#seatEksC2").replaceWith(seat); 
            }
            if(seatWagon[6][5] != ""){
                var seat = `<a id="seatEksD2" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>D</a>`;
                $("#seatEksD2").replaceWith(seat); 
            }else{
                var seat = `<a id="seatEksD2" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlEksD(`+seatWagon[6][0]+`)">D</a>`;
                $("#seatEksD2").replaceWith(seat); 
            }
            if(seatWagon[7][5] != ""){
                var seat = `<a id="seatEksA3" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>A</a>`;
                $("#seatEksA3").replaceWith(seat); 
            }else{
                var seat = `<a id="seatEksA3" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlEksA(`+seatWagon[7][0]+`)">A</a>`;
                $("#seatEksA3").replaceWith(seat); 
            }
            if(seatWagon[8][5] != ""){
                var seat = `<a id="seatEksB3" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>B</a>`;
                $("#seatEksB3").replaceWith(seat); 
            }else{
                var seat = `<a id="seatEksB3" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlEksB(`+seatWagon[8][0]+`)">B</a>`;
                $("#seatEksB3").replaceWith(seat); 
            }
            if(seatWagon[9][5] != ""){
                var seat = `<a id="seatEksC3" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>C</a>`;
                $("#seatEksC3").replaceWith(seat); 
            }else{
                var seat = `<a id="seatEksC3" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlEksC(`+seatWagon[9][0]+`)">C</a>`;
                $("#seatEksC3").replaceWith(seat); 
            }
            if(seatWagon[10][5] != ""){
                var seat = `<a id="seatEksD3" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>D</a>`;
                $("#seatEksD3").replaceWith(seat); 
            }else{
                var seat = `<a id="seatEksD3" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlEksD(`+seatWagon[10][0]+`)">D</a>`;
                $("#seatEksD3").replaceWith(seat); 
            }
            if(seatWagon[11][5] != ""){
                var seat = `<a id="seatEksA4" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>A</a>`;
                $("#seatEksA4").replaceWith(seat); 
            }else{
                var seat = `<a id="seatEksA4" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlEksA(`+seatWagon[11][0]+`)">A</a>`;
                $("#seatEksA4").replaceWith(seat); 
            }
            if(seatWagon[12][5] != ""){
                var seat = `<a id="seatEksB4" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>B</a>`;
                $("#seatEksB4").replaceWith(seat); 
            }else{
                var seat = `<a id="seatEksB4" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlEksB(`+seatWagon[12][0]+`)">B</a>`;
                $("#seatEksB4").replaceWith(seat); 
            }
            if(seatWagon[13][5] != ""){
                var seat = `<a id="seatEksC4" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>C</a>`;
                $("#seatEksC4").replaceWith(seat); 
            }else{
                var seat = `<a id="seatEksC4" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlEksC(`+seatWagon[13][0]+`)">C</a>`;
                $("#seatEksC4").replaceWith(seat); 
            }
            if(seatWagon[14][5] != ""){
                var seat = `<a id="seatEksD4" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>D</a>`;
                $("#seatEksD4").replaceWith(seat); 
            }else{
                var seat = `<a id="seatEksD4" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlEksD(`+seatWagon[14][0]+`)">D</a>`;
                $("#seatEksD4").replaceWith(seat); 
            }
            if(seatWagon[15][5] != ""){
                var seat = `<a id="seatEksA5" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>A</a>`;
                $("#seatEksA5").replaceWith(seat); 
            }else{
                var seat = `<a id="seatEksA5" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlEksA(`+seatWagon[15][0]+`)">A</a>`;
                $("#seatEksA5").replaceWith(seat); 
            }
            if(seatWagon[16][5] != ""){
                var seat = `<a id="seatEksB5" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>B</a>`;
                $("#seatEksB5").replaceWith(seat); 
            }else{
                var seat = `<a id="seatEksB5" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlEksB(`+seatWagon[16][0]+`)">B</a>`;
                $("#seatEksB5").replaceWith(seat); 
            }
            if(seatWagon[17][5] != ""){
                var seat = `<a id="seatEksC5" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>C</a>`;
                $("#seatEksC5").replaceWith(seat); 
            }else{
                var seat = `<a id="seatEksC5" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlEksC(`+seatWagon[17][0]+`)">C</a>`;
                $("#seatEksC5").replaceWith(seat); 
            }
            if(seatWagon[18][5] != ""){
                var seat = `<a id="seatEksD5" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>D</a>`;
                $("#seatEksD5").replaceWith(seat); 
            }else{
                var seat = `<a id="seatEksD5" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlEksD(`+seatWagon[18][0]+`)">D</a>`;
                $("#seatEksD5").replaceWith(seat); 
            }
            if(seatWagon[19][5] != ""){
                var seat = `<a id="seatEksA6" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>A</a>`;
                $("#seatEksA6").replaceWith(seat); 
            }else{
                var seat = `<a id="seatEksA6" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlEksA(`+seatWagon[19][0]+`)">A</a>`;
                $("#seatEksA6").replaceWith(seat); 
            }
            if(seatWagon[20][5] != ""){
                var seat = `<a id="seatEksB6" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>B</a>`;
                $("#seatEksB6").replaceWith(seat); 
            }else{
                var seat = `<a id="seatEksB6" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlEksB(`+seatWagon[20][0]+`)">B</a>`;
                $("#seatEksB6").replaceWith(seat); 
            }
            if(seatWagon[21][5] != ""){
                var seat = `<a id="seatEksC6" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>C</a>`;
                $("#seatEksC6").replaceWith(seat); 
            }else{
                var seat = `<a id="seatEksC6" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlEksC(`+seatWagon[21][0]+`)">C</a>`;
                $("#seatEksC6").replaceWith(seat); 
            }
            if(seatWagon[22][5] != ""){
                var seat = `<a id="seatEksD6" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>D</a>`;
                $("#seatEksD6").replaceWith(seat); 
            }else{
                var seat = `<a id="seatEksD6" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlEksD(`+seatWagon[22][0]+`)">D</a>`;
                $("#seatEksD6").replaceWith(seat); 
            }
            if(seatWagon[23][5] != ""){
                var seat = `<a id="seatEksA7" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>A</a>`;
                $("#seatEksA7").replaceWith(seat); 
            }else{
                var seat = `<a id="seatEksA7" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlEksA(`+seatWagon[23][0]+`)">A</a>`;
                $("#seatEksA7").replaceWith(seat); 
            }
            if(seatWagon[24][5] != ""){
                var seat = `<a id="seatEksB7" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>B</a>`;
                $("#seatEksB7").replaceWith(seat); 
            }else{
                var seat = `<a id="seatEksB7" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" onclick="changeSeatKrlEksB(`+seatWagon[24][0]+`)" href="javascript:void(0);">B</a>`;
                $("#seatEksB7").replaceWith(seat); 
            }
            if(seatWagon[25][5] != ""){
                var seat = `<a id="seatEksC7" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>C</a>`;
                $("#seatEksC7").replaceWith(seat); 
            }else{
                var seat = `<a id="seatEksC7" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlEksC(`+seatWagon[25][0]+`)">C</a>`;
                $("#seatEksC7").replaceWith(seat); 
            }
            if(seatWagon[26][5] != ""){
                var seat = `<a id="seatEksD7" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>D</a>`;
                $("#seatEksD7").replaceWith(seat); 
            }else{
                var seat = `<a id="seatEksD7" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlEksD(`+seatWagon[26][0]+`)">D</a>`;
                $("#seatEksD7").replaceWith(seat); 
            }
            if(seatWagon[27][5] != ""){
                var seat = `<a id="seatEksA8" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>A</a>`;
                $("#seatEksA8").replaceWith(seat); 
            }else{
                var seat = `<a id="seatEksA8" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlEksA(`+seatWagon[27][0]+`)">A</a>`;
                $("#seatEksA8").replaceWith(seat); 
            }
            if(seatWagon[28][5] != ""){
                var seat = `<a id="seatEksB8" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>B</a>`;
                $("#seatEksB8").replaceWith(seat); 
            }else{
                var seat = `<a id="seatEksB8" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);"  onclick="changeSeatKrlEksB(`+seatWagon[28][0]+`)">B</a>`;
                $("#seatEksB8").replaceWith(seat); 
            }
            if(seatWagon[29][5] != ""){
                var seat = `<a id="seatEksC8" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>C</a>`;
                $("#seatEksC8").replaceWith(seat); 
            }else{
                var seat = `<a id="seatEksC8" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);"  onclick="changeSeatKrlEksC(`+seatWagon[29][0]+`)">C</a>`;
                $("#seatEksC8").replaceWith(seat); 
            }
            if(seatWagon[30][5] != ""){
                var seat = `<a id="seatEksD8" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>D</a>`;
                $("#seatEksD8").replaceWith(seat); 
            }else{
                var seat = `<a id="seatEksD8" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);"  onclick="changeSeatKrlEksD(`+seatWagon[30][0]+`)">D</a>`;
                $("#seatEksD8").replaceWith(seat); 
            }
            if(seatWagon[31][5] != ""){
                var seat = `<a id="seatEksA9" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>A</a>`;
                $("#seatEksA9").replaceWith(seat); 
            }else{
                var seat = `<a id="seatEksA9" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);"  onclick="changeSeatKrlEksA(`+seatWagon[31][0]+`)">A</a>`;
                $("#seatEksA9").replaceWith(seat); 
            }
            if(seatWagon[32][5] != ""){
                var seat = `<a id="seatEksB9" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>B</a>`;
                $("#seatEksB9").replaceWith(seat); 
            }else{
                var seat = `<a id="seatEksB9" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);"  onclick="changeSeatKrlEksB(`+seatWagon[32][0]+`)">B</a>`;
                $("#seatEksB9").replaceWith(seat); 
            }
            if(seatWagon[33][5] != ""){
                var seat = `<a id="seatEksC9" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>C</a>`;
                $("#seatEksC9").replaceWith(seat); 
            }else{
                var seat = `<a id="seatEksC9" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);"  onclick="changeSeatKrlEksC(`+seatWagon[33][0]+`)">C</a>`;
                $("#seatEksC9").replaceWith(seat); 
            }
            if(seatWagon[34][5] != ""){
                var seat = `<a id="seatEksD9" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>D</a>`;
                $("#seatEksD9").replaceWith(seat); 
            }else{
                var seat = `<a id="seatEksD9" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);"  onclick="changeSeatKrlEksD(`+seatWagon[34][0]+`)">D</a>`;
                $("#seatEksD9").replaceWith(seat); 
            }
            if(seatWagon[35][5] != ""){
                var seat = `<a id="seatEksA10" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>A</a>`;
                $("#seatEksA10").replaceWith(seat); 
            }else{
                var seat = `<a id="seatEksA10" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);"  onclick="changeSeatKrlEksA(`+seatWagon[35][0]+`)">A</a>`;
                $("#seatEksA10").replaceWith(seat); 
            }
            if(seatWagon[36][5] != ""){
                var seat = `<a id="seatEksB10" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>B</a>`;
                $("#seatEksB10").replaceWith(seat); 
            }else{
                var seat = `<a id="seatEksB10" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);"  onclick="changeSeatKrlEksB(`+seatWagon[36][0]+`)">B</a>`;
                $("#seatEksB10").replaceWith(seat); 
            }
            if(seatWagon[37][5] != ""){
                var seat = `<a id="seatEksC10" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>C</a>`;
                $("#seatEksC10").replaceWith(seat); 
            }else{
                var seat = `<a id="seatEksC10" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);"  onclick="changeSeatKrlEksC(`+seatWagon[37][0]+`)">C</a>`;
                $("#seatEksC10").replaceWith(seat); 
            }
            if(seatWagon[38][5] != ""){
                var seat = `<a id="seatEksD10" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>D</a>`;
                $("#seatEksD10").replaceWith(seat); 
            }else{
                var seat = `<a id="seatEksD10" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);"  onclick="changeSeatKrlEksD(`+seatWagon[38][0]+`)">D</a>`;
                $("#seatEksD10").replaceWith(seat); 
            }
            if(seatWagon[39][5] != ""){
                var seat = `<a id="seatEksA11" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>A</a>`;
                $("#seatEksA11").replaceWith(seat); 
            }else{
                var seat = `<a id="seatEksA11" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);"  onclick="changeSeatKrlEksA(`+seatWagon[39][0]+`)">A</a>`;
                $("#seatEksA11").replaceWith(seat); 
            }
            if(seatWagon[40][5] != ""){
                var seat = `<a id="seatEksB11" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>B</a>`;
                $("#seatEksB11").replaceWith(seat); 
            }else{
                var seat = `<a id="seatEksB11" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);"  onclick="changeSeatKrlEksB(`+seatWagon[40][0]+`)">B</a>`;
                $("#seatEksB11").replaceWith(seat); 
            }
            if(seatWagon[41][5] != ""){
                var seat = `<a id="seatEksC11" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>C</a>`;
                $("#seatEksC11").replaceWith(seat); 
            }else{
                var seat = `<a id="seatEksC11" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);"  onclick="changeSeatKrlEksC(`+seatWagon[41][0]+`)">C</a>`;
                $("#seatEksC11").replaceWith(seat); 
            }
            if(seatWagon[42][5] != ""){
                var seat = `<a id="seatEksD11" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>D</a>`;
                $("#seatEksD11").replaceWith(seat); 
            }else{
                var seat = `<a id="seatEksD11" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);"  onclick="changeSeatKrlEksD(`+seatWagon[42][0]+`)">D</a>`;
                $("#seatEksD11").replaceWith(seat); 
            }
            if(seatWagon[43][5] != ""){
                var seat = `<a id="seatEksA12" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>A</a>`;
                $("#seatEksA12").replaceWith(seat); 
            }else{
                var seat = `<a id="seatEksA12" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);"  onclick="changeSeatKrlEksA(`+seatWagon[43][0]+`)">A</a>`;
                $("#seatEksA12").replaceWith(seat); 
            }
            if(seatWagon[44][5] != ""){
                var seat = `<a id="seatEksB12" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>B</a>`;
                $("#seatEksB12").replaceWith(seat); 
            }else{
                var seat = `<a id="seatEksB12" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);"  onclick="changeSeatKrlEksB(`+seatWagon[44][0]+`)">B</a>`;
                $("#seatEksB12").replaceWith(seat); 
            }
            if(seatWagon[45][5] != ""){
                var seat = `<a id="seatEksC12" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>C</a>`;
                $("#seatEksC12").replaceWith(seat); 
            }else{
                var seat = `<a id="seatEksC12" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);"  onclick="changeSeatKrlEksC(`+seatWagon[45][0]+`)">C</a>`;
                $("#seatEksC12").replaceWith(seat); 
            }
            if(seatWagon[46][5] != ""){
                var seat = `<a id="seatEksD12" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>D</a>`;
                $("#seatEksD12").replaceWith(seat); 
            }else{
                var seat = `<a id="seatEksD12" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);"  onclick="changeSeatKrlEksD(`+seatWagon[46][0]+`)">D</a>`;
                $("#seatEksD12").replaceWith(seat); 
            }
            if(seatWagon[47][5] != ""){
                var seat = `<a id="seatEksB13" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>B</a>`;
                $("#seatEksB13").replaceWith(seat); 
            }else{
                var seat = `<a id="seatEksB13" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);"  onclick="changeSeatKrlEksB(`+seatWagon[47][0]+`)">B</a>`;
                $("#seatEksB13").replaceWith(seat); 
            }
            if(seatWagon[48][5] != ""){
                var seat = `<a id="seatEksC13" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>C</a>`;
                $("#seatEksC13").replaceWith(seat); 
            }else{
                var seat = `<a id="seatEksC13" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);"  onclick="changeSeatKrlEksC(`+seatWagon[48][0]+`)">C</a>`;
                $("#seatEksC13").replaceWith(seat); 
            }
            if(seatWagon[49][5] != ""){
                var seat = `<a id="seatEksD13" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>D</a>`;
                $("#seatEksD13").replaceWith(seat); 
            }else{
                var seat = `<a id="seatEksD13" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);"  onclick="changeSeatKrlEksC(`+seatWagon[49][0]+`)">D</a>`;
                $("#seatEksD13").replaceWith(seat); 
            }
            
        }


        $("#wagon").on('change', function(id){
            var wagon = $("#wagon").val();
            if(wagon == "" || wagon == null){
                var no_wagon = 0
            }else{
                var no_wagon = (wagon-1)
            }
            // console.log(tesseat[no_wagon][2])
            if(tesseat[0][0] == "EKO"){
                var seatWagon = tesseat[no_wagon][2]

                if(seatWagon[0][5] != ""){
                    var seat = `<a id="seatA1" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>A</a>`;
                    $("#seatA1").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatA1" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlA(`+seatWagon[0][0]+`)">A</a>`;
                    $("#seatA1").replaceWith(seat); 
                }

                if(seatWagon[1][5] != ""){
                    var seat = `<a id="seatB1" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>B</a>`;
                    $("#seatB1").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatB1" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlB(`+seatWagon[1][0]+`)">B</a>`;
                    $("#seatB1").replaceWith(seat); 
                }

                if(seatWagon[2][5] != ""){
                    var seat = `<a id="seatC1" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>C</a>`;
                    $("#seatC1").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatC1" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlC(`+seatWagon[2][0]+`)">C</a>`;
                    $("#seatC1").replaceWith(seat); 
                }
                if(seatWagon[3][5] != ""){
                    var seat = `<a id="seatD1" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>D</a>`;
                    $("#seatD1").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatD1" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlD(`+seatWagon[3][0]+`)">D</a>`;
                    $("#seatD1").replaceWith(seat); 
                }
                if(seatWagon[4][5] != ""){
                    var seat = `<a id="seatA2" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>A</a>`;
                    $("#seatA2").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatA2" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlA(`+seatWagon[4][0]+`)">A</a>`;
                    $("#seatA2").replaceWith(seat); 
                }
                if(seatWagon[5][5] != ""){
                    var seat = `<a id="seatB2" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>B</a>`;
                    $("#seatB2").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatB2" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlB(`+seatWagon[5][0]+`)">B</a>`;
                    $("#seatB2").replaceWith(seat); 
                }
                if(seatWagon[6][5] != ""){
                    var seat = `<a id="seatC2" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>C</a>`;
                    $("#seatC2").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatC2" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlC(`+seatWagon[6][0]+`)">C</a>`;
                    $("#seatC2").replaceWith(seat); 
                }
                if(seatWagon[7][5] != ""){
                    var seat = `<a id="seatD2" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>D</a>`;
                    $("#seatD2").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatD2" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlD(`+seatWagon[7][0]+`)">D</a>`;
                    $("#seatD2").replaceWith(seat); 
                }
                if(seatWagon[8][5] != ""){
                    var seat = `<a id="seatA3" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>A</a>`;
                    $("#seatA3").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatA3" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlA(`+seatWagon[8][0]+`)">A</a>`;
                    $("#seatA3").replaceWith(seat); 
                }
                if(seatWagon[9][5] != ""){
                    var seat = `<a id="seatB3" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>B</a>`;
                    $("#seatB3").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatB3" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlB(`+seatWagon[9][0]+`)">B</a>`;
                    $("#seatB3").replaceWith(seat); 
                }
                if(seatWagon[10][5] != ""){
                    var seat = `<a id="seatC3" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>C</a>`;
                    $("#seatC3").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatC3" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlC(`+seatWagon[10][0]+`)">C</a>`;
                    $("#seatC3").replaceWith(seat); 
                }
                if(seatWagon[11][5] != ""){
                    var seat = `<a id="seatD3" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>D</a>`;
                    $("#seatD3").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatD3" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlD(`+seatWagon[11][0]+`)">D</a>`;
                    $("#seatD3").replaceWith(seat); 
                }
                if(seatWagon[12][5] != ""){
                    var seat = `<a id="seatA4" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>A</a>`;
                    $("#seatA4").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatA4" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlA(`+seatWagon[12][0]+`)">A</a>`;
                    $("#seatA4").replaceWith(seat); 
                }
                if(seatWagon[13][5] != ""){
                    var seat = `<a id="seatB4" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>B</a>`;
                    $("#seatB4").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatB4" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlB(`+seatWagon[13][0]+`)">B</a>`;
                    $("#seatB4").replaceWith(seat); 
                }
                if(seatWagon[14][5] != ""){
                    var seat = `<a id="seatC4" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>C</a>`;
                    $("#seatC4").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatC4" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlC(`+seatWagon[14][0]+`)">C</a>`;
                    $("#seatC4").replaceWith(seat); 
                }
                if(seatWagon[15][5] != ""){
                    var seat = `<a id="seatD4" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>D</a>`;
                    $("#seatD4").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatD4" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlD(`+seatWagon[15][0]+`)">D</a>`;
                    $("#seatD4").replaceWith(seat); 
                }
                if(seatWagon[16][5] != ""){
                    var seat = `<a id="seatA5" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>A</a>`;
                    $("#seatA5").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatA5" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlA(`+seatWagon[16][0]+`)">A</a>`;
                    $("#seatA5").replaceWith(seat); 
                }
                if(seatWagon[17][5] != ""){
                    var seat = `<a id="seatB5" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>B</a>`;
                    $("#seatB5").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatB5" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlB(`+seatWagon[17][0]+`)">B</a>`;
                    $("#seatB5").replaceWith(seat); 
                }
                if(seatWagon[18][5] != ""){
                    var seat = `<a id="seatC5" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>C</a>`;
                    $("#seatC5").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatC5" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlC(`+seatWagon[18][0]+`)">C</a>`;
                    $("#seatC5").replaceWith(seat); 
                }
                if(seatWagon[19][5] != ""){
                    var seat = `<a id="seatD5" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>D</a>`;
                    $("#seatD5").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatD5" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlD(`+seatWagon[19][0]+`)">D</a>`;
                    $("#seatD5").replaceWith(seat); 
                }
                if(seatWagon[20][5] != ""){
                    var seat = `<a id="seatA6" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>A</a>`;
                    $("#seatA6").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatA6" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlA(`+seatWagon[20][0]+`)">A</a>`;
                    $("#seatA6").replaceWith(seat); 
                }
                if(seatWagon[21][5] != ""){
                    var seat = `<a id="seatB6" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>B</a>`;
                    $("#seatB6").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatB6" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlB(`+seatWagon[21][0]+`)">B</a>`;
                    $("#seatB6").replaceWith(seat); 
                }
                if(seatWagon[22][5] != ""){
                    var seat = `<a id="seatC6" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>C</a>`;
                    $("#seatC6").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatC6" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlC(`+seatWagon[22][0]+`)">C</a>`;
                    $("#seatC6").replaceWith(seat); 
                }
                if(seatWagon[23][5] != ""){
                    var seat = `<a id="seatD6" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>D</a>`;
                    $("#seatD6").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatD6" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlD(`+seatWagon[23][0]+`)">D</a>`;
                    $("#seatD6").replaceWith(seat); 
                }
                if(seatWagon[24][5] != ""){
                    var seat = `<a id="seatA7" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>A</a>`;
                    $("#seatA7").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatA7" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlA(`+seatWagon[24][0]+`)">A</a>`;
                    $("#seatA7").replaceWith(seat); 
                }
                if(seatWagon[25][5] != ""){
                    var seat = `<a id="seatB7" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>B</a>`;
                    $("#seatB7").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatB7" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlB(`+seatWagon[25][0]+`)">B</a>`;
                    $("#seatB7").replaceWith(seat); 
                }
                if(seatWagon[26][5] != ""){
                    var seat = `<a id="seatC7" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>C</a>`;
                    $("#seatC7").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatC7" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlC(`+seatWagon[26][0]+`)">C</a>`;
                    $("#seatC7").replaceWith(seat); 
                }
                if(seatWagon[27][5] != ""){
                    var seat = `<a id="seatD7" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>D</a>`;
                    $("#seatD7").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatD7" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlD(`+seatWagon[27][0]+`)">D</a>`;
                    $("#seatD7").replaceWith(seat); 
                }
                if(seatWagon[28][5] != ""){
                    var seat = `<a id="seatA8" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>A</a>`;
                    $("#seatA8").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatA8" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlA(`+seatWagon[28][0]+`)">A</a>`;
                    $("#seatA8").replaceWith(seat); 
                }
                if(seatWagon[29][5] != ""){
                    var seat = `<a id="seatB8" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>B</a>`;
                    $("#seatB8").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatB8" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlB(`+seatWagon[29][0]+`)">B</a>`;
                    $("#seatB8").replaceWith(seat); 
                }
                if(seatWagon[30][5] != ""){
                    var seat = `<a id="seatC8" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>C</a>`;
                    $("#seatC8").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatC8" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlC(`+seatWagon[30][0]+`)">C</a>`;
                    $("#seatC8").replaceWith(seat); 
                }
                if(seatWagon[31][5] != ""){
                    var seat = `<a id="seatD8" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>D</a>`;
                    $("#seatD8").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatD8" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlD(`+seatWagon[31][0]+`)">D</a>`;
                    $("#seatD8").replaceWith(seat); 
                }
                if(seatWagon[32][5] != ""){
                    var seat = `<a id="seatA9" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>A</a>`;
                    $("#seatA9").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatA9" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlA(`+seatWagon[32][0]+`)">A</a>`;
                    $("#seatA9").replaceWith(seat); 
                }
                if(seatWagon[33][5] != ""){
                    var seat = `<a id="seatB9" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>B</a>`;
                    $("#seatB9").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatB9" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlB(`+seatWagon[33][0]+`)">B</a>`;
                    $("#seatB9").replaceWith(seat); 
                }
                if(seatWagon[34][5] != ""){
                    var seat = `<a id="seatC9" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>C</a>`;
                    $("#seatC9").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatC9" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlC(`+seatWagon[34][0]+`)">C</a>`;
                    $("#seatC9").replaceWith(seat); 
                }
                if(seatWagon[35][5] != ""){
                    var seat = `<a id="seatD9" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>D</a>`;
                    $("#seatD9").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatD9" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlD(`+seatWagon[35][0]+`)">D</a>`;
                    $("#seatD9").replaceWith(seat); 
                }
                if(seatWagon[36][5] != ""){
                    var seat = `<a id="seatA10" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>A</a>`;
                    $("#seatA10").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatA10" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlA(`+seatWagon[36][0]+`)">A</a>`;
                    $("#seatA10").replaceWith(seat); 
                }
                if(seatWagon[37][5] != ""){
                    var seat = `<a id="seatB10" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>B</a>`;
                    $("#seatB10").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatB10" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlB(`+seatWagon[37][0]+`)">B</a>`;
                    $("#seatB10").replaceWith(seat); 
                }
                if(seatWagon[38][5] != ""){
                    var seat = `<a id="seatC10" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>C</a>`;
                    $("#seatC10").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatC10" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlC(`+seatWagon[38][0]+`)">C</a>`;
                    $("#seatC10").replaceWith(seat); 
                }
                if(seatWagon[39][5] != ""){
                    var seat = `<a id="seatD10" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>D</a>`;
                    $("#seatD10").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatD10" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlD(`+seatWagon[39][0]+`)">D</a>`;
                    $("#seatD10").replaceWith(seat); 
                }
                if(seatWagon[40][5] != ""){
                    var seat = `<a id="seatA11" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>A</a>`;
                    $("#seatA11").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatA11" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlA(`+seatWagon[40][0]+`)">A</a>`;
                    $("#seatA11").replaceWith(seat); 
                }
                if(seatWagon[41][5] != ""){
                    var seat = `<a id="seatB11" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>B</a>`;
                    $("#seatB11").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatB11" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlB(`+seatWagon[41][0]+`)">B</a>`;
                    $("#seatB11").replaceWith(seat); 
                }
                if(seatWagon[42][5] != ""){
                    var seat = `<a id="seatC11" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>C</a>`;
                    $("#seatC11").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatC11" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlC(`+seatWagon[42][0]+`)">C</a>`;
                    $("#seatC11").replaceWith(seat); 
                }
                if(seatWagon[43][5] != ""){
                    var seat = `<a id="seatD11" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>D</a>`;
                    $("#seatD11").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatD11" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlD(`+seatWagon[43][0]+`)">D</a>`;
                    $("#seatD11").replaceWith(seat); 
                }
                if(seatWagon[44][5] != ""){
                    var seat = `<a id="seatA12" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>A</a>`;
                    $("#seatA12").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatA12" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlA(`+seatWagon[44][0]+`)">A</a>`;
                    $("#seatA12").replaceWith(seat); 
                }
                if(seatWagon[45][5] != ""){
                    var seat = `<a id="seatB12" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>B</a>`;
                    $("#seatB12").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatB12" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlB(`+seatWagon[45][0]+`)">B</a>`;
                    $("#seatB12").replaceWith(seat); 
                }
                if(seatWagon[46][5] != ""){
                    var seat = `<a id="seatC12" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>C</a>`;
                    $("#seatC12").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatC12" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlC(`+seatWagon[46][0]+`)">C</a>`;
                    $("#seatC12").replaceWith(seat); 
                }
                if(seatWagon[47][5] != ""){
                    var seat = `<a id="seatD12" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>D</a>`;
                    $("#seatD12").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatD12" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlD(`+seatWagon[47][0]+`)">D</a>`;
                    $("#seatD12").replaceWith(seat); 
                }
                if(seatWagon[48][5] != ""){
                    var seat = `<a id="seatA13" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>A</a>`;
                    $("#seatA13").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatA13" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlA(`+seatWagon[48][0]+`)">A</a>`;
                    $("#seatA13").replaceWith(seat); 
                }
                if(seatWagon[49][5] != ""){
                    var seat = `<a id="seatB13" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>B</a>`;
                    $("#seatB13").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatB13" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlB(`+seatWagon[49][0]+`)">B</a>`;
                    $("#seatB13").replaceWith(seat); 
                }
                if(seatWagon[50][5] != ""){
                    var seat = `<a id="seatC13" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>C</a>`;
                    $("#seatC13").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatC13" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlC(`+seatWagon[50][0]+`)">C</a>`;
                    $("#seatC13").replaceWith(seat); 
                }

                if(seatWagon[51][5] != ""){
                    var seat = `<a id="seatD13" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>D</a>`;
                    $("#seatD13").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatD13" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlD(`+seatWagon[51][0]+`)">D</a>`;
                    $("#seatD13").replaceWith(seat); 
                }

                if(seatWagon[52][5] != ""){
                    var seat = `<a id="seatA14" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>A</a>`;
                    $("#seatA14").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatA14" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlA(`+seatWagon[52][0]+`)">A</a>`;
                    $("#seatA14").replaceWith(seat); 
                }

                if(seatWagon[53][5] != ""){
                    var seat = `<a id="seatB14" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>B</a>`;
                    $("#seatB14").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatB14" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlB(`+seatWagon[53][0]+`)">B</a>`;
                    $("#seatB14").replaceWith(seat); 
                }

                if(seatWagon[54][5] != ""){
                    var seat = `<a id="seatC14" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>C</a>`;
                    $("#seatC14").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatC14" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlC(`+seatWagon[54][0]+`)">C</a>`;
                    $("#seatC14").replaceWith(seat); 
                }

                if(seatWagon[55][5] != ""){
                    var seat = `<a id="seatD14" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>D</a>`;
                    $("#seatD14").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatD14" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlD(`+seatWagon[55][0]+`)">D</a>`;
                    $("#seatD14").replaceWith(seat); 
                }

                if(seatWagon[56][5] != ""){
                    var seat = `<a id="seatA15" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>A</a>`;
                    $("#seatA15").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatA15" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlA(`+seatWagon[56][0]+`)">A</a>`;
                    $("#seatA15").replaceWith(seat); 
                }

                if(seatWagon[57][5] != ""){
                    var seat = `<a id="seatB15" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>B</a>`;
                    $("#seatB15").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatB15" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlB(`+seatWagon[57][0]+`)">B</a>`;
                    $("#seatB15").replaceWith(seat); 
                }

                if(seatWagon[58][5] != ""){
                    var seat = `<a id="seatC15" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>C</a>`;
                    $("#seatC15").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatC15" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlC(`+seatWagon[58][0]+`)">C</a>`;
                    $("#seatC15").replaceWith(seat); 
                }

                if(seatWagon[59][5] != ""){
                    var seat = `<a id="seatD15" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>D</a>`;
                    $("#seatD15").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatD15" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlD(`+seatWagon[59][0]+`)">D</a>`;
                    $("#seatD15").replaceWith(seat); 
                }

                if(seatWagon[60][5] != ""){
                    var seat = `<a id="seatA16" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>A</a>`;
                    $("#seatA16").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatA16" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlA(`+seatWagon[60][0]+`)">A</a>`;
                    $("#seatA16").replaceWith(seat); 
                }

                if(seatWagon[61][5] != ""){
                    var seat = `<a id="seatB16" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>B</a>`;
                    $("#seatB16").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatB16" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlB(`+seatWagon[61][0]+`)">B</a>`;
                    $("#seatB16").replaceWith(seat); 
                }

                if(seatWagon[62][5] != ""){
                    var seat = `<a id="seatC16" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>C</a>`;
                    $("#seatC16").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatC16" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlC(`+seatWagon[62][0]+`)">C</a>`;
                    $("#seatC16").replaceWith(seat); 
                }

                if(seatWagon[63][5] != ""){
                    var seat = `<a id="seatD16" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>D</a>`;
                    $("#seatD16").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatD16" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlD(`+seatWagon[63][0]+`)">D</a>`;
                    $("#seatD16").replaceWith(seat); 
                }

                if(seatWagon[64][5] != ""){
                    var seat = `<a id="seatA17" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>A</a>`;
                    $("#seatA17").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatA17" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlA(`+seatWagon[64][0]+`)">A</a>`;
                    $("#seatA17").replaceWith(seat); 
                }

                if(seatWagon[65][5] != ""){
                    var seat = `<a id="seatB17" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>B</a>`;
                    $("#seatB17").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatB17" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlB(`+seatWagon[65][0]+`)">B</a>`;
                    $("#seatB17").replaceWith(seat); 
                }

                if(seatWagon[66][5] != ""){
                    var seat = `<a id="seatC17" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>C</a>`;
                    $("#seatC17").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatC17" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlC(`+seatWagon[66][0]+`)">C</a>`;
                    $("#seatC17").replaceWith(seat); 
                }

                if(seatWagon[67][5] != ""){
                    var seat = `<a id="seatD17" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>D</a>`;
                    $("#seatD17").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatD17" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlD(`+seatWagon[67][0]+`)">D</a>`;
                    $("#seatD17").replaceWith(seat); 
                }

                if(seatWagon[68][5] != ""){
                    var seat = `<a id="seatA18" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>A</a>`;
                    $("#seatA18").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatA18" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlA(`+seatWagon[68][0]+`)">A</a>`;
                    $("#seatA18").replaceWith(seat); 
                }

                if(seatWagon[69][5] != ""){
                    var seat = `<a id="seatB18" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>B</a>`;
                    $("#seatB18").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatB18" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlB(`+seatWagon[69][0]+`)">B</a>`;
                    $("#seatB18").replaceWith(seat); 
                }

                if(seatWagon[70][5] != ""){
                    var seat = `<a id="seatC18" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>C</a>`;
                    $("#seatC18").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatC18" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlC(`+seatWagon[70][0]+`)">C</a>`;
                    $("#seatC18").replaceWith(seat); 
                }

                if(seatWagon[71][5] != ""){
                    var seat = `<a id="seatD18" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>D</a>`;
                    $("#seatD18").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatD18" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlD(`+seatWagon[71][0]+`)">D</a>`;
                    $("#seatD18").replaceWith(seat); 
                }

                if(seatWagon[72][5] != ""){
                    var seat = `<a id="seatA19" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>A</a>`;
                    $("#seatA19").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatA19" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlA(`+seatWagon[72][0]+`)">A</a>`;
                    $("#seatA19").replaceWith(seat); 
                }

                if(seatWagon[73][5] != ""){
                    var seat = `<a id="seatB19" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>B</a>`;
                    $("#seatB19").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatB19" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlB(`+seatWagon[73][0]+`)">B</a>`;
                    $("#seatB19").replaceWith(seat); 
                }

                if(seatWagon[74][5] != ""){
                    var seat = `<a id="seatC19" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>C</a>`;
                    $("#seatC19").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatC19" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlC(`+seatWagon[74][0]+`)">C</a>`;
                    $("#seatC19").replaceWith(seat); 
                }

                if(seatWagon[75][5] != ""){
                    var seat = `<a id="seatD19" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>D</a>`;
                    $("#seatD19").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatD19" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlD(`+seatWagon[75][0]+`)">D</a>`;
                    $("#seatD19").replaceWith(seat); 
                }

                if(seatWagon[76][5] != ""){
                    var seat = `<a id="seatA20" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>A</a>`;
                    $("#seatA20").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatA20" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlA(`+seatWagon[76][0]+`)">A</a>`;
                    $("#seatA20").replaceWith(seat); 
                }

                if(seatWagon[77][5] != ""){
                    var seat = `<a id="seatB20" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>B</a>`;
                    $("#seatB20").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatB20" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlB(`+seatWagon[77][0]+`)">B</a>`;
                    $("#seatB20").replaceWith(seat); 
                }

                if(seatWagon[78][5] != ""){
                    var seat = `<a id="seatC20" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>C</a>`;
                    $("#seatC20").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatC20" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlC(`+seatWagon[78][0]+`)">C</a>`;
                    $("#seatC20").replaceWith(seat); 
                }

                if(seatWagon[79][5] != ""){
                    var seat = `<a id="seatD20" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>D</a>`;
                    $("#seatD20").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatD20" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlD(`+seatWagon[79][0]+`)">D</a>`;
                    $("#seatD20").replaceWith(seat); 
                }

            //Eksekutif
            }else if(tesseat[0][0] == "EKS"){
                var seatWagon = tesseat[no_wagon][2]
                if(seatWagon[0][5] != ""){
                    var seat = `<a id="seatEksA1" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>A</a>`;
                    $("#seatEksA1").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatEksA1" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlEksA(`+seatWagon[0][0]+`)" >A</a>`;
                    $("#seatEksA1").replaceWith(seat); 
                }

                if(seatWagon[1][5] != ""){
                    var seat = `<a id="seatEksB1" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>B</a>`;
                    $("#seatEksB1").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatEksB1" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlEksB(`+seatWagon[1][0]+`)" >B</a>`;
                    $("#seatEksB1").replaceWith(seat); 
                }

                if(seatWagon[2][5] != ""){
                    var seat = `<a id="seatEksC1" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>C</a>`;
                    $("#seatEksC1").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatEksC1" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlEksC(`+seatWagon[2][0]+`)" >C</a>`;
                    $("#seatEksC1").replaceWith(seat); 
                }
                if(seatWagon[3][5] != ""){
                    var seat = `<a id="seatEksA2" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>A</a>`;
                    $("#seatEksA2").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatEksA2" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlEksA(`+seatWagon[3][0]+`)">A</a>`;
                    $("#seatEksA2").replaceWith(seat); 
                }
                if(seatWagon[4][5] != ""){
                    var seat = `<a id="seatEksB2" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>B</a>`;
                    $("#seatEksB2").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatEksB2" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlEksB(`+seatWagon[4][0]+`)">B</a>`;
                    $("#seatEksB2").replaceWith(seat); 
                }
                if(seatWagon[5][5] != ""){
                    var seat = `<a id="seatEksC2" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>C</a>`;
                    $("#seatEksC2").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatEksC2" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlEksC(`+seatWagon[5][0]+`)">C</a>`;
                    $("#seatEksC2").replaceWith(seat); 
                }
                if(seatWagon[6][5] != ""){
                    var seat = `<a id="seatEksD2" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>D</a>`;
                    $("#seatEksD2").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatEksD2" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlEksD(`+seatWagon[6][0]+`)">D</a>`;
                    $("#seatEksD2").replaceWith(seat); 
                }
                if(seatWagon[7][5] != ""){
                    var seat = `<a id="seatEksA3" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>A</a>`;
                    $("#seatEksA3").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatEksA3" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlEksA(`+seatWagon[7][0]+`)">A</a>`;
                    $("#seatEksA3").replaceWith(seat); 
                }
                if(seatWagon[8][5] != ""){
                    var seat = `<a id="seatEksB3" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>B</a>`;
                    $("#seatEksB3").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatEksB3" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlEksB(`+seatWagon[8][0]+`)">B</a>`;
                    $("#seatEksB3").replaceWith(seat); 
                }
                if(seatWagon[9][5] != ""){
                    var seat = `<a id="seatEksC3" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>C</a>`;
                    $("#seatEksC3").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatEksC3" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlEksC(`+seatWagon[9][0]+`)">C</a>`;
                    $("#seatEksC3").replaceWith(seat); 
                }
                if(seatWagon[10][5] != ""){
                    var seat = `<a id="seatEksD3" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>D</a>`;
                    $("#seatEksD3").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatEksD3" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlEksD(`+seatWagon[10][0]+`)">D</a>`;
                    $("#seatEksD3").replaceWith(seat); 
                }
                if(seatWagon[11][5] != ""){
                    var seat = `<a id="seatEksA4" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>A</a>`;
                    $("#seatEksA4").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatEksA4" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlEksA(`+seatWagon[11][0]+`)">A</a>`;
                    $("#seatEksA4").replaceWith(seat); 
                }
                if(seatWagon[12][5] != ""){
                    var seat = `<a id="seatEksB4" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>B</a>`;
                    $("#seatEksB4").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatEksB4" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlEksB(`+seatWagon[12][0]+`)">B</a>`;
                    $("#seatEksB4").replaceWith(seat); 
                }
                if(seatWagon[13][5] != ""){
                    var seat = `<a id="seatEksC4" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>C</a>`;
                    $("#seatEksC4").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatEksC4" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlEksC(`+seatWagon[13][0]+`)">C</a>`;
                    $("#seatEksC4").replaceWith(seat); 
                }
                if(seatWagon[14][5] != ""){
                    var seat = `<a id="seatEksD4" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>D</a>`;
                    $("#seatEksD4").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatEksD4" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlEksD(`+seatWagon[14][0]+`)">D</a>`;
                    $("#seatEksD4").replaceWith(seat); 
                }
                if(seatWagon[15][5] != ""){
                    var seat = `<a id="seatEksA5" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>A</a>`;
                    $("#seatEksA5").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatEksA5" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlEksA(`+seatWagon[15][0]+`)">A</a>`;
                    $("#seatEksA5").replaceWith(seat); 
                }
                if(seatWagon[16][5] != ""){
                    var seat = `<a id="seatEksB5" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>B</a>`;
                    $("#seatEksB5").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatEksB5" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlEksB(`+seatWagon[16][0]+`)">B</a>`;
                    $("#seatEksB5").replaceWith(seat); 
                }
                if(seatWagon[17][5] != ""){
                    var seat = `<a id="seatEksC5" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>C</a>`;
                    $("#seatEksC5").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatEksC5" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlEksC(`+seatWagon[17][0]+`)">C</a>`;
                    $("#seatEksC5").replaceWith(seat); 
                }
                if(seatWagon[18][5] != ""){
                    var seat = `<a id="seatEksD5" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>D</a>`;
                    $("#seatEksD5").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatEksD5" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlEksD(`+seatWagon[18][0]+`)">D</a>`;
                    $("#seatEksD5").replaceWith(seat); 
                }
                if(seatWagon[19][5] != ""){
                    var seat = `<a id="seatEksA6" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>A</a>`;
                    $("#seatEksA6").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatEksA6" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlEksA(`+seatWagon[19][0]+`)">A</a>`;
                    $("#seatEksA6").replaceWith(seat); 
                }
                if(seatWagon[20][5] != ""){
                    var seat = `<a id="seatEksB6" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>B</a>`;
                    $("#seatEksB6").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatEksB6" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlEksB(`+seatWagon[20][0]+`)">B</a>`;
                    $("#seatEksB6").replaceWith(seat); 
                }
                if(seatWagon[21][5] != ""){
                    var seat = `<a id="seatEksC6" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>C</a>`;
                    $("#seatEksC6").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatEksC6" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlEksC(`+seatWagon[21][0]+`)">C</a>`;
                    $("#seatEksC6").replaceWith(seat); 
                }
                if(seatWagon[22][5] != ""){
                    var seat = `<a id="seatEksD6" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>D</a>`;
                    $("#seatEksD6").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatEksD6" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlEksD(`+seatWagon[22][0]+`)">D</a>`;
                    $("#seatEksD6").replaceWith(seat); 
                }
                if(seatWagon[23][5] != ""){
                    var seat = `<a id="seatEksA7" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>A</a>`;
                    $("#seatEksA7").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatEksA7" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlEksA(`+seatWagon[23][0]+`)">A</a>`;
                    $("#seatEksA7").replaceWith(seat); 
                }
                if(seatWagon[24][5] != ""){
                    var seat = `<a id="seatEksB7" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>B</a>`;
                    $("#seatEksB7").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatEksB7" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" onclick="changeSeatKrlEksB(`+seatWagon[24][0]+`)" href="javascript:void(0);">B</a>`;
                    $("#seatEksB7").replaceWith(seat); 
                }
                if(seatWagon[25][5] != ""){
                    var seat = `<a id="seatEksC7" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>C</a>`;
                    $("#seatEksC7").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatEksC7" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlEksC(`+seatWagon[25][0]+`)">C</a>`;
                    $("#seatEksC7").replaceWith(seat); 
                }
                if(seatWagon[26][5] != ""){
                    var seat = `<a id="seatEksD7" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>D</a>`;
                    $("#seatEksD7").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatEksD7" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlEksD(`+seatWagon[26][0]+`)">D</a>`;
                    $("#seatEksD7").replaceWith(seat); 
                }
                if(seatWagon[27][5] != ""){
                    var seat = `<a id="seatEksA8" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>A</a>`;
                    $("#seatEksA8").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatEksA8" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);" onclick="changeSeatKrlEksA(`+seatWagon[27][0]+`)">A</a>`;
                    $("#seatEksA8").replaceWith(seat); 
                }
                if(seatWagon[28][5] != ""){
                    var seat = `<a id="seatEksB8" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>B</a>`;
                    $("#seatEksB8").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatEksB8" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);"  onclick="changeSeatKrlEksB(`+seatWagon[28][0]+`)">B</a>`;
                    $("#seatEksB8").replaceWith(seat); 
                }
                if(seatWagon[29][5] != ""){
                    var seat = `<a id="seatEksC8" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>C</a>`;
                    $("#seatEksC8").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatEksC8" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);"  onclick="changeSeatKrlEksC(`+seatWagon[29][0]+`)">C</a>`;
                    $("#seatEksC8").replaceWith(seat); 
                }
                if(seatWagon[30][5] != ""){
                    var seat = `<a id="seatEksD8" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>D</a>`;
                    $("#seatEksD8").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatEksD8" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);"  onclick="changeSeatKrlEksD(`+seatWagon[30][0]+`)">D</a>`;
                    $("#seatEksD8").replaceWith(seat); 
                }
                if(seatWagon[31][5] != ""){
                    var seat = `<a id="seatEksA9" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>A</a>`;
                    $("#seatEksA9").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatEksA9" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);"  onclick="changeSeatKrlEksA(`+seatWagon[31][0]+`)">A</a>`;
                    $("#seatEksA9").replaceWith(seat); 
                }
                if(seatWagon[32][5] != ""){
                    var seat = `<a id="seatEksB9" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>B</a>`;
                    $("#seatEksB9").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatEksB9" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);"  onclick="changeSeatKrlEksB(`+seatWagon[32][0]+`)">B</a>`;
                    $("#seatEksB9").replaceWith(seat); 
                }
                if(seatWagon[33][5] != ""){
                    var seat = `<a id="seatEksC9" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>C</a>`;
                    $("#seatEksC9").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatEksC9" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);"  onclick="changeSeatKrlEksC(`+seatWagon[33][0]+`)">C</a>`;
                    $("#seatEksC9").replaceWith(seat); 
                }
                if(seatWagon[34][5] != ""){
                    var seat = `<a id="seatEksD9" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>D</a>`;
                    $("#seatEksD9").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatEksD9" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);"  onclick="changeSeatKrlEksD(`+seatWagon[34][0]+`)">D</a>`;
                    $("#seatEksD9").replaceWith(seat); 
                }
                if(seatWagon[35][5] != ""){
                    var seat = `<a id="seatEksA10" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>A</a>`;
                    $("#seatEksA10").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatEksA10" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);"  onclick="changeSeatKrlEksA(`+seatWagon[35][0]+`)">A</a>`;
                    $("#seatEksA10").replaceWith(seat); 
                }
                if(seatWagon[36][5] != ""){
                    var seat = `<a id="seatEksB10" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>B</a>`;
                    $("#seatEksB10").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatEksB10" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);"  onclick="changeSeatKrlEksB(`+seatWagon[36][0]+`)">B</a>`;
                    $("#seatEksB10").replaceWith(seat); 
                }
                if(seatWagon[37][5] != ""){
                    var seat = `<a id="seatEksC10" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>C</a>`;
                    $("#seatEksC10").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatEksC10" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);"  onclick="changeSeatKrlEksC(`+seatWagon[37][0]+`)">C</a>`;
                    $("#seatEksC10").replaceWith(seat); 
                }
                if(seatWagon[38][5] != ""){
                    var seat = `<a id="seatEksD10" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>D</a>`;
                    $("#seatEksD10").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatEksD10" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);"  onclick="changeSeatKrlEksD(`+seatWagon[38][0]+`)">D</a>`;
                    $("#seatEksD10").replaceWith(seat); 
                }
                if(seatWagon[39][5] != ""){
                    var seat = `<a id="seatEksA11" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>A</a>`;
                    $("#seatEksA11").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatEksA11" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);"  onclick="changeSeatKrlEksA(`+seatWagon[39][0]+`)">A</a>`;
                    $("#seatEksA11").replaceWith(seat); 
                }
                if(seatWagon[40][5] != ""){
                    var seat = `<a id="seatEksB11" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>B</a>`;
                    $("#seatEksB11").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatEksB11" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);"  onclick="changeSeatKrlEksB(`+seatWagon[40][0]+`)">B</a>`;
                    $("#seatEksB11").replaceWith(seat); 
                }
                if(seatWagon[41][5] != ""){
                    var seat = `<a id="seatEksC11" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>C</a>`;
                    $("#seatEksC11").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatEksC11" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);"  onclick="changeSeatKrlEksC(`+seatWagon[41][0]+`)">C</a>`;
                    $("#seatEksC11").replaceWith(seat); 
                }
                if(seatWagon[42][5] != ""){
                    var seat = `<a id="seatEksD11" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>D</a>`;
                    $("#seatEksD11").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatEksD11" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);"  onclick="changeSeatKrlEksD(`+seatWagon[42][0]+`)">D</a>`;
                    $("#seatEksD11").replaceWith(seat); 
                }
                if(seatWagon[43][5] != ""){
                    var seat = `<a id="seatEksA12" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>A</a>`;
                    $("#seatEksA12").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatEksA12" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);"  onclick="changeSeatKrlEksA(`+seatWagon[43][0]+`)">A</a>`;
                    $("#seatEksA12").replaceWith(seat); 
                }
                if(seatWagon[44][5] != ""){
                    var seat = `<a id="seatEksB12" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>B</a>`;
                    $("#seatEksB12").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatEksB12" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);"  onclick="changeSeatKrlEksB(`+seatWagon[44][0]+`)">B</a>`;
                    $("#seatEksB12").replaceWith(seat); 
                }
                if(seatWagon[45][5] != ""){
                    var seat = `<a id="seatEksC12" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>C</a>`;
                    $("#seatEksC12").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatEksC12" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);"  onclick="changeSeatKrlEksC(`+seatWagon[45][0]+`)">C</a>`;
                    $("#seatEksC12").replaceWith(seat); 
                }
                if(seatWagon[46][5] != ""){
                    var seat = `<a id="seatEksD12" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>D</a>`;
                    $("#seatEksD12").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatEksD12" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);"  onclick="changeSeatKrlEksD(`+seatWagon[46][0]+`)">D</a>`;
                    $("#seatEksD12").replaceWith(seat); 
                }
                if(seatWagon[47][5] != ""){
                    var seat = `<a id="seatEksB13" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>B</a>`;
                    $("#seatEksB13").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatEksB13" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);"  onclick="changeSeatKrlEksB(`+seatWagon[47][0]+`)">B</a>`;
                    $("#seatEksB13").replaceWith(seat); 
                }
                if(seatWagon[48][5] != ""){
                    var seat = `<a id="seatEksC13" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>C</a>`;
                    $("#seatEksC13").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatEksC13" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);"  onclick="changeSeatKrlEksC(`+seatWagon[48][0]+`)">C</a>`;
                    $("#seatEksC13").replaceWith(seat); 
                }
                if(seatWagon[49][5] != ""){
                    var seat = `<a id="seatEksD13" class="card shadow-sm p-3 mb-2 bg-danger rounded text-colors-off" disabled>D</a>`;
                    $("#seatEksD13").replaceWith(seat); 
                }else{
                    var seat = `<a id="seatEksD13" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);"  onclick="changeSeatKrlEksC(`+seatWagon[49][0]+`)">D</a>`;
                    $("#seatEksD13").replaceWith(seat); 
                }
            }     

        })

        // for(var i = 0; i < nin; i++){
         
        //     var z = seatWagon[i];
            // var t = nin/4;
            // console.log(z)
            // for(var y = 0; y < t; y++){

                // var ren = i+1
                

            // }
           
            // for(var j = 0; j < z[2].length; j++){
            //         // console.log(n[2][0])
            // }
        // }

        // for(var i = 0; i < nin; i++){

            // var seat = `<td class="">
            //                 <a id="" class="card shadow-sm p-3 mb-2 bg-success rounded text-colors-off" href="javascript:void(0);">A</a>
            //             </td>
            //             `;
            // $("#seatTrainreg").append(seat);
        // }

       

        // for(var t = 0; t < tesseat.length; t++){
        //     var nt = tesseat;
        //     console.log(nt)
        //     var no_wagon = i+1
        //     var nn = '<option value="'+ no_wagon +'"> EKO - '+ no_wagon +'</option>';
        //     $("#wagon").append(nn)
        //     // for(var j = 0; j <= n.length; j++){
        //     //     console.log(n[j])    
        //     // }
        // }
    });

    //eko
    function changeSeatKrlA(id){
        var nwag = $("#wagon").val();
        var name_pax = $("#list_pax").val()
        var no = nwag + 1
            var datahtml = `
                <div class="modal fade sm-5" id="modalConfirmSeat" data-keyboard="false" data-backdrop="static">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-colors-on" style="margin-left: 10%px;"><b>Change Seat Confirmation</b></h5>
                                <button type="button" class="close" data-dismiss="modal" onclick="closeModalDetailChgSeat()">×</button>
                            </div><br>
                            <center><b>Pastikan pilihan tempat duduk anda sesuai!</b></center>
                            <br>
                            <center><b>Penumpang: `+name_pax +`</b></center>
                            <center><b>Yakni Gerbong Eko -`+nwag+`. Kursi No: `+id+`A !</b></center>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" id="bottonBook" onclick="okChangeSeatEkoA(`+id+`)"><b class="text-colors-off"><i class="fa fa-check mr-1"></i>Ya</b></button>
                                <button type="button" class="btn btn-light" data-dismiss="modal" onclick="closeModalDetailChgSeat()"><i class="fa fa-times mr-1"></i>Kembali</button>
                            </div>
                        </div>
                    </div>
                </div> `
            $("#modalConfirmSeatKrlRegsimpan").replaceWith(datahtml)
            $("#modalConfirmSeat").modal('show')
    }
    function changeSeatKrlB(id){
        var nwag = $("#wagon").val()
        var name_pax = $("#list_pax").val()
        var no = nwag +1
            var datahtml = `
                <div class="modal fade sm-5" id="modalConfirmSeat" data-keyboard="false" data-backdrop="static">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-colors-on" style="margin-left: 10%px;"><b>Change Seat Confirmation</b></h5>
                                <button type="button" class="close" data-dismiss="modal" onclick="closeModalDetailChgSeat()">×</button>
                            </div><br>
                            <center><b>Pastikan pilihan tempat duduk anda sesuai!</b></center>
                            <br>
                            <center><b>Penumpang: `+name_pax +`</b></center>
                            <center><b>Yakni Gerbong Eko -`+nwag+`. Kursi No: `+id+`B !</b></center>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" id="bottonBook" onclick="okChangeSeatEkoB(`+id+`)"><b class="text-colors-off"><i class="fa fa-check mr-1" ></i>Ya</b></button>
                                <button type="button" class="btn btn-light" data-dismiss="modal" onclick="closeModalDetailChgSeat()"><i class="fa fa-times mr-1"></i>Kembali</button>
                            </div>
                        </div>
                    </div>
                </div> `
            $("#modalConfirmSeatKrlRegsimpan").replaceWith(datahtml)
            $("#modalConfirmSeat").modal('show')
    }
    function changeSeatKrlC(id){
        var nwag = $("#wagon").val()
        var name_pax = $("#list_pax").val()
        var no = nwag +1
            var datahtml = `
                <div class="modal fade sm-5" id="modalConfirmSeat" data-keyboard="false" data-backdrop="static">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title  text-colors-on" style="margin-left: 10%px;"><b>Change Seat Confirmation</b></h5>
                                <button type="button" class="close" data-dismiss="modal" onclick="closeModalDetailChgSeat()">×</button>
                            </div><br>
                            <center><b>Pastikan pilihan tempat duduk anda sesuai!</b></center>
                            <br>
                            <center><b>Penumpang: `+name_pax +`</b></center>
                            <center><b>Yakni Gerbong Eko -`+nwag+`. Kursi No: `+id+`C !</b></center>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" id="bottonBook" onclick="okChangeSeatEkoC(`+id+`)"><b class="text-colors-off"><i class="fa fa-check mr-1" ></i>Ya</b></button>
                                <button type="button" class="btn btn-light" data-dismiss="modal" onclick="closeModalDetailChgSeat()"><i class="fa fa-times mr-1"></i>Kembali</button>
                            </div>
                        </div>
                    </div>
                </div> `
            $("#modalConfirmSeatKrlRegsimpan").replaceWith(datahtml)
            $("#modalConfirmSeat").modal('show')
    }

    function changeSeatKrlD(id){
        var nwag = $("#wagon").val()
        var name_pax = $("#list_pax").val()
        var no = nwag +1
            var datahtml = `
                <div class="modal fade sm-5" id="modalConfirmSeat" data-keyboard="false" data-backdrop="static">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-colors-on" style="margin-left: 10%px;"><b>Change Seat Confirmation</b></h5>
                                <button type="button" class="close" data-dismiss="modal" onclick="closeModalDetailChgSeat()">×</button>
                            </div><br>
                            <center><b>Pastikan pilihan tempat duduk anda sesuai!</b></center>
                            <br>
                            <center><b>Penumpang: `+name_pax +`</b></center>
                            <center><b>Yakni Gerbong Eko -`+nwag+`. Kursi No: `+id+`D !</b></center>
                            <div class="modal-footer">
                                <button type="button" class="btn main-color" id="bottonBook" onclick="okChangeSeatEkoD(`+id+`)"><b class="text-colors-off"><i class="fa fa-check mr-1" ></i>Ya</b></button>
                                <button type="button" class="btn btn-light" data-dismiss="modal" onclick="closeModalDetailChgSeat()"><i class="fa fa-times mr-1"></i>Kembali</button>
                            </div>
                        </div>
                    </div>
                </div> `
            $("#modalConfirmSeatKrlRegsimpan").replaceWith(datahtml)
            $("#modalConfirmSeat").modal('show')
    }



    //Eks
    function changeSeatKrlEksA(id){
        var nwag = $("#wagon").val()
        var name_pax = $("#list_pax").val()
        var no = nwag +1
            var datahtml = `
                <div class="modal fade sm-5" id="modalConfirmSeat" data-keyboard="false" data-backdrop="static">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-colors-on" style="margin-left: 10%px;"><b>Change Seat Confirmation</b></h5>
                                <button type="button" class="close" data-dismiss="modal" onclick="closeModalDetailChgSeat()">×</button>
                            </div><br>
                            <center><b>Pastikan pilihan tempat duduk anda sesuai!</b></center>
                            <br>
                            <center><b>Penumpang: `+name_pax +`</b></center>
                            <center><b>Yakni Gerbong Eks-`+nwag+`. Kursi No: `+id+`A !</b></center>
                            <div class="modal-footer">
                                <button type="button" class="btn main-color" id="bottonBook" onclick="lemparSeatEksA(`+id+`); okChangeSeatEksA()"><b class="text-colors-off"><i class="fa fa-check mr-1" ></i>Ya</b></button>
                                <button type="button" class="btn btn-light" data-dismiss="modal" onclick="closeModalDetailChgSeat()"><i class="fa fa-times mr-1"></i>Kembali</button>
                            </div>
                        </div>
                    </div>
                </div> `
            $("#modalConfirmSeatKrlRegsimpan").replaceWith(datahtml)
            $("#modalConfirmSeat").modal('show')
    }
    function changeSeatKrlEksB(id){
        var nwag = $("#wagon").val()
        var name_pax = $("#list_pax").val()
        var no = nwag +1
            var datahtml = `
                <div class="modal fade sm-5" id="modalConfirmSeat" data-keyboard="false" data-backdrop="static">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-colors-on" style="margin-left: 10%px;"><b>Change Seat Confirmation</b></h5>
                                <button type="button" class="close" data-dismiss="modal" onclick="closeModalDetailChgSeat()">×</button>
                            </div><br>
                            <center><b>Pastikan pilihan tempat duduk anda sesuai!</b></center>
                            <br>
                            <center><b>Penumpang: `+name_pax +`</b></center>
                            <center><b>Yakni Gerbong Eks-`+nwag+`. Kursi No: `+id+`B !</b></center>
                            <div class="modal-footer">
                                <button type="button" class="btn main-color" id="bottonBook" onclick="okChangeSeatEksB(`+id+`)"><b class="text-colors-off"><i class="fa fa-check mr-1" ></i>Ya</b></button>
                                <button type="button" class="btn btn-light" data-dismiss="modal" onclick="closeModalDetailChgSeat()"><i class="fa fa-times mr-1"></i>Kembali</button>
                            </div>
                        </div>
                    </div>
                </div> `
            $("#modalConfirmSeatKrlRegsimpan").replaceWith(datahtml)
            $("#modalConfirmSeat").modal('show')
    }
    function changeSeatKrlEksC(id){
        var nwag = $("#wagon").val()
        var name_pax = $("#list_pax").val()
        var no = nwag +1
            var datahtml = `
                <div class="modal fade sm-5" id="modalConfirmSeat" data-keyboard="false" data-backdrop="static">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-colors-on" style="margin-left: 10%px;"><b>Change Seat Confirmation</b></h5>
                                <button type="button" class="close" data-dismiss="modal" onclick="closeModalDetailChgSeat()">×</button>
                            </div><br>
                            <center><b>Pastikan pilihan tempat duduk anda sesuai!</b></center>
                            <br>
                            <center><b>Penumpang: `+name_pax +`</b></center>
                            <center><b>Yakni Gerbong Eks-`+nwag+`. Kursi No: `+id+`C !</b></center>
                            <div class="modal-footer">
                                <button type="button" class="btn main-color" id="bottonBook" onclick="okChangeSeatEksC(`+id+`)"><b class="text-colors-off"><i class="fa fa-check mr-1" ></i>Ya</b></button>
                                <button type="button" class="btn btn-light" data-dismiss="modal" onclick="closeModalDetailChgSeat()"><i class="fa fa-times mr-1"></i>Kembali</button>
                            </div>
                        </div>
                    </div>
                </div> `
            $("#modalConfirmSeatKrlRegsimpan").replaceWith(datahtml)
            $("#modalConfirmSeat").modal('show')
    }

    function changeSeatKrlEksD(id){
        var nwag = $("#wagon").val()
        var name_pax = $("#list_pax").val()
        var no = nwag +1
            var datahtml = `
                <div class="modal fade sm-5" id="modalConfirmSeat" data-keyboard="false" data-backdrop="static">
                    <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title text-colors-on" style="margin-left: 10%px;"><b>Change Seat Confirmation</b></h5>
                                <button type="button" class="close" data-dismiss="modal" onclick="closeModalDetailChgSeat()">×</button>
                            </div><br>
                            <center><b>Pastikan pilihan tempat duduk anda sesuai!</b></center>
                            <br>
                            <center><b>Penumpang: `+name_pax +`</b></center>
                            <center><b>Yakni Gerbong Eks-`+nwag+`. Kursi No: `+id+`D !</b></center>
                            <div class="modal-footer">
                                <button type="button" class="btn main-color" id="bottonBook" onclick="okChangeSeatEksD(`+id+`)"><b class="text-colors-off"><i class="fa fa-check mr-1" ></i>Ya</b></button>
                                <button type="button" class="btn btn-light" data-dismiss="modal" onclick="closeModalDetailChgSeat()"><i class="fa fa-times mr-1"></i>Kembali</button>
                            </div>
                        </div>
                    </div>
                </div> `
            $("#modalConfirmSeatKrlRegsimpan").replaceWith(datahtml)
            $("#modalConfirmSeat").modal('show')
    }

    function closeModalDetailChgSeat() {
        $("#modalConfirmSeat").on("hidden.bs.modal", function(e) {
            $("#modalConfirmSeat").replaceWith(`<div id="modalConfirmSeatKrlRegsimpan"></div>`)
        })
    }

    //Eko
   function okChangeSeatEkoA(id){
        $.LoadingOverlay("show")
        // var nes = ("#list_pax").val()
        var nwag = $("#wagon").val()
       
        var seat = id+"A";
        console.log(seat)
        var code_book = JSON.parse(localStorage.getItem('code_book_krl_reg'));
        var token = JSON.parse(localStorage.getItem('data_token'));
        var token_set = token['access_token']
        var url = fetch('https://api-gowisata.aturtoko.site/api/train/change_seat',{
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token_set,
        },
        body: JSON.stringify({
                    "booking_code": code_book,
                    "wagon_code": [
                        "EKO"
                    ],
                    "wagon_no": [
                        nwag
                    ],
                    "seat": [
                        seat
                    ]
                }),
        }).then((response) => response.json()).then((responseData) => {
        var train = responseData.data;
        console.log(train)
     
        location.reload();

        });

    }

    function okChangeSeatEkoB(id){
        $.LoadingOverlay("show")
        // var nes = ("#list_pax").val()
        var nwag = $("#wagon").val()
       
        var seat = id+"B";
        console.log(seat)
        var code_book = JSON.parse(localStorage.getItem('code_book_krl_reg'));
        var token = JSON.parse(localStorage.getItem('data_token'));
        var token_set = token['access_token']
        var url = fetch('https://api-gowisata.aturtoko.site/api/train/change_seat',{
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token_set,
        },
        body: JSON.stringify({
                    "booking_code": code_book,
                    "wagon_code": [
                        "EKO"
                    ],
                    "wagon_no": [
                        nwag
                    ],
                    "seat": [
                        seat
                    ]
                }),
        }).then((response) => response.json()).then((responseData) => {
        var train = responseData.data;
        console.log(train)
     
        // location.reload();

        });

    }

    function okChangeSeatEkoC(id){
        $.LoadingOverlay("show")
        // var nes = ("#list_pax").val()
        var nwag = $("#wagon").val()
       
        var seat = id+"C";
        console.log(seat)
        var code_book = JSON.parse(localStorage.getItem('code_book_krl_reg'));
        var token = JSON.parse(localStorage.getItem('data_token'));
        var token_set = token['access_token']
        var url = fetch('https://api-gowisata.aturtoko.site/api/train/change_seat',{
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token_set,
        },
        body: JSON.stringify({
                    "booking_code": code_book,
                    "wagon_code": [
                        "EKO"
                    ],
                    "wagon_no": [
                        nwag
                    ],
                    "seat": [
                        seat
                    ]
                }),
        }).then((response) => response.json()).then((responseData) => {
        var train = responseData.data;
        console.log(train)
     
        location.reload();

        });

    }

    function okChangeSeatEkoD(id){
        $.LoadingOverlay("show")
        // var nes = ("#list_pax").val()
        var nwag = $("#wagon").val()
       
        var seat = id+"D";
        console.log(seat)
        var code_book = JSON.parse(localStorage.getItem('code_book_krl_reg'));
        var token = JSON.parse(localStorage.getItem('data_token'));
        var token_set = token['access_token']
        var url = fetch('https://api-gowisata.aturtoko.site/api/train/change_seat',{
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token_set,
        },
        body: JSON.stringify({
                    "booking_code": code_book,
                    "wagon_code": [
                        "EKO"
                    ],
                    "wagon_no": [
                        nwag
                    ],
                    "seat": [
                        seat
                    ]
                }),
        }).then((response) => response.json()).then((responseData) => {
        var train = responseData.data;
        console.log(train)
     
        location.reload();

        });
    }

    //Eks--------------------------------------------Eksekutif------------------>
    function lemparSeatEksA(id){

        var seat_data = JSON.parse(localStorage.getItem('data_seat'));
        var changeSeat = []
        var seat = id + "A";

        for(var i = 0; i <seat_data.length; i++){

            var pax = $("#list_pax").val();
            var no = i+1
            if(pax == no){
                var seats = seat 
            }else {
                var seats = seat_data[i].nomer_kursi.split("/")[1];
            }
            var dataKursi = { seats,}
                      
            changeSeat.push(dataKursi)
        }
        localStorage.setItem("array_seat", JSON.stringify(changeSeat))
    }
    
    function okChangeSeatEksA(){
       
        $.LoadingOverlay("show")
        var nwag = $("#wagon").val()
        var seatst = JSON.parse(localStorage.getItem('array_seat'));
        var c_wagon = [];
        var stateSeat = [];
        var no_wagon = []
        for(i = 0; i <seatst.length; i++){
            // var setSeat = [
            //     seatst[i].seats,
            // ];
            stateSeat.push(seatst[i].seats)
            no_wagon.push(nwag)
            c_wagon.push("EKS")
        }
        
        // var seat = id + "A";
        console.log(no_wagon)
        var code_book = JSON.parse(localStorage.getItem('code_book_krl_reg'));
        var token = JSON.parse(localStorage.getItem('data_token'));
        var token_set = token['access_token']
        var url = fetch('https://api-gowisata.aturtoko.site/api/train/change_seat',{
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token_set,
        },
        body: JSON.stringify({
                    "booking_code": code_book,
                    "wagon_code": c_wagon,
                    "wagon_no": no_wagon,
                    "seat": stateSeat
            }),
        }).then((response) => response.json()).then((responseData) => {
        var train = responseData.data;
        console.log(train)
     
        location.reload();

        });

    }

    function okChangeSeatEksB(id){
        $.LoadingOverlay("show")
        // var nes = ("#list_pax").val()
        var nwag = $("#wagon").val()
        var seat = id +"B";
        console.log(seat)
        var code_book = JSON.parse(localStorage.getItem('code_book_krl_reg'));
        var token = JSON.parse(localStorage.getItem('data_token'));
        var token_set = token['access_token']
        var url = fetch('https://api-gowisata.aturtoko.site/api/train/change_seat',{
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token_set,
        },
        body: JSON.stringify({
                    "booking_code": code_book,
                    "wagon_code": [
                        "EKS"
                    ],
                    "wagon_no": [
                        nwag
                    ],
                    "seat": [
                        seat
                    ]
                }),
        }).then((response) => response.json()).then((responseData) => {
        var train = responseData.data;
        console.log(train)
     
        location.reload();

        });

    }

    function okChangeSeatEksC(id){
        $.LoadingOverlay("show")
        // var nes = ("#list_pax").val()
        var nwag = $("#wagon").val()
       
        var seat = id+"C";
        console.log(seat)
        var code_book = JSON.parse(localStorage.getItem('code_book_krl_reg'));
        var token = JSON.parse(localStorage.getItem('data_token'));
        var token_set = token['access_token']
        var url = fetch('https://api-gowisata.aturtoko.site/api/train/change_seat',{
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token_set,
        },
        body: JSON.stringify({
                    "booking_code": code_book,
                    "wagon_code": [
                        "EKS"
                    ],
                    "wagon_no": [
                        nwag
                    ],
                    "seat": [
                        seat
                    ]
                }),
        }).then((response) => response.json()).then((responseData) => {
        var train = responseData.data;
        console.log(train)
     
        location.reload();

        });

    }

    function okChangeSeatEksD(id){
        $.LoadingOverlay("show")
        // var nes = ("#list_pax").val()
        var nwag = $("#wagon").val()
       
        var seat = id+"D";
        console.log(seat)
        var code_book = JSON.parse(localStorage.getItem('code_book_krl_reg'));
        var token = JSON.parse(localStorage.getItem('data_token'));
        var token_set = token['access_token']
        var url = fetch('https://api-gowisata.aturtoko.site/api/train/change_seat',{
        method: 'POST',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token_set,
        },
        body: JSON.stringify({
                    "booking_code": code_book,
                    "wagon_code": [
                        "EKS"
                    ],
                    "wagon_no": [
                        nwag
                    ],
                    "seat": [
                        seat
                    ]
                }),
        }).then((response) => response.json()).then((responseData) => {
        var train = responseData.data;
        console.log(train)
     
        location.reload();

        });

    }

   function simpanAbayar(){
        window.location.href = "/payment_method";
    }
    function bayarNanty(){
        window.location.href = "/listorder";
    }
</script>
@endpush