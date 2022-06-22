<!DOCTYPE html>
<?=$headGNRL?>
<body>

<?=$header?>

<section class="seccion-nosotros1 seccion-nosotros2">
    <div class="uk-text-center" style="background-color: white;" uk-grid>
        <div class="uk-width-1-1@m uk-margin-remove" style="background-color: black; height: 2.8em;">
            <div class="uk-text-center" uk-grid>
                <div class="uk-width-expand@m uk-flex uk-flex-middle uk-flex-center">
                    <div class="container-letrero">
                      <p> NOSOTROS</p>
                    </div>
                </div>
           </div>
        </div>
        <?php
        $CONSULTA1 = $CONEXION -> query("SELECT * FROM configuracion");
        $row_CONSULTA1 = $CONSULTA1 -> fetch_assoc();
        ?>

        <div class="uk-width-expand@m uk-margin-remove container-img">
            <div class="">
                <img src="./img/design/nosotros.png" alt="">
            </div>
        </div>
        <div class="uk-width-expand@m uk-margin-remove container-txt-proceso">
            <div class="uk-card uk-card-body ">
                <h3>¿QUIENES SOMOS?</h3>
                <p><?=$row_CONSULTA1['about1']?></p>
            </div>
        </div>
        <div class="uk-width-1-5@m uk-margin-remove">
            <div class="uk-card uk-card-body">
                <img src="./img/design/logo.png" alt="">
            </div>
        </div>
    </div>
    <div class="uk-text-center" id="mision" uk-grid>
        <div class="uk-width-1-5@m container-right">
            <div class="uk-card uk-card-body"></div>
        </div>
        <div class="uk-width-1-3@m container-txt right">
            <div>
                <p class="pmision">NUESTRA MISION</p>
                <p class="ptxt"><?=$row_CONSULTA1['about2']?></p>
            </div>
        </div>
        <div class="uk-width-expand@m uk-visible@m">
            <div class="uk-card uk-card-body"></div>
        </div>
    </div>
    <div class="uk-text-center" style="padding-bottom:40px" uk-grid>
        <div class="uk-width-expand@m uk-visible@m">
            <div class="uk-card-body"></div>
        </div>
        <div class="uk-width-1-3@m container-txt left">
            <div>
                <p class="pvision" >UNA VISION DE FUTURO</p>
                <p class="ptxt2"><?=$row_CONSULTA1['about3']?></div>
        </div>
        <div class="uk-width-1-5@m container-left">
            <div class="uk-card uk-card-body"></div>
        </div>
    </div>

</section>

<section class="seccion-nosotros2 seccion-nosotros1" >
    <!-- <div id="instructores" class="uk-text-center uk-margin-remove container-expertos" uk-grid>
        <div class="uk-width-1-6@m uk-visible@m">
            <div class="uk-card uk-card-body"></div>
        </div>
        <div  class="uk-width-expand@m uk-padding-remove container-expertos-box">
                <div>
                    <p><b>NUESTRO EQUIPO DE EXPERTOS</b></p>
                </div>
            <div uk-slider>
                <div class="uk-position-relative">
                    <div class="uk-slider-container uk-light">
                        <ul class="uk-slider-items uk-child-width-1-1 uk-child-width-1-3@m uk-grid slider-instructores">
                            <?php
                            $CONSULTA2 = $CONEXION -> query("SELECT * FROM guias");
                            while($row_CONSULTA2 = $CONSULTA2 ->fetch_assoc()){
                            $id = $row_CONSULTA2['id'];

                            ?>
                            <li>
                                <?php 
                                    $noPic     = 'img/design/camara.jpg';
                                    $rutaPics  = 'img/contenido/guias/';
                                    $noPic  = "./img/design/camara.jpg";
        
                                    $CONSULTA5 = $CONEXION -> query("SELECT * FROM guiaspic WHERE producto = $id Limit 1");
                                    $row_CONSULTA5 = $CONSULTA5 ->fetch_assoc();
                                    $nombre = $row_CONSULTA5['alt'];
                                    $puesto = $row_CONSULTA5['puesto'];
                                        
                                        $firstPic = $rutaPics.$row_CONSULTA5['imagen'];
                                        $firstPic = (file_exists($firstPic)) ? $firstPic : $noPic;
                                    
                                ?>
                                <div class="uk-panel container-carousel-nosotros ">
                                    <a uk-toggle="target: #modal-close-default" href=""><img src="<?=$firstPic?>" alt=""></a>
                                    
                                    

                                </div>
                                <div class="titulos-instructores">
                                    <p class="titulo-nombre"><?=$nombre?></p>
                                    <p class="titulo-puesto" style="margin: 0em"><?=$puesto?></p>
                                </div>
                            </li>
                        <?php }?>
                                <div id="modal-close-default" uk-modal>
                                    <div class="uk-modal-dialog uk-modal-body">
                                        <button class="uk-modal-close-default" type="button" uk-close></button>
                                        <h2 class="uk-modal-title"><?=$nombre?></h2>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                    </div>
                                </div>
                        </ul>

                        
                        
                        <a class="uk-position-center-left-out uk-position-small" href="#" uk-slider-item="previous"><i class='fas fa-caret-square-left uk-visible@m previo-nosotros-img'></i></a>
                        <a class="uk-position-center-right-out uk-position-small" href="#" uk-slider-item="next"><i class='fas fa-caret-square-right uk-visible@m siguiente-nosotros-img'></i></a>
                    </div>  
                    <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>
                </div>                
            </div>
        </div>
        <div class="uk-width-1-6@m uk-visible@m">
            <div class="uk-card uk-card-body"></div>
        </div>
    </div> -->
    <div id="instructores" class="uk-text-center uk-margin-remove container-expertos" uk-grid>
        <div class="uk-width-1-6@m uk-visible@m">
            <div class="uk-card uk-card-body"></div>
        </div>
        <div  class="uk-width-expand@m uk-padding-remove container-expertos-box">
                <div>
                    <p style="margin-bottom: 2.5em"><b>NUESTRO EQUIPO DE EXPERTOS</b></p>
                </div>
            <div uk-slider>
                <div class="uk-position-relative">
                    <div class="uk-slider-container uk-light">
                        <ul class="uk-slider-items uk-child-width-1-1 uk-child-width-1-3@m uk-grid slider-instructores">
                           <?php 
                               $CONSULTA3 = $CONEXION -> query("SELECT * FROM guias");
                               while($row_CONSULTA3 = $CONSULTA3 -> fetch_assoc()){
                           ?>
                            <li>
                                <?=item_inicio9($row_CONSULTA3['id'])?>
                            </li>
                            <?php } ?>
                        </ul>
                        
                        <a class="uk-position-center-left-out uk-position-small" href="#" uk-slider-item="previous"><i class='fas fa-caret-square-left uk-visible@m previo-nosotros-img'></i></a>
                        <a class="uk-position-center-right-out uk-position-small" href="#" uk-slider-item="next"><i class='fas fa-caret-square-right uk-visible@m siguiente-nosotros-img'></i></a>
                    </div>  
                    <ul class="uk-slider-nav uk-dotnav uk-flex-center uk-margin"></ul>
                </div>                
            </div>
        </div>
        <div class="uk-width-1-6@m uk-visible@m">
            <div class="uk-card uk-card-body"></div>
        </div>
    </div>
</section>

<?=$footer?>

<?=$scriptGNRL?>

</body>
</html>