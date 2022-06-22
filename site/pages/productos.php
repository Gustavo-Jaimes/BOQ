<!DOCTYPE html>
<?=$headGNRL?>
<body>

<?=$header?>

<?php
  $prodInicial = $pag*$prodPag;
  $CONSULTA1 = $CONEXION -> query("SELECT * FROM productos");
  $numItems = $CONSULTA1 -> num_rows;
  $CONSULTA4 = $CONEXION -> query("SELECT * FROM productos limit $prodInicial,$prodPag")
?>


<div class="uk-text-center" uk-grid>
    <div class="uk-width-expand@m" style="">
        <div class="conta-productos">
             <h1>productos frescos del campo</h1>
             <div class="uk-flex uk-flex-center"><hr style="width: 8em" class="raya"></div>
             <p style="padding: 1em">Lorem ipsum dolor sit amet consectetur adipisicing elit. Delectus aliquam <br> 
                doloremque porro rerum quam ad veniam id nisi soluta reiciendis voluptas <br>
                 officiis in sequi fugit, laudantium aspernatur corrupti nemo? Dolorum.</p>
        </div>
    </div>
</div>


 <!-- Productos celular -->
<div class="uk-hidden@s" style="margin-bottom: 4em">
    <div class="uk-grid" style="margin-top: 0px">   
        <div class="uk-width-1-1" class="letrero"><h1 style="padding: 1em; font-size: 2em"></div>
        <div class="uk-width-1-1"> 
            <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider>
            <ul class="uk-slider-items uk-child-width-1-1@s uk-child-width-1-4@m">
                    
                <?php
                   
                   $con = 0;
                   while ($row_CONSULTA1 = $CONSULTA1 -> fetch_assoc()){
                       $id = $row_CONSULTA1['id'];
                    
                    $con++;
                    if($con > 4){
                        $con = 1;
                    }
                        
                   ?>
                   
                    <li>
                       <?=item($row_CONSULTA1['id'],'productos', $con)?>
                    </li>       
                  <!-- This is the modal -->
                   
                
                <?php } ?>

                <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
                <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a>
                
              </li>
            </ul>  
          </div>
        </div>
     </div>

</div>


<!--productos escritorio-->
<div class="uk-width-expand@m uk-visible@m productos-cont uk-grid" style="margin: 2em 0em">
    <div class="uk-width-1-6 uk-flex uk-flex-middle uk-flex-left uk-padding-remove" style="font-size: 3em">  
        <?php
        if ($pag!=0) {
            $link=($pag-1).'_'.$prodPag.'_productos';
            echo'
            <a href="'.$link.'">
            <p style="border: solid green 1px;padding: 5em .5em; border-radius: 1px 15px 15px 1px ;"> < </p></a>';
        }
        
        ?>
      </div>
      
    <div class="uk-width-expand uk-child-width-1-3 uk-text-center " uk-grid>
        <?php
        $con = 0;
        //$CONSULTA2 = $CONEXION -> query("SELECT * FROM productos");
        while ($row_CONSULTA4 = $CONSULTA4 -> fetch_assoc()){
        $id = $row_CONSULTA4['id'];

        $con++;
        
        if($con > 4){
           $con = 1;
        }
        
        ?>
        <div style="margin-top: 20px">
            <?=item($row_CONSULTA4['id'],'productos',$con)?>
         </div>
        <?php } ?>
    </div>
        
        
    <div class="uk-width-1-6 uk-flex uk-flex-middle uk-flex-right" style="font-size: 3em">
          <?php
               $pagTotal=intval($numItems/$prodPag);
            if ($pag!=$pagTotal AND $numItems!=0) {
                $link=($pag+1).'_'.$prodPag.'_productos';
                echo'
                <a href="'.$link.'">
               <p style="border: solid green 1px;padding: 5em .5em; border-radius: 1px 15px 15px 1px ;"> > </p></a>';

            }
        
            ?>
          
      </div>
</div>
<div class="uk-flex uk-flex-right uk-width-expand@m uk-visible@m">
			<ul class="uk-pagination uk-flex-center uk-text-center ">
				<?php
				
                
                $resto=$numItems % $prodPag;
                if (($resto) == 0){
                    $pagTotal=($numItems/$prodPag)-1;
            }

            for ($i=0; $i <= $pagTotal; $i++) { 
                $clase='';
                if ($pag==$i) {
                    $clase='uk-active';
                }
                $link=$i.'_'.$prodPag.'_productos';
                echo '<li><a href="'.$link.'" class="'.$clase.'">'.($i+1).'</a></li>';
            }
			
				?>
			</ul>
		</div>


<!-- <div class="uk-text-center uk-grid-match" uk-grid>
    <div class="uk-width-1-6@m uk-flex-middle">
        <div class="uk-card uk-card-default uk-card-body" style="border: solid green 2px">
            <p class="" style="font-size: 3em"> < </p>
        </div>
    </div>
    <div class="uk-width-expand@m">
        <div class="uk-card uk-card-default uk-card-body" style="border: solid green 2px">
          <img src="./img/design/fruta1.png" alt="Manzana">
        </div>
    </div>
    <div class="uk-width-expand@m">
        <div class="uk-card uk-card-default uk-card-body" style="border: solid green 2px">
           <img src="./img/design/fruta2.png" alt="">
        </div>
    </div>
    <div class="uk-width-expand@m">
        <div class="uk-card uk-card-default uk-card-body" style="border: solid green 2px">
             <img src="./img/design/fruta3.png" alt="">
        </div>
    </div>
    <div class="uk-width-1-6@m uk-flex-middle">
        <div class="uk-card uk-card-default uk-card-body" style="border: solid green 2px">
           <p style="font-size: 3em"> > </p>
        </div>
    </div>
</div> -->





<?=$footer?>

<?=$scriptGNRL?>

</body>
</html>

