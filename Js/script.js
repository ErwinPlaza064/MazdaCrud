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
