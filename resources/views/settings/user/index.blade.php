@extends('layout.app')

@section('content')
<div class="container-fluid mt-100">
  <div class="row" id="body-sidemenu">
    <div id="main-content" class="col with-fixed-sidebar pt-3 pb-5">
      <div class="container">
        <div class="row ">
        
        <div class="col-12 pt-2">
          <h1 class="h6 font-weight-normal text-center text-uppercase "> <b>List Data Customers</b> </h1><br>
          <div class="row mb-3">
            <div class="col-12 col-md-8 col-lg-9 col-xl-9">
              <!-- <a href="{{ route('user.create') }}" class="btn btn-sm btn-main px-4 mr-2"><i class="fa fa-user-plus mr-2"></i>New User</a> -->
              <!-- <a href="{{ route('user.create') }}" class="btn btn-sm px-4 mr-2" style="background-image: linear-gradient(red, rgb(251, 140, 1));"><b class="text-white"><i class="fa fa-user-plus mr-2"></i>New User</b></a> -->
              <a class="btn btn-sm btn-secondary px-4 mr-2 disabled"><i class="fa fa-trash mr-2"></i>Delete Selection</a>
              <!-- <a class="btn btn-sm btn-secondary px-4 mr-2"><i class="fa fa-download mr-2"></i>Download</a> -->
            </div>
            <!-- .col -->
            <div class="col-12 col-md-4 col-lg-3 col-xl-3">
              <form action="{{ route('users_search') }}" class="mb-30" id="form_search_user" method="POST">
                @csrf
                <div class="input-group">
                  <input class="form-control form-control-sm border-right-0 border" type="search" placeholder="Search.." id="search_user" name="search_user">
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
                      <th>Username</th>
                      <th>Full Name</th>
                      <th>Email</th>
                      <th>Phone</th>
                      <th>type</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody class="text-nowrap">
            
                    <tr>
                      <td>
                        <div class="custom-control custom-checkbox ml-2">
                          <input type="checkbox" class="custom-control-input" id="1" name="checkbox">
                          <label class="custom-control-label" for="1"></label>
                        </div>
                      </td>
                      <td>tesdasdasdas</td>
                      <td>tessdasdasdas</td>
                      <td>tesassdasda@gmail.com</td>
                      <td>08225852712</td>
                      <td>b2c</td>
                      <td class="text-nowrap">
                      <!-- <a href="javascript:void(0);" data-toggle="modal" data-target="" title="Delete"><i class="fa fa-trash fa-2x mr-1"></i>Delete</a> -->
                        <div class="dropdown">
                          <a href="javascript:void(0);" class="btn btn-sm color-main py-0" title="View/Edit" data-toggle="dropdown-menu"><i class="fa fa-bars"></i></a>
                          <div class="dropdown-menu ">
                            <a class="dropdown-item" href="" title="Edit"><i class="fa fa-edit fa-fw mr-1"></i> Edit</a>
                            <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" title="Delete"><i class="fa fa-trash fa-fw mr-1"></i> Delete </a>
                          </div>
                        </div>
                        <!-- <div class="btn-group">
                          <a class="btn btn-danger dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                          <i class="fa fa-bars"></i>
                          </a>
                          <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Action</a></li>
                            <li><a class="dropdown-item" href="#">Another action</a></li>
                            <li><a class="dropdown-item" href="#">Something else here</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="#">Separated link</a></li>
                          </ul>
                        </div> -->
                      </td>
                    </tr>
             
                  </tbody>
                  <tfoot class="border-bottom">
                    <tr>
                      <td colspan="8">
                        <div class="d-block d-md-flex flex-row justify-content-between">
                          <div class="d-block d-md-flex">
                          </div>
                          <div class="d-md-flex pt-1 text-secondary">
                            <span class="btn btn-sm px-0 mr-3">Displayed records: {{ $pagination->from }}-{{ $pagination->to }} of {{ sizeof($pagination->data) == 0 ? 0 : $pagination->total }}</span>
                            <a href="{{ $pagination->path }}" title="Pertama" class="btn btn-sm px-0 mr-3 @if($pagination->current_page == 1) disabled @endif"><i class="fa fa-angle-double-left"></i></a>
                            <a href="{{ $pagination->path }}?page={{ $pagination->current_page - 1 }}" title="Sebelumnya" class="btn btn-sm px-0 mr-3 @if($pagination->current_page == 1) disabled @endif"><i class="fa fa-angle-left"></i></a>
                            <div class="btn-group mr-3" title="Pilih halaman">
                              <button type="button" class="btn btn-sm px-0 dropdown-toggle" data-toggle="dropdown">
                              {{ $pagination->current_page }}
                              </button>
                              <div class="dropdown-menu">
                                <?php for ($i = 1; $i <= $pagination->last_page; $i++) { ?>
                                <a class="dropdown-item @if($i == $pagination->current_page) active @endif" href="@if($i == 1) {{ $pagination->path }} @else {{ $pagination->path }}?page={{$i}} @endif">{{ $i }}</a>
                                <?php } ?>
                              </div>
                            </div>
                            <a href="{{ $pagination->path }}?page={{ $pagination->current_page + 1 }}" title="Berikutnya" class="btn btn-sm px-0 mr-3 @if($pagination->next_page_url == null) disabled @endif"><i class="fa fa-angle-right"></i></a>
                            <a href="{{ $pagination->last_page_url }}" title="Terakhir" class="btn btn-sm px-0 mr-3 @if($pagination->next_page_url == null) disabled @endif"><i class="fa fa-angle-double-right"></i></a>
                          </div>
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
          @if(session('adduser') || session('edituser') || session('deluser'))
          <div class="sufee-alert alert with-close alert-success alert-dismissible fade show text-center">
            <span class="badge badge-pill badge-success">Success</span>
            {{ session('adduser') || session('edituser') || session('deluser') }}
          </div>
          @endif
        </div>
        <!-- .col-* -->
      </div>
      </div>
      <!-- .row -->
    </div>
  </div>
</div>

@foreach ($users as $no => $del)
<div class="modal fade" id="confirmationModal-{{$del->id}}">
    <!-- Delete-->
    <div class="modal-dialog modal-sm modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Delete Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <form id="deluser" action="{{ route('deluser', $del->id) }}" class="needs-validation" novalidate="" method="delete">
                @csrf
                <!-- <div class="modal-body">
                    <p class="">Remove this item?</p>
                    <div class="form-group">
                        <label for="f1" class="">Reason: <span class="text-danger">*</span></label>
                        <textarea class="form-control" rows="3" id="comment" name="comment" required></textarea>
                        <div class="valid-feedback">OK.</div>
                        <div class="invalid-feedback">Wajib diisi.</div>
                    </div>
                </div> -->
                <div class="modal-footer">
                    <button id="deluser" type="submit" class="btn btn-main"><i class="fa fa-trash mr-1"></i>Delete</button>
                    <button type="button" class="btn btn-light" data-dismiss="modal"><i class="fa fa-times mr-1"></i>Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div> <!-- #confirmationModal -->
@endforeach

@endsection