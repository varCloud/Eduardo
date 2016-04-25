<?php

session_start();
if(isset($_SESSION['usuario']))
{
    
?>
<!DOCTYPE html>
<html>
    
<head>
        
        <!-- Title -->
        <title>Images Slier </title>
        
        <meta content="width=device-width, initial-scale=1" name="viewport"/>
        <meta charset="UTF-8">
        <meta name="description" content="Admin Dashboard Template" />
        <meta name="keywords" content="admin,dashboard" />
        <meta name="author" content="Steelcoders" />
        
        <!-- Styles 
        <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,500,700' rel='stylesheet' type='text/css'>
        <link href="assets/plugins/pace-master/themes/blue/pace-theme-flash.css" rel="stylesheet"/>
        <link href="assets/plugins/uniform/css/uniform.default.min.css" rel="stylesheet"/>
        <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/plugins/bootstrap/css/bootstrap-select.css" rel="stylesheet" type="text/css"/>
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
          <link href="assets/plugins/toastr/toastr.min.css" rel="stylesheet" type="text/css"/>  
        
        <!-- Theme Styles 
        <link href="assets/css/modern.min.css" rel="stylesheet" type="text/css"/>
        <link href="assets/css/custom.css" rel="stylesheet" type="text/css"/>
        
        <script src="assets/plugins/3d-bold-navigation/js/modernizr.js"></script>
        <link href="assets/css/fileInput.css" rel="stylesheet" type="text/css"/>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        
    </head>
    <body class="page-header-fixed compact-menu page-horizontal-bar">
         <!--
            <div class="page-inner">
                <div class="page-breadcrumb">
                    <ol class="breadcrumb container">
                        <li><a href="index.php">Inicio</a></li>
                        <li><a href="#">Agregar Imagen Slider</a></li>
                    </ol>
                </div>
                <div class="page-title">
                    <div class="container">
                        <h3>Agregar Imagen Slider</h3>
                    </div>
                </div>-->
                <div id="main-wrapper" class="container">
                            <div class="panel panel-white">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Agregar Imagen Slider</h4>
                                </div>
                                <div class="panel-body">
            <button type="button" class="btn btn-success m-b-sm" data-toggle="modal" id="btnAddSlider">Agregar Imagen Slider</button>
                                    <!-- Modal -->
                            <form id="formImgSlider" >
                                    <div class="modal fade" id="modalAddSlider" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                    <h4 class="modal-title" id="myModalLabel">Agregar Imagen Slider</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="form-group">      
                                        
                                                        <div class="divInput">
                                                          <input id="directorio" value="/../../images/sliders/" type="hidden" name="directorio" />
                                                          <input id="fileuploadSlider" type="file" name="files[]" class="InputFile"  />
                                                          <i class="glyphicon glyphicon-upload"></i>
                                                          <span>Seleccione una Imagen</span>
                                                        </div>
                                                    </div>
                                                        <br>
                                                        <!-- The global progress ba/r -->
                                                        <div id="progress" class="progress">
                                                            <div class="progress-bar progress-bar-success"></div>
                                                        </div>

                                                        <div style="position: relative; text-align: center; width: 200px;height: 200px;margin: auto;" align="center">
                                                             <img id="VistaPrevia" name="VistaPrevia" class="form-control" style="text-align: center; width: 200px;height: 200px" />
                                                        <br>
                                                         <button  type="button" id="eliminarImagenSlide" class="btn btn-danger">Eliminar Imagen</button>
                                                        
                                                           <!--  <div id="files" class="files"></div> -->
                                                        </div>
                                                        <br><br><br><br>
                                                    
                                                       <div class="form-group">
                                                            <input type="text" id="titulo" name="titulo" class="form-control" placeholder="Titulo" required>
                                                        </div>
                                                           <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="Subtitulo" name="subTitulo" id="subTitulo" required>
                                                        </div>
                                                                                            
                                                           <div class="form-group">
                                                            <input type="text" class="form-control" placeholder="Descripcion" name="descSlider" id="descSlider" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <input type="text" id="descCirAzul" name="descCirAzul" class="form-control" placeholder="Descripcion Circulo Azul" required>
                                                        </div>


                                                        <div class="form-group">
                                                            <input type="text" id="descCirBlanco" name="descCirBlanco" class="form-control" placeholder="Descripcion Circulo Blanco" required>
                                                        </div>
                                                </div>
                                                <div class="modal-footer">
                                                <button id="resetSlider" name="resetSlider" type="reset" style="display: none; width: 0px;height: 0px;" value=""></button>
                                                    
                                                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                                    <button type="button" id="GuardarSlider" class="btn btn-success">Guardar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                             </form>
                                    <div class="table-responsive">
                                    <table id="tableSlider" class="display table" style="width: 100%; cellspacing: 0;">
                                            <thead>
                                                <tr>
                                                    <th>Titulo</th>
                                                    <th>SubTitulo</th>
                                                    <th>Circulo Azul</th>
                                                    <th>Circulo Blanco</th>
                                                    <th>Descripcion</th>
                                                    <th>Imagen</th>
                                                    <th>Accion</th>
                                                </tr>
                                            </thead>
                                            <tbody id="cuerpoSlider"></tbody>
                                            <tfoot>
                                                <tr>
                                                    <th>Titulo</th>
                                                    <th>SubTitulo</th>
                                                    <th>Circulo Azul</th>
                                                    <th>Circulo Blanco</th>
                                                    <th>Descripcion</th>
                                                    <th>Imagen</th>
                                                    <th>Accion</th>
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
	

        <!-- Javascripts 
        <script src="assets/plugins/jquery/jquery-2.1.4.min.js"></script>
        <script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script>

        <script src="assets/plugins/pace-master/pace.min.js"></script>
        <script src="assets/plugins/jquery-blockui/jquery.blockui.js"></script>
        <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/plugins/bootstrap/js/bootstrap_select.js"></script>
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
        <script src="assets/plugins/toastr/toastr.min.js"></script>
        <script src="assets/js/modern.min.js"></script>
        <script src="assets/js/pages/table-data.js"></script>-->

        <script src="assets/plugins/jquery/jquery-2.1.4.min.js"></script>
        <script src="assets/plugins/jquery-ui/jquery-ui.min.js"></script> 
        <script src="assets/js/jquery.fileupload.js"></script>
        <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script> 
        <script src="assets/plugins/bootstrap/js/bootstrap_select.js"></script> 
        <script src="assets/plugins/datatables/js/jquery.datatables.min.js"></script>
       
        <script src="assets/js/slider.js"></script>
  
       

        
    </body>
</html>

<?php
}else
    header("Location: login.html");
    
?>