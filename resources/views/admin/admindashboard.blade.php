<?php
session_start();
if(!Session::has('adminemail'))
{
  echo "<script>location.href='/'</script>";
}
?>
@include('admin/header')
@include('admin/includes/sidebar_navbar')


<div class="container-fluid">
    <!-- Fonts -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        <a href="http://localhost/report1/Invoicesmry.php"
            class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>
    <!-- Earnings (Monthly) Card Example -->
    <div class="row">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">

                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Registered
                                Admin</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <h4>Total Admin: {{$count}} </h4>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-2x text-gray-300"></i>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">

                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Category </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800"></div>

                            <h4>Category : {{$cat_count}} </h4>
                            <h4>Sub-category:{{$subcat_count}}</h4>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">TOTAL NO OF PRODUCTS
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800" %>
                                        <h4> Product : {{$pcount}} </h4>


                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Total Customer</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800" %>

                                    <h4> Customer:{{$cust_count}}</h4>
                                </div>

                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-users fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">

            <div class="card shadow mb-4">

                <div class="card-body">
                    <p>Works with any button colors, just use the <code>.btn-icon-split</code> class and the markup in
                        the examples below. The examples below also use the <code>.text-white-50</code> helper class on
                        the icons for additional styling, but it is not required.</p>
                    <canvas id="bar"
                        style="border:1px solid grey;padding:25px;float:left;height:400px;width:100%;max-width:800px;"></canvas>
                    <canvas id="pie"
                        style="border:1px solid grey;padding:25px;float:right;height:400px;width:100%;max-width:800px;"></canvas>
                </div>

            </div>
        </div>
    </div>
    <!-- Page Heading -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
    </script>
    <script>
    // <?php
    // $xarray=array();
    // $yarray=array();
    // foreach ($product as $p)
    // {
    //   foreach ($customer as $c)
    //   {
    //     if($c->c_id == $p->c_id)
    //     {
    //       array_push($xarray,$c['c_name']);
    //      array_push($yarray,count($product));
    //     }
    //   } 
    // }
    // $jsx_array = json_encode($xarray);
    // $jsy_array = json_encode($yarray);

    // echo "var xValues = ". $jsx_array . ";\n";
    // echo "var yValues = ". $jsy_array . ";\n";

    // ?>

    var xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
    var yValues = [55, 49, 44, 24, 15];
    var barColors = ["red", "green", "blue", "orange", "brown", "red", "green", "blue", "orange", "brown", 'red',
        'orange', 'red'
    ];

    new Chart("bar", {
        type: "bar",
        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues
            }]
        },
        options: {
            legend: {
                display: false
            },
            title: {
                display: true,
                text: "Total Quantity of Your Village products"
            }
        }
    });

    var xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
    var yValues = [55, 49, 44, 24, 15];
    var barColors = [
        "#b91d47",
        "#00aba9",
        "#2b5797",
        "#e8c3b9",
        "#1e7145"
    ];

    new Chart("pie", {
        type: "pie",
        data: {
            labels: xValues,
            datasets: [{
                backgroundColor: barColors,
                data: yValues
            }]
        },
        options: {
            title: {
                display: true,
                text: "World Wide Wine Production 2018"
            }
        }
    });
    </script>