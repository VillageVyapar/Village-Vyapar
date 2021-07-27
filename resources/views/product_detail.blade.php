@include('categorymenu');

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
<!-- </script> 
-->

<script>
function show() {
    var pass = document.getElementById('pass');
    if (pass.type == 'password') {
        pass.type = 'text';
    } else {
        pass.type = 'password';
    }

}

function show2() {
    var pass = document.getElementById('pass2');
    if (pass.type == 'password') {
        pass.type = 'text';
    } else {
        pass.type = 'password';
    }

}

function qrshow() {
    var img = document.getElementById('image');
    if (img.style.display == 'none') {
        img.style.display = 'block';
    } else {
        img.style.display = 'none';
    }
}

function like() {

    likes = document.getElementById('likes');
    if (likes.className = 'fa fa-heart-o') {
        likes.className = 'fa fa-heart';
    } else {
        likes.className = 'fa fa-heart-o';
    }
    pid = document.getElementById('product').value;
    total = document.getElementById('total').value;
    //alert(pid); 
    $.ajax({
        type: 'GET',
        url: '/like/' + pid + '/' + total,
        data: '_token = <?php echo csrf_token() ?>',
        success: function(data) {
            $("#msg").html(data.msg);
        }
    });
}
</script>
<style>
.simpleLens-big-image:hover {
    transform: scale(1.5);
}
</style>
<!-- catg header banner section -->
<section id="aa-catg-head-banner">
    <img src="/img/fashion/fashion-header-bg-8.jpg" style='height:250px;' alt="fashion img">
    <div class="aa-catg-head-banner-area">
        <div class="container">
            <div class="aa-catg-head-banner-content">

                @if(isset($products))
                @foreach($products as $p)
                <h2 align='left'>{{$p['p_name']}}</h2>
                <input type='text' style='display:none' id='product' disabled value="{{$p['p_id']}}">
                <input type='text' style='display:none' id='total' disabled value="{{$p['total_like']}}">
                @endforeach
                @endif
            </div>
        </div>
    </div>
</section>
<!-- / catg header banner section -->

<!-- product category -->
@foreach($products as $p)
<?php 
    $pid=$p['p_id'];
    $usersession=session('useremail');
  ?>
