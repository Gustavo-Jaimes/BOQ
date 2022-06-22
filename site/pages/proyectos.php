<!DOCTYPE html>
<?=$headGNRL?>
<body>

<?=$header?>

<section id="industria" class="seccion-servicios4">
    <div class="uk-text-center" uk-grid>
        <div class="uk-width-1-1@m" style="border-top: solid black 1em;">
            <div class="container-banner3">
                <div class="container-banner3 uk-background-cover uk-background-muted uk-height-medium uk-panel uk-flex uk-flex-center uk-  flex-middle" style="background-image: url(./img/design/banner3.png);">             </div>
            </div>
        </div>
        <?php
            if(isset($_SESSION['idioma'])){
                $idioma = $_SESSION['idioma'];
              }else{
                $idioma = "es";
              }
                switch ($idioma) {
                  case 'es':
                    $industri = "INDUSTRIA";
                    $tecnologi = "TECNOLOGIA";
                    $sele = "SELECCIONA TECNOLOGIA";
                    $seleind = "ELIGE INDUSTRIA";
                    $ver = "VER INFO";
                    break;

                  case 'en':
                    $industri = "INDUSTRY";
                    $tecnologi = "TECHNOLOGY";
                    $sele = "CHOOSE TECHNOLOGY";
                    $seleind = "CHOOSE INDUSTRY";
                    $ver = "SEE MORE";
                    break;
                }
        ?>
        <div class="uk-width-1-1@m uk-margin-remove container-letrero-industrias">
            <div class="uk-text-center container-subletrero-industrias" uk-grid>
                <div class="uk-width-expand@m uk-flex uk-flex-middle uk-flex-center">
                    <div class="letrero-industrias"><?=$industri?></div>
                </div>
                <div class="uk-width-1-5@m uk-flex uk-flex-middle uk-flex-center">
                    <div class="container-items">
                        <button class="uk-button uk-button-default" type="button"><?=$seleind?></button>
                        <div style="background-color: #000000" uk-dropdown>
                                <ul class="uk-nav uk-dropdown-nav">
                        <?php
                            $CONSULTA4 = $CONEXION -> query("SELECT * FROM industrias");
                            while ($row_CONSULTA4 = $CONSULTA4 -> fetch_assoc()) {
                                    
                        ?>
                            
                                    <li><div class="link-indu" data-indus="<?=$row_CONSULTA4['id']?>" style="cursor: pointer; border: solid gray 1px; margin-bottom: .2em; padding: .5em 0;"><?=$row_CONSULTA4['titulo']?></div></li>
                                
                        <?php } ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="uk-width-1-5@m uk-flex uk-flex-middle uk-flex-center container-button">
                        <p uk-margin>
                            <!-- <button class="uk-button uk-button-default"><?=$ver?></button> -->
                        </p>
                </div>
           </div>
        </div>
    </div>

    <div class="uk-text-center industrias" uk-grid>
        <div class="uk-width-1-6@m uk-visible@m">
            <div class="uk-card uk-card-body"></div>
        </div>
        <?php
            $conta = 0;
            $CONSULTA3 = $CONEXION -> query("SELECT * FROM industrias");
            while($row_CONSULTA3 = $CONSULTA3 -> fetch_assoc()){
            
            $active = ($conta == 0) ? "block" : "none" ;

            $idindus = $row_CONSULTA3['id'];
            $CONSULTA2 = $CONEXION -> query("SELECT * FROM industriaspic WHERE producto = $idindus  ORDER BY orden LIMIT 1");
            $row_CONSULTA2 = $CONSULTA2 -> fetch_assoc();
        
        ?>
        <div id="<?=$idindus?>" class="uk-width-expand@m sec-indus" style="display: <?=$active?> " >
            <div class="uk-text-center" uk-grid>
                <div class="uk-width-expand@m container-info" >
                    <div class="uk-card-body uk-padding-remove container-info-sub">
                        <h3 class="uk-card-title"><b class="container-info-titulo"><?=$row_CONSULTA3['titulo']?></b></h3>
                        <p style="text-align: left" class="container-info-p"><?=$row_CONSULTA3['descripcion']?></p>
                    </div>
                </div>
                <div class="uk-width-1-3@m uk-flex-last@s uk-card-media-right uk-cover-container imagen-principal-indus">
                    <img src="./img/contenido/industrias/<?=$row_CONSULTA2['imagen']?>" alt="" uk-cover>
                    <canvas width="600" height="300"></canvas>
                </div>
            </div>
        </div>
        <?php 
            $conta++;
            } ?>

        <div class="uk-width-1-6@m uk-visible@m">
            <div class="uk-card uk-card-body"></div>
        </div>
    </div>

    <div class="uk-text-center uk-margin-remove industrias-carousel " uk-grid>
        <div class="uk-width-1-6@m uk-visible@m">
            <div class="uk-card uk-card-body"></div>
        </div>

        <?php
            $cont = 0;
            $CONSULTA6 = $CONEXION -> query("SELECT * FROM industrias");
            while($row_CONSULTA6 = $CONSULTA6 -> fetch_assoc()){

            $activecarou = ($cont == 0) ? "block" : "none" ;

            $idinduscarou = $row_CONSULTA6['id'];
            ?>

        <div id="carIndus<?=$idinduscarou?>" class="uk-width-expand@m uk-padding-remove industrias-carousel-gen sec-indus-carou" style="display:<?=$activecarou?>">
            <div uk-slider>
                <div class="uk-position-relative">
                    <div class="uk-slider-container uk-light">
                        <ul class="uk-slider-items uk-child-width-1-1 uk-child-width-1-4@m uk-grid">
                            <?php
                                
                                $CONSULTA7 = $CONEXION -> query("SELECT * FROM industriaspic WHERE producto = $idinduscarou");
                            while($row_CONSULTA7 = $CONSULTA7 -> fetch_assoc()){
                            ?>
                            <li>
                                <div class="uk-panel container-corousel-industrias">
                                    <img src="./img/contenido/industrias/<?=$row_CONSULTA7['imagen']?>" alt="">
                                </div>
                            </li>
                                <?php }?>
                        </ul>

                        <a class="uk-position-center-left-out uk-position-small uk-hidden-hover" href="#" uk-slider-item="previous"><i class='fas fa-caret-square-left uk-visible@s previo-img' ></i></a>
                        <a class="uk-position-center-right-out uk-position-small uk-hidden-hover" href="#" uk-slider-item="next"><i class='fas fa-caret-square-right uk-visible@s siguiente-img'></i></a>
            
                    </div>
                </div>
            </div>
        </div>

        <?php 
            $cont ++;
        } ?>


        <div class="uk-width-1-6@m uk-visible@m">
            <div class="uk-card uk-card-body"></div>
        </div>
    </div>
