<!DOCTYPE html>
<?=$headGNRL?>
<body>
  
<?=$header?>

<?php
    if(isset($_SESSION['idioma'])){
        $idioma = $_SESSION['idioma'];
    }else{
        $idioma = "es";
    }
    
        switch ($idioma) {
            case 'es':
                    $contactanos="CONTACTANOS";
                    $nombre="Nombre";
                    $ciudad="Ciudad";
                    $empresa ="Empresa";
                    $cel = "Telefono";
                    $asunto = "Asunto";
                    $mensaje= "Mensaje";
                    $enviar = "Enviar";
                    $presencia = "PRESENCIA Y COOPERACION ENTRE AMERICA Y EUROPA";
                break;

            case 'en':
                    $contactanos="GET IN TOUCH";
                    $nombre="Name";
                    $ciudad="City";
                    $empresa ="Company";
                    $cel ="Telephone";
                    $asunto = "Affair";
                    $mensaje= "Message";
                    $enviar = "Send";
                    $presencia = "PRESENCE AND COOPERATION BETWEEN AMERICA AND EUROPE";
                break;
        }
?>

<section class="seccion1-contacto">
  <div class="uk-text-center uk-grid-match" uk-grid>
      <div class="uk-width-1-1@m uk-margin-remove container-contactanos" style="background-color: black; height: 2.8em;">
          <div class="uk-text-center" uk-grid>
              <div class="uk-width-expand@m uk-flex uk-flex-middle uk-flex-center">
                  <div class="contacto-p">
                    <p><?=$contactanos?></p>
                  </div>
              </div>
          </div>
      </div>
      <div class="uk-width-1-2@m uk-margin-remove uk-flex uk-flex-middle container-formulario">
          <div class="uk-card uk-card-default uk-card-body formulario">
            <form class="uk-grid-small" uk-grid>
                <div class="uk-width-1-1">
                    <label class="uk-form-label"><?=$nombre?></label>
                    <input class="uk-input" type="text" placeholder="">
                </div>
                <div class="uk-width-1-2@s">
                    <label class="uk-form-label"><?=$ciudad?></label>
                    <input class="uk-input" type="text" placeholder="">
                </div>
                <div class="uk-width-1-2@s">
                    <label class="uk-form-label"><?=$empresa?></label>
                    <input class="uk-input" type="text" placeholder="">
                </div>
                <div class="uk-width-1-2@s">
                    <label class="uk-form-label">Email</label>
                    <input class="uk-input" type="text" placeholder="">
                </div>
                <div class="uk-width-1-2@s">
                    <label class="uk-form-label"><?=$cel?></label>   
                    <input class="uk-input" type="text" placeholder="">
                </div>
                <div class="uk-width-1-1">
                    <label class="uk-form-label"><?=$asunto?></label>
                    <input class="uk-input" type="text" placeholder="">
                </div>
                <div class="uk-width-1-1">
                    <label class="uk-form-label"><?=$mensaje?></label>
                    <textarea class="uk-textarea" placeholder=""></textarea>
                </div>
            </form>
                <div class="uk-flex uk-flex-center container-boton">
                    <button class="uk-button uk-button-default"><?=$enviar?></button>
                </div>
          </div>
      </div>
      <div class="uk-width-1-2@m uk-margin-remove container-paises">
        <div class="uk-text-center uk-grid-match" uk-grid>
          <div class="uk-width-1-1@m uk-margin-remove uk-padding-remove" style="width: 100%;">
              <div class="">
                  <img src="./img/design/contacto.png" style="width: 100%;" alt="">
              </div>
          </div>
          <div class="uk-width-1-1@m uk-margin-remove uk-padding-remove paises">
              <div class="paises-p">
                  <p><?=$presencia?></p>
                  <div class="item">
                    <img src="./img/design/mexico.png" alt="">
                    <img src="./img/design/usa.png" alt="">
                    <img src="./img/design/espana.png" alt="">
                    <img src="./img/design/alemania.png" alt="">
                  </div>
              </div>
          </div>
          <div class="uk-width-1-1@m uk-margin-remove uk-padding-remove direccion">
              <div class="uk-width-1-2@m direccion-p">
                  <p>Direccion: <br> Av. Lapizlazulli 2074 <br> Col. Bosques de la VIctoria, <br> C.P. 45450, Guadalajara, Jal.</p>
              </div>
              <div class="uk-width-1-2@m telefono">
                  <p>Telefono: <br> (33) 36 66 02 11</p>
              </div>
          </div>
        </div>
      </div>
  </div>
</section>

<?=$footer?>

<?=$scriptGNRL?>

</body>
</html>