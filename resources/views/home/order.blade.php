<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="home/images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
      <style>
        img {
  border: 1px solid #ddd;
  border-radius: 4px;
  padding: 5px;
  width: 150px;
}

img:hover {
  box-shadow: 0 0 2px 1px rgba(0, 140, 186, 0.5);
}


      </style>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
                <!-- end header section -->
         <!-- slider section -->
         <table class="table table-striped table-white">
            <tr class="th_color">
              <th class="th_deg">Name</th>
              <th class="th_deg">Email</th>
              <th class="th_deg">Adress</th>
              <th class="th_deg">Phone</th>
              <th class="th_deg">Product Title</th>
              <th class="th_deg">Quantity</th>
              <th class="th_deg">Price</th>

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
                   <a href="{{url('cancel_order',$order->id)}}" class="btn btn-outline-warning" onclick="return confirm('are sure cancel order') ">Cancel</a>
                  
               </td>
            </tr>
         
            @endforeach
           </table>
         <!-- end slider section -->
      </div>
      <!-- why section -->

     @include('home.footer')
      <!-- footer end -->
      <div class="cpy_">
         <p class="mx-auto">© 2021 All Rights Reserved By <a href="https://html.design/">Free Html Templates</a><br>
         
            Distributed By <a href="https://themewagon.com/" target="_blank">ThemeWagon</a>
         
         </p>
      </div>
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom js -->
      <script src="home/js/custom.js"></script>
   </body>
</html>