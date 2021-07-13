<?php
session_start();
if(!Session::has('useremail'))
{
  echo "<script>location.href='/'</script>";
}
?>

@include('customer/customer_slidebar');
<!--This is for chart -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
</script>

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Dashboard</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-shopping-cart fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">{{count($procus)}}</div>
                                <div>Total Products!</div>
                            </div>
                        </div>
                    </div>
                    <a href="{{url('customer_product')}}">
                        <div class="panel-footer">
                            <span class="pull-left">View Products</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-green">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-tasks fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">{{count($inquiry)}}</div>
                                <div>Inquiry!</div>
                            </div>
                        </div>
                    </div>
                    <a href="customer_inquiry">
                        <div class="panel-footer">
                            <span class="pull-left">View Inquiry</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-yellow">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-shopping-cart fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">124</div>
                                <div>New Orders!</div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="panel panel-red">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-xs-3">
                                <i class="fa fa-support fa-5x"></i>
                            </div>
                            <div class="col-xs-9 text-right">
                                <div class="huge">13</div>
                                <div>Support Tickets!</div>
                            </div>
                        </div>
                    </div>
                    <a href="#">
                        <div class="panel-footer">
                            <span class="pull-left">View Details</span>
                            <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                            <div class="clearfix"></div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <div class="col-lg-8">
            <div class="panel panel-default">

                <!-- /.panel-heading -->

                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->

            <!-- /.panel -->

            <!-- /.panel -->
        </div>
        <!-- /.col-lg-8 -->


        <!-- /.panel -->


        <canvas id="bar"
            style="border:1px solid grey;padding:25px;float:left;height:500px;width:100%;max-width:800px;"></canvas>
        <canvas id="pie"
            style="border:1px solid grey;padding:25px;float:left;height:300px;width:50%;max-width:800px;"></canvas>
        <!-- /.panel-body -->

        <!-- /.panel -->

        <!-- /.panel .chat-panel -->

        <!-- /.col-lg-4 -->
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<script>
<?php
$xarray=array();
$yarray=array();
foreach ($procus as $pc)
{
    array_push($xarray,$pc['p_name']);
    array_push($yarray,$pc['p_price']);
}

$jsx_array = json_encode($xarray);
$jsy_array = json_encode($yarray);

echo "var xValues = ". $jsx_array . ";\n";
echo "var yValues = ". $jsy_array . ";\n";

?>

// var xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
//var yValues = [55, 49, 44, 24, 15];
var barColors = ["red", "green", "blue", "orange", "brown", "red", "green", "blue", "orange", "brown", 'red', 'orange',
    'red'
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
<?php
$x=array();
$y=array();
foreach ($proview as $p)
{
    array_push($x,$p['p_name']);
    array_push($y,$p['total_view']);
}

$jsx = json_encode($x);
$jsy = json_encode($y);

echo "var x = ". $jsx . ";\n";
echo "var y = ". $jsy . ";\n";
?>


//var xValues = ["Italy", "France", "Spain", "USA", "Argentina"];
//var yValues = [55, 49, 44, 24, 15];
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
        labels: x,
        datasets: [{
            backgroundColor: barColors,
            data: y
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

<!-- jQuery -->
<script src="Customer/js/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="Customer/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="Customer/js/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="Customer/js/raphael.min.js"></script>
<script src="Customer/js/morris.min.js"></script>
<script src="Customer/js/morris-data.js"></script>

<!-- Custom Theme JavaScript -->
<script src="Customer/js/startmin.js"></script>

</body>

</html>