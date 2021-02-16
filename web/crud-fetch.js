/** Borra la fila que fue clickeada*/
function deleteRow(object) {
  let datos = new FormData()
  datos.append("id", object.name)
  fetch('../dml/delete.php', {
    method: 'POST',
    body: datos,
    error: function (jqXHR, textStatus, errorThrown) {
      console.log(jqXHR.responseText);
    }
  }).then((datos) => {
    $('#tablaperros').DataTable().ajax.reload()
  })
}

/** Inserta una nueva fila*/
function insertRow() {
  let datos = new FormData(document.getElementById('formAddRow'))
  fetch('../dml/insert.php', {
    method: 'POST',
    body: datos,
    error: function (jqXHR, textStatus, errorThrown) {
      console.log(jqXHR.responseText);
    }
  }).then((datos) => {
    $('#tablaperros').DataTable().ajax.reload()
  })
}

/** Hace un update de la fila */
function updateRow(){
  let datos = new FormData(document.getElementById('formAddRow'))
  datos.append("id", parseInt(document.getElementById('formAddRow').getAttribute('idObjecto')))
  fetch('../dml/update.php', {
    method: 'POST',
    body: datos,
    error: function (jqXHR, textStatus, errorThrown) {
      console.log(jqXHR.responseText);
    }
  }).then((datos) => {
    $('#tablaperros').DataTable().ajax.reload()
  })
}