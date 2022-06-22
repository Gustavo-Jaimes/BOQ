<?php


// CARRO DE COMPRA       
  //unset($_SESSION['carro']);
  if (isset($_POST['emptycart'])) {
    unset($_SESSION['carro']);
  }
  
   $carroTotalProds =0 ;

  if(isset($_SESSION['carro'])){
    $arreglo=$_SESSION['carro'];
  }

  // Remover artículos del carro
  if (isset($_POST['removefromcart'])) {
    $id=$_POST['id'];
    $arregloAux=$_SESSION['carro'];
    unset($arreglo);
    $num=0;
    foreach ($arregloAux as $key => $value) {
      if ($id!=$value['Id']) {
        $arreglo[]=array('Id'=>$arregloAux[$num]['Id'],'Cantidad'=>$arregloAux[$num]['Cantidad']);
      }
      $num++;
    }
    $_SESSION['carro']=$arreglo;
  }

  // Agregar artículos al carro
  if (isset($_POST['addtocart'])) {
    if (isset($_POST['cantidad']) and $_POST['cantidad']!==0 and $_POST['cantidad']!=='') {
      $id=$_POST['id'];

      $carroTotalProds+=$_POST['cantidad'];
      $arregloNuevo[]=array('Id'=>$id,'Cantidad'=>$_POST['cantidad']);

      if (!isset($arreglo)) {
        $arreglo=$arregloNuevo;
      }else{
        $arregloAux=$arreglo;
        unset($arreglo);
        $num=0;
        foreach ($arregloAux as $key => $value) {
          if ($id!=$arregloAux[$num]['Id']) {
            $arreglo[]=array('Id'=>$arregloAux[$num]['Id'],'Cantidad'=>$arregloAux[$num]['Cantidad']);
          }else{
            $carroTotalProds-=$arregloAux[$num]['Cantidad'];
          }
          $num++;
        }
        if ($_POST['cantidad']>0) {
          $arreglo[]=array('Id'=>$id,'Cantidad'=>$_POST['cantidad']);
        }
      }
      
      echo '{ "msj":"<div class=\'uk-text-center color-blanco bg-success padding-10 text-lg\'><i class=\'fa fa-check\'></i> &nbsp; Agregado al pedido</div>", "count":'.$carroTotalProds.' }';

      $_SESSION['carro']=$arreglo;
    }
  }

  if (isset($_POST['actualizarcarro'])) {
    $arregloAux=$_SESSION['carro'];
    unset($arreglo);
    $carroTotalProds=0;
    $num=0;
    foreach ($arregloAux as $key => $value) {
      if ($_POST['cantidad'.$num]>0) {
        $arreglo[]=array('Id'=>$arregloAux[$num]['Id'],'Cantidad'=>$_POST['cantidad'.$num]);
        $carroTotalProds+=$_POST['cantidad'.$num];
      }
      $num++;
    }
    $_SESSION['carro']=$arreglo;
  }

  // Si ya hay productos en el carro
  $carroTotalProds=0;
  if(isset($arreglo)){
    foreach ($arreglo as $key => $value) {
      $carroTotalProds+=$value['Cantidad'];
    }
  }

// LIMITAR PALABRAS      
  function wordlimit($string, $length , $ellipsis)
  {
    $words = explode(' ', strip_tags($string));
    if (count($words) > $length)
    {
      return implode(' ', array_slice($words, 0, $length)) ." ". $ellipsis;
    }
    else
    {
      return $string;
    }
  }

