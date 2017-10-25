<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <!--IE Compatibility modes-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!--Mobile first-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Dashboard</title>
    
    <meta name="description" content="Free Admin Template Based On Twitter Bootstrap 3.x">
    <meta name="author" content="">
    
    <meta name="msapplication-TileColor" content="#5bc0de" />
    <meta name="msapplication-TileImage" content="assets/img/metis-tile.png" />
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="assets/lib/bootstrap/css/bootstrap.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="assets/lib/font-awesome/css/font-awesome.css">
    
    <!-- Metis core stylesheet -->
    <link rel="stylesheet" href="assets/css/main.css">
    
    <!-- metisMenu stylesheet -->
    <link rel="stylesheet" href="assets/lib/metismenu/metisMenu.css">
    
    <!-- onoffcanvas stylesheet -->
    <link rel="stylesheet" href="assets/lib/onoffcanvas/onoffcanvas.css">
    
    <!-- animate.css stylesheet -->
    <link rel="stylesheet" href="assets/lib/animate.css/animate.css">


        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.5/fullcalendar.min.css">

<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
<!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

    <!--For Development Only. Not required -->
    <script>
        less = {
            env: "development",
            relativeUrls: false,
            rootpath: "/assets/"
        };
    </script>
    <link rel="stylesheet" href="assets/css/style-switcher.css">
    <link rel="stylesheet/less" type="text/css" href="assets/less/theme.less">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/less.js/2.7.1/less.js"></script>

  </head>

        <body class="  ">
            <div class="bg-dark dk" id="wrap">
                <div id="top">
                    <!-- .navbar -->
                    <nav class="navbar navbar-inverse navbar-static-top">
                        <div class="container-fluid">
                            <!-- Brand and toggle get grouped for better mobile display -->
                            <header class="navbar-header">
                                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <a class="navbar-brand" href="index.html">emdi<span class="themecolor">rect</span>ory</a>
                            </header>
                    
                            <div class="topnav">
                                <div class="btn-group">
                                    <a href="login.html" data-toggle="tooltip" data-original-title="Logout" data-placement="bottom"
                                       class="btn btn-metis-1 btn-sm">
                                        <i class="fa fa-power-off"></i>
                                        <span class="label">Logout</span>
                                    </a>
                                </div>
                    
                            </div>
                    
                    </nav>
                    <!-- /.navbar -->
                        <header class="head">
                                <div class="search-bar">
                                    <!-- <form class="main-search" action=""> -->
                                        <!-- <div class="input-group"> -->
                                            <!-- <input type="text" class="form-control" placeholder="Live Search ..."> --><h5>Company Name</h5>
                                            <span class="input-group-btn">
                                                <!-- <button class="btn btn-primary btn-sm text-muted" type="button">
                                                    <i class="fa fa-search"></i>
                                                </button> -->
                                            </span>
                                        <!-- </div> -->
                                    <!-- </form>                               -->
                                 </div>
                            <div class="main-bar">
                                <h3><i class="fa fa-dashboard"></i>&nbsp; Dashboard</h3>
                            </div>
                            <!-- /.main-bar -->
                        </header>
                        <!-- /.head -->
                </div>
                <!-- /#top -->
                    <div id="left">
                        <div class="media user-media bg-dark dker">
                            <div class="user-media-toggleHover">
                                <span class="fa fa-user"></span>
                            </div>
                            <div class="user-wrapper bg-dark">
                                <a class="user-link" href="">
                                    <img class="media-object img-thumbnail user-img" alt="User Picture" src="assets/img/user.gif">
                                    <span class="label label-danger user-label">Logo</span>
                                </a>
                        
                                <div class="media-body">
                                    <h5 class="media-heading">Archie</h5>
                                    <ul class="list-unstyled user-info">
                                        <li><a href="">Administrator</a></li>
                                        <li>Last Access : <br>
                                            <small><i class="fa fa-calendar"></i>&nbsp;16 Mar 16:32</small>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- #menu -->
                        <ul id="menu" class="bg-blue dker">
                                  <li class="nav-header">Menu</li>
                                  <li class="nav-divider"></li>
                                  <li class="">
                                    <a href="javascript:;">
                                      <i class="fa fa-building "></i>
                                      <span class="link-title">CREATE NEW</span>
                                      <span class="fa arrow"></span>
                                    </a>
                                    <ul class="collapse">
                                      <li>
                                        <a href="company.php">
                                          <i class="fa fa-angle-right"></i>&nbsp; Company </a>
                                      </li>
                                      <li>
                                        <a href="department.php">
                                          <i class="fa fa-angle-right"></i>&nbsp; Department </a>
                                      </li>
                                      <li>
                                        <a href="employee.php">
                                          <i class="fa fa-angle-right"></i>&nbsp; Employee </a>
                                      </li>
                                      <li>
                                        <a href="job.php">
                                          <i class="fa fa-angle-right"></i>&nbsp; Jobs </a>
                                      </li>
                                    </ul>
                                  </li>
                                  <li class="">
                                    <a href="javascript:;">
                                      <i class="fa fa-tasks"></i>
                                      <span class="link-title">Profile</span>
                                      <span class="fa arrow"></span>
                                    </a>
                                  </li>
                                  <li class="">
                                    <a href="javascript:;">
                                      <i class="fa fa-pencil"></i>
                                      <span class="link-title">Edit</span>
                                      <span class="fa arrow"></span>
                                    </a>
                                    <ul class="collapse">
                                      <li>
                                        <a href="company.php">
                                          <i class="fa fa-angle-right"></i>&nbsp; Company </a>
                                      </li>
                                      <li>
                                        <a href="department.php">
                                          <i class="fa fa-angle-right"></i>&nbsp; Departments </a>

                                      </li>
                                      <li>
                                        <a href="form-wizard.html">
                                          <i class="fa fa-angle-right"></i>&nbsp; Employees </a>
                                      </li>
                                    </ul>
                                  </li>
                                  <li>
                                    <a href="contactinfo.php">
                                      <i class="fa fa-table"></i>
                                      <span class="link-title">Contact Info</span>
                                    </a>
                                  </li>
                                  <li>
                                    <a href="calendar.html">
                                      <i class="fa fa-calendar"></i>
                                      <span class="link-title">
                                    Calendar
                                  </span>
                                    </a>
                                  </li>
                                  
      
                                  <li class="nav-divider"></li>
                                  <li>
                                    <a href="login.html">
                                      <i class="fa fa-sign-in"></i>
                                      <span class="link-title">Activity Log</span>
                                    </a>
                                  </li>
                                  <li>
                                         
                        <!-- /#menu -->
                    </div>
                    <!-- /#left -->
                <div id="content">
                    <div class="outer">
                        <div class="inner bg-light lter">
                            <div class="text-center">
                                <div class="button" style="margin: 20px auto;">
                                   <a href="viewdepartments.php" class="btn btn-primary btn-lg">Departments</a>
                                    <button class="btn btn-success btn-lg">Employees</button>
                                    <button class="btn btn-warning btn-lg">Jobs</button>
                                    <button class="btn btn-danger btn-lg">Meeting</button>   		
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-8">
                            	<div class="box">
                            	    <header>
                            		<h5>Line Chart</h5>
                            	    </header>
                            	    <div class="body" id="trigo" style="height: 250px;"></div>
                            	</div>
                                </div>
                                <div class="col-lg-4">
                            	<div class="box">
                            	    <div class="body">
                            		<table class="table table-condensed table-hovered sortableTable">
                            		    <thead>
                            			<tr>
                            			    <th>Country <i class="fa sort"></i></th>
                            			    <th>Visit <i class="fa sort"></i></th>
                            			    <th>Time <i class="fa sort"></i></th>
                            			</tr>
                            		    </thead>
                            		    <tbody>
                            			<tr class="active">
                            			    <td>Andorra</td>
                            			    <td>1126</td>
                            			    <td>00:00:15</td>
                            			</tr>
                            			<tr>
                            			    <td>Belarus</td>
                            			    <td>350</td>
                            			    <td>00:01:20</td>
                            			</tr>
                            			<tr class="danger">
                            			    <td>Paraguay</td>
                            			    <td>43</td>
                            			    <td>00:00:30</td>
                            			</tr>
                            			<tr class="warning">
                            			    <td>Malta</td>
                            			    <td>547</td>
                            			    <td>00:10:20</td>
                            			</tr>
                            			<tr>
                            			    <td>Australia</td>
                            			    <td>560</td>
                            			    <td>00:00:10</td>
                            			</tr>
                            			<tr>
                            			    <td>Kenya</td>
                            			    <td>97</td>
                            			    <td>00:20:00</td>
                            			</tr>
                            			<tr class="success">
                            			    <td>Italy</td>
                            			    <td>2450</td>
                            			    <td>00:10:00</td>
                            			</tr>
                            		    </tbody>
                            		</table>
                            	    </div>
                            	</div>
                                </div>
                            </div>
                            <hr>
                        </div>
                        <!-- /.inner -->
                    </div>
                    <!-- /.outer -->
                </div>
                
                       
                        
            </div>
            <!-- /#wrap -->
            <footer class="Footer bg-dark dker">
                <p> &copy; 2017 ALL RIGHT RESERVED. EMDIRECTORY 2017</p>
            </footer>
            <!-- /#footer -->
            <!-- #helpModal -->
            <div id="helpModal" class="modal fade">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h4 class="modal-title">Modal title</h4>
                        </div>
                        <div class="modal-body">
                            <p>
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                                et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                                aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in
                                culpa qui officia deserunt mollit anim id est laborum.
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->
            <!-- /#helpModal -->
            <!--jQuery -->
            <script src="assets/lib/jquery/jquery.js"></script>

                    <script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
                    <script src="//cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
                    <script src="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.5/fullcalendar.min.js"></script>
                    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.tablesorter/2.18.4/js/jquery.tablesorter.min.js"></script>
                    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-sparklines/2.1.2/jquery.sparkline.min.js"></script>
                    <script src="//cdnjs.cloudflare.com/ajax/libs/flot/0.8.3/jquery.flot.min.js"></script>
                    <script src="//cdnjs.cloudflare.com/ajax/libs/flot/0.8.3/jquery.flot.selection.min.js"></script>
                    <script src="//cdnjs.cloudflare.com/ajax/libs/flot/0.8.3/jquery.flot.resize.min.js"></script>

            <!--Bootstrap -->
            <script src="assets/lib/bootstrap/js/bootstrap.js"></script>
            <!-- MetisMenu -->
            <script src="assets/lib/metismenu/metisMenu.js"></script>
            <!-- onoffcanvas -->
            <script src="assets/lib/onoffcanvas/onoffcanvas.js"></script>
            <!-- Screenfull -->
            <script src="assets/lib/screenfull/screenfull.js"></script>


            <!-- Metis core scripts -->
            <script src="assets/js/core.js"></script>
            <!-- Metis demo scripts -->
            <script src="assets/js/app.js"></script>

                <script>
                    $(function() {
                      Metis.dashboard();
                    });
                </script>

            <script src="assets/js/style-switcher.js"></script>
        </body>

</html>
