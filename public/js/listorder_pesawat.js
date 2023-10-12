// $('#listOrder').on('click', function(){
  
//     var token = JSON.parse(localStorage.getItem('data_token'));
//     var token_set = token['access_token']
//     var url = fetch('https://api-gowisata.aturtoko.site/api/transaction/list?order=desc&page=1',{
//         method: 'GET',
//         headers: {
//             'Accept': 'application/json',
//             'Content-Type': 'application/json',
//             'Authorization': 'Bearer ' + token_set,
//         },
//       }).then((response) => response.json()).then((responseData) => {
//         var asal = responseData.data;
//         console.log(asal)
//         // window.location.href = "/listorder";
//         // var setPort = "";
//         //     $("#asal_li").empty();
//             for (var i = 0; i < asal.length; i++)
//             {
//                 setorder = `<tr>
//                 <td>`+asal[i].booking_id+`</td>
//                 <td><span class="truncate-text">`+ asal[i].invoice_number+`</span></td>
//                 <td>`+ asal[i].product_type+`</td>
//                 <td>`+ asal[i].total+`</td>
//                 <td>`+ asal[i].transaction_status+`</td>
//                 <td>`+ asal[i].transaction_type+`</td>
//                 <td>`+ asal[i].payment_status+`</td>
//                 <td class="text-nowrap">
//                   <div class="dropdown">
//                     <a href="javascript:void(0);" class="btn btn-sm color-main py-0" title="View/Edit" data-toggle="dropdown"><i class="fa fa-bars"></i></a>
//                     <div class="dropdown-menu dropdown-menu-right">
//                       <a class="dropdown-item" href="" title="Edit"><i class="fa fa-edit fa-fw mr-1"></i>Edit</a>
//                       <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="" title="Delete"><i class="fa fa-trash fa-fw mr-1"></i>Delete</a>
//                     </div>
//                   </div>
//                 </td>
//               </tr>
//               `;
//               $("#orderListPesawat").append(setorder);
//             }
//     });
// });


// function changePage(){
//   window.location.href = "/listorder";
// }


// function setListOrder(){
//   // window.location.href = "/listorder";

//   var token = JSON.parse(localStorage.getItem('data_token'));
//     var token_set = token['access_token']
//     var url = fetch('https://api-gowisata.aturtoko.site/api/transaction/list?order=desc&page=1',{
//         method: 'GET',
//         headers: {
//             'Accept': 'application/json',
//             'Content-Type': 'application/json',
//             'Authorization': 'Bearer ' + token_set,
//         },
//       }).then((response) => response.json()).then((responseData) => {
//         var asal = responseData.data;
//         console.log(asal)
//         // window.location.href = "/listorder";
//         // var setPort = "";
//         //     $("#asal_li").empty();
//             for (var i = 0; i < asal.length; i++)
//             {
//                 setorder = `<tr>
//                 <td>`+asal[i].booking_id+`</td>
//                 <td><span class="truncate-text">`+ asal[i].invoice_number+`</span></td>
//                 <td>`+ asal[i].product_type+`</td>
//                 <td>`+ asal[i].total+`</td>
//                 <td>`+ asal[i].transaction_status+`</td>
//                 <td>`+ asal[i].transaction_type+`</td>
//                 <td>`+ asal[i].payment_status+`</td>
//                 <td class="text-nowrap">
//                   <div class="dropdown">
//                     <a href="javascript:void(0);" class="btn btn-sm color-main py-0" title="View/Edit" data-toggle="dropdown"><i class="fa fa-bars"></i></a>
//                     <div class="dropdown-menu dropdown-menu-right">
//                       <a class="dropdown-item" href="" title="Edit"><i class="fa fa-edit fa-fw mr-1"></i>Edit</a>
//                       <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="" title="Delete"><i class="fa fa-trash fa-fw mr-1"></i>Delete</a>
//                     </div>
//                   </div>
//                 </td>
//               </tr>
//               `;
//               $("#orderListPesawat").append(setorder);
//             }
//     });
// }