</section>

<section id="tecnologia" class="seccion-servicios5">
    <div class="uk-text-center" uk-grid>
        <div class="uk-width-1-1@m" style="border-top: solid black 1em;">
            <div class="container-banner4">
                <div class="container-banner uk-background-cover uk-background-muted uk-height-medium uk-panel uk-flex uk-flex-center uk-  flex-middle" style="background-image: url(./img/design/banner4.png);">             </div>
            </div>
        </div>
        <div class="uk-width-1-1@m uk-margin-remove tecnologia" style="background-color: black">
            <div class="uk-text-center" style="margin: 1em 0" uk-grid>
                <div class="uk-width-expand@m uk-flex uk-flex-middle uk-flex-center">
                    <div class="titulo-tecnologia"><?=$tecnologi?></div>
                </div>
                <div class="uk-width-1-5@m uk-flex container-boton uk-flex-middle uk-flex-center">
                    <div class="">
                        <button class="uk-button uk-button-default boton" type="button"><?=$sele?></button>
                            <div style="background-color: #000000" uk-dropdown>
                            <ul class="uk-nav uk-dropdown-nav">
                            <?php
                              $CONSULTA8 = $CONEXION -> query("SELECT * FROM tecnologia");
                              while ($row_CONSULTA8 = $CONSULTA8 -> fetch_assoc()) {    
                            ?>
                                <li><div class="link-tecnol" data-tecnol="<?=$row_CONSULTA8['id']?>" style="cursor: pointer; border: solid gray 1px; margin-bottom: .2em; padding: .5em 0;"><?=$row_CONSULTA8['titulo']?></div></li>
                                
                               <?php } ?>
                            </ul>
                            </div>
                    </div>
                </div>
                <div class="uk-width-1-5@m uk-flex uk-flex-middle uk-flex-center container-button">
                        <p uk-margin>
                            <!-- <button class="uk-button uk-button-default"><?=$ver?></button> -->
                        </p>
                </div>
           </div>
        </div>
    </div>

    <div class="uk-text-center tecnologia" uk-grid>
        <div class="uk-width-1-6@m uk-visible@m">
            <div class="uk-card uk-card-body"></div>
        </div>
        <?php
            $conta = 0;
            $CONSULTA4 = $CONEXION -> query("SELECT * FROM tecnologia");
            while($row_CONSULTA4 = $CONSULTA4 -> fetch_assoc()){
            
            $active = ($conta == 0) ? "block" : "none" ;

            $idtecnol = $row_CONSULTA4['id'];
            $CONSULTA5 = $CONEXION -> query("SELECT * FROM tecnologiapic WHERE producto = $idtecnol  ORDER BY orden LIMIT 1");
            $row_CONSULTA5 = $CONSULTA5 -> fetch_assoc();
        
        ?>
        <div id="tec<?=$idtecnol?>" class="uk-width-expand@m sec-tecnol" style="display: <?=$active?>" >
            <div class="uk-text-center" uk-grid>
                <div class="uk-width-expand@m container-info" >
                    <div class="uk-card-body uk-padding-remove container-info-sub">
                        <h3 class="uk-card-title"><b><?=$row_CONSULTA4['titulo']?></b></h3>
                        <p style="text-align: left"><?=$row_CONSULTA4['descripcion']?></p>
                    </div>
                </div>
                <div class="uk-width-1-3@m uk-flex-last@s uk-card-media-right uk-cover-container imagen-principal-tecnol" >
                    <img src="./img/contenido/tecnologia/<?=$row_CONSULTA5['imagen']?>" style="height: 15em" alt="" uk-cover>
                    <canvas width="600" height="300"></canvas>
                </div>
            </div>
        </div>
        <?php 
            $conta++;
            } ?>

        <div class="uk-width-1-6@m uk-visible@m">
            <div class="uk-card uk-card-body"></div>
        </div>
    </div>

    <div class="uk-text-center uk-margin-remove tecnologia-carousel" uk-grid>
        <div class="uk-width-1-6@m uk-visible@m">
            <div class="uk-card uk-card-body"></div>
        </div>
        <?php
            $cont = 0;
            $CONSULTA9 = $CONEXION -> query("SELECT * FROM tecnologia");
            while($row_CONSULTA9 = $CONSULTA9 -> fetch_assoc()){

            $activecaroutecnol = ($cont == 0) ? "block" : "none" ;

            $idtecnolcarou = $row_CONSULTA9['id'];
        ?>
        <div id="cartecnol<?=$idtecnolcarou?>" class="uk-width-expand@m uk-padding-remove tecnologia-carousel-gen sec-tecnol-carou" style="display:<?=$activecaroutecnol?>">
            <div uk-slider>
                <div class="uk-position-relative">
                    <div class="uk-slider-container uk-light">
                        <ul class="uk-slider-items uk-child-width-1-1 uk-child-width-1-4@m uk-grid">
                            <?php
                                $CONSULTA3 = $CONEXION -> query("SELECT * FROM tecnologiapic WHERE producto = $idtecnolcarou");
                                while($row_CONSULTA3 = $CONSULTA3 -> fetch_assoc()){

                            ?>
                            <li>    
                                <div class="uk-panel container-corousel-tecnologia">
                                    <img src="./img/contenido/tecnologia/<?=$row_CONSULTA3['imagen']?>" alt="">
                                </div>
                            </li>
                                <?php } ?>
                        </ul>

                        <a class="uk-position-center-left-out uk-position-small uk-hidden-hover uk-visible@m" href="#" uk-slider-item="previous"><i class='fas fa-caret-square-left uk-visible@s previo-img' ></i></a>
                        <a class="uk-position-center-right-out uk-position-small uk-hidden-hover uk-visible@m" href="#" uk-slider-item="next"><i class='fas fa-caret-square-right siguiente-img'></i></a>
                    </div>
                </div>
            </div>
        </div>
        <?php 
            $cont ++;
        } ?>


        <div class="uk-width-1-6@m uk-visible@m">
            <div class="uk-card uk-card-body"></div>
        </div>
    </div>
