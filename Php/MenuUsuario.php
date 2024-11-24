<?php include '../Config/info.php'?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />  
    <link rel="stylesheet" href="../Boostrap/css/bootstrap.min.css" />  
    <link rel="stylesheet" href="../Css/style-usuario.css" />
    <title>Menu</title>
</head>
<body>
    <div class="contenedor">
        <header>
            <p>Usuario: <span style="color:#13fa03;"><?php echo htmlspecialchars($usuario); ?></span></p>
            <p>Fecha</p>
        </header>
        <main>
        <div class="section_crud">
            <img class="img_crud" src="../Img/Img_Edit.png" alt="Editar" data-bs-toggle="modal" data-bs-target="#seleccionarPrestamoModal" data-action="Editar">
            <img class="img_crud" src="../Img/Img_Delate.png" alt="Eliminar" data-bs-toggle="modal" data-bs-target="#eliminaModal" data-action="Eliminar">
            <img class="img_crud" src="../Img/Img_Done.png" alt="Agregar" data-bs-toggle="modal" data-bs-target="#agregarModal" data-action="Agregar">
            <img id="refreshButton" class="img_crud" src="../Img/Img_Refresh.png" alt="Refrescar" data-bs-toggle="modal" data-bs-target="#exampleModal" data-action="Refrescar">
        </div>

        <div>
          <img class="img__perfil" src="../Img/ImgPerfil.png" alt="" />
          <img class="img__logo" src="../Img/logoMazdaCuadrado.png" alt="" />
        </div>
        <?php include 'Message.php'?>
            <div class="container_form">
                <form action="Guardar_Prestamo.php" method="POST" class="form">
                    <div class="Form_Empleado">
                    <input name="nombre_empleado" type="text" placeholder="Nombre Empleado" class="form_select_empleado" required>
                    </div>
                    <input name="numero_folio" type="text" placeholder="Número de Folio" class="form_input" required>
                    <input name="fecha_prestamo" type="date" class="form_input" required>
                    <input name="fecha_entrega" type="date" class="form_input" required>
                    <select name="entregado" class="form_select_entregado">
                        <option value="Entregado">Entregado</option>
                        <option value="No entregado">No Entregado</option>
                    </select>
                    <input name="descripcion" type="text" placeholder="Descripción Herramienta" class="form_input">
                    <input name="cantidad" type="number" placeholder="Cantidad" class="form_input" required>
                    <div class="box_add_button">
                    <button type="submit" class="add_button">+ Agregar</button>
                    </div>
                </form>
            </div>
            <div class="container_table">
                <table class="custom-table">
                <thead>
                    <tr>
                        <th>Nombre Empleado</th>
                        <th>Número de Folio</th>
                        <th>Fecha Préstamo</th>
                        <th>Fecha Entrega</th>
                        <th>Entregado</th>
                        <th>Descripción Herramienta</th>
                        <th>Cantidad</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM prestamos";
                    foreach ($conn->query($sql) as $row) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($row['nombre_empleado']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['numero_folio']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['fecha_prestamo']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['fecha_entrega']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['entregado']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['descripcion_herramienta']) . "</td>";
                        echo "<td>" . htmlspecialchars($row['cantidad']) . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
            </div>
                <div class="box_vale">
                    <img src="../Img/NuevoVale.png" class="img_vale">
                    <button class="btn_vale"><img class="lupa" src="../Img/lupa.png"><span class="span_vale">Search</span></button>
                </div>
                <div class="box_section_2">
                    <img class="img_section-2" src="../Img/GuardarVale.png" alt="">
                    <img id="imprimirVale" class="img_section-2" src="../Img/ImprimirVale.png">
                </div>
        </main>
        <footer class="footer">
            <p class="footer__mensajeria">Mensajeria:</p>
            <p class="footer__server">Server name: <span style="color:#13fa03;"><?php echo $server_name; ?></span></p>
            <p class="footer__estatus">Estatus De la Conexión:<span style="color:#13fa03;"><?php echo $connection_status; ?></span></p>
            <p class="footer__ip">Ip:<span style="color:#13fa03;"><?php echo $local_ip; ?></span></p>
        </footer>
    </div>

    <?php include 'Modales.php'; ?>
    <script src="../Js/refresh.js"></script>
    <script src="../Js/script.js"></script>
    <script src="../Boostrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>