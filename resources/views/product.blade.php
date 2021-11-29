@include('categorymenu');
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
</script>

<script>
function getMessage(str) {
    var sid = document.getElementById('show').value;
    var cid = document.getElementById('rangevalue').value;
    document.getElementById('div2').value = cid;


    $.ajax({
        type: 'GET',
        url: '/productAjaxprice/' + str + '/' + sid,
        data: '_token = <?php echo csrf_token() ?>',
        success: function(data) {
            $("#msg").html(data.msg);
        }
    });
}

// function set(str) {
//     var sid = document.getElementById('show').value;

//     var cid = document.getElementById('rangevalue').value;
//     document.getElementById('div2').value = cid;
//     document.getElementById('div3').value = cid;

//     xmlhttp = new XMLHttpRequest();
//     xmlhttp.open("POST", "productAjaxprice/" + str + "/" + sid, true);
//     xmlhttp.onreadystatechange = function() {
//         if (xmlhttp.readyState == 4 && xmlhttp.statusText == 'OK') {
//             document.getElementById('user').innerHTML = this.responseText;
//         }
//     };
//     xmlhttp.send();
// }
</script>
<!-- catg header banner section -->
<section id="aa-catg-head-banner">
    <div class="container">
        <div class="aa-catg-head-banner-content">


            @if(isset($scname))
            @foreach($scname as $scn)
            <h2 align='center' style='padding:20px;height:auto;border:1px solid red;'>{{$scn['cat_name']}} >
                {{$scn['subcat_name']}}
            </h2>
            <input type='hidden' id='show' value='{{$scn['subcat_id']}}'>
            @endforeach
            @endif
            @if(isset($cname))
            @foreach($cname as $cn)
            <h2 align='left'>{{$cn['cat_name']}}</h2>
            @endforeach
            @endif
        </div>

    </div>
</section>
<!-- / catg header banner section -->

