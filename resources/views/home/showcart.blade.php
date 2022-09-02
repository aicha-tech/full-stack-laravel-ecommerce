<!DOCTYPE html>
<html>
    <style>@media (min-width: 1025px) {
        .h-custom {
        height: 100vh !important;
        }
        }</style>
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
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         @if(session()-> has('message'))
         <div class="alert alert-success">
             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
               </button>
              {{session()->get('message')}}
         </div>
         @endif
                <!-- end header section -->
         <!-- slider section -->
         
         <!-- end slider section -->
     
      <!-- why section -->

      <section class="h-100 h-custom" style="background-color: #eee;">
        <div class="container py-5 h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col">
              <div class="card">
                <div class="card-body p-4">
      
                  <div class="row">
      
                    <div class="col-lg-7">
                      <h5 class="mb-3"><a href="#!" class="text-body"><i
                            class="fas fa-long-arrow-alt-left me-2"></i>Continue shopping</a></h5>
                      <hr>
      
                      <div class="d-flex justify-content-between align-items-center mb-4">
                        <div>
                          <p class="mb-1">Shopping cart</p>
                          <p class="mb-0">You have {{$count}} items in your cart</p>
                        </div>
                      
                      </div>
      
                     <?php $total_price=0 ?>
      
                      @foreach ($cart as $cart)
                          
                 
      
                      <div class="card mb-3 mb-lg-0">
                        <div class="card-body">
                          <div class="d-flex justify-content-between">
                            <div class="d-flex flex-row align-items-center">
                              <div>
                                <img
                                  src="/product/{{$cart->image}}""
                                  class="img-fluid rounded-3" alt="Shopping item" style="width: 65px;">
                              </div>
                              <div class="ms-3">
                                <h5 style="margin-left: 20px">{{$cart->product_title}}</h5>
                              </div>
                            </div>
                            <div class="d-flex flex-row align-items-center">
                              <div style="width: 50px;">
                                <h5 class="fw-normal mb-0">{{$cart->quantity}}</h5>
                              </div>
                              <div style="width: 80px;">
                                <h5 class="mb-0">${{$cart->price}}</h5>
                              </div>
                              <a href="#!" style="color: #cecece;"><i class="fas fa-trash-alt"></i></a>
                            </div>
                            <div>
                                <a href="{{url('remove_product',$cart->id)}}" class='btn btn-danger'>delete</a>
                            </div>
                          </div>
                        </div>
                      </div>

              <?php $total_price= $total_price + $cart->price ?>
        
                      @endforeach
                    </div>
                    <div class="col-lg-5">
      
                      <div class="card bg-primary text-white rounded-3">
                        <div class="card-body">
                          
                          <p class="small mb-2">Card type</p>
                       
      
                          <form class="mt-4" method="POST" action="{{url('/cashout')}}">
                            @csrf
                           
      
                           
      
                          <select name="paiment" id="" style="color:black">
                            <option value="delivery" default="">on delivery</option>
                            <option value="visa">visa</option>
                          </select>
                          
                          
                          
      
                          <hr class="my-4">
      
                          <div class="d-flex justify-content-between">
                            <p class="mb-2">Subtotal</p>
                            <p class="mb-2">${{$total_price}}</p>
                          </div>
      
                          <div class="d-flex justify-content-between">
                            <p class="mb-2">Shipping</p>
                            <p class="mb-2">$0</p>
                          </div>
      
                          <div class="d-flex justify-content-between mb-4">
                            <p class="mb-2">Total(Incl. taxes)</p>
                            <p class="mb-2">{{$total_price}}</p>
                          </div>
      
                          
                          <button type="submit" class="btn btn-info btn-block btn-lg">
                            
                            <div class="d-flex justify-content-between">
                                
                              <span>$ {{$total_price}}</span>
                              <span>Checkout <i class="fas fa-long-arrow-alt-right ms-2"></i></span>
                           
                        
                            </div>
                     
                          </button>
                        </form>
                        </div>
                      </div>
      
                    </div>
      
                  </div>
      
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- end arrival section -->
      
      <!-- product section -->

      <!-- end product section -->

      <!-- subscribe section -->

       <!-- end subscribe section -->
 <!-- client section -->
 
      <!-- end client section -->
      <!-- footer start -->
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