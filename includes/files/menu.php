<nav>
    <?php
    $index = "";
    $categorias="";
    $contacto="";
    $nosotros="";
//    session_start();
    
//   
    ?>
    <ul class="nav nav-pills flexnav" id="flexnav" data-breakpoint="800">
        <li <?= $index ?> ><a href="index.php" style="cursor: pointer">Inicio</a>

        </li>
        <li <?=$categorias?>><a href="#">Categorías</a>
            <ul>
                <?php
//            include 'includes/Conexion.php';
//            $sql=null;
                $sql = new MySQL();
                $res = $sql->consulta("SELECT * FROM categorias");
                while ($row = $sql->fetch_array($res)) {
                    ?>
                    <li><a href="categorias.php?id_categoria=<?= $row["id_categoria"] ?>"><?= $row["categoria"] ?></a>
                    </li>
                    <?php
                }
                ?>


            </ul>
        </li>
        <li <?=$nosotros?>><a  href="nosotros.php" style="cursor: pointer">Nosotros </a>

        </li>
        <li <?=$nosotros?>><a  href="galeria.php" style="cursor: pointer">Galer&iacute;a </a>

        </li>
        <li <?=$contacto?>><a href="contacto.php" style="cursor: pointer">Contacto </a>

        </li>

    </ul>
</nav>