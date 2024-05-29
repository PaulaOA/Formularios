<div id="modalNombreObligatorio" class="modal">
  <div class="modal-content d-flex flex-column align-items-center justify-content-center">
    <h1 class="h3 mb-3 fw-normal text-center">Nombre Obligatorio</h1>
    <p class="text-center">Introduce un nombre de equipo para evaluar</p>
    <button class="btnModal mx-auto close-modal">Aceptar</button>
  </div>
</div>

<div id="modalEnviadas" class="modal">
  <div class="modal-content d-flex flex-column align-items-center justify-content-center">
    <h1 class="h3 mb-3 fw-normal text-center">Enviado</h1>
    <p class="text-center">Las puntuaciones se enviaron correctamente</p>
    <button class="btnModal mx-auto close-modal">Aceptar</button>
  </div>
</div>

<div id="modalPuntuacionGuardada" class="modal">
  <div class="modal-content d-flex flex-column align-items-center justify-content-center">
    <h1 class="h3 mb-3 fw-normal text-center">Guardado</h1>
    <p class="text-center">Las puntuaciones se guardaron correctamente</p>
    <button class="btnModal mx-auto close-modal">Aceptar</button>
  </div>
</div>

<div id="modalGuardarVacias" class="modal">
  <div class="modal-content d-flex flex-column align-items-center justify-content-center">
    <h1 class="h3 mb-3 fw-normal text-center">Items Vacíos</h1>
    <p class="text-center">Hay puntuaciones vacías. ¿Desea guardar igualmente?</p>
    <div>
        <button class="btn btn-secondary close-modal">Volver</button>
        <button class="btn btn-primary close-modal" style="margin-left: 10px;" id="btnConfirmarGuardar">Guardar</button>
    </div>
 </div>
</div>


<div id="modalExistenRegistros" class="modal">
  <div class="modal-content d-flex flex-column align-items-center justify-content-center">
    <h1 class="h3 mb-3 fw-normal text-center">Equipo ya votado</h1>
    <p class="text-center">No se pudieron enviar las votaciones. El equipo ya ha sido votado de forma definitiva</p>
    <button class="btnModal mx-auto close-modal">Aceptar</button>
  </div>
</div>

<div id="modalPuntuacionActualizada" class="modal">
  <div class="modal-content d-flex flex-column align-items-center justify-content-center">
    <h1 class="h3 mb-3 fw-normal text-center">Puntuación actualizada</h1>
    <p class="text-center">Se ha actualizado la puntuación</p>
    <button class="btnModal mx-auto close-modal">Aceptar</button>
  </div>
</div>

<div id="modalNoRegistrado" class="modal">
  <div class="modal-content d-flex flex-column align-items-center justify-content-center">
    <h1 class="h3 mb-3 fw-normal text-center">No registrado</h1>
    <p class="text-center">El nombre de equipo no está registrado. ¿Desea registrarlo?</p>
    <div>
        <button class="btn btn-secondary close-modal">Cancelar</button>
        <button class="btn btn-primary close-modal" style="margin-left: 10px;" id="btnRegistrar">Registrar</button>
    </div>
 </div>
</div>

<div id="modalValorIncorrecto" class="modal">
  <div class="modal-content d-flex flex-column align-items-center justify-content-center">
    <h1 class="h3 mb-3 fw-normal text-center">Valor Incorrecto</h1>
    <p class="text-center">Introduce una puntuación entre 1 y 5</p>
    <button class="btnModal mx-auto close-modal">Aceptar</button>
  </div>
</div>

<div id="modalEquipoRegistrado" class="modal">
  <div class="modal-content d-flex flex-column align-items-center justify-content-center">
    <h1 class="h3 mb-3 fw-normal text-center">Registro correcto</h1>
    <p class="text-center">El equipo se registró con éxito. Ya puede evaluar</p>
    <button class="btnModal mx-auto close-modal">Aceptar</button>
  </div>
</div>

<div id="modalPuntuacionesVacias" class="modal">
  <div class="modal-content d-flex flex-column align-items-center justify-content-center">
    <h1 class="h3 mb-3 fw-normal text-center">Items Vacíos</h1>
    <p class="text-center">Por favor, rellena todos los items antes de enviar</p>
    <button class="btnModal mx-auto close-modal">Aceptar</button>
  </div>
</div>

<div id="modalConfirmarEnviar" class="modal">
  <div class="modal-content d-flex flex-column align-items-center justify-content-center">
    <h1 class="h3 mb-3 fw-normal text-center">¿Enviar?</h1>
    <p class="text-center">Las puntuaciones serán definitivas y no se podrán modificar</p>
    <div>
        <button class="btn btn-secondary close-modal" id="btnCancelarEnviar">Cancelar</button>
        <button class="btn btn-primary close-modal" style="margin-left: 10px;" id="btnConfirmarEnviar">Enviar</button>
    </div>
  </div>
</div>

<div id="modalPuntuacionesTemporales" class="modal">
  <div class="modal-content d-flex flex-column align-items-center justify-content-center">
    <h1 class="h3 mb-3 fw-normal text-center">Equipo votado</h1>
    <p class="text-center">El equipo ya ha sido evaluado pero puedes modificar las puntuaciones</p>
    <button class="btnModal mx-auto close-modal" id="btnConsultar">Consultar</button>
  </div>
</div>

<div id="modalPuntuacionDefinitiva" class="modal">
  <div class="modal-content d-flex flex-column align-items-center justify-content-center">
    <h1 class="h3 mb-3 fw-normal text-center">Puntuaciones definitivas</h1>
    <p class="text-center">El equipo ya fue votado y no se pueden modificar las puntuaciones</p>
    <button class="btnModal mx-auto close-modal">Aceptar</button>
  </div>
</div>

<div id="modalSinPuntuar" class="modal">
  <div class="modal-content d-flex flex-column align-items-center justify-content-center">
    <h1 class="h3 mb-3 fw-normal text-center">Sin puntuaciones</h1>
    <p class="text-center">El equipo está registrado pero aún no ha sido evaluado</p>
    <button class="btnModal mx-auto close-modal">Aceptar</button>
  </div>
</div>

<div id="modalItemsEspecialesIncompletos" class="modal">
  <div class="modal-content d-flex flex-column align-items-center justify-content-center">
    <h1 class="h3 mb-3 fw-normal text-center">Elige una opción</h1>
    <p class="text-center">Por favor, en la categoría "Vídeo Técnico" escoge una de las opciones y completa los items</p>
    <button class="btnModal mx-auto close-modal">Aceptar</button>
  </div>
</div>

<div id="modalItemsEspeciales" class="modal">
  <div class="modal-content d-flex flex-column align-items-center justify-content-center">
    <h1 class="h3 mb-3 fw-normal text-center">Elige una opción</h1>
    <p class="text-center">Por favor, en la categoría "Vídeo Técnico" no introduzcas puntuaciones en ambas opciones</p>
    <button class="btnModal mx-auto close-modal">Aceptar</button>
  </div>
</div>