</section>



<section class="seccion1-material2">
    <div class="uk-text-center" uk-grid>
        <div class="uk-width-1-1@m container-img">
            <div class="banner1">
                <div class="container-banner uk-background-cover uk-background-muted uk-height-medium uk-panel uk-flex uk-flex-center uk-  flex-middle" style="background-image: url(./img/design/bannerDetalle.png);"></div>
            </div>
        </div>
        <?php
            if(isset($_SESSION['idioma'])){
                $idioma = $_SESSION['idioma'];
              }else{
                $idioma = "es";
              }
                switch ($idioma) {
                  case 'es':
                    $casos = "CASOS DE EXITO";
                    $elige = "ELIGE UN PROYECTO";
                    break;

                  case 'en':
                    $casos= "SUCCESS STORIES";
                    $elige = "CHOOSE A PROJECT";
                    break;
                }
        ?>
        <div class="uk-width-1-1@m uk-margin-remove seccion1-container-letrero">
            <div class="uk-text-center seccion1-subcontainer-letrero" uk-grid>
                <div class="uk-width-expand@m uk-flex uk-flex-middle uk-flex-center">
                    <div class="seccion1-container-p">
                      <p style="margin:0"><?=$casos?></p>
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
                    <p class="eligeProyecto" style="color: #595959"><b><?=$elige?></b></p>
                </div>

            <div uk-slider>
                <div class="uk-position-relative">
                    <div class="uk-slider-container uk-light container-carousel">
                            <ul class="uk-slider-items uk-child-width-1-1 uk-child-width-1-3@m uk-grid">
                                <?php
                                    $CONSULTA1 = $CONEXION -> query("SELECT * FROM proyectos ORDER BY orden");
                                    while($row_CONSULTA1 = $CONSULTA1 -> fetch_assoc()){
                                        $idpro =$row_CONSULTA1['id'];
                                

                                        if ($id == null) {
                                            $id = $idpro;
                                        }
                                        $consulta1Pic = $CONEXION ->query("SELECT * FROM proyectospic WHERE producto = $idpro ORDER BY orden LIMIT 1");
                                        $row_CONSULTA2 = $consulta1Pic -> fetch_assoc();
                                ?>
                                <li>
                                    <span class="link-proyecto" style="cursor: pointer;" data-proyecto="<?=$row_CONSULTA1['id']?>">
                                        <div class="uk-panel elige-proyecto">
                                            <img class="imagen-hover" src="./img/contenido/proyectos/<?=$row_CONSULTA2['imagen']?>"  alt="">
                                        </div>
                                        <?php
                                            if(isset($_SESSION['idioma'])){
                                                $idioma = $_SESSION['idioma'];
                                              }else{
                                                $idioma = "es";
                                              }
                                                switch ($idioma) {
                                                  case 'es':
                                                    $tituloProyec = $row_CONSULTA1['titulo'];
                                                    break;
                                
                                                  case 'en':
                                                    $tituloProyec = $row_CONSULTA1['titulo_en'];
                                                    break;
                                                }
                                        ?>
                                        <div class="estilos-titulo"><?=$tituloProyec?></div>
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
        <div class="uk-width-1-6@m uk-visible@m"></div>
    </div>
</section>
        <?php 
        $CONSULTA5 = $CONEXION -> query("SELECT * FROM proyectos");  
        while( $row_CONSULTA5 = $CONSULTA5 -> fetch_assoc()){

            if(isset($_SESSION['idioma'])){
                $idioma = $_SESSION['idioma'];
              }else{
                $idioma = "es";
              }
                switch ($idioma) {
                  case 'es':
                    $titulo = $row_CONSULTA5['titulo'];
                    $objetivo = $row_CONSULTA5['objetivo'];
                    $proceso = $row_CONSULTA5['proceso'];
                    $descripcion = $row_CONSULTA5['descripcion'];
                    $resultado = $row_CONSULTA5['resultado'];
                    $idprodu = $row_CONSULTA5['id'];
                    $obj = "OBJETIVO";
                    $proc = "PROCESO";
                    $resul = "RESULTADO";
                    break;

                  case 'en':
                    $titulo = $row_CONSULTA5['titulo_en'];
                    $objetivo = $row_CONSULTA5['objetivo_en'];
                    $proceso = $row_CONSULTA5['proceso_en'];
                    $descripcion = $row_CONSULTA5['descripcion_en'];
                    $resultado = $row_CONSULTA5['resultado_en'];
                    $idprodu = $row_CONSULTA5['id'];
                    $obj = "OBJECTIVE";
                    $proc = "PROCESS";
                    $resul = "RESULT";
                    break;
                }
  
            $active = ($id == $idprodu) ? "block" : "none" ;
        
        
        ?>

<section class="proyec-cont" id="proyec<?=$idprodu?>" style="display: <?=$active?> ">
        <div class="uk-width-1-1@m uk-margin-remove container-letrero">
            <div class="uk-text-center seccion1-subcontainer-letrero" uk-grid>
                <div class="uk-width-expand@m uk-flex uk-flex-middle uk-flex-center">
                    
                    <div class="seccion1-container-p">
                      <p><?=$titulo?></p>
                    </div>
                </div>
           </div>
        </div>
    


    <section class="seccion2-material2">
        <div class="uk-child-width-expand@s" uk-grid>
            <div class="uk-width-auto@m uk-visible@m"></div>
            <div class="uk-grid-item-match">
                <div class="uk-card uk-card-default uk-card-body seccion2-material-objetivo">
                    <h3><?=$obj?></h3>
                    <p><?=$objetivo?></p>
                </div>
            </div>
            <div class="uk-grid-item-match">
                 <div uk-slideshow="animation: push" style="margin-top: 1em">

                    <div class="uk-position-relative uk-visible-toggle uk-light container-corousel-2" tabindex="-1">
                        <ul class="uk-slideshow-items">
                            <?php
                                $noPic     = 'img/design/camara.jpg';
                                $rutaPics  = 'img/contenido/proyectos/';
                                $firstPic  = "./img/design/camara.jpg";

                                

                                $CONSULTA6 = $CONEXION -> query("SELECT * FROM proyectospic WHERE producto = $idprodu");
                                    while($row_CONSULTA6 = $CONSULTA6 -> fetch_assoc()){
                                        $firstPic = $rutaPics.$row_CONSULTA6['imagen'];
                                        $firstPic = (file_exists($firstPic)) ? $firstPic : $noPic;
                                    
                            ?>

                        
                            <li>
                                <img style="height: 18em;" src="<?=$firstPic?>" alt="" uk-cover>
                            </li>
                        <?php } ?>
                        </ul>

                        <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
                        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>

                    </div>
                    <ul class="uk-slideshow-nav uk-dotnav uk-flex-center uk-margin"></ul>
                </div> 
            </div>
            <div class="uk-width-auto@m uk-visible@m"></div>
        </div>

        <div class="uk-child-width-expand@s" uk-grid>
            <div class="uk-width-auto@m uk-visible@m"></div>
            <div class="uk-grid-item-match">
                <div class="uk-card uk-card-default uk-card-body seccion2-material-proceso">
                    <h3><?=$proc?></h3>
                    <p><?=$proceso?></p>
                </div>
            </div>
            <div class="uk-grid-item-match">
                <div class="uk-card uk-card-default uk-card-body seccion2-material2-curso">
                    <h3><?=$resul?></h3>
                    <p><?=$resultado?></p>
                </div>
            </div>
            <div class="uk-width-auto@m uk-visible@m"></div>
        </div>

    </section>
</section>
            <?php } ?>
<?=$footer?>

<?=$scriptGNRL?>

<script>
    $('.link-indu').click(function(){
    let idIndus = $(this).attr('data-indus');
    let idIndusCaro = $(this).attr('data-indus');
    
    $('.sec-indus').hide();
    $('#' + idIndus).show();

    $('.sec-indus-carou').hide();
    $('#carIndus' + idIndusCaro).show();
    });

    $('.link-tecnol').click(function(){
    let idTecnol = $(this).attr('data-tecnol');
    let idTecnolCaro = $(this).attr('data-tecnol');

    $('.sec-tecnol').hide();
    $('#tec' + idTecnol).show();

    $('.sec-tecnol-carou').hide();
    $('#cartecnol' + idTecnolCaro).show();
    });
    

    $('.link-proyecto').click(function(){
    let proyec = $(this).attr('data-proyecto');

    $('.proyec-cont').hide();
    $('#proyec' + proyec).show();

    console.log('#proyec' + proyec);

    });
</script>

</body>
</html>