 
 
 <!-- Modal para seleccionar el préstamo a editar -->
 <div class="modal fade" id="seleccionarPrestamoModal" tabindex="-1" aria-labelledby="seleccionarPrestamoLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="text-danger" id="seleccionarPrestamoLabel">Seleccionar Préstamo para Editar</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Nombre Empleado</th>
                                <th>Número de Folio</th>
                                <th>Fecha Préstamo</th>
                                <th>Seleccionar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($conn->query($sql) as $row) {
                                echo "<tr>";
                                echo "<td>" . htmlspecialchars($row['nombre_empleado']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['numero_folio']) . "</td>";
                                echo "<td>" . htmlspecialchars($row['fecha_prestamo']) . "</td>";
                                echo "<td><button type='button' class='btn btn-primary seleccionar-prestamo' data-id='" . htmlspecialchars($row['id']) . "'>Seleccionar</button></td>";
                                echo "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Modal Eliminar -->
        <div class="modal fade" id="eliminaModal" tabindex="-1" aria-labelledby="eliminaModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="eliminaModalLabel">Eliminar Préstamo</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h4 class="text-danger">Selecciona el préstamo a eliminar:</h4>
                        <form action="Eliminar_Prestamo.php" method="POST">
                            <select name="folio" class="form-select" required>
                                <?php
                                // Consulta para obtener los préstamos
                                $sql = "SELECT * FROM prestamos";
                                foreach ($conn->query($sql) as $row) {
                                    echo "<option value='" . $row['numero_folio'] . "'>" . htmlspecialchars($row['nombre_empleado']) . " - " . htmlspecialchars($row['numero_folio']) . "</option>";
                                }
                                ?>
                            </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    
    <div class="modal fade" id="editarPrestamoModal" tabindex="-1" aria-labelledby="editarPrestamoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editarPrestamoLabel">Editar Préstamo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editarForm" action="Editar_Prestamo.php" method="POST">
                    <input type="hidden" name="id_prestamo" id="editarId">
                    <input name="nombre_empleado" type="text" id="editarNombreEmpleado" placeholder="Nombre Empleado" class="form-control" required>
                    <input name="numero_folio" type="text" id="editarNumeroFolio" placeholder="Número de Folio" class="form-control" required>
                    <input name="fecha_prestamo" type="date" id="editarFechaPrestamo" class="form-control" required>
                    <input name="fecha_entrega" type="date" id="editarFechaEntrega" class="form-control" required>
                    <select name="entregado" id="editarEntregado" class="form-select">
                        <option value="Entregado">Entregado</option>
                        <option value="No entregado">No Entregado</option>
                    </select>
                    <input name="descripcion_herramienta" type="text" id="editarDescripcionHerramienta" placeholder="Descripción Herramienta" class="form-control">
                    <input name="cantidad" type="number" id="editarCantidad" placeholder="Cantidad" class="form-control" required>
                    <button type="submit" class="btn btn-primary mt-3">Guardar Cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal para agregar un nuevo empleado -->
<div class="modal fade" id="agregarModal" tabindex="-1" aria-labelledby="agregarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
        <div class="modal-body">
        <h5>¿Estás seguro de guardar el préstamo?</h5>
            </div>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form action="Guardar_Prestamo.php" method="POST">
                <input type="hidden" name="nombre_empleado" id="nombre_empleado" value="">
                <input type="hidden" name="numero_folio" id="numero_folio" value="">
                <input type="hidden" name="fecha_prestamo" id="fecha_prestamo" value="">
                <input type="hidden" name="fecha_entrega" id="fecha_entrega" value="">
                <input type="hidden" name="entregado" id="entregado" value="">
                <input type="hidden" name="descripcion" id="descripcion" value="">
                <input type="hidden" name="cantidad" id="cantidad" value="">

                <button type="submit" class="btn btn-primary">Guardar</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </form>
            </div>
        </div>
    </div>
</div>