// FECHA                 
  // FECHA CORTA
    function fechaCorta($fechaSQL){
      $fechaSegundos=strtotime($fechaSQL);
      $fechaY=date('Y',$fechaSegundos);
      $fechaM=date('m',$fechaSegundos);
      $fechaD=date('d',$fechaSegundos);
      $fechaDay=strtolower(date('D',$fechaSegundos));

      return $fechaD.'-'.$fechaM.'-'.$fechaY;
    }
    
  // FECHA Y HORA
    function fechaHora($fechaSQL){
      $fechaSegundos=strtotime($fechaSQL);
      $fechaY=date('Y',$fechaSegundos);
      $fechaM=date('m',$fechaSegundos);
      $fechaD=date('d',$fechaSegundos);
      $fechaH=date('H',$fechaSegundos);
      $fechaI=date('i',$fechaSegundos);
      $fechaDay=strtolower(date('D',$fechaSegundos));

      return $fechaD.'-'.$fechaM.'-'.$fechaY.'<br>'.$fechaH.':'.$fechaI;
    }
    
  // SOLO HORA
    function soloHora($fechaSQL){
      $fechaSegundos=strtotime($fechaSQL);
      $fechaH=date('H',$fechaSegundos);
      $fechaI=date('i',$fechaSegundos);

      return $fechaH.':'.$fechaI;
    }

  function fechaSQL($fechaSQL){
    $fechaSegundos=strtotime($fechaSQL);

    $fechaY=date('Y',$fechaSegundos);
    $fechaM=date('m',$fechaSegundos);
    $fechaD=date('d',$fechaSegundos);
   
    return $fechaY.'/'.$fechaM.'/'.$fechaD;
  }
  
  // FECHA DIA
    function fechaDisplayDia($fechaSQL){
      $fechaSegundos=strtotime($fechaSQL);
      $fechaY=date('Y',$fechaSegundos);
      $fechaM=date('m',$fechaSegundos);
      $fechaD=date('d',$fechaSegundos);
      $fechaDay=strtolower(date('D',$fechaSegundos));

      switch ($fechaDay) {
        case 'mon':
        $fechaDia='Lunes';
        break;
        case 'tue':
        $fechaDia='Martes';
        break;
        case 'wed':
        $fechaDia='Miércoles';
        break;
        case 'thu':
        $fechaDia='Jueves';
        break;
        case 'fri':
        $fechaDia='Viernes';
        break;
        case 'sat':
        $fechaDia='Sábado';
        break;
        default:
        $fechaDia='Domingo';
        break;
      }
      return $fechaDia;
    }

  // FECHA MES
    function fechaDisplayMes($fechaSQL){
      $fechaSegundos=strtotime($fechaSQL);
      $fechaY=date('Y',$fechaSegundos);
      $fechaM=date('m',$fechaSegundos);
      $fechaD=date('d',$fechaSegundos);
      $fechaDay=strtolower(date('D',$fechaSegundos));

      switch ($fechaM) {
        case 1:
        $mes='enero';
        break;
        
        case 2:
        $mes='febrero';
        break;
        
        case 3:
        $mes='marzo';
        break;
        
        case 4:
        $mes='abril';
        break;
        
        case 5:
        $mes='mayo';
        break;
        
        case 6:
        $mes='junio';
        break;
        
        case 7:
        $mes='julio';
        break;
        
        case 8:
        $mes='agosto';
        break;
        
        case 9:
        $mes='septiembre';
        break;
        
        case 10:
        $mes='octubre';
        break;
        
        case 11:
        $mes='noviembre';
        break;
        
        default:
        $mes='diciembre';
        break;
      }

      return $mes;
    }

  // FECHA LARGA
    function fechaDisplay($fechaSQL){
      $fechaSegundos=strtotime($fechaSQL);
      $fechaY=date('Y',$fechaSegundos);
      $fechaM=date('m',$fechaSegundos);
      $fechaD=date('d',$fechaSegundos);
      $fechaDay=strtolower(date('D',$fechaSegundos));

      switch ($fechaM) {
        case 1:
        $mes='enero';
        break;
        
        case 2:
        $mes='febrero';
        break;
        
        case 3:
        $mes='marzo';
        break;
        
        case 4:
        $mes='abril';
        break;
        
        case 5:
        $mes='mayo';
        break;
        
        case 6:
        $mes='junio';
        break;
        
        case 7:
        $mes='julio';
        break;
        
        case 8:
        $mes='agosto';
        break;
        
        case 9:
        $mes='septiembre';
        break;
        
        case 10:
        $mes='octubre';
        break;
        
        case 11:
        $mes='noviembre';
        break;
        
        default:
        $mes='diciembre';
        break;
      }

      switch ($fechaDay) {
        case 'mon':
        $fechaDia='Lunes';
        break;
        case 'tue':
        $fechaDia='Martes';
        break;
        case 'wed':
        $fechaDia='Miércoles';
        break;
        case 'thu':
        $fechaDia='Jueves';
        break;
        case 'fri':
        $fechaDia='Viernes';
        break;
        case 'sat':
        $fechaDia='Sábado';
        break;
        default:
        $fechaDia='Domingo';
        break;
      }

      return $fechaDia.' '.$fechaD.' de '.$mes.' de '.$fechaY;
    }
