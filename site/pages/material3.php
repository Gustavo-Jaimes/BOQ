<!DOCTYPE html>
<?=$headGNRL?>
<body>

<?=$header?>

<section class="seccion1-material3">
    <div class="uk-text-center" uk-grid>
        <div class="uk-width-1-1@m">
          <div>
                <div class="banner2 uk-background-cover uk-background-muted uk-height-medium uk-panel uk-flex uk-flex-center uk-  flex-middle" style="background-image: url(./img/design/bannerDetalle.png);">             </div>
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
                  $centro = "CENTRO DE ENTRENAMIENTO";
                  break;
                case 'en':
                  $titulo = "ENTERTAINMENT CENTER";
                  break;
              }
        ?>
        <div class="uk-width-1-1@m uk-margin-remove seccion1-container-letrero">
            <div class="uk-text-center seccion1-subcontainer-letrero" uk-grid>
                <div class="uk-width-expand@m uk-flex uk-flex-middle uk-flex-center">
                    <div class="seccion1-container-p">
                      <p> <?=$centro?></p>
                    </div>
                </div>
           </div>
        </div>
        <div class="uk-width-1-1@m uk-margin-remove seccion1-container-letrero-curso">
            <?php
                $CONSULTAProdu = $CONEXION -> query("SELECT * FROM productos WHERE id = $id");
                $row_CONSULTAProdu = $CONSULTAProdu -> fetch_assoc();
                $titulo = $row_CONSULTAProdu['titulo'];
                $titulo = $row_CONSULTAProdu['titulo_en'];

                  if(isset($_SESSION['idioma'])){
                    $idioma = $_SESSION['idioma'];
                  }else{
                    $idioma = "es";
                  }
                  
                    switch ($idioma) {
                      case 'es':
                        $titulo = $row_CONSULTAProdu['titulo'];
                        $objetivo = $row_CONSULTAProdu['objetivo'];
                        $dirigido = $row_CONSULTAProdu['dirigido'];
                        $plan = $row_CONSULTAProdu['especificaciones'];
                        $reserva = $row_CONSULTAProdu['reserva'];
                        $precio = $row_CONSULTAProdu['precio'];
                        $objet = "OBJETIVO";
                        $diri = "DIRIGIDO A";
                        $plaCur = "PLAN DEL CURSO";
                        $reser = "RESERVA TU LUGAR";
                        $selec = "FECHAS DISPONIBLES";
                        $dispon = "Selecciona Fecha";
                        $conf = "CONFIRMAR FECHAS";
                        $carro = "AGREGAR AL CARRO";
                        break;
                      case 'en':
                        $titulo = $row_CONSULTAProdu['titulo_en'];
                        $objetivo = $row_CONSULTAProdu['objetivo_en'];
                        $dirigido = $row_CONSULTAProdu['dirigido_en'];
                        $plan = $row_CONSULTAProdu['especificaciones_en'];
                        $reserva = $row_CONSULTAProdu['reserva_en'];
                        $precio = $row_CONSULTAProdu['precio'];
                        $objet = "OBJECTIVE";
                        $diri = "DIRECTED TO";
                        $plaCur = "COURSE PLAN";
                        $reser ="RESERVE YOUR PLACE";
                        $selec = "AVAILABLE DATES";
                        $dispon = "Choose Dates";
                        $conf = "CONFIRM DATES";
                        $carro = "ADD TO CART";
                        break;
                    }
            ?>
            <div class="uk-text-center seccion1-subcontainer-letrero-curso" uk-grid>
                <div class="uk-width-expand@m uk-flex uk-flex-middle uk-flex-center">
                    <div class="seccion1-container-p">
                      <p style="color:black"> <?=$titulo?></p>
                    </div>
                </div>
           </div>
        </div>
    </div>
