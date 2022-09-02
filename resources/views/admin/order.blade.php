<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin/css')
   <style>
    .font_size{
    text-align: center; 
    font-size: 40px; 
    padding-top:20px; 


}
   </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
      @include('admin/sidebar')
      <!-- partial -->
      <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_navbar.html -->
        @include('admin/header')
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <h2 class="font_size">All Orders</h2>
           
                    
             
                <table class="table table-striped table-dark">
                 <tr class="th_color">
                   <th class="th_deg">Name</th>
                   <th class="th_deg">Email</th>
                   <th class="th_deg">Adress</th>
                   <th class="th_deg">Phone</th>
                   <th class="th_deg">Product Title</th>
                   <th class="th_deg">Quantity</th>
                   <th class="th_deg">price</th>
                   <th class="th_deg">Payment Status</th>
                   <th class="th_deg">Delivery Status</th>
                   <th class="th_deg">image</th>    
                   <th class="th_deg">&nbsp;&nbsp;&nbsp;&nbsp;</th>            
     
                 </tr>
                 @foreach ($order as $order)
                 <tr>
                    <td>{{$order->name}}</td>
                    <td>{{$order->email}}</td>
                    <td>{{$order->address}}</td>
                    <td>{{$order->phone}}</td>
                    <td>{{$order->product_title}}</td>
                    <td>{{$order->quantity}}</td>
                    <td>{{$order->price}}</td>
                    <td>{{$order->payment_status}}</td>
                    <td>{{$order->delivery_status}}</td>
                    <td> 
                        <img class="img_size" src="/product/{{$order->image}}">
                    </td>
                    <td>
                        @if($order ->delivery_status=='processing')
                        <a href="{{url('deliverd',$order->id)}}" class="btn btn-outline-warning" onclick="return confirm('are sure this product deliverd ') ">DELIVERD</a>
                        @else 
                        <p style="color: green">delivered </p>
                        @endif
                    </td>
                 </tr>
              
                 @endforeach
                </table>


          





            </div>
        </div>        
      
    <!-- Plugin js for this page -->
       @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>