// explode y implode array
    function explode_array($string){
      $array = explode(",", $string);
    return $array;
    }
    function implode_array($array){
      $string = implode(",", $array);
      return $string;
    }
// DEPURAR VARIABLES     
  function debug ( $var, $html = true, $backtrace = null ) {

    $id = uniqid ( );

    if ( is_null ( $backtrace ) )
      $backtrace = debug_backtrace ( );

    $debug = "<div id='$id'>" . "<code class=''>" . "<strong>FILE: " . $backtrace [ 0 ] [ 'file' ] . "</strong>" . "<BR />" . PHP_EOL . "<strong>LINE: " . $backtrace [ 0 ] [ 'line' ] . "</strong>" . "<BR />" . PHP_EOL . "<pre>";

    ob_start ( );
    print_r ( $var );
    $dump = ob_get_clean ( );
    $debug .= htmlentities ( $dump );
    $debug .= "</pre>" . "</code>" . "</div>";

    if ( !$html )
      $debug = strip_tags ( $debug );

    echo $debug;
  }

  function breakpoint ( $var, $show_source = false ) {
    $break = debug_backtrace ( );
    debug ( $var, true, $break );
    /*if ( isset ( $this ) )
      unset ( $this );*/
    if($show_source)
      show_source ( $break [ 0 ] [ 'file' ] );
    die ( 'Fin del Brakepoint: ' . date('Y-m-d H:i:s'));

  }

// CARRUSEL              
  // Carousel Inicio
    function carousel($carousel){
      global $CONEXION;
      global $dominio;

      $CONSULTA= $CONEXION -> query("SELECT * FROM configuracion WHERE id = 1");
      $row_CONSULTA = $CONSULTA -> fetch_assoc();
      switch ($row_CONSULTA['slideranim']) {
        case 0:
          $animation='fade';
          break;
        case 1:
          $animation='slide';
          break;
        case 2:
          $animation='scale';
          break;
        case 3:
          $animation='pull';
          break;
        case 4:
          $animation='push';
          break;
        default:
          $animation='fade';
          break;
      }
      $CAROUSEL = $CONEXION -> query("SELECT * FROM $carousel ORDER BY orden");
      $numPics=$CAROUSEL->num_rows;
      if ($numPics>0) {
        echo '
            <!-- Start Carousel -->
            <div uk-slideshow="autoplay:true;ratio:'.$row_CONSULTA['sliderproporcion'].';animation:'.$animation.';min-height:'.$row_CONSULTA['sliderhmin'].';max-height:'.$row_CONSULTA['sliderhmax'].';" class="uk-grid-collapse" uk-grid>
              <div class="uk-visible-toggle uk-width-1-1 uk-flex-first">
                <div class="uk-position-relative">
                  <ul class="uk-slideshow-items">';
                    $num=0;
                    while ($row_CAROUSEL = $CAROUSEL -> fetch_assoc()) {
                      if (strlen($row_CAROUSEL['video'])>0) {
                        $videoUrl=$row_CAROUSEL['video'];
                        $videoPic=$videoUrl;
                        if (strpos($videoPic, 'youtube')) {
                          $pos=strpos($videoPic, 'v');
                          $videoPic=substr($videoPic, ($pos+2));
                        }elseif (strpos($videoPic, 'youtu.be')) {
                          $pos=strrpos($videoPic, '/');
                          $videoPic=substr($videoPic, ($pos+1));
                        }
                        echo '
                          <li>
                          <iframe src="https://www.youtube-nocookie.com/embed/'.$videoPic.'?autoplay=0&amp;showinfo=0&amp;rel=0&amp;modestbranding=1&amp;playsinline=1" frameborder="0" allowfullscreen uk-video="automute: true" uk-cover></iframe>
                          </li>';
                      }else{
                        $caption='';
                        if (strlen($row_CAROUSEL['url'])>0) {
                          $pos=strpos($row_CAROUSEL['url'], $dominio);
                          $target=($pos>0)?'':'target="_blank"';
                          if ($row_CONSULTA['slidertextos']==1 AND strlen($row_CAROUSEL['titulo'])>0 AND strlen($row_CAROUSEL['url'])>0) {
                            $caption='
                            <div class="uk-position-bottom uk-transition-slide-bottom">
                              <div style="min-width:200px;min-height:100px;" class="uk-text-center">
                                <a href="'.$row_CAROUSEL['url'].'" '.$target.' class=" uk-button uk-button-white uk-button-large">
                                  '.$row_CAROUSEL['titulo'].'
                                </a>
                              </div>
                            </div>';
                          }
                        }
                        echo '
                        <li>
                            <img src="img/contenido/'.$carousel.'/'.$row_CAROUSEL['id'].'.jpg" uk-cover>
                        </li>';
                      }
                    }

                    echo '
                  </ul>

                  <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
                  <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>

                </div>
                <ul class="uk-slideshow-nav uk-dotnav uk-flex-center uk-margin"></ul>
              </div>
            </div>
            <!-- End Carousel -->
            ';
      }
      mysqli_free_result($CAROUSEL);
    }

