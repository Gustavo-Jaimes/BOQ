<!DOCTYPE html>
<?=$headGNRL?>
<body>

<?=$header?>

<section class="seccion1-material2">
    <div class="uk-text-center" uk-grid>
        <div class="uk-width-1-1@m">
            <div class="banner1">
                <img src="./img/design/bannerDetalle.png" alt="">
            </div>
        </div>
        <div class="uk-width-1-1@m uk-margin-remove seccion1-container-letrero">
            <div class="uk-text-center seccion1-subcontainer-letrero" uk-grid>
                <div class="uk-width-expand@m uk-flex uk-flex-middle uk-flex-center">
                    <div class="seccion1-container-p">
                      <p style="margin:0">PROYECTOS</p>
                    </div>
                </div>
           </div>
        </div>
    </div>

    <div class="uk-text-center uk-margin-remove" uk-grid>
        <div class="uk-width-1-6@m uk-visible@m">
            <div class="uk-card uk-card-body"></div>
        </div>
        <div class="uk-width-expand@m uk-padding-remove container-carousel-gen">
                <div>
                    <p style="color: #595959"><b>ELIGE UN PROYECTO</b></p>
                </div>

            <div uk-slider>
                <div class="uk-position-relative">
                    <div class="uk-slider-container uk-light container-carousel">
                            <ul class="uk-slider-items uk-child-width-1-1 uk-child-width-1-3@m uk-grid">
                                <?php
                                    $CONSULTA1 = $CONEXION -> query("SELECT * FROM proyectos ORDER BY orden");
                                    while($row_CONSULTA1 = $CONSULTA1 -> fetch_assoc()){
                                        $tituloProyec = $row_CONSULTA1['titulo'];
                                        $idpro =$row_CONSULTA1['id'];

                                        if ($id == null) {
                                            $id = $idpro;
                                        }
                                        $consulta1Pic = $CONEXION ->query("SELECT * FROM proyectospic WHERE producto = $idpro ORDER BY orden LIMIT 1");
                                        $row_CONSULTA2 = $consulta1Pic -> fetch_assoc();
                                ?>
                                <li>
                                    <span class="link-proyecto" style="cursor: pointer;" data-proyecto="<?=$row_CONSULTA1['id']?>">
                                        <div class="uk-panel" style="width: 15.5em; height: 10em; padding: 0em 1em;">
                                            <img class="imagen-hover" src="./img/contenido/proyectos/<?=$row_CONSULTA2['imagen']?>" style="width: 16.5em; height: 10em; border-radius: 3%;"  alt="">
                                        </div>
                                        <div style="color: #5c5c5c; font-weight: bold; margin-top: .8em"><?=$tituloProyec?></div>
                                    </span>
                                </li>
                                <?php }?>
                            </ul>

                            <a class="uk-position-center-left uk-position-small" href="#" uk-slider-item="previous"><i class='fas fa-caret-square-left uk-visible@m' style='font-size:40px; color: black;position: absolute; top: -.5em; left: -2em'></i></a>
                            <a class="uk-position-center-right uk-position-small" href="#" uk-slider-item="next"><i class='fas fa-caret-square-right uk-visible@m' style='font-size:40px; color: black; position: absolute; top: -.5em; left: 1.5em'></i></a>
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
        <?php 
        $CONSULTA5 = $CONEXION -> query("SELECT * FROM proyectos");  
        while( $row_CONSULTA5 = $CONSULTA5 -> fetch_assoc()){
        $titulo = $row_CONSULTA5['titulo'];
        $objetivo = $row_CONSULTA5['objetivo'];
        $proceso = $row_CONSULTA5['proceso'];
        $descripcion = $row_CONSULTA5['descripcion'];
        $resultado = $row_CONSULTA5['resultado'];
        $idprodu = $row_CONSULTA5['id'];

  
            $active = ($id == $idprodu) ? "block" : "none" ;
        
        
        ?>

<section class="proyec-cont" id="proyec<?=$idprodu?>" style="display: <?=$active?> ">
        <div class="uk-width-1-1@m uk-margin-remove container-letrero">
            <div class="uk-text-center seccion1-subcontainer-letrero" uk-grid>
                <div class="uk-width-expand@m uk-flex uk-flex-middle uk-flex-center">
                    
                    <div class="seccion1-container-p" style="padding: 1.5em 0;">
                      <p style="border-bottom: solid #ff9300 5px; padding: 0em 3em; color: white; font-weight: bold; margin:0"><?=$titulo?></p>
                    </div>
                </div>
           </div>
        </div>
    


    <section class="seccion2-material2">
        <div class="uk-child-width-expand@s" uk-grid>
            <div class="uk-width-auto@m uk-visible@m">
                <div class=" uk-card-body"></div>
            </div>
            <div class="uk-grid-item-match">
                <div class="uk-card uk-card-default uk-card-body seccion2-material-objetivo">
                    <h3>OBJETIVO</h3>
                    <p><?=$objetivo?></p>
                </div>
            </div>
            <div class="uk-grid-item-match">
                <div class="uk-card uk-card-default uk-card-body uk-flex uk-flex-center seccion2-material2-container-img">
                    <img src="./img/design/detalle.png" alt="">
                </div>
            </div>
        </div>

        <div class="uk-child-width-expand@s" uk-grid>
            <div class="uk-width-auto@m uk-visible@m">
                <div class=" uk-card-body"></div>
            </div>
            <div class="uk-grid-item-match">
                <div class="uk-card uk-card-default uk-card-body seccion2-material-proceso">
                    <h3>PROCESO</h3>
                    <p><?=$proceso?></p>
                </div>
            </div>
            <div class="uk-grid-item-match">
                <div uk-slideshow="animation: push">

                    <div class="uk-position-relative uk-visible-toggle uk-light container-corousel-2" tabindex="-1">
                    <ul class="uk-slideshow-items">
                    <?php
                        $noPic     = 'img/design/camara.jpg';
                        $rutaPics  = 'img/contenido/proyectos/';
                        $firstPic  = "./img/design/camara.jpg";

                        $CONSULTA5 = $CONEXION -> query("SELECT * FROM proyectos");
                        $row_CONSULTA5 = $CONSULTA5 -> fetch_assoc();
                        $id = $row_CONSULTA5['id'];

                        $CONSULTA6 = $CONEXION -> query("SELECT * FROM proyectospic WHERE producto = $id");
                            while($row_CONSULTA6 = $CONSULTA6 -> fetch_assoc()){
                                $firstPic = $rutaPics.$row_CONSULTA6['imagen'];
			                    $firstPic = (file_exists($firstPic)) ? $firstPic : $noPic;
                            
                    ?>

                        
                            <li>
                                <img src="<?=$firstPic?>" alt="" uk-cover>
                            </li>
                        <?php } ?>
                        </ul>

                        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
                        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>

                    </div>


                    <ul class="uk-slideshow-nav uk-dotnav uk-flex-center uk-margin"></ul>

                </div>  
            </div>
        </div>

        <div class="uk-child-width-expand@s" style="margin-top: 0" uk-grid>
            <div class="uk-width-auto@m uk-visible@m">
                <div class=" uk-card-body"></div>
            </div>
            <div class="uk-grid-item-match">
                <div class="uk-card uk-card-default uk-card-body seccion2-material2-curso">
                    <h3>RESULTADO</h3>
                    <p><?=$resultado?></p>
                </div>
            </div>
        </div>

    </section>
</section>
            <?php } ?>
<?=$footer?>

<?=$scriptGNRL?>

<script>
    $('.link-proyecto').click(function(){
    let proyec = $(this).attr('data-proyecto');

    $('.proyec-cont').hide();
    $('#proyec' + proyec).show();

    console.log('#proyec' + proyec);

    });
</script>

</body>
</html>