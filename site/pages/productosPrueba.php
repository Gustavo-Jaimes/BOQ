<!DOCTYPE html>
<?=$headGNRL?>
<body>
  
<?=$header?>

<div>
	<?=carousel('carousel')?>
    
</div>

<!-- <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slideshow>

    <ul class="uk-slideshow-items">
        <li>
            <img src="./img/design/aguacate1.jpg" alt="" uk-cover>
        </li>
        <li>
            <img src="./img/design/aguacate2.jpg" alt="" uk-cover>
        </li>
        <li>
            <img src="./img/design/aguacate3.png" alt="" uk-cover>
        </li>
    </ul>

    <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slideshow-item="previous"></a>
    <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slideshow-item="next"></a>

</div> -->

<!-- seccion del panel informativo -->
<div class="uk-text-center" uk-grid>
    <div class="uk-width-1-3@m">
        <div class="uk-card"><img src="./img/design/logo-nosotros.png" alt=""></div>
    </div>
    <div class="uk-width-expand@m">
        <div class="uk-card banner-somos-container" style="background-color: #f6ebbd">
           <h1 class="banner-somos"><img src="./img/design/zafrumex.png" alt=""></h1><br>
           <?php
            $CONSULTA8 = $CONEXION -> query("SELECT about1 FROM configuracion LIMIT 1");                                                  
              $row_CONSULTA8 = $CONSULTA8 -> fetch_assoc();
            //   echo $row_CONSULTA8['about1'];   Esta es una de las manera de imprimir la consulta dentro de etiwuetas php
            ?>
            <?=$row_CONSULTA8['about1']?>     <!-- Esta es la otra manera de imprimir la consulta  -->

            <button class="uk-button input-personal btn" style="margin-bottom: 6em">EXPLORAR</button>
        </div>
    </div>
</div>


<!-- Seccion de las imagenes y texto -->
<div class="uk-width-1-1 uk-text-center" uk-grid>
    <div class="uk-width-1-2" style="margin-top: 3em">
        <div class="uk-column-1-2 uk-flex uk-flex-center uk-flex-middle">
            <div style="margin-top: 150px">
                <img style="padding: 0px; margin-bottom:-45px; margin-top: -170px" src="./img/design/paso4.png" alt="">
                <div class="raya" style="padding: 0px; margin-bottom:-20px; width: 22em" style="z-index: -1 "></div>
            </div>        
        </div>
    <div>
    <div class="uk-column-1-2">
        <p>
            <h1 style="text-align:right; font-size: 2em"><b>mision</b></h1>
        </p>
    </div>
        <p style="text-align: right;">
        <?php
            $CONSULTA8 = $CONEXION -> query("SELECT about2 FROM configuracion LIMIT 1");                                                  
              $row_CONSULTA8 = $CONSULTA8 -> fetch_assoc();
            //   echo $row_CONSULTA8['about1'];   Esta es una de las manera de imprimir la consulta dentro de etiwuetas php
            ?>
            <?=$row_CONSULTA8['about2']?>     <!-- Esta es la otra manera de imprimir la consulta  -->
 
        </p>
         </div>  
    </div>    
    <div class="uk-width-1-2">

        <div class="uk-grid uk-flex uk-flex-center" uk-grid>
        
        </div>
            
    </div>
</div>


<div class="uk-width-1-1 uk-text-center" uk-grid>
    <div class="uk-width-1-2@m">
        
    </div>    
    <div class="uk-width-1-2@m">

        <div class="uk-grid uk-flex uk-flex-center" uk-grid>
            <div class="uk-column-1-2">
                <p>
                    <h1 style="text-align: right; font-size: 2em"><b>vision</b></h1>
                </p>
            </div>
            <div class="uk-column-1-2 uk-flex uk-flex-center uk-flex-middle">
                <div>
                    <div class="raya" style="padding: 0px; margin-bottom:-20px; width: 22em;" style="z-index: -1 "></div>
                    <img style="padding: 0px; margin-bottom:-20px; margin-top: -170px" src="./img/design/paso1.png" alt="">
                </div>
                          
            </div>
        </div>
        <div>
           <p>
            <?php
                $CONSULTA8 = $CONEXION -> query("SELECT about3 FROM configuracion LIMIT 1");                                                  
                $row_CONSULTA8 = $CONSULTA8 -> fetch_assoc();
                //   echo $row_CONSULTA8['about1'];   Esta es una de las manera de imprimir la consulta dentro de etiwuetas php
                ?>
                <?=$row_CONSULTA8['about3']?>     <!-- Esta es la otra manera de imprimir la consulta  -->
 
            </p>
        </div>       
    </div>
</div>
</div>



<div class="uk-width-expand@m"style="background-color: #f6ebbd" >
    <div class="uk-position-relative uk-visible-toggle uk-light" tabindex="-1" uk-slider>
         <div style="padding: 1em; margin-bottom: 2em">
             <h1 style="color: black; margin-bottom: 0; font-size: 3em">conoce nuestras instalaciones</h1>
             <div class="uk-flex uk-flex-center"><hr style="width: 5em" class="raya"></div>
         </div>
        <ul class="uk-slider-items uk-grid">

            <?php
            $CONSULTA10 = $CONEXION -> query("SELECT * FROM galeriaspic WHERE orden = 99");
            while ($row_CONSULTA10 = $CONSULTA10 -> fetch_assoc()) {
            ?>
        }
            <li>
            <img style="width: 38em; height: 30em; padding-bottom: 1.5em;" src="./img/contenido/galerias/<?=$row_CONSULTA10['imagen']?>" alt="">
            </li>
            <?php } ?>
         </ul>

        <!-- <ul class="uk-slider-items uk-grid">
            <li class="uk-width-4-5">
                <div class="uk-panel">
                    <img style="width: 38em; height: 30em; padding-bottom: 1.5em;" src="./img/design/huerta1.jpg" alt="">
                </div>
            </li>
            <li class="uk-width-4-5">
                <div class="uk-panel">
                    <img style="width: 38em; height: 30em; padding-bottom: 3em;" src="./img/design/huerta2.jpg" alt="">
                </div>
            </li>
            <li class="uk-width-4-5">
                <div class="uk-panel">
                    <img style="width: 38em; height: 30em; padding-bottom: 3em;" src="./img/design/huerta3.jpg" alt="">
                </div>
            </li>
        </ul> -->

        <!-- <a class="uk-position-center-left uk-position-small uk-hidden-hover" href="#" uk-slidenav-previous uk-slider-item="previous"></a>
        <a class="uk-position-center-right uk-position-small uk-hidden-hover" href="#" uk-slidenav-next uk-slider-item="next"></a> -->

      </div>

   </div>

<div class="uk-width-1-1">
  <iframe class="uk-width-expand@m" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7467.254138152041!2d-103.39936815353082!3d20.644052360266993!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8428ae0ed241a9bb%3A0xbb4c3906c38265fd!2sWozial%20Marketing%20Lovers!5e0!3m2!1ses-419!2smx!4v1617074641265!5m2!1ses-419!2smx" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
</div>

<?=$footer?>

<?=$scriptGNRL?>

</body>
</html>