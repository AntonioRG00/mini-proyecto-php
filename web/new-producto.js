let dialog
$(function () {
  /** Configuración del diálogo */
  dialog = $("#dialog-formAddRow").dialog({
    autoOpen: false,
    height: 420,
    width: 350,
    modal: true,
    buttons: {
      "Aplicar": function(){
        $('#formAddRow').submit()
        dialog.dialog("close");
      },
      "Cancelar": function () {
        dialog.dialog("close");
      }
    },
    close: function () {
      $("#formAddRow").trigger("reset");
    }
  });

  /** Capturamos el submit */
  dialog.find("form").on("submit", function(event) {
    event.preventDefault(event);
    let tipo = document.getElementById('formAddRow').getAttribute('tipo')
    if(tipo == "update"){
      updateRow();
    } else {
      insertRow();
    }
  });
});

/** Prepara la consulta de update */
function prepararUpdate(object){
  dialog.dialog('option','title', 'Modificando el objeto ' + object.name)
  document.getElementById('formAddRow').setAttribute('tipo','update')
  document.getElementById('formAddRow').setAttribute('idObjecto',object.name)
  dialog.dialog("open");
}

/** Prepara la consulta de inserción */
function prepararInsert(){
  dialog.dialog('option','title', 'Añadir un nuevo objeto')
  document.getElementById('formAddRow').setAttribute('tipo','insert')
  dialog.dialog("open");
}