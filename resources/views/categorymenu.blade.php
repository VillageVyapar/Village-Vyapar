<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Village Vyapar | Home</title>

    <!-- Font awesome -->
    <link href="/css/font-awesome.css" rel="stylesheet">
    <!-- Bootstrap -->
    <link href="/css/bootstrap.css" rel="stylesheet">
    <!-- SmartMenus jQuery Bootstrap Addon CSS -->
    <link href="/css/jquery.smartmenus.bootstrap.css" rel="stylesheet">
    <!-- Product view slider -->
    <link rel="stylesheet" type="text/css" href="/css/jquery.simpleLens.css">
    <!-- slick slider -->
    <link rel="stylesheet" type="text/css" href="/css/slick.css">
    <!-- <link rel="stylesheet" type="text/css" href="/css/theme-color/default-theme.css"> -->
    <!-- price picker slider -->
    <link rel="stylesheet" type="text/css" href="/css/nouislider.css">
    <!-- Theme color -->



    <!-- <link id="switcher" href="css/theme-color/bridge-theme.css" rel="stylesheet"> -->
    <!-- Top Slider CSS -->
    <link href="/css/sequence-theme.modern-slide-in.css" rel="stylesheet" media="all">

    <!-- Main style sheet -->
    <link href="/css/style.css" rel="stylesheet">

    <!-- Google Font -->
    <link href='https://fonts.googleapis.com/css?family=Lato' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Raleway' rel='stylesheet' type='text/css'>


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Google Form Script -->
    <script type="text/javascript">
    function googleTranslateElementInit() {
        new google.translate.TranslateElement({
            pageLanguage: 'en',
            layout: google.translate.TranslateElement.InlineLayout.VERTICAL
        }, 'google_translate_element');
    }
    </script>
    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
    </script>
    <script>
    function themechange(str) {
        if (str == 'Green') {
            var head = document.getElementsByTagName('HEAD')[0];
            var link = document.createElement('link');
            // set the attributes for link element 
            link.rel = 'stylesheet';
            link.type = 'text/css';
            link.href = '/css/theme-color/green-theme.css';
            head.appendChild(link);
        } else if (str == 'Red') {
            var head = document.getElementsByTagName('HEAD')[0];
            var link = document.createElement('link');
            // set the attributes for link element 
            link.rel = 'stylesheet';
            link.type = 'text/css';
            link.href = '/css/theme-color/Red-theme.css';
            head.appendChild(link);

        } else if (str == 'Orange') {
            var head = document.getElementsByTagName('HEAD')[0];
            var link = document.createElement('link');
            // set the attributes for link element 
            link.rel = 'stylesheet';
            link.type = 'text/css';
            link.href = '/css/theme-color/Orange-theme.css';
            head.appendChild(link);

        } else {
            var head = document.getElementsByTagName('HEAD')[0];
            var link = document.createElement('link');
            // set the attributes for link element 
            link.rel = 'stylesheet';
            link.type = 'text/css';
            link.href = '/css/theme-color/default-theme.css';
            head.appendChild(link);
        }
    }
    </script>
    <!-- finished  Google Form Script -->
</head>
<!-- oncontextmenu="alert('right click not allowed !! '); return false;"  -->

