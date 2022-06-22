<!DOCTYPE html>
<?=$headGNRL?>
<body>
  
<?=$header?>

<div class="uk-width-1-1@m uk-grid-small uk-flex uk-flex-center uk-margin-remove" uk-grid>
    <img src="./img/design/banner-bici.png" alt="">
</div>

<!-- ------------------------------------- -->
<div class="uk-grid-small padding-h-20" uk-grid>
    <div class="uk-width-1-5@m uk-flex uk-flex-middle">
        <div class="uk-flex uk-flex-right">
           <img style="background-color: black" src="./img/design/logoBike.png" alt="">
           <div class="uk-flex uk-flex-center uk-flex-middle" style="margin-left:.5em;border: solid green 1px; width:3em; background-color: black;" >
                <div>
                    <a class="uk-navbar-toggle" href="#"><i class="fas fa-search" style="color: white;"></i></a>
                    <div class="uk-navbar-dropdown" style="width: 40vw" uk-drop="mode: click; cls-drop: uk-navbar-dropdown; boundary: !nav">
                        <div class="uk-grid-small uk-flex-middle" uk-grid>
                            <div class="uk-width-expand">
                                <form class="uk-search uk-search-navbar uk-width-1-1">
                                    <input class="uk-search-input" type="search" placeholder="Buscar" autofocus>
                                </form>
                            </div>
                            <div class="uk-width-auto">
                                <a class="uk-navbar-dropdown-close" href="#" uk-close></a>
                            </div>
                        </div>

                    </div>
                </div>
           </div>
        </div>
    </div>
    <div class="uk-width-expand@m uk-padding-remove">
        <div class="uk-flex uk-flex-left">
            <div class="titulo-tienda"><?=$txtCat?></div>
        </div>
    </div>
</div>
<!-- TIENDA WEB -------------------------------------------- -->
<div class="uk-text-center uk-grid-match uk-visible@m" uk-grid>
    <div class="uk-width-1-4@m">
        <div class="" style="margin-left: 3em">
            <ul class="uk-nav-parent-icon container-menu" uk-nav>
                <?php
                 echo '<li><a class="container-menu-item" href="0_0_0_tienda_wozial">TODO</a></li>';
                    $CONSULTA = $CONEXION -> query("SELECT * FROM productoscat WHERE parent = 0");
                    while ($rowCONSULTA = $CONSULTA -> fetch_assoc()) {
                    $titulo = $rowCONSULTA['txt'];
                    $id = $rowCONSULTA['id'];
               echo' <li class="uk-parent"><a class="container-menu-item" href="#">'.$titulo.'</a>
                        <ul class="uk-nav-sub navbar-menu-bikes-cont"> ';
                        $sqlsub = "SELECT * FROM productoscat WHERE parent = $id";
                        $CONSULTAsub = $CONEXION -> query($sqlsub);
                            while ($rowCONSULTAsub = $CONSULTAsub -> fetch_assoc()) {
                            $titulosub = $rowCONSULTAsub['txt'];
                            $idsub = $rowCONSULTAsub['id'];
                            echo '  
                            <li><a href="'.$idsub.'_0_0_tienda_wozial">'.$titulosub.'</a></li>';
                            }
                            echo '
                        </ul>
                    </li>';
                }
                ?>
            </ul>
        </div>
    </div>

    <div class="uk-width-3-4@m">
    <div uk-slideshow>                <!--es la que imprime el contenido que tiene widgets en esta seccion.    -->
                                      <!--La primera consulta se hace para para  consultar el numero de productos y producir la paguinacion. que solo admita 4 productos en esta paguina y haga   -->
            <ul class="uk-slideshow-items" style="height:40em;"><!--    -->
                <?php
                    $CONSULTA1 = $CONEXION -> query($sqlProd); 
                    $numrows = $CONSULTA1 ->num_rows;
                    $numPag = $numrows/6;
                    $resto = $numrows%6;
                    if($resto!=0){
                       $numPag= $numPag+1;
                    }
                    $ini =0;
                    $recorido =6;
                    for ($i=1; $i <= $numPag; $i++) { 
                        
                    
                ?>
                <li>
                   <div class="uk-child-width-1-3 uk-text-center " uk-grid>
                        <?php
                        $CONSULTA1 = $CONEXION -> query($sqlProd." LIMIT $ini,$recorido");  
                        
                        while($row_CONSULTA1 = $CONSULTA1 -> fetch_assoc()){
                        
                        echo item($row_CONSULTA1['id']);
                        }
                        ?>       
                    </div>
                </li>
                <?php  $ini= $ini+6; }?>
            </ul>
            <ul class="uk-slideshow-nav uk-dotnav uk-flex-center uk-margin"></ul>
        </div>
     
    </div>
</div>
<!--TIENDA MOVIL -------------------------------------------- -->
<div class="uk-grid uk-grid-match uk-flex uk-flex-center uk-child-width-1-1 uk-hidden@m">
    <div style="padding-left: 3em; padding-right: 2em; ">
     <?php
        $CONSULTA3 = $CONEXION -> query($sqlProd);  
        while($row_CONSULTA3 = $CONSULTA3 -> fetch_assoc()){
        
        echo item($row_CONSULTA3['id']);

        }
        ?>  
    </div>
</div>


<?=$footer?>

<?=$scriptGNRL?>

</body>
</html>