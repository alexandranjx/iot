<?php
require_once "objects/autoload.php";
$dao = new operatorDAO();
$job = $dao->retrieveOperatorAttendance('Peter');
//  var_dump($rfid);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Ample lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Ample admin lite dashboard bootstrap 5 dashboard template">
    <meta name="description"
        content="Ample Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework">
    <meta name="robots" content="noindex,nofollow">
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/favicon.png">
    <!-- Custom CSS -->
   <link href="css/style.min.css" rel="stylesheet">
    <title>Operator Activities</title>
</head>


<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin4">
                <a href="operatorHomepage.php"
                        ><img src="plugins/images/users/logo.png" alt="TrackAvactor" width="100px" >
                    </a>
                    <ul class="navbar-nav ms-auto d-flex align-items-center">
                        <li>
                            <a class="profile-pic" href="#">
                                <img src="plugins/images/users/varun.jpg" alt="user-img" width="36"
                                    class="img-circle"><span class="text-white font-medium">Peter</span></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li class="sidebar-item pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="operatorHomepage.php"
                                aria-expanded="false">
                                <i class="far fa-clock" aria-hidden="true"></i>
                                <span class="hide-menu">Track Activities</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="operatorAttendance.php"
                                aria-expanded="false">
                                <i class="fa fa-table" aria-hidden="true"></i>
                                <span class="hide-menu">Attendance Checker</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="reportExcavator.php"
                                aria-expanded="false">
                                <i class="fa fa-cogs" aria-hidden="true"></i>
                                <span class="hide-menu">Report Excavator</span>
                            </a>
                        </li>

                    </ul>

                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>


        <div class="page-wrapper">
 
            <div class="page-breadcrumb bg-white">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
                        <!-- <h4 class="page-title">Staff Attendance Table</h4> -->
                    </div>

                </div>
         
            </div>

            <div class="container-fluid">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title">Attendance Check</h3>
                            <br> 
                                <div class="d-md-flex">
                                    
                                    <div class="col-sm-6">
                                        <input type="hidden" >
                                    </div>
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-4">
                                        <label for="date">Filter Date:</label>
                                        <input type="date" id="filterDate" name="filterDate">
                                        <input type="submit" onclick="filterDate()" value="Search">
                                    </div>
                                </div>
                            <hr>
                            
                            <div class="table-responsive">
                                <table class="table text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">Excavator No.</th>
                                            <th class="border-top-0">Clock In</th>
                                            <th class="border-top-0">Clock Out</th>
                                            <th class="border-top-0">Job Date</th> 
                                            
                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                            $i = 1;
                                            echo "<ul id='myUL' style='list-style-type: none; padding: 0;'>";
                                            foreach ($job as $job1){
                                                $employeeJob = $job1->getDateAdded();
                                                echo "<tr value='{$employeeJob}'>
                                                    <td> $i </td>
                                                    <td> {$job1->getExcavatorNo()}</td>
                                                    <td> {$job1->getStartTime()} </td>
                                                    <td> {$job1->getEndTime()}</td>
                                                    <td> {$job1->getDateAdded()}</td>
                                                    
                                                </tr>";
                                                $i++;
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/custom.js"></script>
    

    <script>
        function filterDate() {
                input = document.getElementById("filterDate");
                ul = document.getElementById("myUL");
                tr = document.getElementsByTagName("tr");
                for (i = 0; i < tr.length; i++) {
                    employeeJob = tr[i].getAttribute("value");
                    if (input.value == employeeJob) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
            };
            }


    </script>

    <script>
        var getRFID;
            var x;
            function loadRFID(){
                $.getJSON("https://api.thingspeak.com/channels/1691373/fields/1/last.json?api_key=8P1WU7PY4Q44PQ8B", function(result){
                var m = result;
                x=Number(m.field1); 
            }).done(function() {
                initialize();
            });
            }window.setInterval(function(){
                loadRFID();
                    }, 9000);
                    function initialize() {
                        xmlhttp.open("GET","processAddAttendance.php?rfidNo="+x,true);
                        xmlhttp.send();
                    }

            
    </script>

    
</body>

</html>