<!DOCTYPE html>
<html>
    
<!-- Mirrored from lambdathemes.in/admin2/table-data.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Aug 2015 02:27:12 GMT -->
<head>
        
        <!-- Title -->
        <title>Modern | Datatables</title>
        
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta charset="UTF-8">
        <meta name="description" content="Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles -->
        <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>
        <link href="assets/plugins/pace-master/themes/blue/pace-theme-flash.css" rel="stylesheet"/>
        <link href="assets/plugins/uniform/css/uniform.default.min.css" rel="stylesheet"/>
        <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/fontawesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/line-icons/simple-line-icons.css" rel="stylesheet" type="text/css"/>	
        <link href="assets/plugins/waves/waves.min.css" rel="stylesheet" type="text/css"/>	
        <link href="assets/plugins/switchery/switchery.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/3d-bold-navigation/css/style.css" rel="stylesheet" type="text/css"/>	
        <link href="assets/plugins/slidepushmenus/css/component.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/datatables/css/jquery.datatables.min.css" rel="stylesheet" type="text/css"/>	
        <link href="assets/plugins/datatables/css/jquery.datatables_themeroller.css" rel="stylesheet" type="text/css"/>	
        <link href="assets/plugins/x-editable/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet" type="text/css">
        <link href="assets/plugins/bootstrap-datepicker/css/datepicker3.css" rel="stylesheet" type="text/css"/>
        
        <!-- Theme Styles -->
        <link href="assets/css/modern.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
        
        <script src="assets/plugins/3d-bold-navigation/js/modernizr.js"></script>
        
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
    </head>
    <body class="page-header-fixed compact-menu page-horizontal-bar">

            <div class="page-inner">
                <div class="page-breadcrumb">
                    <ol class="breadcrumb container">
                        <li><a href="index.html">Home</a></li>
                        <li><a href="#">Tables</a></li>
                        <li class="active">Datatables</li>
                    </ol>
                </div>
                <div class="page-title">
                    <div class="container">
                        <h3>Datatables</h3>
                    </div>
                </div>
                <div id="main-wrapper" class="container">
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Agregar Producto</h4>
                                </div>
                                <div class="panel-body">
            <button type="button" class="btn btn-success m-b-sm" data-toggle="modal" data-target="#myModal">Agregar Producto</button>
                                    <!-- Modal -->
                            <form id="add-row-form" action="javascript:void(0);">
                                    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                                                </div>
                                                <div class="modal-body">
                                                        <div class="form-group">

      <input id="fileupload" type="file" name="files[]"  style="width: 0.1px; height: 0.1px;position: absolute;" />

                                                    <br>
                                                    <br>
                                                    <!-- The global progress bar -->
                                                    <div id="progress" class="progress">
                                                        <div class="progress-bar progress-bar-success"></div>
                                                    </div>
                                                    <!-- The container for the uploaded files -->
                                                    <div id="files" class="files"></div>

                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" id="position-input" class="form-control" placeholder="Position" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="number" id="age-input" class="form-control" placeholder="Age" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" id="date-input" class="form-control date-picker" placeholder="Start Date" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="number" id="salary-input" class="form-control" placeholder="Salary" required>
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                    <button type="submit" id="add-row" class="btn btn-success">Add</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                             </form>
                                    <div class="table-responsive">
                                        <table id="example3" class="display table" style="width: 100%; cellspacing: 0;">
                                            <thead>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Position</th>
                                                    <th>Age</th>
                                                    <th>Start date</th>
                                                    <th>Salary</th>
                                                </tr>
                                            </thead>
                                            <tfoot>
                                                <tr>
                                                    <th>Name</th>
                                                    <th>Position</th>
                                                    <th>Age</th>
                                                    <th>Start date</th>
                                                    <th>Salary</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div><!-- Row -->
                </div><!-- Main Wrapper -->
            </div><!-- Page Inner -->
        </main><!-- Page Content -->
        <nav class="cd-nav-container" id="cd-nav">
            <header>
                <h3>Navigation</h3>
                <a href="#0" class="cd-close-nav">Close</a>
            </header>
            <ul class="cd-nav list-unstyled">
                <li class="cd-selected" data-menu="index">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-home"></i>
                        </span>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li data-menu="profile">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-user"></i>
                        </span>
                        <p>Profile</p>
                    </a>
                </li>
                <li data-menu="inbox">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-envelope"></i>
                        </span>
                        <p>Mailbox</p>
                    </a>
                </li>
                <li data-menu="#">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-tasks"></i>
                        </span>
                        <p>Tasks</p>
                    </a>
                </li>
                <li data-menu="#">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-cog"></i>
                        </span>
                        <p>Settings</p>
                    </a>
                </li>
                <li data-menu="calendar">
                    <a href="javsacript:void(0);">
                        <span>
                            <i class="glyphicon glyphicon-calendar"></i>
                        </span>
                        <p>Calendar</p>
                    </a>
                </li>
            </ul>
        </nav>
        <div class="cd-overlay"></div>
	

        <!-- Javascripts -->
        <script src="assets/plugins/jquery/jquery-2.1.4.min.js"></script>
        <script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>

        <script src="assets/plugins/pace-master/pace.min.js"></script>
        <script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="assets/plugins/switchery/switchery.min.js"></script>
        <script src="assets/plugins/uniform/jquery.uniform.min.js"></script>
        <script src="assets/plugins/classie/classie.js"></script>
        <script src="assets/plugins/waves/waves.min.js"></script>
        <script src="assets/plugins/3d-bold-navigation/js/main.js"></script>
        <script src="assets/plugins/jquery-mockjax-master/jquery.mockjax.js"></script>
        <script src="assets/plugins/moment/moment.js"></script>
        <script src="assets/plugins/datatables/js/jquery.datatables.min.js"></script>
        <script src="assets/plugins/x-editable/bootstrap3-editable/js/bootstrap-editable.js"></script>
        <script src="assets/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script src="assets/js/modern.min.js"></script>
        <script src="assets/js/pages/table-data.js"></script>
        <script src="assets/js/jquery.fileupload.js"></script>
        <script src="assets/js/productos.js"></script>
       

        
    </body>

<!-- Mirrored from lambdathemes.in/admin2/table-data.html by HTTrack Website Copier/3.x [XR&CO'2014], Thu, 06 Aug 2015 02:27:35 GMT -->
</html>