<body onload="themechange(' Red')">
    <!-- wpf loader Two -->

    <!-- / wpf loader Two -->
    <!-- SCROLL TOP BUTTON -->
    <a class="scrollToTop" href="#"><i class="fa fa-chevron-up"></i></a>
    <!-- END SCROLL TOP BUTTON -->


    <!-- Start header section -->
    <header id="aa-header">
        <!-- start header top  -->
        <div class="aa-header-top">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="aa-header-top-area">
                            <!-- start header top left -->
                            <div class="aa-header-top-left">
                                <!-- start language -->

                                <!-- / language -->

                                <!-- start currency -->

                                <!-- / currency -->
                                <!-- start cellphone -->
                                <div class="cellphone hidden-xs">
                                    <p><span class="fa fa-phone"></span>+91 8460730564</p>
                                </div>
                                <div class="cellphone hidden-xs">
                                    <p>Select Theme :
                                        <select onchange='themechange(this.value)'>
                                            <option>Select Theme</optio n>
                                            <option>Green</option>
                                            <option>Red</option>
                                            <option>Orange</option>

                                        </select>
                                    </p>
                                </div>
                                <div class="cellphone hidden-xs">
                                    &nbsp;&nbsp;Select Language :&nbsp;&nbsp;
                                    <div style='float:right' id="google_translate_element"></div>
                                    <!---   Google translate id  ---->
                                </div>
                                <!-- / cellphone -->
                            </div>
                            <!-- / header top left -->
                            <div class="aa-header-top-right">
                                <ul class="aa-head-top-nav-right">
                                    <li><a href="/contactform">Contact Us</a></li>
                                    @if(!Session::has('useremail') )
                                    <li><a href="/account">Register/Login</a></li>

                                    @endif

                                    @if(Session::has('useremail') )

                                    <li class="hidden-xs"><a href="{{url('wishlist')}}">Wishlist</a></li>
                                    <li class="hidden-xs"><a>Hello {{Session::get('useremail')}}</a></li>
                                    <li class="hidden-xs"><a href="logedout">Logout</a></li>
                                    @endif

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / header top  -->

        <!-- start header bottom  -->
        <div class="aa-header-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="aa-header-bottom-area">
                            <!-- logo  -->
                            <div class="aa-logo">
                                <!-- Text based logo -->
                                <a href="/">
                                    <span class="fa fa-shopping-cart"></span>
                                    <p>Village<strong>Vyapar</strong> <span>Buy,Sell Any Village Product</span></p>
                                </a>
                                <!-- img based logo -->
                                <!-- <a href="index.html"><img src="img/logo.jpg" alt="logo img"></a> -->
                            </div>
                            <!-- / logo  -->
                            <!-- cart box -->

                            <div class="aa-cartbox">
                                @if(Session::has('useremail') )

                                <a class="aa-cart-link" href="{{ url('customer_dashboard')}}">
                                    <span class="fa fa-user"></span>
                                    <span class="aa-cart-title">Customer <br>Dashboard</span>
                                </a>
                                @endif

                                <!-- <div class="aa-cartbox-summary">
                  <ul>
                    <li>
                      <a class="aa-cartbox-img" href="#"><img src="img/woman-small-2.jpg" alt="img"></a>
                      <div class="aa-cartbox-info">
                        <h4><a href="#">Product Name</a></h4>
                        <p>1 x $250</p>
                      </div>
                      <a class="aa-remove-product" href="#"><span class="fa fa-times"></span></a>
                    </li>
                    <li>
                      <a class="aa-cartbox-img" href="#"><img src="img/woman-small-1.jpg" alt="img"></a>
                      <div class="aa-cartbox-info">
                        <h4><a href="#">Product Name</a></h4>
                        <p>1 x $250</p>
                      </div>
                      <a class="aa-remove-product" href="#"><span class="fa fa-times"></span></a>
                    </li>                    
                    <li>
                      <span class="aa-cartbox-total-title">
                        Total
                      </span>
                      <span class="aa-cartbox-total-price">
                        $500
                      </span>
                    </li>
                  </ul>
                  <a class="aa-cartbox-checkout aa-primary-btn" href="checkout.html">Checkout</a>
                </div>  -->
                            </div>
                            <!-- / cart box -->
                            <!-- search box -->
                            <div class="aa-search-box">

                                <form action="{{url('product')}}" method='post'>
                                    {{ @csrf_field() }}
                                    <input type="text" name="search" required id=""
                                        placeholder="Search here all village products .."
                                        value="<?php if(isset($search)) {echo $search;}?>" />
                                    <button type="submit"><span class="fa fa-search"></span></button>
                                </form>
                            </div>

                            <!-- / search box -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- / header bottom  -->
    </header>
    <!-- / header section -->
    <!-- menu -->
    <section id="menu">
        <div class="container">
            <div class="menu-area">
                <!-- Navbar -->
                <div class="navbar navbar-default" role="navigation">
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse"
                            data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="navbar-collapse collapse">
                        <!-- Left nav -->
                        <ul class="nav navbar-nav">
                            <li><a href="/">Home</a></li>
                            @foreach ($categories as $c)
                            <li><a style='cursor:pointer'>{{$c['cat_name']}}<span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    @foreach ($subcategories as $sc)
                                    @if($c['cat_id'] == $sc['cat_id'])
                                    <li><a href="{{ url('product',$sc['subcat_id'])}}">{{$sc['subcat_name']}}</a></li>
                                    @endif
                                    @endforeach
                                </ul>
                            </li>
                            @endforeach
                        </ul>

                    </div>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>
    </section>
    <style>
    .whatsapp {
        position: fixed;
        bottom: 10px;
        right: 18px;
    }
    </style>
    <div class="whatsapp">
        <a href='https://wa.me/9662892726' target='_blank'><img src='/whatsapp.jpg' style='height:50px;width:50px'></a>
    </div>
    <!-- Login Modal -->
    <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4>Login or Register</h4>
                    <form class="aa-login-form" action="">
                        <label for="">Username or Email address<span>*</span></label>
                        <input type="text" placeholder="Username or email">
                        <label for="">Password<span>*</span></label>
                        <input type="password" placeholder="Password">
                        <button class="aa-browse-btn" type="submit">Login</button>
                        <label for="rememberme" class="rememberme"><input type="checkbox" id="rememberme"> Remember me
                        </label>
                        <p class="aa-lost-password"><a href="#">Lost your password?</a></p>
                        <div class="aa-register-now">
                            Don't have an account?<a href="account.html">Register now!</a>
                        </div>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>

    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/js/bootstrap.js"></script>
    <!-- SmartMenus jQuery plugin -->
    <script type="text/javascript" src="/js/jquery.smartmenus.js"></script>
    <!-- SmartMenus jQuery Bootstrap Addon -->
    <script type="text/javascript" src="/js/jquery.smartmenus.bootstrap.js"></script>
    <!-- To Slider JS -->
    <script src="/js/sequence.js"></script>
    <script src="/js/sequence-theme.modern-slide-in.js"></script>
    <!-- Product view slider -->
    <script type="text/javascript" src="/js/jquery.simpleGallery.js"></script>
    <script type="text/javascript" src="/js/jquery.simpleLens.js"></script>
    <!-- slick slider -->
    <script type="text/javascript" src="/js/slick.js"></script>
    <!-- Price picker slider -->
    <script type="text/javascript" src="/js/nouislider.js"></script>
    <!-- Custom js -->
    <script src="/js/custom.js"></script>

</body>

</html>