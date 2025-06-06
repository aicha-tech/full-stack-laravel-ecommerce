<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<header class="header_section">
    <div class="container">
       <nav class="navbar navbar-expand-lg custom_nav-container ">
          <a class="navbar-brand" href="{{url('/')}}">MyBusiness</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class=""> </span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
             <ul class="navbar-nav">
                <li class="nav-item active">
                   <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
                </li>
               <li class="nav-item dropdown">
                   <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="true"> <span class="nav-label">Pages <span class="caret"></span></a>
                   <ul class="dropdown-menu">
                      <li><a href="about.html">About</a></li>
                      <li><a href="testimonial.html">Testimonial</a></li>
                   </ul>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="{{url('product_view')}}">Products</a>
                </li>
                <li class="nav-item">
                   <a class="nav-link" href="blog_list.html">Blog</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="contact.html">Contact</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" href="{{url('order_user')}}">Order</a>
               </li>
                <li class="nav-item">
                   <a class="nav-link" href="{{url('show_cart')}}"><i class="fa" style="font-size:24px">&#xf07a;</i>
                     <span class='badge badge-warning' id='lblCartCount'> {{$count}} </span></a>
                </li>
                
                <form class="form-inline">
                   <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                   <i class="fa fa-search" aria-hidden="true"></i>
                   </button>
                </form>
                @if (Route::has('login'))
                @auth
                <li class="nav-item">
                    <x-app-layout>
  
                    </x-app-layout>
                 </li>
                  @else
                <li class="nav-item">
                    <a class="btn btn-outline-primary" href="{{ route('login') }}" id="logincss">Login</a>
                 </li>
                 <li class="nav-item">
                    <a class="btn btn-outline-secondary" href="{{ route('register') }}">Registre</a>
                 </li>
                 @endauth
                 @endif
             </ul>
          </div>
       </nav>
    </div>
 </header>
