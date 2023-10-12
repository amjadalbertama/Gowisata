@extends('layout.app')

@section('content')
<div class="container-fluid mt-100">
  <div class="row" id="body-sidemenu">
    <div id="main-content" class="col with-fixed-sidebar pt-3 pb-5">
      <div class="container">
        <div class="row ">
 
        <div class="col-12 pt-2">
        <h1 class="h6 font-weight-normal text-center text-uppercase "><b>List Data Companies</b> </h1><br>
          <div class="row mb-3">
            <div class="col-12 col-md-8 col-lg-9 col-xl-9">
              <a onclick="modalAddCompany()" class="btn btn-sm px-4 mr-2" style="background-image: linear-gradient(red, rgb(251, 140, 1));"><b class="text-white"><i class="fa fa-building mr-2"></i>New Company</b></a>
              <a class="btn btn-sm btn-secondary px-4 mr-2 disabled"><i class="fa fa-trash mr-2"></i>Delete Selection</a>
              <!-- <a class="btn btn-sm btn-secondary px-4 mr-2"><i class="fa fa-download mr-2"></i>Download</a> -->
            </div>
            <!-- .col -->
            <div class="col-12 col-md-4 col-lg-3 col-xl-3">
              <form action="{{ route('users_search') }}" class="mb-30" id="form_search_user" method="POST">
                @csrf
                <div class="input-group">
                  <input class="form-control form-control-sm border-right-0 border" type="search" placeholder="Search..." id="search_user" name="search_user">
                  <span class="input-group-append">
                    <button class="input-group-text bg-white border-left-0 border"><i class="fa fa-search text-grey"></i></button>
                  </span>
                </div>
              </form>
            </div>
            <!-- .col -->
          </div>
          <!-- .row -->
          <div class="row">
            <div class="col-12">
              <div class="card shadow-sm bg-white rounded">
                <div class="card-body px-3 py-1">
                  <form class="form-inline" action="javascript:void(0);">
                    <!-- <label for="sel1" class="mt-2 mt-sm-0 mr-sm-2">Group:</label>
                    <select class="form-control form-control-sm mr-sm-2 bg-transparent border-0 px-0" id="sel1">
                      <option>All</option>
                      <option>A</option>
                      <option>B</option>
                      <option>C</option>
                    </select> -->
                    <label for="sel2" class="mt-2 mt-sm-0 mr-sm-2">Status:</label>
                    <select class="form-control form-control-sm mr-sm-2 bg-transparent border-0 px-0" id="sel2" onchange="window.location.href = this.value">
                      <option value="{{ url('users') }}" @if(!isset(Request()->is_active)) selected @endif>All</option>
                      <option value="{{ url('users') }}?is_active=1" @if(isset(Request()->is_active) && Request()->is_active == 1) selected @endif>Aktif</option>
                      <option value="{{ url('users') }}?is_active=0" @if(isset(Request()->is_active) && Request()->is_active == 0) selected @endif>Inaktif</option>
                    </select>
                  </form>
                </div>
              </div>
            </div>
            <!-- .col -->
          </div>
          <!-- .row -->
          <div class="row">
            <div class="col-12">
              <div class="table-responsive">
                <table class="table table-striped table-sm border bg-white">
                  <thead class="thead-main text-nowrap">
                    <tr class="text-uppercase font-11">
                      <th>
                        <div class="custom-control custom-checkbox ml-2">
                          <input type="checkbox" class="custom-control-input" id="selectAll" name="selectAll">
                          <label class="custom-control-label" for="selectAll"></label>
                        </div>
                      </th>
                      <th>No </th>
                      <th>Company NPWP </th>
                      <th>Company Name </th>
                      <th>Office Email </th>
                      <th>Office Phone </th>
                      <th>Address </th>
                      <th>Action </th>
                    </tr>
                  </thead>
                  <tbody class="text-nowrap" id="table_company">
      
                  </tbody>
                  <tfoot class="border-bottom">
                    <tr>
                      <td colspan="8">
                        <div class="d-block d-md-flex flex-row justify-content-between">
                          <div class="d-block d-md-flex">
                          </div>
                      </td>
                    </tr>
                  </tfoot>
                </table>
              </div>
            </div>
            <!-- .col -->
          </div>
          <!-- .row -->
        </div>
        <!-- .col-* -->
      </div>
      </div>
      <!-- .row -->
    </div>
  </div>
</div>
<div id="modalConfirmDelCom"></div>
<div id="modalAddCompany"></div>
<div id="modalEditCompany"></div>
@endsection
@push('scripts')
<script>
var token = JSON.parse(localStorage.getItem('data_token'));
var token_set = token['access_token']

getListCompany()


</script>
@endpush