<section id="aa-product-details">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="aa-product-details-area">
                    <div class="aa-product-details-content">
                        <div class="row">
                            <!-- Modal view slider -->
                            <div class="col-md-5 col-sm-5 col-xs-12">
                                <div class="aa-product-view-slider">
                                    <div id="demo-1" class="simpleLens-gallery-container">
                                        <div class="simpleLens-container">
                                            <div class="simpleLens-big-image-container"><a
                                                    data-lens-image="/product_images/{{$p['img']}}"
                                                    class="simpleLens-lens-image">
                                                    <img src="/product_images/{{$p['img']}}" id='bigimages'
                                                        style='border:2px solid red' class="simpleLens-big-image"></a>
                                            </div>
                                        </div>
                                        <!--<div class="simpleLens-thumbnails-container">
                          <a data-big-image="img/view-slider/medium/polo-shirt-1.png" data-lens-image="img/view-slider/large/polo-shirt-1.png" class="simpleLens-thumbnail-wrapper" href="#">
                            <img src="img/view-slider/thumbnail/polo-shirt-1.png">
                          </a>                                    
                          <a data-big-image="img/view-slider/medium/polo-shirt-3.png" data-lens-image="img/view-slider/large/polo-shirt-3.png" class="simpleLens-thumbnail-wrapper" href="#">
                            <img src="img/view-slider/thumbnail/polo-shirt-3.png">
                          </a>
                          <a data-big-image="img/view-slider/medium/polo-shirt-4.png" data-lens-image="img/view-slider/large/polo-shirt-4.png" class="simpleLens-thumbnail-wrapper" href="#">
                            <img src="img/view-slider/thumbnail/polo-shirt-4.png">
                          </a>
                      </div> -->
                                    </div>
                                </div>
                            </div>
                            <!-- Modal view content -->

                            <div class="col-md-7 col-sm-7 col-xs-12">
                                <div class="aa-product-view-content">
                                    <div style='border:1px solid grey; padding:22px;'>
                                        <h2>{{$p['p_name']}}</h2>
                                        <div class="aa-price-block">
                                            <p class="aa-prod-category">
                                                <b>Price(&#8377;) : </b> {{$p['p_price']}}
                                            </p>
                                            </p>
                                            <p class="aa-prod-category">
                                                <b>Avilability : </b> <span>
                                                    @if($p['QOH']>0)
                                                    In Stock ({{$p['QOH']}})
                                                    @else
                                                    Unavailable ({{$p['QOH']}})
                                                    @endif
                                                </span>
                                            </p>
                                        </div>

                                        <p class="aa-prod-category">
                                            <b>Category:</b> {{$p['cat_name']}}
                                        </p>
                                        </p>
                                        <p class="aa-prod-category">
                                            <b>Subcategory:</b> {{$p['subcat_name']}}
                                        </p>
                                        </p>
                                        <p class="aa-prod-category">
                                            <b>Description : </b> {{$p['p_desc']}}
                                        </p>
                                        </p>
                                    </div>
                                    <div style='margin-top:15px;border:1px solid grey; padding:15px;'>

                                        <form method='get'>
                                            <h3 style='color:red;'>Seller description : <i onClick='like()' id='likes'
                                                    style='color:red;float:right;padding-right:80px;'
                                                    class="fa fa-heart-o" aria-hidden="true">
                                                    <p id='msg'>{{$p['total_like']}}</p>
                                                </i></h3>
                                        </form>


                                        <h4>{{$p['c_name']}} : </h4>
                                        <p>{{$p['address']}}</p>
                                        <a onclick='show2()' style='cursor:pointer;padding-right:20px;color:grey'> Show
                                            phone no </a>
                                        <input type='password' disabled style='border:none;' id='pass2'
                                            value='{{$p['phone_no']}}' />

                                        <a class="aa-add-to-cart-btn" href="{{url('/customerchat',$p->c_id)}}">Chat
                                            Now</a>
                                        </form>

                                    </div>
                                    <!-- <div class="aa-prod-view-bottom">
                      <a class="aa-add-to-cart-btn" href="#">Add To Cart</a>
                      
                      <a class="aa-add-to-cart-btn" href="#">Compare</a>
                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="aa-product-details-bottom">
                        <ul class="nav nav-tabs" id="myTab2">

                            <li><a href="#description" data-toggle="tab">Description</a></li>
                            <li><a href="#review" data-toggle="tab">Reviews</a></li>
                            <li><a href="#vendor" data-toggle="tab">Vendors</a></li>
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane fade in active" id="description">
                                <p>{{$p['p_desc']}}</p>
                                <ul>
                                    <li>Name : {{$p['p_name']}}</li>
                                    <li>Category : {{$p['cat_name']}}</li>
                                    <li>Sub category : {{$p['subcat_name']}}</li>

                                </ul>

                            </div>

                            <div class="tab-pane fade " id="review">
                                <div class="aa-product-review-area">
                                    <h2>{{$fbcnt}} Reviews for {{$p['p_name']}}</h2>

                                    <ul class="aa-review-nav">
                                        @foreach ($feedbacks as $fb)

                                        <li>
                                            <div class="media">
                                                <div class="media-left">
                                                    <a href="#">
                                                        <img class="media-object" src="/customer_img/{{$fb['c_img']}}"
                                                            alt="girl image">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <h4 class="media-heading"><strong>{{$fb['c_name']}}</strong> -
                                                        <span>{{date('d-M-y',strtotime($fb['f_date']))}}</span>
                                                    </h4>

                                                    <p>{{$fb['desc']}}</p>

                                                    <!-- <a href="{{url('delreview/$fb->c_id/$fb->p_id')}}" style='float:right;color:green'><b>Delete review</b></a> -->

                                                    <?php $cemail=$fb['email']; ?>

                                                    {{@csrf_field()}}
                                                    <?php
                              if(Session::has('useremail')){
                              foreach($customers as $cust){
                                $cid=$cust['c_id'];
                                if($usersession==$cemail){
                                  echo "<form action='/deleteFeedback/$cid/$pid'}} method='get'><button style='background:none; border:none; color:blue; '>Delete</button></form>";
                                }
                              }
                              }
                              
                            ?>
                                                </div>
                                                <div>

                                                </div>

                                            </div>
                                        </li>
                                        @endforeach

                                    </ul>



                                    <?php
                
                if(Session::has('useremail'))
                {
                  echo "
                  <h4>Add a review</h4>
                  <form method='get' class='aa-review-form' action='/newReview'>
                 
                  <div class='form-group'>
                  <label for='message'>Your Review</label>
                  <input type='text' style='display:none' name='pid' value='$pid'/>
                  
                  <textarea class='form-control' rows='3' name='review' id='message'></textarea>
                  <input type='submit' class='btn btn-default aa-review-submit' value='submit'/>
                  </div>
                  </form> ";
                }
                ?>
                                </div>
                            </div>

                            <div class="tab-pane fade" id="vendor">
                                @if(isset($products))
                                <h2>Vendor's Information : </h2>
                                <ul>
                                    @foreach($products as $p)
                                    <li>Name : {{$p['c_name']}} </li>
                                    <li>Address : {{$p['address']}} </li>

                                    <li>Phone no : <input type='password' disabled style='border:none;' id='pass'
                                            value='{{$p['phone_no']}}' /> </li>
                                    <li><a onclick='show()'
                                            style='float :left;color:blue;cursor:pointer;padding-right:20px;'> Show
                                            Contact no </a></li>
                                    <li><a onclick='qrshow()'
                                            style='float :left;color:green;cursor:pointer;padding-right:20px;'> Show
                                            Contact no(QR-Code) </a></li>
                                    <br>
                                    <img id='image' loader='lazy'
                                        src="https://chart.googleapis.com/chart?cht=qr&chl={{$p->phone_no}}&chs=120x120&chld=L|0"
                                        class="qr-code img-thumbnail img-responsive" style='display:none;' />
                            </div>
                            @endforeach
                            </ul>
                            @endif
                        </div>
                    </div>
                </div><br /><br /><br />

                <!-- Related product -->
                <div class="aa-product-related-item">
                    <h3>Related Products</h3>
                    <ul class="aa-product-catg aa-related-item-slider">
                        <!-- start single product item -->
                        @foreach($allproduct as $ap)
                        @foreach($products as $p)
                        @if($ap['subcat_id'] == $p['subcat_id'])
                        <li>
                            <figure>
                                <a href=""><img style='width:270px;height:300px;'
                                        src="/product_images/{{$ap['img']}}"></a>
                                <a class="aa-add-card-btn" href="#"><span class="fa fa-shopping-cart"></span>Add To
                                    Cart</a>
                                <figcaption>
                                    <h4 class="aa-product-title"><a href="#"
                                            style='float:left;padding-left:15px;'><b>{{$ap['p_name']}}</b></a></h4>
                                    <span class="aa-product-price" style='float:right;padding-right:15px;'>{{"gram"}} |
                                        &#8377;
                                        {{$ap['p_price']}}</span><span class="aa-product-price"></span>

                                    <h4 class="aa-product-title"><a
                                            style='float:left;padding-left:15px;'><b>{{$ap['c_name']}}</b></a></h4>
                                    <p style='float:right;padding-right:15px;'>{{$ap['p_date']}}</p>

                                </figcaption>
                            </figure>
                            <div class="aa-product-hvr-content">
                                <a href="#" data-toggle="tooltip" data-placement="top" title="Add to Wishlist"><span
                                        class="fa fa-heart-o"></span></a>
                                <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span
                                        class="fa fa-exchange"></span></a>
                                <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View"
                                    data-toggle="modal" data-target="#quick-view-modal-{{$ap['p_id']}}"><span
                                        class="fa fa-search"></span></a>
                            </div>
                            <!-- product badge -->

                        </li>
                        @endif
                        @endforeach
                        @endforeach
                        <!-- start single product item -->

                    </ul>
                    <!-- quick view modal -->
                    @foreach($allproduct as $ap)
                    @foreach($products as $p)
                    @if($ap['subcat_id'] == $p['subcat_id'])
                    <div class="modal fade" id="quick-view-modal-{{$ap['p_id']}}" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <button type="button" class="close" data-dismiss="modal"
                                        aria-hidden="true">&times;</button>
                                    <div class="row">
                                        <!-- Modal view slider -->
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="aa-product-view-slider">
                                                <div class="simpleLens-gallery-container" id="demo-1">
                                                    <div class="simpleLens-container">
                                                        <div class="simpleLens-big-image-container">
                                                            <br>
                                                            <img src="/product_images/{{$p['img']}}"
                                                                style='width:220px;height:300px;' alt="{{$p['p_name']}}"
                                                                class="simpleLens-big-image">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Modal view content -->
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <div class="aa-product-view-content">
                                                <h2>{{$p['p_name']}}</h2>
                                                <div class="aa-price-block">
                                                    <span class="aa-product-view-price"><b>Price (&#8377;) :
                                                        </b>{{$p['p_price']}} &#8377;</span>
                                                    <p><b>Avilability : </b>
                                                        @if($p['QOH']>0)
                                                        In Stock ({{$p['QOH']}})
                                                        @else
                                                        Unavailable ({{$p['QOH']}})
                                                        @endif
                                                    </p>
                                                </div>
                                                <p><b>Description : </b>{{$p['p_desc']}}</p>


                                                <div class="aa-prod-quantity">


                                                    <p class="aa-prod-category">
                                                        @if(isset($scname))
                                                        @foreach($scname as $s)
                                                    <p><b>Category : </b>{{$s['cat_name']}}</p>
                                                    <p><b>Sub category : </b>{{$s['subcat_name']}}</p>
                                                    @endforeach
                                                    @endif
                                                    </p>
                                                </div>
                                                <div class="aa-prod-view-bottom">
                                                    <a href="#" style='float:left;padding:8px;'
                                                        class="aa-add-to-cart-btn"><span
                                                            class="fa fa-shopping-cart"></span>Add To Cart</a>
                                                    <a href="{{ url('product_details',$p['p_id']) }}"
                                                        style='margin-left:10px;padding:8px;'
                                                        class="aa-add-to-cart-btn">View Details</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div>
                    @endif
                    @endforeach
                    @endforeach
                    <!-- Quick view complete -->
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- / product category -->

@include('footer');