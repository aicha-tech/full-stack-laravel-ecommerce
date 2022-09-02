<!DOCTYPE html>
<html lang="en">
  <head>
   @include('admin/css')
   <style type="text/css">
.center{ 
  margin: auto;
  width: 50%;
  border: 2px solid whitesmoke;
  text-align: center; 
  margin-top: 40px;
} 
.font_size{
    text-align: center; 
    font-size: 40px; 
    padding-top:20px; 


}
.img_size{
    width: 150px; 
    height: 150px;
}
.th_color{
    background: gray;
}
.th_deg{
    padding: 30px;
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
          <h2 class="font_size">All Product</h2>
           <table class="table table-striped table-dark">
            <tr class="th_color">
              <th class="th_deg">Product Title</th>
              <th class="th_deg">Description</th>
              <th class="th_deg">Quantity</th>
              <th class="th_deg">Catagory</th>
              <th class="th_deg">Price</th>
              <th class="th_deg">Discount Price</th>
              <th class="th_deg">Product Image</th>
              <th class="th_deg">&nbsp;&nbsp;&nbsp;&nbsp;</th>
              <th class="th_deg">&nbsp;&nbsp;&nbsp;&nbsp;</th>               

            </tr>
            @foreach($product as $product)
            <tr>
               <td>{{$product->title}}</td>
               <td>{{$product->description}}</td>
               <td>{{$product->quantity}}</td>
               <td>{{$product->catagory}}</td>
               <td>{{$product->price}}</td>
               <td>{{$product->discount_price}}</td>
               <td>
                <img class="img_size" src="/product/{{$product->image}}">
               </td>
               <td>
                <a href="{{url('delete_product',$product->id)}}" class="btn btn-outline-danger" onclick="return confirm('are sure to delete catagory') ">Delete</a>
               </td>
               <td>
                <a href="{{url('update_product',$product->id)}}" class="btn btn-outline-warning">Edit</a>
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