<!DOCTYPE html>
<?=$headGNRL?>
<body>

<?=$header?>

<section id="servicios" class="seccion-servicios1">
    <div class="uk-text-center" uk-grid>
        <div class="uk-width-1-1@m seccion-banner1">
            <div>
                <div class="container-banner1 uk-background-cover uk-background-muted uk-height-medium uk-panel uk-flex uk-flex-center uk-  flex-middle" style="background-image: url(./img/design/banner1.png);">             </div>
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
                    $consult = "CONSULTORIA";
                    $centro = "CENTRO DE ENTRENAMIENTO";
                    $mas = "MAS CURSOS";
                    $men = "VER MENOS";
                    break;

                  case 'en':
                    $consult = "CONSULTANCY";
                    $centro = "TRAINING CENTER";
                    $mas = "MORE COURSES";
                    $men = "SEE LESS";
                    break;
                }
        ?>
        <div class="uk-width-1-1@m uk-margin-remove container-letrero-servicios">
            <div class="uk-text-center container-subletrero-servicios" uk-grid>
                <div class="uk-width-expand@m uk-flex uk-flex-middle uk-flex-center">
                    <div class="letrero-servicios"><?=$consult?></div>
                </div>
                <div class="uk-width-1-5@m uk-flex uk-flex-middle uk-flex-center uk-hidden@m uk-visible@s">
                    <div class="container-items">
                        <button class="uk-button uk-button-default" type="button">Elige una categoria > </button>
                            <div style="background-color: #000000" uk-dropdown>
                                <ul class="uk-nav uk-dropdown-nav">
                                    <li class="uk-active"><a href="#">Active</a></li>
                                    <li><a href="#">Item</a></li>
                                    <li class="uk-nav-header">Header</li>
                                    <li><a href="#">Item</a></li>
                                    <li><a href="#">Item</a></li>
                                    <li class="uk-nav-divider"></li>
                                    <li><a href="#">Item</a></li>
                                </ul>
                            </div>
                    </div>
                </div>
                <div class="uk-width-1-5@m uk-flex uk-flex-middle uk-flex-center container-button uk-hidden@m uk-visible@s">
                        <p uk-margin>
                            <button class="uk-button uk-button-default">Buscar</button>
                        </p>
                </div>
           </div>
        </div>
    </div>
</section>

<section  class="seccion-servicios2">
    <div class="uk-text-center" uk-grid>
         <div class="uk-width-auto@m uk-padding">
             <div class="uk-card uk-card-body"></div>
        </div>
        <div class="uk-width-expand@m">
            <div class="uk-text-center" uk-grid>
            <?php 
              
                $inicio  = ($pag == 0) ? $pag: $pag * $prodPag ;

                $CONSULTA13 = $CONEXION -> query("SELECT * FROM servicios LIMIT $inicio , $prodPag");  
                while($row_CONSULTA13 = $CONSULTA13 -> fetch_assoc()){
            ?>
                <div class="uk-width-1-2@m uk-padding-remove" style="margin-top: 1em">
                     <?=item_inicio8($row_CONSULTA13['id'])?>
                </div>
                <?php } ?> 
                
            </div>
        </div>
        <div class="uk-width-auto@m">
             <div class="uk-card uk-card-body"></div>
        </div>
    </div>
    <div class="uk-text-center uk-margin-remove" uk-grid>
            <div class="uk-width-expand@m uk-margin-remove uk-flex uk-flex-right">
            <?php
            if ($pag == 0) {
                $firts= '<i class="fas fa-caret-square-left" style="font-size:40px; margin: 0em .4em;color: gray"></i>';
            }else{
                $firts = '
                <a type="button" href="'.($pag-1).'_servicios"><i class="fas fa-caret-square-left" style="font-size:40px; margin: 0em .4em;color: black"></i></a>
                ';
            }
            
            ?>
                    <?=$firts?>
                    <?php
                    $consulta_pag = $CONEXION->query("SELECT * FROM servicios");
                
                    $numItems = $consulta_pag->num_rows;

                        $pagTotal=intval($numItems/$prodPag);
                        $resto=$numItems % $prodPag;
                        if (($resto) == 0){
                            $pagTotal=($numItems/$prodPag)-1;
                        }

                        for ($i=0; $i <= $pagTotal; $i++) { 
                        $clase='';
                        if ($pag==$i) {
                            $clase='uk-active';
                        }
                        $link=$i.'_servicios';
                        
                        echo '<a href="'.$link.'" type="button" class="uk-button " style="font-size: 1em; font-weight: bold; padding: 0em .8em; background-color: black; margin: 0 .5em .5em 0; color: white; border-radius: 8px; ">'.($i+1).'</a>';
                        }
                    ?>
                <?php
                    if ($pag == $pagTotal ) {
                        $firts= '<i class="fas fa-caret-square-right" style="font-size: 40px; margin: 0em .2em;color: gray"></i>';
                    }else{
                        $firts = '
                        <a type="button" href="'.($pag+1).'_servicios"><i class="fas fa-caret-square-right" style="font-size: 40px; margin: 0em .2em;color: black"></i></a>
                        ';
                    }
            ?>
            <?=$firts?>
            </div>
            <div class="uk-width-auto@m"><div class="uk-card uk-card-default"></div></div>
    </div>
