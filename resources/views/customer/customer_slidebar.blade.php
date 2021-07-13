<?php
$email=Session::get('useremail');


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Village Vyapar | Customer Panel</title>

    <!-- Bootstrap Core CSS -->
    <link href="/Customer/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="/Customer/css/metisMenu.min.css" rel="stylesheet">

    <!-- Timeline CSS -->
    <link href="/Customer/css/timeline.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="/Customer/css/startmin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="/Customer/css/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="/Customer/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <div class="navbar-header">
                <a class="navbar-brand" href="customer_dashboard" style='color:white'>Village Vyapar</a>
            </div>

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <ul class="nav navbar-nav navbar-left navbar-top-links">
                <li><a href="/"><i class="fa fa-home fa-fw"></i> Website</a></li>
            </ul>


            <ul class="nav navbar-right navbar-top-links">
                <li class="dropdown navbar-inverse">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell fa-fw"></i> <b class="caret"></b>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> New Review
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> Message Sent
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>


                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        @foreach($cusname as $cn)
                        <i class="fa fa-user fa-fw"></i> Welcome , {{$cn['c_name']}} <b class="caret"></b>

                    </a>
                    <ul class="dropdown-menu dropdown-user">

                        <li>
                            <center>
                                <img src="customer_img/{{$cn['c_img']}}"
                                    style='height:60px;width:60px;border-radius:50%'>
                                <br><br>
                                <b style='text-align:center'>{{$cn['c_name']}}</b>
                        </li>
                        </center>
                        <li class="divider"></li>
                        <li><a href="profile"><i class="fa fa-user fa-fw"></i> User Profile</a>
                        </li>
                        <li><a href="change_password"><i class="fa fa-gear fa-fw"></i> Change Password</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="" data-toggle="modal" data-target="#logout"><i class="fa fa-sign-out fa-fw"></i>
                                Logout</a>
                        </li>
                    </ul>
                    @endforeach
                </li>
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <img src='/logo.png' style='height:70px;width:220px;border:1px solid black' />
                            <!-- <div class="input-group custom-search-form">
                                    <input type="text" class="form-control" placeholder="Search...">
                                    <span class="input-group-btn">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fa fa-search"></i>
                                        </button>
                                </span>
                                </div> -->
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="customer_dashboard" class="active"><i class="fa fa-dashboard fa-fw"></i>
                                Dashboard</a>
                        </li>
                        <li>
                            <a href="profile"><i class="fa fa-user fa-fw"></i> Profile</a>
                        </li>
                        <li>
                            <a href="customer_product"><i class="fa fa-user fa-fw"></i> Products</a>
                        </li>
                        <li>
                            <a href="chat"><i class="fa fa-user fa-fw"></i> Chat</a>
                        </li>



                        <li>
                            <a href="customer_inquiry"><i class="fa fa-user fa-fw"></i> Your Inquiry</a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>

        <!-- LogOut Model -->
        <div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Message</h5>


                    </div>
                    <div class="modal-body">
                        <h3>Are you sure want to logout !!! </h3>

                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <a href='logedout'><button type="button" class="btn btn-primary">Log Out</button></a>
                    </div>
                </div>
            </div>
        </div>