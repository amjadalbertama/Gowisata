@extends('layout.app')

@section('content')
<div class="container-fluid mt-100" >
    <div class="container">
        <div class="row" id="body-sidemenu">
            <div id="main-content" class="col with-fixed-sidebar pb-5">
                <div class="container-fluid py-4">
                    <div class="row">
                        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4 ">
                            <div class="card p-3 pt-2 shadow-sm bg-white rounded">
                                <div class="text-end pt-1">
                                    <p class="text-sm mb-0 text-capitalize">Active Customer</p>
                                    <h4 class="mb-0">1,430</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                            <div class="card p-3 pt-2 shadow-sm bg-white rounded">
                                <div class="text-end pt-1">
                                    <p class="text-sm mb-0 text-capitalize">Total Customers</p>
                                    <h4 class="mb-0">1,430</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                            <div class="card p-3 pt-2 shadow-sm bg-white rounded">
                                <div class="text-end pt-1">
                                    <p class="text-sm mb-0 text-capitalize">Orders</p>
                                    <h4 class="mb-0">1,430</h4>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
                            <div class="card p-3 pt-2 shadow-sm bg-white rounded">
                                <div class="text-end pt-1">
                                    <p class="text-sm mb-0 text-capitalize">Pre Order</p>
                                    <h4 class="mb-0">1,430</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12 pt-4">
                            <div class="table-responsive">
                                <table class="table table-bordered shadow-sm bg-white rounded">
                                    <thead class="thead-main text-nowrap">
                                        <tr class="text-uppercase font-11" id="header_account">
                                            <th class="text-center" colspan="7">Last Order</th>
                                        </tr>
                                        <tr id="">
                                            <th class=" col-md-1">data</th>
                                            <th class=" col-md-1">data</th>
                                            <th class=" col-md-1">data</th>
                                            <th class=" col-md-1">data</th>
                                            <th class=" col-md-1">data</th>
                                            <th class=" col-md-1">data</th>
                                            <th class=" col-md-1">data</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-nowrap" id="tableFinance">
                                        <!-- <tr>
                                            <td id="" class="pl-3 text-center font-11 text-uppercase"><b>Tidak Ada Data Ditampilkan</b></td>
                                        </tr> -->
                                    </tbody>
                                    <tfoot class="border-bottom">
                                        <tr class="bg-brown">
                                            <td id="beforeAddData" colspan="7" class="pl-3 text-center font-12">Tidak ada data yang ditampilkan</td>
                                            <!-- <td id="afterAddData" class="pl-3 text-center font-11 text-uppercase d-none" bgcolor="#F5F5F5"><b>Jumlah</b></td>
                                            <td id="tdTotal" class="d-none"></td> -->
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div><!-- .col -->
                    </div><!-- .row -->
                </div>  
                <!-- .row -->
            </div>
        </div>
        <!-- Sidebar -->
     
        <!-- sidebar-container -->
        <!-- MAIN -->
        
        <!-- Main Col -->
    </div>
    <!-- body-row -->
</div>
@endsection