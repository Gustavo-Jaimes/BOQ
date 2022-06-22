<!DOCTYPE html>
<?=$headGNRL?>
<body>
  
<?=$header?>

<div class="container-agendar" uk-grid>
    <div class="uk-width-1-3@m uk-visible@s">
        <div class="uk-background-cover uk-light" data-src="./img/design/banner-contacto.png" uk-img style="background-position:left;height:100%;">
        </div>
    </div>

    <div class="uk-width-expand@m padding-v-50 uk-flex uk-flex-middle container-form" >
            <div class="uk-margin-auto-vertical container-form-sub">
                <h1 class="uk-align-left@m">Agenda tu demo ride</h1>
                    <div class="uk-width-1-1@m">
                       <input class="form-contac form-contac-movil text-xl-contac" id="agendarnombre" name="agendarnombre" type="text" placeholder="tu nombre:" autocomplete="off">
                    </div>
                    <div class="uk-width-1-1@m">
                      <input class="form-contac form-contac-movil text-xl-contac" id="agendaremail" name="agendaremail" type="email" placeholder="correo:" autocomplete="off">
                    </div>
                    <div class="uk-width-1-1@m">
                      <input class="form-contac form-contac-movil text-xl-contac" id="agendartelefono" name="agendartelefono" type="text" placeholder="whatsapp:" autocomplete="off">
                    </div>
                    <div class="uk-width-1-1@m">
                      <input class="form-contac form-contac-movil text-xl-contac" id="agendarmensaje" name="agendarmensaje" type="text" placeholder="mensaje:" autocomplete="off">
                    </div>

                    <div class="uk-width-1-1@m uk-flex uk-flex-left" >
                      <ul class="uk-nav uk-navbar-transparent uk-margin-auto-vertical uk-width-1-1@m" uk-nav="">
                      <li class="uk-parent uk-text-left agendar-llamada-li">
                        <a style="" class="form-agenda" href="#">Agendar llamada</a>
                          <ul class="uk-nav-sub" hidden="">
                            <div class="uk-grid" style="font-size: 0.5em;">
                              <div class="uk-width-1-3@s" style="margin-right: 20px; padding-top: 10px " >
                                <input class="" style=" width: 200px" id="agendarfecha" name="agendarfecha" type="date" autocomplete="off">
                              </div>
                              <div class="uk-width-1-3@s" style="padding-top: 10px ">
                                <input class="" style=" width: 200px" id="agendarhora" name="agendarhora" type="time" autocomplete="off">
                              </div>
                            </div>
                          </ul>
                      </li>
                     </ul>
                    </div>     

                    <div class="uk-width-1-1@m uk-text-left" style="margin-top: 10px">
                      <button class="uk-button button-cotiza-dark uk-padding-remove contac-enviar" id="agendarsend">Enviar ></button>
                    </div>         
            </div>
    </div>
</div>
<?=$footer?>

<?=$scriptGNRL?>

</body>
</html>