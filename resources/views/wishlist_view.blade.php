@include('categorymenu');

<section id="aa-catg-head-banner">
   <img src="img/fashion/fashion-header-bg-8.jpg" alt="fashion img">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>Wishlist Page</h2>
        <ol class="breadcrumb">
          <li><a href="/">Home</a></li>                   
          <li class="active">Wishlist</li>
        </ol>
      </div>
     </div>
   </div>
  </section>

  <section id="cart-view">
   <div class="container">
     <div class="row">
       <div class="col-md-12">
         <div class="cart-view-area">
           <div class="cart-view-table aa-wishlist-table">
             <form action="">
               <div class="table-responsive">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Delete</th>
                        <th>Image</th>
                        <th>Product</th>
                        <th>Price (&#8377;)</th>
                        <th>Stock Status</th>
                        <th></th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                      @if(count($wishlist) > 0)
                          @foreach($wishlist as $wl)
                            <td><a class="remove" href="{{url('delwishlist/'.$wl['p_id'].'/'.$wl['c_id'])}}"><fa class="fa fa-close"></fa></a></td>
                            <td><a href="{{url('product_details',$wl->p_id)}}"><img src="product_images/{{$wl->img}}" alt="img"></a></td>
                            <td><a class="aa-cart-title" href="{{url('product_details',$wl->p_id)}}">{{$wl->p_name}}</a></td>
                            <td>&#8377; {{$wl->p_price}} </td>
                            <td>{{$wl->QOH}}</td>
                            
                        @endforeach
                      @else
                        <td colspan=5><h2>Wishlist is Empty !!</h2></td>
                      @endif
                      </tr>
                                          
                      </tbody>
                  </table>
                </div>
             </form>             
           </div>
         </div>
       </div>
     </div>
   </div>
 </section>

@include('footer');