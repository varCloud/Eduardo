<footer class="main">
    <div class="footer-top-area">
        <div class="container">
            <div class="row row-wrap">
                <div class="col-md-2">
                    <a href="index.html">
                        E ESPE Diseño y Decoración
                    </a>
                    <ul class="list list-social">
                        <li>
                            <a target="_blank" href="https://www.facebook.com/pages/E-ESPE/883288218371368?fref=ts "><img src="img/icono_face.png" style="width: 40%; cursor: pointer" title="Facebook" /></a>
                        </li>
                        <!--                        <li>
                                                    <a class="fa fa-twitter box-icon" href="#" data-toggle="tooltip" title="Twitter"></a>
                                                </li>-->

                    </ul>
                    <p>
                        Siguenos en facebook
                    </p>
                </div>

                <div class="col-md-8" align='center'>
                    <h4>Comentarios facebook</h4>
                    <div class="fb-comments" data-href="http://eespe.com.mx" data-width="600" data-numposts="3" data-colorscheme="dark"></div>
                </div>
                <div class="col-md-2">
                    <ul class="thumb-list">
                        <li>

                            <h4>Contador de visitas</h4>
                        </li>
                        <li>
                            <h1 style="text-align: center"><?php
//                                $sql = new Mysql();
                                $res = $sql->consulta("SELECT contador FROM visitas");
                                if ($row = $sql->fetch_array($res)) {
                                    echo $row["contador"];
                                }
                                ?>
                            </h1>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-copyright">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <p>Copyright © 2015,E Espe, Todos los derechos reservados.</p>
                </div>
                <div class="col-md-6 col-md-offset-2">
                    <!--                    <div class="pull-right">
                                            <ul class="list-inline list-payment">
                                                
                                                <li>
                                                    <img src="img/payment/mastercard-curved-32px.png" alt="Image Alternative text" title="Image Title" />
                                                </li>
                                                <li>
                                                    <img src="img/payment/visa-curved-32px.png" alt="Image Alternative text" title="Image Title" />
                                                </li>
                                            </ul>
                                        </div>-->
                </div>
            </div>
        </div>
    </div>
</footer>