@extends('layout.app')

@section('content')
<div class="container-fluid mt-100">
  <div class="row" id="body-sidemenu">
    <div id="main-content" class="col with-fixed-sidebar pt-3 pb-5">
      <div class="container">
        <div class="row ">
        <div class="col-12 pt-2">
        <h1 class="h6 font-weight-normal text-center text-uppercase "> <b>Details Orders</b> </h1><br>
          <div class="card shadow p-3 mb-5 bg-body rounded">
            <!-- <div class="card-body"> -->
            <!-- .row -->
          
          <!-- .row -->
          <div class="row">
            <div class="col-12">
            
            </div>
            <!-- .col -->
          </div>
          <!-- .row -->
        
        </div>
        <!-- .col-* -->
      </div>
      </div>
      <!-- </div> -->
      </div>
      <!-- .row -->
    </div>
  </div>
</div>

@endsection

@push('scripts')
<script type="text/javascript">
   var token = JSON.parse(localStorage.getItem('data_token'));
    var token_set = token['access_token']
    var url = fetch('https://api-gowisata.aturtoko.site/api/transaction/list?order=desc&page=1',{
        method: 'GET',
        headers: {
            'Accept': 'application/json',
            'Content-Type': 'application/json',
            'Authorization': 'Bearer ' + token_set,
        },
      }).then((response) => response.json()).then((responseData) => {
        var transaction = responseData.data;
        console.log(transaction)
        
        
        for (var i = 0; i < transaction.length; i++)
        {
            setorder = `<tr>
            <td>`+ transaction[i].id +`</td>
            <td>`+ transaction[i].invoice_number +`</td>
            <td>`+ transaction[i].booking_data.booking_code +`</td>
            <td>`+ transaction[i].product_type +`</td>
            <td>`+ transaction[i].total +`</td>
            <td>`+ transaction[i].transaction_status +`</td>
            <td>`+ transaction[i].transaction_type +`</td>
            <td>`+ transaction[i].payment_status +`</td>
            <td class="text-nowrap">
                <div class="dropdown">
                <a href="javascript:void(0);" class="btn btn-sm color-main py-0" title="View/Edit" data-toggle="dropdown"><i class="fa fa-bars"></i></a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="" title="Edit"><i class="fa fa-edit fa-fw mr-1"></i>Edit</a>
                        <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="" title="Delete"><i class="fa fa-trash fa-fw mr-1"></i>Delete</a>
                    </div>
                </div>
            </td>
            </tr>`;
            $("#orderListPesawat").append(setorder);
        }
    });
    </script>
  @endpush