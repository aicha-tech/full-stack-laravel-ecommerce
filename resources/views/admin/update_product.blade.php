<!DOCTYPE html>
<html lang="en">
  <head>
  <base href="/public">
   @include('admin/css')
    <style type="text/css">
        .div_center{
         text-align: center; 
         padding-top: 40px; 
        }
        .font_size{
         font-size: 40px; 
         padding-bottom: 40px; 
     
        }
        .text_color{
         color: black; 
         padding-bottom: 20px;
        }
        label{
         display: inline-block; 
         width: 200px; 
     
     
        }
        .div_design{
         padding-bottom: 15px; 
         display: inline-block;
        }
        select {
       // A reset of styles, including removing the default dropdown arrow
       appearance: none;
       background-color: transparent;
       border: none;
       padding: 0 1em 0 0;
       margin: 0;
       width: 220px;
       font-family: inherit;
       font-size: inherit;
       cursor: inherit;
       line-height: inherit;
     
       // Stack above custom arrow
       z-index: 1;
     
     
       &::-ms-expand {
         display: none;
       }
     
      
     }
     .img_size{
        height: 10px;
        width: 10px;
       display: inline;
       margin: auto;
}
.label_deg{
    display: inline-block; 
    margin:auto; 
}
img {
  border: 1px solid #ddd;
  border-radius: 4px;
  padding: 5px;
  width: 250px;

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
                @if(session()-> has('message'))
                <div class="alert alert-success">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                     {{session()->get('message')}}
                </div>
                @endif
                 
                <div class="div_center">
        
                    <h1 class="font_size">Update Product</h1>
        
                <form action="{{url('/update_product_confirm',$product->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="div_design">
                  
                    <label >Product Title :</label>
                    <input class="text_color" type="text" name="title" placeholder="write a title" required="" value="{{$product->title}}">
                    </div>  
        
                    <div class="div_design">
                        <label >Product Description :</label>
                        <input class="text_color" type="text" name="description" placeholder="write a Description" required="" value="{{$product->description}}">
                        </div>
                 
        
        
                 <div class="div_design">
                    <label >Product Price :</label>
                    <input class="text_color" type="number" name="price" placeholder="write a Price" required="" value="{{$product->price}}">
                    </div>
                
                    
                    <div class="div_design">
                        <label >Discount Price :</label>
                        <input class="text_color" type="number" min="0" name="dis_price" placeholder="write a discount is apply" value="{{$product->discount_price}}">
                        </div>
        
        
        
                    <div class="div_design">
                        <label >Product Quantity :</label>
                        <input class="text_color" type="number" min="0" name="quantity" placeholder="write a Quantity" required="" value="{{$product->quantity}}">
                        </div>
                   
                        <div class="div_design">
                            <label >product catagory :</label>
                           <select class="text_color" name="catagory" required="">
                            <option value="{{$product->catagory}}" selected="">{{$product->catagory}}</option>
                            @foreach($catagory as $catagory)
        
                            <option value="{{$catagory->catagory_name}}">{{$catagory->catagory_name}}</option>
        
                            @endforeach
                       
                           </select>
                            </div>
                        
        
                            <div class="div_design">
                                <label >Update Product image :</label>
                                <input  type="file" name="image" value="/product/{{$product->image}}" >
                                </div>
                                <br>
                                <div class="div_design">
                                
                                    <label class="label_deg">current image :</label>
                                    <div class="img_size">
                                   <img height="150" weight="150" src="/product/{{$product->image}}" alt="">
                                    </div>
                                </div>
                                <div class="">
                                   
                                    <input type="submit" value="Update Product" class="btn btn-primary">
                                    </div>
                                
                        </div>      
                    </form>
                </div>
               
            </div>
        </div>
        </div>
        
      
    <!-- Plugin js for this page -->
       @include('admin.script')
    <!-- End custom js for this page -->
  </body>
</html>