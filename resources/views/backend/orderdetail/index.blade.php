@extends('layout.admin')
@section('title', 'Chi tiết đơn hàng')
@section('content')

<!-- CONTENT -->
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-12">
               <h1 class="d-inline">Chi tiết đơn hàng</h1>
            </div>
         </div>
      </div>
   </section>

   <!-- Main content -->
   <section class="content">
      <div class="card">
         <div class="card-header text-right">
            <a href="{{route('admin.order.index')}}" class="btn btn-sm btn-info">
               <i class="fa fa-arrow-left"></i> Về danh sách
            </a>
         </div>

         <div class="card-body p-2">
            <table class="table table-bordered">
               <thead>
                  <tr>
                     <th class="text-center" style="width:30px;">
                        <input type="checkbox">
                     </th>
                     <th>Tên đơn hàng</th>
                     <th>Tên sản phẩm</th>
                     <th>Giá</th>
                     <th>Số lượng</th>
                     <th>Tổng đơn hàng</th>
                     <th>ID</th>
                  </tr>
               </thead>
               <tbody>
                  @foreach ($list as $row)
                  <tr class="datarow">
                     <td>
                        <input type="checkbox">
                     </td>
                     <td>
                        {{ $row->ordername }}
                     </td>
                     <td> {{ $row->productname }}</td>
                     <td> {{ $row->productprice }}</td>
                     <td> {{ $row->productqty }}</td>
                     <td> {{ $row->amount }}</td>
                     <td> {{ $row->id }}</td>
                  </tr>
                  @endforeach
               </tbody>
            </table>
         </div>
      </div>
   </section>
</div>
<!-- END CONTENT-->

@endsection