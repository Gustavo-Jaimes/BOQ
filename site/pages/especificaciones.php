<!DOCTYPE html>
<?=$headGNRL?>
<body>
  
<?=$header?>
<?php
$sql = "SELECT * FROM productos WHERE id = $id";
        $consultaPro = $CONEXION->query($sql);
        $rowCONSULTA = $consultaPro->fetch_assoc();
        $guia = $rowCONSULTA['guia'];


        if ($rowCONSULTA['precio']>0) {
            $descuento = $rowCONSULTA['descuento'];
            $precio = ($descuento>0)?'
                <del class="text-8 uk-text-light uk-text-muted">Antes: $'.number_format(($rowCONSULTA['precio']),2).'</del><br>
                <div class="" style="min-height: 35px; width: 250px;">
                  $ <span class="text-lg">'.number_format(($rowCONSULTA['precio']*(100-$descuento)/100),2).' Mx</span>
                </div>':'
                <div class="" style="height: 35px; min-width: 250px; max-width: 250px;">
                  $ <span class="text-lg">'.number_format(($rowCONSULTA['precio']*(100-$descuento)/100),2).' Mx</span>
                </div>';
            
        }else{
            $precio = '';
        }

?>

<div class="" uk-grid>
    <!-- Carousel de especificaciones -->
    <div class="uk-width-expand@m ">
        <div  uk-slideshow>
            <div class="uk-position-relative uk-visible-toggle uk-dark slider-espe" tabindex="-1">
                <ul class="uk-slideshow-items">
                    <?php
                    $sqlPic = "SELECT * FROM productospic WHERE producto = $id";

                    $consultaPic = $CONEXION->query($sqlPic);
                    while ($rowConsultaPic = $consultaPic->fetch_assoc()) {
                         ?>
                         <li class="uk-flex uk-flex-center">
                            <img src="./img/contenido/productos/<?=$rowConsultaPic['imagen']?>" alt="">
                        </li>
                     <?php }  ?>
                    
                </ul>
                 <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>

            </div>
        </div>
    </div>

    <div class="uk-width-1-4@m especificaciones-info">
        <div class="especificaciones-container">
          <div class="uk-text-left" style="padding-left: 2em" uk-grid>
            <div class="especificaciones-small uk-width-1-1@m uk-text-left" >
                <div style="color: black; font-size: 3em; line-height: 1em"><?=$rowCONSULTA['titulo']?></div>
                <div style="color:black; font-size: 0.5em">DOMINA LA MONTAÑA</div>
            </div>
            <div class="especificaciones-small uk-width-1-1">
                <?php echo'
                          <div class="uk-margin">
            
                <div>
                  Tallas disponibles
                </div>
                
                <ul class="uk-subnav uk-subnav-pill uk-flex-left" uk-switcher="connect: #colores">
                ';
                  $sql="SELECT DISTINCT 
                    productosexistencias.talla,
                    productostalla.txt
                    FROM productosexistencias 
                    INNER JOIN productostalla ON productostalla.id = productosexistencias.talla
                    WHERE productosexistencias.producto = $id 
                    AND productosexistencias.estatus = 1
                    ORDER BY productostalla.txt";
       
                  $CONSULTA1 = $CONEXION -> query($sql);
                  while ($rowCONSULTA1 = $CONSULTA1 -> fetch_assoc()) {
                    $tallaID=$rowCONSULTA1['talla'];
                    echo '
                        <li value="'.$tallaID.'"><a href="#">'.$rowCONSULTA1['txt'].'</a></li>
                        ';
                  }

                  
                  echo '
                  
                </ul>
                
                     <div class="padding-top-20">
                       COLOR
                     </div>
                 </div>

              <div>
                <ul id="colores" class="uk-switcher uk-margin seleccionproducto">';
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
                            <div uk-grid>';

                      $CONSULTA2 = $CONEXION -> query("SELECT * FROM productosexistencias WHERE producto = $id AND talla = $tallaID AND estatus = 1");
                      while($rowCONSULTA2 = $CONSULTA2 -> fetch_assoc()){

                        $itemId=$rowCONSULTA2['id'];
                        $colorID=$rowCONSULTA2['color'];
                        //$colorName=$rowCONSULTA2['name'];
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

                          $imagen   = 'img/contenido/varios/'.$rowCONSULTA3['imagen'];
                          $colorTxt = (strlen($rowCONSULTA3['imagen'])>0 AND file_exists($imagen))?'background:url('.$imagen.');background-size:cover;':'background:'.$rowCONSULTA3['txt'].';';

                          echo '
                              <div >
                                <div id="'.$itemId.'" class="'.$seleccionable.' uk-border-circle pointer '.$selectedClass.'" '.$existenciasTooltip.' style="'.$colorTxt.'width:20px;height:20px;" data-inventario="'.$existencias.'" data-id="'.$itemId.'">
                                  &nbsp;
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
                  </div>';?>
            </div>
            <input hidden class="cantidad uk-input input-number" type="number" value="1" min="1" style="width: 60px; background: #ecf5fe;">

            
        </div>
                 <div class="uk-width-1-1@m especificaciones-small-letter" style="padding-left: 1em; text-align: left;">
                    <p style="color: black"><?=$rowCONSULTA['txt']?></p>
                    <p style="font-weight: 800; font-size: 1.5em;margin-top: 0; color: black "><?=$precio?></p>
                </div>
                  <div class="especificaciones-rutas uk-align-left uk-width-1-1@m">
                    <?php if(!empty($rowCONSULTA['especificaciones'])){ ?><a class="ancla" href="#especificaciones">ESPECIFICACIONES</a><br><?php } ?>
                    <?php if($rowCONSULTA['geometry']!=0){ ?> <a class="ancla" href="#geometry">GEOMETRY</a><br> <?php } ?>
                    <?php if(!empty($guia)){ ?><a class="ancla" href="#guia-tallas">GUIA DE TALLAS</a><br> <?php } ?>
                    <?php if(!empty($rowCONSULTA['relacionados'])){?><a class="ancla" href="#relacionados">PRODUCTOS RELACIONADOS</a> <?php } ?>
                  </div><br>
                  <div class="uk-width-1-1@m" style="padding-left: 1em">
                 <?php echo'
                <button class="buybutton uk-button uk-button-default uk-button-personal-deta"  style="color:black; background-color: red; font-size:1em; margin-bottom:5em" data-id="'.$selectedId.'">&nbsp; Cotizar</i></button>';?>
            </div>
        </div>
        
    </div>
</div>


<!-- Tabla de especificaciones -->
<?php if(!empty($rowCONSULTA['especificaciones'])){ ?>
<div uk-width-1-1@m  id="especificaciones">
  <h1 class="tabla-container-h1" style="letter-spacing: 3px;">Especificaciones</h1>
</div>

<div class="uk-grid-small uk-flex uk-flex-left" uk-grid>
    
    <div class="uk-width-1-2@m tabla_espe" style="padding-left: 1.3em" >
       <?php echo $rowCONSULTA['especificaciones'] ?>      
    </div>
  
</div>
<?php } ?>
 <!-- Geometry -->
<?php if($rowCONSULTA['geometry']!=0){ ?>
 <div class="" uk-grid id="geometry">
    <div class="uk-width-1-1@m">
        <h1 class="tabla-container-h1">Geometry</h1>
    </div>
    <div class="uk-flex uk-flex-center uk-flex-middle uk-width-1-1@m"  style="max-height:35;">
         <img data-src="./img/design/geometry.png" style="max-height: 30em;" uk-img>
    </div>
</div>
<?php } ?>



 <!-- Guia de tallas -->
 <?php if(!empty($guia)){
    $Consulta_Guia = $CONEXION->query("SELECT * FROM guiaspic WHERE $guia = producto ORDER BY orden LIMIT 1");
    $rowConsulta_Guia = $Consulta_Guia->fetch_assoc();

  ?>
 <div class="uk-width-1-1@m" id="guia-tallas">
         <h1 class="tabla-container-h1">Guia de tallas</h1>
    </div>
<div class="uk-text-left" uk-grid >
    
    <div class="uk-flex uk-flex-left uk-flex-middle  uk-flex-center uk-width-1-1@m"  style="max-height:35em; margin-left: 1em">
         <img data-src="./img/contenido/guias/<?=$rowConsulta_Guia['imagen']?>" style="max-height: 35em; width: 60em" uk-img>
    </div>
</div>
<?php }?>

<!-- <div class="uk-text-center" uk-grid>
    <div class="uk-width-auto@m">
        <div class="uk-card"></div>
    </div>
    <div class="uk-width-expand@m uk-text-center">
        <div>
            <div class="subcontainer-item">
                <p>SM</p>
            </div>
        </div>
        <div>
            <div class="subcontainer-item">
                <p>MD</p>
            </div>
        </div>
        <div>
            <div class="subcontainer-item">
                <p>LG</p>
            </div>
        </div>
    </div>
    <div class="uk-width-auto@m">
        <div class="uk-card"></div>
    </div>
</div> -->
<?php if(!empty($rowCONSULTA['relacionados'])){?>
<div uk-width-1-1@m>
  <h1 class="tabla-container-h1" style="color: red" id="relacionados">RELACIONADOS</h1>
</div>

<div class="uk-child-width-expand@s uk-text-center uk-grid-match" uk-grid>
      <div uk-slider>
        <ul class="uk-slider-items uk-child-width-1-1@s uk-child-width-1-4@m uk-grid" style="margin-bottom:.1em">
          <?php

          foreach ($ProRelacionados as $value) {
            if ($value != "" ) {
               $sql = "SELECT id FROM productos WHERE id = $value";
                  $consulta_rel = $CONEXION->query($sql);
                  $rowCONSULTA_rel = $consulta_rel->fetch_assoc();
                   echo' <li>';
                             echo item($rowCONSULTA_rel['id']);
                     echo'   </li>';
            }
          }
            ?>
        </ul>
    </div>
</div>
<?php } ?>



<?=$footer?>

<?=$scriptGNRL?>
<script type="text/javascript">
      $('#seleccionartalla').change(function() {
    var talla = $(this).val();
    console.log(talla);
    $('.item').removeClass('colorseleccionado');
    $('.item-'+talla+'-0').addClass('colorseleccionado');
    var id = $('.item-'+talla+'-0').attr('data-id');
    var inventario = $('.item-'+talla+'-0').attr('data-inventario');
    dameItem(id,inventario);

  });

  $('.item').click(function(){
    var id = $(this).attr('data-id');
    var inventario = $(this).attr('data-inventario');
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
    console.log( id + ' - ' + cantidad );
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

<script type="text/javascript">
  $(document).ready(function() {
  $('.ancla').click(function() {
    var destino = $(this.hash);
    if (destino.length == 0) {
      destino = $('a[name="' + this.hash.substr(1) + '"]');
    }
    if (destino.length == 0) {
      destino = $('html');
    }
    $('html, body').animate({ scrollTop: destino.offset().top - 90 }, 1000);
    return false;
  });
});
</script>

</body>
</html>