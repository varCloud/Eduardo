<header class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <!-- MAIN NAVIGATION -->
                <div class="flexnav-menu-button" id="flexnav-menu-button">Menu</div>
                <?php
                include 'menufooter.php';
                ?>
                <!-- END MAIN NAVIGATION -->
            </div>
            <div class="col-md-6">
                <!-- LOGIN REGISTER LINKS -->
                <ul class="login-register">
                    <li class="shopping-cart"><a href="#"><i class="fa fa-shopping-cart"></i>Carrito de pedidos</a>
                        <?php
                        include 'carrito.php';
                        ?>
                    </li>
                      <li>
                    </li>
<!--                    <li><a class="popup-text" href="#login-dialog" data-effect="mfp-move-from-top"><i class="fa fa-sign-in"></i>Iniciar sesión</a>
                    </li>-->
<!--                    <li><a class="popup-text" href="#register-dialog" data-effect="mfp-move-from-top"><i class="fa fa-edit"></i>Registrarme</a>
                    </li>-->
                </ul>
            </div>
        </div>
    </div>
</header>

<!-- LOGIN REGISTER LINKS CONTENT -->
<div id="login-dialog" class="mfp-with-anim mfp-hide mfp-dialog clearfix">
    <i class="fa fa-sign-in dialog-icon"></i>
    <h3>Inicio de sesión para miembros</h3>
    <h5>Bievenido a ESPE. Iniciar Sesión para comenzar</h5>
    <form class="dialog-form">
        <div class="form-group">
            <label>E-mail</label>
            <input type="text" placeholder="email@domain.com" class="form-control">
        </div>
        <div class="form-group">
            <label>Contrase&ntilde;a</label>
            <input type="password" placeholder="Escribe tu contraseña" class="form-control">
        </div>                   
        <input type="submit" value="Iniciar" class="btn btn-primary">
    </form>
    <ul class="dialog-alt-links">
        <li><a class="popup-text" href="#register-dialog" data-effect="mfp-zoom-out">Registrarme</a>
        </li>
        <li><a class="popup-text" href="#password-recover-dialog" data-effect="mfp-zoom-out">Olvidaste tu contraseña</a>
        </li>
    </ul>
</div>


<div id="register-dialog" class="mfp-with-anim mfp-hide mfp-dialog clearfix">
    <i class="fa fa-edit dialog-icon"></i>
    <h3>Registro</h3>
    <form class="dialog-form">
        <div class="form-group">
            <label>E-mail</label>
            <input type="text" placeholder="email@domain.com" class="form-control">
        </div>
        <div class="form-group">
            <label>Contraseña</label>
            <input type="password" placeholder="Contraseña" class="form-control">
        </div>
        <div class="form-group">
            <label>Repetir contraseña</label>
            <input type="password" placeholder="Tu contraseña de nuevo" class="form-control">
        </div>
        <input type="submit" value="Registrarme" class="btn btn-primary">
    </form>
    <ul class="dialog-alt-links">
        <li><a class="popup-text" href="#login-dialog" data-effect="mfp-zoom-out">Ya eres miembro?</a>
        </li>
    </ul>
</div>

<div id="password-recover-dialog" class="mfp-with-anim mfp-hide mfp-dialog clearfix">
    <i class="icon-retweet dialog-icon"></i>
    <h3>Recuperar contrasñea</h3>
    <form class="dialog-form">
        <label>E-mail</label>
        <input type="text" placeholder="email@domain.com" class="span12">
        <input type="submit" value="Solicitar mi nuevo password" class="btn btn-primary">
    </form>
</div>