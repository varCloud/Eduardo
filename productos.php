
<!DOCTYPE html>
<html>
<?php
 echo"<input type='text'  id='producto' value ='".$_GET["prod"]."'>";
 echo"<input type='text'  id='subproducto' value ='".$_GET["subproducto"]."'>";
?>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>Productros</title>
<meta name="keywords" content="" />
<meta name="description" content="Host Linea HTML5 Template">
<meta name="author" content="">

<!-- Mobile view -->
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<!-- Favicon -->
<link rel="shortcut icon" href="images/favicon.html">
<link rel="stylesheet" type="text/css" href="js/bootstrap/css/bootstrap.min.css">

<!-- Google fonts - witch you want to use - (rest you can just remove) -->
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Roboto:100,200,300,400,500,600,700,800,900' rel='stylesheet' type='text/css'>

<!-- Template's stylesheets -->
<link rel="stylesheet" href="js/template-custom/css/template-custom.css">
<link rel="stylesheet" href="css/theme-default.css" type="text/css">
<link rel="stylesheet" href="css/theme.css" type="text/css">
<link rel="stylesheet" href="js/mainmenu/menu.css" type="text/css" />
<link rel="stylesheet" href="fonts/font-awesome/css/font-awesome.min.css" type="text/css">
<link rel="stylesheet" type="text/css" href="fonts/Simple-Line-Icons-Webfont/simple-line-icons.css" portfolio="screen" />
<link rel="stylesheet" href="fonts/et-line-font/et-line-font.css">
<link rel="stylesheet" type="text/css" href="js/cubeportfolio/cubeportfolio.min.css">
<link rel="stylesheet" href="css/theme-responsive.css">

<!-- Template's stylesheets END -->

<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<![endif]-->

<!-- Style Customizer's stylesheets -->
<link rel="stylesheet" type="text/css" href="js/style-customizer/css/spectrum.css">
<link rel="stylesheet" type="text/css" href="js/style-customizer/css/style-customizer.css">
<link rel="stylesheet/less" type="text/css" href="less/skin.html">

<!-- Style Customizer's stylesheets END -->

<!-- Skin stylesheet -->

<body class="loading">

<div class="preloader-wrap"></div>

<!-- Page template --> 

<!-- Preloader icon -->

    
    <!--end topbar-->
  
    <!-- menu-->
    <div class="menu">
      <?php include 'menu.php';?>
    </div>

    <div class="clearfix"></div>
    <div class="clearfix"></div>
    <!-- end section -->
    
    <section>
    <div class="pagenation-holder">
      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <h4 id="tituloProducto"></h4>
          </div>
          <div class="col-md-8 text-right">
            <div class="pagenation_links">
              <a href="index.php">Inicio</a><i> / </i>
              <a href="index.php" id="HeaderProd"></p>  </a> <i> / </i> <span id="HeaderSubP"></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <div class="clearfix"></div>
  <!--end section-->

      <div class="container">
        <div class="row">

          <div id="filters-container" class="cbp-l-filters-button two three text-right">
            <div data-filter="*" class="cbp-filter-item-active cbp-filter-item" ><p id="TituloProductos"></p>
              <div class="cbp-filter-counter"></div>
            </div>
          </div>

          <div class="demo-full-width">
          <div id="ContenedorProductos">
            <div id="grid-container" class="cbp">
            </div>
          </div>
          </div>
        </div>

        <br/>
        <br/>
        <br/>
          <div class="clearfix"></div>
      </div>


    
    <a href="#" class="scrollup"></a><!-- end scroll to top of the page--> 
   
    <div class="foot">
      <?php include 'footer.php';?>
    </div>

<!-- Scripts --> 
<script src="js/jquery/jquery.min.js"></script> 
<script src="js/bootstrap/js/bootstrap.min.js"></script> 
<script src="js/style-customizer/js/spectrum.js"></script> 
<script src="js/less/less.min.js" data-env="development"></script> 
<script src="js/sticky/js/jquery.sticky.js"></script> 
<script src="js/style-customizer/js/style-customizer.js"></script> 
<!-- Scripts END --> 

<!-- Template scripts -->
<script src="js/mainmenu/customeUI.js"></script>
<script src="js/template-custom/js/template-custom.js"></script> 
<script type="text/javascript" src="js/cubeportfolio/jquery.cubeportfolio.min.js"></script> 
<script type="text/javascript" src="js/cubeportfolio/main-four-col.js"></script> 
<script src="js/functions/functions.js"></script>

<script src="js/Productos.js"></script>
<script src="js/menu.js"></script>

</body>

<!-- Mirrored from codelayers.net/templates/hostlinea/classic-2/portfolio-four.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 23 Mar 2016 15:43:10 GMT -->
</html>

<?php 


 ?>