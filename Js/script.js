document.addEventListener("DOMContentLoaded", function () {
  // Selecciona todos los botones de "Seleccionar" en el modal de selección
  const seleccionarPrestamoButtons = document.querySelectorAll(
    ".seleccionar-prestamo"
  );

  seleccionarPrestamoButtons.forEach((button) => {
    button.addEventListener("click", function () {
      // Obtiene el ID del préstamo desde el atributo data-id del botón
      const idPrestamo = this.getAttribute("data-id");

      // Realiza una petición AJAX para obtener los detalles del préstamo
      fetch(`obtener_prestamo.php?id=${idPrestamo}`)
        .then((response) => response.json())
        .then((data) => {
          // Llena los campos del modal de edición con los datos obtenidos
          document.getElementById("editarId").value = data.id;
          document.getElementById("editarNombreEmpleado").value =
            data.nombre_empleado;
          document.getElementById("editarNumeroFolio").value =
            data.numero_folio;
          document.getElementById("editarFechaPrestamo").value =
            data.fecha_prestamo;
          document.getElementById("editarFechaEntrega").value =
            data.fecha_entrega;
          document.getElementById("editarEntregado").value = data.entregado;
          document.getElementById("editarDescripcionHerramienta").value =
            data.descripcion_herramienta;
          document.getElementById("editarCantidad").value = data.cantidad;

          // Muestra el modal de edición
          new bootstrap.Modal(
            document.getElementById("editarPrestamoModal")
          ).show();
        })
        .catch((error) =>
          console.error("Error al obtener los datos del préstamo:", error)
        );
    });
  });
});

document.getElementById("imprimirVale").addEventListener("click", function () {
  // Suponiendo que el número de folio del préstamo se puede obtener de algún lado
  var numeroFolio = prompt(
    "Introduce el número de folio del préstamo a imprimir:"
  );

  if (numeroFolio) {
    // Realizar una solicitud AJAX al servidor para obtener los detalles del préstamo
    fetch(`obtener_vale.php?folio=${numeroFolio}`)
      .then((response) => response.json())
      .then((data) => {
        if (data.success) {
          // Aquí generamos una nueva ventana con los datos del vale para imprimir
          var ventanaImpresion = window.open("", "_blank");

          // Escribimos el contenido del vale dentro de la ventana
          ventanaImpresion.document.write(`
            <html>
            <head>
              <title>Imprimir Vale</title>
              <style>
                body {
                  font-family: Arial, sans-serif;
                  margin: 20px;
                  color: #333;
                }
                h1 {
                  color: #2e6ab8;
                  text-align: center;
                }
                .vale-container {
                  max-width: 600px;
                  margin: 0 auto;
                  padding: 20px;
                  border: 2px solid #2e6ab8;
                  border-radius: 10px;
                  background-color: #f7f7f7;
                  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                }
                .section {
                  margin-bottom: 20px;
                }
                .section label {
                  font-weight: bold;
                  display: block;
                  margin-bottom: 5px;
                }
                .section p {
                  margin: 0;
                  padding: 5px;
                  background-color: #e9f1fd;
                  border: 1px solid #b3c9e0;
                  border-radius: 5px;
                }
                .button-container {
                  text-align: center;
                  margin-top: 30px;
                }
                button {
                  background-color: #2e6ab8;
                  color: white;
                  border: none;
                  padding: 10px 20px;
                  font-size: 16px;
                  border-radius: 5px;
                  cursor: pointer;
                }
                button:hover {
                  background-color: #245a8c;
                }
              </style>
            </head>
            <body>
              <div class="vale-container">
                <h1>Vale de Préstamo</h1>
                <div class="section">
                  <label>Nombre del Empleado</label>
                  <p>${data.nombre_empleado}</p>
                </div>
                <div class="section">
                  <label>Número de Folio</label>
                  <p>${data.numero_folio}</p>
                </div>
                <div class="section">
                  <label>Fecha de Préstamo</label>
                  <p>${data.fecha_prestamo}</p>
                </div>
                <div class="section">
                  <label>Fecha de Entrega</label>
                  <p>${data.fecha_entrega}</p>
                </div>
                <div class="section">
                  <label>Descripción de Herramienta</label>
                  <p>${data.descripcion_herramienta}</p>
                </div>
                <div class="section">
                  <label>Cantidad</label>
                  <p>${data.cantidad}</p>
                </div>
                <div class="button-container">
                  <button onclick="window.print()">Imprimir Vale</button>
                </div>
              </div>
            </body>
            </html>
          `);

          ventanaImpresion.document.close(); // Cerrar el documento para que se aplique el estilo

        } else {
          alert("No se encontró un préstamo con ese número de folio.");
        }
      })
      .catch((error) => {
        console.error("Error:", error);
      });
  }
});


