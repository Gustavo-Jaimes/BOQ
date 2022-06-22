<!DOCTYPE html>
<?=$headGNRL?>
<body>

<?=$header?>

<section class="seccion1-material">
    <div class="uk-text-center" uk-grid>
        <div class="uk-width-1-1@m">
            <div style="max-height: 20em;">
                <div class="container-banner uk-background-cover uk-background-muted uk-height-medium uk-panel uk-flex uk-flex-center uk-flex-middle" style="background-image: url(./img/design/banner1.png);">             </div>
            </div>
        </div>
        <div class="uk-width-1-1@m uk-margin-remove seccion1-container-letrero">
            <div class="uk-text-center seccion1-subcontainer-letrero" uk-grid>
                <div class="uk-width-expand@m uk-flex uk-flex-middle uk-flex-center">
                <?php 
                    $CONSULTA1 = $CONEXION -> query("SELECT * FROM servicios WHERE id = $id ");  
                    $row_CONSULTA1 = $CONSULTA1 -> fetch_assoc();
                    $titulo = $row_CONSULTA1['titulo'];
                    $titulo = $row_CONSULTA1['titulo_en'];
                    $objetivo = $row_CONSULTA1['objetivo'];
                    $objetivo = $row_CONSULTA1['objetivo_en'];
                    $proceso = $row_CONSULTA1['proceso'];
                    $proceso = $row_CONSULTA1['proceso_en'];
                    $curso = $row_CONSULTA1['curso'];
                    $curso = $row_CONSULTA1['curso_en'];
                    $descripcion = $row_CONSULTA1['descripcion'];
                    $descripcion = $row_CONSULTA1['descripcion_en'];
                    $id = $row_CONSULTA1['id'];

                    if(isset($_SESSION['idioma'])){
                        $idioma = $_SESSION['idioma'];
                      }else{
                        $idioma = "es";
                     }
                    
                    switch ($idioma) {
                      case 'es':
                        $titulo = $row_CONSULTA1['titulo'];
                        $descripcion = $row_CONSULTA1['descripcion'];
                        $objetivo = $row_CONSULTA1['objetivo'];
                        $proceso = $row_CONSULTA1['proceso'];
                        $curso = $row_CONSULTA1['curso'];
                        $titulo1 = "OBJETIVO:";
                        $titulo2 = "ACERCAMIENTO:";
                        $titulo3 = "RESULTADOS:";
                        break;
                
                      case 'en':
                        $titulo = $row_CONSULTA1['titulo_en'];
                        $descripcion = $row_CONSULTA1['descripcion_en'];
                        $objetivo = $row_CONSULTA1['objetivo_en'];
                        $proceso = $row_CONSULTA1['proceso_en'];
                        $curso = $row_CONSULTA1['curso_en'];
                        $titulo1 = "OBJECTIVE:";
                        $titulo2 = "CLOSE UP:";
                        $titulo3 = "RESULTS:";
                        break;
                    }
                
                ?>
                    <div class="seccion1-container-p">
                      <p><?=$titulo?></p>
                    </div>
                </div>
           </div>
        </div>
    </div>
</section>

<section class="seccion2-material">
    <div class="uk-child-width-expand@s" uk-grid>
        <div class="uk-width-auto@m uk-visible@m"></div>
            <div class="uk-grid-item-match">
                <div class="uk-card uk-card-default uk-card-body seccion2-material-objetivo">
                    <h3><?=$titulo1?></h3>
                    <p><?=$objetivo?></p>
                </div>
            </div>
            <div class="uk-grid-item-match seccion2-material-container-img">
                <div class="uk-grid-item-match carousel">
                    <div uk-slideshow="animation: push">

                        <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" style="max-height: 18em">

                            <ul class="uk-slideshow-items" style="height: 18em">
                                <?php
                                    $CONSULTA2 = $CONEXION -> query("SELECT * FROM serviciospic WHERE producto = $id");
                                    while($row_CONSULTA2 = $CONSULTA2 -> fetch_assoc()){
                                                
                                ?>
                                <li>
                                    <img src="./img/contenido/servicios/<?=$row_CONSULTA2['imagen']?>" alt="" uk-cover>
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
        <div class="uk-width-auto@m uk-visible@m"></div>  
    </div>

    <div class="uk-child-width-expand@s" uk-grid>
        <div class="uk-width-auto@m uk-visible@m"></div>
        <div class="uk-grid-item-match">
            <div class="uk-card uk-card-default uk-card-body seccion2-material-proceso">
                <h3><?=$titulo2?></h3>
                <p>
                   <?=$proceso?>
                </p>
            </div>
        </div>
        <div class="uk-grid-item-match">
            <div class="uk-card uk-card-default uk-card-body seccion2-material-curso">
                <h3><?=$titulo3?></h3>
                <p>
                   <?=$curso?>
                </p>
            </div>
        </div>
        <div class="uk-width-auto@m uk-visible@m"></div>
    </div>

    
</section>


<?=$footer?>

<?=$scriptGNRL?>

</body>
</html>