</section>

<section  id="boq" class="seccion-servicios3">  
    <div class="uk-text-center" uk-grid>
        <div class="uk-width-1-1@m container-gen">
            <div class="container-banner2">
                <div class="container-banner uk-background-cover uk-background-muted uk-height-medium uk-panel uk-flex uk-flex-center uk-  flex-middle" style="background-image: url(./img/design/banner2.png);">             </div>
            </div>
        </div>
        <div class="uk-width-1-1@m uk-margin-remove container-boq">
            <div class="uk-text-center" style="margin: 1em 0;" uk-grid>
                <div class="uk-width-expand@m">
                    <div class="container-letrero-boq">
                        <p class="uk-margin-remove"><?=$centro?></b></span></p>
                    </div>
                </div>
                <div class="uk-width-1-4@m uk-flex uk-flex-middle uk-flex-center"></div>
           </div>
        </div>
    </div>

    <?php
    $contador = 0;

    $CONSULTA20 = $CONEXION -> query("SELECT * FROM productos");
    while($row_CONSULTA20 = $CONSULTA20 -> fetch_assoc()){
    $id = $row_CONSULTA20['id'];

    $contador ++;
    $show = " ";
    $menos = "";
    if ($contador > 3) {
        $show = "display: none";
        $menos = "mostrar-menos";
    }
    ?>
    <div class="uk-text-center container-cursos mostrar-mas <?=$menos?>" style="<?=$show?>" uk-grid>
    
        <div class="uk-width-1-6@m uk-visible@m"></div>
        <div class="uk-width-expand@m">
            <div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s uk-margin curso-card" uk-grid>
                <div class="uk-flex-last@s uk-card-media-right uk-cover-container">
                <?php
                    
                    $CONSULTA2 = $CONEXION -> query("SELECT * FROM productospic WHERE producto = $id");
                    $row_CONSULTA2 = $CONSULTA2 ->fetch_assoc();

                ?>
                    <img style="width: 100%" src="./img/contenido/productos/<?=$row_CONSULTA2['imagen']?>" alt="" uk-cover>
                    <canvas width="600" height="300"></canvas>
                </div>
                
                <div class="cursos-info">
                    <?=item_inicio7($row_CONSULTA20['id'])?>
                </div>
            </div>
        </div>
        <div class="uk-width-1-6@m uk-visible@m"></div>
    </div>
    <?php } ?>

            <div class="boton-princ">
                <p class="uk-flex uk-flex-center">
                    <button style="margin: 1em; font-size: 0.5em; font-weight: bold; padding: 0 2em;" class="uk-button uk-button-primary estilo-boton mas "><?=$mas?></button>
                </p>
              </div>

             <div class="boton-princ" > 
                <p class="uk-flex uk-flex-center">
                    <button class="uk-button uk-button-primary estilo-boton menos" style="display: none; margin: 1em; font-size: 0.5em; font-weight: bold; padding: 0 2em;"><?=$men?></button>
                </p>
            </div>

    

</section>

<!-- <section id="industria" class="seccion-servicios4">
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
                <!-- </div>
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
    </div> -->
<!-- </section> -->

<!-- <section id="tecnologia" class="seccion-servicios5">
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
                             <button class="uk-button uk-button-default"><?=$ver?></button> 
                        </p>
                </div>
           </div>
        </div>
    </div> -->

    <!-- <div class="uk-text-center tecnologia" uk-grid>
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
    </div> -->

    <!-- <div class="uk-text-center uk-margin-remove tecnologia-carousel" uk-grid>
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
</section> -->

<?=$footer?>

<?=$scriptGNRL?>

</body>
<script>
    // $('.link-indu').click(function(){
    // let idIndus = $(this).attr('data-indus');
    // let idIndusCaro = $(this).attr('data-indus');
    
    // $('.sec-indus').hide();
    // $('#' + idIndus).show();

    // $('.sec-indus-carou').hide();
    // $('#carIndus' + idIndusCaro).show();
    // });

    // $('.link-tecnol').click(function(){
    // let idTecnol = $(this).attr('data-tecnol');
    // let idTecnolCaro = $(this).attr('data-tecnol');

    // $('.sec-tecnol').hide();
    // $('#tec' + idTecnol).show();

    // $('.sec-tecnol-carou').hide();
    // $('#cartecnol' + idTecnolCaro).show();
    // }); 



    $('.mas').click(function(){
        $('.mostrar-mas').show();
        $(this).hide();
        $('.menos').show();

    });

    $('.menos').click(function(){
        $('.mas').show();
        $(this).hide();
        $(".mostrar-menos").hide();
        
    });

</script>

</html>