</section>
<section class="seccion2-material3">
    <div class="uk-child-width-expand@s" uk-grid>
        <div class="uk-width-auto@m uk-visible@m"></div>
        <div class="uk-grid-item-match">
            <div class="uk-card uk-card-default uk-card-body seccion2-material3-objetivo">
                <h3><?=$objet?></h3>
                <p><?=$objetivo?></p>
            </div>
        </div>
        <div class="uk-grid-item-match dirigido">
            <div class="uk-card uk-card-default uk-card-body seccion2-material3-objetivo">
                <h3><?=$diri?>:</h3>
                <p><p><?=$dirigido?></p></p>
            </div>
        </div>
        <div class="uk-width-auto@m uk-visible@m"></div>
    </div>

    <div class="uk-child-width-expand@s uk-grid-match" uk-grid>
        <div class="uk-width-auto@m uk-visible@m"></div>
        <div class="uk-grid-item-match">
            <div class="uk-card uk-card-default uk-card-body seccion2-material3-proceso">
                <h3><?=$plaCur?></h3>
                <p><?=$plan?></p>
                <div class="uk-flex uk-flex-center@m uk-flex-right@l">
                  <?php
                    $pdf_descarga = $CONEXION -> query("SELECT * FROM productos WHERE id = $id");
                    $consulta_pdf = $pdf_descarga ->fetch_assoc();
                    $pdf = $consulta_pdf['pdf'];
                  ?>
                    <div title="Descargar PDF">
                       <a href="./img/contenido/productos/<?=$pdf?>" download=""><i style="color: red; font-size: 4em; cursor: pointer" class="far fa-file-pdf"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="uk-grid-item-match carousel">
            <div uk-slideshow="animation: push">

                <div class="uk-position-relative uk-visible-toggle uk-light container-corousel-1" tabindex="-1">

                    <ul class="uk-slideshow-items" style="height: 18em; min-height: 18em;">
                        <?php
                            $CONSULTA3 = $CONEXION -> query("SELECT * FROM productospic WHERE producto = $id");
                            while($row_CONSULTA3 = $CONSULTA3 ->fetch_assoc()){
                        ?>
                        <li>
                            <img class="img" src="./img/contenido/productos/<?=$row_CONSULTA3['imagen']?>" alt="" uk-cover>
                        </li>
                        <?php }?>
                    </ul>

                    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
                    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>

                </div>

                <ul class="uk-slideshow-nav uk-dotnav uk-flex-center uk-margin"></ul>

            </div>  
        </div>
        <div class="uk-width-auto@m uk-visible@m"></div>
    </div>
    <div class="uk-child-width-expand@s container-gen" style="margin-top: 0;" uk-grid>
        <div class="uk-width-auto@m uk-visible@m"></div>
        <div class="uk-grid-item-match" style="margin-bottom: 1em">
              <div class="uk-card uk-card-default uk-card-body container-reserva">
                  <h3><?=$reser?></h3>
                  <p><?=$reserva?></p>
              </div>
        </div>
        <div class="uk-grid-item-match container-fecha">
              <div class="uk-card uk-card-default uk-card-body subcontainer-fecha">
                  <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1">
                              <div class="uk-flex uk-flex-center fecha">
                                  <p style="margin: 0; font-size: 1.5em;"><?=$selec?></p>
                              </div>
                <?php
                  echo '
                    <div style="color: black">
                      
                      <div style="text-align: center">
                          <p class="fecha-disponible">'.$dispon.'</p>
                      </div>
                      
                      <ul class="uk-subnav uk-subnav-pill uk-flex uk-flex-between uk-margin-remove" uk-switcher="connect: .colores">';
                        $sql="SELECT DISTINCT 
                          productosexistencias.talla,
                          productostalla.txt
                          FROM productosexistencias 
                          INNER JOIN productostalla ON productostalla.id = productosexistencias.talla
                          WHERE productosexistencias.producto = $id 
                          AND productosexistencias.estatus = 1
                          ORDER BY productostalla.txt";
                        //echo $sql;    
                        $CONSULTA1 = $CONEXION -> query($sql);
                        while ($rowCONSULTA1 = $CONSULTA1 -> fetch_assoc()) {
                          $tallaID=$rowCONSULTA1['talla'];
                          echo '
                              <li><a class="seleccionartalla fechas-seleccionables " style="background-color: black; margin: 1em; color: white; font-weight: bold; padding: 1em" href="#">'.$rowCONSULTA1['txt'].'</a></li>';
                        }

                        echo '
                      </ul>
                    
                      
                    <div>
                    <ul class="uk-switcher colores uk-margin">';
                      $CONSULTAFe = $CONEXION -> query($sql);
                      while ($rowCONSULTAFe = $CONSULTAFe -> fetch_assoc()) {
                          $tallaID=$rowCONSULTAFe['talla'];
                          $sqlfe="SELECT * FROM productostalla WHERE id = $tallaID";
                          $CONSULTAFechas = $CONEXION -> query($sqlfe);
                          $row_CONSULTAFechas = $CONSULTAFechas-> fetch_assoc();
                          $fechaini = $row_CONSULTAFechas['fechainicio'];
                          $fechafin = $row_CONSULTAFechas['fechafinal'];

                        echo '<li>
                                  <div style="text-align: center;">
                                <p class="fechaInicioFin">Inicia: '.$fechaini.' Termina: '.$fechafin.' </p>
                                  </div>
                              </li>';
                      
                      }
                      echo '</ul>

                    </div>
                    <div class="">
                      
                    <div>
                      <ul class="uk-switcher colores uk-margin seleccionproducto">';
                      $cuentaTalla = 0;
                        $sql="SELECT DISTINCT 
                          productosexistencias.talla,
                          productostalla.txt
                          FROM productosexistencias 
                          INNER JOIN productostalla ON productostalla.id = productosexistencias.talla
                          WHERE productosexistencias.producto = $id 
                          AND productosexistencias.estatus = 1
                          ORDER BY productostalla.txt";
                        $CONSULTA1 = $CONEXION -> query($sql);
                        $numTallas = $CONSULTA1->num_rows;
                        if ($numTallas>0) {
                          while ($rowCONSULTA1 = $CONSULTA1 -> fetch_assoc()) {
                            $tallaID=$rowCONSULTA1['talla'];
                            $tallaName=$rowCONSULTA1['txt'];
                            echo '
                                <li>
                          <div uk-grid class="uk-flex uk-flex-center">';
                            $CONSULTA2 = $CONEXION -> query("SELECT * FROM productosexistencias WHERE producto = $id AND talla = $tallaID AND estatus = 1");
                            while($rowCONSULTA2 = $CONSULTA2 -> fetch_assoc()){

                              $itemId=$rowCONSULTA2['id'];
                              $colorID=$rowCONSULTA2['color'];
                              $existencias=$rowCONSULTA2['existencias'];
                              $existenciasTooltip=($existencias==0)?'uk-tooltip="Agotado"':'';
                              $seleccionable=($existencias==0)?'':'item';

                              if(!isset($selectedId) AND $existencias>0){
                                $selectedId=$itemId;
                                $max=$existencias;
                                $selectedClass='colorseleccionado';
                                $firstTalla=$tallaName;
                              }else{
                                $selectedClass='';
                              }

                              $CONSULTA3 = $CONEXION -> query("SELECT * FROM productoscolor WHERE id = $colorID");
                              $numColors = $CONSULTA3->num_rows;
                              if ($numColors>0) {
                                $rowCONSULTA3 = $CONSULTA3 -> fetch_assoc();

                                if(!isset($colorCanged) AND $existencias>0){
                                  $colorCanged=1;
                                  $firstColor=$rowCONSULTA3['name'];
                                }

                                $imagen   = 'img/contenido/productoscolor/'.$rowCONSULTA3['imagen'];
                                $colorTxt = (strlen($rowCONSULTA3['imagen'])>0 AND file_exists($imagen))?'background:url('.$imagen.');background-size:cover;':'background:'.$rowCONSULTA3['txt'].';';

                                echo '
                                    <div>
                                      <div  id="'.$itemId.'" class="'.$seleccionable.' uk-button pointer '.$selectedClass.'" '.$existenciasTooltip.' style="'.$colorTxt.'" data-inventario="'.$existencias.'" data-id="'.$itemId.'">
                                        <p class="confirmar-fecha uk-box-shadow-medium" style="margin: 0; padding: .2em; background-color: #ffffff; "><label><input style="border: solid green 1px;margin-right: .5em;" class="uk-checkbox" type="checkbox"></label>'.$conf.'</p>
                                      </div>
                                    </div>';
                              }
                            }
                            echo '
                                  </div>
                                </li>';
                          }
                        }
                        echo '
                      </ul>
                    </div>
                    </div>';
                    
                  if ($precio>0) {

                    echo ' 
                      <div class="uk-flex uk-flex-center" style="font-weight: bold;"><span style="color: #ff7d00;">COSTO:</span> $ '.$precio.' </div>
                      <div class="uk-margin text-8 padding-top-50 uk-flex uk-flex-center" id="productoselectedtxt" style="margin: 0; padding:0"></div>

                    <div class="uk-flex uk-flex-center">
                      <input class="cantidad" type="hidden" value="1">
                      <button class="buybutton uk-button uk-text-nowrap botonoff-carrito-personal uk-button-personal" data-id="'.$selectedId.'"><i class="fas fa-cart-plus fa-lg"></i> &nbsp; '.$carro.'</button>
                    </div>
                    ';
                  }
                ?>
                </div>
              </div>
          </div>
        </div>
        <div class="uk-width-auto@m uk-visible@m"></div>
    
    </div>
