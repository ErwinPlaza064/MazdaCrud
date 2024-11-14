<?php include '../Config/info.php'?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../Css/style-menu.css" />
    <title>Menu</title>
  </head>
  <body>
    <div class="container">
      <header>
      <p>Usuario: <span style="color:#13fa03;"><?php echo htmlspecialchars($usuario); ?></span></p>
        <p>Fecha</p>
      </header>
      <main>
        <div>
          <img class="img__perfil" src="../Img/ImgPerfil.png" alt="" />
          <img class="img__logo" src="../Img/logoMazdaCuadrado.png" alt="" />
        </div>
        <div>
          <img
            class="img__section-messages"
            src="../Img/SectionMessages.png"
            alt=""
          />
          <img class="img__message" src="../Img/Img_Message.png" alt="" />
        </div>
        <div class="section__box">
          <a href="MenuUsuario.php">
            <img class="img__box" src="../Img/Nota_Prestamo.png" />
          </a>
          <img class="img__box" src="../Img/Sku_Herramienta.png" />
          <img class="img__box" src="../Img/Inventario.png" />
          <img class="img__box" src="../Img/Devoluciones_Prestamos.png" />
          <img class="img__box" src="../Img/Herramientas_Stack.png" />
          <img class="img__box" src="../Img/Busqueda_Sku.png" />
          <img class="img__box img-codigo" src="../Img/Alto_Codigo.png" />
        </div>
      </main>
      <footer class="footer">
            <p  class="footer__mensajeria">Mensajeria:</p>
            <p class="footer__server">Server name: <span style="color:#13fa03;"> <?php echo $server_name; ?></span></p>
            <p class="footer__estatus">Estatus De la Conexión:<span style="color:#13fa03;"> <?php echo $connection_status; ?></span></p>
            <p class="footer__ip">Ip:<span style="color:#13fa03;"> <?php echo $local_ip; ?></span></p>
      </footer>
    </div>
  </body>
</html>
