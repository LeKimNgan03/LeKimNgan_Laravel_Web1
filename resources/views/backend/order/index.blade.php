@extends('layout.admin')
@section('title', 'Quản lý đơn hàng')
@section('content')

<!-- CONTENT -->
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-12">
               <h1 class="d-inline">Tất cả đơn hàng</h1>
            </div>
         </div>
      </div>
   </section>

   <!-- Main content -->
   <section class="content">
      <div class="card">
         <div class="card-header text-right">
            <a href="{{route('admin.order.trash')}}" class="btn btn-sm btn-danger">
               <i class="fa-solid fa-trash"></i> Thùng rác</a>
         </div>
         <div class="card-body p-2">
            <table class="table table-bordered">
               <thead>
                  <tr>
                     <th class="text-center" style="width:30px;">
                        <input type="checkbox">
                     </th>
                     <th>Tên khách hàng</th>
                     <th>Tên đơn hàng</th>
                     <th>Số điện thoại</th>
                     <th>Email</th>
                     <th>Chức năng</th>
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
                        {{ $row->user_name }}
                     </td>
                     <td> {{ $row->name }}</td>
                     <td> {{ $row->phone }}</td>
                     <td> {{ $row->email }}</td>
                     <td>
                        <a href="" class="btn btn-sm btn-success">
                           <i class="fa fa-toggle-on" aria-hidden="true"></i>
                        </a>
                        <a href="{{route('admin.order.show',['id'=>$row->id])}}" class="btn btn-sm btn-info">
                           <i class="fa fa-eye" aria-hidden="true"></i>
                        </a>
                        <a href="" class="btn btn-sm btn-primary">
                           <i class="fa fa-edit" aria-hidden="true"></i>
                        </a>
                        <a href="" class="btn btn-sm btn-danger">
                           <i class="fa fa-trash" aria-hidden="true"></i>
                        </a>
                     </td>
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