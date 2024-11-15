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
          ventanaImpresion.document.write(`
                  <html>
                  <head><h1>Imprimir Vale</h1></head>
                  <body>
                      <h1>Vale de Préstamo</h1>
                      <p>Nombre del Empleado: ${data.nombre_empleado}</p>
                      <p>Número de Folio: ${data.numero_folio}</p>
                      <p>Fecha de Préstamo: ${data.fecha_prestamo}</p>
                      <p>Fecha de Entrega: ${data.fecha_entrega}</p>
                      <p>Descripción de Herramienta: ${data.descripcion_herramienta}</p>
                      <p>Cantidad: ${data.cantidad}</p>
                      <button onclick="window.print()">Imprimir Vale</button>
                  </body>
                  </html>
              `);
          ventanaImpresion.document.close();
        } else {
          alert("No se encontró un préstamo con ese número de folio.");
        }
      })
      .catch((error) => {
        console.error("Error:", error);
      });
  }
});