<!-- product category -->
<section id="aa-product-category">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
                <div class="aa-product-catg-content">
                    <div class="aa-product-catg-head">
                        <div class="aa-product-catg-head-left">

                        </div>
                        <div class="aa-product-catg-head-right">
                            <a id="grid-catg" href="#"><span class="fa fa-th"></span></a>
                            <!-- <a id="list-catg" href="#"><span class="fa fa-list"></span></a> -->
                        </div>
                    </div>

                    <div class="aa-product-catg-body">
                        <ul class="aa-product-catg" id='msg'>

                            <!-- start single product item -->
                            <?php 
                $maxprice=-1;
                $minprice=1000000;
                foreach ($products as $p)
                {
                  if($p['p_price'] > $maxprice)
                  {
                    $maxprice=$p['p_price'];
                  }
                  if($p['p_price'] < $maxprice)
                  {
                    $minprice=$p['p_price'];
                  }
                }
                ?>
                            @foreach ($products as $p)

                            <li>
                                <figure>
                                    <a href=""><img style='width:270px;height:300px;float:left'
                                            src="/product_images/{{$p['img']}}" /></a>

                                    <?php
                                    $pid=$p['p_id'];
                                    if(Session::has('useremail'))
                                    {
                                        
                                        echo "<a class='aa-add-card-btn' href='addWish/$pid' title='Add to Wishlist' style=''><span class='fa fa-heart-o'></span>Add to Wishlist</a>";
                                    }
                                    ?>


                                    <figcaption>
                                        <h4 class="aa-product-title"><a href="#"
                                                style='float:left;padding-left:15px;'><b>{{$p['p_name']}}</b></a>
                                        </h4>
                                        <span class="aa-product-price" style='float:right;padding-right:15px;'>
                                            &#8377;
                                            {{$p['p_price']}}</span><span class="aa-product-price"></span>
                                        <p class="aa-product-descrip"><b>Description : </b>{{$p['p_desc']}}</p><br>
                                        <h4 class=""><a
                                                style='float:left;padding-left:15px;'><b>{{$p['c_name']}}</b></a>
                                        </h4>
                                        <p style='float:right;padding-right:15px;'>{{$p['p_date']}}</p>

                                    </figcaption>
                                </figure>
                                <div class="aa-product-hvr-content">


                                    <!-- <a href="#" data-toggle="tooltip" data-placement="top" title="Compare"><span class="fa fa-exchange"></span></a> -->
                                    <a href="#" data-toggle2="tooltip" data-placement="top" title="Quick View"
                                        data-toggle="modal" data-target="#quick-view-modal-{{$p['p_id']}}"><span
                                            class="fa fa-search"></span></a>

                                </div>
                                <!-- product badge -->
                                @if($p['p_id']>=60)
                                <span class="aa-badge aa-sale" href="#">New!</span>
                                @endif
                            </li>
                            @endforeach
                            <!-- start single product item -->

                        </ul>
                        <!-- quick view modal -->
                        @foreach($products as $p)
                        <div class="modal fade" id="quick-view-modal-{{$p['p_id']}}" tabindex="-1" role="dialog"
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
                                                                    style='width:220px;height:300px;'
                                                                    alt="{{$p['p_name']}}" class="simpleLens-big-image">
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
                                                        <!-- <a href="#" style='float:left;padding:8px;' class="aa-add-to-cart-btn"><span class="fa fa-shopping-cart"></span>Add To Cart</a> -->
                                                        <a href="{{ url('product_details',$p['p_id']) }}"
                                                            style='margin-left:15px;padding:15px;width:250px;text-align:center;'
                                                            class="aa-add-to-cart-btn">View Details</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div>

                        <!-- / quick view modal -->
                        @endforeach
                    </div>

                    <div class="aa-product-catg-pagination">
                        <nav>
                            <ul class="pagination" style='padding:15px;'>


                                Pages : <li>{{$products->render()}}</li>

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
                <aside class="aa-sidebar">
                    <!-- single sidebar -->

                    <div class="aa-sidebar-widget">
                        <h3>Category</h3>
                        <ul class="aa-catg-nav">
                            @foreach($categories as $c)
                            <li><a href="{{ url('products',$c['cat_id']) }}">{{$c['cat_name']}}</a></li>
                            @endforeach

                        </ul>
                    </div>
                    <!-- single sidebar -->

                    <!-- single sidebar -->
                    <div class="aa-sidebar-widget">
                        <h3>Shop By Price</h3>
                        <!-- price range -->
                        <div class="aa-sidebar-price-range">
                            <form action="" method='get'>
                                <input type='range' value=0 id='rangevalue' style='width:250px;height:10px' ;
                                    onchange="getMessage(this.value)" step=20 min='{{$minprice}}' max="{{$maxprice}}"
                                    value='0' />

                                <br><span style='color:red;font-size:18px;'>Selected Price(&#8377;) :</span><input
                                    type="text" style="width:50px;background-color:white; border:none;" id="div2"
                                    value=0 disabled />
                            </form>
                        </div>
                    </div>
                    <br> <br>
                    <!-- single sidebar -->

                    <!-- single sidebar -->
                    <!-- <div class="aa-sidebar-widget">
                        <h3>Recently Views</h3>
                        <div class="aa-recently-views">
                            <ul>
                                <li>
                                    <a href="#" class="aa-cartbox-img"><img alt="img" src="img/woman-small-2.jpg"></a>
                                    <div class="aa-cartbox-info">
                                        <h4><a href="#">Product Name</a></h4>
                                        <p>1 x $250</p>
                                    </div>
                                </li>
                                <li>
                                    <a href="#" class="aa-cartbox-img"><img alt="img" src="img/woman-small-1.jpg"></a>
                                    <div class="aa-cartbox-info">
                                        <h4><a href="#">Product Name</a></h4>
                                        <p>1 x $250</p>
                                    </div>
                                </li>
                                <li>
                                    <a href="#" class="aa-cartbox-img"><img alt="img" src="img/woman-small-2.jpg"></a>
                                    <div class="aa-cartbox-info">
                                        <h4><a href="#">Product Name</a></h4>
                                        <p>1 x $250</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div> -->
                    <!-- single sidebar -->
                    <div class="aa-sidebar-widget">
                        <h3>Shop By Product's Likes </h3>
                        <div class="aa-recently-views">
                            <ul>
                                @if(isset($shoplikes))
                                @foreach($shoplikes as $sbl)
                                <li>
                                    <a href="{{ url('product_details',$sbl->p_id) }}" class="aa-cartbox-img"><img
                                            alt="img" src='/product_images/{{$sbl->img}}'></a>
                                    <div class="aa-cartbox-info">
                                        <h4><a href="{{ url('product_details',$sbl->p_id) }}">{{$sbl->p_name}}</a>
                                        </h4>
                                        <p>Price(&#8377;) : {{$sbl->p_price}} &#8377;</p>
                                        <p>likes : {{$sbl->total_like}} <i class='fa fa-heart' style='color:red'></i>
                                        </p>
                                    </div>
                                </li>
                                @endforeach
                                @endif
                            </ul>
                        </div>
                    </div>
                </aside>
            </div>

        </div>
    </div>
</section>
@include('footer');