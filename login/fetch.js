var formulario = document.getElementById('login');

formulario.addEventListener('submit', function (e) {
  e.preventDefault(e);
  var datos = new FormData(formulario);

  $("#modal-head").text("Alert")
  if (formulario.getAttribute('tipo') == 'sign') {
    fetch('login/crearUsuario.php', {
      method: 'POST',
      body: datos,
      error: function (jqXHR, textStatus, errorThrown) {
        console.log(jqXHR.responseText);
      }
    }).then((res) => res.json()).then((datos) => {
      $("#modal-body").text("Bienvenido " + datos + " por primera vez!")
      window.location.replace("web/index.php")
    })
  } else {
    fetch('login/loguear.php', {
      method: 'POST',
      body: datos,
    }).then((res) => res.json()).then((datos) => {
      if (datos === "Usuario o password incorrectos") {
        $("#modal-body").text(datos)
      } else {
        $("#modal-body").text("Bienvenido de nuevo " + datos + "!")
        window.location.replace("web/index.php")
      }
    })
  }
  $("#global-modal").modal().show(true)
});