</section>

<?=$footer?>

<script>
  

  $('#seleccionartalla').click(function() {
    
    $('.item').removeClass('colorseleccionado');
    $('.item-'+talla+'-0').addClass('colorseleccionado');
    var id = $('.item-'+talla+'-0').attr('data-id');
    var inventario = $('.item-'+talla+'-0').attr('data-inventario');
    dameItem(id,inventario);

  });

  $('.item').click(function(){
    var id = $(this).attr('data-id');
    var inventario = $(this).attr('data-inventario');
    $('.buybutton').removeClass( "botonoff-carrito-personal" ).addClass('uk-button-personal');
    dameItem(id,inventario);
  });

  function dameItem(id,inventario){
    $('.buybutton').attr('data-id', id);
    $('.cantidad').attr('max', inventario);
    $('.item').removeClass('colorseleccionado');
    $('#'+id).addClass('colorseleccionado');
    $.ajax({
      method: "POST",
      url: "includes/acciones.php",
      data: {
        tallaycolor: 1,
        id: id,
        inventario: inventario
      }
    })
    .done(function( response ) {
      console.log(response);
      datos = JSON.parse(response);
      $('#productoselectedtxt').html(datos.xtras);
    });
  }
  
  // Agregar al carro
  $(".buybutton").click(function(){
    var id=$(this).attr("data-id");
    var cantidad=$(".cantidad").val();
    var l=id.length;
    //console.log( id + ' - ' + cantidad );
    if (l>0) {
      $.ajax({
        method: "POST",
        url: "addtocart",
        data: { 
          id: id,
          cantidad: cantidad,
          addtocart: 1
        }
      })
      .done(function( response ) {
        console.log( response );
        datos = JSON.parse(response);
        UIkit.notification.closeAll();
        UIkit.notification(datos.msj);
        $(".cartcount").html(datos.count);
        $("#cotizacion-fixed").removeClass("uk-hidden");
      });
    }
  });


  $(".cantidad").keyup(function() {
    var inventario = $(this).attr("data-inventario");
    var cantidad = $(this).val();
    inventario=1*inventario;
    cantidad=1*cantidad;
    if(inventario<=cantidad){
      $(this).val(inventario);
    }
    console.log(inventario+" - "+cantidad);
  })
  $(".cantidad").focusout(function() {
    var inventario = $(this).attr("data-inventario");
    var cantidad = $(this).val();
    inventario=1*inventario;
    cantidad=1*cantidad;
    if(inventario<=cantidad){
      //console.log(inventario*2+" - "+cantidad);
      $(this).val(inventario);
    }
  })



  $("#seleccionartalla").change(function(){
    var valor = $(this).val();
    UIkit.switcher("#colores").show(valor);
  });

</script>

<?=$scriptGNRL?>

</body>
</html>