// ITEM                  
  function item($id){
    global $CONEXION;
    global $caracteres_si_validos;
    global $caracteres_no_validos;
  
    $widget    = '';
    $style     = 'max-width:200px;';  
    $noPic     = 'img/design/camara.jpg';
    $rutaPics  = 'img/contenido/servicios/';
		$firstPic  = "./img/design/camara.jpg";

    $CONSULTA10 = $CONEXION -> query("SELECT * FROM servicios WHERE id = $id");  
		$row_CONSULTA10 = $CONSULTA10 -> fetch_assoc();
		$titulo = $row_CONSULTA10['titulo'];
    $titulo= $row_CONSULTA10['titulo_en'];
    $descripcion = $row_CONSULTA10['descripcion'];
    $descripcion = $row_CONSULTA10['descripcion_en'];
		$id = $row_CONSULTA10['id'];
		$link = $id.'_material'; // aqui declaramos la ruta de especificaciones. Esta ruta lleva el id del producto y concatena un _ y la ruta especificaciones
    // Fotografía
    $CONSULTA4 = $CONEXION -> query("SELECT * FROM serviciospic WHERE producto = $id ORDER BY orden,id LIMIT 1");
		while ($row_CONSULTA4 = $CONSULTA4 -> fetch_assoc()){ 
      $firstPic = $rutaPics.$row_CONSULTA4['imagen'];
      $firstPic = (file_exists($firstPic)) ? $firstPic : $noPic;      
    }

    if(isset($_SESSION['idioma'])){
      $idioma = $_SESSION['idioma'];
    }else{
      $idioma = "es";
    }
    
      switch ($idioma) {
        case 'es':
          $titulo = $row_CONSULTA10['titulo'];
          $descripcion = $row_CONSULTA10['descripcion'];

          break;
        case 'en':
          $titulo =  $row_CONSULTA10['titulo_en'];
          $descripcion = $row_CONSULTA10['descripcion_en'];
          break;
        
        default:
        $titulo =   $row_CONSULTA10['titulo'];
        $descripcion = $row_CONSULTA10['descripcion'];;
          break;
      }

    $widget.='
    <div class="container-card-gen">
          <div class="uk-card uk-card-default uk-grid-collapse uk-child-width-1-2@s uk-margin" uk-grid>
								<div class="uk-card-media-left uk-cover-container"> 
                    <a href="'.$link.'"><img src="'.$firstPic.'" alt="" style="width: 19em; height: 10em;" uk-cover></a>
								</div>
								<div>
									<div class="uk-card-body uk-padding-remove" style="margin: .5em; 1em">
                    <div><a class="estilo-titulo" href="'.$link.'">'.$titulo.'</a></div>
										<p class="estilo-subtitulo">'.$descripcion.'</p>
									</div>
								</div>
		      </div>
    </div>
    ';

    return $widget;
}

	function item_inicio4($id){
		global $CONEXION;
		global $caracteres_si_validos;
		global $caracteres_no_validos;
	
    $widget    = '';
		$style     = 'max-width:200px;';  
		$noPic     = 'img/design/camara.jpg';
		$rutaPics  = 'img/contenido/productos/';
		$firstPic  = "./img/design/camara.jpg";
	
		$CONSULTA3 = $CONEXION -> query("SELECT * FROM productos WHERE id = $id");  
		$row_CONSULTA3 = $CONSULTA3 -> fetch_assoc();
    $fecha = $row_CONSULTA3['fecha'];
    $ciudad = $row_CONSULTA3['ciudad'];
		$id = $row_CONSULTA3['id'];
		$link = $id.'_material3'; // aqui declaramos la ruta de especificaciones. Esta ruta lleva el id del producto y concatena un _ y la ruta especificaciones
		// Fotografía
		  $CONSULTA4 = $CONEXION -> query("SELECT * FROM productospic WHERE producto = $id ORDER BY orden,id LIMIT 1");
		  while ($row_CONSULTA4 = $CONSULTA4 -> fetch_assoc()) {
			$firstPic = $rutaPics.$row_CONSULTA4['imagen'];
			$firstPic = (file_exists($firstPic)) ? $firstPic : $noPic;     
		 }

    if(isset($_SESSION['idioma'])){
      $idioma = $_SESSION['idioma'];
    }else{
      $idioma = "es";
    }
    
      switch ($idioma) {
        case 'es':
          $detalles = "DETALLES";
          $cupo = "CUPO AGOTADO";
          $titulo = $row_CONSULTA3['titulo'];
          break;
        case 'en':
          $detalles = "DETAILS";
          $cupo = "SPACE SOLD OUT";
          $titulo = $row_CONSULTA3['titulo_en'];
          break;
        
        default:
          $detalles = "DETALLES";
          $cupo = "CUPO AGOTADO";
          break;
      }
	
	
		$widget.='
			 	<div class="uk-child-width-1-1@m container-carousel-box" uk-grid>
						<div class="uk-padding-remove">
							<div class="uk-card card-general">
                    <div class="uk-text-center">
                      <div class="uk-inline-clip uk-transition-toggle container-carousel-img4" style="width: 100%;" tabindex="0">
                            <a href="'.$link.'"><img src="'.$firstPic.'" alt="" class="carousel-cursos-img" style="object-fit: cover;"></a>
                            <div class="titulo-curso-style uk-position-bottom uk-overlay uk-overlay-default uk-padding-remove">
                                <p class="uk-h4 uk-margin-remove">'.$titulo.'</p>
                            </div>
                        </div>
                    </div>
								<div class="uk-child-width-expand@s uk-text-center container-carousel-letrero" uk-grid>
                    <div class="uk-text-center"  uk-grid>
                        <div class="uk-width-1-2@m container-letrero" style="margin: 0">
                          <div class="fecha">'.$fecha.'</div>
                        </div>
                        <div class="uk-width-1-2@m container-letrerocu" style="background-color: white; padding: 0">
                          <div class="cupo">'.$ciudad.'</div>
                        </div>
                        <div class="uk-width-1-2@m container-letrero" style="margin: 0">
                          <div class="detalles"><a href="'.$link.'">'.$detalles.'</a></div>
                        </div>
                        <div class="uk-width-1-2@m container-letrerocu" style="background-color: #ff6b00;">
                          <div class="cupo">'.$cupo.'</div>
                        </div>
                    </div>
							  </div>
						  </div>
				    </div>
        </div>
		';
	
		return $widget;
  }

  function item_inicio5($id){
		global $CONEXION;
		global $caracteres_si_validos;
		global $caracteres_no_validos;
	
    $widget    = '';
		$style     = 'max-width:200px;';  
		$noPic     = 'img/design/camara.jpg';
		$rutaPics  = 'img/contenido/proyectos/';
		$firstPic  = "./img/design/camara.jpg";
	
		$CONSULTA4 = $CONEXION -> query("SELECT * FROM proyectos WHERE id = $id ");  
		$row_CONSULTA4 = $CONSULTA4 -> fetch_assoc();
    $titulo = $row_CONSULTA4['titulo'];
    $titulo = $row_CONSULTA4['titulo_en'];
		$descripcion = $row_CONSULTA4['descripcion'];
    $descripcion = $row_CONSULTA4['descripcion_en'];
		$id = $row_CONSULTA4['id'];
		$link = $id.'_proyectos'; // aqui declaramos la ruta de especificaciones. Esta ruta lleva el id del producto y concatena un _ y la ruta especificaciones
		// Fotografía
    $CONSULTA5 = $CONEXION -> query("SELECT * FROM proyectospic WHERE producto = $id LIMIT 1"); 
    $row_CONSULTA5 = $CONSULTA5 -> fetch_assoc(); 
			$firstPic = $rutaPics.$row_CONSULTA5['imagen'];
			$firstPic = (file_exists($firstPic)) ? $firstPic : $noPic;     
      
      if(isset($_SESSION['idioma'])){
        $idioma = $_SESSION['idioma'];
      }else{
        $idioma = "es";
      }
      
        switch ($idioma) {
          case 'es':
            $titulo = $row_CONSULTA4['titulo'];
            $descripcion = $row_CONSULTA4['descripcion'];
            break;

          case 'en':
            $titulo = $row_CONSULTA4['titulo_en'];
            $descripcion = $row_CONSULTA4['descripcion_en'];
            break;
          
          default:
            $titulo = $row_CONSULTA4['titulo'];
            $descripcion = $row_CONSULTA4['descripcion'];
            break;
        }
	
		$widget.='
          <div class="uk-child-width-1-1@m container-carousel-box" uk-grid>
            <div class="uk-padding-remove">
              <div class="uk-card ">
                <div class="uk-card-media-top container-carousel-img" style=" width: 100%">
                    <a href="'.$link.'"><img src="'.$firstPic.'" alt="" style="object-fit:cover;" class="carousel-img"></a>
                </div>
                <div class="uk-child-width-expand@s uk-text-center container-carousel-letrero" uk-grid>
                  <div class="container">
                    <p class="pproy1" style="margin: 0"><a href="'.$link.'"> '.$titulo.'</a></p>
                    <p class="pproy2" style="margin: 0">'.$descripcion.'</p>
                  </div>
                </div>
            </div>
        </div>
		';
	
		return $widget;
  }

  function item_inicio6($id){
		global $CONEXION;
		global $caracteres_si_validos;
		global $caracteres_no_validos;
	
    $widget    = '';
		$style     = 'max-width:200px;';  
		$noPic     = 'img/design/camara.jpg';
		$rutaPics  = 'img/contenido/galerias/';
		$firstPic  = "./img/design/camara.jpg";
	
		$CONSULTA4 = $CONEXION -> query("SELECT * FROM galeriaspic WHERE id = $id");  
		$row_CONSULTA4 = $CONSULTA4 -> fetch_assoc();
		$descripcion = $row_CONSULTA4['detalle'];
		$titulo = $row_CONSULTA4['alt'];
		$id = $row_CONSULTA4['id'];
		$link = $id.'_especificaciones'; // aqui declaramos la ruta de especificaciones. Esta ruta lleva el id del producto y concatena un _ y la ruta especificaciones
		// Fotografía
			$firstPic = $rutaPics.$row_CONSULTA4['imagen'];
			$firstPic = (file_exists($firstPic)) ? $firstPic : $noPic;     
      
	
		$widget.='
          <div class="uk-child-width-1-1@m container-carousel-box" uk-grid>
            <div class="uk-padding-remove">
              <div class="uk-card ">
                <div class="uk-card-media-top container-carousel-img">
                  <img src="'.$firstPic.'" alt="" style="width: 100% !important; height: 10em" >
                </div>
                <div class="uk-child-width-expand@s uk-text-center container-carousel-letrero" uk-grid>
                  <div>
                    <p class="pproy1">'.$titulo.'</p>
                    <p class="pproy2">'.$descripcion.'</p>
                  </div>
                </div>
            </div>
        </div>
		';
	
		return $widget;
  }

  function item_inicio7($id){
		global $CONEXION;
		global $caracteres_si_validos;
		global $caracteres_no_validos;
	
    $widget    = '';
		$style     = 'max-width:200px;';  
		$noPic     = 'img/design/camara.jpg';
		$rutaPics  = 'img/contenido/galerias/';
		$firstPic  = "./img/design/camara.jpg";
	
		$CONSULTA1 = $CONEXION -> query("SELECT * FROM productos WHERE id = $id");  
		$row_CONSULTA1 = $CONSULTA1 -> fetch_assoc();
    $fecha = fechaDisplay($row_CONSULTA1['fecha']);
		$link = $id.'_material3'; // aqui declaramos la ruta de especificaciones. Esta ruta lleva el id del producto y concatena un _ y la ruta especificaciones
		// Fotografía
			$firstPic = $rutaPics.$row_CONSULTA1['imagen'];
			$firstPic = (file_exists($firstPic)) ? $firstPic : $noPic;    
      
      if(isset($_SESSION['idioma'])){
        $idioma = $_SESSION['idioma'];
      }else{
        $idioma = "es";
      }
      
        switch ($idioma) {
          case 'es':
            $titulo = $row_CONSULTA1['titulo'];
            $descripcion = $row_CONSULTA1['txt'];
            $ciudad = $row_CONSULTA1['ciudad'];
            $detalles = "DETALLES";
            $informes = "INFORMES";
            break;
          case 'en':
            $titulo = $row_CONSULTA1['titulo_en'];
            $descripcion = $row_CONSULTA1['txt_en'];
            $ciudad = $row_CONSULTA1['ciudad'];
            $detalles = "DETAILS";
            $informes = "REPORTS";
            break;
          
          default:
            $detalles = "DETALLES";
            $cupo = "CUPO AGOTADO";
            break;
        }
    
      
		$widget.='
      <div class="uk-card-body uk-padding-remove">
          <h3 class="uk-card-title"><b class="titulo-curso">'.$titulo.'</b></h3>
          <div class="uk-child-width-expand@s uk-text-center" uk-grid uk-height-match="target: > div > .uk-card">
              <div>
                  <div  class="fecha"><b>'.$fecha.'</b></div>
              </div>
              <div>
                  <div class="ciudad"><b>'.$ciudad.'</b></div>
              </div>
          </div>
          <p">'.$descripcion.'</p>
      </div>
      <div class="botones">
          <a class="a1" href="'.$link.'">'.$detalles.'</a>
          <a class="a2" href="./contacto">'.$informes.'</a>
      </div>
      ';
	
		return $widget;
  }


  function item_inicio8($id){
		global $CONEXION;
		global $caracteres_si_validos;
		global $caracteres_no_validos;
	
    $widget    = '';
		$style     = 'max-width:200px;';  
		$noPic     = 'img/design/camara.jpg';
		$rutaPics  = 'img/contenido/servicios/';
		$firstPic  = "./img/design/camara.jpg";
	
		$CONSULTA13 = $CONEXION -> query("SELECT * FROM servicios where id = $id");  
		$row_CONSULTA13 = $CONSULTA13 -> fetch_assoc();
		$titulo = $row_CONSULTA13['titulo'];
    $titulo = $row_CONSULTA13['titulo_en'];
    $descripcion = $row_CONSULTA13['descripcion'];
    $descripcion = $row_CONSULTA13['descripcion_en'];
		$id = $row_CONSULTA13['id'];
		$link = $id.'_material'; // aqui declaramos la ruta de especificaciones. Esta ruta lleva el id del producto y concatena un _ y la ruta especificaciones
	
    // Fotografía
    $CONSULTA14 = $CONEXION -> query("SELECT * FROM serviciospic WHERE producto = $id ORDER BY orden LIMIT 1");  
		while($row_CONSULTA14 = $CONSULTA14 -> fetch_assoc()){
			$firstPic = $rutaPics.$row_CONSULTA14['imagen'];
			$firstPic = (file_exists($firstPic)) ? $firstPic : $noPic;     
    }

    if(isset($_SESSION['idioma'])){
        $idioma = $_SESSION['idioma'];
      }else{
        $idioma = "es";
     }
    
    switch ($idioma) {
      case 'es':
        $titulo = $row_CONSULTA13['titulo'];
        $descripcion = $row_CONSULTA13['descripcion'];
        break;

      case 'en':
        $titulo = $row_CONSULTA13['titulo_en'];
        $descripcion = $row_CONSULTA13['descripcion_en'];
        break;
    }

		$widget.='
      <div class="uk-card uk-grid-collapse uk-child-width-1-2@s uk-margin" uk-grid>
        <div class="uk-card-media-left uk-cover-container container-img">
            <a href="'.$link.'"><img src="'.$firstPic.'"alt="" uk-cover></a>
            <canvas width="400" height="400"></canvas>
        </div>
        <div class="uk-flex uk-flex-middle paginacion-items-servicios">
            <div class="uk-card-body uk-padding-remove container" >
                <h3 class="uk-card-title">'.$titulo.'</h3>
                <p>'.$descripcion.'</p>
            </div>
        </div>
      </div>
      ';
	
		return $widget;
  }

  function item_inicio9($id){
		global $CONEXION;
		global $caracteres_si_validos;
		global $caracteres_no_validos;
	
    $widget    = '';
		$style     = 'max-width:200px;';  
		$noPic     = 'img/design/camara.jpg';
		$rutaPics  = 'img/contenido/guias/';
		$firstPic  = "./img/design/camara.jpg";
	
		$CONSULTA14 = $CONEXION -> query("SELECT * FROM guias where id = $id");  
		$row_CONSULTA14 = $CONSULTA14 -> fetch_assoc();
		$id = $row_CONSULTA14['id'];
		$link = $id.'_material'; // aqui declaramos la ruta de especificaciones. Esta ruta lleva el id del producto y concatena un _ y la ruta especificaciones
	
    // Fotografía
    $CONSULTA15 = $CONEXION -> query("SELECT * FROM guiaspic WHERE producto = $id ORDER BY orden LIMIT 1");  
		$row_CONSULTA15 = $CONSULTA15 -> fetch_assoc();
      $titulo = $row_CONSULTA15['alt'];
      $puesto = $row_CONSULTA15['puesto'];
			$firstPic = $rutaPics.$row_CONSULTA15['imagen'];
			$firstPic = (file_exists($firstPic)) ? $firstPic : $noPic;     

    $CONSULTA16 = $CONEXION -> query("SELECT * FROM guiaspic WHERE producto = $id ORDER BY orden DESC LIMIT 1");  
    $row_CONSULTA15 = $CONSULTA16 -> fetch_assoc();
        $firstPic2 = $rutaPics.$row_CONSULTA15['imagen'];
        $firstPic2 = (file_exists($firstPic2)) ? $firstPic2 : $noPic;

		$widget.='
        <div class="uk-panel container-carousel-nosotros ">
            <a href="#modal-sections'.$row_CONSULTA15['id'].'" uk-toggle><img src="'.$firstPic.'" alt=""></a>
        </div>
        <div class="titulos-instructores">
            <p class="titulo-nombre">'.$titulo.'</p>
            <p class="titulo-puesto" style="margin: 0em">'.$puesto.'</p>
        </div>

        <div id="modal-sections'.$row_CONSULTA15['id'].'" uk-modal>
            <div class="uk-modal-dialog" style="width: 40vw;height: 20vw;">
                <button class="uk-modal-close-default" type="button" uk-close></button>
                <div class="uk-modal-body uk-padding-remove">
                     <img style="width: 100%;height: 100%" src="'.$firstPic2.'" alt="">
                </div>
            </div>
        </div>


      ';
	
		return $widget;
  }

  