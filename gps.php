<?php
require_once "objects/autoload.php";
$dao = new operatorDAO();
$job = $dao->retrieveAllAttendance();

date_default_timezone_set( 'Asia/Singapore');
$today = date("Y-m-d");

$count = 0;
foreach ($job as $i){
    if ($i->getDateAdded() == $today){
        $count ++;
    }
}

$dao1 = new rfidDAO();
$rfidAll = count($dao1->retrieve());

$count1 = 0;
$dao2 = new excavatorDAO();
$issues = $dao2->retrieveAll();
foreach ($issues as $j){
    if ($j->getDateAdded() == $today){
        $count1 ++;
    }
}



?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

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
    <title>Dashboard</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/ample-admin-lite/" />
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="plugins/images/favicon.png">
    <!-- Custom CSS -->
   <link href="css/style.min.css" rel="stylesheet">
   <link href="plugins/bower_components/chartist/dist/chartist.min.css" rel="stylesheet">
    <link rel="stylesheet" href="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.css">
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCFKuE8yKyNAW4MCIsG0ha6N346WM0dJ7A"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    
    
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
                    <ul class="navbar-nav ms-auto d-flex align-items-center">
                        <li>
                            <a class="profile-pic" href="#">
                                <img src="plugins/images/users/varun.jpg" alt="user-img" width="36"
                                    class="img-circle"><span class="text-white font-medium">Management 1</span></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <aside class="left-sidebar" data-sidebarbg="skin6">
            <div class="scroll-sidebar">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="sidebar-item pt-2">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="dashboard.php"
                                aria-expanded="false">
                                <i class="far fa-clock" aria-hidden="true"></i>
                                <span class="hide-menu">Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="viewAttendance.php"
                                aria-expanded="false">
                                <i class="fa fa-table" aria-hidden="true"></i>
                                <span class="hide-menu">Attendance Table</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="map-google.html"
                                aria-expanded="false">
                                <i class="fa fa-globe" aria-hidden="true"></i>
                                <span class="hide-menu">Tracker GPS</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="viewRFID.php"
                                aria-expanded="false">
                                <i class="fa fa-columns" aria-hidden="true"></i>
                                <span class="hide-menu">Add RFID Number</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="issuesReported.php"
                                aria-expanded="false">
                                <i class="fa fa-cogs" aria-hidden="true"></i>
                                <span class="hide-menu">Excavator Reports</span>
                            </a>
                        </li>

                    </ul>

                </nav>
            </div>
        </aside>

        <div class="page-wrapper">
            <div class="container-fluid">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="white-box">
                            <h3 class="box-title"> Excavator's Location</h3>
                            <div id="map" class="gmaps" style="position: relative; overflow: hidden;">
                                
                                <script>
                            
                                  var map;
                                    var x;
                                    function loadmaps(){
                                        $.getJSON("https://api.thingspeak.com/channels/1691373/fields/2/last.json?api_key=8P1WU7PY4Q44PQ8B", function(result){
                                        var m = result;
                                        x=Number(m.field1);
                                    });
                                        $.getJSON("https://api.thingspeak.com/channels/1691373/fields/3/last.json?api_key=8P1WU7PY4Q44PQ8B", function(result){
                                        var m = result;
                                        y=Number(m.field2);   
                                    }).done(function() {
                                        
                                            initialize();
                                });
                                        
                                    }
                                    
                                    window.setInterval(function(){
                                    loadmaps();
                                        }, 9000);
                                  function initialize() {
                                    var mapOptions = {
                                      zoom: 18,
                                      center: {lat: x, lng: y}
                                    };
                                    map = new google.maps.Map(document.getElementById('map'),
                                        mapOptions);
                            
                                    var marker = new google.maps.Marker({
                                      position: {lat: x, lng: y},
                                      map: map
                                    });
                            
                                    var infowindow = new google.maps.InfoWindow({
                                      content: '<p>Marker Location:' + marker.getPosition() + '</p>'
                                    });
                            
                                    google.maps.event.addListener(marker, 'click', function() {
                                      infowindow.open(map, marker);
                                    });
                                  }
                            
                                  google.maps.event.addDomListener(window, 'load', initialize);
                                </script>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 col-lg-12 col-sm-12">
                        <div class="white-box">
                            <div class="container">
                                <h3 class="box-title mb-0"> Excavators' Location and Idle Period </h3>
                                <br>
                              
                                <div class="d-md-flex">
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" id="searchRFID" size="30" placeholder="Search Location here" onkeyup="search()">
                                    </div>
                                    <div class="col-sm-2"></div>
                                    <div class="col-sm-4">
                                        <label for="date">Filter Date:</label>
                                        <input type="date" id="filterDate" name="filterDate">
                                        <input type="submit" onclick="filterDate()" value="Search">
                                    </div>
                                </div>  
                            </div>
                            <hr>
                            <div class="table-responsive">
                                <table class="table no-wrap">
                                    <thead>
                                        <tr>
                                            <th class="border-top-0">#</th>
                                            <th class="border-top-0">Excavator No</th>
                                            <th class="border-top-0">Location</th>
                                            <th class="border-top-0">Idle Period</th>
                                             
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <td >1</td>
                                            <td >CAT307E 928</td>
                                            <td>SMU School of Economics</td>
                                            <td>2 days</td>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                             
                             
                 
    
    <script src="bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="plugins/bower_components/gmaps/gmaps.min.js"></script>
    <script src="js/custom.js"></script>
    <script src="js/app-style-switcher.js"></script>
    <script src="plugins/bower_components/jquery-sparkline/jquery.sparkline.min.js"></script>
    <script src="js/waves.js"></script>
    <script src="js/sidebarmenu.js"></script>
    <script src="plugins/bower_components/chartist/dist/chartist.min.js"></script>
    <script src="plugins/bower_components/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="js/pages/dashboards/dashboard1.js"></script>
    <div id="map"></div>

    <script>
        function filterDate() {
            input = document.getElementById("filterDate");
            ul = document.getElementById("myUL");
            tr = document.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                Array.prototype.forEach.call(elements, function(element) {
                todayDate = element.innerHTML;
                if (input.value == todayDate) {
                    tr[i].style.display = "";
                } 
                else {

                    tr[i].style.display = "none";
                }
                })
            };
        }

        function search() {
            input = document.getElementById("searchRFID");
            filter = input.value.toUpperCase();
            ul = document.getElementById("myUL");
            li = document.getElementsByTagName("tr");
            for (i = 1; i < li.length; i++) {
                employeeName = li[i].getAttribute("value");
                if (employeeName.toUpperCase().indexOf(filter) > -1) {
                    li[i].style.display = "";
                } else {
                    li[i].style.display = "none";
                }
            }
        }

    </script>
</body>

</html>
